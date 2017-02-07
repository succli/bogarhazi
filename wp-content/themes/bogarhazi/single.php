<?php get_header(); ?>

<main>

	<section id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<div class="container">
			<article>
				<div class="inner">
					<div class="row">
						<div class="col-xs-12">
							<?php if (has_post_thumbnail()): ?>
								<div class="post-thumbnail">
									<?php the_post_thumbnail(); ?>
								</div>
							<?php endif; ?>
							<h2><?php the_title(); ?></h2>
							<div class="entry">
								<?php echo apply_filters('the_content', $post->post_content); ?>
							</div>
							<?php if (get_field('gallery')): ?>
								<h2 class="text-center"><?php _e('Gallery', 'bogarhazi'); ?></h2>
		            <div id="thumbnail-gallery" class="row">
		              <?php foreach (get_field('gallery') as $i => $image): ?>
		                <?php if ($i < 9): ?>
		                  <div class="col-xs-6 col-sm-6 col-md-4 gallery-image">
		                    <a href="<?php echo $image['url'] ?>" class="item"><img src="<?php echo $image['sizes']['dog-gallery'] ?>" alt="<?php the_title(); ?>" class="img-responsive" /></a>
		                  </div>
		                <?php endif; ?>
		              <?php endforeach; ?>
		            </div>
							<?php endif; ?>
						</div>
					</div>
					<aside class="date hidden-xs hidden-sm">
						<?php the_time('M') ?>
						<strong><?php the_time('d') ?></strong>
					</aside>
				</div>
			</article>
		</div>
	</section>

</main>

<?php get_footer(); ?>
