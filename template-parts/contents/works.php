      <div class="slider-item">
        <?php
        if (has_post_thumbnail()) {
          the_post_thumbnail('full');
        } else {
          no_image();
        }
        ?>
        <div class="slider-item-caption">
          <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
        </div>
      </div>
