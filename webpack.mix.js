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
    'resources/minimoadmin/css/master_style.css',
    'resources/minimoadmin/css/extend.css',
    'resources/minimoadmin/css/skins/_all-skins.css',

], 'public/assets/stylesheets/styles.css')
    .sourceMaps()
    .version();

mix.scripts([
    'resources/minimoadmin/js/demo.js',
    'resources/minimoadmin/js/template.js',
    'resources/minimoadmin/js/advanced-form-element.js',
    'resources/minimoadmin/js/calendar.js',
    'resources/minimoadmin/js/dashboard.js',
    'resources/minimoadmin/js/data-table.js',
    'resources/minimoadmin/js/editor.js',
    'resources/minimoadmin/js/mailbox.js',
    'resources/minimoadmin/js/steps.js',
    'resources/minimoadmin/js/validation.js',
    'resources/minimoadmin/js/widget-charts.js',
    'resources/minimoadmin/js/widget-flot-charts.js',
    'resources/minimoadmin/js/widget-inline-charts.js',
    'resources/minimoadmin/js/widget-morris-charts.js',
], 'public/assets/scripts/frontend.js')
    .sourceMaps()
    .version();
