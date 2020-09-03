        <div class="cols__col--size_5">
          <div class="cols__image">
            <?php
            if (has_post_thumbnail()) {
              the_post_thumbnail('large');
            } else {
              no_image('lg');
            }
            ?>
          </div>
          <div class="cols__textbox">
            <h3 class="cols__heading"><?php the_title(); ?></h3>
            <div class="cols__intro">
              <?php the_excerpt(); ?>
            </div>
            <a class="cols__more" href="<?php the_permalink(); ?>">詳細</a>
          </div>
        </div>
        