/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        './resources/js/**/*.js',
    ],
    theme: {
        extend: {
            fontFamily: {
                sans: ['Inter', 'ui-sans-serif', 'system-ui', 'sans-serif'],
            },
            colors: {
                'forest-green': '#1E3A2B',
                'lime-accent':  '#A3E635',
                'warm-bg':      '#F8F9FA',
                'charcoal':     '#111827',
                'muted':        '#4B5563',
            },
        },
    },
    plugins: [],
};
