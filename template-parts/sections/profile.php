    <section id="front-profile" class="front-sec">
      <h2 class="front-sec-heading">自己紹介</h2>
      <div class="container">
        <?php
        $posts = get_posts([
          'posts_per_page' => 1,
          'include' => 21,
          'post_type' => 'page'
        ]);
        foreach ($posts as $post) {
          setup_postdata($post);
          get_template_part('template-parts/contents/about');
        }
        ?>
      </div><!-- .container -->
    </section><!-- #profile -->
