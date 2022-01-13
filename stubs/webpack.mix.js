const mix = require('laravel-mix');
let glob = require("glob-all");
let PurgecssPlugin = require("purgecss-webpack-plugin");
let path = require('path');
require('laravel-mix-bundle-analyzer');
require('laravel-mix-favicon');
require('laravel-mix-stylelint');

class PurgeCssExtractor {
	static extract(content) {
		return content.match(/[A-Za-z0-9-_:\/]+/g) || [];
	}
}

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
	mix.favicon();
	mix.bundleAnalyzer();

	/*mix.webpackConfig({
		plugins: [
			new PurgecssPlugin({

				// Specify the locations of any files you want to scan for class names.
				paths: glob.sync([
					path.join(__dirname, "public/*.php"),
					path.join(__dirname, "resources/views/**/*.blade.php"),
					path.join(__dirname, "resources/js/**/*.vue")
				]),
				extractors: [
					{
						extractor: PurgeCssExtractor,

						// Specify the file extensions to include when scanning for
						// class names.
						extensions: ["html", "js", "php", "vue"]
					}
				],
				whitelistPatternsChildren: []
			})
		]
<<<<<<< HEAD
	});

=======
	});*/

>>>>>>> 12c98fd6d9387546b1f40b7e19a20c24d5ec0866
	let date = new Date();
	console.log('Release version: ' + date.getFullYear() + '-' + pad(date.getMonth()) + '-' + pad(date.getDay()) + '-' + pad(date.getUTCHours()) + '-' + pad(date.getUTCMinutes()));
}

function pad(n){return n<10 ? '0'+n : n}
