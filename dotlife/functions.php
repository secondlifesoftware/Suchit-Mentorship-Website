<?php
/*
Theme Name: DotLife Theme
Theme URI: https://themes.themegoods.com/dotlife/landing
Author: ThemeGoods
Author URI: https://themeforest.net/user/ThemeGoods
License: GPLv2
*/

//Setup theme default constant and data
require_once get_template_directory() . "/lib/config.lib.php";

//Setup theme translation
require_once get_template_directory() . "/lib/translation.lib.php";

//Setup theme admin action handler
require_once get_template_directory() . "/lib/admin.action.lib.php";

//Setup theme support and image size handler
require_once get_template_directory() . "/lib/theme.support.lib.php";

//Get custom function
require_once get_template_directory() . "/lib/custom.lib.php";

//Setup menu settings
require_once get_template_directory() . "/lib/menu.lib.php";

//Setup Sidebar
require_once get_template_directory() . "/lib/sidebar.lib.php";

//Setup required plugin activation
require_once get_template_directory() . "/lib/tgm.lib.php";

//Setup theme admin settings
require_once get_template_directory() . "/lib/admin.lib.php";

//Setup theme admin pointers
require_once get_template_directory() . "/lib/admin.pointer.lib.php";

/**
*	Begin Theme Setting Panel
**/ 

