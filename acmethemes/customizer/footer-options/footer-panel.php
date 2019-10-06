<?php
/*adding footer options panel*/
$wp_customize->add_panel( 'restaurant-recipe-footer-panel', array(
    'priority'       => 80,
    'capability'     => 'edit_theme_options',
    'title'          => esc_html__( 'Footer Options', 'restaurant-recipe' ),
    'description'    => esc_html__( 'Customize your awesome site footer ', 'restaurant-recipe' )
) );

/*
* file for background image
*/
require restaurant_recipe_file_directory('acmethemes/customizer/footer-options/footer-bg-img.php');

/*
* file for footer logo options
*/
require restaurant_recipe_file_directory('acmethemes/customizer/footer-options/footer-copyright.php');