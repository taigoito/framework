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
    const preloader = new Preloader();
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
  <div class="brand-home">
    <a href="<?php echo home_url('/'); ?>"><img src="<?php echo get_template_directory_uri() . '/images/itadakizen.png'; ?>"></a>
  </div>
  <button class="nav-toggler" type="button" data-toggle="slidebar">
    <span data-icon="ei-navicon" data-size="l"></span>
  </button>
