/** @type {import('tailwindcss').Config} */
module.exports = {

  darkMode: 'class',
    content: [
      "./resources/**/*.blade.php",
      "./resources/**/*.js",
      "./resources/**/*.vue",
      "./node_modules/flowbite/**/*.js"
    ],
     theme: {
    extend: {
      colors: {
        DeepGreen: '#141414',
        CustomGreen: '#2a5157',
        customRed: '#EF4444',
        customYellow: '#F59E0B',
      },
    },
  },
    plugins: [
        require('flowbite/plugin')({
            datatables: true,
        }),

    ],
  };
