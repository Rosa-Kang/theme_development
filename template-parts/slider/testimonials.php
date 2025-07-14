<?php
/**
 * Template part for displaying gallery.
 *
 * @package Therosessom_Theme
 */


$subtitle = get_field( 'testimonial_slider_subtitle' );
$title = get_field( 'testimonial_slider_title' );
$testimonials = get_field( 'testimonials' );
?>

<?php if ( $testimonials ) : ?>
<section class="slider-testimonial bg-light-bis py-6">
  <div class="container content-wrapper">
    <div class="columns is-flex-wrap-wrap">
      <div class="column is-full-mobile is-4-tablet" data-aos="fade-right">
        <p class="is-family-primary subtitle mb-2"><?= $subtitle; ?></p>
        <h2><?= $title; ?></h2>
      </div>
      <div class="column is-full-mobile is-7-tablet testimonial-wrapper" data-aos="fade-left">
        <div class="swiper-container testimonialSwiper">
          <ul class="swiper-wrapper list-style-none">
            <?php foreach ( $testimonials as $testimonial ) : setup_postdata( $testimonial ); 
              $citation = get_the_title( $testimonial->ID ); 
            ?>
              <li class="swiper-slide">
                <div class="card is-shadowless">
                  <div class="card-content pt-0 px-0">
                    <?= the_content(); ?>
                    <p class="subtitle mt-6 mb-0"><?= $citation; ?></p>
                  </div>
                </div>
              </li>
            <?php endforeach; 
              wp_reset_postdata(); ?>
          </ul><!-- .swiper-wrapper -->
        </div>
        <div class="swiper-button-next swiper-button-next-dark"></div>
        <div class="swiper-button-prev swiper-button-prev-dark"></div>

      </div><!-- .testimonial-wrapper -->
      <div class="column is-1-desktop"></div>
    </div>
  </div>
</section><!-- .slider-testimonial -->
<?php endif?>