<?php
global $post;

$mt_sidebar = get_post_meta($post->ID, "layout_sidebar", true);


if ($mt_sidebar!="") {

	if ( is_active_sidebar('sidebar-id-'. $mt_sidebar ) ) { 
	
		dynamic_sidebar('sidebar-id-'. $mt_sidebar ); 
		
	} 
}


else if (is_singular("tribe_events")) { 
    
	if ( is_active_sidebar( 'sidebar-event-widget-area' ) ) { 
    
		dynamic_sidebar( 'sidebar-event-widget-area' ); 
	} 
}


else if (is_single()) { 
    
	if ( is_active_sidebar( 'sidebar-single-widget-area' ) ) { 
    
		dynamic_sidebar( 'sidebar-single-widget-area' ); 
	} 
}


else if (is_search()) { 
    
   	if ( is_active_sidebar( 'sidebar-search-widget-area' ) ) { 
    
    	dynamic_sidebar( 'sidebar-search-widget-area' ); 
	}  
}

else if (is_page_template('template-blog.php') or is_category() or is_tag()) { 
    
	if ( is_active_sidebar( 'sidebar-blog-widget-area' ) ) { 
    
		dynamic_sidebar( 'sidebar-blog-widget-area' ); 
	} 
}


else { 


	if(function_exists( 'tribe_is_event' ) ) { 
						
			if (tribe_is_event() && !tribe_is_day() && !is_single()) {  
			
					if ( is_active_sidebar( 'sidebar-event-widget-area' ) ) { 
				    
						dynamic_sidebar( 'sidebar-event-widget-area' ); 
					}   
					
			} else { 
			
					if ( is_active_sidebar( 'sidebar-widget-area-1' ) ) { 
    
						dynamic_sidebar( 'sidebar-widget-area-1' ); 
					}  
			} 
			
	} else { 
	
		if ( is_active_sidebar( 'sidebar-widget-area-1' ) ) { 
    
			dynamic_sidebar( 'sidebar-widget-area-1' ); 
			
		} 
	
	} 
	
 }
 
?>