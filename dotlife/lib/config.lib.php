<?php
//Setup theme constant and default data
$theme_obj = wp_get_theme('dotlife');

define("DOTLIFE_THEMENAME", $theme_obj['Name']);
if (!defined('DOTLIFE_THEMEDEMO'))
{
	define("DOTLIFE_THEMEDEMO", false);
}
define("DOTLIFE_SHORTNAME", "pp");
define("DOTLIFE_THEMEVERSION", $theme_obj['Version']);
define("DOTLIFE_THEMEDEMOURL", $theme_obj['ThemeURI']);
define("DOTLIFE_MEGAMENU", true);

define("THEMEGOODS_API", 'http://license.themegoods.com/manager/wp-json/envato');
define("THEMEGOODS_PURCHASE_URL", 'https://1.envato.market/WqvKRJ');

if (!defined('DOTLIFE_THEMEDATEFORMAT'))
{
	define("DOTLIFE_THEMEDATEFORMAT", get_option('date_format'));
}

if (!defined('DOTLIFE_THEMETIMEFORMAT'))
{
	define("DOTLIFE_THEMETIMEFORMAT", get_option('time_format'));
}

if (!defined('ENVATOITEMID'))
{
	define("ENVATOITEMID", 23858076);
}

//Get default WP uploads folder
$wp_upload_arr = wp_upload_dir();
define("DOTLIFE_THEMEUPLOAD", $wp_upload_arr['basedir']."/".strtolower(sanitize_title(DOTLIFE_THEMENAME))."/");
define("DOTLIFE_THEMEUPLOADURL", $wp_upload_arr['baseurl']."/".strtolower(sanitize_title(DOTLIFE_THEMENAME))."/");

if(!is_dir(DOTLIFE_THEMEUPLOAD))
{
	wp_mkdir_p(DOTLIFE_THEMEUPLOAD);
}

/**
*  Begin Global variables functions
*/

//Get default WordPress post variable
function dotlife_get_wp_post() {
	global $post;
	return $post;
}

//Get default WordPress file system variable
function dotlife_get_wp_filesystem() {
	require_once(ABSPATH . 'wp-admin/includes/file.php');
	WP_Filesystem();
	global $wp_filesystem;
	return $wp_filesystem;
}

//Get default WordPress wpdb variable
function dotlife_get_wpdb() {
	global $wpdb;
	return $wpdb;
}

//Get default WordPress wp_query variable
function dotlife_get_wp_query() {
	global $wp_query;
	return $wp_query;
}

//Get default WordPress customize variable
function dotlife_get_wp_customize() {
	global $wp_customize;
	return $wp_customize;
}

//Get default WordPress current screen variable
function dotlife_get_current_screen() {
	global $current_screen;
	return $current_screen;
}

//Get default WordPress paged variable
function dotlife_get_paged() {
	global $paged;
	return $paged;
}

//Get default WordPress registered widgets variable
function dotlife_get_registered_widget_controls() {
	global $wp_registered_widget_controls;
	return $wp_registered_widget_controls;
}

//Get default WordPress registered sidebars variable
function dotlife_get_registered_sidebars() {
	global $wp_registered_sidebars;
	return $wp_registered_sidebars;
}

//Get default Woocommerce variable
function dotlife_get_woocommerce() {
	global $woocommerce;
	return $woocommerce;
}

//Get all google font usages in customizer
function dotlife_get_google_fonts() {
	$dotlife_google_fonts = array('tg_body_font', 'tg_header_font', 'tg_menu_font', 'tg_sidemenu_font', 'tg_sidebar_title_font', 'tg_button_font');
	
	global $dotlife_google_fonts;
	return $dotlife_google_fonts;
}

//Get menu transparent variable
function dotlife_get_page_menu_transparent() {
	global $dotlife_page_menu_transparent;
	return $dotlife_page_menu_transparent;
}

//Set menu transparent variable
function dotlife_set_page_menu_transparent($new_value = '') {
	global $dotlife_page_menu_transparent;
	$dotlife_page_menu_transparent = $new_value;
}

//Get no header checker variable
function dotlife_get_is_no_header() {
	global $dotlife_is_no_header;
	return $dotlife_is_no_header;
}

//Get deafult theme screen CSS class
function dotlife_get_screen_class() {
	global $dotlife_screen_class;
	return $dotlife_screen_class;
}

//Set deafult theme screen CSS class
function dotlife_set_screen_class($new_value = '') {
	global $dotlife_screen_class;
	$dotlife_screen_class = $new_value;
}

//Get theme homepage style
function dotlife_get_homepage_style() {
	global $dotlife_homepage_style;
	return $dotlife_homepage_style;
}

//Set theme homepage style
function dotlife_set_homepage_style($new_value = '') {
	global $dotlife_homepage_style;
	$dotlife_homepage_style = $new_value;
}

//Get page gallery ID
function dotlife_get_page_gallery_id() {
	global $dotlife_page_gallery_id;
	return $dotlife_page_gallery_id;
}

//Get default theme options variable
function dotlife_get_options() {
	global $dotlife_options;
	return $dotlife_options;
}

//Set default theme options variable
function dotlife_set_options($new_value = '') {
	global $dotlife_options;
	$dotlife_options = $new_value;
}

//Get top bar setting
function dotlife_get_topbar() {
	global $dotlife_topbar;
	return $dotlife_topbar;
}

//Set top bar setting
function dotlife_set_topbar($new_value = '') {
	global $dotlife_topbar;
	$dotlife_topbar = $new_value;
}

//Get is hide title option
function dotlife_get_hide_title() {
	global $dotlife_hide_title;
	return $dotlife_hide_title;
}

//Set is hide title option
function dotlife_set_hide_title($new_value = '') {
	global $dotlife_hide_title;
	$dotlife_hide_title = $new_value;
}

//Get theme page content CSS class
function dotlife_get_page_content_class() {
	global $dotlife_page_content_class;
	return $dotlife_page_content_class;
}

//Set theme page content CSS class
function dotlife_set_page_content_class($new_value = '') {
	global $dotlife_page_content_class;
	$dotlife_page_content_class = $new_value;
}

//Get Kirki global variable
function dotlife_get_kirki() {
	global $kirki;
	return $kirki;
}

//Get admin theme global variable
function dotlife_get_wp_admin_css_colors() {
	global $_wp_admin_css_colors;
	return $_wp_admin_css_colors;
}

//Get theme plugins
function dotlife_get_plugins() {
	global $dotlife_tgm_plugins;
	return $dotlife_tgm_plugins;
}

//Set theme plugins
function dotlife_set_plugins($new_value = '') {
	global $dotlife_tgm_plugins;
	$dotlife_tgm_plugins = $new_value;
}

$is_verified_envato_purchase_code = false;

//Get verified purchase code data
$pp_verified_envato_dotlife = get_option("pp_verified_envato_dotlife");
if(!empty($pp_verified_envato_dotlife))
{
	$is_verified_envato_purchase_code = true;
}

$is_imported_elementor_templates_dotlife = false;
$pp_imported_elementor_templates_dotlife = get_option("pp_imported_elementor_templates_dotlife");
if(!empty($pp_imported_elementor_templates_dotlife))
{
	$is_imported_elementor_templates_dotlife = true;
}
?>