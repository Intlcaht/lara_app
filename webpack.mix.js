const mix = require('laravel-mix');
const tailwindcss = require('tailwindcss');

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
mix.js('resources/js/backend.js', 'public/js')

mix.js('resources/js/app.js', 'public/js')
    .vue()
    // .postCss('resources/css/app.css', 'public/css', [
    //     require('tailwindcss'),
    // ])
    .alias({
        '@': 'resources/js',
    });

mix.sass('resources/css/app.scss', 'public/css')
    .options({
        postCss: [tailwindcss('./tailwind.config.js')],
    });

if (mix.inProduction()) {
    mix.version();
}
