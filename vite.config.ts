import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import react from '@vitejs/plugin-react-swc'

export default defineConfig({
    plugins: [
        react(),
        laravel({
            input: [
                'resources/sass/app.scss',
                'resources/js/app.ts',
            ],
            refresh: true,
        }),
    ],
});
