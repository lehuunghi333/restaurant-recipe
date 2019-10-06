<?php
/*check if enable header top*/
if ( !function_exists('restaurant_recipe_is_enable_header_top') ) :
	function restaurant_recipe_is_enable_header_top() {
		$restaurant_recipe_customizer_all_values = restaurant_recipe_get_theme_options();
		if( 1 == $restaurant_recipe_customizer_all_values['restaurant-recipe-enable-header-top'] ){
			return true;
		}
		return false;
	}
endif;

/*adding sections for header options*/
$wp_customize->add_section( 'restaurant-recipe-header-top-option', array(
    'priority'                  => 10,
    'capability'                => 'edit_theme_options',
    'title'                     => esc_html__( 'Header Top', 'restaurant-recipe' ),
    'panel'                     => 'restaurant-recipe-header-panel',
) );

/*header top enable*/
$wp_customize->add_setting( 'restaurant_recipe_theme_options[restaurant-recipe-enable-header-top]', array(
    'capability'		        => 'edit_theme_options',
    'default'			        => $defaults['restaurant-recipe-enable-header-top'],
    'sanitize_callback'         => 'restaurant_recipe_sanitize_checkbox',
) );
$wp_customize->add_control( 'restaurant_recipe_theme_options[restaurant-recipe-enable-header-top]', array(
    'label'		                => esc_html__( 'Enable Header Top Options', 'restaurant-recipe' ),
    'section'                   => 'restaurant-recipe-header-top-option',
    'settings'                  => 'restaurant_recipe_theme_options[restaurant-recipe-enable-header-top]',
    'type'	  	                => 'checkbox'
) );

/*header top message*/
$wp_customize->add_setting('restaurant_recipe_theme_options[restaurant-recipe-header-top-message]', array(
	'capability'		        => 'edit_theme_options',
	'sanitize_callback'         => 'wp_kses_post'
));

$wp_customize->add_control(
	new Restaurant_Recipe_Customize_Message_Control(
		$wp_customize,
		'restaurant_recipe_theme_options[restaurant-recipe-header-top-message]',
		array(
			'section'           => 'restaurant-recipe-header-top-option',
			'description'       => "<hr /><h2>".esc_html__('Display Different Element on Top Right or Left','restaurant-recipe')."</h2>",
			'settings'          => 'restaurant_recipe_theme_options[restaurant-recipe-header-top-message]',
			'type'	  	        => 'message',
			'active_callback'   => 'restaurant_recipe_is_enable_header_top'
		)
	)
);

/*Top Menu Display*/
$choices = restaurant_recipe_header_top_display_selection();
$wp_customize->add_setting( 'restaurant_recipe_theme_options[restaurant-recipe-header-top-menu-display-selection]', array(
	'capability'		        => 'edit_theme_options',
	'default'			        => $defaults['restaurant-recipe-header-top-menu-display-selection'],
	'sanitize_callback'         => 'restaurant_recipe_sanitize_select'
) );
$description = sprintf( esc_html__( 'Add/Edit Menu Items from %1$s here%2$s and select Menu Location : Top Menu ( Support First Level Only ) ', 'restaurant-recipe' ), '<a class="at-customizer button button-primary" data-panel="nav_menus" style="cursor: pointer">','</a>' );
$wp_customize->add_control( 'restaurant_recipe_theme_options[restaurant-recipe-header-top-menu-display-selection]', array(
	'choices'  	                => $choices,
	'label'		                => esc_html__( 'Top Menu Display', 'restaurant-recipe' ),
	'description'		        => $description,
	'section'                   => 'restaurant-recipe-header-top-option',
	'settings'                  => 'restaurant_recipe_theme_options[restaurant-recipe-header-top-menu-display-selection]',
	'type'	  	                => 'select',
	'active_callback'           => 'restaurant_recipe_is_enable_header_top'
) );

/*Top Info display*/
$description = sprintf( esc_html__( 'Add/Edit Info Items from %1$s here%2$s', 'restaurant-recipe' ), '<a class="at-customizer button button-primary" data-section="restaurant-recipe-feature-info" style="cursor: pointer">','</a>' );
$wp_customize->add_setting( 'restaurant_recipe_theme_options[restaurant-recipe-header-top-info-display-selection]', array(
	'capability'		        => 'edit_theme_options',
	'default'			        => $defaults['restaurant-recipe-header-top-info-display-selection'],
	'sanitize_callback'         => 'restaurant_recipe_sanitize_select'
) );
$wp_customize->add_control( 'restaurant_recipe_theme_options[restaurant-recipe-header-top-info-display-selection]', array(
	'choices'  	                => $choices,
	'label'		                => esc_html__( 'Top Info Display', 'restaurant-recipe' ),
	'description'		        => $description,
	'section'                   => 'restaurant-recipe-header-top-option',
	'settings'                  => 'restaurant_recipe_theme_options[restaurant-recipe-header-top-info-display-selection]',
	'type'	  	                => 'select',
	'active_callback'           => 'restaurant_recipe_is_enable_header_top'
) );

/*Social Display*/
$wp_customize->add_setting( 'restaurant_recipe_theme_options[restaurant-recipe-header-top-social-display-selection]', array(
	'capability'		        => 'edit_theme_options',
	'default'			        => $defaults['restaurant-recipe-header-top-social-display-selection'],
	'sanitize_callback'         => 'restaurant_recipe_sanitize_select'
) );
$description = sprintf( esc_html__( 'Add/Edit Social Items from %1$s here%2$s ', 'restaurant-recipe' ), '<a class="at-customizer button button-primary" data-section="restaurant-recipe-social-options" style="cursor: pointer">','</a>' );
$wp_customize->add_control( 'restaurant_recipe_theme_options[restaurant-recipe-header-top-social-display-selection]', array(
	'choices'  	                => $choices,
	'label'		                => esc_html__( 'Social Display', 'restaurant-recipe' ),
	'description'               => $description,
	'section'                   => 'restaurant-recipe-header-top-option',
	'settings'                  => 'restaurant_recipe_theme_options[restaurant-recipe-header-top-social-display-selection]',
	'type'	  	                => 'select',
	'active_callback'           => 'restaurant_recipe_is_enable_header_top'
) );