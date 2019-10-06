<?php
/**
 * Sanitize choices
 * @since Restaurant Recipe 1.0.0
 * @param null
 * @return string $restaurant_recipe_about_column_number
 *
 */
if ( ! function_exists( 'restaurant_recipe_sanitize_choice_options' ) ) :
	function restaurant_recipe_sanitize_choice_options( $value, $choices, $default ) {
		$input = wp_kses_post( $value );
		$output = array_key_exists( $input, $choices ) ? $input : $default;
		return $output;
	}
endif;

/**
 * Common functions for widgets
 *
 * @since Restaurant Recipe 1.0.0
 *
 * @param null
 *
 * @return array $restaurant_recipe_about_column_number
 *
 */
if ( ! function_exists( 'restaurant_recipe_background_options' ) ) :
	function restaurant_recipe_background_options() {
		$restaurant_recipe_about_column_number = array(
			'default'   => esc_html__( 'Default', 'restaurant-recipe' ),
			'gray'      => esc_html__( 'Gray', 'restaurant-recipe' )
		);

		return apply_filters( 'restaurant_recipe_background_options', $restaurant_recipe_about_column_number );
	}
endif;

/**
 * Column Number
 *
 * @since Restaurant Recipe 1.0.0
 *
 * @param null
 *
 * @return array $restaurant_recipe_about_column_number
 *
 */
if ( ! function_exists( 'restaurant_recipe_widget_column_number' ) ) :
	function restaurant_recipe_widget_column_number() {
		$restaurant_recipe_about_column_number = array(
			1 => esc_html__( '1', 'restaurant-recipe' ),
			2 => esc_html__( '2', 'restaurant-recipe' ),
			3 => esc_html__( '3', 'restaurant-recipe' ),
			4 => esc_html__( '4', 'restaurant-recipe' )
		);
		return apply_filters( 'restaurant_recipe_widget_column_number', $restaurant_recipe_about_column_number );
	}
endif;

/**
 * Widget Image Popup Type
 *
 * @since Restaurant Recipe 1.0.0
 *
 * @param null
 * @return array $restaurant_recipe_gallery_image_popup
 *
 */
if ( !function_exists('restaurant_recipe_gallery_image_popup') ) :
	function restaurant_recipe_gallery_image_popup() {
		$restaurant_recipe_gallery_image_popup =  array(
			'gallery'   => esc_html__( 'Gallery', 'restaurant-recipe' ),
			'single'    => esc_html__( 'Single', 'restaurant-recipe' ),
			'disable'   => esc_html__( 'Disable', 'restaurant-recipe' ),
		);
		return apply_filters( 'restaurant_recipe_gallery_image_popup', $restaurant_recipe_gallery_image_popup );
	}
endif;

/**
 * Content From
 *
 * @since Restaurant Recipe 1.0.0
 *
 * @param null
 *
 * @return array $restaurant_recipe_content_from
 *
 */
if ( ! function_exists( 'restaurant_recipe_content_from' ) ) :
	function restaurant_recipe_content_from() {
		$restaurant_recipe_about_column_number = array(
			'excerpt' => esc_html__( 'Excerpt', 'restaurant-recipe' ),
			'content' => esc_html__( 'Content', 'restaurant-recipe' )
		);
		return apply_filters( 'restaurant_recipe_content_from', $restaurant_recipe_about_column_number );
	}
