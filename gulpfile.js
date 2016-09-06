const elixir = require('laravel-elixir');


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

elixir( function(mix) {
    mix.combine([
    	'./resources/assets/js/common/angular.min.js', 
    	'./resources/assets/js/common/angular-ui-router.min.js',
    	'./resources/assets/js/common/angular-sanitize.min.js',
    	'./resources/assets/js/common/angular-animate.min.js',
    	'./resources/assets/js/common/loading-bar.min.js'
    	], './resources/assets/js/temp.js')
    .scripts([
    	'temp.js', 
    	'common/ng-forms.js',
    	 'app.js',
    	 'controllers.js'
    	 ], 'public/js/admin.js');

    mix.copy('node_modules/bootstrap-less/fonts', 'resources/fonts')
    .copy('node_modules/bootstrap-less/bootstrap', 'resources/assets/less/bootstrap')
    .less('admin.less', 'public/css/admin.css')
    .copy('resources/fonts', 'public/fonts');
});
