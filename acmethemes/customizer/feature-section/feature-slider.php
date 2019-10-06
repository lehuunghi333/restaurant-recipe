<?php
/*adding sections for category section in front page*/
$wp_customize->add_section( 'restaurant-recipe-feature-page', array(
    'priority'       => 10,
    'capability'     => 'edit_theme_options',
    'title'          => esc_html__( 'Feature Slider Selection', 'restaurant-recipe' ),
    'panel'          => 'restaurant-recipe-feature-panel'
) );

/* feature parent all-slides selection */
$slider_pages = array();
$slider_pages_obj = get_pages();
$slider_pages[''] = esc_html__('Select Slider Page','restaurant-recipe');
foreach ($slider_pages_obj as $page) {
	$slider_pages[$page->ID] = $page->post_title;
}
$wp_customize->add_setting( 'restaurant_recipe_theme_options[restaurant-recipe-slides-data]', array(
	'sanitize_callback' => 'restaurant_recipe_sanitize_slider_data',
	'default'           => $defaults['restaurant-recipe-slides-data']
) );
$wp_customize->add_control(
	new Restaurant_Recipe_Repeater_Control(
		$wp_customize,
		'restaurant_recipe_theme_options[restaurant-recipe-slides-data]',
		array(
			'label'                         => esc_html__('Slider Selection','restaurant-recipe'),
			'description'                   => esc_html__('Select Page For Slider','restaurant-recipe'),
			'section'                       => 'restaurant-recipe-feature-page',
			'settings'                      => 'restaurant_recipe_theme_options[restaurant-recipe-slides-data]',
			'repeater_main_label'           => esc_html__('Select Slide of Slider','restaurant-recipe'),
			'repeater_add_control_field'    => esc_html__('Add New Slide','restaurant-recipe')
		),
		array(
			'selectpage' => array(
				'type'        => 'select',
				'label'       => esc_html__( 'Select Page For Slide', 'restaurant-recipe' ),
				'options'     => $slider_pages
			),
			'button_1_text' => array(
				'type'        => 'text',
				'label'       => esc_html__( 'Button One Text', 'restaurant-recipe' ),
			),
			'button_1_link' => array(
				'type'        => 'url',
				'label'       => esc_html__( 'Button One Link', 'restaurant-recipe' ),
			),
			'button_2_text' => array(
				'type'        => 'text',
				'label'       => esc_html__( 'Button Two Text', 'restaurant-recipe' ),
			),
			'button_2_link' => array(
				'type'        => 'url',
				'label'       => esc_html__( 'Button Two Link', 'restaurant-recipe' ),
			)
		)
	)
);

/*enable animation*/
$wp_customize->add_setting( 'restaurant_recipe_theme_options[restaurant-recipe-feature-slider-enable-animation]', array(
    'capability'		=> 'edit_theme_options',
    'default'			=> $defaults['restaurant-recipe-feature-slider-enable-animation'],
    'sanitize_callback' => 'restaurant_recipe_sanitize_checkbox'
) );
$wp_customize->add_control( 'restaurant_recipe_theme_options[restaurant-recipe-feature-slider-enable-animation]', array(
    'label'		        => esc_html__( 'Enable Animation', 'restaurant-recipe' ),
    'section'           => 'restaurant-recipe-feature-page',
    'settings'          => 'restaurant_recipe_theme_options[restaurant-recipe-feature-slider-enable-animation]',
    'type'	  	        => 'checkbox'
) );

/*display-title*/
$wp_customize->add_setting( 'restaurant_recipe_theme_options[restaurant-recipe-feature-slider-display-title]', array(
    'capability'		=> 'edit_theme_options',
    'default'			=> $defaults['restaurant-recipe-feature-slider-display-title'],
    'sanitize_callback' => 'restaurant_recipe_sanitize_checkbox'
) );
$wp_customize->add_control( 'restaurant_recipe_theme_options[restaurant-recipe-feature-slider-display-title]', array(
    'label'		            => esc_html__( 'Display Title', 'restaurant-recipe' ),
    'section'               => 'restaurant-recipe-feature-page',
    'settings'              => 'restaurant_recipe_theme_options[restaurant-recipe-feature-slider-display-title]',
    'type'	  	            => 'checkbox'
) );

