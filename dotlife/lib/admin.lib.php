<?php
//dotlife_themegoods_action();
$is_verified_envato_purchase_code = false;

//Get verified purchase code data
$is_verified_envato_purchase_code = dotlife_is_registered();

//Layout demo importer
$demo_import_options_arr = array( 
	array('id'	=>	'demo1', 'title' => 'Main Demo', 'url' => 'http://themes.themegoods.com/dotlife/demo/', 'demo' => 1),
);

/*
	Begin creating admin options
*/

$getting_started_html = '<div class="one_half">
		<div class="step_icon">
			<a href="javascript:;" onclick="jQuery(\'#pp_panel_install-plugins_a\').trigger(\'click\');">
				<div class="step_number">Step <div class="int_number">1</div></div>
			</a>
		</div>
		<div class="step_info">
			<h3>Install the recommended plugins</h3>
			Theme has required and recommended plugins in order to build your website using layouts you saw on our demo site. We recommend you to install recommended plugins.
		</div>
	</div>
	
	<div class="one_half last">
		<div class="step_icon">
			<a href="javascript:;" onclick="jQuery(\'#pp_panel_import-demo_a\').trigger(\'click\');">
				<div class="step_number">Step <div class="int_number">2</div></div>
			</a>
		</div>
		<div class="step_info">
			<h3>Import the demo data</h3>
			Here you can import the demo data to your site. Doing this will make your site look like the demo site. It helps you to understand better the theme and build something similar to our demo quicker.
		</div>
	</div>
	
	<div class="one_half">
		<div class="step_icon">
			<a href="'.admin_url("customize.php").'">
				<div class="step_number">Step <div class="int_number">3</div></div>
			</a>
		</div>
		<div class="step_info">
			<h3>Customize theme elements and options</h3>
			Start customize theme\'s layouts, typography, elements colors using WordPress customize and see your changes in live preview instantly.
		</div>
	</div>
	
	<div class="one_half last">
		<div class="step_icon">
			<a href="'.admin_url("post-new.php?post_type=page").'">
				<div class="step_number">Step <div class="int_number">4</div></div>
			</a>
		</div>
		<div class="step_info">
			<h3>Create pages</h3>
			'.DOTLIFE_THEMENAME.' support standard WordPress page option. You can use Elementor page builder to create and organise page contents.
		</div>
	</div>
	
	<div class="one_half nomargin">
		<div class="step_icon">
			<a href="'.admin_url("nav-menus.php").'">
				<div class="step_number">Step <div class="int_number">5</div></div>
			</a>
		</div>
		<div class="step_info">
			<h3>Setting up navigation menu</h3>
			Once you imported demo or created your own pages. You can setup navigation menu and assign to your website main header or any other places.
		</div>
	</div>
	
	<div class="one_half last nomargin">
		<div class="step_icon">
			<a href="'.admin_url("options-permalink.php").'">
				<div class="step_number">Step <div class="int_number">6</div></div>
			</a>
		</div>
		<div class="step_info">
			<h3>Permalinks structure</h3>
			You can change your website permalink structure to better SEO result. Click here to setup WordPress permalink options.
		</div>
	</div>';
	
	$tutorial_html = '';	
	
	if(!empty($is_verified_envato_purchase_code))
	{
		$tutorial_html = '
			<div class="one_third">
				<iframe width="560" height="315" src="https://www.youtube.com/embed/3DJm0ujatHE?si=fKu_GXKWzKX-flpl" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
				<div class="themegoods-video-title">How to create website header</div>
			</div>
			
			<div class="one_third">
				<iframe width="560" height="315" src="https://www.youtube.com/embed/GtDUSEvTW9M?si=GuSFPJoOTip01oYJ" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
				<div class="themegoods-video-title">How to change website logo image from demo header</div>
			</div>
			
			<div class="one_third last">
				<iframe width="560" height="315" src="https://www.youtube.com/embed/fcoGq7-UPo0?si=gt_3hHEXBm3m7irP" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
				<div class="themegoods-video-title">How to create a mobile menu</div>
			</div>
			
			<div class="one_third">
				<iframe width="560" height="315" src="https://www.youtube.com/embed/SmJ0RdFP1Vw?si=r_grN8slTm9Clbyr" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
				<div class="themegoods-video-title">How to create a fullscreen menu</div>
			</div>
			
			<div class="one_third">
				<iframe width="560" height="315" src="https://www.youtube.com/embed/Ro16n0FRNo0?si=Xqsl5BIaZMcXd1o5" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
				<div class="themegoods-video-title">How to create website footer</div>
			</div>
			
			<div class="one_third last">
				<iframe width="560" height="315" src="https://www.youtube.com/embed/Ex4m8ssXWB4?si=h0uxvzTD9yHut1L0" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
				<div class="themegoods-video-title">How to set different header for specific page</div>
			</div>
			
			<div class="one_third">
				<iframe width="560" height="315" src="https://www.youtube.com/embed/ps9OMLET0MU?si=OQbmI9p0DqEyFu7p" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
				<div class="themegoods-video-title">How to change page\'s header to transparent</div>
			</div>
			
			<div class="one_third">
				<iframe width="560" height="315" src="https://www.youtube.com/embed/Jwpw_h24pOg?si=ATu1lpEQsmgrfxuR" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
				<div class="themegoods-video-title">How to set basic booking form using appointment booking plugin</div>
			</div>
			
			<div class="one_third last">
				<iframe width="560" height="315" src="https://www.youtube.com/embed/B_PPeeN30XE?si=8MYsAMSzpX54GMFb" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
				<div class="themegoods-video-title">How to translate theme strings</div>
			</div>
		';
	}
	else
	{
		$tutorial_html = '
		<div class="tg_notice">
						<span class="dashicons dashicons-warning" style="color:#FF3B30"></span> 
						<span style="color:#FF3B30">'.DOTLIFE_THEMENAME.' theme tutorials can only be activated with a valid purchase code</span><br/><br/>
						Please visit <a href="javascript:jQuery(\'#pp_panel_registration_a\').trigger(\'click\');">Product Registration page</a> and enter a valid purchase code to activate this section.
					</div>
			';
	}

