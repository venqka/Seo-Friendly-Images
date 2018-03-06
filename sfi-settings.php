<?php

/*
*
*Handle plugin settings
*
*/

class sfiSettings {

	public function __construct() {

		add_action( 'admin_menu', array( $this, 'sffi_admin' ) );
		add_action( 'admin_menu', array( $this, 'sffi_init' ) );

	}//construct

	function sffi_admin() {
    	add_options_page( 'SEO Friendly Images', 'SEO Friendly Images', 'manage_options', 'seo-friendly-images', array( $this, 'sffi_options' ) );
	}//sffi_admin

	function sffi_init() {
	
		//register featured images settings
		
		register_setting( 'sfi-group', 'sffi_alt_option_one', array( $this, 'sfi_select_validation' ) );
		register_setting( 'sfi-group', 'sffi_alt_option_two', array( $this, 'sfi_select_validation' ) );
		register_setting( 'sfi-group', 'sffi_alt_option_three', array( $this, 'sfi_select_validation'  ) );
		
		register_setting( 'sfi-group', 'sffi_title_option_one', array( $this, 'sfi_select_validation' ) );
		register_setting( 'sfi-group', 'sffi_title_option_two', array( $this, 'sfi_select_validation' ) );
		register_setting( 'sfi-group', 'sffi_title_option_three', array( $this, 'sfi_select_validation' ) );
		
		//adding yaost integration settings

		add_settings_section( 'sfi_general', 'About the plugin', array( $this, 'sfi_general' ), 'sfi-general' );
		
		//adding featured images settings

		add_settings_section( 'sffi_alt', 'Featured Images Alt Options', array( $this, 'sffi_alt_section_text' ), 'sffi' );
		
		add_settings_field( 'sffi_alt_option_one', 'Option one', array( $this, 'sffi_alt_option_one' ), 'sffi', 'sffi_alt' );
		add_settings_field( 'sffi_alt_option_two', 'Option two', array( $this, 'sffi_alt_option_two' ), 'sffi', 'sffi_alt' );
		add_settings_field( 'sffi_alt_option_three', 'Option three', array( $this, 'sffi_alt_option_three' ), 'sffi', 'sffi_alt' );
		
		add_settings_section( 'sffi_title', 'Featured Images Title Options', array( $this, 'sffi_title_section_text' ), 'sffi' );
		
		add_settings_field( 'sffi_title_option_one', 'Option one', array( $this, 'sffi_title_option_one' ), 'sffi', 'sffi_title' );
		add_settings_field( 'sffi_title_option_two', 'Option two', array( $this, 'sffi_title_option_two' ), 'sffi', 'sffi_title' );
		add_settings_field( 'sffi_title_option_three', 'Option three', array( $this, 'sffi_title_option_three' ), 'sffi', 'sffi_title' );
		
		//register embeded images settings

		register_setting( 'efi-group', 'efi_alt_option_one', array( $this, 'sfi_select_validation' ) );
		register_setting( 'efi-group', 'efi_alt_option_two', array( $this, 'sfi_select_validation' ) );
		register_setting( 'efi-group', 'efi_alt_option_three', array( $this, 'sfi_select_validation' ) );
		
		register_setting( 'efi-group', 'efi_title_option_one', array( $this, 'sfi_select_validation' ) );
		register_setting( 'efi-group', 'efi_title_option_two', array( $this, 'sfi_select_validation' ) );
		register_setting( 'efi-group', 'efi_title_option_three', array( $this, 'sfi_select_validation' ) );
		
		//adding embeded images settings
		
		add_settings_section( 'efi_alt', 'Embeded Images Alt Options', array( $this, 'efi_alt_section_text' ), 'efi' );
		
		add_settings_field( 'efi_alt_option_one', 'Option one', array( $this, 'efi_alt_option_one' ), 'efi', 'efi_alt' );
		add_settings_field( 'efi_alt_option_two', 'Option two', array( $this, 'efi_alt_option_two' ), 'efi', 'efi_alt' );
		add_settings_field( 'efi_alt_option_three', 'Option three', array( $this, 'efi_alt_option_three'), 'efi', 'efi_alt' );
		
		add_settings_section( 'efi_title', 'Embeded Images Title Options', array( $this, 'efi_title_section_text' ), 'efi' );
		
		add_settings_field( 'efi_title_option_one', 'Option one', array( $this, 'efi_title_option_one' ), 'efi', 'efi_title' );
		add_settings_field( 'efi_title_option_two', 'Option two', array( $this, 'efi_title_option_two' ), 'efi', 'efi_title' );
		add_settings_field( 'efi_title_option_three', 'Option three', array( $this, 'efi_title_option_three' ), 'efi', 'efi_title' );
		
		//register WooCommerce products featured images settings
		
		register_setting( 'sfi-wc-group', 'sffi_wc_alt_option_one', array( $this, 'sfi_select_validation' ) );
		register_setting( 'sfi-wc-group', 'sffi_wc_alt_option_two', array( $this, 'sfi_select_validation' ) );
		register_setting( 'sfi-wc-group', 'sffi_wc_alt_option_three', array( $this, 'sfi_select_validation'  ) );
		
		register_setting( 'sfi-wc-group', 'sffi_wc_title_option_one', array( $this, 'sfi_select_validation' ) );
		register_setting( 'sfi-wc-group', 'sffi_wc_title_option_two', array( $this, 'sfi_select_validation' ) );
		register_setting( 'sfi-wc-group', 'sffi_wc_title_option_three', array( $this, 'sfi_select_validation' ) );
		
		//add WooCommerce products featured images settings section

		add_settings_section( 'sffi_wc_alt', 'WooCommerce Products Featured Images Alt Options', array( $this, 'sffi_wc_alt_section_text' ), 'sffi-wc' );
		
		add_settings_field( 'sffi_wc_alt_option_one', 'Option one', array( $this, 'sffi_wc_alt_option_one' ), 'sffi-wc', 'sffi_wc_alt' );
		add_settings_field( 'sffi_wc_alt_option_two', 'Option two', array( $this, 'sffi_wc_alt_option_two' ), 'sffi-wc', 'sffi_wc_alt' );
		add_settings_field( 'sffi_wc_alt_option_three', 'Option three', array( $this, 'sffi_wc_alt_option_three' ), 'sffi-wc', 'sffi_wc_alt' );
		
		add_settings_section( 'sffi_wc_title', 'WooCommerce Products Featured Images Title Options', array( $this, 'sffi_title_section_text' ), 'sffi-wc' );
		
		add_settings_field( 'sffi_wc_title_option_one', 'Option one', array( $this, 'sffi_wc_title_option_one' ), 'sffi-wc', 'sffi_wc_title' );
		add_settings_field( 'sffi_wc_title_option_two', 'Option two', array( $this, 'sffi_wc_title_option_two' ), 'sffi-wc', 'sffi_wc_title' );
		add_settings_field( 'sffi_wc_title_option_three', 'Option three', array( $this, 'sffi_wc_title_option_three' ), 'sffi-wc', 'sffi_wc_title' );
		
		//register WooCommerce embeded images settings

		register_setting( 'efi-wc-group', 'efi_wc_alt_option_one', array( $this, 'sfi_select_validation' ) );
		register_setting( 'efi-wc-group', 'efi_wc_alt_option_two', array( $this, 'sfi_select_validation' ) );
		register_setting( 'efi-wc-group', 'efi_wc_alt_option_three', array( $this, 'sfi_select_validation' ) );
		
		register_setting( 'efi-wc-group', 'efi_wc_title_option_one', array( $this, 'sfi_select_validation' ) );
		register_setting( 'efi-wc-group', 'efi_wc_title_option_two', array( $this, 'sfi_select_validation' ) );
		register_setting( 'efi-wc-group', 'efi_wc_title_option_three', array( $this, 'sfi_select_validation' ) );
		
		//adding WooCommerce embeded images settings
		
		add_settings_section( 'efi_wc_alt', 'Embeded Images Alt Options', array( $this, 'efi_alt_section_text' ), 'efi-wc' );
		
		add_settings_field( 'efi_wc_alt_option_one', 'Option one', array( $this, 'efi_wc_alt_option_one' ), 'efi-wc', 'efi_wc_alt' );
		add_settings_field( 'efi_wc_alt_option_two', 'Option two', array( $this, 'efi_wc_alt_option_two' ), 'efi-wc', 'efi_wc_alt' );
		add_settings_field( 'efi_wc_alt_option_three', 'Option three', array( $this, 'efi_wc_alt_option_three'), 'efi-wc', 'efi_wc_alt' );
		
		add_settings_section( 'efi_wc_title', 'Embeded Images Title Options', array( $this, 'efi_wc_title_section_text' ), 'efi-wc' );
		
		add_settings_field( 'efi_wc_title_option_one', 'Option one', array( $this, 'efi_wc_title_option_one' ), 'efi-wc', 'efi_wc_title' );
		add_settings_field( 'efi_wc_title_option_two', 'Option two', array( $this, 'efi_wc_title_option_two' ), 'efi-wc', 'efi_wc_title' );
		add_settings_field( 'efi_wc_title_option_three', 'Option three', array( $this, 'efi_wc_title_option_three' ), 'efi-wc', 'efi_wc_title' );
		
	}//sffi_init

