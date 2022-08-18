jQuery(document).ready(function(){
    var brtl = false;
    if (jQuery("body").hasClass('rtl')) brtl = true;

    // appzend custom tab like accordion
    jQuery('.appzend-tab li').on('click', function(){
        var active = false;
        if( jQuery(this).hasClass('active')){
            active = true;
        }
        jQuery(this).parent().find('li').removeClass('active');
        if( active ){
            jQuery(this).removeClass('active');
        }else{
            jQuery(this).addClass('active');
        }
    })

    /**
     * Home Slider 
     */
    jQuery('#banner-slider .owl-carousel').owlCarousel({
        items: 1,
        loop: true,
        smartSpeed: 20000,
        dots: true,
        nav: true,
        autoplay: false,
        mouseDrag: true,
        animateOut: 'fadeOut',
        animateIn: 'flipInX',
        rtl: brtl,
        responsive: {
           0: {
              nav: false,
              mouseDrag: false,
              touchDrag:false,
           },
           600: {
              nav: false,
              mouseDrag: false,
              touchDrag:false,
 
           },
           1000: {
              nav: true,
              mouseDrag: true,
              touchDrag:true,
 
           }
        }
     });
})