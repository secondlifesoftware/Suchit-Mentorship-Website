<?php
/**
 * The template for displaying the footer.
 *
 * @package WordPress
 */
 
?>
</div>
<?php
	$tg_footer_content = get_theme_mod('tg_footer_content', 'sidebar');
	$tg_footer_sidebar = get_theme_mod('tg_footer_sidebar', 3);
	
	//Check if blank template
	$dotlife_is_no_header = dotlife_get_is_no_header();
	$dotlife_screen_class = dotlife_get_screen_class();
	
	if(!is_bool($dotlife_is_no_header) OR !$dotlife_is_no_header)
	{

	$dotlife_homepage_style = dotlife_get_homepage_style();
	$tg_page_hide_footer_default = 0;
	
	if(is_page())
	{
		//Check if hide footer
		$tg_page_hide_footer_default = get_post_meta($post->ID, 'page_hide_footer', false);
	}
	
	if(empty($tg_page_hide_footer_default))
	{
?>
<div id="footer_wrapper">
<?php
//if using footer post content
if($tg_footer_content == 'content')
{
	if(is_page())
	{
		$tg_footer_content_default = get_post_meta($post->ID, 'page_footer', true);
		
		if(empty($tg_footer_content_default))
		{
			$tg_footer_content_default = get_theme_mod('tg_footer_content_default');
		}
	}
	else
	{
		$tg_footer_content_default = get_theme_mod('tg_footer_content_default');
	}
	
	//Add Polylang plugin support
	if (function_exists('pll_get_post')) {
		$tg_footer_content_default = pll_get_post($tg_footer_content_default);
	}
	
	//Add WPML plugin support
	if (function_exists('icl_object_id')) {
		$tg_footer_content_default = icl_object_id($tg_footer_content_default, 'page', false, ICL_LANGUAGE_CODE);
	}

	if(!empty($tg_footer_content_default) && class_exists("\\Elementor\\Plugin"))
	{
		echo dotlife_get_elementor_content($tg_footer_content_default);
	}	
}
//end if using footer post content

//if use footer sidebar as content
else if($tg_footer_content == 'sidebar')
{
	//Check if page type
	if(is_page())
	{
		$page_show_footer_sidebar = get_post_meta($post->ID, 'page_show_footer_sidebar', true);
	}
	else
	{
		$page_show_footer_sidebar = 0;
	}
	
    if(!empty($tg_footer_sidebar) && empty($page_show_footer_sidebar))
    {
    	$footer_class = '';
    	
    	switch($tg_footer_sidebar)
    	{
    		case 1:
    			$footer_class = 'one';
    		break;
    		case 2:
    			$footer_class = 'two';
    		break;
    		case 3:
    			$footer_class = 'three';
    		break;
    		case 4:
    			$footer_class = 'four';
    		break;
    		default:
    			$footer_class = 'four';
    		break;
    	}
?>
<div id="footer" class="<?php if(isset($dotlife_homepage_style) && !empty($dotlife_homepage_style)) { echo esc_attr($dotlife_homepage_style); } ?> <?php if(!empty($dotlife_screen_class)) { echo esc_attr($dotlife_screen_class); } ?>">
<?php
	if(is_active_sidebar('Footer Sidebar')) 
	{
?>
	<ul class="sidebar_widget <?php echo esc_attr($footer_class); ?>">
	    <?php dynamic_sidebar('Footer Sidebar'); ?>
	</ul>
<?php
	}
?>
</div>
<?php
    }
    
	//Check if page type
	if(is_page())
	{
		$page_show_copyright = get_post_meta($post->ID, 'page_show_copyright', true);
	}
	else
	{
		$page_show_copyright = 0;
	}
	
	if(empty($page_show_copyright))
	{
		//Get Footer Sidebar
		if(DOTLIFE_THEMEDEMO && isset($_GET['footer']) && !empty($_GET['footer']))
		{
		    $tg_footer_sidebar = 0;
		}
	?>
	<div class="footer_bar <?php if(isset($dotlife_homepage_style) && !empty($dotlife_homepage_style)) { echo esc_attr($dotlife_homepage_style); } ?> <?php if(!empty($dotlife_screen_class)) { echo esc_attr($dotlife_screen_class); } ?> <?php if(empty($tg_footer_sidebar)) { ?>noborder<?php } ?>">
	
		<div class="footer_bar_wrapper <?php if(isset($dotlife_homepage_style) && !empty($dotlife_homepage_style)) { echo esc_attr($dotlife_homepage_style); } ?>">
			<?php
				//Check if display social icons or footer menu
				$tg_footer_copyright_right_area = get_theme_mod('tg_footer_copyright_right_area', 'menu');
				
				if($tg_footer_copyright_right_area=='social')
				{
					if($dotlife_homepage_style!='flow' && $dotlife_homepage_style!='fullscreen' && $dotlife_homepage_style!='carousel' && $dotlife_homepage_style!='flip' && $dotlife_homepage_style!='fullscreen_video')
					{	
						//Check if open link in new window
						$tg_footer_social_link = get_theme_mod('tg_footer_social_link' ,true);
				?>
				<div class="social_wrapper">
				    <ul>
				    	<?php
				    		$pp_facebook_url = get_option('pp_facebook_url');
				    		
				    		if(!empty($pp_facebook_url))
				    		{
				    	?>
				    	<li class="facebook"><a <?php if(!empty($tg_footer_social_link)) { ?>target="_blank"<?php } ?> href="<?php echo esc_url($pp_facebook_url); ?>"><i class="fab fa-facebook"></i></a></li>
				    	<?php
				    		}
				    	?>
				    	<?php
				    		$pp_twitter_username = get_option('pp_twitter_username');
				    		
				    		if(!empty($pp_twitter_username))
				    		{
				    	?>
				    	<li class="twitter"><a <?php if(!empty($tg_footer_social_link)) { ?>target="_blank"<?php } ?> href="https://twitter.com/<?php echo esc_attr($pp_twitter_username); ?>"><i class="fab fa-twitter"></i></a></li>
				    	<?php
				    		}
				    	?>
				    	<?php
				    		$pp_flickr_username = get_option('pp_flickr_username');
				    		
				    		if(!empty($pp_flickr_username))
				    		{
				    	?>
				    	<li class="flickr"><a <?php if(!empty($tg_footer_social_link)) { ?>target="_blank"<?php } ?> title="Flickr" href="https://flickr.com/people/<?php echo esc_attr($pp_flickr_username); ?>"><i class="fab fa-flickr"></i></a></li>
				    	<?php
				    		}
				    	?>
				    	<?php
				    		$pp_youtube_url = get_option('pp_youtube_url');
				    		
				    		if(!empty($pp_youtube_url))
				    		{
				    	?>
				    	<li class="youtube"><a <?php if(!empty($tg_footer_social_link)) { ?>target="_blank"<?php } ?> title="Youtube" href="<?php echo esc_url($pp_youtube_url); ?>"><i class="fab fa-youtube"></i></a></li>
				    	<?php
				    		}
				    	?>
				    	<?php
				    		$pp_vimeo_username = get_option('pp_vimeo_username');
				    		
				    		if(!empty($pp_vimeo_username))
				    		{
				    	?>
				    	<li class="vimeo"><a <?php if(!empty($tg_footer_social_link)) { ?>target="_blank"<?php } ?> title="Vimeo" href="https://vimeo.com/<?php echo esc_attr($pp_vimeo_username); ?>"><i class="fab fa-vimeo-square"></i></a></li>
				    	<?php
				    		}
				    	?>
				    	<?php
				    		$pp_tumblr_username = get_option('pp_tumblr_username');
				    		
				    		if(!empty($pp_tumblr_username))
				    		{
				    	?>
				    	<li class="tumblr"><a <?php if(!empty($tg_footer_social_link)) { ?>target="_blank"<?php } ?> title="Tumblr" href="https://<?php echo esc_attr($pp_tumblr_username); ?>.tumblr.com"><i class="fab fa-tumblr"></i></a></li>
				    	<?php
				    		}
				    	?>
				    	<?php
				    		$pp_google_url = get_option('pp_google_url');
				    		
				    		if(!empty($pp_google_url))
				    		{
				    	?>
				    	<li class="google"><a <?php if(!empty($tg_footer_social_link)) { ?>target="_blank"<?php } ?> title="Google+" href="<?php echo esc_url($pp_google_url); ?>"><i class="fab fa-google-plus"></i></a></li>
				    	<?php
				    		}
				    	?>
				    	<?php
				    		$pp_dribbble_username = get_option('pp_dribbble_username');
				    		
				    		if(!empty($pp_dribbble_username))
				    		{
				    	?>
				    	<li class="dribbble"><a <?php if(!empty($tg_footer_social_link)) { ?>target="_blank"<?php } ?> title="Dribbble" href="https://dribbble.com/<?php echo esc_attr($pp_dribbble_username); ?>"><i class="fab fa-dribbble"></i></a></li>
				    	<?php
				    		}
				    	?>
				    	<?php
				    		$pp_linkedin_url = get_option('pp_linkedin_url');
				    		
				    		if(!empty($pp_linkedin_url))
				    		{
				    	?>
				    	<li class="linkedin"><a <?php if(!empty($tg_footer_social_link)) { ?>target="_blank"<?php } ?> title="Linkedin" href="<?php echo esc_url($pp_linkedin_url); ?>"><i class="fab fa-linkedin"></i></a></li>
				    	<?php
				    		}
				    	?>
				    	<?php
				            $pp_pinterest_username = get_option('pp_pinterest_username');
				            
				            if(!empty($pp_pinterest_username))
				            {
				        ?>
				        <li class="pinterest"><a <?php if(!empty($tg_footer_social_link)) { ?>target="_blank"<?php } ?> title="Pinterest" href="https://pinterest.com/<?php echo esc_attr($pp_pinterest_username); ?>"><i class="fab fa-pinterest"></i></a></li>
				        <?php
				            }
				        ?>
				        <?php
				        	$pp_instagram_username = get_option('pp_instagram_username');
				        	
				        	if(!empty($pp_instagram_username))
				        	{
				        ?>
				        <li class="instagram"><a <?php if(!empty($tg_footer_social_link)) { ?>target="_blank"<?php } ?> title="Instagram" href="https://instagram.com/<?php echo esc_attr($pp_instagram_username); ?>"><i class="fab fa-instagram"></i></a></li>
				        <?php
				        	}
				        ?>
				        <?php
				        	$pp_behance_username = get_option('pp_behance_username');
				        	
				        	if(!empty($pp_behance_username))
				        	{
				        ?>
				        <li class="behance"><a <?php if(!empty($tg_footer_social_link)) { ?>target="_blank"<?php } ?> title="Behance" href="https://behance.net/<?php echo esc_attr($pp_behance_username); ?>"><i class="fab fa-behance-square"></i></a></li>
				        <?php
				        	}
				        ?>
				        <?php
						    $pp_500px_url = get_option('pp_500px_url');
						    
						    if(!empty($pp_500px_url))
						    {
						?>
						<li class="500px"><a <?php if(!empty($tg_footer_social_link)) { ?>target="_blank"<?php } ?> title="500px" href="<?php echo esc_url($pp_500px_url); ?>"><i class="fab fa-500px"></i></a></li>
						<?php
						    }
						?>
				    </ul>
				</div>
			<?php
					}
				} //End if display social icons
				else
				{
					if ( has_nav_menu( 'footer-menu' ) ) 
				    {
					    wp_nav_menu( 
					        	array( 
					        		'menu_id'			=> 'footer_menu',
					        		'menu_class'		=> 'footer_nav',
					        		'theme_location' 	=> 'footer-menu',
					        	) 
					    ); 
					}
				}
			?>
		    <?php
		    	//Display copyright text
		        $tg_footer_copyright_text = get_theme_mod('tg_footer_copyright_text', '© Copyright');
	
		        if(!empty($tg_footer_copyright_text))
		        {
		        	echo '<div id="copyright">'.wp_kses_post(wp_specialchars_decode($tg_footer_copyright_text)).'</div><br class="clear"/>';
		        }
		    ?>
		</div>
	</div>
	<?php
	}
} //end if using footer sidebar as content
?>
</div>
<?php
    } //End if not blank template
?>

<?php
	//Check if display to top button
	$tg_footer_copyright_totop = get_theme_mod('tg_footer_copyright_totop', true);
	
	if(!empty($tg_footer_copyright_totop))
	{
?>
 	<a id="toTop" href="javascript:;"><i class="fa fa-angle-up"></i></a>
<?php
 	}
?>

<?php
    //Check if theme demo then enable layout switcher
    if(DOTLIFE_THEMEDEMO)
    {	
?>
    <div id="option_wrapper">
    <div class="inner">
    	<div style="text-align:center">
	    	
	    	<div class="purchase_theme_button">
		    	<a class="button" href="https://1.envato.market/xD2Gk" target="_blank">Purchase Theme $64</a>
	    	</div>
	    	
	    	<h6>Ready to use Demos</h6>
	    	<p>
	    		Here are example of predefined demo sites that can be imported within one click.
	    	</p>
	    	<?php
	    		$customizer_styling_arr = array( 
					array(
						'id'	=>	17, 
						'title' => 'Life Coach 2', 
						'url' => dotlife_get_demo_url('dotlifev4-9', 'demo2'),
						'label' => 'New',
					),
					array(
						'id'	=>	16, 
						'title' => 'College & University', 
						'url' => dotlife_get_demo_url('dotlifev4-9', ''),
						'label' => 'New',
					),
					array(
						'id'	=>	15, 
						'title' => 'Fashion & Stylish Consultant', 
						'url' => dotlife_get_demo_url('dotlifev4-7', 'fashion'),
						'label' => 'New',
					),
					array(
						'id'	=>	14, 
						'title' => 'Business Coach', 
						'url' => dotlife_get_demo_url('dotlifev4-7', ''),
						'label' => 'New',
					),
					array(
						'id'	=>	13, 
						'title' => 'Fitness Trainer', 
						'url' => dotlife_get_demo_url('dotlifev4-5', 'fitness-trainer'),
					),
					array(
						'id'	=>	12, 
						'title' => 'Yoga Coach', 
						'url' => dotlife_get_demo_url('dotlifev4-5', ''),
					),
					array(
						'id'	=>	11, 
						'title' => 'Male Life Coach & Podcaster', 
						'url' => dotlife_get_demo_url('themes', 'dotlifev4/demo5'),
					),
					array(
						'id'	=>	10, 
						'title' => 'Female Life Coach & Podcaster', 
						'url' => dotlife_get_demo_url('themes', 'dotlifev4'),
					),
		    		array(
						'id'	=>	8, 
						'title' => 'Female Life Coach', 
						'url' => dotlife_get_demo_url('themes', 'dotlife_sites'),
					),
					array(
						'id'	=>	9, 
						'title' => 'Financial Coach', 
						'url' => dotlife_get_demo_url('themes', 'dotlife_sites/demo3'),
					),
					array(
						'id'	=>	1, 
						'title' => 'Classic Life Coach Home 1', 
						'url' => dotlife_get_demo_url('themes', 'dotlife/demo/'),
					),
					array(
						'id'	=>	2, 
						'title' => 'Classic Life Coach Home 2', 
						'url' => dotlife_get_demo_url('themes', 'dotlife/demo/home-2'),
					),
					array(
						'id'	=>	3, 
						'title' => 'Classic Life Coach Home 3', 
						'url' => dotlife_get_demo_url('themes', 'dotlife/demo/home-3'),
					),
					array(
						'id'	=>	4, 
						'title' => 'Classic Life Coach Home 4', 
						'url' => dotlife_get_demo_url('themes', 'dotlife/demo/home-4'),
					),
					array(
						'id'	=>	5, 
						'title' => 'Classic Life Coach Home 5', 
						'url' => dotlife_get_demo_url('themes', 'dotlife/demo/home-5'),
					),
					array(
						'id'	=>	6, 
						'title' => 'Classic Life Coach Home 6', 
						'url' => dotlife_get_demo_url('themes', 'dotlife/demo/home-6'),
					),
					array(
						'id'	=>	7, 
						'title' => 'Classic Life Coach Home 7', 
						'url' => dotlife_get_demo_url('themes', 'dotlife/demo/home-7'),
					),
				);
	    	?>
	    	<ul class="demo_list">
	    		<?php
	    			foreach($customizer_styling_arr as $customizer_styling)
	    			{
	    		?>
	    		<li>
	        		<img src="<?php echo get_template_directory_uri(); ?>/data/home<?php echo esc_html($customizer_styling['id']); ?>.jpg" alt="<?php echo esc_attr($customizer_styling['title']); ?>"/>
	        		<?php
		        		if(isset($customizer_styling['label']))	{
		        	?>
		        		<div class="demo_label"><?php echo esc_html($customizer_styling['label']); ?></div>
		        	<?php
			        	}
			        ?>
	        		
	        		<div class="demo_thumb_hover_wrapper">
	        		    <div class="demo_thumb_hover_inner">
	        		    	<div class="demo_thumb_desc">
								<?php
									if(isset($customizer_styling['title']))	{
								?>
								<h6><?php echo esc_html($customizer_styling['title']); ?></h6>
								<?php
									}
								?>
	    	    	    		<a href="<?php echo esc_url($customizer_styling['url']); ?>" target="_blank" class="button white">Launch</a>
	        		    	</div> 
	        		    </div>	   
	        		</div>		   
	    		</li>
	    		<?php
	    			}
	    		?>
	    	</ul>
    	</div>
    </div>
    </div>
    <div id="option_btn">
    	<a href="javascript:;" class="demotip" title="Choose Theme Demo"><span class="ti-settings"></span></a>
		
		<a href="https://1.envato.market/KeNmk7" class="demotip" title="Presale Question" target="_blank"><span class="ti-comment"></span></a>
    	
    	<a href="https://docs.themegoods.com/docs/dotlife/" class="demotip" title="Theme Documentation" target="_blank"><span class="ti-book"></span></a>
    	
    	<a href="https://1.envato.market/xD2Gk" title="Purchase Theme" class="demotip" target="_blank"><span class="ti-shopping-cart"></span></a>
    </div>
<?php
    	wp_enqueue_script("dotlife-jquery-cookie", get_template_directory_uri()."/js/jquery.cookie.js", false, DOTLIFE_THEMEVERSION, true);
    	wp_enqueue_script("tooltipster", get_template_directory_uri()."/js/jquery.tooltipster.min.js", false, DOTLIFE_THEMEVERSION, true);
    	wp_enqueue_script("dotlife-demo", get_template_directory_uri()."/js/core/demo.js", false, DOTLIFE_THEMEVERSION, true);
    }
?>

<?php
    $tg_frame = get_theme_mod('tg_frame', false);
    
    if(DOTLIFE_THEMEDEMO && isset($_GET['frame']) && !empty($_GET['frame']))
    {
	    $tg_frame = 1;
    }
    
    if(!empty($tg_frame))
    {
?>
    <div class="frame_top"></div>
    <div class="frame_bottom"></div>
    <div class="frame_left"></div>
    <div class="frame_right"></div>
<?php
    }
?>

</div>
<?php
	} //End if page hide footer
