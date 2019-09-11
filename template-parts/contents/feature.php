      <div class="feature">
        <a href="<?php the_permalink(); ?>">
          <div class="feature-wrap" style="background-color:<?php echo get_post_meta($post->ID, 'background-color', true); ?>;">
            <div class="feature-inner" style="border-color:<?php echo get_post_meta($post->ID, 'color', true); ?>;">
              <div class="feature-intro" style="color:<?php echo get_post_meta($post->ID, 'color', true); ?>;">
                <div class="feature-intro-heading"><?php the_title(); ?></div>
                <div class="feature-intro-text">
                  <?php the_excerpt(); ?>
                </div>
              </div>
              <div class="feature-image col-auto">
                <?php
                  if (has_post_thumbnail()) {
                    the_post_thumbnail('thumbnail');
                  } else {
                    no_image();
                  }
                  ?>
              </div>
            </div>
          </div>
        </a>
      </div>
