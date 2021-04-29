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

mix.js(['resources/js/app.js', 'public/assets/js/stisla.js'], 'public/js')
    .sass('resources/sass/app.scss', 'public/css')
    .postCss('resources/css/app.css', 'public/css/')
    .sourceMaps();


mix.styles([
    'public/assets/css/style.css',
    'public/assets/css/components.css',
], 'public/css/template.css').version()


mix.scripts([
	'public/assets/js/scripts.js',
	'public/assets/js/custom.js',
],
'public/js/template.js').version();
