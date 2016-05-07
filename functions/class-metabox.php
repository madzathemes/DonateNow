<?php

/* Author: Madars Bitenieks */

/*----------------------------------*/
$mt_o = get_option("themename_theme_options");

#if($mt_o['mt_rewrite_doctor']!="") { $mt_cpt_doctor = $mt_o['mt_rewrite_doctor']; } else { $mt_cpt_doctor = "our-doctors";}  
#if($mt_o['mt_rewrite_services']!="") { $mt_cpt_services = $mt_o['mt_rewrite_services']; } else { $mt_cpt_services = "our-services";}  
if($mt_o['mt_rewrite_causes']!="") { $mt_cpt_causes = $mt_o['mt_rewrite_causes']; } else { $mt_cpt_causes = "our-causes";}  
if($mt_o['mt_rewrite_portfolio']!="") { $mt_cpt_portfolio = $mt_o['mt_rewrite_portfolio']; } else { $mt_cpt_portfolio = "portfolio";} 

/*----------------------------------*/

/*-----------------------------------------------------------------------------------*/
/*	EVENT Custom Post  -------------------------------------------------------------*/
/*---------------------------------------------------------------------------------*/

function mt_section() {
  $labels = array(
    'name' => _x('Page Sections', 'post type general name', 'madza_translate'),
    'singular_name' => _x('Page Section', 'post type singular name', 'madza_translate'),
    'add_new' => _x('Add Page Section', 'Events Item', 'madza_translate'),
    'add_new_item' => __('Add New Page Section', 'madza_translate'),
    'edit_item' => __('Edit Page Section', 'madza_translate'),
    'new_item' => __('New Page Section', 'madza_translate'),
    'view_item' => __('View Page Section Details', 'madza_translate'),
    'search_items' => __('Search Page Section', 'madza_translate'),
    'not_found' =>  __('No Page Section were found with that criteria', 'madza_translate'),
    'not_found_in_trash' => __('No Page Section found in the Trash with that criteria', 'madza_translate'),
    'view' =>  __('View Page Section', 'madza_translate')   
  );

  $args = array(
    'labels' => $labels,
    'label' => __('Page Sections', 'madza_translate'),
    'singular_label' => __('Page Section', 'madza_translate'),
    'public' => true,
    'show_ui' => true,
    '_builtin' => false,
    'capability_type' => 'page',
    'exclude_from_search' => true,
    'hierarchical' => true,
    'rewrite' => true,
    'menu_position' => 30,
    'menu_icon' => get_template_directory_uri().'/images/mt_icon_event.png',
    'supports' => array('title', 'editor')
  );

  register_post_type('mt_section',$args);
}
add_action('init', 'mt_section');




add_action( 'admin_init', 'mt_section_metabox' );

function mt_section_metabox() {

  $mt_section_metabox = array(
    'id'        => 'mt_section_metabox',
    'title'     => 'Options',
    'desc'      => '',
    'pages' => 'mt_section',
    'context'   => 'normal',
    'priority'  => 'high',
    'fields'    => array(
    
    array(
        'id'          => 'mt_check_page_home',
        'label'       => 'Show on Home Page',
        'desc'        => '',
        'std'         => '',
        'type'        => 'select',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => '',
        'choices'     => array( 
          array(
            'value'       => 'on',
            'label'       => 'On',
            'src'         => ''
          ), 
          array(
            'value'       => 'off',
            'label'       => 'Off',
            'src'         => ''
          )
         )

      ),
	           
		array(
        'id'          => 'mt_sorting',
        'label'       => 'Homepage Sorting Value',
        'std'         => '1',
        'type'        => 'text',
        'class'       => '',
        'choices'     => array()
         ),
         array(
        'id'          => 'mt_bg',
        'label'       => 'Background Style',
        'desc'        => '',
        'std'         => '',
        'type'        => 'background',
        'class'       => '',
        'choices'     => array()
         ),
         
          array(
        'id'          => 'mt_padding_top',
        'label'       => 'Padding Top',
        'desc'        => '',
        'std'         => '20px',
        'type'        => 'text',
        'class'       => '',
        'choices'     => array()
         ),
         array(
        'id'          => 'mt_padding_bottom',
        'label'       => 'Padding Bottom',
        'desc'        => '',
        'std'         => '20px',
        'type'        => 'text',
        'class'       => '',
        'choices'     => array()
         ),
         
        array(
        'id'          => 'mt_class',
        'label'       => 'class',
        'desc'        => '',
        'std'         => '',
        'type'        => 'text',
        'class'       => '',
        'choices'     => array()
         ),
         array(
        'id'          => 'mt_css',
        'label'       => 'Custom Style',
        'desc'        => '',
        'std'         => '',
        'type'        => 'textarea',
        'class'       => '',
        'choices'     => array()
         )
        
     )
    
  );
  
  ot_register_meta_box( $mt_section_metabox);

}









function madza_events() {
  $labels = array(
    'name' => _x('Events', 'post type general name', 'madza_translate'),
    'singular_name' => _x('Events', 'post type singular name', 'madza_translate'),
    'add_new' => _x('Add Event', 'Events Item', 'madza_translate'),
    'add_new_item' => __('Add New Event', 'madza_translate'),
    'edit_item' => __('Edit Event', 'madza_translate'),
    'new_item' => __('New Event', 'madza_translate'),
    'view_item' => __('View Event Details', 'madza_translate'),
    'search_items' => __('Search Event', 'madza_translate'),
    'not_found' =>  __('No Events were found with that criteria', 'madza_translate'),
    'not_found_in_trash' => __('No Events found in the Trash with that criteria', 'madza_translate'),
    'view' =>  __('View Event', 'madza_translate')   
  );

  $args = array(
    'labels' => $labels,
    'label' => __('Events', 'madza_translate'),
    'singular_label' => __('Event', 'madza_translate'),
    'public' => true,
    'show_ui' => false,
    '_builtin' => false,
    'capability_type' => 'page',
    'exclude_from_search' => true,
    'hierarchical' => true,
    'rewrite' => true,
    'menu_position' => 30,
    'menu_icon' => get_template_directory_uri().'/images/mt_icon_event.png',
    'supports' => array('title', 'editor','thumbnail')
  );

  register_post_type('our-events',$args);
}
add_action('init', 'madza_events');


/*-----------------------------------------------------------------------------------*/
/*	EVENT Staff Post  -------------------------------------------------------------*/
/*---------------------------------------------------------------------------------*/

