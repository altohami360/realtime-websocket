import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/js/app.js',
                'resources/js/websocket.js',
                'resources/js/chatbox.js',
                'resources/js/online.js',
            ],
            refresh: true,
        }),
    ],
});