function dotlife_add_admin() 
{
	$dotlife_options = dotlife_get_options();
	
	if ( isset($_GET['page']) && $_GET['page'] == 'functions.php' ) {
	 
		$redirect_uri = '';
	 
		if ( isset($_REQUEST['action']) && 'save' == $_REQUEST['action'] ) {
			$retrieved_nonce = $_REQUEST['_wpnonce'];
			if (!wp_verify_nonce($retrieved_nonce, 'dotlife_save_theme_setting' ) ) die();
	 
			//check if verify purchase code
			if(isset($_REQUEST['submit']) && $_REQUEST['submit'] == 'Register')
			{
				if(!empty($_REQUEST['pp_envato_personal_token']) && strlen($_REQUEST['pp_envato_personal_token']) == 36) {
					$url = THEMEGOODS_API.'/register-purchase';
					$data = array(
						'purchase_code' => $_REQUEST['pp_envato_personal_token'], 
						'domain' => $_REQUEST['themegoods-site-domain'],
						'item_id' => ENVATOITEMID,
					);
					$data = wp_json_encode( $data );
					$args = array( 
						'method'   	=> 'POST',
						'body'		=> $data,
					);
					//print '<pre>'; var_dump($args); print '</pre>';
					
					$response = wp_remote_post( $url, $args );
					$response_body = wp_remote_retrieve_body( $response );
					$response_obj = json_decode($response_body);
					
					$response_json = urlencode($response_body);
					//print '<pre>'; var_dump($response_body); print '</pre>';
					//print '<pre>'; var_dump("admin.php?page=functions.php&response=".$response_json."".$redirect_uri.$_REQUEST['current_tab']); print '</pre>';
					//die;
					
					if(is_bool($response_obj->response_code)) {
						if($response_obj->response_code) {
							$success_message = "Purchase code is registered.";
							
							if(!empty($response_obj->response)) {
								$error_message = $response_obj->response;
							}
							
							dotlife_register_theme($_REQUEST['pp_envato_personal_token']);
							wp_redirect(admin_url()."?page=functions.php&purchase_code=".$_REQUEST['pp_envato_personal_token']."&response=".$response_json."".$redirect_uri.$_REQUEST['current_tab']);
							
							die;
						}
						else {
							$error_message = "Purchase code is invalid.";
							
							wp_redirect(admin_url()."?page=functions.php&purchase_code=".$_REQUEST['pp_envato_personal_token']."&response=".$response_json."".$redirect_uri.$_REQUEST['current_tab']);
							
							die;
						}
					}
					else {
						$error_message = "Purchase code is invalid";
						
						wp_redirect(admin_url()."?page=functions.php&purchase_code=".$_REQUEST['pp_envato_personal_token']."&response=".$response_json."".$redirect_uri.$_REQUEST['current_tab']);
						
						die;
					}
				}
				else {
					$error_message = "Purchase code is invalid";
					wp_redirect(admin_url()."?page=functions.php&purchase_code=".$_REQUEST['pp_envato_personal_token']."&response=".$response_json."".$redirect_uri.$_REQUEST['current_tab']);
					
					die;
				}
			}
			
			//check if unregister purchase code
			if(isset($_REQUEST['submit']) && $_REQUEST['submit'] == 'Unregister')
			{
				if(!empty($_REQUEST['pp_envato_personal_token']) && strlen($_REQUEST['pp_envato_personal_token']) == 36) {
					$url = THEMEGOODS_API.'/unregister-purchase';
					$data = array(
						'purchase_code' => $_REQUEST['pp_envato_personal_token'], 
						'domain' => $_REQUEST['themegoods-site-domain'],
						'item_id' => ENVATOITEMID,
					);
					$data = wp_json_encode( $data );
					$args = array( 
						'method'   	=> 'POST',
						'body'		=> $data,
					);
					$response = wp_remote_post( $url, $args );
					$response_body = wp_remote_retrieve_body( $response );
					$response_obj = json_decode($response_body);
					
					$response_json = urlencode($response_body);
					/*print '<pre>'; var_dump($args); print '</pre>';
					print '<pre>'; var_dump($response_json); print '</pre>';
					die;*/
					if(is_bool($response_obj->response_code)) {
						if($response_obj->response_code) {
							$success_message = "Purchase code is unregistered.";
							
							if(!empty($response_obj->response)) {
								$error_message = $response_obj->response;
							}
							
							dotlife_unregister_theme();
							wp_redirect(admin_url()."?page=functions.php&response=".$response_json."".$redirect_uri.$_REQUEST['current_tab']);
							
							die;
						}
						else {
							$error_message = "Purchase code is invalid.";
							
							wp_redirect(admin_url()."?page=functions.php&purchase_code=".$_REQUEST['pp_envato_personal_token']."&response=".$response_json."".$redirect_uri.$_REQUEST['current_tab']);
							
							die;
						}
					}
					else {
						$error_message = "Purchase code is invalid";
						
						wp_redirect(admin_url()."?page=functions.php&purchase_code=".$_REQUEST['pp_envato_personal_token']."&response=".$response_json."".$redirect_uri.$_REQUEST['current_tab']);
						
						die;
					}
				}
				else {
					$error_message = "Purchase code is invalid";
					wp_redirect(admin_url()."?page=functions.php&purchase_code=".$_REQUEST['pp_envato_personal_token']."&response=".$response_json."".$redirect_uri.$_REQUEST['current_tab']);
					
					die;
				}
			}
	 
			foreach ($dotlife_options as $value) 
			{
				if($value['type'] != 'image' && isset($value['id']) && isset($_REQUEST[ $value['id'] ]))
				{
					update_option( $value['id'], $_REQUEST[ $value['id'] ] );
				}
			}
			
			foreach ($dotlife_options as $value) {
			
				if( isset($value['id']) && isset( $_REQUEST[ $value['id'] ] )) 
				{ 
	
					if($value['id'] != DOTLIFE_SHORTNAME."_sidebar0" && $value['id'] != DOTLIFE_SHORTNAME."_ggfont0")
					{
						//if sortable type
						if(is_admin() && $value['type'] == 'sortable')
						{
							$sortable_array = serialize($_REQUEST[ $value['id'] ]);
							
							$sortable_data = $_REQUEST[ $value['id'].'_sort_data'];
							$sortable_data_arr = explode(',', $sortable_data);
							$new_sortable_data = array();
							
							foreach($sortable_data_arr as $key => $sortable_data_item)
							{
								$sortable_data_item_arr = explode('_', $sortable_data_item);
								
								if(isset($sortable_data_item_arr[0]))
								{
									$new_sortable_data[] = $sortable_data_item_arr[0];
								}
							}
							
							update_option( $value['id'], $sortable_array );
							update_option( $value['id'].'_sort_data', serialize($new_sortable_data) );
						}
						elseif(is_admin() && $value['type'] == 'font')
						{
							if(!empty($_REQUEST[ $value['id'] ]))
							{
								update_option( $value['id'], $_REQUEST[ $value['id'] ] );
								update_option( $value['id'].'_value', $_REQUEST[ $value['id'].'_value' ] );
							}
							else
							{
								delete_option( $value['id'] );
								delete_option( $value['id'].'_value' );
							}
						}
						elseif(is_admin())
						{
							if($value['type']=='image')
							{
								update_option( $value['id'], esc_url($_REQUEST[ $value['id'] ])  );
							}
							elseif($value['type']=='textarea')
							{
								if(isset($value['validation']) && !empty($value['validation']))
								{
									update_option( $value['id'], esc_textarea($_REQUEST[ $value['id'] ]) );
								}
								else
								{
									update_option( $value['id'], $_REQUEST[ $value['id'] ] );
								}
							}
							elseif($value['type']=='iphone_checkboxes' OR $value['type']=='jslider')
							{
								update_option( $value['id'], $_REQUEST[ $value['id'] ]  );
							}
							else
							{
								if(isset($value['validation']) && !empty($value['validation']))
								{
									$request_value = $_REQUEST[ $value['id'] ];
									
									//Begin data validation
									switch($value['validation'])
									{
										case 'text':
										default:
											$request_value = sanitize_text_field($request_value);
										
										break;
										
										case 'email':
											$request_value = sanitize_email($request_value);
	
										break;
										
										case 'javascript':
											$request_value = sanitize_text_field($request_value);
	
										break;
										
									}
									update_option( $value['id'], $request_value);
								}
								else
								{
									update_option( $value['id'], $_REQUEST[ $value['id'] ]  );
								}
							}
						}
					}
					elseif(is_admin() && isset($_REQUEST[ $value['id'] ]) && !empty($_REQUEST[ $value['id'] ]))
					{
						if($value['id'] == DOTLIFE_SHORTNAME."_sidebar0")
						{
							//get last sidebar serialize array
							$current_sidebar = get_option(DOTLIFE_SHORTNAME."_sidebar");
							$request_value = $_REQUEST[ $value['id'] ];
							$request_value = sanitize_text_field($request_value);
							
							$current_sidebar[ $request_value ] = $request_value;
				
							update_option( DOTLIFE_SHORTNAME."_sidebar", $current_sidebar );
						}
						elseif($value['id'] == DOTLIFE_SHORTNAME."_ggfont0")
						{
							//get last ggfonts serialize array
							$current_ggfont = get_option(DOTLIFE_SHORTNAME."_ggfont");
							$current_ggfont[ $_REQUEST[ $value['id'] ] ] = $_REQUEST[ $value['id'] ];
				
							update_option( DOTLIFE_SHORTNAME."_ggfont", $current_ggfont );
						}
					}
				} 
				else 
				{ 
					if(is_admin() && isset($value['id']))
					{
						delete_option( $value['id'] );
					}
				} 
			}
	
			header("Location: admin.php?page=functions.php&saved=true".$redirect_uri.$_REQUEST['current_tab']);
		}  
	} 
	 
	add_menu_page('Theme Setting', 'Theme Setting', 'administrator', 'functions.php', 'dotlife_admin', '', 3);
}

