    <section id="photos" class="photos">
      <h2 class="photos__heading">フォトギャラリー</h2>
      <ul class="gallery">
        <?php
        $posts = get_posts([
          'posts_per_page' => 12,
          'post_type' => 'photo'
        ]);
        foreach ($posts as $post) {
          setup_postdata($post);
          get_template_part('parts/components/gallery');
        }
        ?>
      </ul><!-- .gallery -->
    </section><!-- .photos -->
