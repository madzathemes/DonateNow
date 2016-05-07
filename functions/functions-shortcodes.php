<?php

/**
 * @author madars.bitenieks
 * @copyright 2011
 * 
 */
 
/* --------------------------------------------------------------------------------------- List */
 
function ul( $atts, $content = null ) {
	extract( shortcode_atts( array(
            'top' => '15',
            'bottom' => '15',
            'icon' => 'icon-heart',
            'color' => '#444',
            
        ), $atts));
   return '<ul class="mt-ul-shortcode" style="margin-top:'. $top .'px; margin-bottom:'. $bottom .'px;">' . do_shortcode($content) . '</ul>';
}
add_shortcode('ul', 'ul');

function li( $atts, $content = null ) {
	extract( shortcode_atts( array(
            'icon' => 'icon-heart',
            'color' => '#444',
            
        ), $atts));
   return '<li><i style="color:'. $color .';" class="'. $icon .'"></i> ' . do_shortcode($content) . '</li>';
}
add_shortcode('li', 'li');

if (class_exists('WPBakeryShortCode')) { 
 
/* --------------------------------------------------------------------------------------- Spacer */

class WPBakeryShortCode_padding_spacer extends WPBakeryShortCode {

    protected function content($atts, $content = null) {

        extract(shortcode_atts(array(
            'space_count' => ''
        ), $atts));


        $output  = '<div style="padding-top:' . $space_count . 'px">';
        $output .= '</div>';
        
    
        return $output;
    }
}

wpb_map( array(
    "base"        => "padding_spacer",
    "name"        => __("Pading", "js_composer"),
    "class"        => "mb_composer_spacer",
    "icon"      => "icon-resize-small",
    "params"    => array(
    	array(
            "type" => "dropdown",
            "heading" => __("Space size", "js_composer"),
            "param_name" => "space_count",
            "value" => array(1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 30, 31, 32, 33, 34, 35),
            "description" => __("Set pading size.", "js_composer")
        )
        
    )
) 
);



class WPBakeryShortCode_recent_couses_items extends WPBakeryShortCode {

    protected function content($atts, $content = null) {

        extract(shortcode_atts(array(
            'title' => '',
            'url' => ''
        ), $atts));


        
        global $post;
		$myposts = get_posts('post_type=causes&order=DESC&posts_per_page=3');
		$_home_portfolio = '';
		foreach($myposts as $post){
	
		
			setup_postdata($post);
			
			
                        $term_obj =  wp_get_object_terms($post->ID, 'portfolio_cat');
                        $portfolio_title = $post->post_title;
                        $portfolio_taxonomy = get_the_term_list($post->ID, 'portfolio_cat', '', ' ', '' );
                        $portfolio_taxonomy_format = preg_replace('/\<a(.*)\>(.*)\<\/a\>/iU', '<li>$2</li>', $portfolio_taxonomy);
                         $terms_as_text = strip_tags( get_the_term_list( $post->ID, 'portfolio_cat', '', ' ', '' ) );
                        $portfolio_title = $post->post_title;
                        $get_text=get_post_meta($post->ID, "madza_portfolio_hover_text", true);
                        $slides = get_post_meta($post->ID,'slides', true);
                        
                        $thumb = get_post_meta(get_the_ID(), 'tz_portfolio_thumb', TRUE); 
						$large_image_lightbox =  get_post_meta(get_the_ID(), 'tz_portfolio_thumb_lightbox', TRUE); 
						$lightbox = get_post_meta(get_the_ID(), 'tz_portfolio_lightbox', TRUE); 
						$portfolio_caption = get_the_excerpt(); 
						$src = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), array( 720,405 ), false, '' );
						
					     
						 $_home_portfolio .= '<div class="span4 ">';
						 
						 
						 $_home_portfolio .= '<div class="port port-file-3 portfolio-portfolio_3_column">
											<div class="viewport3column">
											    <a href="'. get_permalink() .'">
											        <span class="dark-background-2"></span>
											        '.  get_the_post_thumbnail( $post->ID, array(480, 240, 'bfi_thumb' => true)) .'
											    </a>
											    <div class="mt_isotope_text">
											    	<a href="'. get_permalink() .'"><h3>'. get_the_title() .'</h3></a>
											    	<p>'. substr($portfolio_caption, 0, 70) .'...</p>
											    	
											    	<a href="'. get_permalink().'" class="more-link"><span>Read more</span></a> 
											    	
											    	<div class="clear"></div>
											    </div>
											</div>
										</div>';
	    		                                
						 
						 $_home_portfolio .= '</div>';
    			
						
    		
    		}
    		
    		wp_reset_query();

return'<div class="row">'. $_home_portfolio .'</div>';

        
        $output = $this->startRow($el_position) . $output . $this->endRow($el_position);
        return $output;
    }
}

