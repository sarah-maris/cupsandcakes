//https://owlcarousel2.github.io/OwlCarousel2/index.html

$(document).ready(function() {

  $("#owl-comments-caro").owlCarousel({
    autoplay:true,
    autoplayTimeout:2000,
//  autoplayHoverPause:true,  // autoplay not working due to bug in owl code
    items:1,
    margin:10,
    autoHeight:true,
    loop: true,
    nav: true,navText: ["<i class=\"fa fa-chevron-left\" aria-hidden=\"true\"></i>", "<i class=\"fa fa-chevron-right\" aria-hidden=\"true\"></i>" ],
  });

});
