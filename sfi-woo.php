<?php
/*
*
* Handle WooCommerce
*
*/

function is_woo_active() {

	if( class_exists( 'WooCommerce' ) ) {
		
		return true;
		
	} else {

		return false;
		
	}

}

function is_woo() {

	if( is_woo_active() && is_woocommerce() ) {

		return true;
	
	} else {

		return false;
	}
	
}