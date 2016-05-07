<?php
if (!function_exists ('add_action')) {
	header('Status: 403 Forbidden');
	header('HTTP/1.1 403 Forbidden');
	exit();
}
class madza_Import {

	public $message = "";
	public $attachments = false;
	function madza_Import() {
		add_action('admin_menu', array(&$this, 'madza_admin_import'));
		add_action('admin_init', array(&$this, 'register_madza_theme_settings'));
	}
	function register_madza_theme_settings() {
		register_setting( 'madza_options_import_page', 'madza_options_import');
	}

	function init_madza_import() {
		if(isset($_REQUEST['import_option'])) {
			$import_option = $_REQUEST['import_option'];
			if($import_option == 'content'){
				$this->import_content('madza.xml');
			}elseif($import_option == 'custom_sidebars') {
				$this->import_custom_sidebars('custom_sidebars.txt');
			} elseif($import_option == 'widgets') {
				$this->import_widgets('widgets.txt');
			} elseif($import_option == 'options'){
				$this->import_options('options.txt');
			}elseif($import_option == 'menus'){
				$this->import_menus('menus.txt');
			}elseif($import_option == 'settingpages'){
				$this->import_settings_pages('settingpages.txt');
			}elseif($import_option == 'complete_content'){
				$this->import_menus('menus.txt');
				$this->import_content('madza.xml');
				$this->import_widgets('widgets.txt');
				$this->import_options('options.txt');
				$this->import_settings_pages('settingpages.txt');
				$this->message = __("Content imported successfully", "madza");
			}
		}
	}

	

	public function import_widgets($file){
		$this->import_custom_sidebars('custom_sidebars.txt');
		$options = $this->file_options($file);
		foreach ((array) $options['widgets'] as $madza_widget_id => $madza_widget_data) {
			update_option( 'widget_' . $madza_widget_id, $madza_widget_data );
		}
		$this->import_sidebars_widgets($file);
		$this->message = __("Widgets imported successfully", "madza");
	}

	public function import_sidebars_widgets($file){
		$madza_sidebars = get_option("sidebars_widgets");
		unset($madza_sidebars['array_version']);
		$data = $this->file_options($file);
		if ( is_array($data['sidebars']) ) {
			$madza_sidebars = array_merge( (array) $madza_sidebars, (array) $data['sidebars'] );
			unset($madza_sidebars['wp_inactive_widgets']);
			$madza_sidebars = array_merge(array('wp_inactive_widgets' => array()), $madza_sidebars);
			$madza_sidebars['array_version'] = 2;
			wp_set_sidebars_widgets($madza_sidebars);
		}
	}

	public function import_custom_sidebars($file){
		$options = $this->file_options($file);
		update_option( 'madza_sidebars', $options);
		$this->message = __("Custom sidebars imported successfully", "madza");
	}

	public function import_options($file){
		$options = $this->file_options($file);
		update_option( ot_options_id(), $options);
		$this->message = __("Options imported successfully", "madza");
	}

	public function import_menus($file){
		global $wpdb;
		$madza_terms_table = $wpdb->prefix . "terms";
		$this->menus_data = $this->file_options($file);
		$menu_array = array();
		foreach ($this->menus_data as $registered_menu => $menu_slug) {
			$term_rows = $wpdb->get_results("SELECT * FROM $madza_terms_table where slug='{$menu_slug}'", ARRAY_A);
			if(isset($term_rows[0]['term_id'])) {
				$term_id_by_slug = $term_rows[0]['term_id'];
			} else {
				$term_id_by_slug = null;
			}
			$menu_array[$registered_menu] = $term_id_by_slug;
		}
		set_theme_mod('nav_menu_locations', array_map('absint', $menu_array ) );

	}
	public function import_settings_pages($file){
		$pages = $this->file_options($file);

		foreach($pages as $madza_page_option => $madza_page_id){
			update_option( $madza_page_option, $madza_page_id);
		}
	}
	public function file_options($file){
		$file_content = "";
		$file_for_import = get_template_directory() . '/functions/import/files/' . $file;
		if ( file_exists($file_for_import) ) {
			$file_content = $this->madza_file_contents($file_for_import);
		} else {
			$this->message = __("File doesn't exist", "madza");
		}
		if ($file_content) {
			$unserialized_content = unserialize(base64_decode($file_content));
			if ($unserialized_content) {
				return $unserialized_content;
			}
		}
		return false;
	}
	
