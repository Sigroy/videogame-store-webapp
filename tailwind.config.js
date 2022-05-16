module.exports = {
    content: ["./views/**/*.{php,js}"],
    theme: {
        extend: {},
    },
    plugins: [
        require('@tailwindcss/forms')
    ],
}