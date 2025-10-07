<?php
/**
 * Plugin Name:       WordPress admin pointer for product registration
 */

add_action(
	'in_admin_header',
	function() {
		wp_enqueue_script( 'jquery' );
		wp_enqueue_style( 'wp-pointer' );
		wp_enqueue_script( 'wp-pointer' );
	
		if (
			! get_user_meta(
				get_current_user_id(),
				'dotlife-pointer-registration-dismissed',
				true
			)
		):
			
		?>
			<script>
			jQuery(
				function() {
					jQuery('#pp_panel_registration_a').first().pointer( 
						{
							content:
								"<h3>Purchase Code Registration<\/h3>" +
								"<p>Once you registered your purchase code. It will be attached to this website domain. If you want to change the domain registration. Don't forget to click <b>Unregister button</b> first then you will be able to register the purchase code again on other website domain.</p>" +
								"<p>Please register your account <a href='https://license.themegoods.com/manager/' target='_blank'>here</a> then you will be able to manage/remove your purchase code registration there.</p>",


							position:
								{
									edge:  'bottom',
									align: 'left'
								},

							pointerClass:
								'wp-pointer arrow-top',

							pointerWidth: 420,
							
							close: function() {
								jQuery.post(
									ajaxurl,
									{
										pointer: 'dotlife-pointer-registration',
										action: 'dismiss-pointer-registration',
									}
								);
							},

						}
					).pointer('open');
				}
			);
			</script>

		<?php
		endif;
	}
);

add_action(
	'admin_init',
	function() {

		if ( isset( $_POST['action'] ) && 'dismiss-pointer-registration' == $_POST['action'] ) {

			update_user_meta(
				get_current_user_id(),
				'dotlife-pointer-registration-dismissed',
				$_POST['pointer'],
				true
			);
		}
	}
);

/**
 * Plugin Name:       WordPress admin pointer for product registration
 */

add_action(
	'in_admin_header',
	function() {
		wp_enqueue_script( 'jquery' );
		wp_enqueue_style( 'wp-pointer' );
		wp_enqueue_script( 'wp-pointer' );
		
		$admin_url = admin_url()."?page=functions.php";
	
		if (
			! get_user_meta(
				get_current_user_id(),
				'dotlife-pointer-required-plugins-dismissed',
				true
			)
		):
			
		?>
			<script>
			jQuery(
				function() {
					jQuery('#menu-appearance').first().pointer( 
						{
							content:
								"<h3>Install Required Plugins<\/h3>" +
								"<p>Before installing required plugins. You have to <a href='<?php echo esc_url($admin_url); ?>'>register your purchase code</a>. Then you will be able to install all premium plugins from <b>Appearance > Install Plugins</b>.</p>" +
								"<p>Please see detailed instruction <a href='https://docs.themegoods.com/docs/dotlife/getting-started/register-your-purchase-using-token-key/' target='_blank'>here</a>.</p>",


							position:
								{
									edge:  'left',
									align: 'left'
								},

							pointerClass:
								'wp-pointer arrow-top',

							pointerWidth: 420,
							
							close: function() {
								jQuery.post(
									ajaxurl,
									{
										pointer: 'dotlife-pointer-required-plugins',
										action: 'dismiss-required-plugins',
									}
								);
							},

						}
					).pointer('open');
				}
			);
			</script>

		<?php
		endif;
	}
);

add_action(
	'admin_init',
	function() {

		if ( isset( $_POST['action'] ) && 'dismiss-required-plugins' == $_POST['action'] ) {

			update_user_meta(
				get_current_user_id(),
				'dotlife-pointer-required-plugins-dismissed',
				$_POST['pointer'],
				true
			);
		}
	}
);

/**
 * Plugin Name:       WordPress admin pointer for product registration
 */
if ( class_exists( 'LoftLoader' ) ) {
	add_action(
		'in_admin_header',
		function() {
			wp_enqueue_script( 'jquery' );
			wp_enqueue_style( 'wp-pointer' );
			wp_enqueue_script( 'wp-pointer' );
		
			if (
				! get_user_meta(
					get_current_user_id(),
					'dotlife-pointer-loftloader-dismissed',
					true
				)
			):
				
			?>
				<script>
				jQuery(
					function() {
						jQuery('#menu-settings').first().pointer( 
							{
								content:
									"<h3>Preloader Customization<\/h3>" +
									"<p>You can adjust the preloader under <b>Settings > LoftLoader Lite</b>.</p>" +
									"<p>You can also disable the <b>LoftLoader plugin</b> to remove the preloader.</p>",
	
	
								position:
									{
										edge:  'top',
										align: 'left'
									},
	
								pointerClass:
									'wp-pointer arrow-top',
	
								pointerWidth: 300,
								
								close: function() {
									jQuery.post(
										ajaxurl,
										{
											pointer: 'dotlife-pointer-loftloader',
											action: 'dismiss-loftloader',
										}
									);
								},
	
							}
						).pointer('open');
					}
				);
				</script>
	
			<?php
			endif;
		}
	);
	
	add_action(
		'admin_init',
		function() {
	
			if ( isset( $_POST['action'] ) && 'dismiss-loftloader' == $_POST['action'] ) {
	
				update_user_meta(
					get_current_user_id(),
					'dotlife-pointer-loftloader-dismissed',
					$_POST['pointer'],
					true
				);
			}
		}
	);
}

/**
 * Plugin Name:       WordPress admin pointer for Tutor LMS Pro
 */
//if ( class_exists( 'LoftLoader' ) ) {
	/*add_action(
		'in_admin_header',
		function() {
			wp_enqueue_script( 'jquery' );
			wp_enqueue_style( 'wp-pointer' );
			wp_enqueue_script( 'wp-pointer' );
		
			if (
				! get_user_meta(
					get_current_user_id(),
					'dotlife-pointer-tutorlmspro-dismissed',
					true
				)
			):
				
			?>
				<script>
				jQuery(
					function() {
						jQuery('.tutor-get-pro-text').first().pointer( 
							{
								content:
									"<h3>Tutor LMS Pro License<\/h3>" +
									"<p>Tutor LMS Pro license has already included in theme package.</p>" +
									"<p>Please see detailed instruction about how to get your license key from <a href='https://docs.themegoods.com/docs/dotlife/getting-started/register-your-purchase-using-token-key/' target='_blank'>here</a>.</p>",
	
	
								position:
									{
										edge:  'top',
										align: 'left'
									},
	
								pointerClass:
									'wp-pointer arrow-top',
	
								pointerWidth: 300,
								
								close: function() {
									jQuery.post(
										ajaxurl,
										{
											pointer: 'dotlife-pointer-tutorlmspro',
											action: 'dismiss-tutorlmspro',
										}
									);
								},
	
							}
						).pointer('open');
					}
				);
				</script>
	
			<?php
			endif;
		}
	);
	
	add_action(
		'admin_init',
		function() {
	
			if ( isset( $_POST['action'] ) && 'dismiss-tutorlmspro' == $_POST['action'] ) {
	
				update_user_meta(
					get_current_user_id(),
					'dotlife-pointer-tutorlmspro-dismissed',
					$_POST['pointer'],
					true
				);
			}
		}
	);*/
//}
?>