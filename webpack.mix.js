let mix = require('laravel-mix');

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

// mix.js('resources/assets/js/app.js', 'public/js')
//    .sass('resources/assets/sass/app.scss', 'public/css');


   //npm run dev {movefile}
   //npm run production {chay tren moi trg product}
   //npm run watch  {build lai nhung thay doi}

   // mix.styles([
//     'resources/assets/sass/app.scss',
//     'resources/assets/sass/main.scss'   // gop 2 filr thsnhg 1. chi file css

// ], 'public/css/all.css');


//    mix.babel('resources/assets/sass/app.scss','public/css/babel.css'); //copy


//    mix.js('resources/assets/js/app.js', 'public/js');

// if (mix.inProduction()) {
//     mix.version();
// }


//admin template

mix.babel('resources/assets/AdminLTE/dist/css/adminlte.css','public/admin/css/adminlte.css');
mix.js('resources/assets/AdminLTE/dist/js/adminlte.css','public/admin/js/adminlte.js');

