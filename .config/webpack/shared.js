const { CleanWebpackPlugin } = require( 'clean-webpack-plugin' );
const { externals, helpers } = require( '@humanmade/webpack-helpers' );

const { filePath } = helpers;

const common = {
	externals,
};

const blocks = {
	...common,
	name: 'blocks',
	entry: {
		'blocks-editor': filePath( 'content/mu-plugins/blocks/assets/src/editor.js' ),
		'blocks-frontend': [
			filePath( '.config/webpack/ie11-polyfills.js' ),
			filePath( 'content/mu-plugins/blocks/assets/src/frontend.js' ),
		],
	},
	output: {
		path: filePath( 'content/mu-plugins/blocks/assets/dist/' ),
	},
	plugins: [
		new CleanWebpackPlugin(),
	],
};

const theme = {
	...common,
	name: 'theme',
	entry: {
		'theme': [
			filePath( '.config/webpack/ie11-polyfills.js' ),
			filePath( 'content/themes/skeleton/assets/src/theme.js' ),
		],
		'editor-styles': filePath( 'content/themes/skeleton/assets/src/scss/_editor-styles.scss' ),
	},
	output: {
		path: filePath( 'content/themes/skeleton/assets/dist/' ),
	},
	plugins: [
		new CleanWebpackPlugin(),
	],
};


module.exports = {
	blocks,
	theme,
};
