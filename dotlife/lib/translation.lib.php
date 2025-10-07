<?php
function dotlife_theme_load() {
	load_theme_textdomain( 'dotlife', get_template_directory().'/languages' );
}
add_action( 'init', 'dotlife_theme_load' );

?>