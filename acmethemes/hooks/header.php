<?php
/**
 * Setting global variables for all theme options saved values
 *
 * @since Restaurant Recipe 1.0.0
 *
 * @param null
 * @return void
 *
 */
if ( ! function_exists( 'restaurant_recipe_set_global' ) ) :
    function restaurant_recipe_set_global() {
        /*Getting saved values start*/
        $restaurant_recipe_saved_theme_options = restaurant_recipe_get_theme_options();
        $GLOBALS['restaurant_recipe_customizer_all_values'] = $restaurant_recipe_saved_theme_options;
        /*Getting saved values end*/
    }
endif;
add_action( 'restaurant_recipe_action_before_head', 'restaurant_recipe_set_global', 0 );

/**
 * Doctype Declaration
 *
 * @since Restaurant Recipe 1.0.0
 *
 * @param null
 * @return void
 *
 */
if ( ! function_exists( 'restaurant_recipe_doctype' ) ) :
    function restaurant_recipe_doctype() {
        ?><!DOCTYPE html><html <?php language_attributes(); ?>>
        <?php
    }
endif;
add_action( 'restaurant_recipe_action_before_head', 'restaurant_recipe_doctype', 10 );

/**
 * Code inside head tage but before wp_head funtion
 *
 * @since Restaurant Recipe 1.0.0
 *
 * @param null
 * @return void
 *
 */
if ( ! function_exists( 'restaurant_recipe_before_wp_head' ) ) :

    function restaurant_recipe_before_wp_head() {
        ?>
        <meta charset="<?php bloginfo( 'charset' ); ?>">
         <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
        <link rel="profile" href="//gmpg.org/xfn/11">
        <?php
    }
endif;
add_action( 'restaurant_recipe_action_before_wp_head', 'restaurant_recipe_before_wp_head', 10 );

/**
 * Add body class
 *
 * @since Restaurant Recipe 1.0.0
 *
 * @param null
 * @return array
 *
 */
if ( ! function_exists( 'restaurant_recipe_body_class' ) ) :

    function restaurant_recipe_body_class( $restaurant_recipe_body_classes ) {

        global $restaurant_recipe_customizer_all_values;
        $restaurant_recipe_enable_animation = $restaurant_recipe_customizer_all_values['restaurant-recipe-enable-animation'];

        $restaurant_recipe_menu_display_position = $restaurant_recipe_customizer_all_values['restaurant-recipe-menu-display-options'];
        $restaurant_recipe_body_classes[] = esc_attr( $restaurant_recipe_menu_display_position );

        $restaurant_recipe_enable_header_top = $restaurant_recipe_customizer_all_values['restaurant-recipe-enable-header-top'];
        /*wow animation*/
        if( 1 != $restaurant_recipe_enable_animation ){
            $restaurant_recipe_body_classes[] = 'acme-animate';
        }
        $restaurant_recipe_body_classes[] = restaurant_recipe_sidebar_selection();

        $restaurant_recipe_enable_feature = $restaurant_recipe_customizer_all_values['restaurant-recipe-enable-feature'];

        if( 1 == $restaurant_recipe_enable_header_top  ){
             $restaurant_recipe_body_classes[] = 'header-enable-top';
        }
    
        if ( 1 != $restaurant_recipe_enable_feature && is_front_page()){
            $restaurant_recipe_body_classes[] = 'at-front-no-feature';
        }
        return $restaurant_recipe_body_classes;
    }
endif;
add_action( 'body_class', 'restaurant_recipe_body_class', 10, 1 );

/**
 * Start site div
 *
 * @since Restaurant Recipe 1.0.0
 *
 * @param null
 * @return null
 *
 */
if ( ! function_exists( 'restaurant_recipe_site_start' ) ) :

    function restaurant_recipe_site_start() {
        ?>
        <div class="site" id="page">
        <?php
    }
endif;
add_action( 'restaurant_recipe_action_before', 'restaurant_recipe_site_start', 20 );

/**
 * Skip to content
 *
 * @since Restaurant Recipe 1.0.0
 *
 * @param null
 * @return void
 *
 */
if ( ! function_exists( 'restaurant_recipe_skip_to_content' ) ) :

    function restaurant_recipe_skip_to_content() {
        ?>
        <a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'restaurant-recipe' ); ?></a>
        <?php
    }
endif;
add_action( 'restaurant_recipe_action_before_header', 'restaurant_recipe_skip_to_content', 10 );

