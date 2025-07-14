<?php
/**
 * Template part for displaying callout - image left.
 *
 * @package Therosessom_Theme
 */

$section_title = get_field( 'callout_image_left_section_title');
$title = get_field( 'callout_image_left_title' );
$subtitle = get_field( 'callout_image_left_subtitle' );
$video = get_field('callout_image_left_video');
$image = get_field( 'callout_image_left_image' );
$content = get_field( 'callout_image_left_content' );
$button_label = get_field( 'callout_image_left_button_label' );
$button_link = get_field( 'callout_image_left_button_link' );

if ( $image ) {
  $image_url = $image['url'];
  $image_alt = $image['alt'];
}

if ( $button_link ) {
  $link_url = $button_link['url'];
  $link_target = $button_link['target'] ? $button_link['target'] : '_self';
}
?>

<section class="callout-image-left py-6 has-background-success">
  <div class="container content-wrapper px-3">
    <?php if($section_title):?>
    <div class="section-title has-text-centered mb-6 pb-5">
      <h2 class="is-capitalized"><?= $section_title;?></h2>
    </div>
    <?php endif;?>
    <div class="columns is-vcentered">
      <div class="column is-full-touch is-5-desktop" data-aos="fade-zoom-in">
         <div class="callout-image-left-wrapper">
              <?php if($image):?>
                <div class="image"style="background:url(<?= esc_url( $image_url ); ?>) center / cover no-repeat;" role="img" aria-label="<?= esc_attr( $image_alt ); ?>"></div>
              <?php endif;?>

              <?php if($video):?>
                  <video class="video" src="<?= esc_url( $video ); ?>" playsinline autoplay muted loop></video>
              <?php endif;?>
          </div>
      </div>
      <div class="column is-full-touch is-7-desktop">
        <div class="callout-text-container has-background-primary-light">
          <div class="callout-image-left-content" data-aos="fade-zoom-in">
            <div class="is-flex is-flex-direction-column">
              <p class="subtitle mb-0"><?= $subtitle; ?></p>
              <h3 class="mb-4"><?= $title; ?></h3>
              <div class="my-4">
                <?= $content; ?>
              </div>

              <?php if ( $button_link ) : ?>
                <div class="primary-button mt-4">

                    <a  href="<?= esc_url( $link_url ); ?>" target="<?= esc_attr( $link_target )?>"><?= esc_html( $button_label ); ?></a>

                </div>
              <?php endif;?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section><!-- .callout-image-left -->