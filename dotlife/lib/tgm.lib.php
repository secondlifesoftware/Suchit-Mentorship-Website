<?php
require_once get_template_directory() . "/modules/class-tgm-plugin-activation.php";
add_action( 'tgmpa_register', 'dotlife_require_plugins' );
 
function dotlife_require_plugins() {
 
    $plugins = array(
	    array(
	        'name'      		 => 'Elementor Page Builder',
	        'slug'      		 => 'elementor',
	        'required'  		 => true, 
	    ),
	    array(
	        'name'               => 'One Click Demo Import',
	        'slug'      		 => 'one-click-demo-import',
	        'required'           => true, 
	    ),
	    array(
	        'name'               => 'LearnPress – WordPress LMS Plugin',
	        'slug'      		 => 'learnpress',
	        'required'           => false, 
	    ),
		array(
			'name'               => 'Tutor LMS – eLearning and online course solution',
			'slug'      		 => 'tutor',
			'required'           => false, 
		),
	    array(
	        'name'               => 'DotLife Theme Elements for Elementor',
	        'slug'      		 => 'dotlife-elementor',
	        'source'             => 'https://themegoods-assets.b-cdn.net/dotlife-elementor/dotlife-elementor-v3.9.zip',
	        'required'           => true, 
	        'version'            => '3.9',
	    ),
		array(
			'name'               => 'Appointment Booking',
			'slug'      		 => 'motopress-appointment',
			'source'             => 'https://themegoods-assets.b-cdn.net/motopress-appointment/motopress-appointment-v2.1.2.zip',
			'required'           => true, 
			'version'            => '2.1.2',
		),
		array(
			'name'               => 'Appointment Booking Checkout Fields',
			'slug'      		 => 'mpa-checkout-fields',
			'source'             => 'https://themegoods-assets.b-cdn.net/mpa-checkout-fields/mpa-checkout-fields-v1.1.1.zip',
			'required'           => false, 
			'version'            => '1.1.1',
		),
		array(
			'name'               => 'Appointment Booking PDF Invoices',
			'slug'      		 => 'mpa-invoices',
			'source'             => 'https://themegoods-assets.b-cdn.net/mpa-invoices/mpa-invoices-v1.0.1.zip',
			'required'           => false, 
			'version'            => '1.0.1',
		),
		array(
			'name'               => 'Appointment Booking WooCommerce Payments',
			'slug'      		 => 'mpa-woocommerce',
			'source'             => 'https://themegoods-assets.b-cdn.net/mpa-woocommerce/mpa-woocommerce-v1.2.0.zip',
			'required'           => true, 
			'version'            => '1.2.0',
		),
		array(
			'name'               => 'Google Analytics for Appointment Booking',
			'slug'      		 => 'mpa-google-analytics',
			'source'             => 'https://themegoods-assets.b-cdn.net/mpa-google-analytics/mpa-google-analytics-v1.0.1.zip',
			'required'           => true, 
			'version'            => '1.0.1',
		),
		array(
			'name'               => 'Appointment Booking Twilio SMS',
			'slug'      		 => 'mpa-twilio-sms',
			'source'             => 'https://themegoods-assets.b-cdn.net/mpa-twilio-sms/mpa-twilio-sms-v1.0.0.zip',
			'required'           => true, 
			'version'            => '1.0.0',
		),
		array(
			'name'               => 'Square Payments for Appointment Booking',
			'slug'      		 => 'mpa-square-payments',
			'source'             => 'https://themegoods-assets.b-cdn.net/mpa-square-payments/mpa-square-payments-v1.0.1.zip',
			'required'           => true, 
			'version'            => '1.0.1',
		),
	    array(
			'name'               => 'Envato Market',
			'slug'               => 'envato-market',
			'source'             => 'https://themegoods-assets.b-cdn.net/envato-market/envato-market-v2.0.12.zip',
			'required'           => true, 
			'version'            => '2.0.12',
		),
	    array(
	        'name'      => 'Contact Form 7',
	        'slug'      => 'contact-form-7',
	        'required'  => true, 
	    ),
	    array(
	        'name'      => 'WooCommerce',
	        'slug'      => 'woocommerce',
	        'required'  => false, 
	    ),
	    array(
	        'name'      => 'Mailchimp for WordPress',
	        'slug'      => 'mailchimp-for-wp',
	        'required'  => false, 
	    ),
	    array(
			'name'      => 'Extended Google Map for Elementor',
			'slug'      => 'extended-google-map-for-elementor',
			'required'  => false, 
			'source'    => 'https://themegoods-assets.b-cdn.net/extended-google-map-for-elementor/extended-google-map-for-elementor-v1.2.5.zip',
			'version'   => '1.2.5',
		),
	    array(
	        'name'      => 'LoftLoader',
	        'slug'      => 'loftloader',
	        'required'  => false, 
	    ),
	    array(
	        'name'      => 'Custom Fonts',
	        'slug'      => 'custom-fonts',
	        'required'  => true, 
	    ),
		array(
			'name'      => 'Before After Image Comparison Slider for Elementor',
			'slug'      => 'before-after-image-comparison-slider-for-elementor',
			'required'  => false, 
		),
	);
	
	//If theme demo site add other plugins
	if(DOTLIFE_THEMEDEMO)
	{
		$plugins[] = array(
			'name'      => 'EWWW Image Optimizer',
	        'slug'      => 'ewww-image-optimizer',
	        'required'  => false, 
		);
		
		$plugins[] = array(
			'name'      => 'Disable Comments',
	        'slug'      => 'disable-comments',
	        'required'  => false, 
		);
		
		$plugins[] = array(
			'name'      => 'Customizer Export/Import',
	        'slug'      => 'customizer-export-import',
	        'required'  => false, 
		);
		
		$plugins[] = array(
			'name'      => 'Display All Image Sizes',
	        'slug'      => 'display-all-image-sizes',
	        'required'  => false, 
		);
		
		$plugins[] = array(
			'name'      => 'Easy Theme and Plugin Upgrades',
	        'slug'      => 'easy-theme-and-plugin-upgrades',
	        'required'  => false, 
		);
		
		$plugins[] = array(
			'name'      => 'Widget Importer & Exporter',
	        'slug'      => 'widget-importer-exporter',
	        'required'  => false, 
		);
		
		$plugins[] = array(
	        'name'      => 'Imsanity',
	        'slug'      => 'imsanity',
	        'required'  => false, 
	    );
		
		$plugins[] = array(
			'name'      => 'Go Live Update URLs',
	        'slug'      => 'go-live-update-urls',
	        'required'  => false, 
		);
		
		$plugins[] = array(
			'name'      => 'Duplicate Menu',
	        'slug'      => 'duplicate-menu',
	        'required'  => false, 
		);
		
		$plugins[] = array(
			'name'      => 'Quick remove menu item',
	        'slug'      => 'quick-remove-menu-item',
	        'required'  => false, 
		);
		
		$plugins[] = array(
			'name'      => 'WP-Optimize',
	        'slug'      => 'wp-optimize',
	        'required'  => false, 
		);
		
		$plugins[] = array(
			'name'      => 'Regenerate post permalinks',
	        'slug'      => 'regenerate-post-permalinks',
	        'required'  => false, 
		);
		
		$plugins[] = array(
			'name'      => 'Duplicate Post',
	        'slug'      => 'duplicate-post',
	        'required'  => false, 
		);
	}
	
	$config = array(
		'domain'	=> 'dotlife',
        'default_path' => '',                      // Default absolute path to pre-packaged plugins.
        'menu'         => 'install-required-plugins', // Menu slug.
        'has_notices'  => true,                    // Show admin notices or not.
        'is_automatic' => true,                   // Automatically activate plugins after installation or not.
        'message'      => '',                      // Message to output right before the plugins table.
        'strings'          => array(
	        'page_title'                      => esc_html__('Install Required Plugins', 'dotlife' ),
	        'menu_title'                      => esc_html__('Install Plugins', 'dotlife' ),
	        'installing'                      => esc_html__('Installing Plugin: %s', 'dotlife' ),
	        'oops'                            => esc_html__('Something went wrong with the plugin API.', 'dotlife' ),
	        'return'                          => esc_html__('Return to Required Plugins Installer', 'dotlife' ),
	        'plugin_activated'                => esc_html__('Plugin activated successfully.', 'dotlife' ),
	        'complete'                        => esc_html__('All plugins installed and activated successfully. %s', 'dotlife' ),
	        'nag_type'                        => 'update-nag'
	    )
    );
 
    tgmpa( $plugins, $config );
}

