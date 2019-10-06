<?php
/*check for restaurant-recipe-menu-right-button-options*/
if ( !function_exists('restaurant_recipe_menu_right_button_if_not_disable') ) :
	function restaurant_recipe_menu_right_button_if_not_disable() {
		$restaurant_recipe_customizer_all_values = restaurant_recipe_get_theme_options();
		if( 'disable' != $restaurant_recipe_customizer_all_values['restaurant-recipe-menu-right-button-options'] ){
			return true;
		}
		return false;
	}
endif;

if ( !function_exists('restaurant_recipe_menu_right_button_if_booking') ) :
	function restaurant_recipe_menu_right_button_if_booking() {
		$restaurant_recipe_customizer_all_values = restaurant_recipe_get_theme_options();
		if( 'booking' == $restaurant_recipe_customizer_all_values['restaurant-recipe-menu-right-button-options'] ){
			return true;
		}
		return false;
	}
endif;

if ( !function_exists('restaurant_recipe_menu_right_button_if_link') ) :
	function restaurant_recipe_menu_right_button_if_link() {
		$restaurant_recipe_customizer_all_values = restaurant_recipe_get_theme_options();
		if( 'link' == $restaurant_recipe_customizer_all_values['restaurant-recipe-menu-right-button-options'] ){
			return true;
		}
		return false;
	}
endif;

/*Button Link Options*/
$wp_customize->add_setting( 'restaurant_recipe_theme_options[restaurant-recipe-menu-display-options]', array(
	'capability'		=> 'edit_theme_options',
	'default'			=> $defaults['restaurant-recipe-menu-display-options'],
	'sanitize_callback' => 'restaurant_recipe_sanitize_select'
) );
$choices = restaurant_recipe_menu_display_options();
$wp_customize->add_control( 'restaurant_recipe_theme_options[restaurant-recipe-menu-display-options]', array(
	'choices'  	    => $choices,
	'label'		    => esc_html__( 'Menu Display Options', 'restaurant-recipe' ),
	'section'       => 'restaurant-recipe-menu-options',
	'settings'      => 'restaurant_recipe_theme_options[restaurant-recipe-menu-display-options]',
	'type'	  	    => 'select'
) );

/*Menu Section*/
$wp_customize->add_section( 'restaurant-recipe-menu-options', array(
    'priority'       => 20,
    'capability'     => 'edit_theme_options',
    'title'          => esc_html__( 'Menu Options', 'restaurant-recipe' ),
    'panel'          => 'restaurant-recipe-header-panel'
) );

/*enable sticky*/
$wp_customize->add_setting( 'restaurant_recipe_theme_options[restaurant-recipe-enable-sticky]', array(
    'capability'		=> 'edit_theme_options',
    'default'			=> $defaults['restaurant-recipe-enable-sticky'],
    'sanitize_callback' => 'restaurant_recipe_sanitize_checkbox'
) );

$wp_customize->add_control( 'restaurant_recipe_theme_options[restaurant-recipe-enable-sticky]', array(
    'label'		=> esc_html__( 'Enable Sticky Menu', 'restaurant-recipe' ),
    'section'   => 'restaurant-recipe-menu-options',
    'settings'  => 'restaurant_recipe_theme_options[restaurant-recipe-enable-sticky]',
    'type'	  	=> 'checkbox'
) );

if( restaurant_recipe_is_woocommerce_active() ){
	/*enable cart*/
	$wp_customize->add_setting( 'restaurant_recipe_theme_options[restaurant-recipe-enable-cart-icon]', array(
		'capability'		=> 'edit_theme_options',
		'default'			=> $defaults['restaurant-recipe-enable-cart-icon'],
		'sanitize_callback' => 'restaurant_recipe_sanitize_checkbox'
	) );

	$wp_customize->add_control( 'restaurant_recipe_theme_options[restaurant-recipe-enable-cart-icon]', array(
		'label'		=> esc_html__( 'Enable Cart', 'restaurant-recipe' ),
		'section'   => 'restaurant-recipe-menu-options',
		'settings'  => 'restaurant_recipe_theme_options[restaurant-recipe-enable-cart-icon]',
		'type'	  	=> 'checkbox'
	) );
}

/*Button Right Message*/
$wp_customize->add_setting('restaurant_recipe_theme_options[restaurant-recipe-menu-right-button-message]', array(
	'capability'		=> 'edit_theme_options',
	'sanitize_callback' => 'wp_kses_post'
));

