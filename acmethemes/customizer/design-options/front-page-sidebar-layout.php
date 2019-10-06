<?php
/*adding sections for default layout options panel*/
$wp_customize->add_section( 'restaurant-recipe-front-page-sidebar-layout', array(
    'priority'       => 20,
    'capability'     => 'edit_theme_options',
    'title'          => esc_html__( 'Front/Home Sidebar Layout', 'restaurant-recipe' ),
    'panel'          => 'restaurant-recipe-design-panel'
) );

/*Sidebar Layout*/
$wp_customize->add_setting( 'restaurant_recipe_theme_options[restaurant-recipe-front-page-sidebar-layout]', array(
    'capability'		=> 'edit_theme_options',
    'default'			=> $defaults['restaurant-recipe-front-page-sidebar-layout'],
    'sanitize_callback' => 'restaurant_recipe_sanitize_select'
) );
$choices = restaurant_recipe_sidebar_layout();
$wp_customize->add_control( 'restaurant_recipe_theme_options[restaurant-recipe-front-page-sidebar-layout]', array(
    'choices'  	        => $choices,
    'label'		        => esc_html__( 'Front/Home Sidebar Layout', 'restaurant-recipe' ),
    'section'           => 'restaurant-recipe-front-page-sidebar-layout',
    'settings'          => 'restaurant_recipe_theme_options[restaurant-recipe-front-page-sidebar-layout]',
    'type'	  	        => 'select'
) );