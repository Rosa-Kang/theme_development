<?php
/**
 * Template part for displaying footer elements such as Google Analytics.
 *
 * @package Therosessom_Theme
 */

$footer_scripts = get_field( 'footer_scripts', 'option' ); 
?>

<?php if( $footer_scripts ){ echo $footer_scripts; } ?>