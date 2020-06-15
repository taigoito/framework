    <div id="hero">
      <div id="hero-content">
        <?php
        $posts = get_posts([
          'posts_per_page' => 1,
          'post_type' => 'post'
        ]);
        foreach ($posts as $post) {
          setup_postdata($post);
          the_post_thumbnail('medium');
        ?>
        <small><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></small>
        <?php } ?>
      </div>
      <small class="copyright"><?php copyright(); ?></small>
    </div><!-- #hero -->
