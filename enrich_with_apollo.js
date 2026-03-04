require('dotenv').config();
const fs = require('fs');
const axios = require('axios');

const APOLLO_API_KEY = process.env.APOLLO_API_KEY;
const INPUT_FILE = 'apollo_import_ready.csv';
const OUTPUT_FILE = 'enriched_agency_contacts.csv';

async function enrichLeads() {
    console.log("🚀 Starting Apollo.io Enrichment (Testing basic auth)...");

    if (!fs.existsSync(INPUT_FILE)) {
        console.error("❌ Source CSV not found!");
        return;
    }

    const content = fs.readFileSync(INPUT_FILE, 'utf-8');
    const lines = content.split('\n');
    const results = [];
    results.push('Company Name,Contact Name,Title,Email,Seniority,Website');

    for (let i = 1; i < lines.length; i++) {
        const line = lines[i].trim();
        if (!line) continue;

        const parts = line.match(/(".*?"|[^",\s]+)(?=\s*,|\s*$)/g);
        if (!parts) continue;

        const companyName = parts[0].replace(/"/g, '');
        const domain = parts[1].replace(/"/g, '').replace(/https?:\/\//, '').split('/')[0];

        console.log(`🔍 Enriching: ${companyName} (${domain})...`);

        try {
            // Some API keys for Apollo require the 'Authorization' header as 'Bearer [API_KEY]' 
            // even though it's not standard for their v1. Let's try it.
            const response = await axios.post('https://api.apollo.io/v1/people/match', {
                domain: domain,
                organization_name: companyName,
                titles: ["Founder", "CEO", "Creative Director", "Partner", "Director of Design"]
            }, {
                headers: {
                    'Content-Type': 'application/json',
                    'Authorization': `Bearer ${APOLLO_API_KEY}`
                }
            });

            const person = response.data.person;
            if (person) {
                const name = person.name || 'N/A';
                const title = person.title || 'N/A';
                const email = person.email || 'N/A';
                const seniority = person.seniority || 'N/A';

                results.push(`"${companyName}","${name}","${title}","${email}","${seniority}","${domain}"`);
                console.log(`✅ Found: ${name} (${title})`);
            } else {
                console.log(`⚠️  No match found for ${companyName}`);
            }
        } catch (error) {
            console.error(`❌ Error enriching ${companyName}:`, error.response ? JSON.stringify(error.response.data) : error.message);
        }

        await new Promise(resolve => setTimeout(resolve, 1000));
    }

    fs.writeFileSync(OUTPUT_FILE, results.join('\n'));
}

enrichLeads();
