	<?php if (get_field('isContactForm', get_the_ID())): ?>
		<?php $form = get_field('formShortcode', get_the_ID()); ?>
		<section id="contact">
			<div class="container">
				<div class="row">
					<div class="col-xs-12 col-sm-12 col-md-12 col-lg-10 col-lg-offset-1">
						<?php echo do_shortcode('[contact-form-7 id="'.$form->ID.'"]'); ?>
					</div>
				</div>
			</div>
		</section>
	<?php endif; ?>

	<?php if (get_post_type() == 'puppy' && get_field('puppyStatus') == 'green'): ?>
		<section id="contact">
			<div class="container">
				<div class="row">
					<div class="col-xs-12 col-sm-12 col-md-12 col-lg-10 col-lg-offset-1">
						<?php echo do_shortcode('[contact-form-7 id="'.get_field('puppyForm', get_the_ID()).'"]'); ?>
					</div>
				</div>
			</div>
		</section>
	<?php endif; ?>

	<footer class="site-footer">
		<section id="footer-info">
			<div class="container">
				<div class="row">
					<div class="col-xs-12 col-sm-12 col-sm-12 col-lg-10 col-lg-offset-1">
						<div class="row">
							<div class="col-xs-12 col-sm-12 col-md-3 col-lg-2">
								<img src="<?php echo get_bloginfo('stylesheet_directory');?>/assets/img/logo-footer.png" alt="<?php bloginfo('name'); ?>" />
							</div>
							<div class="col-xs-12 col-sm-6 col-md-3 col-lg-3">
								<?php dynamic_sidebar('footer-column') ?>
							</div>
							<div class="col-xs-12 col-sm-6 col-md-3">
								<h3><i class="fa fa-paw" aria-hidden="true"></i> <?php _e('Our dogs', 'bogarhazi') ?></h3>
								<?php
									wp_nav_menu(array(
										'theme_location' => 'footer-menu',
										'container' => '',
										'menu_class' => '',
									))
								?>
							</div>
							<div class="hidden-xs hidden-sm col-md-3 col-lg-4">
								<div id="map"></div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
		<section id="footer-copy-right">
			<div class="container">
				<div class="row">
					<div class="col-xs-12 text-center">
						<?php bloginfo('name'); ?> &copy; 2016<?php if(date('Y', time()) > 2016){ echo ' - '.date('Y', time()); } ?>
					</div>
				</div>
			</div>
		</section>
	</footer>

	<?php wp_footer(); ?>
	<script type="text/javascript">
		<?php if(have_rows('exp_dog')): $x = 0; ?>
			jvectorMarkers = [
				<?php while(have_rows('exp_dog')): the_row(); $x++; ?>
					{latLng: [<?php the_sub_field('lat') ?>, <?php the_sub_field('lng') ?>], name: '<?php the_sub_field('name') ?>'}<?php if(count(get_field('exp_dog')) != $x): ?>,<?php endif; ?>
				<?php endwhile; ?>
			];
		<?php endif; ?>

		translations = 
			{
				puppysubject: '<?php _e('Interested in your puppy: '); ?>'
			};

		var map;
		function initMap() {
			var LatLng = {lat: 45.718716, lng: 19.659491};
			map = new google.maps.Map(document.getElementById('map'), {
				center: LatLng,
				zoom: 15
			});

			var marker = new google.maps.Marker({
		    position: LatLng,
		    map: map,
		    title: '<?php bloginfo('name') ?>'
		  });



			<?php if(get_field('latitude') && get_field('longitude')): ?>
			if($('#page-map').length){
				var LatLng = {lat: <?php the_field('latitude') ?>, lng: <?php the_field('longitude') ?>};
				var centerLatLng = {lat: <?php the_field('latitude') ?>, lng: parseFloat(<?php the_field('longitude') ?>) - 0.01};
				map = new google.maps.Map(document.getElementById('page-map'), {
					center: centerLatLng,
					zoom: 15,
					scrollwheel: false,
			    navigationControl: false,
			    mapTypeControl: false,
			    scaleControl: false,
			    draggable: false,
				});

				var p_marker = new google.maps.Marker({
					position: LatLng,
					map: map,
					title: '<?php bloginfo('name') ?>'
				});
			}
			<?php endif; ?>
		}
	</script>
	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAIrAoR7B-YmtFk_grBXfwsXbhx62iVtIE&callback=initMap" async defer></script>

</body>

</html>
