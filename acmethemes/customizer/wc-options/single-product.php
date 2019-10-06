<?php
/*adding sections for sidebar options */
$wp_customize->add_section( 'restaurant-recipe-wc-single-product-options', array(
	'priority'       => 20,
	'capability'     => 'edit_theme_options',
	'title'          => esc_html__( 'Single Product', 'restaurant-recipe' ),
	'panel'          => 'restaurant-recipe-wc-panel'
) );

/*Sidebar Layout*/
$wp_customize->add_setting( 'restaurant_recipe_theme_options[restaurant-recipe-wc-single-product-sidebar-layout]', array(
	'capability'		=> 'edit_theme_options',
	'default'			=> $defaults['restaurant-recipe-wc-single-product-sidebar-layout'],
	'sanitize_callback' => 'restaurant_recipe_sanitize_select'
) );
$choices = restaurant_recipe_sidebar_layout();
$wp_customize->add_control( 'restaurant_recipe_theme_options[restaurant-recipe-wc-single-product-sidebar-layout]', array(
	'choices'  	=> $choices,
	'label'		=> esc_html__( 'Single Product Sidebar Layout', 'restaurant-recipe' ),
	'section'   => 'restaurant-recipe-wc-single-product-options',
	'settings'  => 'restaurant_recipe_theme_options[restaurant-recipe-wc-single-product-sidebar-layout]',
	'type'	  	=> 'select'
) );