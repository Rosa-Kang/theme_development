<?php
/**
 * Template Name: FAQ Page
 * 
 * The template for displaying FAQ page.
 *
 * @package Therosessom_Theme
 */
get_header(); ?> 

<?php get_template_part( 'template-parts/hero/hero' ); ?>
<?php get_template_part( 'template-parts/section/intro' ); ?>
<?php get_template_part( 'template-parts/section/accordion-faq' ); ?>
<?php get_template_part( 'template-parts/contact/contact-form-tabs' );?>

<?php get_footer(); ?>