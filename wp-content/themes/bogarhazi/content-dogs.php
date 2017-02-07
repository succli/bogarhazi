<h2 class="text-center"><?php single_cat_title(); ?></h2>
<?php if (have_posts()): ?>
  <div class="row">
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
  </div>
<?php else: ?>
  <div class="row">
    <div class="col-xs-12">
      <h3><?php printf(__('No %s available yet.', 'bogarhazi'), single_cat_title('', false)); ?></h3>
    </div>
  </div>
<?php endif; ?>
