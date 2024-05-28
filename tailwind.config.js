/** @type {import('tailwindcss').Config} */
module.exports = {
    content: ["./resources/views/**/*.blade.php", "./resources/js/**/*.vue"], //changed because of @see https://tailwindcss.com/docs/upgrade-guide#configure-content-sources
    // darkMode: false, // or 'media' or 'class' commented because @see https://tailwindcss.com/docs/upgrade-guide#remove-dark-mode-configuration
    theme: {
        extend: {},
    },
    variants: {
        extend: {},
    },
    plugins: [],
};
