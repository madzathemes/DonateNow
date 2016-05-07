<style type="text/css">

<?php global $post; $section_id = $post->ID; ?>

<?php $args = array( 'post_type' => 'mt_section'); ?>
	
<?php $query = new WP_Query( $args ); ?>
			
<?php while ( $query->have_posts() ) : $query->the_post(); ?>

	<?php global $post; ?>
	
	<?php if(is_front_page() and get_post_meta($post->ID, "mt_check_page_home", true) == "on") { ?>
	
		.mt-style-<?php echo $post->ID; ?> { 
			
				<?php if(get_post_meta($post->ID, "mt_padding_top", true)!="")		{ ?>padding-top:<?php echo get_post_meta($post->ID, "mt_padding_top", true); ?>; <?php } ?>
				<?php if(get_post_meta($post->ID, "mt_padding_bottom", true)!="") 	{ ?>padding-bottom:<?php echo get_post_meta($post->ID, "mt_padding_bottom", true); ?>; <?php } ?>
				
				<?php $mt_section_bg = get_post_meta($post->ID, "mt_bg", true); ?>
				
				<?php if($mt_section_bg['background-color'] != "")					{ echo "background-color:"; echo $mt_section_bg['background-color']; echo ";";  } ?>
				<?php if($mt_section_bg['background-repeat'] != "")					{ echo "background-repeat:"; echo $mt_section_bg['background-repeat']; echo ";";  } ?>			
				<?php if($mt_section_bg['background-position'] != "")				{ echo "background-position:"; echo $mt_section_bg['background-position']; echo ";"; } ?> 			
				<?php if($mt_section_bg['background-image'] != "")					{ echo "background-image:url('"; echo $mt_section_bg['background-image']; echo "');";  } ?>			  						
				<?php if($mt_section_bg['background-attachment'] != "")				{ echo "background-attachment:"; echo $mt_section_bg['background-attachment']; echo ";"; } ?>	
				
				<?php if(get_post_meta($post->ID, "mt_css", true)!="")				{ echo get_post_meta($post->ID, "mt_css", true); } ?>
			
		} 	
		
				
				
		
	<?php } else if(get_post_meta($section_id, "mb_page_sections_in", true)!="") { ?>
					
		.mt-style-<?php echo $post->ID; ?> { 
				
				<?php if(get_post_meta($post->ID, "mt_padding_top", true)!="")		{ ?>padding-top:<?php echo get_post_meta($post->ID, "mt_padding_top", true); ?>; <?php } ?>
				<?php if(get_post_meta($post->ID, "mt_padding_bottom", true)!="") 	{ ?>padding-bottom:<?php echo get_post_meta($post->ID, "mt_padding_bottom", true); ?>; <?php } ?>
								
				<?php $mt_section_bg = get_post_meta($post->ID, "mt_bg", true); ?>
				
				<?php if($mt_section_bg['background-color'] != "")					{ echo "background-color:"; echo $mt_section_bg['background-color']; echo ";";  } ?>
				<?php if($mt_section_bg['background-repeat'] != "")					{ echo "background-repeat:"; echo $mt_section_bg['background-repeat']; echo ";";  } ?>			
				<?php if($mt_section_bg['background-position'] != "")				{ echo "background-position:"; echo $mt_section_bg['background-position']; echo ";"; } ?> 			
				<?php if($mt_section_bg['background-image'] != "")					{ echo "background-image:url('"; echo $mt_section_bg['background-image']; echo "');";  } ?>			  						
				<?php if($mt_section_bg['background-attachment'] != "")				{ echo "background-attachment:"; echo $mt_section_bg['background-attachment']; echo ";"; } ?>	
				
				<?php if(get_post_meta($post->ID, "mt_css", true)!="")				{ echo get_post_meta($post->ID, "mt_css", true); } ?>
			
		} 	
			
												
	<?php } ?>
	
	
										
<?php endwhile; wp_reset_query(); ?>