	public function import_content($file){
		if (!class_exists('WP_Importer')) {
			ob_start();
			$class_wp_importer = ABSPATH . 'wp-admin/includes/class-wp-importer.php';
			require_once($class_wp_importer);
			require_once(get_template_directory() . '/functions/import/class.wordpress-importer.php');
			$madza_import = new WP_Import();
			set_time_limit(0);
			$path = get_template_directory() . '/functions/import/files/' . $file;

			$madza_import->fetch_attachments = $this->attachments;
			$returned_value = $madza_import->import($path);
			if(is_wp_error($returned_value)){
				$this->message = __("An Error Occurred During Import", "madza");
			}
			else {
				$this->message = __("Content imported successfully", "madza");
			}
			ob_get_clean();
		} else {
			$this->message = __("Error loading files", "madza");
		}
	}

	function madza_file_contents( $path ) {
		$madza_content = '';
		if ( function_exists('realpath') )
			$filepath = realpath($path);
		if ( !$filepath || !@is_file($filepath) )
			return '';

		if( ini_get('allow_url_fopen') ) {
			$madza_file_method = 'fopen';
		} else {
			$madza_file_method = 'file_get_contents';
		}
		if ( $madza_file_method == 'fopen' ) {
			$madza_handle = fopen( $filepath, 'rb' );

			if( $madza_handle !== false ) {
				while (!feof($madza_handle)) {
					$madza_content .= fread($madza_handle, 8192);
				}
				fclose( $madza_handle );
			}
			return $madza_content;
		} else {
			return file_get_contents($filepath);
		}
	}

	function madza_admin_import() {
		
add_theme_page('Madza Import', esc_html__('Madza Import', 'madza'), 'manage_options', 'madza_options_import_page', array(&$this, 'madza_generate_import_page'));



	}

	function madza_generate_import_page() {

		?>
		<div id="madza-metaboxes-general" class="wrap">
			<h2><?php _e('HappyThemes - One Click Import Demo Content', 'madza') ?></h2>
			<form method="post" action="" id="importContentForm">
				<div id="poststuff" class="metabox-holder">
					<div id="post-body" class="has-sidebar">
						<div id="post-body-content" class="has-sidebar-content">
							<table class="form-table">
								<tbody>
								<tr valign="middle">
									<td scope="row" width="150"><?php esc_html_e('Import', 'madza'); ?></td>
									<td>
										<select name="import_example" id="import_example">
											<option value="madza1">Style 1</option>
											
										</select>
										<select name="import_option" id="import_option">
											<option value="">Please Select</option>
											<option value="complete_content">All</option>
											<option value="content">Content</option>
											<option value="widgets">Widgets</option>
											<option value="options">Options</option>
										</select>
										<input type="submit" value="Import" name="import" id="import_demo_data" />
									</td>
								</tr>
								<tr valign="middle">
									<td scope="row" width="150"><?php esc_html_e('Import attachments', 'madza'); ?></td>
									<td>
										<input type="checkbox" value="1" name="import_attachments" id="import_attachments" />

									</td>
								</tr>
								<tr class="loading-row"><td></td><td><div class="import_load"><span><?php _e('The import process may take some time. Please be patient.', 'madza') ?> </span><br />
											<div class="madza-progress-bar-wrapper html5-progress-bar">
												<div class="progress-bar-wrapper">
													<progress id="progressbar" value="0" max="100"></progress>
													<span class="progress-value">0%</span>
												</div>
												<div class="progress-bar-message">
												</div>
											</div>
										</div></td></tr>
								<tr><td colspan="2">
										<?php _e('Important notes:', 'madza') ?><br />
										<?php _e('- Please note that import process will take time needed to download all attachments from demo web site.', 'madza'); ?><br />
										<?php #_e('If you plan to use shop, please install WooCommerce before you run import.', 'madza') ?>
									</td></tr>
								<tr><td></td><td><div class="success_msg" id="success_msg"><?php echo $this->message; ?></div></td></tr>
								</tbody>
							</table>
						</div>
					</div>
					<br class="clear"/>
				</div>
			</form>
			<script type="text/javascript">
			jQuery.noConflict();

				jQuery(document).ready(function() {
					jQuery(document).on('click', '#import_demo_data', function(e) {
						e.preventDefault();
						if (confirm('Are you sure, you want to import Demo Data now?')) {
							jQuery('.import_load').css('display','block');
							var progressbar = jQuery('#progressbar')
							var import_opt = jQuery( "#import_option" ).val();
							var import_expl = jQuery( "#import_example" ).val();
							var p = 0;
							if(import_opt == 'content'){
							
									jQuery('.progress-value').html((60) + '%');
									progressbar.val(60);
									
									jQuery.ajax({
										type: 'POST',
										url: ajaxurl,
										data: {
											action: 'madza_dataImport',
											example: import_expl,
											import_attachments: (jQuery("#import_attachments").is(':checked') ? 1 : 0)
										},
										complete: function(data, textStatus, XMLHttpRequest){
										
														jQuery('.progress-value').html((100) + '%');
																progressbar.val(100);
																jQuery('.progress-bar-message').html('<br />Import is completed.');
													},
													
													
										error: function(MLHttpRequest, textStatus, errorThrown){
										}
									});
								
							} else if(import_opt == 'widgets') {
								jQuery.ajax({
									type: 'POST',
									url: ajaxurl,
									data: {
										action: 'madza_widgetsImport',
										example: import_expl
									},
									success: function(data, textStatus, XMLHttpRequest){
										jQuery('.progress-value').html((100) + '%');
										progressbar.val(100);
									},
									error: function(MLHttpRequest, textStatus, errorThrown){
									}
								});
								jQuery('.progress-bar-message').html('<br />Import is completed.');
							} else if(import_opt == 'options'){
								jQuery.ajax({
									type: 'POST',
									url: ajaxurl,
									data: {
										action: 'madza_optionsImport',
										example: import_expl
									},
									success: function(data, textStatus, XMLHttpRequest){
										jQuery('.progress-value').html((100) + '%');
										progressbar.val(100);
									},
									error: function(MLHttpRequest, textStatus, errorThrown){
									}
								});
								jQuery('.progress-bar-message').html('<br />Import is completed.');
							}else if(import_opt == 'complete_content'){
							
									jQuery('.progress-value').html((60) + '%');
									progressbar.val(60);
									
									jQuery.ajax({
										type: 'POST',
										url: ajaxurl,
										data: {
											action: 'madza_dataImport',
											example: import_expl,
											import_attachments: (jQuery("#import_attachments").is(':checked') ? 1 : 0)
										},
										complete: function(data, textStatus, XMLHttpRequest){
										
														jQuery.ajax({
															type: 'POST',
															url: ajaxurl,
															data: {
																action: 'madza_otherImport',
																example: import_expl
															},
															error: function(MLHttpRequest, textStatus, errorThrown){
															}
														});
														
														jQuery('.progress-value').html((100) + '%');
																progressbar.val(100);
																jQuery('.progress-bar-message').html('<br />Import is completed.');
													},
													
													
										error: function(MLHttpRequest, textStatus, errorThrown){
										}
									});
								
							}
						}
						return false;
					});
				});
			</script>

		</div>

	<?php	}

}
global $my_madza_Import;
$my_madza_Import = new madza_Import();



