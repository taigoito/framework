    <section id="front-diary" class="front-sec">
      <h2 class="front-sec-heading">版画ゆうびん</h2>
      <div class="container">
        <div class="row">
          <?php
          $posts = get_posts([
            'posts_per_page' => 4,
            'post_type' => 'post'
          ]);
          foreach ($posts as $post) {
            setup_postdata($post);
            ?>
          <div class="diary">
            <div class="diary-image">
              <a href="<?php the_permalink(); ?>">
                <?php
                if (has_post_thumbnail()) {
                  the_post_thumbnail('medium');
                } else {
                  no_image();
                }
                ?>
              </a>
            </div>
            <div class="diary-heading"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></div>
          </div>
          <?php } ?>
        </div>
      </div><!-- .container -->
      <div class="link-inline-wrap">
        <a class="link-inline" href="<?php echo get_post_type_archive_link('post'); ?>">版画ゆうびんを全て見る</a>
      </div>
    </section><!-- #diary -->
