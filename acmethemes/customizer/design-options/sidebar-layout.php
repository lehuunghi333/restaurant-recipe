<?php
/*adding sections for sidebar options */
$wp_customize->add_section( 'restaurant-recipe-design-sidebar-layout-option', array(
    'priority'       => 20,
    'capability'     => 'edit_theme_options',
    'title'          => esc_html__( 'Default Page/Post Sidebar Layout', 'restaurant-recipe' ),
    'panel'          => 'restaurant-recipe-design-panel'
) );

/*Sidebar Layout*/
$wp_customize->add_setting( 'restaurant_recipe_theme_options[restaurant-recipe-single-sidebar-layout]', array(
    'capability'		=> 'edit_theme_options',
    'default'			=> $defaults['restaurant-recipe-single-sidebar-layout'],
    'sanitize_callback' => 'restaurant_recipe_sanitize_select'
) );
$choices = restaurant_recipe_sidebar_layout();
$wp_customize->add_control( 'restaurant_recipe_theme_options[restaurant-recipe-single-sidebar-layout]', array(
    'choices'  	        => $choices,
    'label'		        => esc_html__( 'Default Page/Post Sidebar Layout', 'restaurant-recipe' ),
    'description'       => esc_html__( 'Single Page/Post Sidebar', 'restaurant-recipe' ),
    'section'           => 'restaurant-recipe-design-sidebar-layout-option',
    'settings'          => 'restaurant_recipe_theme_options[restaurant-recipe-single-sidebar-layout]',
    'type'	  	        => 'select'
) );