function dotlife_enqueue_admin_page_scripts() 
{
	$current_screen = dotlife_get_current_screen();
	
	//Enqueue CSS scripts for backend
	wp_enqueue_style('thickbox');
	wp_enqueue_style('dotlife-functions', get_template_directory_uri().'/functions/css/functions.css', false, DOTLIFE_THEMEVERSION, 'all');
	wp_enqueue_style('tooltipster', get_template_directory_uri().'/css/tooltipster.css', false, '', 'all');

	wp_enqueue_style('switchery', get_template_directory_uri().'/functions/css/switchery.css', false, DOTLIFE_THEMEVERSION, 'all');
	wp_enqueue_style("fontawesome", get_template_directory_uri()."/css/font-awesome.min.css", false, DOTLIFE_THEMEVERSION, "all");
	
	//Enqueue JS scripts for backend
	wp_enqueue_script('jquery-ui-core');
	wp_enqueue_script('jquery-ui-sortable');
	wp_enqueue_script('jquery-ui-tabs');
	wp_enqueue_script('media-upload');
	wp_enqueue_script('thickbox');
	wp_enqueue_script('jquery-ui-datepicker');
	
	$ap_vars = array(
	    'url' => esc_url(get_home_url('/')),
	    'includes_url' => esc_url(includes_url())
	);
	
	wp_enqueue_script('switchery', get_template_directory_uri().'/functions/switchery.js', false, DOTLIFE_THEMEVERSION);
	wp_enqueue_script('tooltipster', get_template_directory_uri().'/js/jquery.tooltipster.min.js', false, '', true);
	
	$custom_tooltipster_script = '
	jQuery(function( $ ) {
		jQuery(".tooltipster").tooltipster({
			position: "left"
		});
	});
	';
	wp_add_inline_script( 'tooltipster', $custom_tooltipster_script );
	
	wp_register_script('dotlife-theme-script', get_template_directory_uri().'/functions/theme_script.js', false, DOTLIFE_THEMEVERSION, true);
	$params = array(
	  	'ajaxurl' => esc_url(admin_url('admin-ajax.php')),
		'nonce' => wp_create_nonce( 'wp_rest' ),
		'tgurl' => THEMEGOODS_API,
		'itemid' => ENVATOITEMID,
		'purchaseurl' => THEMEGOODS_PURCHASE_URL,
	);
	wp_localize_script( 'dotlife-theme-script', 'tgAjax', $params );
	wp_enqueue_script( 'dotlife-theme-script' );
}

add_action('admin_enqueue_scripts',	'dotlife_enqueue_admin_page_scripts' );

