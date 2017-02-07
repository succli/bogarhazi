<?php

load_theme_textdomain( 'bogarhazi', get_template_directory().'/languages' );

show_admin_bar(false);

// Add RSS links to <head> section
//automatic_feed_links();

// Clean up the <head>
function removeHeadLinks() {
	remove_action('wp_head', 'rsd_link');
	remove_action('wp_head', 'wlwmanifest_link');
}
add_action('init', 'removeHeadLinks');
remove_action('wp_head', 'wp_generator');

if (function_exists('register_sidebar')) {
	register_sidebar(array(
		'name' => 'Footer column',
		'id'   => 'footer-column',
		'description'   => 'Footer column',
		'before_widget' => '<ul>',
		'after_widget'  => '</ul>',
		'before_title'  => '<h3><i class="fa fa-paw" aria-hidden="true"></i> ',
		'after_title'   => '</h3>'
		));
}

// Activate post thumbnails
if ( function_exists( 'add_theme_support' ) ) {
	add_theme_support( 'post-thumbnails' );
}

// Set up basic menu locations
register_nav_menus (
	array (
		'header-menu' => __( 'Header menu' ),
		'footer-menu' => __( 'Footer menu' ),
		)
	);

// Always fresh css includer
function insertCss($file) {
	$cssFile = get_bloginfo('template_directory') . '/' . $file;
	$cssFilePath = get_template_directory() . '/' . $file;
	$csstime = @filemtime($cssFilePath);
	return $cssFile . '?v=' . $csstime;
};

// Always fresh js includer
function insertJs($file) {
	$jsFile = get_bloginfo('template_directory') . '/' . $file;
	$jsFilePath = get_template_directory() . '/' . $file;
	$jstime = @filemtime($jsFilePath);
	return $jsFile . '?v=' . $jstime;
};

include 'func/scripts_and_stylesheets.php';

class Bootstrap_Nav_Walker extends Walker_Nav_Menu {

   function start_lvl(&$output, $depth = 0, $args = array()) {
      $output .= "\n<ul class=\"dropdown-menu\">\n";
   }

   function start_el(&$output, $item, $depth = 0, $args = array(), $id = 0) {
       $item_html = '';
       parent::start_el($item_html, $item, $depth, $args);

       if ( $item->is_dropdown && $depth === 0 ) {
           $item_html = str_replace( '<a', '<a class="dropdown-toggle" data-toggle="dropdown"', $item_html );
       }

       $output .= $item_html;
    }

    function display_element($element, &$children_elements, $max_depth, $depth = 0, $args, &$output) {
        if ( $element->current )
        $element->classes[] = 'active';

        $element->is_dropdown = !empty( $children_elements[$element->ID] );

        if ( $element->is_dropdown ) {
            if ( $depth === 0 ) {
                $element->classes[] = 'dropdown';
            } elseif ( $depth === 1 ) {
                // Extra level of dropdown menu,
                // as seen in http://twitter.github.com/bootstrap/components.html#dropdowns
                $element->classes[] = 'dropdown-submenu';
            }
        }

    parent::display_element($element, $children_elements, $max_depth, $depth, $args, $output);
    }
}

function dogs_init(){
	$labels = array(
		'name'               => 'Dogs',
		'singular_name'      => 'Dog',
		'menu_name'          => 'Dogs',
		'name_admin_bar'     => 'Dog',
		'add_new'            => 'Add New',
		'add_new_item'       => 'Add New Dog',
		'new_item'           => 'New Dog',
		'edit_item'          => 'Edit Dog',
		'view_item'          => 'View Dog',
		'all_items'          => 'All Dogs',
		'search_items'       => 'Search Dogs',
		'parent_item_colon'  => 'Parent Dogs:',
		'not_found'          => 'No dogs found.',
		'not_found_in_trash' => 'No dogs found in Trash.'
	);

	register_post_type('dog', array(
		'labels' 						 => $labels,
		'description' 			 => 'Dog post type',
		'public' 						 => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_position'      => 5,
		'menu_icon'					 => get_stylesheet_directory_uri().'/assets/img/menu-icon-dogs.png',
		'supports'           => array( 'title', 'thumbnail' )
	));
}
add_action('init', 'dogs_init');

