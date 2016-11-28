const elixir = require('laravel-elixir');

require('laravel-elixir-vue-2');

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Sass
 | file for your application as well as publishing vendor resources.
 |
 */


elixir(function(mix) {
    mix.scripts([
                 '../../../bower_components/angular/angular.js',
                 '../../../bower_components/moment/moment.js',
                 '../../../bower_components/jquery/dist/jquery.js',
                 '../../../bower_components/bootstrap/dist/js/bootstrap.js',
                 'app.js'], 'public/js/app.js');
});
