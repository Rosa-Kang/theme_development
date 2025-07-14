<?php
/**
 * The home template file.
 *
 * @package Therosessom_Theme
 */

get_header(); ?>

<div id="primary" class="content-area">
  <main id="main" class="site-main" role="main">
    <?php get_template_part('template-parts/hero/hero'); ?>
    <?php if (have_posts()) : ?>
    <?php get_template_part('template-parts/card/cards-blog'); ?>

    <?php else : ?>

    <?php get_template_part('template-parts/content/content', 'none'); ?>

    <?php endif; ?>

  </main><!-- #main -->
</div><!-- #primary -->

<?php get_footer(); ?>