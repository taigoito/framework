    <section id="product" class="product">
      <h2 class="product__heading">product</h2>
      <div id="slider" class="slider--size_sm">
        <div class="slider__inner">
          <?php
          $posts = get_posts([
            'posts_per_page' => 10,
            'post_type' => 'product'
          ]);
          foreach ($posts as $post) {
            setup_postdata($post);
            get_template_part("parts/components/slider");
          }
          ?>
        </div>
        <a class="slider__prev" href="#"><span data-icon="ei-chevron-left" data-size="l"></span></a>
        <a class="slider__next" href="#"><span data-icon="ei-chevron-right" data-size="l"></span></a>
      </div><!-- .slider -->
      <div class="slider__caption"></div>
    </section><!-- .product -->
