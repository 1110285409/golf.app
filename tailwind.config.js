import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './resources/**/*.blade.php',
        './resources/**/*.js',
        './resources/**/*.vue',
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
    ],
    
    theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
            colors: {
                'indigo': {
                    600: '#5c6ac4',
                    800: '#202e78',
                },
                'blue': {
                    500: '#007ace',
                    600: '#006fbd',
                },
                'emerald': {
                    500: '#00a651',
                    600: '#008a43',
                },
                'rose': {
                    500: '#ff5a5f',
                    600: '#e04a4f',
                }
            }
        },
    },

    plugins: [forms],
    important: true,
};