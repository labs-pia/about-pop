<?php
/**
 * About-Pop functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package About-Pop
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

if ( ! function_exists( 'about_pop_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function about_pop_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on About-Pop, use a find and replace
		 * to change 'about-pop' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'about-pop', get_template_directory() . '/languages' );

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
				'menu-1' => esc_html__( 'Primary', 'about-pop' ),
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
				'about_pop_custom_background_args',
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
add_action( 'after_setup_theme', 'about_pop_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function about_pop_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'about_pop_content_width', 640 );
}
add_action( 'after_setup_theme', 'about_pop_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function about_pop_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'about-pop' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'about-pop' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
	register_sidebar( array(
	'name' => 'Footer Sidebar 1',
	'id' => 'footer-sidebar-1',
	'description' => 'Appears in the footer area',
	'before_widget' => '<aside id="%1$s" class="widget %2$s">',
	'after_widget' => '</aside>',
	'before_title' => '<h3 class="widget-title">',
	'after_title' => '</h3>',
	) );
	register_sidebar( array(
	'name' => 'Footer Sidebar 2',
	'id' => 'footer-sidebar-2',
	'description' => 'Appears in the footer area',
	'before_widget' => '<aside id="%1$s" class="widget %2$s">',
	'after_widget' => '</aside>',
	'before_title' => '<h3 class="widget-title">',
	'after_title' => '</h3>',
	) );
}
add_action( 'widgets_init', 'about_pop_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function about_pop_scripts() {
	wp_enqueue_style( 'about-pop-style', get_stylesheet_uri(), array(), _S_VERSION );
	wp_style_add_data( 'about-pop-style', 'rtl', 'replace' );

	wp_enqueue_script('jquery-js', get_template_directory_uri() . '/js/jquery-min.js', _S_VERSION, '1.0', true);
	wp_enqueue_script( 'about-pop-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'about_pop_scripts' );

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
 * external Contents
 */

/* datenschutz */

if (!function_exists('shortcode_datenschutz')) {
	function shortcode_datenschutz( $atts, $content = null ) {
		$html = file_get_contents("https://assets.region-stuttgart.de/datenschutz-dsgvo-global.php?pdne=1&pdpr=1&pdre=1&pdbe=1&pdab=1&sp2k=1&sp2kfa=1&sp2ktw=1&sp2kgo=1&spsh=1");
        return $html;
	}
}
add_shortcode('datenschutz', 'shortcode_datenschutz');


/* impressum */

if (!function_exists('shortcode_impressum')) {
	function shortcode_impressum( $atts, $content = null ) {
		$html = file_get_contents( "https://assets.region-stuttgart.de/impressum-datenschutz-global.php?DontShowDatenschutz=1" );
		return $html;
	}
}
add_shortcode('impressum', 'shortcode_impressum');

/* read more link */
function new_excerpt_more($more) {
global $post;
   return '… <a class="read_more" href="'. get_permalink($post->ID) . '">' . '&#9658; Mehr<br>Buchen' . '</a>';
}
add_filter('excerpt_more', 'new_excerpt_more');

function about_pop_get_excerpt( $args = array() ) {

	// Default arguments.
	$defaults = array(
		'post'            => '',
		'length'          => 40,
		'readmore'        => false,
		'readmore_text'   => esc_html__( 'read more', 'text-domain' ),
		'readmore_after'  => '',
		'custom_excerpts' => true,
		'disable_more'    => false,
	);

	// Apply filters to allow child themes mods.
	$args = apply_filters( 'about_pop_get_excerpt', $defaults );

	// Parse arguments, takes the function arguments and combines them with the defaults.
	$args = wp_parse_args( $args, $defaults );

	// Apply filters to allow child themes mods.
	$args = apply_filters( 'about_pop_excerpt_args', $args );

	// Extract arguments to make it easier to use below.
	extract( $args );

	// Get the current post.
        $post = get_post( $post );

	// Get the current post id.
	$post_id = $post->ID;

	// Check for custom excerpts.
	if ( $custom_excerpts && has_excerpt( $post_id ) ) {
		$output = $post->post_excerpt;
	}

	// No custom excerpt...so lets generate one.
	else {

		// Create the readmore link.
		$readmore_link = '<a href="' . esc_url( get_permalink( $post_id ) ) . '" class="readmore">' . $readmore_text . $readmore_after . '</a>';

		// Check for more tag and return content if it exists.
		if ( ! $disable_more && strpos( $post->post_content, '<!--more-->' ) ) {
			$output = apply_filters( 'the_content', get_the_content( $readmore_text . $readmore_after ) );
		}

		// No more tag defined so generate excerpt using wp_trim_words.
		else {

			// Generate an excerpt from the post content.
			$output = wp_trim_words( strip_shortcodes( $post->post_content ), $length );

			// Add the readmore text to the excerpt if enabled.
			if ( $readmore ) {

				$output .= apply_filters( 'wpex_readmore_link', $readmore_link );

			}

		}

	}
	echo("custom function is called...");

	// Apply filters and return the excerpt.
	return apply_filters( 'about_pop_get_excerpt', $output );

}

remove_filter('get_the_excerpt', 'wp_trim_excerpt');
add_filter('get_the_excerpt', 'about_pop_get_excerpt'); 