<?php
/**
 * Custom template tags for this theme
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package sit
 */

if ( ! function_exists( 'sit_posted_on' ) ) :
	/**
	 * Prints HTML with meta information for the current post-date/time and author.
	 */
	function sit_posted_on() {
		$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
		if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
			$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
		}

		$time_string = sprintf( $time_string,
			esc_attr( get_the_date( 'c' ) ),
			esc_html( get_the_date() ),
			esc_attr( get_the_modified_date( 'c' ) ),
			esc_html( get_the_modified_date() )
		);

		$posted_on = sprintf(
			/* translators: %s: post date. */
			esc_html_x( 'Posted on %s', 'post date', 'sit' ),
			'<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $time_string . '</a>'
		);

		$byline = sprintf(
			/* translators: %s: post author. */
			esc_html_x( 'por %s', 'post author', 'sit' ),
			'<span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a></span>'
		);

		echo 'Publicado ' . $byline; // WPCS: XSS OK.
	}
endif;

if ( ! function_exists( 'sit_posts_navigation' ) ) :
  /**
	 * Prints HTML with posts links navigation.
	 */
  function sit_posts_navigation() {
    echo '<div class="d-flex justify-content-between my-2">';
    echo (get_previous_posts_link()) ? get_previous_posts_link() : '<span>&nbsp;</span>';
    echo (get_next_posts_link()) ? get_next_posts_link() : '<span>&nbsp;</span>';
    echo '</div>';
  }
endif;

if ( ! function_exists( 'sit_entry_footer' ) ) :
	/**
	 * Prints HTML with meta information for the categories, tags and comments.
	 */
	function sit_entry_footer() {
		// Hide category and tag text for pages.
		if ( 'post' === get_post_type() ) {
			/* translators: used between list items, there is a space after the comma */
			$categories_list = get_the_category_list(',&nbsp;');
			if ( $categories_list ) {
				echo $categories_list;
			}
		}

    echo '<div class="ml-auto">';

    if ( !is_singular() ) {
      echo '<a href="' . get_the_permalink() . '" class="btn btn-primary btn-sm">Leer más</a>';
    }

    // class="fb-comments-count" data-href="http://example.com/"
		if ( ! is_single() && ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
      $comment_icon = '<i class="fa fa-comments ml-1"></i>';
      comments_popup_link('0' . $comment_icon, '1' . $comment_icon, '%' . $comment_icon, 'btn btn-secondary btn-sm ml-2');
    }

		edit_post_link('Editar', '', '', null, 'btn btn-success btn-sm ml-2');

    echo '</div>';
  }
endif;
