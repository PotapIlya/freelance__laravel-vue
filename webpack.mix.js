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

mix.js('resources/js/app.js', 'public/assets/js')
    .vue()


    // .sass('resources/sass/all/app.scss', 'public/assets/all/css')
// mix.sass('resources/sass/user/app.scss', 'public/assets/user/css')
    // .sass('resources/sass/admin/app.scss', 'public/assets/admin/css')

    .disableNotifications();
