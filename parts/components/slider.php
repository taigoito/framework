          <div class="slider__item">
            <?php
            if (has_post_thumbnail()) {
              the_post_thumbnail('large');
            } else {
              no_image();
            }
            ?>
            <div class="slider__caption--hidden">
              <?php the_title(); ?>
            </div>
          </div>