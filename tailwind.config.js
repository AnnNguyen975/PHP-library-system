/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./*.php",         // All PHP files in the root directory
    "./**/*.php",      // All PHP files in subdirectories
    "./partials/*.php", // If you have a `partials` folder with PHP files
    "./src/**/*.{html,js,php}" // For all PHP, HTML, or JS files in `src` folder
  ],
  theme: {
    extend: {},
  },
  plugins: [],
}
