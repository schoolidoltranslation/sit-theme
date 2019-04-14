<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package sit
 */

?>
    </div><!-- /.row -->

    <div class="card mt-3 mb-4">
      <div class="card-body px-3 py-2">
        <div class="d-flex align-items-center">
          <?php
            wp_nav_menu([
              'menu'          => 'menu-2',
              'container'			=> 'ul',
              'menu_class'    => 'list-inline mb-0',
              'before'        => '<li class="list-inline-item">',
              'after'         => '</li>',
              'depth'         => 0,
              'walker'        => new Custom_Nav_Menu()
            ]);
          ?>
          <span class="ml-auto">With ❤️ SIT.</span>
        </div>
      </div>
    </div>
	</div><!-- #content -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
