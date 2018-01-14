<?php
/*
Plugin Name: Woobizz Hook 31 
Plugin URI: http://woobizz.com
Description: Custom Ogone Text Button on Checkout page
Author: Woobizz
Author URI: http://woobizz.com
Version: 1.0.0
Text Domain: woobizzhook31
Domain Path: /lang/
*/
//Prevent direct acces
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
//Load translation
add_action( 'plugins_loaded', 'woobizzhook31_load_textdomain' );
function woobizzhook31_load_textdomain() {
  load_plugin_textdomain( 'woobizzhook31', false, basename( dirname( __FILE__ ) ) . '/lang' ); 
}
//Hook 31
function woobizzhook31_custom_ogone_text_button( $available_gateways_ogone ) {
    if (! is_checkout() ) return $available_gateways_ogone;  // stop doing anything if we're not on checkout page.
		if (array_key_exists('ogone',$available_gateways_ogone)) {
			
			$available_gateways_ogone['ogone']->order_button_text = __('Pay with Credit Card', 'woobizzhook31' );
			
		}
		return $available_gateways_ogone;
}
add_filter( 'woocommerce_available_payment_gateways', 'woobizzhook31_custom_ogone_text_button' );