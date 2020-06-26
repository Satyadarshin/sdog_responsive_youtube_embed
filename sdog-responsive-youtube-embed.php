<?php 
/**
* Plugin Name: s.Dog Responsive YouTube embed container
* Plugin URI: https://www.satyadarshin.com/plugins/sdog_responsive_youtube_embed/
* Description: A shortcode for inserting responsive, embedded YouTube videos. Insert the shortcode [sdog-youtube-embed src=""] with the the URL of the video as the attribute.
* Version: 1.0
* Author: Satyadarshin Perry
* Author URI: https://www.satyadarshin.com/
**/
defined( 'ABSPATH' ) or die( 'No script kiddies please!' );
function sdog_responsive_youtube_embed( $atts ) {
	$embed = shortcode_atts( array(
		'src' => 'location',
	), $atts );
	return "<div class=\"sdog-youtube-responsive-container\"><iframe src=\"{$embed['src']}\" frameborder=\"0\" allowfullscreen=\"allowfullscreen\"></iframe></div>";
}
add_shortcode( 'sdog-youtube-embed', 'sdog_responsive_youtube_embed' );
// Register any stylesheets on initialization
add_action('init', 'register_styles');
function register_styles() {
	wp_register_style( 'sdog-youtube-embed', plugins_url('sdog-youtube-responsive-container.css', __FILE__), false, '1.0.0', 'all');
}
// Use the registered stylesheets from above
add_action('wp_enqueue_scripts', 'enqueue_style');
function enqueue_style() {
	wp_enqueue_style('sdog-youtube-embed');
}
?>