wpb_map( array(
    "base"        => "recent_couses_items",
    "name"        => __("Recent Couses", "js_composer"),
    "class"        => "mb_composer_spacer",
    "icon"      => "icon-heart",
    "params"    => array(
    	array(
            "type" => "textfield",
            "heading" => __("Title", "js_composer"),
            "param_name" => "title",
            "value" => "Recent Couses",
            "description" => __("Enter title", "js_composer")
        )
        
    )
) );




class WPBakeryShortCode_recent_couses_items2 extends WPBakeryShortCode {

    protected function content($atts, $content = null) {

        extract(shortcode_atts(array(
            'title' => '',
            'url' => ''
        ), $atts));


        
        global $post;
		$myposts = get_posts('post_type=causes&order=DESC&posts_per_page=3');
		$_home_portfolio = '';
		foreach($myposts as $post){
	
		
			setup_postdata($post);
			
			
                        $term_obj =  wp_get_object_terms($post->ID, 'portfolio_cat');
                        $portfolio_title = $post->post_title;
                        $portfolio_taxonomy = get_the_term_list($post->ID, 'portfolio_cat', '', ' ', '' );
                        $portfolio_taxonomy_format = preg_replace('/\<a(.*)\>(.*)\<\/a\>/iU', '<li>$2</li>', $portfolio_taxonomy);
                         $terms_as_text = strip_tags( get_the_term_list( $post->ID, 'portfolio_cat', '', ' ', '' ) );
                        $portfolio_title = $post->post_title;
                        $get_text=get_post_meta($post->ID, "madza_portfolio_hover_text", true);
                        $slides = get_post_meta($post->ID,'slides', true);
                        
                        $thumb = get_post_meta(get_the_ID(), 'tz_portfolio_thumb', TRUE); 
						$large_image_lightbox =  get_post_meta(get_the_ID(), 'tz_portfolio_thumb_lightbox', TRUE); 
						$lightbox = get_post_meta(get_the_ID(), 'tz_portfolio_lightbox', TRUE); 
						$portfolio_caption = get_the_excerpt(); 
						$src = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), array( 720,405 ), false, '' );
						
					     
						 $_home_portfolio .= '<div class="span4">';
						 
						 
						 $_home_portfolio .= '<div class="port port-file-3 portfolio-portfolio_3_column">
											<div class="viewport3column">
											    <a href="'. get_permalink() .'">
											        <span class="dark-background-2"></span>
											         '.  get_the_post_thumbnail( $post->ID, array(300, 180, 'bfi_thumb' => true)) .'
											    </a>
											    <div class="mt_isotope_text">
											    	<a href="'. get_permalink() .'"><h3>'. get_the_title() .'</h3></a>
											    	<p>'. substr($portfolio_caption, 0, 70) .'...</p>
											    	
											    	<a href="'. get_post_meta($post->ID, 'mt_causes_button_url', TRUE) .'" class="more-link mt-donate-link"><span>'. get_post_meta($post->ID, "mt_causes_button_name", TRUE) .'</span></a>
											    	
											    	<div class="clear"></div>
											    </div>
											</div>
										</div>';
	    		                                
						 
						 $_home_portfolio .= '</div>';
    			
						
    		
    		}
    		
    		wp_reset_query();

return'<div class="row">'. $_home_portfolio .'</div>';

        
        $output = $this->startRow($el_position) . $output . $this->endRow($el_position);
        return $output;
    }
}

