<?php
/**
 * Stream Log
 *
 * @package Skeleton\Stream
 */

namespace Skeleton\Stream;

/**
 * Bootstrapper
 */
function bootstrap() {
	add_action( 'plugins_loaded', __NAMESPACE__ . '\\on_plugins_loaded', 1 );
}

/**
 * Load plugins.
 *
 * @return void
 */
function on_plugins_loaded(): void {
	if ( defined( 'WP_INSTALLING' ) && WP_INSTALLING ) {
		return;
	}

	if ( ! defined( 'WPMU_PLUGIN_DIR' ) ) {
		return;
	}

	add_filter( 'wp_stream_is_network_activated', '__return_true' );

	require_once WPMU_PLUGIN_DIR . '/vendor/stream/stream.php';
}
