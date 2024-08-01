import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import inject from '@rollup/plugin-inject';
import commonjs from '@rollup/plugin-commonjs';

export default defineConfig({
    build: {
        cssSourceMap: true,
    },
    css: {
        devSourcemap: true,
    },
    base: '/build/',
    plugins: [
        laravel({
            input: [
                'resources/sass/app.scss',
                'resources/sass/main.scss',
                'resources/js/app.js',
                'resources/js/images-preview.js',
                'resources/js/images-preview-slider.js',
                'resources/js/images-actions.js',
                'resources/js/nikaModel.build.js',
                'resources/js/summernote.js',
                'resources/js/cart.js',
                'resources/js/select.js',
                'resources/js/cartPage.js',
                'resources/js/catalogSingle.js',
                'resources/js/catalog.js',
                'resources/js/gallery.js',
                'resources/js/contacts.js',
                'resources/js/homepage.js',
                'resources/js/news.js',
                'resources/js/product-page.js',
                'resources/js/services.js',
                'resources/js/common.js',
                'resources/js/model.js',
                'resources/js/adminNews.js',
                'resources/js/delete.js',
            ],
            refresh: true,
        }),
        inject({
            $: 'jquery',
            jQuery: 'jquery',
        }),
        commonjs(), // Додаємо плагін commonjs
    ],
    optimizeDeps: {
        include: ['jquery', 'chosen-js'],
    },
});
