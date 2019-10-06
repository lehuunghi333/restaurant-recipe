<?php
/*active callback function for excerpt*/
if ( !function_exists('restaurant_recipe_active_callback_content_from_excerpt') ) :
	function restaurant_recipe_active_callback_content_from_excerpt() {
		$restaurant_recipe_customizer_all_values = restaurant_recipe_get_theme_options();
		if( 'excerpt' == $restaurant_recipe_customizer_all_values['restaurant-recipe-blog-archive-content-from'] ){
			return true;
		}
		return false;
	}
endif;

/*adding sections for blog layout options*/
$wp_customize->add_section( 'restaurant-recipe-design-blog-layout-option', array(
    'priority'       => 30,
    'capability'     => 'edit_theme_options',
    'title'          => esc_html__( 'Default Blog/Archive Layout', 'restaurant-recipe' ),
    'panel'          => 'restaurant-recipe-design-panel'
) );

/*blog layout*/
$wp_customize->add_setting( 'restaurant_recipe_theme_options[restaurant-recipe-blog-archive-img-size]', array(
    'capability'		=> 'edit_theme_options',
    'default'			=> $defaults['restaurant-recipe-blog-archive-img-size'],
    'sanitize_callback' => 'restaurant_recipe_sanitize_select'
) );
$choices = restaurant_recipe_get_image_sizes_options(1);
$wp_customize->add_control( 'restaurant_recipe_theme_options[restaurant-recipe-blog-archive-img-size]', array(
    'choices'  	    => $choices,
    'label'		    => esc_html__( 'Blog/Archive Feature Image Size', 'restaurant-recipe' ),
    'section'       => 'restaurant-recipe-design-blog-layout-option',
    'settings'      => 'restaurant_recipe_theme_options[restaurant-recipe-blog-archive-img-size]',
    'type'	  	    => 'select'
) );

/*blog content from*/
$wp_customize->add_setting( 'restaurant_recipe_theme_options[restaurant-recipe-blog-archive-content-from]', array(
	'capability'		=> 'edit_theme_options',
	'default'			=> $defaults['restaurant-recipe-blog-archive-content-from'],
	'sanitize_callback' => 'restaurant_recipe_sanitize_select'
) );
$choices = restaurant_recipe_blog_archive_content_from();
$wp_customize->add_control( 'restaurant_recipe_theme_options[restaurant-recipe-blog-archive-content-from]', array(
	'choices'  	    => $choices,
	'label'		    => esc_html__( 'Blog/Archive Content From', 'restaurant-recipe' ),
	'section'       => 'restaurant-recipe-design-blog-layout-option',
	'settings'      => 'restaurant_recipe_theme_options[restaurant-recipe-blog-archive-content-from]',
	'type'	  	    => 'select'
) );

/*Excerpt Length*/
$wp_customize->add_setting( 'restaurant_recipe_theme_options[restaurant-recipe-blog-archive-excerpt-length]', array(
	'capability'		=> 'edit_theme_options',
	'default'			=> $defaults['restaurant-recipe-blog-archive-excerpt-length'],
	'sanitize_callback' => 'absint'
) );
$wp_customize->add_control( 'restaurant_recipe_theme_options[restaurant-recipe-blog-archive-excerpt-length]', array(
	'label'		        => esc_html__( 'Except Length', 'restaurant-recipe' ),
	'section'           => 'restaurant-recipe-design-blog-layout-option',
	'settings'          => 'restaurant_recipe_theme_options[restaurant-recipe-blog-archive-excerpt-length]',
	'type'	  	        => 'number',
	'active_callback'   => 'restaurant_recipe_active_callback_content_from_excerpt'
) );

/*Read More Text*/
$wp_customize->add_setting( 'restaurant_recipe_theme_options[restaurant-recipe-blog-archive-more-text]', array(
    'capability'		=> 'edit_theme_options',
    'default'			=> $defaults['restaurant-recipe-blog-archive-more-text'],
    'sanitize_callback' => 'sanitize_text_field'
) );
$wp_customize->add_control( 'restaurant_recipe_theme_options[restaurant-recipe-blog-archive-more-text]', array(
    'label'		=> esc_html__( 'Read More Text', 'restaurant-recipe' ),
    'section'   => 'restaurant-recipe-design-blog-layout-option',
    'settings'  => 'restaurant_recipe_theme_options[restaurant-recipe-blog-archive-more-text]',
    'type'	  	=> 'text'
) );

/*Pagination Options*/
$wp_customize->add_setting( 'restaurant_recipe_theme_options[restaurant-recipe-pagination-option]', array(
	'capability'		=> 'edit_theme_options',
	'default'			=> $defaults['restaurant-recipe-pagination-option'],
	'sanitize_callback' => 'restaurant_recipe_sanitize_select'
) );
$choices = restaurant_recipe_pagination_options();
$wp_customize->add_control( 'restaurant_recipe_theme_options[restaurant-recipe-pagination-option]', array(
	'choices'  	    => $choices,
	'label'		    => esc_html__( 'Pagination Options', 'restaurant-recipe' ),
	'description'   => esc_html__( 'Blog and Archive Pages Pagination', 'restaurant-recipe' ),
	'section'       => 'restaurant-recipe-design-blog-layout-option',
	'settings'      => 'restaurant_recipe_theme_options[restaurant-recipe-pagination-option]',
	'type'	  	    => 'select'
) );