	function sfi_general() {
	
	?>
		
		<p>This plugin allows you to manage all your images alt and title tags</p>
		
		<h2>WooCommerce compatibility</h2>
		<p>You can control products images separately.</p>
		<?php if ( is_woo_active() ) { ?>
				<p>You have WooCommerce installed. You should see WC Featured Images and WC Embeded images tabs. Use them to set products images attributes.</p>
		<?php } else { ?>
				<p>WooCommerce is not installed/active.</p> 
		<?php } ?>
		<h2>Yoast compatibility</h2>
		<p>You can use Yoast focus keyword in your tags. Available for products too.</p>
	<?php		

		if( function_exists( 'wpseo_activate' ) ) {
			echo "<p>You have Yoast installed. You can use it's focus keyword in your image tags.</p>";
		} else {
			echo "<p>Yoast is not activated. Install/Activate it to use focus keyword in the tags.</p>"; 
		}
	}

	//featured images
	function sffi_alt_section_text() {

		?>
			<h4>Choose the way your featured images alt attributes are set</h4>
			<p>[Option one][Option two][Option three]</p>
			<p>Leave empty if you don't want to use any of the options</p>
		<?php
		
	}

	function sffi_alt_option_one() {
	
		$sffi_alt_option_one = get_option( 'sffi_alt_option_one' );

		?>
			
	 		<select id="sffi_alt_option_one" name="sffi_alt_option_one">
	 			<option value="" selected="selected">Choose option</option>
	 			<option value="blog_title" <?php if( $sffi_alt_option_one == 'blog_title' ) { echo 'selected'; } ?> > Blog title</option>
	 			<option value="post_title" <?php if( $sffi_alt_option_one == 'post_title' ) { echo 'selected'; } ?> >Post title</option>
				<option value="focus_keyword" class="focus_keyword" <?php if( function_exists( 'wpseo_activate' ) ) { echo 'enabled'; } else { echo 'disabled';	} ?> <?php if( $sffi_alt_option_one == 'focus_keyword' ) { echo 'selected'; } ?> >Focus keyword</option>
	 		</select>
	 				
		<?php

	}

