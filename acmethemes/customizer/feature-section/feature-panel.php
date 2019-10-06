<?php
/*adding feature options panel*/
$wp_customize->add_panel( 'restaurant-recipe-feature-panel', array(
    'priority'       => 40,
    'capability'     => 'edit_theme_options',
    'title'          => esc_html__( 'Featured Section Options', 'restaurant-recipe' ),
    'description'    => esc_html__( 'Customize your awesome site feature section ', 'restaurant-recipe' )
) );

/*
* file for feature section enable
*/
require restaurant_recipe_file_directory('acmethemes/customizer/feature-section/feature-enable.php');

/*
* file for feature slider category
*/
require restaurant_recipe_file_directory('acmethemes/customizer/feature-section/feature-slider.php');