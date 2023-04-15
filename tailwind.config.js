const defaultTheme = require('tailwindcss/defaultTheme');

/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
        "./node_modules/flowbite/**/*.js",
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Nunito', ...defaultTheme.fontFamily.sans],
            },
            height: {
                "80v": "80vh",
                "450": "450px",
            },
            width:{
                "600": "600px"
            },
            minHeight:{
                '450':"450px"
            }
        },
        colors: {
            'blue-black': '#04102a',
            'blue-grey': '#2d394d',
            'blue-grey-white': '#414d60',
        },

    },

    plugins: [
        require('@tailwindcss/forms'),
        require('flowbite/plugin'),

    ],
};
