import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import tailwindcss from '@tailwindcss/vite'; // Pastikan baris ini ada

export default defineConfig({
    plugins: [
        tailwindcss(), // Pastikan diaktifkan di sini
        laravel({
            input: ['resources/css/app.css', 'resources/js/app.js'],
            refresh: true,
        }),
    ],
});