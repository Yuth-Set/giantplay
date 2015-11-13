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
    mix.sass('app.scss','resources/css');
    mix.styles([
        'libs/bootstrap.min.css',
        'app.css',
        'css@family=Lato%3A100',
        'libs/select2.min.css'
    ],null,'resources/css');

    mix.scripts([
        'libs/jquery-2.1.4.min.js',
        'libs/select2.min.js',
        'libs/bootstrap.min.js',
        'msgDisplay.js'
      ],null,'resources/js');

    /*mix.less(['app.less','other.less']);*/
    /*mix.coffee(['moduleone.coffee','moduletwo.coffee']);*/
});
