( function ( $ ) {
	//console.log('Customize Preview is loaded!')

	// Update the custom theme supplied background images in real time.
	wp.customize( 'mixin_styles_backgrounds', function( value ) {
		value.bind( function( to ) {
			switch( to ) {
				case 'gray_con_circles':
					$( 'body' ).addClass( 'gray-con-circles' );
					$( 'body' ).removeClass( 'rby-con-circles ovg-con-circles gray-spheres rby-spheres ovg-spheres' );
					break;
				case 'rby_con_circles':
					$( 'body' ).addClass( 'rby-con-circles' );
					$( 'body' ).removeClass( 'gray-con-circles ovg-con-circles gray-spheres rby-spheres ovg-spheres' );
					break;
				case 'ovg_con_circles':
					$( 'body' ).addClass( 'ovg-con-circles' );
					$( 'body' ).removeClass( 'gray-con-circles rby-con-circles gray-spheres rby-spheres ovg-spheres' );
					break;
				case 'gray_spheres':
					$( 'body' ).addClass( 'gray-spheres' );
					$( 'body' ).removeClass( 'gray-con-circles rby-con-circles ovg-con-circles rby-spheres ovg-spheres' );
					break;
				case 'rby_spheres':
					$( 'body' ).addClass( 'rby-spheres' );
					$( 'body' ).removeClass( 'gray-con-circles rby-con-circles ovg-con-circles gray-spheres ovg-spheres' );
					break;
				case 'ovg_spheres':
					$( 'body' ).addClass( 'ovg-spheres' );
					$( 'body' ).removeClass( 'gray-con-circles rby-con-circles ovg-con-circles gray-spheres rby-spheres' );
					break;
				default:
					$( 'body' ).removeClass( 'gray-con-circles rby-con-circles ovg-con-circles gray_spheres rby-spheres ovg-spheres' );
			}
		} );
	} );

	wp.customize( 'mixin_styles_menu_style', function( value ) {
		value.bind( function( to ) {
			switch( to ) {
				case 'tabs':
					$( '.tabmenu' ).addClass( 'tabmenu--tabs' ).removeClass( 'tabmenu--wide tabmenu--buttons' );
					$( '.menu-toggle' ).addClass( 'menu-toggle--tabs' ).removeClass( 'menu-toggle--wide menu-toggle--buttons' );
					break;
				case 'wide_tab':
					$( '.tabmenu' ).addClass( 'tabmenu--wide' ).removeClass( 'tabmenu--tabs tabmenu--buttons' );
					$( '.menu-toggle' ).addClass( 'menu-toggle--wide' ).removeClass( 'menu-toggle--tabs menu-toggle--buttons' );
					break;
				case 'buttons':
					$( '.tabmenu' ).addClass( 'tabmenu--buttons' ).removeClass( 'tabmenu--tabs tabmenu--wide' );
					$( '.menu-toggle' ).addClass( 'menu-toggle--buttons' ).removeClass( 'menu-toggle--tabs menu-toggle--wide' );
					break;
			}
		} );
	} );

	wp.customize( 'mixin_styles_sidebar', function( value ) {
		value.bind( function( to ) {
			switch( to ) {
				case 'right':
					$( 'body' ).addClass( 'sidebar-right' ).removeClass( 'sidebar-left sidebar-bottom' );
					break;
				case 'left':
					$( 'body' ).addClass( 'sidebar-left' ).removeClass( 'sidebar-right sidebar-bottom' );
					break;
				case 'bottom':
					$( 'body' ).addClass( 'sidebar-bottom' ).removeClass( 'sidebar-right sidebar-left' );
					break;
			}
		} );
	} );

} )( jQuery );
