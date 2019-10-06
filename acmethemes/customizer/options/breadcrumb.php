<?php
/*adding sections for breadcrumb */
$wp_customize->add_section( 'restaurant-recipe-breadcrumb-options', array(
    'priority'          => 20,
    'capability'        => 'edit_theme_options',
    'title'             => esc_html__( 'Breadcrumb Options', 'restaurant-recipe' ),
    'panel'             => 'restaurant-recipe-options'
) );

/*show breadcrumb*/
$wp_customize->add_setting( 'restaurant_recipe_theme_options[restaurant-recipe-breadcrumb-options]', array(
    'capability'		=> 'edit_theme_options',
    'default'			=> $defaults['restaurant-recipe-breadcrumb-options'],
    'sanitize_callback' => 'restaurant_recipe_sanitize_select'
) );
$choices = restaurant_recipe_breadcrumb_options();

$wp_customize->add_control( 'restaurant_recipe_theme_options[restaurant-recipe-breadcrumb-options]', array(
	'choices'  	        => $choices,
	'label'		        => esc_html__( 'Breadcrumb Options', 'restaurant-recipe' ),
	'description'		 => sprintf( 'Use any one of the plugin for Breadcrumb. %sBreadcrumb NavXT%s or %sYoast SEO%s', '<a href="https://wordpress.org/plugins/breadcrumb-navxt/" target="_blank">','</a>','<a href="https://wordpress.org/plugins/wordpress-seo/" target="_blank">','</a>' ),
    'section'           => 'restaurant-recipe-breadcrumb-options',
    'settings'          => 'restaurant_recipe_theme_options[restaurant-recipe-breadcrumb-options]',
    'type'	  	        => 'select'
) );
