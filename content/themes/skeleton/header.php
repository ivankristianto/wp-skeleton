<?php
/**
 * The global header.
 *
 * @package Skeleton\Theme
 */

use Skeleton\Theme;

?>

<!DOCTYPE html>
<html <?php Theme\is_amp() ? '' : language_attributes(); ?> class="no-js">

<head>
	<meta charset="<?php echo esc_attr( get_bloginfo( 'charset' ) ); ?>">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<?php do_action( 'skeleton_after_body' ); ?>
	<a href="#content" class="screen-reader-text"><?php esc_html_e( 'Skip to content', 'skeleton' ); ?></a>

	<header class="page__header header">
		Header here
	</header>
