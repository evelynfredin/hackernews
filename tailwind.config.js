module.exports = {
  purge: [],
  darkMode: "media",
  theme: {
    extend: {
      fontFamily: {
        special: ["Maven Pro, sans-serif"],
        body: ["Source Code Pro, monospace"]
      },
      colors: {
        accent: "#2DCAAD",
        primary: {
          100: "#DFDEE7",
          200: "#C4B9DA",
          300: "#847DB4",
          400: "#092137",
          500: "#123250"
        }
      },
      boxShadow: {
        offset: "3px 3px #000000",
        offsetAlt: "3px 3px #C4B9DA"
      }
    }
  },
  variants: {
    extend: {}
  },
  plugins: []
};
