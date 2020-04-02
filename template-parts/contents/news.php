      <div class="news row">
        <div class="featured-image">
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
        <div class="news-intro">
          <div class="news-intro-inner">
            <div class="news-intro-date"><?php the_time('Y.m.d'); ?></div>
            <div class="news-intro-heading"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></div>
            <ul class="news-intro-terms">
              <?php
              $terms = get_the_category($post->ID);
              foreach ($terms as $term) {
                echo '<li><a href="' . get_term_link($term->slug, 'category') . '">' . $term->name . '</a></li> ';
              }
              ?>
            </ul>
            <div class="news-intro-text">
              <p>
              <?php the_excerpt(); ?>
              </p>
            </div>
          </div>
        </div>
      </div><!-- .news -->