	function sffi_alt_option_two() {

		$sffi_alt_option_two = get_option( 'sffi_alt_option_two' );

		?>

			<select id="sffi_alt_option_two" name="sffi_alt_option_two">
	 			<option value="" selected="selected">Choose option</option>
	 			<option value="blog_title" <?php if( $sffi_alt_option_two == 'blog_title' ) { echo 'selected'; } ?> >Blog title</option>
	 			<option value="post_title" <?php if( $sffi_alt_option_two == 'post_title' ) { echo 'selected'; } ?> >Post title</option>
				<option value="focus_keyword" class="focus_keyword" <?php if( function_exists( 'wpseo_activate' ) ) { echo 'enabled'; } else { echo 'disabled';	} ?> <?php if( $sffi_alt_option_two == 'focus_keyword' ) { echo 'selected'; } ?> >Focus keyword</option>
	 		</select>
	 				
		<?php

	}

	function sffi_alt_option_three() {

		$sffi_alt_option_three = get_option( 'sffi_alt_option_three' );
		?>

			<select id="sffi_alt_option_three" name="sffi_alt_option_three">
	 			<option value="" selected="selected">Choose option</option>
	 			<option value="blog_title" <?php if( $sffi_alt_option_three == 'blog_title' ) { echo 'selected'; } ?> >Blog title</option>
	 			<option value="post_title" <?php if( $sffi_alt_option_three == 'post_title' ) { echo 'selected'; } ?> >Post title</option>
				<option value="focus_keyword" <?php if( function_exists( 'wpseo_activate' ) ) { echo 'enabled'; } else { echo 'disabled';	} ?> <?php ?> <?php
				if( $sffi_alt_option_three == 'focus_keyword' ) { echo 'selected'; } ?> >Focus keyword</option>
	 		</select>
	 				
		<?php

	}

	function sffi_title_section_text() {

		?>
			<h4>Choose the way your featured images title attributes are set</h4>
			<p>[Option one][Option two][Option three]</p>
			<p>Leave empty if you don't want to use any of the options</p>

		<?php
	}

	function sffi_title_option_one() {

		$sffi_title_option_one = get_option( 'sffi_title_option_one' );
		
		?>

			<select id="sffi_title_option_one" name="sffi_title_option_one">
	 			<option selected="selected" value="">Choose option</option>
	 			<option value="blog_title" <?php if( $sffi_title_option_one == 'blog_title' ) { echo 'selected'; } ?> >Blog title</option>
	 			<option value="post_title" <?php if( $sffi_title_option_one == 'post_title' ) { echo 'selected'; } ?> >Post title</option>
	 			<option value="focus_keyword" class="focus_keyword" <?php if( function_exists( 'wpseo_activate' ) ) { echo 'enabled'; } else { echo 'disabled';	} ?> <?php if( $sffi_title_option_one == 'focus_keyword' ) { echo 'selected'; } ?> >Focus keyword</option>
	 		</select>
	 				
		<?php

	}

