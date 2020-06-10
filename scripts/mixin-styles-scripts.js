/* Scripts */

( function( $ ) { // opens function

	/* Menu hiding in mobile */
	var menuButton = $( '.menu-toggle' );
	var menu = $( '.tabmenu' );

	function addSubmenuButtons() {
		var customSubMenuLink = $( '.tabmenu .menu-item-has-children > a' );
		var subMenuLink = $( '.tabmenu .page_item_has_children > a' );

		customSubMenuLink.after( '<button class="submenu-toggle"><span class="dashicons dashicons-arrow-down"></span></button>' );
		subMenuLink.after( '<button class="submenu-toggle"><span class="dashicons dashicons-arrow-down"></span></button>' );
	}

	function toggleHideClass() {
		var customSubMenuButton = $( '.tabmenu .menu-item-has-children .submenu-toggle' );
		var subMenuButton = $( '.tabmenu .page_item_has_children .submenu-toggle' );
		var customSubMenu = $( '.tabmenu .sub-menu' );
		var subMenu = $( '.tabmenu .children' );

		customSubMenu.addClass( 'hide' );
		subMenu.addClass( 'hide' );

		menuButton.on( 'click', function () {
			menu.toggleClass( 'hide' );
		} );

		customSubMenuButton.on( 'click', function () {
			$( this ).next( customSubMenu ).toggleClass( 'hide' );
		} );

		subMenuButton.on( 'click', function () {
			$( this ).next( subMenu ).toggleClass( 'hide' );
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

	addSubmenuButtons();
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
