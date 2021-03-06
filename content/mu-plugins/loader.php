<?php
/**
 * Loader.
 *
 * @package Skeleton
 */

if ( defined( 'WP_INITIAL_INSTALL' ) && WP_INITIAL_INSTALL ) {
	return;
}
/**
 * Load mu-plugins here.
 */
$mu_plugins = [
	'vendor/asset-loader/asset-loader.php',
	'vendor/amp/amp.php',
	'vendor/google-site-kit/google-site-kit.php',
	'vendor/user-switching/user-switching.php',
	'vendor/query-monitor/query-monitor.php',
	'vendor/wp-redis/wp-redis.php',
	'blocks/load.php',
	'stream/load.php',
];

foreach ( $mu_plugins as $file ) {
	require_once WPMU_PLUGIN_DIR . '/' . $file;
}

unset( $file );

add_action( 'pre_current_active_plugins', function () use ( $mu_plugins ) {
	global $plugins, $wp_list_table;

	// Add our own mu-plugins to the page.
	foreach ( $mu_plugins as $plugin_file ) {
		// Do not apply markup/translate as it'll be cached.
		$plugin_data = get_plugin_data( WPMU_PLUGIN_DIR . "/$plugin_file", false, false );
		if ( empty( $plugin_data['Name'] ) ) {
			$plugin_data['Name'] = $plugin_file;
		}
		$plugins['mustuse'][ $plugin_file ] = $plugin_data;
	}

	// Recount totals.
	$GLOBALS['totals']['mustuse'] = count( $plugins['mustuse'] );

	// Only apply the rest if we're actually looking at the page.
	if ( $GLOBALS['status'] !== 'mustuse' ) {
		return;
	}

	// Reset the list table's data.
	$wp_list_table->items = $plugins['mustuse'];
	foreach ( $wp_list_table->items as $plugin_file => $plugin_data ) {
		$wp_list_table->items[ $plugin_file ] = _get_plugin_data_markup_translate( $plugin_file, $plugin_data, false, true );
	}

	$total_this_page = $GLOBALS['totals']['mustuse'];

	if ( $GLOBALS['orderby'] ) {
		uasort( $wp_list_table->items, [ $wp_list_table, '_order_callback' ] );
	}
	// Force showing all plugins.
	// See https://core.trac.wordpress.org/ticket/27110.
	$plugins_per_page = $total_this_page;
	$wp_list_table->set_pagination_args( [
		'total_items' => $total_this_page,
		'per_page'    => $plugins_per_page,
	] );
} );

add_filter( 'network_admin_plugin_action_links', function ( $actions, $plugin_file, $plugin_data, $context ) use ( $mu_plugins ) {

	if ( $context !== 'mustuse' || ! in_array( $plugin_file, $mu_plugins, true ) ) {
		return $actions;
	}
	$actions[] = sprintf( '<span style="color:#333">File: <code>%s</code></span>', $plugin_file );

	return $actions;
}, 10, 4 );
