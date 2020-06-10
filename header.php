<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width" />
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
<?php
if ( is_singular() ) wp_enqueue_script( 'comment-reply' );
wp_head(); ?>
</head>


<body <?php body_class(); ?>>

<!-- begins wrapper div;
can alternately be called container -->
<div id="wrapper">

<!-- begins header -->
<header id="header" role="banner">
	<?php if( has_custom_logo() ) { ?>
		<div class="logo">
			<?php the_custom_logo(); ?>
		</div>
	<?php } else { ?>
		<div class="header-text">
			<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php bloginfo('name'); ?></a></h1>
			<h2 class="site-subtitle"><?php bloginfo('description'); ?></h2>
		</div>
	<?php } ?>
	<?php if( get_header_image() ) : ?>
		<div id="site-custom-header" class="custom-header">
			<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
				<img src="<?php header_image(); ?>" width="<?php echo absint( get_custom_header()->width ); ?>" height="<?php echo absint( get_custom_header()->height ); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>">
			</a>
		</div>
	<?php endif; ?>
</header>
<!-- ends header -->

<!-- begins searchbox div -->
<div id="searchbox" class="searchbox">
	<form method="get" id="searchform" class="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>" >
		<div>
			<p><label class="screen-reader-text" for="s"><?php esc_html_e( 'Search', 'mixin-styles' ); ?></label></p>
			<input type="text" value="Enter Your Query" name="s" id="s">
		</div>
	</form>
</div>

<!-- begins menu div -->
<button class="menu-toggle <?php mixin_styles_menu_button_style(); ?>"><?php esc_html_e( 'Menu:', 'mixin-styles' ); ?></button>
<?php mixin_styles_switch_headermenu_style();

// fallback page menu when no custom menu is used
function mixin_styles_page_menu() {
	$menu_style = get_theme_mod( 'mixin_styles_menu_style', 'tabs' );
	switch ( $menu_style ) {
		case 'wide_tab':
			wp_page_menu( array(
				'menu_class' => 'tabmenu tabmenu--wide',
				'before' => '<ul class="menu">',
				'after' => '</ul>',
			) );
			break;
		case 'buttons':
			wp_page_menu( array(
				'menu_class' => 'tabmenu tabmenu--buttons',
				'before' => '<ul class="menu">',
				'after' => '</ul>',
			) );
			break;
		default:
			wp_page_menu( array(
				'menu_class' => 'tabmenu tabmenu--tabs',
				'before' => '<ul class="menu">',
				'after' => '</ul>',
			) );
			break;
	}

}
?>
<!-- ends menu div -->
