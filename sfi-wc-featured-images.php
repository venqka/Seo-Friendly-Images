<?php
/*
*
*Handle WooCommerce products featured images
*
*/

class fsiWC {

	public function __construct() {
		
		add_filter( 'wp_get_attachment_image_attributes', array( $this, 'sffi_wc_set_attributes' ), 11, 2 );

		add_filter( 'woocommerce_single_product_image_thumbnail_html', array( $this, 'clear_product_thumb_attributes' ), 11 );
				
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

	function clear_product_thumb_attributes( $html ) {

			global $post, $product;
			
			$columns           = apply_filters( 'woocommerce_product_thumbnails_columns', 4 );
			$thumbnail_size    = apply_filters( 'woocommerce_product_thumbnails_large_size', 'full' );
			$post_thumbnail_id = get_post_thumbnail_id( $post->ID );
			$full_size_image   = wp_get_attachment_image_src( $post_thumbnail_id, $thumbnail_size );
			$placeholder       = has_post_thumbnail() ? 'with-images' : 'without-images';
			$wrapper_classes   = apply_filters( 'woocommerce_single_product_image_gallery_classes', array(
				'woocommerce-product-gallery',
				'woocommerce-product-gallery--' . $placeholder,
				'woocommerce-product-gallery--columns-' . absint( $columns ),
				'images',
			) );

					
			$html  = '<div data-thumb="' . get_the_post_thumbnail_url( $post->ID, 'woocommerce_thumbnail' ) . '" class="woocommerce-product-gallery__image"><a href="' . esc_url( $full_size_image[0] ) . '">';
			$html .= get_the_post_thumbnail( $post->ID, 'woocommerce_single' );
			$html .= '</a></div><!--oopsie-->';

			return $html;
	}

}//fsi