wpb_map( array(
    "base"        => "recent_couses_items2",
    "name"        => __("Recent Couses 2", "js_composer"),
    "class"        => "mb_composer_spacer",
    "icon"      => "icon-heart",
    "params"    => array(
    	array(
            "type" => "textfield",
            "heading" => __("Title", "js_composer"),
            "param_name" => "title",
            "value" => "Recent Couses 2",
            "description" => __("Enter title", "js_composer")
        )
        
    )
) );


}
 


/* --------------------------------------------------------------------------------------- Pricing Table Column */

function pricings( $atts, $content = null ) {
    extract( shortcode_atts( array(
            'title' => 'Title',
            'currency' => '$',
            'price' => '100',
            'period' => '',
            'slug' => '',
            'bg' => '',
            'color' => '',
            'text' => '',
            'links' => '',
            'line_up_color' => '#1a1a1a',
            'line_down_color' => '#404040',
            'slug_color' => '#959595',
            
        ), $atts));
        
    if(esc_attr($bg) == 'yes'){ $bg = '-bg'; } 
     
    if(esc_attr($links) != ''){ $linkstart = '<a href="'. esc_attr($links) .'">'; $linkend = '</a>'; } else { $linkstart =""; $linkend =""; } 
    
return  $linkstart .'<div class="mb-pricing-box'. $bg .'" style="background-color:'. esc_attr($color) .'!important;">
	<h3 class="mb-pricing-title" style="color:'. esc_attr($text) .'!important;">'. esc_attr($title) .'</h3><div class="mb-pricing-line" style="background-color:'. esc_attr($line_up_color) .'!important;"></div><div class="mb-pricing-line-2" style="background-color:'. esc_attr($line_down_color) .'!important;"></div><div style="color:'. esc_attr($text) .'!important;"><span class="mb-pricing-value mb-pricing-currency" style="font-size: 30px;">'. esc_attr($currency) .'</span><span class="mb-pricing-value" style="font-size: 91px;">'. esc_attr($price) .'</span><span class="mb-pricing-value" style="font-size: 14px;">'. esc_attr($period) .'</span><br><span class="mb-pricing-slug" style="color: '. esc_attr($slug_color) .'!important; font-size: 11px; ">'. esc_attr($slug) .'</span></div><div class="mb-pricing-line" style="background-color:'. esc_attr($line_up_color) .'!important;"></div><div class="mb-pricing-line-2" style="background-color:'. esc_attr($line_down_color) .'!important;"></div><div class="mb-pricing-content" style="color:'. esc_attr($text) .'!important;">' . do_shortcode($content) . '</div></div>'. $linkend;

}

add_shortcode('pricings', 'pricings');



  
 
function line_padding( $atts) {
	extract( shortcode_atts( array(
            'padding' => '15'
            
        ), $atts));
   return '<div style="padding-top:'. esc_attr($padding) .'px;" class="clear"></div>';
}
add_shortcode('line_padding', 'line_padding');
 
// Shortcode icon
function icon( $atts ) {
    extract( shortcode_atts( array(
            'url' => '',
            'description' => '',
            'float' => 'left'
            
        ), $atts));
        
    if(esc_attr($float) == 'right'){
	   $float = 'float-right';
    } else {
        $float = 'float-left';
    } 
    
    return'<div class="icon-shortcode '. $float .'"><img src="'. esc_attr($url) .'" alt="'. esc_attr($description) .'" /></div>';
}
add_shortcode('icon', 'icon');
 
// Shortcode video half
function shape460( $atts, $content = null ) {
   return'<div class="shape-460">' . do_shortcode($content) . '</div>';
}
add_shortcode('shape460', 'shape460');

// Last 3 Featured Posts
function posts( $atts) {
    extract( shortcode_atts( array(
            'category' => 'Featured'
            
        ), $atts));
    
    $temp = $wp_query;
    $wp_query= null;
    $wp_query = new WP_Query();
    $wp_query->query('category_name='. esc_attr($category) .'&posts_per_page=3');
        
    return'<div>koks</div>';
    
    
    while ($wp_query->have_posts()) : $wp_query->the_post();   
    
    the_title();
    
    the_excerpt();
    
    the_post_thumbnail('show-image');
    
    
    endwhile;
    $wp_query = null; $wp_query = $temp;
    wp_reset_query(); 
}        
add_shortcode('posts', 'posts'); 
 
