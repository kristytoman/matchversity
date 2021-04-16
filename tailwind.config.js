module.exports = {
  purge: [],
  darkMode: false, // or 'media' or 'class'
  theme: {
    extend: {
      height: theme => ({
        "nav": "theme('height.16')",
        "container": "calc(100vh - 4rem)",
        "screen-3/4": "75vh"
      })
    }
  },
  variants: {
    extend: {},
  },
  plugins: [
    require('@tailwindcss/forms'),
  ],
}
