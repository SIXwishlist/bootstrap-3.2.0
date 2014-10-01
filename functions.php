<?php

require_once("inc/nav-menu-walker.php");
require_once("inc/tha-theme-hooks.php");

function twentyfourteen_bootstrap_scripts() {
	// Add Lato font, used in the main stylesheet.
	//wp_enqueue_style( 'twentyfourteen-lato', twentyfourteen_font_url(), array(), null );
	
	// Add Genericons font, used in the main stylesheet.
	wp_enqueue_style( 'boot', get_template_directory_uri() . '/css/bootstrap.css', array(), '3.0.2' );
	
	// Add Genericons font, used in the main stylesheet.
	wp_enqueue_style( 'boot-theme', get_template_directory_uri() . '/css/bootstrap-theme.css', array(), '3.0.2' );

	// Add Overwrite
	wp_enqueue_style( 'theme-style', get_template_directory_uri() . '/style.css', array(), '1.0' );

	// Load our main stylesheet.
	//wp_enqueue_style( 'twentyfourteen-style', get_stylesheet_uri(), array( 'genericons' ) );

	// Load the Internet Explorer specific stylesheet.
	//wp_enqueue_style( 'twentyfourteen-ie', get_template_directory_uri() . '/css/ie.css', array( 'twentyfourteen-style', 'genericons' ), '20131205' );
	//wp_style_add_data( 'twentyfourteen-ie', 'conditional', 'lt IE 9' );

	wp_enqueue_script( 'boostrap', get_template_directory_uri() . '/js/bootstrap.min.js', array( 'jquery' ), '3.2.0' );
	
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	if ( is_singular() && wp_attachment_is_image() ) {
		wp_enqueue_script( 'twentyfourteen-keyboard-image-navigation', get_template_directory_uri() . '/js/keyboard-image-navigation.js', array( 'jquery' ), '20130402' );
	}

	if ( is_active_sidebar( 'sidebar-3' ) ) {
		wp_enqueue_script( 'jquery-masonry' );
	}

	if ( is_front_page() && 'slider' == get_theme_mod( 'featured_content_layout' ) ) {
		wp_enqueue_script( 'twentyfourteen-slider', get_template_directory_uri() . '/js/slider.js', array( 'jquery' ), '20131205', true );
		wp_localize_script( 'twentyfourteen-slider', 'featuredSliderDefaults', array(
			'prevText' => __( 'Previous', 'twentyfourteen' ),
			'nextText' => __( 'Next', 'twentyfourteen' )
		) );
	}
}

add_action( 'wp_enqueue_scripts', 'twentyfourteen_bootstrap_scripts' );

/**
 * Twenty Fourteen only works in WordPress 3.6 or later.
 */

if ( ! function_exists( 'twentyfourteen_bootstrap_script' ) ) :
/**
 * Twenty Fourteen setup.
 *
 * Set up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support post thumbnails.
 *
 * @since Twenty Fourteen 1.0
 */
function twentyfourteen_bootstrap_script() {

	/*
	 * Make Twenty Fourteen available for translation.
	 *
	 * Translations can be added to the /languages/ directory.
	 * If you're building a theme based on Twenty Fourteen, use a find and
	 * replace to change 'twentyfourteen' to the name of your theme in all
	 * template files.
	 */
	//load_theme_textdomain( 'twentyfourteen', get_template_directory() . '/languages' );

	// This theme styles the visual editor to resemble the theme style.
	add_editor_style('css/editor-style.css');

	// Add RSS feed links to <head> for posts and comments.
	add_theme_support( 'automatic-feed-links' );

	// Enable support for Post Thumbnails, and declare sizes.
	add_theme_support( 'post-thumbnails' );
	set_post_thumbnail_size( 672, 372, true );
	add_image_size( 'twentyfourteen-full-width', 1038, 576, true );


	// This theme uses wp_nav_menu() in two locations.
	register_nav_menus( array(
		'primary'   => __( 'Top primary menu'),
		'secondary' => __( 'Secondary menu in left sidebar'),
		'footer'	=> __( 'Footer Menu'),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form', 'comment-form', 'comment-list',
	) );

	/*
	 * Enable support for Post Formats.
	 * See http://codex.wordpress.org/Post_Formats
	 */
	add_theme_support( 'post-formats', array(
		'aside', 'image', 'video', 'audio', 'quote', 'link', 'gallery',
	) );

	// This theme allows users to set a custom background.
	add_theme_support( 'custom-background', apply_filters( 'twentyfourteen_custom_background_args', array(
		'default-color' => 'f5f5f5',
	) ) );

	// Add support for featured content.
	add_theme_support( 'featured-content', array(
		'featured_content_filter' => 'twentyfourteen_get_featured_posts',
		'max_posts' => 6,
	) );

	// Add Lato font, used in the main stylesheet.
	wp_enqueue_style( 'twentyfourteen-lato', twentyfourteen_font_url(), array(), null );

	// This theme uses its own gallery styles.
	//add_filter( 'use_default_gallery_style', '__return_false' );
}
endif; // twentyfourteen_bootstrap_script


add_action( 'after_setup_theme', 'twentyfourteen_bootstrap_script' );

function twentyfourteen_get_featured_posts() {
	/**
	 * Filter the featured posts to return in Twenty Fourteen.
	 *
	 * @since Twenty Fourteen 1.0
	 *
	 * @param array|bool $posts Array of featured posts, otherwise false.
	 */
	return apply_filters( 'twentyfourteen_get_featured_posts', array() );
}

function twentyfourteen_widgets_init() {
	
	register_sidebar( array(
		'name'          => __( 'Left Sidebar' ),
		'id'            => 'left-sidebar',
		'description'   => __( 'Main sidebar that appears on the left.' ),
		'before_widget' => '<div id="%1$s" class="row widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
	register_sidebar( array(
		'name'          => __( 'Right Sidebar' ),
		'id'            => 'right-sidebar',
		'description'   => __( 'Additional sidebar that appears on the right.' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
	register_sidebar( array(
		'name'          => __( 'Footer Widget 1' ),
		'id'            => 'footer-widget-1',
		'description'   => __( 'Appears in the footer section of the site.' ),
		'before_widget' => '<div id="%1$s" class="col-sm-3 col-xs-6 footer-widget widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
	register_sidebar( array(
		'name'          => __( 'Footer Widget 2' ),
		'id'            => 'footer-widget-2',
		'description'   => __( 'Appears in the footer section of the site.' ),
		'before_widget' => '<div id="%1$s" class="col-sm-3 col-xs-6 footer-widget widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
	register_sidebar( array(
		'name'          => __( 'Footer Widget 3' ),
		'id'            => 'footer-widget-3',
		'description'   => __( 'Appears in the footer section of the site.' ),
		'before_widget' => '<div id="%1$s" class="col-sm-3  col-xs-6 footer-widget widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
	register_sidebar( array(
		'name'          => __( 'Footer Widget 4' ),
		'id'            => 'footer-widget-4',
		'description'   => __( 'Appears in the footer section of the site.' ),
		'before_widget' => '<div id="%1$s" class="col-sm-3 col-xs-6 footer-widget widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
}
add_action( 'widgets_init', 'twentyfourteen_widgets_init' );

function twentyfourteen_font_url() {
	$font_url = '';
	/*
	 * Translators: If there are characters in your language that are not supported
	 * by Lato, translate this to 'off'. Do not translate into your own language.
	 */
	$font_url = add_query_arg( 'family', urlencode( 'Lato:300,400,700,900,300italic,400italic,700italic' ), "//fonts.googleapis.com/css" );
	return $font_url;
}



?>