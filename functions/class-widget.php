<?php

function madza_sidebar_widget_init() {


/* --------------------------------------------------------------------------------------- Page Widget Area 1 */


	register_sidebar( array(
		'name' => __( 'Default Sidebar', "madza_translate"),
		'id' => 'sidebar-widget-area-1',
		'description' => __( 'The page sidebar widget area 1', "madza_translate" ),
		'before_widget' => '<div class="menu_categories">',
		'after_widget' => '<div class="clear"></div></div>',
				'before_title' => '<h4 class="widget_h"><span>',
				'after_title' => '</span></h4>',
	) );



/* --------------------------------------------------------------------------------------- Blog Widget Area */


	register_sidebar( array(
		'name' => __( 'Default Blog Sidebar', "madza_translate"),
		'id' => 'sidebar-blog-widget-area',
		'description' => __( 'The blog sidebar widget area' , "madza_translate"),
		'before_widget' => '<div class="menu_categories">',
		'after_widget' => '<div class="clear"></div></div>',
				'before_title' => '<h4 class="widget_h"><span>',
				'after_title' => '</span></h4>',
	) );



/* --------------------------------------------------------------------------------------- Single Widget Area */


	register_sidebar( array(
		'name' => __( 'Default Post Sidebar', "madza_translate"),
		'id' => 'sidebar-single-widget-area',
		'description' => __( 'The single page sidebar widget area' , "madza_translate"),
		'before_widget' => '<div class="menu_categories">',
		'after_widget' => '<div class="clear"></div></div>',
				'before_title' => '<h4 class="widget_h"><span>',
				'after_title' => '</span></h4>',
	) );



/* --------------------------------------------------------------------------------------- Archive Widget Area 

	register_sidebar( array(
		'name' => __( 'Archive Page Sidebar Widget Area', "madza_translate"),
		'id' => 'sidebar-archive-widget-area',
		'description' => __( 'The single page sidebar widget area' , "madza_translate"),
		'before_widget' => '<div class="menu_categories">',
		'after_widget' => '</div>',
		'before_title' => '<div class="widget_span">',
		'after_title' => '</div>',
	) );


/* --------------------------------------------------------------------------------------- Event Widget Area */

if(function_exists( 'tribe_is_event' ) ) {
	register_sidebar( array(
		'name' => __( 'Event Calendar Sidebar', "madza_translate"),
		'id' => 'sidebar-event-widget-area',
		'description' => __( 'The event sidebar widget area' , "madza_translate"),
		'before_widget' => '<div class="menu_categories">',
		'after_widget' => '<div class="clear"></div></div>',
				'before_title' => '<h4 class="widget_h"><span>',
				'after_title' => '</span></h4>',
	) );
}	

/* --------------------------------------------------------------------------------------- Portfolio Widget Area */

#function sidebar_widget_portfolio() {
#	register_sidebar( array(
#		'name' => __( 'Portfolio Page Sidebar Widget Area', "madza_translate"),
#		'id' => 'sidebar-portfolio-widget-area',
#		'description' => __( 'The portfolio page sidebar widget area' , "madza_translate"),
#		'before_widget' => '<div class="menu_categories">',
#		'after_widget' => '</div>',
#		'before_title' => '<div class="widget_span">',
#		'after_title' => '</div>',
#	) );
#}

#add_action( 'widgets_init', 'sidebar_widget_portfolio' );


/* --------------------------------------------------------------------------------------- Search Widget Area */


	register_sidebar( array(
		'name' => __( 'Search Page Sidebar', "madza_translate"),
		'id' => 'sidebar-search-widget-area',
		'description' => __( 'The search page sidebar widget area' , "madza_translate"),
		'before_widget' => '<div class="menu_categories">',
		'after_widget' => '<div class="clear"></div></div>',
				'before_title' => '<h4 class="widget_h"><span>',
				'after_title' => '</span></h4>',
	) );




/* --------------------------------------------------------------------------------------- Footer Widget Areas */

if (ot_get_option('footer_column') == '1_1' OR ot_get_option('footer_column') == '1_2' OR ot_get_option('footer_column') == '1_3' OR ot_get_option('footer_column') == '1_4' OR
    ot_get_option('footer_column') == '1_5' OR ot_get_option('footer_column') == '2_4' OR ot_get_option('footer_column') == '4_2') { 
        
        
            register_sidebar( array(
        		'name' => __( 'Footer Column 1', "madza_translate"),
        		'id' => 'footer-midle-column-1',
        		'description' => __( 'Footer Column 1 Widget Area', "madza_translate" ),
        		'before_widget' => '<div class="footer_widget_midle">',
        		'after_widget' => '</div><div class="clear"></div>',
        		'before_title' => '<h2 class="widget_h_3">',
        		'after_title' => '</h2>',
        	) );
       
}

if (ot_get_option('footer_column') == '1_2' OR ot_get_option('footer_column') == '1_3' OR ot_get_option('footer_column') == '1_4' OR
    ot_get_option('footer_column') == '1_5' OR ot_get_option('footer_column') == '2_4' OR ot_get_option('footer_column') == '4_2') { 
        
        
            register_sidebar( array(
        		'name' => __( 'Footer Column 2', "madza_translate"),
        		'id' => 'footer-midle-column-2',
        		'description' => __( 'Footer Column 2 Widget Area', "madza_translate" ),
        		'before_widget' => '<div class="footer_widget_midle">',
        		'after_widget' => '</div><div class="clear"></div>',
        		'before_title' => '<h2 class="widget_h_3">',
        		'after_title' => '</h2>',
        	) );
        
}

if (ot_get_option('footer_column') == '1_3' OR ot_get_option('footer_column') == '1_4' OR
    ot_get_option('footer_column') == '1_5' OR ot_get_option('footer_column') == '2_4' OR ot_get_option('footer_column') == '4_2') { 
        
     
            register_sidebar( array(
        		'name' => __( 'Footer Column 3' , "madza_translate"),
        		'id' => 'footer-midle-column-3',
        		'description' => __( 'Footer Column 3 Widget Area' , "madza_translate"),
        		'before_widget' => '<div class="footer_widget_midle">',
        		'after_widget' => '</div><div class="clear"></div>',
        		'before_title' => '<h2 class="widget_h_3">',
        		'after_title' => '</h2>',
        	) );
        
}

if (ot_get_option('footer_column') == '1_4' OR
    ot_get_option('footer_column') == '1_5') { 
        
                   register_sidebar( array(
        		'name' => __( 'Footer Column 4', "madza_translate"),
        		'id' => 'footer-midle-column-4',
        		'description' => __( 'Footer Column 4 Widget Area' , "madza_translate"),
        		'before_widget' => '<div class="footer_widget_midle">',
        		'after_widget' => '</div><div class="clear"></div>',
        		'before_title' => '<h2 class="widget_h_3">',
        		'after_title' => '</h2>',
        	) );
       
}

if (ot_get_option('footer_column') == '1_5') { 
    
        
            register_sidebar( array(
        		'name' => __( 'Footer Column 5', "madza_translate"),
        		'id' => 'footer-midle-column-5',
        		'description' => __( 'Footer Column 5 Widget Area', "madza_translate" ),
        		'before_widget' => '<div class="footer_widget_midle">',
        		'after_widget' => '</div><div class="clear"></div>',
        		'before_title' => '<h2 class="widget_h_3">',
        		'after_title' => '</h2>',
        	) );
        
}
}

add_action( 'widgets_init', 'madza_sidebar_widget_init' );
?>