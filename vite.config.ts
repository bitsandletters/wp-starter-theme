// vite.config.js
import { defineConfig } from "vite"
import liveReload from "vite-plugin-live-reload"

export default defineConfig({
  plugins: [liveReload("./**/*.php", "./theme.json")],
  appType: 'custom',
  build: {
    outDir: './dist',
    manifest: true,
    rollupOptions: {
      input: './assets/js/main.ts',
    },
  },
})