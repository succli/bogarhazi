<?php if (have_posts()): ?>
  <?php while(have_posts()): the_post(); ?>
    <article id="post-<?php the_ID(); ?>" <?php post_class('article') ?>>
      <div class="row">
        <div class="hidden-xs hidden-sm col-md-4">
          <?php if (has_post_thumbnail()): ?>
            <?php the_post_thumbnail('dog-gallery'); ?>
          <?php endif; ?>
        </div>
        <div class="col-xs-12 col-sm-12 hidden-md hidden-lg">
          <?php if (has_post_thumbnail()): ?>
            <div class="post-thumbnail">
              <?php the_post_thumbnail(); ?>
            </div>
          <?php endif; ?>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-8">
          <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
          <?php the_excerpt(); ?>
          <div class="hidden-md hidden-lg">
            <a href="<?php the_permalink(); ?>" class="read-more"><?php _e('Read more', 'bogarhazi'); ?> <i class="fa fa-angle-right" aria-hidden="true"></i></a>
          </div>
        </div>
      </div>
      <aside class="hidden-xs hidden-sm">
        <?php the_time('M'); ?>
        <strong><?php the_time('d'); ?></strong>
        <a href="<?php the_permalink(); ?>"><?php _e('Read more', 'bogarhazi'); ?> <i class="fa fa-angle-right" aria-hidden="true"></i></a>
      </aside>
    </article>
  <?php endwhile; ?>
  <div class="paginate-links">
    <div class="row">
      <div class="col-xs-12 col-sm-6">
        <?php if (get_previous_posts_link()): ?>
          <?php previous_posts_link('<i class="fa fa-angle-double-left" aria-hidden="true"></i> '.__('Previous', 'bogarhazi')); ?>
        <?php endif; ?>
      </div>
      <div class="col-xs-12 col-sm-6 text-right">
        <?php if (get_next_posts_link()): ?>
          <?php next_posts_link(__('Next', 'bogarhazi').' <i class="fa fa-angle-double-right" aria-hidden="true"></i>'); ?>
        <?php endif; ?>
      </div>
    </div>
  </div>
<?php else: ?>
  <div class="row">
    <div class="col-xs-12">
      <h3><?php printf(__('No %s available yet.', 'bogarhazi'), get_the_title()); ?></h3>
    </div>
  </div>
<?php endif; ?>