function dotlife_enqueue_front_page_scripts() 
{
	wp_enqueue_style("dotlife-reset-css", get_template_directory_uri()."/css/core/reset.css", false, "");
	wp_enqueue_style("dotlife-wordpress-css", get_template_directory_uri()."/css/core/wordpress.css", false, "");
	wp_enqueue_style("dotlife-screen", get_template_directory_uri().'/css/core/screen.css', false, "", "all");
	wp_enqueue_style('modulobox', get_template_directory_uri().'/css/modulobox.css', false, false, 'all' );
	
	//Check menu layout
	$tg_menu_layout = dotlife_menu_layout();
	
	switch($tg_menu_layout)
	{
		case 'leftalign':
			wp_enqueue_style("dotlife-leftalignmenu", get_template_directory_uri().'/css/menus/leftalignmenu.css', false, "", "all");
		break;
		
		case 'hammenufull':
			wp_enqueue_style("dotlife-hammenufull", get_template_directory_uri().'/css/menus/hammenufull.css', false, "", "all");
		break;
		
		case 'centeralogo':
			wp_enqueue_style("dotlife-centeralogo", get_template_directory_uri().'/css/menus/centeralogo.css', false, "", "all");
		break;
	}
	
	//Add Font Awesome Support
	wp_enqueue_style("fontawesome", get_template_directory_uri()."/css/font-awesome.min.css", false, "", "all");
	wp_enqueue_style("themify-icons", get_template_directory_uri()."/css/themify-icons.css", false, DOTLIFE_THEMEVERSION, "all");
    
    $tg_frame = get_theme_mod('tg_frame', false);
    if(DOTLIFE_THEMEDEMO && isset($_GET['frame']) && !empty($_GET['frame']))
    {
	    $tg_frame = 1;
    }
    
    if(!empty($tg_frame))
    {
    	wp_enqueue_style("tg_frame", get_template_directory_uri()."/css/core/frame.css", false, DOTLIFE_THEMEVERSION, "all");
    }
	
	if(DOTLIFE_THEMEDEMO)
    {
	   	wp_enqueue_style('tooltipster', get_template_directory_uri()."/css/tooltipster.css", false, "", "all");
	    wp_enqueue_style('dotlife-demo', get_template_directory_uri()."/css/core/demo.css", false, "", "all");
	}
	
	//If using child theme
	if(is_child_theme())
	{
	    wp_enqueue_style('dotlife-childtheme', get_template_directory_uri()."/style.css", false, "", "all");
	}
	
	//Enqueue javascripts
	wp_enqueue_script('jquery-ui-core');
	wp_enqueue_script("jquery-effects-core");
	wp_enqueue_script("waypoints", get_template_directory_uri()."/js/waypoints.min.js", false, DOTLIFE_THEMEVERSION, true);
	wp_enqueue_script("tilt", get_template_directory_uri()."/js/tilt.jquery.js", false, DOTLIFE_THEMEVERSION, true);
	wp_enqueue_script("stellar", get_template_directory_uri()."/js/jquery.stellar.min.js", false, DOTLIFE_THEMEVERSION, true);
	wp_enqueue_script('modulobox', get_template_directory_uri()."/js/modulobox.js", array(), false, true );
	wp_enqueue_script('smoove', get_template_directory_uri().'/js/jquery.smoove.js', false, '', true);
	wp_enqueue_script("dotlife-custom-plugins", get_template_directory_uri()."/js/core/custom_plugins.js", false, DOTLIFE_THEMEVERSION, true);
	wp_enqueue_script("dotlife-custom-script", get_template_directory_uri()."/js/core/custom.js", false, DOTLIFE_THEMEVERSION, true);
	
	//Check if disable right click
	$tg_enable_right_click = get_theme_mod('tg_enable_right_click', false);
	if(!empty($tg_enable_right_click))
	{
		$custom_right_click_script = '
		jQuery(function( $ ) {
			jQuery(document).bind("contextmenu", function(e) {
				jQuery("#right_click_content").addClass("visible");
				jQuery("body").addClass("right_clicked");
		    	e.preventDefault();
		    	
		    	jQuery(document).mousedown(function(event) {
			    	jQuery("#right_click_content").removeClass("visible");
					jQuery("body").removeClass("right_clicked");
			    });
		    });
		});
		';
		
		wp_add_inline_script( 'dotlife-custom-script', $custom_right_click_script );
	}
	
	$tg_enable_dragging = get_theme_mod('tg_enable_dragging', false);
	if(!empty($tg_enable_dragging))
	{
		$custom_drag_script = '
		jQuery(function( $ ) {
			jQuery("img").on("dragstart", function(event) { event.preventDefault(); });
		});
		';
		
		wp_add_inline_script( 'dotlife-custom-script', $custom_drag_script );
	}
	
	//Check if sticky sidebar
	$tg_sidebar_sticky = get_theme_mod('tg_sidebar_sticky', true);
	
	if(!empty($tg_sidebar_sticky))
	{
		wp_enqueue_script("sticky-kit", get_template_directory_uri()."/js/jquery.sticky-kit.min.js", false, DOTLIFE_THEMEVERSION, true);
		
		$custom_sticky_kit_script = '
		jQuery(function( $ ) {
			jQuery("#page_content_wrapper .sidebar_wrapper").stick_in_parent({ offset_top: 100 });
			
			if(jQuery(window).width() < 768 || is_touch_device())
			{
				jQuery("#page_content_wrapper .sidebar_wrapper").trigger("sticky_kit:detach");
			}
		});
		';
		
		wp_add_inline_script( 'sticky-kit', $custom_sticky_kit_script );
	}
	
	//Check if enable lazy load image
	$tg_enable_lazy_loading = get_theme_mod('tg_enable_lazy_loading', true);
		
	if(!empty($tg_enable_lazy_loading))
	{
		wp_enqueue_script("lazy", get_template_directory_uri()."/js/jquery.lazy.js", false, DOTLIFE_THEMEVERSION, true);
		$custom_lazy_script = '
		jQuery(function( $ ) {
			jQuery("img.lazy").each(function() {
				var currentImg = jQuery(this);
				
				jQuery(this).Lazy({
					onFinishedAll: function() {
						currentImg.parent("div.post_img_hover").removeClass("lazy");
						currentImg.parent(".tg_gallery_lightbox").parent("div.gallery_grid_item").removeClass("lazy");
						currentImg.parent("div.gallery_grid_item").removeClass("lazy");
			        }
				});
			});
		});
		';
		
		wp_add_inline_script( 'lazy', $custom_lazy_script );
	}
	
	if(DOTLIFE_THEMEDEMO)
	{
		wp_enqueue_script("tooltipster", get_template_directory_uri()."/js/jquery.tooltipster.min.js", false, DOTLIFE_THEMEVERSION, true);
	
		$custom_tooltipster_script = '
		jQuery(function( $ ) {
			jQuery(".demotip").tooltipster({
				position: "left"
			});
		});
		';
		
		wp_add_inline_script( 'tooltipster', $custom_tooltipster_script );
	}
	
}
add_action( 'wp_enqueue_scripts', 'dotlife_enqueue_front_page_scripts' );


//Enqueue mobile CSS after all others CSS load
function dotlife_register_mobile_css() 
{
	//Check if enable responsive layout
	wp_enqueue_style('dotlife-script-responsive-css', get_template_directory_uri()."/css/core/responsive.css", false, "", "all");
	
	$animation_custom_css = '
		@keyframes fadeInUp {
		    0% {
		    	opacity: 0;
		    	transform: translateY(10%);
		    }
		    100% {
		    	opacity: 1;
		    	transform: translateY(0%);
		    }	
		}
		
		@keyframes fadeInDown {
		    0% {
		    	opacity: 0;
		    	transform: translateY(-10%);
		    }
		    100% {
		    	opacity: 1;
		    	transform: translateY(0%);
		    }	
		}
		
		@keyframes fadeInLeft {
		    0% {
		    	opacity: 0;
		    	transform: translateX(10%);
		    }
		    100% {
		    	opacity: 1;
		    	transform: translateX(0%);
		    }	
		}
		
		@keyframes fadeInRight {
		    0% {
		    	opacity: 0;
		    	transform: translateX(-10%);
		    }
		    100% {
		    	opacity: 1;
		    	transform: translateX(0%);
		    }	
		}
	';
	wp_add_inline_style('dotlife-script-responsive-css', $animation_custom_css );
}
add_action('wp_enqueue_scripts', 'dotlife_register_mobile_css', 99);


