<?php

function mytheme_enqueue_style() {
	wp_enqueue_style( 'mytheme-style', get_bloginfo( 'template_directory' ) . '/style.css' );
}

function mytheme_enqueue_scripts() {
	// register Libraries
	wp_register_script( 'jq', get_bloginfo( 'template_directory' ) . '/bower_components/jquery/dist/jquery.min.js', array(), null, false );
	wp_register_script( 'carousel', get_bloginfo( 'template_directory' ) . '/bower_components/bootstrap-less/js/carousel.js', array(), null, false );
	wp_register_script( 'transition', get_bloginfo( 'template_directory' ) . '/bower_components/bootstrap-less/js/transition.js', array(), null, false );
	wp_register_script( 'functions', get_bloginfo( 'template_directory' ) . '/assets/js/functions.js', array(), null, false );
	wp_register_script( 'modernizr', get_bloginfo( 'template_directory' ) . '/assets/js/modernizr.custom.js', array(), null, false );

	// enqueue all scripts
	wp_enqueue_script( 'jq' );
	wp_enqueue_script( 'carousel' );
	wp_enqueue_script( 'transition' );
	wp_enqueue_script( 'functions' );
	wp_enqueue_script( 'modernizr' );
}

//  navigation
function jwa_nav() {
	wp_nav_menu(
			array(
				'theme_location' => 'header-menu',
				'menu' => '',
				'container' => 'div',
				'container_class' => 'menu-{menu slug}-container',
				'container_id' => '',
				'menu_class' => 'menu',
				'menu_id' => '',
				'echo' => true,
				'fallback_cb' => 'wp_page_menu',
				'before' => '',
				'after' => '',
				'link_before' => '',
				'link_after' => '',
				'items_wrap' => '<ul class="dl-menu">%3$s</ul>',
				'depth' => 0,
				'walker' => ''
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

// Pagination for paged posts, Page 1, Page 2, Page 3, with Next and Previous Links, No plugin
function html5wp_pagination() {
	global $wp_query;
	$big = 999999999;
	echo paginate_links( array(
		'base' => str_replace( $big, '%#%', get_pagenum_link( $big ) ),
		'format' => '?paged=%#%',
		'current' => max( 1, get_query_var( 'paged' ) ),
		'total' => $wp_query->max_num_pages
	) );
}

// Custom Excerpts
function custom_excerpt_length( $length ) {
	return 20;
}

function custom_excerpt_length2( $length ) {
	return 30;
}

// Create the Custom Excerpts callback
function html5wp_excerpt() {
	global $post;
	add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );
	$output = get_the_excerpt();
	$output = apply_filters( 'wptexturize', $output );
	$output = apply_filters( 'convert_chars', $output );
	$output = '<div class="feed-content"><p>' . $output;
	echo $output;
}

// Create the Custom Excerpts callback
function html5wp_excerpt2() {
	global $post;
	add_filter( 'excerpt_length', 'custom_excerpt_length2', 999 );
	$output = get_the_excerpt();
	$output = apply_filters( 'wptexturize', $output );
	$output = apply_filters( 'convert_chars', $output );
	$output = '<div class="feed-content"><p>' . $output;
	echo $output;
}

// Custom View Article link to Post
function html5_blank_view_article( $more ) {
	global $post;
	return '...</p></div> <a class="read-more-button" href="' . get_permalink( $post->ID ) . '">' . __( 'Read more', 'html5blank' ) . '</a>';
}

// Remove Admin bar
function remove_admin_bar() {
	return false;
}

// Remove wp_head() injected Recent Comment styles
function my_remove_recent_comments_style() {
	global $wp_widget_factory;
	remove_action( 'wp_head', array(
		$wp_widget_factory->widgets['WP_Widget_Recent_Comments'],
		'recent_comments_style'
	) );
}

// If Dynamic Widgets Learn More
if ( function_exists( 'register_sidebar' ) ) {
	register_sidebar( array(
		'name' => __( 'language placeholder', 'html5blank' ),
		'description' => __( 'Your language switcher.', 'html5blank' ),
		'id' => 'lang-ph',
		'before_widget' => '<div>',
		'after_widget' => '</div>',
		'before_title' => '<p class="widget-title">',
		'after_title' => '</p>'
	) );
	register_sidebar( array(
		'name' => __( 'box1', 'html5blank' ),
		'description' => __( 'Content of box1.', 'html5blank' ),
		'id' => 'box1',
		'before_widget' => '<div>',
		'after_widget' => '</div>',
		'before_title' => '<p class="widget-title">',
		'after_title' => '</p>'
	) );
	register_sidebar( array(
		'name' => __( 'box2', 'html5blank' ),
		'description' => __( 'Content of box2.', 'html5blank' ),
		'id' => 'box2',
		'before_widget' => '<div>',
		'after_widget' => '</div>',
		'before_title' => '<p class="widget-title">',
		'after_title' => '</p>'
	) );
	register_sidebar( array(
		'name' => __( 'box3', 'html5blank' ),
		'description' => __( 'Content of box3.', 'html5blank' ),
		'id' => 'box3',
		'before_widget' => '<div>',
		'after_widget' => '</div>',
		'before_title' => '<p class="widget-title">',
		'after_title' => '</p>'
	) );
	register_sidebar( array(
		'name' => __( 'box4', 'html5blank' ),
		'description' => __( 'Content of box4.', 'html5blank' ),
		'id' => 'box4',
		'before_widget' => '<div>',
		'after_widget' => '</div>',
		'before_title' => '<p class="widget-title">',
		'after_title' => '</p>'
	) );
	register_sidebar( array(
		'name' => __( 'chart', 'html5blank' ),
		'description' => __( 'Content of box4.', 'html5blank' ),
		'id' => 'chart',
		'before_widget' => '<div class="chart-container">',
		'after_widget' => '</div>',
		'before_title' => '<p class="widget-title">',
		'after_title' => '</p>'
	) );
}

function shorten( $str, $len ) {
	if ( strlen( $str ) > $len ) {
		return substr( $str, 0, strrpos( substr( $str, 0, $len ), ' ' ) ) . '...';
	} else {
		return $str;
	}
}

add_action( 'widgets_init', 'my_remove_recent_comments_style' ); // Remove inline Recent Comment Styles from wp_head()
add_action( 'init', 'register_menu' ); // Add HTML5 Blank Menu
add_filter( 'wp_nav_menu_args', 'my_wp_nav_menu_args' ); // Remove surrounding <div> from WP Navigation
add_action( 'wp_enqueue_scripts', 'mytheme_enqueue_style' ); //styles register
add_action( 'wp_enqueue_scripts', 'mytheme_enqueue_scripts' ); //scripts register

add_filter( 'the_excerpt', 'shortcode_unautop' ); // Remove auto <p> tags in Excerpt (Manual Excerpts only)
add_filter( 'the_excerpt', 'do_shortcode' ); // Allows Shortcodes to be executed in Excerpt (Manual Excerpts only)
add_filter( 'excerpt_more', 'html5_blank_view_article' ); // Add 'View Article' button instead of [...] for Excerpts
add_filter( 'show_admin_bar', 'remove_admin_bar' ); // Remove Admin bar
add_filter( 'widget_text', 'do_shortcode' ); // Allow shortcodes in Dynamic Sidebar
add_filter( 'widget_text', 'shortcode_unautop' ); // Remove <p> tags in Dynamic Sidebars (better!)
// Remove Filters
remove_filter( 'the_excerpt', 'wpautop' ); // Remove <p> tags from Excerpt altogether


$role_object = get_role( 'editor' );
$role_object->add_cap( 'edit_theme_options' );
?>