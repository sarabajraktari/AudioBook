module.exports = {

  purge: [
    './resources/views/**/*.blade.php',
    './resources/css/**/*.css',
  ],
  theme: {
    extend: {}
  },
  theme: {

  },
  variants: {
     scrollbar: ['dark'],
     scrollbar: ['rounded'],

  },
  plugins: [

    require('@tailwindcss/aspect-ratio'),
    require('tailwind-scrollbar'),
  ]

}
