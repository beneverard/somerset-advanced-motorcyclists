const mix = require('laravel-mix');
const tailwindcss = require('tailwindcss');

require('laravel-mix-svg-sprite');

// setup
mix.setPublicPath('dist');
mix.version();

// css
mix.sass('src/styles/styles.scss', 'dist/styles');

// js
mix.js('src/scripts/main', 'dist/scripts');
mix.js('src/scripts/svg', 'dist/scripts');

// svg
mix.svgSprite('src/images/icons', 'images/icons.svg');

// options
mix.options({
	processCssUrls: false,
	postCss: [
		tailwindcss('./tailwind.config.js')
	],
});

mix.webpackConfig({
	resolve: {
		modules: [
			'node_modules'
		]
	},
	module: {
		rules: [
			{
				test: /\.scss/,
				enforce: 'pre',
				loader: 'import-glob-loader'
			},
			{
				test: /\.js/,
				enforce: 'pre',
				loader: 'import-glob-loader'
			}
		]
	}
});
