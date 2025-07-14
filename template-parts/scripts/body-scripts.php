<?php
/**
 * Template part for displaying head elements such as Google Analytics.
 *
 * @package Therosessom_Theme
 */

$body_scripts = get_field( 'body_scripts', 'option' ); 
?>

<?php if( $body_scripts ){ echo $body_scripts; } ?>