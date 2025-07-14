<?php
/**
 * Template part for displaying logo alternative.
 *
 * @package Therosessom_Theme
 */

?>

<?php
$post_id = get_field( 'business_info_id', 'option' ); 
$logo_alt = get_field( 'main_logo_alt', $post_id ); 
?>
<a href="<?= esc_url( home_url() ); ?>" class="logo-alt-wrapper mb-5">
<?php if($logo_alt):?>
  <img src="<?= $logo_alt['url']; ?>" alt="<?= $logo_alt['alt']; ?>" class="no-lazyload">
<?php endif;?>
</a>