function madza_staff() {
  $labels = array(
    'name' => _x('Staffs', 'post type general name', 'madza_translate'),
    'singular_name' => _x('Staffs', 'post type singular name', 'madza_translate'),
    'add_new' => _x('Add Staff', 'Staff Item', 'madza_translate'),
    'add_new_item' => __('Add New Staff', 'madza_translate'),
    'edit_item' => __('Edit Staff', 'madza_translate'),
    'new_item' => __('New Staff', 'madza_translate'),
    'view_item' => __('View Staff Details', 'madza_translate'),
    'search_items' => __('Search Staff', 'madza_translate'),
    'not_found' =>  __('No Staff were found with that criteria', 'madza_translate'),
    'not_found_in_trash' => __('No Staff found in the Trash with that criteria', 'madza_translate'),
    'view' =>  __('View Staff', 'madza_translate')   
  );

  $args = array(
    'labels' => $labels,
    'label' => __('Staff', 'madza_translate'),
    'singular_label' => __('Staff', 'madza_translate'),
    'public' => true,
    'show_ui' => false,
    '_builtin' => false,
    'capability_type' => 'page',
    'exclude_from_search' => true,
    'hierarchical' => true,
    'rewrite' => true,
    'menu_position' => 30,
    'menu_icon' => get_template_directory_uri().'/images/mt_icon_staff.png',
    'supports' => array('title', 'editor','thumbnail')
  );

  register_post_type('our-staff',$args);
}
add_action('init', 'madza_staff');


/*-----------------------------------------------------------------------------------*/
/*	EVENT Clients Post  -------------------------------------------------------------*/
/*---------------------------------------------------------------------------------*/

function madza_partners() {
  $labels = array(
    'name' => _x('Partners', 'post type general name', 'madza_translate'),
    'singular_name' => _x('Partners', 'post type singular name', 'madza_translate'),
    'add_new' => _x('Add Partner', 'Partner Item', 'madza_translate'),
    'add_new_item' => __('Add New Partner', 'madza_translate'),
    'edit_item' => __('Edit Client', 'madza_translate'),
    'new_item' => __('New Partner', 'madza_translate'),
    'view_item' => __('View Partner Details', 'madza_translate'),
    'search_items' => __('Search Partner', 'madza_translate'),
    'not_found' =>  __('No Partner were found with that criteria', 'madza_translate'),
    'not_found_in_trash' => __('No Partner found in the Trash with that criteria', 'madza_translate'),
    'view' =>  __('View Partner', 'madza_translate')   
  );

  $args = array(
    'labels' => $labels,
    'label' => __('Partner', 'madza_translate'),
    'singular_label' => __('Partner', 'madza_translate'),
    'public' => true,
    'show_ui' => false,
    '_builtin' => false,
    'capability_type' => 'page',
    'exclude_from_search' => true,
    'hierarchical' => true,
    'rewrite' => true,
    'menu_position' => 30,
    'menu_icon' => get_template_directory_uri().'/images/mt_icon_partner.png',
    'supports' => array('title','thumbnail')
  );

  register_post_type('our-partners',$args);
}
add_action('init', 'madza_partners');



/*-----------------------------------------------------------------------------------*/
/*	CAUSE Custom Post  -------------------------------------------------------------*/
/*---------------------------------------------------------------------------------*/

function madza_causes() {
global $mt_cpt_causes;
  $labels = array(
    'name' => _x('Causes', 'post type general name', 'madza_translate'),
    'singular_name' => _x('Causes', 'post type singular name', 'madza_translate'),
    'add_new' => _x('Add Cause', 'Event Item', 'madza_translate'),
    'add_new_item' => __('Add New Cause', 'madza_translate'),
    'edit_item' => __('Edit Cause', 'madza_translate'),
    'new_item' => __('New Cause', 'madza_translate'),
    'view_item' => __('View Cause Details', 'madza_translate'),
    'search_items' => __('Search Cause', 'madza_translate'),
    'not_found' =>  __('No Causes were found with that criteria', 'madza_translate'),
    'not_found_in_trash' => __('No Causes found in the Trash with that criteria', 'madza_translate'),
    'view' =>  __('View Cause', 'madza_translate')   
  );

  $args = array(
    'labels' => $labels,
    'label' => __('Causes', 'madza_translate'),
    'singular_label' => __('Cause', 'madza_translate'),
    'public' => true,
    'show_ui' => true,
    '_builtin' => false,
    'capability_type' => 'page',
    'exclude_from_search' => true,
    'hierarchical' => true,
    'rewrite' => array('slug' => $mt_cpt_causes),
    'menu_position' => 30,
    'menu_icon' => get_template_directory_uri().'/images/mt_icon_couse.png',
    'supports' => array('title', 'editor','thumbnail')
  );

  register_post_type('causes',$args);
}
add_action('init', 'madza_causes');




/*-----------------------------------------------------------------------------------*/
/*	SIDEBAR Custom Post ------------------------------------------------------------*/
/*---------------------------------------------------------------------------------*/

function madza_sidebar() {
  $labels = array(
    'name' => _x('Sidebars', 'post type general name', 'madza_translate'),
    'singular_name' => _x('Sidebar', 'post type singular name', 'madza_translate'),
    'add_new' => _x('Add Sidebar', 'Event Item', 'madza_translate'),
    'add_new_item' => __('Add New Sidebar', 'madza_translate'),
    'edit_item' => __('Edit Sidebar', 'madza_translate'),
    'new_item' => __('New Sidebar', 'madza_translate'),
    'view_item' => __('View Sidebar Details', 'madza_translate'),
    'search_items' => __('Search Sidebar', 'madza_translate'),
    'not_found' =>  __('No sidebar were found with that criteria', 'madza_translate'),
    'not_found_in_trash' => __('No sidebar found in the Trash with that criteria', 'madza_translate'),
    'view' =>  __('View Item', 'madza_translate')   
  );

  $args = array(
    'labels' => $labels,
    'label' => __('Sidebars', 'madza_translate'),
    'singular_label' => __('Sidebar', 'madza_translate'),
    'public' => true,
    'show_ui' => true,
    '_builtin' => false,
    'capability_type' => 'page',
    'exclude_from_search' => true,
    'hierarchical' => true,
    'rewrite' => true,
    'menu_position' => 30,
    'menu_icon' => get_template_directory_uri().'/images/layout_select_sidebar_icon.png',
    'supports' => array('title')
  );

  register_post_type('mt_sidebar',$args);
}
add_action('init', 'madza_sidebar');





/*-----------------------------------------------------------------------------------*/
/*	PORTFOLIO Custom Post ----------------------------------------------------------*/
/*---------------------------------------------------------------------------------*/

