<?php
/**
 * Template part for displaying hero - top.
 *
 * @package Therosessom_Theme
 */

$subtitle = get_field( 'hero_slider_subtitle' );
// $title = get_field( 'hero_slider_title' );
$description = get_field( 'hero_slider_description' );
$button_label = get_field( 'hero_slider_button_label' );
$button_link = get_field( 'hero_slider_button_link' );
$images = get_field( 'hero_slider_images' );

if ( $button_link ) {
  $link_url = $button_link['url'];
  $link_target = $button_link['target'] ? $button_link['target'] : '_self';
}
?>

<div class="fixed-header"></div>
<section class="hero-slider pt-6 pb-4 bg-light-bis">
  <div class="container content-wrapper">

    <div class="columns">
        <div class="column is-6-tablet is-relative">
          <div class="swiper-container heroSwiper">
            <?php if ( $images ) : ?>
              <ul class="swiper-wrapper list-style-none">
                <?php foreach ( $images as $image ) : 
                  $image_url = $image['url'];
                  $image_alt = $image['alt'];
                ?>
                  <li class="swiper-slide" style="background:url(<?= esc_url( $image_url ); ?>) bottom center / cover no-repeat;" role="img" aria-label="<?= esc_attr( $image_alt ); ?>"></li>
                <?php endforeach; ?>
              </ul>
            <?php endif; ?>
          </div>
          <div class="swiper-pagination"></div>
        </div>


        <div class="column is-6-tablet is-flex is-flex-direction-column is-align-items-center is-justify-content-center">
          <h1 class="subtitle"><?= $subtitle;?></h1>
          <p class="description has-text-centered"><?= $description;?></p>

          <div class="primary-button">
            <a  href="<?= esc_url($link_url);?>" target="<?= esc_attr($link_target)?>"><?= esc_html($button_label); ?></a>
          </div>
          <div class="decorative-line mt-6"></div>
        </div>
    </div>

  </div>
</section><!-- .hero -->