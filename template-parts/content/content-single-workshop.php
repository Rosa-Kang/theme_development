<?php
/**
 * Template part for displaying single workshop posts.
 *
 * @package Therosessom_Theme
 */


$date = get_field( 'workshop_date' );
$time = get_field( 'workshop_time' );
$location_label = get_field( 'workshop_location_label' );
$location_link = get_field( 'workshop_location_link' );
$description = get_field( 'workshop_description' );
$goal = get_field( 'workshop_goal' );
$button_label = get_field( 'workshop_button_label' );
$button_link = get_field( 'workshop_button_link' );

if ( $location_link ) {
  $location_link_url = $location_link['url'];
  $location_link_target = $location_link['target'] ? $location_link['target'] : '_self';
}

if ( $button_link ) {
  $link_url = $button_link['url'];
  $link_target = $button_link['target'] ? $button_link['target'] : '_self';
}
?>

<?php get_template_part( 'template-parts/hero/hero' ); ?>
<article id="post-<?php the_ID(); ?>" <?php post_class( 'pt-5' ); ?>>
  <div class="container content-wrapper">
    <p class="is-uppercase has-text-primary mb-2"><?= $date; ?></p>
    <h2 class="mb-5"><?= $time; ?></h2>
    <p class="is-uppercase directions-text"><a href="<?= $location_link_url; ?>" target="<?= $location_link_target; ?>"><?= $location_label; ?></p></a>
    <div class="columns">
      <div class="column">
        <p class="is-family-primary subtitle has-background-primary has-text-light my-3">About</p>
        <?= $description; ?>
      </div>
      <div class="column">
      <p class="is-family-primary has-background-primary has-text-light subtitle my-3">Goals</p>
        <?= $goal; ?>
      </div>
    </div><!-- .columns -->
    <?php if ( $button_link ) : ?>
      <a href="<?= $link_url; ?>" target="<?= $link_target; ?>" class="button is-dark mt-0"><?= $button_label; ?></a>
    <?php else : ?>
      <p class="button disabled">Unavailable</p>
    <?php endif; ?>
  </div>
</article><!-- #post-## -->