<?php 
	global $post;
	if (is_front_page()) { 
	
					$mt_color_type = ot_get_option("mt_colors_homepage"); 
		
	} else if ( get_post_meta($post->ID, "mt_colors_page_2", true)!="") { 
	
					$mt_color_type = get_post_meta($post->ID, "mt_colors_page_2", true); 
	
	} else { 
	
					$mt_color_type = ot_get_option("mt_colors_default"); 
					
	}
	
?>



#mega_main_menu.header_menu > .menu_holder > .menu_inner > ul > li:hover > .item_link, 
#mega_main_menu.header_menu > .menu_holder > .menu_inner > ul > li > .item_link:hover, 
#mega_main_menu.header_menu > .menu_holder > .menu_inner > ul > li > .item_link:focus, 
#mega_main_menu.header_menu > .menu_holder > .menu_inner > ul > li:hover > .item_link *, 
#mega_main_menu.header_menu > .menu_holder > .menu_inner > ul > li.current-menu-ancestor > .item_link, 
#mega_main_menu.header_menu > .menu_holder > .menu_inner > ul > li.current-menu-ancestor > .item_link *, 
#mega_main_menu.header_menu > .menu_holder > .menu_inner > ul > li.current-menu-item > .item_link,
#mega_main_menu.header_menu > .menu_holder > .menu_inner > ul > li.current-menu-item > .item_link *,
#mega_main_menu.header_menu > .menu_holder > .menu_inner > ul > li .mega_dropdown .item_link:hover, 
#mega_main_menu.header_menu > .menu_holder > .menu_inner > ul > li .mega_dropdown .item_link:focus, 
#mega_main_menu.header_menu > .menu_holder > .menu_inner > ul > li .mega_dropdown .item_link:hover *, #mega_main_menu.header_menu > .menu_holder > .menu_inner > ul > li .mega_dropdown .item_link:focus *, #mega_main_menu.header_menu ul li.default_dropdown .mega_dropdown > li:hover > .item_link *, #mega_main_menu.header_menu ul li.default_dropdown .mega_dropdown > li.current-menu-item > .item_link *, #mega_main_menu.header_menu ul li.multicolumn_dropdown .mega_dropdown > li > .item_link:hover *, #mega_main_menu.header_menu ul li.multicolumn_dropdown .mega_dropdown > li.current-menu-item > .item_link *, #mega_main_menu.header_menu ul li.post_type_dropdown .mega_dropdown > li:hover > .item_link *, #mega_main_menu.header_menu ul li.post_type_dropdown .mega_dropdown > li.current-menu-item > .item_link *, #mega_main_menu.header_menu ul li.grid_dropdown .mega_dropdown > li:hover > .item_link *, #mega_main_menu.header_menu ul li.grid_dropdown .mega_dropdown > li a:hover *, #mega_main_menu.header_menu ul li.grid_dropdown .mega_dropdown > li.current-menu-item > .item_link *, #mega_main_menu.header_menu ul li.post_type_dropdown .mega_dropdown > li > .processed_image:hover > .cover > a > i { color: <?php echo $mt_color_type; ?>!important;}

/* Header 1, 2 border */
.mt_style_header_1 #mega_main_menu.header_menu > .menu_holder > .menu_inner > ul > li:hover > .item_link, 
.mt_style_header_1 #mega_main_menu.header_menu > .menu_holder > .menu_inner > ul > li > .item_link:hover, 
.mt_style_header_1 #mega_main_menu.header_menu > .menu_holder > .menu_inner > ul > li > .item_link:focus, 
.mt_style_header_1 #mega_main_menu.header_menu > .menu_holder > .menu_inner > ul > li.current-menu-ancestor > .item_link, 
.mt_style_header_1 #mega_main_menu.header_menu > .menu_holder > .menu_inner > ul > li.current-menu-item > .item_link,
.mt_style_header_4 #mega_main_menu.header_menu > .menu_holder > .menu_inner > ul > li:hover > .item_link, 
.mt_style_header_4 #mega_main_menu.header_menu > .menu_holder > .menu_inner > ul > li > .item_link:hover, 
.mt_style_header_4 #mega_main_menu.header_menu > .menu_holder > .menu_inner > ul > li > .item_link:focus, 
.mt_style_header_4 #mega_main_menu.header_menu > .menu_holder > .menu_inner > ul > li.current-menu-ancestor > .item_link, 
.mt_style_header_4 #mega_main_menu.header_menu > .menu_holder > .menu_inner > ul > li.current-menu-item > .item_link { border-top: 1px solid <?php echo $mt_color_type; ?>; }

