<?php
/*
Plugin Name: FrontNews
Version: 1.0
Plugin URI: https://www.hjemmesider.dk
Description: Nyheder på forsiden
Author: Morten Andersen
Text Domain: frontnews-domain
Author URI: https://www.hjemmesider.dk.dk
*/

// CSS

function frontnews_register_plugin_styles() {
  wp_register_style('frontnews', plugins_url('frontnews/filer/frontnews-style.css'));
  wp_enqueue_style('frontnews');
}
add_action('wp_enqueue_scripts', 'frontnews_register_plugin_styles');

// Check
if( class_exists('ACF') ) {
  // ACF
	require_once ('filer/acf-frontnews.php');
  // Admin Page
	require_once ('filer/admin-frontnews.php');
  // Nyheder
  require_once ('filer/shortcode-frontnews.php');

}