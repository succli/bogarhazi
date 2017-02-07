<?php get_header(); ?>
<?php $terms = wp_get_post_terms(get_the_ID(), 'sex-category'); ?>

<main>

  <section id="dog-<?php the_ID(); ?>" <?php post_class(); ?>>
    <div class="container">
      <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-10 col-lg-offset-1">
          <h2 class="text-center"><?php _e('Our dogs', 'bogarhazi'); ?></h2>
          <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-4">
              <?php if (has_post_thumbnail()): ?>
                <?php the_post_thumbnail(); ?>
              <?php endif; ?>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-8">
              <div class="row">
                <div class="col-xs-8 col">
                  <ol class="breadcrumb">
                    <li><a href="<?php pll_home_url(pll_current_language()); ?>"><?php _e('Home', 'bogarhazi') ?></a></li>
                    <li><?php _e('Our dogs', 'bogarhazi'); ?></li>
                    <li><a href="<?php echo get_term_link($terms[0]->term_id) ?>"><?php echo $terms[0]->name; ?></a></li>
                  </ol>
                </div>
                <div class="col-xs-4 col">
                  <?php
                    $inCategory = new WP_Query(array(
                      'post_type' => 'dog',
                      'posts_per_page' => -1,
                      'tax_query' => array(
                        array(
                          'taxonomy' => 'sex-category',
                          'field' => 'term_id',
                          'terms' => array( $terms[0]->term_id )
                        )
                      ),
                      'post__not_in' => array(get_the_ID()),
                    ));
                  ?>
                  <?php if ($inCategory->have_posts()): ?>
                    <div class="dropdown">
                      <button type="button" id="inCategory" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" class="btn-incategory"><?php echo $terms[0]->name; ?> <i class="fa fa-angle-down" aria-hidden="true"></i></button>
                      <ul class="dropdown-menu" aria-labelledby="inCategory">
                        <?php while($inCategory->have_posts()): $inCategory->the_post(); ?>
                          <li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
                        <?php endwhile; wp_reset_query(); ?>
                      </ul>
                    </div>
                  <?php endif; ?>
                </div>
              </div>

              <h3>
                <?php if (get_field('dogRip')): ?>
                  ✞
                <?php endif; ?>
                <?php the_title(); ?>
              </h3>
              <ul class="info">
                <?php if (get_field('dogSex')): ?>
                  <li><?php _e('Gender', 'bogarhazi') ?>: <?php the_field('dogSex'); ?></li>
                <?php endif; ?>
                <?php if (get_field('dogBornDate')): ?>
                  <?php if (!get_field('dogRip')): ?>
                    <?php
                      $timezone = new DateTimeZone('Europe/Belgrade');
                      $date = DateTime::createFromFormat('Y-m-d', get_field('dogBornDate'), $timezone);
                      $age = $date->diff(new DateTime('now', $timezone))->y;
                    ?>
                    <li><?php _e('Age', 'bogarhazi') ?>: <?php echo $age.' '.__('years old', 'bogarhazi'); ?></li>
                  <?php else: ?>
                    <li><?php _e('Born', 'bogarhazi'); ?>: <?php the_field('dogBornDate'); ?></li>
                  <?php endif; ?>
                <?php endif; ?>
                <?php if (get_field('dogWestieInfoID')): ?>
                  <li><a href="http://westieinfo.com/DB/pes.php?id=<?php the_field('dogWestieInfoID'); ?>"><?php _e('Visit me on westieinfo.com!', 'bogarhazi'); ?></a></li>
                <?php endif; ?>
                <?php if ($terms[0]->slug == __('avaible', 'bogarhazi')): ?>
                  <?php $contact_page = get_pages(array(
                      'meta_key' => '_wp_page_template',
                      'meta_value' => 'page-with-map.php'
                  )); ?>
                  <a href="<?php echo get_permalink($contact_page[0]->ID) ?>" class="btn-contact"><?php _e('Contact us!', 'bogarhazi') ?></a>
                <?php endif; ?>
              </ul>

              <div class="row results">
                <div class="col-xs-12">
                  <?php if (have_rows( 'results', get_the_ID() )): ?>
                    <div class="tab-content">
                      <?php $i = 0; ?>
                      <?php while(have_rows( 'results', get_the_ID() )): the_row(); ?>
                        <div class="tab-pane <?php if( $i == 0 ) echo 'active'; ?>" role="tabpanel">
                          <?php if (strlen(get_sub_field('result')) > 0): ?>
                            <?php the_sub_field('result') ?>
                          <?php endif; ?>
                        </div>
                        <?php $i++; ?>
                      <?php endwhile; ?>
                    </div>
                  <?php endif; ?>
                </div>
              </div>
            </div>
          </div>

          <div class="row family">
            <div class="col-xs-12">
              <ul class="nav nav-tabs" role="tablist">
                <?php if(strlen(get_field('dogPedigree')) > 0): ?>
                <li role="presentation" class="active"><a href="#pedigree" aria-controls="pedigree" role="tab" data-toggle="tab"><?php _e('Pedigree', 'bogarhazi') ?></a></li>
                <?php endif; ?>
                <?php if(strlen(get_field('dogOffspring')) > 0): ?>
                <li role="presentation"><a href="#offspring" aria-controls="offspring" role="tab" data-toggle="tab"><?php _e('Offspring', 'bogarhazi') ?></a></li>
                <?php endif; ?>
                <?php if(strlen(get_field('dogSiblings')) > 0): ?>
                <li role="presentation"><a href="#siblings" aria-controls="siblings" role="tab" data-toggle="tab"><?php _e('Siblings', 'bogarhazi') ?></a></li>
                <?php endif; ?>
              </ul>

              <div class="tab-content">
                <?php if(strlen(get_field('dogPedigree')) > 0): ?>
                <div role="tabpanel" class="tab-pane fade in active" id="pedigree">
                  <?php echo apply_filters('the_content', '<div class="table-responsive">'.get_field('dogPedigree').'</div>'); ?>
                </div>
                <?php endif; ?>
                <?php if(strlen(get_field('dogOffspring')) > 0): ?>
                <div role="tabpanel" class="tab-pane fade" id="offspring">
                  <?php echo apply_filters('the_content', '<div class="table-responsive">'.get_field('dogOffspring').'</div>'); ?>
                </div>
                <?php endif; ?>
                <?php if(strlen(get_field('dogSiblings')) > 0): ?>
                <div role="tabpanel" class="tab-pane fade" id="siblings">
                  <?php echo apply_filters('the_content', '<div class="table-responsive">'.get_field('dogSiblings').'</div>'); ?>
                </div>
                <?php endif; ?>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <?php if (get_field('dogGallery')): ?>
    <section class="gallery">
      <div class="container">
        <div class="row">
          <div class="col-xs-12 col-sm-12 col-md-12 col-lg-10 col-lg-offset-1">
            <h2 class="text-center"><?php _e('Gallery', 'bogarhazi'); ?></h2>
            <div id="thumbnail-gallery" class="row">
              <?php foreach (get_field('dogGallery') as $i => $image): ?>
                  <div class="col-xs-6 col-sm-6 col-md-4 gallery-image">
                    <a href="<?php echo $image['url'] ?>" class="item"><img src="<?php echo $image['sizes']['dog-gallery'] ?>" alt="<?php the_title(); ?>" class="img-responsive" /></a>
                  </div>
              <?php endforeach; ?>
            </div>
          </div>
        </div>
      </div>
    </section>
  <?php endif; ?>

</main>

<?php get_footer(); ?>
