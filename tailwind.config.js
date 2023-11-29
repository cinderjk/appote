/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
        "./node_modules/flowbite/**/*.js"
    ],
    theme: {
        extend: {
            colors: {
                blue: {
                  // we're replacing the default blue color with a custom one
                  // to generate these shades, use the following tool:
                  // https://uicolors.app/create
                  // then select export -> copy code -> paste here
                  // not endorsed by me, but it really helps

                  '50': '#f0f7fe',
                  '100': '#dcebfd',
                  '200': '#c1defc',
                  '300': '#97c9f9',
                  '400': '#66acf4',
                  '500': '#428cef',
                  '600': '#2c6ee4',
                  '700': '#2254c5',
                  '800': '#2349aa',
                  '900': '#224086',
                  '950': '#192952',
                },
            },
        },
    },
    plugins: [
        require('flowbite/plugin')
    ],
    darkMode: 'class',
}