/**
 * Main header
 *
 * @since Restaurant Recipe 1.0.0
 *
 * @param null
 * @return void
 *
 */
if ( ! function_exists( 'restaurant_recipe_header' ) ) :
    function restaurant_recipe_header() {
        global $restaurant_recipe_customizer_all_values;
        $restaurant_recipe_enable_header_top = $restaurant_recipe_customizer_all_values['restaurant-recipe-enable-header-top'];
	    $restaurant_recipe_nav_class = '';
	    $restaurant_recipe_enable_sticky = $restaurant_recipe_customizer_all_values['restaurant-recipe-enable-sticky'];
	    if( 1 == $restaurant_recipe_enable_sticky ){
		    $restaurant_recipe_nav_class .= ' restaurant-recipe-sticky';
	    }
    
        if( 1 == $restaurant_recipe_enable_header_top ){
            ?>
            <div class="top-header">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-6 text-left">
                            <?php
                                $restaurant_recipe_header_top_menu_display_selection = $restaurant_recipe_customizer_all_values['restaurant-recipe-header-top-menu-display-selection'];
                                $restaurant_recipe_header_top_info_display_selection = $restaurant_recipe_customizer_all_values['restaurant-recipe-header-top-info-display-selection'];
                                $restaurant_recipe_header_top_social_display_selection = $restaurant_recipe_customizer_all_values['restaurant-recipe-header-top-social-display-selection'];

                                if( 'left' == $restaurant_recipe_header_top_menu_display_selection ){
                                    do_action('restaurant_recipe_action_top_menu');
                                }
                                if( 'left' == $restaurant_recipe_header_top_social_display_selection ){
                                    do_action('restaurant_recipe_action_social_links');
                                }
                                if( 'left' == $restaurant_recipe_header_top_info_display_selection ){
                                    do_action('restaurant_recipe_action_feature_info');
                                }
                            ?>
                        </div>
                        <div class="col-sm-6 text-right">
                            <?php
                                if( 'right' == $restaurant_recipe_header_top_menu_display_selection ){
                                    do_action('restaurant_recipe_action_top_menu');
                                }
                                if( 'right' == $restaurant_recipe_header_top_social_display_selection ){
                                    do_action('restaurant_recipe_action_social_links');
                                }
                                if( 'right' == $restaurant_recipe_header_top_info_display_selection ){
                                    do_action('restaurant_recipe_action_feature_info');
                                }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
            <?php
        }
        ?>
        <div class="navbar at-navbar <?php echo  $restaurant_recipe_nav_class;?>" id="navbar" role="navigation">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse"><i class="fa fa-bars"></i></button>
                    <?php
                    $restaurant_recipe_display_site_logo = $restaurant_recipe_customizer_all_values['restaurant-recipe-display-site-logo'];
	                $restaurant_recipe_display_site_title = $restaurant_recipe_customizer_all_values['restaurant-recipe-display-site-title'];
	                $restaurant_recipe_display_site_tagline = $restaurant_recipe_customizer_all_values['restaurant-recipe-display-site-tagline'];
	                
                    if( 1== $restaurant_recipe_display_site_logo || 1 == $restaurant_recipe_display_site_title || 1 == $restaurant_recipe_display_site_tagline ):
                        if ( 1 == $restaurant_recipe_display_site_logo && function_exists( 'the_custom_logo' ) ):
                            the_custom_logo();
                        endif;
                        if ( 1== $restaurant_recipe_display_site_title  ):
                            if ( is_front_page() && is_home() ) : ?>
                                <h1 class="site-title">
                                    <a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a>
                                </h1>
                            <?php else : ?>
                                <p class="site-title">
                                    <a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a>
                                </p>
                            <?php endif;
                        endif;
                        if ( 1== $restaurant_recipe_display_site_tagline  ):
                            $description = get_bloginfo( 'description', 'display' );
                            if ( $description || is_customize_preview() ) : ?>
                                <p class="site-description"><?php echo esc_html( $description ); ?></p>
                            <?php endif;
                        endif;
                    endif;
                    ?>
                </div>
                <div class="at-beside-navbar-header">
	                <?php
	                 restaurant_recipe_primary_menu();
	                ?>
                </div>
                <!--.at-beside-navbar-header-->
            </div>
        </div>
        <?php
    }
endif;
add_action( 'restaurant_recipe_action_header', 'restaurant_recipe_header', 10 );