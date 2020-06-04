<?php

/* Functions for Customizer settings */

function mixin_styles_customize_register( $wp_customize ) {
	/* Use postMessage transport for Site Title and Description */
	$wp_customize->get_setting( 'blogname' )->transport = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport = 'postMessage';

	/* Implement Selective Refresh for the above items */
	if( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial( 'blogname', array(
			'selector' => '.site-title a',
			'render_callback' => 'mixin_styles_partial_blogname',
		) );

		$wp_customize->selective_refresh->add_partial( 'blogdescription', array(
			'selector' => '.site-subtitle',
			'render_callback' => 'mixin_styles_partial_blogdescription',
		) );
	}

	function mixin_styles_partial_blogname() {
		bloginfo( 'name' );
	}

	function mixin_styles_partial_blogdescription() {
		bloginfo( 'description' );
	}

	$wp_customize->add_setting( 'mixin_styles_color_schemes', array(
		'default' => 'default',
		'sanitize_callback' => 'mixin_styles_sanitize_color_schemes',
	) );

	$wp_customize->add_control( 'mixin_styles_color_schemes', array(
		'type' => 'select',
		'section' => 'colors',
		'label' => esc_html__( 'Color Schemes', 'mixin-styles' ),
		'choices' => mixin_styles_get_color_scheme_choices(),
		'priority' => 5,
	) );

	$wp_customize->get_control( 'background_image' )->label = esc_html__( 'Custom Background Image', 'mixin-styles' );

	$wp_customize->add_setting( 'mixin_styles_backgrounds', array(
		'default' => 'none',
		'transport' => 'postMessage',
		'sanitize_callback' => 'mixin_styles_sanitize_backgrounds',
	) );

	$wp_customize->add_control( 'mixin_styles_backgrounds', array(
		'type' => 'select',
		'section' => 'background_image',
		'label' => esc_html__( 'Theme Background Image', 'mixin-styles' ),
		'choices' => mixin_styles_get_background_choices(),
		'priority' => 5,
	) );
}
add_action( 'customize_register', 'mixin_styles_customize_register' );

function mixin_styles_get_background_choices() {
	$background_choices = array(
		'none' => esc_html__( 'No Background Image', 'mixin-styles' ),
		'gray_con_circles' => esc_html__( 'Gray Concentric Circles', 'mixin-styles' ),
		'rby_con_circles' => esc_html__( 'Red, Blue, Yellow Concentric Circles', 'mixin-styles' ),
		'ovg_con_circles' => esc_html__( 'Orange, Violet, Green Concentric Circles', 'mixin-styles' ),
		'gray_spheres' => esc_html__( 'Gray Dotted Spheres', 'mixin-styles' ),
		'rby_spheres' => esc_html__( 'Red, Blue, Yellow Dotted Spheres', 'mixin-styles' ),
		'ovg_spheres' => esc_html__( 'Orange, Violet, Green Dotted Spheres', 'mixin-styles' ),
	);

	return $background_choices;
}