	function sffi_title_option_two() {

		$sffi_title_option_two = get_option( 'sffi_title_option_two' );

		?>

			<select id="sffi_title_option_two" name="sffi_title_option_two">
	 			<option selected="selected" value="">Choose option</option>
				<option value="blog_title" <?php if( $sffi_title_option_two == 'blog_title' ) { echo 'selected'; } ?> >Blog title</option>
	 			<option value="post_title" <?php if( $sffi_title_option_two == 'post_title' ) { echo 'selected'; } ?> >Post title</option>
	 			<option value="focus_keyword" class="focus_keyword" <?php if( function_exists( 'wpseo_activate' ) ) { echo 'enabled'; } else { echo 'disabled';	} ?> <?php if( $sffi_title_option_two == 'focus_keyword' ) { echo 'selected'; } ?> >Focus keyword</option>
	 		</select>
	 				
		<?php

	}

	function sffi_title_option_three() {

		$sffi_title_option_three = get_option( 'sffi_title_option_three' );

		?>

			<select id="sffi_title_option_three" name="sffi_title_option_three">
	 			<option selected="selected" value="">Choose option</option>
				<option value="blog_title" <?php if( $sffi_title_option_three == 'blog_title' ) { echo 'selected'; } ?> >Blog title</option>
	 			<option value="post_title" <?php if( $sffi_title_option_three == 'post_title' ) { echo 'selected'; } ?> >Post title</option>
	 			<option value="focus_keyword" class="focus_keyword" <?php if( function_exists( 'wpseo_activate' ) ) { echo 'enabled'; } else { echo 'disabled';	} ?> <?php if( $sffi_title_option_three == 'focus_keyword' ) { echo 'selected'; } ?> >Focus keyword</option>
	 		</select>
	 				
		<?php

	}

	//embeded images settings

	//embeded images alt

	function efi_alt_section_text() {

		?>
			<h4>Choose the way your embeded images alt attributes are set</h4>
			<p>[Option one][Option two][Option three]</p>
			<p>Leave empty if you don't want to use any of the options</p>
		<?php

	}

	function efi_alt_option_one() {

		$efi_alt_option_one = get_option( 'efi_alt_option_one' );

		?>
			
	 		<select id="efi_alt_option_one" name="efi_alt_option_one">
	 			<option value="" selected="selected">Choose option</option>
	 			<option value="blog_title" <?php if( $efi_alt_option_one == 'blog_title' ) { echo 'selected'; } ?> > Blog title</option>
	 			<option value="post_title" <?php if( $efi_alt_option_one == 'post_title' ) { echo 'selected'; } ?> >Post title</option>
	 			<option value="focus_keyword" class="focus_keyword" <?php if( function_exists( 'wpseo_activate' ) ) { echo 'enabled'; } else { echo 'disabled';	} ?> <?php if( $efi_alt_option_one == 'focus_keyword' ) { echo 'selected'; } ?> >Focus keyword</option>
	 		</select>
	 				
		<?php

	}

	function efi_alt_option_two() {

		$efi_alt_option_two = get_option( 'efi_alt_option_two' );

		?>

			<select id="efi_alt_option_two" name="efi_alt_option_two">
	 			<option value="" selected="selected">Choose option</option>
	 			<option value="blog_title" <?php if( $efi_alt_option_two == 'blog_title' ) { echo 'selected'; } ?> >Blog title</option>
	 			<option value="post_title" <?php if( $efi_alt_option_two == 'post_title' ) { echo 'selected'; } ?> >Post title</option>
	 			<option value="focus_keyword" class="focus_keyword" <?php if( function_exists( 'wpseo_activate' ) ) { echo 'enabled'; } else { echo 'disabled';	} ?> <?php if( $efi_alt_option_two == 'focus_keyword' ) { echo 'selected'; } ?> >Focus keyword</option>
	 		</select>
	 				
		<?php

	}

	function efi_alt_option_three() {

		$efi_alt_option_three = get_option( 'efi_alt_option_three' );

		?>

			<select id="efi_alt_option_three" name="efi_alt_option_three">
	 			<option value="" selected="selected">Choose option</option>
	 			<option value="blog_title" <?php if( $efi_alt_option_three == 'blog_title' ) { echo 'selected'; } ?> >Blog title</option>
	 			<option value="post_title" <?php if( $efi_alt_option_three == 'post_title' ) { echo 'selected'; } ?> >Post title</option>
	 			<option value="focus_keyword" class="focus_keyword" <?php if( function_exists( 'wpseo_activate' ) ) { echo 'enabled'; } else { echo 'disabled';	} ?> <?php if( $efi_alt_option_three == 'focus_keyword' ) { echo 'selected'; } ?> >Focus keyword</option>
	 		</select>
	 				
		<?php

	}

	//embeded images title settings

	function efi_title_section_text() {
		
		?>
			<h4>Choose the way your enbeded images title attributes are set</h4>
			<p>[Option one][Option two][Option three]</p>
			<p>Leave empty if you don't want to use any of the options</p>

		<?php
	}

