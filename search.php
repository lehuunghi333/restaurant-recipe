<?php
/**
 * The template for displaying search results pages.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
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
			<h1 class="page-title"><?php printf( esc_html__( 'Search Results for: %s', 'restaurant-recipe' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
			<?php
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
	<section id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
		<?php
		if ( have_posts() ) :

			/* Start the Loop */
			while ( have_posts() ) : the_post();

				/**
				 * Run the loop for the search to output the results.
				 * If you want to overload this in a child theme then include a file
				 * called content-search.php and that will be used instead.
				 */
				get_template_part( 'template-parts/content', get_post_format() );

			endwhile;

			/**
			 * restaurant_recipe_action_posts_navigation hook
			 * @since Restaurant Recipe 1.0.0
			 *
			 * @hooked restaurant_recipe_posts_navigation - 10
			 */
			do_action( 'restaurant_recipe_action_posts_navigation' );

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif; ?>

		</main><!-- #main -->
	</section><!-- #primary -->
	<?php
	get_sidebar( 'left' );
	get_sidebar();
	if( 'both-sidebar' == $sidebar_layout ) {
		echo '</div>';
	}
	?>
</div><!-- #content -->
<?php get_footer();