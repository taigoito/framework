      <div class="feature__banner">
        <a href="<?php the_permalink(); ?>">
          <div class="feature__wrap" style="background-color:<?php echo get_post_meta($post->ID, 'background-color', true); ?>;">
            <div class="feature__inner" style="border-color:<?php echo get_post_meta($post->ID, 'color', true); ?>;">
              <div class="feature__intro" style="color:<?php echo get_post_meta($post->ID, 'color', true); ?>;">
                <div class="feature__title"><?php the_title(); ?></div>
                <div class="feature__textbox">
                  <?php the_excerpt(); ?>
                </div>
              </div>
              <div class="feature__image">
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
