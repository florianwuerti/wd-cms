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

mix.js('resources/js/app.js', 'public/js')
    .sass('resources/sass/app-frontend.scss', 'public/css')
    .sass('resources/sass/app-backend.scss', 'public/css')
    .browserSync({
        proxy: 'https://wd-cms.lab',
        host: 'wd-cms.lab',
        open: false
    });