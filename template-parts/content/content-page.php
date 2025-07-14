<?php
/**
 * Template part for displaying page content in page.php.
 *
 * @package Therosessom_Theme
 */

?>

<div class="fixed-header"></div>
<article id="post-<?php the_ID(); ?>" <?php post_class('m-auto'); ?>>
  <div class="container content-wrapper">
    <header class="entry-header">
      <?php the_title( '<h1 class="entry-title has-text-centered has-text-dark text-shadow-none">', '</h1>' ); ?>
    </header><!-- .entry-header -->

    <div class="entry-content has-text-left">
      <?php the_content(); ?>
      <?php
        wp_link_pages( array(
          'before' => '<div class="page-links">' . esc_html( 'Pages:' ),
          'after'  => '</div>',
        ) );
      ?>
    </div><!-- .entry-content -->
  </div>
</article><!-- #post-## -->
