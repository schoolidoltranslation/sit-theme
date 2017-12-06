<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package sit
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">

		<?php
		while ( have_posts() ) : the_post();

			get_template_part( 'template-parts/content', get_post_type() );

      echo '<div class="d-flex justify-content-between py-3">';
      previous_post_link('%link', 'Anterior post');
      next_post_link('%link', 'Siguiente post');
      echo '</div>';

			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				echo '<div class="card"><div class="card-body p-0"><div class="fb-comments" data-href="' . esc_attr(get_the_permalink()) . '" data-width="100%" data-numposts="10"></div></div></div>';
			endif;

		endwhile; // End of the loop.
		?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
// get_sidebar();
get_footer();
