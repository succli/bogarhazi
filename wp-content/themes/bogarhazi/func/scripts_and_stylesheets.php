<?php
function respy_scripts() {
	if (!is_admin()) {
		wp_deregister_script('jquery');
		wp_register_script('jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/1.12.3/jquery.min.js', false, '1.12.3', true);
		wp_enqueue_script('jquery');

    wp_deregister_script('bootstrap');
		wp_register_script('bootstrap', get_template_directory_uri().'/assets/js/bootstrap.min.js', false, '3.3.6', true);
		wp_enqueue_script('bootstrap');

    wp_deregister_script('jasny-bootstrap');
		wp_register_script('jasny-bootstrap', get_template_directory_uri().'/assets/js/jasny-bootstrap.min.js', false, '3.1.3', true);
		wp_enqueue_script('jasny-bootstrap');

    wp_deregister_script('stellar');
		wp_register_script('stellar', get_template_directory_uri().'/assets/js/jquery.stellar.js', false, '0.6.2', true);
		wp_enqueue_script('stellar');

    wp_deregister_script('lightgallery');
		wp_register_script('lightgallery', get_template_directory_uri().'/assets/js/lightgallery.min.js', false, '1.2.22', true);
		wp_enqueue_script('lightgallery');

    wp_deregister_script('lg-thumbnail');
		wp_register_script('lg-thumbnail', get_template_directory_uri().'/assets/js/lg-thumbnail.min.js', false, '1.2.22', true);
		wp_enqueue_script('lg-thumbnail');

    wp_deregister_script('jvectormap');
		wp_register_script('jvectormap', get_template_directory_uri().'/assets/js/jquery-jvectormap-2.0.3.min.js', false, '2.0.3', true);
		wp_enqueue_script('jvectormap');

    wp_deregister_script('jvectormap-world');
		wp_register_script('jvectormap-world', get_template_directory_uri().'/assets/js/jquery-jvectormap-world-mill-en.js', false, '2.0.3', true);
		wp_enqueue_script('jvectormap-world');

    wp_deregister_script('app');
		wp_register_script('app', get_template_directory_uri().'/assets/js/app.js', false, '1.0.0', true);
		wp_enqueue_script('app');
	}
}
add_action('init', 'respy_scripts');

function respy_styles(){
  if(!is_admin()){
    wp_register_style( 'bootstrap', get_bloginfo('stylesheet_directory').'/assets/css/bootstrap.min.css' );
  	wp_enqueue_style( 'bootstrap' );

		wp_register_style( 'flexboxgrid', get_bloginfo('stylesheet_directory').'/assets/css/flexboxgrid.min.css' );
  	wp_enqueue_style( 'flexboxgrid' );

    wp_register_style( 'jasny-bootstrap', get_bloginfo('stylesheet_directory').'/assets/css/jasny-bootstrap.min.css' );
  	wp_enqueue_style( 'jasny-bootstrap' );

    wp_register_style( 'font-awesome', get_bloginfo('stylesheet_directory').'/assets/css/font-awesome.min.css' );
  	wp_enqueue_style( 'font-awesome' );

    wp_register_style( 'lightgallery', get_bloginfo('stylesheet_directory').'/assets/css/lightgallery.min.css' );
  	wp_enqueue_style( 'lightgallery' );

    wp_register_style( 'jvectormap', get_bloginfo('stylesheet_directory').'/assets/css/jquery-jvectormap-2.0.3.css' );
  	wp_enqueue_style( 'jvectormap' );

    wp_register_style( 'wp-main', get_bloginfo('stylesheet_directory').'/style.css' );
  	wp_enqueue_style( 'wp-main' );

    wp_register_style( 'main', get_bloginfo('stylesheet_directory').'/assets/css/main.css' );
  	wp_enqueue_style( 'main' );
  }
}
add_action('init', 'respy_styles');
