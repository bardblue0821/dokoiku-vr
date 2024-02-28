import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
        'node_modules/preline/dist/*.js',  // preline https://preline.co/docs/frameworks-laravel.html
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },

            // Text animation
            animation: {
                "tracking-in-expand-fwd": "tracking-in-expand-fwd 0.8s cubic-bezier(0.215, 0.610, 0.355, 1.000)   both",
                "rotate-in-2-cw": "rotate-in-2-cw 0.5s cubic-bezier(0.250, 0.460, 0.450, 0.940)   both",
            },
            keyframes: {
                "tracking-in-expand-fwd": {
                    "0%": {
                        "letter-spacing": "-.5em",
                        transform: "translateZ(-700px)",
                        opacity: "0"
                    },
                    "40%": {
                        opacity: ".6"
                    },
                    to: {
                        transform: "translateZ(0)",
                        opacity: "1"
                    }
                },
                "rotate-in-2-cw": {
                    "0%": {
                        transform: "rotate(-45deg)",
                        opacity: "0"
                    },
                    to: {
                        transform: "rotate(0)",
                        opacity: "1"
                    }
                },
            },
        },
    },

    plugins: [
        forms,
        require('preline/plugin'), // preline https://preline.co/docs/frameworks-laravel.html
    ],
    darkMode: ['class', '[data-theme="synthwave"]'],
};
