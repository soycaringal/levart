const { mix } = require('laravel-mix');

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

mix.js('resources/assets/js/app.js', 'public/js')
    .copy('resources/assets/js/sb-admin.js', 'public/js')
    .copy('bower_components/bootstrap/dist/js/bootstrap.min.js', 'public/js')
    .sass('resources/assets/sass/app.scss', 'public/css')
    .sass('resources/assets/sass/sb-admin.scss', 'public/css')
    .sass('bower_components/font-awesome/scss/font-awesome.scss', 'public/css')
    .extract(['jquery'])
    // .copy('bower_components/font-awesome', 'public/assets/fonts')
    .copy('bower_components/metisMenu', 'public/js');



