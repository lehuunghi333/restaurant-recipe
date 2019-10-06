<?php
if ( ! function_exists( 'restaurant_recipe_posts_navigation' ) ) :
	/**
	 * Post navigation
	 *
	 * @since Restaurant Recipe 1.0.0
	 *
	 * @return void
	 */
	function restaurant_recipe_posts_navigation() {
		global $restaurant_recipe_customizer_all_values;
		$restaurant_recipe_pagination_option = $restaurant_recipe_customizer_all_values['restaurant-recipe-pagination-option'];
		if( 'default' == $restaurant_recipe_pagination_option ){
			// Previous/next page navigation.
			the_posts_navigation();
		}
		else {
			// Previous/next page navigation.
			the_posts_pagination();
		}
	}
endif;
add_action( 'restaurant_recipe_action_posts_navigation', 'restaurant_recipe_posts_navigation' );

/**
 * Feature Options
 *
 * @since Medical Circle 1.0.0
 *
 * @param null
 * @return string
 *
 */
if ( !function_exists('restaurant_recipe_featured_image_display') ) :
	function restaurant_recipe_featured_image_display() {
		global $restaurant_recipe_customizer_all_values;
		$restaurant_recipe_single_image_layout = $restaurant_recipe_customizer_all_values['restaurant-recipe-single-img-size'];

		return $restaurant_recipe_single_image_layout;
	}
endif;