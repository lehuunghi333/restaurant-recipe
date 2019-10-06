<?php
/*Site Logo*/
$wp_customize->add_setting( 'restaurant_recipe_theme_options[restaurant-recipe-display-site-logo]', array(
	'capability'		=> 'edit_theme_options',
	'default'			=> $defaults['restaurant-recipe-display-site-logo'],
	'sanitize_callback' => 'restaurant_recipe_sanitize_checkbox'
) );
$wp_customize->add_control( 'restaurant_recipe_theme_options[restaurant-recipe-display-site-logo]', array(
	'label'		=> esc_html__( 'Display Logo', 'restaurant-recipe' ),
	'section'   => 'title_tagline',
	'settings'  => 'restaurant_recipe_theme_options[restaurant-recipe-display-site-logo]',
	'type'	  	=> 'checkbox'
) );

/*Site Title*/
$wp_customize->add_setting( 'restaurant_recipe_theme_options[restaurant-recipe-display-site-title]', array(
	'capability'		=> 'edit_theme_options',
	'default'			=> $defaults['restaurant-recipe-display-site-title'],
	'sanitize_callback' => 'restaurant_recipe_sanitize_checkbox'
) );
$wp_customize->add_control( 'restaurant_recipe_theme_options[restaurant-recipe-display-site-title]', array(
	'label'		=> esc_html__( 'Display Site Title', 'restaurant-recipe' ),
	'section'   => 'title_tagline',
	'settings'  => 'restaurant_recipe_theme_options[restaurant-recipe-display-site-title]',
	'type'	  	=> 'checkbox'
) );

/*Site Tagline*/
$wp_customize->add_setting( 'restaurant_recipe_theme_options[restaurant-recipe-display-site-tagline]', array(
	'capability'		=> 'edit_theme_options',
	'default'			=> $defaults['restaurant-recipe-display-site-tagline'],
	'sanitize_callback' => 'restaurant_recipe_sanitize_checkbox'
) );
$wp_customize->add_control( 'restaurant_recipe_theme_options[restaurant-recipe-display-site-tagline]', array(
	'label'		=> esc_html__( 'Display Site Tagline', 'restaurant-recipe' ),
	'section'   => 'title_tagline',
	'settings'  => 'restaurant_recipe_theme_options[restaurant-recipe-display-site-tagline]',
	'type'	  	=> 'checkbox'
) );