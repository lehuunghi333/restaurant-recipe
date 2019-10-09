<?php
/**
 * Header Image Display Options
 *
 * @since Restaurant Recipe 1.0.0
 *
 * @param null
 * @return array $restaurant_recipe_menu_display_options
 *
 */
if ( !function_exists('restaurant_recipe_menu_display_options') ) :
	function restaurant_recipe_menu_display_options() {
		$restaurant_recipe_menu_display_options =  array(
			'menu-default'      => esc_html__( 'Default', 'restaurant-recipe' ),
			'menu-classic'      => esc_html__( 'Classic', 'restaurant-recipe' ),
			'header-transparent'      => esc_html__( 'Transparent', 'restaurant-recipe' )
		);
		return apply_filters( 'restaurant_recipe_menu_display_options', $restaurant_recipe_menu_display_options );
	}
endif;

/**
 * Menu and Logo Display Options
 *
 * @since Restaurant Recipe 1.0.0
 *
 * @param null
 * @return array $restaurant_recipe_header_image_display
 *
 */
if ( !function_exists('restaurant_recipe_header_image_display') ) :
	function restaurant_recipe_header_image_display() {
		$restaurant_recipe_header_image_display =  array(
			'hide'              => esc_html__( 'Hide', 'restaurant-recipe' ),
			'bg-image'          => esc_html__( 'Background Image', 'restaurant-recipe' ),
			'normal-image'      => esc_html__( 'Normal Image', 'restaurant-recipe' )
		);
		return apply_filters( 'restaurant_recipe_header_image_display', $restaurant_recipe_header_image_display );
	}
endif;

/**
 * Menu Right Button Link Options
 *
 * @since Restaurant Recipe 1.0.0
 *
 * @param null
 * @return array $restaurant_recipe_menu_right_button_link_options
 *
 */
if ( !function_exists('restaurant_recipe_menu_right_button_link_options') ) :
	function restaurant_recipe_menu_right_button_link_options() {
		$restaurant_recipe_menu_right_button_link_options =  array(
			'disable'       => esc_html__( 'Disable', 'restaurant-recipe' ),
			'booking'       => esc_html__( 'Popup Widgets ( Booking Form )', 'restaurant-recipe' ),
			'link'          => esc_html__( 'One Link', 'restaurant-recipe' )
		);
		return apply_filters( 'restaurant_recipe_menu_right_button_link_options', $restaurant_recipe_menu_right_button_link_options );
	}
endif;

/**
 * Header top display options of elements
 *
 * @since Restaurant Recipe 1.0.0
 *
 * @param null
 * @return array $restaurant_recipe_header_top_display_selection
 *
 */
if ( !function_exists('restaurant_recipe_header_top_display_selection') ) :
	function restaurant_recipe_header_top_display_selection() {
		$restaurant_recipe_header_top_display_selection =  array(
			'hide'          => esc_html__( 'Hide', 'restaurant-recipe' ),
			'left'          => esc_html__( 'on Top Left', 'restaurant-recipe' ),
			'right'         => esc_html__( 'on Top Right', 'restaurant-recipe' )
		);
		return apply_filters( 'restaurant_recipe_header_top_display_selection', $restaurant_recipe_header_top_display_selection );
	}
endif;

/**
 * Feature slider text align
 *
 * @since Mercantile 1.0.0
 *
 * @param null
 * @return array $restaurant_recipe_slider_text_align
 *
 */
if ( !function_exists('restaurant_recipe_slider_text_align') ) :
	function restaurant_recipe_slider_text_align() {
		$restaurant_recipe_slider_text_align =  array(
			'alternate'     => esc_html__( 'Alternate', 'restaurant-recipe' ),
			'text-left'     => esc_html__( 'Left', 'restaurant-recipe' ),
			'text-right'    => esc_html__( 'Right', 'restaurant-recipe' ),
			'text-center'   => esc_html__( 'Center', 'restaurant-recipe' )
		);
		return apply_filters( 'restaurant_recipe_slider_text_align', $restaurant_recipe_slider_text_align );
	}
endif;

/**
 * Featured Slider Image Options
 *
 * @since Restaurant Recipe 1.0.0
 *
 * @param null
 * @return array $restaurant_recipe_fs_image_display_options
 *
 */
if ( !function_exists('restaurant_recipe_fs_image_display_options') ) :
	function restaurant_recipe_fs_image_display_options() {
		$restaurant_recipe_fs_image_display_options =  array(
			'full-screen-bg' => esc_html__( 'Full Screen Background', 'restaurant-recipe' ),
			'responsive-img' => esc_html__( 'Responsive Image', 'restaurant-recipe' )
		);
		return apply_filters( 'restaurant_recipe_fs_image_display_options', $restaurant_recipe_fs_image_display_options );
	}
