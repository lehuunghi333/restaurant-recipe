<?php
/**
 * The front-page template file.
 *
 * @package Acme Themes
 * @subpackage Restaurant Recipe
 * @since Restaurant Recipe 1.0.0
 */
get_header();

/**
 * restaurant_recipe_action_front_page hook
 * @since Restaurant Recipe 1.0.0
 *
 * @hooked restaurant_recipe_featured_slider -  10
 * @hooked restaurant_recipe_front_page -  20
 */
do_action( 'restaurant_recipe_action_front_page' );

get_footer();