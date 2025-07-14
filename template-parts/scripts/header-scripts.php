<?php
/**
 * Template part for displaying head elements such as Google Analytics.
 *
 * @package Therosessom_Theme
 */

$header_scripts = get_field( 'header_scripts', 'option' ); 

if( $header_scripts ){ echo $header_scripts; } ?>