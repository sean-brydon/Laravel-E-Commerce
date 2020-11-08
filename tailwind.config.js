module.exports = {
  purge: [
    './resources/views/**/*.blade.php',
    './resources/css/**/*.css',
  ],
  theme: {
    extend: {
        xIndex:{
            '-10':'-10'
        }
    }
  },
  variants: {},
  plugins: [
    require('@tailwindcss/ui'),
  ]
}
