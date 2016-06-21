var elixir = require('laravel-elixir');


/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Sass
 | file for our application, as well as publishing vendor resources.
 |
 */

elixir(function (mix) {
 mix
 //    .styles([
 //     'public/css/app.css',
 //     'public/css/font-awesome.css',
 //     'public/css/select2.min.css',
 //     'public/css/sweetalert.css',
 //     'public/css/custom.css',
 //     'public/css/socialMediaFontsFamily.css',
 //     'public/css/searchBar.css',
 //    ],'public/css/nationpolls.css','public/css'
 //) .scripts([
 //     'public/js/jquery-1.12.3.min.js',
 //     'public/js/jquery-ui.min.js',
 //     'public/js/bootstrap.min.js',
 //     'public/js/jquery.timer.js',
 //     'public/js/timer.js',
 //     'public/js/moment.js',
 //     'public/js/select2.min.js',
 //     'public/js/sweetalert.min.js',
 //     'public/js/socialIcons.js',
 //     'public/js/fingerprint.js',
 //     'public/js/custom.js',
 //    ],'public/js/nationpolls.js','public/js'
 //).scripts([
 //     'public/js/forCreateAndEditPageOnly.js',
 //    ],'public/js/forCreateAndEditPageOnly.min.js','public/js'
 //)
     .scripts([
         'public/js/barchart.js',
     'public/js/barchartsupport.js',
     'public/js/bar.js',
     ],'public/js/bar.min.js','public/js'
 );
});
