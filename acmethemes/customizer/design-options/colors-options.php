<?php
/*customizing default colors section and adding new controls-setting too*/
$wp_customize->get_section( 'colors' )->panel = 'restaurant-recipe-design-panel';
$wp_customize->get_section( 'colors' )->title = esc_html__( 'Basic Color', 'restaurant-recipe' );
$wp_customize->get_section( 'background_image' )->priority = 100;

/*Primary color*/
$wp_customize->add_setting( 'restaurant_recipe_theme_options[restaurant-recipe-primary-color]', array(
    'capability'		=> 'edit_theme_options',
    'default'			=> $defaults['restaurant-recipe-primary-color'],
    'sanitize_callback' => 'sanitize_hex_color'
) );

$wp_customize->add_control(
    new WP_Customize_Color_Control(
        $wp_customize,
        'restaurant_recipe_theme_options[restaurant-recipe-primary-color]',
        array(
            'label'		=> esc_html__( 'Primary Color', 'restaurant-recipe' ),
            'section'   => 'colors',
            'settings'  => 'restaurant_recipe_theme_options[restaurant-recipe-primary-color]',
            'type'	  	=> 'color'
        ) )
);

/*Header TOP color*/
$wp_customize->add_setting( 'restaurant_recipe_theme_options[restaurant-recipe-header-top-bg-color]', array(
    'capability'		=> 'edit_theme_options',
    'default'			=> $defaults['restaurant-recipe-header-top-bg-color'],
    'sanitize_callback' => 'sanitize_hex_color'
) );

$wp_customize->add_control(
    new WP_Customize_Color_Control(
        $wp_customize,
        'restaurant_recipe_theme_options[restaurant-recipe-header-top-bg-color]',
        array(
            'label'		=> esc_html__( 'Header Top Background Color', 'restaurant-recipe' ),
            'description'=> esc_html__( 'Also used as secondary color', 'restaurant-recipe' ),
            'section'   => 'colors',
            'settings'  => 'restaurant_recipe_theme_options[restaurant-recipe-header-top-bg-color]',
            'type'	  	=> 'color'
        )
    )
);

/* Footer Background Color*/
$wp_customize->add_setting( 'restaurant_recipe_theme_options[restaurant-recipe-footer-bg-color]', array(
    'capability'		=> 'edit_theme_options',
    'default'			=> $defaults['restaurant-recipe-footer-bg-color'],
    'sanitize_callback' => 'sanitize_hex_color'
) );

$wp_customize->add_control(
    new WP_Customize_Color_Control(
        $wp_customize,
        'restaurant_recipe_theme_options[restaurant-recipe-footer-bg-color]',
        array(
            'label'		=> esc_html__( 'Footer Background Color', 'restaurant-recipe' ),
            'section'   => 'colors',
            'settings'  => 'restaurant_recipe_theme_options[restaurant-recipe-footer-bg-color]',
            'type'	  	=> 'color'
        )
    )
);

/*Footer Bottom Background Color*/
$wp_customize->add_setting( 'restaurant_recipe_theme_options[restaurant-recipe-footer-bottom-bg-color]', array(
    'capability'		=> 'edit_theme_options',
    'default'			=> $defaults['restaurant-recipe-footer-bottom-bg-color'],
    'sanitize_callback' => 'sanitize_hex_color'
) );

$wp_customize->add_control(
    new WP_Customize_Color_Control(
        $wp_customize,
        'restaurant_recipe_theme_options[restaurant-recipe-footer-bottom-bg-color]',
        array(
            'label'		=> esc_html__( 'Footer Bottom Background Color', 'restaurant-recipe' ),
            'section'   => 'colors',
            'settings'  => 'restaurant_recipe_theme_options[restaurant-recipe-footer-bottom-bg-color]',
            'type'	  	=> 'color'
        )
    )
);

/*Link color*/
$wp_customize->add_setting( 'restaurant_recipe_theme_options[restaurant-recipe-link-color]', array(
	'capability'		=> 'edit_theme_options',
	'default'			=> $defaults['restaurant-recipe-link-color'],
	'sanitize_callback' => 'sanitize_hex_color'
) );
$wp_customize->add_control( 'restaurant_recipe_theme_options[restaurant-recipe-link-color]', array(
	'label'		=> esc_html__( 'Link Color', 'restaurant-recipe' ),
	'section'   => 'colors',
	'settings'  => 'restaurant_recipe_theme_options[restaurant-recipe-link-color]',
	'type'	  	=> 'color'
) );

/*Link Hover color*/
$wp_customize->add_setting( 'restaurant_recipe_theme_options[restaurant-recipe-link-hover-color]', array(
	'capability'		=> 'edit_theme_options',
	'default'			=> $defaults['restaurant-recipe-link-hover-color'],
	'sanitize_callback' => 'sanitize_hex_color'
) );
$wp_customize->add_control( 'restaurant_recipe_theme_options[restaurant-recipe-link-hover-color]', array(
	'label'		=> esc_html__( 'Link Hover Color', 'restaurant-recipe' ),
	'section'   => 'colors',
	'settings'  => 'restaurant_recipe_theme_options[restaurant-recipe-link-hover-color]',
	'type'	  	=> 'color'
) );