function my_custom_init() {
global $mt_cpt_portfolio;
  $labels = array(
    'name' => _x('Portfolio', 'post type general name', 'madza_translate'),
    'singular_name' => _x('Portfolio', 'post type singular name', 'madza_translate'),
    'add_new' => _x('Add Item', 'Event Item', 'madza_translate'),
    'add_new_item' => __('Add New Item', 'madza_translate'),
    'edit_item' => __('Edit Item', 'madza_translate'),
    'new_item' => __('New Item', 'madza_translate'),
    'view_item' => __('View Item Details', 'madza_translate'),
    'search_items' => __('Search Portfolio Items', 'madza_translate'),
    'not_found' =>  __('No portfolio items were found with that criteria', 'madza_translate'),
    'not_found_in_trash' => __('No portfolio items found in the Trash with that criteria', 'madza_translate'),
    'view' =>  __('View Item', 'madza_translate')   
  );

  $args = array(
    'labels' => $labels,
    'label' => __('Portfolio', 'madza_translate'),
    'singular_label' => __('Portfolio', 'madza_translate'),
    'public' => true,
    'show_ui' => true,
    '_builtin' => false,
    'capability_type' => 'page',
    'hierarchical' => true,
    'rewrite' => array('slug' => $mt_cpt_portfolio),
    'menu_position' => 30,
    'menu_icon' => get_template_directory_uri().'/images/application_gallery_view_icon.png',
    'supports' => array('title', 'editor','thumbnail'),
  );

  register_post_type('portfolio',$args);
}
add_action('init', 'my_custom_init');

$labels = array(
  'name' => ('Categories'),
  'singular_name' => ('Categories'),
  'search_items' =>  __('Search', 'madza_translate'),
  'popular_items' => __('Popular things', 'madza_translate'),
  'all_items' => __( 'Everything' , 'madza_translate'),
  'parent_item' => __( 'Parent Categories', 'madza_translate' ),
  'parent_item_colon' => __( 'Parent Categories:' , 'madza_translate'),
  'edit_item' => __( 'Edit' , 'madza_translate'),
  'update_item' => __( 'Update' , 'madza_translate'),
  'add_new_item' => __( 'Add New' , 'madza_translate'),
  'new_item_name' => __( 'New Name' , 'madza_translate')
);

register_taxonomy('portfolio_cat', array('portfolio'),
	array(
	'hierarchical' => true,
	'labels' => $labels,
	'show_ui' => true,
	'query_var' => true,
	'rewrite' => array('slug' => 'portfolio_categories')
));





/*-----------------------------------------------------------------------------------*/
/*	ALL OTHER METABOX  -------------------------------------------------------------*/
/*---------------------------------------------------------------------------------*/



add_action( 'admin_init', 'custom_meta_boxes_staff' );

function custom_meta_boxes_staff() {

  $custom_meta_boxes_staff = array(
    'id'        => 'custom_meta_boxes_staff',
    'title'     => 'Staff Settings',
    'desc'      => '',
    'pages' => 'our-staff',
    'context'   => 'normal',
    'priority'  => 'high',
    'fields'    => array(
	    
	    array(
        'id'          => 'mt_staff_description',
        'label'       => 'Small Description',
        'desc'        => '',
        'std'         => '',
        'type'        => 'text',
        'class'       => '',
        'choices'     => array()
         ),
                
		array(
        'id'          => 'mt_staff_phone',
        'label'       => 'Phone',
        'desc'        => '',
        'std'         => '',
        'type'        => 'text',
        'class'       => '',
        'choices'     => array()
         ),
         array(
        'id'          => 'mt_staff_email',
        'label'       => 'E-mail',
        'desc'        => '',
        'std'         => '',
        'type'        => 'text',
        'class'       => '',
        'choices'     => array()
         ),
         array(
        'id'          => 'mt_staff_position',
        'label'       => 'Position',
        'desc'        => '',
        'std'         => '',
        'type'        => 'text',
        'class'       => '',
        'choices'     => array()
         ),
        
     )
    
  );
  
  ot_register_meta_box( $custom_meta_boxes_staff);

}

add_action( 'admin_init', 'custom_meta_boxes_events' );

