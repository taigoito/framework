    <section id="front-gallery" class="front-sec">
      <h2 class="front-sec-heading">gallery</h2>
      <ul class="photo-gallery">
        <?php
        $posts = get_posts([
          'posts_per_page' => 12,
          'post_type' => 'post'
        ]);
        foreach ($posts as $post) {
          setup_postdata($post);
          get_template_part('template-parts/contents/gallery');
        }
        ?>
      </ul>
    </section><!-- #gallery -->