if(!function_exists('madza_dataImport'))
{
	function madza_dataImport()
	{
		global $my_madza_Import;

		if ($_POST['import_attachments'] == 1)
			$my_madza_Import->attachments = true;
		else
			$my_madza_Import->attachments = false;
			
		$folder = "madza/";
		if (!empty($_POST['example']))
			$folder = $_POST['example']."/";
		
		
		$my_madza_Import->import_content($folder.'madza.xml');
		
		die();
	}

	add_action('wp_ajax_madza_dataImport', 'madza_dataImport');
}

if(!function_exists('madza_widgetsImport'))
{
	function madza_widgetsImport()
	{
		global $my_madza_Import;
		
		$folder = "madza/";
		if (!empty($_POST['example']))
			$folder = $_POST['example']."/";

		$my_madza_Import->import_widgets($folder.'widgets.txt');

		die();
	}

	add_action('wp_ajax_madza_widgetsImport', 'madza_widgetsImport');
}

if(!function_exists('madza_optionsImport'))
{
	function madza_optionsImport()
	{
		global $my_madza_Import;
		
		$folder = "madza/";
		if (!empty($_POST['example']))
			$folder = $_POST['example']."/";

		$my_madza_Import->import_options($folder.'options.txt');

		die();
	}

	add_action('wp_ajax_madza_optionsImport', 'madza_optionsImport');
}

if(!function_exists('madza_otherImport'))
{
	function madza_otherImport()
	{
		global $my_madza_Import;
		
		$folder = "madza/";
		if (!empty($_POST['example']))
			$folder = $_POST['example']."/";
		
		
		$my_madza_Import->import_options($folder.'options.txt');	
		$my_madza_Import->import_widgets($folder.'widgets.txt');		
		$my_madza_Import->import_menus($folder.'menus.txt');	
		$my_madza_Import->import_settings_pages($folder.'settingpages.txt');

		die();
	}

	add_action('wp_ajax_madza_otherImport', 'madza_otherImport');
}