  <h1 id="page-title"><?php echo get_my_title(); ?></h1>
  <div id="page-description"><?php echo get_my_description(); ?></div>
  <?php
    if (is_post_type_archive('feature') || is_tax('feature-tag') || is_tax('feature-year')) {
      insert_feature_cat();
    }
  ?>
