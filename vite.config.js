import { defineConfig } from 'vite';

import vue from '@vitejs/plugin-vue' 
import laravel from 'laravel-vite-plugin';

 

export default defineConfig({
    build: {
        sourcemap: false,
      },
    plugins: [
        vue(), 
        laravel({
            input: ['resources/css/app.css', 'resources/js/app.js'],
            refresh: true,
        }),
    ],
});