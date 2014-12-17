<?php

function theme_styles(){
	wp_enqueue_style('bootstrap', get_template_directory_uri() . '/css/bootstrap.min.css');
	wp_enqueue_style('grayscale', get_template_directory_uri() . '/css/grayscale.css');
	wp_enqueue_style('fontawesome', get_template_directory_uri() . '/font-awesome-4.2.0/css/font-awesome.min.css');
	wp_enqueue_style('arvo', 'http://fonts.googleapis.com/css?family=Karla');
	wp_enqueue_style('montserrat', 'http://fonts.googleapis.com/css?family=Montserrat:400,700');
	wp_enqueue_style('main', get_template_directory_uri() . '/style.css');
}
add_action( 'wp_enqueue_scripts', 'theme_styles' );

function theme_js(){

	global $wp_scripts;

	wp_register_script( 'html5_shiv', 'https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js', '', '', false );
	wp_register_script( 'respond_js', 'https://oss.maxcdn.com/respond/1.4.2/respond.min.js', '', '', false );

	$wp_scripts->add_data('html5_shiv','conditional', 'lt IE 9');
	$wp_scripts->add_data('respond_js','conditional', 'lt IE 9');
	wp_enqueue_script('bootstrap_js', get_template_directory_uri() . '/js/bootstrap.min.js', array('jquery'), '', true );
	wp_enqueue_script('jqueryeasing', get_template_directory_uri() . '/js/jquery.easing.min.js', array('jquery'), '', true );
	wp_enqueue_script('maps', 'https://maps.googleapis.com/maps/api/js?key=AIzaSyDBcH1f8fVdhD8NnL5sQIEPwGmlUJjuKSQ&sensor=false', array('jquery', 'bootstrap_js'), '', true );
	wp_enqueue_script('grayscale', get_template_directory_uri() . '/js/grayscale.js', array('jquery', 'bootstrap_js'), '', true );
	
}

add_action( 'wp_enqueue_scripts', 'theme_js');
require_once('wp_bootstrap_navwalker.php');

//removes admin_bar
//add_filter('show_admin_bar','__return_false');

add_theme_support('menus');
add_theme_support('post-thumbnails');

function register_theme_menus(){
	register_nav_menus( array(
    	'primary' => __( 'Primary Menu', 'boxgallery' ),
	) );
}
add_action('init','register_theme_menus');


// require_once('wp_bootstrap_navwalker.php');


function create_widget( $name, $id, $description ) {

	register_sidebar(array(
		'name' => __( $name ),	 
		'id' => $id, 
		'description' => __( $description ),
		'before_widget' => '<div class="widget">',
		'after_widget' => '</div>',
		'before_title' => '<h2>',
		'after_title' => '</h2>'
	));

}

create_widget( 'Front Page Left', 'front-left', 'Displays on the left of the homepage' );
create_widget( 'Front Page Center', 'front-center', 'Displays in the center of the homepage' );
create_widget( 'Front Page Right', 'front-right', 'Displays on the right of the homepage' );
create_widget( 'Page Sidebar', 'page', 'Displays on the right of a page as a sidebar' );
create_widget( 'Blog Sidebar', 'blog', 'Displays on the right of a blog as a sidebar' );


?>