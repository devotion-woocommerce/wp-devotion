/**
 * navigation.js
 *
 * Handles toggling the navigation menu for small screens and enables tab
 * support for dropdown menus.
 */
( function() {
	var container, button, menu, links, subMenus;

	container = document.getElementById( 'site-navigation' );
	if ( ! container ) {
		return;
	}

	button = container.getElementsByTagName( 'button' )[0];
	if ( 'undefined' === typeof button ) {
		return;
	}

	menu = container.getElementsByTagName( 'ul' )[0];

	// Hide menu toggle button if menu is empty and return early.
	if ( 'undefined' === typeof menu ) {
		button.style.display = 'none';
		return;
	}

	menu.setAttribute( 'aria-expanded', 'false' );
	if ( -1 === menu.className.indexOf( 'nav-menu' ) ) {
		menu.className += ' nav-menu';
	}

	button.onclick = function() {
		if ( -1 !== container.className.indexOf( 'toggled' ) ) {
			container.className = container.className.replace( ' toggled', '' );
			button.setAttribute( 'aria-expanded', 'false' );
			menu.setAttribute( 'aria-expanded', 'false' );
		} else {
			container.className += ' toggled';
			button.setAttribute( 'aria-expanded', 'true' );
			menu.setAttribute( 'aria-expanded', 'true' );
		}
	};

	// Get all the link elements within the menu.
	links    = menu.getElementsByTagName( 'a' );
	subMenus = menu.getElementsByTagName( 'ul' );

	// Set menu items with submenus to aria-haspopup="true".
	for ( var i = 0, len = subMenus.length; i < len; i++ ) {
		subMenus[i].parentNode.setAttribute( 'aria-haspopup', 'true' );
	}

	// Each time a menu link is focused or blurred, toggle focus.
	for ( i = 0, len = links.length; i < len; i++ ) {
		links[i].addEventListener( 'focus', toggleFocus, true );
		links[i].addEventListener( 'blur', toggleFocus, true );
	}

	/**
	 * Sets or removes .focus class on an element.
	 */
	function toggleFocus() {
		var self = this;

		// Move up through the ancestors of the current link until we hit .nav-menu.
		while ( -1 === self.className.indexOf( 'nav-menu' ) ) {

			// On li elements toggle the class .focus.
			if ( 'li' === self.tagName.toLowerCase() ) {
				if ( -1 !== self.className.indexOf( 'focus' ) ) {
					self.className = self.className.replace( ' focus', '' );
				} else {
					self.className += ' focus';
				}
			}

			self = self.parentElement;
		}
	}
} )();

/**
 * script.js
 *
 * General usage
 */

( function( $ ) {

  // Make product item click traverse to individual listing
  $('.products .product').on('click', function(){
      window.location = $(this).find('a').attr('href');
  });

  // Cart item click traverse
  $('.site-transaction').on('click', function(){
      window.location = $(this).find('a').attr('href');
  });

  // Sidebar product submenu toggle
  $('.cat-parent > a').click(function(event) {
      $(this).closest('.cat-parent').toggleClass('category-sub-open');
      event.preventDefault();
      event.stopPropagation();
  });

  // Header search visibility toggle
  $('.toggle-search').click(function() {
    $(this).siblings('.searchform').toggleClass('open');
    $(this).siblings('.searchform').find('input:text:visible:first').focus();
  });

  if ($('body').hasClass('single-product')) {

    // Switch main preview img based on thumbnails
    $('.thumbnails a').click(function(event) {
      var sourceThumb = $(this).attr('href');
      $(this).closest('.images').find('.woocommerce-main-image').attr('href', sourceThumb);
      $(this).closest('.images').find('.wp-post-image').attr('src', sourceThumb);
      event.preventDefault();
    });

    // Create overlay lightbox
    $('.woocommerce-main-image').click(function(event) {
      $('.images').clone().appendTo('body').addClass('clone product-lightbox');
      $('body').addClass('lightbox-open');

      var lightbox = $(this).closest('body').find('.product-lightbox');

      $(lightbox).append('<div class="btn-close lightbox-btn-close"></div>');
      event.preventDefault();
    });

    // Close lightbox
    $('body').on('touchend click', '.lightbox-btn-close', function(event) {
      $(this).closest('.product-lightbox').remove();
      $('body').removeClass('lightbox-open');
    })
  }

  // Bind menu to top when scrolling past header
  function fixed_onscroll() {
    var viewportTop = $(window).scrollTop();
    var containerTop = $('#secondary').offset().top;

    if (viewportTop > containerTop) {
      $('.widget_product_categories').addClass('menu-fixed');
      $('body').addClass('has-menu-fixed');
    } else {
      $('.widget_product_categories').removeClass('menu-fixed');
      $('body').removeClass('has-menu-fixed');
    }
  }

  $(window).scroll(fixed_onscroll);
  fixed_onscroll();

  // Toggle mobile navigation
  $('body').on('touchend click', '.mobile-nav-toggle', function(event) {
    event.preventDefault();
    $('body').toggleClass('site-mobile-nav-open');
    $('.mobile-nav-toggle').toggleClass('close');
  });

  $( window ).resize(function() {
    if ($(window).width() > 600) {
      $('body').removeClass('site-mobile-nav-open');
      $('.mobile-nav-toggle').removeClass('close');
    }
  });

} )( jQuery );

/**
 * skip-link-focus-fix.js
 *
 * Helps with accessibility for keyboard only users.
 *
 * Learn more: https://github.com/Automattic/devotion/pull/136
 */
( function() {
	var is_webkit = navigator.userAgent.toLowerCase().indexOf( 'webkit' ) > -1,
	    is_opera  = navigator.userAgent.toLowerCase().indexOf( 'opera' )  > -1,
	    is_ie     = navigator.userAgent.toLowerCase().indexOf( 'msie' )   > -1;

	if ( ( is_webkit || is_opera || is_ie ) && document.getElementById && window.addEventListener ) {
		window.addEventListener( 'hashchange', function() {
			var id = location.hash.substring( 1 ),
				element;

			if ( ! ( /^[A-z0-9_-]+$/.test( id ) ) ) {
				return;
			}

			element = document.getElementById( id );

			if ( element ) {
				if ( ! ( /^(?:a|select|input|button|textarea)$/i.test( element.tagName ) ) ) {
					element.tabIndex = -1;
				}

				element.focus();
			}
		}, false );
	}
})();
