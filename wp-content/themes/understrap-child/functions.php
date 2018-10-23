<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

function understrap_remove_scripts() {
    wp_dequeue_style( 'understrap-styles' );
    wp_deregister_style( 'understrap-styles' );

    wp_dequeue_script( 'understrap-scripts' );
    wp_deregister_script( 'understrap-scripts' );

    // Removes the parent themes stylesheet and scripts from inc/enqueue.php
}
add_action( 'wp_enqueue_scripts', 'understrap_remove_scripts', 20 );

add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles' );
function theme_enqueue_styles() {

	// Get the theme data
	$the_theme = wp_get_theme();
    wp_enqueue_style( 'child-understrap-styles', get_stylesheet_directory_uri() . '/css/child-theme.min.css', array(), $the_theme->get( 'Version' ) );
    wp_enqueue_script( 'jquery');
	wp_enqueue_script( 'popper-scripts', get_template_directory_uri() . '/js/popper.min.js', array(), false);
    wp_enqueue_script( 'child-understrap-scripts', get_stylesheet_directory_uri() . '/js/child-theme.min.js', array(), $the_theme->get( 'Version' ), true );
    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
        wp_enqueue_script( 'comment-reply' );
    }
}

function add_child_theme_textdomain() {
    load_child_theme_textdomain( 'understrap-child', get_stylesheet_directory() . '/languages' );
}
add_action( 'after_setup_theme', 'add_child_theme_textdomain' );




// register post type realty
add_action( 'init', 'register_post_type_realty' );
function register_post_type_realty() {
	$labels = array(
		'name' => 'Объекты недвижимости',
		'singular_name' => 'Объект недвижимости',
		'add_new' => 'Добавить объект недвижимости',
		'add_new_item' => 'Добавить объект недвижимости',
		'edit_item' => 'Редактировать объект недвижимости',
		'new_item' => 'Новый объект недвижимости',
		'all_items' => 'Все объекты недвижимости',
		'view_item' => 'Просмотр объекта недвижимости',
		'search_items' => 'Искать недвижимость',
		'not_found' =>  'Объектов недвижимости не найдено.',
		'not_found_in_trash' => 'В корзине нет объектов недвижимости.',
		'menu_name' => 'Недвижимость'
	);
	$args = array(
		'labels' => $labels,
		'public' => true,
		'show_ui' => true,
		'has_archive' => true, 
		'menu_icon' => 'dashicons-building',
		'menu_position' => 10,
		'supports' => array( 'title', 'editor', 'comments', 'author', 'thumbnail'),
		'taxonomies' => array('realty_type', 'realty_city')
	);
	register_post_type('realty', $args);
}




// register realty taxonomy
add_action('init', 'create_taxonomy_realty');
function create_taxonomy_realty(){
	
	// type
	register_taxonomy('realty_type', array('realty'), array(
		'label'                 => '',
		'labels'                => array(
			'name'              => 'Типы недвижимости',
			'singular_name'     => 'Тип недвижимости',
			'search_items'      => 'Искать типы недвижимости',
			'all_items'         => 'Все типы недвижимости',
			'view_item '        => 'Просмотр типа недвижимости',
			'edit_item'         => 'Редактировать тип недвижимости',
			'update_item'       => 'Обновить тип недвижимости',
			'add_new_item'      => 'Добавить новый тип недвижимости',
			'new_item_name'     => 'Новый тип недвижимости',
			'menu_name'         => 'Типы недвижимости',
		),
		'public'                => true,
		'hierarchical'          => true, 
		'rewrite'               => true,
		'meta_box_cb' 			=> 'post_categories_meta_box',
	) );
	
	// city
	register_taxonomy('realty_city', array('realty'), array(
		'label'                 => '',
		'labels'                => array(
			'name'              => 'Город',
			'singular_name'     => 'Город',
			'search_items'      => 'Искать город',
			'all_items'         => 'Все города',
			'view_item '        => 'Просмотр города',
			'edit_item'         => 'Редактировать город',
			'update_item'       => 'Обновить город',
			'add_new_item'      => 'Добавить новый город',
			'new_item_name'     => 'Новый город',
			'menu_name'         => 'Города',
		),
		'public'                => true,
		'hierarchical'          => true, 
		'rewrite'               => true,
		'meta_box_cb' 			=> 'post_categories_meta_box',
	) );
}