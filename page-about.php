<?php
/**
 * Template Name: About Page
 * 
 * The template for displaying About page.
 *
 * @package Therosessom_Theme
 */
get_header(); ?> 

<?php get_template_part( 'template-parts/hero/hero' ); ?>
<?php get_template_part( 'template-parts/section/intro-wide' ); ?>
<?php get_template_part( 'template-parts/callout/callout-image-right' ); ?>
<?php get_template_part( 'template-parts/card/tri-cards' ); ?>
<?php get_template_part( 'template-parts/callout/callout-image-left' ); ?>
<?php get_template_part( 'template-parts/section/gallery' ); ?>

<?php get_footer(); ?>