function dogs_taxonomy_init(){

	$labels = array(
		'name'              => 'Dogs',
		'singular_name'     => 'Category',
		'search_items'      => 'Search category',
		'all_items'         => 'All Categories',
		'parent_item'       => 'Parent Category',
		'parent_item_colon' => 'Parent Category:',
		'edit_item'         => 'Edit Category',
		'update_item'       => 'Update Category',
		'add_new_item'      => 'Add New Category',
		'new_item_name'     => 'New Category Name',
		'menu_name'         => 'Category',
	);

	register_taxonomy('sex-category', array('dog'), array(
		'hierarchical'      => true,
		'labels'            => $labels,
		'show_ui'           => true,
		'show_admin_column' => true,
		'query_var'         => true,
		'rewrite'           => array( 'slug' => 'dogs' ),
	));

}
add_action('init', 'dogs_taxonomy_init', 0);

function puppies_init(){
	$labels = array(
		'name'               => 'Puppies',
		'singular_name'      => 'Puppy',
		'menu_name'          => 'Puppies',
		'name_admin_bar'     => 'Puppy',
		'add_new'            => 'Add New',
		'add_new_item'       => 'Add New Puppy',
		'new_item'           => 'New Puppy',
		'edit_item'          => 'Edit Puppy',
		'view_item'          => 'View Puppy',
		'all_items'          => 'All Puppies',
		'search_items'       => 'Search Puppies',
		'parent_item_colon'  => 'Parent Puppies:',
		'not_found'          => 'No Puppies found.',
		'not_found_in_trash' => 'No Puppies found in Trash.'
	);

	register_post_type('puppy', array(
		'labels' 			 => $labels,
		'description' 		 => 'Puppy post type',
		'public' 			 => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_position'      => 5,
		'menu_icon'			 => get_stylesheet_directory_uri().'/assets/img/menu-icon-dogs.png',
		'supports'           => array( 'title', 'thumbnail', 'editor' )
	));
}
add_action('init', 'puppies_init');

function litter_taxonomy_init(){

	$labels = array(
		'name'              => 'Litter',
		'singular_name'     => 'Litter',
		'search_items'      => 'Search Litter',
		'all_items'         => 'All Categories',
		'parent_item'       => 'Parent Litter',
		'parent_item_colon' => 'Parent Litter:',
		'edit_item'         => 'Edit Litter',
		'update_item'       => 'Update Litter',
		'add_new_item'      => 'Add New Litter',
		'new_item_name'     => 'New Litter Name',
		'menu_name'         => 'Litter',
	);

	register_taxonomy('litter', array('puppy'), array(
		'hierarchical'      => true,
		'labels'            => $labels,
		'show_ui'           => true,
		'show_admin_column' => true,
		'query_var'         => true,
		'rewrite'           => array( 'slug' => 'puppies' ),
	));

}
add_action('init', 'litter_taxonomy_init', 0);

add_image_size('dog-gallery', 350, 230, true);

function img_shortcode($atts){
	$atts = shortcode_atts(array(
		'ids' => '',
	), $atts, 'img');

	$html = '<div class="row">';
	$ids = explode(',', $atts['ids']);
	foreach($ids as $id){
		$html .= '<div class="col-xxs-12 col-xs-6 col-sm-'.(12 / count($ids)).'">';
		$html .= wp_get_attachment_image($id, 'dog-gallery');
		$html .= '</div>';
	}
	$html .= '</div>';

	return $html;
}
add_shortcode('img', 'img_shortcode');

if( function_exists('acf_add_options_page') ) {

 	// add parent
	$parent = acf_add_options_page(array(
		'page_title' 	=> 'Theme General Settings',
		'menu_title' 	=> 'Theme Settings',
		'redirect' 		=> false
	));

}