endif;

/**
 * Feature Info number
 *
 * @since Restaurant Recipe 1.0.0
 *
 * @param null
 * @return array $restaurant_recipe_feature_info_number
 *
 */
if ( !function_exists('restaurant_recipe_feature_info_number') ) :
	function restaurant_recipe_feature_info_number() {
		$restaurant_recipe_feature_info_number =  array(
			1               => esc_html__( '1', 'restaurant-recipe' ),
			2               => esc_html__( '2', 'restaurant-recipe' ),
			3               => esc_html__( '3', 'restaurant-recipe' ),
			4               => esc_html__( '4', 'restaurant-recipe' ),
		);
		return apply_filters( 'restaurant_recipe_feature_info_number', $restaurant_recipe_feature_info_number );
	}
endif;

/**
 * Footer copyright beside options
 *
 * @since Restaurant Recipe 1.0.0
 *
 * @param null
 * @return array $restaurant_recipe_footer_copyright_beside_option
 *
 */
if ( !function_exists('restaurant_recipe_footer_copyright_beside_option') ) :
	function restaurant_recipe_footer_copyright_beside_option() {
		$restaurant_recipe_footer_copyright_beside_option =  array(
			'hide'          => esc_html__( 'Hide', 'restaurant-recipe' ),
			'social'        => esc_html__( 'Social Links', 'restaurant-recipe' ),
			'footer-menu'   => esc_html__( 'Footer Menu', 'restaurant-recipe' )
		);
		return apply_filters( 'restaurant_recipe_footer_copyright_beside_option', $restaurant_recipe_footer_copyright_beside_option );
	}
endif;

/**
 * Sidebar layout options
 *
 * @since Restaurant Recipe 1.0.0
 *
 * @param null
 * @return array $restaurant_recipe_sidebar_layout
 *
 */
if ( !function_exists('restaurant_recipe_sidebar_layout') ) :
    function restaurant_recipe_sidebar_layout() {
        $restaurant_recipe_sidebar_layout =  array(
	        'right-sidebar' => esc_html__( 'Right Sidebar', 'restaurant-recipe' ),
	        'left-sidebar'  => esc_html__( 'Left Sidebar' , 'restaurant-recipe' ),
	        'both-sidebar'  => esc_html__( 'Both Sidebar' , 'restaurant-recipe' ),
	        'middle-col'    => esc_html__( 'Middle Column' , 'restaurant-recipe' ),
	        'no-sidebar'    => esc_html__( 'No Sidebar', 'restaurant-recipe' )
        );
        return apply_filters( 'restaurant_recipe_sidebar_layout', $restaurant_recipe_sidebar_layout );
    }
endif;

/**
 * Blog content from
 *
 * @since Restaurant Recipe 1.0.0
 *
 * @param null
 * @return array $restaurant_recipe_blog_archive_content_from
 *
 */
if ( !function_exists('restaurant_recipe_blog_archive_content_from') ) :
	function restaurant_recipe_blog_archive_content_from() {
		$restaurant_recipe_blog_archive_content_from =  array(
			'excerpt'    => esc_html__( 'Excerpt', 'restaurant-recipe' ),
			'content'    => esc_html__( 'Content', 'restaurant-recipe' )
		);
		return apply_filters( 'restaurant_recipe_blog_archive_content_from', $restaurant_recipe_blog_archive_content_from );
	}
endif;

/**
 * Image Size
 *
 * @since Restaurant Recipe 1.0.0
 *
 * @param null
 * @return array $restaurant_recipe_get_image_sizes_options
 *
 */
if ( !function_exists('restaurant_recipe_get_image_sizes_options') ) :
	function restaurant_recipe_get_image_sizes_options( $add_disable = false ) {
		global $_wp_additional_image_sizes;
		$choices = array();
		if ( true == $add_disable ) {
			$choices['disable'] = esc_html__( 'No Image', 'restaurant-recipe' );
		}
		foreach ( array( 'thumbnail', 'medium', 'large' ) as $key => $_size ) {
			$choices[ $_size ] = $_size . ' ('. get_option( $_size . '_size_w' ) . 'x' . get_option( $_size . '_size_h' ) . ')';
		}
		$choices['full'] = esc_html__( 'full (original)', 'restaurant-recipe' );
		if ( ! empty( $_wp_additional_image_sizes ) && is_array( $_wp_additional_image_sizes ) ) {

			foreach ($_wp_additional_image_sizes as $key => $size ) {
				$choices[ $key ] = $key . ' ('. $size['width'] . 'x' . $size['height'] . ')';
			}
		}
		return apply_filters( 'restaurant_recipe_get_image_sizes_options', $choices );
	}
