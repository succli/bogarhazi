<?php /* Template Name: Page with jVectorMap */ ?>

<?php get_header(); ?>

<main>

	<section id="jvectorMap"></section>

	<section id="page-<?php the_ID(); ?>" <?php post_class('page-jvectormap'); ?>>
	  <div class="container">
	    <div class="row">
	      <div class="col-xs-12 col-sm-12 col-md-12 col-lg-10 col-lg-offset-1">
					<?php if (have_rows('exp_dog')): ?>
						<div class="row">
							<div class="col-xs-12 col-sm-6 col-md-4">
								<h3><?php _e('Asia', 'bogarhazi') ?></h3>
								<?php while(have_rows('exp_dog')): the_row(); ?>
									<?php if (getContinent(get_sub_field('country')) == __('Asia', 'bogarhazi')): ?>
										<div class="item">
											<img src="<?php echo get_bloginfo('stylesheet_directory');?>/assets/img/flags/<?php the_sub_field('country'); ?>.png" alt="<?php the_sub_field('country'); ?>" />
											<?php the_sub_field('name'); ?>
										</div>
									<?php endif; ?>
								<?php endwhile; ?>
								<hr>
								<h3><?php _e('North and Central America', 'bogarhazi') ?></h3>
								<?php while(have_rows('exp_dog')): the_row(); ?>
									<?php if (getContinent(get_sub_field('country')) == __('North and Central America', 'bogarhazi')): ?>
										<div class="item">
											<img src="<?php echo get_bloginfo('stylesheet_directory');?>/assets/img/flags/<?php the_sub_field('country'); ?>.png" alt="<?php the_sub_field('country'); ?>" />
											<?php the_sub_field('name'); ?>
										</div>
									<?php endif; ?>
								<?php endwhile; ?>
								<hr>
							</div>
							<div class="col-xs-12 col-sm-6 col-md-4">
								<h3><?php _e('Africa', 'bogarhazi') ?></h3>
								<?php while(have_rows('exp_dog')): the_row(); ?>
									<?php if (getContinent(get_sub_field('country')) == __('Africa', 'bogarhazi')): ?>
										<div class="item">
											<img src="<?php echo get_bloginfo('stylesheet_directory');?>/assets/img/flags/<?php the_sub_field('country'); ?>.png" alt="<?php the_sub_field('country'); ?>" />
											<?php the_sub_field('name'); ?>
										</div>
									<?php endif; ?>
								<?php endwhile; ?>
								<hr>
								<h3><?php _e('South America', 'bogarhazi') ?></h3>
								<?php while(have_rows('exp_dog')): the_row(); ?>
									<?php if (getContinent(get_sub_field('country')) == __('South America', 'bogarhazi')): ?>
										<div class="item">
											<img src="<?php echo get_bloginfo('stylesheet_directory');?>/assets/img/flags/<?php the_sub_field('country'); ?>.png" alt="<?php the_sub_field('country'); ?>" />
											<?php the_sub_field('name'); ?>
										</div>
									<?php endif; ?>
								<?php endwhile; ?>
								<hr>
							</div>
							<div class="col-xs-12 col-sm-6 col-md-4">
								<h3><?php _e('Europe', 'bogarhazi') ?></h3>
								<?php while(have_rows('exp_dog')): the_row(); ?>
									<?php if (getContinent(get_sub_field('country')) == __('Europe', 'bogarhazi')): ?>
										<div class="item">
											<img src="<?php echo get_bloginfo('stylesheet_directory');?>/assets/img/flags/<?php the_sub_field('country'); ?>.png" alt="<?php the_sub_field('country'); ?>" />
											<?php the_sub_field('name'); ?>
										</div>
									<?php endif; ?>
								<?php endwhile; ?>
								<hr>
								<h3><?php _e('Oceania', 'bogarhazi') ?></h3>
								<?php while(have_rows('exp_dog')): the_row(); ?>
									<?php if (getContinent(get_sub_field('country')) == __('Oceania', 'bogarhazi')): ?>
										<div class="item">
											<img src="<?php echo get_bloginfo('stylesheet_directory');?>/assets/img/flags/<?php the_sub_field('country'); ?>.png" alt="<?php the_sub_field('country'); ?>" />
											<?php the_sub_field('name'); ?>
										</div>
									<?php endif; ?>
								<?php endwhile; ?>
								<hr>
							</div>
						</div>
					<?php endif; ?>
	      </div>
	    </div>
	  </div>
	</section>

</main>

<?php get_footer(); ?>
