<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package wpsunderscores
 */

if ( ! is_active_sidebar( 'sidebar-1' ) ) {
	return;
}
?>
<div class="col s12 m6 l4"><!-- Responsive Grid -->
	<?php dynamic_sidebar( 'sidebar-1' ); ?>
</div><!-- #secondary -->

</div><!-- Closing Row -->
</div><!-- Closing Contianer -->
