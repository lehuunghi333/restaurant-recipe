<?php
/**
 * Display Feature Columns
 * @since Restaurant Recipe 1.0.0
 *
 * @return void
 *
 */
if ( !function_exists('restaurant_recipe_feature_info') ) :
	function restaurant_recipe_feature_info() {
		global $restaurant_recipe_customizer_all_values;
		$restaurant_recipe_feature_info_number = $restaurant_recipe_customizer_all_values['restaurant-recipe-feature-info-number'];
		echo '<div class="info-icon-box-wrapper">';
		$number = $restaurant_recipe_feature_info_number;

		$restaurant_recipe_basic_info_data = array();

		$restaurant_recipe_first_info_icon = $restaurant_recipe_customizer_all_values['restaurant-recipe-first-info-icon'] ;
		$restaurant_recipe_first_info_title = $restaurant_recipe_customizer_all_values['restaurant-recipe-first-info-title'];
		$restaurant_recipe_first_info_desc = $restaurant_recipe_customizer_all_values['restaurant-recipe-first-info-desc'];
		$restaurant_recipe_basic_info_data[] = array(
			"icon"  => $restaurant_recipe_first_info_icon,
			"title" => $restaurant_recipe_first_info_title,
			"desc"  => $restaurant_recipe_first_info_desc
		);

		$restaurant_recipe_second_info_icon = $restaurant_recipe_customizer_all_values['restaurant-recipe-second-info-icon'] ;
		$restaurant_recipe_second_info_title = $restaurant_recipe_customizer_all_values['restaurant-recipe-second-info-title'];
		$restaurant_recipe_second_info_desc = $restaurant_recipe_customizer_all_values['restaurant-recipe-second-info-desc'];
		$restaurant_recipe_basic_info_data[] = array(
			"icon"  => $restaurant_recipe_second_info_icon,
			"title" => $restaurant_recipe_second_info_title,
			"desc"  => $restaurant_recipe_second_info_desc
		);

		$restaurant_recipe_third_info_icon = $restaurant_recipe_customizer_all_values['restaurant-recipe-third-info-icon'] ;
		$restaurant_recipe_third_info_title = $restaurant_recipe_customizer_all_values['restaurant-recipe-third-info-title'];
		$restaurant_recipe_third_info_desc = $restaurant_recipe_customizer_all_values['restaurant-recipe-third-info-desc'];
		$restaurant_recipe_basic_info_data[] = array(
			"icon"  => $restaurant_recipe_third_info_icon,
			"title" => $restaurant_recipe_third_info_title,
			"desc"  => $restaurant_recipe_third_info_desc
		);

		$restaurant_recipe_forth_info_icon = $restaurant_recipe_customizer_all_values['restaurant-recipe-forth-info-icon'] ;
		$restaurant_recipe_forth_info_title = $restaurant_recipe_customizer_all_values['restaurant-recipe-forth-info-title'];
		$restaurant_recipe_forth_info_desc = $restaurant_recipe_customizer_all_values['restaurant-recipe-forth-info-desc'];
		$restaurant_recipe_basic_info_data[] = array(
			"icon"  => $restaurant_recipe_forth_info_icon,
			"title" => $restaurant_recipe_forth_info_title,
			"desc"  => $restaurant_recipe_forth_info_desc
		);

		$col = " init-animate zoomIn";

		$i=0;
		foreach ( $restaurant_recipe_basic_info_data as $base_basic_info_data) {
			if( $i >= $number ){
				break;
			}
			?>
            <div class="info-icon-box <?php echo $col;?>">
				<?php
				if( !empty( $base_basic_info_data['icon'])){
					?>
                    <div class="info-icon">
                        <i class="fa <?php echo esc_attr( $base_basic_info_data['icon'] );?>"></i>
                    </div>
					<?php
				}
				if( !empty( $base_basic_info_data['title']) || !empty( $base_basic_info_data['desc']) ){
					?>
                    <div class="info-icon-details">
						<?php
						if( !empty( $base_basic_info_data['title']) ){
							echo '<h6 class="icon-title">'.esc_html( $base_basic_info_data['title'] ).'</h6>';
						}
						if( !empty( $base_basic_info_data['desc']) ){
							echo '<span class="icon-desc">'.wp_kses_post( $base_basic_info_data['desc'] ).'</span>';
						}
						?>
                    </div>
					<?php
				}
				?>
            </div>
			<?php
			$i++;
		}
		echo "</div>";/*.infowrapper*/
	}
endif;
add_action( 'restaurant_recipe_action_feature_info', 'restaurant_recipe_feature_info', 20 );