function custom_meta_boxes_events() {

  $custom_meta_boxes_events = array(
    'id'        => 'custom_meta_boxes_events',
    'title'     => 'Event Settings',
    'desc'      => '',
    'pages' => 'our-events',
    'context'   => 'normal',
    'priority'  => 'high',
    'fields'    => array(
	    
	    array(
        'id'          => 'mt_event_location',
        'label'       => 'Location',
        'desc'        => '',
        'std'         => '',
        'type'        => 'text',
        'class'       => '',
        'choices'     => array()
         ),
                
		array(
        'id'          => 'mt_event_time',
        'label'       => 'Time',
        'desc'        => '',
        'std'         => '08:00am - 05:00pm',
        'type'        => 'text',
        'class'       => '',
        'choices'     => array()
         ),
         array(
        'id'          => 'mt_event_another',
        'label'       => 'Another Info',
        'desc'        => '',
        'std'         => '',
        'type'        => 'text',
        'class'       => '',
        'choices'     => array()
         ),
         array(
        'id'          => 'mt_event_date_y',
        'label'       => 'Year',
        'desc'        => '',
        'std'         => '2013',
        'type'        => 'select',
        'class'       => '',
        'choices'     => array(array(
							        'value'   => '2013',
							        'label'   => '2013',
							    ),
							    array(
							        'value'   => '2014',
							        'label'   => '2014',
							    ),
							    array(
							        'value'   => '2015',
							        'label'   => '2015',
							    ),
							    array(
							        'value'   => '2016',
							        'label'   => '2016',
							    ),
							    array(
							        'value'   => '2017',
							        'label'   => '2017',
							    ),
							    array(
							        'value'   => '2018',
							        'label'   => '2018',
							    ),
							    array(
							        'value'   => '2019',
							        'label'   => '2019',
							    ),
							    array(
							        'value'   => '2020',
							        'label'   => '2020',
							    )
							    
							    )
         ),
          array(
        'id'          => 'mt_event_date_m',
        'label'       => 'Month',
        'desc'        => '',
        'std'         => '',
        'type'        => 'select',
        'class'       => '',
        'choices'     => array(
        						array(
							        'value'   => 'Jan',
							        'label'   => 'Jan',
							    ),
							    array(
							        'value'   => 'Feb',
							        'label'   => 'Feb',
							    ),
							    array(
							        'value'   => 'Mar',
							        'label'   => 'Mar',
							    ),
							    array(
							        'value'   => 'Apr',
							        'label'   => 'Apr',
							    ),
							    array(
							        'value'   => 'May',
							        'label'   => 'May',
							    ),
							    array(
							        'value'   => 'Jun',
							        'label'   => 'Jun',
							    ),
							    array(
							        'value'   => 'Jul',
							        'label'   => 'Jul',
							    ),
							    array(
							        'value'   => 'Aug',
							        'label'   => 'Aug',
							    ),
							    array(
							        'value'   => 'Sep',
							        'label'   => 'Sep',
							    ),
							    array(
							        'value'   => 'Oct',
							        'label'   => 'Oct',
							    ),
							    array(
							        'value'   => 'Nov',
							        'label'   => 'Nov',
							    ),
							    array(
							        'value'   => 'Dec',
							        'label'   => 'Dec',
							    )
				 )
         ),
          array(
        'id'          => 'mt_event_date_d',
        'label'       => 'Day',
        'desc'        => '',
        'std'         => '',
        'type'        => 'select',
        'class'       => '',
        'choices'     => array(
        						array(
							        'value'   => '01',
							        'label'   => '01',
							      ),
							      array(
							        'value'   => '02',
							        'label'   => '02',
							      ),
							      array(
							        'value'   => '03',
							        'label'   => '03',
							      ),
							      array(
							        'value'   => '04',
							        'label'   => '04',
							      ),
							      array(
							        'value'   => '05',
							        'label'   => '05',
							      ),
							      array(
							        'value'   => '06',
							        'label'   => '06',
							      ),
							      array(
							        'value'   => '07',
							        'label'   => '07',
							      ),
							      array(
							        'value'   => '08',
							        'label'   => '08',
							      ),
							      array(
							        'value'   => '09',
							        'label'   => '09',
							      ),
							      array(
							        'value'   => '10',
							        'label'   => '10',
							      ),
							      array(
							        'value'   => '11',
							        'label'   => '11',
							      ),
							      array(
							        'value'   => '12',
							        'label'   => '12',
							      ),
							      array(
							        'value'   => '13',
							        'label'   => '13',
							      ),
							      array(
							        'value'   => '14',
							        'label'   => '14',
							      ),
							      array(
							        'value'   => '15',
							        'label'   => '15',
							      ),
							      array(
							        'value'   => '16',
							        'label'   => '16',
							      ),
							      array(
							        'value'   => '17',
							        'label'   => '17',
							      ),
							      array(
							        'value'   => '18',
							        'label'   => '18',
							      ) ,
							      array(
							        'value'   => '19',
							        'label'   => '19',
							      ) ,
							      array(
							        'value'   => '20',
							        'label'   => '20',
							      ) ,
							      array(
							        'value'   => '21',
							        'label'   => '21',
							      ) ,
							      array(
							        'value'   => '22',
							        'label'   => '22',
							      ) ,
							      array(
							        'value'   => '23',
							        'label'   => '23',
							      ) ,
							      array(
							        'value'   => '24',
							        'label'   => '24',
							      ) ,
							      array(
							        'value'   => '25',
							        'label'   => '25',
							      ) ,
							      array(
							        'value'   => '26',
							        'label'   => '26',
							      ) ,
							      array(
							        'value'   => '27',
							        'label'   => '27',
							      ) ,
							      array(
							        'value'   => '28',
							        'label'   => '28',
							      )  ,
							      array(
							        'value'   => '29',
							        'label'   => '29',
							      )      ,
							      array(
							        'value'   => '30',
							        'label'   => '30',
							      )      ,
							      array(
							        'value'   => '31',
							        'label'   => '31',
							      )              
							      
							  )
							  
      ),
         ),
        
     
    
  );
  
  ot_register_meta_box( $custom_meta_boxes_events);

}



add_action( 'admin_init', 'custom_meta_boxes_partners' );

function custom_meta_boxes_partners() {

  $custom_meta_boxes_partners = array(
    'id'        => 'custom_meta_boxes_partners',
    'title'     => 'Partner Settings',
    'desc'      => '',
    'pages' => 'our-partners',
    'context'   => 'normal',
    'priority'  => 'high',
    'fields'    => array(
	           
		array(
        'id'          => 'mt_partners_url',
        'label'       => 'Partner URL',
        'desc'        => '',
        'std'         => 'http://',
        'type'        => 'text',
        'class'       => '',
        'choices'     => array()
          )
        
     )
    
  );
  
  ot_register_meta_box( $custom_meta_boxes_partners);

}






add_action( 'admin_init', 'custom_meta_boxes_causes' );

	function custom_meta_boxes_causes() {

	  $my_meta_box_causes = array(
	    'id'        => 'my_meta_box_causes',
	    'title'     => 'Cause Options',
	    'desc'      => '',
	    'pages' => array('causes'),
	    'context'   => 'normal',
	    'priority'  => 'high',
	    'fields'    => array(
		    
		    array(
	        'id'          => 'mt_causes_button_name',
	        'label'       => 'Donation Button Name',
	        'desc'        => '',
	        'std'         => 'Make a Donation',
	        'type'        => 'text',
	        'class'       => '',
	        'choices'     => array()
	         ),       
			array(
	        'id'          => 'mt_causes_button_url',
	        'label'       => 'Donation Button URL',
	        'desc'        => '',
	        'std'         => '',
	        'type'        => 'text',
	        'class'       => '',
	        'choices'     => array()
	         ),
	         
	         array(
		        'id'          => 'mt_causes_image_size',
		        'label'       => 'Image Type',
		        'desc'        => '',
		        'std'         => '',
		        'type'        => 'select',
		       
		        'class'       => '',
		        'choices'     => array(
		        						array(
									        'value'   => 'large',
									        'label'   => 'Large',
									      ),
									      array(
									        'value'   => 'small',
									        'label'   => 'Small',
									      )
									      
									  )
									  
		     ),
		     
	          array(
		        'id'          => 'mt_portfolio_slider_heigh',
		        'label'       => 'Image Height (px) - in cause template',
		        'desc'        => '',
		        'std'         => '250',
		        'type'        => 'numeric_slider',
		        'min_max_step'=> '100,1000,10',
		        'class'       => '',
		        'choices'     => array()
	          ),
	         array(
		        'id'          => 'mt_portfolio_slider_height',
		        'label'       => 'Image Height (px) - in cause post',
		        'desc'        => '',
		        'std'         => '300',
		        'type'        => 'numeric_slider',
		        'min_max_step'=> '100,1000,10',
		        'class'       => '',
		        'choices'     => array()
	          )
	        
	     ),
	   
	    
	  );
  
  ot_register_meta_box( $my_meta_box_causes );

}


function filter_radio_images( $array, $field_id ) {
  
  /* only run the filter where the field ID is my_radio_images */
  if ( $field_id == 'my_radio_images' ) {
    $array = array(
      array(
        'value'   => 'left-sidebar',
        'label'   => __( 'Left Sidebar', 'madza_translate' ),
        'src'     => OT_URL . '/assets/images/layout/left-sidebar.png'
      ),
      array(
        'value'   => 'right-sidebar',
        'label'   => __( 'Right Sidebar', 'madza_translate' ),
        'src'     => OT_URL . '/assets/images/layout/right-sidebar.png'
      )
    );
  }
  
  return $array;
  
}


