<?php
/**
 * Class for adding Gallery Section Widget
 *
 * @package Acme Themes
 * @subpackage Restaurant Recipe
 * @since 1.0.0
 */
if ( ! class_exists( 'Restaurant_Recipe_Gallery' ) ) {

    class Restaurant_Recipe_Gallery extends WP_Widget {
        /*defaults values for fields*/
        private $defaults = array(
            'unique_id'                 => '',
            'title'                     => '',
            'at_all_page_items'         => '',
            'column_number'             => 4,
            'restaurant_recipe_img_size'    => 'large',
            'image_popup_type'          => 'gallery'
        );

        function __construct() {
            parent::__construct(
                    /*Base ID of your widget*/
                    'restaurant_recipe_gallery',
                    /*Widget name will appear in UI*/
                    esc_html__('AT Gallery Section', 'restaurant-recipe'),
                    /*Widget description*/
                    array(
                            'description' => esc_html__( 'Show Gallery Section.', 'restaurant-recipe' )
                    )
            );
        }

        /*Widget Backend*/
        public function form( $instance ) {
            $instance               = wp_parse_args( (array) $instance, $this->defaults );
            /*default values*/
            $unique_id              = esc_attr( $instance[ 'unique_id' ] );
            $title                  = esc_attr( $instance[ 'title' ] );
	        $at_all_page_items      = $instance['at_all_page_items'];
	        $column_number          = absint( $instance[ 'column_number' ] );
	        $restaurant_recipe_img_size = esc_attr( $instance['restaurant_recipe_img_size'] );
	        $image_popup_type       = esc_attr( $instance[ 'image_popup_type' ] );
	        ?>
            <p>
                <label for="<?php echo $this->get_field_id( 'unique_id' ); ?>"><?php esc_html_e( 'Section ID', 'restaurant-recipe' ); ?></label>
                <input class="widefat" id="<?php echo $this->get_field_id( 'unique_id' ); ?>" name="<?php echo $this->get_field_name( 'unique_id' ); ?>" type="text" value="<?php echo $unique_id; ?>" />
                <br />
                <small><?php esc_html_e('Enter a Unique Section ID. You can use this ID in Menu item for enabling One Page Menu.','restaurant-recipe')?></small>
            </p>
            <p>
                <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php esc_html_e( 'Title', 'restaurant-recipe' ); ?></label>
                <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo $title; ?>" />
            </p>
            <!--updated code-->
            <label><?php esc_html_e( 'Select Pages', 'restaurant-recipe' ); ?></label>
            <br/>
            <small><?php esc_html_e( 'Add Page, Reorder and Remove. Please do not forget to add Featured Image on selected pages. ', 'restaurant-recipe' ); ?></small>
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
							        'option_none_value' => 0, // string
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
                <label for="<?php echo $this->get_field_id( 'column_number' ); ?>"><?php esc_html_e( 'Column Number', 'restaurant-recipe' ); ?></label>
                <select class="widefat" id="<?php echo $this->get_field_id( 'column_number' ); ?>" name="<?php echo $this->get_field_name( 'column_number' ); ?>" >
                    <?php
                    $restaurant_recipe_widget_column_numbers = restaurant_recipe_widget_column_number();
                    foreach ( $restaurant_recipe_widget_column_numbers as $key => $value ){
                        ?>
                        <option value="<?php echo esc_attr( $key )?>" <?php selected( $key, $column_number ); ?>><?php echo esc_attr( $value );?></option>
                        <?php
                    }
                    ?>
                </select>
            </p>
            <p>
                <label for="<?php echo $this->get_field_id( 'image_popup_type' ); ?>"><?php esc_html_e( 'Image Popup Type', 'restaurant-recipe' ); ?></label>
                <select class="widefat" id="<?php echo $this->get_field_id( 'image_popup_type' ); ?>" name="<?php echo $this->get_field_name( 'image_popup_type' ); ?>" >
                    <?php
                    $restaurant_recipe_gallery_image_popup = restaurant_recipe_gallery_image_popup();
                    foreach ( $restaurant_recipe_gallery_image_popup as $key => $value ){
                        ?>
                        <option value="<?php echo esc_attr( $key )?>" <?php selected( $key, $image_popup_type ); ?>><?php echo esc_attr( $value );?></option>
                        <?php
                    }
                    ?>
                </select>
            </p>
            <p>
                <label for="<?php echo esc_attr( $this->get_field_id( 'restaurant_recipe_img_size' ) ); ?>">
			        <?php esc_html_e( 'Normal Featured Post Image', 'restaurant-recipe' ); ?>
                </label>
                <select class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'restaurant_recipe_img_size' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'restaurant_recipe_img_size' ) ); ?>">
			        <?php
			        $restaurant_recipe_image_sizes = restaurant_recipe_get_image_sizes_options();
			        foreach( $restaurant_recipe_image_sizes as $key => $restaurant_recipe_column_array ){
				        echo ' <option value="'.esc_attr( $key ).'" '.selected( $restaurant_recipe_img_size, $key, 0). '>'.esc_attr( $restaurant_recipe_column_array ).'</option>';
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
         * @since 1.0.0
         *
         * @param array $new_instance new arrays value
         * @param array $old_instance old arrays value
         * @return array
         *
         */
        public function update( $new_instance, $old_instance ) {
            $instance = $old_instance;
            $instance[ 'unique_id' ]    = sanitize_key( $new_instance[ 'unique_id' ] );
            $instance[ 'title' ]        = sanitize_text_field( $new_instance[ 'title' ] );

	        /*updated code*/
	        $page_ids = array();
	        if( isset($new_instance['at_all_page_items'] )){
		        $at_all_page_items      = $new_instance['at_all_page_items'];
		        if  ( is_array($at_all_page_items) && count($at_all_page_items) > 0 ){
			        foreach ($at_all_page_items as $key=>$about ){
				        $page_ids[$key]['page_id'] = restaurant_recipe_sanitize_page( $about['page_id'] );
			        }
		        }
	        }
	        $instance['at_all_page_items'] = $page_ids;

	        $restaurant_recipe_widget_column_number     = restaurant_recipe_widget_column_number();
	        $instance[ 'column_number' ]            = restaurant_recipe_sanitize_choice_options( $new_instance[ 'column_number' ], $restaurant_recipe_widget_column_number, 4 );

	        $restaurant_recipe_image_sizes              = restaurant_recipe_get_image_sizes_options();
	        $instance[ 'restaurant_recipe_img_size' ]   = restaurant_recipe_sanitize_choice_options( $new_instance[ 'restaurant_recipe_img_size' ], $restaurant_recipe_image_sizes, 'large' );

	        $restaurant_recipe_gallery_image_popup      = restaurant_recipe_gallery_image_popup();
	        $instance[ 'image_popup_type' ]         = restaurant_recipe_sanitize_choice_options( $new_instance[ 'image_popup_type' ], $restaurant_recipe_gallery_image_popup, 'gallery' );

            return $instance;
        }

        /**
         * Function to Creating widget front-end. This is where the action happens
         *
         * @access public
         * @since 1.0.0
         *
         * @param array $args widget setting
         * @param array $instance saved values
         * @return void
         *
         */
        public function widget($args, $instance) {
            $instance               = wp_parse_args( (array) $instance, $this->defaults);

            /*default values*/
            $unique_id              = !empty( $instance[ 'unique_id' ] ) ? esc_attr( $instance[ 'unique_id' ] ) : esc_attr( $this->id );
            $title                  = apply_filters( 'widget_title', !empty( $instance['title'] ) ? $instance['title'] : '', $instance, $this->id_base );

	        $at_all_page_items      = $instance['at_all_page_items'];
            $column_number          = absint( $instance[ 'column_number' ] );
	        $restaurant_recipe_img_size = esc_attr( $instance['restaurant_recipe_img_size'] );
	        $image_popup_type       = esc_attr( $instance[ 'image_popup_type' ] );

	        $animation = "init-animate zoomIn";
	        echo $args['before_widget'];
            ?>
            <section id="<?php echo $unique_id;?>" class="at-widgets acme-gallery">
                <div class="full-width-container">
                    <?php
                    if( ! empty( $title ) ){
                        echo "<div class='at-widget-title-wrapper'>";
	                    echo $args['before_title'] . esc_html( $title ) . $args['after_title'];
	                    echo "</div>";
                    }

                    $post_in = array();
                    if  ( is_array($at_all_page_items) && count($at_all_page_items) > 0 ){
	                    foreach ( $at_all_page_items as $about ){
		                    if( isset( $about['page_id'] ) && !empty( $about['page_id'] ) ){
			                    $post_in[] = $about['page_id'];
		                    }
	                    }
                    }
                    if( !empty ( $post_in ) && is_array( $post_in )) :
	                    $restaurant_recipe_post_in_page_args = array(
		                    'post__in'          => $post_in,
		                    'orderby'           => 'post__in',
		                    'posts_per_page'    => count( $post_in ),
		                    'post_type'         => 'page',
		                    'no_found_rows'     => true,
		                    'post_status'       => 'publish'
	                    );
	                    $gallery_query = new WP_Query( $restaurant_recipe_post_in_page_args );
                        ?>
                        <div class="row fullwidth-row">
                            <?php
                            if ( $gallery_query->have_posts() ):
                                $i = 1;
                                while( $gallery_query->have_posts() ):$gallery_query->the_post();
	                                if( 1 == $column_number ){
		                                $restaurant_recipe_column = " col-xs-12";
	                                }
                                    elseif( 2 == $column_number ){
		                                $restaurant_recipe_column = " col-sm-6";
	                                }
                                    elseif( 3 == $column_number ){
		                                $restaurant_recipe_column = " col-sm-4 col-md-4";
	                                }
                                    elseif( 4 == $column_number ){
		                                $restaurant_recipe_column = ' col-sm-3 col-md-3';
	                                }
	                                else{
		                                $restaurant_recipe_column = " col-sm-3 col-md-3";
	                                }
                                    ?>
                                    <div class="at-gallery-item <?php echo esc_attr( $restaurant_recipe_column ); ?>">
                                        <div class="gallery-inner-item <?php echo esc_attr( $animation );?>">
                                            <div class="at-bottom-lower">
                                                <h3>
	                                                <?php
	                                                echo '<a href="'.esc_url(get_permalink()).'" class="all-link">';
	                                                the_title();
	                                                echo '</a>';
	                                                ?>
                                                </h3>
                                                <?php
                                                if( 'disable' != $image_popup_type ){
	                                                if( 'gallery' == $image_popup_type ){
		                                                $image_popup_class = 'image-gallery-widget';
	                                                }
	                                                else{
		                                                $image_popup_class = 'single-image-widget';
	                                                }
	                                                $image_url_full = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full' );
	                                                ?>
                                                    <a class="<?php echo esc_attr( $image_popup_class );?>" href="<?php echo esc_url( $image_url_full[0] );?>">
                                                        <i class="fa fa-search gallery-button primary-bg"></i>
                                                    </a>
	                                                <?php
                                                }
                                                ?>
                                            </div>
                                            <div class="at-gallery-hover"></div>
	                                        <?php
                                            if( has_post_thumbnail() ):
                                                $image_url = wp_get_attachment_image_src( get_post_thumbnail_id(), $restaurant_recipe_img_size );
                                            else:
                                                $image_url[0] = get_template_directory_uri().'/assets/img/default-image.jpg';
                                            endif;
	                                        echo '<a href="'.esc_url(get_permalink()).'" class="all-link">';
	                                        ?>
                                            <img src="<?php echo esc_url( $image_url[0] ); ?>" alt="<?php the_title_attribute(); ?>" title="<?php the_title_attribute(); ?>" />
                                            <?php
                                            echo '</a>';
                                            ?>
                                        </div>
                                    </div>
                                    <?php
                                    $i++;
                                endwhile;
                            endif;
                            wp_reset_postdata();
                            ?>
                        </div><!--row-->
	                    <?php
                    endif;
                    ?>
                </div>
            </section>
            <?php
            echo $args['after_widget'];
        }
    } // Class Restaurant_Recipe_Gallery ends here
}