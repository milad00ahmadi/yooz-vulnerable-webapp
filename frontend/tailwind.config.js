module.exports = {
  purge: ['./src/**/*.html', './src/**/*.ts'],
  darkMode: false, // or 'media' or 'class'
  theme: {
    extend: {
      boxShadow: {
        xl: '0 10px 20px rgba(0,0,0,0.05)'
      },
      borderRadius:{
        '4xl': '2rem'
      }
    },
  },
  variants: {
    extend: {},
  },
  plugins: [],
}
