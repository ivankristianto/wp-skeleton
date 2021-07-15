<?php
/**
 * Paths and URLs.
 */

// Define path & url for Content
$root_dir = dirname( __DIR__ );
defined( 'WP_CONTENT_DIR' ) or define( 'WP_CONTENT_DIR', $root_dir . '/content' );

unset( $root_dir );