$support_html = '';	
if($is_verified_envato_purchase_code)
{
	
	$support_html.='
	<div class="one_half">
		<div class="step_icon">
			<a href="https://docs.themegoods.com/dotlife" target="_blank">
				<span class="dashicons dashicons-book-alt"></span>
				<div class="step_title">Theme Document</div>
			</a>
		</div>
		<div class="step_info">
			<h3>Online documentation</h3>
			This is the place to go find all reference aspects of theme functionalities. Our online documentation is resource for you to start using theme.
		</div>
	</div>
	
	<div class="one_half last">
		<div class="step_icon">
			<a href="https://themegoods.ticksy.com/submit/" target="_blank">
				<span class="dashicons dashicons-testimonial"></span>
				<div class="step_title">Submit a Ticket</div>
			</a>
		</div>
		<div class="step_info">
			<h3>Theme support</h3>
			We offer excellent support through our ticket system. Please make sure you prepare your purchased code first to access our services.
		</div>
	</div>
	
	<div class="one_half nomargin">
		<div class="step_icon">
			<a href="https://docs.themegoods.com/docs/dotlife/extras/theme-changelog/" target="_blank">
				<i class="fas fa-list"></i>
				<div class="step_title">What\'s new</div>
			</a>
		</div>
		<div class="step_info">
			<h3>Changelog</h3>
			This is the place to go find all informations about changes & new features for each theme updates.
		</div>
	</div>
	
	<div class="one_half last nomargin">
		<div class="step_icon">
			<a href="https://docs.themegoods.com/docs/dotlife/extras/child-theme/" target="_blank">
				<i class="fas fa-cloud-download-alt"></i>
				<div class="step_title">Child Theme</div>
			</a>
		</div>
		<div class="step_info">
			<h3>Child Theme</h3>
			A child theme is a theme that inherits the functionality and styling of parent theme. You can download our child theme from <a href="https://docs.themegoods.com/docs/dotlife/extras/child-theme/" target="_blank">here</a>.
		</div>
	</div>
';
}
else
{
	$support_html = '
	<div class="tg_notice">
					<span class="dashicons dashicons-warning" style="color:#FF3B30"></span> 
					<span style="color:#FF3B30">'.DOTLIFE_THEMENAME.' theme support can only be activated with a valid purchase code</span><br/><br/>
					Please visit <a href="javascript:jQuery(\'#pp_panel_registration_a\').trigger(\'click\');">Product Registration page</a> and enter a valid purchase code to activate this section.
				</div>
		';
}

//Get product registration

//if verified envato purchase code
$check_icon = '';
$verification_desc = 'Thank you for choosing '.DOTLIFE_THEMENAME.'. Your product must be registered to receive many advantage features ex. demos import and support. We are sorry about this extra step but we built the activation system to prevent mass piracy of our themes. This will help us to better serve our paying customers.';

//Check if have any purchase code verification error
$response_html = '';
$purchase_code = '';
$register_button_html = '<input type="submit" name="submit" id="themegoods-envato-code-submit" class="button button-primary button-large" value="Register"/>';

//If already registered
if(!empty($is_verified_envato_purchase_code))
{
	$response_html.= '<br style="clear:both;"/><div class="tg_valid"><span class="dashicons dashicons-yes"></span>Your product is registered.</div>';
	$register_button_html = '<input type="submit" name="submit" id="themegoods-envato-code-unregister" class="button button-primary button-large" value="Unregister"/>';
	$purchase_code = $is_verified_envato_purchase_code;
}

