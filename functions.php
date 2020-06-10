<?php
/* for theme localization */
load_theme_textdomain( 'mixin-styles', get_template_directory_uri() . '/languages' );

/* enqueue stylesheets and scripts */
function mixin_styles_enqueue() {
	// Style sheets
	wp_enqueue_style( 'mixin-styles-basic-reset', get_template_directory_uri() . '/basic_reset.css' );
	wp_enqueue_style( 'mixin-styles-main-stylesheet', get_stylesheet_uri(), array( 'mixin-styles-basic-reset' ) );
	wp_enqueue_style( 'mixin-styles-custom-bg', get_template_directory_uri() . '/custom-styles/custom-bg.css', array( 'mixin-styles-main-stylesheet' ) );
	wp_enqueue_style( 'mixin-styles-extensions', get_template_directory_uri() . '/moz_extensions.css', array( 'mixin-styles-main-stylesheet' ) );
	wp_enqueue_style( 'dashicons' );

	// Scripts
	wp_enqueue_script( 'mixin-styles-scripts', get_template_directory_uri() . '/scripts/mixin-styles-scripts.js', array( 'jquery' ), '', true );
}
add_action( 'wp_enqueue_scripts', 'mixin_styles_enqueue' );

/* Enqueue scripts for live updating in the Customizer */
function mixin_styles_customizer_live_preview() {
	wp_enqueue_script( 'mixin-styles-customizer-preview', get_template_directory_uri() . '/scripts/customize-preview.js', array( 'jquery', 'customize-preview' ), '', true );
	wp_localize_script( 'mixin-styles-customizer-preview', 'previewParams', array(
		'getRootDir' => get_template_directory_uri(),
	) );
}
add_action( 'customize_preview_init', 'mixin_styles_customizer_live_preview' );

/* widgetizing for the sidebar */
function mixin_styles_widgets_init() {
	register_sidebar( array(
			'name' => __( 'Sidebar 1', 'mixin-styles' ),
			'id' => 'sidebar-1',
			'before_title' => '<h3 class="widgettitle">',
			'after_title' => '</h3>'
	) );
}
add_action( 'widgets_init', 'mixin_styles_widgets_init' );

/* http://codex.wordpress.org/Navigation_Menus */
register_nav_menus(
	array( 'header-menu' => esc_html__( 'Header Menu', 'mixin-styles' ) )
);

function mixin_styles_setup() {
	// content_width
	if ( ! isset( $content_width ) ) $content_width = 1024;

	// automatic feed links
	add_theme_support( 'automatic-feed-links' );

	// Add title via functions file
	add_theme_support( 'title-tag' );

	// Post thumbnails
	add_theme_support( 'post-thumbnails' );
	//set_post_thumbnail_size(100, 100, true); // default Post Thumbnail dimensions

	// Selective Refresh
	add_theme_support( 'customize-selective-refresh-widgets' );

	// HTML5 markup
	add_theme_support( 'html5', array( 'comment-list', 'comment-form', 'gallery', 'caption' ) );

	// Custom Header
	$args = array(
		'default-text-color' => 'ffffff',
		'width' => 1920,
		'height' => 480,
		'header-text' => false,
		'flex-width' => true,
		'flex-heaight' => true,
	);
	add_theme_support( 'custom-header', $args );

	// Custom Background
	add_theme_support( 'custom-background' );

	// Custom Logo
	$defaults = array(
		'flex-height' => true,
		'flex-width' => true,
	);
	add_theme_support( 'custom-logo', $defaults );
}
add_action( 'after_setup_theme', 'mixin_styles_setup' );

function mixin_styles_body_classes( $classes ) {
	// For Customizer color schemes
	$color_scheme = get_theme_mod( 'mixin_styles_color_schemes', 'default' );
	$background_image = get_theme_mod( 'mixin_styles_backgrounds', 'none' );
	$sidebar_layout = get_theme_mod( 'mixin_styles_sidebar', 'right' );

	switch( $color_scheme ) {
		case 'blue_orange':
			$classes[] = 'blue-orange';
		break;
		case 'violet_ylw':
			$classes[] = 'violet-yellow';
		break;
		case 'mag_green':
			$classes[] = 'magenta-green';
		break;
		case 'orange_blue':
			$classes[] = 'orange-blue';
		break;
		case 'ylw_violet':
			$classes[] = 'yellow-violet';
		break;
		case 'khaki':
			$classes[] = 'khaki';
		break;
		case 'tan':
			$classes[] = 'tan';
		break;
		case 'sandstone':
			$classes[] = 'sandstone';
		break;
	}

	switch( $background_image ) {
		case 'gray_con_circles':
			$classes[] = 'gray-con-circles';
		break;
		case 'rby_con_circles':
			$classes[] = 'rby-con-circles';
		break;
		case 'ovg_con_circles':
			$classes[] = 'ovg-con-circles';
		break;
		case 'gray_spheres':
			$classes[] = 'gray-spheres';
		break;
		case 'rby_spheres':
			$classes[] = 'rby-spheres';
		break;
		case 'ovg_spheres':
			$classes[] = 'ovg-spheres';
		break;
	}

	switch( $sidebar_layout ) {
		case 'right':
			$classes[] = 'sidebar-right';
			break;
		case 'left':
			$classes[] = 'sidebar-left';
			break;
		case 'bottom':
			$classes[] = 'sidebar-bottom';
			break;
	}

	return $classes;
}
add_filter( 'body_class', 'mixin_styles_body_classes' );

/* Convert HEX codes to RGB */
function mixin_styles_hex_to_rgb( $color ) {
	$color = trim( $color, '#' );

	if( strlen( $color ) == 3 ) {
		$r = hexdec( substr( $color, 0, 1 ) . substr( $color, 0 , 1 ) );
		$g = hexdec( substr( $color, 1, 1 ) . substr( $color, 1, 1 ) );
		$b = hexdec( substr( $color, 2, 1 ) . substr( $color, 2, 1 ) );
	} elseif ( strlen( $color ) == 6 ) {
		$r = hexdec( substr( $color, 0, 2 ) );
		$g = hexdec( substr( $color, 2, 2 ) );
		$b = hexdec( substr( $color, 4, 2 ) );
	} else {
		return array();
	}

	return array(
		'red' => $r,
		'green' => $g,
		'blue' => $b,
	);
}

include ( get_template_directory() . '/customizer.php' );
//for a clean functions file :)
