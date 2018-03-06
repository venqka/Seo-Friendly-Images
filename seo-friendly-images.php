<?php
/**
 * Plugin Name: SEO Friendly Images
 * Plugin URI: shtrak.eu/it
 * Description: This plugin adds alt and title attributes tags to featured and embeded images.
 * Version: 1.0.0
 * Author: venqka @ Shtrak!
 * Author URI: shtrak.eu/it
 * License: GPL2
 */

include ( plugin_dir_path( __FILE__ ) . 'sfi-settings.php' );
include ( plugin_dir_path( __FILE__ ) . 'sfi-embeded-images.php' );
include ( plugin_dir_path( __FILE__ ) . 'sfi-featured-images.php' );
include ( plugin_dir_path( __FILE__ ) . 'sfi-wc-featured-images.php' );
include ( plugin_dir_path( __FILE__ ) . 'sfi-wc-embeded-images.php' );
include ( plugin_dir_path( __FILE__ ) . 'sfi-yoast.php' );
include ( plugin_dir_path( __FILE__ ) . 'sfi-woo.php' );

new sfiSettings;
new esi;
new fsi;
new fsiWC;
new esiWC;

function sfi_settings_link( $links ) {
	$settings_link = array(
 		'<a href="' . admin_url( 'options-general.php?page=seo-friendly-images&tab=sfi-general' ) . '">Settings</a>',
 	);
	return array_merge( $links, $settings_link );
}
add_filter( 'plugin_action_links_' . plugin_basename(__FILE__), 'sfi_settings_link' );