//Displays purchase code verification response
if(isset($_GET['response']) && !empty($_GET['response'])) {
	$response_arr = json_decode(stripcslashes($_GET['response']));
	$purchase_code = '';
	if(isset($_GET['purchase_code']) && !empty($_GET['purchase_code'])) {
		$purchase_code = $_GET['purchase_code'];
	}
	
	if(isset($response_arr->response_code)) {
		if(!$response_arr->response_code) {
			$response_html.= '<br style="clear:both;"/><div class="tg_error"><span class="dashicons dashicons-warning"></span>'.$response_arr->response.'</div>';
		}
	}
	else {
		$response_html.= '<br style="clear:both;"/><div class="tg_error"><span class="dashicons dashicons-warning"></span> We can\'t verify your purchase of '.DOTLIFE_THEMENAME.' theme. Please make sure you enter correct purchase code. If you are sure you enter correct one. <a href="https://themegoods.ticksy.com" target="_blank">Please open a ticket</a> to us so our support staff can help you. Thank you very much.</div>';
	}
}

$product_registration_html ='
		<h1>Product Registration</h1>
		<div class="getting_started_desc">'.$verification_desc.'</div>
		<br style="clear:both;"/>
		
		<div style="height:10px"></div>
		
		<label for="pp_envato_personal_token">'.$check_icon.'Purchase Code</label>
		<small class="description">Please enter your Purchase Code.</small>';
$product_registration_html.= $register_button_html;

$purchase_code_input_class = '';
if(!empty($is_verified_envato_purchase_code)) {
	$purchase_code_input_class = 'themegoods-verified';
}

$product_registration_html.= '<input name="pp_envato_personal_token" id="pp_envato_personal_token" type="text" value="'.esc_attr($purchase_code).'" class="'.esc_attr($purchase_code_input_class).'"/>
		<input name="themegoods-site-domain" id="themegoods-site-domain" type="hidden" value="'.esc_attr(dotlife_get_site_domain()).'"/>
	';
	
	$product_registration_html.= $response_html;
	
if(isset($_GET['action']) && $_GET['action'] == 'invalid-purchase')
{
	$product_registration_html.='<br style="clear:both;"/><div style="height:20px"></div><div class="tg_error"><span class="dashicons dashicons-warning"></span> We can\'t find your purchase of '.DOTLIFE_THEMENAME.' theme. Please make sure you enter correct purchase code. If you are sure you enter correct one. <a href="https://themegoods.ticksy.com" target="_blank">Please open a ticket</a> to us so our support staff can help you. Thank you very much.</div>
	
	<br style="clear:both;"/>
	
	<div style="height:10px"></div>';
}

$is_purchase_code_removed = get_option("envato_purchase_code_".ENVATOITEMID."_removed");

if($is_purchase_code_removed && empty($is_verified_envato_purchase_code)) {
	$product_registration_html.='<br style="clear:both;"/><div style="height:20px"></div><div class="tg_error"><span class="dashicons dashicons-warning"></span>Your purchase code was unregistered because the registered domain and this website domain are different. In case you want to remove/change registered domain. Please register your account <a href="https://license.themegoods.com/manager/" target="_blank">here</a>
	Then you will be able to manage/remove your purchase code registration\'s domain from there. <br/><br/>If you think the unregistration wasn\'t done correctly. Please <a href="https://themegoods.ticksy.com/submit/" target="_blank">open a ticket</a> or contact us using the contact form on <a href="https://themeforest.net/user/themegoods" target="_blank">this page</a> so we can check it for you. Thank you.</div>';
}

if(!$is_verified_envato_purchase_code)
{
	$product_registration_html.='
	<br style="clear:both;"/>
	<div style="height:30px"></div>
	<h1>How to get Purchase Code</h1>
	<div style="height:5px"></div>
	<ol>
	 <li>You must be logged into the same Envato account that purchased '.DOTLIFE_THEMENAME.' theme.</li>
	 <li>Hover the mouse over your username at the top right corner of the screen.</li>
							<li>Click "Downloads" from the drop-down menu.</li>
							<li>Find '.DOTLIFE_THEMENAME.' theme your downloads list</li>
							<li>Click "Download" button and click "License certificate & purchase code" (available as PDF or text file).</li>
	</ol>
	<strong>You can see detailed article and video screencast about "how to find your purchase code" <a href="https://help.market.envato.com/hc/en-us/articles/202822600-Where-Is-My-Purchase-Code-" target="_blank">here</a>.</strong>
';
}

//If already registered and add a link to license manager
if(!empty($is_verified_envato_purchase_code))
{
	$product_registration_html.='<br style="clear:both;"/><div style="height:20px"></div>
	<div class="one_third grey_bg">
	<h2>Manage Your License</h2>
	<div class="getting_started_desc half_size">To manage all your purchase code registration domain. Please open an account or login on <a href="https://license.themegoods.com/manager/" target="_blank">ThemeGoods License Manager</a>.
	</div>
	</div>
	';
}

