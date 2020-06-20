<?php

/* Functions for Customizer settings */

function mixin_styles_customize_register( $wp_customize ) {
	/* Use postMessage transport for Site Title and Description */
	$wp_customize->get_setting( 'blogname' )->transport = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport = 'postMessage';

	function mixin_styles_partial_blogname() {
		bloginfo( 'name' );
	}

	function mixin_styles_partial_blogdescription() {
		bloginfo( 'description' );
	}

	/* Colors */
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

	/* Background Image */
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

	/* Layout */
	$wp_customize->add_section( 'mixin_styles_layout_section', array(
		'title' => esc_html__( 'Layout/Theme Styling', 'mixin-styles' ),
		'priority' => 45,
	) );

	$wp_customize->add_setting( 'mixin_styles_menu_style', array(
		'default' => 'tabs',
		'transport' => 'postMessage',
		'sanitize_callback' => 'mixin_styles_sanitize_menu_styling_choices',
 	) );

	$wp_customize->add_control( 'mixin_styles_menu_style', array(
		'type' => 'radio',
		'section' => 'mixin_styles_layout_section',
		'label' => esc_html__( 'Header Menu Style', 'mixin-styles' ),
		'choices' => array(
			'tabs' => esc_html__( 'Tabs', 'mixin-styles' ),
			'wide_tab' => esc_html__( 'Wide Tab', 'mixin-styles' ),
			'buttons' => esc_html__( 'Buttons', 'mixin-styles' ),
		),
	) );

	$wp_customize->add_setting( 'mixin_styles_sidebar', array(
		'default' => 'right',
		'transport' => 'postMessage',
		'sanitize_callback' => 'mixin_styles_sanitize_sidebar_choices',
	) );

	$wp_customize->add_control( 'mixin_styles_sidebar', array(
		'type' => 'radio',
		'section' => 'mixin_styles_layout_section',
		'label' => esc_html__( 'Sidebar Layout', 'mixin-styles' ),
		'description' => esc_html__( 'Layout styles affect desktop widths (1024 pixels and up)', 'mixin-styles' ),
		'choices' => array(
			'right' => esc_html__( 'Right', 'mixin-styles' ),
			'left' => esc_html__( 'Left', 'mixin-styles' ),
			'bottom' => esc_html__( 'Bottom', 'mixin-styles' ),
		)
	) );

	/* Content Options */
	$wp_customize->add_section( 'mixin_styles_content_section', array(
		'title' => esc_html__( 'Content Options', 'mixin-styles' ),
		'priority' => 47,
	) );

	$wp_customize->add_setting( 'mixin_styles_thumbnail_size', array(
		'default' => 'thumbnail',
		'sanitize_callback' => 'mixin_styles_sanitize_tn_choices',
	) );

	$wp_customize->add_control( 'mixin_styles_thumbnail_size', array(
		'type' => 'radio',
		'section' => 'mixin_styles_content_section',
		'label' => esc_html__( 'Featured Image Size', 'mixin-styles' ),
		'choices' => array(
			'thumbnail' => esc_html__( 'Thumbnail', 'mixin-styles' ),
			'medium' => esc_html__( 'Medium', 'mixin-styles' ),
			'large' => esc_html__( 'Large', 'mixin-styles' ),
		),
	) );

	$wp_customize->add_setting( 'mixin_styles_content_length', array(
		'default' => 'full',
		'sanitize_callback' => 'mixin_styles_sanitize_contentlength_choices',
	) );

	$wp_customize->add_control( 'mixin_styles_content_length', array(
		'type' => 'radio',
		'section' => 'mixin_styles_content_section',
		'label' => esc_html__( 'Content Length', 'mixin-styles' ),
		'choices' => array(
			'full' => esc_html__( 'Full Content', 'mixin-styles' ),
			'excerpt' => esc_html__( 'Excerpt', 'mixin-styles' ),
		),
	) );

	/* Implement Selective Refresh */
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
}
add_action( 'customize_register', 'mixin_styles_customize_register' );

