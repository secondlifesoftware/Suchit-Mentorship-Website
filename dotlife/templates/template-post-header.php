<?php
/**
*	Get Current page object
**/
$page = get_page($post->ID);

/**
*	Get current page id
**/

if(!isset($current_page_id) && isset($page->ID))
{
    $current_page_id = $page->ID;
}

$dotlife_topbar = dotlife_get_topbar();
$dotlife_screen_class = dotlife_get_screen_class();
$dotlife_page_content_class = dotlife_get_page_content_class();

$pp_page_bg = '';

//Check if display blog featured content
$tg_blog_feat_content = get_theme_mod('tg_blog_feat_content', true);

//Check if hide post featured
$hide_featured_image = get_post_meta($post->ID, 'hide_featured_image', true);
if(!empty($hide_featured_image))
{
	$tg_blog_feat_content = 0;
}

//Get page featured image
if(has_post_thumbnail($current_page_id, 'original') && !empty($tg_blog_feat_content))
{
    $image_id = get_post_thumbnail_id($current_page_id); 
    $image_thumb = wp_get_attachment_image_src($image_id, 'original', true);
    
    if(isset($image_thumb[0]) && !empty($image_thumb[0]))
    {
    	$pp_page_bg = $image_thumb[0];
    }
    
    //Check if add parallax effect
	$tg_page_header_bg_parallax = get_theme_mod('tg_page_header_bg_parallax');
	if(!empty($tg_page_header_bg_parallax))
	{
		wp_enqueue_script("jarallax", get_template_directory_uri()."/js/jarallax.js", false, DOTLIFE_THEMEVERSION, true);
		wp_enqueue_script("jarallax-element", get_template_directory_uri()."/js/jarallax-element.js", false, DOTLIFE_THEMEVERSION, true);
		
		$custom_jarallax_script = "
		jQuery(function( $ ) {
			var parallaxSpeed = 0.2;
		    if(jQuery(window).width() > 1200)
		    {
			    parallaxSpeed = 0.5;
		    }
		    
	    	jQuery('.parallax').each(function(){
	    		var parallaxObj = jQuery(this);
	    	
			 	jQuery(this).jarallax({
			 		zIndex          : 0,
			 		speed			: parallaxSpeed,
			 		onCoverImage: function() {
				        parallaxObj.css('z-index', 0);
				    }
			 	});
			 });
		});
		";
		
		wp_add_inline_script('jarallax-element', $custom_jarallax_script);
	}
}
?>

<div id="page_caption" class="<?php if(!empty($pp_page_bg)) { ?>hasbg <?php if(!empty($tg_page_header_bg_parallax)) { ?>parallax<?php } ?> <?php } ?> <?php if(!empty($dotlife_topbar)) { ?>withtopbar<?php } ?> <?php if(!empty($dotlife_screen_class)) { echo esc_attr($dotlife_screen_class); } ?> <?php if(!empty($dotlife_page_content_class)) { echo esc_attr($dotlife_page_content_class); } ?>" <?php if(!empty($pp_page_bg)) { ?>style="background-image:url(<?php echo esc_url($pp_page_bg); ?>);"<?php } ?>>
	<?php 
		if(!empty($pp_page_bg)) 
		{
	?>
		<div id="page_caption_overlay"></div>
	<?php
		}
	?>
	<div class="page_title_wrapper">
		<div class="standard_wrapper">
			<div class="page_title_inner">
				<?php
					//Check location to display post title
					$tg_blog_single_post_title = get_theme_mod('tg_blog_single_post_title', 'featured_image');
					
					if($tg_blog_single_post_title == 'featured_image') 
					{
						$tg_page_title_font_alignment = get_theme_mod('tg_page_title_font_alignment', 'left');	
				?>
					<div class="page_title_content title_align_<?php echo esc_attr($tg_page_title_font_alignment); ?>">
						<?php
							//Get blog categories
							$tg_blog_cat = get_theme_mod('tg_blog_cat', true);
							if(!empty($tg_blog_cat))
							{
						?>
						<div class="post_detail single_post">
					    	<span class="post_info_cat">
								<?php
								   //Get Post's Categories
								   $post_categories = wp_get_post_categories($post->ID);
								   
								   $count_categories = count($post_categories);
								   $i = 0;
								   
								   if(!empty($post_categories))
								   {
								      	foreach($post_categories as $key => $c)
								      	{
								      		$cat = get_category( $c );
								?>
								      	<a href="<?php echo esc_url(get_category_link($cat->term_id)); ?>"><?php echo esc_html($cat->name); ?></a>
								<?php
									   		if(++$i != $count_categories) 
									   		{
									   			echo '&nbsp;&middot;&nbsp;';
									   		}
								      	}
								   }
								?>
					    	</span>
					 	</div>
					 	<?php
						 	}
						?>
						<h1 <?php if(!empty($pp_page_bg) && !empty($dotlife_topbar)) { ?>class ="withtopbar"<?php } ?>><?php the_title(); ?></h1>
						<?php
							//Get blog date
							$tg_blog_date = get_theme_mod('tg_blog_date', true);
							if(!empty($tg_blog_date))
							{
						?>
						<div class="post_attribute">
							<?php echo date_i18n(DOTLIFE_THEMEDATEFORMAT, get_the_time('U')); ?>
					    </div>
					    <?php
						 	}
						?>
					</div>
				<?php 
					}
				?>
			</div>
		</div>
	</div>
