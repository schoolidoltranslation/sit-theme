<?php
/**
 * Template part for displaying a message that posts cannot be found
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package sit
 */

?>

<section class="no-results not-found mb-3">
	<header class="page-header">
		<h1 class="page-title display-4">
      Ningún resultado
    </h1>
	</header><!-- .page-header -->

	<div class="page-content">
		<?php
		if ( is_home() && current_user_can( 'publish_posts' ) ) : ?>

			<p class="lead">
        ¿Listo para publicar tu primer post?
        <a href="<?php esc_url( admin_url( 'post-new.php' ) ) ?>">Empieza por aquí</a>.
      </p>

		<?php elseif ( is_search() ) : ?>

			<p class="lead">
        Lo sentimos pero no se ha encontrado ningún resultado. Por favor prueba con otra búsqueda.
      </p>
			<?php
				get_search_form();

		else : ?>

      <p class="lead">
        Oops! Parece que no se ha podido encontrar nada por aquí, sin embargo prueba a realizar una búsqueda.
      </p>
			<?php
				get_search_form();

		endif; ?>
	</div><!-- .page-content -->
</section><!-- .no-results -->