	function efi_title_option_one() {

		$efi_title_option_one = get_option( 'efi_title_option_one' );
		
		?>

			<select id="efi_title_option_one" name="efi_title_option_one">
	 			<option selected="selected" value="">Choose option</option>
	 			<option value="blog_title" <?php if( $efi_title_option_one == 'blog_title' ) { echo 'selected'; } ?> >Blog title</option>
	 			<option value="post_title" <?php if( $efi_title_option_one == 'post_title' ) { echo 'selected'; } ?> >Post title</option>
	 			<option value="focus_keyword" class="focus_keyword" <?php if( function_exists( 'wpseo_activate' ) ) { echo 'enabled'; } else { echo 'disabled';	} ?> <?php if( $efi_title_option_one == 'focus_keyword' ) { echo 'selected'; } ?> >Focus keyword</option>
	 		</select>
	 				
		<?php

	}

	function efi_title_option_two() {
		
		$efi_title_option_two = get_option( 'efi_title_option_two' );

		?>

			<select id="efi_title_option_two" name="efi_title_option_two">
	 			<option selected="selected" value="">Choose option</option>
				<option value="blog_title" <?php if( $efi_title_option_two == 'blog_title' ) { echo 'selected'; } ?> >Blog title</option>
	 			<option value="post_title" <?php if( $efi_title_option_two == 'post_title' ) { echo 'selected'; } ?> >Post title</option>
	 			<option value="focus_keyword" class="focus_keyword" <?php if( function_exists( 'wpseo_activate' ) ) { echo 'enabled'; } else { echo 'disabled';	} ?> <?php if( $efi_title_option_two == 'focus_keyword' ) { echo 'selected'; } ?> >Focus keyword</option>
	 		</select>
	 				
		<?php

	}

	function efi_title_option_three() {
		
		$efi_title_option_three = get_option( 'efi_title_option_three' );

		?>

			<select id="efi_title_option_three" name="efi_title_option_three">
	 			<option selected="selected" value="">Choose option</option>
				<option value="blog_title" <?php if( $efi_title_option_three == 'blog_title' ) { echo 'selected'; } ?> >Blog title</option>
	 			<option value="post_title" <?php if( $efi_title_option_three == 'post_title' ) { echo 'selected'; } ?> >Post title</option>
	 			<option value="focus_keyword" class="focus_keyword" <?php if( function_exists( 'wpseo_activate' ) ) { echo 'enabled'; } else { echo 'disabled';	} ?> <?php if( $efi_title_option_three == 'focus_keyword' ) { echo 'selected'; } ?> >Focus keyword</option>
	 		</select>
	 				
		<?php

	}

	//WooCommerce products featured images settings

	function sffi_wc_alt_section_text() {

		?>
			<h4>Choose the way WooCommerce products featured images alt attributes are set</h4>
			<p>[Option one][Option two][Option three]</p>
			<p>Leave empty if you don't want to use any of the options</p>
		<?php
		
	}

	function sffi_wc_alt_option_one() {
	
		$sffi_wc_alt_option_one = get_option( 'sffi_wc_alt_option_one' );

		?>
			
	 		<select id="sffi_wc_alt_option_one" name="sffi_wc_alt_option_one">
	 			<option value="" selected="selected">Choose option</option>
	 			<option value="blog_title" <?php if( $sffi_wc_alt_option_one == 'blog_title' ) { echo 'selected'; } ?> > Blog title</option>
	 			<option value="post_title" <?php if( $sffi_wc_alt_option_one == 'post_title' ) { echo 'selected'; } ?> >Product name</option>
				<option value="focus_keyword" class="focus_keyword" <?php if( function_exists( 'wpseo_activate' ) ) { echo 'enabled'; } else { echo 'disabled';	} ?> <?php if( $sffi_wc_alt_option_one == 'focus_keyword' ) { echo 'selected'; } ?> >Focus keyword</option>
	 		</select>
	 				
		<?php

	}

	function sffi_wc_alt_option_two() {

		$sffi_wc_alt_option_two = get_option( 'sffi_wc_alt_option_two' );

		?>

			<select id="sffi_wc_alt_option_two" name="sffi_wc_alt_option_two">
	 			<option value="" selected="selected">Choose option</option>
	 			<option value="blog_title" <?php if( $sffi_wc_alt_option_two == 'blog_title' ) { echo 'selected'; } ?> >Blog title</option>
	 			<option value="post_title" <?php if( $sffi_wc_alt_option_two == 'post_title' ) { echo 'selected'; } ?> >Product name</option>
				<option value="focus_keyword" class="focus_keyword" <?php if( function_exists( 'wpseo_activate' ) ) { echo 'enabled'; } else { echo 'disabled';	} ?> <?php if( $sffi_wc_alt_option_two == 'focus_keyword' ) { echo 'selected'; } ?> >Focus keyword</option>
	 		</select>
	 				
		<?php

	}

