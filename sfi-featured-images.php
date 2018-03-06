<?php

/*
*
*Handle featured images
*
*/

class fsi {

	public function __construct() {

		add_filter( 'wp_get_attachment_image_attributes', array( $this, 'sffi_set_attributes' ), 10, 2 );

	}

	function sffi_set_attributes( $attr ) {

		$sffi_featured_image_title = get_post( get_post_thumbnail_id( get_the_ID() ) )->post_name; 
		$sffi_post_title = get_the_title();
		$sffi_blog_title = get_bloginfo( 'name' );
		
		$sffi_focus_keyword = get_yoast_focus_keyword( get_the_ID() );	

		$sffi_alt_option_one = get_option( 'sffi_alt_option_one');
		$sffi_alt_option_two = get_option( 'sffi_alt_option_two');
		$sffi_alt_option_three = get_option( 'sffi_alt_option_three');
		$sffi_alt_option_override = get_option( 'sffi_alt_option_override');

		if( $sffi_alt_option_one == 'blog_title' ) {
			$sffi_alt_one = $sffi_blog_title;
		} elseif( $sffi_alt_option_one == 'post_title' ) {
			$sffi_alt_one = $sffi_post_title;
		} elseif( $sffi_alt_option_one == 'focus_keyword' ) {
			$sffi_alt_one = $sffi_focus_keyword;
		} else {
			$sffi_alt_one = '';
		}

		if( $sffi_alt_option_two == 'blog_title' ) {
			$sffi_alt_two = $sffi_blog_title;
		} elseif( $sffi_alt_option_two == 'post_title' ) {
			$sffi_alt_two = $sffi_post_title;
		} elseif( $sffi_alt_option_two == 'focus_keyword' ) {
			$sffi_alt_two = $sffi_focus_keyword;
		} else {
			$sffi_alt_two = '';
		}

		if( $sffi_alt_option_three == 'blog_title' ) {
			$sffi_alt_three = $sffi_blog_title;
		} elseif( $sffi_alt_option_three == 'post_title' ) {
			$sffi_alt_three = $sffi_post_title;
		} elseif( $sffi_alt_option_three == 'focus_keyword' ) {
			$sffi_alt_three = $sffi_focus_keyword;
		} else {
			$sffi_alt_three = '';
		}

		$sffi_title_option_one = get_option( 'sffi_title_option_one');
		$sffi_title_option_two = get_option( 'sffi_title_option_two');
		$sffi_title_option_three = get_option( 'sffi_title_option_three');
		$sffi_title_option_override = get_option( 'sffi_title_option_override');

		if( $sffi_title_option_one == 'blog_title' ) {
			$sffi_title_one = $sffi_blog_title;
		} elseif( $sffi_title_option_one == 'post_title' ) {
			$sffi_title_one = $sffi_post_title;
		} elseif( $sffi_title_option_one == 'focus_keyword' ) {
			$sffi_title_one = $sffi_focus_keyword;
		} else {
			$sffi_title_one = '';
		}

		if( $sffi_title_option_two == 'blog_title' ) {
			$sffi_title_two = $sffi_blog_title;
		} elseif( $sffi_title_option_two == 'post_title' ) {
			$sffi_title_two = $sffi_post_title;
		} elseif( $sffi_title_option_two == 'focus_keyword' ) {
			$sffi_title_two = $sffi_focus_keyword;
		} else {
			$sffi_title_two = '';
		}

		if( $sffi_title_option_three == 'blog_title' ) {
			$sffi_title_three = $sffi_blog_title;
		} elseif( $sffi_title_option_three == 'post_title' ) {
			$sffi_title_three = $sffi_post_title;
		} elseif( $sffi_title_option_three == 'focus_keyword' ) {
			$sffi_title_three = $sffi_focus_keyword;
		} else {
			$sffi_title_three = '';
		}

		if( !is_woo() ) {

			if( $sffi_alt_option_override == 'override' ) {
				$attr['alt'] = $sffi_alt_one . ' ' . $sffi_alt_two . ' ' . $sffi_title_three;
			} elseif( $sffi_alt_option_override == '' ) {
				if( empty ( $attr[ 'alt' ] ) ) {
					$attr['alt'] = $sffi_alt_one . ' ' . $sffi_alt_two . ' ' . $sffi_title_three;
				}
			} 
			
			if( $sffi_title_option_override == 'override' ) {
				$attr['title'] = $sffi_title_one . ' ' . $sffi_title_two . ' ' . $sffi_title_three;
			} elseif( $sffi_title_option_override == '' ) {
				if( empty ( $attr[ 'title' ] ) ) {
					$attr['title'] = $sffi_title_one . ' ' . $sffi_title_two . ' ' . $sffi_title_three;
				}
			} 
	
		}

		//if( !is_woocommerce() ) {
			return $attr;
		//}
	}

}//fsi