<?php 
    get_header();

    $terms = get_the_terms(get_the_ID(), 'litter')[0];
?>

<main>

    <section id="puppy-<?php the_ID(); ?>" <?php post_class(); ?>>
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <h2 class="text-center"><?php the_title(); ?></h2>
                </div>
            </div>
            <div class="info-sheet">
                <div class="row middle-md middle-lg">
                    <div class="col-xs-12 col-sm-12 col-md-6">
                        <?php the_post_thumbnail(); ?>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-5 col-lg-offset-1">
                        <div class="data">
                            <?php echo apply_filters('the_content', '<strong>'.__('Name', 'bogarhazi').':</strong> '.get_the_title()); ?>
                            <?php echo apply_filters('the_content', '<strong>'.__('Litter', 'bogarhazi').':</strong> '.$terms->name); ?>
                            <?php echo apply_filters('the_content', '<strong>'.__('Born', 'bogarhazi').':</strong> '.get_field('litterBornDate', $terms->taxonomy.'_'.$terms->term_id)); ?>
                            <?php echo apply_filters('the_content', '<strong>'.__('Gender', 'bogarhazi').':</strong> '.get_field('puppyGender')); ?>
                        </div>
                    </div>
                </div>
            </div>
            <?php if (strlen($post->post_content) > 0): ?>
                <div class="pedigree">
                    <h3 class="text-center"><?php _e('Trial pedigree', 'bogarhazi') ?></h3>
                    <?php echo apply_filters('the_content', str_replace(array('<table>', '</table>'), array('<div class="table-responsive"><table>', '</table></div>'), $post->post_content)); ?>
                </div>
            <?php endif; ?>
            <div class="row">
                <div class="col-xs-12">
                    <?php if (get_field('puppyGallery')): ?>
                        <div id="thumbnail-gallery" class="row">
                            <?php foreach (get_field('puppyGallery') as $i => $image): ?>
                                <div class="col-xs-6 col-sm-6 col-md-4 gallery-image">
                                    <a href="<?php echo $image['url'] ?>" class="item"><img src="<?php echo $image['sizes']['dog-gallery'] ?>" alt="<?php the_title(); ?>" class="img-responsive" /></a>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </section>

</main>

<?php get_footer(); ?>