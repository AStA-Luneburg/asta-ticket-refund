const defaultTheme = require("tailwindcss/defaultTheme");

module.exports = {
    content: [
        "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php",
        "./storage/framework/views/*.php",
        "./resources/views/**/*.blade.php",
        "./lang/**/*.php",
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ["Ubuntu", ...defaultTheme.fontFamily.sans],
            },
            colors: {
                "asta-blue": {
                    50: "#547e9e",
                    100: "#4a7494",
                    200: "#406a8a",
                    300: "#366080",
                    400: "#2c5676",
                    500: "#224c6c",
                    600: "#184262",
                    700: "#0e3858",
                    800: "#042e4e",
                    900: "#002444",
                },
                "asta-red": "#cc2e2f",
            },
        },
    },

    plugins: [require("@tailwindcss/forms")],
};
