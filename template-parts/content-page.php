<?php
/**
 * Template part for displaying page content in page.php
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
    <div class="card-body">
      <?php the_title( '<p class="lead entry-title">', '</p>' ); ?>

      <div class="entry-content">
        <?php the_content(); ?>
      </div><!-- .entry-content -->
    </div>

    <div class="card-footer">
      <div class="d-flex align-items-center">
        <?php sit_entry_footer(); ?>
      </div>
    </div><!-- .card-footer -->
  </div>
</article><!-- #post-<?php the_ID(); ?> -->