// Helper functions

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

function mixin_styles_switch_tn_size() {
	$tn_size = get_theme_mod( 'mixin_styles_thumbnail_size', 'thumbnail' );
	switch ( $tn_size ) {
		case 'medium':
			the_post_thumbnail( 'medium' );
			break;
		case 'large':
			the_post_thumbnail( 'large' );
			break;
		default:
			the_post_thumbnail( 'thumbnail' );
			break;
	}
}

function mixin_styles_menu_button_style() {
	// returns class names for the button style
	$menu_style = get_theme_mod( 'mixin_styles_menu_style', 'tabs' );
	switch ( $menu_style ) {
		case 'wide_tab':
			echo 'menu-toggle--wide';
			break;
		case 'buttons':
			echo 'menu-toggle--buttons';
			break;
		default:
			echo 'menu-toggle--tabs';
			break;
	}
}

function mixin_styles_headermenu_container_class() {
	$menu_style = get_theme_mod( 'mixin_styles_menu_style', 'tabs' );
	switch ( $menu_style ) {
		case 'wide_tab':
			echo 'tabmenu--wide';
			break;
		case 'buttons':
			echo 'tabmenu--buttons';
			break;
		default:
			echo 'tabmenu--tabs';
			break;
	}
}

function mixin_styles_switch_headermenu_style() {
	$menu_style = get_theme_mod( 'mixin_styles_menu_style', 'tabs' );
	switch ( $menu_style ) {
		case 'wide_tab':
			wp_nav_menu( array(
				'theme_location' => 'header-menu',
				'container_class' => 'tabmenu tabmenu--wide',
				'fallback_cb' => 'mixin_styles_page_menu',
			) );
			break;
		case 'buttons':
			wp_nav_menu( array(
				'theme_location' => 'header-menu',
				'container_class' => 'tabmenu tabmenu--buttons',
				'fallback_cb' => 'mixin_styles_page_menu',
			) );
			break;
		default:
			wp_nav_menu( array(
				'theme_location' => 'header-menu',
				'container' => false,
				'items_wrap' => '<ul id="%1$s" class="%2$s" role="menubar">%3$s</ul>',
				'fallback_cb' => 'mixin_styles_page_menu',
			) );
			break;
	}
}

// Sanitization functions

function mixin_styles_sanitize_menu_styling_choices( $input ) {
	if ( !in_array( $input, array( 'tabs', 'wide_tab', 'buttons' ) ) ) {
		$input = 'tabs';
	}
	return $input;
}

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

function mixin_styles_sanitize_sidebar_choices( $input ) {
	if ( !in_array( $input, array( 'right', 'left', 'bottom' ) ) ) {
		$input = 'right';
	}
	return $input;
}

function mixin_styles_sanitize_tn_choices( $input ) {
	if ( !in_array( $input, array( 'thumbnail', 'medium', 'large' ) ) ) {
		$input = 'thumbnail';
	}
	return $input;
}

