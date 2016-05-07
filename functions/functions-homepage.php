<?php

/* --------------------------------------------------------------------------------------- Homepage Content Function */

function function_homepage_content(){ 

	if (ot_get_option('homepage_frompage') != "") {
	
		$page_id = ot_get_option('homepage_frompage'); 
		
		$page_data = get_page( $page_id ); 
		
		$content = apply_filters('the_content', $page_data->post_content); 
		
		echo $content; 
		?>
	
	<div class="clear"></div>
	
	<?php
	}
}
add_action('function_homepage_content', 'function_homepage_content'); 

?>