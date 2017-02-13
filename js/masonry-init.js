/**
 * Masonry script
 *
 * Adapted by Sarah Maris for CupsandCakesRumson.com (see resources below)
 * revised  2/05/2017
 *
 * Resources:
 * https://wpbeaches.com/create-a-masonry-layout-on-the-homeblog-page-in-wordpress/
 *
 *
 **/

jQuery(window).on('load', function() {

  $('#masonry-loop').masonry({
    // options
    itemSelector: '.post'
  });

});
