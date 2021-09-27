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
            },
            colors: {
                purpleDark: {
                    '50':  '#fafafa',
                    '100': '#f1f1f7',
                    '200': '#e0dbed',
                    '300': '#bfb7d5',
                    '400': '#9d8cb7',
                    '500': '#806899',
                    '600': '#674d7a',
                    '700': '#4d395b',
                    '800': '#34263d',
                    '900': '#0d061b',
                },
            }
        },
    },

    plugins: [require('@tailwindcss/forms'), require('@tailwindcss/typography')],
};
