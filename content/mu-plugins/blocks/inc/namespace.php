<?php

namespace Skeleton\Blocks;

use Asset_Loader;

/**
 * Bootstrapper
 */
function bootstrap() {
	add_action( 'enqueue_block_editor_assets', __NAMESPACE__ . '\\enqueue_editor_assets' );
	add_action( 'wp_enqueue_scripts', __NAMESPACE__ . '\\enqueue_frontend_assets' );
}

/**
 * Get plugins' path
 *
 * @return string Plugin's absolute directory path.
 */
function get_plugin_path(): string {
	return dirname( __DIR__ );
}

/**
 * Get plugin's URL
 *
 * @return string Plugin's absolute URL path.
 */
function get_plugin_url(): string {
	$plugin_path = get_plugin_path();

	return plugins_url( null, "{$plugin_path}/plugin.php" );
}

/**
 * Enqueue editor assets
 */
function enqueue_editor_assets(): void {
	Asset_Loader\enqueue_asset(
		dirname( __DIR__ ) . '/assets/dist/asset-manifest.json',
		'blocks-editor.js',
		[
			'handle' => 'skeleton-blocks-editor',
			'dependencies' => [
				'wp-blocks',
				'wp-compose',
				'wp-components',
				'wp-editor',
				'wp-hooks',
				'wp-i18n',
			],
		]
	);
	Asset_Loader\enqueue_asset(
		dirname( __DIR__ ) . '/assets/dist/asset-manifest.json',
		'blocks-editor.css',
		[
			'dependencies' => [ 'wp-block-editor' ],
			'handle' => 'skeleton-blocks-editor',
		]
	);
}

/**
 * Enqueue frontend assets
 */
function enqueue_frontend_assets(): void {
	Asset_Loader\enqueue_asset(
		dirname( __DIR__ ) . '/assets/dist/asset-manifest.json',
		'blocks-frontend.js',
		[
			'handle' => 'skeleton-blocks-frontend-script',
			'dependencies' => [
				'wp-dom-ready',
			],
		]
	);
}
