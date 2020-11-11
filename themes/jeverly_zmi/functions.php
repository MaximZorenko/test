<?php
/**
 * jeverly_zmi functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package jeverly_zmi
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

if ( ! function_exists( 'jeverly_zmi_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function jeverly_zmi_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on jeverly_zmi, use a find and replace
		 * to change 'jeverly_zmi' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'jeverly_zmi', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus(
			array(
				'menu-header' => esc_html__( 'header', 'jeverly_zmi' ),
				'menu-footer' => esc_html__( 'footer', 'jeverly_zmi' ),
			)
		);

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
				'style',
				'script',
			)
		);

		// Set up the WordPress core custom background feature.
		add_theme_support(
			'custom-background',
			apply_filters(
				'jeverly_zmi_custom_background_args',
				array(
					'default-color' => 'ffffff',
					'default-image' => '',
				)
			)
		);

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support(
			'custom-logo',
			array(
				'height'      => 250,
				'width'       => 250,
				'flex-width'  => true,
				'flex-height' => true,
			)
		);
	}
endif;
add_action( 'after_setup_theme', 'jeverly_zmi_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function jeverly_zmi_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'jeverly_zmi_content_width', 640 );
}
add_action( 'after_setup_theme', 'jeverly_zmi_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function jeverly_zmi_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'jeverly_zmi' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'jeverly_zmi' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'jeverly_zmi_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function jeverly_zmi_scripts() {
	wp_enqueue_style( 'jeverly_zmi-style', get_stylesheet_uri(), array(), _S_VERSION );
	wp_style_add_data( 'jeverly_zmi-style', 'rtl', 'replace' );


	wp_enqueue_style( 'google-fonts', 'https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&family=Playfair+Display:ital,wght@0,400;0,500;0,600;0,700;0,800;0,900;1,400;1,500;1,600;1,700;1,800;1,900&display=swap' , array(), _S_VERSION );
	wp_enqueue_style( 'bootstrap-style', get_template_directory_uri() . '/assets/bootstrap/css/bootstrap.min.css' , array(), _S_VERSION );
	wp_enqueue_style( 'main-style', get_template_directory_uri() . '/assets/css/main-style.min.css' , array(), _S_VERSION );

	wp_deregister_script( 'jquery' );
	wp_register_script( 'jquery', 'http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js', false, null, true );
	wp_enqueue_script( 'jquery' );
	wp_enqueue_script( 'bootstrap-script', get_template_directory_uri() . '/assets/bootstrap/js/bootstrap.min.js', array(), _S_VERSION, true );
	// wp_enqueue_script( 'typeahead-script', get_template_directory_uri() . '/assets/js/typeahead.bundle.js', array(), _S_VERSION, true );
	wp_enqueue_script( 'main-js', get_template_directory_uri() . '/assets/js/main-js.js', array(), _S_VERSION, true );


	wp_enqueue_script( 'jeverly_zmi-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'jeverly_zmi_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}
function print_res($arr){
    echo "<pre>".print_r($arr, true)."</pre>";
}
/////////////////////////////////////////////////////////////////////////////////////////////
////регистроация сайтбаров
require_once __DIR__ . '/inc/zmi_widgets_social.php';
add_action( 'widgets_init', 'register_my_widgets_test' );
function register_my_widgets_test(){
	register_sidebar( array(
        'name' => __('Социальные сети footer', 'refbaptist'),
        'id' => 'sidebar-social-footer',
		'description' => __('Область для виджетов cоциальные сети', 'refbaptist'),
		'before_widget' => null,
		'after_widget'  => null,
	) );
	
	register_widget('zmi_widgets_social');

}

add_action( 'init', 'register_post_types' );
function register_post_types(){
	register_post_type( 'autor_type', [
		'label'  => esc_html__( 'Аутор', 'jeverly_zmi' ),
		'description'         => '',
		'public'              => true,//!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
		// 'publicly_queryable'  => null, // зависит от public
		// 'exclude_from_search' => null, // зависит от public
		// 'show_ui'             => null, // зависит от public
		// 'show_in_nav_menus'   => null, // зависит от public
		'show_in_menu'        => null, // показывать ли в меню адмнки
		// 'show_in_admin_bar'   => null, // зависит от show_in_menu
		'show_in_rest'        => true, // добавить в REST API. C WP 4.7
		'rest_base'           => null, // $post_type. C WP 4.7
		'menu_position'       => null,
		'menu_icon'           => null,
		//'capability_type'   => 'post',
		//'capabilities'      => 'post', // массив дополнительных прав для этого типа записи
		//'map_meta_cap'      => null, // Ставим true чтобы включить дефолтный обработчик специальных прав
		'hierarchical'        => false,
		'supports'            => [ 'title', 'editor', 'thumbnail', 'author' ], // 'title','editor','author','thumbnail','excerpt','trackbacks','custom-fields','comments','revisions','page-attributes','post-formats'
		// 'taxonomies'          => ['audio_fil'],
		'has_archive'         => true,//!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
		'rewrite'             => true,
		'query_var'           => true,
	] );
	register_post_type( 'gallery_type', [
		'label'  => esc_html__( 'Галерея', 'jeverly_zmi' ),
		'description'         => '',
		'public'              => true,//!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
		// 'publicly_queryable'  => null, // зависит от public
		// 'exclude_from_search' => null, // зависит от public
		// 'show_ui'             => null, // зависит от public
		// 'show_in_nav_menus'   => null, // зависит от public
		'show_in_menu'        => null, // показывать ли в меню адмнки
		// 'show_in_admin_bar'   => null, // зависит от show_in_menu
		'show_in_rest'        => true, // добавить в REST API. C WP 4.7
		'rest_base'           => null, // $post_type. C WP 4.7
		'menu_position'       => null,
		'menu_icon'           => null,
		//'capability_type'   => 'post',
		//'capabilities'      => 'post', // массив дополнительных прав для этого типа записи
		//'map_meta_cap'      => null, // Ставим true чтобы включить дефолтный обработчик специальных прав
		'hierarchical'        => false,
		'supports'            => [ 'title', 'editor', 'thumbnail', 'author','comments' ], // 'title','editor','author','thumbnail','excerpt','trackbacks','custom-fields','comments','revisions','page-attributes','post-formats'
		// 'taxonomies'          => ['audio_fil'],
		'has_archive'         => true,//!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
		'rewrite'             => true,
		'query_var'           => true,
	] );
	
}


/////////////////////////////////////////////////////////////////////////////////////////////
////регистроация метабокса
add_action('add_meta_boxes', 'zmi_metabox');
function zmi_metabox(){
	add_meta_box(
		'like-meta',
		'Количество лайков: ',
		'zmi_metabox_zmi',
		'post'
	);
}
function zmi_metabox_zmi($post_obj){
	$likes = get_post_meta($post_obj->ID, 'like-meta', true);
	$likes = $likes ? $likes : 0;
	echo "<input type='text' name='like-meta' value='".$likes."'>";
}
add_action('save_post', 'zmi_save_meta_like');
function zmi_save_meta_like($post_id){
	if(isset($_POST['like-meta'])){
		update_post_meta($post_id, 'like-meta', $_POST['like-meta']);
	}
}

//////////////////////////////////////////асинхронный запрос кнопка больше
add_action( 'wp_ajax_like_zmi', 'like_zm_function' ); // wp_ajax_{ЗНАЧЕНИЕ ПАРАМЕТРА ACTION!!}
add_action( 'wp_ajax_nopriv_like_zmi', 'like_zm_function' );  // wp_ajax_nopriv_{ЗНАЧЕНИЕ ACTION!!}

function like_zm_function(){
	$i = (int)get_post_meta($_GET['id'], 'like-meta', true);
	$i++;
	echo $i;
	update_post_meta($_GET['id'], 'like-meta', $i );
	die();
}
//////////////////////////////////////////добавление колонки лайков в админку
add_action( 'manage_posts_custom_column', 'zmi_columns_func', 10, 2 );
add_filter( 'manage_posts_columns', 'zmi_columns_func_col_likes' );
function zmi_columns_func( $col_name, $id ){
	if($col_name !== 'col_likes') return;
	$likes = get_post_meta($id, 'like-meta', true);
	echo $likes ? $likes : 0;
}
function zmi_columns_func_col_likes($defaults){
	$type = get_current_screen();
	if($type->post_type === 'post'){
		$defaults['col_likes'] = 'Лайки';
	}
	return $defaults;
}
// удаляет H2 из шаблона пагинации
add_filter('navigation_markup_template', 'my_navigation_template', 10, 2 );
function my_navigation_template( $template, $class ){
	/*
	Вид базового шаблона:
	<nav class="navigation %1$s" role="navigation">
		<h2 class="screen-reader-text">%2$s</h2>
		<div class="nav-links">%3$s</div>
	</nav>
	*/

	return '
	<nav class="navigation %1$s" role="navigation">
		<div class="nav-links">%3$s</div>
	</nav>    
	';
}