function dotlife_admin() 
{ 
	$dotlife_options = dotlife_get_options();
	$i=0;
	
	$pp_font_family = get_option('pp_font_family');
	
	if(function_exists( 'wp_enqueue_media' )){
	    wp_enqueue_media();
	}
	?>
		
		<form id="pp_form" method="post" enctype="multipart/form-data">
		<div class="pp_wrap rm_wrap">
		
		<div class="header_wrap">
			<div style="float:left">
			<?php
				//Display logo in theme setting
				$tg_retina_logo_for_admin = get_theme_mod('tg_retina_logo_for_admin');
				$tg_retina_logo = get_theme_mod('tg_retina_logo');
				
				if(empty($tg_retina_logo_for_admin))
				{
			?>
			<h2><?php esc_html_e('Theme Setting', 'dotlife' ); ?><span class="pp_version"><?php esc_html_e('Version', 'dotlife' ); ?> <?php echo DOTLIFE_THEMEVERSION; ?></span></h2>
			<?php
				}
				else if(!empty($tg_retina_logo))
				{
			?>
			<div class="pp_setting_logo_wrapper">
			<?php
					//Get image width and height
			    	$image_id = dotlife_get_image_id($tg_retina_logo);
			    	if(!empty($image_id))
			    	{
			    		$obj_image = wp_get_attachment_image_src($image_id, 'original');
			    		
			    		$image_width = 0;
				    	$image_height = 0;
				    	
				    	if(isset($obj_image[1]))
				    	{
				    		$image_width = intval($obj_image[1]/2);
				    	}
				    	if(isset($obj_image[2]))
				    	{
				    		$image_height = intval($obj_image[2]/2);
				    	}
			    	}
			    	else
			    	{
				    	$image_width = 0;
				    	$image_height = 0;
			    	}
						
					if($image_width > 0 && $image_height > 0)
					{
					?>
					<img src="<?php echo esc_url($tg_retina_logo); ?>" alt="<?php esc_attr(get_bloginfo('name')); ?>" width="<?php echo esc_attr($image_width); ?>" height="<?php echo esc_attr($image_height); ?>"/>
					<?php
					}
					else
					{
					?>
	    	    	<img src="<?php echo esc_url($tg_retina_logo); ?>" alt="<?php esc_attr(get_bloginfo('name')); ?>" width="126" height ="32"/>
	    	    <?php 
		    	    }
		    	?>
		    	<span class="pp_version"><?php esc_html_e('Version', 'dotlife' ); ?> <?php echo DOTLIFE_THEMEVERSION; ?></span>
			</div>
			<?php
				}
			?>
			</div>
			<div class="save_settings_wrapper">
				<input id="save_ppsettings" name="save_ppsettings" class="button button-primary button-large" type="submit" value="<?php esc_html_e('Save', 'dotlife' ); ?>" />
				<br/><br/>
				<input type="hidden" name="action" value="save" />
				<input type="hidden" name="current_tab" id="current_tab" value="#pp_panel_general" />
				<?php wp_nonce_field('dotlife_save_theme_setting'); ?>
			</div>
			<input type="hidden" name="pp_admin_url" id="pp_admin_url" value="<?php echo get_template_directory_uri(); ?>"/>
	
	<?php
		//Check if theme has new update
	?>
	
		</div>
		
		<div class="pp_wrap">
		<div id="pp_panel">
		<?php 
			foreach ($dotlife_options as $value) {
				
				$active = '';
				
				if($value['type'] == 'section')
				{
					if($value['name'] == 'Registration')
					{
						$active = 'nav-tab-active';
					}
					echo '<a id="pp_panel_'.strtolower($value['name']).'_a" href="#pp_panel_'.strtolower($value['name']).'" class="nav-tab '.esc_attr($active).'">'.str_replace('-', ' ', $value['name']).'</a>';
				}
			}
		?>
		</h2>
		</div>
	
		<div class="rm_opts">
		
	<?php 
	foreach ($dotlife_options as $value) {
	switch ( $value['type'] ) {
	 
	case "open":
	?> <?php break;
	 
	case "close":
	?>
		
		</div>
		</div>
	
	
		<?php break;
	 
	case "title":
	?>
	
	
	<?php break;
	 
	case 'text':
		
		//if sidebar input then not show default value
		if($value['id'] != DOTLIFE_SHORTNAME."_sidebar0" && $value['id'] != DOTLIFE_SHORTNAME."_ggfont0")
		{
			$default_val = get_option( $value['id'] );
		}
		else
		{
			$default_val = '';	
		}
	?>
	
		<div id="<?php echo esc_attr($value['id']); ?>_section" class="rm_input rm_text"><label for="<?php echo esc_attr($value['id']); ?>"><?php echo stripslashes($value['name']); ?></label>
		
		<small class="description"><?php echo stripslashes($value['desc']); ?></small>
		
		<input name="<?php echo esc_attr($value['id']); ?>"
			id="<?php echo esc_attr($value['id']); ?>" type="<?php echo esc_attr($value['type']); ?>"
			value="<?php if ($default_val != "") { echo esc_attr(get_option( $value['id'])) ; } else { echo esc_attr($value['std']); } ?>"
			<?php if(!empty($value['size'])) { echo 'style="width:'.intval($value['size']).'"'; } ?> />
		<div class="clearfix"></div>
		
		<?php
		if($value['id'] == DOTLIFE_SHORTNAME."_sidebar0")
		{
			$current_sidebar = get_option(DOTLIFE_SHORTNAME."_sidebar");
			
			if(!empty($current_sidebar))
			{
		?>
			<br class="clear"/><br/>
		 	<div class="pp_sortable_wrapper">
			<ul id="current_sidebar" class="rm_list">
	
		<?php
			foreach($current_sidebar as $sidebar)
			{
		?> 
				
				<li id="<?php echo esc_attr($sidebar); ?>"><div class="title"><?php echo esc_html($sidebar); ?></div><a href="<?php echo admin_url('themes.php?page=functions.php'); ?>" class="sidebar_del" rel="<?php echo esc_attr($sidebar); ?>"><span class="dashicons dashicons-no"></span></a><br style="clear:both"/></li>
		
		<?php
			}
		?>
		
			</ul>
			</div>
			<br style="clear:both"/>
		<?php
			}
		}
		?>
	
		</div>
		<?php
	break;
	 
	case 'textarea':
	?>
	
		<div id="<?php echo esc_attr($value['id']); ?>_section" class="rm_input rm_textarea"><label
			for="<?php echo esc_attr($value['id']); ?>"><?php echo stripslashes($value['name']); ?></label>
			
		<small class="description"><?php echo stripslashes($value['desc']); ?></small>
		
		<textarea id="<?php echo esc_attr($value['id']); ?>" name="<?php echo esc_attr($value['id']); ?>"
			type="<?php echo esc_attr($value['type']); ?>" cols="" rows=""><?php if ( get_option( $value['id'] ) != "") { echo stripslashes(get_option( $value['id']) ); } else { echo esc_html($value['std']); } ?></textarea>
		
		<div class="clearfix"></div>
	
		</div>
	
		<?php
	break;
	
	case 'css':
	?>
	
		<div id="<?php echo esc_attr($value['id']); ?>_section" class="rm_input rm_textarea"><label
			for="<?php echo esc_attr($value['id']); ?>"><?php echo stripslashes($value['name']); ?></label>
			
		<small class="description"><?php echo stripslashes($value['desc']); ?></small>
		
		<textarea id="<?php echo esc_attr($value['id']); ?>" class="css" name="<?php echo esc_attr($value['id']); ?>"
			type="<?php echo esc_attr($value['type']); ?>"><?php if ( get_option( $value['id'] ) != "") { echo stripslashes(get_option( $value['id']) ); } else { echo esc_html($value['std']); } ?></textarea>
		
		<div class="clearfix"></div>
	
		</div>
	
		<?php
	break;
	 
	case 'select':
	?>
	
		<div id="<?php echo esc_attr($value['id']); ?>_section" class="rm_input rm_select"><label
			for="<?php echo esc_attr($value['id']); ?>"><?php echo stripslashes($value['name']); ?></label><br/>
	
		<select name="<?php echo esc_attr($value['id']); ?>"
			id="<?php echo esc_attr($value['id']); ?>">
			<?php foreach ($value['options'] as $key => $option) { ?>
			<option
			<?php if (get_option( $value['id'] ) == $key) { echo 'selected="selected"'; } ?>
				value="<?php echo esc_attr($key); ?>"><?php echo esc_html($option); ?></option>
			<?php } ?>
		</select> <small class="description"><?php echo stripslashes($value['desc']); ?></small>
		<div class="clearfix"></div>
		</div>
		<?php
	break;
	 
	case 'radio':
	?>
	
		<div id="<?php echo esc_attr($value['id']); ?>_section" class="rm_input rm_select"><label
			for="<?php echo esc_attr($value['id']); ?>"><?php echo stripslashes($value['name']); ?></label><br/><br/>
	
		<div style="margin-top:5px;float:left;<?php if(!empty($value['desc'])) { ?>width:300px<?php } else { ?>width:500px<?php } ?>">
		<?php foreach ($value['options'] as $key => $option) { ?>
		<div style="float:left;<?php if(!empty($value['desc'])) { ?>margin:0 20px 20px 0<?php } ?>">
			<input style="float:left;" id="<?php echo esc_attr($value['id']); ?>" name="<?php echo esc_attr($value['id']); ?>" type="radio"
			<?php if (get_option( $value['id'] ) == $key) { echo 'checked="checked"'; } ?>
				value="<?php echo esc_attr($key); ?>"/><?php echo esc_html($option); ?>
		</div>
		<?php } ?>
		</div>
		
		<?php if(!empty($value['desc'])) { ?>
			<small class="description"><?php echo stripslashes($value['desc']); ?></small>
		<?php } ?>
		<div class="clearfix"></div>
		</div>
		<?php
	break;
	
	case 'sortable':
	?>
	
		<div id="<?php echo esc_attr($value['id']); ?>_section" class="rm_input rm_select"><label
			for="<?php echo esc_attr($value['id']); ?>"><?php echo stripslashes($value['name']); ?></label><br/>
	
		<div style="float:left;width:100%;">
		<?php 
		$sortable_array = array();
		if(get_option( $value['id'] ) != 1)
		{
			$sortable_array = unserialize(get_option( $value['id'] ));
		}
		
		$current = 1;
		
		if(!empty($value['options']))
		{
		?>
		<select name="<?php echo esc_attr($value['id']); ?>"
			id="<?php echo esc_attr($value['id']); ?>" class="pp_sortable_select">
		<?php
		foreach ($value['options'] as $key => $option) { 
			if($key > 0)
			{
		?>
		<option value="<?php echo esc_attr($key); ?>" data-rel="<?php echo esc_attr($value['id']); ?>_sort" title="<?php echo html_entity_decode($option); ?>"><?php echo html_entity_decode($option); ?></option>
		<?php }
		
				if($current>1 && ($current-1)%3 == 0)
				{
		?>
		
				<br style="clear:both"/>
		
		<?php		
				}
				
				$current++;
			}
		?>
		</select>
		<a class="button pp_sortable_button" data-rel="<?php echo esc_attr($value['id']); ?>" class="button" style="display:inline-block"><?php echo esc_html__('Add', 'dotlife' ); ?></a>
		<?php
		}
		?>
		 
		 <br style="clear:both"/><br/>
		 
		 <div class="pp_sortable_wrapper">
		 <ul id="<?php echo esc_attr($value['id']); ?>_sort" class="pp_sortable" rel="<?php echo esc_attr($value['id']); ?>_sort_data"> 
		 <?php
		 	$sortable_data_array = unserialize(get_option( $value['id'].'_sort_data' ));
	
		 	if(!empty($sortable_data_array))
		 	{
		 		foreach($sortable_data_array as $key => $sortable_data_item)
		 		{
			 		if(!empty($sortable_data_item))
			 		{
		 		
		 ?>
		 		<li id="<?php echo esc_attr($sortable_data_item); ?>_sort" class="ui-state-default"><div class="title"><?php echo esc_html($value['options'][$sortable_data_item]); ?></div><a data-rel="<?php echo esc_attr($value['id']); ?>_sort" href="javascript:;" class="remove"><i class="fa fa-trash"></i></a><br style="clear:both"/></li> 	
		 <?php
		 			}
		 		}
		 	}
		 ?>
		 </ul>
		 
		 </div>
		 
		</div>
		
		<input type="hidden" id="<?php echo esc_attr($value['id']); ?>_sort_data" name="<?php echo esc_attr($value['id']); ?>_sort_data" value="" style="width:100%"/>
		<br style="clear:both"/><br/>
		
		<div class="clearfix"></div>
		</div>
		<?php
	break;
	 
	case "checkbox":
	?>
	
		<div id="<?php echo esc_attr($value['id']); ?>_section" class="rm_input rm_checkbox"><label
			for="<?php echo esc_attr($value['id']); ?>"><?php echo stripslashes($value['name']); ?></label><br/>
	
		<?php if(get_option($value['id'])){ $checked = "checked=\"checked\""; }else{ $checked = "";} ?>
		<input type="checkbox" name="<?php echo esc_attr($value['id']); ?>"
			id="<?php echo esc_attr($value['id']); ?>" value="true" <?php echo esc_html($checked); ?> />
	
	
		<small class="description"><?php echo stripslashes($value['desc']); ?></small>
		<div class="clearfix"></div>
		</div>
	<?php break; 
	
	case "iphone_checkboxes":
	?>
	
		<div id="<?php echo esc_attr($value['id']); ?>_section" class="rm_input rm_checkbox"><label
			for="<?php echo esc_attr($value['id']); ?>"><?php echo stripslashes($value['name']); ?></label>
	
		<small class="description"><?php echo stripslashes($value['desc']); ?></small>
	
		<?php if(get_option($value['id'])){ $checked = "checked=\"checked\""; }else{ $checked = "";} ?>
		<input type="checkbox" class="iphone_checkboxes" name="<?php echo esc_attr($value['id']); ?>"
			id="<?php echo esc_attr($value['id']); ?>" value="true" <?php echo esc_html($checked); ?> />
	
		<div class="clearfix"></div>
		</div>
	
	<?php break; 
	
	case "html":
	?>
	
		<div id="<?php echo esc_attr($value['id']); ?>_section" class="rm_input rm_checkbox"><label
			for="<?php echo esc_attr($value['id']); ?>"><?php echo stripslashes($value['name']); ?></label><br/>
	
		<small class="description"><?php echo stripslashes($value['desc']); ?></small>
	
		<?php echo stripslashes($value['html']); ?>
	
		<div class="clearfix"></div>
		</div>
	
	<?php break; 
	
	case "shortcut":
	?>
	
		<div id="<?php echo esc_attr($value['id']); ?>_section" class="rm_input rm_shortcut">
	
		<ul class="pp_shortcut_wrapper">
		<?php 
			$count_shortcut = 1;
			foreach ($value['options'] as $key_shortcut => $option) { ?>
			<li><a href="#<?php echo esc_attr($key_shortcut); ?>" <?php if($count_shortcut==1) { ?>class="active"<?php } ?>><?php echo esc_html($option); ?></a></li>
		<?php $count_shortcut++; } ?>
		</ul>
	
		<div class="clearfix"></div>
		</div>
	
	<?php break; 
		
	case "section":
	
	$i++;
	
	?>
	
		<div id="pp_panel_<?php echo strtolower($value['name']); ?>" class="rm_section">
		<div class="rm_title">
		<span class="submit"><input class="button-primary" name="save<?php echo esc_attr($i); ?>" type="submit"
			value="Save changes" /> </span>
		<div class="clearfix"></div>
		</div>
		<div class="rm_options"><?php break;
	 
	}
	}
	?>
	 	
	 	<div class="clearfix"></div>
	 	</form>
	 	</div>
	</div>
<?php
}

