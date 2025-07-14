<?php
/**
 * Template part for displaying logo.
 *
 * @package Therosessom_Theme
 */

?>

<?php
$post_id = get_field( 'business_info_id', 'option' ); 
$logo = get_field( 'main_logo', $post_id ); 

if( $logo ){
  $logo_url = $logo["url"];
  $logo_alt = $logo["alt"];
}
?>
<a href="<?= esc_url( home_url() ); ?>" class="main-logo-wrapper">
<?php if($logo):?>
  <img src="<?= $logo_url; ?>" alt="<?= $logo_alt; ?>" class="no-lazyload">
<?php endif;?>
</a>


