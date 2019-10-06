<?php
/**
 * Restaurant Recipe functions.
 * @package Restaurant Recipe
 * @since 1.0.0
 */

/**
 * check if WooCommerce activated
 */
function restaurant_recipe_is_woocommerce_active() {
	return class_exists( 'WooCommerce' ) ? true : false;
}

/**
 * Checks if the current page is a product archive
 * @return boolean
 */
function restaurant_recipe_is_product_archive() {
	if ( restaurant_recipe_is_woocommerce_active() ) {
		if ( is_shop() || is_product_taxonomy() || is_product_category() || is_product_tag() ) {
			return true;
		} else {
			return false;
		}
	}
	else {
		return false;
	}
}

add_action( 'init', 'restaurant_recipe_remove_wc_breadcrumbs' );
function restaurant_recipe_remove_wc_breadcrumbs() {
	remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20 );
}

/*https://gist.github.com/mikejolley/2044109*/
add_filter( 'woocommerce_add_to_cart_fragments', 'restaurant_recipe_header_add_to_cart_fragment' );
function restaurant_recipe_header_add_to_cart_fragment( $fragments ) {
	ob_start();
	?>
    <span class="cart-value"> <?php echo wp_kses_data( WC()->cart->get_cart_contents_count() );?></span>
	<?php
	$fragments['span.cart-value'] = ob_get_clean();
	return $fragments;
}

/**
 * Woo Commerce Number of row filter Function
 */
if (!function_exists('restaurant_recipe_loop_columns')) {
	function restaurant_recipe_loop_columns() {
		$restaurant_recipe_customizer_all_values = restaurant_recipe_get_theme_options();
		$restaurant_recipe_wc_product_column_number = $restaurant_recipe_customizer_all_values['restaurant-recipe-wc-product-column-number'];
		if ($restaurant_recipe_wc_product_column_number) {
			$column_number = $restaurant_recipe_wc_product_column_number;
		}
		else {
			$column_number = 3;
		}
		return $column_number;
	}
}
add_filter('loop_shop_columns', 'restaurant_recipe_loop_columns');

function restaurant_recipe_loop_shop_per_page( $cols ) {
	// $cols contains the current number of products per page based on the value stored on Options -> Reading
	// Return the number of products you wanna show per page.
	$restaurant_recipe_customizer_all_values = restaurant_recipe_get_theme_options();
	$restaurant_recipe_wc_product_total_number = $restaurant_recipe_customizer_all_values['restaurant-recipe-wc-shop-archive-total-product'];
	if ($restaurant_recipe_wc_product_total_number) {
		$cols = $restaurant_recipe_wc_product_total_number;
	}
	return $cols;
}
add_filter( 'loop_shop_per_page', 'restaurant_recipe_loop_shop_per_page', 20 );