$wp_customize->add_control(
	new Restaurant_Recipe_Customize_Message_Control(
		$wp_customize,
		'restaurant_recipe_theme_options[restaurant-recipe-menu-right-button-message]',
		array(
			'section'       => 'restaurant-recipe-menu-options',
			'description'   => "<hr /><h2>".esc_html__('Special Button On Menu Right','restaurant-recipe')."</h2>",
			'settings'      => 'restaurant_recipe_theme_options[restaurant-recipe-menu-right-button-message]',
			'type'	  	    => 'message'
		)
	)
);

/*Button Link Options*/
$wp_customize->add_setting( 'restaurant_recipe_theme_options[restaurant-recipe-menu-right-button-options]', array(
	'capability'		=> 'edit_theme_options',
	'default'			=> $defaults['restaurant-recipe-menu-right-button-options'],
	'sanitize_callback' => 'restaurant_recipe_sanitize_select'
) );
$choices = restaurant_recipe_menu_right_button_link_options();
$wp_customize->add_control( 'restaurant_recipe_theme_options[restaurant-recipe-menu-right-button-options]', array(
	'choices'  	    => $choices,
	'label'		    => esc_html__( 'Button Options', 'restaurant-recipe' ),
	'section'       => 'restaurant-recipe-menu-options',
	'settings'      => 'restaurant_recipe_theme_options[restaurant-recipe-menu-right-button-options]',
	'type'	  	    => 'select'
) );

/*Button title*/
$wp_customize->add_setting( 'restaurant_recipe_theme_options[restaurant-recipe-menu-right-button-title]', array(
	'capability'		=> 'edit_theme_options',
	'default'			=> $defaults['restaurant-recipe-menu-right-button-title'],
	'sanitize_callback' => 'sanitize_text_field'
) );
$wp_customize->add_control( 'restaurant_recipe_theme_options[restaurant-recipe-menu-right-button-title]', array(
	'label'		        => esc_html__( 'Button Title', 'restaurant-recipe' ),
	'section'           => 'restaurant-recipe-menu-options',
	'settings'          => 'restaurant_recipe_theme_options[restaurant-recipe-menu-right-button-title]',
	'type'	  	        => 'text',
	'active_callback'   => 'restaurant_recipe_menu_right_button_if_not_disable'
) );

/*Button Right booking Message*/
$wp_customize->add_setting('restaurant_recipe_theme_options[restaurant-recipe-menu-right-button-booking-message]', array(
	'capability'		=> 'edit_theme_options',
	'sanitize_callback' => 'wp_kses_post'
));
$description = sprintf( esc_html__( 'Add Popup Widget from %1$s here%2$s ', 'restaurant-recipe' ), '<a class="at-customizer" data-section="sidebar-widgets-popup-widget-area" style="cursor: pointer">','</a>' );
$wp_customize->add_control(
	new Restaurant_Recipe_Customize_Message_Control(
		$wp_customize,
		'restaurant_recipe_theme_options[restaurant-recipe-menu-right-button-booking-message]',
		array(
			'section'           => 'restaurant-recipe-menu-options',
			'description'       => $description,
			'settings'          => 'restaurant_recipe_theme_options[restaurant-recipe-menu-right-button-booking-message]',
			'type'	  	        => 'message',
			'active_callback'   => 'restaurant_recipe_menu_right_button_if_booking'
		)
	)
);

/*Button link*/
$wp_customize->add_setting( 'restaurant_recipe_theme_options[restaurant-recipe-menu-right-button-link]', array(
	'capability'		=> 'edit_theme_options',
	'default'			=> $defaults['restaurant-recipe-menu-right-button-link'],
	'sanitize_callback' => 'esc_url_raw'
) );
$wp_customize->add_control( 'restaurant_recipe_theme_options[restaurant-recipe-menu-right-button-link]', array(
	'label'		        => esc_html__( 'Button Link', 'restaurant-recipe' ),
	'section'           => 'restaurant-recipe-menu-options',
	'settings'          => 'restaurant_recipe_theme_options[restaurant-recipe-menu-right-button-link]',
	'type'	  	        => 'url',
	'active_callback'   => 'restaurant_recipe_menu_right_button_if_link'
) );