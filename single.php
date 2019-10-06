<?php
/**
 * The template for displaying all single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Acme Themes
 * @subpackage Restaurant Recipe
 */

get_header();
global $restaurant_recipe_customizer_all_values;

?>
<div class="wrapper inner-main-title">
    <?php
    echo restaurant_recipe_get_header_normal_image();
    ?>
	<div class="container">
		<header class="entry-header init-animate">
			<?php
			$single_header_title = $restaurant_recipe_customizer_all_values['restaurant-recipe-single-header-title'];
			if( !empty( $single_header_title ) ){
			    echo '<h2 class="entry-title">'.esc_html( $single_header_title ).'</h2>';
            }

			restaurant_recipe_breadcrumbs();
			?>
		</header><!-- .entry-header -->
	</div>
</div>
<div id="content" class="site-content container clearfix">
	<?php
	$sidebar_layout = restaurant_recipe_sidebar_selection();
	if( 'both-sidebar' == $sidebar_layout ) {
		echo '<div id="primary-wrap" class="clearfix">';
	}
	?>
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
		<?php
        while ( have_posts() ) : the_post();
		    get_template_part( 'template-parts/content', 'single' ); ?>
            <div class="clearfix"></div>
			<?php
	        if ( is_singular( 'attachment' ) ) {
		        // Parent post navigation.
		        the_post_navigation( array(
			        'prev_text' => _x( '<span class="meta-nav">Published in</span><span class="post-title">%title</span>', 'Parent post link', 'restaurant-recipe' ),
		        ) );
	        } elseif ( is_singular( 'post' ) ) {

		        // Previous/next post navigation.
		        the_post_navigation();
	        }
	        
            // If comments are open or we have at least one comment, load up the comment template.
            if ( comments_open() || get_comments_number() ) :
                comments_template();
            endif;
        endwhile; // End of the loop.
        ?>
		</main><!-- #main -->
	</div><!-- #primary -->
	<?php
	get_sidebar( 'left' );
	get_sidebar();
	if( 'both-sidebar' == $sidebar_layout ) {
		echo '</div>';
	}
	?>
</div><!-- #content -->
<?php get_footer();