/* Header 2, 3 style fix */
.mt_style_header_2 #mega_main_menu.header_menu > .menu_holder > .menu_inner > ul > li:hover > .item_link, 
.mt_style_header_2 #mega_main_menu.header_menu > .menu_holder > .menu_inner > ul > li > .item_link:hover, 
.mt_style_header_2 #mega_main_menu.header_menu > .menu_holder > .menu_inner > ul > li > .item_link:focus, 
.mt_style_header_2 #mega_main_menu.header_menu > .menu_holder > .menu_inner > ul > li:hover > .item_link *, 
.mt_style_header_2 #mega_main_menu.header_menu > .menu_holder > .menu_inner > ul > li.current-menu-ancestor > .item_link, 
.mt_style_header_2 #mega_main_menu.header_menu > .menu_holder > .menu_inner > ul > li.current-menu-ancestor > .item_link *, 
.mt_style_header_2 #mega_main_menu.header_menu > .menu_holder > .menu_inner > ul > li.current-menu-item > .item_link,
.mt_style_header_2 #mega_main_menu.header_menu > .menu_holder > .menu_inner > ul > li.current-menu-item > .item_link *,
.mt_style_header_3 #mega_main_menu.header_menu > .menu_holder > .menu_inner > ul > li:hover > .item_link, 
.mt_style_header_3 #mega_main_menu.header_menu > .menu_holder > .menu_inner > ul > li > .item_link:hover, 
.mt_style_header_3 #mega_main_menu.header_menu > .menu_holder > .menu_inner > ul > li > .item_link:focus, 
.mt_style_header_3 #mega_main_menu.header_menu > .menu_holder > .menu_inner > ul > li:hover > .item_link *, 
.mt_style_header_3 #mega_main_menu.header_menu > .menu_holder > .menu_inner > ul > li.current-menu-ancestor > .item_link, 
.mt_style_header_3 #mega_main_menu.header_menu > .menu_holder > .menu_inner > ul > li.current-menu-ancestor > .item_link *, 
.mt_style_header_3 #mega_main_menu.header_menu > .menu_holder > .menu_inner > ul > li.current-menu-item > .item_link,
.mt_style_header_3 #mega_main_menu.header_menu > .menu_holder > .menu_inner > ul > li.current-menu-item > .item_link * { background-color: <?php echo $mt_color_type; ?>!important; color: white!important;  }

.mt_donation_button {  background-color: <?php echo $mt_color_type; ?>; }


	
#mb_home_button_home, #mb_home_button:hover,
ul.sf-menu li.current-cat > a, div.sf-menu ul li.current-cat > a,
ul.sf-menu li.current-menu-item > a, div.sf-menu ul li.current-menu-item > a,
ul.sf-menu li.current_page_item > a, div.sf-menu ul li.current_page_item > a,
ul.sf-menu li.current-menu-ancestor > a, div.sf-menu ul  li.current-menu-ancestor > a,
ul.sf-menu li a:hover, div.sf-menu ul li a:hover,
.single-post #nav ul li.blogbutton a,
.single-portfolio #nav ul li.portfoliobutton a{ 
	border-top-color: <?php echo $mt_color_type; ?>;
	color: <?php echo $mt_color_type; ?>;
}

.mt_style_header_2 .sf-menu li.current-cat > a, 
.mt_style_header_2 .sf-menu li.current_page_item > a, 
.mt_style_header_2 .sf-menu li.current-menu-item > a,
.mt_style_header_2 .sf-menu li a:hover,
.mt_style_header_2 .sf-menu li.current-menu-ancestor > a{ 
	background-color: <?php echo $mt_color_type; ?>;
	color: white
} 

