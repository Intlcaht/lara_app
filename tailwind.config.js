const defaultTheme = require('tailwindcss/defaultTheme');

module.exports = {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './vendor/laravel/jetstream/**/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        './resources/js/**/*.vue',
        './Modules/Views/Resources/views/**/*.vue'
    ],

    theme: {

        extend: {
            fontFamily: {
                sans: ['Nunito', ...defaultTheme.fontFamily.sans],
            },
            colors: {
                'bg-primary': '#1a73e8',
                'bg-primary-dark': 'rgb(0, 36, 124)',
                'bg-banner': 'rgb(8, 27, 75)',
                'text-banner': 'rgb(192, 194, 211)',
                'bg-surface': 'rgb(255, 255, 255)',
                'bg-bg': 'rgb(255, 255, 255)',
                'text-nav-item': 'rgb(77, 91, 124)'
            },
        },
    },

    plugins: [require('@tailwindcss/forms'), require('@tailwindcss/typography')],
};
