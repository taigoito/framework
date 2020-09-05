        <article class="members__member">
          <div class="members__image">
            <a href="<?php the_permalink(); ?>">
              <?php
              if (has_post_thumbnail()) {
                the_post_thumbnail('large');
              } else {
                no_image('lg');
              }
              ?>
            </a>
          </div>
          <div class="members__textbox">
            <div class="members__textbox-inner">
              <div class="members__content">
                <h3 class="members__name"><?php the_title(); ?></h3>
                <p class="members__intro"><?php the_content(); ?></p>
              </div>
            </div>
          </div>
        </article>