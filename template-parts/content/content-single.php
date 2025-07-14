<?php

/**
 * Template part for displaying single posts.
 *
 * @package Therosessom_Theme
 */

$date = get_the_date('F j, Y');
$content = get_post_field('post_content', $post->ID);
$word_count = str_word_count(strip_tags($content));
$time_to_read = ceil($word_count / 200);;
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('py-0'); ?>>
  <div class="container-m content-wrapper pt-0">

    <div class="entry-meta has-text-left">
      <h1 class="mt-3 mb-5"><?php the_title(); ?></h1>
      <p class="has-text-primary is-uppercase mt-5 mb-6"><?php the_author(); ?> | <?php echo $date; ?> |
        <?php echo $time_to_read; ?> minute read</p>
    </div>

    <div class="entry-content">
      <?php the_content(); ?>
    </div><!-- .entry-content -->

  </div>
</article><!-- #post-## -->