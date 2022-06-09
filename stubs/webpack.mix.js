const mix = require('laravel-mix');
let glob = require('glob-all');
let path = require('path');
require('laravel-mix-bundle-analyzer');
require('laravel-mix-favicon');
require('laravel-mix-stylelint');

mix.js('resources/js/app.js', 'public/js')
	.vue()
	.sass('resources/sass/app.scss', 'public/css')
	.stylelint({
		fix: true,
		files: ['**/*.scss'],
	})
	.options({
	processCssUrls: false,
	autoprefixer: {
		options: {

		}
	},
});

mix.browserSync({
	proxy: 'https://*|NAME|*.lndo.site'
});

// Only run PurgeCSS during production builds for faster development builds
// and so you still have the full set of utilities available during development.
if (mix.inProduction()) {
	mix.version();
	mix.favicon({
		blade: 'resources/views/partials/_favicon.blade.php',
	});
	mix.bundleAnalyzer();
}
