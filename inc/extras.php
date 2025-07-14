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
 * Custom numeric pagination for blogs
 * 
 * @author wpbeginner
 * @link https://www.wpbeginner.com/wp-themes/how-to-add-numeric-pagination-in-your-wordpress-theme/
 * 
 * */ 
function trs_numeric_posts_nav() {
  if( is_singular() )
      return;

  global $wp_query;

  /** Stop execution if there's only 1 page */
  if( $wp_query->max_num_pages <= 1 )
      return;

  $paged = get_query_var( 'paged' ) ? absint( get_query_var( 'paged' ) ) : 1;
  $max   = intval( $wp_query->max_num_pages );

  /** Add current page to the array */
  if ( $paged >= 1 )
      $links[] = $paged;

  /** Add the pages around the current page to the array */
  if ( $paged >= 3 ) {
      $links[] = $paged - 1;
      $links[] = $paged - 2;
  }

  if ( ( $paged + 2 ) <= $max ) {
      $links[] = $paged + 2;
      $links[] = $paged + 1;
  }

  echo '<div class="numeric-pagination content-wrapper has-text-centered"><ul>' . "\n";

  /** Previous Post Link */
  if ( get_previous_posts_link() )
      printf( '<li class="numeric-pagination-links">%s</li>' . "\n", get_previous_posts_link(__( '&lsaquo;', 'textdomain' )) );

  /** Link to first page, plus ellipses if necessary */
  if ( ! in_array( 1, $links ) ) {
      $class = 1 == $paged ? ' class="active"' : '';

      printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( 1 ) ), '1' );

      if ( ! in_array( 2, $links ) )
          echo '<li>…</li>';
  }

  /** Link to current page, plus 2 pages in either direction if necessary */
  sort( $links );
  foreach ( (array) $links as $link ) {
      $class = $paged == $link ? ' class="active"' : '';
      printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( $link ) ), $link );
  }

  /** Link to last page, plus ellipses if necessary */
  if ( ! in_array( $max, $links ) ) {
      if ( ! in_array( $max - 1, $links ) )
          echo '<li>…</li>' . "\n";

      $class = $paged == $max ? ' class="active"' : '';
      printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( $max ) ), $max );
  }

  /** Next Post Link */
  if ( get_next_posts_link() )
      printf( '<li class="numeric-pagination-links">%s</li>' . "\n", get_next_posts_link(__( '&rsaquo;', 'textdomain' )) );

  echo '</ul></div>' . "\n";

}

/**
 * Automatically set the image Title, Alt-Text, Caption 
 * & Description upon Upload 
 */ 
function my_set_image_meta_upon_image_upload( $post_ID ) {
  // Check if uploaded file is an image, else do nothing
  if ( wp_attachment_is_image( $post_ID ) ) {

    $my_image_title = get_post( $post_ID )->post_title;
    // Sanitize the title: remove hyphens, underscores & extra
    // spaces:
    $my_image_title = preg_replace( '%\s*[-_\s]+\s*%', ' ',
    $my_image_title );
    // Sanitize the title: capitalize first letter of every word
    // (other letters lower case):
    // $my_image_title = ucwords( strtolower( $my_image_title ) );
    // Create an array with the image meta (Title, Caption,
    // Description) to be updated
    // Note: comment out the Excerpt/Caption or Content/Description
    // lines if not needed
    $my_image_meta = array(
    // Specify the image (ID) to be updated
    'ID' => $post_ID,
    // Set image Title to sanitized title
    'post_title' => $my_image_title,
    // Set image Caption (Excerpt) to sanitized title
    'post_excerpt' => $my_image_title,
    // Set image Description (Content) to sanitized title
    'post_content' => $my_image_title,
    );

    // Set the image Alt-Text
    update_post_meta( $post_ID, '_wp_attachment_image_alt',
    $my_image_title );
    // Set the image meta (e.g. Title, Excerpt, Content)
    wp_update_post( $my_image_meta );
  }
}
add_action( 'add_attachment', 'my_set_image_meta_upon_image_upload' );

/**
 * Filter the attachment file title for '-' & '_' & replace with ' '.
 */
function custom_file_title( $file_title ){
  $array = array( '-', '_', '.' );
  
  return str_replace($array, ' ', $file_title);
}

/**
 * Clean string and replace special characters and 
 * spaces with single hyphen.
 */ 
function clean( $string ) {
  $string = str_replace(' ', '-', $string); // Replaces all spaces with hyphens.
  $string = preg_replace('/[^A-Za-z0-9\-]/', '', $string); // Removes special chars.

  return preg_replace('/-+/', '-', $string); // Replaces multiple hyphens with single one.
}