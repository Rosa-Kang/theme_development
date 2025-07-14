<?php
/**
 * The main template file.
 *
 * @package Therosessom_Theme
 */
get_header(); ?> 

<?php get_template_part( 'template-parts/hero/hero' ); ?>
<?php get_template_part( 'template-parts/callout/callout-image-left' ); ?>
<?php get_template_part( 'template-parts/callout/callout-image-right' ); ?>
<?php get_template_part( 'template-parts/slider/best-sellers' ); ?>
<?php get_template_part( 'template-parts/card/cards-recent-posts' ); ?>
<?php get_template_part( 'template-parts/slider/testimonials' ); ?>
<?php get_template_part( 'template-parts/section/ig-feed' ); ?>

<?php get_footer(); ?>