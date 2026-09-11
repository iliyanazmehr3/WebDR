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
                'brand-dark': '#120E24',
                'brand-border': '#362479',
                'brand-pink': '#C21064',
                'brand-purple': '#9A84EB',
            },
        },
    },
    plugins: [],
};
