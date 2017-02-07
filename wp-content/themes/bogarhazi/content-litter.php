<h2 class="text-center"><?php single_cat_title(); ?></h2>
<?php if (have_posts()): ?>
    <div class="row">
        <?php while (have_posts()): the_post(); ?>
            <div class="col-xs-12 col-sm-6 puppy">
                <div class="row middle-xs middle-sm top-md middle-lg">
                    <div class="col-xs-12 col-sm-12 col-md-6">
                        <?php the_post_thumbnail('dog-gallery'); ?>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-6">
                        <h3><?php the_title(); ?></h3>
                        <ul>
                            <li>
                                <div class="row">
                                    <div class="col-xs-6"><?php _e('Gender', 'bogarhazi'); ?>:</div>
                                    <div class="col-xs-6 text-right"><?php the_field('puppyGender'); ?></div>
                                </div>
                            </li>
                            <li>
                                <div class="row">
                                    <div class="col-xs-6"><?php _e('Status', 'bogarhazi') ?>:</div>
                                    <div class="col-xs-6 text-right"><i class="fa fa-circle color-<?php the_field('puppyStatus') ?>" aria-hidden="true"></i></div>
                                </div>
                            </li>
                        </ul>
                        <div class="row">
                            <div class="col-xs-12">
                                <a class="btn-blue" href="<?php the_permalink(); ?>">
                                    <?php _e('More info', 'bogarhazi') ?>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--div class="col-xs-12 col-sm-6 puppy">
              <div class="row middle-xs middle-sm top-md middle-lg">
                <div class="col-xs-12 col-sm-12 col-md-6">
                  <?php echo wp_get_attachment_image(get_field('image'), 'dog-gallery') ?>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-6">
                  <h3><?php the_field('name'); ?></h3>
                  <ul>
                    <li>
                      <div class="row">
                        <div class="col-xs-6">
                          <?php _e('Gender', 'bogarhazi') ?>:
                        </div>
                        <div class="col-xs-6 text-right">
                          <?php the_field('gender') ?>
                        </div>
                      </div>
                    </li>
                    <li>
                      <div class="row">
                        <div class="col-xs-6">
                          <?php _e('Status', 'bogarhazi') ?>:
                        </div>
                        <div class="col-xs-6 text-right">
                          <i class="fa fa-circle color-<?php the_field('status') ?>" aria-hidden="true"></i>
                        </div>
                      </div>
                    </li>
                  </ul>
                  <a href="#" data-trigger="gallery"><?php _e('More images', 'bogarhazi') ?></a>
                  <div class="row hidden thumb-gallery">
                    <?php foreach (get_field('gallery') as $i => $image): ?>
                        <div class="col-xs-6 col-sm-6 col-md-4 gallery-image">
                          <a href="<?php echo $image['url'] ?>" class="item"><img src="<?php echo $image['sizes']['dog-gallery'] ?>" alt="<?php the_sub_field('name'); ?>" class="img-responsive" /></a>
                        </div>
                    <?php endforeach; ?>
                  </div>
                  <?php if (get_field('status') != 'red'): ?>
                    <button type="button" class="btn-blue" data-toggle="modal" data-target="#takeMeHome">
                      <?php _e('Choose me!') ?>
                    </button>
                  <?php endif; ?>
                </div>
              </div>
            </div-->
        <?php endwhile; ?>
    </div>
<?php endif; ?>