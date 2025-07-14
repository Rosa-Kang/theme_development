<?php
/**
 * Template part for displaying callout - image right.
 *
 * @package Therosessom_Theme
 */

if ( is_archive() ) {
  $post_id = 'option';
} else {
  $post_id = '';
}

$title = get_field( 'callout_image_right_title', $post_id );
$subtitle = get_field( 'callout_image_right_subtitle', $post_id );
$image = get_field( 'callout_image_right_image', $post_id );
$content = get_field( 'callout_image_right_content', $post_id );
$button_label = get_field( 'callout_image_right_button_label', $post_id );
$button_link = get_field( 'callout_image_right_button_link', $post_id );

if ( $image ) {
  $image_url = $image['url'];
  $image_alt = $image['alt'];
}

if ( $button_link ) {
  $link_url = $button_link['url'];
  $link_target = $button_link['target'] ? $button_link['target'] : '_self';
}
?>

<section class="callout-image-right has-background-success">
  <div class="container content-wrapper px-3">

      <div class="columns is-vcentered">
        <div class="column is-full-touch is-5-desktop" data-aos="fade-zoom-in">
          <?php if($image):?>
            <figure class="image is-square mx-0 my-0">
              <img src="<?= esc_url( $image_url ); ?>" alt="<?= esc_attr( $image_alt ); ?>">
            </figure>
          <?php endif;?>
        </div>
        <div class="column is-full-touch is-7-desktop">
          <div class="callout-text-container has-background-primary-light">
            <div class="is-flex is-flex-direction-column">
              <p class="subtitle has-text-success-dark mb-0"><?= $subtitle; ?></p>
              <h2 class="mt-0 mb-2"><?= $title; ?></h2>
              <div class="my-4"><?= $content; ?></div>

              <?php if ( $button_link ) : ?>
                <div class="primary-button mt-4">
                  <a href="<?= esc_url( $link_url ); ?>" target="<?= esc_attr( $link_target ); ?>"><?= esc_html( $button_label ); ?></a>
                </div>
              <?php endif; ?>
            </div>
          </div>
        </div>
      </div>
      
  </div>
</section><!-- .callout-image-right -->