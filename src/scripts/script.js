/**
 * script.js
 *
 * General usage
 */

( function( $ ) {

  // Make product item click traverse to individual listing
  $( 'body' ).on( 'click', '.products .product', function(){
    window.location = $(this).find('a').attr('href');
  });

  // Cart item click traverse
  $( 'body' ).on( 'click', '.site-transaction', function(){
    window.location = $(this).find('a').attr('href');
  });

  // Sidebar product submenu toggle
  $( 'body' ).on( 'click', '.cat-parent > a', function(event) {
    $(this).closest('.cat-parent').toggleClass('category-sub-open');
    event.preventDefault();
    event.stopPropagation();
  });

  // Header search visibility toggle
  $( 'body' ).on( 'click', '.toggle-search', function() {
    $(this).siblings('.searchform').toggleClass('open');
    $(this).siblings('.searchform').find('input:text:visible:first').focus();
  });

  // Toggle mobile navigation
  $( 'body' ).on( 'click', '.mobile-nav-toggle', function(event) {
    event.preventDefault();
    $('body').toggleClass('site-mobile-nav-open');
    $('.mobile-nav-toggle').toggleClass('close');
  });

  // Toggle related products overlay
  $( 'body' ).on( 'click', '.products__related_info', function() {
    $(this).siblings('.products__related').toggleClass('products__related_active');
  });

  // Toggle product details slideout
  $( 'body' ).on( 'click', '.product__details_toggle', function() {
    $(this).siblings('.product__details').toggleClass('product__details_active');
  });

  // Toggle product details close
  $( 'body' ).on( 'click', '.product__details_close', function() {
    $(this).closest('.product__details').toggleClass('product__details_active');
  });

  // Remove WooCommerce notification
  $( 'body' ).on( 'click', '.notice_remove', function() {
    $(this).closest('.notice').remove();
  });

  // Close open mobile menu when resizing browser on mobile
  $( window ).resize(function() {
    if ( $(window).width() > 992 ) {
      $( 'body' ).removeClass( 'site-mobile-nav-open' );
      $( '.mobile-nav-toggle' ).removeClass( 'close' );
    }
  });

  if ( $( 'body' ).hasClass( 'single-product' ) ) {

    // Switch main preview img based on thumbnails
    $( 'body' ).on('click', '.thumbnails a', function(event) {

      var sourceThumb = $(this).attr('href');
      $(this).closest('.product-lightbox').find('.woocommerce-main-image').attr('href', sourceThumb);
      $(this).closest('.product-lightbox').find('.wp-post-image').attr('srcset', sourceThumb);

      event.preventDefault();
    });

    // Create overlay lightbox
    $( 'body' ).on('click', '.woocommerce-main-image, .thumbnails a', function(event) {

      if ( !$( 'body' ).find('.product-lightbox').hasClass('clone') ) {

        $('.product__images').clone().appendTo('body').addClass('clone product-lightbox');
        $('body').addClass('lightbox-open');

        var lightbox = $(this).closest('body').find('.product-lightbox');

        $(lightbox).append('<div class="btn-close lightbox-btn-close"><i class="fa fa-times" aria-hidden="true"></i></div>');

        var sourceThumb = $(this).attr('href');
        $(this).closest('.product-lightbox').find('.woocommerce-main-image').attr('href', sourceThumb);
        $(this).closest('.product-lightbox').find('.wp-post-image').attr('srcset', sourceThumb);

      }

      event.preventDefault();
    });

    // Close lightbox
    $( 'body' ).on( 'click', '.lightbox-btn-close', function() {
      $(this).closest('.product-lightbox').remove();
      $('body').removeClass('lightbox-open');
    });
    
  }

} )( jQuery );
