<?php
/**
 * The template for displaying all single workshop posts.
 *
 * @package Therosessom_Theme
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

		<?php while ( have_posts() ) : the_post(); ?>

			<?php get_template_part( 'template-parts/content/content', 'single-workshop' ); ?>

    <?php endwhile; // End of the loop. ?>
    
		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer(); ?>
