( function ( $ ) {
	console.log('Customize Preview is loaded!')

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
					return;
			}
		} );
	} );

} )( jQuery );