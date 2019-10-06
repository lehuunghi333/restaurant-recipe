<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Acme Themes
 * @subpackage Restaurant Recipe
 */

/**
 * restaurant_recipe_action_after_content hook
 * @since Restaurant Recipe 1.0.0
 *
 * @hooked null
 */
do_action( 'restaurant_recipe_action_after_content' );

/**
 * restaurant_recipe_action_before_footer hook
 * @since Restaurant Recipe 1.0.0
 *
 * @hooked null
 */
do_action( 'restaurant_recipe_action_before_footer' );

/**
 * restaurant_recipe_action_footer hook
 * @since Restaurant Recipe 1.0.0
 *
 * @hooked restaurant_recipe_footer - 10
 */
do_action( 'restaurant_recipe_action_footer' );

/**
 * restaurant_recipe_action_after_footer hook
 * @since Restaurant Recipe 1.0.0
 *
 * @hooked null
 */
do_action( 'restaurant_recipe_action_after_footer' );

/**
 * restaurant_recipe_action_after hook
 * @since Restaurant Recipe 1.0.0
 *
 * @hooked restaurant_recipe_page_end - 10
 */
do_action( 'restaurant_recipe_action_after' );

wp_footer();
?>
</body>
</html>