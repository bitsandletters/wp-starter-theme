import { defineConfig } from 'vite';
import { resolve } from 'path';

export default defineConfig({
  plugins: [],
  root: '',
  base: process.env.NODE_ENV === 'development'
    ? '/'
    : '/wp-content/themes/wp-starter-theme/dist/',
  build: {
    outDir: resolve(__dirname, 'dist'),
    emptyOutDir: true,
    manifest: true,
    target: 'es2018',
    rollupOptions: {
      input: {
        main: resolve(__dirname, 'assets/js/main.ts'),
      },
    },
  },
  server: {
    host: '0.0.0.0',
    cors: true,
    strictPort: true,
    port: 3000,
    https: false,
    hmr: {
      host: 'localhost',
    },
  },
});