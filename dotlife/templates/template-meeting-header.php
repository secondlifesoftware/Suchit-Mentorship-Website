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

$dotlife_page_content_class = dotlife_get_page_content_class();
?>

<div id="single_course_header">
	<div class="standard_wrapper">
		<div class="single_course_title">
			<h1><?php the_title(); ?></h1>
		</div>
		<?php
			//Get meeting URL
			$meeting_url = get_post_meta($current_page_id, 'meeting_url', true);
			
			if(!empty($meeting_url))
			{
		?>
		<div class="single_course_join">
			<a id="single_meeting_join" href="<?php echo esc_url($meeting_url); ?>" class="button" target="_blank"><?php esc_html_e('Join', 'dotlife' ); ?></a>
		</div>
		<?php
			}
		?>
	</div>
</div>
<br class="clear"/>

<?php
	$has_image_class = '';
	$pp_page_bg = '';
	
	//Get page featured image
	if(has_post_thumbnail($current_page_id, 'full'))
    {
        $image_id = get_post_thumbnail_id($current_page_id); 
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
    
	//Display meeting meta data
?>
<div id="single_course_meta" class="standard_wrapper">
	<ul class="single_course_meta_data">
		<?php
			//Get meeting start date
			$meeting_date = get_post_meta($current_page_id, 'meeting_date', true);
			
			if(!empty($meeting_date))
			{
		?>
		<li>
			<div class="single_course_meta_data_icon">
				<span class="ti-calendar"></span>
			</div>
			<div class="single_course_meta_data_text">
				<span class="single_course_meta_data_title">
					<?php esc_html_e('Start Date', 'dotlife' ); ?>
				</span>
				<span class="single_course_meta_data_content">
					<?php echo esc_html($meeting_date); ?>
				</span>
			</div>
		</li>
		<?php
			}
		?>
		
		<li class="single_course_meta_data_separator"></li>
		<?php
			//Get meeting start time
			$meeting_time = get_post_meta($current_page_id, 'meeting_time', true);
			
			if(!empty($meeting_time))
			{
		?>
		<li>
			<div class="single_course_meta_data_icon">
				<span class="ti-timer"></span>
			</div>
			<div class="single_course_meta_data_text">
				<span class="single_course_meta_data_title">
					<?php esc_html_e('Start Time', 'dotlife' ); ?>
				</span>
				<span class="single_course_meta_data_content">
					<?php echo esc_html($meeting_time); ?>
				</span>
			</div>
		</li>
		<?php
			}
		?>
		
		<li class="single_course_meta_data_separator"></li>
		
		<?php
			//Get meeting duration
			$meeting_duration = get_post_meta($current_page_id, 'meeting_duration', true);
			
			if(!empty($meeting_duration))
			{
		?>
		<li>
			<div class="single_course_meta_data_icon">
				<span class="ti-time"></span>
			</div>
			<div class="single_course_meta_data_text">
				<span class="single_course_meta_data_title">
					<?php esc_html_e('Duration', 'dotlife' ); ?>
				</span>
				<span class="single_course_meta_data_content">
					<?php echo esc_html($meeting_duration); ?>
				</span>
			</div>
		</li>
		<?php
			}
		?>
		<li class="single_course_meta_data_separator"></li>
		
		<?php
			//Get meeting hosted by
			$meeting_hosted_by = get_post_meta($current_page_id, 'meeting_hosted_by', true);
			
			if(!empty($meeting_hosted_by))
			{
		?>
		<li>
			<div class="single_course_meta_data_icon">
				<span class="ti-user"></span>
			</div>
			<div class="single_course_meta_data_text">
				<span class="single_course_meta_data_title">
					<?php esc_html_e('Hosted By', 'dotlife' ); ?>
				</span>
				<span class="single_course_meta_data_content">
					<?php echo esc_html($meeting_hosted_by); ?>
				</span>
			</div>
		</li>
		<?php
			}
		?>
		
		<li class="single_course_meta_data_separator"></li>
	</ul>
</div>

<!-- Begin content -->
<div id="page_content_wrapper" class="blog_wrapper <?php if(!empty($dotlife_page_content_class)) { echo esc_attr($dotlife_page_content_class); } ?>">