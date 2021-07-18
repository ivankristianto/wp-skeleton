<?php
/**
 * Main theme functions and boostrapping.
 *
 * @package Skeleton\Theme
 */

namespace Skeleton\Theme;

/**
 * Bootstrap the theme.
 */
function bootstrap(): void {
	add_action( 'after_setup_theme', __NAMESPACE__ . '\\setup_theme_support' );
}

/**
 * Configure theme with `add_theme_support()` options.
 *
 * @link https://developer.wordpress.org/reference/functions/add_theme_support/
 */
function setup_theme_support(): void {
	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/* Enable support for Post Thumbnails on posts and pages. */
	add_theme_support( 'post-thumbnails' );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support(
		'html5',
		[
			'caption',
			'comment-form',
			'comment-list',
			'gallery',
			'search-form',
		]
	);

	/* Enable theme support for custom logo. */
	$logo_defaults = [
		'height'      => 96,
		'width'       => 256,
		'flex-height' => false,
		'flex-width'  => false,
		'header-text' => [ 'site-title' ],
	];
	add_theme_support( 'custom-logo', $logo_defaults );

	/* Block editor - wide and full alignments */
	add_theme_support( 'align-wide' );

	/* Block editor - maintain embed aspect ratios */
	add_theme_support( 'responsive-embeds' );

	/* Block editor - add custom font sizes */
	add_theme_support( 'editor-font-sizes', [
		[
			'name' => __( 'Normal', 'skeleton' ),
			'size' => 16,
			'slug' => 'normal',
		],
		[
			'name' => __( 'Small', 'skeleton' ),
			'size' => 14,
			'slug' => 'small',
		],
		[
			'name' => __( 'Medium', 'skeleton' ),
			'size' => 20,
			'slug' => 'medium',
		],
		[
			'name' => __( 'Large', 'skeleton' ),
			'size' => 28,
			'slug' => 'large',
		],
	] );

	/* Block editor - add color palette. These only relate to button options atm. */
	add_theme_support( 'editor-color-palette', [
		[
			'name'  => __( 'Blue', 'skeleton' ),
			'slug'  => 'primary-blue',
			'color' => '#0473ea',
		],
		[
			'name'  => __( 'White', 'skeleton' ),
			'slug'  => 'color-white',
			'color' => '#FFFFFF',
		],
		[
			'name'  => __( 'Transparent', 'skeleton' ),
			'slug'  => 'reverse',
			'color' => 'transparent',
		],
	] );

	/* AMP */
	add_theme_support( 'amp', [
		'paired'              => true,
		'templates_supported' => [
			'is_singular'                    => true,
			'is_front_page'                  => false,
			'is_home'                        => false,
			'is_archive'                     => false,
			'is_author'                      => false,
			'is_date'                        => false,
			'is_category'                    => false,
			'is_tag'                         => false,
			'is_tax[program]'                => false,
			'is_post_type_archive[gallery]'  => false,
			'is_post_type_archive[pr-times]' => false,
			'is_search'                      => false,
			'is_404'                         => true,
		],
	] );
}

/**
 * Determine whether it is an AMP request.
 *
 * @return boolean
 */
function is_amp() : bool {
	return function_exists( 'is_amp_endpoint' ) && is_amp_endpoint();
}
