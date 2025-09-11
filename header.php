<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package sit
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">

  <?php wp_head(); ?>

  <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
  <link rel="icon" type="image/png" sizes="194x194" href="/favicon-194x194.png">
  <link rel="icon" type="image/png" sizes="192x192" href="/android-chrome-192x192.png">
  <link rel="manifest" href="/site.webmanifest">
  <link rel="mask-icon" href="/safari-pinned-tab.svg" color="#5bbad5">
  <meta name="msapplication-TileColor" content="#da532c">
  <meta name="msapplication-TileImage" content="/mstile-144x144.png">
  <meta name="theme-color" content="#ffffff">

  <div id="fb-root"></div>
  <script>(function(d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) return;
    js = d.createElement(s); js.id = id;
    js.src = 'https://connect.facebook.net/es_LA/sdk.js#xfbml=1&version=v2.11&appId=143920309579134';
    fjs.parentNode.insertBefore(js, fjs);
  }(document, 'script', 'facebook-jssdk'));</script>
</head>

<body <?php body_class(); ?>>
  <div id="page" class="container site">
    <a id="skippy" class="sr-only sr-only-focusable" href="#content">
      <div class="container">
        <span class="skiplink-text">
          <?php esc_html_e( 'Skip to content', 'sit' ); ?>
        </span>
      </div>
    </a>

    <header id="masthead" class="mb-5 site-header">
      <nav class="navbar navbar-expand navbar-light flex-column flex-md-row">
        <a class="navbar-brand mx-auto mx-lg-0" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
          <img src="<?php echo esc_url( wp_get_attachment_image_src( get_theme_mod( 'custom_logo' ), 'full' )[0] ); ?>">
        </a><!-- .navbar-brand -->

        <div class="navbar-nav-scroll ml-0 ml-lg-auto">
          <?php
            wp_nav_menu([
              'menu'          => 'menu-1',
              'container'			=> 'ul',
              'menu_class'    => 'header-nav navbar-nav flex-row',
              'before'        => '<li class="nav-item lead">',
              'after'         => '</li>',
              'depth'         => 0,
              'walker'        => new Custom_Nav_Menu()
            ]);
          ?>
        </div>
      </nav><!-- #site-navigation -->
    </header><!-- #masthead -->

    <div id="content" class="site-content">
