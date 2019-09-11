      <div class="about row">
        <?php if (has_post_thumbnail()) { ?>
        <div class="featured-image">
          <?php the_post_thumbnail('large'); ?>
        </div>
        <?php } ?>
        <div class="about-intro">
          <div class="about-intro-text">
            <?php echo mb_substr(get_the_excerpt(), 0, 250); ?>
            <?php /*the_content();*/ ?>
          </div>
          <a class="about-intro-btn" href="<?php the_permalink(); ?>">詳細を見る</a>
        </div>
      </div><!-- .about -->
