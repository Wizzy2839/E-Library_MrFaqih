import defaultTheme from 'tailwindcss/defaultTheme';

/** @type {import('tailwindcss').Config} */
export default {
    // Matikan dark mode otomatis dari sistem operasi
    darkMode: 'class', 
    
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Inter', ...defaultTheme.fontFamily.sans],
            },
        },
    },

    plugins: [
        require('@tailwindcss/forms'),
        require('daisyui'),
    ],

    daisyui: {
        themes: [
            {
                industrial: {
                    "primary": "#2563EB",   // Biru Royal
                    "secondary": "#FACC15", // Kuning
                    "accent": "#000000",    // Hitam Pekat (Border)
                    "neutral": "#FFFFFF",   // Putih (Card)
                    "base-100": "#FFFFFF",  // <--- INI KUNCINYA (Background Putih Mutlak)
                    "base-200": "#F3F4F6",  // Abu-abu sangat muda (untuk selingan)
                    "base-content": "#000000", // Teks Hitam
                    "info": "#3ABFF8",
                    "success": "#22C55E",
                    "warning": "#FBBD23",
                    "error": "#DC2626",
                },
            },
        ],
        // Paksa tema ini jadi default
        darkTheme: "industrial", 
        base: true,
        styled: true,
        utils: true,
    },
};