<?php
/**
 * Template part for displaying the contact email.
 *
 * @package Therosessom_Theme
 */

$post_id = get_field('business_info_id', 'option');
$email = get_field('social_email', $post_id);
?>

<p class="contact-email">
  <a href="mailto:<?= $email; ?>" target="_blank" rel="noopener noreferrer">
    <?= $email; ?>
  </a>
</p>

