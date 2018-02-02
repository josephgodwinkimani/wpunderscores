<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package wpsunderscores
 */

?>

	</div><!-- #content -->

	<footer class="page-footer"> <!-- Dont use Sticky footer, it uses flex which causes issues in IE -->
		<div class="container">
            <div class="row">
              <div class="col l6 s12">
 			<?php
					if(is_active_sidebar('footer-sidebar-1')){
						dynamic_sidebar('footer-sidebar-1');
						}
			?>
              </div>
              <div class="col l4 offset-l2 s12">
  			<?php
					if(is_active_sidebar('footer-sidebar-2')){
						dynamic_sidebar('footer-sidebar-2');
						}
			?>
              </div>
            </div>
          </div>
	<div class="footer-copyright">
            <div class="container center-align"><!-- Use align helper -->
			<a href="<?php echo esc_url( __( 'https://wordpress.org/', 'wpsunderscores' ) ); ?>"><?php
				/* translators: %s: CMS name, i.e. WordPress. */
				printf( esc_html__( 'Proudly powered by %s', 'wpsunderscores' ), 'WordPress' );
			?></a>
			<span class="sep"> | </span>
			<?php
				/* translators: 1: Theme name, 2: Theme author. */
				printf( esc_html__( 'Theme: %1$s by %2$s.', 'wpsunderscores' ), 'wpsunderscores', '<a href="https://josephgodwinkimani.github.io">Joseph Godwin Kimani</a>' );
			?>
			</div><!-- .container with align helper -->
    </div>
	</footer><!-- .page-footer -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
