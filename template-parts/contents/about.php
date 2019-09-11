      <div class="concept row">
        <?php if (has_post_thumbnail()) { ?>
        <div class="featured-image">
          <?php the_post_thumbnail('large'); ?>
        </div>
        <?php } ?>
        <div class="concept-intro">
          <div class="concept-intro-text">
            <?php the_content(); ?>
          </div>
          <a class="concept-intro-btn" href="<?php the_permalink(); ?>">詳細</a>
        </div>
      </div><!-- .concept -->
