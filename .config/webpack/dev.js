/**
 * This file defines the development build configuration
 */
const { relative } = require( 'path' );
const { helpers, presets } = require( '@humanmade/webpack-helpers' );
const configs = require( './shared' );

const relPath = absolutePath => relative( process.cwd(), absolutePath );

module.exports = helpers.choosePort( 9000 ).then( port => {
	const publicPath = `http://localhost:${ port }/`;

	return Object.values( configs ).map( ( config, index ) => {
		let result = presets.development( {
			...config,
			output: {
				...config.output,
				publicPath: `http://localhost:${ port }/${ relPath( config.output.path ) }/`,
			},
		} );

		if ( index === 0 ) {
			result.devServer.port = port;
			result.devServer.publicPath = publicPath;
		} else {
			delete result.devServer;
		}

		return result;
	} );
} );