?>
<?php
    $tg_enable_right_click = get_theme_mod('tg_enable_right_click', false);
    $tg_enable_right_click_content = get_theme_mod('tg_enable_right_click_content', false);

    if(!empty($tg_enable_right_click) && !empty($tg_enable_right_click_content))
    {
	    $tg_enable_right_click_content_text = get_theme_mod('tg_enable_right_click_content_text');
?>
    <div id="right_click_content">
	    <div class="right_click_content_table">
		    <div class="right_click_content_cell">
		    	<div><?php echo esc_html($tg_enable_right_click_content_text); ?></div>
	    	</div>
	    </div>
    </div>
<?php
    }
	
		//Display fullscreen menu
		$dotlife_fullmenu_default = get_theme_mod('dotlife_fullmenu_default');
		if(!empty($dotlife_fullmenu_default))
		{
			//Add Polylang plugin support
			if (function_exists('pll_get_post')) {
				$dotlife_fullmenu_default = pll_get_post($dotlife_fullmenu_default);
			}
			
			//Add WPML plugin support
			if (function_exists('icl_object_id')) {
				$dotlife_fullmenu_default = icl_object_id($dotlife_fullmenu_default, 'page', false, ICL_LANGUAGE_CODE);
			}
			
			if(!empty($dotlife_fullmenu_default) && class_exists("\\Elementor\\Plugin"))
			{
	?>
		<div id="fullmenu-wrapper-<?php echo esc_attr($dotlife_fullmenu_default); ?>" class="fullmenu-wrapper">
	<?php
				echo dotlife_get_elementor_content($dotlife_fullmenu_default);
	?>
		</div>
	<?php
			}
		}
	?>

<?php
	/* Always have wp_footer() just before the closing </body>
	 * tag of your theme, or you will break many plugins, which
	 * generally use this hook to reference JavaScript files.
	 */

	wp_footer();
?>
</body>
</html>
