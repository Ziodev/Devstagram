/** @type {import('tailwindcss').Config} */
export default {
  content: [
      "./resources/views/**/*.blade.php",
      "./resources/views/**/*.blade.js",
      "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php",
  ],
  theme: {
    extend: {},
  },
  plugins: [],
}