endif;

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function restaurant_recipe_widgets_init() {
	register_sidebar( array(
        'name'          => esc_html__( 'Right Sidebar', 'restaurant-recipe' ),
        'id'            => 'restaurant-recipe-sidebar',
        'description'   => '',
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ) );
    if ( is_customize_preview() ) {
        $restaurant_recipe_home_description = sprintf( esc_html__( 'Displays widgets on home page main content area.%1$s Note : Please go to %2$s "Static Front Page"%3$s setting, Select "A static page" then "Front page" and "Posts page" to show added widgets', 'restaurant-recipe' ), '<br />','<b><a class="at-customizer" data-section="static_front_page" style="cursor: pointer">','</a></b>' );
    }
    else{
        $restaurant_recipe_home_description = esc_html__( 'Displays widgets on Front/Home page. Note : Please go to Setting => Reading, Select "A static page" then "Front page" and "Posts page" to show added widgets', 'restaurant-recipe' );
    }
    register_sidebar(array(
        'name'          => esc_html__('Home Main Content Area', 'restaurant-recipe'),
        'id'            => 'restaurant-recipe-home',
        'description'	=> $restaurant_recipe_home_description,
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget'  => '</aside>',
        'before_title'  => '<h2 class="widget-title init-animate zoomIn"><span>',
        'after_title'   => '</span></h2>',
    ));

	register_sidebar( array(
		'name'          => esc_html__( 'Left Sidebar', 'restaurant-recipe' ),
		'id'            => 'restaurant-recipe-sidebar-left',
		'description'   => '',
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

    register_sidebar(array(
        'name'          => esc_html__('Footer Column One', 'restaurant-recipe'),
        'id'            => 'footer-col-one',
        'description'   => esc_html__('Displays items on top footer section.', 'restaurant-recipe'),
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget'  => '</aside>',
        'before_title'  => '<h3 class="widget-title"><span>',
        'after_title'   => '</span></h3>',
    ));

    register_sidebar(array(
        'name'          => esc_html__('Footer Column Two', 'restaurant-recipe'),
        'id'            => 'footer-col-two',
        'description'   => esc_html__('Displays items on top footer section.', 'restaurant-recipe'),
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget'  => '</aside>',
        'before_title'  => '<h3 class="widget-title"><span>',
        'after_title'   => '</span></h3>',
    ));

    register_sidebar(array(
        'name'          => esc_html__('Footer Column Three', 'restaurant-recipe'),
        'id'            => 'footer-col-three',
        'description'   => esc_html__('Displays items on top footer section.', 'restaurant-recipe'),
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget'  => '</aside>',
        'before_title'  => '<h3 class="widget-title"><span>',
        'after_title'   => '</span></h3>',
    ));

    register_sidebar(array(
        'name'          => esc_html__('Footer Column Four', 'restaurant-recipe'),
        'id'            => 'footer-col-four',
        'description'   => esc_html__('Displays items on top footer section.', 'restaurant-recipe'),
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget'  => '</aside>',
        'before_title'  => '<h3 class="widget-title"><span>',
        'after_title'   => '</span></h3>',
    ));

	register_sidebar(array(
		'name'          => esc_html__('Popup Widget Area', 'restaurant-recipe'),
		'id'            => 'popup-widget-area',
		'description'   => esc_html__('Displays items on Pop up', 'restaurant-recipe'),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title"><span>',
		'after_title'   => '</span></h3>',
	));

    /*Widgets*/
	register_widget( 'Restaurant_Recipe_About' );
	register_widget( 'Restaurant_Recipe_Accordion' );
	register_widget( 'Restaurant_Recipe_Posts_Col' );
	register_widget( 'Restaurant_Recipe_Contact' );
	register_widget( 'Restaurant_Recipe_Service' );
	register_widget( 'Restaurant_Recipe_Gallery' );
	register_widget( 'Restaurant_Recipe_Team' );
	register_widget( 'Restaurant_Recipe_Testimonial' );
	register_widget( 'Restaurant_Recipe_Feature' );
	register_widget( 'Restaurant_Recipe_Food_Menu' );
}
add_action( 'widgets_init', 'restaurant_recipe_widgets_init' );

/* ajax callback for get_edit_post_link*/
add_action( 'wp_ajax_at_get_edit_post_link', 'restaurant_recipe_get_edit_post_link' );
function restaurant_recipe_get_edit_post_link(){
    if( isset( $_GET['id'] ) ){
	    $id = absint( $_GET['id'] );
	    if( get_edit_post_link( $id ) ){
		    ?>
            <a class="button button-link at-postid alignright" target="_blank" href="<?php echo esc_url( get_edit_post_link( $id ) ); ?>">
			    <?php esc_html_e('Full Edit','restaurant-recipe');?>
            </a>
		    <?php
	    }
	    else{
		    echo 0;
	    }
	    exit;
    }
}