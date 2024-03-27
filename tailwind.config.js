/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
    ],
    theme: {
        extend: {
            fontSize: {
                10: "0.625em",
                12: "0.75em",
                13: "0.8125em",
                14: "0.875em",
                15: "0.9375em",
                16: "1em",
                18: "1.125em",
                20: "1.25em",
                22: "1.375em",
                24: "1.5em",
                26: "1.625em",
                28: "1.75em",
                30: "1.875em",
                32: "2em",
                36: "2.25em",
                40: "2.5em",
                48: "3em",
            },
            colors: {
                primary: "#3b82f6",
            },
        },
    },
    daisyui: {
        themes: [],
    },
    plugins: [require("daisyui")],
};