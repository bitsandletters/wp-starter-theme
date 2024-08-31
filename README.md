# WordPress Starter Theme

A modern WordPress starter theme with Tailwind CSS, Alpine.js, and Vite.

## Features

- Tailwind CSS for styling
- Alpine.js for interactivity
- Vite for asset bundling and development server
- Docker setup for local development
- VSCode devcontainer configuration
- Custom home page template

## Requirements

- Node.js (v14+)
- Docker and Docker Compose
- Visual Studio Code (for devcontainer usage)

## Local Development

### Using VSCode Devcontainer

1. Open the project folder in VSCode.
2. When prompted, click "Reopen in Container" or run the "Remote-Containers: Reopen in Container" command from the command palette.
3. VSCode will build the Docker container and set up the development environment.

### Manual Setup

1. Clone this repository into your WordPress themes directory.

2. Install dependencies:

   ```
   npm install
   ```

3. Start the Docker environment:

   ```
   npm run docker:start
   ```

4. In a new terminal, start the Vite development server:

   ```
   npm run dev
   ```

5. Visit http://localhost:8000 to see your WordPress site.

   - The WordPress admin panel is at http://localhost:8000/wp-admin
   - Default credentials are:
     - Username: admin
     - Password: password

6. To stop the Docker environment:
   ```
   npm run docker:stop
   ```

## Building for Production

To build assets for production:

```
npm run build
```

## Customization

- Modify `tailwind.config.js` to customize your Tailwind CSS setup.
- Edit files in the `template-parts` directory to change the structure of different page elements.
- Update `assets/css/main.css` to add custom styles.
- Modify `assets/js/main.js` to add custom JavaScript.

## Copyright

© 2023 Bits & Letters, LLC. All rights reserved.

This WordPress Starter Theme is proprietary software owned by Bits & Letters, LLC.
No part of this software, including this file, may be copied, modified, propagated,
or distributed except as expressly permitted by Bits & Letters, LLC.
