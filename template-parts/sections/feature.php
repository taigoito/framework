    <section id="front-feature" class="front-sec">
      <h2 class="front-sec-heading">特集</h2>
      <div class="container">
        <?php
        $posts = get_posts([
          'posts_per_page' => 2,
          'post_type' => ['feature']
        ]);
        foreach ($posts as $post) {
          setup_postdata($post);
          get_template_part('template-parts/contents/feature');
        }
        ?>
      </div><!-- .container -->
      <div class="link-inline-wrap">
        <a class="link-inline" href="<?php echo get_post_type_archive_link('feature'); ?>">特集を全て見る</a>
      </div>
    </section><!-- #feature -->
