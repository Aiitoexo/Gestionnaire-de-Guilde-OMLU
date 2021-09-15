const defaultTheme = require('tailwindcss/defaultTheme');

module.exports = {
    // mode: 'jit',
    purge: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './vendor/laravel/jetstream/**/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        './resources/js/**/*.vue',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Nunito', ...defaultTheme.fontFamily.sans],
            },
            gridTemplateColumns: {
                // Simple 16 column grid
                '13': 'repeat(13, minmax(0, 1fr))',
            },
            gridColumn: {
                'span-13': 'span 13 / span 13',
            }
        },
    },

    plugins: [require('@tailwindcss/forms'), require('@tailwindcss/typography')],
};
