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
    screens: {
      'vs' : '340px',
      'xs' : '490px',
      'sm': '640px',
      // => @media (min-width: 640px) { ... }

      'md': '768px',
      // => @media (min-width: 768px) { ... }

      
      'lg': '1024px',
      // => @media (min-width: 1024px) { ... }

      'vlg': '1050px',

      'xl': '1280px',
      // => @media (min-width: 1280px) { ... }

      '2xl': '1536px',
      // => @media (min-width: 1536px) { ... }
    },
  },
    plugins: [
        require('flowbite/plugin')({
            datatables: true,
        }),

    ],
  };
