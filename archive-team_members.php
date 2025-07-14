<?php
/**
 * The template for displaying archive pages.
 *
 * @package Therosessom_Theme
 */

$team_id = get_field( 'team_members_id', 'option' );

get_header(); ?>

	<div id="primary" class="content-area">
    <?php get_template_part( 'template-parts/hero/hero' ); ?>
		<main id="main" class="site-main" role="main">
		<?php if ( have_posts() ) : ?>

			<header class="page-header">
      </header><!-- .page-header -->
      
      <?php get_template_part( 'template-parts/section/intro' ); ?>
      <section class="cards-team-members" id="<?php echo $team_id; ?>">
        <div class="container content-wrapper">
          <div class="columns is-variable is-7">

            <div class="column is-4-desktop filter-container">
              <?php echo do_shortcode('[fe_widget]');?>
            </div>

            <div class="column is-8-desktop">
              <ul class="clinicians-block columns is-mobile is-multiline is-variable is-5-tablet is-7-desktop">
              <?php /* Start the Loop */ ?>
              <?php while ( have_posts() ) : the_post(); ?>

                <?php
                  get_template_part( 'template-parts/content/content' );
                ?>

              <?php endwhile; ?>
              </ul>
            </div>

          </div>
        </div>
      </section>

      <?php get_template_part( 'template-parts/callout/callout-image-right' ); ?>

		<?php else : ?>

			<?php get_template_part( 'template-parts/content/content', 'none' ); ?>

		<?php endif; ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer(); ?>
