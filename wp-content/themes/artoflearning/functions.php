<?php
/**
 * @package Make Child
 */

/**
 * The theme version.
 */
define( 'TTFMAKE_CHILD_VERSION', '1.1.0' );

/**
 * Turn off the parent theme styles.
 *
 * If you would like to use this child theme to style Make from scratch, rather
 * than simply overriding specific style rules, simply remove the '//' from the
 * 'add_filter' line below. This will tell the theme not to enqueue the parent
 * stylesheet along with the child one.
 */
//add_filter( 'make_enqueue_parent_stylesheet', '__return_false' );

/**
 * Add your custom theme functions here.
 */

// Infinite Scroll

add_theme_support( 'infinite-scroll', array(
    'container' => 'site-content',
    'footer' => 'site-footer',
    'footer_widgets' => false,
) );

// Search filter for categories

function searchfilter($query) { 
    
    $categories = get_the_category(); 
    $category_id = $categories[0]->cat_ID; 
    
    if ($query->is_search && !is_admin() && $category_id === '3' ) { 
        $query->set('cat', '3');
    } 
    return $query; } 

add_filter('pre_get_posts','searchfilter');

// Soil Action

function soil_theme_setup() {
	add_theme_support('soil-clean-up');
    add_theme_support('soil-disable-asset-versioning');
    add_theme_support('soil-jquery-cdn');
    add_theme_support('soil-js-to-footer');
    add_theme_support('soil-nav-walker');

}
add_action( 'after_setup_theme', 'soil_theme_setup' );