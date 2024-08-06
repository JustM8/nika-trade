import { defineConfig } from "vite";
import laravel from "laravel-vite-plugin";
import inject from "@rollup/plugin-inject";
import commonjs from "@rollup/plugin-commonjs";
import nodeResolve from "@rollup/plugin-node-resolve";
// import babel from "@rollup/plugin-babel";
import legacy from "@vitejs/plugin-legacy";

export default defineConfig({
    build: {
        cssSourceMap: true,
        rollupOptions: {
            plugins: [
                nodeResolve({
                    browser: true,
                    preferBuiltins: false,
                }),
                commonjs({
                    include: "node_modules/**",
                    sourceMap: true,
                    requireReturnsDefault: "auto",
                    transformMixedEsModules: true,
                }),
                inject({
                    $: "jquery", // Ensure jQuery is globally available
                    jQuery: "jquery",
                }),
                legacy({
                    targets: ["defaults", "not IE 11"],
                }),
            ],
            output: {
                sourcemap: true,
            },
        },
    },
    css: {
        devSourcemap: true,
    },
    base: "/build/",
    plugins: [
        laravel({
            input: [
                "resources/sass/app.scss",
                "resources/sass/main.scss",
                "resources/js/app.js",
                "resources/js/images-preview.js",
                "resources/js/images-preview-slider.js",
                "resources/js/images-actions.js",
                "resources/js/nikaModel.build.js",
                "resources/js/summernote.js",
                "resources/js/cart.js",
                "resources/js/select.js",
                "resources/js/cartPage.js",
                "resources/js/catalogSingle.js",
                "resources/js/catalog.js",
                "resources/js/gallery.js",
                "resources/js/contacts.js",
                "resources/js/homepage.js",
                "resources/js/news.js",
                "resources/js/product-page.js",
                "resources/js/services.js",
                "resources/js/common.js",
                "resources/js/model.js",
                "resources/js/adminNews.js",
                "resources/js/delete.js",
            ],
            refresh: true,
        }),
        inject({
            $: "jquery",
            jQuery: "jquery",
        }),
    ],
    optimizeDeps: {
        include: [
            "jquery",
            "chosen-js",
            "@popperjs/core",
            "bootstrap",
            "summernote",
        ],
    },

    resolve: {
        // alias: {
        //     jquery: "node_modules/jquery/dist/jquery.js", // Latest jQuery
        //     "jquery-legacy": "node_modules/jquery-legacy/dist/jquery.js", // Legacy jQuery
        //     bootstrap: "node_modules/bootstrap/dist/js/bootstrap.bundle.min.js", // Latest Bootstrap
        //     "bootstrap-legacy":
        //         "node_modules/bootstrap-legacy/dist/js/bootstrap.bundle.min.js", // Legacy Bootstrap
        //     "popper.js": "node_modules/popper.js/dist/umd/popper.js", // Legacy Popper
        //     "@popperjs/core": "node_modules/@popperjs/core/dist/umd/popper.js", // Latest Popper
        // },
    },
});
