<?php
/*ading theme options panel*/
$wp_customize->add_panel( 'restaurant-recipe-single-post', array(
	'priority'       => 85,
	'capability'     => 'edit_theme_options',
	'title'          => esc_html__( 'Single Post Option', 'restaurant-recipe' )
) );

/*
* file for entry meta
*/
require_once restaurant_recipe_file_directory('acmethemes/customizer/single-posts/header-title.php');

/*
* file for feature-image
*/
require_once restaurant_recipe_file_directory('acmethemes/customizer/single-posts/feature-image.php');