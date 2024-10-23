import { defineConfig } from 'vite';
import path from 'path';

export default defineConfig({
  root: './frontend', // Chemin vers  dossier front-end 
  build: {
    outDir: '../public/dist', // Répertoire où les fichiers compilés seront placés
    rollupOptions: {
      input: {
        main: path.resolve(__dirname, 'frontend/assets/js/main.js'), // Point d'entrée principal
      },
    },
  },
  server: {
    host: '0.0.0.0', // Pour que Vite soit accessible via Docker
    port: 5173, // Port d'écoute de vite
    hmr: {
      host: 'localhost', // Pour la gestion du HMR
      port: 5173,
    },
  },
  css: {
    postcss: path.resolve(__dirname, 'postcss.config.js'),
  },
});
