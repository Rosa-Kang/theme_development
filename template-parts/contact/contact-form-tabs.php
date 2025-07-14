<?php
/**
 * Template part for displaying contact form tabs.
 *
 * @package Therosessom_Theme
 */

$post_id = get_field( 'business_info_id', 'option' );
$title = get_field( 'contact_forms_tabs_title', $post_id );
$tabs = get_field( 'business_locations', $post_id );
?>

<section id="contact" class="contact-form-tabs has-background-primary-light py-5">
  <div class="container content-wrapper">
    <div class="seeds-lg-r" data-aos="fade-zoom-in"></div>
    <h2 class="mb-4"><?= $title; ?></h2>
    <div class="tabs-container">
      <div class="columns is-flex-wrap-wrap">
        <div class="tabs column is-full mb-0 list-container">
          <ul class="columns is-flex-direction-row is-flex-wrap-wrap list-style-none">
            <?php if ( $tabs ) : 
              $i = 1;  
              ?>
              <?php foreach ( $tabs as $tab ) : 
                $name = $tab['name'];
                ?>
                <li data-tab="<?= $i++; ?>" class="column">
                  <a class="px-0 py-0">
                    <p class="tab-title button is-dark my-0">Contact <?= $name; ?></p>
                  </a>
                </li>
              <?php endforeach; ?>
            <?php endif; ?>
          </ul>
        </div><!-- .tabs -->
        <div class="tabs-content column">
          <ul class="list-style-none">
            <?php if ( $tabs ) : 
              $i = 1;
              ?>
              <?php foreach ( $tabs as $tab ) : 
                $description = $tab['contact_form_description'];
                $form = $tab['contact_form_shortcode'];
                $name = $tab['name'];
                $address = $tab['street_address'];
                $city = $tab['city'];
                $province = $tab['province'];
                $postal_code = $tab['postal_code'];
                $address_link = $tab['address_link'];
                $phone = $tab['contact_phone_number'];
                $email = $tab['contact_email'];
                $hours = $tab['clinic_hours'];
                ?>
                <li data-content="<?= $i++; ?>">
                  <div class="columns is-variable is-7">
                    <div class="column is-half-tablet form-wrapper">
                      <h3><?= $description; ?></h3>
                      <?= do_shortcode($form); ?>
                    </div>
                    <div class="column">
                      <h3 class="mb-3"><?= $name; ?></h3>
                      <p class="mb-0"><a href="tel:<?= $phone; ?>" class="has-text-dark"><?= $phone; ?></a></p>
                      <p class="mb-0"><a href="mailto:<?= $email; ?>" class="has-text-dark"><?= $email; ?></a></p>
                      <p class="mb-0"><a href="<?= esc_url( $address_link ); ?>" class="has-text-dark"><?= $address . ',  ' . $city . ', ' . $province; ?></a></p>

                      <?php if ( $hours ) : ?>
                        <table class="mt-5">
                          <?php foreach ( $hours as $hour ) : 
                            $day = $hour['day'];
                            $time = $hour['time'];  
                            ?>
                            <tr>
                              <td><?= $day; ?></td>
                              <td><?= $time; ?></td>
                            </tr>
                          <?php endforeach; ?>
                        </table>
                      <?php endif;?>
                    </div>
                  </div>
                </li>

              <?php endforeach; ?>
            <?php endif; ?>
          </ul>
        </div><!-- .tabs-content -->
      </div>
    </div><!-- .tabs-container -->
  </div>
</section><!-- .contact-form-tabs -->
