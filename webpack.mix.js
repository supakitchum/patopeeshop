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
mix.styles([
    'node_modules/bootstrap-fileinput/css/fileinput.css',
    'node_modules/bootstrap-fileinput/themes/explorer-fas/theme.css',
    'node_modules/sweetalert2/dist/sweetalert2.css',

], 'public/assets/stylesheets/styles.css')
    .sourceMaps()
    .version();

mix.scripts([
    'node_modules/bootstrap/dist/js/bootstrap.bundle.js',
    'node_modules/bootstrap-fileinput/js/fileinput.js',
    'node_modules/bootstrap-fileinput/js/locales/th.js',
    'node_modules/bootstrap-fileinput/js/plugins/piexif.js',
    'node_modules/bootstrap-fileinput/js/plugins/purify.js',
    'node_modules/bootstrap-fileinput/js/plugins/sortable.js',
    'node_modules/bootstrap-fileinput/themes/fas/theme.js',
    'node_modules/bootstrap-fileinput/themes/explorer-fas/theme.js',
    'node_modules/sweetalert2/dist/sweetalert2.js',

], 'public/assets/scripts/frontend.js')
    .sourceMaps()
    .version();
