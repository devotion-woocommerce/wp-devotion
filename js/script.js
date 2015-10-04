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
    $('.thumbnails a').click(function(event) {
      var sourceThumb = $(this).attr('href');
      $(this).closest('.images').find('.woocommerce-main-image').attr('href', sourceThumb);
      $(this).closest('.images').find('.wp-post-image').attr('src', sourceThumb);
      event.preventDefault();
    });
  }


} )( jQuery );
