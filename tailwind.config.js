/** @type {import('tailwindcss').Config} */
export default {
    darkMode: 'class',

    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
        "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php",
    ],

    theme: {
        extend: {
            colors: {
                primary: '#005997',
                primaryDark: '#003f5f',
                secondary: '#F37920',
            }
        },
    },

    plugins: [],
}
