<?php
/**
 * The main template file for display single post page.
 *
 * @package WordPress
*/

get_header(); 

$dotlife_topbar = dotlife_get_topbar();

/**
*	Get current page id
**/

$current_page_id = $post->ID;

//Include custom header feature
get_template_part("/templates/template-meeting-header");
?>
    
    <div class="inner">

    	<!-- Begin main content -->
    	<div class="inner_wrapper">

    		<div class="sidebar_content full_width blog_f">
					
<?php
if (have_posts()) : while (have_posts()) : the_post();
?>
						
<!-- Begin each blog post -->
<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<div class="post_wrapper">

	    <?php
		    the_content();
		?>
	    
	</div>

</div>
<!-- End each blog post -->

<?php
if(comments_open($post->ID) OR dotlife_post_has('pings', $post->ID)) 
{
?>
<div class="fullwidth_comment_wrapper sidebar themeborder"><?php comments_template( '', true ); ?></div>
<?php
}
?>

<?php endwhile; endif; ?>
						
    	</div>
    
    </div>
    <!-- End main content -->
</div>

</div>
<?php get_footer(); ?>