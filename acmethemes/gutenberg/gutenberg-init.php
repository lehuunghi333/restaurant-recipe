<?php
if ( ! function_exists( 'restaurant_recipe_gutenberg_setup' ) ) :
	/**
	 * Making theme gutenberg compatible
	 */
	function restaurant_recipe_gutenberg_setup() {
		add_theme_support( 'align-wide' );
		add_theme_support( 'wp-block-styles' );
	}
endif;
add_action( 'after_setup_theme', 'restaurant_recipe_gutenberg_setup' );

function restaurant_recipe_dynamic_editor_styles(){

	global $restaurant_recipe_customizer_all_values;
	$restaurant_recipe_link_color               = esc_attr( $restaurant_recipe_customizer_all_values['restaurant-recipe-link-color'] );
	$restaurant_recipe_link_hover_color         = esc_attr( $restaurant_recipe_customizer_all_values['restaurant-recipe-link-hover-color'] );

	$custom_css = '';

	$custom_css .= "
            .edit-post-visual-editor, 
			.edit-post-visual-editor p {
               color: #666;
            }";

	$custom_css .= "
	        .gutenberg__editor .wp-block-heading h1, 
	        .gutenberg__editor .wp-block-heading h1 a,
	        .gutenberg__editor .wp-block-heading h2,
	        .gutenberg__editor .wp-block-heading h2 a,
	        .gutenberg__editor .wp-block-heading h3, 
	        .gutenberg__editor .wp-block-heading h3 a,
	        .gutenberg__editor .wp-block-heading h4, 
	        .gutenberg__editor .wp-block-heading h4 a,
	        .gutenberg__editor .wp-block-heading h5, 
	        .gutenberg__editor .wp-block-heading h5 a,
	        .gutenberg__editor .wp-block-heading h6,
	        .gutenberg__editor .wp-block-heading h6 a{
	            color: 3a3a3a;
	        }";

	$custom_css .= "
	        .gutenberg__editor a{
	            color: {$restaurant_recipe_link_color};
	        }";
	$custom_css .= "
	        .gutenberg__editor a:hover,
	        .gutenberg__editor a:active,
	        .gutenberg__editor a:focus{
	            color: {$restaurant_recipe_link_hover_color};
	        }";

        return wp_strip_all_tags( $custom_css );	
}

/**
 * Enqueue block editor style
 */
function restaurant_recipe_block_editor_styles() {
	wp_enqueue_style( 'restaurant-recipe-googleapis', '//fonts.googleapis.com/css?family=Montserrat:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i|Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i', array(), null );
	wp_enqueue_style( 'restaurant-recipe-block-editor-styles', get_template_directory_uri() . '/acmethemes/gutenberg/gutenberg-edit.css', false, '1.0' );

	/**
	 * Styles from the customizer
	 */
	wp_add_inline_style( 'restaurant-recipe-block-editor-styles', restaurant_recipe_dynamic_editor_styles() );
}
add_action( 'enqueue_block_editor_assets', 'restaurant_recipe_block_editor_styles',99 );

function restaurant_recipe_gutenberg_scripts() {
	wp_enqueue_style( 'restaurant-recipe-block-front-styles', get_template_directory_uri() . '/acmethemes/gutenberg/gutenberg-front.css', false, '1.0' );
}
add_action( 'wp_enqueue_scripts', 'restaurant_recipe_gutenberg_scripts' );