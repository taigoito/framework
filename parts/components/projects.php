        <article class="projects__item">
          <div class="projects__image">
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
          <div class="projects__textbox">
            <div class="projects__textbox-inner">
              <div class="projects__content">
                <h3 class="projects__heading"><?php the_title(); ?></h3>
                <p class="projects__intro"><?php echo get_the_excerpt(); ?></p>
              </div>
            </div>
          </div>
        </article>