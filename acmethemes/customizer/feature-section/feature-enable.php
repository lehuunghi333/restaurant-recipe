<?php
/*adding sections for enabling feature section in front page*/
$wp_customize->add_section( 'restaurant-recipe-enable-feature', array(
    'priority'       => 10,
    'capability'     => 'edit_theme_options',
    'title'          => esc_html__( 'Enable Feature Section', 'restaurant-recipe' ),
    'panel'          => 'restaurant-recipe-feature-panel'
) );

/*enable feature section*/
$wp_customize->add_setting( 'restaurant_recipe_theme_options[restaurant-recipe-enable-feature]', array(
    'capability'		=> 'edit_theme_options',
    'default'			=> $defaults['restaurant-recipe-enable-feature'],
    'sanitize_callback' => 'restaurant_recipe_sanitize_checkbox'
) );

$wp_customize->add_control( 'restaurant_recipe_theme_options[restaurant-recipe-enable-feature]', array(
    'label'		        => esc_html__( 'Enable Feature Section', 'restaurant-recipe' ),
    'description'	    => sprintf( esc_html__( 'Feature section will display on front/home page. Feature Section includes Feature Slider and Feature Column.%1$s Note : Please go to %2$s "Static Front Page"%3$s setting, Select "A static page" then "Front page" and "Posts page" to enable it', 'restaurant-recipe' ), '<br />','<b><a class="at-customizer" data-section="static_front_page"> ','</a></b>' ),
    'section'           => 'restaurant-recipe-enable-feature',
    'settings'          => 'restaurant_recipe_theme_options[restaurant-recipe-enable-feature]',
    'type'	  	        => 'checkbox'
) );