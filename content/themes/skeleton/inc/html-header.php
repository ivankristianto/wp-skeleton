<?php
/**
 * HTML Header settings.
 *
 * @package Skeleton\Theme
 */

namespace Skeleton\Theme\HTML_Header;

use Asset_Loader;
use Skeleton\Theme;

/**
 * Bootstrap the HTML Header.
 */
function bootstrap(): void {
	add_action( 'wp_head', __NAMESPACE__ . '\\site_icon' );
	add_action( 'admin_head', __NAMESPACE__ . '\\site_icon' );
	add_action( 'wp_enqueue_scripts', __NAMESPACE__ . '\\enqueue_assets' );

	// Runs early to ensure JavaScript is detected before styles load.
	add_action( 'wp_head', __NAMESPACE__ . '\\print_nojs_to_js_script', 5 );
}

/**
 * Enqueue JavaScript and CSS assets.
 */
function enqueue_assets(): void {
	Asset_Loader\enqueue_asset(
		get_template_directory() . '/assets/dist/asset-manifest.json',
		'theme.js',
		[
			'handle' => 'skeleton-theme',
		]
	);
	Asset_Loader\enqueue_asset(
		get_template_directory() . '/assets/dist/asset-manifest.json',
		'theme.css',
		[
			'dependencies' => [ 'wp-block-library' ],
			'handle'       => 'skeleton-theme',
		]
	);

	wp_localize_script( 'skeleton-theme', 'skeletonThemeConfig', [
		'customKey'    => 'Add Custom Key Here',
	] );
}

/**
 * Switch html.no-js to html.js.
 */
function print_nojs_to_js_script(): void {
	if ( Theme\is_amp() ) {
		return;
	}
	?>
	<script>
		(function(c){c.add('js');c.remove('no-js')})(document.documentElement.classList)
	</script>
	<?php
}


/**
 * Output site icon in all formats.
 *
 * @return string
 */
function site_icon(): string {
	return printf(
		'<link rel="apple-touch-icon" sizes="180x180" href="%1$s">
		<link rel="icon" type="image/png" sizes="32x32" href="%2$s">
		<link rel="icon" type="image/png" sizes="16x16" href="%3$s">
		<link rel="manifest" href="%4$s">
		<link rel="mask-icon" href="%5$s" color="#5bbad5">
		<meta name="msapplication-TileColor" content="#da532c">
		<meta name="theme-color" content="#ffffff">',
		esc_url( get_template_directory_uri() . '/assets/src/images/site-icons/apple-touch-icon.png' ),
		esc_url( get_template_directory_uri() . '/assets/src/images/site-icons/favicon-32x32.png' ),
		esc_url( get_template_directory_uri() . '/assets/src/images/site-icons/favicon-16x16.png' ),
		esc_url( get_template_directory_uri() . '/assets/src/images/site-icons/site.webmanifest' ),
		esc_url( get_template_directory_uri() . '/assets/src/images/site-icons/safari-pinned-tab.svg' )
	);
}
