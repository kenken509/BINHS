/** @type {import('tailwindcss').Config} */
module.exports = {
  darkMode: 'media',
  content: [
    './storage/framework/views/*.php',
    './resources/views/**/*.blade.php',
    './resources/js/**/*.vue',
    "./node_modules/tw-elements/dist/js/**/*.js",
  ],
  theme: {
    extend: {},
    safelist: ['animate-[slide-right_1s_ease-in-out]'],
    
  },
  
  plugins: [
    require('@tailwindcss/forms'),
    require("tw-elements/dist/plugin"),
    require('flowbite/plugin')

  ],
  variants: {
    outline: ["focus"],
  },
}

