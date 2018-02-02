<?php 

/* Jigo Shop */
remove_action( 'jigoshop_before_main_content', 'jigoshop_output_content_wrapper', 10);
remove_action( 'jigoshop_after_main_content', 'jigoshop_output_content_wrapper_end', 10);

if( ! function_exists('jigoshop_output_content_wrapper') ) {
	function jigoshop_output_content_wrapper() {
		echo '<div id="container"><div id="content" role="main">';
	}
}
add_action('jigoshop_before_main_content','jigoshop_output_content_wrapper',10);

if( ! function_exists('jigoshop_output_content_wrapper_end') ) {
	function jigoshop_output_content_wrapper_end() {
		echo '</div>';
	}
}
add_action('jigoshop_after_main_content','jigoshop_output_content_wrapper_end',10);