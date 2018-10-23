<?php
/**
 * Plugin Name: Realty shortcodes
 * Author:      Greg
 * Version:     1.0
 */

 
require 'functions.php';

require 'shortcodes/add-realty-form/add-realty-form.php';
require 'shortcodes/realty-list/realty-list.php';
 
 
add_action( 'wp_enqueue_scripts', 'realty_shortcodes_scripts' );
function realty_shortcodes_scripts() {
   wp_enqueue_style( 'realty-shortcodes-style', plugins_url('style.css', __FILE__) );
   wp_enqueue_script( 'realty-shortcodes-script', plugins_url('script.js', __FILE__) );
}
 
 ?>