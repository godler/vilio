import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/css/editor.scss',
                'resources/js/app.js',
                'resources/js/static.js',
                'resources/js/editor.js'
            ],
            refresh: true,
        }),
    ],
});