if($is_verified_envato_purchase_code)
{
	$product_registration_html.='<div class="one_third grey_bg">
	<h2>Auto Update</h2>
	<div class="getting_started_desc half_size">To enable auto update feature. You first must <a href="'.admin_url('themes.php?page=install-required-plugins').'">install Envato Market plugin</a> and enter your Envato account token there.</div>
	</div>
	';
	
	$product_registration_html.='<div class="one_third blue_bg last">
	<h2>Documentation</h2>
	<div class="getting_started_desc half_size">It is a great starting point to fix some of the most common issues. <a href="https://docs.themegoods.com/dotlife" target="_blank">Read theme documentation</a>.</div>
	</div>
	';
}

$product_registration_html.='<br style="clear:both;"/>
<h2 class="sub-header">Frequently Asked Questions</h2>
<ul class="themegoods_faq">
	<li><a href="https://docs.themegoods.com/docs/dotlife/faq/my-website-header-footer-and-some-elements-are-missing/" target="_blank">My website header, footer and some elements are missing</a></li>
	<li><a href="https://docs.themegoods.com/docs/dotlife/faq/i-changed-the-logo-image-in-customizer-but-its-not-working-on-the-frontend/" target="_blank">I changed the logo image in customizer but it\'s not working on the frontend</a></li>
	<li><a href="https://docs.themegoods.com/docs/dotlife/faq/header-footer-and-other-custom-post-types-cant-edit-using-elementor/" target="_blank">Header, Footer and other custom post types can\'t edit using Elementor</a></li>
	<li><a href="https://docs.themegoods.com/docs/dotlife/faq/my-changes-within-elementor-pages-post-elements-are-not-working-on-the-frontend/" target="_blank">My changes within Elementor pages/post elements are not working on the frontend</a></li>
	<li><a href="https://docs.themegoods.com/docs/dotlife/faq/imported-demo-websites-menu-items-are-broken/" target="_blank">Imported demo website\'s menu items are broken</a></li>
	<li><a href="https://docs.themegoods.com/docs/dotlife/faq/do-i-need-to-purchase-elementor-pro/" target="_blank">Do I need to purchase Elementor Pro</a></li>
	<li><a href="https://docs.themegoods.com/docs/dotlife/faq/how-to-change-translate-text-within-pages-posts/" target="_blank">How to change/translate text within pages/posts</a></li>
	<li><a href="https://docs.themegoods.com/docs/dotlife/faq/my-page-post-returns-404-not-found/" target="_blank">My page/post returns 404 not found</a></li>
	<li><a href="https://docs.themegoods.com/docs/dotlife/faq/my-website-is-slow/" target="_blank">My website is slow</a></li>
</ul>
';

//Get system info
$has_red_status = false;


//Get memory_limit
$memory_limit = ini_get('memory_limit');
$memory_limit_class = 'tg_valid';
$memory_limit_text = '';
if(intval($memory_limit) < 128)
{
    $memory_limit_class = 'tg_error';
    $has_error = 1;
    $memory_limit_text = '*RECOMMENDED 128M';
    
    $has_red_status = true;
}

$memory_limit_text = '<div class="'.$memory_limit_class.'">'.$memory_limit.' '.$memory_limit_text.'</div>';

//Get post_max_size
$post_max_size = ini_get('post_max_size');
$post_max_size_class = 'tg_valid';
$post_max_size_text = '';
if(intval($post_max_size) < 32)
{
    $post_max_size_class = 'tg_error';
    $has_error = 1;
    $post_max_size_text = '*RECOMMENDED 32M';
    
    $has_red_status = true;
}
$post_max_size_text = '<div class="'.$post_max_size_class.'">'.$post_max_size.' '.$post_max_size_text.'</div>';

//Get max_execution_time
$max_execution_time = ini_get('max_execution_time');
$max_execution_time_class = 'tg_valid';
$max_execution_time_text = '';
if($max_execution_time < 180)
{
    $max_execution_time_class = 'tg_error';
    $has_error = 1;
    $max_execution_time_text = '*RECOMMENDED 180';
    
    $has_red_status = true;
}
$max_execution_time_text = '<div class="'.$max_execution_time_class.'">'.$max_execution_time.' '.$max_execution_time_text.'</div>';

//Get max_input_vars
$max_input_vars = ini_get('max_input_vars');
$max_input_vars_class = 'tg_valid';
$max_input_vars_text = '';
if(intval($max_input_vars) < 2000)
{
    $max_input_vars_class = 'tg_error';
    $has_error = 1;
    $max_input_vars_text = '*RECOMMENDED 2000';
    
    $has_red_status = true;
}
$max_input_vars_text = '<div class="'.$max_input_vars_class.'">'.$max_input_vars.' '.$max_input_vars_text.'</div>';

