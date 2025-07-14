<?php
/**
 * Custom functions that act independently of the theme templates.
 *
 * @package trs_Theme
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function trs_body_classes( $classes ) {
	// Adds a class of group-blog to blogs with more than 1 published author.
	if ( is_multi_author() ) {
		$classes[] = 'group-blog';
	}

	if ( is_singular( 'page' ) ) {
		global $post;
		$classes[] = 'page-' . $post->post_name;
	}

	return $classes;
}
add_filter( 'body_class', 'trs_body_classes' );

/**
 * Filter the except length to # words.
 *
 * @param int $length Excerpt length.
 * @return int (Maybe) modified excerpt length.
 */
function custom_excerpt($limit){
  return wp_trim_words(get_the_excerpt(), $limit);
}

/**
 * Replace [...] after trimmed excerpt
 * */ 
function trs_new_excerpt_more($more) {
  return '...';
}
add_filter('excerpt_more', 'trs_new_excerpt_more', 21 );

/**
 * Clean string and replace special characters and 
 * spaces with single hyphen.
 */ 
function clean( $string ) {
  $string = str_replace(' ', '-', $string); // Replaces all spaces with hyphens.
  $string = preg_replace('/[^A-Za-z0-9\-]/', '', $string); // Removes special chars.

  return preg_replace('/-+/', '-', $string); // Replaces multiple hyphens with single one.
}