add_action('admin_menu', 'dotlife_add_admin');

/**
*	End Theme Setting Panel
**/ 

//Setup Theme Customizer
require_once get_template_directory() . "/modules/kirki/kirki.php";

//Setup theme custom filters
require_once get_template_directory() . "/lib/theme.filter.lib.php";

//Setup theme learnpress plugin filters
require_once get_template_directory() . "/lib/leanpress.filter.lib.php";

//Setup Typekit Font Support
/*require_once get_template_directory() . "/modules/typekit/section-typekit.php";
require_once get_template_directory() . "/modules/typekit/kirki-add-typekit.php";*/

//Setup Custom Font Support
require_once get_template_directory() . "/modules/fonts/section-fonts.php";
require_once get_template_directory() . "/modules/fonts/kirki-add-fonts.php";

require_once get_template_directory() . "/lib/customizer.lib.php";


//Check if Woocommerce is installed	
if(class_exists('Woocommerce'))
{
	//Setup Woocommerce Config
	require_once get_template_directory() . "/modules/woocommerce.php";
}

/**
*	End add product to cart function
**/

add_action('wp_ajax_kirki_dynamic_css', 'kirki_dynamic_css');
add_action('wp_ajax_nopriv_kirki_dynamic_css', 'kirki_dynamic_css');

