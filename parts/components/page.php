        <div class="one-col__container">
          <div class="one-col__image">
            <?php
            if (has_post_thumbnail()) {
              the_post_thumbnail('large');
            } else {
              no_image('lg');
            }
            ?>
          </div>
          <div class="one-col__textbox">
            <div class="one-col__intro">
              <?php the_content(); ?>
            </div>
          </div>
        </div>