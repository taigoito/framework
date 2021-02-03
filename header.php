<!doctype html>
<html <?php language_attributes(); ?>>

<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <?php wp_head(); ?>
</head>

<body <?php body_id(); ?>>
  <noscript>
    <p class="no-support">このWebページはJavaScriptを有効にすることで正常に動作します。
      <br>JavaScriptを有効にして再度ご来訪ください。</p>
  </noscript>
  <script src="<?php echo get_template_directory_uri() . '/js/preloader.js'; ?>"></script>
  <script>
    const preloader = new Preloader({backgroundColor: "#fceec3"});
  </script>

  <header id="<?php echo is_front_page() ? 'hero' : 'site-header'; ?>" class="<?php echo is_front_page() ? 'hero' : 'site-header'; ?>">
    <?php
    if (is_front_page()) {
      get_template_part('parts/sections/hero');
    } else {
      get_template_part('parts/layout/site-header');
    }
    ?>
  </header><!-- .<?php echo is_front_page() ? 'hero' : 'site-header'; ?> -->
  <?php get_template_part('parts/layout/header-nav'); ?>
  <?php if (!is_front_page()) insert_breadcrumb(); ?>
