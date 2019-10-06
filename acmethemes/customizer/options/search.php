<?php
/*adding sections for Search Placeholder*/
$wp_customize->add_section( 'restaurant-recipe-search', array(
    'priority'          => 20,
    'capability'        => 'edit_theme_options',
    'title'             => esc_html__( 'Search', 'restaurant-recipe' ),
    'panel'             => 'restaurant-recipe-options'
) );

/*Search Placeholder*/
$wp_customize->add_setting( 'restaurant_recipe_theme_options[restaurant-recipe-search-placeholder]', array(
    'capability'		=> 'edit_theme_options',
    'default'			=> $defaults['restaurant-recipe-search-placeholder'],
    'sanitize_callback' => 'sanitize_text_field'
) );
$wp_customize->add_control( 'restaurant_recipe_theme_options[restaurant-recipe-search-placeholder]', array(
    'label'		        => esc_html__( 'Search Placeholder', 'restaurant-recipe' ),
    'section'           => 'restaurant-recipe-search',
    'settings'          => 'restaurant_recipe_theme_options[restaurant-recipe-search-placeholder]',
    'type'	  	        => 'text'
) );