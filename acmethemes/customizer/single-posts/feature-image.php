<?php
/*adding sections for feature image selection*/
$wp_customize->add_section( 'restaurant-recipe-single-feature-image', array(
    'capability'     => 'edit_theme_options',
    'title'          => esc_html__( 'Feature Image Option', 'restaurant-recipe' ),
    'panel'          => 'restaurant-recipe-single-post'
) );

/*single image size*/
$wp_customize->add_setting( 'restaurant_recipe_theme_options[restaurant-recipe-single-img-size]', array(
	'capability'		=> 'edit_theme_options',
	'default'			=> $defaults['restaurant-recipe-single-img-size'],
	'sanitize_callback' => 'restaurant_recipe_sanitize_select'
) );
$choices = restaurant_recipe_get_image_sizes_options(1);
$wp_customize->add_control( 'restaurant_recipe_theme_options[restaurant-recipe-single-img-size]', array(
	'choices'  	=> $choices,
	'label'		=> esc_html__( 'Image Size', 'restaurant-recipe' ),
	'section'   => 'restaurant-recipe-single-feature-image',
	'settings'  => 'restaurant_recipe_theme_options[restaurant-recipe-single-img-size]',
	'type'	  	=> 'select'
) );