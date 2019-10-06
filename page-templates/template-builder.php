<?php
/**
 * Template Name: AT Builder Page
 *
 * @link https://developer.wordpress.org/themes/template-files-section/page-template-files/
 *
 * @package Acme Themes
 * @subpackage Restaurant Recipe
 */
get_header();
global $restaurant_recipe_customizer_all_values;
$restaurant_recipe_template_builder_header_options_meta = get_post_meta( $post->ID, 'restaurant_recipe_template_builder_header_options', true );

if(
	'hide-header' != $restaurant_recipe_template_builder_header_options_meta
){
	?>
	<div class="wrapper inner-main-title">
		<?php
		echo restaurant_recipe_get_header_normal_image();
		?>
		<div class="container">
			<header class="entry-header init-animate">
				<?php
				the_title( '<h1 class="entry-title">', '</h1>' );

				restaurant_recipe_breadcrumbs();
				?>
			</header><!-- .entry-header -->
		</div>
	</div>
	<?php
}

while ( have_posts() ) : the_post();

    the_content();

endwhile; // End of the loop.

get_footer();