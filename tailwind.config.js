import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    darkMode: 'class',
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Inter', ...defaultTheme.fontFamily.sans],
            },
            colors: {
                slate: {
                    850: '#151e2e',
                },
                emerald: {
                    50: '#f3faf7',
                    100: '#e2f3ec',
                    200: '#c9e8dc',
                    300: '#a3d8c5',
                    400: '#72c1a7',
                    500: '#4da88a',
                    600: '#3b8d72',
                    700: '#30735d',
                    800: '#265b4a',
                    900: '#1f4b3d',
                    950: '#102720',
                },
                green: {
                    50: '#f3faf7',
                    100: '#e2f3ec',
                    200: '#c9e8dc',
                    300: '#a3d8c5',
                    400: '#72c1a7',
                    500: '#4da88a',
                    600: '#3b8d72',
                    700: '#30735d',
                    800: '#265b4a',
                    900: '#1f4b3d',
                    950: '#102720',
                }
            }
        },
    },

    plugins: [forms],
};
