const fs = require('fs');
const path = require('path');

const inputFile = path.join(__dirname, 'design_agencies_leads.csv');
const outputFile = path.join(__dirname, 'apollo_import_ready.csv');

function transform() {
    console.log("🛠️  Formatting leads for Apollo.io Import...");

    if (!fs.existsSync(inputFile)) {
        console.error("❌ Source CSV not found!");
        return;
    }

    const content = fs.readFileSync(inputFile, 'utf-8');
    const lines = content.split('\n');
    const headers = lines[0];

    // Logic: Apollo maps best to "Company Name" and "Website".
    // We will also try to extract City and State from the "Location" field.

    const newRows = [];
    newRows.push('Company Name,Website,Phone,City,State,Full Address'); // Optimized Headers

    for (let i = 1; i < lines.length; i++) {
        if (!lines[i].trim()) continue;

        // Simple CSV parser for quoted strings (location field often has commas)
        const parts = lines[i].match(/(".*?"|[^",\s]+)(?=\s*,|\s*$)/g);

        if (!parts || parts.length < 3) continue;

        let name = parts[0].replace(/"/g, '');
        let location = parts[1].replace(/"/g, '');
        let website = parts[2].replace(/"/g, '');
        let phone = parts[3] ? parts[3].replace(/"/g, '') : '';

        // Extract City/State from location (e.g., "344 Harriet St #205, San Francisco, CA 94103")
        let city = 'N/A';
        let state = 'N/A';

        const locParts = location.split(',');
        if (locParts.length >= 2) {
            city = locParts[locParts.length - 2].trim();
            const stateZip = locParts[locParts.length - 1].trim().split(' ');
            state = stateZip[0]; // Take the state code (NY, CA, etc)
        }

        // Sanitize for CSV (wrap in quotes to be safe)
        const row = `"${name}","${website}","${phone}","${city}","${state}","${location.replace(/"/g, '""')}"`;
        newRows.push(row);
    }

    fs.writeFileSync(outputFile, newRows.join('\n'));
    console.log(`\n✅ Success! Created ${outputFile}`);
    console.log("You can now upload this file to Apollo.io -> Search -> Companies -> Import CSV.");
}

transform();