function kirki_dynamic_css() {
	$kirki = dotlife_get_kirki();

	die();
}

if(DOTLIFE_THEMEDEMO)
{
	function dotlife_add_my_query_var( $link ) 
	{
		$arr_params = array();
	    
	    if(isset($_GET['topbar'])) 
		{
			$arr_params['topbar'] = $_GET['topbar'];
		}
		
		if(isset($_GET['menu'])) 
		{
			$arr_params['menu'] = $_GET['menu'];
		}
		
		if(isset($_GET['frame'])) 
		{
			$arr_params['frame'] = $_GET['frame'];
		}
		
		if(isset($_GET['frame_color'])) 
		{
			$arr_params['frame_color'] = $_GET['frame_color'];
		}
		
		if(isset($_GET['boxed'])) 
		{
			$arr_params['boxed'] = $_GET['boxed'];
		}
		
		if(isset($_GET['footer'])) 
		{
			$arr_params['footer'] = $_GET['footer'];
		}
		
		if(isset($_GET['menulayout'])) 
		{
			$arr_params['menulayout'] = $_GET['menulayout'];
		}
		
		$link = add_query_arg( $arr_params, $link );
	    
	    return $link;
	}
	add_filter('category_link','dotlife_add_my_query_var');
	add_filter('page_link','dotlife_add_my_query_var');
	add_filter('post_link','dotlife_add_my_query_var');
	add_filter('term_link','dotlife_add_my_query_var');
	add_filter('tag_link','dotlife_add_my_query_var');
	add_filter('category_link','dotlife_add_my_query_var');
	add_filter('post_type_link','dotlife_add_my_query_var');
	add_filter('attachment_link','dotlife_add_my_query_var');
	add_filter('year_link','dotlife_add_my_query_var');
	add_filter('month_link','dotlife_add_my_query_var');
	add_filter('day_link','dotlife_add_my_query_var');
	add_filter('search_link','dotlife_add_my_query_var');
	add_filter('previous_post_link','dotlife_add_my_query_var');
	add_filter('next_post_link','dotlife_add_my_query_var');
}

