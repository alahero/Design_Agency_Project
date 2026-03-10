# Innov8 Project Workspace

This is a dual-purpose repository containing the Innov8 PHP-based website and Node.js-based web scraping and lead generation utilities.

## Tech Stack
- **Frontend**: PHP, Vanilla HTML, CSS, JavaScript. (Strictly PHP for the website logic). No heavy frameworks.
- **Backend/Scripts**: Node.js
- **Package Manager**: npm

## Build & Run Commands
- Run Frontend Dev Server: `cd Innov8/innov8-website && php -S localhost:8000`
- Install Dependencies: `npm install`
- Run Node Scripts: `node <script_name.js>`

## Security & Constraints
- Never modify the `.env` or `node_modules` directories.
- Ensure all frontend changes maintain the existing `data-i18n` internationalization attributes.

## Agent Guidelines
- For frontend development, strictly follow the vanilla js patterns in @.agent/rules/vanilla-frontend-standards.md.
- For copywriting or text changes, utilize the @.agent/skills/apply-innov8-tone/SKILL.md skill.
- For Git operations (commits, syncs, fetches, merges, pull requests), always follow the @.agent/workflows/commit-strategy.md workflow.
