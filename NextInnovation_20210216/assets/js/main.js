!(function($) {  "use strict";
  // Portfolio details carousel
  $(".portfolio-details-carousel").owlCarousel({    autoplay: false,    dots: false,    loop: true,    navigation : false,    margin: 40,    responsiveClass:true,    responsive:{        0:{            items:1        },        767:{            items:2        },        1000:{            items:3        }    }  });})(jQuery);