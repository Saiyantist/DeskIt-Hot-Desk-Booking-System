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
            lpink:'rgba(252, 223, 157, 0.5)',
            // darkgray:'#A9A9A9',
            darkgray: 'rgb(156 163 175);',
            darkergray: 'rgb(75 85 99);',
            blue: 'rgb(125 211 252);',
            darkBlue: 'rgb(2 132 199);',
            red: 'rgb(252 165 165);',
            darkRed: 'rgb(220 38 38);',
          },
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
        },
    },

    plugins: [require('@tailwindcss/forms')],
};
