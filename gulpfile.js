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

elixir(function(mix) {
    mix.sass('app.scss');

    mix.scripts([
        'bower_components/jquery/dist/jquery.js',
        'bower_components/bootstrap/dist/js/bootstrap.js',
        'bower_components/vue/dist/vue.js',
        'resources/assets/js/validator.js',
        'resources/assets/js/typeahead.js',
        'resources/assets/js/app.js'],
        'public/assets/js/app.js', './');


    mix.version(['public/assets/js/app.js']);

    mix.copy('bower_components/jquery/dist/jquery.min.map', 'public/js/jquery.min.map');
    mix.copy('bower_components/bootstrap/fonts', 'public/fonts/bootstrap/');


});
