<?php
/**
 * Template part for displaying instagram feed.
 *
 * @package Therosessom_Theme
 */


$post_id = get_field( 'business_info_id', 'option' );
$title = get_field( 'instagram_title', $post_id );
$link = get_field( 'instagram_url', $post_id );
$shortcode = get_field( 'ig_shortcode', $post_id );
?>

<?php if ( $shortcode ) : ?>
  <section class="ig-feed content-wrapper has-background-success pb-0">
    <div class="container content-wrapper has-text-left pb-0 px-0">
      <h2 class="mb-3 ml-2 mt-3 is-family-primary subtitle"><a href="<?= esc_url($link); ?>" target="_blank"
        rel="noopener noreferrer" class="has-text-light"><?= $title; ?></a></h2>
    </div>
    <div class="container content-wrapper">
      <div class="ig-feed-wrapper">
        <?= do_shortcode( $shortcode ); ?>
      </div>
    </div>
  </section><!-- .ig-feed -->
<?php endif; ?>