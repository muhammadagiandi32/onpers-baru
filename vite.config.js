import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/js/app.js',
                'resources/customs/js/main.js',
                'resources/customs/css/style.css',
                
                'resources/customs/lib/easing/easing.min.js',
                'resources/customs/lib/easing/easing.js',
                
                'resources/customs/lib/slick/slick.min.js',
                'resources/customs/lib/slick/slick-theme.css',
                'resources/customs/lib/slick/slick.css'
            ],
            refresh: true,
        }),
    ],
    optimizeDeps: {
        include: ['jquery', 'slick-carousel']
    }
});
