<?php

/**
 * Template part for displaying cards - team members.
 *
 * @package Therosessom_Theme
 */

$subtitle = get_field( 'recent_posts_subtitle' );
$title = get_field( 'recent_posts_title' );
?>

<section class="cards-recent-posts pt-5 pb-0 has-background-candles">
  <div class="container content-wrapper">
    <div class="has-text-centered">
      <p class="subtitle mb-0"><?= $subtitle; ?></p>
      <h2 class="mb-5" data-aos="fade-right"><?= $title; ?></h2>
    </div>
    <div class="columns is-variable is-7" data-aos="fade-zoom-in" data-aos-delay="500">
      <?php
      $recent_posts = wp_get_recent_posts(array(
        'numberposts' => 3,
        'post_status' => 'publish'
      ));
      foreach ($recent_posts as $post) : setup_postdata($post); ?>
      <article id="post-<?php the_ID(); ?>" class="column is-4-desktop mb-3 ">
        <div class="card p-6">
          
          <div class="card-content py-2 px-0">
            <h3 class="card-title mt-3"><?= wp_trim_words($post['post_title'], 4) ?></h3>
            <p class="has-text-primary is-uppercase mt-2 mb-4"><?= date( 'F j, Y', strtotime($post['post_date']) ); ?></p>
            <p><?= wp_trim_words(get_the_excerpt($post['ID']), 20) ?></p>
            <div class="has-text-left mt-4 mb-0 py-3">
              <a href="<?= get_permalink($post['ID']) ?>" class="is-uppercase">+ Read More</a>
            </div>
          </div>
        </div>
      </article>
      <?php endforeach;
      wp_reset_postdata(); ?>
    </div>
  </div>
</section><!-- .cards-recent-posts -->