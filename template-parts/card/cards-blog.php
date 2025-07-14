<?php
/**
 * Template part for displaying cards - Blog Posts.
 *
 * @package Therosessom_Theme
 */

?>

<section class="cards-blog py-5">
  <div class="container content-wrapper">
    <div class="columns is-tablet is-multiline is-variable is-7">
      <?php
      $args = array(
        'post_type' => 'post',
        'posts_per_page' => '-1',
        'orderby' => 'post_date',
      );
      $posts = get_posts($args); ?>
      <?php
      foreach ($posts as $post) : setup_postdata($post);
        $title = get_the_title();
        $content = wp_trim_words(get_the_content(), 30);
        $date = get_the_date( 'F j, Y' ); 

        $image = get_the_post_thumbnail();
      ?>
      <article id="post-<?php the_ID(); ?>" class="column is-full is-6-tablet is-4-desktop mt-5" data-aos="fade-up">
        <div class="card is-shadowless">
          <figure class="image is-square mx-0 my-0">
            <?php echo $image ?>
          </figure>
          <div class="card-content pt-2 px-0">
            <h3 class="card-title mt-3"><?php echo $title ?></h3>
            <p class="has-text-primary is-uppercase mt-2 mb-4"><?php echo $date; ?></p>
            <p><?php echo $content ?></p>
            <div class="has-text-left mt-4 mb-0 py-3">
              <a href="<?php echo get_permalink(); ?>" class="is-uppercase">+ Read More</a>
            </div>
          </div>
        </div>
      </article>
      <?php endforeach;
      wp_reset_postdata(); ?>
    </div>

  </div>
</section><!-- .cards-recent-posts -->