//Setup custom settings when theme is activated
if (isset($_GET['activated']) && $_GET['activated'] && is_admin() && current_user_can('manage_options')){
	$tg_custom_fonts = get_theme_mod('tg_custom_fonts');
	$is_added_default_font = FALSE;
	
	if(!empty($tg_custom_fonts) && is_array($tg_custom_fonts))
	{
		foreach($tg_custom_fonts as $tg_custom_font)
		{
			if(isset($tg_custom_font['font_name']))
			{
				$tg_custom_font['font_name'] == 'Jost';
				$is_added_default_font = TRUE;
				break;
			}
		}
	}
	$is_added_default_font = FALSE;
	if(!$is_added_default_font)
	{
		$default_custom_fonts = array(
			0 => array(
				'font_name' => 	'Jost',
				'font_url' 	=>	get_template_directory_uri().'/fonts/Jost-300-Light.woff',
				'font_fallback'	=> 'sans-serif',
				'font_weight' => 300,
				'font_style' => 'normal',
			),
			1 => array(
				'font_name' => 	'Jost',
				'font_url' 	=>	get_template_directory_uri().'/fonts/Jost-400-Book.woff',
				'font_fallback'	=> 'sans-serif',
				'font_weight' => 400,
				'font_style' => 'normal',
			),
			2 => array(
				'font_name' => 	'Jost',
				'font_url' 	=>	get_template_directory_uri().'/fonts/Jost-500-Medium.woff',
				'font_fallback'	=> 'sans-serif',
				'font_weight' => 700,
				'font_style' => 'normal',
			),
			3 => array(
				'font_name' => 	'Jost',
				'font_url' 	=>	get_template_directory_uri().'/fonts/Jost-700-Bold.woff',
				'font_fallback'	=> 'sans-serif',
				'font_weight' => 900,
				'font_style' => 'normal',
			),
			4 => array(
				'font_name' => 	'HK Grotesk',
				'font_url' 	=>	get_template_directory_uri().'/fonts/HKGrotesk-Regular.woff',
				'font_fallback'	=> 'sans-serif',
				'font_weight' => 400,
				'font_style' => 'normal',
			),
			5 => array(
				'font_name' => 	'HK Grotesk',
				'font_url' 	=>	get_template_directory_uri().'/fonts/HKGrotesk-SemiBold.woff',
				'font_fallback'	=> 'sans-serif',
				'font_weight' => 700,
				'font_style' => 'normal',
			),
			6 => array(
				'font_name' => 	'HK Grotesk',
				'font_url' 	=>	get_template_directory_uri().'/fonts/HKGrotesk-Bold.woff',
				'font_fallback'	=> 'sans-serif',
				'font_weight' => 900,
				'font_style' => 'normal',
			),
			7 => array(
				'font_name' => 	'Inter',
				'font_url' 	=>	get_template_directory_uri().'/fonts/Inter-Medium.woff',
				'font_fallback'	=> 'sans-serif',
				'font_weight' => 500,
				'font_style' => 'normal',
			),
			8 => array(
				'font_name' => 	'Inter',
				'font_url' 	=>	get_template_directory_uri().'/fonts/Inter-Bold.woff',
				'font_fallback'	=> 'sans-serif',
				'font_weight' => 700,
				'font_style' => 'normal',
			),
		);
		set_theme_mod( 'tg_custom_fonts', $default_custom_fonts );
	}
	
	update_option('elementor_disable_color_schemes', 'yes');
	update_option('elementor_disable_typography_schemes', 'yes');
	update_option('elementor_page_title_selector', '#page_caption');
	update_option('elementor_space_between_widgets', 0);
	update_option('elementor_container_width', 1170);
	update_option('elementor_cpt_support', array('post', 'page', 'footer', 'header', 'megamenu', 'meeting', 'fullmenu'));
	wp_redirect(admin_url("admin.php?page=functions.php&activate=true"));
}
?>