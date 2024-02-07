import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';
import { nextui } from '@nextui-org/react';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        './resources/js/**/*.jsx',
        "./node_modules/@nextui-org/theme/dist/**/*.{js,ts,jsx,tsx}",
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
            colors: {
                "cantu-blue": "#192761",
                "cantu-blue-transparent": "rgba(25, 39, 97, 0.5)",
                "cantu-blue-transparent-8": "rgba(25, 39, 97, 0.8)",
                "cantu-blue-transparent-9": "rgba(25, 39, 97, 0.9)",
                "cantu-white": "hsl(0, 0%, 97% / 1)",
                "cantu-red": "#c70e01",
                "cantu-red-transparent": "rgba(199, 14, 1, 0.5)",
                "cantu-red-transparent-8": "rgba(199, 14, 1, 0.8)",
                "cantu-red-transparent-9": "rgba(199, 14, 1, 0.9)",
                "black-transparent": "rgba(20, 24, 26, 0.8)",
                "black-transparent-1": "rgba(20, 24, 26, 0.1)",
                "white-transparent": "rgba(246, 246, 246, 0.8)",
                "white-transparent-9": "rgba(246, 246, 246, 0.9)",
            },
        },
    },
    darkMode: "class",
    plugins: [forms, nextui()],
};