/*display-excerpt*/
$wp_customize->add_setting( 'restaurant_recipe_theme_options[restaurant-recipe-feature-slider-display-excerpt]', array(
	'capability'		    => 'edit_theme_options',
	'default'			    => $defaults['restaurant-recipe-feature-slider-display-excerpt'],
	'sanitize_callback'     => 'restaurant_recipe_sanitize_checkbox'
) );
$wp_customize->add_control( 'restaurant_recipe_theme_options[restaurant-recipe-feature-slider-display-excerpt]', array(
	'label'		            => esc_html__( 'Display Excerpt', 'restaurant-recipe' ),
	'section'               => 'restaurant-recipe-feature-page',
	'settings'              => 'restaurant_recipe_theme_options[restaurant-recipe-feature-slider-display-excerpt]',
	'type'	  	            => 'checkbox',
) );

/*Image Display Behavior*/
$wp_customize->add_setting( 'restaurant_recipe_theme_options[restaurant-recipe-fs-image-display-options]', array(
    'capability'		    => 'edit_theme_options',
    'default'			    => $defaults['restaurant-recipe-fs-image-display-options'],
    'sanitize_callback'     => 'restaurant_recipe_sanitize_select'
) );
$choices = restaurant_recipe_fs_image_display_options();
$wp_customize->add_control( 'restaurant_recipe_theme_options[restaurant-recipe-fs-image-display-options]', array(
    'choices'  	            => $choices,
    'label'		            => esc_html__( 'Feature Slider Image Display Options', 'restaurant-recipe' ),
    'section'               => 'restaurant-recipe-feature-page',
    'settings'              => 'restaurant_recipe_theme_options[restaurant-recipe-fs-image-display-options]',
    'type'	  	            => 'radio',
) );

/*Slider Selection Text Align*/
$wp_customize->add_setting( 'restaurant_recipe_theme_options[restaurant-recipe-feature-slider-text-align]', array(
	'capability'		    => 'edit_theme_options',
	'default'			    => $defaults['restaurant-recipe-feature-slider-text-align'],
	'sanitize_callback'     => 'restaurant_recipe_sanitize_select',
) );
$choices = restaurant_recipe_slider_text_align();
$wp_customize->add_control( 'restaurant_recipe_theme_options[restaurant-recipe-feature-slider-text-align]', array(
	'choices'  	            => $choices,
	'label'		            => esc_html__( 'Slider Text Align', 'restaurant-recipe' ),
	'section'               => 'restaurant-recipe-feature-page',
	'settings'              => 'restaurant_recipe_theme_options[restaurant-recipe-feature-slider-text-align]',
	'type'	  	            => 'select',
) );

/*Slider Scroll Text*/
$wp_customize->add_setting( 'restaurant_recipe_theme_options[restaurant-recipe-slider-scroll-text]', array(
	'capability'		=> 'edit_theme_options',
	'default'			=> $defaults['restaurant-recipe-slider-scroll-text'],
	'sanitize_callback' => 'sanitize_text_field',
) );
$wp_customize->add_control( 'restaurant_recipe_theme_options[restaurant-recipe-slider-scroll-text]', array(
	'label'		    => esc_html__( 'Slider Scroll Text', 'restaurant-recipe' ),
	'section'       => 'restaurant-recipe-feature-page',
	'settings'      => 'restaurant_recipe_theme_options[restaurant-recipe-slider-scroll-text]',
	'type'	  	    => 'text'
) );

/*Slider Scroll Link*/
$wp_customize->add_setting( 'restaurant_recipe_theme_options[restaurant-recipe-slider-scroll-link]', array(
	'capability'		=> 'edit_theme_options',
	'default'			=> $defaults['restaurant-recipe-slider-scroll-link'],
	'sanitize_callback' => 'esc_url_raw',
) );
$wp_customize->add_control( 'restaurant_recipe_theme_options[restaurant-recipe-slider-scroll-link]', array(
	'label'		    => esc_html__( 'Slider Scroll Link', 'restaurant-recipe' ),
	'section'       => 'restaurant-recipe-feature-page',
	'settings'      => 'restaurant_recipe_theme_options[restaurant-recipe-slider-scroll-link]',
	'type'	  	    => 'url'
) );