<?php
/*adding header options panel*/
$wp_customize->add_panel( 'restaurant-recipe-header-panel', array(
    'priority'       => 30,
    'capability'     => 'edit_theme_options',
    'title'          => esc_html__( 'Header Options', 'restaurant-recipe' ),
    'description'    => esc_html__( 'Customize your awesome site header ', 'restaurant-recipe' )
) );

/*
* file for header top options
*/
require restaurant_recipe_file_directory('acmethemes/customizer/header-options/header-top.php');

/*
* file for feature info
*/
require restaurant_recipe_file_directory('acmethemes/customizer/header-options/feature-info.php');

/*
* file for header logo options
*/
require restaurant_recipe_file_directory('acmethemes/customizer/header-options/header-logo.php');

/*
 * file for menu options
*/
require restaurant_recipe_file_directory('acmethemes/customizer/header-options/menu-options.php');

/*
* file for booking form
*/
require restaurant_recipe_file_directory('acmethemes/customizer/header-options/popup-widgets.php');

/*adding header image inside this panel*/
$wp_customize->get_section( 'header_image' )->panel = 'restaurant-recipe-header-panel';
$wp_customize->get_section( 'header_image' )->description = esc_html__( 'Applied to header image of inner pages.', 'restaurant-recipe' );

/* feature section height*/
$wp_customize->add_setting( 'restaurant_recipe_theme_options[restaurant-recipe-header-height]', array(
    'capability'		=> 'edit_theme_options',
    'default'			=> $defaults['restaurant-recipe-header-height'],
    'sanitize_callback' => 'restaurant_recipe_sanitize_number'
) );

$wp_customize->add_control( 'restaurant_recipe_theme_options[restaurant-recipe-header-height]', array(
    'type'              => 'range',
    'priority'          => 100,
    'section'           => 'header_image',
    'label'		        => esc_html__( 'Inner Page Header Section Height', 'restaurant-recipe' ),
    'description'       => esc_html__( 'Control the height of Header section. The minimum height is 100px and maximium height is 500px', 'restaurant-recipe' ),
    'input_attrs'       => array(
        'min'           => 100,
        'max'           => 500,
        'step'          => 1,
        'class'         => 'restaurant-recipe-header-height',
        'style'         => 'color: #0a0',
    ),
    'active_callback'   => 'restaurant_recipe_if_header_bg_image'
) );

/*Header Image Display*/
$choices = restaurant_recipe_header_image_display();
$wp_customize->add_setting( 'restaurant_recipe_theme_options[restaurant-recipe-header-image-display]', array(
	'capability'		        => 'edit_theme_options',
	'default'			        => $defaults['restaurant-recipe-header-image-display'],
	'sanitize_callback'         => 'restaurant_recipe_sanitize_select'
) );
$wp_customize->add_control( 'restaurant_recipe_theme_options[restaurant-recipe-header-image-display]', array(
	'choices'  	                => $choices,
	'priority'                  => 1,
	'label'		                => esc_html__( 'Header Image Display', 'restaurant-recipe' ),
	'section'                   => 'header_image',
	'settings'                  => 'restaurant_recipe_theme_options[restaurant-recipe-header-image-display]',
	'type'	  	                => 'select'
) );

/*check if header bg*/
if ( !function_exists('restaurant_recipe_if_header_bg_image') ) :
	function restaurant_recipe_if_header_bg_image() {
		$restaurant_recipe_customizer_all_values = restaurant_recipe_get_theme_options();
		if( 'bg-image' == $restaurant_recipe_customizer_all_values['restaurant-recipe-header-image-display'] ){
			return true;
		}
		return false;
	}
endif;