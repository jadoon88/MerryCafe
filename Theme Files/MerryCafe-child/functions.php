<?php
//For Loading Child Theme Styles
function merrycode_enqueue_child_theme_styles() {

		//Child Custom
		wp_enqueue_style('child-custom',  get_stylesheet_directory_uri() . '/child-custom.css');		

	}


add_action( 'wp_enqueue_scripts', 'merrycode_enqueue_child_theme_styles');




?>
