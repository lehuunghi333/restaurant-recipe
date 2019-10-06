<?php
/*Title*/
$wp_customize->add_setting( 'restaurant_recipe_theme_options[restaurant-recipe-popup-widget-title]', array(
	'capability'		=> 'edit_theme_options',
	'default'			=> $defaults['restaurant-recipe-popup-widget-title'],
	'sanitize_callback' => 'sanitize_text_field'
) );
$wp_customize->add_control( 'restaurant_recipe_theme_options[restaurant-recipe-popup-widget-title]', array(
	'label'		        => esc_html__( 'Main Title', 'restaurant-recipe' ),
	'section'           => 'restaurant-recipe-menu-options',
	'settings'          => 'restaurant_recipe_theme_options[restaurant-recipe-popup-widget-title]',
	'type'	  	        => 'text',
	'priority'	  	    => 1,
) );
$restaurant_recipe_popup_widget_area = $wp_customize->get_section( 'sidebar-widgets-popup-widget-area' );
if ( ! empty( $restaurant_recipe_popup_widget_area ) ) {
	$restaurant_recipe_popup_widget_area->panel = 'restaurant-recipe-header-panel';
	$restaurant_recipe_popup_widget_area->title = esc_html__( 'Popup Widgets', 'restaurant-recipe' );
	$restaurant_recipe_popup_widget_area->priority = 999;

	$restaurant_recipe_popup_widget_title = $wp_customize->get_control( 'restaurant_recipe_theme_options[restaurant-recipe-popup-widget-title]' );
	if ( ! empty( $restaurant_recipe_popup_widget_title ) ) {
		$restaurant_recipe_popup_widget_title->section  = 'sidebar-widgets-popup-widget-area';
		$restaurant_recipe_popup_widget_title->priority = -1;
	}
}