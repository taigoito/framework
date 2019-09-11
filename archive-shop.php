<?php get_header(); ?>
  <main id="main">
    <div class="container">
      <div class="row">
        <?php
        $posts = get_posts([
          'order' => 'ASC',
          'post_type' => 'shop'
        ]);
        foreach ($posts as $post) {
          setup_postdata($post);
        ?>
        <section class="shop">
          <a class="shop-inner" href="<?php echo get_post_meta($post->ID, 'url', true); ?>" target="_blank">
            <h3 class="shop-name"><?php the_title(); ?></h3>
            <h4 class="shop-url"><?php echo get_post_meta($post->ID, 'url', true); ?></h4>
            <div class="shop-info"><?php the_content(); ?></div>
          </a>
        </section>
        <?php 
          }
        ?>
      </div>
    </div><!-- .container -->
  </main><!-- main -->
<?php get_footer(); ?>
