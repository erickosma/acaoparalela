var elixir = require('laravel-elixir');

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Less
 | file for our application, as well as publishing vendor resources.
 |
 */

elixir(function(mix) {
    //  mix.stylesIn("public/css");
    // mix.version("css/all.css");

    var paths = {
        'public': 'public',
        'admin':  'resources/assets/admin',
        'site':  'resources/assets/site',
    };


    //mix.sass('app.scss');

    mix.styles([
        paths.site + "/css/bootstrap.min.css",
        paths.site + "/css/font-awesome.min.css",
        paths.site + "/css/animate.min.css",
        paths.site + "/css/prettyPhoto.css",
        paths.site + "/css/main.css",
        paths.site + "/css/custon.css",
        paths.site + "/css/responsive.css",
    ],paths.public +'/build/css/site.css', './')
        .copy(paths.site+'/fonts', paths.public +'/build/build/fonts')
        .copy(paths.site+'/images', paths.public +'/build/build/images');





    mix.scripts([
        paths.site + "/js/jquery.js",
        paths.site + "/js/bootstrap.min.js",
        paths.site + "/js/jquery.prettyPhoto.js",
        paths.site + "/js/jquery.isotope.min.js",
        paths.site + "/js/main.js",
        paths.site + "/js/wow.min.js",
    ],paths.public +'/build/js/site.js', './');

    /*
    mix.scripts([
        paths.public + "/material/js/ripples.min.js",
        paths.public + "/material/js/material.min.js",
        paths.public + "/js/search.js"
    ],'public/build/js/rodape.js', './');
*/


    mix.version([paths.public +'/build/css/site.css',
       // 'public/build/css/admin.css',
        paths.public +'/build/js/site.js'
       // 'public/build/js/rodape.js'
      //  'public/build/js/admin.js'
    ]);

});

elixir(function(mix) {
    //  mix.phpUnit();
});

