<?php
/**
 * Template part for displaying posts.
 *
 * @package Therosessom_Theme
 */

?>

<?php  
$image = wp_get_attachment_url( get_post_thumbnail_id( get_option( 'page' ) ) );
$image_id = get_post_thumbnail_id( get_the_ID() );
$image_alt = get_post_meta( $image_id , '_wp_attachment_image_alt', true );
$title = get_the_title();
$post_id = get_the_id();          

$name = get_the_title( $post_id ); 
$link = strtolower( str_replace(" ", "-", $name) );
$title = get_field( 'team_member_title', $post_id );
$pronouns = get_field( 'team_member_pronouns', $post_id );
$location = get_field( 'team_member_location', $post_id );
$highlights = get_field( 'team_member_highlights', $post_id );
$booking_link = get_field( 'team_member_booking_link', $post_id );

if ( $booking_link ) {
  $link_url = $booking_link['url'];
  $link_target = $booking_link['target'] ? $booking_link['target'] : '_self';
}
?>
<li class="clinician-item column is-full-touch is-6-desktop is-4-fullhd">
  <div class="card is-shadowless w-100">
    <div class="card-image pb-0">
      <figure class="image is-square mx-0 my-0">
        <img src="<?php echo esc_url( $image ); ?>" alt="<?php echo esc_attr( $image_alt ); ?>">
      </figure>
    </div>
    <div class="card-content has-text-centered px-0">
      <h3><?php echo $name; ?></h3>
      <?php if ( $pronouns ) : ?>
        <p class="mice-type is-italic mb-0"><?php echo '(' . $pronouns . ')'; ?></p>
      <?php endif; ?>
      <?php if ( $title ) : ?>
        <p class="has-text-primary mb-0"><?php echo $title; ?></p>
      <?php endif; ?>
      <p class="mb-3"><?php echo $location; ?></p>
      <?php if ( $highlights ) : ?>
        <div class="highlights is-flex is-flex-direction-row is-justify-content-space-between">
          <?php foreach ( $highlights as $highlight ) : 
            $highlight_item = $highlight['highlight'];
          ?>
            <p class="mice-type mb-3"><?php echo $highlight_item; ?></p>
          <?php endforeach; ?>
        </div>
      <?php endif; ?>
      <?php if ( !empty( get_the_content() ) ) : ?>
      <a href="#<?php echo $link; ?>" class="show-modal-btn" id="showModal">+ LEARN MORE</a>
      <?php endif; ?>
    </div><!-- .card-content -->
  </div><!-- .card -->
  <div class="modal">
    <div class="modal-background"></div>
    <div class="modal-content-wrapper content-wrapper container-m">
      <div class="modal-content m-0">
        <div class="card is-radiusless has-background-light is-shadowless p-6">
          
          <div class="card-entry-content">
            <div class="card-image">
            <figure class="image mx-0 my-0">
              <img src="<?php echo esc_url( $image ); ?>" alt="<?php echo esc_attr( $image_alt ); ?>">
            </figure>
            </div>

            <div class="card-content">
              <div class="text-flex is-flex">
                <p class="subtitle has-text-dark mb-0">Meet <?php echo current( explode( ' ', $name ) ); ?></p> <p class="is-family-primary is-italic mice-type"><?php if ( $pronouns ) { echo '(' . $pronouns . ')'; } ?></p>
              </div>
              <?php if ( $booking_link ) : ?>
              <a href="<?php echo $link_url; ?>" target="<?php echo $link_target; ?>" class="is-uppercase">+ Book with <?php echo current( explode( ' ', $name ) ); ?></a>
              <?php endif; ?>
              <?php if ( $highlights ) : ?>
                <div class="highlights is-flex is-flex-direction-row is-justify-content-space-between">
                  <?php foreach ( $highlights as $highlight ) : 
                    $highlight_item = $highlight['highlight'];
                  ?>
                    <p class="mice-type mb-3"><?php echo $highlight_item; ?></p>
                  <?php endforeach; ?>
                </div>
              <?php endif; ?>
            </div>
          </div>

          <div class="card-scroll-wrapper py-3 pr-3">
            <?php echo the_content( $post_id ); ?>
          </div>

        </div><!-- .card -->
        <button class="modal-close is-shadowless" aria-label="close" aria-label="Close Modal"></button>
      </div>
    </div>
  </div><!-- .modal -->
</li><!-- .clinician-item -->