</div>

<!-- Begin content -->
<div id="page_content_wrapper" class="blog_wrapper <?php if(!empty($pp_page_bg)) { ?>hasbg <?php } ?><?php if(!empty($pp_page_bg) && !empty($dotlife_topbar)) { ?>withtopbar <?php } ?><?php if(!empty($dotlife_page_content_class)) { echo esc_attr($dotlife_page_content_class); } ?>">
	<?php
		//Check if custom post type plugin is installed	
		$dotlife_custom_post = ABSPATH . '/wp-content/plugins/dotlife-custom-post/dotlife-custom-post.php';
		
		$dotlife_custom_post_activated = file_exists($dotlife_custom_post);
		
		if($dotlife_custom_post_activated)
		{
			include_once( ABSPATH . '/wp-content/plugins/dotlife-custom-post/templates/template-share.php');
		}
	?>

	<?php
		//Check location to display post title
		$tg_blog_single_post_title = get_theme_mod('tg_blog_single_post_title', 'featured_image');
		
		if($tg_blog_single_post_title == 'content') 
		{
			$tg_page_title_font_alignment = get_theme_mod('tg_page_title_font_alignment', 'left');	
	?>
		<div class="page_title_content title_align_<?php echo esc_attr($tg_page_title_font_alignment); ?>">
			<?php
				//Get blog categories
				$tg_blog_cat = get_theme_mod('tg_blog_cat', true);
				if(!empty($tg_blog_cat))
				{
			?>
			<div class="post_detail single_post">
		    	<span class="post_info_cat">
					<?php
					   //Get Post's Categories
					   $post_categories = wp_get_post_categories($post->ID);
					   
					   $count_categories = count($post_categories);
					   $i = 0;
					   
					   if(!empty($post_categories))
					   {
					      	foreach($post_categories as $key => $c)
					      	{
					      		$cat = get_category( $c );
					?>
					      	<a href="<?php echo esc_url(get_category_link($cat->term_id)); ?>"><?php echo esc_html($cat->name); ?></a>
					<?php
						   		if(++$i != $count_categories) 
						   		{
						   			echo '&nbsp;&middot;&nbsp;';
						   		}
					      	}
					   }
					?>
		    	</span>
		 	</div>
		 	<?php
			 	}
			?>
			<h1 <?php if(!empty($pp_page_bg) && !empty($dotlife_topbar)) { ?>class ="withtopbar"<?php } ?>><?php the_title(); ?></h1>
			<?php
				//Get blog date
				$tg_blog_date = get_theme_mod('tg_blog_date', true);
				if(!empty($tg_blog_date))
				{
			?>
			<div class="post_attribute">
				<?php echo date_i18n(DOTLIFE_THEMEDATEFORMAT, get_the_time('U')); ?>
		    </div>
		    <?php
			 	}
			?>
		</div>
	<?php 
		}
	?>