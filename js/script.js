/**
 * script.js
 *
 * General usage
 */

( function( $ ) {

  // Make product item click traverse to individual listing
  $('.post-type-archive-product .product').on('click', function(){
      window.location = $(this).find('a').attr('href');
  });

} )( jQuery );
