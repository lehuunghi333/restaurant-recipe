<?php
/*adding sections for header title*/
$wp_customize->add_section( 'restaurant-recipe-single-header-title', array(
	'priority'              => 20,
	'capability'            => 'edit_theme_options',
	'title'                 => esc_html__( 'Single Header Title', 'restaurant-recipe' ),
	'panel'                 => 'restaurant-recipe-single-post',
) );

/*header title*/
$wp_customize->add_setting( 'restaurant_recipe_theme_options[restaurant-recipe-single-header-title]', array(
	'capability'		    => 'edit_theme_options',
	'default'			    => $defaults['restaurant-recipe-single-header-title'],
	'sanitize_callback'     => 'sanitize_text_field'
) );
$wp_customize->add_control( 'restaurant_recipe_theme_options[restaurant-recipe-single-header-title]', array(
	'label'		            => esc_html__( 'Header Title', 'restaurant-recipe' ),
	'section'               => 'restaurant-recipe-single-header-title',
	'settings'              => 'restaurant_recipe_theme_options[restaurant-recipe-single-header-title]',
	'type'	  	            => 'text'
) );