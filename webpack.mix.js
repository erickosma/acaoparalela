const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.js('resources/js/app.js', 'public/app/js')
   .sass('resources/sass/app.scss', 'public/app/css');

/**
 * Libs
 */

mix.js(['resources/js/vendor.js', 'node_modules/daemonite-material/js/material.min.js'], 'public/vendor/js/')
    .sass('resources/sass/vendor.scss', 'public/vendor/css');

if (mix.inProduction()) {
    mix.version();
}
