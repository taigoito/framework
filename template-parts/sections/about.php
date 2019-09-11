    <section id="front-concept" class="front-sec">
      <h2 class="front-sec-heading">コンセプト</h2>
      <div class="container">
        <?php
        $posts = get_posts([
          'posts_per_page' => 1,
          'include' => 11,
          'post_type' => 'page'
        ]);
        foreach ($posts as $post) {
          setup_postdata($post);
          get_template_part('template-parts/contents/about');
        }
        ?>
      </div><!-- .container -->
    </section><!-- #concept -->
