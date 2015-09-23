<?php
/**
 * devotion functions and definitions.
 *
 * @link https://codex.wordpress.org/Functions_File_Explained
 *
 * @package devotion
 */

if ( ! function_exists( 'devotion_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function devotion_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on devotion, use a find and replace
	 * to change 'devotion' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'devotion', get_template_directory() . '/languages' );

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
		'primary' => esc_html__( 'Primary Menu', 'devotion' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'gallery',
		'caption',
	) );

	/*
	 * Enable support for Post Formats.
	 * See https://developer.wordpress.org/themes/functionality/post-formats/
	 */
	add_theme_support( 'post-formats', array(
		'aside',
		'image',
		'video',
		'quote',
		'link',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'devotion_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
}
endif; // devotion_setup
add_action( 'after_setup_theme', 'devotion_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function devotion_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'devotion_content_width', 640 );
}
add_action( 'after_setup_theme', 'devotion_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function devotion_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'devotion' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'devotion_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function devotion_scripts() {
	wp_enqueue_style( 'devotion-style', get_stylesheet_uri() );

	wp_enqueue_script( 'devotion-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20120206', true );

	wp_enqueue_script( 'devotion-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true );

}
add_action( 'wp_enqueue_scripts', 'devotion_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

/**
 * Load WooCommerce compatibility file.
 */
require get_template_directory() . '/inc/woocommerce.php';

/**
 * Remove WooCommerce stylesheet file.
 */
add_filter( 'woocommerce_enqueue_styles', '__return_empty_array' );

/**
 * Add custom wrapper to woocommerce product loop
 */
remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10);
remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10);

add_action('woocommerce_before_main_content', 'my_theme_wrapper_start', 10);
add_action('woocommerce_after_main_content', 'my_theme_wrapper_end', 10);

function my_theme_wrapper_start() {
  echo '<section id="main spiceflow">';
}
function my_theme_wrapper_end() {
  echo '</section>';
}

/**
 * Remove WooCommerce breadcrumbs.
 */
add_action( 'init', 'jk_remove_wc_breadcrumbs' );
function jk_remove_wc_breadcrumbs() {
  remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20, 0 );
}

/**
 * Remove page title from WooCommerce pages.
 */
function override_page_title() {
	return false;
}
add_filter('woocommerce_show_page_title', 'override_page_title');

/**
 * Remove Showing results functionality site-wide
 */
function woocommerce_result_count() {
  return false;
}

/**
 * Remove "Sort By" from the Woocommerce Shop Page
 */
remove_action( 'woocommerce_before_shop_loop', 'woocommerce_catalog_ordering', 30 );

/**
 * Add overlay shadow element before the end of the shop item loop
 */
function action_woocommerce_after_shop_loop_item_title( $woocommerce_after_shop_loop_item )
{
  echo '<div class="overlay-shadow"></div>';
}
add_action( 'woocommerce_after_shop_loop_item', 'action_woocommerce_after_shop_loop_item_title', 10, 2 );

/**
 * Enqueue Google fonts
 */
function wpb_add_google_fonts()
{
	wp_enqueue_style( 'wpb-google-fonts', 'https://fonts.googleapis.com/css?family=Oswald:400,300', false );
}
add_action( 'wp_enqueue_scripts', 'wpb_add_google_fonts' );
