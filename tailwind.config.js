const defaultTheme = require('tailwindcss/defaultTheme');

module.exports = {
    darkMode: 'class',
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './vendor/laravel/jetstream/**/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        './resources/js/**/*.vue',
    ],
    theme: {
        screens: {
            'xs': '320px',
            // => @media (min-width: 320px) { ... }

            'sm': '640px',
            // => @media (min-width: 640px) { ... }

            'md': '768px',
            // => @media (min-width: 768px) { ... }

            'lg': '1024px',
            // => @media (min-width: 1024px) { ... }

            'xl': '1280px',
            // => @media (min-width: 1280px) { ... }

            '2xl': '1536px',
            // => @media (min-width: 1536px) { ... }
        },
        extend: {
            backgroundImage: {
                'logotype-light': "url('./Images/logotype/logotipo-aprova-jobs-dark-light.svg')",
                'logotype-dark': "url('./Images/logotype/logotipo-aprova-jobs-dark-mode.svg')",
            },
            fontFamily: {
                sans: ['Poppins', ...defaultTheme.fontFamily.sans],
            },
            colors: {
                'primary': '#10B981',
                'dark': '#27272A',
                'dark2': '#202020',
                'light': '#F5F5F5',
                'light2': '#E9E9E9',
                'danger': '#F87171',
                'warning': '#E5BD38',
                'info': '#71BFF8',
                'secondary': '#6FF4C8',
                'line-border': '#999999',
            },
            animation: {
                'float': 'float 4s ease-in-out infinite',
            },
            keyframes: {
                float: {
                    '0%, 100%': { transform: 'translatey(0px)' },
                    '50%': { transform: 'translatey(-15px)' },
                }
            }
        },
    },

    plugins: [require('@tailwindcss/forms'), require('@tailwindcss/typography')],
};