// Shortcode blockquote
function blockquote( $atts, $content = null ) {
    extract( shortcode_atts( array(
            'align' => ''
            
        ), $atts));
        
   return'<blockquote class="'. esc_attr($align) .'">' . do_shortcode($content) . '</blockquote>';
}
add_shortcode('blockquote', 'blockquote');

// Shortcode dropcaps
function dropcaps( $atts, $content = null ) {
    extract( shortcode_atts( array(
            'style' => '',
            'background' => 'black',
            'font' => 'white'
            
        ), $atts));
        
    if(esc_attr($style) == 'circular'){
	$style = 'style="background-color:'. esc_attr($background) .'; color:'. esc_attr($font) .';"';
    }  
    
    return'<div class="dropcaps '. esc_attr($style) .'" '. $style .'>' . do_shortcode($content) . '</div>';
}
add_shortcode('dropcaps', 'dropcaps');

// Shortcode image
function image( $atts) {
    extract( shortcode_atts( array(
            'url' => ''
            
        ), $atts));
        
   return'<img class="image-class" src="'. esc_attr($url) .'">';
}
add_shortcode('image', 'image');

function button_simple($atts, $content = null ){
    extract( shortcode_atts( array(
            'color' => 'black',
            'url' => ''
        ), $atts));
        
        return 
        '<a class="button-shortcode  '. esc_attr($color) .'" href="'. esc_attr($url) .'"><span>'. $content .'</span></a>';
 }
 add_shortcode('button_simple', 'button_simple');
 
function twitter( $atts, $content = null ) {
    extract( shortcode_atts( array(
            'title' => '',
            'rows' => '5',
            'user' => '',
        ), $atts));
        
   return '<div class="twitter_widget">
   
    <ul id="twitter_update_list"></ul>
    
    
    <script type="text/javascript" src="http://twitter.com/javascripts/blogger.js"></script>
    <script type="text/javascript" src="http://twitter.com/statuses/user_timeline/'. esc_attr($user) .'.json?callback=twitterCallback2&amp;count='. esc_attr($rows) .'"></script>
    <!-- END Twitter Widget -->
  
   </div>';
}
add_shortcode('twitter', 'twitter');

function contactform( $atts, $content = null ) {
    extract( shortcode_atts( array(
            'title' => 'Contact Form',
            'rows' => '10',
            'email' => '',
            'value' => 'Send Message'
        ), $atts));
        
   return 
   
    '<h2>'. esc_attr($title) .'</h2>
    <div class="widget_chortcode">
        <div id="contact_form_holder_2">
                <form action="'. get_template_directory_uri() .'/includes/send_email.php" method="post" id="contact_form">
                
                <div><label>Name:</label><input value="" type="text" name="name" id="name"></div>
                
                <div class="clear"></div>
                <div><label>E-mail:</label><input type="text2" name="email" id="email" ></div>
                <input type="text" name="email_to" style="display: none;" value="'. esc_attr($email) .'" id="subject">
                <input type="text" name="subject" style="display: none;" value="Contact Form" id="subject">
                <div><textarea name="message" rows="'. esc_attr($rows) .'" id="message"></textarea></div>
                
                
                
                <input type="submit"  id="send_message" value="'. esc_attr($value) .'">
                <div class="clear"></div>
                <div id="mail_success" class="success"><img src="'.  get_template_directory_uri().'/images/success.png"> Thank You!</div>
                <div id="mail_fail" class="error"><img src="'.  get_template_directory_uri() .'/images/error.png"> Sorry! Try later.</div>
                
                </form>  
            </div>
        </div>';
}
add_shortcode('contactform', 'contactform');

function flickr( $atts, $content = null ) {
    extract( shortcode_atts( array(
            'title' => 'Flickr',
            'images' => '10',
            'display' => 'random',
            'size' => 's',
            'layout' => 'x',
            'source' => 'user',
            'id' => ''
        ), $atts));
        
   return 
   
    '
    <div class="widget_chortcode">
        <div id="flickr">
            <script type="text/javascript" src="http://www.flickr.com/badge_code_v2.gne?count='. esc_attr($images) .'&amp;display='. esc_attr($display) .'&amp;size='. esc_attr($size) .'&amp;layout='. esc_attr($layout) .'&amp;source='. esc_attr($source) .'&amp;user='. esc_attr($id) .'"></script> </div><div class="clear"></div></div>';
}
add_shortcode('flickr', 'flickr');

