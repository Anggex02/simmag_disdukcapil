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

                background: '#0F172A',

                sidebar: '#134E4A',

                card: '#1E293B',

                bordercolor: '#334155',

                textsecondary: '#CBD5E1',

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

                card: '0 8px 24px rgba(0,0,0,.25)',

            }

        },

    },

    plugins: [forms],

};