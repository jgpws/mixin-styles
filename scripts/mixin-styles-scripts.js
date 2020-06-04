/* Scripts */

( function( $ ) { // opens function

	/* Menu hiding in mobile */
	var menuButton = $( '.menu-toggle' );
	var menu = $( '.tabmenu' );

	function toggleHideClass() {
		menuButton.on( 'click', function () {
			menu.toggleClass( 'hide' );
		} );
	}

	function hideShowMenu() {
		var windowWidth = $( window ).width();

		if ( windowWidth < 768 ) {
			menu.addClass( 'hide' );
		} else {
			menu.removeClass( 'hide' );
		}
	}

	toggleHideClass();
	hideShowMenu();

	var resizeId;

	$( window ).resize( function() {
		clearTimeout( resizeId );
		setTimeout( hideShowMenu, 500 );
	} );

	/* For disappearing placeholder text */
	function makePlaceholderDisappear() {
		var searchbox = $( 'input#s' );

		searchbox.on( 'focus', function() {
			if ( searchbox.val() === 'Enter Your Query' ) {
				searchbox.val( '' );
			}
		} );

		searchbox.on( 'blur', function() {
			if ( searchbox.val() === '' ) {
				searchbox.val( 'Enter Your Query' );
			}
		} );
	}

	makePlaceholderDisappear();
} )( jQuery ); // closes function