	function sffi_wc_alt_option_three() {

		$sffi_wc_alt_option_three = get_option( 'sffi_wc_alt_option_three' );
		?>

			<select id="sffi_wc_alt_option_three" name="sffi_wc_alt_option_three">
	 			<option value="" selected="selected">Choose option</option>
	 			<option value="blog_title" <?php if( $sffi_wc_alt_option_three == 'blog_title' ) { echo 'selected'; } ?> >Blog title</option>
	 			<option value="post_title" <?php if( $sffi_wc_alt_option_three == 'post_title' ) { echo 'selected'; } ?> >Product name</option>
				<option value="focus_keyword" <?php if( function_exists( 'wpseo_activate' ) ) { echo 'enabled'; } else { echo 'disabled';	} ?> <?php ?> <?php
				if( $sffi_wc_alt_option_three == 'focus_keyword' ) { echo 'selected'; } ?> >Focus keyword</option>
	 		</select>
	 				
		<?php

	}

	//WooCommerce featured images title

	function sffi_wc_title_section_text() {

		?>
			<h4>Choose the way WooCommerce products featured images title attributes are set</h4>
			<p>[Option one][Option two][Option three]</p>
			<p>Leave empty if you don't want to use any of the options</p>

		<?php
	}

	function sffi_wc_title_option_one() {

		$sffi_wc_title_option_one = get_option( 'sffi_wc_title_option_one' );
		
		?>

			<select id="sffi_wc_title_option_one" name="sffi_wc_title_option_one">
	 			<option selected="selected" value="">Choose option</option>
	 			<option value="blog_title" <?php if( $sffi_wc_title_option_one == 'blog_title' ) { echo 'selected'; } ?> >Blog title</option>
	 			<option value="post_title" <?php if( $sffi_wc_title_option_one == 'post_title' ) { echo 'selected'; } ?> >Product name</option>
	 			<option value="focus_keyword" class="focus_keyword" <?php if( function_exists( 'wpseo_activate' ) ) { echo 'enabled'; } else { echo 'disabled';	} ?> <?php if( $sffi_wc_title_option_one == 'focus_keyword' ) { echo 'selected'; } ?> >Focus keyword</option>
	 		</select>
	 				
		<?php

	}

	function sffi_wc_title_option_two() {

		$sffi_wc_title_option_two = get_option( 'sffi_wc_title_option_two' );

		?>

			<select id="sffi_wc_title_option_two" name="sffi_wc_title_option_two">
	 			<option selected="selected" value="">Choose option</option>
				<option value="blog_title" <?php if( $sffi_wc_title_option_two == 'blog_title' ) { echo 'selected'; } ?> >Blog title</option>
	 			<option value="post_title" <?php if( $sffi_wc_title_option_two == 'post_title' ) { echo 'selected'; } ?> >Product name</option>
	 			<option value="focus_keyword" class="focus_keyword" <?php if( function_exists( 'wpseo_activate' ) ) { echo 'enabled'; } else { echo 'disabled';	} ?> <?php if( $sffi_wc_title_option_two == 'focus_keyword' ) { echo 'selected'; } ?> >Focus keyword</option>
	 		</select>
	 				
		<?php

	}


	function sffi_wc_title_option_three() {

		$sffi_wc_title_option_three = get_option( 'sffi_wc_title_option_three' );

		?>
		
			<select id="sffi_wc_title_option_three" name="sffi_wc_title_option_three">
	 			<option selected="selected" value="">Choose option</option>
				<option value="blog_title" <?php if( $sffi_wc_title_option_three == 'blog_title' ) { echo 'selected'; } ?> >Blog title</option>
	 			<option value="post_title" <?php if( $sffi_wc_title_option_three == 'post_title' ) { echo 'selected'; } ?> >Product name</option>
	 			<option value="focus_keyword" class="focus_keyword" <?php if( function_exists( 'wpseo_activate' ) ) { echo 'enabled'; } else { echo 'disabled';	} ?> <?php if( $sffi_wc_title_option_three == 'focus_keyword' ) { echo 'selected'; } ?> >Focus keyword</option>
	 		</select>
	 				
		<?php

	}

	//WooCommerce products embeded images settings

	function efi_wc_alt_section_text() {

		?>
		<h4>Choose the way WooCommerce products embeded images alt attributes are set</h4>
		<p>[Option one][Option two][Option three]</p>
		<p>Leave empty if you don't want to use any of the options</p>
		<?php

	}

	function efi_wc_alt_option_one() {

		$efi_wc_alt_option_one = get_option( 'efi_wc_alt_option_one' );

		?>
			
	 		<select id="efi_wc_alt_option_one" name="efi_wc_alt_option_one">
	 			<option value="" selected="selected">Choose option</option>
	 			<option value="blog_title" <?php if( $efi_wc_alt_option_one == 'blog_title' ) { echo 'selected'; } ?> > Blog title</option>
	 			<option value="post_title" <?php if( $efi_wc_alt_option_one == 'post_title' ) { echo 'selected'; } ?> >Product name</option>
	 			<option value="focus_keyword" class="focus_keyword" <?php if( function_exists( 'wpseo_activate' ) ) { echo 'enabled'; } else { echo 'disabled';	} ?> <?php if( $efi_wc_alt_option_one == 'focus_keyword' ) { echo 'selected'; } ?> >Focus keyword</option>
	 		</select>
	 				
		<?php

	}

