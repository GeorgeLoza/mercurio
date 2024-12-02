const colors = require('tailwindcss/colors')
/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./resources/**/*.blade.php",
        './vendor/masmerise/livewire-toaster/resources/views/*.blade.php',  
        "./resources/**/*.js",
        "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php",
        './vendor/masmerise/livewire-toaster/resources/views/*.blade.php',
        './app/Livewire/**/*Table.php',
        './vendor/power-components/livewire-powergrid/resources/views/**/*.php',
        './vendor/power-components/livewire-powergrid/src/Themes/Tailwind.php'
    ],
    darkMode: 'class',
    theme: {
        extend: {
            fontSize: {
                '2xs': '0.625rem', // 10px, más pequeño que xs
                '3xs': '0.5rem',   // 8px, más pequeño que 2xs
            },
            colors: {
                "pg-primary": colors.gray,
            },
            gridTemplateColumns:{
                '14': 'repeat(14, minmax(0, 1fr))',
            },
        },
    },
    plugins: [
        function ({ addUtilities }) {
            const newUtilities = {
                '.scrollbar-hide': {
                    '-ms-overflow-style': 'none', /* IE y Edge */
                    'scrollbar-width': 'none', /* Firefox */
                },
                '.scrollbar-hide::-webkit-scrollbar': {
                    'display': 'none', /* Chrome, Safari y Opera */
                },
            }

            addUtilities(newUtilities, ['responsive'])
        }
    ],
    safelist: [
        'text-red-700',
        'bg-blue-500', 
      ],
}

