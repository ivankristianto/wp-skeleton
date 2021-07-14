<?php
/**
 * Paths and URLs.
 */

// Define path & url for Content
$root_dir = dirname( __DIR__ );
defined( 'WP_CONTENT_DIR' ) or define( 'WP_CONTENT_DIR', $root_dir . '/content' );
//defined( 'WP_CONTENT_URL' ) or define( 'WP_CONTENT_URL', WP_HOME . '/content' );

unset( $root_dir );
