<?php /* Template Name: Page with Map */ ?>

<?php get_header(); ?>

<main>

	<section id="page-map"></section>

	<section id="page-<?php the_ID(); ?>" <?php post_class('page-with-map'); ?>>
	  <div class="container">
	    <div class="row middle-sm middle-md middle-lg">
	      <div class="col-xs-12 col-sm-6 col-md-5 col-md-offset-1 col-lg-4 col-lg-offset-1">
          <div class="contact-box">
            <img src="<?php echo get_bloginfo('stylesheet_directory');?>/assets/img/logo-footer.png" alt="<?php bloginfo('name'); ?>" class="img-responsive" />
            <?php echo apply_filters('the_content', $post->post_content); ?>
          </div>
	      </div>
	    </div>
	  </div>
	</section>

</main>

<?php get_footer(); ?>
