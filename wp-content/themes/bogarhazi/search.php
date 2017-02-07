<?php get_header(); ?>

<main>

	<section class="page-search">
		<div class="container">
			<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-10 col-lg-offset-1">
					<h2><?php echo __('Search results for', 'bogarhazi').': '.get_search_query(); ?></h2>
						<?php if (have_posts()): ?>
						  <?php while(have_posts()): the_post(); ?>
						    <article id="post-<?php the_ID(); ?>" <?php post_class('article') ?>>
						      <div class="row">
						        <div class="col-xs-12">
						          <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
						          <?php the_excerpt(); ?>
						        </div>
						      </div>
						    </article>
								<hr>
						  <?php endwhile; wp_reset_query(); ?>
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
						      <h3><?php _e('No results.', 'bogarhazi'); ?></h3>
						    </div>
						  </div>
						<?php endif; ?>
				</div>
			</div>
		</div>
	</section>

</main>

<?php get_footer(); ?>
