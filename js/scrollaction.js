/**
 * Scroll listener
 *
 * Designed by Sarah Maris for CupsandCakesRumson.com
 * revised  2/12/2017
 *
 **/
jQuery(window).on('load', function() {

  var $hours = $(".cupscakes-hours");
  var $social = $(".header-social");
  var hideSocial, hideHours;

  window.addEventListener('scroll', function(e) {
    hideSocial = $('.navigation-top').position().top - 50;
    hideHours = hideSocial - 80;

    if (window.scrollY > hideHours) {
      $hours.addClass( "hide-hours" );

      if (window.scrollY > hideSocial) {
        $social.addClass( "hide-social" );

      } else {
        $social.removeClass( "hide-social" );
      }

    } else {
      $hours.removeClass( "hide-hours" );
    }
  });

});
