<?php
/*adding sections for sidebar options */
$wp_customize->add_section( 'restaurant-recipe-wc-shop-archive-option', array(
	'priority'       => 20,
	'capability'     => 'edit_theme_options',
	'title'          => esc_html__( 'Shop Archive Sidebar Layout', 'restaurant-recipe' ),
	'panel'          => 'restaurant-recipe-wc-panel'
) );

/*Sidebar Layout*/
$wp_customize->add_setting( 'restaurant_recipe_theme_options[restaurant-recipe-wc-shop-archive-sidebar-layout]', array(
	'capability'		=> 'edit_theme_options',
	'default'			=> $defaults['restaurant-recipe-wc-shop-archive-sidebar-layout'],
	'sanitize_callback' => 'restaurant_recipe_sanitize_select'
) );
$choices = restaurant_recipe_sidebar_layout();
$wp_customize->add_control( 'restaurant_recipe_theme_options[restaurant-recipe-wc-shop-archive-sidebar-layout]', array(
	'choices'  	=> $choices,
	'label'		=> esc_html__( 'Shop Archive Sidebar Layout', 'restaurant-recipe' ),
	'section'   => 'restaurant-recipe-wc-shop-archive-option',
	'settings'  => 'restaurant_recipe_theme_options[restaurant-recipe-wc-shop-archive-sidebar-layout]',
	'type'	  	=> 'select'
) );

/*wc-product-column-number*/
$wp_customize->add_setting( 'restaurant_recipe_theme_options[restaurant-recipe-wc-product-column-number]', array(
	'capability'		=> 'edit_theme_options',
	'default'			=> $defaults['restaurant-recipe-wc-product-column-number'],
	'sanitize_callback' => 'absint'
) );
$wp_customize->add_control( 'restaurant_recipe_theme_options[restaurant-recipe-wc-product-column-number]', array(
	'label'		=> esc_html__( 'Products Per Row', 'restaurant-recipe' ),
	'section'   => 'restaurant-recipe-wc-shop-archive-option',
	'settings'  => 'restaurant_recipe_theme_options[restaurant-recipe-wc-product-column-number]',
	'type'	  	=> 'number'
) );

/*wc-shop-archive-total-product*/
$wp_customize->add_setting( 'restaurant_recipe_theme_options[restaurant-recipe-wc-shop-archive-total-product]', array(
	'capability'		=> 'edit_theme_options',
	'default'			=> $defaults['restaurant-recipe-wc-shop-archive-total-product'],
	'sanitize_callback' => 'absint'
) );
$wp_customize->add_control( 'restaurant_recipe_theme_options[restaurant-recipe-wc-shop-archive-total-product]', array(
	'label'		=> esc_html__( 'Total Products Per Page', 'restaurant-recipe' ),
	'section'   => 'restaurant-recipe-wc-shop-archive-option',
	'settings'  => 'restaurant_recipe_theme_options[restaurant-recipe-wc-shop-archive-total-product]',
	'type'	  	=> 'number'
) );