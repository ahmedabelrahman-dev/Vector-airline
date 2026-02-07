import defaultTheme from "tailwindcss/defaultTheme";
import forms from "@tailwindcss/forms";
import typography from "@tailwindcss/typography";

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php",
        "./vendor/laravel/jetstream/**/*.blade.php",
        "./storage/framework/views/*.php",
        "./resources/views/**/*.blade.php",
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ["Inter", ...defaultTheme.fontFamily.sans],
                display: ["Playfair Display", ...defaultTheme.fontFamily.serif],
            },
            colors: {
                base: "#0F172A", // Deep Space Navy
                primary: "#0EA5E9", // Sky Blue
                highlight: "#F59E0B", // Amber Gold
                accent: "#0EA5E9", // Sky Blue (alias)
                warning: "#F59E0B", // Amber Gold (alias)
            },
        },
    },

    plugins: [forms, typography],
};
