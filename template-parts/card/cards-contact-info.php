<?php
/**
 * Template part for displaying contact info cards.
 *
 * @package Therosessom_Theme
 */

$post_id = get_field( 'business_info_id', 'option' );
$title = get_field( 'business_locations_title', $post_id );
$business_locations = get_field( 'business_locations', $post_id );
?>

<section class="cards-contact-info py-5">
  <div class="container content-wrapper pt-0">
    <?php if ( $business_locations ) : ?>
      <h2 class="subtitle mb-0"><?= $title; ?></h2>
      <div class="columns is-flex-wrap-wrap">
        <?php foreach ( $business_locations as $business_location ) : 
          $name = $business_location['name']; 
          $address = $business_location['street_address'];
          $city = $business_location['city'];
          $province = $business_location['province'];
          $postal_code = $business_location['postal_code'];
          $address_link = $business_location['address_link'];
          $phone = $business_location['contact_phone_number'];
          $alt_phone = $business_location['alternative_contact_phone_number'];
          $email = $business_location['contact_email'];
          $hours = $business_location['clinic_hours'];
          $button_link = $business_location['booking_link'];

          if ( $button_link ) {
            $link_url = $button_link['url'];
            $link_target = $button_link['target'] ? $button_link['target'] : '_self';
          }
          ?>
          <div class="column is-4-desktop" data-aos="fade-up">
            <div class="card is-shadowless has-text-centered mb-3">
              <div class="card-content">
                <h2 class="mb-3"><?= $name; ?></h2>
                <p class="mb-0"><a href="<?= $address_link?>" class="has-text-dark"><?= $address . ',  ' . $city . ', ' . $province . '<br> ' . $postal_code; ?></p></a>
                <p class="mb-0"><a href="tel:<?= $phone; ?>" class="has-text-dark"><?= $alt_phone; ?></a></p>
                <p><a href="mailto:<?= $email; ?>" class="has-text-dark"><?= $email; ?></a></p>

                <p class="is-uppercase directions-text"><a href="<?= $address_link?>">Get Directions</p></a>

                <th><p class="is-family-primary subtitle mb-2"><?= $name; ?> Clinic Hours</p></th>
                <?php if ( $hours ) : ?>
                  <table class="mt-1 has-text-left">
                    <?php foreach ( $hours as $hour ) : 
                      $day = $hour['day'];
                      $time = $hour['time'];  
                      ?>
                      <tr>
                        <td><b><?= $day; ?></b></td>
                        <td><?= $time; ?></td>
                      </tr>
                    <?php endforeach; ?>
                  </table>
                <?php endif;?>
                <?php if ( $button_link ) : ?>
                  <a href="<?= esc_url( $link_url ); ?>" target="<?= esc_attr( $link_target ); ?>" class="button is-dark">Book Now</a>
                <?php endif; ?>
                <p class="has-text-primary mice-type mt-2">Book in <?= $name; ?></p>
              </div>
            </div><!-- .card -->
          </div>
        <?php endforeach; ?>
      </div>
    <?php endif; ?>
  </div>
</section>