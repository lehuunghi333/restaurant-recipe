<?php
/**
 * Class for adding About Section Widget
 *
 * @package Acme Themes
 * @subpackage Restaurant Recipe
 * @since 1.0.0
 */
if ( ! class_exists( 'Restaurant_Recipe_Food_Menu' ) ) {

	class Restaurant_Recipe_Food_Menu extends WP_Widget {

		/*defaults values for fields*/
		private $defaults = array(
			'unique_id'                     => '',
			'title'                         => '',
			'at_all_food_menu_items'          => '',
			'content_from'          => 'excerpt',
			'content_number'        => -1,
			'column_number'                 => 4,
			'background_options'            => 'default'
		);

		function __construct() {
			parent::__construct(
			        /*Base ID of your widget*/
			        'restaurant_recipe_food_menu',
                    /*Widget name will appear in UI*/
                    esc_html__( 'AT Food Menu Widget', 'restaurant-recipe' ),
                    /*Widget description*/
                    array(
                            'description' => esc_html__( 'Show Food Menu Section beautifully', 'restaurant-recipe' )
                    )
			);
		}

		/*Widget Backend*/
		public function form( $instance ) {
			$instance =                 wp_parse_args( (array) $instance, $this->defaults );
			/*default values*/
			$unique_id                  = esc_attr( $instance['unique_id'] );
			$title                      = esc_attr( $instance['title'] );
			$at_all_food_menu_items       = $instance['at_all_food_menu_items'];
			$content_from           = esc_attr( $instance['content_from'] );
			$content_number         = intval( $instance['content_number'] );
			$column_number              = absint( $instance['column_number'] );
			$background_options         = esc_attr( $instance['background_options'] );
			?>
            <p>
                <label for="<?php echo esc_attr( $this->get_field_id( 'unique_id' ) ); ?>"><?php esc_html_e( 'Section ID', 'restaurant-recipe' ); ?></label>
                <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'unique_id' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'unique_id' ) ); ?>" type="text" value="<?php echo $unique_id; ?>"/>
                <br/>
                <small><?php esc_html_e( 'Enter a Unique Section ID. You can use this ID in Menu item for enabling One Page Menu.', 'restaurant-recipe' ) ?></small>
            </p>
            <p>
                <label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php esc_html_e( 'Title', 'restaurant-recipe' ); ?></label>
                <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo $title; ?>"/>
            </p>
            <!--updated code-->
            <label><?php esc_html_e( 'Add Food Menu Options', 'restaurant-recipe' ); ?></label>
            <br/>
            <small><?php esc_html_e( 'Add Food Menu, Reorder and Remove.', 'restaurant-recipe' ); ?></small>
            <div class="at-repeater">
				<?php
				$total_repeater = 0;
				if  ( is_array($at_all_food_menu_items) && count($at_all_food_menu_items) > 0 ){
					foreach ($at_all_food_menu_items as $price_detail){

						$repeater_price_page_id  = $this->get_field_id( 'at_all_food_menu_items') .$total_repeater.'page_id';
						$repeater_price_page_name  = $this->get_field_name( 'at_all_food_menu_items' ).'['.$total_repeater.']['.'page_id'.']';
						
						$repeater_price_symbol_id  = $this->get_field_id( 'at_all_food_menu_items') .$total_repeater.'price_symbol';
						$repeater_price_symbol_name  = $this->get_field_name( 'at_all_food_menu_items' ).'['.$total_repeater.']['.'price_symbol'.']';

						$repeater_price_id  = $this->get_field_id( 'at_all_food_menu_items') .$total_repeater.'price';
						$repeater_price_name  = $this->get_field_name( 'at_all_food_menu_items' ).'['.$total_repeater.']['.'price'.']';

						$repeater_price_link_id  = $this->get_field_id( 'at_all_food_menu_items') .$total_repeater.'price_link';
						$repeater_price_link_name  = $this->get_field_name( 'at_all_food_menu_items' ).'['.$total_repeater.']['.'price_link'.']';

						?>
                        <div class="repeater-table">
                            <div class="at-repeater-top">
                                <div class="at-repeater-title-action">
                                    <button type="button" class="at-repeater-action">
                                        <span class="at-toggle-indicator" aria-hidden="true"></span>
                                    </button>
                                </div>
                                <div class="at-repeater-title">
                                    <h3><?php esc_html_e( 'Add Food Menu', 'restaurant-recipe' )?><span class="in-at-repeater-title"></span></h3>
                                </div>
                            </div>
                            <div class='at-repeater-inside hidden'>

	                            <?php
	                            /* see more here https://codex.wordpress.org/Function_Reference/wp_dropdown_pages*/
	                            $args = array(
		                            'selected'          => $price_detail['page_id'],
		                            'name'              => $repeater_price_page_name,
		                            'id'                => $repeater_price_page_id,
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
		                            if( get_edit_post_link( $price_detail['page_id'] ) ){
			                            ?>
                                        <a class="button button-link at-postid alignright" target="_blank" href="<?php echo esc_url( get_edit_post_link( $price_detail['page_id'] ) ); ?>">
				                            <?php esc_html_e('Full Edit','restaurant-recipe');?>
                                        </a>
			                            <?php
		                            }
		                            ?>
                                </div>

                                <p>
                                    <label><?php esc_html_e( 'Enter Price Symbol', 'restaurant-recipe' ); ?></label>
                                    <input type="text" class="widefat" name="<?php echo esc_attr( $repeater_price_symbol_name ); ?>" id="<?php echo esc_attr( $repeater_price_symbol_id ); ?>" value="<?php echo esc_attr( $price_detail['price_symbol'] ); ?>" />
                                </p>
                                <p>
                                    <label><?php esc_html_e( 'Enter Price', 'restaurant-recipe' ); ?></label>
                                    <input type="text" class="widefat" name="<?php echo esc_attr( $repeater_price_name ); ?>" id="<?php echo esc_attr( $repeater_price_id ); ?>" value="<?php echo esc_attr( $price_detail['price'] ); ?>" />
                                </p>
                                <p>
                                    <label><?php esc_html_e( 'Enter Food Menu Link', 'restaurant-recipe' ); ?></label>
                                    <input type="url" class="widefat" name="<?php echo esc_attr( $repeater_price_link_name ); ?>" id="<?php echo esc_attr( $repeater_price_link_id ); ?>" value="<?php echo esc_url( $price_detail['price_link'] ); ?>" />
                                </p>

                                <div class="at-repeater-control-actions">
                                    <button type="button" class="button-link button-link-delete at-repeater-remove"><?php esc_html_e('Remove','restaurant-recipe');?></button> |
                                    <button type="button" class="button-link at-repeater-close"><?php esc_html_e('Close','restaurant-recipe');?></button>
                                </div>
                            </div>
                        </div>
						<?php
						$total_repeater = $total_repeater + 1;
					}
				}
				$coder_repeater_depth = 'coderRepeaterDepth_'.'0';

				$repeater_price_page_id  = $this->get_field_id( 'at_all_food_menu_items') .$coder_repeater_depth.'page_id';
				$repeater_price_page_name  = $this->get_field_name( 'at_all_food_menu_items' ).'['.$coder_repeater_depth.']['.'page_id'.']';
				
				$repeater_price_symbol_id  = $this->get_field_id( 'at_all_food_menu_items') .$coder_repeater_depth.'price_symbol';
				$repeater_price_symbol_name  = $this->get_field_name( 'at_all_food_menu_items' ).'['.$coder_repeater_depth.']['.'price_symbol'.']';

				$repeater_price_id  = $this->get_field_id( 'at_all_food_menu_items') .$coder_repeater_depth.'price';
				$repeater_price_name  = $this->get_field_name( 'at_all_food_menu_items' ).'['.$coder_repeater_depth.']['.'price'.']';

				$repeater_price_link_id  = $this->get_field_id( 'at_all_food_menu_items') .$coder_repeater_depth.'price_link';
				$repeater_price_link_name  = $this->get_field_name( 'at_all_food_menu_items' ).'['.$coder_repeater_depth.']['.'price_link'.']';

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
                                <h3><?php esc_html_e( 'Enter Food Menu Details', 'restaurant-recipe' )?><span class="in-at-repeater-title"></span></h3>
                            </div>
                        </div>
                        <div class='at-repeater-inside hidden'>

	                        <?php
	                        /* see more here https://codex.wordpress.org/Function_Reference/wp_dropdown_pages*/
	                        $args = array(
		                        'selected'          => '',
		                        'name'              => $repeater_price_page_name,
		                        'id'                => $repeater_price_page_id,
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

                            <p>
                                <label><?php esc_html_e( 'Enter Price Symbol', 'restaurant-recipe' ); ?></label>
                                <input type="text" class="widefat" name="<?php echo esc_attr( $repeater_price_symbol_name ); ?>" id="<?php echo esc_attr( $repeater_price_symbol_id ); ?>" />
                            </p>
                            <p>
                                <label><?php esc_html_e( 'Enter Price', 'restaurant-recipe' ); ?></label>
                                <input type="text" class="widefat" name="<?php echo esc_attr( $repeater_price_name ); ?>" id="<?php echo esc_attr( $repeater_price_id ); ?>" />
                            </p>
                            <p>
                                <label><?php esc_html_e( 'Enter Food Menu Link', 'restaurant-recipe' ); ?></label>
                                <input type="url" class="widefat" name="<?php echo esc_attr( $repeater_price_link_name ); ?>" id="<?php echo esc_attr( $repeater_price_link_id ); ?>" />
                            </p>

                            <div class="at-repeater-control-actions">
                                <button type="button" class="button-link button-link-delete at-repeater-remove"><?php esc_html_e('Remove','restaurant-recipe');?></button> |
                                <button type="button" class="button-link at-repeater-close"><?php esc_html_e('Close','restaurant-recipe');?></button>
                            </div>
                        </div>
                    </div>

                </script>
				<?php
				/*most imp for repeater*/
				echo '<input class="at-total-repeater" type="hidden" value="'.esc_attr( $total_repeater ).'">';
				$add_field = esc_html__('Add Item', 'restaurant-recipe');
				echo '<span class="button-primary at-add-repeater" id="'.esc_attr( $coder_repeater_depth ).'">'.$add_field.'</span><br/>';
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
                <label for="<?php echo esc_attr( $this->get_field_id( 'column_number' ) ); ?>"><?php esc_html_e( 'Column Number', 'restaurant-recipe' ); ?></label>
                <select class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'column_number' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'column_number' ) ); ?>">
					<?php
					$restaurant_recipe_logo_column_numbers = restaurant_recipe_widget_column_number();
					foreach ( $restaurant_recipe_logo_column_numbers as $key => $value ) {
						?>
                        <option value="<?php echo esc_attr( $key ) ?>" <?php selected( $key, $column_number ); ?>><?php echo esc_attr( $value ); ?></option>
						<?php
					}
					?>
                </select>
            </p>
            <hr /><!--view all link separate-->

            <hr />
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
		 *
		 * @return array
		 *
		 */
		public function update( $new_instance, $old_instance ) {
			$instance                               = $old_instance;
			$instance['unique_id']                  = sanitize_key( $new_instance['unique_id'] );
			$instance[ 'title' ]                    = ( isset( $new_instance['title'] ) ) ? sanitize_text_field( $new_instance['title'] ) : '';
			/*updated code*/
			$at_all_food_menu_items_data = array();
			if( isset($new_instance['at_all_food_menu_items'] )){
				$at_all_food_menu_items               = $new_instance['at_all_food_menu_items'];

				if  ( is_array($at_all_food_menu_items) && count($at_all_food_menu_items) > 0 ){
					foreach ( $at_all_food_menu_items as $boxes => $box ){
						foreach ( $box as $key => $value ){
							$at_all_food_menu_items_data[$boxes][$key] = wp_kses_post( $value );
						}
					}
				}
			}
			$instance[ 'at_all_food_menu_items' ]     = $at_all_food_menu_items_data;
			$instance[ 'column_number' ]            = absint( $new_instance['column_number'] );

			$restaurant_recipe_about_content_from   = restaurant_recipe_content_from();
			$instance['content_from']           = restaurant_recipe_sanitize_choice_options( $new_instance['content_from'], $restaurant_recipe_about_content_from, 'excerpt' );
			$instance['content_number']   = intval( $new_instance['content_number'] );

			$restaurant_recipe_widget_background_options    = restaurant_recipe_background_options();
			$instance[ 'background_options' ]           = restaurant_recipe_sanitize_choice_options( $new_instance[ 'background_options' ], $restaurant_recipe_widget_background_options, 'default' );

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
		 *
		 * @return void
		 *
		 */
		public function widget( $args, $instance ) {
			$instance                   = wp_parse_args( (array) $instance, $this->defaults );
			/*default values*/
			$unique_id                  = ! empty( $instance['unique_id'] ) ? esc_attr( $instance['unique_id'] ) : esc_attr( $this->id );
			$title                      = !empty( $instance['title'] ) ? esc_attr( $instance['title'] ) : '';
			$title                      = apply_filters( 'widget_title', $title, $instance, $this->id_base );
			$at_all_food_menu_items       = $instance['at_all_food_menu_items'];
			$column_number              = absint( $instance['column_number'] );
			$content_from       = esc_attr( $instance['content_from'] );
			$content_number     = intval( $instance['content_number'] );
			$background_options         = esc_attr( $instance['background_options'] );
			$bg_gray_class              = $background_options == 'gray'?'at-gray-bg':'';

			$div_attr = 'class="row featured-entries-col featured-entries-logo"';

            echo $args['before_widget'];

			$animation = "init-animate zoomIn";
			?>
            <section id="<?php echo esc_attr( $unique_id ); ?>" class="at-widgets at-food-menu-widget <?php echo $bg_gray_class;?>">
            	<div class="container">
		            <?php
		            if( ! empty( $title ) ){
			            echo "<div class='at-widget-title-wrapper'>";
			            echo $args['before_title'] . esc_html( $title ) . $args['after_title'];
			            echo "</div>";
		            }
		            ?>
                    <div <?php echo $div_attr;?>>
                        
	                    <?php
	                    $post_in = array();
	                    $menu_other_details = array();
	                    if  ( is_array($at_all_food_menu_items) && count($at_all_food_menu_items) > 0 ){
		                    foreach ( $at_all_food_menu_items as $food_ment_details ){
			                    if( isset(  $food_ment_details['page_id'] ) && !empty( $food_ment_details['page_id'] ) ){
			                        $page_id = $food_ment_details['page_id'];
				                    $post_in[] = $page_id;
				                    $menu_other_details[$page_id]['price_symbol'] = $food_ment_details['price_symbol'];
				                    $menu_other_details[$page_id]['price'] = $food_ment_details['price'];
				                    $menu_other_details[$page_id]['price_link'] = $food_ment_details['price_link'];
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
			                    $restaurant_recipe_featured_index = 1;

			                    while( $accordion_query->have_posts() ):$accordion_query->the_post();
				                    $price_symbol  = $menu_other_details[get_the_ID()]['price_symbol'];
				                    $price  = $menu_other_details[get_the_ID()]['price'];
				                    $price_link  = $menu_other_details[get_the_ID()]['price_link'];
				                    $restaurant_recipe_list_classes = 'single-list ';

				                    if( 1 != $restaurant_recipe_featured_index && $restaurant_recipe_featured_index % $column_number == 1 ){
					                    echo "<div class='clearfix'></div>";
				                    }

				                    if ( 1 == $column_number ) {
					                    $restaurant_recipe_list_classes .= "col-sm-12";
				                    } elseif ( 2 == $column_number ) {
					                    $restaurant_recipe_list_classes .= "col-sm-6";
				                    } elseif ( 3 == $column_number ) {
					                    $restaurant_recipe_list_classes .= "col-sm-4 col-md-4";
				                    } else {
					                    $restaurant_recipe_list_classes .= "col-sm-3 col-md-3";
				                    }
				                    if( !has_post_thumbnail() ){
					                    $restaurant_recipe_list_classes .= " at-price-no-img";
				                    }
				                    ?>
                                    <div class="<?php echo esc_attr( $restaurant_recipe_list_classes ); ?>">
                                        <div class="at-food-menu-box <?php echo $animation; ?>">
						                    <?php
						                    if( !empty( $price_link ) ){
						                    ?>
                                            <a href="<?php echo esc_url( $price_link ); ?>">
							                    <?php
							                    }
							                    if( has_post_thumbnail()){
						                        ?>
                                                    <div class="at-food-menu-img-box">
									                    <?php
                                                        the_post_thumbnail('thumbnail')
									                    ?>
                                                    </div>
                                                    <?php
                                                }
							                    ?>
                                                <div class="at-food-menu-body">
                                                    <div class="at-food-menu-header-wrap">
                                                        <div class="at-food-menu-header">
										                    <?php
										                    the_title('<h3>','</h3>');
										                    if( 0 != $content_number ){
											                    ?>
                                                                <h6>
                                                                    <?php
												                    restaurant_recipe_advanced_content( $content_number, $content_from );
												                    ?>
                                                                </h6>
                                                                <?php
										                    }
										                    ?>

                                                        </div>
                                                        <div class="at-price">
                                                            <h2>
											                    <?php
											                    if( !empty( $price_symbol )){
												                    echo esc_html( $price_symbol );
											                    }
											                    if( !empty( $price )){
												                    echo esc_html( $price );
											                    }

											                    ?>
                                                            </h2>
                                                        </div>

                                                    </div>
                                                </div><!--.at-food-menu-body-->
							                    <?php
							                    if( !empty( $price_link ) ){
							                    ?>
                                            </a>
					                    <?php
					                    }
					                    ?>
                                        </div><!--.at-food-menu-box-->
                                    </div><!--$restaurant_recipe_list_classes-->
				                    <?php
				                    $restaurant_recipe_featured_index++;
			                    endwhile;
		                    endif;
		                    wp_reset_postdata();
	                    endif;
	                    ?>
                    </div>
            	</div>
            </section>
            <?php

			echo $args['after_widget'];
		}
	} // Class Restaurant_Recipe_Food_Menu ends here
}