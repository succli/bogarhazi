<h2 class="text-center"><?php post_type_archive_title(); ?></h2>
<?php 
  $litters = get_terms(array(
    'taxonomy' => 'litter'
  ));
?>

<?php if(count($litters) > 0): ?>
  <div class="puppy-list">
    <?php foreach ($litters as $litter): ?>
      <div class="row middle-xs">
        <div class="col-xs-12 col-sm-6 col-md-6 text-center">
          <h3><?php echo $litter->name; ?></h3>
          <p><?php echo __('Born', 'bogarhazi').': '.get_field('litterBornDate', $litter->taxonomy.'_'.$litter->term_id); ?></p>
          <a href="<?php echo get_term_link($litter->term_id, 'litter'); ?>"><?php _e('More info', 'bogarhazi'); ?></a>
        </div>
        <div class="col-xxs-12 col-xs-6 col-sm-3 col-md-3">
          <?php if(get_field('isFather', $litter->taxonomy.'_'.$litter->term_id)): ?>
            <?php echo wp_get_attachment_image(get_post_thumbnail_id(get_field('litterInnerFather', $litter->taxonomy.'_'.$litter->term_id)), 'dog-gallery'); ?>
            <h4 class="text-center"><?php echo get_the_title(get_field('litterInnerFather', $litter->taxonomy.'_'.$litter->term_id)); ?></h4>
          <?php else: ?>
            <?php echo wp_get_attachment_image(get_field('outerLitterFather', $litter->taxonomy.'_'.$litter->term_id)[0]['image'], 'dog-gallery') ?>
            <h4 class="text-center"><?php echo get_field('outerLitterFather', $litter->taxonomy.'_'.$litter->term_id)[0]['name']; ?></h4>
          <?php endif; ?>
        </div>
        <div class="col-xxs-12 col-xs-6 col-sm-3 col-md-3">
          <?php if(get_field('isMother', $litter->taxonomy.'_'.$litter->term_id)): ?>
            <?php echo wp_get_attachment_image(get_post_thumbnail_id(get_field('litterInnerMother', $litter->taxonomy.'_'.$litter->term_id)), 'dog-gallery'); ?>
            <h4 class="text-center"><?php echo get_the_title(get_field('litterInnerMother', $litter->taxonomy.'_'.$litter->term_id)); ?></h4>
          <?php else: ?>
            <?php echo wp_get_attachment_image(get_field('outerLitterMother', $litter->taxonomy.'_'.$litter->term_id)[0]['image'], 'dog-gallery') ?>
            <h4 class="text-center"><?php echo get_field('outerLitterMother', $litter->taxonomy.'_'.$litter->term_id)[0]['name']; ?></h4>
          <?php endif; ?>
        </div>
      </div>
    <?php endforeach; ?>
  </div>
<?php else: ?>
  <div class="row">
    <div class="col-xs-12">
      <h3><?php printf(__('No %s available yet.', 'bogarhazi'), post_type_archive_title()); ?></h3>
    </div>
  </div>
<?php endif; ?>
<?php /*if (have_posts()): ?>
  <div class="puppy-list">
    <?php while(have_posts()): the_post(); ?>
      <div class="row middle-xs">
        <div class="col-xs-12 col-sm-6 col-md-6 text-center">
          <h3><?php the_title(); ?></h3>
          <p><?php echo __('Born', 'bogarhazi').': '.get_field('born'); ?></p>
          <a href="<?php the_permalink(); ?>"><?php _e('More info', 'bogarhazi'); ?></a>
        </div>
        <div class="col-xxs-12 col-xs-6 col-sm-3 col-md-3">
          <?php if (get_field('isFather')): ?>
            <?php echo wp_get_attachment_image(get_post_thumbnail_id(get_field('innerFather')), 'thumbnail'); ?>
            <h4 class="text-center"><?php echo get_the_title(get_field('innerFather')); ?></h4>
          <?php else: ?>
            <?php echo wp_get_attachment_image(get_field('outerFather')[0]['image'], 'thumbnail') ?>
            <h4 class="text-center"><?php echo get_field('outerFather')[0]['name']; ?></h4>
          <?php endif; ?>
        </div>
        <div class="col-xxs-12 col-xs-6 col-sm-3 col-md-3">
          <?php if (get_field('isMother')): ?>
            <?php echo wp_get_attachment_image(get_post_thumbnail_id(get_field('innerMother')), 'thumbnail'); ?>
            <h4 class="text-center"><?php echo get_the_title(get_field('innerMother')); ?></h4>
          <?php else: ?>
            <?php echo wp_get_attachment_image(get_field('outerMother')[0]['image'], 'thumbnail') ?>
            <h4 class="text-center"><?php echo get_field('outerMother')[0]['name']; ?></h4>
          <?php endif; ?>
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
<?php endif;*/ ?>
