<?php
/*adding theme options panel*/
$wp_customize->add_panel( 'restaurant-recipe-options', array(
    'priority'       => 90,
    'capability'     => 'edit_theme_options',
    'title'          => esc_html__( 'Theme Options', 'restaurant-recipe' ),
    'description'    => esc_html__( 'Customize your awesome site with theme options ', 'restaurant-recipe' )
) );

/*
* file for header breadcrumb options
*/
require restaurant_recipe_file_directory('acmethemes/customizer/options/breadcrumb.php');

/*
* file for header search options
*/
require restaurant_recipe_file_directory('acmethemes/customizer/options/search.php');

/*
* file for social options
*/
require restaurant_recipe_file_directory('acmethemes/customizer/options/social-options.php');