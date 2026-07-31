import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {

    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {

        extend: {

            colors: {

                primary: '#14B8A6',
                'primary-hover': '#0D9488',

                background: '#fefdfd',

                sidebar: '#134E4A',

                card: '#134E4A',

                bordercolor: '#010101',

                textsecondary: '#f8f5f5',

                success: '#22C55E',

                warning: '#F59E0B',

                danger: '#EF4444',

            },

            fontFamily: {

                sans: ['Poppins', ...defaultTheme.fontFamily.sans],

            },

            borderRadius: {

                xl2: '18px',

            },

            boxShadow: {

                card: '0 8px 24px rgb(0, 0, 0)',

            }

        },

    },

    plugins: [forms],

};