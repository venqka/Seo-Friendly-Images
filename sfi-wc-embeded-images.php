<?php
/*
*
*Handle WooCommerce products embeded images
*
*/

class esiWC {

	public function __construct() {

		add_filter( 'the_content', array( $this, 'effi_set_atributes' ), 5, 2 );

	}

	//setting embeded images atributes

	function effi_set_atributes( $content ) {

		$post_id = get_the_ID();
		$efi_wc_post_title = get_the_title();
		$efi_wc_blog_title = get_bloginfo( 'name' );
		$efi_wc_focus_keyword = get_yoast_focus_keyword( get_the_ID() );		
		
		$efi_wc_alt_option_one = get_option( 'efi_wc_alt_option_one');
		$efi_wc_alt_option_two = get_option( 'efi_wc_alt_option_two');
		$efi_wc_alt_option_three = get_option( 'efi_wc_alt_option_three');
		
		if( $efi_wc_alt_option_one == 'blog_title' ) {
			$efi_wc_alt_one = $efi_wc_blog_title;
		} elseif( $efi_wc_alt_option_one == 'post_title' ) {
			$efi_wc_alt_one = $efi_wc_post_title;
		} elseif( $efi_wc_alt_option_one == 'focus_keyword' ) {
			$efi_wc_alt_one = $efi_wc_focus_keyword;
		} else {
			$efi_wc_alt_one = '';
		}

		if( $efi_wc_alt_option_two == 'blog_title' ) {
			$efi_wc_alt_two = $efi_wc_blog_title;
		} elseif( $efi_wc_alt_option_two == 'post_title' ) {
			$efi_wc_alt_two = $efi_wc_post_title;
		} elseif( $efi_wc_alt_option_two == 'focus_keyword' ) {
			$efi_wc_alt_two = $efi_wc_focus_keyword;
		} else {
			$efi_wc_alt_two = '';
		}

		if( $efi_wc_alt_option_three == 'blog_title' ) {
			$efi_wc_alt_three = $efi_wc_blog_title;
		} elseif( $efi_wc_alt_option_three == 'post_title' ) {
			$efi_wc_alt_three = $efi_wc_post_title;
		} elseif( $efi_wc_alt_option_three == 'focus_keyword' ) {
			$efi_wc_alt_three = $efi_wc_focus_keyword;
		} else {
			$efi_wc_alt_three = '';
		}

		$efi_wc_title_option_one = get_option( 'efi_wc_title_option_one');
		$efi_wc_title_option_two = get_option( 'efi_wc_title_option_two');
		$efi_wc_title_option_three = get_option( 'efi_wc_title_option_three');
		
		if( $efi_wc_title_option_one == 'blog_title' ) {
			$efi_wc_title_one = $efi_wc_blog_title;
		} elseif( $efi_wc_title_option_one == 'post_title' ) {
			$efi_wc_title_one = $efi_wc_post_title;
		} elseif( $efi_wc_title_option_one == 'focus_keyword' ) {
			$efi_wc_title_one = $efi_wc_focus_keyword;
		} else {
			$efi_wc_title_one = '';
		}

		if( $efi_wc_title_option_two == 'blog_title' ) {
			$efi_wc_title_two = $efi_wc_blog_title;
		} elseif( $efi_wc_title_option_two == 'post_title' ) {
			$efi_wc_title_two = $efi_wc_post_title;
		} elseif( $efi_wc_title_option_two == 'focus_keyword' ) {
			$efi_wc_title_two = $efi_wc_focus_keyword;
		} else {
			$efi_wc_title_two = '';
		}

		if( $efi_wc_title_option_three == 'blog_title' ) {
			$efi_wc_title_three = $efi_wc_blog_title;
		} elseif( $efi_wc_title_option_three == 'post_title' ) {
			$efi_wc_title_three = $efi_wc_post_title;
		} elseif( $efi_wc_title_option_three == 'focus_keyword' ) {
			$efi_wc_title_three = $efi_wc_focus_keyword;
		} else {
			$efi_wc_title_three = '';
		}

		if( is_woo() ) {

			$orig = '<img';
			$replace = '<img title="' . $efi_wc_title_one  . ' ' . $efi_wc_title_two . ' ' . $efi_wc_alt_three . '" alt="' . $efi_wc_alt_one . ' ' . $efi_wc_alt_two . ' ' . $efi_wc_alt_three . '"';
			$content = str_replace( $orig, $replace, $content );
			
		}

		return $content;

	}

}//esi