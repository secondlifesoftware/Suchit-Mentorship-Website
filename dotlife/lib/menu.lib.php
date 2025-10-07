<?php
/*
 *  Setup main navigation menu
 */
add_action( 'init', 'register_my_menu' );
function register_my_menu() {
	register_nav_menu( 'primary-menu', esc_html__('Primary Menu', 'dotlife' ) );
	
	if(DOTLIFE_THEMEDEMO)
	{
		register_nav_menu( 'demo-primary-menu', esc_html__('Demo Primary Menu', 'dotlife' ) );
	}
	
	register_nav_menu( 'secondary-menu', esc_html__('Secondary Menu', 'dotlife' ) );
	register_nav_menu( 'top-menu', esc_html__('Top Bar Menu', 'dotlife' ) );
	register_nav_menu( 'side-menu', esc_html__('Side (Mobile) Menu', 'dotlife' ) );
	register_nav_menu( 'footer-menu', esc_html__('Footer Menu', 'dotlife' ) );
}

class dotlife_walker extends Walker_Nav_Menu {

	function display_element($element, &$children_elements, $max_depth, $depth=0, $args=array(), &$output='') {
        $id_field = $this->db_fields['id'];
        if (!empty($children_elements[$element->$id_field])) { 
            $element->classes[] = 'arrow'; //enter any classname you like here!
        }
        
        Walker_Nav_Menu::display_element($element, $children_elements, $max_depth, $depth, $args, $output);
    }
    
    function start_el(&$output, $item, $depth = 0, $args = array(), $id = 0) {
	    $object = $item->object;
    	$type = $item->type;
    	$title = $item->title;
    	$description = $item->description;
    	$permalink = $item->url;
    	$megamenu = get_post_meta( $item->ID, 'menu-item-megamenu', true );
    	
    	//If globally disable mega menu then remove
    	if(!DOTLIFE_MEGAMENU)
    	{
	    	$megamenu = '';
    	}
    	
		$item_classes = '';
		if(is_array($item->classes)) {
			$item_classes = implode(" ", $item->classes);
		}
		else if(is_string($item->classes)) {
			$item_classes = $item->classes;
		}
	    $output .= "<li class='" . $item_classes;
	    
	    if($depth == 0 && !empty($megamenu))
	    {
		    $output .= " elementor-megamenu megamenu arrow";
		}
		
		$output .= "'>";
	    
	    $output .= '<a href="'.esc_url($permalink).'" ';
	    
	    if(!empty($item->target)) {
	    	$output.= 'target="' . esc_attr( $item->target ) .'"';  
	    }
	    
	    $output .= '>'.$title;
		$output .= '</a>';
		
		if($depth == 0 && !empty($megamenu) && DOTLIFE_MEGAMENU)
	    {
		    if(!empty($megamenu) && class_exists("\\Elementor\\Plugin"))
			{
		    	$output .= '<div class="elementor-megamenu-wrapper"> '.dotlife_get_elementor_content($megamenu).'</div>';
		    }
		}
	}
}

class dotlife_sidemenu_walker extends Walker_Nav_Menu {

	function display_element($element, &$children_elements, $max_depth, $depth=0, $args=array(), &$output='') {
		$id_field = $this->db_fields['id'];
		if (!empty($children_elements[$element->$id_field])) { 
			$element->classes[] = 'arrow'; //enter any classname you like here!
		}
		
		Walker_Nav_Menu::display_element($element, $children_elements, $max_depth, $depth, $args, $output);
	}
	
	function start_el(&$output, $item, $depth = 0, $args = array(), $id = 0) {
		$object = $item->object;
		$type = $item->type;
		$title = $item->title;
		$description = $item->description;
		$permalink = $item->url;
		$megamenu = get_post_meta( $item->ID, 'menu-item-megamenu', true );
		
		$item_classes = '';
		if(is_array($item->classes)) {
			$item_classes = implode(" ", $item->classes);
		}
		else if(is_string($item->classes)) {
			$item_classes = $item->classes;
		}
		
		// Check if the menu item has a link
		$has_link = ! empty( $item->url ) && $item->url !== '#';
		
		// Add a class to the menu item based on whether it has a link or not
		$item_classes.= $has_link ? ' menu-item-has-link' : ' menu-item-no-link';
		
		// Check if the menu item has a link target
		$has_target = ! empty( $item->target );
		if(!empty($has_target)) {
			$item_classes.= ' menu-item-target-'.$item->target;
		}
		
		$output .= "<li class='" . $item_classes;
		$output .= "'>";
		
		if($has_link && $has_children) {
			$permalink = '#';
		}
		
		$output .= '<a href="'.esc_url($permalink).'" ';
		
		if(!empty($item->target)) {
			$output.= 'target="' . esc_attr( $item->target ) .'"';  
		}
		
		$output .= '>'.$title;
		$output .= '</a>';
		
		// Check if the menu item has children
		$has_children = ! empty( $args->walker->has_children ) && $args->walker->has_children;
		
		if($has_link && $has_children) {
			$output .= '<a class="menu-item-icon-link" href="'.esc_url($item->url).'" target="'.esc_attr($item->target).'"><i class="fas fa-long-arrow-alt-right"></i></a>';
		}
	}
}
?>