function contact_info( $atts, $content = null ) {
    extract( shortcode_atts( array(
            'title' => '',
            'phone' => '',
            'email' => '',
            'address' => '',
            'name' => ''
        ), $atts));
        
   return 
   
    '<h2>'. esc_attr($title) .'</h2> 
        <div class="contact_info_wrap"> 
            <p><span class="icon_text icon_phone silver">'. esc_attr($phone) .'</span></p>
            <p><span class="icon_text icon_mail silver"><a href="mailto:'. esc_attr($email) .'">'. esc_attr($email) .'</a></span></p>
            <p><span class="icon_text icon_home silver">'. esc_attr($address) .'</span></p>
            <p><span class="icon_text icon_person silver">'. esc_attr($name) .'</span></p>
        </div> ';
}

add_shortcode('contact_info', 'contact_info');

function icon_text( $atts, $content = null ) {
    extract( shortcode_atts( array(
            'type' => '',
            'color' => ''
            
        ), $atts));
        
   return'<span class="icon_text '. esc_attr($type) .' '. esc_attr($color) .'">' . do_shortcode($content) . '</span>';
}
add_shortcode('icon_text', 'icon_text');

function icon_link( $atts, $content = null ) {
    extract( shortcode_atts( array(
            'type' => '',
            'url' => '',
            'color' => ''
            
        ), $atts));
        
   return'<a class="icon_text '. esc_attr($type) .' '. esc_attr($color) .'" href="'. esc_attr($url) .'">' . do_shortcode($content) . '</a>';
}
add_shortcode('icon_link', 'icon_link');

function list_icon( $atts, $content = null ) {
    extract( shortcode_atts( array(
            'type' => '',
            'color' => ''
            
        ), $atts));
        
   return'<div class="list_icon '. esc_attr($type) .' '. esc_attr($color) .'">' . do_shortcode($content) . '</div>';
}
add_shortcode('list_icon', 'list_icon');

function frame_box( $atts, $content = null ) {
   return '<div class="frame_box">' . do_shortcode($content) . '</div>';
}
add_shortcode('frame_box', 'frame_box');



function toogle( $atts, $content = null ) {
    extract( shortcode_atts( array(
            'title' => ''
            
        ), $atts));
   return '<div class="toogle_section">
   				<div class="toogle_title inactive2">
   					<div class="widget_span toggle-title">'. esc_attr($title) .'</div>
        		<div class="clear"></div></div>
        		<div class="toogle_options">' . $content . '<div class="clear"></div></div>
        	</div>';
}
add_shortcode('toogle', 'toogle');

function note_box( $atts, $content = null ) {
   return '<div class="note_box">' . do_shortcode($content) . '</div>';
}
add_shortcode('note_box', 'note_box');

function succes( $atts, $content = null ) {
   return '<div class="succes_box">' . do_shortcode($content) . '</div>';
}
add_shortcode('succes', 'succes');

function error( $atts, $content = null ) {
   return '<div class="error_box">' . do_shortcode($content) . '</div>';
}
add_shortcode('error', 'error');

function info( $atts, $content = null ) {
   return '<div class="info_box">' . do_shortcode($content) . '</div>';
}
add_shortcode('info', 'info');

function notice( $atts, $content = null ) {
   return '<div class="notice_box">' . do_shortcode($content) . '</div>';
}
add_shortcode('notice', 'notice');


function infobox_error( $atts, $content = null ) {
   return '<div class="infobox_error">' . do_shortcode($content) . '</div>';
}
add_shortcode('infobox_error', 'infobox_error');

function infobox_info( $atts, $content = null ) {
   return '<div class="infobox_info">' . do_shortcode($content) . '</div>';
}
add_shortcode('infobox_info', 'infobox_info');

