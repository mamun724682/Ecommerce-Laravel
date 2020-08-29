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

  mix.js('resources/js/app.js', 'public/js')
 .sass('resources/sass/app.scss', 'public/css');


 // mix.js('resources/js/app.js', 'public/js')
 // .sass('resources/sass/app.scss', 'public/css')
 // .styles([
 // 	'resources/css/style.css',
 // 	'resources/plugins/font-awesome/css/font-awesome.min.css',
 // 	// 'resources/plugins/ps-icon/style.css',
 // 	'resources/plugins/bootstrap/dist/css/bootstrap.min.css',
 // 	'resources/plugins/owl-carousel/assets/owl.carousel.css',
 // 	'resources/plugins/jquery-bar-rating/dist/themes/fontawesome-stars.css',
 // 	'resources/plugins/slick/slick/slick.css',
 // 	'resources/plugins/bootstrap-select/dist/css/bootstrap-select.min.css',
 // 	'resources/plugins/Magnific-Popup/dist/magnific-popup.css',
 // 	'resources/plugins/jquery-ui/jquery-ui.min.css',
 // 	'resources/plugins/revolution/css/settings.css',
 // 	'resources/plugins/revolution/css/layers.css',
 // 	'resources/plugins/revolution/css/navigation.css'
 // 	], 'public/css/frontend.css')
 // .scripts([
 // 	'resources/plugins/jquery/dist/jquery.min.js',
 // 	'resources/plugins/bootstrap/dist/js/bootstrap.min.js',
 // 	'resources/plugins/jquery-bar-rating/dist/jquery.barrating.min.js',
 // 	'resources/plugins/owl-carousel/owl.carousel.min.js',
 // 	'resources/plugins/gmap3.min.js',
 // 	'resources/plugins/imagesloaded.pkgd.js',
 // 	'resources/plugins/isotope.pkgd.min.js',
 // 	'resources/plugins/bootstrap-select/dist/js/bootstrap-select.min.js',
 // 	'resources/plugins/jquery.matchHeight-min.js',
 // 	'resources/plugins/slick/slick/slick.min.js',
 // 	'resources/plugins/elevatezoom/jquery.elevatezoom.js',
 // 	'resources/plugins/Magnific-Popup/dist/jquery.magnific-popup.min.js',
 // 	'resources/plugins/jquery-ui/jquery-ui.min.js',
 // 	'resources/plugins/revolution/js/jquery.themepunch.tools.min.js',
 // 	'resources/plugins/revolution/js/jquery.themepunch.revolution.min.js',
 // 	'resources/plugins/revolution/js/extensions/revolution.extension.video.min.js',
 // 	'resources/plugins/revolution/js/extensions/revolution.extension.slideanims.min.js',
 // 	'resources/plugins/revolution/js/extensions/revolution.extension.layeranimation.min.js',
 // 	'resources/plugins/revolution/js/extensions/revolution.extension.navigation.min.js',
 // 	'resources/plugins/revolution/js/extensions/revolution.extension.parallax.min.js',
 // 	'resources/plugins/revolution/js/extensions/revolution.extension.actions.min.js',
 // 	'resources/js/js/main.js',
 // 	'resources/plugins/revolution/js/extensions/revolution.extension.kenburn.min.js',
 // 	'resources/plugins/revolution/js/extensions/revolution.extension.migration.min.js',
 // 	], 'public/js/frontend.js')
 // .version();