//Get upload_max_filesize
$upload_max_filesize = ini_get('upload_max_filesize');
$upload_max_filesize_class = 'tg_valid';
$upload_max_filesize_text = '';
if(intval($upload_max_filesize) < 32)
{
    $upload_max_filesize_class = 'tg_error';
    $has_error = 1;
    $upload_max_filesize_text = '*RECOMMENDED 32M';
    
    $has_red_status = true;
}
$upload_max_filesize_text = '<div class="'.$upload_max_filesize_class.'">'.$upload_max_filesize.' '.$upload_max_filesize_text.'</div>';

//Get GD library version
if(function_exists('gd_info'))
{
	$php_gd_arr = gd_info();
}
else
{
	$php_gd_arr['GD Version'] = 'Not Installed';	
}

$system_info_html = '';
if(!$is_verified_envato_purchase_code)
{
	$system_info_html = '<div style="height:20px"></div>
	<div class="tg_notice">
					<span class="dashicons dashicons-warning" style="color:#FF3B30"></span> 
					<span style="color:#FF3B30">'.DOTLIFE_THEMENAME.' Demos can only be imported with a valid purchase code</span><br/><br/>
					Please visit <a href="javascript:jQuery(\'#pp_panel_registration_a\').trigger(\'click\');">Product Registration page</a> and enter a valid purchase code to import the full '.DOTLIFE_THEMENAME.' demos and single pages through Elementor.
				</div>
		
		<div style="height:40px"></div>
		';
}
else
{
	$system_info_html = '<table class="widefat" cellspacing="0">
			<thead>
				<tr>
					<th colspan="3">Server Environment</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td class="title">PHP Version:</td>
					<td class="help"><a href="javascript" title="The version of PHP installed on your hosting server." class="tooltipster">[?]</a></td>
					<td class="value">'.phpversion().'</td>
				</tr>
				<tr>
					<td class="title">WP Memory Limit:</td>
					<td class="help"><a href="javascript" title="The maximum amount of memory (RAM) that your site can use at one time." class="tooltipster">[?]</a></td>
					<td class="value">'.$memory_limit_text.'</td>
				</tr>
				<tr>
					<td class="title">PHP Post Max Size:</td>
					<td class="help"><a href="javascript" title="The largest file size that can be contained in one post." class="tooltipster">[?]</a></td>
					<td class="value">'.$post_max_size_text.'</td>
				</tr>
				<tr>
					<td class="title">PHP Time Limit:</td>
					<td class="help"><a href="javascript" title="The amount of time (in seconds) that your site will spend on a single operation before timing out (to avoid server lockups)" class="tooltipster">[?]</a></td>
					<td class="value">'.$max_execution_time_text.'</td>
				</tr>
				<tr>
					<td class="title">PHP Max Input Vars:</td>
					<td class="help"><a href="javascript" title="The maximum number of variables your server can use for a single function to avoid overloads." class="tooltipster">[?]</a></td>
					<td class="value">'.$max_input_vars_text.'</td>
				</tr>
				<tr>
					<td class="title">Max Upload Size:</td>
					<td class="help"><a href="javascript" title="The largest filesize that can be uploaded to your WordPress installation." class="tooltipster">[?]</a></td>
					<td class="value">'.$upload_max_filesize_text.'</td>
				</tr>
				<tr>
					<td class="title">GD Library:</td>
					<td class="help"><a href="javascript" title="This library help resizing images and improve site loading speed" class="tooltipster">[?]</a></td>
					<td class="value">'.$php_gd_arr['GD Version'].'</td>
				</tr>
			</tbody>
		</table>
		
		<div style="height:20px"></div>';
		
		$system_info_html.= '<div style="height:20px"></div>
			<div class="tg_notice">
				<span class="dashicons dashicons-warning"></span> 
				<span>If you have experience issue regarding import demo contents. <a href="https://docs.themegoods.com/docs/dotlife/demos/import-demo-issue/" target="_blank">Please see explanation and workaround for the issue here</a></span>
			</div>';
		
		//Check if required plugins is installed
		$elementor_activated = function_exists('elementor_fail_php_version');
		$dotlife_elementor_activated = function_exists('dotlife_elementor_load');
		$ocdi_activated = class_exists('OCDI_Plugin');
		
		if($elementor_activated && $dotlife_elementor_activated && $ocdi_activated)
		{
			if($has_red_status)
			{
				$system_info_html.= '<div style="height:20px"></div>
			<div class="tg_notice">
				<span class="dashicons dashicons-warning" style="color:#FF3B30"></span> 
				<span>There are some settings which are below theme recommendation values and it might causes issue importing demo contents.</span>
			</div>';
			
				$import_demo_button_label = 'I understand and want to process demo importing process';
			}
			else
			{
				$import_demo_button_label = 'Begin importing demo process';
			}
			
			$system_info_html.= '<div class="tg_begin_import"><a href="'.admin_url('themes.php?page=tg-one-click-demo-import').'" class="button button-primary button-large">'.$import_demo_button_label.'</a></div>';
		}
		else
		{
			$system_info_html.= '<div style="height:20px"></div>
			<div class="tg_notice">
				<span class="dashicons dashicons-warning" style="color:#FF3B30"></span> 
				<span style="color:#FF3B30">One Click Demo Import, Elementor and '.DOTLIFE_THEMENAME.' Elementor plugins required</span><br/><br/>
				Please <a href="'.admin_url("themes.php?page=install-required-plugins").'">install and activate these required plugins.</a> first so demo contents can be imported properly.
			</div>';
		}
}