function mixin_styles_color_scheme_array() {
	return apply_filters(
		'mixin_styles_color_array',
		array(
			'default' => array(
				'label' => esc_html__( 'Black/Gray (Default)', 'mixin-styles' ),
				'colors' => array(
					'#000000',
					'#0000cc',
					'#cc0000',
					'#808080',
					'#000000',
					'#eeeeee',
					'#dddddd',
					'#808080',
					'#ffffff',
					'#333333', // Text Color
					'#ffffff',
					'#c0c0c0', // Alt Color Silver
					'#ffffff', // Alt Text Color
 				),
			),
			'blue_orange' => array(
				'label' => esc_html__( 'Blue/Orange', 'mixin-styles' ),
				'colors' => array(
					'#2040c0', // Background Color
					'#0f90b5', // Split Complementary 1
					'#511dc1', // Split Complementary 2
					'#2040c0', // Entry Link Color
					'#0b217b', // Entry Link Hover Color
					'#e8ecfc', // Background Color pale
					'#d1d9f9', // Background Color light
					'#ffb704', // Button/Tab BG Color
					'#0b217b', // Menu Link Color
					'#333333', // Text Color
					'#425cc7', // Alt Blue Dark
					'#798de0', // Alt Blue Light
					'#ffffff', // Alt Text Color
				),
			),
			'violet_ylw' => array(
				'label' => esc_html__( 'Violet/Yellow', 'mixin-styles' ),
				'colors' => array(
					'#820bbb',
					'#4317bf',
					'#d90274',
					'#820bbb',
					'#710aa3',
					'#f4e5fb',
					'#ebcff8',
					'#f8fe03',
					'#710aa3',
					'#333333',
					'#820bbb',
					'#b86bdd', // Alt Violet Light
					'#ffffff',
				),
			),
			'mag_green' => array(
				'label' => esc_html__( 'Magenta/Green', 'mixin-styles' ),
				'colors' => array(
					'#cd00cd',
					'#6412d0',
					'#f00049',
					'#cd00cd',
					'#b400b4',
					'#fce5fc',
					'#f9cef9',
					'#cffa00',
					'#b400b4',
					'#333333',
					'#cd00cd',
					'#e667e6', // Alt Magenta Light
					'#ffffff',
				),
			),
			'orange_blue' => array(
				'label' => esc_html__( 'Orange/Blue', 'mixin-styles' ),
				'colors' => array(
					'#ff870d',
					'#1d39ad',
					'#0abd40',
					'#0d7f9f',
					'#0b6c87',
					'#ffebd7',
					'#ffdebe',
					'#0d7f9f',
					'#ffffff',
					'#ffffff',
					'#ffffff',
					'#ffa54a', // Alt Orange Light
					'#000000',
				),
			),
			'ylw_violet' => array(
				'label' => esc_html__( 'Yelllow/Violet', 'mixin-styles' ),
				'colors' => array(
					'#ffe000',
					'#8c04a8',
					'#172caf',
					'#4811ae',
					'#4811ae',
					'#fffad5',
					'#fff7bc',
					'#4811ae',
					'#ffffff',
					'#ffffff',
					'#ffffff', // Alt White
					'#ffee73', // Alt Yellow Light
					'#000000',
				),
			),
			'khaki' => array(
				'label' => esc_html__( 'Khaki', 'mixin-styles' ),
				'colors' => array(
					'#bdb76b',
					'#5b560f',
					'#373400',
					'#5b560f',
					'#45410b',
					'#f7f4c9',
					'#f4efb3',
					'#ded996',
					'#5b560f',
					'#333333',
					'#565b06',
					'#ded996',
					'#000000',
				),
			),
			'tan' => array(
				'label' => esc_html__( 'Tan', 'mixin-styles' ),
				'colors' => array(
					'#d2b48c',
					'#734f1f',
					'#4e3009',
					'#734f1f',
					'#5f411a',
					'#faead6',
					'#f7debf',
					'#e9d0ae',
					'#734f1f',
					'#333333',
					'#734f1f',
					'#e9d0ae',
					'#000000',
				),
			),
			'sandstone' => array(
				'label' => esc_html__( 'Sandstone', 'mixin-styles' ),
				'colors' => array(
					'#a78d84',
					'#4e2d21',
					'#3c1b0f',
					'#4e2d21',
					'#3c2319',
					'#f4e4df',
					'#edd4cc',
					'#d3bab2',
					'#4e2d21',
					'#333333',
					'#4e2d21',
					'#d3bab2',
					'#000000',
				),
			),
		)
	);
}

if ( ! function_exists( 'mixin_styles_get_color_scheme_choices' ) ) :
	function mixin_styles_get_color_scheme_choices() {
		$color_schemes = mixin_styles_color_scheme_array();
		$color_scheme_control_options = array();

		foreach ( $color_schemes as $color_scheme => $value ) {
			$color_scheme_control_options[ $color_scheme ] = $value['label'];
		}

		return $color_scheme_control_options;
	}
endif;

if ( ! function_exists( 'mixin_styles_get_color_scheme' ) ) :
	function mixin_styles_get_color_scheme() {
		$color_scheme_option = get_theme_mod( 'mixin_styles_color_schemes', 'default' );
		$color_schemes = mixin_styles_color_scheme_array();

		if ( array_key_exists( $color_scheme_option, $color_schemes ) ) {
			return $color_schemes[ $color_scheme_option ]['colors'];
		}

		return $color_schemes['default']['colors'];
	}
endif;

function mixin_styles_sanitize_color_schemes( $input ) {
	$valid = mixin_styles_get_color_scheme_choices();

	if( ! array_key_exists( $input, $valid ) ) {
		$input = 'default';
	}

	return $input;
}

function mixin_styles_sanitize_backgrounds( $input ) {
	$valid = mixin_styles_get_background_choices();

	if( ! array_key_exists( $input, $valid ) ) {
		$input = 'none';
	}

	return $input;
}

// Frontend display

