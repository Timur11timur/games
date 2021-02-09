module.exports = {
  purge: [
      './app/**/*.php',
      './resources/**/*.php',
  ],
  darkMode: false, // or 'media' or 'class'
  theme: {
    extend: {
        spacing: {
            '44': '11rem',
        }
    },
  },
  variants: {
    extend: {},
  },
  plugins: [],
}