function infobox_alert( $atts, $content = null ) {
   return '<div class="infobox_alert">' . do_shortcode($content) . '</div>';
}
add_shortcode('infobox_alert', 'infobox_alert');

function infobox_download( $atts, $content = null ) {
   return '<div class="infobox_download">' . do_shortcode($content) . '</div>';
}
add_shortcode('infobox_download', 'infobox_download');

function infobox_success( $atts, $content = null ) {
   return '<div class="infobox_success">' . do_shortcode($content) . '</div>';
}
add_shortcode('infobox_success', 'infobox_success');


// Shortcode Highlight Style

function highlight_yellow( $atts, $content = null ) {
   return '<span class="highlight_yellow">' . $content . '</span>';
}
add_shortcode('highlight_yellow', 'highlight_yellow');

function highlight_red( $atts, $content = null ) {
   return '<span class="highlight_red">' . $content . '</span>';
}
add_shortcode('highlight_red', 'highlight_red');

function highlight_green( $atts, $content = null ) {
   return '<span class="highlight_green">' . $content . '</span>';
}
add_shortcode('highlight_green', 'highlight_green');

function highlight_blue( $atts, $content = null ) {
   return '<span class="highlight_blue">' . $content . '</span>';
}
add_shortcode('highlight_blue', 'highlight_blue');

function highlight_black( $atts, $content = null ) {
   return '<span class="highlight_black">' . $content . '</span>';
}
add_shortcode('highlight_black', 'highlight_black');


// Shortcode Column Style
function one_sixth( $atts, $content = null ) {
    return '<div class="one_sixth">' . do_shortcode($content) . '</div>';
}
add_shortcode('one_sixth', 'one_sixth');

function one_fourth( $atts, $content = null ) {
   return '<div class="one_fourth">' . do_shortcode($content) . '</div>';
}
add_shortcode('one_fourth', 'one_fourth');

function one_fourth_last( $atts, $content = null ) {
   return '<div class="one_fourth_last">' . do_shortcode($content) . '</div><div class="clear"></div>';
}
add_shortcode('one_fourth_last', 'one_fourth_last');

function one_fifth( $atts, $content = null ) {
    return '<div class="one_fifth">' . do_shortcode($content) . '</div>';
}
add_shortcode('one_fifth', 'one_fifth');

function one_fifth_last( $atts, $content = null ) {
   return '<div class="one_fifth_last">' . do_shortcode($content) . '</div><div class="clear"></div>';
}
add_shortcode('one_fifth_last', 'one_fifth_last');

function one_third( $atts, $content = null ) {
   return '<div class="one_third">' . do_shortcode($content) . '</div>';
}
add_shortcode('one_third', 'one_third');

function one_third_last( $atts, $content = null ) {
   return '<div class="one_third_last">' . do_shortcode($content) . '</div><div class="clear"></div>';
}
add_shortcode('one_third_last', 'one_third_last');

function one_half( $atts, $content = null ) {
    
   return '<div class="one_half">' . do_shortcode($content) . '</div>';
}
add_shortcode('one_half', 'one_half');

function one_half_last( $atts, $content = null ) {
   return '<div class="one_half_last">' . do_shortcode($content) . '</div><div class="clear"></div>';
}
add_shortcode('one_half_last', 'one_half_last');

function two_third( $atts, $content = null ) {
   return '<div class="two_third">' . do_shortcode($content) . '</div>';
}
add_shortcode('two_third', 'two_third');

function two_third_last( $atts, $content = null ) {
   return '<div class="two_third_last">' . do_shortcode($content) . '</div><div class="clear"></div>';
}
add_shortcode('two_third_last', 'two_third_last');

function three_fourth( $atts, $content = null ) {
   return '<div class="three_fourth">' . do_shortcode($content) . '</div>';
}
add_shortcode('three_fourth', 'three_fourth');

function three_fourth_last( $atts, $content = null ) {
   return '<div class="three_fourth_last">' . do_shortcode($content) . '</div><div class="clear"></div>';
}
add_shortcode('three_fourth_last', 'three_fourth_last');

// Shortcode OTHER

function title( $atts, $content = null ) {
   return '<div class="title">' . do_shortcode($content) . '</div>';
}
add_shortcode('title', 'title');

