import defaultTheme from 'tailwindcss/defaultTheme';
const colors = require("tailwindcss/colors");

/** @type {import('tailwindcss').Config} */
export default {
    darkMode: 'class',
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        'node_modules/preline/dist/*.js',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ["Inter", ...defaultTheme.fontFamily.sans],
              },
              colors: {
                primary: colors.blue,
                secondary: colors.slate,
              },
        },
        
    },

    plugins: [
        require("@tailwindcss/typography"),
         require("@tailwindcss/forms")
    ],
};
