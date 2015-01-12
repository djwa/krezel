<?php

//function test_ajax() {
//	header( "Content-Type: application/json" );
//	$posts_array = get_posts();
//	echo json_encode( $posts_array );
//	die();
//}

function mytheme_enqueue_style() {
	wp_enqueue_style( 'mytheme-style', get_bloginfo( 'template_directory' ) . '/style.css' );
}

function mytheme_enqueue_scripts() {
	// register AngularJS and jQuery
	wp_register_script( 'angular-core', get_bloginfo( 'template_directory' ) . '/bower_components/angular/angular.js', array(), null, false );
//	wp_register_script( 'angular-resource', get_bloginfo( 'template_directory' ) . '/bower_components/angular-resource/angular-resource.js', array(), null, false );
	wp_register_script( 'angular-app', get_bloginfo( 'template_directory' ) . '/app/app.js', array( 'angular-core' ), null, false );
	wp_register_script( 'jq', get_bloginfo( 'template_directory' ) . '/bower_components/jquery/dist/jquery.min.js', array(), null, false );
	// enqueue all scripts
	wp_enqueue_script( 'angular-core' );
//	wp_enqueue_script( 'angular-resource' );
	wp_enqueue_script( 'angular-app' );
	wp_enqueue_script( 'jq' );

	// we need to create a JavaScript variable to store our API endpoint...   
	wp_localize_script( 'angular-core', 'AppAPI', array( 'url' => get_bloginfo( 'wpurl' ) . '/?json=get_recent_posts' ) ); // this is the API address of the JSON API plugin wp-content/plugins/json-api/?json=get_recent_posts
	// ... and useful information such as the theme directory and website url
	wp_localize_script( 'angular-core', 'BlogInfo', array( 'url' => get_bloginfo( 'template_directory' ) . '/', 'site' => get_bloginfo( 'wpurl' ) ) );
}

//  navigation
function jwa_nav()
{
	wp_nav_menu(
	array(
		'theme_location'  => 'header-menu',
		'menu'            => '',
		'container'       => 'div',
		'container_class' => 'menu-{menu slug}-container',
		'container_id'    => '',
		'menu_class'      => 'menu',
		'menu_id'         => '',
		'echo'            => true,
		'fallback_cb'     => 'wp_page_menu',
		'before'          => '',
		'after'           => '',
		'link_before'     => '',
		'link_after'      => '',
		'items_wrap'      => '<ul>%3$s</ul>',
		'depth'           => 0,
		'walker'          => ''
		)
	);
}

// Register Navigation
function register_menu() {
	register_nav_menus( array( // Using array to specify more menus if needed
		'header-menu' => __( 'Header Menu', 'jwatheme' ), // Main Navigation
		'sidebar-menu' => __( 'Sidebar Menu', 'jwatheme' ), // Sidebar Navigation
		'footer-menu' => __( 'Footer Menu', 'jwatheme' ) // Extra Navigation if needed (duplicate as many as you need!)
	) );
}

function my_wp_nav_menu_args( $args = '' ) {
	$args['container'] = false;
	return $args;
}

add_action( 'init', 'register_menu' ); // Add HTML5 Blank Menu
add_filter( 'wp_nav_menu_args', 'my_wp_nav_menu_args' ); // Remove surrounding <div> from WP Navigation
//add_action( "wp_ajax_nopriv_test_ajax", "test_ajax" ); //ajax
//add_action( "wp_ajax_test_ajax", "test_ajax" ); //ajax
add_action( 'wp_enqueue_scripts', 'mytheme_enqueue_style' ); //styles register
add_action( 'wp_enqueue_scripts', 'mytheme_enqueue_scripts' ); //scripts register
?>