function dotlife_get_require_plugins() {
 
    $plugins = array(
	    array(
	        'name'      		 => 'Elementor Page Builder',
	        'desc'      		 => 'Add theme page builder main functionality.',
	        'required'  		 => true, 
	    ),
	    array(
	        'name'               => 'One Click Demo Import',
	        'desc'      		 => 'Add demo import functionality.',
	        'required'           => true, 
	    ),
	    array(
	        'name'               => 'DotLife Theme Elements for Elementor',
	        'desc'      		 => 'Add theme’s custom widgets to Elementor page builder.',
	        'required'           => true, 
	    ),
	    array(
	        'name'               => 'LearnPress – WordPress LMS Plugin',
	        'desc'      		 => 'Add courses, lessons, quizzes and all LMS functionalities',
	        'required'           => false, 
	    ),
		array(
			'name'               => 'Tutor LMS – eLearning and online course solution',
			'desc'      		 => 'Add courses, lessons, quizzes and all LMS functionalities',
			'required'           => false, 
		),
		array(
			'name'               => 'Appointment Booking',
			'desc'      		 => 'Add appointment booking management functionalities',
			'required'           => false, 
		),
		array(
			'name'               => 'Appointment Booking WooCommerce Payments',
			'desc'      		 => 'Add WooCommerce payments support for appointment booking',
			'required'           => false, 
		),
		array(
			'name'               => 'Google Analytics for Appointment Booking',
			'desc'      		 => 'Add Google Analytics support for appointment booking',
			'required'           => false, 
		),
		array(
			'name'               => 'Appointment Booking Twilio SMS',
			'desc'      		 => 'Add SMS notification support for appointment booking',
			'required'           => false, 
		),
		array(
			'name'               => 'Square Payments for Appointment Booking',
			'desc'      		 => 'Add Square payments support for appointment booking',
			'required'           => false, 
		),
	    array(
	        'name'      => 'Contact Form 7',
	        'desc'      => 'Add custom contact and registration forms functionality.',
	        'required'  => true, 
	    ),
	    array(
	        'name'      => 'Mailchimp for WordPress',
	        'desc'      => 'Add mailing list subscription management functionality.',
	        'required'  => true, 
	    ),
	    array(
	        'name'      => 'Custom Fonts',
	        'desc'      => 'Add custom uploaded fonts functionality.',
	        'required'  => true, 
	    ),
	    array(
	        'name'      => 'WooCommerce',
	        'desc'      => 'Add shop and online payment functionality.',
	        'required'  => false, 
	    ),
	    array(
	        'name'               => 'Envato Market',
	        'desc'               => 'Add auto theme update functionality.',
	        'required'           => false, 
	    ),
	    array(
	        'name'      => 'LoftLoader',
	        'desc'      => 'Add page loading screen functionality.',
	        'required'  => false, 
	    ),
	    array(
	        'name'      => 'Extended Google Map for Elementor',
	        'desc'      => 'Add advanced Google Maps widget to Elementor.',
	        'required'  => false, 
	    ),
		array(
			'name'      => 'Before After Image Comparison Slider for Elementor',
			'desc'      => 'Add before/after slider widget to Elementor.',
			'required'  => false, 
		),
	);
	
	return $plugins;
}
?>