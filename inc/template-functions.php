<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package sit
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function sit_body_classes( $classes ) {
	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	return $classes;
}
add_filter( 'body_class', 'sit_body_classes' );

function sit_nav_posts_links($output) {
  $injection = 'class="btn btn-info"';
  return str_replace('<a href=', '<a ' . $injection . ' href=', $output);
}
add_filter( 'next_post_link', 'sit_nav_posts_links' );
add_filter( 'previous_post_link', 'sit_nav_posts_links' );

function sit_posts_link_attr($output) {
  return 'class="btn btn-info"';
}
add_filter( 'previous_posts_link_attributes', 'sit_posts_link_attr' );
add_filter( 'next_posts_link_attributes', 'sit_posts_link_attr' );

function sit_categories_links($thelist, $separator, $parents) {
  $injection = 'class="badge badge-info"';
  return str_replace('<a href=', '<a ' . $injection . ' href=', $thelist);
}
// add_filter('the_category_list', 'sit_categories_links');

function sit_search_form( $form ) {
  $form = '<form role="search" method="get" id="searchform" class="searchform" action="' . home_url( '/' ) . '" >
    <div class="input-group">
      <input type="text" value="' . get_search_query() . '" class="form-control" placeholder="Buscar por..." name="s" id="s" />
      <span class="input-group-btn">
        <input type="submit" class="btn btn-secondary" id="searchsubmit" value="'. esc_attr__( 'Buscar' ) .'" />
      </span>
    </div>
    </form>';

  return $form;
}
add_filter( 'get_search_form', 'sit_search_form', 100 );

/**
 * Add a pingback url auto-discovery header for singularly identifiable articles.
 */
function sit_pingback_header() {
	if ( is_singular() && pings_open() ) {
		echo '<link rel="pingback" href="', esc_url( get_bloginfo( 'pingback_url' ) ), '">';
	}
}
add_action( 'wp_head', 'sit_pingback_header' );
