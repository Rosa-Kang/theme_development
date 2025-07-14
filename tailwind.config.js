/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    './**/*.php',
    './js/**/*.js',
    './template-parts/**/*.php',
    './inc/**/*.php'
  ],
  theme: {
    extend: {
      colors: {
        'light': '#ffffff',
        'light-bis': '#FDF7F2',
        'dark': '#231f20',
        'primary': {
          DEFAULT: '#5E5E4A',
          light: '#fef3f1',
          dark: '#846D62',
          invert: '#ffffff'
        },
        'success': {
          DEFAULT: '#D7D7CB',
          dark: '#5E5E4A'
        },
        'info': {
          DEFAULT: '#62bae9',
          light: '#e6f6ff',
          dark: '#aaaaaa'
        },
        'warning': {
          DEFAULT: '#fff8e6',
          light: '#ffeee6',
          invert: '#62bae9'
        },
        'overlay': 'rgba(49, 49, 51, 0.25)'
      },
      fontFamily: {
        'main': ['Lato', 'sans-serif'],
        'accent': ['Cinzel', 'serif'],
        'bold': ['CaliforniaPalms-Script', 'serif'],
        'code': ['Monaco', 'Consolas', 'Andale Mono', 'DejaVu Sans Mono', 'monospace'],
        'pre': ['Courier 10 Pitch', 'Courier', 'monospace']
      },
      spacing: {
        'unit': '1.5rem',
        'unit-xxxl': '6rem',
        'unit-xxl': '4.5rem',
        'unit-xl': '3rem',
        'unit-lg': '2.5rem',
        'unit-s': '1rem',
        'unit-xs': '0.75rem',
        'unit-xxs': '0.5rem'
      },
      maxWidth: {
        'container': '1170px',
        'container-sm': '768px',
        'container-m': '900px'
      },
      height: {
        'mobile-menu': '96px',
        'desktop-menu': '71px',
        'banner-menu': '35px'
      },
      boxShadow: {
        'custom-1': '0px 2px 8px rgba(0, 0, 0, 0.16)',
        'custom-2': '0px 3px 6px rgba(0, 0, 0, 0.16)',
        'custom-3': '0px 3px 4px rgba(0, 0, 0, 0.1)',
        'custom-4': '0px 5px 6px rgba(0, 0, 0, 0.2)',
        'btn': '0px 1px 2px rgba(0, 0, 0, 0.3)',
        'card': '0px 5px 5px 1px rgba(0, 0, 0, 0.1)'
      },
      textShadow: {
        'custom': '0px 3px 1px rgba(65, 64, 66, 0.2)'
      },
      screens: {
        'mobile-320': '320px',
        'mobile-375': '375px',
        'mobile-414': '414px',
        'mobile-667': '667px',
        'mobile-736': '736px',
        'tablet-834': '834px',
        'desktop-1022': '1022px',
        'desktop-1080': '1080px',
        'desktop-1216': '1216px',
        'desktop-1280': '1280px',
        'desktop-1366': '1366px',
        'desktop-1408': '1408px',
        'desktop-1440': '1440px',
        'desktop-1600': '1600px',
        'desktop-1865': '1865px',
        'desktop-1920': '1920px',
        'desktop-2560': '2560px'
      },
      transitionTimingFunction: {
        'custom': 'ease-in-out'
      },
      transitionDuration: {
        'custom': '300ms'
      }
    },
  },
  plugins: [
    require('@tailwindcss/forms'),
    require('@tailwindcss/typography'),
    function({ addUtilities }) {
      const newUtilities = {
        '.text-shadow-custom': {
          textShadow: '0px 3px 1px rgba(65, 64, 66, 0.2)'
        }
      }
      addUtilities(newUtilities)
    }
  ],
}