<?php
/*adding sections for footer options*/
$wp_customize->add_section( 'restaurant-recipe-footer-copyright-option', array(
    'priority'              => 20,
    'capability'            => 'edit_theme_options',
    'title'                 => esc_html__( 'Bottom Copyright Section', 'restaurant-recipe' ),
    'panel'                 => 'restaurant-recipe-footer-panel',
) );

/*copyright*/
$wp_customize->add_setting( 'restaurant_recipe_theme_options[restaurant-recipe-footer-copyright]', array(
    'capability'		    => 'edit_theme_options',
    'default'			    => $defaults['restaurant-recipe-footer-copyright'],
    'sanitize_callback'     => 'wp_kses_post'
) );
$wp_customize->add_control( 'restaurant_recipe_theme_options[restaurant-recipe-footer-copyright]', array(
    'label'		            => esc_html__( 'Copyright Text', 'restaurant-recipe' ),
    'section'               => 'restaurant-recipe-footer-copyright-option',
    'settings'              => 'restaurant_recipe_theme_options[restaurant-recipe-footer-copyright]',
    'type'	  	            => 'text'
) );

/*footer copyright beside*/
$wp_customize->add_setting( 'restaurant_recipe_theme_options[restaurant-recipe-footer-copyright-beside-option]', array(
	'capability'		    => 'edit_theme_options',
	'default'			    => $defaults['restaurant-recipe-footer-copyright-beside-option'],
	'sanitize_callback'     => 'restaurant_recipe_sanitize_select'
) );
$choices = restaurant_recipe_footer_copyright_beside_option();
$wp_customize->add_control( 'restaurant_recipe_theme_options[restaurant-recipe-footer-copyright-beside-option]', array(
	'choices'  	            => $choices,
	'label'		            => esc_html__( 'Footer Copyright Beside Option', 'restaurant-recipe' ),
	'section'               => 'restaurant-recipe-footer-copyright-option',
	'settings'              => 'restaurant_recipe_theme_options[restaurant-recipe-footer-copyright-beside-option]',
	'type'	  	            => 'select'
) );

/*footer got to top enable-disable */
$wp_customize->add_setting( 'restaurant_recipe_theme_options[restaurant-recipe-enable-footer-power-text]', array(
	'capability'		=> 'edit_theme_options',
	'default'			=> $defaults['restaurant-recipe-enable-footer-power-text'],
	'sanitize_callback' => 'restaurant_recipe_sanitize_checkbox'
) );
$wp_customize->add_control( 'restaurant_recipe_theme_options[restaurant-recipe-enable-footer-power-text]', array(
	'label'		=> esc_html__( ' Enable Theme Name And Powered By Text ', 'restaurant-recipe' ),
	'section'   => 'restaurant-recipe-footer-copyright-option',
	'settings'  => 'restaurant_recipe_theme_options[restaurant-recipe-enable-footer-power-text]',
	'type'	  	=> 'checkbox'
) );