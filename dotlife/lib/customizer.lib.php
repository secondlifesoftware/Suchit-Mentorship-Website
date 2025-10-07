<?php
/**
* Custom Sanitize Functions
**/
function dotlife_sanitize_checkbox( $input ) {
	if(is_bool($input))
	{
		return $input;
	}
	else
	{
		return false;
	}

}

function dotlife_sanitize_slider( $input ) {	
    if(is_numeric($input))
	{
		return $input;
	}
	else
	{
		return 0;

	}
}

function dotlife_sanitize_html( $input ) {
    return wp_kses_post( $input );
}

/*** Configuration to disable default WordPress customizer tabs
**/

add_action( 'customize_register', 'dotlife_customize_register' );
function dotlife_customize_register( $wp_customize ) {
	$wp_customize->remove_section( 'colors' );
	$wp_customize->remove_section( 'background_image' );
}

/**
 * Configuration sample for the Kirki Customizer
 */
function dotlife_demo_configuration_sample() {

    /**
     * If you need to include Kirki in your theme,
     * then you may want to consider adding the translations here
     * using your textdomain.
     * 
     * If you're using Kirki as a plugin then you can remove these.
     */

    $strings = array(
        'background-color' => esc_html__('Background Color', 'dotlife' ),
        'background-image' => esc_html__('Background Image', 'dotlife' ),
        'no-repeat' => esc_html__('No Repeat', 'dotlife' ),
        'repeat-all' => esc_html__('Repeat All', 'dotlife' ),
        'repeat-x' => esc_html__('Repeat Horizontally', 'dotlife' ),
        'repeat-y' => esc_html__('Repeat Vertically', 'dotlife' ),
        'inherit' => esc_html__('Inherit', 'dotlife' ),
        'background-repeat' => esc_html__('Background Repeat', 'dotlife' ),
        'cover' => esc_html__('Cover', 'dotlife' ),
        'contain' => esc_html__('Contain', 'dotlife' ),
        'background-size' => esc_html__('Background Size', 'dotlife' ),
        'fixed' => esc_html__('Fixed', 'dotlife' ),
        'scroll' => esc_html__('Scroll', 'dotlife' ),
        'background-attachment' => esc_html__('Background Attachment', 'dotlife' ),
        'left-top' => esc_html__('Left Top', 'dotlife' ),
        'left-center' => esc_html__('Left Center', 'dotlife' ),
        'left-bottom' => esc_html__('Left Bottom', 'dotlife' ),
        'right-top' => esc_html__('Right Top', 'dotlife' ),
        'right-center' => esc_html__('Right Center', 'dotlife' ),
        'right-bottom' => esc_html__('Right Bottom', 'dotlife' ),
        'center-top' => esc_html__('Center Top', 'dotlife' ),
        'center-center' => esc_html__('Center Center', 'dotlife' ),
        'center-bottom' => esc_html__('Center Bottom', 'dotlife' ),
        'background-position' => esc_html__('Background Position', 'dotlife' ),
        'background-opacity' => esc_html__('Background Opacity', 'dotlife' ),
        'ON' => esc_html__('ON', 'dotlife' ),
        'OFF' => esc_html__('OFF', 'dotlife' ),
        'all' => esc_html__('All', 'dotlife' ),
        'cyrillic' => esc_html__('Cyrillic', 'dotlife' ),
        'cyrillic-ext' => esc_html__('Cyrillic Extended', 'dotlife' ),
        'devanagari' => esc_html__('Devanagari', 'dotlife' ),
        'greek' => esc_html__('Greek', 'dotlife' ),
        'greek-ext' => esc_html__('Greek Extended', 'dotlife' ),
        'khmer' => esc_html__('Khmer', 'dotlife' ),
        'latin' => esc_html__('Latin', 'dotlife' ),
        'latin-ext' => esc_html__('Latin Extended', 'dotlife' ),
        'vietnamese' => esc_html__('Vietnamese', 'dotlife' ),
    );

    $args = array(
        'textdomain'   => 'dotlife',
    );

    return $args;

}
add_filter( 'kirki/config', 'dotlife_demo_configuration_sample' );

/**
 * Create the customizer panels and sections
 */
function dotlife_add_panels_and_sections( $wp_customize ) {

	/**
     * Add panels
     */
    $wp_customize->add_panel( 'general', array(
        'priority'    => 35,
        'title'       => esc_html__('General', 'dotlife' ),
    ) ); 
    
    $wp_customize->add_panel( 'menu', array(
        'priority'    => 35,
        'title'       => esc_html__('Navigation', 'dotlife' ),
    ) );
    
    $wp_customize->add_panel( 'header', array(
        'priority'    => 39,
        'title'       => esc_html__('Header', 'dotlife' ),
    ) );
    
    $wp_customize->add_panel( 'sidebar', array(
        'priority'    => 43,
        'title'       => esc_html__('Sidebar', 'dotlife' ),
    ) );
    
    $wp_customize->add_panel( 'footer', array(
        'priority'    => 44,
        'title'       => esc_html__('Footer', 'dotlife' ),
    ) );
    
    $wp_customize->add_panel( 'gallery', array(
        'priority'    => 45,
        'title'       => esc_html__('Gallery', 'dotlife' ),
    ) );
    
    $wp_customize->add_panel( 'blog', array(
        'priority'    => 47,
        'title'       => esc_html__('Blog', 'dotlife' ),
    ) );
    
    //Check if Woocommerce is installed	
	if(class_exists('Woocommerce'))
	{
		$wp_customize->add_panel( 'shop', array(
	        'priority'    => 48,
	        'title'       => esc_html__('Shop', 'dotlife' ),
	    ) );
	}
	
	//Check if Booking Calendar is installed	
	if(class_exists('LearnPress'))
	{
		$wp_customize->add_panel( 'learnpress', array(
	        'priority'    => 48,
	        'title'       => esc_html__('Learn Press', 'dotlife' ),
	    ) );
	}

    /**
     * Add sections
     */
	$wp_customize->add_section( 'logo_favicon', array(
        'title'       => esc_html__('Site Logo', 'dotlife' ),
        'priority'    => 34,

    ) );
    
    $wp_customize->add_section( 'general_image', array(
        'title'       => esc_html__('Image', 'dotlife' ),
        'panel'		  => 'general',
        'priority'    => 46,
    ) );
    
    $wp_customize->add_section( 'general_lightbox', array(
        'title'       => esc_html__('Lightbox', 'dotlife' ),
        'panel'		  => 'general',
        'priority'    => 46,

    ) );
    
    $wp_customize->add_section( 'general_fonts', array(
        'title'       => esc_html__('Fonts', 'dotlife' ),
        'panel'		  => 'general',
        'priority'    => 46,

    ) );
    
    $wp_customize->add_section( 'general_typography', array(
        'title'       => esc_html__('Typography', 'dotlife' ),
        'panel'		  => 'general',
        'priority'    => 47,

    ) );
    
    $wp_customize->add_section( 'general_color', array(
        'title'       => esc_html__('Background & Colors', 'dotlife' ),
        'panel'		  => 'general',
        'priority'    => 48,

    ) );
    
    $wp_customize->add_section( 'general_input', array(
        'title'       => esc_html__('Input and Button Elements', 'dotlife' ),
        'panel'		  => 'general',
        'priority'    => 49,

    ) );
    
    $wp_customize->add_section( 'general_frame', array(
        'title'       => esc_html__('Frame', 'dotlife' ),
        'panel'		  => 'general',
        'priority'    => 51,
    ) );

    $wp_customize->add_section( 'menu_general', array(
        'title'       => esc_html__('General', 'dotlife' ),
        'panel'		  => 'menu',
        'priority'    => 36,

    ) );
    
    $wp_customize->add_section( 'menu_typography', array(
        'title'       => esc_html__('Typography', 'dotlife' ),
        'panel'		  => 'menu',
        'priority'    => 36,

    ) );
    
    $wp_customize->add_section( 'menu_color', array(
        'title'       => esc_html__('Colors', 'dotlife' ),
        'panel'		  => 'menu',
        'priority'    => 37,

    ) );
    
    $wp_customize->add_section( 'menu_submenu', array(
        'title'       => esc_html__('Sub Menu', 'dotlife' ),
        'panel'		  => 'menu',
        'priority'    => 38,

    ) );
    
    $wp_customize->add_section( 'menu_megamenu', array(
        'title'       => esc_html__('Mega Menu', 'dotlife' ),
        'panel'		  => 'menu',
        'priority'    => 38,

    ) );
    
    $wp_customize->add_section( 'menu_topbar', array(
        'title'       => esc_html__('Top Bar', 'dotlife' ),
        'panel'		  => 'menu',
        'priority'    => 38,

    ) );
    
    $wp_customize->add_section( 'menu_contact', array(
        'title'       => esc_html__('Contact Info', 'dotlife' ),
        'panel'		  => 'menu',
        'priority'    => 39,

    ) );
    
    $wp_customize->add_section( 'menu_sidemenu', array(
        'title'       => esc_html__('Side Menu', 'dotlife' ),
        'panel'		  => 'menu',
        'priority'    => 39,

    ) );
    
    $wp_customize->add_section( 'menu_fullmenu', array(
        'title'       => esc_html__('Fullscreen Menu', 'dotlife' ),
        'panel'		  => 'menu',
        'priority'    => 39,
    
    ) );
    
    $wp_customize->add_section( 'header_background', array(
        'title'       => esc_html__('Background', 'dotlife' ),
        'panel'		  => 'header',
        'priority'    => 40,

    ) );
    
    $wp_customize->add_section( 'header_title', array(
        'title'       => esc_html__('Page Title', 'dotlife' ),
        'panel'		  => 'header',
        'priority'    => 41,

    ) );
    
    $wp_customize->add_section( 'header_builder_title', array(
        'title'       => esc_html__('Content Builder Header', 'dotlife' ),
        'panel'		  => 'header',
        'priority'    => 41,

    ) );
    
    $wp_customize->add_section( 'header_tagline', array(
        'title'       => esc_html__('Page Tagline & Sub Title', 'dotlife' ),
        'panel'		  => 'header',
        'priority'    => 42,

    ) );
    
    $wp_customize->add_section( 'sidebar_general', array(
        'title'       => esc_html__('General', 'dotlife' ),
        'panel'		  => 'sidebar',
        'priority'    => 42,

    ) );
    
    $wp_customize->add_section( 'sidebar_typography', array(
        'title'       => esc_html__('Typography', 'dotlife' ),
        'panel'		  => 'sidebar',
        'priority'    => 43,

    ) );
    
    $wp_customize->add_section( 'sidebar_color', array(
        'title'       => esc_html__('Colors', 'dotlife' ),
        'panel'		  => 'sidebar',
        'priority'    => 44,

    ) );
    
    $wp_customize->add_section( 'footer_general', array(
        'title'       => esc_html__('General', 'dotlife' ),
        'panel'		  => 'footer',
        'priority'    => 45,

    ) );
    
    $wp_customize->add_section( 'footer_color', array(
        'title'       => esc_html__('Colors', 'dotlife' ),
        'panel'		  => 'footer',
        'priority'    => 46,

    ) );
    
    $wp_customize->add_section( 'footer_copyright', array(
        'title'       => esc_html__('Copyright', 'dotlife' ),
        'panel'		  => 'footer',
        'priority'    => 47,

    ) );
    
    $wp_customize->add_section( 'blog_general', array(
        'title'       => esc_html__('General', 'dotlife' ),
        'panel'		  => 'blog',
        'priority'    => 53,

    ) );
    
    $wp_customize->add_section( 'blog_typography', array(
        'title'       => esc_html__('Typography', 'dotlife' ),
        'panel'		  => 'blog',
        'priority'    => 54,

    ) );
    
    $wp_customize->add_section( 'blog_slider', array(
        'title'       => esc_html__('Slider', 'dotlife' ),
        'panel'		  => 'blog',
        'priority'    => 54,

    ) );
    
    $wp_customize->add_section( 'blog_single', array(
        'title'       => esc_html__('Single Post', 'dotlife' ),
        'panel'		  => 'blog',
        'priority'    => 55,

    ) );
    
    //Check if Woocommerce is installed	
	if(class_exists('Woocommerce'))
	{
		$wp_customize->add_section( 'shop_layout', array(
	        'title'       => esc_html__('Layout', 'dotlife' ),
	        'panel'		  => 'shop',
	        'priority'    => 55,
	
	    ) );
	    
	    $wp_customize->add_section( 'shop_single', array(
	        'title'       => esc_html__('Single Product', 'dotlife' ),
	        'panel'		  => 'shop',
	        'priority'    => 56,
	
	    ) );
	}
	
	//Check if Booking Calendar is installed	
	if(class_exists('LearnPress'))
	{
		$wp_customize->add_section( 'course_general', array(
	        'title'       => esc_html__('General', 'dotlife' ),
	        'panel'		  => 'learnpress',
	        'priority'    => 55,
	
	    ) );
		
		$wp_customize->add_section( 'course_single', array(
	        'title'       => esc_html__('Single Course', 'dotlife' ),
	        'panel'		  => 'learnpress',
	        'priority'    => 55,
	
	    ) );
	}

}
add_action( 'customize_register', 'dotlife_add_panels_and_sections' );

/**
 * Register and setting to header section
 */
function dotlife_header_setting( $wp_customize ) {

	//Register Logo Tab Settings
	$wp_customize->add_setting( 'tg_favicon', array(
        'type'           => 'theme_mod',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'esc_url_raw',
    ) );
	
    $wp_customize->add_setting( 'tg_retina_logo', array(
        'type'           => 'theme_mod',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'esc_url_raw',
    ) );
    
    $wp_customize->add_setting( 'tg_retina_transparent_logo', array(
        'type'           => 'theme_mod',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'esc_url_raw',
    ) );

    //End Logo Tab Settings
    
    //Register General Tab Settings
    $wp_customize->add_setting( 'tg_enable_right_click', array(
        'type'           => 'theme_mod',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'dotlife_sanitize_checkbox',
    ) );
    
    $wp_customize->add_setting( 'tg_enable_dragging', array(
        'type'           => 'theme_mod',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'dotlife_sanitize_checkbox',
    ) );
    
    $wp_customize->add_setting( 'tg_body_font', array(
        'type'           => 'theme_mod',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'esc_html',
    ) );
    
    $wp_customize->add_setting( 'tg_body_font_size', array(
        'type'           => 'theme_mod',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'dotlife_sanitize_slider',
    ) );
    
	$wp_customize->add_setting( 'tg_header_font', array(
        'type'           => 'theme_mod',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'esc_html',
    ) );
    
    $wp_customize->add_setting( 'tg_header_font_weight', array(
        'type'           => 'theme_mod',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'dotlife_sanitize_slider',
    ) );
    
    $wp_customize->add_setting( 'tg_h1_size', array(
        'type'           => 'theme_mod',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'dotlife_sanitize_slider',
    ) );
    
    $wp_customize->add_setting( 'tg_h2_size', array(
        'type'           => 'theme_mod',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'dotlife_sanitize_slider',
    ) );
    
    $wp_customize->add_setting( 'tg_h3_size', array(
        'type'           => 'theme_mod',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'dotlife_sanitize_slider',
    ) );
    
    $wp_customize->add_setting( 'tg_h4_size', array(
        'type'           => 'theme_mod',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'dotlife_sanitize_slider',
    ) );
    
    $wp_customize->add_setting( 'tg_h5_size', array(
        'type'           => 'theme_mod',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'dotlife_sanitize_slider',
    ) );
    
    $wp_customize->add_setting( 'tg_h6_size', array(
        'type'           => 'theme_mod',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'dotlife_sanitize_slider',
    ) );
    
    $wp_customize->add_setting( 'tg_content_bg_color', array(
        'type'           => 'theme_mod',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_hex_color',
    ) );
    
    $wp_customize->add_setting( 'tg_font_color', array(
        'type'           => 'theme_mod',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_hex_color',
    ) );
    
    $wp_customize->add_setting( 'tg_link_color', array(
        'type'           => 'theme_mod',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_hex_color',
    ) );
    
    $wp_customize->add_setting( 'tg_hover_link_color', array(
        'type'           => 'theme_mod',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_hex_color',
    ) );
    
    $wp_customize->add_setting( 'tg_h1_font_color', array(
        'type'           => 'theme_mod',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_hex_color',
    ) );
    
    $wp_customize->add_setting( 'tg_hr_color', array(
        'type'           => 'theme_mod',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_hex_color',
    ) );
    
    $wp_customize->add_setting( 'tg_input_bg_color', array(
        'type'           => 'theme_mod',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_hex_color',
    ) );
    
    $wp_customize->add_setting( 'tg_input_font_color', array(
        'type'           => 'theme_mod',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_hex_color',
    ) );
    
    $wp_customize->add_setting( 'tg_input_border_color', array(
        'type'           => 'theme_mod',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_hex_color',
    ) );
    
    $wp_customize->add_setting( 'tg_input_focus_color', array(
        'type'           => 'theme_mod',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_hex_color',
    ) );
    
    $wp_customize->add_setting( 'tg_button_font', array(
        'type'           => 'theme_mod',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'esc_html',
    ) );
    
    $wp_customize->add_setting( 'tg_button_bg_color', array(
        'type'           => 'theme_mod',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_hex_color',
    ) );
    
    $wp_customize->add_setting( 'tg_button_font_color', array(
        'type'           => 'theme_mod',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_hex_color',
    ) );
    
    $wp_customize->add_setting( 'tg_button_border_color', array(
        'type'           => 'theme_mod',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_hex_color',
    ) );
    //End General Tab Settings
    

    //Register Menu Tab Settings
    $wp_customize->add_setting( 'tg_menu_layout', array(
        'type'           => 'theme_mod',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'esc_html',
    ) );
    
    $wp_customize->add_setting( 'tg_fixed_menu', array(
        'type'           => 'theme_mod',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'dotlife_sanitize_checkbox',
    ) );
    
    $wp_customize->add_setting( 'tg_menu_font', array(
        'type'           => 'theme_mod',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'esc_html',
    ) );
    
    $wp_customize->add_setting( 'tg_menu_font_size', array(
        'type'           => 'theme_mod',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'dotlife_sanitize_slider',
    ) );
    
    $wp_customize->add_setting( 'tg_menu_padding', array(
        'type'           => 'theme_mod',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'dotlife_sanitize_slider',
    ) );
    
    $wp_customize->add_setting( 'tg_menu_weight', array(
        'type'           => 'theme_mod',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'dotlife_sanitize_slider',
    ) );
    
    $wp_customize->add_setting( 'tg_menu_font_spacing', array(
        'type'           => 'theme_mod',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'dotlife_sanitize_slider',
    ) );
    
    $wp_customize->add_setting( 'tg_menu_transform', array(
        'type'           => 'theme_mod',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'esc_html',
    ) );
    
    $wp_customize->add_setting( 'tg_menu_font_color', array(
        'type'           => 'theme_mod',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_hex_color',
    ) );
    
    $wp_customize->add_setting( 'tg_menu_hover_font_color', array(
        'type'           => 'theme_mod',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_hex_color',
    ) );
    
    $wp_customize->add_setting( 'tg_menu_active_font_color', array(
        'type'           => 'theme_mod',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_hex_color',
    ) );
    
    $wp_customize->add_setting( 'tg_menu_border_color', array(
        'type'           => 'theme_mod',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_hex_color',
    ) );
    
    $wp_customize->add_setting( 'tg_menu_bg', array(
        'type'           => 'theme_mod',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'esc_html',
    ) );
    
    $wp_customize->add_setting( 'tg_submenu_font_size', array(
        'type'           => 'theme_mod',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'dotlife_sanitize_slider',
    ) );
    
    $wp_customize->add_setting( 'tg_submenu_weight', array(
        'type'           => 'theme_mod',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'dotlife_sanitize_slider',
    ) );
    
    $wp_customize->add_setting( 'tg_submenu_font_spacing', array(
        'type'           => 'theme_mod',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'dotlife_sanitize_slider',
    ) );
    
    $wp_customize->add_setting( 'tg_submenu_transform', array(
        'type'           => 'theme_mod',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'esc_html',
    ) );
    
    $wp_customize->add_setting( 'tg_submenu_font_color', array(
        'type'           => 'theme_mod',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_hex_color',
    ) );
    
    $wp_customize->add_setting( 'tg_submenu_hover_font_color', array(
        'type'           => 'theme_mod',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_hex_color',
    ) );
    
    $wp_customize->add_setting( 'tg_submenu_hover_bg_color', array(
        'type'           => 'theme_mod',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_hex_color',
    ) );
    
    $wp_customize->add_setting( 'tg_submenu_bg', array(
        'type'           => 'theme_mod',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_hex_color',
    ) );
    
    $wp_customize->add_setting( 'tg_submenu_border_color', array(
        'type'           => 'theme_mod',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_hex_color',
    ) );
    
    $wp_customize->add_setting( 'tg_megamenu_header_color', array(
        'type'           => 'theme_mod',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_hex_color',
    ) );
    
    $wp_customize->add_setting( 'tg_megamenu_border_color', array(
        'type'           => 'theme_mod',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_hex_color',
    ) );
    
    $wp_customize->add_setting( 'tg_topbar', array(
        'type'           => 'theme_mod',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'dotlife_sanitize_checkbox',
    ) );
    
    $wp_customize->add_setting( 'tg_topbar_bg', array(
        'type'           => 'theme_mod',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_hex_color',
    ) );
    
    $wp_customize->add_setting( 'tg_topbar_font_color', array(
        'type'           => 'theme_mod',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_hex_color',
    ) );
    
    $wp_customize->add_setting( 'tg_topbar_social_link', array(
        'type'           => 'theme_mod',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'dotlife_sanitize_checkbox',
    ) );
    
    $wp_customize->add_setting( 'tg_menu_contact_hours', array(
        'type'           => 'theme_mod',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'esc_html',
    ) );
    
    $wp_customize->add_setting( 'tg_menu_contact_number', array(
        'type'           => 'theme_mod',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'esc_html',
    ) );
    
    $wp_customize->add_setting( 'tg_menu_search', array(
        'type'           => 'theme_mod',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'dotlife_sanitize_checkbox',
    ) );
    
    $wp_customize->add_setting( 'tg_menu_search_input_color', array(
        'type'           => 'theme_mod',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_hex_color',
    ) );
    
    $wp_customize->add_setting( 'tg_menu_search_font_color', array(
        'type'           => 'theme_mod',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_hex_color',
    ) );
    
    $wp_customize->add_setting( 'tg_sidemenu_bg', array(
        'type'           => 'theme_mod',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_hex_color',
    ) );
    
    $wp_customize->add_setting( 'tg_sidemenu_font', array(
        'type'           => 'theme_mod',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'esc_html',
    ) );
    
    $wp_customize->add_setting( 'tg_sidemenu_font_size', array(
        'type'           => 'theme_mod',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'dotlife_sanitize_slider',
    ) );
    
    $wp_customize->add_setting( 'tg_sidemenu_font_transform', array(
        'type'           => 'theme_mod',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'esc_html',
    ) );
    
    $wp_customize->add_setting( 'tg_sidemenu_font_spacing', array(
        'type'           => 'theme_mod',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'dotlife_sanitize_slider',
    ) );
    
    $wp_customize->add_setting( 'tg_sidemenu_font_color', array(
        'type'           => 'theme_mod',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_hex_color',
    ) );
    
    $wp_customize->add_setting( 'tg_sidemenu_font_hover_color', array(
        'type'           => 'theme_mod',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_hex_color',
    ) );
    //End Menu Tab Settings
    
    //Register Header Tab Settings
	$wp_customize->add_setting( 'tg_page_header_bg_color', array(
        'type'           => 'theme_mod',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_hex_color',
    ) );
    
    $wp_customize->add_setting( 'tg_page_header_padding_top', array(
        'type'           => 'theme_mod',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'dotlife_sanitize_slider',
    ) );
    
    $wp_customize->add_setting( 'tg_page_header_padding_bottom', array(
        'type'           => 'theme_mod',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'dotlife_sanitize_slider',
    ) );
    
    $wp_customize->add_setting( 'tg_page_title_font_color', array(
        'type'           => 'theme_mod',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_hex_color',
    ) );
    
    $wp_customize->add_setting( 'tg_page_title_font_size', array(
        'type'           => 'theme_mod',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'dotlife_sanitize_slider',
    ) );
    
    $wp_customize->add_setting( 'tg_page_title_font_weight', array(
        'type'           => 'theme_mod',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'dotlife_sanitize_slider',
    ) );
    
    $wp_customize->add_setting( 'tg_page_title_font_spacing', array(
        'type'           => 'theme_mod',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'dotlife_sanitize_slider',
    ) );
    
    $wp_customize->add_setting( 'tg_page_title_bg_height', array(
        'type'           => 'theme_mod',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'dotlife_sanitize_slider',
    ) );
    
    $wp_customize->add_setting( 'tg_header_builder_font_size', array(
        'type'           => 'theme_mod',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'dotlife_sanitize_slider',
    ) );
    
    $wp_customize->add_setting( 'tg_header_builder_font_transform', array(
        'type'           => 'theme_mod',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'esc_html',
    ) );
    //End Header Tab Settings
    
    //Register Copyright Tab Settings
    
    $wp_customize->add_setting( 'tg_footer_sidebar', array(
        'type'           => 'theme_mod',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'esc_html',
    ) );
	
	$wp_customize->add_setting( 'tg_footer_social_link', array(
        'type'           => 'theme_mod',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'dotlife_sanitize_checkbox',
    ) );
    
    $wp_customize->add_setting( 'tg_footer_bg', array(
        'type'           => 'theme_mod',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'esc_html',
    ) );
    
	$wp_customize->add_setting( 'tg_footer_font_color', array(
        'type'           => 'theme_mod',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_hex_color',
    ) );
    
    $wp_customize->add_setting( 'tg_footer_link_color', array(
        'type'           => 'theme_mod',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_hex_color',
    ) );
    
    $wp_customize->add_setting( 'tg_footer_hover_link_color', array(
        'type'           => 'theme_mod',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_hex_color',
    ) );
    
    $wp_customize->add_setting( 'tg_footer_border_color', array(
        'type'           => 'theme_mod',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_hex_color',
    ) );
    
    $wp_customize->add_setting( 'tg_footer_social_color', array(
        'type'           => 'theme_mod',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_hex_color',
    ) );
    
    $wp_customize->add_setting( 'tg_footer_copyright_text', array(
        'type'           => 'theme_mod',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'dotlife_sanitize_html',
    ) );
    
    $wp_customize->add_setting( 'tg_footer_copyright_right_area', array(
        'type'           => 'theme_mod',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'esc_html',
    ) );
    
    $wp_customize->add_setting( 'tg_footer_copyright_totop', array(
        'type'           => 'theme_mod',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'dotlife_sanitize_checkbox',
    ) );
    //End Copyright Tab Settings
    
    
    //Begin Portfolio Tab Settings
    $wp_customize->add_setting( 'tg_portfolio_filterable', array(
        'type'           => 'theme_mod',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'dotlife_sanitize_checkbox',
    ) );
    
    $wp_customize->add_setting( 'tg_portfolio_filterable_link', array(
        'type'           => 'theme_mod',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'dotlife_sanitize_checkbox',
    ) );
    
    $wp_customize->add_setting( 'tg_portfolio_filterable_sort', array(
        'type'           => 'theme_mod',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'esc_html',
    ) );
    
    $wp_customize->add_setting( 'tg_portfolio_items', array(
        'type'           => 'theme_mod',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'dotlife_sanitize_slider',
    ) );
    
    $wp_customize->add_setting( 'tg_portfolio_next_prev', array(
        'type'           => 'theme_mod',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'dotlife_sanitize_checkbox',
    ) );
    
    $wp_customize->add_setting( 'tg_portfolio_recent', array(
        'type'           => 'theme_mod',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'dotlife_sanitize_checkbox',
    ) );
    //End Portfolio Tab Settings
    
    
    //Begin Blog Tab Settings
    $wp_customize->add_setting( 'tg_blog_display_full', array(
        'type'           => 'theme_mod',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'dotlife_sanitize_checkbox',
    ) );
    
    $wp_customize->add_setting( 'tg_blog_archive_layout', array(
        'type'           => 'theme_mod',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'esc_html',
    ) );
    
    $wp_customize->add_setting( 'tg_blog_category_layout', array(
        'type'           => 'theme_mod',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'esc_html',
    ) );
    
    $wp_customize->add_setting( 'tg_blog_tag_layout', array(
        'type'           => 'theme_mod',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'esc_html',
    ) );
    
    $wp_customize->add_setting( 'tg_blog_header_bg', array(
        'type'           => 'theme_mod',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'dotlife_sanitize_checkbox',
    ) );
    
    $wp_customize->add_setting( 'tg_blog_feat_content', array(
        'type'           => 'theme_mod',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'dotlife_sanitize_checkbox',
    ) );
    
    $wp_customize->add_setting( 'tg_blog_display_tags', array(
        'type'           => 'theme_mod',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'dotlife_sanitize_checkbox',
    ) );
    
    $wp_customize->add_setting( 'tg_blog_display_author', array(
        'type'           => 'theme_mod',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'dotlife_sanitize_checkbox',
    ) );
    
    $wp_customize->add_setting( 'tg_blog_display_related', array(
        'type'           => 'theme_mod',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'dotlife_sanitize_checkbox',
    ) );
    //End Blog Tab Settings
    
    
    //Check if Woocommerce is installed	
	if(class_exists('Woocommerce'))
	{
		//Begin Shop Tab Settings
		$wp_customize->add_setting( 'tg_shop_layout', array(
	        'type'           => 'theme_mod',
	        'capability'     => 'edit_theme_options',
			'sanitize_callback' => 'esc_html',
	    ) );
	    
	    $wp_customize->add_setting( 'tg_shop_items', array(
	        'type'           => 'theme_mod',
	        'capability'     => 'edit_theme_options',
			'sanitize_callback' => 'dotlife_sanitize_slider',
	    ) );
	    
	    $wp_customize->add_setting( 'tg_shop_price_font_color', array(
	        'type'           => 'theme_mod',
	        'capability'     => 'edit_theme_options',
			'sanitize_callback' => 'sanitize_hex_color',
	    ) );
	    
	    $wp_customize->add_setting( 'tg_shop_related_products', array(
	        'type'           => 'theme_mod',
	        'capability'     => 'edit_theme_options',
			'sanitize_callback' => 'dotlife_sanitize_checkbox',
	    ) );
		//End Shop Tab Settings
	}
    
    
    //Add Live preview
    if ( $wp_customize->is_preview() && ! is_admin() ) {
	    add_action( 'wp_footer', 'dotlife_customize_preview', 21);
	}
}
add_action( 'customize_register', 'dotlife_header_setting' );

