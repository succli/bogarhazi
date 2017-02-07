<?php get_header(); ?>

<main>

  <section id="carousel" class="carousel slide" data-ride="carousel">
    <div class="carousel-inner" role="listbox">
      <?php if (get_field('slides', 'option')): ?>
        <?php foreach (get_field('slides', 'option') as $key => $slide): ?>
          <div class="item <?php if ($key == 0) echo 'active'; ?>">
            <div class="stellar" data-stellar-background-ratio="1.5" style="background-image: url(<?php echo $slide['url']; ?>)"></div>
          </div>
        <?php endforeach; ?>
      <?php endif; ?>
    </div>
  </section>

  <section id="boxes">
    <div class="container">
      <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-10 col-lg-offset-1">
          <div class="row">
            <?php
              $news = new WP_Query(array(
                'posts_per_page' => 2,
                'post_type' => 'post'
              ));
              $x = 0;
            ?>
            <?php if ($news->have_posts()): ?>
              <?php while($news->have_posts()): $news->the_post(); ?>
                <div class="<?php if($x == 1){ echo 'hidden-xs hidden-sm'; } else { echo 'col-xxs-12 col-xs-6 col-sm-6'; } ?> col-md-4">
                  <article class="hentry">
                    <header class="entry-header">
                      <h2><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h2>
                    </header>
                    <div class="entry">
                      <?php the_excerpt(); ?>
                    </div>
                  </article>
                </div>
                <?php $x++; ?>
              <?php endwhile; wp_reset_query(); ?>
            <?php endif; ?>
            <?php
              $dog = new WP_Query(array(
                'posts_per_page' => 1,
                'post_type' => 'dog',
                'orderby' => 'rand',
              ));
            ?>
            <?php if ($dog->have_posts()): ?>
              <?php while($dog->have_posts()): $dog->the_post(); ?>
                <div class="col-xxs-12 col-xs-6 col-sm-6 col-md-4">
                  <article class="hentry dog">
                    <header class="entry-header">
                      <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                    </header>
                    <div class="entry">
                      <a href="<?php the_permalink(); ?>"><img src="<?php echo the_post_thumbnail_url('dog-gallery'); ?>" alt="" class="img-responsive" /></a>
                    </div>
                  </article>
                </div>
              <?php endwhile; wp_reset_query(); ?>
            <?php endif; ?>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section id="introduction">
    <div class="container">
      <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-5 col-lg-4 col-lg-offset-1">
          <?php if (has_post_thumbnail()): ?>
            <?php the_post_thumbnail(); ?>
          <?php endif; ?>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-7 col-lg-6">
          <?php echo apply_filters('the_content', $post->post_content) ?>
        </div>
      </div>
    </div>
  </section>

</main>

<?php get_footer(); ?>
