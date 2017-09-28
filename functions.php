<?php

/*-----------------------------------------------------------------------------------*/
/* Directory
/*-----------------------------------------------------------------------------------*/

if ( get_stylesheet_directory() == get_template_directory() ) {
	define('OF_FILEPATH', get_template_directory());
	define('OF_DIRECTORY', get_template_directory_uri());
} else {
	define('OF_FILEPATH', get_stylesheet_directory());
	define('OF_DIRECTORY', get_stylesheet_directory_uri());
}
define('MADZA_FILEPATH', get_template_directory());
define('MADZA_DIRECTORY', get_template_directory_uri());



/**
 * Optional: set 'ot_show_pages' filter to false.
 * This will hide the settings & documentation pages.
 */
add_filter( 'ot_show_pages', '__return_false' );

/**
 * Optional: set 'ot_show_new_layout' filter to false.
 * This will hide the "New Layout" section on the Theme Options page.
 */
add_filter( 'ot_show_new_layout', '__return_false' );

/**
 * Required: set 'ot_theme_mode' filter to true.
 */
add_filter( 'ot_theme_mode', '__return_true' );

/**
 * Required: include OptionTree.
 */
include_once( 'option-tree/ot-loader.php' );
include_once( 'option-tree/theme-options.php' );

/*-----------------------------------------------------------------------------------*/
/* Function
/*-----------------------------------------------------------------------------------*/

include_once ('functions/class-widget.php');
include_once ('functions/class-metabox.php');
include_once ('functions/functions-widget.php');
include_once ('functions/functions-footer.php');
include_once ('functions/functions-homepage.php');
include_once ('functions/functions-slider.php');
include_once ('functions/functions-hooks.php');
include_once ('functions/functions-comment.php');
include_once ('functions/functions-shortcodes.php');
include_once ('functions/functions-general.php');
#require_once (OF_FILEPATH . '/functions/plugins/bread/functions-other.php');
include_once ('functions/plugins/aq_resizer.php');



/*-----------------------------------------------------------------------------------*/
/* Madza Theme Setup
/*-----------------------------------------------------------------------------------*/

add_action( 'after_setup_theme', 'madza_theme_setup' );

if ( ! function_exists( 'madza_theme_setup' ) ){

	function madza_theme_setup() {

		add_editor_style();

		add_theme_support( 'post-formats', array('image', 'video', 'link', 'quote', 'gallery' ) );

		add_theme_support( 'automatic-feed-links' );

		load_theme_textdomain( 'madza_translate', get_template_directory() . '/languages' );
		$locale = get_locale();
		$locale_file = get_template_directory() . "/languages/$locale.php";
		if ( is_readable( $locale_file ) )
			require_once( $locale_file );

		set_post_thumbnail_size( 999, 999, true );

		register_nav_menus( array(
			'header_menu' => __( 'Header Navigation', 'madza_translate' ),
		) );

		register_nav_menus( array(
			'select_menu' => __( 'Responsive Header Navigation', 'madza_translate' ),
		) );

		register_nav_menus( array(
			'footer_menu' => __( 'Footer Navigation', 'madza_translate' ),
		) );



	}

}


/*-----------------------------------------------------------------------------------*/
/* Default Options
/*-----------------------------------------------------------------------------------*/

if ( ! isset( $content_width ) ) $content_width = 610;

function madzathemes_page_menu_args( $args ) {
	$args['show_home'] = true;
	return $args;
}
add_filter( 'wp_page_menu_args', 'madzathemes_page_menu_args' );

function new_excerpt_length( $length ) {

	if(ot_get_option("blog_content_lenght")!="") { $lenghts = ot_get_option("blog_content_lenght"); } else { $lenghts = "100"; }
	return $lenghts;

}
add_filter( 'excerpt_length', 'new_excerpt_length' );

