<?php
/**
 * Custom Search Form
 *
 * @package Acme Themes
 * @subpackage Restaurant Recipe
 */
global $restaurant_recipe_customizer_all_values;
?>
<div class="search-block">
    <form action="<?php echo esc_url( home_url() )?>" class="searchform" id="searchform" method="get" role="search">
        <div>
            <label for="menu-search" class="screen-reader-text"></label>
            <?php
            $placeholder_text = '';
            if ( isset( $restaurant_recipe_customizer_all_values['restaurant-recipe-search-placeholder']) ):
                $placeholder_text = ' placeholder="' . esc_attr( $restaurant_recipe_customizer_all_values['restaurant-recipe-search-placeholder'] ). '" ';
            endif; ?>
            <input type="text" <?php echo  $placeholder_text ;?> class="menu-search" id="menu-search" name="s" value="<?php echo get_search_query();?>" />
            <button class="searchsubmit fa fa-search" type="submit" id="searchsubmit"></button>
        </div>
    </form>
</div>