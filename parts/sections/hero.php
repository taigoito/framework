      <div class="hero__content">
        <?php
        $posts = get_posts([
          'posts_per_page' => 1,
          'post_type' => 'post'
        ]);
        foreach ($posts as $post) {
          setup_postdata($post);
          the_post_thumbnail('large', ['class' => 'hero__image']);
        ?>
        <small class="hero__title"><?php the_title(); ?></small>
        <?php } ?>
      </div>
      <small class="hero__copyright"><?php copyright(); ?></small>