function top() {
return '<div class="back-top"><div class="back-top-left"></div><div class="back-top-right"><a href="#">Top</a></div><div class="clear"></div></div>'; }
add_shortcode('top', 'top');



function line( $atts, $content = null ) {
    extract( shortcode_atts( array(
            'space_top' => '5',
            'space_bottom' => '15'
            
        ), $atts));
        
   return'<div class="line_shortcut" style="margin-top:'. esc_attr($space_top) .'px; padding-bottom:'. esc_attr($space_bottom) .'px;">' . do_shortcode($content) . '</div><div class="clear"></div>';
}
add_shortcode('line', 'line');

function line_zero() {
return '<div class="line_zero"></div>'; } 
add_shortcode('line_zero', 'line_zero');

function clear() {
return '<div class="clear"></div>'; } add_shortcode('clear', 'clear');
add_shortcode('clear', 'clear');

function code( $atts, $content = null ) {
   return '<code class="codess">' . $content . '</code>';
}
add_shortcode('code', 'code');

function linespace() {
return '<div class="linespace"></div>'; } 
add_shortcode('linespace', 'linespace');




function portfolio($atts) {
	extract( shortcode_atts( array(
        	'title' => 'Recent portfolio',
        	'description' => '',
            
        ), $atts));

	global $post;
		$myposts = get_posts('post_type=portfolio&order=DESC&posts_per_page=6');
		$_home_portfolio = '';
		foreach($myposts as $post){
	
		
			setup_postdata($post);
			
			
                        $term_obj =  wp_get_object_terms($post->ID, 'portfolio_cat');
                        $portfolio_title = $post->post_title;
                        $portfolio_taxonomy = get_the_term_list($post->ID, 'portfolio_cat', '', ' ', '' );
                        $portfolio_taxonomy_format = preg_replace('/\<a(.*)\>(.*)\<\/a\>/iU', '<li>$2</li>', $portfolio_taxonomy);
                         $terms_as_text = strip_tags( get_the_term_list( $post->ID, 'portfolio_cat', '', ' ', '' ) );
                        $portfolio_title = $post->post_title;
                        $get_text=get_post_meta($post->ID, "madza_portfolio_hover_text", true);
                        $slides = get_post_meta($post->ID,'slides', true);
                        
                        $thumb = get_post_meta(get_the_ID(), 'tz_portfolio_thumb', TRUE); 
						$large_image_lightbox =  get_post_meta(get_the_ID(), 'tz_portfolio_thumb_lightbox', TRUE); 
						$lightbox = get_post_meta(get_the_ID(), 'tz_portfolio_lightbox', TRUE); 
						$portfolio_caption = get_post_meta(get_the_ID(), 'tz_portfolio_caption', TRUE); 
						$src = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), array( 720,405 ), false, '' );
						
					if (has_post_thumbnail()){     
							$_home_portfolio .= '<li class="home-page-posts-portfolio-frame sorting'. $terms_as_text .' ">';
			
	    			
					$_home_portfolio .= '<div class="hover-madza">';
					
					if($large_image_lightbox != '') { 
	    				$_home_portfolio .= '<a class="portfolio-lightbox-tirangle" data-rel="prettyPhoto[pp_gal]" title="'. get_the_title() .'" href="'. $large_image_lightbox .'"></a>';
	    			 } 
						$_home_portfolio .= '<a class="portfolio-link-tirangle" title="'. get_the_title() .'" href="'. get_permalink() .'"></a>';
								
                       	$_home_portfolio .= '<div class="portfolio_hover home-page-posts-portfolio-frame-hover"></div>';
                                
						 if(has_post_thumbnail()) { $_home_portfolio .= ''.  aq_resize( $src[0], '206', '140', 'false', 'true') .''; } 
									
					$_home_portfolio .= '</div>';
							
					$_home_portfolio .= '<div class="home-page-posts-portfolio-container">';
	                                
	                	$_home_portfolio .= '<a title="'. get_the_title() .'" href="'. get_permalink() .'">'. get_the_title() .'</a>';
	                                    
	                	$_home_portfolio .= '<p>'. substr($portfolio_caption, 0, 30) .'</p>';
	                $_home_portfolio .= '</div>';
	               
    			$_home_portfolio .= '</li>';
    			}
						
    		
    		}
    		
    		wp_reset_query();

