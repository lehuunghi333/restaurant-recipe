<?php
/*adding sections for header social options */
$wp_customize->add_section( 'restaurant-recipe-social-options', array(
    'priority'              => 20,
    'capability'            => 'edit_theme_options',
    'title'                 => esc_html__( 'Social Options', 'restaurant-recipe' ),
    'panel'                 => 'restaurant-recipe-options'
) );

/*repeater social data*/
$wp_customize->add_setting( 'restaurant_recipe_theme_options[restaurant-recipe-social-data]', array(
	'sanitize_callback'     => 'restaurant_recipe_sanitize_social_data',
	'default'               => $defaults['restaurant-recipe-social-data']
) );
$wp_customize->add_control(
	new Restaurant_Recipe_Repeater_Control(
		$wp_customize,
		'restaurant_recipe_theme_options[restaurant-recipe-social-data]',
		array(
			'label'                         => esc_html__('Social Options Selection','restaurant-recipe'),
			'description'                   => esc_html__('Select Social Icons and enter link','restaurant-recipe'),
			'section'                       => 'restaurant-recipe-social-options',
			'settings'                      => 'restaurant_recipe_theme_options[restaurant-recipe-social-data]',
			'repeater_main_label'           => esc_html__('Social Icon','restaurant-recipe'),
			'repeater_add_control_field'    => esc_html__('Add New Icon','restaurant-recipe')
		),
		array(
			'icon' => array(
				'type'        => 'icons',
				'label'       => esc_html__( 'Select Icon', 'restaurant-recipe' ),
			),
			'link' => array(
				'type'        => 'url',
				'label'       => esc_html__( 'Enter Link', 'restaurant-recipe' ),
			),
			'checkbox' => array(
				'type'        => 'checkbox',
				'label'       => esc_html__( 'Open in New Window', 'restaurant-recipe' ),
			)
		)
	)
);