function getContinent($country){
	$countries = array(
		'asia' => array(
			'afghanistan', 'azerbaijan', 'bahrain', 'bangladesh', 'bhutan', 'brunei', 'cambodja', 'china', 'hong_kong', 'india', 'indonesia', 'iran', 'iraq', 'israel', 'japan', 'jordan', 'kazakhstan', 'kuwait', 'kyrgyzstan', 'laos', 'macau', 'malaysia', 'maldives', 'mongolia', 'myanmar', 'nepal', 'north_korea', 'oman', 'pakistan', 'philippines', 'qatar', 'saudi_arabia', 'singapore', 'south_korea', 'sri_lanka', 'syria', 'taiwan', 'tajikistan', 'thailand', 'timor-leste', 'turkmenistan', 'united_arab_emirates', 'uzbekistan', 'vietnam', 'yemen',
		),
		'africa' => array(
			'algeria', 'angola', 'benin', 'botswana', 'burkina_faso', 'burundi', 'cameroon', 'cape_verde', 'central_african_republic', 'chad', 'comoros', 'democratic_republic_of_the_congo', 'djibouti', 'egypt', 'equatorial_guinea', 'eritrea', 'ethiopia', 'gabon', 'gambia', 'ghana', 'ivory_coast', 'kenya', 'lebanon', 'lesotho', 'liberia', 'libya', 'madagascar', 'malawi', 'mali', 'mauritania', 'mauritius', 'morocco', 'mozambique', 'namibia', 'niger', 'nigeria', 'republic_of_congo', 'reunion', 'rwanda', 'sao_tome_and_principe', 'senegal', 'seyshelles', 'sierra_leone', 'somalia', 'south_africa', 'sudan', 'swaziland', 'tanzania', 'togo', 'tunisia', 'uganda', 'zambia', 'zimbabwe',
		),
		'europe' => array(
			'albania', 'andorra', 'armenia', 'austria', 'belarus', 'belgium', 'bosnia-herzegovina', 'bulgaria', 'croatia', 'cyprus', 'czech_republic', 'denmark', 'estonia', 'faroes_islands', 'finland', 'france', 'georgia', 'germany', 'gibraltar', 'greece', 'holy_see', 'hungary', 'iceland', 'ireland', 'italy', 'kosovo', 'latvia', 'liechtenstein', 'lithuania', 'luxembourg', 'macedonia', 'malta', 'moldova', 'monaco', 'montenegro', 'netherlands', 'norway', 'poland', 'portugal', 'romania', 'russia', 'san_marino', 'serbia', 'slovakia', 'slovenia', 'spain', 'sweden', 'switzerland', 'turkey', 'ukraine', 'united_kingdom',
		),
		'namerica' => array(
			'anguilla', 'antigua_and_barbuda', 'aruba', 'bahamas', 'barbados', 'belize', 'bermuda', 'canada', 'cayman_islands', 'cuba', 'dominica', 'dominican_republic', 'el_salvador', 'greenland', 'grenada', 'guadeloupe', 'guatemala', 'guinea', 'guinea_bissau', 'haiti', 'honduras', 'jamaica', 'martinique', 'mexico', 'montserrat', 'netherlands_antilles', 'nicaragua', 'panama', 'puerto_rico', 'saint_lucia', 'st_kitts_and_nevis', 'st_vincent_and_the_grenadines', 'turks_and_caicos_islands', 'united_states', 'virgin_islands',
		),
		'samerica' => array(
			'argentina', 'bolivia', 'brazil', 'chile', 'colombia', 'costa_rica', 'ecuador', 'guyana', 'paraguay', 'peru', 'suriname', 'trinidad_and_tobago', 'uruguay', 'venezuela',
		),
		'oceania' => array(
			'american_samoa', 'australia', 'cook_islands', 'fiji', 'guam', 'kiribati', 'marshall_islands', 'micronesia', 'nauru', 'new_caledonia', 'new_zealand', 'palau', 'papua_new_guinea', 'samoa', 'solomon_islands', 'tahiti', 'tonga', 'tuvalu', 'vanuatu',
		)
	);

	foreach($countries as $continent => $c){
		if(in_array($country, $c)){
			$cont = $continent;
		}
	}

	$continents = array(
		'asia' => __('Asia', 'bogarhazi'),
		'africa' => __('Africa', 'bogarhazi'),
		'europe' => __('Europe', 'bogarhazi'),
		'namerica' => __('North and Central America', 'bogarhazi'),
		'samerica' => __('South America', 'bogarhazi'),
		'oceania' => __('Oceania', 'bogarhazi')
	);

	return $continents[$cont];
}