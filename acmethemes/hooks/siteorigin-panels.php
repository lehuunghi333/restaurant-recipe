<?php
/**
 * Adds Restaurant Recipe Theme Widgets in SiteOrigin Pagebuilder Tabs
 *
 * @since Restaurant Recipe 1.0.0
 *
 * @param null
 * @return null
 *
 */
function restaurant_recipe_siteorigin_widgets($widgets) {
    $theme_widgets = array(
        'Restaurant_Recipe_About',
        'Restaurant_Recipe_Accordion',
        'Restaurant_Recipe_Posts_Col',
        'Restaurant_Recipe_Contact',
	    'Restaurant_Recipe_Gallery',
	    'Restaurant_Recipe_Feature',
	    'Restaurant_Recipe_Food_Menu',
	    'Restaurant_Recipe_Service',
        'Restaurant_Recipe_Team',
        'Restaurant_Recipe_Testimonial',
    );
    foreach($theme_widgets as $theme_widget) {
        if( isset( $widgets[$theme_widget] ) ) {
            $widgets[$theme_widget]['groups'] = array('restaurant-recipe');
            $widgets[$theme_widget]['icon']   = 'dashicons dashicons-screenoptions';
        }
    }
    return $widgets;
}
add_filter('siteorigin_panels_widgets', 'restaurant_recipe_siteorigin_widgets');

/**
 * Add a tab for the theme widgets in the page builder
 *
 * @since Restaurant Recipe 1.0.0
 *
 * @param null
 * @return null
 *
 */
function restaurant_recipe_siteorigin_widgets_tab($tabs){
    $tabs[] = array(
        'title'  => esc_html__('AT Restaurant Recipe Widgets', 'restaurant-recipe'),
        'filter' => array(
            'groups' => array('restaurant-recipe')
        )
    );
    return $tabs;
}
add_filter('siteorigin_panels_widget_dialog_tabs', 'restaurant_recipe_siteorigin_widgets_tab', 20 );