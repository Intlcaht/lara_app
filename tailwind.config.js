//const colors = require('tailwindcss/colors');
const defaultTheme = require('tailwindcss/defaultTheme');

function withOpacityValue(variable) {
    return ({ opacityValue }) => {
        if (opacityValue === undefined) {
            return `rgb(var(${variable}))`
        }
        return `rgb(var(${variable}) / ${opacityValue})`
    }
}
module.exports = {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './vendor/laravel/jetstream/**/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        './Modules/Views/Resources/**/*.blade.php',
        './resources/**/*.blade.php',
        './vendor/filament/**/*.blade.php',
    ],

    theme: {
        extend: {
            colors: {
                bg: {
                    "50": "#ffffff",
                    "100": "#ffffff",
                    "200": "#ffffff",
                    "300": "#ffffff",
                    "400": "#f9fcff",
                    "500": "#eff2fb",
                    "600": "#e5e8f1",
                    "700": "#dbdee7",
                    "800": "#d1d4dd",
                    "900": "#c7cad3"
                },
                surface: {
                    "50": "#ffffff",
                    "100": "#ffffff",
                    "200": "#ffffff",
                    "300": "#ffffff",
                    "400": "#ffffff",
                    "500": "#ffffff",
                    "600": "#f5f5f5",
                    "700": "#ebebeb",
                    "800": "#e1e1e1",
                    "900": "#d7d7d7"
                },
                nav_p: {
                    "50": "#7f8dae",
                    "100": "#7583a4",
                    "200": "#6b799a",
                    "300": "#616f90",
                    "400": "#576586",
                    "500": "#4d5b7c",
                    "600": "#435172",
                    "700": "#394768",
                    "800": "#2f3d5e",
                    "900": "#253354"
                },
                title: {
                    "50": "#354d80",
                    "100": "#2b4376",
                    "200": "#21396c",
                    "300": "#172f62",
                    "400": "#0d2558",
                    "500": "#031b4e",
                    "600": "#001144",
                    "700": "#00073a",
                    "800": "#000030",
                    "900": "#000026"
                },
                primary: {
                    '50': withOpacityValue('--color-primary-50'),
                    '100': withOpacityValue('--color-primary-100'),
                    '200': withOpacityValue('--color-primary-200'),
                    '300': withOpacityValue('--color-primary-300'),
                    '400': withOpacityValue('--color-primary-400'),
                    '500': withOpacityValue('--color-primary-500'),
                    '600': withOpacityValue('--color-primary-600'),
                    '700': withOpacityValue('--color-primary-700'),
                    '800': withOpacityValue('--color-primary-800'),
                    '900': withOpacityValue('--color-primary-900')
                },
                // danger: colors.red,
                // success: colors.green,
                // warning: colors.amber,
            },
            fontFamily: {
                sans: ['Nunito', ...defaultTheme.fontFamily.sans],
            },
        },
    },

    colors: {
        "primary": {
            "50": "#4485ff",
            "100": "#3a7bff",
            "200": "#3071ff",
            "300": "#2667ff",
            "400": "#1c5dff",
            "500": "#1253fa",
            "600": "#0849f0",
            "700": "#003fe6",
            "800": "#0035dc",
            "900": "#002bd2"
        },

    },

    plugins: [require('@tailwindcss/forms'), require('@tailwindcss/typography')],
};