function mixin_styles_color_scheme_css() {
	$color_scheme_option = get_theme_mod( 'mixin_styles_color_schemes', 'default' );

	// Don't do anything if the default color scheme is selected.
	if ( 'default' === $color_scheme_option ) {
		return;
	}

	$color_scheme = mixin_styles_get_color_scheme();
	//echo $color_scheme_option;
	//echo $color_scheme[0];
	$button_color = mixin_styles_hex_to_rgb( $color_scheme[3] );

	$colors = array(
		'background_color' => $color_scheme[0],
		'split_comp_1' => $color_scheme[1],
		'split_comp_2' => $color_scheme[2],
		'menu_link_color' => $color_scheme[8],
		'entry_link_color' => $color_scheme[3],
		'entry_link_hover_color' => $color_scheme[4],
		'bg_color_pale' => $color_scheme[5],
		'bg_color_light' => $color_scheme[6],
		'tab_bg_color' => $color_scheme[7],
		'text_color' => $color_scheme[9],
		'alt_color_dark' => $color_scheme[10],
		'alt_color_light' => $color_scheme[11],
		'text_color_alt' => $color_scheme[12],
		'button_bg_color' => vsprintf( 'rgba( %1$s, %2$s, %3$s, 0.75)', $button_color ),
	);

	$color_scheme_css = mixin_styles_frontend_color_scheme_style( $colors );

	wp_add_inline_style( 'mixin-styles-main-stylesheet', $color_scheme_css );
}
add_action( 'wp_enqueue_scripts', 'mixin_styles_color_scheme_css' );

function mixin_styles_frontend_color_scheme_style( $colors ) {
	$colors = wp_parse_args(
		$colors,
		array(
			'background_color' => '',
			'split_comp_1' => '',
			'split_comp_2' => '',
			'menu_link_color' => '',
			'entry_link_color' => '',
			'entry_link_hover_color' => '',
			'bg_color_pale' => '',
			'bg_color_light' => '',
			'tab_bg_color' => '',
			'text_color' => '',
			'alt_color_dark' => '',
			'alt_color_light' => '',
			'text_color_alt' => '',
			'button_bg_color' => '',
		)
	);

	$css = <<<CSS
	/* Color Scheme overrides */
	body,
	body:not(.custom-background).gray-con-circles,
	body:not(.custom-background).rby-con-circles,
	body:not(.custom-background).ovg-con-circles,
	body:not(.custom-background).gray-spheres,
	body:not(.custom-background).rby-spheres,
	body:not(.custom-background).ovg-spheres {
		background-color: {$colors['background_color']};
	}

	a:link,
	a:visited {
		color: {$colors['split_comp_1']};
	}

	a:hover,
	a:active {
		color: {$colors['split_comp_2']};
	}

	table,
	pre {
		background-color: {$colors['bg_color_pale']};
	}

	caption {
		background-color: {$colors['background_color']};
		color: {$colors['text_color_alt']};
	}

	button,
	input,
	select,
	textarea {
		border-color: {$colors['background_color']};
	}

	button,
	input[type="submit"],
	input[type="reset"] {
		background: linear-gradient( to bottom,
			#ffffff 0%,
			{$colors['button_bg_color']} 100%
		);
		font-weight: bold;
	}

	input:focus,
	textarea:focus {
		background-color: {$colors['bg_color_pale']};
	}

	.searchform input {
		background-color: {$colors['tab_bg_color']};
		background: linear-gradient( to bottom,
			{$colors['tab_bg_color']} 0%,
			#ffffff 100%
		);
		border-color: {$colors['entry_link_color']};
	}

	.site-title a {
		color: #ffffff;
	}

	.menu-toggle {
		background-color: {$colors['tab_bg_color']};
	}

	.tabmenu {
		background-color: {$colors['bg_color_light']};
	}

	.menu-toggle {
		color: {$colors['menu_link_color']};
	}

	.tabmenu ul li li.current_page_item {
		background-color: {$colors['entry_link_color']};
	}

	.navigation,
	.comments-navigation {
		background-color: {$colors['tab_bg_color']};
		color: {$colors['text_color']};
	}

	.navigation a:visited,
	.navigation a:link,
	.comments-navigation a:visited,
	.comments-navigation a:link {
		color: {$colors['alt_color_dark']};
	}

	.entry-title a:link,
	.entry-title a:visited {
		color: {$colors['entry_link_color']};
	}

	.entry-title a:hover,
	.entry-title a:active {
		color: {$colors['entry_link_hover_color']};
	}

	.sticky {
		border-color: {$colors['background_color']};
		background-color: {$colors['bg_color_pale']};
	}

	.thread-even {
		background-color: {$colors['bg_color_pale']};
	}

	.bypostauthor {
		border-left-color: {$colors['alt_color_light']};
	}

	.wp-calendar-nav {
		background-color: {$colors['background_color']};
		color: {$colors['text_color_alt']};
	}

	.wp-calendar-nav a:link,
	.wp-calendar-nav a:visited {
		color: {$colors['text_color_alt']};
	}

	@media ( min-width: 48em) {
		/* large tablets = ~ 768px */
		.tabmenu ul a {
			color: {$colors['menu_link_color']};
		}

		.tabmenu ul li {
			background-color: {$colors['tab_bg_color']};
		}

		.tabmenu ul ul {
			background-color: {$colors['bg_color_light']};
		}
	}

CSS;

	return $css;
}
