<?php

if (!defined('WP_UNINSTALL_PLUGIN')) {
    die;
}

//delete embeded images alt options

delete_option( 'efi_alt_option_one' );
delete_option( 'efi_alt_option_two' );
delete_option( 'efi_alt_option_three' );
delete_option( 'efi_alt_option_override' );

//delete embeded images title options

delete_option( 'efi_title_option_one' );
delete_option( 'efi_title_option_two' );
delete_option( 'efi_title_option_three' );
delete_option( 'efi_title_option_override' );

//delete featured images alt options

delete_option( 'sffi_alt_option_one' );
delete_option( 'sffi_alt_option_two' );
delete_option( 'sffi_alt_option_three' );
delete_option( 'sffi_alt_option_override' );

//delete featured images title options

delete_option( 'sffi_title_option_one' );
delete_option( 'sffi_title_option_two' );
delete_option( 'sffi_title_option_three' );
delete_option( 'sffi_title_option_override' );

//delete WooCommerce featured images alt options

delete_option( 'sffi_wc_alt_option_one' );
delete_option( 'sffi_wc_alt_option_two' );
delete_option( 'sffi_wc_alt_option_three' );
delete_option( 'sffi_wc_alt_option_override' );

//delete WooCommerce featured images title options

delete_option( 'sffi_wc_title_option_one' );
delete_option( 'sffi_wc_title_option_two' );
delete_option( 'sffi_wc_title_option_three' );
delete_option( 'sffi_wc_title_option_override' );

//delete WooCommerce embeded images alt options

delete_option( 'efi_wc_alt_option_one' );
delete_option( 'efi_wc_alt_option_two' );
delete_option( 'efi_wc_alt_option_three' );
delete_option( 'efi_wc_alt_option_override' );

//delete WooCommerce embeded images title options

delete_option( 'efi_wc_title_option_one' );
delete_option( 'efi_wc_title_option_two' );
delete_option( 'efi_wc_title_option_three' );
delete_option( 'efi_wc_title_option_override' );