function get_required_page($page = ''){
	global $wpdb;

	$result = wp_cache_get($page . '-guid', __FUNCTION__);

	if($result === false)
	{
		$result = $wpdb->get_var("SELECT p.guid
					FROM $wpdb->posts p
					WHERE p.post_status = 'publish'
					AND p.post_title = '{$page}' ");

		if ($result)
		{
			wp_cache_add($page . '-guid', $result,  __FUNCTION__);
		}
	}
	return $result;
}

if (function_exists('add_theme_support')) {
	add_theme_support( 'post-thumbnails' );
}


/*-----------------------------------------------------------------------------------*/
/*	Theme Options
/*-----------------------------------------------------------------------------------*/

if ( ! function_exists( 'mt_paging_nav' ) ) :
/**
 * Displays navigation to next/previous set of posts when applicable.
 *
 * @since Twenty Thirteen 1.0
 *
 * @return void
 */
function mt_paging_nav() {
	global $wp_query;

	// Don't print empty markup if there's only one page.
	if ( $wp_query->max_num_pages < 2 )
		return;
	?>
	<nav class="navigation paging-navigation" role="navigation">

		<div class="nav-links">

			<?php if ( get_next_posts_link() ) : ?>
			<div class="nav-previous pagination-link"><?php next_posts_link( __( '<span class="meta-nav">&larr; Older posts</span> ', 'madza_themes' ) ); ?></div>
			<?php endif; ?>

			<?php if ( get_previous_posts_link() ) : ?>
			<div class="nav-next pagination-link"><?php previous_posts_link( __( '<span class="meta-nav">Newer posts  &rarr;</span>', 'madza_themes' ) ); ?></div>
			<?php endif; ?>
			<div class="clear"></div>
		</div><!-- .nav-links -->
	</nav><!-- .navigation -->
	<?php
}
endif;


function my_custom_login_logo() {
    if(ot_get_option("login_logo")!="") {
	    echo '<style type="text/css">
	        h1 a { '.ot_get_option("login_logo").' !important; }
	    </style>';
    }
}

add_action('login_head', 'my_custom_login_logo');

function madza_sidebar_function() {
	global $post;
    $args = array(
    	'post_type'=> 'mt_sidebar',
        'order' => 'ASC',
        'posts_per_page' => 999,
        'orderby' => 'date',
        'order' => 'DSC',
    );

    query_posts($args); while ( have_posts() ) : the_post();

			register_sidebar(array(
			  'name' => __(get_the_title()),
			  'id' => 'sidebar-id-'.$post->ID.'',
			  'description' => __( 'Widget area created from Sidebar custom post type.' , 'madza_translate'),
			  'before_widget' => '<div class="menu_categories">',
				'after_widget' => '<div class="clear"></div></div>',
				'before_title' => '<h4 class="widget_h"><span>',
				'after_title' => '</span></h4>',
			));

	 endwhile; wp_reset_query();
}
add_action('madza_sidebar_function', 'madza_sidebar_function');

madza_sidebar_function();


add_action('admin_init','optionscheck_change_santiziation', 100);

function optionscheck_change_santiziation() {
    remove_filter( 'of_sanitize_textarea', 'of_sanitize_textarea' );
    add_filter( 'of_sanitize_textarea', 'custom_sanitize_textarea' );
}


function custom_sanitize_textarea($input) {
    global $allowedposttags;
    $custom_allowedtags["embed"] = array(
      "src" => array(),
      "type" => array(),
      "allowfullscreen" => array(),
      "allowscriptaccess" => array(),
      "height" => array(),
          "width" => array()
      );
      $custom_allowedtags["script"] = array();

      $custom_allowedtags = array_merge($custom_allowedtags, $allowedposttags);
      $output = wp_kses( $input, $custom_allowedtags);
    return $output;
}





/**
 * Include the TGM_Plugin_Activation class.
 */
require_once dirname( __FILE__ ) . '/all_plugins/class-tgm-plugin-activation.php';

add_action( 'tgmpa_register', 'my_theme_register_required_plugins' );
/**
 * Register the required plugins for this theme.
 *
 * In this example, we register two plugins - one included with the TGMPA library
 * and one from the .org repo.
 *
 * The variable passed to tgmpa_register_plugins() should be an array of plugin
 * arrays.
 *
 * This function is hooked into tgmpa_init, which is fired within the
 * TGM_Plugin_Activation class constructor.
 */
function my_theme_register_required_plugins() {

    /**
     * Array of plugin arrays. Required keys are name, slug and required.
     * If the source is NOT from the .org repo, then source is also required.
     */
    $plugins = array(

        array(
			'name'     				=> 'Contact Form 7', // The plugin name
			'slug'     				=> 'contact-form-7', // The plugin slug (typically the folder name)
			'required' 				=> true, // If false, the plugin is only 'recommended' instead of required
		),
        array(
            'name'			=> 'WPBakery Visual Composer', // The plugin name
            'slug'			=> 'js_composer', // The plugin slug (typically the folder name)
            'source'			=> get_stylesheet_directory() . '/all_plugins/js_composer.zip', // The plugin source
            'required'			=> true, // If false, the plugin is only 'recommended' instead of required
            'version'			=> '5.2.1', // E.g. 1.0.0. If set, the active plugin must be this version or higher, otherwise a notice is presented
            'force_activation'		=> false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch
            'force_deactivation'	=> false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins
            'external_url'		=> '', // If set, overrides default API URL and points to an external URL
        ),
        array(
            'name'			=> 'LayerSlider WP', // The plugin name
            'slug'			=> 'LayerSlider', // The plugin slug (typically the folder name)
            'source'			=> get_stylesheet_directory() . '/all_plugins/LayerSlider.zip', // The plugin source
            'required'			=> true, // If false, the plugin is only 'recommended' instead of required
            'version'			=> '6.5.8', // E.g. 1.0.0. If set, the active plugin must be this version or higher, otherwise a notice is presented
            'force_activation'		=> false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch
            'force_deactivation'	=> false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins
            'external_url'		=> '', // If set, overrides default API URL and points to an external URL
        ),
        array(
            'name'			=> 'Total Donation', // The plugin name
            'slug'			=> 'totaldonations', // The plugin slug (typically the folder name)
            'source'			=> get_stylesheet_directory() . '/all_plugins/totaldonations.zip', // The plugin source
            'required'			=> true, // If false, the plugin is only 'recommended' instead of required
            'version'			=> '2.0.5', // E.g. 1.0.0. If set, the active plugin must be this version or higher, otherwise a notice is presented
            'force_activation'		=> false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch
            'force_deactivation'	=> false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins
            'external_url'		=> '', // If set, overrides default API URL and points to an external URL
        ),
        array(
        			'name'     				=> esc_html__( "One Click Demo Import","rimi" ), // The plugin name
        			'slug'     				=> 'one-click-demo-import', // The plugin slug (typically the folder name)
        			'required' 				=> true, // If false, the plugin is only 'recommended' instead of required
              'force_activation'		=> false,
        ),
				array(
            'name'			=> esc_html__( "Envato Market (One Click Updates)","rimi" ), // The plugin name
            'slug'			=> 'envato-market', // The plugin slug (typically the folder name)
            'source'			=> get_template_directory() . '/all_plugins/envato-market.zip', // The plugin source
            'required'			=> true, // If false, the plugin is only 'recommended' instead of required
            'version'			=> '1.0', // E.g. 1.0.0. If set, the active plugin must be this version or higher, otherwise a notice is presented
            'force_activation'		=> false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch
            'force_deactivation'	=> false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins
            'external_url'		=> '', // If set, overrides default API URL and points to an external URL
        ),
    );

		/**
     * Array of configuration settings. Amend each line as needed.
     * If you want the default strings to be available under your own theme domain,
     * leave the strings uncommented.
     * Some of the strings are added into a sprintf, so see the comments at the
     * end of each line for what each argument will be.
     */
    $config = array(
      'id'           => 'donatenow',                // Unique ID for hashing notices for multiple instances of TGMPA.
      'default_path' => '',                      // Default absolute path to bundled plugins.
      'menu'         => 'tgmpa-install-plugins', // Menu slug.
      'has_notices'  => true,                    // Show admin notices or not.
      'dismissable'  => true,                    // If false, a user cannot dismiss the nag message.
      'dismiss_msg'  => '',                      // If 'dismissable' is false, this message will be output at top of nag.
      'is_automatic' => false,                   // Automatically activate plugins after installation or not.
      'message'      => '',
    );

    tgmpa( $plugins, $config );

}

function rimi_import_files() {
    return array(
        array(
            'import_file_name'             => esc_html__( 'Demo 1', 'rimi' ),
            'local_import_file'            => trailingslashit( get_template_directory() ) . 'inc/import/demo1/demo.xml',
            'local_import_customizer_file' => trailingslashit( get_template_directory() ) . 'inc/import/demo1/customizer.dat',
            'import_notice'                => esc_html__( 'Customize this theme from Appearance/Customize', 'rimi' ),
        )
    );
}
add_filter( 'pt-ocdi/import_files', 'rimi_import_files' );

function rimi_after_import_setup() {
    // Assign menus to their locations.
    $main_menu = get_term_by( 'name', 'Header', 'nav_menu' );
		$mobile_menu = get_term_by( 'name', 'Mobile Menu', 'nav_menu' );
		$footer_menu = get_term_by( 'name', 'Footer Menu', 'nav_menu' );

    set_theme_mod( 'nav_menu_locations', array(
            'primary' => $main_menu->term_id,
						'mobile' => $mobile_menu->term_id,
						'footer_menu' => $main_menu->term_id,
        )
    );
		wp_delete_post(1);
    // Assign front page and posts page (blog page).
    $front_page_id = get_page_by_title( 'News' );

    update_option( 'show_on_front', 'page' );
    update_option( 'page_on_front', $front_page_id->ID );

}
add_action( 'pt-ocdi/after_import', 'rimi_after_import_setup' );



function themename_customize_register($wp_customize){

	//	==================================================
    //  =============================
    //  = ==== Title
    //  =============================

    $wp_customize->add_section('themename_title', array(
        'title'    => __('Title', 'themename'),
        'priority' => 129,
    ));


	//  =============================
    //  = Title Style 	=
    //  =============================
     $wp_customize->add_setting('themename_theme_options[title_style]', array(
        'default'        => 'none',
        'capability'     => 'edit_theme_options',
        'type'           => 'option',

    ));
    $wp_customize->add_control( 'example_select_box23', array(
        'settings' => 'themename_theme_options[title_style]',
        'label'   => 'Title Style',
        'section' => 'themename_title',
        'type'    => 'select',
        'choices'    => array(
        	'mt_title_style_1' => 'Style 1',
            'mt_title_style_2' => 'Style 2',
        ),
    ));

    //  =============================
    //  = Color Picker              =
    //  =============================
    $wp_customize->add_setting('bg_default_color_title', array(
        'default'           => '',
        'sanitize_callback' => 'sanitize_hex_color',
        'capability'        => 'edit_theme_options',
        'type'           => 'option',

    ));

    $wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'bg_default_color_title', array(
        'label'    => __('Title Background Color', 'themename'),
        'section'  => 'themename_title',
        'settings' => 'bg_default_color_title',
    )));





    //  =============================
    //  = Image Upload              =
    //  =============================
    $wp_customize->add_setting('themename_theme_options[image_upload_test_title]', array(
        'capability'        => 'edit_theme_options',
        'type'           => 'option',

    ));

    $wp_customize->add_control( new WP_Customize_Image_Control($wp_customize, 'image_upload_test_title', array(
        'label'    => __('Upload Title Background Image', 'themename'),
        'section'  => 'themename_title',
        'settings' => 'themename_theme_options[image_upload_test_title]',
    )));


    //  =============================
    //  = Background Repeat  	    =
    //  =============================
     $wp_customize->add_setting('themename_theme_options[background_repeat_title]', array(
        'default'        => 'none',
        'capability'     => 'edit_theme_options',
        'type'           => 'option',

    ));
    $wp_customize->add_control( 'example_select_box', array(
        'settings' => 'themename_theme_options[background_repeat_title]',
        'label'   => 'Background Repeat:',
        'section' => 'themename_title',
        'type'    => 'select',
        'choices'    => array(
        	'none' => 'Select',
            'no-repeat' => 'No Repeat',
            'repeat' => 'Repeat',
            'repeat-x' => 'Repeat Horizontally',
            'repeat-y' => 'Repeat Vertically',
            'inherit' => 'Inherit',
        ),
    ));

    //  =============================
    //  = Background Attachment  	    =
    //  =============================
     $wp_customize->add_setting('themename_theme_options[background_attachment_title]', array(
        'default'        => 'none',
        'capability'     => 'edit_theme_options',
        'type'           => 'option',

    ));
    $wp_customize->add_control( 'example_select_box2', array(
        'settings' => 'themename_theme_options[background_attachment_title]',
        'label'   => 'Background Attachment:',
        'section' => 'themename_title',
        'type'    => 'select',
        'choices'    => array(
        	'none' => 'Select',
            'fixed' => 'Fixed',
            'scroll' => 'Scroll',
            'inherit' => 'Inherit',
        ),
    ));

    //  =============================
    //  = Background Position  	    =
    //  =============================
     $wp_customize->add_setting('themename_theme_options[background_position_title]', array(
        'default'        => 'none',
        'capability'     => 'edit_theme_options',
        'type'           => 'option',

    ));
    $wp_customize->add_control( 'example_select_box3', array(
        'settings' => 'themename_theme_options[background_position_title]',
        'label'   => 'Background Position:',
        'section' => 'themename_title',
        'type'    => 'select',
        'choices'    => array(
        	'none' => 'Select',
            'left top' => 'Left Top',
            'left center' => 'Left Center',
            'left bottom' => 'Left Bottom',
            'center top' => 'Center Top',
            'center center' => 'Center Center',
            'center bottom' => 'Center Bottom',
            'right top' => 'Right Top',
            'right center' => 'Right Center',
            'right bottom' => 'Right Bottom',
        ),
    ));



    //	==================================================
    //  =============================
    //  = ==== Rewrite CPT
    //  =============================

    $wp_customize->add_section('themename_rewrite', array(
        'title'    => __('Rewrite CPT', 'themename'),
        'priority' => 141,
    ));


	//  =============================
    //  = CPT doctor
    //  =============================
