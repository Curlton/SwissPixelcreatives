import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import tailwindcss from '@tailwindcss/vite';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',   // User/Main Styles
                'resources/js/app.js',     // User/Main JS
                'resources/css/admin.css', // Admin Styles
                'resources/js/admin.js',   // Admin JS
            ],
            refresh: true,
        }),
        tailwindcss(),
    ],
});
