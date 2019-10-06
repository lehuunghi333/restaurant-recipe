<?php
/**
 * Class for adding Accordion Section Widget
 *
 * @package Acme Themes
 * @subpackage Restaurant Recipe
 * @since 1.0.0
 */
if ( ! class_exists( 'Restaurant_Recipe_Accordion' ) ) {

    class Restaurant_Recipe_Accordion extends WP_Widget {
        /*defaults values for fields*/
        private $defaults = array(
            'unique_id'             => '',
            'title'                 => '',

            'page_id'                       => '',
            'single_page_content_from'      => 'content',
            'single_page_content_number'    => -1,

            'at_all_page_items'     => '',
            'background_options'    => 'gray',

            'content_from'          => 'excerpt',
            'content_number'        => -1
        );

        function __construct() {
            parent::__construct(
                    /*Base ID of your widget*/
                    'restaurant_recipe_accordion',
                    /*Widget name will appear in UI*/
                    esc_html__('AT Accordion Section', 'restaurant-recipe'),
                    /*Widget description*/
                    array(
                            'description' => esc_html__( 'Suitable for FAQ and or other Accordion', 'restaurant-recipe' )
                    )
            );
        }

        /*Widget Backend*/
        public function form( $instance ) {
            $instance               = wp_parse_args( (array) $instance, $this->defaults );
            /*default values*/
            $unique_id              = esc_attr( $instance['unique_id'] );

	        $title                  = esc_attr( $instance['title'] );

	        $page_id                        = absint( $instance[ 'page_id' ] );
	        $single_page_content_from       = esc_attr( $instance['single_page_content_from'] );
	        $single_page_content_number     = intval( $instance['single_page_content_number'] );

	        $at_all_page_items      = $instance['at_all_page_items'];
	        $content_from           = esc_attr( $instance['content_from'] );
	        $content_number         = intval( $instance['content_number'] );
	        $background_options     = esc_attr( $instance['background_options'] );
	        ?>
            <p>
                <label for="<?php echo esc_attr( $this->get_field_id( 'unique_id' ) ); ?>"><?php esc_html_e( 'Section ID', 'restaurant-recipe' ); ?></label>
                <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'unique_id' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'unique_id' ) ); ?>" type="text" value="<?php echo $unique_id; ?>" />
                <br />
                <small><?php esc_html_e('Enter a Unique Section ID. You can use this ID in Menu item for enabling One Page Menu.','restaurant-recipe')?></small>
            </p>
            <p>
                <label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php esc_html_e( 'Title', 'restaurant-recipe' ); ?></label>
                <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo $title; ?>" />
            </p>

            <p>
                <label for="<?php echo $this->get_field_id( 'page_id' ); ?>"><?php esc_html_e( 'Select Page For Contact', 'restaurant-recipe' ); ?>:</label>
                <br />
                <small><?php esc_html_e( 'Select page and its title and excerpt will display in the frontend. No need of subpages.', 'restaurant-recipe' ); ?></small>
		        <?php
		        /* see more here https://codex.wordpress.org/Function_Reference/wp_dropdown_pages*/
		        $args = array(
			        'selected'              => $page_id,
			        'name'                  => $this->get_field_name( 'page_id' ),
			        'id'                    => $this->get_field_id( 'page_id' ),
			        'class'                 => 'widefat',
			        'show_option_none'      => esc_html__('Select Page','restaurant-recipe'),
			        'option_none_value'     => 0 // string
		        );
		        wp_dropdown_pages( $args );
		        ?>
            </p>
            <p>
                <label for="<?php echo $this->get_field_id( 'single_page_content_from' ); ?>"><?php _e( 'Page Content From', 'restaurant-recipe' ); ?>:</label>
                <select class="widefat" id="<?php echo $this->get_field_id( 'single_page_content_from' ); ?>" name="<?php echo $this->get_field_name( 'single_page_content_from' ); ?>">
			        <?php
			        $restaurant_recipe_about_content_from = restaurant_recipe_content_from();
			        foreach ( $restaurant_recipe_about_content_from as $key => $value ) {
				        ?>
                        <option value="<?php echo esc_attr( $key ) ?>" <?php selected( $key, $single_page_content_from ); ?>><?php echo esc_attr( $value ); ?></option>
				        <?php
			        }
			        ?>
                </select>
            </p>
            <p>
                <label for="<?php echo $this->get_field_id( 'single_page_content_number' ); ?>"><?php _e( 'Number of page words in content', 'restaurant-recipe' ); ?>:</label>
                <br/>
                <small>
			        <?php esc_html_e('Please enter -1 to show full content or 0 to show none','restaurant-recipe'); ?>
                </small>
                <input class="widefat" id="<?php echo $this->get_field_id( 'single_page_content_number' ); ?>" name="<?php echo $this->get_field_name( 'single_page_content_number' ); ?>" type="number" value="<?php echo $single_page_content_number; ?>" />
            </p>

            <!--updated code-->
            <label><?php esc_html_e( 'Select Pages', 'restaurant-recipe' ); ?></label>
            <br/>
            <small><?php esc_html_e( 'Add Page, Reorder and Remove', 'restaurant-recipe' ); ?></small>
            <div class="at-repeater">
		        <?php
		        $total_repeater = 0;
		        if  ( is_array($at_all_page_items) && count($at_all_page_items) > 0 ){
			        foreach ($at_all_page_items as $about){
				        $repeater_id  = $this->get_field_id( 'at_all_page_items') .$total_repeater.'page_id';
				        $repeater_name  = $this->get_field_name( 'at_all_page_items' ).'['.$total_repeater.']['.'page_id'.']';
				        ?>
                        <div class="repeater-table">
                            <div class="at-repeater-top">
                                <div class="at-repeater-title-action">
                                    <button type="button" class="at-repeater-action">
                                        <span class="at-toggle-indicator" aria-hidden="true"></span>
                                    </button>
                                </div>
                                <div class="at-repeater-title">
                                    <h3><?php esc_html_e( 'Select Item', 'restaurant-recipe' )?><span class="in-at-repeater-title"></span></h3>
                                </div>
                            </div>
                            <div class='at-repeater-inside hidden'>
						        <?php
						        /* see more here https://codex.wordpress.org/Function_Reference/wp_dropdown_pages*/
						        $args = array(
							        'selected'          => $about['page_id'],
							        'name'              => $repeater_name,
							        'id'                => $repeater_id,
							        'class'             => 'widefat at-select',
							        'show_option_none'  => esc_html__( 'Select Page', 'restaurant-recipe'),
							        'option_none_value' => 0 // string
						        );
						        wp_dropdown_pages( $args );
						        ?>
                                <div class="at-repeater-control-actions">
                                    <button type="button" class="button-link button-link-delete at-repeater-remove"><?php esc_html_e('Remove','restaurant-recipe');?></button> |
                                    <button type="button" class="button-link at-repeater-close"><?php esc_html_e('Close','restaurant-recipe');?></button>
	                                <?php
	                                if( get_edit_post_link( $about['page_id'] ) ){
		                                ?>
                                        <a class="button button-link at-postid alignright" target="_blank" href="<?php echo esc_url( get_edit_post_link( $about['page_id'] ) ); ?>">
			                                <?php esc_html_e('Full Edit','restaurant-recipe');?>
                                        </a>
		                                <?php
	                                }
	                                ?>
                                </div>
                            </div>
                        </div>
				        <?php
				        $total_repeater = $total_repeater + 1;
			        }
		        }
		        $coder_repeater_depth = 'coderRepeaterDepth_'.'0';
		        $repeater_id  = $this->get_field_id( 'at_all_page_items') .$coder_repeater_depth.'page_id';
		        $repeater_name  = $this->get_field_name( 'at_all_page_items' ).'['.$coder_repeater_depth.']['.'page_id'.']';
		        ?>
                <script type="text/html" class="at-code-for-repeater">
                    <div class="repeater-table">
                        <div class="at-repeater-top">
                            <div class="at-repeater-title-action">
                                <button type="button" class="at-repeater-action">
                                    <span class="at-toggle-indicator" aria-hidden="true"></span>
                                </button>
                            </div>
                            <div class="at-repeater-title">
                                <h3><?php esc_html_e( 'Select Item', 'restaurant-recipe' )?><span class="in-at-repeater-title"></span></h3>
                            </div>
                        </div>
                        <div class='at-repeater-inside hidden'>
					        <?php
					        /* see more here https://codex.wordpress.org/Function_Reference/wp_dropdown_pages*/
					        $args = array(
						        'selected'          => '',
						        'name'              => $repeater_name,
						        'id'                => $repeater_id,
						        'class'             => 'widefat at-select',
						        'show_option_none'  => esc_html__( 'Select Page', 'restaurant-recipe'),
						        'option_none_value' => 0 // string
					        );
					        wp_dropdown_pages( $args );
					        ?>
                            <div class="at-repeater-control-actions">
                                <button type="button" class="button-link button-link-delete at-repeater-remove"><?php esc_html_e('Remove','restaurant-recipe');?></button> |
                                <button type="button" class="button-link at-repeater-close"><?php esc_html_e('Close','restaurant-recipe');?></button>
                            </div>
                        </div>
                    </div>

                </script>
		        <?php
		        /*most imp for repeater*/
		        echo '<input class="at-total-repeater" type="hidden" value="'.$total_repeater.'">';
		        $add_field = esc_html__('Add Item', 'restaurant-recipe');
		        echo '<span class="button-primary at-add-repeater" id="'.$coder_repeater_depth.'">'.$add_field.'</span><br/>';
		        ?>
            </div>
            <!--updated code-->
            <p>
                <label for="<?php echo $this->get_field_id( 'content_from' ); ?>"><?php _e( 'Content From', 'restaurant-recipe' ); ?>:</label>
                <select class="widefat" id="<?php echo $this->get_field_id( 'content_from' ); ?>" name="<?php echo $this->get_field_name( 'content_from' ); ?>">
			        <?php
			        $restaurant_recipe_about_content_from = restaurant_recipe_content_from();
			        foreach ( $restaurant_recipe_about_content_from as $key => $value ) {
				        ?>
                        <option value="<?php echo esc_attr( $key ) ?>" <?php selected( $key, $content_from ); ?>><?php echo esc_attr( $value ); ?></option>
				        <?php
			        }
			        ?>
                </select>
            </p>
            <p>
                <label for="<?php echo $this->get_field_id( 'content_number' ); ?>"><?php _e( 'Number of words in content', 'restaurant-recipe' ); ?>:</label>
                <br/>
                <small>
			        <?php esc_html_e('Please enter -1 to show full content or 0 to show none','restaurant-recipe'); ?>
                </small>
                <input class="widefat" id="<?php echo $this->get_field_id( 'content_number' ); ?>" name="<?php echo $this->get_field_name( 'content_number' ); ?>" type="number" value="<?php echo $content_number; ?>" />
            </p>
            <p>
                <label for="<?php echo esc_attr( $this->get_field_id( 'background_options' ) ); ?>"><?php esc_html_e( 'Background Options', 'restaurant-recipe' ); ?></label>
                <select class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'background_options' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'background_options' ) ); ?>">
			        <?php
			        $restaurant_recipe_background_options = restaurant_recipe_background_options();
			        foreach ( $restaurant_recipe_background_options as $key => $value ) {
				        ?>
                        <option value="<?php echo esc_attr( $key ) ?>" <?php selected( $key, $background_options ); ?>><?php echo esc_attr( $value ); ?></option>
				        <?php
			        }
			        ?>
                </select>
            </p>
            <?php
        }

        /**
         * Function to Updating widget replacing old instances with new
         *
         * @access public
         * @since 1.0
         *
         * @param array $new_instance new arrays value
         * @param array $old_instance old arrays value
         * @return array
         *
         */
        public function update( $new_instance, $old_instance ) {
            $instance = $old_instance;
            $instance['unique_id']    = sanitize_key( $new_instance['unique_id'] );

	        $instance['title']        = sanitize_text_field( $new_instance['title'] );

	        $instance[ 'page_id' ]              = restaurant_recipe_sanitize_page( $new_instance[ 'page_id' ] );

	        $restaurant_recipe_about_content_from           = restaurant_recipe_content_from();
	        $instance['single_page_content_from']       = restaurant_recipe_sanitize_choice_options( $new_instance['single_page_content_from'], $restaurant_recipe_about_content_from, 'content' );

	        $instance['single_page_content_number']   = intval( $new_instance['single_page_content_number'] );

	        /*updated code*/
	        $page_ids = array();
	        if( isset($new_instance['at_all_page_items'] )){
		        $at_all_page_items    = $new_instance['at_all_page_items'];
		        if  ( is_array($at_all_page_items) && count($at_all_page_items) > 0 ){
			        foreach ($at_all_page_items as $key=>$about ){
				        $page_ids[$key]['page_id'] = restaurant_recipe_sanitize_page( $about['page_id'] );
			        }
		        }
	        }
	        $instance['at_all_page_items'] = $page_ids;

	        $restaurant_recipe_about_content_from   = restaurant_recipe_content_from();
	        $instance['content_from']           = restaurant_recipe_sanitize_choice_options( $new_instance['content_from'], $restaurant_recipe_about_content_from, 'excerpt' );

	        $instance['content_number']   = intval( $new_instance['content_number'] );

	        $restaurant_recipe_widget_background_options   = restaurant_recipe_background_options();
	        $instance['background_options']       = restaurant_recipe_sanitize_choice_options( $new_instance['background_options'], $restaurant_recipe_widget_background_options, 'default' );

	        return $instance;
        }

        /**
         * Function to Creating widget front-end. This is where the action happens
         *
         * @access public
         * @since 1.0
         *
         * @param array $args widget setting
         * @param array $instance saved values
         * @return void
         *
         */
        public function widget($args, $instance) {
            $instance = wp_parse_args( (array) $instance, $this->defaults);

            /*default values*/
            $unique_id          = !empty( $instance['unique_id'] ) ? esc_attr( $instance['unique_id'] ) : esc_attr( $this->id );

	        $title              = apply_filters( 'widget_title', !empty( $instance['title'] ) ? $instance['title'] : '', $instance, $this->id_base );

	        $page_id                    = absint( $instance[ 'page_id' ] );
	        $single_page_content_from   = esc_attr( $instance['single_page_content_from'] );
	        $single_page_content_number = intval( $instance['single_page_content_number'] );

	        $at_all_page_items  = $instance['at_all_page_items'];
	        $content_from       = esc_attr( $instance['content_from'] );
	        $content_number     = intval( $instance['content_number'] );
	        $background_options = esc_attr( $instance['background_options'] );
	        $bg_gray_class      = $background_options == 'gray'?'at-gray-bg':'';

	        $animation = "init-animate zoomIn";
	        echo $args['before_widget'];
            ?>
            <section id="<?php echo esc_attr( $unique_id );?>" class="at-widgets acme-accordions <?php echo $bg_gray_class;?>">
                <div class="container">
	           
                    <div class="row">
                        <?php
                        if( ! empty( $title )  ){
                            echo "<div class='at-widget-title-wrapper'>";
	                        echo $args['before_title'] . esc_html( $title ) . $args['after_title'];
	                        echo "</div>";
                        }

                        $next_col= 'col-sm-12';
                        if( !empty ( $page_id ) ) :
	                        $restaurant_recipe_post_in_page_args = array(
		                        'page_id'             => $page_id,
		                        'posts_per_page'      => 1,
		                        'post_type'           => 'page',
		                        'no_found_rows'       => true,
		                        'post_status'         => 'publish'
	                        );
	                        $contact_page_query = new WP_Query( $restaurant_recipe_post_in_page_args );
	                        /*The Loop*/
	                        if ( $contact_page_query->have_posts() ):
		                        while( $contact_page_query->have_posts() ):$contact_page_query->the_post();
			                        ?>
                                    <div class="col-sm-6  <?php echo $animation; ?>">
                                        <div class="accordions-page-content">
					                        <?php
					                        the_title( '<h3 class="entry-title">', '</h3>' );
					                        if( 0 != $single_page_content_number ){
						                        restaurant_recipe_advanced_content( $single_page_content_number, $single_page_content_from );
					                        }
					                        ?>
                                        </div>
                                    </div>
		                        <?php
		                        endwhile;
		                        $next_col = "col-sm-6";
	                        endif;
	                        wp_reset_postdata();
                        endif;
                        ?>
                        <div class="<?php echo $next_col;?>">

                            <div class="accordion-content">
	                            <?php
	                            $post_in = array();
	                            if  ( is_array($at_all_page_items) && count($at_all_page_items) > 0 ){
		                            foreach ( $at_all_page_items as $about ){
			                            if( isset( $about['page_id'] ) && !empty( $about['page_id'] ) ){
				                            $post_in[] = $about['page_id'];
			                            }
		                            }
	                            }
	                            if( !empty ( $post_in ) && is_array( $post_in ) ) :
		                            $restaurant_recipe_post_in_page_args = array(
			                            'post__in'          => $post_in,
			                            'orderby'           => 'post__in',
			                            'posts_per_page'    => count( $post_in ),
			                            'post_type'         => 'page',
			                            'no_found_rows'     => true,
			                            'post_status'       => 'publish'
		                            );
		                            $accordion_query = new WP_Query( $restaurant_recipe_post_in_page_args );
		                            /*The Loop*/
		                            if ( $accordion_query->have_posts() ):
                                        $i=1;
                                        $active = 'active';
			                            while( $accordion_query->have_posts() ):$accordion_query->the_post();
				                            $accordion_icon = $i!=1?'fa-plus':'fa-minus'
				                            ?>
                                            <div class="accordion-item <?php echo esc_attr( $animation );?>">
					                            <?php
                                                if( $i != 1 ){
                                                    $active = '';
                                                }
                                                the_title( sprintf( '<h3 class="accordion-title '.$active.'"><a href="%s" rel="bookmark"><i class="accordion-icon fa '.$accordion_icon.'"></i>', esc_url( get_permalink() ) ), '</a></h3>' );
	                                            if( 0 != $content_number ){
		                                            ?>
                                                    <div class="accordion-details">
                                                        <?php
                                                        restaurant_recipe_advanced_content( $content_number, $content_from );
                                                        ?>
                                                    </div>
		                                            <?php
	                                            }
	                                            ?>
                                            </div>
				                            <?php
                                        $i++;
			                            endwhile;
		                            endif;
		                            wp_reset_postdata();
	                            endif;
	                            ?>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <?php
            echo $args['after_widget'];
        }
    } // Class Restaurant_Recipe_Accordion ends here
}