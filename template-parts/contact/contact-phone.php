<?php
/**
 * Template part for displaying the contact phone.
 *
 * @package Therosessom_Theme
 */

$post_id = get_field( 'business_info_id', 'option' );
$phone = get_field( 'contact_phone_number', $post_id );
$clean_phone = clean( $phone );
?>

<p class="contact-phone">
  <a href="tel:<?= $clean_phone; ?>">
    <?= $phone; ?>
  </a>
</p>

