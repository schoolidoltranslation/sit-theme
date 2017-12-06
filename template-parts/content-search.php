<?php
/**
 * Template part for displaying results in search pages
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package sit
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
  <div class="card mb-3">
    <?php if ( has_post_thumbnail() ) : ?>
      <?php echo get_the_post_thumbnail( null, 'medium', [ 'class' => 'card-img-top' ] ) ?>
    <?php endif; ?>
    <div class="card-header">
      <header class="entry-header">
        <?php
          the_title( '<h4 class="card-title entry-title">', '</h4>' );

          if ( 'post' === get_post_type() ) : ?>
          <h6 class="card-subtitle mb-2 text-muted">
            <?php sit_posted_on() ?>
          </h6>
          <?php
          endif;
        ?>
      </header><!-- .entry-header -->
    </div>

    <div class="card-body">
      <div class="entry-content">
        <?php
          the_content(false);

          wp_link_pages([
            'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'sit' ),
            'after'  => '</div>',
          ]);
        ?>
      </div><!-- .entry-content -->
    </div>

    <div class="card-footer">
      <div class="d-flex align-items-center">
        <?php sit_entry_footer(); ?>
      </div>
    </div>
  </div>
</article><!-- #post-<?php the_ID(); ?> -->
