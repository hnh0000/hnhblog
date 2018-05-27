let mix = require('laravel-mix');

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

mix.js('resources/assets/js/app.js', 'public/assets/js')
    .js('resources/assets/js/paste-upload-image.js', 'public/assets/js')
    .sass('resources/assets/sass/app.scss', 'public/assets/css')
    .sass('resources/assets/sass/markdown.scss', 'public/assets/css')
    .sass('resources/assets/sass/resume.scss', 'public/assets/css')
    .version();