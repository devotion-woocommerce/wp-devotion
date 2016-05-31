<?php
/**
 * The template for displaying all store location posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package devotion
 */

get_header(); ?>

	<div id="primary" class="content-area location">
		<main id="main" class="site-main" role="main">

		<?php while ( have_posts() ) : the_post(); ?>

			<?php get_template_part( 'template-parts/content', 'location' ); ?>

		<?php endwhile; // End of the loop. ?>

		</main>
	</div>

<?php get_sidebar(); ?>
<?php get_footer(); ?>
