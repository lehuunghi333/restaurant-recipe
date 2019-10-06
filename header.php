<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Acme Themes
 * @subpackage Restaurant Recipe
 */

/**
 * restaurant_recipe_action_before_head hook
 * @since Restaurant Recipe 1.0.0
 *
 * @hooked restaurant_recipe_set_global -  0
 * @hooked restaurant_recipe_doctype -  10
 */
do_action( 'restaurant_recipe_action_before_head' );?>
	<head>

		<?php
		/**
		 * restaurant_recipe_action_before_wp_head hook
		 * @since Restaurant Recipe 1.0.0
		 *
		 * @hooked restaurant_recipe_before_wp_head -  10
		 */
		do_action( 'restaurant_recipe_action_before_wp_head' );

		wp_head();
		?>

	</head>
<body <?php body_class();?>>

<?php
/**
 * restaurant_recipe_action_before hook
 * @since Restaurant Recipe 1.0.0
 *
 * @hooked restaurant_recipe_site_start - 20
 */
do_action( 'restaurant_recipe_action_before' );

/**
 * restaurant_recipe_action_before_header hook
 * @since Restaurant Recipe 1.0.0
 *
 * @hooked restaurant_recipe_skip_to_content - 10
 */
do_action( 'restaurant_recipe_action_before_header' );

/**
 * restaurant_recipe_action_header hook
 * @since Restaurant Recipe 1.0.0
 *
 * @hooked restaurant_recipe_header - 10
 */
do_action( 'restaurant_recipe_action_header' );

/**
 * restaurant_recipe_action_after_header hook
 * @since Restaurant Recipe 1.0.0
 *
 * @hooked null
 */
do_action( 'restaurant_recipe_action_after_header' );

/**
 * restaurant_recipe_action_before_content hook
 * @since Restaurant Recipe 1.0.0
 *
 * @hooked null
 */
do_action( 'restaurant_recipe_action_before_content' );