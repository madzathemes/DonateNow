<?php
/**
 * Initialize the options before anything else.
 */
add_action( 'admin_init', 'custom_theme_options', 1 );

/**
 * Build the custom settings & update OptionTree.
 */
function custom_theme_options() {
  /**
   * Get a copy of the saved settings array. 
   */
  $saved_settings = get_option( 'option_tree_settings', array() );
  
  /**
   * Custom settings array that will eventually be 
   * passes to the OptionTree Settings API Class.
   */
  $custom_settings = array( 
    'contextual_help' => array( 
      'sidebar'       => ''
    ),
    'sections'        => array( 
      array(
        'id'          => 'general',
        'title'       => 'General'
      ),
      array(
        'id'          => 'header',
        'title'       => 'Header & Logo'
      ),
      array(
        'id'          => 'header_style',
        'title'       => 'Header & Logo Style'
      ),
      array(
        'id'          => 'home_page',
        'title'       => 'Home Page'
      ),
      array(
        'id'          => 'footer',
        'title'       => 'Footer'
      ),
      
      array(
        'id'          => 'blog',
        'title'       => 'Blog'
      ),
      
      array(
        'id'          => 'social_links',
        'title'       => 'Social Links'
      ),
      array(
        'id'          => 'style_options',
        'title'       => 'Style Options'
      )
    ),
    'settings'        => array( 
      array(
        'id'          => 'help',
        'label'       => 'Need Help?',
        'desc'        => '<h1>Need Help?</h1> 
<ul>
<li>Check Our Support Forums <a target="_blank" href="http://madzathemes.com/">Click Here</a></li>

<li>Install Documentation You can found in <strong>Theme Package / How_to_install</strong> folder.</li>
</ul>

<h1>Installation Steps</h1> 
<ul>

<li><strong>1.</strong> Install Important plugins from <strong>Appearance / Install Plugins</strong></li>

<li><strong>2.</strong> Import Demo content, style, menu samples from <strong>Appearance / Madza Import</strong></li>

<li><strong>3.</strong> Import LayerSlider slides, demo file you can found in <strong>Theme Package / Demo_Content / layerslider.json </strong></li>

<strong>4.</strong> Create awesome charity! :)</li>
</ul>',
        'std'         => '',
        'type'        => 'textblock',
        'section'     => 'general',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      
      
      array(
        'id'          => 'blog_content_type',
        'label'       => 'Excerpt or Full Content',
        'std'         => 'full_content',
        'type'        => 'select',
        'section'     => 'blog',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => '',
        'choices'     => array( 
          array(
            'value'       => 'full_content',
            'label'       => 'Full Content',
            'src'         => ''
          ),
          array(
            'value'       => 'exscerpt',
            'label'       => 'Exscerpt',
            'src'         => ''
          )
        ),
      ),
      
       array(
        'id'          => 'blog_content_lenght',
        'label'       => 'Excerpt Lenght',
        'desc'        => '',
        'section'     => 'blog',
        'std'         => '350',
        'type'        => 'numeric_slider',
        'min_max_step'=> '10,1000,10',
          ),
          
        array(
        'id'          => 'blog_meta_on',
        'label'       => 'Blog Meta Description',
        'std'         => 'on',
        'type'        => 'select',
        'section'     => 'blog',
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
        ),
      ),
      
      array(
        'id'          => 'mt_style_header',
        'label'       => 'Header Style',
        'desc'        => 'Select Header Style.',
        'std'         => 'style_1',
        'type'        => 'select',
        'section'     => 'header_style',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => '',
        'choices'     => array( 
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
        'std'         => 'style_1',
        'type'        => 'select',
        'section'     => 'header_style',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => '',
        'choices'     => array( 
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
      
      
       array(
        'id'          => 'logo_style_width',
        'label'       => 'Logo width (px)',
        'std'         => '225',
        'type'        => 'text',
        'section'     => 'header_style',
      ),
      
      array(
        'id'          => 'logo_style_height',
        'label'       => 'Logo height (px)',
        'std'         => '40',
        'type'        => 'text',
        'section'     => 'header_style',
      ),
      array(
        'id'          => 'logo_style_margin',
        'label'       => 'Logo margin-top (px)',
        'std'         => '20',
        'type'        => 'text',
        'section'     => 'header_style',
      ),
      array(
        'id'          => 'header_style_margin',
        'label'       => 'Header right area margin-top (px)',
        'std'         => '20',
        'type'        => 'text',
        'section'     => 'header_style',
      ),
      
      
      array(
        'id'          => 'responsive_layout',
        'label'       => 'Responsive',
        'desc'        => 'Select Responsive or Fixed theme layouts.',
        'std'         => 'responsive_yes',
        'type'        => 'select',
        'section'     => 'general',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => '',
        'choices'     => array( 
          array(
            'value'       => 'responsive_yes',
            'label'       => 'Responsive',
            'src'         => ''
          ),
          array(
            'value'       => 'responsive_no',
            'label'       => 'Fixed',
            'src'         => ''
          )
        ),
      ),
      array(
        'id'          => 'favicon',
        'label'       => 'Favicon',
        'desc'        => 'Upload a 16px x 16px Png/Gif image that will represent your website\'s favicon.',
        'std'         => '',
        'type'        => 'upload',
        'section'     => 'general',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'bredcrumb',
        'label'       => 'Breadcrumb',
        'desc'        => 'If this option is on, you\'ll globally enable your website\'s breadcrumb navigation.',
        'std'         => 'on',
        'type'        => 'select',
        'section'     => 'general',
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
        ),
      ),
      array(
        'id'          => 'mt_custom_html',
        'label'       => 'Tracking Code',
        'desc'        => 'Paste your tracking code here. This will be added into the footer template of your theme.',
        'std'         => '',
        'type'        => 'textarea-simple',
        'section'     => 'general',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'mt_custom_style',
        'label'       => 'Custom Css',
        'desc'        => '',
        'std'         => '',
        'type'        => 'css',
        'section'     => 'general',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'theme_logo',
        'label'       => 'Theme Logo',
        'desc'        => 'Paste the full URL (include http://) of your custom logo here or you can insert the image through the button.',
        'std'         => '',
        'type'        => 'upload',
        'section'     => 'header',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      
    
      
      array(
        'id'          => 'responsive_logo',
        'label'       => 'Responsive Logo',
        'desc'        => 'Logo for mobile device. Paste the full URL (include http://) of your custom logo here or you can insert the image through the button.',
        'std'         => '',
        'type'        => 'upload',
        'section'     => 'header',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'login_logo',
        'label'       => 'Login Logo',
        'desc'        => 'Paste the full URL (include http://) of your custom logo here or you can insert the image through the button.',
        'std'         => '',
        'type'        => 'upload',
        'section'     => 'header',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'mt_top_html',
        'label'       => 'Header Right HTML',
        'desc'        => 'Paste your code here. This will be added into the header right area.',
        'std'         => '<a href="#" class="mt_donation_button"><h2>Donate Today!</h2></a>',
        'type'        => 'textarea-simple',
        'section'     => 'header',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'right_area_search',
        'label'       => 'Right Menu Area',
        'desc'        => 'Select right option from menu area.',
        'std'         => 'html',
        'type'        => 'select',
        'section'     => 'header',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => '',
        'choices'     => array( 
          #array(
          #  'value'       => 'html_search',
          #  'label'       => 'HTML & Search button',
          #  'src'         => ''
          #),
          array(
            'value'       => 'search',
            'label'       => 'Off',
            'src'         => ''
          ),
          array(
            'value'       => 'html',
            'label'       => 'On HTML area',
            'src'         => ''
          )
        ),
      ),
      array(
        'id'          => 'mt_menu_html',
        'label'       => 'Menu Right HTML',
        'desc'        => 'Paste your code here. This will be added into the menu right area.',
        'std'         => '<p>Please help us make the world better!</p>',
        'type'        => 'textarea-simple',
        'section'     => 'header',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'mt_homepage_slider_image',
        'label'       => 'Slider Media',
        'desc'        => '',
        'std'         => '',
        'type'        => 'slider',
        'section'     => 'home_page',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'mt_homepage_slider_height',
        'label'       => 'Slider Height (px)',
        'desc'        => '',
        'std'         => '350',
        'type'        => 'text',
        'section'     => 'home_page',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'home_slider_type',
        'label'       => 'Slider Type',
        'desc'        => '',
        'std'         => 'home_slider_shortcode',
        'type'        => 'select',
        'section'     => 'home_page',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => '',
        'choices'     => array( 
          array(
            'value'       => 'home_slider_flex',
            'label'       => 'Flex Slider (Responsive)',
            'src'         => ''
          ),
          array(
            'value'       => 'home_slider_shortcode',
            'label'       => 'Slider from Shortcode',
            'src'         => ''
          ),
          array(
            'value'       => 'home_slider_off',
            'label'       => 'Slider Off',
            'src'         => ''
          )
        ),
      ),
      array(
        'id'          => 'home_slider_shortcode_code',
        'label'       => 'Slider Shortcode',
        'desc'        => 'Sample: [layerslider id="1"] or [rev_slider slider_one].',
        'std'         => '[layerslider id="3"]',
        'type'        => 'text',
        'section'     => 'home_page',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'homepage_content_area',
        'label'       => 'Content',
        'desc'        => '',
        'std'         => '',
        'type'        => 'textarea',
        'section'     => 'home_page',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'homepage_frompage',
        'label'       => 'Show content from page',
        'desc'        => 'Choose which page you want to pull content from to fill this area.',
        'std'         => '6510',
        'type'        => 'page-select',
        'section'     => 'home_page',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'enable_footer',
        'label'       => 'Enable Footer',
        'desc'        => '',
        'std'         => 'on',
        'type'        => 'select',
        'section'     => 'footer',
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
        ),
      ),
      array(
        'id'          => 'footer_column',
        'label'       => 'Footer Column',
        'desc'        => 'Select footer columns and insert some widgets. Go to Appearance/Widgets and insert some widgets in footer widget areas.',
        'std'         => '1_4',
        'type'        => 'select',
        'section'     => 'footer',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => '',
        'choices'     => array( 
        	array(
            'value'       => '1_1',
            'label'       => '1/1',
            'src'         => ''
          ),
          array(
            'value'       => '1_2',
            'label'       => '1/2',
            'src'         => ''
          ),
          array(
            'value'       => '1_3',
            'label'       => '1/3',
            'src'         => ''
          ),
          array(
            'value'       => '1_4',
            'label'       => '1/4',
            'src'         => ''
          ),
          array(
            'value'       => '1_5',
            'label'       => '1/5',
            'src'         => ''
          ),
          array(
            'value'       => '2_4',
            'label'       => '2/4',
            'src'         => ''
          ),
          array(
            'value'       => '4_2',
            'label'       => '4/2',
            'src'         => ''
          )
        ),
      ),
      array(
        'id'          => 'footer_buttom',
        'label'       => 'Enable Footer Bottom',
        'desc'        => '',
        'std'         => 'footer_buttom_on',
        'type'        => 'select',
        'section'     => 'footer',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => '',
        'choices'     => array( 
          array(
            'value'       => 'footer_buttom_on',
            'label'       => 'On',
            'src'         => ''
          ),
          array(
            'value'       => 'footer_buttom_off',
            'label'       => 'Off',
            'src'         => ''
          )
        ),
      ),
      array(
        'id'          => 'copyright',
        'label'       => 'Footer Bottom Copyright Text',
        'desc'        => '',
        'std'         => 'Copyright 2013. Powered by WordPress Theme. By M.Bitenieks',
        'type'        => 'text',
        'section'     => 'footer',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      
      
      /* SEARCH LAYOUTS*/
      array(
        'id'          => 'search_sidebars',
        'label'       => 'Search Page Layouts',
        'desc'        => 'Select layout style for search page.',
        'std'         => '',
        'type'        => 'select',
        'section'     => 'search_page',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => '',
        'choices'     => array( 
          array(
            'value'       => 'sidebar_1',
            'label'       => 'Right Sidebar',
            'src'         => ''
          ),
          array(
            'value'       => 'sidebar_2',
            'label'       => 'Left Sidebar',
            'src'         => ''
          ),
          array(
            'value'       => 'sidebar_3',
            'label'       => 'Sidebar off (full width)',
            'src'         => ''
          ),
          array(
            'value'       => 'sidebar_4',
            'label'       => 'Left and Right Sidebar',
            'src'         => ''
          ),
          array(
            'value'       => 'sidebar_5',
            'label'       => 'Two Left Sidebars',
            'src'         => ''
          ),
          array(
            'value'       => 'sidebar_6',
            'label'       => 'Two Right Sidebars',
            'src'         => ''
          )
        ),
      ),
      array(
        'id'          => 'sidebar_first',
        'label'       => 'Search Page Sidebar Left or First',
        'desc'        => 'You can create new sidebars in Sidebars/Add Sidebar.',
        'std'         => '',
        'type'        => 'custom-post-type-select',
        'section'     => 'search_page',
        'rows'        => '',
        'post_type'   => 'mt_sidebar',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'sidebar_second',
        'label'       => 'Search Page Sidebar Right or Second',
        'desc'        => 'You can create new sidebars in Sidebars/Add Sidebar.',
        'std'         => '',
        'type'        => 'custom-post-type-select',
        'section'     => 'search_page',
        'rows'        => '',
        'post_type'   => 'mt_sidebar',
        'taxonomy'    => '',
        'class'       => ''
      ),
      /* CATEGORY LAYOUTS*/
      array(
        'id'          => 'category_sidebars',
        'label'       => 'Category Page Layouts',
        'desc'        => 'Select layout style for search page.',
        'std'         => '',
        'type'        => 'select',
        'section'     => 'search_page',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => '',
        'choices'     => array( 
          array(
            'value'       => 'sidebar_1',
            'label'       => 'Right Sidebar',
            'src'         => ''
          ),
          array(
            'value'       => 'sidebar_2',
            'label'       => 'Left Sidebar',
            'src'         => ''
          ),
          array(
            'value'       => 'sidebar_3',
            'label'       => 'Sidebar off (full width)',
            'src'         => ''
          ),
          array(
            'value'       => 'sidebar_4',
            'label'       => 'Left and Right Sidebar',
            'src'         => ''
          ),
          array(
            'value'       => 'sidebar_5',
            'label'       => 'Two Left Sidebars',
            'src'         => ''
          ),
          array(
            'value'       => 'sidebar_6',
            'label'       => 'Two Right Sidebars',
            'src'         => ''
          )
        ),
      ),
      array(
        'id'          => 'category_sidebar_first',
        'label'       => 'Category Page Sidebar Left or First',
        'desc'        => 'You can create new sidebars in Sidebars/Add Sidebar.',
        'std'         => '',
        'type'        => 'custom-post-type-select',
        'section'     => 'search_page',
        'rows'        => '',
        'post_type'   => 'mt_sidebar',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'category_sidebar_second',
        'label'       => 'Category Page Sidebar Right or Second',
        'desc'        => 'You can create new sidebars in Sidebars/Add Sidebar.',
        'std'         => '',
        'type'        => 'custom-post-type-select',
        'section'     => 'search_page',
        'rows'        => '',
        'post_type'   => 'mt_sidebar',
        'taxonomy'    => '',
        'class'       => ''
      ),
      
      
      
      
      
      
      
      
      
      
      array(
        'id'          => 'soc_facebook',
        'label'       => 'Facebook icon link',
        'desc'        => '',
        'std'         => '',
        'type'        => 'text',
        'section'     => 'social_links',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'soc_twitter',
        'label'       => 'Twitter icon link',
        'desc'        => '',
        'std'         => '',
        'type'        => 'text',
        'section'     => 'social_links',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'soc_instagram',
        'label'       => 'Instagram icon link',
        'desc'        => '',
        'std'         => '',
        'type'        => 'text',
        'section'     => 'social_links',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'soc_vimeo',
        'label'       => 'Vimeo icon link',
        'desc'        => '',
        'std'         => '',
        'type'        => 'text',
        'section'     => 'social_links',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'soc_youtube',
        'label'       => 'Youtube icon link',
        'desc'        => '',
        'std'         => '',
        'type'        => 'text',
        'section'     => 'social_links',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'soc_linkedin',
        'label'       => 'LinkedIn icon link',
        'desc'        => '',
        'std'         => '',
        'type'        => 'text',
        'section'     => 'social_links',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'soc_google',
        'label'       => 'Google Plus icon link',
        'desc'        => '',
        'std'         => '',
        'type'        => 'text',
        'section'     => 'social_links',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'soc_dribble',
        'label'       => 'Dribble icon link',
        'desc'        => '',
        'std'         => '',
        'type'        => 'text',
        'section'     => 'social_links',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'soc_skype',
        'label'       => 'Skype icon link',
        'desc'        => '',
        'std'         => '',
        'type'        => 'text',
        'section'     => 'social_links',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'soc_delicious',
        'label'       => 'Delicious icon link',
        'desc'        => '',
        'std'         => '',
        'type'        => 'text',
        'section'     => 'social_links',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'soc_amazon',
        'label'       => 'Amazon icon link',
        'desc'        => '',
        'std'         => '',
        'type'        => 'text',
        'section'     => 'social_links',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'soc_yahoo',
        'label'       => 'Yahoo icon link',
        'desc'        => '',
        'std'         => '',
        'type'        => 'text',
        'section'     => 'social_links',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'soc_pinterest',
        'label'       => 'Pinterest icon link',
        'desc'        => '',
        'std'         => '',
        'type'        => 'text',
        'section'     => 'social_links',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'soc_rss',
        'label'       => 'Rss icon link',
        'desc'        => '',
        'std'         => '',
        'type'        => 'text',
        'section'     => 'social_links',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      
#      array(
#        'id'          => 'mt_style_theme',
#        'label'       => 'Theme Style',
#        'desc'        => 'Select Header Style.',
#        'std'         => 'style_1',
#        'type'        => 'select',
#        'section'     => 'style_options',
#        'rows'        => '',
#        'post_type'   => '',
#        'taxonomy'    => '',
#        'class'       => '',
#        'choices'     => array( 
#          array(
#            'value'       => 'style_1',
#            'label'       => 'Style 1',
#            'src'         => ''
#          ), 
#          array(
#            'value'       => 'style_2',
#            'label'       => 'Style 2',
#            'src'         => ''
#          ),         
#         ),
#      ),
      
      

      
      
      
      
      array(
        'id'          => 'mt_style_image',
        'label'       => 'Image Style',
        'desc'        => 'Select Image Style.',
        'std'         => 'style_1',
        'type'        => 'select',
        'section'     => 'style_options',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => '',
        'choices'     => array( 
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
        'std'         => 'style_1',
        'type'        => 'select',
        'section'     => 'style_options',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => '',
        'choices'     => array( 
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
      
      
      
#      array(
#        'id'          => 'mt_style_title',
#        'label'       => 'Page Title Background',
#        'desc'        => 'Select Page Title Background Style.',
#        'std'         => 'style_1',
#        'type'        => 'select',
#        'section'     => 'style_options',
#        'rows'        => '',
#        'post_type'   => '',
#        'taxonomy'    => '',
#        'class'       => '',
#        'choices'     => array( 
#          array(
#            'value'       => 'style_1',
#            'label'       => 'Dark',
#            'src'         => ''
#          ), 
#          array(
#            'value'       => 'style_2',
#            'label'       => 'Light',
#            'src'         => ''
#          )         
#         ),
#      ),
      
      array(
        'id'          => 'mt_colors_homepage',
        'label'       => 'Home Page Colors',
        'desc'        => 'Select Colors for Home Page.',
        'std'         => '#f55f0d',
        'type'        => 'colorpicker',
        'section'     => 'style_options',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'mt_layout_styler',
        'label'       => 'Home Page Layout Style',
        'desc'        => 'Select Layout Style for Home Page.',
        'std'         => 'full',
        'type'        => 'select',
        'section'     => 'style_options',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => '',
        'choices'     => array( 
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
        'id'          => 'mt_homepage_bg',
        'label'       => 'Home Page Background',
        'desc'        => '',
        'std'         => '',
        'type'        => 'background',
        'section'     => 'style_options',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'mt_colors_default',
        'label'       => 'Default Page Colors',
        'desc'        => 'Select Colors for all default pages.',
        'std'         => '#f55f0d',
        'type'        => 'colorpicker',
        'section'     => 'style_options',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      
      array(
        'id'          => 'mt_layout_styler_default',
        'label'       => 'Default Page Layout Style',
        'desc'        => 'Select Layout Style for Home Page.',
        'std'         => 'full',
        'type'        => 'select',
        'section'     => 'style_options',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => '',
        'choices'     => array( 
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
            'label'       => 'Full Width',
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
        'id'          => 'mt_defaultpage_bg',
        'label'       => 'Default Page Background',
        'desc'        => '',
        'std'         => '',
        'type'        => 'background',
        'section'     => 'style_options',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'googlefont_name',
        'label'       => 'Google Font Name',
        'desc'        => 'Default: Droid+Serif:400,700. 
Get all <a href="http://www.google.com/webfonts">Google fonts</a> here',
        'std'         => 'Droid+Serif:400,700',
        'type'        => 'text',
        'section'     => 'style_options',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'googlefont_css',
        'label'       => 'Google Font Css',
        'desc'        => "Default: font-family: 'Droid Serif', serif;",
        'std'         => "font-family: 'Droid Serif', serif;",
        'type'        => 'text',
        'section'     => 'style_options',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      )
    )
  );
  
  /* allow settings to be filtered before saving */
  $custom_settings = apply_filters( 'option_tree_settings_args', $custom_settings );
  
  /* settings are not the same update the DB */
  if ( $saved_settings !== $custom_settings ) {
    update_option( 'option_tree_settings', $custom_settings ); 
  }
  
}