add_filter( 'ot_radio_images', 'filter_radio_images', 10, 2 );



add_action( 'admin_init', 'custom_meta_boxes_sta' );

function custom_meta_boxes_sta() {

  $my_meta_box_sta = array(
    'id'        => 'my_meta_box_sta',
    'title'     => 'Post Options',
    'desc'      => '',
    'pages' => 'post',
    'context'   => 'normal',
    'priority'  => 'high',
    'fields'    => array(
	           
		array(
        'id'          => 'mt_portfolio_slider_heightstan',
        'label'       => 'Image Height (px)',
        'desc'        => '',
        'std'         => '200',
        'type'        => 'text',
        'class'       => '',
        'choices'     => array()
          )
        
     )
    
  );
  
  ot_register_meta_box( $my_meta_box_sta );

}



add_action( 'admin_init', 'custom_meta_boxes_image' );

function custom_meta_boxes_image() {

  $my_meta_box_image = array(
    'id'        => 'my_meta_box_image',
    'title'     => 'Post Options',
    'desc'      => '',
    'pages' => 'post',
    'context'   => 'normal',
    'priority'  => 'high',
    'fields'    => array(
	     array(
        'id'          => 'mt_portfolio_slider_height3',
        'label'       => 'Image Height (px)',
        'desc'        => 'Default size: auto.',
        'std'         => '',
        'type'        => 'text',
        'class'       => '',
        'choices'     => array()
          ),
      
          array(
        'id'          => 'mt_portfolio_format_image_url',
        'label'       => 'URL',
        'desc'        => '',
        'std'         => 'http://',
        'type'        => 'text',
        'class'       => '',
        'choices'     => array()
          ),
          array(
        'id'          => 'postm_title_on',
        'label'       => 'Post Title',
        'desc'        => '',
        'std'         => 'off',
        'type'        => 'select',
        'class'       => '',
        'choices'     => array( 
        array(
        'value'   => 'on',
        'label'   => __( 'On', 'madza_translate' )
      ),
      array(
        'value'   => 'off',
        'label'   => __( 'Off', 'madza_translate' )
      ))
      ),
         array(
        'id'          => 'postm_border_on',
        'label'       => 'Post Bottom Border',
        'desc'        => '',
        'std'         => 'on',
        'type'        => 'select',
        'class'       => '',
        'choices'     => array( 
        array(
        'value'   => 'on',
        'label'   => __( 'On', 'madza_translate' )
      ),
      array(
        'value'   => 'off',
        'label'   => __( 'Off', 'madza_translate' )
      ))
      ),)
    
  );
  
  ot_register_meta_box( $my_meta_box_image );

}



#add_action( 'admin_init', 'custom_meta_boxes_au' );

#function custom_meta_boxes_au() {

#  $my_meta_box_au = array(
#    'id'        => 'my_meta_box_au',
#    'title'     => 'Post Options',
#    'desc'      => '',
#    'pages' => 'post',
#    'context'   => 'normal',
#    'priority'  => 'high',
#    'fields'    => array(
#	           
#         array(
#            'id'      => 'slider_embed',
#            'label'   => 'Embed Code',
#            'desc'    => 'Only for embed media code.',
#            'std'     => '',
#           'type'    => 'textarea',
#            'class'   => '',
#            'choices' => array()
#          ),
#          array(
#            'id'      => 'slider_m4v',
#            'label'   => 'Mp3 File URL',
#            'desc'    => 'Only for S/H Audio.',
#            'std'     => '',
#            'type'    => 'text',
#            'class'   => '',
#            'choices' => array()
#          ),
#          array(
#            'id'      => 'slider_ogv',
#            'label'   => 'Wav File URL',
#            'desc'    => 'Only for S/H Audio.',
#           'std'     => '',
#            'type'    => 'text',
#            'class'   => '',
#            'choices' => array()
#          ),
#          array(
#            'id'      => 'slider_webm',
#            'label'   => 'Ogg File URL',
#            'desc'    => 'Only for S/H Audio.',
#            'std'     => '',
#            'type'    => 'text',
#            'class'   => '',
#            'choices' => array()
#          )
#        )
        
        

    
#  );
  
#  ot_register_meta_box( $my_meta_box_au );

#}



add_action( 'admin_init', 'custom_meta_boxes_vid' );

function custom_meta_boxes_vid() {

  $my_meta_box_vid = array(
    'id'        => 'my_meta_box_vid',
    'title'     => 'Post Options',
    'desc'      => '',
    'pages' => 'post',
    'context'   => 'normal',
    'priority'  => 'high',
    'fields'    => array(
	           
          array(
            'id'      => 'slider_embed_post',
            'label'   => 'Embed Code',
            'desc'    => 'Only for embed media code.',
            'std'     => '',
            'type'    => 'textarea',
            'class'   => '',
            'choices' => array()
          ),
          array(
            'id'      => 'slider_height_post3',
            'label'   => 'S/H Video Height(px)',
            'desc'    => 'Only for S/H Video.',
            'std'     => '300',
            'type'    => 'text',
            'class'   => '',
            'choices' => array()
          ),          
          array(
            'id'      => 'slider_m4v_post',
            'label'   => 'Mp4 File URL',
            'desc'    => 'Only for S/H Video.',
            'std'     => '',
            'type'    => 'text',
            'class'   => '',
            'choices' => array()
          ),
          array(
            'id'      => 'slider_ogv_post',
            'label'   => 'OGV File URL',
            'desc'    => 'Only for S/H Video.',
            'std'     => '',
            'type'    => 'text',
            'class'   => '',
            'choices' => array()
          ),
          array(
            'id'      => 'slider_webm_post',
            'label'   => 'WEBM File URL',
            'desc'    => 'Only for S/H Video.',
            'std'     => '',
            'type'    => 'text',
            'class'   => '',
            'choices' => array()
          )
        )
        
        

    
  );
  
  ot_register_meta_box( $my_meta_box_vid );

}



add_action( 'admin_init', 'custom_meta_boxes_quo' );

function custom_meta_boxes_quo() {

  $my_meta_box_quo = array(
    'id'        => 'my_meta_box_quo',
    'title'     => 'Post Options',
    'desc'      => '',
    'pages' => 'post',
    'context'   => 'normal',
    'priority'  => 'high',
    'fields'    => array(
	           
		array(
        'id'          => 'mt_portfolio_format_quo_url',
        'label'       => 'URL',
        'desc'        => '',
        'std'         => 'http://',
        'type'        => 'text',
        'class'       => '',
        'choices'     => array()
          )
        
)
    
  );
  
  ot_register_meta_box( $my_meta_box_quo );

}




add_action( 'admin_init', 'custom_meta_boxes_links' );

