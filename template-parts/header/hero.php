    <div id="hero">
      <div id="hero-content">
        <?php
        $posts = get_posts([
          'posts_per_page' => 1,
          'post_type' => 'works'
        ]);
        foreach ($posts as $post) {
          setup_postdata($post);
          the_post_thumbnail('medium');
        ?>
        <small><?php the_title(); ?></small>
        <?php } ?>
      </div>
      <small class="copyright"><?php copyright(); ?></small>
    </div><!-- #hero -->