#    $wp_customize->add_setting('themename_theme_options[mt_rewrite_doctor]', array(
#        'default'        => '',
#        'capability'     => 'edit_theme_options',
#        'type'           => 'option',
#    ));
#	$wp_customize->add_control('mt_rewrite_doctor', array(
#        'label'      => 'Rewrite Doctor CPT slug',
#       'section'    => 'themename_rewrite',
#        'settings'   => 'themename_theme_options[mt_rewrite_doctor]',
#    ));

    //  =============================
    //  = CPT Services
    //  =============================
#    $wp_customize->add_setting('themename_theme_options[mt_rewrite_services]', array(
#        'default'        => '',
#        'capability'     => 'edit_theme_options',
#        'type'           => 'option',
#    ));
#	$wp_customize->add_control('mt_rewrite_services', array(
#        'label'      => 'Rewrite Services CPT slug',
#        'section'    => 'themename_rewrite',
#        'settings'   => 'themename_theme_options[mt_rewrite_services]',
#    ));

	//  =============================
    //  = CPT Portfolio
    //  =============================
    $wp_customize->add_setting('themename_theme_options[mt_rewrite_portfolio]', array(
        'default'        => '',
        'capability'     => 'edit_theme_options',
        'type'           => 'option',
    ));
	$wp_customize->add_control('mt_rewrite_portfolio', array(
        'label'      => 'Rewrite Portfolio CPT slug',
        'section'    => 'themename_rewrite',
        'settings'   => 'themename_theme_options[mt_rewrite_portfolio]',
    ));


	//  =============================
    //  = CPT Causes
    //  =============================
    $wp_customize->add_setting('themename_theme_options[mt_rewrite_causes]', array(
        'default'        => '',
        'capability'     => 'edit_theme_options',
        'type'           => 'option',
    ));
	$wp_customize->add_control('mt_rewrite_causes', array(
        'label'      => 'Rewrite Causes CPT slug',
        'section'    => 'themename_rewrite',
        'settings'   => 'themename_theme_options[mt_rewrite_causes]',
    ));






}

add_action('customize_register', 'themename_customize_register');






/**
 * Force Visual Composer to initialize as "built into the theme". This will hide certain tabs under the Settings->Visual Composer page
 */
if(function_exists('vc_set_as_theme')) vc_set_as_theme(true);

// Initialising Shortcodes
if (class_exists('WPBakeryVisualComposerAbstract')) {
	function requireVcExtend(){
		require_once locate_template('/functions/vc_functions.php');
	}
	add_action('init', 'requireVcExtend',2);
}


function custom_css_classes_for_vc_row_and_vc_column($class_string, $tag) {
  if ($tag=='vc_row') {
    $class_string = str_replace('wpb_row', 'row-fluid', $class_string);
  }
  if ($tag=='vc_column') {
    $class_string = str_replace('vc_col-sm-', 'span', $class_string);
  }
  if ($tag=='vc_column') {
    $class_string = preg_replace('/vc_col(\d{1,2})/', 'my_span$1', $class_string);
   }
  return $class_string;
}
// Filter to Replace default css class for vc_row shortcode and vc_column
add_filter('vc_shortcodes_css_class', 'custom_css_classes_for_vc_row_and_vc_column', 10, 2);

?>
