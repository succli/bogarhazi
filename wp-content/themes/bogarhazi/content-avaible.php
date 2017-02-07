<h2 class="text-center"><?php single_cat_title(); ?></h2>
  <div class="row">
     <?php if (have_posts()): ?>
    <?php while(have_posts()): the_post(); ?>
      <div class="col-xxs-12 col-xs-6 col-sm-6 col-md-4">
        <div class="item">
          <a href="<?php the_permalink(); ?>">
            <?php the_post_thumbnail('dog-gallery'); ?>
            <h4>
              <?php if (get_field('dogRip')): ?>
                ✞
              <?php endif; ?>
              <?php the_title(); ?>
            </h4>
          </a>
        </div>
      </div>
    <?php endwhile; ?>
    <?php endif; ?>
    <?php 
        $avaible_puppies = new WP_Query(array(
            'post_type' => 'puppy',
            'posts_per_page' => -1,
            'meta_query' => array(
                array(
                    'key'     => 'puppyStatus',
                    'value'   => 'green',
                    'compare' => 'IN',
                ),
            )
        ));
        if ($avaible_puppies->have_posts()):
            while ($avaible_puppies->have_posts()):
                $avaible_puppies->the_post();
    ?>
        <div class="col-xxs-12 col-xs-6 col-sm-6 col-md-4">
            <div class="item">
            <a href="<?php the_permalink(); ?>">
                <?php the_post_thumbnail('dog-gallery'); ?>
                <h4><?php the_title(); ?></h4>
            </a>
            </div>
        </div>
    <?php
        endwhile;
        wp_reset_query();
        endif;
    ?>
  </div>
