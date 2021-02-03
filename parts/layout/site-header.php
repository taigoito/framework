  <h1 class="site-header__title"><?php echo get_my_title(); ?></h1>
  <div class="site-header__description"><?php echo get_my_description(); ?></div>
  <?php
    if (is_post_type_archive('feature') || is_tax('feature-tag') || is_tax('feature-year')) {
      insert_feature_cat();
    }
  ?>
