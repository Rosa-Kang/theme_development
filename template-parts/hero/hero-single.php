<?php
/**
 * Template part for displaying hero for single post- top.
 *
 * @package Therosessom_Theme
 */

?>

<div class="fixed-header"></div>
<section class="hero-single has-background-primary-light">
  <div class="container-m content-wrapper">
    <div class="seeds-m"></div>
    <?php if (has_post_thumbnail()) : ?>
      <figure class="image is-3by2">
        <?php the_post_thumbnail('full') ?>
      </figure>
    <?php endif; ?>
  </div>
</section><!-- .hero -->