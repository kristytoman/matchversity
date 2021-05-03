module.exports = {
  purge: [],
  darkMode: false, // or 'media' or 'class'
  theme: {
    extend: {
      height: theme => ({
        "nav": "theme('height.16')",
        "container": "calc(100vh - 6rem)",
        "screen-3/4": "75vh",
        "screen-1/2": "50vh"
      }),
      width: theme => ({
        "continent": "15vw",
        "screen-3/5": "60vw",
        "screen-1/4": "25vw",
        "screen-3/4": "75vw"
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