.mt_style_header_3 .sf-menu li.current-cat > a, 
.mt_style_header_3 .sf-menu li.current_page_item > a, 
.mt_style_header_3 .sf-menu li.current-menu-item > a,
.mt_style_header_3 .sf-menu li a:hover,
.mt_style_header_3 .sf-menu li.current-menu-ancestor > a{ 
	background-color: <?php echo $mt_color_type; ?>;
	color: white
} 

ul.sf-menu li.current-cat > a, div.sf-menu ul li.current-cat > a,
ul.sf-menu li.current-menu-item > a, div.sf-menu ul li.current-menu-item > a,
ul.sf-menu li.current_page_item > a, div.sf-menu ul li.current_page_item > a,
ul.sf-menu li.current-menu-ancestor > a, div.sf-menu ul  li.current-menu-ancestor > a,
ul.sf-menu li a:hover, div.sf-menu ul li a:hover,

a:hover,
input:hover,
#full-page-home div div ul li a:hover, 
.menu_categories ul li ul li a:hover, 
#full-page-home div div ul li ul li a:hover,
.meta-date-blog a:hover, 
.meta-category-blog a:hover, 
.meta-author-blog a:hover, 
.meta-tags-blog a:hover, 
.meta-comment-blog a:hover,
.line-breadcrumb-ultra p a:hover,
.line-title-ultra p a:hover,
.comment-author.vcard a:hover,
#title-right-single a div:hover,
.reply a:hover,
.logged-in-as a:hover,
#post-link-button a:hover,
.homepage-blog-post-meta a:hover,
.search-input:hover,
ul#filter a:hover,
.portfolio_link:hover,
.more-link-2 a:hover, 
.more-diva-2 a:hover,
.entry-title a:hover,
#sub-footer a:hover,
ul#filterm li.current a,
ul#filterm li a:hover,
.menu_categories .current-cat a,
.menu_categories ul li:hover a { color: <?php echo $mt_color_type; ?>; }


ul.sf-menu ul li.current-cat > a, div.sf-menu ul ul li.current-cat > a,
ul.sf-menu ul li.current_page_item > a, div.sf-menu ul ul li.current_page_item > a,
ul.sf-menu ul li.current-menu-item > a, div.sf-menu ul ul li.current-menu-item > a,
ul.sf-menu ul li.current-menu-ancestor > a, div.sf-menu ul ul li.current-menu-ancestor > a,
ul.sf-menu ul ul li.current-cat > a, div.sf-menu ul ul ul li.current-cat > a,
ul.sf-menu ul ul li.current-menu-item > a, div.sf-menu ul ul ul li.current-menu-item > a,
ul.sf-menu ul ul li.current_page_item > a, div.sf-menu ul ul ul li.current_page_item > a,
ul.sf-menu ul ul li.current-menu-ancestor > a, div.sf-menu ul ul ul li.current-menu-ancestor > a,
ul.sf-menu ul li a:hover, div.sf-menu ul ul li a:hover {
	border-bottom-color: <?php echo $mt_color_type; ?>;
	color: <?php echo $mt_color_type; ?>!important;
}


.port-file-3 .more-link span:hover,
.footer_widget_midle ul li a:hover,
.post-format-image, .post-format-image-quote, .post-format-image-video, .post-format-image-image, .post-format-image-link, .post-format-image-gallery,
.entry-meta .more-link span:hover,
.more-link.mt-donate-link span,
.ewd_form input[type="submit"]:hover,
#tribe-bar-form .tribe-bar-submit input[type=submit],
.tribe-events-read-more:hover,
.tribe-events-nav-left a:hover,
.tribe-events-list .tribe-events-event-cost span,
.tribe-events-cost,
.tribe-events-back a:hover,
.tribe-events-nav-previous a:hover,
.tribe-events-nav-next a:hover,
.tribe-events-widget-link a:hover,
table.tribe-events-calendar th  { 
	background-color: <?php echo $mt_color_type; ?>!important; color: white!important;
}

