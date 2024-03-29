/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
    ],
    theme: {
        extend: {
            colors: {
                "d-green": "#03524C",
                "d-green-100": "#0a625b",
            },
        },
    },
    plugins: [require("@tailwindcss/typography")],
};