function custom_meta_boxes_links() {

  $my_meta_box_links = array(
    'id'        => 'my_meta_box_links',
    'title'     => 'Post Options',
    'desc'      => '',
    'pages' => 'post',
    'context'   => 'normal',
    'priority'  => 'high',
    'fields'    => array(
	           
		array(
        'id'          => 'mt_portfolio_format_link_url',
        'label'       => 'URL',
        'desc'        => '',
        'std'         => 'http://',
        'type'        => 'text',
        'class'       => '',
        'choices'     => array()
          )
        
)
    
  );
  
  ot_register_meta_box( $my_meta_box_links );

}


add_action( 'admin_init', 'custom_meta_boxes9' );

function custom_meta_boxes9() {

  $my_meta_box9 = array(
    'id'        => 'my_meta_box_9',
    'title'     => 'Post Options',
    'desc'      => '',
    'pages' => 'post',
    'context'   => 'normal',
    'priority'  => 'high',
    'fields'    => array(
	           

      array(
        'id'          => 'mb_portfolio_slider',
        'label'       => 'Slider Media',
        'desc'        => '',
        'std'         => '',
        'type'        => 'list-item',
        'section'     => 'general',
        'class'       => 'mt_meta_image',
        'choices'     => array(),
        'settings'    => array(
          array(
            'id'      => 'slider_image',
            'label'   => 'Image',
            'desc'    => '',
            'std'     => '',
            'type'    => 'upload',
            'class'   => '',
            'choices' => array()
          )
        )
        )
)
    
  );
  
  ot_register_meta_box( $my_meta_box9 );

}







add_action( 'admin_init', 'custom_meta_boxes2' );

function custom_meta_boxes2() {

  $my_meta_box2 = array(
    'id'        => 'my_meta_box_2',
    'title'     => 'Page Options',
    'desc'      => '',
    'pages'     => array( 'post', 'page', 'causes', 'tribe_events'),
    'context'   => 'normal',
    'priority'  => 'high',
    'fields'    => array(
     
      array(
        'id'          => 'layout_positions',
        'label'       => 'Layouts',
        'desc'        => '',
        'std'         => 'full',
        'type'        => 'radio-image',
       
        'class'       => '',
        'choices'     => array(
        						array(
							        'value'   => 'right',
							        'label'   => '1',
							        'src'     => get_template_directory_uri().'/images/layout_2.jpg'
							      ),
							      array(
							        'value'   => 'left',
							        'label'   => '2',
							        'src'     => get_template_directory_uri().'/images/layout_1.jpg'
							      ),
							      array(
							        'value'   => 'full',
							        'label'   => '3',
							        'src'     => get_template_directory_uri().'/images/layout_3.jpg'
							      )   
							      
							  )
							  
      ),
       array(
        'id'          => 'layout_sidebar',
        'label'       => 'Sidebar',
        'desc'        => '',
        'std'         => '',
         'post_type'   => 'mt_sidebar',
        'type'        => 'custom-post-type-select',
        'class'       => '',
        'choices'     => array(
					        array(
					        'value'   => 'sidebar_off',
					        'label'   => __( 'Sidebar Off', 'madza_translate' )
					      )
        )
      ),
      array(
        'id'          => 'mb_page_sections_in',
        'label'       => 'Page Sections',
        'desc'        => '',
        'std'         => '',
        'type'        => 'list-item',
        'choices'     => array(),
        'settings'    => array(
          array(
            'id'      => 'section',
            'label'   => 'Page Section',
            'desc'    => '',
            'std'     => '',
            'type'        => 'custom-post-type-select',
            'post_type'   => 'mt_section',
            'class'   => '',
            'choices' => array()
          )
        )
        ),
        array(
		        'id'          => 'mt_paddings_on',
		        'label'       => 'Show page top&bottom paddings',
		        'desc'        => '',
		        'std'         => 'yes',
		        'type'        => 'select',
		        'class'       => '',
		        'choices'     => array( 
				        array(
				        'value'   => 'no',
				        'label'   => __( 'Off', 'madza_translate' )
				      ),
				      array(
				        'value'   => 'yes',
				        'label'   => __( 'On', 'madza_translate' )
				      ))
	      ),
    )
  );
  
  ot_register_meta_box( $my_meta_box2 );

}


add_action( 'admin_init', 'custom_meta_boxes1' );

