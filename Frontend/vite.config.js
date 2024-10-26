import { defineConfig } from 'vite';
import path from 'path';

export default defineConfig({
  root: './public',
  build: {
    outDir: path.resolve(__dirname, 'public/dist'), // Chemin absolu pour éviter les problèmes
    rollupOptions: {
      input: {
        main: path.resolve(__dirname, 'public/assets/js/main.js'),
      },      
    },
  },
  server: {
    host: '0.0.0.0',
    port: 5173,
    hmr: {
      host: 'localhost',
      port: 5173,
    },
  },
  css: {
    postcss: path.resolve(__dirname, './postcss.config.js'),
  },
});