function mixin_styles_sanitize_contentlength_choices( $input ) {
	if ( !in_array( $input, array( 'full', 'excerpt' ) ) ) {
		$input = 'full';
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
	$color_scheme_option = get_theme_mod( 'mixin_styles_color_schemes', 'default' );

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

	button:hover,
	button:focus,
	input[type="submit"]:hover,
	input[type="submit"]:focus,
	input[type="reset"]:hover,
	input[type="reset"]:focus,
	a.post-page-numbers:hover,
	a.post-page-numbers:focus,
	.wc-block-pagination-ellipsis:hover,
	.wc-block-pagination-ellipsis:focus,
	.wc-block-pagination-page:hover,
	.wc-block-pagination-page:focus {
		background-color: {$colors['bg_color_light']};
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
	.wp-block-button__link,
	.is-style-outline .wp-block-button__link,
	input,
	select,
	textarea,
	a.post-page-numbers {
		border-color: {$colors['entry_link_color']};
	}

	button,
	.wp-block-button__link,
	.is-style-outline .wp-block-button__link:hover,
	input[type="submit"],
	input[type="reset"],
	a.post-page-numbers {
		background: linear-gradient( to bottom,
			#ffffff 0%,
			{$colors['button_bg_color']} 100% );
	}

	a.post-page-numbers {
		color: {$colors['entry_link_color']};
	}

	input:focus,
	textarea:focus {
		background-color: {$colors['bg_color_pale']};
	}

	.searchform input[type=text] {
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

	.tabmenu .menu {
		background-color: {$colors['bg_color_light']};
	}

	.menu-toggle {
		color: {$colors['menu_link_color']};
	}

	.tabmenu .sub-menu .current_page_item a,
	.tabmenu .children .current_page_item a,
	.tabmenu .sub-menu a:focus,
	.tabmenu .children a:focus {
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
	.wp-calendar-nav a:visited,
	.wp-block-calendar table caption {
		color: {$colors['text_color_alt']};
	}

	.wp-block-button__link:hover,
	.wp-block-button__link:focus {
		background-color: {$colors['alt_color_light']};
	}

	.wc-block-pagination-ellipsis,
	.wc-block-pagination-page {
		color: {$colors['menu_link_color']};
	}

	@media ( min-width: 48em) {
		/* large tablets = ~ 768px */
		.tabmenu .menu {
			background-color: transparent;
		}

		.tabmenu--wide .menu {
			background-color: rgba(255, 255, 255, 0.12);
		}

		.tabmenu--tabs > .menu > li > a,
		.tabmenu--tabs > .menu > .menu-item-has-children > a + .submenu-toggle .dashicons-arrow-down,
		.tabmenu--tabs > .menu > .page_item_has_children > a + .submenu-toggle .dashicons-arrow-down {
			color: {$colors['menu_link_color']};
		}

		.tabmenu--wide > .menu > li > a:hover,
		.tabmenu--wide > .menu > li > a:focus {
			color: {$colors['menu_link_color']};
		}

		.tabmenu--tabs > .menu > .menu-item > a,
		.tabmenu--tabs > .menu > .page_item > a,
		.tabmenu--wide > .menu > .menu-item > a:hover,
		.tabmenu--wide > .menu > .page_item > a:hover {
			background-color: {$colors['tab_bg_color']};
		}

		.tabmenu--tabs > .menu > .menu-item-has-children > a + .submenu-toggle,
		.tabmenu--tabs > .menu > .page_item_has_children > a + .submenu-toggle {
			background-color: {$colors['tab_bg_color']};
		}

		.tabmenu .sub-menu,
		.tabmenu .children {
			background-color: {$colors['bg_color_light']};
		}
	}
CSS;

	if (
		$color_scheme_option == 'orange_blue' ||
		$color_scheme_option == 'ylw_violet' ||
	 	$color_scheme_option == 'khaki' ||
	 	$color_scheme_option == 'tan' ||
		$color_scheme_option == 'sandstone' ) {
		$css .= '
@media (min-width: 48em) {
	.tabmenu--buttons .menu {
		border-color: rgba(0, 0, 0, 0.25);
	}

	.tabmenu--wide > .menu > .menu-item-has-children > a + .submenu-toggle .dashicons-arrow-down,
	.tabmenu--wide > .menu > .page_item_has_children > a + .submenu-toggle .dashicons-arrow-down,
	.tabmenu--buttons > .menu > .menu-item-has-children > a + .submenu-toggle .dashicons-arrow-down,
	.tabmenu--buttons > .menu > .page_item_has_children > a + .submenu-toggle .dashicons-arrow-down {
		color: rgba(0, 0, 0, 0.75);
	}

	.tabmenu--wide > .menu > li > a,
	.tabmenu--buttons > .menu > li > a {
		color: #000000;
	}

	#footer,
	#footer a {
		color: #000000;
	}
}';
	}

	return $css;
}
