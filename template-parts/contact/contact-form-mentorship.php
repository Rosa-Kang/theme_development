<?php
/**
 * Template part for displaying contact form tabs.
 *
 * @package Therosessom_Theme
 */

$title = get_field( 'mentorship_form_title' );
$shortcode = get_field( 'mentorship_form_shortcode' );
?>

<section id="contact" class="contact-form-mentorship pb-5">
  <div class="container-m content-wrapper pt-0">
    <h2><?= $title; ?></h2>
    <?= do_shortcode( $shortcode ); ?>
  </div>
</section><!-- .contact-form-mentorship -->