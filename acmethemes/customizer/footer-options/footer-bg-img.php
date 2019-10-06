<?php
/*adding sections for footer background image*/
$wp_customize->add_section( 'restaurant-recipe-footer-bg-img', array(
    'priority'       => 10,
    'capability'     => 'edit_theme_options',
    'theme_supports' => '',
    'title'          => esc_html__( 'Footer Background Image', 'restaurant-recipe' ),
    'panel'          => 'restaurant-recipe-footer-panel',
) );

/*footer background image*/
$wp_customize->add_setting( 'restaurant_recipe_theme_options[restaurant-recipe-footer-bg-img]', array(
    'capability'		=> 'edit_theme_options',
    'default'			=> $defaults['restaurant-recipe-footer-bg-img'],
    'sanitize_callback' => 'esc_url_raw'
) );
$wp_customize->add_control(
    new WP_Customize_Image_Control(
        $wp_customize,
        'restaurant_recipe_theme_options[restaurant-recipe-footer-bg-img]',
        array(
            'label'		=> esc_html__( 'Footer Background Image', 'restaurant-recipe' ),
            'section'   => 'restaurant-recipe-footer-bg-img',
            'settings'  => 'restaurant_recipe_theme_options[restaurant-recipe-footer-bg-img]',
            'type'	  	=> 'image'
        )
    )
);