const mix = require("laravel-mix");
require("laravel-mix-blade-reload");
/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel applications. By default, we are compiling the CSS
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.js("resources/js/app.js", "public/assets/js/soft-ui-dashboard.js")
    .bladeReload({
        path: "resources/views/**/*.blade.php",
        debug: false,
    })
    .postCss("resources/css/app.css", "public/css", [require("tailwindcss")]);
mix.sass(
    "resources/scss/soft-ui-dashboard.scss",
    "public/assets/css/soft-ui-dashboard.css"
);