function custom_meta_boxes1() {

  $my_meta_box = array(
    'id'        => 'my_meta_box_1',
    'title'     => 'Style Options',
    'desc'      => '',
    'pages'     => array( 'post', 'page', 'portfolio', 'causes'),
    'context'   => 'normal',
    'priority'  => 'high',
    'fields'    => array(
    
    array(
        'id'          => 'mt_colors_page_2',
        'label'       => 'Page Colors',
        'desc'        => '',
        'std'         => '',
        'type'        => 'colorpicker',
        'section'     => 'style_options',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'mt_layout_styler_page',
        'label'       => 'Page Layout Style',
        'std'         => '',
        'type'        => 'select',
        'section'     => 'style_options',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => '',
        'choices'     => array( 
          array(
            'value'       => '',
            'label'       => 'Default',
            'src'         => ''
          ), 
          array(
            'value'       => 'free',
            'label'       => 'Boxed and Spaced Layout',
            'src'         => ''
          ), 
          array(
            'value'       => 'box',
            'label'       => 'Boxed Layout',
            'src'         => ''
          ), 
          array(
            'value'       => 'full',
            'label'       => 'Full Width Layout',
            'src'         => ''
          ),  
          array(
            'value'       => 'full_free',
            'label'       => 'Full Width and Spaced Layout',
            'src'         => ''
          ),           
         ),
      ),
      array(
        'id'          => 'm_page_background',
        'label'       => 'Page Background',
        'desc'        => '',
        'std'         => '',
        'type'        => 'background',
        'class'       => '',
        'choices'     => array()
      ),
         
   
      array(
        'id'          => 'm_title_on',
        'label'       => 'Page Title',
        'desc'        => '',
        'std'         => 'on',
        'type'        => 'select',
        'class'       => '',
        'choices'     => array( 
        array(
        'value'   => 'on',
        'label'   => __( 'On', 'madza_translate' )
      ),
      array(
        'value'   => 'off',
        'label'   => __( 'Off', 'madza_translate' )
      ))
      ),
      #array(
      #  'id'          => 'm_title_sub',
      #  'label'       => 'Page Sub Title Text',
      #  'desc'        => '',
      #  'std'         => '',
      #  'type'        => 'text',
      #  'class'       => '',
      #  'choices'     => array()
      #),
      
      array(
        'id'          => 'm_title_backgrounds',
        'label'       => 'Page Title Background',
        'desc'        => '',
        'std'         => '',
        'type'        => 'upload',
        'class'       => '',
        'choices'     => array()
      ),
      
      
      array(
        'id'          => 'm_title_bred',
        'label'       => 'Page Breadcrumb',
        'desc'        => '',
        'std'         => 'on',
        'type'        => 'select',
        'class'       => '',
        'choices'     => array(
        array(
        'value'   => 'on',
        'label'   => __( 'On', 'madza_translate' )
      ),
      array(
        'value'   => 'off',
        'label'   => __( 'Off', 'madza_translate' )
      ))

    ),
    array(
        'id'          => 'mt_style_header',
        'label'       => 'Header Style',
        'desc'        => 'Select Header Style.',
        'std'         => 'style_default',
        'type'        => 'select',
        'section'     => 'style_options',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => '',
        'choices'     => array( 
        
        array(
            'value'       => 'style_default',
            'label'       => 'Default',
            'src'         => ''
          ),
          
          array(
            'value'       => 'style_1',
            'label'       => 'Style 1',
            'src'         => ''
          ), 
          array(
            'value'       => 'style_2',
            'label'       => 'Style 2',
            'src'         => ''
          ), 
          array(
            'value'       => 'style_3',
            'label'       => 'Style 3',
            'src'         => ''
          ),  
          array(
            'value'       => 'style_4',
            'label'       => 'Style 4',
            'src'         => ''
          ),           
         ),
      ),
      
      
      
      
      array(
        'id'          => 'mt_style_image',
        'label'       => 'Image Style',
        'desc'        => 'Select Image Style.',
        'std'         => 'style_default',
        'type'        => 'select',
        'section'     => 'style_options',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => '',
        'choices'     => array( 
        	
        	array(
            'value'       => 'style_default',
            'label'       => 'Default',
            'src'         => ''
          ),
          array(
            'value'       => 'style_1',
            'label'       => 'Style 1',
            'src'         => ''
          ), 
          array(
            'value'       => 'style_2',
            'label'       => 'Style 2',
            'src'         => ''
          ), 
          array(
            'value'       => 'style_3',
            'label'       => 'Style 3',
            'src'         => ''
          ),  
          array(
            'value'       => 'style_4',
            'label'       => 'Style 4',
            'src'         => ''
          ),           
         ),
      ),
      
      array(
        'id'          => 'mt_style_button',
        'label'       => 'Button Style',
        'desc'        => 'Select Button Style.',
        'std'         => 'style_default',
        'type'        => 'select',
        'section'     => 'style_options',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => '',
        'choices'     => array( 
        
          array(
            'value'       => 'style_default',
            'label'       => 'Default',
            'src'         => ''
          ),
          
          array(
            'value'       => 'style_1',
            'label'       => 'Style 1',
            'src'         => ''
          ), 
          array(
            'value'       => 'style_2',
            'label'       => 'Style 2',
            'src'         => ''
          ), 
          array(
            'value'       => 'style_3',
            'label'       => 'Style 3',
            'src'         => ''
          ),  
          array(
            'value'       => 'style_4',
            'label'       => 'Style 4',
            'src'         => ''
          ),           
         ),
      ),
      
      array(
        'id'          => 'mt_style_gradient',
        'label'       => 'Gradient Style',
        'desc'        => 'Select Gradient Style.',
        'std'         => 'style_default',
        'type'        => 'select',
        'section'     => 'style_options',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => '',
        'choices'     => array( 
        	array(
            'value'       => 'style_default',
            'label'       => 'Default',
            'src'         => ''
          ),
          
          array(
            'value'       => 'style_1',
            'label'       => 'On',
            'src'         => ''
          ), 
          array(
            'value'       => 'style_2',
            'label'       => 'Off',
            'src'         => ''
          )
         )
      ),
    
    
    )
  );
  
  ot_register_meta_box( $my_meta_box );

}
add_action( 'admin_init', 'custom_meta_boxes_s' );

function custom_meta_boxes_s() {
	$my_meta_box_s = array(
    'id'        => 'mt_meta_box_s',
    'title'     => 'Page Slider',
    'desc'      => '',
    'pages'     => array( 'post', 'page', 'portfolio' ),
    'context'   => 'normal',
    'priority'  => 'high',
    'fields'    => array(
    	array(
	        'id'          => 'mt_page_slider_type',
	        'label'       => 'Slider Type',
	        'desc'        => '',
	        'std'         => 'on',
	        'type'        => 'select',
	        'class'       => '',
	        'choices'     => array(
	        array(
	        'value'   => 'off',
	        'label'   => __( 'Slider Off', 'madza_translate' )
	      ),
	      array(
	        'value'   => 'flex_slider',
	        'label'   => __( 'Flex Slider (Responsive)', 'madza_translate' )
	      ),
	      array(
	        'value'   => 'shortcode_slider',
	        'label'   => __( 'Slider from Shortcode', 'madza_translate' )
	      )
	      
	      )
	
	    ),
	    array(
        'id'          => 'mt_page_slider_height',
        'label'       => 'Slider Height (px)',
        'desc'        => 'Default Slider Height is 350px.',
        'std'         => '350',
        'type'        => 'text',
        'class'       => '',
        'choices'     => array()
      ),
      
    	array(
        'id'          => 'mt_page_slider',
        'label'       => 'Slider Media',
        'desc'        => '',
        'std'         => '',
        'type'        => 'slider',
        'section'     => 'general',
        'class'       => '',
        'choices'     => array(),
        'settings'    => array(
          
        )),
        array(
        'id'          => 'mt_page_slider_shortcode',
        'label'       => 'Slider Shortcode',
        'desc'        => 'Sample: [layerslider id="1"] or [rev_slider slider_one].',
        'std'         => '',
        'type'        => 'text',
        'class'       => '',
        'choices'     => array()
      ),
      
        )
);

  ot_register_meta_box( $my_meta_box_s );

}



/*-----------------------------------------------------------------------------------*/
/*	Sidebar Custom Post
/*-----------------------------------------------------------------------------------*/

add_action( 'admin_init', 'custom_meta_boxes4' );

