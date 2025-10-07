<?php
function dotlife_get_course_curriculum_number($course_id = '')
{
	$course_lessons = 0;
	$course_metas = get_post_meta($course_id, '_lp_info_extra_fast_query');
	
	if(!empty($course_metas)) {
		$course_metas_obj = json_decode($course_metas[0]);
		
		if(is_object($course_metas_obj)) {
			$course_lessons = $course_metas_obj->total_items->lp_lesson;
		}
	}
	
	return $course_lessons;
}
	
add_action( 'learn-press/before-single-course', 'dotlife_single_course_header' );
function dotlife_single_course_header() {
	$obj_post = dotlife_get_wp_post();
	
	if(class_exists('LP_Global'))
	{
		$obj_course = LP_Global::course();
	}
?>
<div id="single_course_header">
	<div class="standard_wrapper">
		<div class="single_course_title">
			<h1><?php the_title(); ?></h1>
			
			<div class="single_course_excerpt">
				<?php the_excerpt(); ?>
			</div>
		</div>
		<div class="single_course_price_wrapper">
			<?php if ( isset($obj_course) && $price_html = $obj_course->get_price_html() ) { ?>

				<?php if ( $obj_course->get_origin_price() != $obj_course->get_price() ) { ?>
		
					<?php $origin_price_html = $obj_course->get_origin_price_html(); ?>
					
					<span class="origin-price"><?php echo stripslashes($origin_price_html); ?></span>
		
				<?php } ?>
		
				<?php
					if(stripslashes($price_html) != 'Free') 
					{
				?>
					<span class="price"><?php echo stripslashes($price_html); ?></span>
				<?php
					}
				?>
		
			<?php } ?>
		</div>
		<?php
			$current_user_id = get_current_user_id();
			//$is_enrolled = learn_press_is_enrolled_course($obj_post->ID, $current_user_id);
			$lp_user   = learn_press_get_current_user();
			$is_enrolled = $lp_user->has_enrolled_course($obj_post->ID);
			$is_finished = $lp_user->has_finished_course($obj_post->ID);
			
			if($is_finished)
			{
				$is_enrolled = true;
			}
			
			$course_lp_no_required_enroll = get_post_meta($obj_post->ID, '_lp_no_required_enroll', true);
			
			if($course_lp_no_required_enroll == 'yes')
			{
				$is_enrolled = true;
			}
			
			if(!$is_enrolled)
			{
				//Check if course purchase link to external URL
				$course_lp_external_link_buy_course = get_post_meta($obj_post->ID, '_lp_external_link_buy_course', true);
		?>
		<div class="single_course_join">
			<?php
				if(empty($course_lp_external_link_buy_course))
				{
			?>
				<a id="single_course_enroll" href="javascript:;" class="button"><?php esc_html_e('Enroll This Course', 'dotlife' ); ?></a>
			<?php
				}
				else
				{
			?>
				<a id="single_course_enroll" href="<?php echo esc_url($course_lp_external_link_buy_course); ?>" target="_blank" class="button external-course"><?php esc_html_e('Enroll This Course', 'dotlife' ); ?></a>
			<?php	
				}
			?>
		</div>
		<?php
			}
		?>
	</div>
</div>
<br class="clear"/>
<?php
	$has_image_class = '';
	$tg_course_top_featured_image_display = get_theme_mod('tg_course_top_featured_image_display', true);
	
	//Get page featured image
	if(has_post_thumbnail($obj_post->ID, 'full') && !empty($tg_course_top_featured_image_display))
    {
        $image_id = get_post_thumbnail_id($obj_post->ID); 
        $image_thumb = wp_get_attachment_image_src($image_id, 'full', true);
        
        if(isset($image_thumb[0]) && !empty($image_thumb[0]))
        {
        	$pp_page_bg = $image_thumb[0];
        }
        
        if(!empty($pp_page_bg))
        {
	        $has_image_class = 'has_image';
?>
<div id="single_course_bgimage" style="background-image:url(<?php echo esc_url($pp_page_bg); ?>);"></div>
<?php
        }
    }
    
    $tg_course_meta_display = get_theme_mod('tg_course_meta_display', true);
    
    if(!empty($tg_course_meta_display))
    {
?>
<div id="single_course_meta" class="standard_wrapper <?php if(empty($tg_course_top_featured_image_display)) { ?>nomargin<?php } ?>">
	<ul class="single_course_meta_data">
		<?php
			$course_duration = get_post_meta($obj_post->ID, '_lp_duration', true);
			
			if(!empty($course_duration))
			{
		?>
		<li>
			<div class="single_course_meta_data_icon">
				<span class="ti-alarm-clock"></span>
			</div>
			<div class="single_course_meta_data_text">
				<span class="single_course_meta_data_title">
					<?php esc_html_e('Duration', 'dotlife' ); ?>
				</span>
				<?php
					$course_duration_arr = explode(" ", $course_duration);
					
					$duration_int = 0;
					$duration_type = esc_html__('weeks', 'dotlife' );
					if(isset($course_duration_arr[0]))
					{
						$duration_int = intval($course_duration_arr[0]);
						
						if(isset($course_duration_arr[1]))
						{
							$is_plural = false;
							if($duration_int > 1)
							{
								$is_plural = true;
							}
							
							switch($course_duration_arr[1])
							{
								case 'week':
								case 'weeks':
								default:
									if($is_plural)
									{
										$duration_type = esc_html__('weeks', 'dotlife' );
									}
									else
									{
										$duration_type = esc_html__('week', 'dotlife' );
									}
								break;
								
								case 'day':
								case 'days':
									if($is_plural)
									{
										$duration_type = esc_html__('days', 'dotlife' );
									}
									else
									{
										$duration_type = esc_html__('day', 'dotlife' );
									}
								break;
								
								case 'hour':
								case 'hours':
									if($is_plural)
									{
										$duration_type = esc_html__('hours', 'dotlife' );
									}
									else
									{
										$duration_type = esc_html__('hour', 'dotlife' );
									}
								break;
								
								case 'minute':
								case 'minutes':
									if($is_plural)
									{
										$duration_type = esc_html__('minutes', 'dotlife' );
									}
									else
									{
										$duration_type = esc_html__('minute', 'dotlife' );
									}
								break;
							}
						}
					}
				?>
				<span class="single_course_meta_data_content">
					<?php echo esc_html($duration_int.'&nbsp;'.$duration_type); ?>
				</span>
			</div>
		</li>
		<li class="single_course_meta_data_separator"></li>
		<?php
			}
		?>

		<?php
			$course_skill_level = get_post_meta($obj_post->ID, '_lp_skill_level', true);
			
			if(!empty($course_skill_level))
			{
		?>
		<li>
			<div class="single_course_meta_data_icon">
				<span class="ti-thumb-up"></span>
			</div>
			<div class="single_course_meta_data_text">
				<span class="single_course_meta_data_title">
					<?php esc_html_e('Skill Level', 'dotlife' ); ?>
				</span>
				<span class="single_course_meta_data_content">
					<?php echo esc_html($course_skill_level); ?>
				</span>
			</div>
		</li>
		<li class="single_course_meta_data_separator"></li>
		<?php
			}
		?>
		
		<?php
		if(function_exists('dotlife_get_course_curriculum_number'))
		{
			$course_lessons = dotlife_get_course_curriculum_number($obj_post->ID);
			
			if(!empty($course_lessons))
			{
		?>
		<li>
			<div class="single_course_meta_data_icon">
				<span class="ti-agenda"></span>
			</div>
			<div class="single_course_meta_data_text">
				<span class="single_course_meta_data_title">
					<?php esc_html_e('Lectures', 'dotlife' ); ?>
				</span>
				<span class="single_course_meta_data_content">
					<?php echo esc_html($course_lessons); ?>
					<?php
						if($course_lessons > 1)
						{
							echo esc_html_e('lessons', 'dotlife' );
						}
						else
						{
							echo esc_html_e('lesson', 'dotlife' );
						}
					?>
				</span>
			</div>
		</li>
		<li class="single_course_meta_data_separator"></li>
		<?php
			}
		}
		?>
		
		<?php
			$course_enrolled_number = get_post_meta($obj_post->ID, '_lp_students', true);
			
			if(!empty($course_enrolled_number))
			{
		?>
		<li>
			<div class="single_course_meta_data_icon">
				<span class="ti-user"></span>
			</div>
			<div class="single_course_meta_data_text">
				<span class="single_course_meta_data_title">
					<?php esc_html_e('Enrolled', 'dotlife' ); ?>
				</span>
				<span class="single_course_meta_data_content">
					<?php echo esc_html($course_enrolled_number); ?>
					<?php
						if($course_enrolled_number > 1)
						{
							echo esc_html_e('students', 'dotlife' );
						}
						else
						{
							echo esc_html_e('student', 'dotlife' );
						}
					?>
				</span>
			</div>
		</li>
		<li class="single_course_meta_data_separator"></li>
		<?php
			}
		?>
	</ul>
</div>
<?php
	} //End if display course meta
}

add_action( 'learn-press/after-single-course', 'dotlife_single_course_footer' );
function dotlife_single_course_footer() {
?>
<a href="javascript:;" id="course_action"></a>
<?php	
}
?>