.dark-background,
#header-title,
.dark-background-2,
.wpb_button:hover,
#mb-content .form-submit #submit:hover,
.progress-striped .bar {  background-color: <?php echo $mt_color_type; ?>!important; }

.port-file-3 .more-link span:hover,
.wpb_button:hover,
#mb-content .wpcf7-submit:hover,
.entry-meta .more-link span:hover,
.mt_donation_button,
#mb-content .form-submit #submit:hover,
.more-link.mt-donate-link span,
.ewd_form input[type="submit"]:hover,
#tribe-bar-form .tribe-bar-submit input[type=submit],
.tribe-events-read-more:hover,
.tribe-events-nav-left a:hover,
.tribe-events-back a:hover,
.tribe-events-nav-previous a:hover,
.tribe-events-nav-next a:hover,
.tribe-events-widget-link a:hover,
#tribe-events-content table.tribe-events-calendar,
#tribe-events-content .tribe-events-calendar td  {  border-color: <?php echo $mt_color_type; ?>!important; }



<?php 





/* --------------------------------------------------------------------------------------- Footer Style */

if(ot_get_option("footer_partner_logo")!="" AND ot_get_option("footer_partner")=="1"){ ?> #footer-logos { background: url(<?php echo ot_get_option("footer_partner_logo"); ?>) center no-repeat!important; } <?php }


/* --------------------------------------------------------------------------------------- Background Style */
global $post;

$background_color = get_post_meta($post->ID, "madza_style_background_color", true);
$background_color_custom = ot_get_option("color_background");



if(is_front_page()) {

	$mt_slider_height = ot_get_option('mt_homepage_slider_height');
	echo "#mt_3d_slider #viewport, #mt_3d_slider #box, #mt_3d_slider .slide, #slider-nivo, #slider_image { height: ". $mt_slider_height ."px!important; }";
	echo "#mt_3d_slider #time-indicator { top: ". $mt_slider_height ."px!important; } #mb_home_button { background: rgba(19, 19, 19, 0.3)!important; }";

} else {
	
	$mt_slider_height = get_post_meta($post->ID, "mt_page_slider_height", true);
	echo "#mt_3d_slider #viewport, #mt_3d_slider #box, #mt_3d_slider .slide, #slider-nivo, #slider_image { height: ". $mt_slider_height ."px!important; }";
	echo "#mt_3d_slider #time-indicator { top: ". $mt_slider_height ."px!important; }";

}





/* ---------------------------------------------------------------------------------------  Background Style */


$mt_page_bg = get_post_meta($post->ID, "m_page_background", true);

$mt_page_bg_image = "no";
if ( $mt_page_bg !="") {  if ( $mt_page_bg['background-image'] !="" ) { $mt_page_bg_image = "yes"; } }

$mt_page_bg_repeat = "no";
if ( $mt_page_bg !="") { if ( $mt_page_bg['background-repeat'] !="" ) { $mt_page_bg_repeat = "yes"; } }

$mt_page_bg_color = "no";
if ( $mt_page_bg !="") { if ( $mt_page_bg['background-color'] !="" ) { $mt_page_bg_color = "yes"; } }


if(is_front_page()) {
	$mt_homepage_bg_p = ot_get_option('mt_homepage_bg');
	if ( ! empty( $mt_homepage_bg_p )) { 
		if($mt_homepage_bg_p['background-image']!="" and $mt_homepage_bg_p['background-repeat'] != "") {
			if($mt_homepage_bg_p['background-repeat'] != "")		{ echo "body { background-repeat:"; echo $mt_homepage_bg_p['background-repeat']; echo "!important;}";  } 
			if($mt_homepage_bg_p['background-position'] != "")		{ echo "body { background-position:"; echo $mt_homepage_bg_p['background-position']; echo "!important;}";  }  
			if($mt_homepage_bg_p['background-image'] != "")			{ echo "body { background-image:url('"; echo $mt_homepage_bg_p['background-image']; echo "')!important;}";  }  
			if($mt_homepage_bg_p['background-attachment'] != "")	{ echo "body { background-attachment:"; echo $mt_homepage_bg_p['background-attachment']; echo "!important;}";  } 
		}
	}
	if ( ! empty( $mt_homepage_bg_p )) {  
	
		if($mt_homepage_bg_p['background-color'] != "")	{ echo "body { background-color:"; echo $mt_homepage_bg_p['background-color']; echo "!important;}";  } 
		
	}
	
} else { 
	$mt_homepage_bg_p = ot_get_option('mt_defaultpage_bg');
	
	
	if($mt_page_bg_image == "yes" and $mt_page_bg_repeat == "yes" or $mt_page_bg_color == "yes") {
	
		if($mt_page_bg['background-repeat'] != "")			{ echo "body { background-repeat:"; echo $mt_page_bg['background-repeat']; echo "!important;}";  } 				
		if($mt_page_bg['background-position'] != "")		{ echo "body { background-position:"; echo $mt_page_bg['background-position']; echo "!important;}";  }  			
		if($mt_page_bg['background-image'] != "")			{ echo "body { background-image:url('"; echo $mt_page_bg['background-image']; echo "')!important;}";  }  			  						
		if($mt_page_bg['background-attachment'] != "")		{ echo "body { background-attachment:"; echo $mt_page_bg['background-attachment']; echo "!important;}";  }		
	
	} else if ($mt_homepage_bg_p !="") {
	
		if($mt_homepage_bg_p['background-image']!="" and $mt_homepage_bg_p['background-repeat'] != "" and $mt_page_bg_image == "no"  and $mt_page_bg_repeat == "no")  {
		
			if($mt_homepage_bg_p['background-repeat'] != "")		{ echo "body { background-repeat:"; echo $mt_homepage_bg_p['background-repeat']; echo "!important;}";  } 				
			if($mt_homepage_bg_p['background-position'] != "")		{ echo "body { background-position:"; echo $mt_homepage_bg_p['background-position']; echo "!important;}";  }  			
			if($mt_homepage_bg_p['background-image'] != "")			{ echo "body { background-image:url('"; echo $mt_homepage_bg_p['background-image']; echo "')!important;}";  }  			  						
			if($mt_homepage_bg_p['background-attachment'] != "")	{ echo "body { background-attachment:"; echo $mt_homepage_bg_p['background-attachment']; echo "!important;}";  }		
		}
	}
	
	
	if ( $mt_page_bg !="") { 
		if($mt_page_bg['background-color'] != "")	{ echo "body { background-color:"; echo $mt_page_bg['background-color']; echo "!important;}";  } else if($mt_homepage_bg_p['background-color']!="") { echo "body { background-color:"; echo $mt_homepage_bg_p['background-color']; echo "!important;}"; }
	}

}


$title_bg=get_post_meta($post->ID, "m_title_backgrounds", true);

$mt_title_bg_image = "no";
if ( $title_bg !="") {  if ( $title_bg['background-image'] !="" ) { $mt_title_bg_image = "yes"; } }

$mt_title_bg_color = "no";
if ( $title_bg !="") { if ( $title_bg['background-color'] !="" ) { $mt_title_bg_color = "yes"; } }


$mt_title_patterns = get_post_meta($post->ID, "mt_page_title_color_bg_patterns", true);
$mt_title_customize = get_option("themename_theme_options");

if($mt_title_bg_image == "yes" or $mt_title_bg_color == "yes" or $mt_title_patterns!="" and $mt_title_patterns!="off" ) {

	if( get_post_meta($post->ID, "m_title_backgrounds", true) != "") { 
	
		if($title_bg['background-color'] != "")			{ echo "#header-title { background-color:"; echo $title_bg['background-color']; echo "!important;}";  }
		if($title_bg['background-image'] != "")			{ echo "#header-title { background-image:url('"; echo $title_bg['background-image']; echo "')!important;}";  } 	
		if($title_bg['background-repeat'] != "")		{ echo "#header-title { background-repeat:"; echo $title_bg['background-repeat']; echo "!important;}";  } 				
		if($title_bg['background-position'] != "")		{ echo "#header-title { background-position:"; echo $title_bg['background-position']; echo "!important;}";  }  			
		if($title_bg['background-attachment'] != "")	{ echo "#header-title { background-attachment:"; echo $title_bg['background-attachment']; echo "!important;}";  }
		if($title_bg['background-size'] != "")			{ echo "#header-title { background-size:"; echo $title_bg['background-size']; echo "!important;}";  }
		
	} else if($mt_title_patterns!="off") {
					
		echo "#header-title  { background-image:url('"; echo get_template_directory_uri(); echo $mt_title_patterns; echo "')!important; background-repeat:repeat; background-position:center top;}"; 
					
	}
	
} else if ($mt_title_customize !="") {
	
	if($mt_title_customize['image_upload_test_title']!="")  {
		
			if($mt_title_customize['background_repeat_title'] != "")		{ echo "#header-title { background-repeat:"; echo $mt_title_customize['background_repeat_title']; echo "!important;}";  } 				
			if($mt_title_customize['background_position_title'] != "")		{ echo "#header-title { background-position:"; echo $mt_title_customize['background_position_title']; echo "!important;}";  }  			
			if($mt_title_customize['image_upload_test_title'] != "")		{ echo "#header-title { background-image:url('"; echo $mt_title_customize['image_upload_test_title']; echo "')!important;}";  }  			  						
			if($mt_title_customize['background_attachment_title'] != "")	{ echo "#header-title { background-attachment:"; echo $mt_title_customize['background_attachment_title']; echo "!important;}";  }		
	}
}


/* --------------------------------------------------------------------------------------- Slider Style */

$_general_button = ot_get_option("general_button_image");
$_slider_shape = ot_get_option("slider_shapess");
$_nivo_height = ot_get_option("nivo_slider_height");
$_bx_height = ot_get_option("bx_slider_height-out");
$_orbit_height = ot_get_option("orbit_slider_height");
?>

<?php if( $_general_button == "")  {} else        { echo " #general-button { background-image: url( "; echo $_general_button; echo " ) !important } "; } ?>

<?php if($_slider_shape=="true"){}else            { echo "#slider-midle {background:none!important;}"; } ?>
<?php if($_nivo_height)                           { echo "#slider_image {height:"; echo $_nivo_height; echo"px!important;}"; } ?>
<?php if($_bx_height)                             { echo "#slider-bx-ul {height:"; echo $_bx_height; echo"px!important;}"; } ?>
<?php if($_orbit_height)                          { echo "#orbit-slider {height:"; echo $_orbit_height; echo"px!important;}"; } ?>
<?php


/* --------------------------------------------------------------------------------------- Font Style */

$mt_fonts = ot_get_option("googlefont_css");

	
	if($mt_fonts!=""){
		echo ".nav li a strongs, #title-button, .nivo-caption-bg h1, .tp-simpleresponsive .caption, .mega_dropdown .post_title {"; echo $mt_fonts; echo "}"; 
        echo "h1,h2,h3,h4,h5,h6,h1 a,h2 a,h3 a,h4 a,h5 a,h6 a,#title-left h1, .entry-title p, .entry-title p {"; echo $mt_fonts; echo "}";  
	 } else { 
		echo ".nav li a strongs, #title-button, .nivo-caption-bg h1, .tp-simpleresponsive .caption, .mega_dropdown .post_title{ font-family: 'Cabin', sans-serif;}"; 
        echo "h1,h2,h3,h4,h5,h6,h1 a,h2 a,h3 a,h4 a,h5 a,h6 a, .entry-title p {font-family: 'Cabin', sans-serif;}"; 
	 } 
	 



/* --------------------------------------------------------------------------------------- Color Style */


 ?>

</style>