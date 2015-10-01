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
  $('.cat-parent > a').click(function() {
      $(this).closest('.cat-parent').toggleClass('category-sub-open');
      event.preventDefault();
      event.stopPropagation();
  });

} )( jQuery );
