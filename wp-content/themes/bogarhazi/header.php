<!DOCTYPE html>

<html <?php language_attributes(); ?>>

<head>

	<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />

	<?php if (is_search()) { ?>
	<meta name="robots" content="noindex, nofollow, noydir" />
	<?php } else { ?>
	<meta name="robots" content="noydir" />
	<?php } ?>

	<?php if (is_front_page()): ?>
		<title><?php bloginfo('name') ?></title>
	<?php else: ?>
		<title><?php wp_title(); ?></title>
	<?php endif; ?>

	<link rel="shortcut icon" href="<?php echo get_bloginfo('stylesheet_directory');?>/favicon.ico" type="image/x-icon" />

	<!--[if IE]> <style type="text/css">@import "<?php echo insertCss('style-ie.css'); ?>";</style> <![endif]-->

	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />

	<?php if ( is_singular() ) wp_enqueue_script( 'comment-reply' ); ?>

	<?php wp_head(); ?>
	<!-- Insert google fonts here -->
	<link href="https://fonts.googleapis.com/css?family=Lora|Poppins:400,700&subset=latin-ext" rel="stylesheet">
</head>

<body <?php body_class(); ?>>

	<section id="mobile-menu">
		<div class="collapse" id="collapseSearch">
			<?php get_search_form(); ?>
		</div>
		<div class="container">
			<div class="row">
				<div class="col-xs-12">
					<ul>
						<?php
							pll_the_languages(array(
								'dropdown' => 0,
								'display_names_as' => 'slug',
								'hide_if_empty' => false,
								'hide_current' => true,
							));
						?>
						<li>
							<a role="button" data-toggle="collapse" href="#collapseSearch" aria-expanded="false" aria-controls="collapseSearch">
								<i class="fa fa-search" aria-hidden="true"></i>
							</a>
						</li>
						<li>
							<button type="button" class="navbar-toggle" data-toggle="offcanvas" data-target="#offcanvas" data-canvas="body">
						    <i class="fa fa-bars" aria-hidden="true"></i>
						  </button>
						</li>
					</ul>
				</div>
			</div>
		</div>
	</section>

	<header class="navbar navbar-default navbar-fixed-top">
		<div class="container">
			<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-3">
					<div class="logo-box">
						<a href="<?php echo pll_home_url(pll_current_language()); ?>">
							<img src="<?php echo get_bloginfo('stylesheet_directory');?>/assets/img/logo.svg" alt="<?php bloginfo('name'); ?>" class="img-responsive" />
						</a>
					</div>
				</div>
				<div class="hidden-xs hidden-sm col-md-9">
					<div class="row">
						<div class="col-xs-12">
							<ul class="top-menu clearfix">
								<li><?php get_search_form(); ?></li>
								<li>
									<ul class="languages">
										<?php
											pll_the_languages(array(
												'dropdown' => 0,
												'display_names_as' => 'slug',
												'hide_if_empty' => false,
												'hide_current' => true,
											));
										?>
									</ul>
								</li>
								<li><a href="https://www.facebook.com/bogarhazi/" target="_blank"><i class="fa fa-facebook-official" aria-hidden="true"></i></a></li>
							</ul>
						</div>
					</div>
					<div class="row">
						<nav class="col-xs-12">
							<?php
								wp_nav_menu(array(
									'theme_location' => 'header-menu',
									'container' => '',
									'menu_class' => 'menu clearfix',
									'walker' => new Bootstrap_Nav_Walker()
								))
							?>
						</nav>
					</div>
				</div>
			</div>
		</div>
	</header>

	<aside id="offcanvas" class="navmenu navmenu-default navmenu-fixed-right offcanvas" role="navigation">
		<?php
			wp_nav_menu(array(
				'theme_location' => 'header-menu',
				'container' => '',
				'menu_class' => 'menu clearfix',
			))
		?>
	</aside>
