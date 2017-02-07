<?php get_header(); ?>

<main>
  <section class="<?php if(is_tax('litter')){ echo 'dog litter'; } else { echo 'dogs'; } ?>">
		<div class="container">
			<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-12 <?php if(!is_tax('litter')) echo 'col-lg-10 col-lg-offset-1'; ?>">
					<?php if (is_tax('sex-category')): ?>
            <?php
            global $wp_query;
            $term = $wp_query->get_queried_object();
            ?>
						<?php if ($term->slug == __('avaible', 'bogarhazi')): ?>
              <?php get_template_part('content', 'avaible') ?>
            <?php else: ?>
              <?php get_template_part('content', 'dogs'); ?>
						<?php endif; ?>
					<?php endif; ?>
					<?php if (is_post_type_archive() == 'puppy'): ?>
						<?php get_template_part('content', 'puppies'); ?>
					<?php endif; ?>
					<?php if (is_tax('litter')): ?>
						<?php get_template_part('content', 'litter'); ?>
					<?php endif; ?>
				</div>
			</div>
		</div>
	</section>

</main>

<?php get_footer(); ?>
