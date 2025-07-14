<?php
/**
 * The template for displaying search results pages.
 *
 * @package Therosessom_Theme
 */

get_header(); ?>

  <div class="fixed-header"></div>
	<section id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
      <div class="container content-wrapper">

      <?php echo do_shortcode('[fe_widget]');?>

      <?php if ( have_posts() ) : ?>

        <header class="page-header">
          <h1 class="page-title"><?php printf( esc_html( 'Search Results for: %s' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
        </header><!-- .page-header -->

        <?php /* Start the Loop */ ?>
        <?php while ( have_posts() ) : the_post(); ?>
          <?php get_template_part( 'template-parts/content/content' ); ?>
        <?php endwhile; ?>

        <?php therosessom_numbered_pagination(); ?>

      <?php else : ?>

        <div class="has-text-centered w-100">
        <?php get_template_part( 'template-parts/content/content', 'none' ); ?>
        </div>

      <?php endif; ?>

      </div>
		</main><!-- #main -->
	</section><!-- #primary -->

<?php get_footer(); ?>
