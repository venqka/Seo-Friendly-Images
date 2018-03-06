<?php

/*
*
*Handle embeded images
*
*/

class esi {

	public function __construct() {

		add_filter( 'the_content', array( $this, 'effi_set_atributes' ), 5, 2 );

	}

	//setting embeded images atributes

	function effi_set_atributes( $content ) {

		$post_id = get_the_ID();
		$efi_post_title = get_the_title();
		$efi_blog_title = get_bloginfo( 'name' );
		$efi_focus_keyword = get_yoast_focus_keyword( get_the_ID() );	
		
		$efi_alt_option_one = get_option( 'efi_alt_option_one' );
		$efi_alt_option_two = get_option( 'efi_alt_option_two' );
		$efi_alt_option_three = get_option( 'efi_alt_option_three' );
		
		if( $efi_alt_option_one == 'blog_title' ) {
			$efi_alt_one = $efi_blog_title;
		} elseif( $efi_alt_option_one == 'post_title' ) {
			$efi_alt_one = $efi_post_title;
		} elseif( $efi_alt_option_one == 'focus_keyword' ) {
			$efi_alt_one = $efi_focus_keyword;
		} else {
			$efi_alt_one = '';
		}

		if( $efi_alt_option_two == 'blog_title' ) {
			$efi_alt_two = $efi_blog_title;
		} elseif( $efi_alt_option_two == 'post_title' ) {
			$efi_alt_two = $efi_post_title;
		} elseif( $efi_alt_option_two == 'focus_keyword' ) {
			$efi_alt_two = $efi_focus_keyword;
		} else {
			$efi_alt_two = '';
		}

		if( $efi_alt_option_three == 'blog_title' ) {
			$efi_alt_three = $efi_blog_title;
		} elseif( $efi_alt_option_three == 'post_title' ) {
			$efi_alt_three = $efi_post_title;
		} elseif( $efi_alt_option_three == 'focus_keyword' ) {
			$efi_alt_three = $efi_focus_keyword;
		} else {
			$efi_alt_three = '';
		}

		$efi_title_option_one = get_option( 'efi_title_option_one');
		$efi_title_option_two = get_option( 'efi_title_option_two');
		$efi_title_option_three = get_option( 'efi_title_option_three');
		
		if( $efi_title_option_one == 'blog_title' ) {
			$efi_title_one = $efi_blog_title;
		} elseif( $efi_title_option_one == 'post_title' ) {
			$efi_title_one = $efi_post_title;
		} elseif( $efi_title_option_one == 'focus_keyword' ) {
			$efi_title_one = $efi_focus_keyword;
		} else {
			$efi_title_one = '';
		}

		if( $efi_title_option_two == 'blog_title' ) {
			$efi_title_two = $efi_blog_title;
		} elseif( $efi_title_option_two == 'post_title' ) {
			$efi_title_two = $efi_post_title;
		} elseif( $efi_title_option_two == 'focus_keyword' ) {
			$efi_title_two = $efi_focus_keyword;
		} else {
			$efi_title_two = '';
		}

		if( $efi_title_option_three == 'blog_title' ) {
			$efi_title_three = $efi_blog_title;
		} elseif( $efi_title_option_three == 'post_title' ) {
			$efi_title_three = $efi_post_title;
		} elseif( $efi_title_option_three == 'focus_keyword' ) {
			$efi_title_three = $efi_focus_keyword;
		} else {
			$efi_title_three = '';
		}

		if( !is_woo() ) {

			$orig = '<img';
			$replace = '<img title="' . $efi_title_one  . ' ' . $efi_title_two . ' ' . $efi_alt_three . '" alt="' . $efi_alt_one . ' ' . $efi_alt_two . ' ' . $efi_alt_three . '"';
			$content = str_replace( $orig, $replace, $content );
			
		}
			
		return $content;
	}

}//esi