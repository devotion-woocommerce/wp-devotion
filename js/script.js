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
  $('.menu-toggle').click(function(event) {
    event.preventDefault();
    $('body').toggleClass('site-mobile-nav-open');
  });

  $( window ).resize(function() {
    if ($(window).width() > 600) {
      $('body').removeClass('site-mobile-nav-open');
    }
  });

} )( jQuery );