function custom_meta_boxes4() {

  $my_meta_box4 = array(
    'id'        => 'my_meta_box_4',
    'title'     => 'Portfolio Options',
    'desc'      => '',
    'pages' => 'portfolio',
    'context'   => 'normal',
    'priority'  => 'high',
    'fields'    => array(
     
      array(
        'id'          => 'layout_positions4',
        'label'       => 'Layouts',
        'desc'        => '',
        'std'         => 'sidebar_1',
        'type'        => 'radio-image',
       
        'class'       => '',
        'choices'     => array(
        						array(
							        'value'   => 'right',
							        'label'   => '1',
							        'src'     => get_template_directory_uri().'/images/layout_2.jpg'
							      ),
							      array(
							        'value'   => 'left',
							        'label'   => '2',
							        'src'     => get_template_directory_uri().'/images/layout_1.jpg'
							      ),
							      #array(
							      #  'value'   => 'full',
							      #  'label'   => '7',
							      #  'src'     => get_template_directory_uri().'/images/layout_7.jpg'
							      #)   
							      
							  )
		),
       array(
        'id'          => 'layout_sidebar',
        'label'       => 'Sidebar',
        'desc'        => '',
        'std'         => '',
         'post_type'   => 'mt_sidebar',
        'type'        => 'custom-post-type-select',
        'class'       => '',
        'choices'     => array(
					        array(
					        'value'   => 'sidebar_off',
					        'label'   => __( 'Sidebar Off', 'madza_translate' )
					      )
        )
      ),
		array(
        'id'          => 'mt_portfolio_slider_height',
        'label'       => 'Slider Height (px)',
        'desc'        => '',
        'std'         => '350',
        'type'        => 'text',
        'class'       => '',
        'choices'     => array()
          )
        ,
        
      array(
        'id'          => 'mb_portfolio_slider',
        'label'       => 'Slider Media',
        'desc'        => '',
        'std'         => '',
        'type'        => 'list-item',
        'section'     => 'general',
        'class'       => '',
        'choices'     => array(),
        'settings'    => array(
          array(
            'id'      => 'slider_image',
            'label'   => 'Image',
            'desc'    => '',
            'std'     => '',
            'type'    => 'upload',
            'class'   => '',
            'choices' => array()
          ),
          array(
            'id'      => 'slider_embed',
            'label'   => 'Embed Code',
            'desc'    => 'Only for embed media code.',
            'std'     => '',
            'type'    => 'textarea',
            'class'   => '',
            'choices' => array()
          ),
          array(
            'id'      => 'slider_m4v',
            'label'   => 'M4V File URL',
            'desc'    => 'Only for S/H Video.',
            'std'     => '',
            'type'    => 'text',
            'class'   => '',
            'choices' => array()
          ),
          array(
            'id'      => 'slider_ogv',
            'label'   => 'OGV File URL',
            'desc'    => 'Only for S/H Video.',
            'std'     => '',
            'type'    => 'text',
            'class'   => '',
            'choices' => array()
          ),
          array(
            'id'      => 'slider_webm',
            'label'   => 'WEBM File URL',
            'desc'    => 'Only for S/H Video.',
            'std'     => '',
            'type'    => 'text',
            'class'   => '',
            'choices' => array()
          )
        )
        ),
        array(
        'id'          => 'mb_portfolio_fields',
        'label'       => 'Portfolio Fields',
        'desc'        => '',
        'std'         => '',
        'type'        => 'list-item',
        'section'     => 'general',
        'class'       => '',
        'choices'     => array(),
        'settings'    => array(
          array(
            'id'      => 'metabox_name',
            'label'   => 'Field Name',
            'desc'    => '',
            'std'     => '',
            'type'    => 'text',
            'class'   => '',
            'choices' => array()
          ),
          array(
            'id'      => 'metabox_text',
            'label'   => 'Field Text',
            'desc'    => '',
            'std'     => '',
            'type'    => 'text',
            'class'   => '',
            'choices' => array()
          ),
          array(
            'id'      => 'metabox_url',
            'label'   => 'Field URL',
            'desc'    => '',
            'std'     => '',
            'type'    => 'text',
            'class'   => '',
            'choices' => array()
          )
        )
        )

)
    
  );
  
  ot_register_meta_box( $my_meta_box4 );

}


add_action( 'admin_init', 'mt_template' );

function mt_template() {

  $mt_template = array(
    'id'        => 'mt_template',
    'title'     => 'Template Options',
    'desc'      => '',
    'pages'     => array('page'),
    'context'   => 'normal',
    'priority'  => 'default',
    'fields'    => array(
    		
    		array(
            'id'      => 'mt_template_item_pp',
            'label'   => 'Items per page',
            'std'     => '0',
            'type'    => 'text',
            'class'   => '',
            'choices' => array()
            ),
            
            array(
            'id'          => 'mt_blog_category',
            'label'       => 'Category for Blog template',
            'std'         => '',
            'type'        => 'taxonomy-select',
            'rows'        => '',
            'post_type'   => 'post',
            'taxonomy'    => 'category',
            'class'       => ''
            ),
            
            array(
            'id'          => 'mt_portfolio_category',
            'label'       => 'Category for Portfolio template',
            'std'         => '',
            'type'        => 'taxonomy-select',
            'rows'        => '',
            'post_type'   => 'portfolio',
            'taxonomy'    => 'portfolio_cat',
            'class'       => ''
            ),
          
    		array(
	        'id'          => 'mt_template_columns',
	        'label'       => 'Columns for Portfolio template',
	        'std'         => '',
	        'type'        => 'select',
	        'rows'        => '',
	        'post_type'   => '',
	        'taxonomy'    => '',
	        'class'       => '',
	        'choices'     => array( 
	          array(
	            'value'       => '4',
	            'label'       => '4 Columns',
	            'src'         => ''
	          ),
	          array(
	            'value'       => '3',
	            'label'       => '3 Columns',
	            'src'         => ''
	          ),
	          array(
	            'value'       => '2',
	            'label'       => '2 Columns',
	            'src'         => ''
	          ),
	          array(
	            'value'       => '1',
	            'label'       => '1 Columns',
	            'src'         => ''
	          )     
	         )
	      ),
	      array(
	        'id'          => 'mt_template_links',
	        'label'       => 'Link type for Portfolio template',
	        'std'         => '',
	        'type'        => 'select',
	        'rows'        => '',
	        'post_type'   => '',
	        'taxonomy'    => '',
	        'class'       => '',
	        'choices'     => array( 
	          array(
	            'value'       => 'permalink',
	            'label'       => 'Permalink',
	            'src'         => ''
	          ),
	          array(
	            'value'       => 'lightbox',
	            'label'       => 'Lightbox',
	            'src'         => ''
	          )     
	         )
	      ),
	      array(
	        'id'          => 'mt_template_menu',
	        'label'       => 'Menu type for Portfolio template',
	        'std'         => '',
	        'type'        => 'select',
	        'rows'        => '',
	        'post_type'   => '',
	        'taxonomy'    => '',
	        'class'       => '',
	        'choices'     => array( 
	          array(
	            'value'       => 'sorting',
	            'label'       => 'Sorting',
	            'src'         => ''
	          ),
	          array(
	            'value'       => 'none',
	            'label'       => 'none',
	            'src'         => ''
	          )     
	         )
	      )
      )

    );
  
  ot_register_meta_box( $mt_template );

}



?>