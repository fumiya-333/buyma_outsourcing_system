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

mix.js('resources/js/page/studys/detail.js', 'public/js/page/studys')
    .sass('resources/sass/page/auths/_auths.scss', 'public/css/page/auths')
    .sass('resources/sass/page/studys/_studys.scss', 'public/css/page/studys')
    .sass('resources/sass/_style.scss', 'public/css');


mix.webpackConfig({
  resolve: {
    alias: {
      vue$: "vue/dist/vue.esm.js"
    }
  }
});
