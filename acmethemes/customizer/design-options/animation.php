<?php
/*adding sections for design options panel*/
$wp_customize->add_section( 'restaurant-recipe-animation', array(
    'priority'       => 20,
    'capability'     => 'edit_theme_options',
    'title'          => esc_html__( 'Animation', 'restaurant-recipe' ),
    'panel'          => 'restaurant-recipe-design-panel'
) );

/*enable disable animation*/
$wp_customize->add_setting( 'restaurant_recipe_theme_options[restaurant-recipe-enable-animation]', array(
    'capability'		=> 'edit_theme_options',
    'default'			=> $defaults['restaurant-recipe-enable-animation'],
    'sanitize_callback' => 'restaurant_recipe_sanitize_checkbox'
) );
$wp_customize->add_control( 'restaurant_recipe_theme_options[restaurant-recipe-enable-animation]', array(
    'label'		        => esc_html__( 'Disable animation', 'restaurant-recipe' ),
    'description'       => esc_html__( 'Check this to disable overall site animation effect provided by theme', 'restaurant-recipe' ),
    'section'           => 'restaurant-recipe-animation',
    'settings'          => 'restaurant_recipe_theme_options[restaurant-recipe-enable-animation]',
    'type'	  	        => 'checkbox'
) );