# WordPress Starter Theme

A modern WordPress starter theme with Tailwind CSS, Alpine.js, and Vite. We use this as a starting point for new WP theme builds at [Bits & Letters](https://bitsandletters.co).

## Features

- Vite for asset bundling and development server
- CSS cascade layers
- Tailwind CSS for styling, with a `revert-layer` class that lets you fall back to WordPress defaults on a per-element basis (e.g. for block styles)
- TypeScript support
- Alpine.js for interactivity

## Requirements

In addition to whatever WordPress local dev setup you prefer, you'll need a recent version of Node.js (v20+ should be fine). I like to use [Volta](https://volta.sh/) to install and manage Node, but other version/package managers should work fine.

To install Vite, Tailwind, and all other dependencies, navigate into the theme's directory in your terminal and run `npm install` (or `yarn`, `pnpm`, etc if you prefer).

```sh
cd /path/to/wp/wp-content/themes/wp-starter-theme
npm install
```

## Local Development

This setup supports two different approaches to working locally:

### Production builds + file watcher

This is most similar to how many of us are used to working with WordPress, and the output will be most similar to production because you're seeing the same built assets you'll eventually upload to a server.

For this one, from the theme directory run:

```sh
vite build --watch
```

### Live dev server

This method is only available if your WordPress install is set up in local or development mode, _and_ the dev server is running, otherwise it'll fall back to production builds as described above.

To enable local development mode, add this line to your `wp-config.php`:

```php
if (! defined('WP_ENVIRONMENT_TYPE')) {
  define('WP_ENVIRONMENT_TYPE', 'local');
}
```

The theme (and any other code) can check whether you're running locally via the `wp_get_environment_type()` core function.

To run the dev server, simply `cd` into the theme directory and run:

```sh
vite
```

## Building for Production

To build assets for production:

```
vite build
```

## Customization

- Modify `tailwind.config.ts` to customize your Tailwind CSS setup.
- Update `assets/css/main.css` to add custom styles.
- Modify `assets/js/main.ts` to add custom JavaScript.

## Copyright

© 2024 Bits & Letters, LLC. All rights reserved.

This WordPress Starter Theme is proprietary software owned by Bits & Letters, LLC.
No part of this software, including this file, may be copied, modified, propagated,
or distributed except as expressly permitted by Bits & Letters, LLC.
