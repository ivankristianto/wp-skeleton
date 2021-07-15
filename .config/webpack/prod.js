/**
 * This file defines the production build configuration
 */
const { CleanWebpackPlugin } = require( 'clean-webpack-plugin' );
const { plugins, presets } = require( '@humanmade/webpack-helpers' );
const configs = require( './shared' );

module.exports = Object.values( configs ).map( config => presets.production( {
	...config,
	output: {
		...config.output,
		filename: '[name]-[contenthash].js',
	},
	plugins: [
		...( config.plugins || [] ),
		new CleanWebpackPlugin(),
		plugins.manifest(),
		plugins.miniCssExtract( {
			filename: '[name]-[contenthash].css',
		} ),
	],
} ) );
