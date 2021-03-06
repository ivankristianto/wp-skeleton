<?php // phpcs:ignore PSR1.Files.SideEffects.FoundWithSymbols

/**
 * PHPUnit bootstrap file
 */

declare( strict_types = 1 );

require_once dirname( __DIR__ ) . '/../vendor/autoload.php';
require_once '/wp-phpunit/includes/functions.php';

// Define path & url for Content.
defined( 'WP_CONTENT_DIR' ) || define( 'WP_CONTENT_DIR', '/code/content' );

unset( $root_dir );

tests_add_filter( 'muplugins_loaded', function (): void {
	require_once dirname( __DIR__ ) . '/../content/mu-plugins/loader.php';
} );

/**
 * Ensure Stream is installed.
 */
define( 'WP_STREAM_DEV_DEBUG', true );
tests_add_filter( 'plugins_loaded', function (): void {
	if ( function_exists( 'wp_stream_get_instance' ) && wp_stream_get_instance()->install ) {
		wp_stream_get_instance()->install->check();
	}
}, 21 );

require_once '/wp-phpunit/includes/bootstrap.php';