	function efi_wc_alt_option_two() {

		$efi_wc_alt_option_two = get_option( 'efi_wc_alt_option_two' );

		?>

			<select id="efi_wc_alt_option_two" name="efi_wc_alt_option_two">
	 			<option value="" selected="selected">Choose option</option>
	 			<option value="blog_title" <?php if( $efi_wc_alt_option_two == 'blog_title' ) { echo 'selected'; } ?> >Blog title</option>
	 			<option value="post_title" <?php if( $efi_wc_alt_option_two == 'post_title' ) { echo 'selected'; } ?> >Product name</option>
	 			<option value="focus_keyword" class="focus_keyword" <?php if( function_exists( 'wpseo_activate' ) ) { echo 'enabled'; } else { echo 'disabled';	} ?> <?php if( $efi_wc_alt_option_two == 'focus_keyword' ) { echo 'selected'; } ?> >Focus keyword</option>
	 		</select>
	 				
		<?php

	}

	function efi_wc_alt_option_three() {

		$efi_wc_alt_option_three = get_option( 'efi_wc_alt_option_three' );

		?>

			<select id="efi_wc_alt_option_three" name="efi_wc_alt_option_three">
	 			<option value="" selected="selected">Choose option</option>
	 			<option value="blog_title" <?php if( $efi_wc_alt_option_three == 'blog_title' ) { echo 'selected'; } ?> >Blog title</option>
	 			<option value="post_title" <?php if( $efi_wc_alt_option_three == 'post_title' ) { echo 'selected'; } ?> >Product name</option>
	 			<option value="focus_keyword" class="focus_keyword" <?php if( function_exists( 'wpseo_activate' ) ) { echo 'enabled'; } else { echo 'disabled';	} ?> <?php if( $efi_wc_alt_option_three == 'focus_keyword' ) { echo 'selected'; } ?> >Focus keyword</option>
	 		</select>
	 				
		<?php

	}

	//embeded images title settings

	function efi_wc_title_section_text() {
		
		?>
			<h4>Choose the way WooCommerce products embeded images title attributes are set</h4>
			<p>[Option one][Option two][Option three]</p>
			<p>Leave empty if you don't want to use any of the options</p>

		<?php
	}

	function efi_wc_title_option_one() {

		$efi_wc_title_option_one = get_option( 'efi_wc_title_option_one' );
		
		?>

			<select id="efi_wc_title_option_one" name="efi_wc_title_option_one">
	 			<option selected="selected" value="">Choose option</option>
	 			<option value="blog_title" <?php if( $efi_wc_title_option_one == 'blog_title' ) { echo 'selected'; } ?> >Blog title</option>
	 			<option value="post_title" <?php if( $efi_wc_title_option_one == 'post_title' ) { echo 'selected'; } ?> >Product name</option>
	 			<option value="focus_keyword" class="focus_keyword" <?php if( function_exists( 'wpseo_activate' ) ) { echo 'enabled'; } else { echo 'disabled';	} ?> <?php if( $efi_wc_title_option_one == 'focus_keyword' ) { echo 'selected'; } ?> >Focus keyword</option>
	 		</select>
	 				
		<?php

	}

	function efi_wc_title_option_two() {
		
		$efi_wc_title_option_two = get_option( 'efi_wc_title_option_two' );

		?>

			<select id="efi_wc_title_option_two" name="efi_wc_title_option_two">
	 			<option selected="selected" value="">Choose option</option>
				<option value="blog_title" <?php if( $efi_wc_title_option_two == 'blog_title' ) { echo 'selected'; } ?> >Blog title</option>
	 			<option value="post_title" <?php if( $efi_wc_title_option_two == 'post_title' ) { echo 'selected'; } ?> >Product name</option>
	 			<option value="focus_keyword" class="focus_keyword" <?php if( function_exists( 'wpseo_activate' ) ) { echo 'enabled'; } else { echo 'disabled';	} ?> <?php if( $efi_wc_title_option_two == 'focus_keyword' ) { echo 'selected'; } ?> >Focus keyword</option>
	 		</select>
	 				
		<?php

	}

