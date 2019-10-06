<?php
/*adding sections for default layout options panel*/
$wp_customize->add_section( 'restaurant-recipe-archive-sidebar-layout', array(
    'priority'       => 20,
    'capability'     => 'edit_theme_options',
    'title'          => esc_html__( 'Category/Archive Sidebar Layout', 'restaurant-recipe' ),
    'panel'          => 'restaurant-recipe-design-panel'
) );

/*Sidebar Layout*/
$wp_customize->add_setting( 'restaurant_recipe_theme_options[restaurant-recipe-archive-sidebar-layout]', array(
    'capability'		=> 'edit_theme_options',
    'default'			=> $defaults['restaurant-recipe-archive-sidebar-layout'],
    'sanitize_callback' => 'restaurant_recipe_sanitize_select'
) );
$choices = restaurant_recipe_sidebar_layout();
$wp_customize->add_control( 'restaurant_recipe_theme_options[restaurant-recipe-archive-sidebar-layout]', array(
    'choices'  	        => $choices,
    'label'		        => esc_html__( 'Category/Archive Sidebar Layout', 'restaurant-recipe' ),
    'description'       => esc_html__( 'Sidebar Layout for listing pages like category, author etc', 'restaurant-recipe' ),
    'section'           => 'restaurant-recipe-archive-sidebar-layout',
    'settings'          => 'restaurant_recipe_theme_options[restaurant-recipe-archive-sidebar-layout]',
    'type'	  	        => 'select'
) );