/**
 * Create the setting
 */
function dotlife_custom_setting( $controls ) {

	//Default control choices
	$tg_text_transform = array(
	    'none' => 'None',
	    'capitalize' => 'Capitalize',
	    'uppercase' => 'Uppercase',
	    'lowercase' => 'Lowercase',
	);
	
	$tg_text_alignment = array(
	    'left' => 'Left',
	    'center' => 'Center',
	    'right' => 'Right',
	);
	
	$tg_copyright_content = array(
	    'social' => 'Social Icons',
	    'menu' => 'Footer Menu',
	);
	
	$tg_footer_content = array(
	    'content' => 'Footer Content',
	    'sidebar' => 'Sidebar',
	    'hide' => 'Hide Footer Content',
	);
	
	$tg_header_content = array(
	    'content' => 'Header Content',
	    'menu' => 'General Menu Layout',
	);
	
	$tg_post_title_location = array(
	    'featured_image' => 'Over Featured background Image',
	    'content' => 'Top of post content',
	);
	
	$tg_copyright_column = array(
	    1 => '1 Column',
	    2 => '2 Column',
	    3 => '3 Column',
	    4 => '4 Column',
	);
	
	$tg_portfolio_filterable_sort = array(
		'name' => 'By Name',
		'slug' => 'By Slug',
		'id' => 'By ID',
		'count' => 'By Number of Portfolio',
	);
	
	$tg_blog_layout = array(
		'blog-r' => 'Right Sidebar',
		'blog-l' => 'Left Sidebar',
		'blog-f' => 'Fullwidth',
	);
	
	$tg_shop_layout = array(
		'fullwidth' => 'Fullwidth',
		'sidebar' => 'With Sidebar',
	);
	
	$tg_slideshow_trans = array(
	    1 => 'Fade',
	    2 => 'Slide Top',
	    3 => 'Slide Right',
	    4 => 'Slide Bottom',
	    5 => 'Slide Left',
	    6 => 'Carousel Right',
	    7 => 'Carousel Left',
	);
	
	$tg_menu_layout = array(
	    'leftalign' => 'Left Align',
	    'centeralign' => 'Center Align',
	    'hammenuside' => 'Hamburger Menu + Side Menu',
	    'hammenufull' => 'Hamburger Menu + Fullscreen Menu',
	    'leftmenu' => 'Left Vetical',
	);
	
	$tg_lightbox_skin = array(
		'white' => 'White',
		'black' => 'Black',
	);
	
	$tg_lightbox_thumbnails = array(
		'no_thumbnail' => 'No Thumbnail',
		'thumbnail' => 'Show Thumbnail',
	);
	
	//Get all categories
	$categories_arr = get_categories();
	$tg_categories_select = array();
	$tg_categories_select[''] = '';
	
	foreach ($categories_arr as $cat) {
		$tg_categories_select[$cat->cat_ID] = $cat->cat_name;
	}
	
	//Get all gallery categories
	$gallery_categories_arr = get_terms('gallerycat', 'hide_empty=0&hierarchical=0&parent=0&orderby=name');
	$tg_gallery_categories_select = array();
	$tg_gallery_categories_select[''] = '';
	
	if(!empty($gallery_categories_arr) && is_array($gallery_categories_arr))
	{
		foreach ($gallery_categories_arr as $gallery_cat) {
			$tg_gallery_categories_select[$gallery_cat->slug] = $gallery_cat->name;
		}
	}
	
	//Get all footer posts
	$args = array(
		 'post_type'     => 'footer',
		 'post_status'   => array( 'publish' ),
		 'numberposts'   => -1,
		 'orderby'       => 'title',
		 'order'         => 'ASC',
		 'suppress_filters'   => false
	);
	$footers = get_posts($args);
	$tg_footers_select = array();
	$tg_footers_select[''] = '';
	
	if(!empty($footers))
	{
		foreach ($footers as $footer)
		{
			$tg_footers_select[$footer->ID] = $footer->post_title;
		}
	}
	
	//Get all header posts
	$args = array(
		 'post_type'     => 'header',
		 'post_status'   => array( 'publish' ),
		 'numberposts'   => -1,
		 'orderby'       => 'title',
		 'order'         => 'ASC',
		 'suppress_filters'   => false
	);
	$headers = get_posts($args);
	$tg_headers_select = array();
	$tg_headers_select[''] = '';
	
	if(!empty($headers))
	{
		foreach ($headers as $header)
		{
			$tg_headers_select[$header->ID] = $header->post_title;
		}
	}
    
    //Get all fullscreen menus
    $args = array(
        'numberposts' => -1,
        'post_type' => array('fullmenu'),
        'post_status'   => array( 'publish' ),
        'orderby'   => 'post_title',
        'order'     => 'ASC',
        'suppress_filters'   => false
    );
    
    $dotlife_fullmenu_arr = get_posts($args);
    $dotlife_fullmenu_select = array();
    $dotlife_fullmenu_select[''] = '';
    
    foreach($dotlife_fullmenu_arr as $dotlife_fullmenu)
    {
        $dotlife_fullmenu_select[$dotlife_fullmenu->ID] = $dotlife_fullmenu->post_title;
    }
    
    $dotlife_fullmenu_effect_select = array(
        ''              => esc_html__('Scale Up', 'grandrestaurant' ),
        'scale-down'    => esc_html__('Scale Down', 'grandrestaurant' ),
        'move-down'     => esc_html__('Move Down', 'grandrestaurant' ),
        'move-up'       => esc_html__('Move Up', 'grandrestaurant' ),
        'fade'          => esc_html__('Fade In', 'grandrestaurant' ),
    );
	
	//Register Logo Tab Settings
	$controls[] = array(
        'type'     => 'image',
        'settings'  => 'tg_retina_logo',
        'label'    => esc_html__('Retina Logo', 'dotlife' ),
        'description' => esc_html__('Retina Ready Image logo. It should be 2x size of normal logo. For example 200x60px logo will displays at 100x30px', 'dotlife' ),
        'section'  => 'logo_favicon',
	    'default'  => get_template_directory_uri().'/images/logo@2x.png',
	    'priority' => 2,
    );
    
    $controls[] = array(
        'type'     => 'image',
        'settings'  => 'tg_retina_transparent_logo',
        'label'    => esc_html__('Retina Transparent Logo', 'dotlife' ),
        'description' => esc_html__('Retina Ready Image logo for menu transparent page. It should be 2x size of normal logo. For example 200x60px logo will displays at 100x30px. Recommend logo color is white or bright color', 'dotlife' ),
        'section'  => 'logo_favicon',
	    'default'  => get_template_directory_uri().'/images/logo@2x_white.png',
	    'priority' => 3,
    );
    
    $controls[] = array(
        'type'     => 'toggle',
        'settings'  => 'tg_retina_logo_for_admin',
        'label'    => esc_html__('Display Retina Logo in Theme Setting', 'dotlife' ),
        'description' => esc_html__('Check this to replace theme setting to your logo. It helps branding your site', 'dotlife' ),
        'section'  => 'logo_favicon',
        'default'  => '',
	    'priority' => 4,
    );
    //End Logo Tab Settings
    
    //Register General Tab Settings
    $controls[] = array(
        'type'     => 'title',
        'settings'  => 'tg_enable_right_click_title',
        'label'    => esc_html__('Right Click Protection Settings', 'dotlife' ),
        'section'  => 'general_image',
	    'priority' => 0,
    );
    
    $controls[] = array(
        'type'     => 'toggle',
        'settings'  => 'tg_enable_right_click',
        'label'    => esc_html__('Enable Right Click Protection', 'dotlife' ),
        'description' => esc_html__('Check this to disable right click.', 'dotlife' ),
        'section'  => 'general_image',
        'default'  => '',
	    'priority' => 1,
    );
    
    $controls[] = array(
        'type'     => 'toggle',
        'settings'  => 'tg_enable_right_click_content',
        'label'    => esc_html__('Enable Right Click Protection Content', 'dotlife' ),
        'description' => esc_html__('Check this to enable fullscreen content when visitor tried to right click', 'dotlife' ),
        'section'  => 'general_image',
        'default'  => '',
	    'priority' => 1,
    );
    
    $controls[] = array(
        'type'     => 'textarea',
        'settings'  => 'tg_enable_right_click_content_text',
        'label'    => esc_html__('Right Click Protection Content', 'dotlife' ),
        'description' => '',
        'section'  => 'general_image',
        'default'  => '',
	    'priority' => 1,
    );
    
    $controls[] = array(
        'type'     => 'color',
        'settings'  => 'tg_enable_right_click_content_bg_color',
        'label'    => esc_html__('Right Click Protection Content Background Color', 'dotlife' ),
        'section'  => 'general_image',
        'default'  => 'rgba(0, 0, 0, 0.5)',
        'output' => array(
	        array(
	            'element'  => '#right_click_content',
	            'property' => 'background',
	        ),
	    ),
	    'transport' 	 => 'postMessage',
	    'priority' => 1,
	    'js_vars'   => array(
			array(
				'element'  => '#right_click_content',
				'function' => 'css',
				'property' => 'background',
			),
		)
    );
    
    $controls[] = array(
        'type'     => 'color',
        'settings'  => 'tg_enable_right_click_content_font_color',
        'label'    => esc_html__('Right Click Protection Content Font Color', 'dotlife' ),
        'section'  => 'general_image',
        'default'  => '#ffffff',
        'output' => array(
	        array(
	            'element'  => '#right_click_content',
	            'property' => 'color',
	        ),
	    ),
	    'transport' 	 => 'postMessage',
	    'priority' => 1,
	    'js_vars'   => array(
			array(
				'element'  => '#right_click_content',
				'function' => 'css',
				'property' => 'color',
			),
		)
    );
    
    $controls[] = array(
        'type'     => 'title',
        'settings'  => 'tg_image_other_title',
        'label'    => esc_html__('Other Settings', 'dotlife' ),
        'section'  => 'general_image',
	    'priority' => 2,
    );
    
    $controls[] = array(
        'type'     => 'toggle',
        'settings'  => 'tg_enable_dragging',
        'label'    => esc_html__('Enable Image Dragging Protection', 'dotlife' ),
        'description' => esc_html__('Check this to disable dragging on all images.', 'dotlife' ),
        'section'  => 'general_image',
        'default'  => '',
	    'priority' => 3,
    );
    
    $controls[] = array(
        'type'     => 'toggle',
        'settings'  => 'tg_enable_lazy_loading',
        'label'    => esc_html__('Enable Lazy Loading Image', 'dotlife' ),
        'description' => esc_html__('Check this to enable lazy loading image option to improve site loading speed.', 'dotlife' ),
        'section'  => 'general_image',
        'default'  => 1,
	    'priority' => 3,
    );
    
    $controls[] = array(
        'type'     => 'radio-buttonset',
        'settings'  => 'tg_lightbox_color_scheme',
        'label'    => esc_html__('Select lightbox color scheme', 'dotlife' ),
        'description' => esc_html__('Select which alignment you want to use for lightbox thumbnails', 'dotlife' ),
        'section'  => 'general_lightbox',
        'default'  => 'black',
        'choices'  => $tg_lightbox_skin,
	    'priority' => 1,
    );
    
    $controls[] = array(
        'type'     => 'radio-buttonset',
        'settings'  => 'tg_lightbox_thumbnails',
        'label'    => esc_html__('Select lightbox thumbnails alignment', 'dotlife' ),
        'description' => esc_html__('Select which alignment you want to use for lightbox thumbnails', 'dotlife' ),
        'section'  => 'general_lightbox',
        'default'  => 'thumbnail',
        'choices'  => $tg_lightbox_thumbnails,
	    'priority' => 1,
    );
    
    $controls[] = array(
        'type'     => 'slider',
        'settings'  => 'tg_lightbox_timer',
        'label'    => esc_html__('Lightbox slideshow timer', 'dotlife' ),
        'description' => esc_html__('Select number of seconds for lightbox slideshow timer', 'dotlife' ),
        'section'  => 'general_lightbox',
        'default'  => 7,
        'choices' => array( 'min' => 1, 'max' => 20, 'step' => 1 ),
	    'priority' => 2,
    );
    
    $controls[] = array(
        'type'     => 'title',
        'settings'  => 'tg_body_typography_title',
        'label'    => esc_html__('Body and Content Settings', 'dotlife' ),
        'section'  => 'general_typography',
	    'priority' => 0,
    );
    
    $controls[] = array(
        'type'     => 'typography',
        'settings'  => 'tg_body_typography',
        'label'    => esc_html__('Main Content Typography', 'dotlife' ),
        'section'  => 'general_typography',
        'default'  => array(
			'font-family'    => 'Jost',
			'variant'        => 'regular',
			'font-size'      => '16px',
			'line-height'    => '1.7',
			'letter-spacing' => '0',
			'text-transform' => 'none',
		),
        'output' => array(
	        array(
	            'element'  => 'body, input[type=text], input[type=password], input[type=email], input[type=url], input[type=date], input[type=tel], input.wpcf7-text, .woocommerce table.cart td.actions .coupon .input-text, .woocommerce-page table.cart td.actions .coupon .input-text, .woocommerce #content table.cart td.actions .coupon .input-text, .woocommerce-page #content table.cart td.actions .coupon .input-text, select, textarea, .ui-widget input, .ui-widget select, .ui-widget textarea, .ui-widget button, .ui-widget label, .ui-widget-header, .zm_alr_ul_container, body #learn-press-course-tabs .course-tab-panels .course-tab-panel .course-description p, body #popup-course #popup-content #learn-press-content-item .content-item-wrap .content-item-summary .content-item-description p',
	        ),
	    ),
	    'priority' => 1,
    );
        
    $controls[] = array(
        'type'     => 'title',
        'settings'  => 'tg_header_typography_title',
        'label'    => esc_html__('Header Settings', 'dotlife' ),
        'section'  => 'general_typography',
	    'priority' => 1,
    );
    
    $controls[] = array(
        'type'     => 'typography',
        'settings'  => 'tg_header_typography',
        'label'    => esc_html__('Header Typography', 'dotlife' ),
        'section'  => 'general_typography',
        'default'  => array(
			'font-family'    => 'Jost',
			'variant'        => '700',
			'line-height'    => '1.7',
			'letter-spacing' => '0',
			'text-transform' => 'none',
		),
        'output' => array(
	        array(
	            'element'  => 'h1, h2, h3, h4, h5, h6, h7, .post_quote_title, strong[itemprop="author"], #page_content_wrapper .posts.blog li a, .page_content_wrapper .posts.blog li a, #filter_selected, blockquote, .sidebar_widget li.widget_products, #footer ul.sidebar_widget li ul.posts.blog li a, .woocommerce-page table.cart th, table.shop_table thead tr th, .testimonial_slider_content, .pagination, .pagination_detail, .appointment-form-shortcode .mpa-booking-step.mpa-booking-step-period .mpa-shortcode-title, .appointment-form-shortcode .mpa-booking-step.mpa-booking-step-cart .mpa-shortcode-title, .appointment-form-shortcode .mpa-booking-step.mpa-booking-step-checkout .mpa-shortcode-title, .appointment-form-shortcode .mpa-booking-step.mpa-booking-step-payment .mpa-shortcode-title, #respond.comment-respond .comment-reply-title, .course-curriculum .section-left .section-title, .lp-checkout-form__before .lp-checkout-block h4, .lp-checkout-form__after .lp-checkout-block h4',
	        ),
	    ),
	    'priority' => 2
    );
    
    $controls[] = array(
        'type'     => 'slider',
        'settings'  => 'tg_h1_size',
        'label'    => esc_html__('H1 Font Size', 'dotlife' ),
        'section'  => 'general_typography',
        'default'  => 34,
        'choices' => array( 'min' => 13, 'max' => 60, 'step' => 1 ),
        'output' => array(
	        array(
	            'element'  => 'h1',
	            'property' => 'font-size',
	            'units'    => 'px',
	        ),
	    ),
	    'priority' => 3,
	    'js_vars'   => array(
			array(
				'element'  => 'h1',
				'function' => 'css',
				'property' => 'font-size',
				'units'    => 'px',
			),
		)
    );
    
    $controls[] = array(
        'type'     => 'slider',
        'settings'  => 'tg_h2_size',
        'label'    => esc_html__('H2 Font Size', 'dotlife' ),
        'section'  => 'general_typography',
        'default'  => 30,
        'choices' => array( 'min' => 13, 'max' => 60, 'step' => 1 ),
        'output' => array(
	        array(
	            'element'  => 'h2',
	            'property' => 'font-size',
	            'units'    => 'px',
	        ),
	    ),
	    'priority' => 4,
	    'js_vars'   => array(
			array(
				'element'  => 'h2',
				'function' => 'css',
				'property' => 'font-size',
				'units'    => 'px',
			),
		)
    );
    
    $controls[] = array(
        'type'     => 'slider',
        'settings'  => 'tg_h3_size',
        'label'    => esc_html__('H3 Font Size', 'dotlife' ),
        'section'  => 'general_typography',
        'default'  => 26,
        'choices' => array( 'min' => 13, 'max' => 60, 'step' => 1 ),
        'output' => array(
	        array(
	            'element'  => 'h3',
	            'property' => 'font-size',
	            'units'    => 'px',
	        ),
	    ),
	    'priority' => 5,
	    'js_vars'   => array(
			array(
				'element'  => 'h3',
				'function' => 'css',
				'property' => 'font-size',
				'units'    => 'px',
			),
		)
    );
    
    $controls[] = array(
        'type'     => 'slider',
        'settings'  => 'tg_h4_size',
        'label'    => esc_html__('H4 Font Size', 'dotlife' ),
        'section'  => 'general_typography',
        'default'  => 24,
        'choices' => array( 'min' => 13, 'max' => 60, 'step' => 1 ),
        'output' => array(
	        array(
	            'element'  => 'h4',
	            'property' => 'font-size',
	            'units'    => 'px',
	        ),
	    ),
	    'priority' => 6,
	    'js_vars'   => array(
			array(
				'element'  => 'h4',
				'function' => 'css',
				'property' => 'font-size',
				'units'    => 'px',
			),
		)
    );
    
    $controls[] = array(
        'type'     => 'slider',
        'settings'  => 'tg_h5_size',
        'label'    => esc_html__('H5 Font Size', 'dotlife' ),
        'section'  => 'general_typography',
        'default'  => 22,
        'choices' => array( 'min' => 13, 'max' => 60, 'step' => 1 ),
        'output' => array(
	        array(
	            'element'  => 'h5',
	            'property' => 'font-size',
	            'units'    => 'px',
	        ),
	    ),
	    'priority' => 7,
	    'js_vars'   => array(
			array(
				'element'  => 'h5',
				'function' => 'css',
				'property' => 'font-size',
				'units'    => 'px',
			),
		)
    );
    
    $controls[] = array(
        'type'     => 'slider',
        'settings'  => 'tg_h6_size',
        'label'    => esc_html__('H6 Font Size', 'dotlife' ),
        'section'  => 'general_typography',
        'default'  => 20,
        'choices' => array( 'min' => 13, 'max' => 60, 'step' => 1 ),
        'output' => array(
	        array(
	            'element'  => 'h6',
	            'property' => 'font-size',
	            'units'    => 'px',
	        ),
	    ),
	    'priority' => 8,
	    'js_vars'   => array(
			array(
				'element'  => 'h6',
				'function' => 'css',
				'property' => 'font-size',
				'units'    => 'px',
			),
		)
    );
    
    $controls[] = array(
        'type'     => 'title',
        'settings'  => 'tg_content_color_title',
        'label'    => esc_html__('Main Content Color Settings', 'dotlife' ),
        'section'  => 'general_color',
	    'priority' => 8,
    );
    
    $controls[] = array(
        'type'     => 'color',
        'settings'  => 'tg_content_bg_color',
        'label'    => esc_html__('Main Content Background Color', 'dotlife' ),
        'section'  => 'general_color',
        'default'  => '#f9f9f9',
        'output' => array(
	        array(
	            'element'  => 'body, #wrapper, #page_content_wrapper.fixed, #gallery_lightbox h2, .slider_wrapper .gallery_image_caption h2, #body_loading_screen, h3#reply-title span, .overlay_gallery_wrapper, .pagination a, .pagination span, #captcha-wrap .text-box input, .flex-direction-nav a, .blog_promo_title h6, #supersized li, #horizontal_gallery_wrapper .image_caption, body.tg_password_protected #page_content_wrapper .inner .inner_wrapper .sidebar_content, body .ui-dialog[aria-describedby="ajax-login-register-login-dialog"], body .ui-dialog[aria-describedby="ajax-login-register-dialog"]',
	            'property' => 'background-color',
	        ),
	    ),
	    'transport' 	 => 'postMessage',
	    'priority' => 9,
	    'js_vars'   => array(
			array(
				'element'  => 'body, #wrapper, #page_content_wrapper.fixed, #gallery_lightbox h2, .slider_wrapper .gallery_image_caption h2, #body_loading_screen, h3#reply-title span, .overlay_gallery_wrapper, .pagination a, .pagination span, #captcha-wrap .text-box input, .flex-direction-nav a, .blog_promo_title h6, #supersized li, #horizontal_gallery_wrapper .image_caption, body.tg_password_protected #page_content_wrapper .inner .inner_wrapper .sidebar_content, body .ui-dialog[aria-describedby="ajax-login-register-login-dialog"], body .ui-dialog[aria-describedby="ajax-login-register-dialog"]',
				'function' => 'css',
				'property' => 'background-color',
			),
		)
    );
    
    $controls[] = array(
        'type'     => 'color',
        'settings'  => 'tg_second_content_bg_color',
        'label'    => esc_html__('Secondary Content Background Color', 'dotlife' ),
        'section'  => 'general_color',
        'default'  => '#f0f0f0',
        'output' => array(
            array(
                'element'  => '.tutor-single-course-sidebar .tutor-sidebar-card .tutor-card-body, .tutor-accordion-item-header.is-active, .tutor-course-content-list-item:hover, .tutor-sidebar-card',
                'property' => 'background-color',
            ),
        ),
        'transport' 	 => 'postMessage',
        'priority' => 9,
        'js_vars'   => array(
            array(
                'element'  => '.tutor-single-course-sidebar .tutor-sidebar-card .tutor-card-body, .tutor-accordion-item-header.is-active, .tutor-sidebar-card',
                'function' => 'css',
                'property' => 'background-color',
            ),
        )
    );
    
    $controls[] = array(
        'type'     => 'color',
        'settings'  => 'tg_font_color',
        'label'    => esc_html__('Page Content Font Color', 'dotlife' ),
        'section'  => 'general_color',
        'default'  => '#222222',
        'output' => array(
	        array(
	            'element'  => 'body, .pagination a, #gallery_lightbox h2, .slider_wrapper .gallery_image_caption h2, .post_info a, #page_content_wrapper.split #copyright, .page_content_wrapper.split #copyright, .ui-state-default a, .ui-state-default a:link, .ui-state-default a:visited, .readmore, .woocommerce-MyAccount-navigation ul a, .woocommerce #page_content_wrapper div.product p.price, .woocommerce-page #page_content_wrapper div.product p.price, body #learn-press-course-tabs .course-tab-panels .course-tab-panel .course-description p, body #learn-press-course-curriculum.course-curriculum ul.curriculum-sections .section-content .course-item .section-item-link::before, body .course-curriculum ul.curriculum-sections .section-content .course-item.item-locked .course-item-meta .course-item-status:before, body #learn-press-course-curriculum.course-curriculum ul.curriculum-sections .section-content .course-item.item-locked .course-item-status::before, body #learn-press-course-curriculum.course-curriculum ul.curriculum-sections .section-content .course-item .item-icon, body #learn-press-course-curriculum.course-curriculum ul.curriculum-sections .section-content .course-item .item-name, body #learn-press-course .lp-course-author .course-author__pull-right .author-description, body .course-extra-box__content li, body .course-extra-box__content li::before, body .course-tab-panel-faqs .course-faqs-box .course-faqs-box__content .course-faqs-box__content-inner, body #checkout-order .lp-checkout-order__inner .order-total .col-number, body #learn-press-profile .dashboard-general-statistic__row .statistic-box .statistic-box__text, body .learn-press-filters > li span, body .learn-press-filters > li span + span, body .learn-press-filters > li span + span::before, body .learn-press-filters > li span + span::after, body .lp-list-table tbody tr td, body .lp-list-table tbody tr th, body .lp-list-table tfoot tr td,  body .lp-list-table tfoot tr th, #popup-course #popup-content #learn-press-content-item .content-item-wrap .content-item-summary .content-item-description p, .lp-terms-and-conditions, #checkout-order .col-number, .tutor-accordion-item-header, .tutor-course-content-list-item-icon, .tutor-course-content-list-item-title a, .tutor-accordion-item-header.is-active, .tutor-accordion-item-header::after, .tutor-color-muted',
	            'property' => 'color',
	        ),
	        array(
	            'element'  => '::selection, .verline',
	            'property' => 'background-color',
	        ),
	        array(
	            'element'  => '::-webkit-input-placeholder',
	            'property' => 'color',
	        ),
	        array(
	            'element'  => '::-moz-placeholder',
	            'property' => 'color',
	        ),
	        array(
	            'element'  => ':-ms-input-placeholder',
	            'property' => 'color',
	        ),
	    ),
	    'transport' 	 => 'postMessage',
	    'priority' => 11,
	    'js_vars'   => array(
			array(
				'element'  => 'body, .pagination a, #gallery_lightbox h2, .slider_wrapper .gallery_image_caption h2, .post_info a, #page_content_wrapper.split #copyright, .page_content_wrapper.split #copyright, .ui-state-default a, .ui-state-default a:link, .ui-state-default a:visited, .readmore, .woocommerce-MyAccount-navigation ul a, body .course-curriculum ul.curriculum-sections .section-content .course-item.item-locked .course-item-meta .course-item-status:before, body #learn-press-course-curriculum.course-curriculum ul.curriculum-sections .section-content .course-item.item-locked, body #learn-press-course-curriculum.course-curriculum ul.curriculum-sections .section-content .course-item .item-icon, body #learn-press-course-curriculum.course-curriculum ul.curriculum-sections .section-content .course-item .item-name .course-item-status::before, body #learn-press-course .lp-course-author .course-author__pull-right .author-description, body .course-extra-box__content li, body .course-extra-box__content li::before, body .course-tab-panel-faqs .course-faqs-box .course-faqs-box__content .course-faqs-box__content-inner, body #checkout-order .lp-checkout-order__inner .order-total .col-number, body #learn-press-profile .dashboard-general-statistic__row .statistic-box .statistic-box__text, body .learn-press-filters > li span, body .learn-press-filters > li span + span, body .learn-press-filters > li span + span::before, body .learn-press-filters > li span + span::after, body .lp-list-table tbody tr td, body .lp-list-table tbody tr th, body .lp-list-table tfoot tr td,  body .lp-list-table tfoot tr th, body #popup-course #popup-content #learn-press-content-item .content-item-wrap .content-item-summary .content-item-description p, .lp-terms-and-conditions, #checkout-order .col-number',
				'function' => 'css',
				'property' => 'color',
			),
			array(
				'element'  => '::-webkit-input-placeholder',
				'function' => 'css',
				'property' => 'background-color',
			),
			array(
				'element'  => '::-moz-placeholder',
				'function' => 'css',
				'property' => 'background-color',
			),
			array(
				'element'  => ':-ms-input-placeholder',
				'function' => 'css',
				'property' => 'background-color',
			),
		)
    );
    
    $controls[] = array(
        'type'     => 'color',
        'settings'  => 'tg_link_color',
        'label'    => esc_html__('Page Content Link Color', 'dotlife' ),
        'section'  => 'general_color',
        'default'  => '#222222',
        'output' => array(
	        array(
	            'element'  => 'a, .gallery_proof_filter ul li a, body #learn-press-course-curriculum.course-curriculum ul.curriculum-sections .section-item-link, body #checkout-order .lp-checkout-order__inner .course-name a, body #popup-course #popup-header .popup-header__inner .course-title a, body #learn-press-course .lp-course-author .course-author__pull-right .author-title a, body .course-extra-box__title::after, body .course-tab-panel-faqs .course-faqs-box:hover .course-faqs-box__title, body .course-tab-panel-faqs .course-faqs-box__title::after, body input[name="course-faqs-box-ratio"]:checked + .course-faqs-box .course-faqs-box__title, body .lp-archive-courses .learn-press-courses .course .course-item .course-content .course-permalink .course-title, body #popup-course .back-course, .lp-terms-and-conditions a, #popup-footer .course-item-nav .prev a, #popup-footer .course-item-nav .next a, .tutor-btn-ghost',
	            'property' => 'color',
	        ),
	         array(
	            'element'  => '.flex-control-paging li a.flex-active, .post_attribute a:before, #menu_wrapper .nav ul li a:before, #menu_wrapper div .nav li > a:before, .post_attribute a:before, ::selection',
	            'property' => 'background-color',
	        ),
	         array(
	            'element'  => '.flex-control-paging li a.flex-active, .image_boxed_wrapper:hover, .gallery_proof_filter ul li a.active, .gallery_proof_filter ul li a:hover',
	            'property' => 'border-color',
	        ),
	    ),
	    'transport' 	 => 'postMessage',
	    'priority' => 12,
	    'js_vars'   => array(
			array(
	            'element'  => 'a, .gallery_proof_filter ul li a, body #learn-press-course-curriculum.course-curriculum ul.curriculum-sections .section-item-link, body #checkout-order .lp-checkout-order__inner .course-name a, body #popup-course #popup-header .popup-header__inner .course-title a, body #learn-press-course .lp-course-author .course-author__pull-right .author-title a, body .course-extra-box__title::after, body .course-tab-panel-faqs .course-faqs-box:hover .course-faqs-box__title, body .course-tab-panel-faqs .course-faqs-box__title::after, body input[name="course-faqs-box-ratio"]:checked + .course-faqs-box .course-faqs-box__title, body .lp-archive-courses .learn-press-courses .course .course-item .course-content .course-permalink .course-title, body #popup-course .back-course, .lp-terms-and-conditions a',
	            'property' => 'color',
	        ),
	         array(
	            'element'  => '.flex-control-paging li a.flex-active, .post_attribute a:before, #menu_wrapper .nav ul li a:before, #menu_wrapper div .nav li > a:before, .post_attribute a:before, ::selection',
	            'property' => 'background-color',
	        ),
	         array(
	            'element'  => '.flex-control-paging li a.flex-active, .image_boxed_wrapper:hover, .gallery_proof_filter ul li a.active, .gallery_proof_filter ul li a:hover',
	            'property' => 'border-color',
	        ),
		)
    );
    
    $controls[] = array(
        'type'     => 'color',
        'settings'  => 'tg_hover_link_color',
        'label'    => esc_html__('Page Content Hover Link Color', 'dotlife' ),
        'section'  => 'general_color',
        'default'  => '#0067DA',
        'output' => array(
	        array(
	            'element'  => 'a:hover, a:active, .post_info_comment a i, body #learn-press-course-curriculum.course-curriculum ul.curriculum-sections .section-content .course-item .section-item-link:hover .item-name, body #checkout-order .lp-checkout-order__inner .course-name a:hover, body #popup-course #popup-header .popup-header__inner .course-title a:hover, body .lp-archive-courses .learn-press-courses .course .course-item .course-content .course-permalink .course-title:hover, body #learn-press-profile #profile-nav .lp-profile-nav-tabs > li ul li a:hover, .lp-terms-and-conditions a:hover, #popup-footer .course-item-nav .prev a:hover, #popup-footer .course-item-nav .next a:hover, .tutor-btn-ghost:hover',
	            'property' => 'color',
	        ),
	        array(
	            'element'  => 'input[type=button]:hover, input[type=submit]:hover, a.button:hover, .button:hover, .button.submit, a.button.white:hover, .button.white:hover, a.button.white:active, .button.white:active, #menu_wrapper .nav ul li a:hover:before, #menu_wrapper div .nav li > a:hover:before, .post_attribute a:hover:before',
	            'property' => 'background-color',
	        ),
	        array(
	            'element'  => 'input[type=button]:hover, input[type=submit]:hover, a.button:hover, .button:hover, .button.submit, a.button.white:hover, .button.white:hover, a.button.white:active, .button.white:active',
	            'property' => 'border-color',
	        ),
	    ),
	    'js_vars'   => array(
			array(
	            'element'  => 'a:hover, a:active, .post_info_comment a i, body #learn-press-course-curriculum.course-curriculum ul.curriculum-sections .section-content .course-item .section-item-link:hover .item-name, body #checkout-order .lp-checkout-order__inner .course-name a:hover, body #popup-course #popup-header .popup-header__inner .course-title a:hover, body .lp-archive-courses .learn-press-courses .course .course-item .course-content .course-permalink .course-title:hover, body #learn-press-profile #profile-nav .lp-profile-nav-tabs > li ul li a:hover, .lp-terms-and-conditions a:hover',
	            'property' => 'color',
	        ),
	        array(
	            'element'  => 'input[type=button]:hover, input[type=submit]:hover, a.button:hover, .button:hover, .button.submit, a.button.white:hover, .button.white:hover, a.button.white:active, .button.white:active',
	            'property' => 'background',
	        ),
	        array(
	            'element'  => 'input[type=button]:hover, input[type=submit]:hover, a.button:hover, .button:hover, .button.submit, a.button.white:hover, .button.white:hover, a.button.white:active, .button.white:active',
	            'property' => 'border-color',
	        ),
		),
	    'transport' 	 => 'postMessage',
	    'priority' => 13,
    );
    
    $controls[] = array(
        'type'     => 'color',
        'settings'  => 'tg_h1_font_color',
        'label'    => esc_html__('H1, H2, H3, H4, H5, H6 Font Color', 'dotlife' ),
        'section'  => 'general_color',
        'default'  => '#222222',
        'output' => array(
	        array(
	            'element'  => 'h1, h2, h3, h4, h5, h6, h7, pre, code, tt, blockquote, .post_header h5 a, .post_header h3 a, .post_header.grid h6 a, .post_header.fullwidth h4 a, .post_header h5 a, blockquote, .site_loading_logo_item i, .ppb_subtitle, .woocommerce .woocommerce-ordering select, .woocommerce #page_content_wrapper a.button, .woocommerce.columns-4 ul.products li.product a.add_to_cart_button, .woocommerce.columns-4 ul.products li.product a.add_to_cart_button:hover, .ui-accordion .ui-accordion-header a, .tabs .ui-state-active a, body .post_header h5 a, body .post_header h6 a, .flex-direction-nav a:before, .social_share_button_wrapper .social_post_view .view_number, .social_share_button_wrapper .social_post_share_count .share_number, .portfolio_post_previous a, .portfolio_post_next a, #filter_selected, #autocomplete li strong, .themelink, body .ui-dialog[aria-describedby="ajax-login-register-login-dialog"] .ui-dialog-titlebar .ui-dialog-title, body .ui-dialog[aria-describedby="ajax-login-register-dialog"] .ui-dialog-titlebar .ui-dialog-title, body #learn-press-course-curriculum.course-curriculum ul.curriculum-sections .section-header .section-left .section-title, body #popup-course #sidebar-toggle::before, .lp-checkout-form__before .lp-checkout-block h4, .lp-checkout-form__after .lp-checkout-block h4',
	            'property' => 'color',
	        ),
	        array(
	            'element'  => 'body.page.page-template-gallery-archive-split-screen-php #fp-nav li .active span, body.tax-gallerycat #fp-nav li .active span, body.page.page-template-portfolio-fullscreen-split-screen-php #fp-nav li .active span, body.page.tax-portfolioset #fp-nav li .active span, body.page.page-template-gallery-archive-split-screen-php #fp-nav ul li a span, body.tax-gallerycat #fp-nav ul li a span, body.page.page-template-portfolio-fullscreen-split-screen-php #fp-nav ul li a span, body.page.tax-portfolioset #fp-nav ul li a span',
	            'property' => 'background-color',
	        ),
	    ),
	    'transport' 	 => 'postMessage',
	    'priority' => 14,
	    'js_vars'   => array(
			array(
				'element'  => 'h1, h2, h3, h4, h5, h6, h7, pre, code, tt, blockquote, .post_header h5 a, .post_header h3 a, .post_header.grid h6 a, .post_header.fullwidth h4 a, .post_header h5 a, blockquote, .site_loading_logo_item i, .ppb_subtitle, .woocommerce .woocommerce-ordering select, .woocommerce #page_content_wrapper a.button, .woocommerce.columns-4 ul.products li.product a.add_to_cart_button, .woocommerce.columns-4 ul.products li.product a.add_to_cart_button:hover, .ui-accordion .ui-accordion-header a, .tabs .ui-state-active a, body .post_header h5 a, body .post_header h6 a, .flex-direction-nav a:before, .social_share_button_wrapper .social_post_view .view_number, .social_share_button_wrapper .social_post_share_count .share_number, .portfolio_post_previous a, .portfolio_post_next a, #filter_selected, #autocomplete li strong, .themelink, body .ui-dialog[aria-describedby="ajax-login-register-login-dialog"] .ui-dialog-titlebar .ui-dialog-title, body .ui-dialog[aria-describedby="ajax-login-register-dialog"] .ui-dialog-titlebar .ui-dialog-title, body #popup-course #sidebar-toggle::before, .lp-checkout-form__before .lp-checkout-block h4, .lp-checkout-form__after .lp-checkout-block h4',
				'function' => 'css',
				'property' => 'color',
			),
			array(
				'element'  => 'body.page.page-template-gallery-archive-split-screen-php #fp-nav li .active span, body.tax-gallerycat #fp-nav li .active span, body.page.page-template-portfolio-fullscreen-split-screen-php #fp-nav li .active span, body.page.tax-portfolioset #fp-nav li .active span, body.page.page-template-gallery-archive-split-screen-php #fp-nav ul li a span, body.tax-gallerycat #fp-nav ul li a span, body.page.page-template-portfolio-fullscreen-split-screen-php #fp-nav ul li a span, body.page.tax-portfolioset #fp-nav ul li a span',
				'function' => 'css',
				'property' => 'background-color',
			),
		)
    );
    
    $controls[] = array(
        'type'     => 'color',
        'settings'  => 'tg_hr_color',
        'label'    => esc_html__('Horizontal Line Color', 'dotlife' ),
        'section'  => 'general_color',
        'default'  => '#D8D8D8',
        'output' => array(
	        array(
	            'element'  => '#social_share_wrapper, hr, #social_share_wrapper, .post.type-post, .comment .right, .widget_tag_cloud div a, .meta-tags a, .tag_cloud a, #footer, #post_more_wrapper, #page_content_wrapper .inner .sidebar_content, #page_content_wrapper .inner .sidebar_content.left_sidebar, .ajax_close, .ajax_next, .ajax_prev, .portfolio_next, .portfolio_prev, .portfolio_next_prev_wrapper.video .portfolio_prev, .portfolio_next_prev_wrapper.video .portfolio_next, .separated, .blog_next_prev_wrapper, #post_more_wrapper h5, #ajax_portfolio_wrapper.hidding, #ajax_portfolio_wrapper.visible, .tabs.vertical .ui-tabs-panel, .ui-tabs.vertical.right .ui-tabs-nav li, .woocommerce div.product .woocommerce-tabs ul.tabs li, .woocommerce #content div.product .woocommerce-tabs ul.tabs li, .woocommerce-page div.product .woocommerce-tabs ul.tabs li, .woocommerce-page #content div.product .woocommerce-tabs ul.tabs li, .woocommerce div.product .woocommerce-tabs .panel, .woocommerce-page div.product .woocommerce-tabs .panel, .woocommerce #content div.product .woocommerce-tabs .panel, .woocommerce-page #content div.product .woocommerce-tabs .panel, .woocommerce table.shop_table, .woocommerce-page table.shop_table, .woocommerce .cart-collaterals .cart_totals, .woocommerce-page .cart-collaterals .cart_totals, .woocommerce .cart-collaterals .shipping_calculator, .woocommerce-page .cart-collaterals .shipping_calculator, .woocommerce .cart-collaterals .cart_totals tr td, .woocommerce .cart-collaterals .cart_totals tr th, .woocommerce-page .cart-collaterals .cart_totals tr td, .woocommerce-page .cart-collaterals .cart_totals tr th, table tr th, table tr td, .woocommerce #payment, .woocommerce-page #payment, .woocommerce #payment ul.payment_methods li, .woocommerce-page #payment ul.payment_methods li, .woocommerce #payment div.form-row, .woocommerce-page #payment div.form-row, .ui-tabs li:first-child, .ui-tabs .ui-tabs-nav li, .ui-tabs.vertical .ui-tabs-nav li, .ui-tabs.vertical.right .ui-tabs-nav li.ui-state-active, .ui-tabs.vertical .ui-tabs-nav li:last-child, #page_content_wrapper .inner .sidebar_wrapper ul.sidebar_widget li.widget_nav_menu ul.menu li.current-menu-item a, .page_content_wrapper .inner .sidebar_wrapper ul.sidebar_widget li.widget_nav_menu ul.menu li.current-menu-item a, .ui-accordion .ui-accordion-header, .ui-accordion .ui-accordion-content, #page_content_wrapper .sidebar .content .sidebar_widget li h2.widgettitle:before, h2.widgettitle:before, #autocomplete, .ppb_blog_minimal .one_third_bg, .tabs .ui-tabs-panel, .ui-tabs .ui-tabs-nav li, .ui-tabs li:first-child, .ui-tabs.vertical .ui-tabs-nav li:last-child, .woocommerce .woocommerce-ordering select, .woocommerce div.product .woocommerce-tabs ul.tabs li.active, .woocommerce-page div.product .woocommerce-tabs ul.tabs li.active, .woocommerce #content div.product .woocommerce-tabs ul.tabs li.active, .woocommerce-page #content div.product .woocommerce-tabs ul.tabs li.active, .woocommerce-page table.cart th, table.shop_table thead tr th, hr.title_break, .overlay_gallery_border, #page_content_wrapper.split #copyright, .page_content_wrapper.split #copyright, .post.type-post, .events.type-events, h5.event_title, .post_header h5.event_title, .client_archive_wrapper, #page_content_wrapper .sidebar .content .sidebar_widget li.widget, .page_content_wrapper .sidebar .content .sidebar_widget li.widget, hr.title_break.bold, blockquote, .social_share_button_wrapper, .social_share_button_wrapper, body:not(.single) .post_wrapper, .themeborder, #about_the_author, .related.products, .woocommerce div.product div.summary .product_meta, #single_course_meta ul.single_course_meta_data li.single_course_meta_data_separator, body .course-curriculum ul.curriculum-sections .section-header, body.single-post #page_content_wrapper.blog_wrapper .page_title_content, .tutor-accordion-item, .tutor-accordion-item-body-content',
	            'property' => 'border-color',
	        ),
	    ),
	    'transport' 	 => 'postMessage',
	    'priority' => 15,
	    'js_vars'   => array(
			array(
				'element'  => '#social_share_wrapper, hr, #social_share_wrapper, .post.type-post, .comment .right, .widget_tag_cloud div a, .meta-tags a, .tag_cloud a, #footer, #post_more_wrapper, #page_content_wrapper .inner .sidebar_content, #page_content_wrapper .inner .sidebar_content.left_sidebar, .ajax_close, .ajax_next, .ajax_prev, .portfolio_next, .portfolio_prev, .portfolio_next_prev_wrapper.video .portfolio_prev, .portfolio_next_prev_wrapper.video .portfolio_next, .separated, .blog_next_prev_wrapper, #post_more_wrapper h5, #ajax_portfolio_wrapper.hidding, #ajax_portfolio_wrapper.visible, .tabs.vertical .ui-tabs-panel, .ui-tabs.vertical.right .ui-tabs-nav li, .woocommerce div.product .woocommerce-tabs ul.tabs li, .woocommerce #content div.product .woocommerce-tabs ul.tabs li, .woocommerce-page div.product .woocommerce-tabs ul.tabs li, .woocommerce-page #content div.product .woocommerce-tabs ul.tabs li, .woocommerce div.product .woocommerce-tabs .panel, .woocommerce-page div.product .woocommerce-tabs .panel, .woocommerce #content div.product .woocommerce-tabs .panel, .woocommerce-page #content div.product .woocommerce-tabs .panel, .woocommerce table.shop_table, .woocommerce-page table.shop_table, .woocommerce .cart-collaterals .cart_totals, .woocommerce-page .cart-collaterals .cart_totals, .woocommerce .cart-collaterals .shipping_calculator, .woocommerce-page .cart-collaterals .shipping_calculator, .woocommerce .cart-collaterals .cart_totals tr td, .woocommerce .cart-collaterals .cart_totals tr th, .woocommerce-page .cart-collaterals .cart_totals tr td, .woocommerce-page .cart-collaterals .cart_totals tr th, table tr th, table tr td, .woocommerce #payment, .woocommerce-page #payment, .woocommerce #payment ul.payment_methods li, .woocommerce-page #payment ul.payment_methods li, .woocommerce #payment div.form-row, .woocommerce-page #payment div.form-row, .ui-tabs li:first-child, .ui-tabs .ui-tabs-nav li, .ui-tabs.vertical .ui-tabs-nav li, .ui-tabs.vertical.right .ui-tabs-nav li.ui-state-active, .ui-tabs.vertical .ui-tabs-nav li:last-child, #page_content_wrapper .inner .sidebar_wrapper ul.sidebar_widget li.widget_nav_menu ul.menu li.current-menu-item a, .page_content_wrapper .inner .sidebar_wrapper ul.sidebar_widget li.widget_nav_menu ul.menu li.current-menu-item a, .ui-accordion .ui-accordion-header, .ui-accordion .ui-accordion-content, #page_content_wrapper .sidebar .content .sidebar_widget li h2.widgettitle:before, h2.widgettitle:before, #autocomplete, .ppb_blog_minimal .one_third_bg, .tabs .ui-tabs-panel, .ui-tabs .ui-tabs-nav li, .ui-tabs li:first-child, .ui-tabs.vertical .ui-tabs-nav li:last-child, .woocommerce .woocommerce-ordering select, .woocommerce div.product .woocommerce-tabs ul.tabs li.active, .woocommerce-page div.product .woocommerce-tabs ul.tabs li.active, .woocommerce #content div.product .woocommerce-tabs ul.tabs li.active, .woocommerce-page #content div.product .woocommerce-tabs ul.tabs li.active, .woocommerce-page table.cart th, table.shop_table thead tr th, hr.title_break, .overlay_gallery_border, #page_content_wrapper.split #copyright, .page_content_wrapper.split #copyright, .post.type-post, .events.type-events, h5.event_title, .post_header h5.event_title, .client_archive_wrapper, #page_content_wrapper .sidebar .content .sidebar_widget li.widget, .page_content_wrapper .sidebar .content .sidebar_widget li.widget, hr.title_break.bold, blockquote, .social_share_button_wrapper, .social_share_button_wrapper, body:not(.single) .post_wrapper, .themeborder, #about_the_author, .related.products, .woocommerce div.product div.summary .product_meta, #single_course_meta ul.single_course_meta_data li.single_course_meta_data_separator, body .course-curriculum ul.curriculum-sections .section-header, body.single-post #page_content_wrapper.blog_wrapper .page_title_content',
				'function' => 'css',
				'property' => 'border-color',
			),
		)
    );
    
    $controls[] = array(
        'type'     => 'title',
        'settings'  => 'tg_appointment_color_title',
        'label'    => esc_html__('Appointment Color Settings', 'dotlife' ),
        'section'  => 'general_color',
        'priority' => 16,
    );
    
    $controls[] = array(
        'type'     => 'color',
        'settings'  => 'tg_appointment_font_color',
        'label'    => esc_html__('Appointment Font Color', 'dotlife' ),
        'section'  => 'general_color',
        'default'  => '#000000',
        'output' => array(
            array(
                'element'  => '.appointment-form-shortcode label, .appointment-form-widget>.widget-body label',
                'property' => 'color',
            ),
        ),
        'transport' 	 => 'postMessage',
        'priority' => 17,
        'js_vars'   => array(
            array(
                'element'  => '.appointment-form-shortcode label, .appointment-form-widget>.widget-body label',
                'function' => 'css',
                'property' => 'color',
            ),
        )
    );
    
    $controls[] = array(
        'type'     => 'color',
        'settings'  => 'tg_appointment_calendar_font_color',
        'label'    => esc_html__('Appointment Calendar Font Color', 'dotlife' ),
        'section'  => 'general_color',
        'default'  => '#000000',
        'output' => array(
            array(
                'element'  => '.flatpickr-current-month, .appointment-form-shortcode .mpa-booking-step.mpa-booking-step-cart .mpa-shortcode-title, .appointment-form-shortcode .mpa-booking-step.mpa-booking-step-checkout .mpa-shortcode-title, .appointment-form-shortcode .mpa-booking-step.mpa-booking-step-period .mpa-shortcode-title, .appointment-form-shortcode .mpa-booking-step.mpa-booking-step-service-form .mpa-shortcode-title, .appointment-form-shortcode .mpa-booking-step.mpa-booking-step-payment .mpa-shortcode-title, .appointment-form-widget > .widget-body .mpa-booking-step.mpa-booking-step-cart .mpa-shortcode-title, .appointment-form-widget > .widget-body .mpa-booking-step.mpa-booking-step-checkout .mpa-shortcode-title, .appointment-form-widget > .widget-body .mpa-booking-step.mpa-booking-step-period .mpa-shortcode-title, .appointment-form-widget > .widget-body .mpa-booking-step.mpa-booking-step-service-form .mpa-shortcode-title, .appointment-form-widget > .widget-body .mpa-booking-step.mpa-booking-step-payment .mpa-shortcode-title, .appointment-form-shortcode .mpa-booking-step.mpa-booking-step-period .flatpickr-calendar .flatpickr-weekdays .flatpickr-weekday, .appointment-form-widget > .widget-body .mpa-booking-step.mpa-booking-step-period .flatpickr-calendar .flatpickr-weekdays .flatpickr-weekday, .appointment-form-shortcode .mpa-booking-step.mpa-booking-step-period .flatpickr-calendar .flatpickr-day, .appointment-form-widget > .widget-body .mpa-booking-step.mpa-booking-step-period .flatpickr-calendar .flatpickr-day',
                'property' => 'color',
            ),
            array(
                'element'  => '.appointment-form-shortcode .mpa-booking-step.mpa-booking-step-period .flatpickr-calendar .flatpickr-months .flatpickr-next-month:hover svg, .appointment-form-shortcode .mpa-booking-step.mpa-booking-step-period .flatpickr-calendar .flatpickr-months .flatpickr-prev-month:hover svg, .appointment-form-widget > .widget-body .mpa-booking-step.mpa-booking-step-period .flatpickr-calendar .flatpickr-months .flatpickr-next-month:hover svg, .appointment-form-widget > .widget-body .mpa-booking-step.mpa-booking-step-period .flatpickr-calendar .flatpickr-months .flatpickr-prev-month:hover svg',
                'property' => 'fill',
            ),
        ),
        'transport' 	 => 'postMessage',
        'priority' => 17,
        'js_vars'   => array(
            array(
                'element'  => '.flatpickr-current-month, .appointment-form-shortcode .mpa-booking-step.mpa-booking-step-cart .mpa-shortcode-title, .appointment-form-shortcode .mpa-booking-step.mpa-booking-step-checkout .mpa-shortcode-title, .appointment-form-shortcode .mpa-booking-step.mpa-booking-step-period .mpa-shortcode-title, .appointment-form-shortcode .mpa-booking-step.mpa-booking-step-service-form .mpa-shortcode-title, .appointment-form-shortcode .mpa-booking-step.mpa-booking-step-payment .mpa-shortcode-title, .appointment-form-widget > .widget-body .mpa-booking-step.mpa-booking-step-cart .mpa-shortcode-title, .appointment-form-widget > .widget-body .mpa-booking-step.mpa-booking-step-checkout .mpa-shortcode-title, .appointment-form-widget > .widget-body .mpa-booking-step.mpa-booking-step-period .mpa-shortcode-title, .appointment-form-widget > .widget-body .mpa-booking-step.mpa-booking-step-service-form .mpa-shortcode-title, .appointment-form-widget > .widget-body .mpa-booking-step.mpa-booking-step-payment .mpa-shortcode-title, .appointment-form-shortcode .mpa-booking-step.mpa-booking-step-period .flatpickr-calendar .flatpickr-weekdays .flatpickr-weekday, .appointment-form-widget > .widget-body .mpa-booking-step.mpa-booking-step-period .flatpickr-calendar .flatpickr-weekdays .flatpickr-weekday, .appointment-form-shortcode .mpa-booking-step.mpa-booking-step-period .flatpickr-calendar .flatpickr-day, .appointment-form-widget > .widget-body .mpa-booking-step.mpa-booking-step-period .flatpickr-calendar .flatpickr-day',
                'function' => 'css',
                'property' => 'color',
            ),
            array(
                'element'  => '.appointment-form-shortcode .mpa-booking-step.mpa-booking-step-period .flatpickr-calendar .flatpickr-months .flatpickr-next-month:hover svg, .appointment-form-shortcode .mpa-booking-step.mpa-booking-step-period .flatpickr-calendar .flatpickr-months .flatpickr-prev-month:hover svg, .appointment-form-widget > .widget-body .mpa-booking-step.mpa-booking-step-period .flatpickr-calendar .flatpickr-months .flatpickr-next-month:hover svg, .appointment-form-widget > .widget-body .mpa-booking-step.mpa-booking-step-period .flatpickr-calendar .flatpickr-months .flatpickr-prev-month:hover svg',
                'property' => 'fill',
            ),
        )
    );
    
    $controls[] = array(
        'type'     => 'color',
        'settings'  => 'tg_appointment_date_month_bg_color',
        'label'    => esc_html__('Appointment Date/Month Background Color', 'dotlife' ),
        'section'  => 'general_color',
        'default'  => '#f9f9f9',
        'output' => array(
            array(
                'element'  => '.appointment-form-shortcode .mpa-booking-step.mpa-booking-step-period .flatpickr-calendar .flatpickr-months, .appointment-form-widget > .widget-body .mpa-booking-step.mpa-booking-step-period .flatpickr-calendar .flatpickr-months, .appointment-form-shortcode .mpa-booking-step.mpa-booking-step-period .flatpickr-calendar .flatpickr-day:before, .appointment-form-widget > .widget-body .mpa-booking-step.mpa-booking-step-period .flatpickr-calendar .flatpickr-day:before',
                'property' => 'background',
            ),
        ),
        'transport' 	 => 'postMessage',
        'priority' => 17,
        'js_vars'   => array(
            array(
                'element'  => '.appointment-form-shortcode .mpa-booking-step.mpa-booking-step-period .flatpickr-calendar .flatpickr-months, .appointment-form-widget > .widget-body .mpa-booking-step.mpa-booking-step-period .flatpickr-calendar .flatpickr-months, .appointment-form-shortcode .mpa-booking-step.mpa-booking-step-period .flatpickr-calendar .flatpickr-day:before, .appointment-form-widget > .widget-body .mpa-booking-step.mpa-booking-step-period .flatpickr-calendar .flatpickr-day:before',
                'function' => 'css',
                'property' => 'background',
            ),
        )
    );
    
    $controls[] = array(
        'type'     => 'color',
        'settings'  => 'tg_appointment_reservation_bg_color',
        'label'    => esc_html__('Appointment Reservation Color', 'dotlife' ),
        'section'  => 'general_color',
        'default'  => '#f9f9f9',
        'output' => array(
            array(
                'element'  => '.appointment-form-shortcode .mpa-booking-step.mpa-booking-step-cart .mpa-cart .mpa-cart-item, .appointment-form-widget > .widget-body .mpa-booking-step.mpa-booking-step-cart .mpa-cart .mpa-cart-item, .appointment-form-shortcode .mpa-booking-step.mpa-booking-step-booking, .appointment-form-widget > .widget-body .mpa-booking-step.mpa-booking-step-booking',
                'property' => 'background',
            ),
        ),
        'transport' 	 => 'postMessage',
        'priority' => 17,
        'js_vars'   => array(
            array(
                'element'  => '.appointment-form-shortcode .mpa-booking-step.mpa-booking-step-cart .mpa-cart .mpa-cart-item, .appointment-form-widget > .widget-body .mpa-booking-step.mpa-booking-step-cart .mpa-cart .mpa-cart-item, .appointment-form-shortcode .mpa-booking-step.mpa-booking-step-booking, .appointment-form-widget > .widget-body .mpa-booking-step.mpa-booking-step-booking',
                'function' => 'css',
                'property' => 'background',
            ),
        )
    );
    
    $controls[] = array(
        'type'     => 'title',
        'settings'  => 'tg_label_title',
        'label'    => esc_html__('Label Settings', 'dotlife' ),
        'section'  => 'general_input',
        'priority' => 17,
    );
    
    $controls[] = array(
        'type'     => 'typography',
        'settings'  => 'tg_label_typography',
        'label'    => esc_html__('Label Typography', 'dotlife' ),
        'section'  => 'general_input',        
        'default'  => array(
            'font-family'    => 'Jost',
            'variant'        => '700',
            'font-size'      => '13px',
            'line-height'    => '1.8',
            'letter-spacing' => '2px',
            'text-transform' => 'uppercase',
        ),
        'output' => array(
            array(
                'element'  => 'label, #commentform label, .wpcf7-form label',
            ),
        ),
        'priority' => 18,
    );
    
    $controls[] = array(
        'type'     => 'color',
        'settings'  => 'tg_label_font_color',
        'label'    => __( 'Label Font Color', 'dotlife' ),
        'section'  => 'general_input',
        'default'  => '#222222',
        'output' => array(
            array(
                'element'  => 'label',
                'property' => 'color',
            ),
        ),
        'transport' 	 => 'postMessage',
        'priority' => 18,
    );
    
    $controls[] = array(
        'type'     => 'title',
        'settings'  => 'tg_input_title',
        'label'    => esc_html__('Input and Textarea Settings', 'dotlife' ),
        'section'  => 'general_input',
	    'priority' => 19,
    );
    
    $controls[] = array(
        'type'     => 'slider',
        'settings'  => 'tg_input_border_radius',
        'label'    => esc_html__('Input and Textarea Border Radius (px)', 'dotlife' ),
        'section'  => 'general_input',
        'default'  => 5,
        'choices' => array( 'min' => 0, 'max' => 25, 'step' => 1 ),
        'output' => array(
	        array(
	            'element'  => 'input[type=text], input[type=password], input[type=email], input[type=url], input[type=tel], input[type=date], textarea, select, input[type=search], .tutor-form-control, .tutor-card',
	            'property' => 'border-radius',
	            'units'    => 'px',
	        ),
	    ),
	    'transport' 	 => 'postMessage',
	    'priority' => 20,
	    'js_vars'   => array(
			array(
				'element'  => 'input[type=text], input[type=password], input[type=email], input[type=url], input[type=tel], input[type=date], textarea, select, input[type=search], .tutor-form-control, .tutor-card',
				'function' => 'css',
				'property' => 'border-radius',
				'units'    => 'px',
			),
		)
    );
    
    $controls[] = array(
        'type'     => 'typography',
        'settings'  => 'tg_input_typography',
        'label'    => esc_html__('Input and Textarea Typography', 'dotlife' ),
        'section'  => 'general_input',
        'default'  => 'Jost',
        'default'  => array(
			'font-family'    => 'Jost',
			'variant'        => 'regular',
			'font-size'      => '16px',
			'line-height'    => '1.7',
			'letter-spacing' => '0',
			'text-transform' => 'none',
		),
        'output' => array(
	        array(
	            'element'  => 'input[type=text], input[type=password], input[type=email], input[type=url], input[type=tel], input[type=date], textarea, select, input[type=search]',
	        ),
	    ),
	    'priority' => 21,
    );
    
    $controls[] = array(
        'type'     => 'dimensions',
        'settings'  => 'tg_input_padding',
        'label'    => __( 'Input Padding', 'dotlife' ),
        'section'  => 'general_input',
        'default'     => [
            'padding-top'    => '10px',
            'padding-right' => '10px',
            'padding-bottom'   => '10px',
            'padding-left'  => '10px',
        ],
        'choices'     => [
            'labels' => [
                'padding-top'  => esc_html__( 'Padding Top', 'dotlife' ),
                'padding-right'  => esc_html__( 'Padding Right', 'dotlife' ),
                'padding-bottom' => esc_html__( 'Padding Bottom', 'dotlife' ),
                'padding-left' => esc_html__( 'Padding Left', 'dotlife' ),
            ],
        ],
        'output' => array(
            array(
                  'choice'      => 'padding-top',
                  'element'     => 'input[type=text], input[type=password], input[type=email], input[type=url], input[type=tel], input[type=date], textarea, select, input[type=search]',
                  'property'    => 'padding-top',
            ),
           array(
                 'choice'      => 'padding-right',
                 'element'     => 'input[type=text], input[type=password], input[type=email], input[type=url], input[type=tel], input[type=date], textarea, select, input[type=search]',
                 'property'    => 'padding-right',
           ),
           array(
                'choice'      => 'padding-bottom',
                'element'     => 'input[type=text], input[type=password], input[type=email], input[type=url], input[type=tel], input[type=date], textarea, select, input[type=search]',
                'property'    => 'padding-bottom',
            ),
            array(
                'choice'      => 'padding-left',
                'element'     => 'input[type=text], input[type=password], input[type=email], input[type=url], input[type=tel], input[type=date], textarea, select, input[type=search]',
                'property'    => 'padding-left',
            ),
        ),
        'transport' => 'postMessage',
        'priority' => 22,
    );
    
    $controls[] = array(
        'type'     => 'color',
        'settings'  => 'tg_input_bg_color',
        'label'    => esc_html__('Input and Textarea Background Color', 'dotlife' ),
        'section'  => 'general_input',
        'default'  => '#ffffff',
        'output' => array(
	        array(
	            'element'  => 'input[type=text], input[type=password], input[type=email], input[type=url], input[type=tel], input[type=date], textarea, select, input[type=search]',
	            'property' => 'background-color',
	        ),
	    ),
	    'transport' 	 => 'postMessage',
	    'priority' => 20,
	    'js_vars'   => array(
			array(
				'element'  => 'input[type=text], input[type=password], input[type=email], input[type=url], input[type=tel], input[type=date], textarea, select, input[type=search]',
				'function' => 'css',
				'property' => 'background-color',
			),
		)
    );
    
    $controls[] = array(
        'type'     => 'color',
        'settings'  => 'tg_input_font_color',
        'label'    => esc_html__('Input and Textarea Font Color', 'dotlife' ),
        'section'  => 'general_input',
        'default'  => '#222222',
        'output' => array(
	        array(
	            'element'  => 'input[type=text], input[type=password], input[type=email], input[type=url], input[type=tel], input[type=date], textarea, select, input[type=search]',
	            'property' => 'color',
	        ),
	    ),
	    'transport' 	 => 'postMessage',
	    'priority' => 21,
	    'js_vars'   => array(
			array(
				'element'  => 'input[type=text], input[type=password], input[type=email], input[type=url], input[type=tel], input[type=date], textarea, select, input[type=search]',
				'function' => 'css',
				'property' => 'color',
			),
		)
    );
    
    $controls[] = array(
        'type'     => 'color',
        'settings'  => 'tg_input_border_color',
        'label'    => esc_html__('Input and Textarea Border Color', 'dotlife' ),
        'section'  => 'general_input',
        'default'  => '#D8D8D8',
        'output' => array(
	        array(
	            'element'  => 'input[type=text], input[type=password], input[type=email], input[type=url], input[type=tel], input[type=date], textarea, select, input[type=search]',
	            'property' => 'border-color',
	        ),
	    ),
	    'transport' 	 => 'postMessage',
	    'priority' => 22,
	    'js_vars'   => array(
			array(
				'element'  => 'input[type=text], input[type=password], input[type=email], input[type=url], input[type=tel], input[type=date], textarea, select, input[type=search]',
				'function' => 'css',
				'property' => 'border-color',
			),
		)
    );
    
    $controls[] = array(
        'type'     => 'color',
        'settings'  => 'tg_input_focus_color',
        'label'    => esc_html__('Input and Textarea Focus State Color', 'dotlife' ),
        'section'  => 'general_input',
        'default'  => '#0067DA',
        'output' => array(
	        array(
	            'element'  => 'input[type=text]:focus, input[type=password]:focus, input[type=email]:focus, input[type=url]:focus, input[type=date]:focus, textarea:focus, input[type=search]:focus',
	            'property' => 'border-color',
	        ),
	        array(
	            'element'  => '.input_effect ~ .focus-border',
	            'property' => 'background-color',
	        ),
	    ),
	    'transport' 	 => 'postMessage',
	    'priority' => 23,
	    'js_vars'   => array(
			array(
				'element'  => 'input[type=text]:focus, input[type=password]:focus, input[type=email]:focus, input[type=url]:focus, input[type=date]:focus, textarea:focus, input[type=search]:focus',
				'function' => 'css',
				'property' => 'border-color',
			),
			array(
	            'element'  => '.input_effect ~ .focus-border',
	            'function' => 'css',
	            'property' => 'background-color',
	        ),
		)
    );
    
    $controls[] = array(
        'type'     => 'title',
        'settings'  => 'tg_button_title',
        'label'    => esc_html__('Button Settings', 'dotlife' ),
        'section'  => 'general_input',
	    'priority' => 24,
    );
    
    $controls[] = array(
        'type'     => 'typography',
        'settings'  => 'tg_button_typography',
        'label'    => esc_html__('Button Typography', 'dotlife' ),
        'section'  => 'general_input',
        'default'  => 'Jost',
        'default'  => array(
			'font-family'    => 'Jost',
			'variant'        => '700',
			'font-size'      => '13px',
			'line-height'    => '1.7',
			'letter-spacing' => '1px',
			'text-transform' => 'uppercase',
		),
        'output' => array(
	        array(
	            'element'  => 'input[type=submit], input[type=button], a.button, .button, .woocommerce .page_slider a.button, a.button.fullwidth, .woocommerce-page div.product form.cart .button, .woocommerce #respond input#submit.alt, .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt, body .ui-dialog[aria-describedby="ajax-login-register-login-dialog"] .form-wrapper input[type="submit"], body .ui-dialog[aria-describedby="ajax-login-register-dialog"] .form-wrapper input[type="submit"], body.learnpress-page #page_content_wrapper .order-recover .lp-button, .learnpress-page #learn-press-profile-basic-information button, body #page_content_wrapper p#lp-avatar-actions button, .learnpress-page #profile-content-settings form button[type=submit], button[type=submit], .wp-block-search .wp-block-search__button, #learn-press-course .course-summary-sidebar .course-sidebar-preview .lp-course-buttons button, body .comment-respond .comment-form input[type=submit], .learnpress-course-curriculum .course-curriculum .curriculum-more__button, .tutor-btn.tutor-woocommerce-view-cart, .wc-block-cart__submit-button, .wc-block-checkout__actions_row .wc-block-components-checkout-place-order-button',
	        ),
	    ),
	    'priority' => 25,
    );
    
    $controls[] = array(
        'type'     => 'dimensions',
        'settings'  => 'tg_button_padding',
        'label'    => __( 'Button Padding', 'dotlife' ),
        'section'  => 'general_input',
        'default'     => [
            'padding-top'    => '10px',
            'padding-right' => '30px',
            'padding-bottom'   => '10px',
            'padding-left'  => '30px',
        ],
        'choices'     => [
            'labels' => [
                'padding-top'  => esc_html__( 'Padding Top', 'dotlife' ),
                'padding-right'  => esc_html__( 'Padding Right', 'dotlife' ),
                'padding-bottom' => esc_html__( 'Padding Bottom', 'dotlife' ),
                'padding-left' => esc_html__( 'Padding Left', 'dotlife' ),
            ],
        ],
        'output' => array(
            array(
                  'choice'      => 'padding-top',
                  'element'     => 'input[type=submit], input[type=button], a.button, .button, .woocommerce .page_slider a.button, a.button.fullwidth, .woocommerce-page div.product form.cart .button, .woocommerce #respond input#submit.alt, .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt, body .ui-dialog[aria-describedby="ajax-login-register-login-dialog"] .form-wrapper input[type="submit"], body .ui-dialog[aria-describedby="ajax-login-register-dialog"] .form-wrapper input[type="submit"], body.learnpress-page #page_content_wrapper .order-recover .lp-button, .learnpress-page #learn-press-profile-basic-information button, body #page_content_wrapper p#lp-avatar-actions button, .learnpress-page #profile-content-settings form button[type=submit], button[type=submit], .wp-block-search .wp-block-search__button, #learn-press-course .course-summary-sidebar .course-sidebar-preview .lp-course-buttons button, body .comment-respond .comment-form input[type=submit], .learnpress-course-curriculum .course-curriculum .curriculum-more__button, .tutor-btn-primary',
                  'property'    => 'padding-top',
            ),
           array(
                 'choice'      => 'padding-right',
                 'element'     => 'input[type=submit], input[type=button], a.button, .button, .woocommerce .page_slider a.button, a.button.fullwidth, .woocommerce-page div.product form.cart .button, .woocommerce #respond input#submit.alt, .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt, body .ui-dialog[aria-describedby="ajax-login-register-login-dialog"] .form-wrapper input[type="submit"], body .ui-dialog[aria-describedby="ajax-login-register-dialog"] .form-wrapper input[type="submit"], body.learnpress-page #page_content_wrapper .order-recover .lp-button, .learnpress-page #learn-press-profile-basic-information button, body #page_content_wrapper p#lp-avatar-actions button, .learnpress-page #profile-content-settings form button[type=submit], button[type=submit], .wp-block-search .wp-block-search__button, #learn-press-course .course-summary-sidebar .course-sidebar-preview .lp-course-buttons button, body .comment-respond .comment-form input[type=submit], .learnpress-course-curriculum .course-curriculum .curriculum-more__button, .tutor-btn-primary',
                 'property'    => 'padding-right',
           ),
           array(
                'choice'      => 'padding-bottom',
                'element'     => 'input[type=submit], input[type=button], a.button, .button, .woocommerce .page_slider a.button, a.button.fullwidth, .woocommerce-page div.product form.cart .button, .woocommerce #respond input#submit.alt, .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt, body .ui-dialog[aria-describedby="ajax-login-register-login-dialog"] .form-wrapper input[type="submit"], body .ui-dialog[aria-describedby="ajax-login-register-dialog"] .form-wrapper input[type="submit"], body.learnpress-page #page_content_wrapper .order-recover .lp-button, .learnpress-page #learn-press-profile-basic-information button, body #page_content_wrapper p#lp-avatar-actions button, .learnpress-page #profile-content-settings form button[type=submit], button[type=submit], .wp-block-search .wp-block-search__button, #learn-press-course .course-summary-sidebar .course-sidebar-preview .lp-course-buttons button, body .comment-respond .comment-form input[type=submit], .learnpress-course-curriculum .course-curriculum .curriculum-more__button, .tutor-btn-primary',
                'property'    => 'padding-bottom',
            ),
            array(
                'choice'      => 'padding-left',
                'element'     => 'input[type=submit], input[type=button], a.button, .button, .woocommerce .page_slider a.button, a.button.fullwidth, .woocommerce-page div.product form.cart .button, .woocommerce #respond input#submit.alt, .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt, body .ui-dialog[aria-describedby="ajax-login-register-login-dialog"] .form-wrapper input[type="submit"], body .ui-dialog[aria-describedby="ajax-login-register-dialog"] .form-wrapper input[type="submit"], body.learnpress-page #page_content_wrapper .order-recover .lp-button, .learnpress-page #learn-press-profile-basic-information button, body #page_content_wrapper p#lp-avatar-actions button, .learnpress-page #profile-content-settings form button[type=submit], button[type=submit], .wp-block-search .wp-block-search__button, #learn-press-course .course-summary-sidebar .course-sidebar-preview .lp-course-buttons button, body .comment-respond .comment-form input[type=submit], .learnpress-course-curriculum .course-curriculum .curriculum-more__button, .tutor-btn-primary',
                'property'    => 'padding-left',
            ),
        ),
        'transport' => 'postMessage',
        'priority' => 22,
    );
    
    $controls[] = array(
        'type'     => 'slider',
        'settings'  => 'tg_button_border_radius',
        'label'    => esc_html__('Button Border Radius (px)', 'dotlife' ),
        'section'  => 'general_input',
        'default'  => 5,
        'choices' => array( 'min' => 0, 'max' => 25, 'step' => 1 ),
        'output' => array(
	        array(
	            'element'  => 'input[type=submit], input[type=button], a.button, .button, .woocommerce .page_slider a.button, a.button.fullwidth, .woocommerce-page div.product form.cart .button, .woocommerce #respond input#submit.alt, .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt, body .ui-dialog[aria-describedby="ajax-login-register-login-dialog"] .form-wrapper input[type="submit"], body .ui-dialog[aria-describedby="ajax-login-register-dialog"] .form-wrapper input[type="submit"], a#toTop, .pagination span, .widget_tag_cloud div a, .pagination a, .pagination span, body.learnpress-page #page_content_wrapper .order-recover .lp-button, .learnpress-page #learn-press-profile-basic-information button, body #page_content_wrapper p#lp-avatar-actions button, .learnpress-page #profile-content-settings form button[type=submit], .learnpress-page #page_content_wrapper .lp-button, button[type=submit], .wp-block-search .wp-block-search__button, #single_course_meta ul.single_course_meta_data, #page_content_wrapper ul.learn-press-nav-tabs .course-nav a, body.learnpress-page.profile .lp-tab-sections li a, body.learnpress-page.profile .lp-tab-sections li span, body.learnpress-page.profile .lp-tab-sections .section-tab.active span, body #learn-press-course-tabs .course-nav label, #learn-press-course .course-summary-sidebar .course-sidebar-preview .lp-course-buttons button, body .comment-respond .comment-form input[type=submit], .learnpress-course-curriculum .course-curriculum .curriculum-more__button, .elementor-toggle .elementor-tab-title:not(.elementor-active), .elementor-toggle .elementor-tab-content.elementor-active, .elementor-toggle .elementor-tab-content, .elementor-toggle .elementor-tab-title.elementor-active, .appointment-form-shortcode .mpa-booking-step.mpa-booking-step-period .mpa-time-wrapper .mpa-times .mpa-time-period, .appointment-form-widget > .widget-body .mpa-booking-step.mpa-booking-step-period .mpa-time-wrapper .mpa-times .mpa-time-period, .appointment-form-shortcode .mpa-booking-step.mpa-booking-step-period .flatpickr-calendar .flatpickr-months, .appointment-form-widget > .widget-body .mpa-booking-step.mpa-booking-step-period .flatpickr-calendar .flatpickr-months, body #learn-press-profile .lp-user-profile-avatar img, body #learn-press-profile .dashboard-general-statistic__row .statistic-box, .lp-user-profile #profile-sidebar, .learn-press-profile-course__tab__inner, .wc-block-cart__submit-button, .wc-block-checkout__actions_row .wc-block-components-checkout-place-order-button, .tutor-btn-primary, .tutor-btn',
	            'property' => 'border-radius',
	            'units'    => 'px',
	        ),
	    ),
	    'transport' 	 => 'postMessage',
	    'priority' => 26,
	    'js_vars'   => array(
			array(
				'element'  => 'input[type=submit], input[type=button], a.button, .button, .woocommerce .page_slider a.button, a.button.fullwidth, .woocommerce-page div.product form.cart .button, .woocommerce #respond input#submit.alt, .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt, body .ui-dialog[aria-describedby="ajax-login-register-login-dialog"] .form-wrapper input[type="submit"], body .ui-dialog[aria-describedby="ajax-login-register-dialog"] .form-wrapper input[type="submit"], a#toTop, .pagination span, .widget_tag_cloud div a, .pagination a, .pagination span, body.learnpress-page #page_content_wrapper .order-recover .lp-button, .learnpress-page #learn-press-profile-basic-information button, body #page_content_wrapper p#lp-avatar-actions button, .learnpress-page #profile-content-settings form button[type=submit], .learnpress-page #page_content_wrapper .lp-button, button[type=submit], .wp-block-search .wp-block-search__button, #single_course_meta ul.single_course_meta_data, #page_content_wrapper ul.learn-press-nav-tabs .course-nav a, body.learnpress-page.profile .lp-tab-sections li a, body.learnpress-page.profile .lp-tab-sections li span, body.learnpress-page.profile .lp-tab-sections .section-tab.active span, body #learn-press-course-tabs .course-nav label, #learn-press-course .course-summary-sidebar .course-sidebar-preview .lp-course-buttons button, body .comment-respond .comment-form input[type=submit], .learnpress-course-curriculum .course-curriculum .curriculum-more__button, .elementor-toggle .elementor-tab-title:not(.elementor-active), .elementor-toggle .elementor-tab-content.elementor-active, .elementor-toggle .elementor-tab-content, .elementor-toggle .elementor-tab-title.elementor-active, .appointment-form-shortcode .mpa-booking-step.mpa-booking-step-period .mpa-time-wrapper .mpa-times .mpa-time-period, .appointment-form-widget > .widget-body .mpa-booking-step.mpa-booking-step-period .mpa-time-wrapper .mpa-times .mpa-time-period, .appointment-form-shortcode .mpa-booking-step.mpa-booking-step-period .flatpickr-calendar .flatpickr-months, .appointment-form-widget > .widget-body .mpa-booking-step.mpa-booking-step-period .flatpickr-calendar .flatpickr-months, body #learn-press-profile .lp-user-profile-avatar img, body #learn-press-profile .dashboard-general-statistic__row .statistic-box, .lp-user-profile #profile-sidebar, .learn-press-profile-course__tab__inner, .tutor-btn',
				'function' => 'css',
				'property' => 'border-radius',
				'units'    => 'px',
			),
		)
    );
    
    $controls[] = array(
        'type'     => 'color',
        'settings'  => 'tg_button_bg_color',
        'label'    => esc_html__('Button Background Color', 'dotlife' ),
        'section'  => 'general_input',
        'default'  => '#0067DA',
        'output' => array(
	        array(
	            'element'  => 'input[type=submit], input[type=button], a.button, .button, .pagination span, .pagination a:hover, .woocommerce .footer_bar .button, .woocommerce .footer_bar .button:hover, .woocommerce-page div.product form.cart .button, .woocommerce #respond input#submit.alt, .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt, .post_type_icon, .filter li a:hover, .filter li a.active, #portfolio_wall_filters li a.active,  #portfolio_wall_filters li a:hover, .comment_box, .one_half.gallery2 .portfolio_type_wrapper, .one_third.gallery3 .portfolio_type_wrapper, .one_fourth.gallery4 .portfolio_type_wrapper, .one_fifth.gallery5 .portfolio_type_wrapper, .portfolio_type_wrapper, .post_share_text, #close_share, .widget_tag_cloud div a:hover, .ui-accordion .ui-accordion-header .ui-icon, .mobile_menu_wrapper #mobile_menu_close.button, .mobile_menu_wrapper #close_mobile_menu, .multi_share_button, body .ui-dialog[aria-describedby="ajax-login-register-login-dialog"] .form-wrapper input[type="submit"], body .ui-dialog[aria-describedby="ajax-login-register-dialog"] .form-wrapper input[type="submit"], .learnpress-page #page_content_wrapper .lp-button, .learnpress-page #learn-press-profile-basic-information button, .learnpress-page #profile-content-settings form button[type=submit], body #checkout-payment #checkout-order-action button, body.single.learnpress #popup-content > a.lp-lesson-comment-btn, button[type=submit], .wp-block-search .wp-block-search__button, #learn-press-course .course-summary-sidebar .course-sidebar-preview .lp-course-buttons button, body .comment-respond .comment-form input[type=submit], .learnpress-course-curriculum .course-curriculum .curriculum-more__button, .wc-block-cart__submit-button, .wc-block-checkout__actions_row .wc-block-components-checkout-place-order-button, .tutor-btn-primary',
	            'property' => 'background-color',
	        ),
	        array(
	            'element'  => '.pagination span, .pagination a:hover, .button.ghost, .button.ghost:hover, .button.ghost:active, blockquote:after, .woocommerce-MyAccount-navigation ul li.is-active, body .ui-dialog[aria-describedby="ajax-login-register-login-dialog"] .form-wrapper input[type="submit"], body .ui-dialog[aria-describedby="ajax-login-register-dialog"] .form-wrapper input[type="submit"], .learnpress-page #page_content_wrapper .lp-button, .learnpress-page #learn-press-profile-basic-information button, .learnpress-page #profile-content-settings form button[type=submit], body #checkout-payment #checkout-order-action button, button[type=submit], .wp-block-search .wp-block-search__button, body .comment-respond .comment-form input[type=submit]',
	            'property' => 'border-color',
	        ),
	        array(
	            'element'  => '.comment_box:before, .comment_box:after',
	            'property' => 'border-top-color',
	        ),
	        array(
	            'element'  => '.button.ghost, .button.ghost:hover, .button.ghost:active, .infinite_load_more, blockquote:before, .woocommerce-MyAccount-navigation ul li.is-active a, body .ui-dialog[aria-describedby="ajax-login-register-login-dialog"] .form-wrapper input[type="submit"], body .ui-dialog[aria-describedby="ajax-login-register-dialog"] .form-wrapper input[type="submit"]',
	            'property' => 'color',
	        ),
	    ),
	    'js_vars'   => array(
			array(
				'element'  => 'input[type=submit], input[type=button], a.button, .button, .pagination span, .pagination a:hover, .woocommerce .footer_bar .button, .woocommerce .footer_bar .button:hover, .woocommerce-page div.product form.cart .button, .woocommerce #respond input#submit.alt, .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt, .post_type_icon, .filter li a:hover, .filter li a.active, #portfolio_wall_filters li a.active,  #portfolio_wall_filters li a:hover, .comment_box, .one_half.gallery2 .portfolio_type_wrapper, .one_third.gallery3 .portfolio_type_wrapper, .one_fourth.gallery4 .portfolio_type_wrapper, .one_fifth.gallery5 .portfolio_type_wrapper, .portfolio_type_wrapper, .post_share_text, #close_share, .widget_tag_cloud div a:hover, .ui-accordion .ui-accordion-header .ui-icon, .mobile_menu_wrapper #mobile_menu_close.button, .mobile_menu_wrapper #close_mobile_menu, .multi_share_button, body .ui-dialog[aria-describedby="ajax-login-register-login-dialog"] .form-wrapper input[type="submit"], body .ui-dialog[aria-describedby="ajax-login-register-dialog"] .form-wrapper input[type="submit"], .learnpress-page #page_content_wrapper .lp-button, .learnpress-page #learn-press-profile-basic-information button, .learnpress-page #profile-content-settings form button[type=submit], body #checkout-payment #checkout-order-action button, body.single.learnpress #popup-content > a.lp-lesson-comment-btn, button[type=submit], .wp-block-search .wp-block-search__button, #learn-press-course .course-summary-sidebar .course-sidebar-preview .lp-course-buttons button, body .comment-respond .comment-form input[type=submit], .learnpress-course-curriculum .course-curriculum .curriculum-more__button',
				'function' => 'css',
				'property' => 'background-color',
			),
			array(
				'element'  => '.pagination span, .pagination a:hover, .button.ghost, .button.ghost:hover, .button.ghost:active, blockquote:after, .woocommerce-MyAccount-navigation ul li.is-active, body .ui-dialog[aria-describedby="ajax-login-register-login-dialog"] .form-wrapper input[type="submit"], body .ui-dialog[aria-describedby="ajax-login-register-dialog"] .form-wrapper input[type="submit"], .learnpress-page #page_content_wrapper .lp-button, .learnpress-page #learn-press-profile-basic-information button, .learnpress-page #profile-content-settings form button[type=submit], body #checkout-payment #checkout-order-action button, button[type=submit], .wp-block-search .wp-block-search__button, body .comment-respond .comment-form input[type=submit]',
				'function' => 'css',
				'property' => 'border-color',
			),
			array(
				'element'  => '.comment_box:before, .comment_box:after',
				'function' => 'css',
				'property' => 'border-top-color',
			),
			array(
				'element'  => '.button.ghost, .button.ghost:hover, .button.ghost:active, .infinite_load_more, blockquote:before, .woocommerce-MyAccount-navigation ul li.is-active a, body .ui-dialog[aria-describedby="ajax-login-register-login-dialog"] .form-wrapper input[type="submit"], body .ui-dialog[aria-describedby="ajax-login-register-dialog"] .form-wrapper input[type="submit"]',
				'function' => 'css',
				'property' => 'color',
			),
		),
	    'transport' 	 => 'postMessage',
	    'priority' => 27,
    );
    
    $controls[] = array(
        'type'     => 'color',
        'settings'  => 'tg_button_font_color',
        'label'    => esc_html__('Button Font Color', 'dotlife' ),
        'section'  => 'general_input',
        'default'  => '#ffffff',
        'output' => array(
	        array(
	            'element'  => 'input[type=submit], input[type=button], a.button, .button, .pagination a:hover, .woocommerce .footer_bar .button , .woocommerce .footer_bar .button:hover, .woocommerce-page div.product form.cart .button, .woocommerce #respond input#submit.alt, .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt, .post_type_icon, .filter li a:hover, .filter li a.active, #portfolio_wall_filters li a.active,  #portfolio_wall_filters li a:hover, .comment_box, .one_half.gallery2 .portfolio_type_wrapper, .one_third.gallery3 .portfolio_type_wrapper, .one_fourth.gallery4 .portfolio_type_wrapper, .one_fifth.gallery5 .portfolio_type_wrapper, .portfolio_type_wrapper, .post_share_text, #close_share, .widget_tag_cloud div a:hover, .ui-accordion .ui-accordion-header .ui-icon, .mobile_menu_wrapper #mobile_menu_close.button, #toTop, .multi_share_button, body .ui-dialog[aria-describedby="ajax-login-register-login-dialog"] .form-wrapper input[type="submit"], body .ui-dialog[aria-describedby="ajax-login-register-dialog"] .form-wrapper input[type="submit"],.pagination span.current, .mobile_menu_wrapper #close_mobile_menu, body.learnpress-page #page_content_wrapper .lp-button, .learnpress-page #learn-press-profile-basic-information button, .learnpress-page #profile-content-settings form button[type=submit], body #checkout-payment #checkout-order-action button, button[type=submit], .wp-block-search .wp-block-search__button, #learn-press-course .course-summary-sidebar .course-sidebar-preview .lp-course-buttons button, body .comment-respond .comment-form input[type=submit], .learnpress-course-curriculum .course-curriculum .curriculum-more__button, .wc-block-cart__submit-button, .wc-block-checkout__actions_row .wc-block-components-checkout-place-order-button, .tutor-btn-primary',
	            'property' => 'color',
	        ),
	    ),
	    'js_vars'   => array(
			array(
				'element'  => 'input[type=submit], input[type=button], a.button, .button, .pagination span, .pagination a:hover, .woocommerce .footer_bar .button, .woocommerce .footer_bar .button:hover, .woocommerce-page div.product form.cart .button, .woocommerce #respond input#submit.alt, .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt, .post_type_icon, .filter li a:hover, .filter li a.active, #portfolio_wall_filters li a.active,  #portfolio_wall_filters li a:hover, .comment_box, .one_half.gallery2 .portfolio_type_wrapper, .one_third.gallery3 .portfolio_type_wrapper, .one_fourth.gallery4 .portfolio_type_wrapper, .one_fifth.gallery5 .portfolio_type_wrapper, .portfolio_type_wrapper, .post_share_text, #close_share, .widget_tag_cloud div a:hover, .ui-accordion .ui-accordion-header .ui-icon, .mobile_menu_wrapper #mobile_menu_close.button, #toTop, .multi_share_button, body .ui-dialog[aria-describedby="ajax-login-register-login-dialog"] .form-wrapper input[type="submit"], body .ui-dialog[aria-describedby="ajax-login-register-dialog"] .form-wrapper input[type="submit"],.pagination span.current, .mobile_menu_wrapper #close_mobile_menu, body.learnpress-page #page_content_wrapper .lp-button, .learnpress-page #learn-press-profile-basic-information button, .learnpress-page #profile-content-settings form button[type=submit], body #checkout-payment #checkout-order-action button, button[type=submit], .wp-block-search .wp-block-search__button, #learn-press-course .course-summary-sidebar .course-sidebar-preview .lp-course-buttons button, body .comment-respond .comment-form input[type=submit], .learnpress-course-curriculum .course-curriculum .curriculum-more__button',
				'function' => 'css',
				'property' => 'color',
			),
		),
	    'transport' 	 => 'postMessage',
	    'priority' => 28,
    );
    
    $controls[] = array(
        'type'     => 'color',
        'settings'  => 'tg_button_border_color',
        'label'    => esc_html__('Button Border Color', 'dotlife' ),
        'section'  => 'general_input',
        'default'  => '#0067DA',
        'output' => array(
	        array(
	            'element'  => 'input[type=submit], input[type=button], a.button, .button, .pagination a:hover, .woocommerce .footer_bar .button , .woocommerce .footer_bar .button:hover, .woocommerce-page div.product form.cart .button, .woocommerce #respond input#submit.alt, .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt, .infinite_load_more, .post_share_text, #close_share, .widget_tag_cloud div a:hover, .mobile_menu_wrapper #close_mobile_menu, .mobile_menu_wrapper #mobile_menu_close.button, body .ui-dialog[aria-describedby="ajax-login-register-login-dialog"] .form-wrapper input[type="submit"], body .ui-dialog[aria-describedby="ajax-login-register-dialog"] .form-wrapper input[type="submit"], .learnpress-page #learn-press-profile-basic-information button, .learnpress-page #profile-content-settings form button[type=submit], body #checkout-payment #checkout-order-action button, button[type=submit], .wp-block-search .wp-block-search__button, #learn-press-course .course-summary-sidebar .course-sidebar-preview .lp-course-buttons button, body .comment-respond .comment-form input[type=submit], .learnpress-course-curriculum .course-curriculum .curriculum-more__button, .wc-block-cart__submit-button, .wc-block-checkout__actions_row .wc-block-components-checkout-place-order-button',
	            'property' => 'border-color',
	        ),
	    ),
	    'js_vars'   => array(
			array(
				'element'  => 'input[type=submit], input[type=button], a.button, .button, .pagination span, .pagination a:hover, .woocommerce .footer_bar .button, .woocommerce .footer_bar .button:hover, .woocommerce-page div.product form.cart .button, .woocommerce #respond input#submit.alt, .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt, .post_type_icon, .filter li a:hover, .filter li a.active, #portfolio_wall_filters li a.active,  #portfolio_wall_filters li a:hover, .comment_box, .one_half.gallery2 .portfolio_type_wrapper, .one_third.gallery3 .portfolio_type_wrapper, .one_fourth.gallery4 .portfolio_type_wrapper, .one_fifth.gallery5 .portfolio_type_wrapper, .portfolio_type_wrappe, .post_share_text, #close_share, .widget_tag_cloud div a:hover, .mobile_menu_wrapper #close_mobile_menu, .header_cart_wrapper > a, .ui-accordion .ui-accordion-header .ui-icon, .mobile_menu_wrapper #mobile_menu_close.button, body .ui-dialog[aria-describedby="ajax-login-register-login-dialog"] .form-wrapper input[type="submit"], body .ui-dialog[aria-describedby="ajax-login-register-dialog"] .form-wrapper input[type="submit"], .learnpress-page #learn-press-profile-basic-information button, .learnpress-page #profile-content-settings form button[type=submit], body #checkout-payment #checkout-order-action button, button[type=submit], .wp-block-search .wp-block-search__button, #learn-press-course .course-summary-sidebar .course-sidebar-preview .lp-course-buttons button, body .comment-respond .comment-form input[type=submit], .learnpress-course-curriculum .course-curriculum .curriculum-more__button',
				'function' => 'css',
				'property' => 'border-color',
			),
		),
	    'transport' 	 => 'postMessage',
	    'priority' => 29,
    );
    
    $controls[] = array(
        'type'     => 'color',
        'settings'  => 'tg_button_hover_bg_color',
        'label'    => esc_html__('Button Hover Background Color', 'dotlife' ),
        'section'  => 'general_input',
        'default'  => '#ffffff',
        'output' => array(
	        array(
	            'element'  => 'input[type=button]:hover, input[type=submit]:hover, a.button:hover, .button:hover, .button.submit, a.button.white:hover, .button.white:hover, a.button.white:active, .button.white:active, .black_bg input[type=submit], .learnpress-page #page_content_wrapper .lp-button:hover, .learnpress-page #learn-press-profile-basic-information button:hover, .learnpress-page #profile-content-settings form button[type=submit]:hover, body #checkout-payment #checkout-order-action button:hover, button[type=submit]:hover, .wp-block-search .wp-block-search__button:hover, #learn-press-course .course-summary-sidebar .course-sidebar-preview .lp-course-buttons button:hover, body .comment-respond .comment-form input[type=submit]:hover, .appointment-form-shortcode .mpa-booking-step.mpa-booking-step-cart .button-secondary:hover, .appointment-form-shortcode .mpa-booking-step.mpa-booking-step-checkout .button-secondary:hover, .appointment-form-shortcode .mpa-booking-step.mpa-booking-step-period .button-secondary:hover, .appointment-form-shortcode .mpa-booking-step.mpa-booking-step-service-form .button-secondary:hover, .appointment-form-shortcode .mpa-booking-step.mpa-booking-step-payment .button-secondary:hover, .appointment-form-widget > .widget-body .mpa-booking-step.mpa-booking-step-cart .button-secondary:hover, .appointment-form-widget > .widget-body .mpa-booking-step.mpa-booking-step-checkout .button-secondary:hover, .appointment-form-widget > .widget-body .mpa-booking-step.mpa-booking-step-period .button-secondary:hover, .appointment-form-widget > .widget-body .mpa-booking-step.mpa-booking-step-service-form .button-secondary:hover, .appointment-form-widget > .widget-body .mpa-booking-step.mpa-booking-step-payment .button-secondary:hover, .appointment-form-shortcode .mpa-booking-step.mpa-booking-step-period .mpa-time-wrapper .mpa-times .mpa-time-period.mpa-time-period-selected, .appointment-form-widget > .widget-body .mpa-booking-step.mpa-booking-step-period .mpa-time-wrapper .mpa-times .mpa-time-period.mpa-time-period-selected, .wc-block-cart__submit-button:hover, .wc-block-checkout__actions_row .wc-block-components-checkout-place-order-button:hover',
	            'property' => 'background-color',
	        ),
	    ),
	    'js_vars'   => array(
			array(
				'element'  => 'input[type=button]:hover, input[type=submit]:hover, a.button:hover, .button:hover, .button.submit, a.button.white:hover, .button.white:hover, a.button.white:active, .button.white:active, .black_bg input[type=submit], .learnpress-page #page_content_wrapper .lp-button:hover, .learnpress-page #learn-press-profile-basic-information button:hover, .learnpress-page #profile-content-settings form button[type=submit]:hover, body #checkout-payment #checkout-order-action button:hover, button[type=submit]:hover, .wp-block-search .wp-block-search__button:hover, #learn-press-course .course-summary-sidebar .course-sidebar-preview .lp-course-buttons button:hover, body .comment-respond .comment-form input[type=submit]:hover, .appointment-form-shortcode .mpa-booking-step.mpa-booking-step-cart .button-secondary:hover, .appointment-form-shortcode .mpa-booking-step.mpa-booking-step-checkout .button-secondary:hover, .appointment-form-shortcode .mpa-booking-step.mpa-booking-step-period .button-secondary:hover, .appointment-form-shortcode .mpa-booking-step.mpa-booking-step-service-form .button-secondary:hover, .appointment-form-shortcode .mpa-booking-step.mpa-booking-step-payment .button-secondary:hover, .appointment-form-widget > .widget-body .mpa-booking-step.mpa-booking-step-cart .button-secondary:hover, .appointment-form-widget > .widget-body .mpa-booking-step.mpa-booking-step-checkout .button-secondary:hover, .appointment-form-widget > .widget-body .mpa-booking-step.mpa-booking-step-period .button-secondary:hover, .appointment-form-widget > .widget-body .mpa-booking-step.mpa-booking-step-service-form .button-secondary:hover, .appointment-form-widget > .widget-body .mpa-booking-step.mpa-booking-step-payment .button-secondary:hover, .appointment-form-shortcode .mpa-booking-step.mpa-booking-step-period .mpa-time-wrapper .mpa-times .mpa-time-period.mpa-time-period-selected, .appointment-form-widget > .widget-body .mpa-booking-step.mpa-booking-step-period .mpa-time-wrapper .mpa-times .mpa-time-period.mpa-time-period-selected',
				'function' => 'css',
				'property' => 'background-color',
			),
		),
	    'transport' 	 => 'postMessage',
	    'priority' => 30,
    );
    
    $controls[] = array(
        'type'     => 'color',
        'settings'  => 'tg_button_hover_font_color',
        'label'    => esc_html__('Button Hover Font Color', 'dotlife' ),
        'section'  => 'general_input',
        'default'  => '#0067DA',
        'output' => array(
	        array(
	            'element'  => 'input[type=button]:hover, input[type=submit]:hover, a.button:hover, .button:hover, .button.submit, a.button.white:hover, .button.white:hover, a.button.white:active, .button.white:active, .black_bg input[type=submit], body.learnpress-page #page_content_wrapper .lp-button:hover, .learnpress-page #learn-press-profile-basic-information button:hover, .learnpress-page #profile-content-settings form button[type=submit]:hover, body #checkout-payment #checkout-order-action button:hover, button[type=submit]:hover, .wp-block-search .wp-block-search__button:hover, #learn-press-course .course-summary-sidebar .course-sidebar-preview .lp-course-buttons button:hover, body .comment-respond .comment-form input[type=submit]:hover, .appointment-form-shortcode .mpa-booking-step.mpa-booking-step-period .mpa-time-wrapper .mpa-times .mpa-time-period.mpa-time-period-selected, .appointment-form-shortcode .mpa-booking-step.mpa-booking-step-period .mpa-time-wrapper .mpa-times .mpa-time-period:hover, .appointment-form-widget > .widget-body .mpa-booking-step.mpa-booking-step-period .mpa-time-wrapper .mpa-times .mpa-time-period.mpa-time-period-selected, .appointment-form-widget > .widget-body .mpa-booking-step.mpa-booking-step-period .mpa-time-wrapper .mpa-times .mpa-time-period:hover, .appointment-form-shortcode .mpa-booking-step.mpa-booking-step-period .button-secondary:hover, .wc-block-cart__submit-button:hover, .wc-block-checkout__actions_row .wc-block-components-checkout-place-order-button:hover',
	            'property' => 'color',
	        ),
	    ),
	    'js_vars'   => array(
			array(
				'element'  => 'input[type=button]:hover, input[type=submit]:hover, a.button:hover, .button:hover, .button.submit, a.button.white:hover, .button.white:hover, a.button.white:active, .button.white:active, .black_bg input[type=submit], body.learnpress-page #page_content_wrapper .lp-button:hover, .learnpress-page #learn-press-profile-basic-information button:hover, .learnpress-page #profile-content-settings form button[type=submit]:hover, button[type=submit]:hover, .wp-block-search .wp-block-search__button:hover, #learn-press-course .course-summary-sidebar .course-sidebar-preview .lp-course-buttons button:hover, body .comment-respond .comment-form input[type=submit]:hover, .appointment-form-shortcode .mpa-booking-step.mpa-booking-step-period .mpa-time-wrapper .mpa-times .mpa-time-period.mpa-time-period-selected, .appointment-form-shortcode .mpa-booking-step.mpa-booking-step-period .mpa-time-wrapper .mpa-times .mpa-time-period:hover, .appointment-form-widget > .widget-body .mpa-booking-step.mpa-booking-step-period .mpa-time-wrapper .mpa-times .mpa-time-period.mpa-time-period-selected, .appointment-form-widget > .widget-body .mpa-booking-step.mpa-booking-step-period .mpa-time-wrapper .mpa-times .mpa-time-period:hover, .appointment-form-shortcode .mpa-booking-step.mpa-booking-step-period .button-secondary:hover',
				'function' => 'css',
				'property' => 'color',
			),
		),
	    'transport' 	 => 'postMessage',
	    'priority' => 31,
    );
    
    $controls[] = array(
        'type'     => 'color',
        'settings'  => 'tg_button_hover_border_color',
        'label'    => esc_html__('Button Hover Border Color', 'dotlife' ),
        'section'  => 'general_input',
        'default'  => '#0067DA',
        'output' => array(
	        array(
	            'element'  => 'input[type=button]:hover, input[type=submit]:hover, a.button:hover, .button:hover, .button.submit, a.button.white:hover, .button.white:hover, a.button.white:active, .button.white:active, .black_bg input[type=submit], .learnpress-page #learn-press-profile-basic-information button:hover, .learnpress-page #profile-content-settings form button[type=submit]:hover, button[type=submit]:hover, .wp-block-search .wp-block-search__button:hover, #learn-press-course .course-summary-sidebar .course-sidebar-preview .lp-course-buttons button:hover, body .comment-respond .comment-form input[type=submit]:hover, .appointment-form-shortcode .mpa-booking-step.mpa-booking-step-period .mpa-time-wrapper .mpa-times .mpa-time-period.mpa-time-period-selected, .appointment-form-widget > .widget-body .mpa-booking-step.mpa-booking-step-period .mpa-time-wrapper .mpa-times .mpa-time-period.mpa-time-period-selected, .appointment-form-shortcode .mpa-booking-step.mpa-booking-step-period .button-secondary:hover, .wc-block-cart__submit-button:hover, .wc-block-checkout__actions_row .wc-block-components-checkout-place-order-button:hover',
	            'property' => 'border-color',
	        ),
	    ),
	    'js_vars'   => array(
			array(
				'element'  => 'input[type=button]:hover, input[type=submit]:hover, a.button:hover, .button:hover, .button.submit, a.button.white:hover, .button.white:hover, a.button.white:active, .button.white:active, .black_bg input[type=submit], .learnpress-page #learn-press-profile-basic-information button:hover, .learnpress-page #profile-content-settings form button[type=submit]:hover, button[type=submit]:hover, .wp-block-search .wp-block-search__button:hover, #learn-press-course .course-summary-sidebar .course-sidebar-preview .lp-course-buttons button:hover, body .comment-respond .comment-form input[type=submit]:hover, .appointment-form-shortcode .mpa-booking-step.mpa-booking-step-period .mpa-time-wrapper .mpa-times .mpa-time-period.mpa-time-period-selected, .appointment-form-widget > .widget-body .mpa-booking-step.mpa-booking-step-period .mpa-time-wrapper .mpa-times .mpa-time-period.mpa-time-period-selected, .appointment-form-shortcode .mpa-booking-step.mpa-booking-step-period .button-secondary:hover',
				'function' => 'css',
				'property' => 'border-color',
			),
		),
	    'transport' 	 => 'postMessage',
	    'priority' => 32,
    );
    
    $controls[] = array(
        'type'     => 'toggle',
        'settings'  => 'tg_frame',
        'label'    => esc_html__('Enable Frame', 'dotlife' ),
        'description' => esc_html__('Check this to enable frame for site layout', 'dotlife' ),
        'section'  => 'general_frame',
        'default'  => 0,
	    'priority' => 26,
    );
    
    $controls[] = array(
        'type'     => 'color',
        'settings'  => 'tg_frame_color',
        'label'    => esc_html__('Frame Color', 'dotlife' ),
        'section'  => 'general_frame',
        'default'  => '#222222',
        'output' => array(
	        array(
	            'element'  => '.frame_top, .frame_bottom, .frame_left, .frame_right',
	            'property' => 'background',
	        ),
	    ),
	    'transport'  => 'postMessage',
	    'priority' => 27,
	    'js_vars'   => array(
			array(
				'element'  => '.frame_top, .frame_bottom, .frame_left, .frame_right',
				'function' => 'css',
				'property' => 'background',
			),
		)
    );
    
    //End General Tab Settings

	//Register Menu Tab Settings
	$controls[] = array(
        'type'     => 'title',
        'settings'  => 'tg_header_content_title',
        'label'    => esc_html__('Header Content Settings', 'dotlife' ),
        'section'  => 'menu_general',
	    'priority' => 0,
    );
    
    $controls[] = array(
        'type'     => 'toggle',
        'settings'  => 'tg_fixed_menu',
        'label'    => esc_html__('Enable Sticky Header', 'dotlife' ),
        'description' => esc_html__('Enable this option to display main menu fixed when scrolling', 'dotlife' ),
        'section'  => 'menu_general',
        'default'  => 1,
	    'priority' => 1,
    );
    
    $controls[] = array(
        'type'     => 'radio',
        'settings'  => 'tg_header_content',
        'label'    => esc_html__('Display Header Content From', 'dotlife' ),
        'description' => esc_html__('Select how theme get main header & navigation content', 'dotlife' ),
        'section'  => 'menu_general',
        'default'  => 'menu',
        'choices'  => $tg_header_content,
	    'priority' => 1,
    );
    
    $controls[] = array(
        'type'     => 'title',
        'settings'  => 'tg_default_header_content_title',
        'label'    => esc_html__('Default Header Content Settings', 'dotlife' ),
        'section'  => 'menu_general',
	    'priority' => 2,
    );
    
    $controls[] = array(
        'type'     => 'select',
        'settings'  => 'tg_header_content_default',
        'label'    => esc_html__('Default Header Content', 'dotlife' ),
        'description' => esc_html__('Select default header content for general pages & posts', 'dotlife' ),
        'section'  => 'menu_general',
        'default'  => '',
        'choices'  => $tg_headers_select,
	    'priority' => 3,
    );
    
    $controls[] = array(
        'type'     => 'select',
        'settings'  => 'tg_sticky_header_content_default',
        'label'    => esc_html__('Default Sticky Header Content', 'dotlife' ),
        'description' => esc_html__('Select default sticky header content for general pages & posts', 'dotlife' ),
        'section'  => 'menu_general',
        'default'  => '',
        'choices'  => $tg_headers_select,
	    'priority' => 4,
    );
    
    $controls[] = array(
        'type'     => 'select',
        'settings'  => 'tg_transparent_header_content_default',
        'label'    => esc_html__('Default Transparent Header Content', 'dotlife' ),
        'description' => esc_html__('Select default transparent header content for general pages & posts', 'dotlife' ),
        'section'  => 'menu_general',
        'default'  => '',
        'choices'  => $tg_headers_select,
	    'priority' => 6,
    );
	
	$controls[] = array(
        'type'     => 'title',
        'settings'  => 'tg_menu_title',
        'label'    => esc_html__('General Menu Settings', 'dotlife' ),
        'section'  => 'menu_general',
	    'priority' => 6,
    );
	
    $controls[] = array(
        'type'     => 'radio',
        'settings'  => 'tg_menu_layout',
        'label'    => esc_html__('Menu Layout', 'dotlife' ),
        'description' => esc_html__('Select main menu layout', 'dotlife' ),
        'section'  => 'menu_general',
        'default'  => 'leftalign',
        'choices'  => $tg_menu_layout,
	    'priority' => 7,
    );
    
    $controls[] = array(
        'type'     => 'toggle',
        'settings'  => 'tg_menu_show_cart',
        'label'    => esc_html__('Show Cart Icon (Required Woocommerce plugin)', 'dotlife' ),
        'description' => esc_html__('Enable this option to show cart icon which link to Woocommerce cart page along with main menu', 'dotlife' ),
        'section'  => 'menu_general',
        'default'  => 1,
	    'priority' => 8,
    );
    
    $controls[] = array(
        'type'     => 'toggle',
        'settings'  => 'tg_menu_show_client',
        'label'    => esc_html__('Show Client Icon (Required ZM Ajax Login & Register  plugin)', 'dotlife' ),
        'description' => esc_html__('Enable this option to show client icon which link to client login page along with main menu', 'dotlife' ),
        'section'  => 'menu_general',
        'default'  => 1,
	    'priority' => 9,
    );
	
    $controls[] = array(
        'type'     => 'typography',
        'settings'  => 'tg_menu_typography',
        'label'    => esc_html__('Menu Font Typography', 'dotlife' ),
        'section'  => 'menu_typography',
        'default'  => array(
			'font-family'    => 'Jost',
			'variant'        => '500',
			'font-size'      => '14px',
			'line-height'    => '1.7',
			'letter-spacing' => '0',
			'text-transform' => 'none',
		),
        'output' => array(
	        array(
	            'element'  => '#menu_wrapper .nav ul li a, #menu_wrapper div .nav li > a, .header_client_wrapper',
	        ),
	    ),
	    'transport' 	 => 'postMessage',
	    'priority' => 10,
    );
    
    $controls[] = array(
        'type'     => 'slider',
        'settings'  => 'tg_menu_padding',
        'label'    => esc_html__('Menu Padding', 'dotlife' ),
        'section'  => 'menu_typography',
        'default'  => 26,
        'choices' => array( 'min' => 0, 'max' => 150, 'step' => 1 ),
        'output' => array(
	        array(
	            'element'  => '#menu_wrapper .nav ul li, html[data-menu=centeralogo] #logo_right_button',
	            'property' => 'padding-top',
	            'units'    => 'px',
	        ),
	        array(
	            'element'  => '#menu_wrapper .nav ul li, html[data-menu=centeralogo] #logo_right_button',
	            'property' => 'padding-bottom',
	            'units'    => 'px',
	        ),
	    ),
	    'transport' 	 => 'postMessage',
	    'priority' => 11,
	    'js_vars'   => array(
			array(
				'element'  => '#menu_wrapper .nav ul li, html[data-menu=centeralogo] #logo_right_button',
				'function' => 'css',
				'property' => 'padding-top',
				'units'    => 'px',
			),
			array(
				'element'  => '#menu_wrapper .nav ul li, html[data-menu=centeralogo] #logo_right_button',
				'function' => 'css',
				'property' => 'padding-bottom',
				'units'    => 'px',
			),
		)
    );
    
    $controls[] = array(
        'type'     => 'title',
        'settings'  => 'tg_menu_main_colors_title',
        'label'    => esc_html__('Main Menu Colors Settings', 'dotlife' ),
        'section'  => 'menu_color',
	    'priority' => 3,
    );
    
    $controls[] = array(
        'type'     => 'color',
        'settings'  => 'tg_menu_bg',
        'label'    => esc_html__('Menu Background', 'dotlife' ),
        'section'  => 'menu_color',
	    'default'     => '#ffffff',
	    'output' => array(
	        array(
	            'element'  => '.top_bar, html',
	            'property' => 'background-color',
	        ),
	    ),
	    'priority' => 4,
	    'transport' 	 => 'postMessage',
	    'js_vars'   => array(
			array(
				'element'  => '.top_bar, html',
				'function' => 'css',
				'property' => 'background-color',
			),
		),
    );
    
    $controls[] = array(
        'type'     => 'color',
        'settings'  => 'tg_menu_font_color',
        'label'    => esc_html__('Menu Font Color', 'dotlife' ),
        'section'  => 'menu_color',
        'default'  => '#222222',
        'output' => array(
	        array(
	            'element'  => '#menu_wrapper .nav ul li a, #menu_wrapper div .nav li > a, #mobile_nav_icon, #logo_wrapper .social_wrapper ul li a, .header_cart_wrapper a',
	            'property' => 'color',
	        ),
	        array(
	            'element'  => '#mobile_nav_icon',
	            'property' => 'border-color',
	        ),
	    ),
	    'transport' 	 => 'postMessage',
	    'priority' => 5,
	    'js_vars'   => array(
			array(
				'element'  => '#menu_wrapper .nav ul li a, #menu_wrapper div .nav li > a, #mobile_nav_icon, #logo_wrapper .social_wrapper ul li a, .header_cart_wrapper a',
				'function' => 'css',
				'property' => 'color',
			),
			array(
				'element'  => '#mobile_nav_icon',
				'function' => 'css',
				'property' => 'border-color',
			),
		)
    );
    
    $controls[] = array(
        'type'     => 'color',
        'settings'  => 'tg_menu_hover_font_color',
        'label'    => esc_html__('Menu Hover State Font Color', 'dotlife' ),
        'section'  => 'menu_color',
        'default'  => '#0067DA',
        'output' => array(
	        array(
	            'element'  => '#menu_wrapper .nav ul li a.hover, #menu_wrapper .nav ul li a:hover, #menu_wrapper div .nav li a.hover, #menu_wrapper div .nav li a:hover, .header_cart_wrapper a:hover, #page_share:hover, #logo_wrapper .social_wrapper ul li a:hover',
	            'property' => 'color',
	        ),
	        array(
	            'element'  => '#menu_wrapper .nav ul li a:before, #menu_wrapper div .nav li > a:before',
	            'property' => 'background-color',
	        ),
	    ),
	    'transport' 	 => 'postMessage',
	    'priority' => 6,
	    'js_vars'   => array(
			array(
				'element'  => '#menu_wrapper .nav ul li a.hover, #menu_wrapper .nav ul li a:hover, #menu_wrapper div .nav li a.hover, #menu_wrapper div .nav li a:hover, .header_cart_wrapper a:hover, #page_share:hover, #logo_wrapper .social_wrapper ul li a:hover',
				'function' => 'css',
				'property' => 'color',
			),
			array(
	            'element'  => '#menu_wrapper .nav ul li a:before, #menu_wrapper div .nav li > a:before',
	            'property' => 'background-color',
	        ),
		)
    );
    
    $controls[] = array(
        'type'     => 'color',
        'settings'  => 'tg_menu_active_font_color',
        'label'    => esc_html__('Menu Active State Font Color', 'dotlife' ),
        'section'  => 'menu_color',
        'default'  => '#0067DA',
        'output' => array(
	        array(
	            'element'  => '#menu_wrapper div .nav > li.current-menu-item > a, #menu_wrapper div .nav > li.current-menu-parent > a, #menu_wrapper div .nav > li.current-menu-ancestor > a, #menu_wrapper div .nav li ul:not(.sub-menu) li.current-menu-item a, #menu_wrapper div .nav li.current-menu-parent  ul li.current-menu-item a, #logo_wrapper .social_wrapper ul li a:active',
	            'property' => 'color',
	        ),
	    ),
	    'transport' 	 => 'postMessage',
	    'priority' => 7,
	    'js_vars'   => array(
			array(
				'element'  => '#menu_wrapper div .nav > li.current-menu-item > a, #menu_wrapper div .nav > li.current-menu-parent > a, #menu_wrapper div .nav > li.current-menu-ancestor > a, #menu_wrapper div .nav li ul:not(.sub-menu) li.current-menu-item a, #menu_wrapper div .nav li.current-menu-parent  ul li.current-menu-item a, #logo_wrapper .social_wrapper ul li a:active',
				'function' => 'css',
				'property' => 'color',
			),
		)
    );
    
    $controls[] = array(
        'type'     => 'color',
        'settings'  => 'tg_menu_border_color',
        'label'    => esc_html__('Menu Bar Border Color', 'dotlife' ),
        'section'  => 'menu_color',
        'default'  => '#ffffff',
        'output' => array(
	        array(
	            'element'  => '.top_bar, #nav_wrapper',
	            'property' => 'border-color',
	        ),
	    ),
	    'transport' 	 => 'postMessage',
	    'priority' => 7,
	    'js_vars'   => array(
			array(
				'element'  => '.top_bar, #nav_wrapper',
				'function' => 'css',
				'property' => 'border-color',
			),
		)
    );
    
    $controls[] = array(
        'type'     => 'title',
        'settings'  => 'tg_menu_icon_colors_title',
        'label'    => esc_html__('Icon Colors Settings', 'dotlife' ),
        'section'  => 'menu_color',
	    'priority' => 8,
    );
    
    $controls[] = array(
        'type'     => 'color',
        'settings'  => 'tg_menu_cart_bg',
        'label'    => esc_html__('Cart Counter Background', 'dotlife' ),
        'section'  => 'menu_color',
	    'default'     => '#0067DA',
	    'output' => array(
	        array(
	            'element'  => '.header_cart_wrapper .cart_count',
	            'property' => 'background-color',
	        ),
	    ),
	    'priority' => 9,
	    'transport' 	 => 'postMessage',
	    'js_vars'   => array(
			array(
				'element'  => '.header_cart_wrapper .cart_count',
				'function' => 'css',
				'property' => 'background-color',
			),
		),
    );
    
    $controls[] = array(
        'type'     => 'color',
        'settings'  => 'tg_menu_cart_font_color',
        'label'    => esc_html__('Cart Counter Font Color', 'dotlife' ),
        'section'  => 'menu_color',
        'default'  => '#ffffff',
        'output' => array(
	        array(
	            'element'  => '.header_cart_wrapper .cart_count',
	            'property' => 'color',
	        ),
	    ),
	    'transport' 	 => 'postMessage',
	    'priority' => 10,
	    'js_vars'   => array(
			array(
				'element'  => '.header_cart_wrapper .cart_count',
				'function' => 'css',
				'property' => 'color',
			),
		)
    );
    
    $controls[] = array(
        'type'     => 'title',
        'settings'  => 'tg_submenu_font_title',
        'label'    => esc_html__('Typography Settings', 'dotlife' ),
        'section'  => 'menu_submenu',
	    'priority' => 8,
    );
    
    $controls[] = array(
        'type'     => 'typography',
        'settings'  => 'tg_submenu_typography',
        'label'    => esc_html__('Sub Menu Typography', 'dotlife' ),
        'section'  => 'menu_submenu',
        'default'  => array(
			'font-family'    => 'Jost',
			'variant'        => '500',
			'font-size'      => '14px',
			'letter-spacing' => '0',
			'text-transform' => 'none',
		),
        'output' => array(
	        array(
	            'element'  => '#menu_wrapper .nav ul li ul li a, #menu_wrapper div .nav li ul li a, #menu_wrapper div .nav li.current-menu-parent ul li a',
	        ),
	    ),
	    'priority' => 9,
    );
    
    $controls[] = array(
        'type'     => 'title',
        'settings'  => 'tg_submenu_color_title',
        'label'    => esc_html__('Color Settings', 'dotlife' ),
        'section'  => 'menu_submenu',
	    'priority' => 12,
    );
    
    $controls[] = array(
        'type'     => 'color',
        'settings'  => 'tg_submenu_font_color',
        'label'    => esc_html__('Sub Menu Font Color', 'dotlife' ),
        'section'  => 'menu_submenu',
        'default'  => '#222222',
        'output' => array(
	        array(
	            'element'  => '#menu_wrapper .nav ul li ul li a, #menu_wrapper div .nav li ul li a, #menu_wrapper div .nav li.current-menu-parent ul li a, #menu_wrapper div .nav li.current-menu-parent ul li.current-menu-item a, #menu_wrapper .nav ul li.megamenu ul li ul li a, #menu_wrapper div .nav li.megamenu ul li ul li a',
	            'property' => 'color',
	        ),
	    ),
	    'transport' 	 => 'postMessage',
	    'priority' => 13,
	    'js_vars'   => array(
			array(
				'element'  => '#menu_wrapper .nav ul li ul li a, #menu_wrapper div .nav li ul li a, #menu_wrapper div .nav li.current-menu-parent ul li a, #menu_wrapper div .nav li.current-menu-parent ul li.current-menu-item a, #menu_wrapper .nav ul li.megamenu ul li ul li a, #menu_wrapper div .nav li.megamenu ul li ul li a',
				'function' => 'css',
				'property' => 'color',
			),
		)
    );
    
    $controls[] = array(
        'type'     => 'color',
        'settings'  => 'tg_submenu_hover_font_color',
        'label'    => esc_html__('Sub Menu Hover State Font Color', 'dotlife' ),
        'section'  => 'menu_submenu',
        'default'  => '#0067DA',
        'output' => array(
	        array(
	            'element'  => '#menu_wrapper .nav ul li ul li a:hover, #menu_wrapper div .nav li ul li a:hover, #menu_wrapper div .nav li.current-menu-parent ul li a:hover, #menu_wrapper .nav ul li.megamenu ul li ul li a:hover, #menu_wrapper div .nav li.megamenu ul li ul li a:hover, #menu_wrapper .nav ul li.megamenu ul li ul li a:active, #menu_wrapper div .nav li.megamenu ul li ul li a:active, #menu_wrapper div .nav li.current-menu-parent ul li.current-menu-item  a:hover',
	            'property' => 'color',
	        ),
	        array(
	            'element'  => '#menu_wrapper .nav ul li ul li a:before, #menu_wrapper div .nav li ul li > a:before, #wrapper.transparent .top_bar:not(.scroll) #menu_wrapper div .nav ul li ul li a:before',
	            'property' => 'background-color',
	        ),
	    ),
	    'transport' 	 => 'postMessage',
	    'priority' => 14,
	    'js_vars'   => array(
			array(
				'element'  => '#menu_wrapper .nav ul li ul li a:hover, #menu_wrapper div .nav li ul li a:hover, #menu_wrapper div .nav li.current-menu-parent ul li a:hover, #menu_wrapper .nav ul li.megamenu ul li ul li a:hover, #menu_wrapper div .nav li.megamenu ul li ul li a:hover, #menu_wrapper .nav ul li.megamenu ul li ul li a:active, #menu_wrapper div .nav li.megamenu ul li ul li a:active, #menu_wrapper div .nav li.current-menu-parent ul li.current-menu-item  a:hover',
				'function' => 'css',
				'property' => 'color',
			),
			array(
	            'element'  => '#menu_wrapper .nav ul li ul li a:before, #menu_wrapper div .nav li ul li > a:before, #wrapper.transparent .top_bar:not(.scroll) #menu_wrapper div .nav ul li ul li a:before',
	            'property' => 'background-color',
	        ),
		)
    );
    
    $controls[] = array(
        'type'     => 'color',
        'settings'  => 'tg_submenu_bg_color',
        'label'    => esc_html__('Sub Menu Background Color', 'dotlife' ),
        'section'  => 'menu_submenu',
        'default'  => '#ffffff',
        'output' => array(
	        array(
	            'element'  => '#menu_wrapper .nav ul li ul, #menu_wrapper div .nav li ul',
	            'property' => 'background',
	        ),
	    ),
	    'transport' 	 => 'postMessage',
	    'priority' => 16,
	    'js_vars'   => array(
			array(
				'element'  => '#menu_wrapper .nav ul li ul, #menu_wrapper div .nav li ul',
				'function' => 'css',
				'property' => 'background',
			),
		)
    );
    
    $controls[] = array(
        'type'     => 'color',
        'settings'  => 'tg_submenu_border_color',
        'label'    => esc_html__('Sub Menu Border Color', 'dotlife' ),
        'section'  => 'menu_submenu',
        'default'  => '#d8d8d8',
        'output' => array(
	        array(
	            'element'  => '#menu_wrapper .nav ul li ul, #menu_wrapper div .nav li ul',
	            'property' => 'border-color',
	        ),
	    ),
	    'transport' 	 => 'postMessage',
	    'priority' => 17,
	    'js_vars'   => array(
			array(
				'element'  => '#menu_wrapper .nav ul li ul, #menu_wrapper div .nav li ul',
				'function' => 'css',
				'property' => 'border-color',
			),
		)
    );
    
    $controls[] = array(
        'type'     => 'color',
        'settings'  => 'tg_megamenu_header_color',
        'label'    => esc_html__('Mega Menu Header Font Color', 'dotlife' ),
        'section'  => 'menu_megamenu',
        'default'  => '#222222',
        'output' => array(
	        array(
	            'element'  => '#menu_wrapper div .nav li.megamenu ul li > a, #menu_wrapper div .nav li.megamenu ul li > a:hover, #menu_wrapper div .nav li.megamenu ul li > a:active, #menu_wrapper div .nav li.megamenu ul li.current-menu-item > a',
	            'property' => 'color',
	        ),
	    ),
	    'transport' 	 => 'postMessage',
	    'priority' => 18,
	    'js_vars'   => array(
			array(
				'element'  => '#menu_wrapper div .nav li.megamenu ul li > a, #menu_wrapper div .nav li.megamenu ul li > a:hover, #menu_wrapper div .nav li.megamenu ul li > a:active, #menu_wrapper div .nav li.megamenu ul li.current-menu-item > a',
				'function' => 'css',
				'property' => 'color',
			),
		)
    );
    
    $controls[] = array(
        'type'     => 'color',
        'settings'  => 'tg_megamenu_border_color',
        'label'    => esc_html__('Mega Menu Border Color', 'dotlife' ),
        'section'  => 'menu_megamenu',
        'default'  => '#eeeeee',
        'output' => array(
	        array(
	            'element'  => '#menu_wrapper div .nav li.megamenu ul li',
	            'property' => 'border-color',
	        ),
	    ),
	    'transport' 	 => 'postMessage',
	    'priority' => 20,
	    'js_vars'   => array(
			array(
				'element'  => '#menu_wrapper div .nav li.megamenu ul li',
				'function' => 'css',
				'property' => 'border-color',
			),
		)
    );
    
    $controls[] = array(
        'type'     => 'toggle',
        'settings'  => 'tg_topbar',
        'label'    => esc_html__('Display Top Bar', 'dotlife' ),
        'description' => esc_html__('Enable this option to display top bar above main menu', 'dotlife' ),
        'section'  => 'menu_topbar',
        'default'  => 0,
	    'priority' => 21,
    );
    
    $controls[] = array(
        'type'     => 'color',
        'settings'  => 'tg_topbar_bg_color',
        'label'    => esc_html__('Top Bar Background Color', 'dotlife' ),
        'section'  => 'menu_topbar',
        'default'  => '#222222',
        'output' => array(
	        array(
	            'element'  => '.above_top_bar',
	            'property' => 'background',
	        ),
	    ),
	    'transport' 	 => 'postMessage',
	    'priority' => 22,
	    'js_vars'   => array(
			array(
				'element'  => '.above_top_bar',
				'function' => 'css',
				'property' => 'background',
			),
		)
    );
    
    $controls[] = array(
        'type'     => 'color',
        'settings'  => 'tg_topbar_font_color',
        'label'    => esc_html__('Top Bar Menu Font Color', 'dotlife' ),
        'section'  => 'menu_topbar',
        'default'  => '#ffffff',
        'output' => array(
	        array(
	            'element'  => '#top_menu li a, .top_contact_info, .top_contact_info i, .top_contact_info a, .top_contact_info a:hover, .top_contact_info a:active',
	            'property' => 'color',
	        ),
	    ),
	    'transport' 	 => 'postMessage',
	    'priority' => 23,
	    'js_vars'   => array(
			array(
				'element'  => '#top_menu li a, .top_contact_info, .top_contact_info i, .top_contact_info a, .top_contact_info a:hover, .top_contact_info a:active',
				'function' => 'css',
				'property' => 'color',
			),
		)
    );
    
    $controls[] = array(
        'type'     => 'text',
        'settings'  => 'tg_menu_contact_hours',
        'label'    => esc_html__('Contact Hours (Optional)', 'dotlife' ),
        'description' => esc_html__('Enter your company contact hours.', 'dotlife' ),
        'section'  => 'menu_contact',
        'default'  => 'Mon-Fri 09.00 - 17.00',
        'transport' 	 => 'postMessage',
	    'priority' => 26,
    );
    
    $controls[] = array(
        'type'     => 'text',
        'settings'  => 'tg_menu_contact_number',
        'label'    => esc_html__('Contact Phone Number (Optional)', 'dotlife' ),
        'description' => esc_html__('Enter your company contact phone number.', 'dotlife' ),
        'section'  => 'menu_contact',
        'default'  => '1.800.456.6743',
        'transport' => 'postMessage',
	    'priority' => 27,
    );
    
    $controls[] = array(
        'type'     => 'toggle',
        'settings'  => 'tg_topbar_social_link',
        'label'    => esc_html__('Open Top Bar Social Icons link in new window', 'dotlife' ),
        'description' => esc_html__('Check this to open top bar social icons link in new window', 'dotlife' ),
        'section'  => 'menu_contact',
        'default'  => 1,
	    'priority' => 28,
    );
    
    $controls[] = array(
        'type'     => 'title',
        'settings'  => 'tg_sidemenu_general_title',
        'label'    => esc_html__('General Settings', 'dotlife' ),
        'section'  => 'menu_sidemenu',
        'priority' => 29,
    );
    
    $controls[] = array(
        'type'     => 'toggle',
        'settings'  => 'tg_sidemenu',
        'label'    => esc_html__('Enable Side Menu on Desktop', 'dotlife' ),
        'description' => 'Check this option to enable side menu on desktop',
        'section'  => 'menu_sidemenu',
        'default'  => 0,
	    'priority' => 31,
    );
    
    
    $controls[] = array(
        'type'     => 'toggle',
        'settings'  => 'tg_sidemenu_close',
        'label'    => esc_html__('Display Close Menu Button', 'dotlife' ),
        'description' => 'Check this option to display close menu button when side menu is opened',
        'section'  => 'menu_sidemenu',
        'default'  => 0,
	    'priority' => 31,
    );
    $controls[] = array(
        'type'     => 'title',
        'settings'  => 'tg_sidemenu_font_title',
        'label'    => esc_html__('Typography Settings', 'dotlife' ),
        'section'  => 'menu_sidemenu',
	    'priority' => 31,
    );
    
    $controls[] = array(
        'type'     => 'typography',
        'settings'  => 'tg_sidemenu_typography',
        'label'    => esc_html__('Side Menu Typography', 'dotlife' ),
        'section'  => 'menu_sidemenu',
        'default'  => array(
			'font-family'    => 'Jost',
			'variant'        => '500',
			'font-size'      => '18px',
			'line-height'    => '2',
			'letter-spacing' => '0',
			'text-transform' => 'none',
		),
        'output' => array(
	        array(
	            'element'  => '.mobile_main_nav li a, #sub_menu li a',
	        ),
	    ),
	    'priority' => 32
    );
    
    $controls[] = array(
        'type'     => 'typography',
        'settings'  => 'tg_side_submenu_typography',
        'label'    => esc_html__('Side Sub Menu Typography', 'dotlife' ),
        'section'  => 'menu_sidemenu',
        'default'  => array(
			'font-family'    => 'Jost',
			'variant'        => '500',
			'font-size'      => '18px',
			'line-height'    => '2',
			'letter-spacing' => '0',
			'text-transform' => 'none',
		),
        'output' => array(
	        array(
	            'element'  => '#sub_menu li a',
	        ),
	    ),
	    'priority' => 32
    );
    
    $controls[] = array(
        'type'     => 'slider',
        'settings'  => 'tg_sidemenu_icon_size',
        'label'    => esc_html__('Side Menu Icon Size', 'photography' ),
        'section'  => 'menu_sidemenu',
        'default'  => 12,
        'choices' => array( 'min' => 11, 'max' => 40, 'step' => 1 ),
        'output' => array(
            array(
                'element'  => '.mobile_main_nav li.menu-item-has-link.menu-item-has-children > a.menu-item-icon-link',
                'property' => 'font-size',
                'units'    => 'px',
            ),
        ),
        'priority' => 33,
    );
    
    $controls[] = array(
        'type'     => 'title',
        'settings'  => 'tg_sidemenu_bg_title',
        'label'    => esc_html__('Color Settings', 'dotlife' ),
        'section'  => 'menu_sidemenu',
	    'priority' => 35,
    );
    
    $controls[] = array(
        'type'     => 'color',
        'settings'  => 'tg_sidemenu_bg',
        'label'    => esc_html__('Side Menu Background', 'dotlife' ),
        'section'  => 'menu_sidemenu',
	    'default'  => '#000000',
	    'output' => array(
	        array(
	            'element'  => '.mobile_menu_wrapper',
	            'property' => 'background-color',
	        ),
	    ),
	    'transport' 	 => 'postMessage',
	    'js_vars'   => array(
			array(
	            'element'  => '.mobile_menu_wrapper',
	            'property' => 'background-color',
	        ),
		),
	    'priority' => 36,
    );
    
    $controls[] = array(
        'type'     => 'color',
        'settings'  => 'tg_sidemenu_font_color',
        'label'    => esc_html__('Side Menu Font Color', 'dotlife' ),
        'section'  => 'menu_sidemenu',
        'default'  => '#ffffff',
        'output' => array(
	        array(
	            'element'  => '.mobile_main_nav li a, #sub_menu li a, .mobile_menu_wrapper .sidebar_wrapper a, .mobile_menu_wrapper .sidebar_wrapper, #close_mobile_menu i, .mobile_menu_wrapper .social_wrapper ul li a, .fullmenu_content #copyright, .mobile_menu_wrapper .sidebar_wrapper h2.widgettitle',
	            'property' => 'color',
	        ),
	    ),
	    'transport' 	 => 'postMessage',
	    'priority' => 37,
	    'js_vars'   => array(
			array(
				'element'  => '.mobile_main_nav li a, #sub_menu li a, .mobile_menu_wrapper .sidebar_wrapper a, .mobile_menu_wrapper .sidebar_wrapper, #close_mobile_menu i, .mobile_menu_wrapper .social_wrapper ul li a, .fullmenu_content #copyright, .mobile_menu_wrapper .sidebar_wrapper h2.widgettitle',
				'function' => 'css',
				'property' => 'color',
			),
		)
    );
    
    $controls[] = array(
        'type'     => 'color',
        'settings'  => 'tg_sidemenu_font_hover_color',
        'label'    => esc_html__('Side Menu Hover State Font Color', 'dotlife' ),
        'section'  => 'menu_sidemenu',
        'default'  => '#ffffff',
        'output' => array(
	        array(
	            'element'  => '.mobile_main_nav li a:hover, .mobile_main_nav li a:active, #sub_menu li a:hover, #sub_menu li a:active, .mobile_menu_wrapper .social_wrapper ul li a:hover',
	            'property' => 'color',
	        ),
	    ),
	    'transport' 	 => 'postMessage',
	    'priority' => 38,
	    'js_vars'   => array(
			array(
				'element'  => '.mobile_main_nav li a:hover, .mobile_main_nav li a:active, #sub_menu li a:hover, #sub_menu li a:active, .mobile_menu_wrapper .social_wrapper ul li a:hover',
				'function' => 'css',
				'property' => 'color',
			),
		)
    );
    
    $controls[] = array(
        'type'     => 'select',
        'settings'  => 'dotlife_fullmenu_default',
        'label'    => esc_html__('Default Fullscreen Menu (Optional)', 'dotlife' ),
        'description' => esc_html__('Select default fullscreen menu for all pages', 'dotlife' ),
        'section'  => 'menu_fullmenu',
        'default'  => '',
        'choices'  => $dotlife_fullmenu_select,
        'priority' => 1,
    );
    
    $controls[] = array(
        'type'     => 'select',
        'settings'  => 'dotlife_fullmenu_effect',
        'label'    => esc_html__('Fullscreen Menu Effect', 'hoteller' ),
        'description' => esc_html__('Select transition effect for fullscreen menu', 'hoteller' ),
        'section'  => 'menu_fullmenu',
        'default'  => '',
        'choices'  => $dotlife_fullmenu_effect_select,
        'priority' => 2,
    );
    //End Menu Tab Settings
    
    //Register Header Tab Settings
    $controls[] = array(
        'type'     => 'title',
        'settings'  => 'tg_page_header_bg_title',
        'label'    => esc_html__('Background Image Settings', 'dotlife' ),
        'section'  => 'header_background',
	    'priority' => 0,
    );
    
    $controls[] = array(
        'type'     => 'slider',
        'settings'  => 'tg_page_title_bg_height',
        'label'    => esc_html__('Page Title Background Image Height (in px)', 'dotlife' ),
        'section'  => 'header_background',
        'default'  => 600,
        'choices' => array( 'min' => 100, 'max' => 1000, 'step' => 5 ),
        'output' => array(
	        array(
	            'element'  => '#page_caption.hasbg',
	            'property' => 'height',
	            'units'    => 'px',
	        ),
	    ),
	    'transport' 	 => 'postMessage',
	    'priority' => 1,
	    'js_vars'   => array(
			array(
				'element'  => '#page_caption.hasbg',
				'function' => 'css',
				'property' => 'height',
				'units'    => 'px',
			),
		)
    );
    
    $controls[] = array(
        'type'     => 'slider',
        'settings'  => 'tg_page_title_bg_overlay',
        'label'    => esc_html__('Page Title Background Image Overlay Opacity (in %)', 'dotlife' ),
        'section'  => 'header_background',
        'default'  => 30,
        'choices' => array( 'min' => 10, 'max' => 100, 'step' => 5 ),
	    'priority' => 1
    );
    
    $controls[] = array(
        'type'     => 'toggle',
        'settings'  => 'tg_page_header_bg_parallax',
        'label'    => esc_html__('Add Parallax Effect When Scroll', 'dotlife' ),
        'description' => esc_html__('Enable this option to add parallax effect to header background image when scrolling pass it', 'dotlife' ),
        'section'  => 'header_background',
        'default'  => '1',
	    'priority' => 1,
    );
    
    $controls[] = array(
        'type'     => 'title',
        'settings'  => 'tg_page_header_bgcolor_title',
        'label'    => esc_html__('Background Color Settings', 'dotlife' ),
        'section'  => 'header_background',
	    'priority' => 1,
    );
    
    $controls[] = array(
        'type'     => 'color',
        'settings'  => 'tg_page_header_bg_color',
        'label'    => esc_html__('Page Header Background Color', 'dotlife' ),
        'section'  => 'header_background',
        'default'  => '#ffffff',
        'output' => array(
	        array(
	            'element'  => '#page_caption, body #learn-press-profile .wrapper-profile-header',
	            'property' => 'background-color',
	        ),
	    ),
	    'transport' 	 => 'postMessage',
	    'priority' => 2,
	    'js_vars'   => array(
			array(
				'element'  => '#page_caption, body #learn-press-profile .wrapper-profile-header',
				'function' => 'css',
				'property' => 'background-color',
			),
		)
    );
    
    $controls[] = array(
        'type'     => 'title',
        'settings'  => 'tg_page_title_layout_title',
        'label'    => esc_html__('Layout Settings', 'dotlife' ),
        'section'  => 'header_title',
        'priority' => 1,
    );
    
    $controls[] = array(
        'type'     => 'radio',
        'settings'  => 'tg_page_title_font_alignment',
        'label'    => esc_html__('Page Title Alignment', 'dotlife' ),
        'description' => esc_html__('Select alignment for page title', 'dotlife' ),
        'section'  => 'header_title',
        'default'  => 'center',
        'choices'  => $tg_text_alignment,
        'output' => array(
	        array(
	            'element'  => '#page_caption .page_title_wrapper .page_title_inner, body.single-post #page_content_wrapper.blog_wrapper .page_title_content',
	            'property' => 'text-align',
	        ),
	    ),
	    'js_vars'   => array(
			array(
				'element'  => '#page_caption .page_title_wrapper .page_title_inner',
				'function' => 'css',
				'property' => 'text-align',
			),
		),
	    'transport' 	 => 'postMessage',
	    'priority' => 2,
    );
    
    $controls[] = array(
        'type'     => 'slider',
        'settings'  => 'tg_page_header_padding_top',
        'label'    => esc_html__('Page Header Padding Top', 'dotlife' ),
        'section'  => 'header_title',
        'default'  => 60,
        'choices' => array( 'min' => 0, 'max' => 200, 'step' => 1 ),
        'output' => array(
	        array(
	            'element'  => '#page_caption',
	            'property' => 'padding-top',
	            'units'    => 'px',
	        ),
	    ),
	    'transport' 	 => 'postMessage',
	    'priority' => 3,
	    'js_vars'   => array(
			array(
				'element'  => '#page_caption',
				'function' => 'css',
				'property' => 'padding-top',
				'units'    => 'px',
			),
		)
    );
    
    $controls[] = array(
        'type'     => 'slider',
        'settings'  => 'tg_page_header_padding_bottom',
        'label'    => esc_html__('Page Header Padding Bottom', 'dotlife' ),
        'section'  => 'header_title',
        'default'  => 60,
        'choices' => array( 'min' => 0, 'max' => 200, 'step' => 1 ),
        'output' => array(
	        array(
	            'element'  => '#page_caption',
	            'property' => 'padding-bottom',
	            'units'    => 'px',
	        ),
	    ),
	    'transport' 	 => 'postMessage',
	    'priority' => 4,
	    'js_vars'   => array(
			array(
				'element'  => '#page_caption',
				'function' => 'css',
				'property' => 'padding-bottom',
				'units'    => 'px',
			),
		)
    );
    
    $controls[] = array(
        'type'     => 'slider',
        'settings'  => 'tg_page_header_marging_bottom',
        'label'    => esc_html__('Page Header Margin Bottom', 'dotlife' ),
        'section'  => 'header_title',
        'default'  => 45,
        'choices' => array( 'min' => 0, 'max' => 200, 'step' => 1 ),
        'output' => array(
	        array(
	            'element'  => '#page_caption',
	            'property' => 'margin-bottom',
	            'units'    => 'px',
	        ),
	    ),
	    'transport' 	 => 'postMessage',
	    'priority' => 4,
	    'js_vars'   => array(
			array(
				'element'  => '#page_caption',
				'function' => 'css',
				'property' => 'margin-bottom',
				'units'    => 'px',
			),
		)
    );
    
    $controls[] = array(
        'type'     => 'title',
        'settings'  => 'tg_page_title_typography_title',
        'label'    => esc_html__('Typography Settings', 'dotlife' ),
        'section'  => 'header_title',
        'priority' => 5,
    );
    
    $controls[] = array(
        'type'     => 'typography',
        'settings'  => 'tg_page_title_typography',
        'label'    => esc_html__('Page Title Typography', 'dotlife' ),
        'section'  => 'header_title',
        'default'  => array(
			'font-family'    => 'Jost',
			'variant'        => '700',
			'font-size'      => '45px',
			'line-height'    => '1.2',
			'letter-spacing' => '0',
			'text-transform' => 'none',
			'color'			 => '#222222',
		),
        'output' => array(
	        array(
	            'element'  => '#page_caption h1',
	        ),
	    ),
	    'priority' => 6,
    );
    
    $controls[] = array(
        'type'     => 'typography',
        'settings'  => 'tg_page_tagline_typography',
        'label'    => esc_html__('Page Tagline Typography', 'dotlife' ),
        'section'  => 'header_tagline',
        'default'  => array(
			'font-family'    => 'Jost',
			'variant'        => 'regular',
			'font-size'      => '13px',
			'letter-spacing' => '2px',
			'text-transform' => 'uppercase',
			'color'			 => '#222222',
		),
        'output' => array(
	        array(
	            'element'  => '.page_tagline, .thumb_content span, .portfolio_desc .portfolio_excerpt, .testimonial_customer_position, .testimonial_customer_company, .post_detail.single_post',
	        ),
	    ),
	    'priority' => 6,
    );
    //End Header Tab Settings
    
    $controls[] = array(
        'type'     => 'toggle',
        'settings'  => 'tg_sidebar_sticky',
        'label'    => esc_html__('Enable Sticky Sidebar', 'dotlife' ),
        'description' => esc_html__('Check this to displays sidebar fixed when scrolling.', 'dotlife' ),
        'section'  => 'sidebar_general',
        'default'  => 1,
	    'priority' => 11,
    );
    
    $controls[] = array(
        'type'     => 'typography',
        'settings'  => 'tg_sidebar_title_typography',
        'label'    => esc_html__('Widget Title Typography', 'dotlife' ),
        'section'  => 'sidebar_typography',
        'default'  => array(
			'font-family'    => 'Jost',
			'variant'        => '700',
			'font-size'      => '18px',
			'letter-spacing' => '0px',
			'text-transform' => 'none',
		),
        'output' => array(
	        array(
	            'element'  => '#page_content_wrapper .sidebar .content .sidebar_widget li h2.widgettitle, h2.widgettitle, h5.widgettitle, .sidebar_widget .widget_block h2',
	        ),
	    ),
	    'transport' 	 => 'postMessage',
	    'priority' => 1,
    );
        
    $controls[] = array(
        'type'     => 'color',
        'settings'  => 'tg_sidebar_font_color',
        'label'    => esc_html__('Sidebar Font Color', 'dotlife' ),
        'section'  => 'sidebar_color',
        'default'  => '#222222',
        'output' => array(
	        array(
	            'element'  => '#page_content_wrapper .inner .sidebar_wrapper .sidebar .content, .page_content_wrapper .inner .sidebar_wrapper .sidebar .content',
	            'property' => 'color',
	        ),
	    ),
	    'transport' 	 => 'postMessage',
	    'priority' => 6,
	    'js_vars'   => array(
			array(
				'element'  => '#page_content_wrapper .inner .sidebar_wrapper .sidebar .content, .page_content_wrapper .inner .sidebar_wrapper .sidebar .content',
				'function' => 'css',
				'property' => 'color',
			),
		)
    );
    
    $controls[] = array(
        'type'     => 'color',
        'settings'  => 'tg_sidebar_link_color',
        'label'    => esc_html__('Sidebar Link Color', 'dotlife' ),
        'section'  => 'sidebar_color',
        'default'  => '#222222',
        'output' => array(
	        array(
	            'element'  => '#page_content_wrapper .inner .sidebar_wrapper a:not(.button), .page_content_wrapper .inner .sidebar_wrapper a:not(.button)',
	            'property' => 'color',
	        ),
	    ),
	    'transport' 	 => 'postMessage',
	    'priority' => 7,
	    'js_vars'   => array(
			array(
				'element'  => '#page_content_wrapper .inner .sidebar_wrapper a:not(.button), .page_content_wrapper .inner .sidebar_wrapper a:not(.button)',
				'function' => 'css',
				'property' => 'color',
			),
		)
    );
    
    $controls[] = array(
        'type'     => 'color',
        'settings'  => 'tg_sidebar_hover_link_color',
        'label'    => esc_html__('Sidebar Hover Link Color', 'dotlife' ),
        'section'  => 'sidebar_color',
        'default'  => '#0067DA',
        'output' => array(
	        array(
	            'element'  => '#page_content_wrapper .inner .sidebar_wrapper a:hover:not(.button), #page_content_wrapper .inner .sidebar_wrapper a:active:not(.button), .page_content_wrapper .inner .sidebar_wrapper a:hover:not(.button), .page_content_wrapper .inner .sidebar_wrapper a:active:not(.button)',
	            'property' => 'color',
	        ),
	        array(
	            'element'  => '#page_content_wrapper .inner .sidebar_wrapper a:not(.button):before',
	            'property' => 'background-color',
	        ),
	    ),
	    'transport' 	 => 'postMessage',
	    'priority' => 8,
	    'js_vars'   => array(
			array(
				'element'  => '#page_content_wrapper .inner .sidebar_wrapper a:hover:not(.button), #page_content_wrapper .inner .sidebar_wrapper a:active:not(.button), .page_content_wrapper .inner .sidebar_wrapper a:hover:not(.button), .page_content_wrapper .inner .sidebar_wrapper a:active:not(.button)',
				'function' => 'css',
				'property' => 'color',
			),
			array(
	            'element'  => '#page_content_wrapper .inner .sidebar_wrapper a:not(.button):before',
	            'function' => 'css',
	            'property' => 'background-color',
	        ),
		)
    );
    
    $controls[] = array(
        'type'     => 'color',
        'settings'  => 'tg_sidebar_title_color',
        'label'    => esc_html__('Sidebar Widget Title Font Color', 'dotlife' ),
        'section'  => 'sidebar_color',
        'default'  => '#222222',
        'output' => array(
	        array(
	            'element'  => '#page_content_wrapper .sidebar .content .sidebar_widget li h2.widgettitle, h2.widgettitle, h5.widgettitle, .sidebar_widget .widget_block h2',
	            'property' => 'color',
	        ),
	        array(
	            'element'  => '#page_content_wrapper .sidebar .content .sidebar_widget li h2.widgettitle, h2.widgettitle, h5.widgettitle, .sidebar_widget .widget_block h2',
	            'property' => 'border-color',
	        ),
	    ),
	    'transport' 	 => 'postMessage',
	    'priority' => 9,
	    'js_vars'   => array(
			array(
				'element'  => '#page_content_wrapper .sidebar .content .sidebar_widget li h2.widgettitle, h2.widgettitle, h5.widgettitle, .sidebar_widget .widget_block h2',
				'function' => 'css',
				'property' => 'color',
			),
			array(
				'element'  => '#page_content_wrapper .sidebar .content .sidebar_widget li h2.widgettitle, h2.widgettitle, h5.widgettitle, .sidebar_widget .widget_block h2',
				'function' => 'css',
				'property' => 'border-color',
			),
		)
    );
    //End Sidebar Tab Settings
    
    //Register Footer Tab Settings
    
    $controls[] = array(
        'type'     => 'title',
        'settings'  => 'tg_footer_content_title',
        'label'    => esc_html__('Footer Content Settings', 'dotlife' ),
        'section'  => 'footer_general',
	    'priority' => 0,
    );
    
    $controls[] = array(
        'type'     => 'radio',
        'settings'  => 'tg_footer_content',
        'label'    => esc_html__('Display Footer Content From', 'dotlife' ),
        'description' => esc_html__('Select how theme get main footer content', 'dotlife' ),
        'section'  => 'footer_general',
        'default'  => 'sidebar',
        'choices'  => $tg_footer_content,
	    'priority' => 1,
    );
    
    $controls[] = array(
        'type'     => 'select',
        'settings'  => 'tg_footer_content_default',
        'label'    => esc_html__('Default Footer Content', 'dotlife' ),
        'description' => esc_html__('Select default footer content for general pages & posts', 'dotlife' ),
        'section'  => 'footer_general',
        'default'  => '',
        'choices'  => $tg_footers_select,
	    'priority' => 1,
    );
    
    $controls[] = array(
        'type'     => 'title',
        'settings'  => 'tg_footer_sidebar_title',
        'label'    => esc_html__('Footer Sidebar Settings', 'dotlife' ),
        'section'  => 'footer_general',
	    'priority' => 2,
    );
    
    $controls[] = array(
        'type'     => 'radio',
        'settings'  => 'tg_footer_sidebar',
        'label'    => esc_html__('Footer Sidebar Columns', 'dotlife' ),
        'section'  => 'footer_general',
        'default'  => '3',
        'choices'  => $tg_copyright_column,
	    'priority' => 3,
    );
    
    $controls[] = array(
        'type'     => 'slider',
        'settings'  => 'tg_footer_font_size',
        'label'    => esc_html__('Footer Font Size', 'dotlife' ),
        'section'  => 'footer_general',
        'default'  => 15,
        'choices' => array( 'min' => 10, 'max' => 30, 'step' => 1 ),
        'output' => array(
	        array(
	            'element'  => '#footer',
	            'property' => 'font-size',
	            'units'    => 'px',
	        ),
	    ),
	    'transport' 	 => 'postMessage',
	    'priority' => 4,
	    'js_vars'   => array(
			array(
				'element'  => '#footer',
				'function' => 'css',
				'property' => 'font-size',
				'units'    => 'px',
			),
		)
    );
    
    $controls[] = array(
        'type'     => 'slider',
        'settings'  => 'tg_copyright_font_size',
        'label'    => esc_html__('Copyright Font Size', 'dotlife' ),
        'section'  => 'footer_general',
        'default'  => 13,
        'choices' => array( 'min' => 10, 'max' => 30, 'step' => 1 ),
        'output' => array(
	        array(
	            'element'  => '.footer_bar_wrapper',
	            'property' => 'font-size',
	            'units'    => 'px',
	        ),
	    ),
	    'transport' 	 => 'postMessage',
	    'priority' => 10,
	    'js_vars'   => array(
			array(
				'element'  => '.footer_bar_wrapper',
				'function' => 'css',
				'property' => 'font-size',
				'units'    => 'px',
			),
		)
    );
    
    $controls[] = array(
        'type'     => 'toggle',
        'settings'  => 'tg_footer_social_link',
        'label'    => esc_html__('Open Footer Social Icons link in new window', 'dotlife' ),
        'description' => esc_html__('Check this to open footer social icons link in new window', 'dotlife' ),
        'section'  => 'footer_general',
        'default'  => 1,
	    'priority' => 11,
    );
    
    $controls[] = array(
        'type'     => 'title',
        'settings'  => 'tg_footer_effect_title',
        'label'    => esc_html__('Footer Effect Settings', 'dotlife' ),
        'section'  => 'footer_general',
	    'priority' => 12,
    );
    
    $controls[] = array(
        'type'     => 'toggle',
        'settings'  => 'tg_footer_reveal',
        'label'    => esc_html__('Enable reveal effect for footer', 'dotlife' ),
        'description' => esc_html__('Check this to enable reveal effect for footer content', 'dotlife' ),
        'section'  => 'footer_general',
        'default'  => 0,
	    'priority' => 13,
    );
    
    $controls[] = array(
        'type'     => 'title',
        'settings'  => 'tg_footer_colors_title',
        'label'    => esc_html__('Footer Colors Settings', 'dotlife' ),
        'section'  => 'footer_color',
	    'priority' => 0,
    );
    
    $controls[] = array(
        'type'     => 'color',
        'settings'  => 'tg_footer_bg',
        'label'    => esc_html__('Footer Background', 'dotlife' ),
        'section'  => 'footer_color',
	    'priority' => 1,
	    'default'  => '#222222',
	    'output' => array(
	        array(
	            'element'  => '.footer_bar, #footer',
	            'property' => 'background-color',
	        ),
	    ),
	    'js_vars'   => array(
			array(
				'element'  => '.footer_bar, #footer, #footer input[type=text], #footer input[type=password], #footer input[type=email], #footer input[type=url], #footer input[type=tel], #footer input[type=date], #footer textarea, #footer select, #footer_photostream',
				'function' => 'css',
				'property' => 'background-color',
			),
		),
    );
    
    $controls[] = array(
        'type'     => 'color',
        'settings'  => 'tg_footer_font_color',
        'label'    => esc_html__('Footer Font Color', 'dotlife' ),
        'section'  => 'footer_color',
        'default'  => '#999999',
        'output' => array(
	        array(
	            'element'  => '#footer, #copyright, #footer_menu li a, #footer_menu li a:hover, #footer_menu li a:active, #footer input[type=text], #footer input[type=password], #footer input[type=email], #footer input[type=url], #footer input[type=tel], #footer input[type=date], #footer textarea, #footer select, #footer blockquote',
	            'property' => 'color',
	        ),
	    ),
	    'transport' 	 => 'postMessage',
	    'priority' => 10,
	    'js_vars'   => array(
			array(
				'element'  => '#footer, #copyright, #footer_menu li a, #footer_menu li a:hover, #footer_menu li a:active, #footer input[type=text], #footer input[type=password], #footer input[type=email], #footer input[type=url], #footer input[type=tel], #footer input[type=date], #footer textarea, #footer select, #footer blockquote',
				'function' => 'css',
				'property' => 'color',
			),
		),
    );
    
    $controls[] = array(
        'type'     => 'color',
        'settings'  => 'tg_footer_link_color',
        'label'    => esc_html__('Footer Link Color', 'dotlife' ),
        'section'  => 'footer_color',
        'default'  => '#ffffff',
        'output' => array(
	        array(
	            'element'  => '#copyright a, #copyright a:active, #footer a, #footer a:active, #footer .sidebar_widget li h2.widgettitle, #footer_photostream a',
	            'property' => 'color',
	        ),
	        array(
	            'element'  => '#footer .sidebar_widget li h2.widgettitle',
	            'property' => 'border-color',
	        ),
	    ),
	    'js_vars'   => array(
			array(
				'element'  => '#copyright a, #copyright a:active, #footer a, #footer a:active, #footer .sidebar_widget li h2.widgettitle, #footer_photostream a',
				'function' => 'css',
				'property' => 'color',
			),
			array(
	            'element'  => '#footer .sidebar_widget li h2.widgettitle',
	            'function' => 'css',
	            'property' => 'border-color',
	        ),
		),
	    'transport' 	 => 'postMessage',
	    'priority' => 11,
    );
    
    $controls[] = array(
        'type'     => 'color',
        'settings'  => 'tg_footer_hover_link_color',
        'label'    => esc_html__('Footer Hover Link Color', 'dotlife' ),
        'section'  => 'footer_color',
        'default'  => '#ffffff',
        'output' => array(
	        array(
	            'element'  => '#copyright a:hover, #footer a:hover, .social_wrapper ul li a:hover, #footer a:hover, #footer_photostream a:hover',
	            'property' => 'color',
	        ),
	    ),
	    'transport' 	 => 'postMessage',
	    'priority' => 12,
	    'js_vars'   => array(
			array(
				'element'  => '#copyright a:hover, #footer a:hover, .social_wrapper ul li a:hover, #footer_wrapper a:hover, #footer_photostream a:hover',
				'function' => 'css',
				'property' => 'color',
			),
		),
    );
    
    $controls[] = array(
        'type'     => 'title',
        'settings'  => 'tg_copyright_colors_title',
        'label'    => esc_html__('Copyright Colors Settings', 'dotlife' ),
        'section'  => 'footer_color',
	    'priority' => 13,
    );
    
    $controls[] = array(
        'type'     => 'color',
        'settings'  => 'tg_copyright_bg',
        'label'    => esc_html__('Copyright Background', 'dotlife' ),
        'section'  => 'footer_color',
	    'priority' => 14,
	    'default'  => '#222222',
	    'output' => array(
	        array(
	            'element'  => '.footer_bar',
	            'property' => 'background-color',
	        ),
	    ),
	    'js_vars'   => array(
			array(
				'element'  => '.footer_bar',
				'function' => 'css',
				'property' => 'background-color',
			),
		),
    );
    
    $controls[] = array(
        'type'     => 'color',
        'settings'  => 'tg_copyright_font_color',
        'label'    => esc_html__('Copyright Font Color', 'dotlife' ),
        'section'  => 'footer_color',
        'default'  => '#999999',
        'output' => array(
	        array(
	            'element'  => '.footer_bar, #copyright ',
	            'property' => 'color',
	        ),
	    ),
	    'transport' 	 => 'postMessage',
	    'priority' => 15,
	    'js_vars'   => array(
			array(
				'element'  => '.footer_bar, #copyright ',
				'function' => 'css',
				'property' => 'color',
			),
		),
    );
    
    $controls[] = array(
        'type'     => 'color',
        'settings'  => 'tg_copyright_link_color',
        'label'    => esc_html__('Copyright Link Color', 'dotlife' ),
        'section'  => 'footer_color',
        'default'  => '#ffffff',
        'output' => array(
	        array(
	            'element'  => '.footer_bar a, #copyright a, #footer_menu li a',
	            'property' => 'color',
	        ),
	    ),
	    'js_vars'   => array(
			array(
				'element'  => '.footer_bar a, #copyright a, #footer_menu li a',
				'function' => 'css',
				'property' => 'color',
			),
		),
	    'transport' 	 => 'postMessage',
	    'priority' => 16,
    );
    
    $controls[] = array(
        'type'     => 'color',
        'settings'  => 'tg_copyright_hover_link_color',
        'label'    => esc_html__('Copyright Hover Link Color', 'dotlife' ),
        'section'  => 'footer_color',
        'default'  => '#ffffff',
        'output' => array(
	        array(
	            'element'  => '.footer_bar a:hover, #copyright a:hover, #footer_menu li a:hover',
	            'property' => 'color',
	        ),
	    ),
	    'transport' 	 => 'postMessage',
	    'priority' => 17,
	    'js_vars'   => array(
			array(
				'element'  => '.footer_bar a:hover, #copyright a:hover, #footer_menu li a:hover',
				'function' => 'css',
				'property' => 'color',
			),
		),
    );
    
    $controls[] = array(
        'type'     => 'color',
        'settings'  => 'tg_footer_border_color',
        'label'    => esc_html__('Copyright Border Color', 'dotlife' ),
        'section'  => 'footer_color',
        'default'  => '#333333',
        'output' => array(
	        array(
	            'element'  => '.footer_bar_wrapper, .footer_bar',
	            'property' => 'border-color',
	        ),
	    ),
	    'js_vars'   => array(
			array(
				'element'  => '.footer_bar_wrapper, .footer_bar',
				'function' => 'css',
				'property' => 'border-color',
			),
		),
	    'transport' 	 => 'postMessage',
	    'priority' => 18,
    );
    
    $controls[] = array(
        'type'     => 'color',
        'settings'  => 'tg_footer_social_color',
        'label'    => esc_html__('Copyright Social Icon Color', 'dotlife' ),
        'section'  => 'footer_color',
        'default'  => '#ffffff',
        'output' => array(
	        array(
	            'element'  => '.footer_bar_wrapper .social_wrapper ul li a',
	            'property' => 'color',
	        ),
	    ),
	    'transport' 	 => 'postMessage',
	    'priority' => 19,
	    'js_vars'   => array(
			array(
				'element'  => '.footer_bar_wrapper .social_wrapper ul li a',
				'function' => 'css',
				'property' => 'color',
			),
		),
    );
    
    $controls[] = array(
        'type'     => 'title',
        'settings'  => 'tg_footer_copyright_title',
        'label'    => esc_html__('Copyright Content Settings', 'dotlife' ),
        'section'  => 'footer_copyright',
	    'priority' => 4,
    );
    
    $controls[] = array(
        'type'     => 'textarea',
        'settings'  => 'tg_footer_copyright_text',
        'label'    => esc_html__('Copyright Text', 'dotlife' ),
        'description' => esc_html__('Enter your copyright text.', 'dotlife' ),
        'section'  => 'footer_copyright',
        'default'  => '© Copyright DotLife Theme Demo - Theme by ThemeGoods',
        'transport' 	 => 'postMessage',
	    'priority' => 5,
    );
    
    $controls[] = array(
        'type'     => 'select',
        'settings'  => 'tg_footer_copyright_right_area',
        'label'    => esc_html__('Copyright Right Area Content', 'dotlife' ),
        'section'  => 'footer_copyright',
        'default'  => 'menu',
        'choices'  => $tg_copyright_content,
	    'priority' => 6,
    );
    
    $controls[] = array(
        'type'     => 'title',
        'settings'  => 'tg_footer_copyright_totop_title',
        'label'    => esc_html__('Go To Top Settings', 'dotlife' ),
        'section'  => 'footer_copyright',
	    'priority' => 7,
    );
    
    $controls[] = array(
        'type'     => 'toggle',
        'settings'  => 'tg_footer_copyright_totop',
        'label'    => esc_html__('Go To Top Button', 'dotlife' ),
        'description' => 'Check this option to enable go to top button at the bottom of page when scrolling',
        'section'  => 'footer_copyright',
        'default'  => 1,
	    'priority' => 78,
    );
    
    $controls[] = array(
        'type'     => 'color',
        'settings'  => 'tg_footer_copyright_totop_bg',
        'label'    => esc_html__('Go To Top Button Background', 'dotlife' ),
        'section'  => 'footer_copyright',
	    'priority' => 13,
	    'default'  => 'rgba(0,0,0,0.1)',
	    'output' => array(
	        array(
	            'element'  => 'a#toTop',
	            'property' => 'background',
	        ),
	    ),
	    'js_vars'   => array(
			array(
				'element'  => 'a#toTop',
				'function' => 'css',
				'property' => 'background',
			),
		),
    );
    
    $controls[] = array(
        'type'     => 'color',
        'settings'  => 'tg_footer_copyright_totop_font_color',
        'label'    => esc_html__('Go To Top Button Font Color', 'dotlife' ),
        'section'  => 'footer_copyright',
        'default'  => '#ffffff',
        'output' => array(
	        array(
	            'element'  => 'a#toTop',
	            'property' => 'color',
	        ),
	    ),
	    'transport' 	 => 'postMessage',
	    'priority' => 13,
	    'js_vars'   => array(
			array(
				'element'  => 'a#toTop',
				'function' => 'css',
				'property' => 'color',
			),
		),
    );
    //End Footer Tab Settings

    
    //Begin Blog Tab Settings
    $controls[] = array(
        'type'     => 'title',
        'settings'  => 'tg_blog_layout_title',
        'label'    => esc_html__('Layout Settings', 'dotlife' ),
        'section'  => 'blog_general',
        'priority' => 0,
    );
    
    $controls[] = array(
        'type'     => 'toggle',
        'settings'  => 'tg_blog_display_full',
        'label'    => esc_html__('Display Full Blog Post Content', 'dotlife' ),
        'description' => esc_html__('Check this option to display post full content in blog page (excerpt blog grid layout)', 'dotlife' ),
        'section'  => 'blog_general',
        'default'  => 1,
	    'priority' => 1,
    );
    
    $controls[] = array(
        'type'     => 'radio',
        'settings'  => 'tg_blog_archive_layout',
        'label'    => esc_html__('Archive Page Layout', 'dotlife' ),
        'description' => esc_html__('Select page layout for displaying archive page', 'dotlife' ),
        'section'  => 'blog_general',
        'default'  => 'blog-r',
        'choices'  => $tg_blog_layout,
	    'priority' => 2,
    );
    
    $controls[] = array(
        'type'     => 'radio',
        'settings'  => 'tg_blog_category_layout',
        'label'    => esc_html__('Category Page Layout', 'dotlife' ),
        'description' => esc_html__('Select page layout for displaying category page', 'dotlife' ),
        'section'  => 'blog_general',
        'default'  => 'blog-r',
        'choices'  => $tg_blog_layout,
	    'priority' => 2,
    );
    
    $controls[] = array(
        'type'     => 'radio',
        'settings'  => 'tg_blog_tag_layout',
        'label'    => esc_html__('Tag Page Layout', 'dotlife' ),
        'description' => esc_html__('Select page layout for displaying tag page', 'dotlife' ),
        'section'  => 'blog_general',
        'default'  => 'blog-r',
        'choices'  => $tg_blog_layout,
	    'priority' => 3,
    );
    
    $controls[] = array(
        'type'     => 'title',
        'settings'  => 'tg_blog_color_title',
        'label'    => esc_html__('Color Settings', 'dotlife' ),
        'section'  => 'blog_general',
        'priority' => 4,
    );
    
    $controls[] = array(
        'type'     => 'color',
        'settings'  => 'tg_blog_content_bg_color',
        'label'    => esc_html__('Single Post Content Background Color', 'dotlife' ),
        'section'  => 'blog_general',
        'default'  => '#ffffff',
        'output' => array(
	        array(
	            'element'  => '#page_content_wrapper.blog_wrapper, .post_excerpt.post_tag a:after, .post_excerpt.post_tag a:before, .post_navigation .navigation_post_content',
	            'property' => 'background-color',
	        ),
	    ),
	    'transport' 	 => 'postMessage',
	    'priority' => 5,
	    'js_vars'   => array(
			array(
				'element'  => '#page_content_wrapper.blog_wrapper, .post_excerpt.post_tag a:after, .post_excerpt.post_tag a:before, .post_navigation .navigation_post_content',
				'function' => 'css',
				'property' => 'background-color',
			),
		)
    );
    
    $controls[] = array(
        'type'     => 'color',
        'settings'  => 'tg_blog_cat_font_color',
        'label'    => esc_html__('Post Category Link Font Color', 'dotlife' ),
        'section'  => 'blog_general',
        'default'  => '#444444',
        'output' => array(
	        array(
	            'element'  => '.post_info_cat, .post_info_cat a',
	            'property' => 'color',
	        ),
	        array(
	            'element'  => '.post_info_cat, .post_info_cat a',
	            'property' => 'border-color',
	        ),
	    ),
	    'js_vars'   => array(
			array(
				'element'  => '.post_info_cat, .post_info_cat a',
				'function' => 'css',
				'property' => 'color',
			),
			array(
				'element'  => '.post_info_cat, .post_info_cat a',
				'function' => 'css',
				'property' => 'border-color',
			),
		),
	    'transport' 	 => 'postMessage',
	    'priority' => 6,
    );
    
    $controls[] = array(
        'type'     => 'color',
        'settings'  => 'tg_blog_post_format_bg_color',
        'label'    => esc_html__('Post Format Background Color', 'dotlife' ),
        'section'  => 'blog_general',
        'default'  => '#0067DA',
        'output' => array(
	        array(
	            'element'  => '.post_img_hover .post_type_icon',
	            'property' => 'background',
	        ),
	    ),
	    'js_vars'   => array(
			array(
				'element'  => '.post_img_hover .post_type_icon',
				'function' => 'css',
				'property' => 'background',
			),
		),
	    'transport' 	 => 'postMessage',
	    'priority' => 7,
    );
    
    $controls[] = array(
        'type'     => 'color',
        'settings'  => 'tg_blog_grid_content_bg_color',
        'label'    => esc_html__('Post Grid Content Background Color', 'dotlife' ),
        'section'  => 'blog_general',
        'default'  => '#ffffff',
        'output' => array(
	        array(
	            'element'  => '.blog_post_content_wrapper.layout_grid .post_content_wrapper, .blog_post_content_wrapper.layout_masonry .post_content_wrapper, .blog_post_content_wrapper.layout_metro .post_content_wrapper, .blog_post_content_wrapper.layout_classic .post_content_wrapper',
	            'property' => 'background',
	        ),
	    ),
	    'js_vars'   => array(
			array(
				'element'  => '.blog_post_content_wrapper.layout_grid .post_content_wrapper, .blog_post_content_wrapper.layout_masonry .post_content_wrapper, .blog_post_content_wrapper.layout_metro .post_content_wrapper, .blog_post_content_wrapper.layout_classic .post_content_wrapper',
				'function' => 'css',
				'property' => 'background',
			),
		),
	    'transport' 	 => 'postMessage',
	    'priority' => 8,
    );
    
    $controls[] = array(
        'type'     => 'color',
        'settings'  => 'tg_blog_post_date_color',
        'label'    => esc_html__('Post Date Color', 'dotlife' ),
        'section'  => 'blog_general',
        'default'  => '#222222',
        'output' => array(
	        array(
	            'element'  => '.post_attribute a',
	            'property' => 'color',
	        ),
	        array(
	            'element'  => '.post_attribute a a:before',
	            'property' => 'background-color',
	        ),
	    ),
	    'js_vars'   => array(
			array(
				'element'  => '.post_attribute a',
				'function' => 'css',
				'property' => 'color',
			),
			array(
				'element'  => '.post_attribute a:before',
				'function' => 'css',
				'property' => 'background-color',
			),
		),
	    'transport' 	 => 'postMessage',
	    'priority' => 9,
    );
    
    $controls[] = array(
	        'type'     => 'slider',
	        'settings'  => 'tg_blog_post_date_opacity',
	        'label'    => esc_html__('Post Date Opacity', 'dotlife' ),
	        'description' => '',
	        'section'  => 'blog_general',
	        'default'  => 0.5,
	        'choices' => array( 'min' => 0.1, 'max' => 1, 'step' => 0.1 ),
	        'output' => array(
		        array(
		            'element'  => '.post_attribute a, .post_button_wrapper .post_attribute, .post_attribute a:before',
		            'property' => 'opacity',
		        ),
		    ),
		    'js_vars'   => array(
				array(
					'element'  => '.post_attribute a, .post_button_wrapper .post_attribute, .post_attribute a:before',
					'function' => 'css',
					'property' => 'opacity',
				),
			),
		    'transport' 	 => 'postMessage',
		    'priority' => 10,
	    );
    
    $controls[] = array(
        'type'     => 'title',
        'settings'  => 'tg_blog_general_title',
        'label'    => esc_html__('General Post Title Settings', 'dotlife' ),
        'section'  => 'blog_typography',
	    'priority' => 0,
    );
    
    $controls[] = array(
        'type'     => 'typography',
        'settings'  => 'tg_blog_title_typography',
        'label'    => esc_html__('Post Title Typography', 'dotlife' ),
        'section'  => 'blog_typography',
        'default'  => array(
			'font-family'    => 'Jost',
			'variant'        => '700',
			'letter-spacing' => '0px',
			'text-transform' => 'none',
		),
        'output' => array(
	        array(
	            'element'  => '.post_header h5, h6.subtitle, .post_caption h1, #page_content_wrapper .posts.blog li a, .page_content_wrapper .posts.blog li a, #post_featured_slider li .slider_image .slide_post h2, .post_header.grid h6, .post_info_cat, .comment_date, .post-date, .post_navigation h7',
	        ),
	    ),
	    'priority' => 1,
    );
    
    $controls[] = array(
        'type'     => 'typography',
        'settings'  => 'tg_single_blog_title_typography',
        'label'    => esc_html__('Single Post Title Typography', 'dotlife' ),
        'section'  => 'blog_typography',
        'default'  => array(
			'font-family'    => 'Jost',
			'variant'        => '700',
			'font-size'      => '50px',
			'line-height'    => '1.2',
			'letter-spacing' => '0',
			'text-transform' => 'none',
		),
        'output' => array(
	        array(
	            'element'  => 'body.single-post #page_caption h1, body.single-post #page_content_wrapper.blog_wrapper .page_title_content h1',
	        ),
	    ),
	    'priority' => 2,
    );
    
    $controls[] = array(
        'type'     => 'title',
        'settings'  => 'tg_blog_single_post_content_title',
        'label'    => esc_html__('Content Settings', 'dotlife' ),
        'section'  => 'blog_single',
        'priority' => 4,
    );
    
    $controls[] = array(
        'type'     => 'radio',
        'settings'  => 'tg_blog_single_post_title',
        'label'    => esc_html__('Post Title Location', 'dotlife' ),
        'description' => esc_html__('Select where does the theme display post title', 'dotlife' ),
        'section'  => 'blog_single',
        'default'  => 'featured_image',
        'choices'  => $tg_post_title_location,
	    'priority' => 5,
    );
    
    $controls[] = array(
        'type'     => 'toggle',
        'settings'  => 'tg_blog_feat_content',
        'label'    => esc_html__('Display Post Featured Content', 'dotlife' ),
        'description' => esc_html__('Check this to display featured header image in single post page', 'dotlife' ),
        'section'  => 'blog_single',
        'default'  => 1,
	    'priority' => 5,
    );
    
    $controls[] = array(
        'type'     => 'toggle',
        'settings'  => 'tg_blog_cat',
        'label'    => esc_html__('Display Post Categories', 'dotlife' ),
        'description' => esc_html__('Check this to display categories in single post page', 'dotlife' ),
        'section'  => 'blog_single',
        'default'  => 1,
	    'priority' => 5,
    );
    
    $controls[] = array(
        'type'     => 'toggle',
        'settings'  => 'tg_blog_date',
        'label'    => esc_html__('Display Post Date', 'dotlife' ),
        'description' => esc_html__('Check this to display date in single post page', 'dotlife' ),
        'section'  => 'blog_single',
        'default'  => 1,
	    'priority' => 5,
    );
    
    $controls[] = array(
        'type'     => 'toggle',
        'settings'  => 'tg_blog_display_tags',
        'label'    => esc_html__('Display Post Tags', 'dotlife' ),
        'description' => esc_html__('Check this option to display post tags on single post page', 'dotlife' ),
        'section'  => 'blog_single',
        'default'  => 1,
	    'priority' => 6,
    );
    
    $controls[] = array(
        'type'     => 'toggle',
        'settings'  => 'tg_blog_display_author',
        'label'    => esc_html__('Display About Author', 'dotlife' ),
        'description' => esc_html__('Check this option to display about author on single post page', 'dotlife' ),
        'section'  => 'blog_single',
        'default'  => 1,
	    'priority' => 7,
    );
    
    $controls[] = array(
        'type'     => 'toggle',
        'settings'  => 'tg_blog_display_related',
        'label'    => esc_html__('Display Related Posts', 'dotlife' ),
        'description' => esc_html__('Check this option to display related posts on single post page', 'dotlife' ),
        'section'  => 'blog_single',
        'default'  => 1,
	    'priority' => 8,
    );
    
    $controls[] = array(
        'type'     => 'toggle',
        'settings'  => 'tg_blog_display_navigation',
        'label'    => esc_html__('Display Previous/Next Navigation', 'dotlife' ),
        'description' => esc_html__('Check this option to display previous/next navigation on single post page', 'dotlife' ),
        'section'  => 'blog_single',
        'default'  => 1,
	    'priority' => 8,
    );
    
    $controls[] = array(
        'type'     => 'slider',
        'settings'  => 'tg_blog_content_width',
        'label'    => esc_html__('Blog Content Width (%)', 'dotlife' ),
        'section'  => 'blog_single',
        'default'  => 100,
        'choices' => array( 'min' => 0, 'max' => 100, 'step' => 1 ),
        'output' => array(
            array(
                'element'  => 'body.single-post #page_content_wrapper.blog_wrapper',
                'property' => 'width',
                'units'    => '%',
            ),
        ),
        'transport' 	 => 'postMessage',
        'priority' => 8,
        'js_vars'   => array(
            array(
                'element'  => 'body.single-post #page_content_wrapper.blog_wrapper',
                'function' => 'css',
                'property' => 'width',
                'units'    => 'px',
            ),
        )
    );
    
    $controls[] = array(
        'type'     => 'title',
        'settings'  => 'tg_blog_single_post_color_title',
        'label'    => esc_html__('Color Settings', 'dotlife' ),
        'section'  => 'blog_single',
        'priority' => 9,
    );
    
    $controls[] = array(
        'type'     => 'color',
        'settings'  => 'tg_blog_post_single_content_bg_color',
        'label'    => esc_html__('Single Post Content Background Color', 'dotlife' ),
        'section'  => 'blog_single',
        'default'  => '#ffffff',
        'output' => array(
	        array(
	            'element'  => 'body.single-post #page_content_wrapper.blog_wrapper, .post_related .post_header_wrapper',
	            'property' => 'background',
	        ),
	    ),
	    'js_vars'   => array(
			array(
				'element'  => 'body.single-post #page_content_wrapper.blog_wrapper, .post_related .post_header_wrapper',
				'function' => 'css',
				'property' => 'background',
			),
		),
	    'transport' 	 => 'postMessage',
	    'priority' => 10,
    );
    
    $controls[] = array(
        'type'     => 'color',
        'settings'  => 'tg_blog_post_tag_bg_color',
        'label'    => esc_html__('Post Tag Background Color', 'dotlife' ),
        'section'  => 'blog_single',
        'default'  => '#f0f0f0',
        'output' => array(
	        array(
	            'element'  => '.post_excerpt.post_tag a',
	            'property' => 'background',
	        ),
	        array(
	            'element'  => '.post_excerpt.post_tag a:after',
	            'property' => 'border-left-color',
	        ),
	    ),
	    'js_vars'   => array(
			array(
				'element'  => '.post_excerpt.post_tag a',
				'function' => 'css',
				'property' => 'background',
			),
			array(
	            'element'  => '.post_excerpt.post_tag a:after',
	            'property' => 'border-left-color',
	        ),
		),
	    'transport' 	 => 'postMessage',
	    'priority' => 11,
    );
    
    $controls[] = array(
        'type'     => 'color',
        'settings'  => 'tg_blog_post_tag_font_color',
        'label'    => esc_html__('Post Tag Font Color', 'dotlife' ),
        'section'  => 'blog_single',
        'default'  => '#444',
        'output' => array(
	        array(
	            'element'  => '.post_excerpt.post_tag a',
	            'property' => 'color',
	        ),
	        array(
	            'element'  => '.post_excerpt.post_tag a',
	            'property' => 'color',
	        ),
	    ),
	    'js_vars'   => array(
			array(
				'element'  => '.post_excerpt.post_tag a',
				'function' => 'css',
				'property' => 'color',
			),
		),
	    'transport' 	 => 'postMessage',
	    'priority' => 12,
    );
    //End Blog Tab Settings
    
    //Check if Woocommerce is installed	
	if(class_exists('Woocommerce'))
	{
		//Begin Shop Tab Settings
		$controls[] = array(
	        'type'     => 'radio-buttonset',
	        'settings'  => 'tg_shop_layout',
	        'label'    => esc_html__('Shop Main Page Layout', 'dotlife' ),
	        'description' => esc_html__('Select page layout for displaying shop\'s products page', 'dotlife' ),
	        'section'  => 'shop_layout',
	        'default'  => 'fullwidth',
	        'choices'  => $tg_shop_layout,
		    'priority' => 1,
	    );
	    
	    $controls[] = array(
	        'type'     => 'slider',
	        'settings'  => 'tg_shop_items',
	        'label'    => esc_html__('Products Page Show At Most', 'dotlife' ),
	        'description' => esc_html__('Select number of product items you want to display per page', 'dotlife' ),
	        'section'  => 'shop_layout',
	        'default'  => 16,
	        'choices' => array( 'min' => 1, 'max' => 100, 'step' => 1 ),
		    'priority' => 2,
	    );
	    
	    $controls[] = array(
	        'type'     => 'toggle',
	        'settings'  => 'tg_shop_filter_sorting',
	        'label'    => esc_html__('Display Shop Sorting Filter Option', 'dotlife' ),
	        'description' => esc_html__('Check this option to display sorting filter option on shop page', 'dotlife' ),
	        'section'  => 'shop_layout',
	        'default'  => 1,
		    'priority' => 3,
	    );
	    
	    $controls[] = array(
	        'type'     => 'color',
	        'settings'  => 'tg_shop_price_font_color',
	        'label'    => esc_html__('Product Price Font Color', 'dotlife' ),
	        'section'  => 'shop_single',
	        'default'  => '#0067DA',
	        'output' => array(
		        array(
		            'element'  => '.woocommerce ul.products li.product .price ins, .woocommerce-page ul.products li.product .price ins, .woocommerce ul.products li.product .price, .woocommerce-page ul.products li.product .price, p.price ins span.amount, .woocommerce #content div.product p.price, .woocommerce #content div.product span.price, .woocommerce div.product p.price, .woocommerce div.product span.price, .woocommerce-page #content div.product p.price, .woocommerce-page #content div.product span.price, .woocommerce-page div.product p.price, .woocommerce-page div.product span.price',
		            'property' => 'color',
		        ),
		    ),
		    'transport' 	 => 'postMessage',
		    'priority' => 2,
		    'js_vars'   => array(
				array(
					'element'  => '.woocommerce ul.products li.product .price ins, .woocommerce-page ul.products li.product .price ins, .woocommerce ul.products li.product .price, .woocommerce-page ul.products li.product .price, p.price ins span.amount, .woocommerce #content div.product p.price, .woocommerce #content div.product span.price, .woocommerce div.product p.price, .woocommerce div.product span.price, .woocommerce-page #content div.product p.price, .woocommerce-page #content div.product span.price, .woocommerce-page div.product p.price, .woocommerce-page div.product span.price',
					'function' => 'css',
					'property' => 'color',
				),
			)
	    );
	    
	    $controls[] = array(
	        'type'     => 'color',
	        'settings'  => 'tg_shop_price_bg_color',
	        'label'    => esc_html__('Product Price Background Color', 'dotlife' ),
	        'section'  => 'shop_single',
	        'default'  => '#f0f0f0',
	        'output' => array(
		        array(
		            'element'  => '.woocommerce ul.products li.product .price ins, .woocommerce-page ul.products li.product .price ins, .woocommerce ul.products li.product .price, .woocommerce-page ul.products li.product .price, p.price ins span.amount, .woocommerce #content div.product p.price, .woocommerce #content div.product span.price',
		            'property' => 'background',
		        ),
		    ),
		    'transport' 	 => 'postMessage',
		    'priority' => 2,
		    'js_vars'   => array(
				array(
					'element'  => '.woocommerce ul.products li.product .price ins, .woocommerce-page ul.products li.product .price ins, .woocommerce ul.products li.product .price, .woocommerce-page ul.products li.product .price, p.price ins span.amount, .woocommerce #content div.product p.price, .woocommerce #content div.product span.price',
					'function' => 'css',
					'property' => 'background',
				),
			)
	    );
	    
	    $controls[] = array(
	        'type'     => 'color',
	        'settings'  => 'tg_shop_onsale_bg_color',
	        'label'    => esc_html__('Product On Sale Background Color', 'dotlife' ),
	        'section'  => 'shop_single',
	        'default'  => '#0067DA',
	        'output' => array(
		        array(
		            'element'  => '.woocommerce .products .onsale, .woocommerce ul.products li.product .onsale, .woocommerce span.onsale',
		            'property' => 'background-color',
		        ),
		    ),
		    'transport' 	 => 'postMessage',
		    'priority' => 2,
		    'js_vars'   => array(
				array(
					'element'  => '.woocommerce .products .onsale, .woocommerce ul.products li.product .onsale, .woocommerce span.onsale',
					'function' => 'css',
					'property' => 'background-color',
				),
			)
	    );
	    
	    $controls[] = array(
	        'type'     => 'color',
	        'settings'  => 'tg_shop_tab_font_color',
	        'label'    => esc_html__('Active Tab Font Color', 'dotlife' ),
	        'section'  => 'shop_single',
	        'default'  => '#ffffff',
	        'output' => array(
		        array(
		            'element'  => '.woocommerce div.product .woocommerce-tabs ul.tabs li.active a, .woocommerce-page div.product .woocommerce-tabs ul.tabs li.active a',
		            'property' => 'color',
		        ),
		    ),
		    'transport' 	 => 'postMessage',
		    'priority' => 2,
		    'js_vars'   => array(
				array(
					'element'  => '.woocommerce div.product .woocommerce-tabs ul.tabs li.active a, .woocommerce-page div.product .woocommerce-tabs ul.tabs li.active a',
					'function' => 'css',
					'property' => 'color',
				),
			)
	    );
	    
	    $controls[] = array(
	        'type'     => 'color',
	        'settings'  => 'tg_shop_tab_bg_color',
	        'label'    => esc_html__('Active Tab Background Color', 'dotlife' ),
	        'section'  => 'shop_single',
	        'default'  => '#222222',
	        'output' => array(
		        array(
		            'element'  => '.woocommerce div.product .woocommerce-tabs ul.tabs li.active, .woocommerce-page div.product .woocommerce-tabs ul.tabs li.active',
		            'property' => 'background',
		        ),
		    ),
		    'transport' 	 => 'postMessage',
		    'priority' => 2,
		    'js_vars'   => array(
				array(
					'element'  => '.woocommerce div.product .woocommerce-tabs ul.tabs li.active, .woocommerce-page div.product .woocommerce-tabs ul.tabs li.active',
					'function' => 'css',
					'property' => 'background',
				),
			)
	    );
	    
	    $controls[] = array(
        'type'     => 'color',
        'settings'  => 'tg_shop_single_content_bg_color',
        'label'    => esc_html__('Single Product Content Background Color', 'dotlife' ),
        'section'  => 'blog_single',
        'default'  => '#ffffff',
        'output' => array(
	        array(
	            'element'  => 'body.single-product div.product.type-product',
	            'property' => 'background',
	        ),
	    ),
	    'js_vars'   => array(
			array(
				'element'  => 'body.single-product div.product.type-product',
				'function' => 'css',
				'property' => 'background',
			),
		),
	    'transport' 	 => 'postMessage',
	    'priority' => 9,
    );
	    
	    $controls[] = array(
	        'type'     => 'toggle',
	        'settings'  => 'tg_shop_related_products',
	        'label'    => esc_html__('Display Related Products', 'dotlife' ),
	        'description' => esc_html__('Check this option to display related products on single product page', 'dotlife' ),
	        'section'  => 'shop_single',
	        'default'  => 1,
		    'priority' => 3,
	    );
		//End Shop Tab Settings
	}
	
	//Check if Booking Calendar is installed	
	if(class_exists('LearnPress'))
	{  
		$controls[] = array(
	        'type'     => 'color',
	        'settings'  => 'tg_curriculum_active_color',
	        'label'    => esc_html__('Featured Color', 'dotlife' ),
	        'section'  => 'course_general',
	        'default'  => '#0067DA',
	        'output' => array(
		        array(
		            'element'  => 'body.learnpress-page.profile #learn-press-profile-nav .tabs > li.active > a, body.learnpress-page.profile #learn-press-profile-nav .tabs > li a:hover, body.learnpress-page.profile #learn-press-profile-nav .tabs > li:hover:not(.active) > a, body ul.learn-press-courses .course .course-info .course-price .price, body #learn-press-course-curriculum.course-curriculum ul.curriculum-sections .section-content .course-item.item-preview .course-item-preview, body .lp-archive-courses .learn-press-courses .course .course-item .course-content .course-categories a:first-child, body #learn-press-profile #profile-nav .lp-profile-nav-tabs li.active, body #learn-press-profile #profile-nav .lp-profile-nav-tabs li:hover, body #learn-press-profile #profile-content .lp-button:hover, .learnpress-course-curriculum .course-curriculum .section-content .course-item-preview::before, .learn-press-profile-course__tab__inner a.active::before',
		            'property' => 'background',
		        ),
		        array(
		            'element'  => 'body .course-item-nav .prev span, body .course-item-nav .next span, body .course-curriculum ul.curriculum-sections .section-content .course-item.current a, body .lp-archive-courses .learn-press-courses .course .course-item .course-content .course-instructor a, body .lp-archive-courses .learn-press-courses .course .course-item .course-content .course-instructor a:hover, body #learn-press-profile #profile-nav .lp-profile-nav-tabs li.active > ul .active > a, .learn-press-profile-course__tab__inner a.active, .learn-press-course-tab-filters .learn-press-filters a.active',
		            'property' => 'color',
		        ),
                array(
                    'element'  => 'body #learn-press-profile #profile-content .lp-button:hover',
                    'property' => 'border-color',
                ),
		    ),
		    'transport' 	 => 'postMessage',
		    'priority' => 16,
		    'js_vars'   => array(
				array(
					'element'  => 'body.learnpress-page.profile #learn-press-profile-nav .tabs > li.active > a, body.learnpress-page.profile #learn-press-profile-nav .tabs > li a:hover, body ul.learn-press-courses .course .course-info .course-price .price, body #learn-press-course-curriculum.course-curriculum ul.curriculum-sections .section-content .course-item.item-preview .course-item-preview, body .lp-archive-courses .learn-press-courses .course .course-item .course-content .course-categories a:first-child, body #learn-press-profile #profile-nav .lp-profile-nav-tabs li.active, body #learn-press-profile #profile-nav .lp-profile-nav-tabs li:hover, body #learn-press-profile #profile-content .lp-button:hover, .learnpress-course-curriculum .course-curriculum .section-content .course-item-preview::before, .learn-press-profile-course__tab__inner a.active::before',
					'function' => 'css',
					'property' => 'background',
				),
				array(
		            'element'  => 'body .course-item-nav .prev span, body .course-item-nav .next span, body .course-curriculum ul.curriculum-sections .section-content .course-item.current a, body.learnpress-page.profile #learn-press-profile-nav .tabs > li:hover:not(.active) > a, body .lp-archive-courses .learn-press-courses .course .course-item .course-content .course-instructor a, body .lp-archive-courses .learn-press-courses .course .course-item .course-content .course-instructor a:hover, body #learn-press-profile #profile-nav .lp-profile-nav-tabs li.active > ul .active > a, .learn-press-profile-course__tab__inner a.active, .learn-press-course-tab-filters .learn-press-filters a.active',
		            'function' => 'css',
		            'property' => 'color',
		        ),
                array(
                    'element'  => 'body #learn-press-profile #profile-content .lp-button:hover',
                    'function' => 'css',
                    'property' => 'border-color',
                ),
			)
	    );
	    
	    $controls[] = array(
	        'type'     => 'color',
	        'settings'  => 'tg_tab_bg_color',
	        'label'    => esc_html__('Tab Background Color', 'dotlife' ),
	        'section'  => 'course_general',
	        'default'  => '#f9f9f9',
	        'output' => array(
		        array(
		            'element'  => '#page_content_wrapper ul.learn-press-nav-tabs .course-nav a',
		            'property' => 'background',
		        ),
		    ),
		    'transport' 	 => 'postMessage',
		    'priority' => 16,
		    'js_vars'   => array(
				array(
					'element'  => '#page_content_wrapper ul.learn-press-nav-tabs .course-nav a',
					'function' => 'css',
					'property' => 'background',
				),
			)
	    );
	    
	    $controls[] = array(
	        'type'     => 'color',
	        'settings'  => 'tg_tab_font_color',
	        'label'    => esc_html__('Tab Font Color', 'dotlife' ),
	        'section'  => 'course_general',
	        'default'  => '#222222',
	        'output' => array(
		        array(
		            'element'  => '#page_content_wrapper ul.learn-press-nav-tabs .course-nav a, body #learn-press-profile #profile-nav .lp-profile-nav-tabs > li a, body #learn-press-profile #profile-nav .lp-profile-nav-tabs > li > a > i',
		            'property' => 'color',
		        ),
		    ),
		    'transport' 	 => 'postMessage',
		    'priority' => 16,
		    'js_vars'   => array(
				array(
					'element'  => '#page_content_wrapper ul.learn-press-nav-tabs .course-nav a, body #learn-press-profile #profile-nav .lp-profile-nav-tabs > li a, body #learn-press-profile #profile-nav .lp-profile-nav-tabs > li > a > i',
					'function' => 'css',
					'property' => 'color',
				),
			)
	    );
	    
	    $controls[] = array(
	        'type'     => 'color',
	        'settings'  => 'tg_tab_active_bg_color',
	        'label'    => esc_html__('Tab Active Background Color', 'dotlife' ),
	        'section'  => 'course_general',
	        'default'  => '#000000',
	        'output' => array(
		        array(
		            'element'  => '#page_content_wrapper ul.learn-press-nav-tabs .course-nav.active a, body.learnpress-page.profile .lp-tab-sections .section-tab.active span, body #learn-press-course-tabs .course-nav.active label, body #learn-press-course-tabs input[name="learn-press-course-tab-radio"]:nth-child(1):checked ~ .learn-press-nav-tabs .course-nav:nth-child(1) label, body #learn-press-course-tabs .course-nav.active label, #page_content_wrapper ul.learn-press-nav-tabs .course-nav.active a, body.learnpress-page.profile .lp-tab-sections .section-tab.active span, body #learn-press-course-tabs .course-nav.active labelbody #learn-press-course-tabs .course-nav.active label,
                    body #learn-press-course-tabs input[name="learn-press-course-tab-radio"]:nth-child(2):checked ~ .learn-press-nav-tabs .course-nav:nth-child(2) label,
                    body #learn-press-course-tabs input[name="learn-press-course-tab-radio"]:nth-child(3):checked ~ .learn-press-nav-tabs .course-nav:nth-child(3) label,
                    body #learn-press-course-tabs input[name="learn-press-course-tab-radio"]:nth-child(4):checked ~ .learn-press-nav-tabs .course-nav:nth-child(4) label, body #learn-press-profile #profile-nav .lp-profile-nav-tabs li.active, body #learn-press-profile #profile-nav .lp-profile-nav-tabs li:hover',
		            'property' => 'background',
		        ),
		    ),
		    'transport' 	 => 'postMessage',
		    'priority' => 16,
		    'js_vars'   => array(
				array(
					'element'  => '#page_content_wrapper ul.learn-press-nav-tabs .course-nav.active a, body.learnpress-page.profile .lp-tab-sections .section-tab.active span, body #learn-press-course-tabs .course-nav.active label, body #learn-press-course-tabs input[name="learn-press-course-tab-radio"]:nth-child(1):checked ~ .learn-press-nav-tabs .course-nav:nth-child(1) label, body #learn-press-course-tabs .course-nav.active label, #page_content_wrapper ul.learn-press-nav-tabs .course-nav.active a, body.learnpress-page.profile .lp-tab-sections .section-tab.active span, body #learn-press-course-tabs .course-nav.active labelbody #learn-press-course-tabs .course-nav.active label,
                    body #learn-press-course-tabs input[name="learn-press-course-tab-radio"]:nth-child(2):checked ~ .learn-press-nav-tabs .course-nav:nth-child(2) label,
                    body #learn-press-course-tabs input[name="learn-press-course-tab-radio"]:nth-child(3):checked ~ .learn-press-nav-tabs .course-nav:nth-child(3) label,
                    body #learn-press-course-tabs input[name="learn-press-course-tab-radio"]:nth-child(4):checked ~ .learn-press-nav-tabs .course-nav:nth-child(4) label, body #learn-press-profile #profile-nav .lp-profile-nav-tabs li.active, body #learn-press-profile #profile-nav .lp-profile-nav-tabs li:hover',
					'function' => 'css',
					'property' => 'background',
				),
			)
	    );
	    
	    $controls[] = array(
	        'type'     => 'color',
	        'settings'  => 'tg_tab_active_font_color',
	        'label'    => esc_html__('Tab Active Font Color', 'dotlife' ),
	        'section'  => 'course_general',
	        'default'  => '#ffffff',
	        'output' => array(
		        array(
		            'element'  => '#page_content_wrapper ul.learn-press-nav-tabs .course-nav.active a, body.learnpress-page.profile .lp-tab-sections .section-tab.active span, body #learn-press-course-tabs .course-nav.active label, body #learn-press-course-tabs input[name="learn-press-course-tab-radio"]:nth-child(1):checked ~ .learn-press-nav-tabs .course-nav:nth-child(1) label, body #learn-press-course-tabs .course-nav.active label, #page_content_wrapper ul.learn-press-nav-tabs .course-nav.active a, body.learnpress-page.profile .lp-tab-sections .section-tab.active span, body #learn-press-course-tabs .course-nav.active labelbody #learn-press-course-tabs .course-nav.active label,
                    body #learn-press-course-tabs input[name="learn-press-course-tab-radio"]:nth-child(2):checked ~ .learn-press-nav-tabs .course-nav:nth-child(2) label,
                    body #learn-press-course-tabs input[name="learn-press-course-tab-radio"]:nth-child(3):checked ~ .learn-press-nav-tabs .course-nav:nth-child(3) label,
                    body #learn-press-course-tabs input[name="learn-press-course-tab-radio"]:nth-child(4):checked ~ .learn-press-nav-tabs .course-nav:nth-child(4) label, body #learn-press-profile #profile-nav .lp-profile-nav-tabs li.active, body #learn-press-profile #profile-nav .lp-profile-nav-tabs li:hover',
		            'property' => 'color',
		        ),
		    ),
		    'transport' 	 => 'postMessage',
		    'priority' => 16,
		    'js_vars'   => array(
				array(
					'element'  => '#page_content_wrapper ul.learn-press-nav-tabs .course-nav.active a, body.learnpress-page.profile .lp-tab-sections .section-tab.active span, body #learn-press-course-tabs .course-nav.active label, body #learn-press-course-tabs input[name="learn-press-course-tab-radio"]:nth-child(1):checked ~ .learn-press-nav-tabs .course-nav:nth-child(1) label, body #learn-press-course-tabs .course-nav.active label, #page_content_wrapper ul.learn-press-nav-tabs .course-nav.active a, body.learnpress-page.profile .lp-tab-sections .section-tab.active span, body #learn-press-course-tabs .course-nav.active labelbody #learn-press-course-tabs .course-nav.active label,
                    body #learn-press-course-tabs input[name="learn-press-course-tab-radio"]:nth-child(2):checked ~ .learn-press-nav-tabs .course-nav:nth-child(2) label,
                    body #learn-press-course-tabs input[name="learn-press-course-tab-radio"]:nth-child(3):checked ~ .learn-press-nav-tabs .course-nav:nth-child(3) label,
                    body #learn-press-course-tabs input[name="learn-press-course-tab-radio"]:nth-child(4):checked ~ .learn-press-nav-tabs .course-nav:nth-child(4) label, body #learn-press-profile #profile-nav .lp-profile-nav-tabs li.active, body #learn-press-profile #profile-nav .lp-profile-nav-tabs li:hover',
					'function' => 'css',
					'property' => 'color',
				),
			)
	    );
	    
	    $controls[] = array(
	        'type'     => 'color',
	        'settings'  => 'tg_table_header_bg_color',
	        'label'    => esc_html__('Table Header Background Color', 'dotlife' ),
	        'section'  => 'course_general',
	        'default'  => '#333333',
	        'output' => array(
		        array(
		            'element'  => 'body.learnpress-page.checkout .lp-list-table thead tr th, body.learnpress-page.profile .lp-list-table thead tr th, .learn-press-profile-course__progress .lp_profile_course_progress__header',
		            'property' => 'background',
		        ),
		    ),
		    'transport' 	 => 'postMessage',
		    'priority' => 16,
		    'js_vars'   => array(
				array(
					'element'  => 'body.learnpress-page.checkout .lp-list-table thead tr th, body.learnpress-page.profile .lp-list-table thead tr th, .learn-press-profile-course__progress .lp_profile_course_progress__header',
					'function' => 'css',
					'property' => 'background',
				),
			)
	    );
	    
	    $controls[] = array(
	        'type'     => 'color',
	        'settings'  => 'tg_table_header_text_color',
	        'label'    => esc_html__('Table Header Text Color', 'dotlife' ),
	        'section'  => 'course_general',
	        'default'  => '#ffffff',
	        'output' => array(
		        array(
		            'element'  => 'body.learnpress-page.checkout .lp-list-table, body.learnpress-page.checkout .lp-list-table thead tr th, body.learnpress-page.profile .lp-list-table thead tr th, .learn-press-profile-course__progress .lp_profile_course_progress__header',
		            'property' => 'color',
		        ),
		    ),
		    'transport' 	 => 'postMessage',
		    'priority' => 16,
		    'js_vars'   => array(
				array(
					'element'  => 'body.learnpress-page.checkout .lp-list-table, body.learnpress-page.checkout .lp-list-table thead tr th, body.learnpress-page.profile .lp-list-table thead tr th, .learn-press-profile-course__progress .lp_profile_course_progress__header',
					'function' => 'css',
					'property' => 'color',
				),
			)
	    );
	    
	    $controls[] = array(
	        'type'     => 'color',
	        'settings'  => 'tg_table_content_bg_color',
	        'label'    => esc_html__('Table Content Background Color', 'dotlife' ),
	        'section'  => 'course_general',
	        'default'  => '#ffffff',
	        'output' => array(
		        array(
		            'element'  => 'body .lp-list-table th, body .lp-list-table td, body .lp-list-table tbody tr td, body .lp-list-table tbody tr th',
		            'property' => 'background',
		        ),
		    ),
		    'transport' 	 => 'postMessage',
		    'priority' => 16,
		    'js_vars'   => array(
				array(
					'element'  => 'body .lp-list-table th, body .lp-list-table td, body .lp-list-table tbody tr td, body .lp-list-table tbody tr th',
					'function' => 'css',
					'property' => 'background',
				),
			)
	    );
	    
	    $controls[] = array(
	        'type'     => 'color',
	        'settings'  => 'tg_table_content_border_color',
	        'label'    => esc_html__('Table Content Border Color', 'dotlife' ),
	        'section'  => 'course_general',
	        'default'  => '#d8d8d8',
	        'output' => array(
		        array(
		            'element'  => 'body .lp-list-table tbody tr td, body .lp-list-table tbody tr th, body .lp-list-table td',
		            'property' => 'border-color',
		        ),
		    ),
		    'transport' 	 => 'postMessage',
		    'priority' => 16,
		    'js_vars'   => array(
				array(
					'element'  => 'body .lp-list-table tbody tr td, body .lp-list-table tbody tr th, body .lp-list-table td',
					'function' => 'css',
					'property' => 'border-color',
				),
			)
	    );
	    
	    $controls[] = array(
	        'type'     => 'color',
	        'settings'  => 'tg_table_content_text_color',
	        'label'    => esc_html__('Table Content Text Color', 'dotlife' ),
	        'section'  => 'course_general',
	        'default'  => '#222222',
	        'output' => array(
		        array(
		            'element'  => 'body .lp-list-table th, body .lp-list-table td',
		            'property' => 'color',
		        ),
		    ),
		    'transport' 	 => 'postMessage',
		    'priority' => 16,
		    'js_vars'   => array(
				array(
					'element'  => 'body .lp-list-table th, body .lp-list-table td',
					'function' => 'css',
					'property' => 'color',
				),
			)
	    );
	    
	    $controls[] = array(
	        'type'     => 'title',
	        'settings'  => 'tg_course_general_title',
	        'label'    => esc_html__('General Settings', 'dotlife' ),
	        'section'  => 'course_single',
		    'priority' => 2,
	    );
        
        $controls[] = array(
            'type'     => 'radio-buttonset',
            'settings'  => 'tg_single_course_layout',
            'label'    => esc_html__('Single Course Layout', 'dotlife' ),
            'description' => esc_html__('Select page layout for single course page', 'dotlife' ),
            'section'  => 'course_single',
            'default'  => 'fullwidth',
            'choices'  => array(
                'fullwidth' => 'Fullwidth',
                'sidebar' => 'Sidebar',
            ),
            'priority' => 3,
        );
	    
	    $controls[] = array(
	        'type'     => 'typography',
	        'settings'  => 'tg_single_course_title_typography',
	        'label'    => esc_html__('Single Course Title Typography', 'dotlife' ),
	        'section'  => 'course_single',
	        'default'  => array(
				'font-family'    => 'Jost',
				'variant'        => '700',
				'font-size'      =>  '34px',
				'line-height'    => '1.7',
				'letter-spacing' => '0',
				'text-transform' => 'none',
			),
	        'output' => array(
		        array(
		            'element'  => 'body.single-lp_course #lp-single-course .single_course_title h1, body.single-meeting .single_course_title h1',
		        ),
		    ),
		    'priority' => 3,
	    );
        
        $controls[] = array(
            'type'     => 'typography',
            'settings'  => 'tg_single_course_pricing_typography',
            'label'    => esc_html__('Single Course Pricing Typography', 'dotlife' ),
            'section'  => 'course_single',
            'default'  => array(
                'font-family'    => 'Jost',
                'variant'        => '900',
                'font-size'      =>  '36px',
                'line-height'    => '1.5',
                'letter-spacing' => '0',
                'text-transform' => 'none',
            ),
            'output' => array(
                array(
                    'element'  => 'body .single_course_price_wrapper .price, #learn-press-course .course-summary-sidebar .course-sidebar-preview .course-price .price',
                ),
            ),
            'priority' => 3,
        );
	    
	    $controls[] = array(
	        'type'     => 'color',
	        'settings'  => 'tg_single_course_title_color',
	        'label'    => esc_html__('Single Course Title Color', 'dotlife' ),
	        'section'  => 'course_single',
	        'default'  => '#222222',
	        'output' => array(
		        array(
		            'element'  => 'body.single-lp_course #lp-single-course .single_course_title h1, body.single-meeting .single_course_title h1',
		            'property' => 'color',
		        ),
		    ),
		    'transport' 	 => 'postMessage',
		    'priority' => 3,
		    'js_vars'   => array(
				array(
					'element'  => 'body.single-lp_course #lp-single-course .single_course_title h1, body.single-meeting .single_course_title h1',
					'function' => 'css',
					'property' => 'color',
				),
			)
	    );
	    
	    $controls[] = array(
	        'type'     => 'title',
	        'settings'  => 'tg_course_meta_title',
	        'label'    => esc_html__('Course Meta Settings', 'dotlife' ),
	        'section'  => 'course_single',
		    'priority' => 4,
	    );
        
        $controls[] = array(
            'type'     => 'toggle',
            'settings'  => 'tg_course_top_featured_image_display',
            'label'    => esc_html__('Display Course Featured Image', 'dotlife' ),
            'description' => esc_html__('Check this option to display course featured image on single course page', 'dotlife' ),
            'section'  => 'course_single',
            'default'  => 1,
            'priority' => 5,
        );
	    
	    $controls[] = array(
	        'type'     => 'toggle',
	        'settings'  => 'tg_course_meta_display',
	        'label'    => esc_html__('Display Course Meta Data', 'dotlife' ),
	        'description' => esc_html__('Check this option to display course meta data on single course page', 'dotlife' ),
	        'section'  => 'course_single',
	        'default'  => 1,
		    'priority' => 6,
	    );
	    
	    $controls[] = array(
	        'type'     => 'color',
	        'settings'  => 'tg_course_meta_bg_color',
	        'label'    => esc_html__('Course Meta Background Color', 'dotlife' ),
	        'section'  => 'course_single',
	        'default'  => '#ffffff',
	        'output' => array(
		        array(
		            'element'  => '#single_course_meta ul.single_course_meta_data',
		            'property' => 'background',
		        ),
		    ),
		    'transport' 	 => 'postMessage',
		    'priority' => 16,
		    'js_vars'   => array(
				array(
					'element'  => '#single_course_meta ul.single_course_meta_data',
					'function' => 'css',
					'property' => 'background',
				),
			)
	    );
	    
	    $controls[] = array(
	        'type'     => 'color',
	        'settings'  => 'tg_course_meta_font_color',
	        'label'    => esc_html__('Course Meta Font Color', 'dotlife' ),
	        'section'  => 'course_single',
	        'default'  => '#222222',
	        'output' => array(
		        array(
		            'element'  => '#single_course_meta ul.single_course_meta_data',
		            'property' => 'color',
		        ),
		    ),
		    'transport' 	 => 'postMessage',
		    'priority' => 16,
		    'js_vars'   => array(
				array(
					'element'  => '#single_course_meta ul.single_course_meta_data',
					'function' => 'css',
					'property' => 'color',
				),
			)
	    );
	}

    return $controls;
}
add_filter( 'kirki/controls', 'dotlife_custom_setting' );