return'<div class="clear"></div><div class="homepage-portfolio-div-frame">
	
   	
   	<div class="mb-recent-portfolio"><h5><strong>'. esc_attr($title) .'</strong></h5>
   	<p>'.  esc_attr($description) .'</p>
   	<div class="homepage-portfolio-div-frame-title-button">
			<div id="prev2-portfolio"></div><div id="next2-portfolio"></div></div></div>
   	<ul class="home-ul-port" id="portfolio-home-ul-1" >'. $_home_portfolio .'</ul>
   	<ul class="home-ul-port" id="portfolio-home-ul-2" >'. $_home_portfolio .'</ul>
   	<ul class="home-ul-port-last" id="portfolio-home-ul-3" >'. $_home_portfolio .'</ul>
   	
   	
   	<script type="text/javascript">
   	 jQuery(document).ready(function(){
            jQuery("#portfolio-home-ul-1").cycle({ 
                fx:         "fade", 
                speed:       600,
                timeout:     0,
                next:   "#next2-portfolio", 
   				prev:   "#prev2-portfolio",
                easing: "easeInExpo",
                startingSlide: 0,
                sync: true
            });
            jQuery("#portfolio-home-ul-2").cycle({ 
                fx:         "fade", 
                speed:       500,
                timeout:     0,
                next:   "#next2-portfolio", 
   				prev:   "#prev2-portfolio",
                easing: "easeInExpo",
                startingSlide: 1,
                sync: true
            });
            jQuery("#portfolio-home-ul-3").cycle({ 
                fx:         "fade", 
                speed:       400,
                timeout:     0,
                next:   "#next2-portfolio", 
   				prev:   "#prev2-portfolio",
                easing: "easeInExpo",
                startingSlide: 2,
                sync: true
            });
            jQuery("#portfolio-home-ul-4").cycle({ 
                fx:         "fade", 
                speed:       300,
                timeout:     0,
                next:   "#next2-portfolio", 
   				prev:   "#prev2-portfolio",
                easing: "easeInExpo",
                startingSlide: 3,
                sync: true
            });
        });
   	</script>
   	
   	
   	<div class="clear"></div></div>'; 
    
        
        
 } 
add_shortcode('portfolio', 'portfolio');

function last_posts($atts) {

extract( shortcode_atts( array(
        	'title' => 'Our Last News',
            'url' => '',
            'linkname' => '',
            'posts' => '3',
            'sort' => 'DESC'
            
        ), $atts));
if(esc_attr($url)!="") { $post_link = '<a href="'. esc_attr($url) .'" class="last-news-link">'. esc_attr($linkname) .'</a>'; } else { $post_link = "";}
 global $post;
		$myposts = get_posts('post_type=post&order='. esc_attr($sort) .'&posts_per_page='. esc_attr($posts) .'');

        $_home_portfolio = "";
		foreach($myposts as $post){
			setup_postdata($post);
			$ignore[] = $post->ID;
			$portfolio_caption = get_the_content();
            
            $_home_portfolio .= '<li class="last-new-shortcode-li">';
           # if ( has_post_thumbnail() ) { $_home_portfolio .= '<div class="post-100-thumb-shortcode">'. get_the_post_thumbnail($post->ID, 'post-70'). '</div>'; }
			$_home_portfolio .= '<div class="post-100-thumb-shortcode-div"><a title="'. get_the_title() .'" href="'. get_permalink() .'">'. get_the_title() .'</a>';
        	
       		$_home_portfolio .= '<p>'. substr($portfolio_caption, 0, 65) .' &hellip;</p>';
       		if ( has_post_thumbnail() ) { $_home_portfolio .= '</div>'; }
       		$_home_portfolio .= '<div class="clear"></div>';     
			$_home_portfolio .= '</li>';
        }

	
return'<div class="widget_span float-left">'. esc_attr($title) .'</div>'. $post_link .'<div class="clear"></div><ul class="last-new-shortcode" >'.  $_home_portfolio .'</ul>';


}
add_shortcode('last_posts', 'last_posts');
?>