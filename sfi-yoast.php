<?php
/*
*
* Handle yoast integration
*
*/

function get_yoast_focus_keyword( $id ) {
		
	$sfi_yoast_focus_keyword = get_post_meta( $id, '_yoast_wpseo_focuskw' , true );		
	return $sfi_yoast_focus_keyword;

}
