require('dotenv').config();
const { ApifyClient } = require('apify-client');
const { createObjectCsvWriter } = require('csv-writer');

// Client Setup
const client = new ApifyClient({
    token: process.env.APIFY_TOKEN,
});

const targetLocations = [
    "Design Agency New York, NY",
    "Design Agency San Francisco, CA",
    "Design Agency Dumbo, Brooklyn, NY",
    "Design Agency SoHo, Manhattan, NY"
];

const MAX_PLACES_PER_LOCATION = 15;

async function scrapeAgencies() {
    console.log("🚀 Starting Apify Extraction for Innov8 Prominent Design Agencies...");
    console.log(`Budget Limit enforced: Max ${MAX_PLACES_PER_LOCATION} results per location.`);

    const allLeads = [];

    // The official compass/crawler-google-places mapping
    const input = {
        "searchStringsArray": targetLocations,
        "maxCrawledPlacesPerSearch": MAX_PLACES_PER_LOCATION,
        "language": "en",
        "maxReviews": 0,
        "maxImages": 0,
        "exportPlaceUrls": false,
        "includeWebResults": true,
        "scrapeReviewerName": false,
        "extractEmailsAndContacts": true
    };

    try {
        console.log("Calling Apify Actor (compass/crawler-google-places)...");
        // Run the Google Maps Scraper and wait for it to finish
        const run = await client.actor("compass/crawler-google-places").call(input);

        console.log(`✅ Run finished. Fetching results from dataset ID: ${run.defaultDatasetId}`);
        const { items } = await client.dataset(run.defaultDatasetId).listItems();

        console.log(`📦 Fetched ${items.length} total results from Apify.`);

        // Process results
        for (const item of items) {
            // Exclude "info@" and "contact@" emails
            let validEmails = [];

            // Check where emails are stored (sometimes item.emails, sometimes item.additionalInfo.emails)
            const emailsList = item.emails || (item.contactDetails && item.contactDetails.emails) || [];

            if (Array.isArray(emailsList)) {
                validEmails = emailsList
                    .map(e => typeof e === 'object' ? e.email : e) // if it's an object array
                    .filter(e => e && !e.toString().toLowerCase().startsWith('info@') && !e.toString().toLowerCase().includes('contact@'));
            } else if (typeof emailsList === 'string') {
                validEmails = emailsList.split(',')
                    .filter(e => e && !e.trim().toLowerCase().startsWith('info@') && !e.trim().toLowerCase().includes('contact@'));
            }

            allLeads.push({
                companyName: item.title || item.name || 'N/A',
                location: item.address || item.neighborhood || 'N/A',
                website: item.website || 'N/A',
                phone: item.phone || item.phoneUnformatted || 'N/A',
                emails: validEmails.join(', ') || 'N/A',
                rating: item.totalScore || item.rating || 'N/A',
                reviews: item.reviewsCount || 0
            });
        }

        // Write to CSV
        const csvWriter = createObjectCsvWriter({
            path: 'design_agencies_leads.csv',
            header: [
                { id: 'companyName', title: 'Company Name' },
                { id: 'location', title: 'Location' },
                { id: 'website', title: 'Website' },
                { id: 'phone', title: 'Phone' },
                { id: 'emails', title: 'Emails (Excl. info/contact)' },
                { id: 'rating', title: 'Rating' },
                { id: 'reviews', title: 'Review Count' }
            ]
        });

        await csvWriter.writeRecords(allLeads);
        console.log(`\n🎉 Success! Wrote ${allLeads.length} leads to design_agencies_leads.csv`);

    } catch (error) {
        console.error(`❌ Error scraping Apify:`, error.message);
    }
}

scrapeAgencies();
