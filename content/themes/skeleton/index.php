<?php
/**
 * The main template file.
 *
 * @package Skeleton\Theme
 */

get_header();

if ( have_posts() ) :
	?>
	<main id="content" class="page__main page__main--listing">
		<?php
		do_action( 'skeleton_before_content' );
		?>
		<section class="page__entries">
			<?php
			while ( have_posts() ) :
				the_post();
			endwhile;
			?>
		</section>

		<?php
		do_action( 'skeleton_after_content' );
		?>
	</main>
	<!-- //.page__main -->
<?php else : ?>
	<main id="content" class="page__main page__main--singular">
		<?php get_extended_template_part( 'content/entry', 'none' ); ?>
	</main>
	<!-- //.page__main -->
<?php
endif;

get_footer();
