const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.js('resources/js/app.js', 'public/js/').vue({ version: 2 })
    .sass('resources/sass/views/auths/_auths.scss', 'public/css/views/auths')
    .sass('resources/sass/views/tops/_tops.scss', 'public/css/views/tops')
    .sass('resources/sass/_style.scss', 'public/css');


mix.webpackConfig({
  resolve: {
    alias: {
      vue$: "vue/dist/vue.esm.js"
    }
  }
});
