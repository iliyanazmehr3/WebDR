import defaultTheme from 'tailwindcss/defaultTheme';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/**/*.blade.php',
        './resources/**/*.js',
        './resources/**/*.vue',
    ],
    theme: {
        extend: {
            fontFamily: {
                en: ['Figtree', ...defaultTheme.fontFamily.sans],
                fa: ['Vazirmatn', 'Tahoma', ...defaultTheme.fontFamily.sans],
            },
            colors: {
                'brand-light': '#F8FAFC', // Very light gray/slate
                'brand-glass': 'rgba(255, 255, 255, 0.7)',
                'brand-glass-border': 'rgba(255, 255, 255, 0.5)',
                'brand-accent': '#64748B', // Muted slate blue for accents
                'brand-text': '#1E293B',
            },
        },
    },
    plugins: [],
};
