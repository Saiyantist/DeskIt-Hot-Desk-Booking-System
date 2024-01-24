const defaultTheme = require('tailwindcss/defaultTheme');

/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        colors: {
            yellowA:'#f8de9c',
            yellowB:'#FBB503',
            green:'#00CC2D',
            gray:'#F5F5F5',
            block:'#000000',
            grey: '#EDEDED',
            pink: '#FCF8F8',
            white: '#FFFFFF',
          },
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
        },
    },

    plugins: [require('@tailwindcss/forms')],
};
