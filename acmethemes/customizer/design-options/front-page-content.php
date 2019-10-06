<?php
/*active callback function for front-page-header*/
if ( !function_exists('restaurant_recipe_active_callback_front_page_header') ) :
    function restaurant_recipe_active_callback_front_page_header() {
        $restaurant_recipe_customizer_all_values = restaurant_recipe_get_theme_options();
        if( 1 != $restaurant_recipe_customizer_all_values['restaurant-recipe-hide-front-page-content'] ){
            return true;
        }
        return false;
    }
endif;

/*adding sections for front page content */
$wp_customize->add_section( 'restaurant-recipe-front-page-content', array(
    'priority'          => 10,
    'capability'        => 'edit_theme_options',
    'title'             => esc_html__( 'Front Page Content Options', 'restaurant-recipe' ),
    'panel'             => 'restaurant-recipe-design-panel'

) );

/*hide front page content*/
$wp_customize->add_setting( 'restaurant_recipe_theme_options[restaurant-recipe-hide-front-page-content]', array(
    'capability'		=> 'edit_theme_options',
    'default'			=> $defaults['restaurant-recipe-hide-front-page-content'],
    'sanitize_callback' => 'restaurant_recipe_sanitize_checkbox',
) );
$wp_customize->add_control( 'restaurant_recipe_theme_options[restaurant-recipe-hide-front-page-content]', array(
    'label'		        => esc_html__( 'Hide Front Page Content', 'restaurant-recipe' ),
    'description'       => esc_html__( 'You may want to hide front page content and want to show only Feature section and Home Widgets. Check this to hide front page content.', 'restaurant-recipe' ),
    'section'           => 'restaurant-recipe-front-page-content',
    'settings'          => 'restaurant_recipe_theme_options[restaurant-recipe-hide-front-page-content]',
    'type'	  	        => 'checkbox'
) );

/*hide front page header*/
$wp_customize->add_setting( 'restaurant_recipe_theme_options[restaurant-recipe-hide-front-page-header]', array(
    'capability'		=> 'edit_theme_options',
    'default'			=> $defaults['restaurant-recipe-hide-front-page-header'],
    'sanitize_callback' => 'restaurant_recipe_sanitize_checkbox',
) );
$wp_customize->add_control( 'restaurant_recipe_theme_options[restaurant-recipe-hide-front-page-header]', array(
    'label'		        => esc_html__( 'Hide Front Page Header', 'restaurant-recipe' ),
    'description'       => esc_html__( 'You may want to hide front page header and want to show only Feature section and Home Widgets. Check this to hide front page Header.', 'restaurant-recipe' ),
    'section'           => 'restaurant-recipe-front-page-content',
    'settings'          => 'restaurant_recipe_theme_options[restaurant-recipe-hide-front-page-header]',
    'type'	  	        => 'checkbox',
    'active_callback'   => 'restaurant_recipe_active_callback_front_page_header'
) );