endif;

/**
 * Pagination Options
 *
 * @since Restaurant Recipe 1.0.0
 *
 * @param null
 * @return array restaurant_recipe_pagination_options
 *
 */
if ( !function_exists('restaurant_recipe_pagination_options') ) :
	function restaurant_recipe_pagination_options() {
		$restaurant_recipe_pagination_options =  array(
			'default'  => esc_html__( 'Default', 'restaurant-recipe' ),
			'numeric'  => esc_html__( 'Numeric', 'restaurant-recipe' )
		);
		return apply_filters( 'restaurant_recipe_pagination_options', $restaurant_recipe_pagination_options );
	}
endif;

/**
 * Breadcrumb Options
 *
 * @since Restaurant Recipe 1.0.0
 *
 * @param null
 * @return array restaurant_recipe_breadcrumb_options
 *
 */
if ( !function_exists('restaurant_recipe_breadcrumb_options') ) :
	function restaurant_recipe_breadcrumb_options() {
		$restaurant_recipe_breadcrumb_options =  array(
			'hide'  => esc_html__( 'Hide', 'restaurant-recipe' ),
		);
		if ( function_exists('yoast_breadcrumb') ) {
			$restaurant_recipe_breadcrumb_options['yoast'] = esc_html__( 'Yoast', 'restaurant-recipe' );
		}
		if ( function_exists('bcn_display') ) {
			$restaurant_recipe_breadcrumb_options['bcn'] = esc_html__( 'Breadcrumb NavXT', 'restaurant-recipe' );
		}
		return apply_filters( 'restaurant_recipe_pagination_options', $restaurant_recipe_breadcrumb_options );
	}
endif;

/**
 * Default Theme layout options
 *
 * @since Restaurant Recipe 1.0.0
 *
 * @param null
 * @return array $restaurant_recipe_theme_layout
 *
 */