//Install Plugins Instruction
$plugins_list = dotlife_get_require_plugins();

$install_plugins_html = '
	<h1>Install Plugins</h1>
	<div class="theme-setting-getting-started"><strong>IMPORTANT</strong>: The required plugins need to be installed and activated before you import demo.</div>
	
	<table class="widefat" cellspacing="0">
			<thead>
				<tr>
					<th colspan="3">Required Plugins</th>
				</tr>
			</thead>
			<tbody>
';
		$is_required = '';
		foreach($plugins_list as $plugin_arr) {
			$install_plugins_html.= '<tr>
					<td class="title">'.esc_html($plugin_arr['name']).'</td>';
			
			if($plugin_arr['required']) {
				$is_required = 'Required plugin';
			}
			else
			{
				$is_required = 'Recommended plugin';
			}
			
			$install_plugins_html.= '<td class="help"><a href="'.esc_js('javascript:;').'" title="'.esc_html($is_required).'" class="tooltipster">[*]</a></td>';
			
			$install_plugins_html.= '<td class="value">'.esc_html($plugin_arr['desc']).'</td>
			</tr>';
		}
$install_plugins_html.='
			</tbody>
		</table>';
		
$install_plugins_html.= '<div class="notice-begin-import"><a href="'.esc_url(admin_url('themes.php?page=install-required-plugins')).'" class="button button-primary button-large">Begin installing plugins</a></div>';

$dotlife_options = dotlife_get_options();

