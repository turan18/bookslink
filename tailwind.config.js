module.exports = {
  purge: [],
  darkMode: false, // or 'media' or 'class'
  theme: {
    extend: {
        colors: {
            'background-1': '#09003F',
            'light-purple': '#4423CA',
            'overlay': '#190945',
            'search-bg': '#24254A',
            'dash': '#181A62'
        },
        margin: {
          'half':'50%',
        },
        fontFamily:{
            'salsa': ['Salsa', 'cursive'],
            'aleg' : ['Alegreya', 'serif']
        },
        width:{
            'sm-book-w': '128px',
            'sidebar' : '12%',
            'big-sidebar' : '14%',
            'follow-lg' : '38%',
            'review': '30%'

        },
        height:{
            "more-half-view": "51vh",
            "half-view": "50vh",
            "screen/3": "calc(100vh / 3)",
            "screen/4": "calc(100vh / 4)",
            "screen/5": "calc(100vh / 5)",
            "screen/6": "calc(100vh / 6)",
            "screen/7": "calc(100vh / 7)",
            "screen/8": "calc(100vh / 8)",

            "sm-book-h": "198px"
        },
        backgroundImage:{
            'card-split': '-webkit-linear-gradient(30deg, #4423CA 52%, #190945 48%)'
        }
    },
  },
  variants: {
    extend: {},
  },
  plugins: [],
}