if ( !function_exists('restaurant_recipe_get_default_theme_options') ) :
    function restaurant_recipe_get_default_theme_options() {

        $default_theme_options = array(

	        /*logo and site title*/
	        'restaurant-recipe-display-site-logo'      => '',
	        'restaurant-recipe-display-site-title'     => 1,
	        'restaurant-recipe-display-site-tagline'   => 1,

	        /*header height*/
	        'restaurant-recipe-header-height'          => 300,
	        'restaurant-recipe-header-image-display'   => 'normal-image',

            /*header top*/
            'restaurant-recipe-enable-header-top'       => '',
	        'restaurant-recipe-header-top-menu-display-selection'      => 'right',
	        'restaurant-recipe-header-top-info-display-selection'      => 'left',
	        'restaurant-recipe-header-top-social-display-selection'    => 'right',

	        /*menu options*/
            'restaurant-recipe-menu-display-options'      => 'menu-default',
            'restaurant-recipe-enable-sticky'                  => '',
	        'restaurant-recipe-menu-right-button-options'      => 'disable',
	        'restaurant-recipe-menu-right-button-title'        => esc_html__('Book Table','restaurant-recipe'),
	        'restaurant-recipe-menu-right-button-link'         => '',
            'restaurant-recipe-enable-cart-icon'               => '',

	        /*feature section options*/
	        'restaurant-recipe-enable-feature'                         => '',
	        'restaurant-recipe-slides-data'                            => '',
            'restaurant-recipe-feature-slider-enable-animation'        => 1,
            'restaurant-recipe-feature-slider-display-title'           => 1,
            'restaurant-recipe-feature-slider-display-excerpt'         => 1,
            'restaurant-recipe-fs-image-display-options'               => 'full-screen-bg',
            'restaurant-recipe-feature-slider-text-align'              => 'text-left',
            'restaurant-recipe-slider-scroll-text'              => '',
            'restaurant-recipe-slider-scroll-link'              => '',

	        /*basic info*/
	        'restaurant-recipe-feature-info-number'    => 4,
	        'restaurant-recipe-first-info-icon'        => 'fa-calendar',
	        'restaurant-recipe-first-info-title'       => esc_html__('Send Us a Mail', 'restaurant-recipe'),
	        'restaurant-recipe-first-info-desc'        => esc_html__('domain@example.com ', 'restaurant-recipe'),
	        'restaurant-recipe-second-info-icon'       => 'fa-map-marker',
	        'restaurant-recipe-second-info-title'      => esc_html__('Our Location', 'restaurant-recipe'),
	        'restaurant-recipe-second-info-desc'       => esc_html__('Elmonte California', 'restaurant-recipe'),
	        'restaurant-recipe-third-info-icon'        => 'fa-phone',
	        'restaurant-recipe-third-info-title'       => esc_html__('Call Us', 'restaurant-recipe'),
	        'restaurant-recipe-third-info-desc'        => esc_html__('01-23456789-10', 'restaurant-recipe'),
	        'restaurant-recipe-forth-info-icon'        => 'fa-envelope-o',
	        'restaurant-recipe-forth-info-title'       => esc_html__('Office Hours', 'restaurant-recipe'),
	        'restaurant-recipe-forth-info-desc'        => esc_html__('8 hours per day', 'restaurant-recipe'),

            /*footer options*/
            'restaurant-recipe-footer-copyright'                       => esc_html__( '&copy; All right reserved', 'restaurant-recipe' ),
	        'restaurant-recipe-footer-copyright-beside-option'         => 'footer-menu',
	        'restaurant-recipe-enable-footer-power-text'               => 1,
	        'restaurant-recipe-footer-site-info'                       => '',
	        'restaurant-recipe-footer-bg-img'                          => '',

	        /*layout/design options*/
	        'restaurant-recipe-pagination-option'      => 'numeric',

	        'restaurant-recipe-enable-animation'       => '',

	        'restaurant-recipe-single-sidebar-layout'                  => 'right-sidebar',
            'restaurant-recipe-front-page-sidebar-layout'              => 'right-sidebar',
            'restaurant-recipe-archive-sidebar-layout'                 => 'right-sidebar',

            'restaurant-recipe-blog-archive-img-size'                  => 'full',
            'restaurant-recipe-blog-archive-content-from'              => 'excerpt',
            'restaurant-recipe-blog-archive-excerpt-length'            => 42,
	        'restaurant-recipe-blog-archive-more-text'                 => esc_html__( 'Read More', 'restaurant-recipe' ),

	        'restaurant-recipe-hide-front-page-content' => '',
	        'restaurant-recipe-hide-front-page-header'  => '',

	        'restaurant-recipe-primary-color'          => '#c38346',
            'restaurant-recipe-header-top-bg-color'    => '#1b1b1b',
            'restaurant-recipe-footer-bg-color'        => '#1b1b1b',
            'restaurant-recipe-footer-bottom-bg-color' => '#2d2d2d',
            'restaurant-recipe-link-color'             => '#c38346',
            'restaurant-recipe-link-hover-color'       => '#d2333c',

	        /*woocommerce*/
	        'restaurant-recipe-wc-shop-archive-sidebar-layout'     => 'no-sidebar',
	        'restaurant-recipe-wc-product-column-number'           => 4,
	        'restaurant-recipe-wc-shop-archive-total-product'      => 16,
	        'restaurant-recipe-wc-single-product-sidebar-layout'   => 'no-sidebar',

            /*single*/
	        'restaurant-recipe-single-header-title'            => esc_html__( 'Blog', 'restaurant-recipe' ),
	        'restaurant-recipe-single-img-size'                => 'full',

	        /*theme options*/
            'restaurant-recipe-popup-widget-title'     => esc_html__( 'Booking Quote', 'restaurant-recipe' ),
	        'restaurant-recipe-breadcrumb-options'        => 'hide',
            'restaurant-recipe-search-placeholder'     => esc_html__( 'Search', 'restaurant-recipe' ),
            'restaurant-recipe-social-data'            => ''
        );
        return apply_filters( 'restaurant_recipe_default_theme_options', $default_theme_options );
    }
endif;

/**
 * Get theme options
 *
 * @since Restaurant Recipe 1.0.0
 *
 * @param null
 * @return array restaurant_recipe_theme_options
 *
 */
if ( !function_exists('restaurant_recipe_get_theme_options') ) :
    function restaurant_recipe_get_theme_options() {

        $restaurant_recipe_default_theme_options = restaurant_recipe_get_default_theme_options();
        $restaurant_recipe_get_theme_options = get_theme_mod( 'restaurant_recipe_theme_options');
        if( is_array( $restaurant_recipe_get_theme_options )){
            return array_merge( $restaurant_recipe_default_theme_options ,$restaurant_recipe_get_theme_options );
        }
        else{
            return $restaurant_recipe_default_theme_options;
        }
    }
endif;