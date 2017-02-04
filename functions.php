<?php

<?php
/**
 * Additional Functions
 *
 * Designed by Sarah Maris for CupsandCakesRumson.com based on TwentySeventeen theme
 * revised  2/04/2017
 *
 */

 /*
 * Contents:
 *  1.0 - Add scripts
 *
 *  2.0 - Create Class Taxonomy for pages
 *
 */


/* 1.0  ADD THEME SCRIPTS (include Boostrap for now)
 * --------------------------------------------------*/

add_action( 'wp_enqueue_scripts', 'enqueue_parent_styles' );

function enqueue_parent_styles() {
   wp_enqueue_style( 'wpb-google-fonts', 'https://fonts.googleapis.com/css?family=Changa+One|Crimson+Text:400,700', false );
   wp_enqueue_style( 'parent-style', get_template_directory_uri().'/style.css' );
   wp_enqueue_style('bootstrap-css',get_stylesheet_directory_uri().'/bootstrap/css/bootstrap.min.css');
   wp_enqueue_script('bootstrap-js',get_stylesheet_directory_uri().'/bootstrap/js/bootstrap.min.js');
 
}


/*  2.0 CREATE CLASS TAXONOMY FOR PAGES
 * --------------------------------------------------*/
 // hook into the init action and call create_class_taxonomy when it fires
 add_action( 'init', 'create_class_taxonomy', 0 );

 // create taxonomy to add CSS class to page/section
 function create_class_taxonomy() {
 	// Add new taxonomy, make it hierarchical (like categories)
 	$labels = array(
 		'name'              => _x( 'Page Class', 'taxonomy general name', 'textdomain' ),
 		'singular_name'     => _x( 'Page Class', 'taxonomy singular name', 'textdomain' ),
 		'search_items'      => __( 'Search Page Classes', 'textdomain' ),
 		'all_items'         => __( 'All Page Classes', 'textdomain' ),

 		'edit_item'         => __( 'Edit Page Class', 'textdomain' ),
 		'update_item'       => __( 'Update Page Class', 'textdomain' ),
 		'add_new_item'      => __( 'Add New Page Class', 'textdomain' ),
 		'new_item_name'     => __( 'New Page Class Name', 'textdomain' ),
 		'menu_name'         => __( 'Page Class', 'textdomain' ),
 	);

 	$args = array(
 		'hierarchical'      => false,
 		'labels'            => $labels,
 		'show_ui'           => true,
 		'show_admin_column' => true,
 		'query_var'         => true,
 	);

 	register_taxonomy( 'page_classes', 'page', $args );
}
