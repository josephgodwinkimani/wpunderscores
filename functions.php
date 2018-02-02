<?php
/**
 * wpsunderscores functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package wpsunderscores
 */

if ( ! function_exists( 'wpsunderscores_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function wpsunderscores_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on wpsunderscores, use a find and replace
		 * to change 'wpsunderscores' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'wpsunderscores', get_template_directory() . '/languages' );

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
		register_nav_menus( array(
			'menu-1' => esc_html__( 'Primary', 'wpsunderscores' ),
		) );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'wpsunderscores_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		) );
	}
endif;
add_action( 'after_setup_theme', 'wpsunderscores_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function wpsunderscores_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'wpsunderscores_content_width', 640 );
}
add_action( 'after_setup_theme', 'wpsunderscores_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function wpsunderscores_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'wpsunderscores' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'wpsunderscores' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'wpsunderscores_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function wpsunderscores_scripts() {
	wp_enqueue_style( 'wpsunderscores-materializecss', get_template_directory_uri(). '/css/materialize.min.css' );

	// wp_enqueue_style( 'wpsunderscores-materialcss', get_template_directory_uri(). '/css/material-icons.css' );

	wp_enqueue_style( 'wpsunderscores-style', get_template_directory_uri(). '/css/style.css' );

	wp_enqueue_style( 'wpsunderscores-custom', get_template_directory_uri(). '/css/theme.css' );

	wp_enqueue_script( 'wpsunderscores-materializejs', get_template_directory_uri() . '/js/materialize.min.js');

	wp_enqueue_script( 'wpsunderscores-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

	wp_enqueue_script( 'wpsunderscores-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'wpsunderscores_scripts' );

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

/**
 * Load WooCommerce compatibility file.
 
if ( class_exists( 'WooCommerce' ) ) {
	require get_template_directory() . '/inc/woocommerce.php';
}
*/

if ( class_exists( 'Jigoshop' ) ) {
	require get_template_directory() . '/inc/jigoshop.php';
}

// show extra menus
function register_jk_menus() {
  register_nav_menus(
    array(
      'footer-menu' => __( 'Footer Menu', 'wpsunderscores' ),
      'extra-menu' => __( 'Extra Menu', 'wpsunderscores' )      
    )
  );
}
add_action( 'init', 'register_jk_menus' );

// register footer widgets 
register_sidebar( array(
	'name' => 'Footer Sidebar (col l6 s12)',
	'id' => 'footer-sidebar-1',
	'description' => 'Appears in the footer area',
	'before_widget' => '<aside id="%1$s" class="widget %2$s">',
	'after_widget' => '</aside>',
	'before_title' => '<h5 class="widget-title">',
	'after_title' => '</h5>',
) );

register_sidebar( array(
	'name' => 'Footer Sidebar (col l4 offset-l2 s12)',
	'id' => 'footer-sidebar-2',
	'description' => 'Appears in the footer area',
	'before_widget' => '<aside id="%1$s" class="widget %2$s">',
	'after_widget' => '</aside>',
	'before_title' => '<h5 class="widget-title">',
	'after_title' => '</h5>',
) );

/* 
add_filter( 'wp_nav_menu_items','add_search_box', 10, 2 );
function add_search_box( $items, $args ) {
$items .= '<li class="searchbox-position">' . get_search_form( false ) . '</li>';
return $items;
} */