function dotlife_customize_preview()
{
?>
    <script type="text/javascript">
        ( function( $ ) {
        	//Register Logo Tab Settings
        	wp.customize('tg_retina_logo',function( value ) {
                value.bind(function(to) {
                    jQuery('#custom_logo img').attr('src', to );
                });
            });
        	//End Logo Tab Settings
        
			//Register General Tab Settings
            wp.customize('tg_body_font',function( value ) {
                value.bind(function(to) {
                	var ppGGFont = 'http://fonts.googleapis.com/css?family='+to;
                	if(jQuery('#google_fonts_'+to).length===0)
                	{
			    		jQuery('head').append('<link rel="stylesheet" id="google_fonts_'+to+'" href="'+ppGGFont+'" type="text/css" media="all">');
			    	}
                    jQuery('body, input[type=text], input[type=password], input[type=email], input[type=url], input[type=date], input[type=tel], input.wpcf7-text, .woocommerce table.cart td.actions .coupon .input-text, .woocommerce-page table.cart td.actions .coupon .input-text, .woocommerce #content table.cart td.actions .coupon .input-text, .woocommerce-page #content table.cart td.actions .coupon .input-text, select, textarea, .ui-widget input, .ui-widget select, .ui-widget textarea, .ui-widget button, .ui-widget label, .ui-widget-header, .zm_alr_ul_container').css('fontFamily', to );
                });
            });
            
            wp.customize('tg_button_font',function( value ) {
                value.bind(function(to) {
                	var ppGGFont = 'http://fonts.googleapis.com/css?family='+to;
                	if(jQuery('#google_fonts_'+to).length===0)
                	{
			    		jQuery('head').append('<link rel="stylesheet" id="google_fonts_'+to+'" href="'+ppGGFont+'" type="text/css" media="all">');
			    	}
                    jQuery('input[type=submit], input[type=button], a.button, .button, .woocommerce .page_slider a.button, a.button.fullwidth, .woocommerce-page div.product form.cart .button, .woocommerce #respond input#submit.alt, .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt').css('fontFamily', to );
                });
            });
            //End General Tab Settings
        
        	//Register Menu Tab Settings
        	wp.customize('tg_menu_font',function( value ) {
                value.bind(function(to) {
                	var ppGGFont = 'http://fonts.googleapis.com/css?family='+to;
                	if(jQuery('#google_fonts_'+to).length===0)
                	{
			    		jQuery('head').append('<link rel="stylesheet" id="google_fonts_'+to+'" href="'+ppGGFont+'" type="text/css" media="all">');
			    	}
                    jQuery('#menu_wrapper .nav ul li a, #menu_wrapper div .nav li > a').css('fontFamily', to );
                });
            });
            
            wp.customize('tg_menu_contact_hours',function( value ) {
                value.bind(function(to) {
                    jQuery('#top_contact_hours').html('<i class="fa fa-clock-o"></i>'+to);
                });
            });
            
            wp.customize('tg_menu_contact_number',function( value ) {
                value.bind(function(to) {
                    jQuery('#top_contact_number').html('<i class="fa fa-phone"></i>'+to);
                });
            });
            
            wp.customize('tg_sidemenu_font',function( value ) {
                value.bind(function(to) {
                	var ppGGFont = 'http://fonts.googleapis.com/css?family='+to;
                	if(jQuery('#google_fonts_'+to).length===0)
                	{
			    		jQuery('head').append('<link rel="stylesheet" id="google_fonts_'+to+'" href="'+ppGGFont+'" type="text/css" media="all">');
			    	}
                    jQuery('.mobile_main_nav li a, #sub_menu li a').css('fontFamily', to );
                });
            });
            //End Menu Tab Settings
            
        	
        	//Register Sidebar Tab Settings
            wp.customize('tg_sidebar_title_font',function( value ) {
                value.bind(function(to) {
                	var ppGGFont = 'http://fonts.googleapis.com/css?family='+to;
                	if(jQuery('#google_fonts_'+to).length===0)
                	{
			    		jQuery('head').append('<link rel="stylesheet" id="google_fonts_'+to+'" href="'+ppGGFont+'" type="text/css" media="all">');
			    	}
                    jQuery('#page_content_wrapper .sidebar .content .sidebar_widget li h2.widgettitle, h2.widgettitle, h5.widgettitle').css('fontFamily', to );
                });
            });
            //End Sidebar Tab Settings
            
            
            //Register Footer Tab Settings
            wp.customize('tg_footer_copyright_text',function( value ) {
                value.bind(function(to) {
                    jQuery('#copyright').html( to );
                });
            });
            //End Footer Tab Settings
        } )( jQuery )
    </script>
<?php	
}