$dotlife_options = array (
 
//Begin admin header
array( 
		"name" => DOTLIFE_THEMENAME." Options",
		"type" => "title"
),
//End admin header

//Begin second tab "Registration"
array( 	"name" => "Registration",
		"type" => "section",
		"icon" => "dashicons-admin-network",	
),
array( "type" => "open"),

array( "name" => "",
	"desc" => "",
	"id" => DOTLIFE_SHORTNAME."_registration",
	"type" => "html",
	"html" => $product_registration_html,
),

array( "type" => "close"),
//End second tab "Registration"

//Begin second tab "Home"
array( 	"name" => "Getting-Started",
		"type" => "section",
		"icon" => "dashicons-admin-home",
),
array( "type" => "open"),

array( "name" => "",
	"desc" => "",
	"id" => DOTLIFE_SHORTNAME."_home",
	"type" => "html",
	"html" => '
	<h1>Getting Started</h1>
	<div class="getting_started_desc">Welcome to '.DOTLIFE_THEMENAME.' theme. '.DOTLIFE_THEMENAME.' is now installed and ready to use! Read below for additional informations. We hope you enjoy using the theme!</div>
	<div style="height:40px"></div>
	'.$getting_started_html.'
	',
),

array( "type" => "close"),
//End second tab "Home"


//Begin second tab "Tutorials"
array( 	"name" => "Tutorials",
		"type" => "section",
		"icon" => "",	
),
array( "type" => "open"),

array( "name" => "",
	"desc" => "",
	"id" => DOTLIFE_SHORTNAME."_tutorials",
	"type" => "html",
	"html" => '<h1>Tutorials</h1><div style="height:20px"></div>'.$tutorial_html,
),

array( "type" => "close"),
//End second tab "Tutorials"

//Begin second tab "Install Plugins"
array( "name" => "Install-Plugins",
	"type" => "section",
	"icon" => "dashicons-cloud",
),

array( "type" => "open"),

array( "name" => "",
	"desc" => "",
	"id" => DOTLIFE_SHORTNAME."_install_plugins_content",
	"type" => "html",
	"html" => $install_plugins_html,
),
 
array( "type" => "close"),


//Begin second tab "Support"
array( 	"name" => "Support",
		"type" => "section",
		"icon" => "dashicons-sos",	
),
array( "type" => "open"),

array( "name" => "",
	"desc" => "",
	"id" => DOTLIFE_SHORTNAME."_support",
	"type" => "html",
	"html" => '<h1>Help Center</h1>
	<div class="getting_started_desc">'.DOTLIFE_THEMENAME.' comes with 6 months of free support for every license you purchase. Support can be <a href="https://help.market.envato.com/hc/en-us/articles/207886473-Extending-and-Renewing-Item-Support">extended through subscriptions</a> via ThemeForest. All support for '.DOTLIFE_THEMENAME.' is handled through our support center on our company site. Below are all the resources we offer.</div>
	<div style="height:40px"></div>'.$support_html,
),

array( "type" => "close"),
//End second tab "Support"


//Begin second tab "Demo"
array( "name" => "Import-Demo",
	"type" => "section",
	"icon" => "dashicons-cloud",
),

array( "type" => "open"),

array( "name" => "",
	"desc" => "",
	"id" => DOTLIFE_SHORTNAME."_import_demo_notice",
	"type" => "html",
	"html" => '<h1>Checklist before Importing Demo</h1><br/><strong>IMPORTANT</strong>: Demo importer can vary in time. The included required plugins need to be installed and activated before you import demo. Please check the Server Environment below to ensure your server meets all requirements for a successful import. <strong>Settings that need attention will be listed in red</strong>.
	',
),
array( "name" => "",
	"desc" => "",
	"id" => DOTLIFE_SHORTNAME."_import_demo_content",
	"type" => "html",
	"html" => $system_info_html,
),
 
array( "type" => "close"),


//Begin second tab "Images"
array( "name" => "Images",
	"type" => "section",
	"icon" => "dashicons-format-image",
),

array( "type" => "open"),

array( "name" => "",
	"desc" => "",
	"id" => DOTLIFE_SHORTNAME."_gallery_image_dimensions_notice",
	"type" => "html",
	"html" => '<h1>Defined Image Size</h1>These settings affect the display and dimensions of images in your portfolio, gallery, blog pages – the display on the front-end will still be affected by CSS styles. After changing these settings you may need to <a href="https://wordpress.org/plugins/force-regenerate-thumbnails/" target="_blank">regenerate your thumbnails</a>
	',
),
array( "name" => "<h2>Gallery Grid Image Dimensions Settings</h2>Image Width",
	"desc" => "Enter gallery grid image width(in pixels).",
	"id" => DOTLIFE_SHORTNAME."_gallery_grid_image_width",
	"type" => "text",
	"std" => "700",
	"validation" => "text",
),
array( "name" => "Image Height",
	"desc" => "Enter gallery grid image height(in pixels). Please enter 9999 for auto height.",
	"id" => DOTLIFE_SHORTNAME."_gallery_grid_image_height",
	"type" => "text",
	"std" => "466",
	"validation" => "text",
),
array( "name" => "<h2>Gallery Masonry Image Dimensions Settings</h2>Image Width",
	"desc" => "Enter gallery masonry image width(in pixels).",
	"id" => DOTLIFE_SHORTNAME."_gallery_masonry_image_width",
	"type" => "text",
	"std" => "440",
	"validation" => "text",
),
array( "name" => "Image Height",
	"desc" => "Enter gallery masonry image height(in pixels). Please enter 9999 for auto height.",
	"id" => DOTLIFE_SHORTNAME."_gallery_masonry_image_height",
	"type" => "text",
	"std" => "9999",
	"validation" => "text",
),
array( "name" => "<h2>Gallery List Image Dimensions Settings</h2>Image Width",
	"desc" => "Enter gallery list image width(in pixels).",
	"id" => DOTLIFE_SHORTNAME."_gallery_list_image_width",
	"type" => "text",
	"std" => "610",
	"validation" => "text",
),
array( "name" => "Image Height",
	"desc" => "Enter gallery list image height(in pixels). Please enter 9999 for auto height.",
	"id" => DOTLIFE_SHORTNAME."_gallery_list_image_height",
	"type" => "text",
	"std" => "610",
	"validation" => "text",
),
array( "name" => "<h2>Blog Classic Featured Image Dimensions Settings</h2>Image Width",
	"desc" => "Enter blog classic featured image width(in pixels).",
	"id" => DOTLIFE_SHORTNAME."_blog_image_width",
	"type" => "text",
	"std" => "960",
	"validation" => "text",
),
array( "name" => "Image Height",
	"desc" => "Enter blog classic featured image height(in pixels). Please enter 9999 for auto height.",
	"id" => DOTLIFE_SHORTNAME."_blog_image_height",
	"type" => "text",
	"std" => "604",
	"validation" => "text",
),
array( "name" => "<h2>Blog Grid Featured Image Dimensions Settings</h2>Image Width",
	"desc" => "Enter blog grid featured image width(in pixels).",
	"id" => DOTLIFE_SHORTNAME."_blog_grid_image_width",
	"type" => "text",
	"std" => "480",
	"validation" => "text",
),
array( "name" => "Image Height",
	"desc" => "Enter blog grid featured image height(in pixels). Please enter 9999 for auto height.",
	"id" => DOTLIFE_SHORTNAME."_blog_grid_image_height",
	"type" => "text",
	"std" => "302",
	"validation" => "text",
),
 
array( "type" => "close"),


//Begin fifth tab "Social Profiles"
array( 	"name" => "Social-Profiles",
		"type" => "section",
		"icon" => "dashicons-facebook",
),
array( "type" => "open"),
	
array( "name" => "",
	"desc" => "",
	"id" => DOTLIFE_SHORTNAME."_social_profiles_title",
	"type" => "html",
	"html" => '<h1>Social Profiles Accounts</h1>Setup your social profiles accounts. It can be used for navigation bar, footer etc.',
),
array( "name" => "<h2>Accounts Settings</h2>Facebook page URL",
	"desc" => "Enter full Facebook page URL",
	"id" => DOTLIFE_SHORTNAME."_facebook_url",
	"type" => "text",
	"std" => "",
	"validation" => "text",
),
array( "name" => "Twitter Username",
	"desc" => "Enter Twitter username",
	"id" => DOTLIFE_SHORTNAME."_twitter_username",
	"type" => "text",
	"std" => "",
	"validation" => "text",
),
array( "name" => "Google Plus URL",
	"desc" => "Enter Google Plus URL",
	"id" => DOTLIFE_SHORTNAME."_google_url",
	"type" => "text",
	"std" => "",
	"validation" => "text",
),
array( "name" => "Flickr Username",
	"desc" => "Enter Flickr username",
	"id" => DOTLIFE_SHORTNAME."_flickr_username",
	"type" => "text",
	"std" => "",
	"validation" => "text",
),
array( "name" => "Youtube Profile URL",
	"desc" => "Enter Youtube Profile URL",
	"id" => DOTLIFE_SHORTNAME."_youtube_url",
	"type" => "text",
	"std" => "",
	"validation" => "text",
),
array( "name" => "Vimeo Username",
	"desc" => "Enter Vimeo username",
	"id" => DOTLIFE_SHORTNAME."_vimeo_username",
	"type" => "text",
	"std" => "",
	"validation" => "text",
),
array( "name" => "Tumblr Username",
	"desc" => "Enter Tumblr username",
	"id" => DOTLIFE_SHORTNAME."_tumblr_username",
	"type" => "text",
	"std" => "",
	"validation" => "text",
),
array( "name" => "Dribbble Username",
	"desc" => "Enter Dribbble username",
	"id" => DOTLIFE_SHORTNAME."_dribbble_username",
	"type" => "text",
	"std" => "",
	"validation" => "text",
),
array( "name" => "Linkedin URL",
	"desc" => "Enter full Linkedin URL",
	"id" => DOTLIFE_SHORTNAME."_linkedin_url",
	"type" => "text",
	"std" => "",
	"validation" => "text",
),
array( "name" => "Pinterest Username",
	"desc" => "Enter Pinterest username",
	"id" => DOTLIFE_SHORTNAME."_pinterest_username",
	"type" => "text",
	"std" => "",
	"validation" => "text",
),
array( "name" => "Instagram Username",
	"desc" => "Enter Instagram username",
	"id" => DOTLIFE_SHORTNAME."_instagram_username",
	"type" => "text",
	"std" => "",
	"validation" => "text",
),
array( "name" => "Behance Username",
	"desc" => "Enter Behance username",
	"id" => DOTLIFE_SHORTNAME."_behance_username",
	"type" => "text",
	"std" => "",
	"validation" => "text",
),
array( "name" => "500px Profile URL",
	"desc" => "Enter 500px Profile URL",
	"id" => DOTLIFE_SHORTNAME."_500px_url",
	"type" => "text",
	"std" => "",
	"validation" => "text",
),
array( "type" => "close"),

//End fifth tab "Social Profiles"

//Begin second tab "Sidebar"
array( 	"name" => "Sidebar",
		"type" => "section",
		"icon" => "dashicons-feedback",		
),
array( "type" => "open"),

array( "name" => "",
	"desc" => "",
	"id" => DOTLIFE_SHORTNAME."_sidebar_title",
	"type" => "html",
	"html" => '<h1>Custom Sidebars</h1>Setup custom sidebars, you can create ones from below form and it can be used in page/post with sidebar layout support.',
),
array( "name" => "<h2>Custom Sidebar Settings</h2>Add a new sidebar",
	"desc" => "Enter sidebar name",
	"id" => DOTLIFE_SHORTNAME."_sidebar0",
	"type" => "text",
	"validation" => "text",
	"std" => "",
),

array( "type" => "close"),
//End second tab "Sidebar"

array( 	"name" => "Buy-Another-License",
"type" => "section",
"icon" => "",		
),
array( "type" => "open"),

array( "type" => "close"),

//Begin second tab "System"
/*array( 	"name" => "System",
		"type" => "section",
		"icon" => "dashicons-dashboard",
),
array( "type" => "open"),

array( "name" => "<h2>System Information</h2>",
	"desc" => "",
	"id" => DOTLIFE_SHORTNAME."_system",
	"type" => "html",
	"html" => $system_info_html,
),

array( "type" => "close"),*/
//End second tab "System"

);
 
$dotlife_options[] = array( "type" => "close");

dotlife_set_options($dotlife_options);
?>