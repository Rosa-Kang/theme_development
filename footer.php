<?php
/**
 * The template for displaying the footer.
 *
 * @package Therosessom_Theme
 */

?>

			</div><!-- #content -->

			<footer id="colophon" class="site-footer" role="contentinfo">
        <div class="has-background-success">
          <div class="container content-wrapper">
            <?php wp_nav_menu( array( 'menu' => 'Footer Menu' ) ); ?>
          </div>
        </div>
       <div class="has-background-primary">
         <div class="bottom-deco"></div>
         <div class="footer-wrapper container content-wrapper">
           <p class="m-0 has-text-centered">
             <span class="has-text-light">COPYRIGHT © <?= date("Y"); ?> THEROSESSOM • ALL RIGHTS RESERVED</span>
           </p>
           
         </div><!-- .footer-wrapper -->
       </div>
			</footer><!-- #colophon -->
		</div><!-- #page -->

    <?php wp_footer(); ?>
    <?php get_template_part( 'template-parts/scripts/footer-scripts' ); ?>

	</body>
</html>
