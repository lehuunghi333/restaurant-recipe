<?php
/**
 * Select sidebar according to the options saved
 *
 * @since Restaurant Recipe 1.0.0
 *
 * @param null
 * @return string
 *
 */
if ( !function_exists('restaurant_recipe_sidebar_selection') ) :
	function restaurant_recipe_sidebar_selection( ) {
		wp_reset_postdata();
		$restaurant_recipe_customizer_all_values = restaurant_recipe_get_theme_options();
		global $post;
		if(
			isset( $restaurant_recipe_customizer_all_values['restaurant-recipe-single-sidebar-layout'] ) &&
			(
				'left-sidebar' == $restaurant_recipe_customizer_all_values['restaurant-recipe-single-sidebar-layout'] ||
				'both-sidebar' == $restaurant_recipe_customizer_all_values['restaurant-recipe-single-sidebar-layout'] ||
				'middle-col' == $restaurant_recipe_customizer_all_values['restaurant-recipe-single-sidebar-layout'] ||
				'no-sidebar' == $restaurant_recipe_customizer_all_values['restaurant-recipe-single-sidebar-layout']
			)
		){
			$restaurant_recipe_body_global_class = $restaurant_recipe_customizer_all_values['restaurant-recipe-single-sidebar-layout'];
		}
		else{
			$restaurant_recipe_body_global_class= 'right-sidebar';
		}

		if ( restaurant_recipe_is_woocommerce_active() && ( is_product() || is_shop() || is_product_taxonomy() )) {
			if( is_product() ){
				$post_class = get_post_meta( $post->ID, 'restaurant_recipe_sidebar_layout', true );
				$restaurant_recipe_wc_single_product_sidebar_layout = $restaurant_recipe_customizer_all_values['restaurant-recipe-wc-single-product-sidebar-layout'];

				if ( 'default-sidebar' != $post_class ){
					if ( $post_class ) {
						$restaurant_recipe_body_classes = $post_class;
					} else {
						$restaurant_recipe_body_classes = $restaurant_recipe_wc_single_product_sidebar_layout;
					}
				}
				else{
					$restaurant_recipe_body_classes = $restaurant_recipe_wc_single_product_sidebar_layout;

				}
			}
			else{
				if( isset( $restaurant_recipe_customizer_all_values['restaurant-recipe-wc-shop-archive-sidebar-layout'] ) ){
					$restaurant_recipe_archive_sidebar_layout = $restaurant_recipe_customizer_all_values['restaurant-recipe-wc-shop-archive-sidebar-layout'];
					if(
						'right-sidebar' == $restaurant_recipe_archive_sidebar_layout ||
						'left-sidebar' == $restaurant_recipe_archive_sidebar_layout ||
						'both-sidebar' == $restaurant_recipe_archive_sidebar_layout ||
						'middle-col' == $restaurant_recipe_archive_sidebar_layout ||
						'no-sidebar' == $restaurant_recipe_archive_sidebar_layout
					){
						$restaurant_recipe_body_classes = $restaurant_recipe_archive_sidebar_layout;
					}
					else{
						$restaurant_recipe_body_classes = $restaurant_recipe_body_global_class;
					}
				}
				else{
					$restaurant_recipe_body_classes= $restaurant_recipe_body_global_class;
				}
			}
		}
		elseif( is_front_page() ){
			if( isset( $restaurant_recipe_customizer_all_values['restaurant-recipe-front-page-sidebar-layout'] ) ){
				if(
					'right-sidebar' == $restaurant_recipe_customizer_all_values['restaurant-recipe-front-page-sidebar-layout'] ||
					'left-sidebar' == $restaurant_recipe_customizer_all_values['restaurant-recipe-front-page-sidebar-layout'] ||
					'both-sidebar' == $restaurant_recipe_customizer_all_values['restaurant-recipe-front-page-sidebar-layout'] ||
					'middle-col' == $restaurant_recipe_customizer_all_values['restaurant-recipe-front-page-sidebar-layout'] ||
					'no-sidebar' == $restaurant_recipe_customizer_all_values['restaurant-recipe-front-page-sidebar-layout']
				){
					$restaurant_recipe_body_classes = $restaurant_recipe_customizer_all_values['restaurant-recipe-front-page-sidebar-layout'];
				}
				else{
					$restaurant_recipe_body_classes = $restaurant_recipe_body_global_class;
				}
			}
			else{
				$restaurant_recipe_body_classes= $restaurant_recipe_body_global_class;
			}
		}

		elseif ( is_singular() && isset( $post->ID ) ) {
			$post_class = get_post_meta( $post->ID, 'restaurant_recipe_sidebar_layout', true );
			if ( 'default-sidebar' != $post_class ){
				if ( $post_class ) {
					$restaurant_recipe_body_classes = $post_class;
				} else {
					$restaurant_recipe_body_classes = $restaurant_recipe_body_global_class;
				}
			}
			else{
				$restaurant_recipe_body_classes = $restaurant_recipe_body_global_class;
			}

		}
		elseif ( is_archive() ) {
			if( isset( $restaurant_recipe_customizer_all_values['restaurant-recipe-archive-sidebar-layout'] ) ){
				$restaurant_recipe_archive_sidebar_layout = $restaurant_recipe_customizer_all_values['restaurant-recipe-archive-sidebar-layout'];
				if(
					'right-sidebar' == $restaurant_recipe_archive_sidebar_layout ||
					'left-sidebar' == $restaurant_recipe_archive_sidebar_layout ||
					'both-sidebar' == $restaurant_recipe_archive_sidebar_layout ||
					'middle-col' == $restaurant_recipe_archive_sidebar_layout ||
					'no-sidebar' == $restaurant_recipe_archive_sidebar_layout
				){
					$restaurant_recipe_body_classes = $restaurant_recipe_archive_sidebar_layout;
				}
				else{
					$restaurant_recipe_body_classes = $restaurant_recipe_body_global_class;
				}
			}
			else{
				$restaurant_recipe_body_classes= $restaurant_recipe_body_global_class;
			}
		}
		else {
			$restaurant_recipe_body_classes = $restaurant_recipe_body_global_class;
		}
		return $restaurant_recipe_body_classes;
	}
endif;