const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel applications. By default, we are compiling the CSS
 | file for the application as well as bundling up all the JS files.
 |
 */

// mix.js('resources/js/app.js', 'public/js').postCss('resources/css/app.css', 'public/css', [
//     require('postcss-import'),
//     require('tailwindcss'),
//     require('autoprefixer'),
// ]);


mix.styles('resources/assets/css/client.css', 'public/assets/css/client.css')
mix.styles('resources/assets/admin/css/main.css', 'public/assets/admin/css/main.css')

mix.js('resources/assets/js/client.js', 'public/assets/js/client.js')
mix.js('resources/assets/admin/js/main.js', 'public/assets/admin/js/main.js')


if(mix.inProduction()){
    mix.version();
}
