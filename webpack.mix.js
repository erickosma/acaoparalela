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

mix.js(['resources/js/vendor.js',
        'node_modules/daemonite-material/js/material.min.js',
        'node_modules/bootstrap/dist/js/bootstrap.min.js',
        'resources/js/lib/popper.min.js',
        'resources/js/lib/additional-methods.min.js',
        'resources/js/lib/jquery.validate.min.js',
        'resources/js/lib/toastr.min.js'],
    'public/vendor/js/')
    .sass('resources/sass/vendor.scss', 'public/vendor/css');

mix.copyDirectory('resources/images', 'public/img');


/*
home
 */
mix.js('resources/js/home.js', 'public/app/js')
    .sass('resources/sass/home.scss', 'public/app/css');

mix.js('resources/js/profile.js', 'public/app/js')
    .sass('resources/sass/profile.scss', 'public/app/css');

if (mix.inProduction()) {
    mix.version();
}
