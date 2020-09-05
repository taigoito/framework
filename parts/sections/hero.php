  <div class="hero__inner">
    <?php
      $posts = get_posts([
        'posts_per_page' => 1,
        'include' => 11,
        'post_type' => 'page'
      ]);
      foreach ($posts as $post) {
        setup_postdata($post);
      ?>
        <div class="hero__large-text">こしのくに の
          <br><span class="hero__animate">里山を<ruby><rb>再生</rb><rt>さいせい</rt></ruby></span>
          <span class="hero__animate">文化を<ruby><rb>最盛</rb><rt>さいせい</rt></ruby></span>
          <span class="hero__animate">生業を<ruby><rb>済世</rb><rt>さいせい</rt></ruby></span> する
        </div>
        <div class="hero__small-text"><?php the_excerpt(); ?></div>
        <a class="hero__more" href="<?php the_permalink(); ?>">私たちについて</a>
      <?php } ?>
    <div class="hero__video-clip">
      <video class="hero__video" autoplay muted loop src="<?php echo get_template_directory_uri() . '/assets/2020060500.mp4' ?>"></video>
    </div>
  </div>
