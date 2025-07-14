<?php
/**
 * Template part for displaying hero - top.
 *
 * @package Therosessom_Theme
 */

if ( is_archive() ) {
  $post_id = 'option';
} else {
  $post_id = get_queried_object_id();
}

$icon = get_field( 'hero_icon' );
$image = get_the_post_thumbnail( $post_id );
$subtitle = get_field( 'hero_subtitle', $post_id );
$title = get_field( 'hero_title', $post_id );
$page_title = get_the_title( $post_id );
$description = get_field( 'hero_description', $post_id );
$button_label = get_field( 'hero_button_label', $post_id );
$button_link = get_field( 'hero_button_link', $post_id );
$hero_image = get_field( 'hero_image', $post_id );

if ( get_field('hero_background_colour', $post_id) == 'pink' ) {
  $bg = 'has-background-primary-light';
}

if ( get_field('hero_background_colour', $post_id) == 'blue' ) {
  $bg = 'has-background-info-light';
}

if ( get_field('hero_background_colour', $post_id) == 'green' ) {
  $bg = 'has-background-success';
}

if ( get_field('hero_background_colour', $post_id) == 'orange' ) {
  $bg = 'has-background-warning-light';
}

if ( get_field('hero_background_colour', $post_id) == 'yellow' ) {
  $bg = 'has-background-warning';
}

if ( $icon ) {
  $icon_url = $icon['url'];
  $icon_alt = $icon['alt'];
}

if ( $button_link ) {
  $link = $button_link['url'];
  $target = $button_link['target'] ? $button_link['target'] : '_self';
}

if ( $hero_image ) {
  $image_url = $hero_image['url'];
  $image_alt = $hero_image['alt'];
}
?>

<div class="fixed-header"></div>
<section class="hero <?= $bg; ?>">
  <div class="container content-wrapper w-100">
    <div class="columns reverse">
      <div class="column is-7-tablet">
        <div class="seeds-h" data-aos="fade-zoom-in"></div>
        <?php if ( $image || $hero_image ) : ?>
          <figure class="image is-square mx-0 my-0">
            <?php if ( is_archive() ) : ?>
              <img src="<?= esc_url( $image_url ); ?>" alt="<?= esc_attr( $image_alt ); ?>">
            <?php else : ?>
              <?= $image; ?>
            <?php endif; ?>
          </figure>
        <?php endif; ?>
      </div>

      <div class="column is-5-tablet" data-aos="fade-zoom-in">
        <div class="pt-0 mb-5 hero-text-container">
          <?php if ( $icon ) : ?>
            <figure class="image mx-0 my-0 hero-icon">
              <img src="<?= esc_url( $icon_url ); ?>" alt="<?= esc_attr( $icon_alt ); ?>">
            </figure>
          <?php endif; ?>
          <?php if ( $subtitle ) : ?>
            <p class="is-family-primary subtitle mt-5 mb-0"><?= $subtitle; ?></p>
          <?php endif; ?>
          <?php if ( $title ) : ?>
            <h1 class="mt-3 mb-5"><?= $title; ?></h1>
          <?php else : ?>
            <h1 class="mt-3 mb-5"><?= $page_title; ?></h1>
          <?php endif; ?>
          <p class="has-max-width"><?= $description; ?></p>
          <?php if ( $button_link ) : ?>
            <div class="cta-btn-wrapper">
              <a href="<?= esc_url( $link ); ?>" target="<?= esc_attr( $target ); ?>"
                class="button is-dark"><?= esc_html( $button_label ); ?></a>
            </div>
          <?php endif; ?>
        </div>
      </div>
    </div>

  </div>
</section><!-- .hero -->