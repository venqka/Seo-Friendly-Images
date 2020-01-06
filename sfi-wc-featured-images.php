<?php
/*
*
*Handle WooCommerce products featured images
*
*/

class fsiWC {

	public function __construct() {
		
		add_filter( 'wp_get_attachment_image_attributes', array( $this, 'sffi_wc_set_attributes' ), 11, 2 );
			
	}

	function sffi_wc_set_attributes( $attr ) {

		$sffi_wc_featured_image_title = get_post( get_post_thumbnail_id( get_the_ID() ) )->post_name; 
		$sffi_wc_post_title = get_the_title();
		$sffi_wc_blog_title = get_bloginfo( 'name' );
		$sffi_wc_focus_keyword = get_yoast_focus_keyword( get_the_ID() );

		$sffi_wc_alt_option_one = get_option( 'sffi_wc_alt_option_one');
		$sffi_wc_alt_option_two = get_option( 'sffi_wc_alt_option_two');
		$sffi_wc_alt_option_three = get_option( 'sffi_wc_alt_option_three');
		
		if( $sffi_wc_alt_option_one == 'blog_title' ) {
			$sffi_wc_alt_one = $sffi_wc_blog_title;
		} elseif( $sffi_wc_alt_option_one == 'post_title' ) {
			$sffi_wc_alt_one = $sffi_wc_post_title;
		} elseif( $sffi_wc_alt_option_one == 'focus_keyword' ) {
			$sffi_wc_alt_one = $sffi_wc_focus_keyword;
		} else {
			$sffi_wc_alt_one = '';
		}

		if( $sffi_wc_alt_option_two == 'blog_title' ) {
			$sffi_wc_alt_two = $sffi_wc_blog_title;
		} elseif( $sffi_wc_alt_option_two == 'post_title' ) {
			$sffi_wc_alt_two = $sffi_wc_post_title;
		} elseif( $sffi_wc_alt_option_two == 'focus_keyword' ) {
			$sffi_wc_alt_two = $sffi_wc_focus_keyword;
		} else {
			$sffi_wc_alt_two = '';
		}

		if( $sffi_wc_alt_option_three == 'blog_title' ) {
			$sffi_wc_alt_three = $sffi_wc_blog_title;
		} elseif( $sffi_wc_alt_option_three == 'post_title' ) {
			$sffi_wc_alt_three = $sffi_wc_post_title;
		} elseif( $sffi_wc_alt_option_three == 'focus_keyword' ) {
			$sffi_wc_alt_three = $sffi_wc_focus_keyword;
		} else {
			$sffi_wc_alt_three = '';
		}

		$sffi_wc_title_option_one = get_option( 'sffi_wc_title_option_one');
		$sffi_wc_title_option_two = get_option( 'sffi_wc_title_option_two');
		$sffi_wc_title_option_three = get_option( 'sffi_wc_title_option_three');
		
		if( $sffi_wc_title_option_one == 'blog_title' ) {
			$sffi_wc_title_one = $sffi_wc_blog_title;
		} elseif( $sffi_wc_title_option_one == 'post_title' ) {
			$sffi_wc_title_one = $sffi_wc_post_title;
		} elseif( $sffi_wc_title_option_one == 'focus_keyword' ) {
			$sffi_wc_title_one = $sffi_wc_focus_keyword;
		} else {
			$sffi_wc_title_one = '';
		}

		if( $sffi_wc_title_option_two == 'blog_title' ) {
			$sffi_wc_title_two = $sffi_wc_blog_title;
		} elseif( $sffi_wc_title_option_two == 'post_title' ) {
			$sffi_wc_title_two = $sffi_wc_post_title;
		} elseif( $sffi_wc_title_option_two == 'focus_keyword' ) {
			$sffi_wc_title_two = $sffi_wc_focus_keyword;
		} else {
			$sffi_wc_title_two = '';
		}

		if( $sffi_wc_title_option_three == 'blog_title' ) {
			$sffi_wc_title_three = $sffi_wc_blog_title;
		} elseif( $sffi_wc_title_option_three == 'post_title' ) {
			$sffi_wc_title_three = $sffi_wc_post_title;
		} elseif( $sffi_wc_title_option_three == 'focus_keyword' ) {
			$sffi_wc_title_three = $sffi_wc_focus_keyword;
		} else {
			$sffi_wc_title_three = '';
		}

		if( is_woo() ) {

			$attr['alt'] = $sffi_wc_alt_one . ' ' . $sffi_wc_alt_two . ' ' . $sffi_wc_title_three;
			
			$attr['title'] = $sffi_wc_title_one . ' ' . $sffi_wc_title_two . ' ' . $sffi_wc_title_three;
	
		}
			
		
		return $attr;
	}

}//fsi