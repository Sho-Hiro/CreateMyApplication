import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/js/app.js',
                'resources/js/google_map.js',
            ],
            refresh: true,
            valetTls: 'my-app.test',
        }),
    ],
});
