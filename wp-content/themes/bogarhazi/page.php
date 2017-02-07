<?php get_header(); ?>

<main>

	<section id="page-<?php the_ID(); ?>" <?php post_class(); ?>>
		<div class="container">
			<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-10 col-lg-offset-1">
					<h2 class="text-center"><?php the_title(); ?></h2>
					<div class="page-entry">
						<?php echo apply_filters('the_content', $post->post_content); ?>
					</div>
				</div>
			</div>
		</div>
	</section>

</main>

<?php get_footer(); ?>