	function efi_wc_title_option_three() {
		
		$efi_wc_title_option_three = get_option( 'efi_wc_title_option_three' );

		?>

			<select id="efi_wc_title_option_three" name="efi_wc_title_option_three">
	 			<option selected="selected" value="">Choose option</option>
				<option value="blog_title" <?php if( $efi_wc_title_option_three == 'blog_title' ) { echo 'selected'; } ?> >Blog title</option>
	 			<option value="post_title" <?php if( $efi_wc_title_option_three == 'post_title' ) { echo 'selected'; } ?> >Product name</option>
	 			<option value="focus_keyword" class="focus_keyword" <?php if( function_exists( 'wpseo_activate' ) ) { echo 'enabled'; } else { echo 'disabled';	} ?> <?php if( $efi_wc_title_option_three == 'focus_keyword' ) { echo 'selected'; } ?> >Focus keyword</option>
	 		</select>
	 				
		<?php

	}

	
	//Validate inputs

	function sfi_select_validation( $option ) {
		
		$option = sanitize_text_field( $option );
		
		$valid_values = array( '', 'blog_title', 'post_title', 'focus_keyword' );

		if( !in_array( $option, $valid_values) ) {
			wp_die( __( 'Invalid input. Try again.', 'sffi' ) );
		}

		return $option;
	}

	function sffi_options() {
		
	 	if ( !current_user_can( 'manage_options' ) )  {
	 		wp_die( __( 'You do not have sufficient permissions to access this page.', 'sffi' ) );
	 	}
	 	?>

	    <div class="wrap">
	     
	        <div id="icon-themes" class="icon32"></div>
	        <h2>SEO Friendly Images Options</h2>
	        <?php settings_errors(); ?>
	        <?php
				if( isset( $_GET[ 'tab' ] ) ) {
				    $active_tab = $_GET[ 'tab' ];
				} else {
					$active_tab = isset( $_GET[ 'tab' ] ) ? $_GET[ 'tab' ] : 'sfi-general';
				}
			?>
	        <h2 class="nav-tab-wrapper">
			    <a href="?page=seo-friendly-images&tab=sfi-general" class="nav-tab <?php echo $active_tab == 'sfi-general' ? 'nav-tab-active' : ''; ?>">General</a>
			    <a href="?page=seo-friendly-images&tab=featured-images" class="nav-tab <?php echo $active_tab == 'featured-images' ? 'nav-tab-active' : ''; ?>">Featured images</a>
			    <a href="?page=seo-friendly-images&tab=embeded-images" class="nav-tab <?php echo $active_tab == 'embeded-images' ? 'nav-tab-active' : ''; ?>">Embeded images</a>
			
			<?php if ( class_exists( 'WooCommerce' ) ) { ?>			    
				    <a href="?page=seo-friendly-images&tab=wc-featured-images" class="nav-tab <?php echo $active_tab == 'wc-featured-images' ? 'nav-tab-active' : ''; ?>">WC Featured images</a>
				    <a href="?page=seo-friendly-images&tab=wc-embeded-images" class="nav-tab <?php echo $active_tab == 'wc-embeded-images' ? 'nav-tab-active' : ''; ?>">WC Embeded images</a>
			<?php } ?>
			</h2>
 		
		 	<?php
	
				if( $active_tab == 'sfi-general' ) {	
					
					settings_fields( 'sfi-group' );
					do_settings_sections( 'sfi-general' );
	 		
				} elseif ( $active_tab == 'featured-images' ) {
	 			
	 		?>
					<form method="post" action="options.php">
	 		<?php
	 					settings_fields( 'sfi-group' );
	 					do_settings_sections( 'sffi' );
	 		?>
	 					<input class="button button-primary" name="Submit" type="submit" value="<?php esc_attr_e('Save featured images settings'); ?>" />
	 				</form>
	 			
	 		<?php
	 		
	 			} elseif ( $active_tab == 'wc-featured-images' ) {
	 			
	 		?>
	 				<form method="post" action="options.php">
	 		<?php
	 					settings_fields( 'sfi-wc-group' );
	 					do_settings_sections( 'sffi-wc' );
	 		
	 		?>
	 					<input class="button button-primary" name="Submit" type="submit" value="<?php esc_attr_e('Save products featured images settings'); ?>" />
	 				</form>
	 		<?php
	 			
	 			} elseif ( $active_tab == 'wc-embeded-images' ) {
	 			
	 		?>
	 				<form method="post" action="options.php">
	 			
	 		<?php
	 			
	 					settings_fields( 'efi-wc-group' );
	 					do_settings_sections( 'efi-wc' );
	 			
	 		?>
	 					<input class="button button-primary" name="Submit" type="submit" value="<?php esc_attr_e( 'Save products embeded images settings'); ?>" />
	 				
	 				</form>

	 		<?php
	 		
	 			} else {
	 			
	 		?>
	 				<form method="post" action="options.php">
	 			
	 		<?php
	 		
	 				settings_fields( 'efi-group' );
	 				do_settings_sections( 'efi' );
	 			
	 		?>
	 		
	 				<input class="button button-primary" name="Submit" type="submit" value="Save embeded images settings" />
	 			
	 				</form>
	 			
	 		<?php } ?>

		</div>

		<?php

	}


}//sfiSettings
