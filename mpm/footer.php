<?php
/**
 * The template for displaying the footer
 *
 */

$widgets_areas = 4;

$has_active_sidebar = false;
if ( $widgets_areas > 0 ) {
    $i = 1;

    while ( $i <= $widgets_areas ) {
        if ( is_active_sidebar( 'footer_' . $i ) ) {
            $has_active_sidebar = true;
            break;
        }

        $i++;
    }
}

?>
    </div><!-- ./inner-wrap -->

    <footer id="colophon" class="site-footer" role="contentinfo">

        <?php if ( $has_active_sidebar ) : ?>

            <div class="footer-wrap">

                <div class="footer-widgets widgets widget-columns-<?php echo esc_attr( $widgets_areas ); ?>">
                    <?php for ( $i = 1; $i <= $widgets_areas; $i ++ ) : ?>

                        <div class="column">
                            <?php dynamic_sidebar( 'footer_' . $i ); ?>
                        </div><!-- .column -->

                    <?php endfor; ?>

                    <div class="clear"></div>
                </div><!-- .footer-widgets -->

            </div>


        <?php endif; ?>

        <?php if ( has_nav_menu( 'tertiary' ) ) { ?>

            <div class="footer-menu">
                <?php wp_nav_menu( array( 'sort_column' => 'menu_order', 'container_class' => 'menu-footer', 'theme_location' => 'tertiary', 'depth' => '1' ) ); ?>
            </div>

        <?php } ?>

        <div class="site-info">
            <div class="copy-info">
                <?php if (has_nav_menu('tertiary')) {
                                        wp_nav_menu(array(
                                            'menu_class' => 'map-policy',
                                            'theme_location' => 'tertiary',
                                        ));
                                    }?>
            </div>

            <span class="copyright">

                <?php
                    
                    /* translators: 1: designedby, 2: link, 3: span tag closed  */
                    printf( esc_html__( ' %1$sCopyright %2$s%3$s', 'foodica' ), '<span>', '<a href="'. esc_url( __( '/mpm_naika', 'foodica' ) ) .'" rel="nofollow" target="_blank">MYANMAR PREMIUM J MEDICAL CLINIC</a>', ' All Rights Reserved.</span>');
                ?>
            </span>

        </div><!-- .site-info -->
    </footer><!-- #colophon -->

</div>

<?php wp_footer(); ?>



<link rel="stylesheet" href="/mpm_naika/wp-content/themes/foodica/assets/css/slick.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<script src="/mpm_naika/wp-content/themes/foodica/assets/js/slick.js"></script>
<script	src="/mpm_naika/wp-content/themes/foodica/assets/js/wow.min.js"></script>
<link href="/mpm_naika/wp-content/themes/foodica/assets/css/animate.css">
<script>
	new WOW().init();
</script>

<script>
jQuery(document).ready(function($){
    var count=0;
    $('.dep_btm .no').each(function() {
        count++;
        $(this).append(count);
    });
    
});
jQuery(document).ready(function($){
$('.operation-time td p').each(function(){
    if($(this).text() =='yi mon thaw'){
        $(this).addClass('yi-mon-thaw');
        $(this).text('');
    }
});
$('.operation-time td p').each(function(){
    if($(this).text() =='Yuichi Kasai'){
        $(this).addClass('yuichi-kasai');
        $(this).text('');
    }
});
});
jQuery(document).ready(function($){
    $('.custom-logo img').removeAttr('style');
})
jQuery(document).ready(function($){
    $('.custom-logo img').attr('style', 'position: unset !important');
//     $('.ss .a2a_kit .a2a_svg').append('<span class="share"> Share </span>');
	$('td.pos').text('');
	$('td.pos.position-1').text('Other Position');
	$abt_lt= $('.about-1-1lt').height();
    $abt_bp = -(($abt_lt / 2)-100);
    $('.about-1-1rg').css({'height': $abt_lt, 'background-position': $abt_bp});
	$abt_2_r= $('.abt-2-2-2r').height();
    $('.abt-2-2-2l').css('height', $abt_2_r);
	$abt_2_bt_r= $('.abt-2-2-2r.bt').height();
    $('.abt-2-2-2l.bt').css('height', $abt_2_bt_r);
	$abt_2_2r= $('.about-2-2').height();
    $('.about-2-1').css({'height': $abt_2_2r, 'background-position': 'bottom'});
	$('.slicknav_nav .menu-item a').each(function(){
	$slick_menu_href = $(this).attr('href');
	if($slick_menu_href == '#'){
	$(this).removeAttr('href');
	}
	$ab_right_g =  $('.ab-right.greeting').height();
	$('.about-content .greeting-img img').css('height', $ab_right_g);
	$ab_right_c =  $('.ab-right.concept').height();
	$('.about-content .concept-img img').css('height', $ab_right_c);
	$user_mail = $('#cuser_email').val();
	$('.cpp_form #fieldname4_1').val($user_mail);
	$user_name = $('#cuser_name').val();
	$('.cpp_form #fieldname5_1').val($user_name);
	});
	$('.ss .sharethis-inline-share-buttons').prepend('<div class="st-btn st-share"><p>Shares</p></div>');


	
    })
	
	$(".cpappb_field_2").html(function (i, html) {
		return html.replace(/&nbsp;/g, '');
	});
	$current_email =$('.um-meta span a').html();
    $('.cpappb_field_2').each(function(){
        if($current_email != $(this).html()){
            $(this).parent('.cpapp_no_wrap').addClass('not_same');
        }
    })
	$( ".cpapp_no_wrap" ).first().addClass( "first_cpapp" );
	$('.cpapp_no_wrap').last().addClass('last_cpapp');
	$( '<div class="cpapp_no_wrap cpapp_h"><div class="cpappb_field_0">Day</div><div class="cpappb_field_1">Time</div><div class="cpappb_field_2">Email</div><div class="cpappb_field_3">Symptom</div><div class="cpappb_field_4">Appointment</div></div><div class="cpapp_break"></div>').insertBefore( 'html[lang="en-GB"]  .cpapp_no_wrap.first_cpapp' );
	$( '<div class="cpapp_no_wrap cpapp_h"><div class="cpappb_field_0">日</div><div class="cpappb_field_1">時間</div><div class="cpappb_field_2">Email</div><div class="cpappb_field_3">症状</div><div class="cpappb_field_4">予約</div></div><div class="cpapp_break"></div>').insertBefore( 'html[lang="ja"]  .cpapp_no_wrap.first_cpapp' );
	$( '<div class="cpapp_no_wrap cpapp_h"><div class="cpappb_field_0">နေ့</div><div class="cpappb_field_1">အချိန်</div><div class="cpappb_field_2">Email</div><div class="cpappb_field_3">ရောဂါလက္ခဏာ</div><div class="cpappb_field_4">ချိန်းဆိုမှု</div></div><div class="cpapp_break"></div>').insertBefore( 'html[lang="my-MM"] .cpapp_no_wrap.first_cpapp');
	
// 	$largestWidth = 720; 
// $('.cpappb_field_3').each(function() { 
// if ($(this).width() > $largestWidth)
//     $largestWidth = $(this).width(); 
//     <div class="cpappb_field_6">Action</div>            
// })
// $(".cpappb_field_3").css({'min-width' : $largestWidth +'px', 'max-width' : $largestWidth+'px' } );

// $('<div class="cpappb_field_5"><a href="#">Edit</a><a href="#">Cancel</a></div>').insertAfter('.ahb-section .cpapp_no_wrap .cpappb_field_4');
	
$user_id = $('.um-cover').attr('data-user_id');
	$('<div class="um-col-120 extra_id"><div class="um-field-label"><label>No.</label></div><div class="um-field-area">'+$user_id+'</div></div>').insertBefore('.um-col-121');
$user_name = $('.um-profile-photo img.gravatar').attr('alt');
$('.um-col-121').html('<div class="um-field-label"><label>Name.</label></div><div class="um-field-area">'+$user_name+'</div>');


$('.um-misc-ul li').first().html('Your account is already Logged in.');
$lang_used = $('html').attr('lang');
if($lang_used == 'en-GB'){
    
   $('.dep-wrap .widget-title').html('Specialty');
    //$('.operation-wrap .widget-title').html('Operation Hour');
}
$abt_top = $('.abt-2-2-2l.top').width();
$('.abt-2-2-2l.bt .widget-title').css('width', $abt_top);
$('html[lang="my-MM"] .operation-wrap .widget-title').html('တိုင်ပင်ဆွေးနွေးချိန်');
$('html[lang="my-MM"] .dep-wrap .widget-title').html('သတင်းအချက်အလက်');

// $user_email =$('.um-field-value a').html();
// $('.patient-email a').each(function(){
// $patient_email = $(this).html();
//     if($user_email != $patient_email){
//         $hide_table = $(this).parent().attr('id');
//         $('table.'+ $hide_table).css('display', 'none');
//     }
// })

$login_user_name = $('.um-profile-photo img.gravatar').attr('alt');
$('.patient-name').each(function(){
$patient_name = $(this).html();
    if(($patient_name == '') || ($login_user_name != $patient_name)){
        $hide_table = $(this).parent().attr('id');
        $('table.'+ $hide_table).css('display', 'none');
    }
})	

$card_height = $('.profile-box').height()+100;
$('.profile-lg').css('height', $card_height);
$('.reserve-btn.condition a img').attr('style', '');	
$('.reserve-btn.condition a, .reserve-btn.condition a img').attr('bis_size', '');
$(document).ready(function() {
$('textarea#fieldname8_1').keypress(function() {
    var dInput = this.value;
    $('input#fieldname8_1').val(dInput).addClass('valid');
    $(".dDimension:contains('" + dInput + "')").css("display","block");
});
$('textarea#fieldname7_1').keypress(function() {
    var dInput = this.value;
    $('input#fieldname7_1').val(dInput).addClass('valid');
    $(".dDimension:contains('" + dInput + "')").css("display","block");
});
$("textarea#fieldname8_1").css("display", "none");
$('#cp_appbooking_pform_1 input[name=dFieldRadio]').on('change', function() {
    if($('input[name=dFieldRadio]:checked', '#cp_appbooking_pform_1').val() == "YES"){
        $("textarea#fieldname8_1").val("").css("display", "block");   
        $("input#fieldname8_1").val("");   
    }
    if($('input[name=dFieldRadio]:checked', '#cp_appbooking_pform_1').val() == "NO"){
        $("textarea#fieldname8_1").val("NO").addClass("valid").css("display","none");
        $("input#fieldname8_1").val("NO").addClass("valid");
    } 
});
$('html[lang="ja"] .captcha').append('<p>入力が完了したら、提出ボタンをクリックしてください。必須項目に空欄があると、提出ボタンを押すことができません。</p>');
$('html[lang="en-GB"] .captcha').append('<p>If you finish the input, please press “submit” button below. If there is a vacant cell, “submit” button does not work.</p>');
$('html[lang="my-MM"] .captcha').append('<p>ထည့်သွင်းမှုကို အပြီးသတ်ပါက၊ ကျေးဇူးပြု၍ အောက်ဖော်ပြပါ “submit” buttonကို နှိပ်ပါ။ လစ်လပ်နေသောဆဲလ်တစ်ခုရှိပါက၊ “submit” buttonအလုပ်မလုပ်ပါ။</p>');
$('#cp_appbooking_pform_1').submit(function(e) {
    e.preventDefault(); // don't submit multiple times
    this.submit(); // use the native submit method of the form element
    $('.htmlUsed.choosen').css('color','#ccc'); // blank the input
});
//call_time();
});	
$(document).ready(function() {
  $referrer =  document.referrer;
  if($referrer.indexOf('/en') > 0){
    $('.thank-youp').html('<p>Once the booking completes, you will receive the email from our clinic, </p><p>When you come to our clinic, please get entrance card at the reception of the building. We have already completed the pre-registration, so you submit your ID to the staffs and tell them you are visiting 5F clinic. </p>')
  }
if($referrer.indexOf('/my') > 0){
    $('.thank-youp').html('<p>ကြိုတင်စာရင်းသွင်းပြီးသည်နှင့် ကျွန်ုပ်တို့၏ဆေးခန်းမှ အီးမေးလ်ကို လက်ခံရရှိမည်ဖြစ်ပါသည်။</p><p>ကျွန်ုပ်တို့၏ ဆေးခန်းသို့ သင်လာရောက်သောအခါ ကျေးဇူးပြု၍ အဆောက်အဦ၏ ဧည့်ကြိုကောင်တာတွင် ဝင်ခွင့်ကို ရယူပါ။ ကျွန်ုပ်တို့သည် ကြိုတင်စာရင်းပေးသွင်းခြင်းအား ပြီးမြောက်ပြီးဖြစ်သောကြောင့် သင်သည် 5F ဆေးခန်းသို့ သွားရောက်လည်ပတ်နေသော ဝန်ထမ်းများထံ သင်၏ ID ကို ဝန်ထမ်းများထံ တင်ပြပြီး ၎င်းတို့အား ပြောပြပါ။</p>')
  }
$('html[lang="ja"] .pbSubmit').text("提出");
$('.a2a_kit .a2a_label').each(function(){$(this).addClass('share_label')});
});
</script>
<script type="text/javascript">
$('.abt-slider').slick({
                slidesToShow: 1,
                slidesToScroll: 1,
                arrows: false,
                fade: false,
                asNavFor: '.slider-nav-thumbnails',
             });
    
             $('.slider-nav-thumbnails').slick({
                slidesToShow: 5,
                slidesToScroll: 1,
                asNavFor: '.abt-slider',
                dots: true,
                focusOnSelect: true
             });
    
             // Remove active class from all thumbnail slides
             $('.slider-nav-thumbnails .slick-slide').removeClass('slick-active');
    
             // Set active class to first thumbnail slides
             $('.slider-nav-thumbnails .slick-slide').eq(0).addClass('slick-active');
    
             // On before slide change match active thumbnail to current slide
             $('.abt-slider').on('beforeChange', function (event, slick, currentSlide, nextSlide) {
                var mySlideNumber = nextSlide;
                $('.slider-nav-thumbnails .slick-slide').removeClass('slick-active');
                $('.slider-nav-thumbnails .slick-slide').eq(mySlideNumber).addClass('slick-active');
            });
                // Custom carousel nav
                $('.caro-left').click(function(){ 
                    $(this).parent().find('.abt-slider').slick('slickPrev');
                } );

                $('.caro-right').click(function(e){
                    e.preventDefault(); 
                    $(this).parent().find('.abt-slider').slick('slickNext');
                } );
$(function() {
   $('.pbSubmit').css('pointer-events', 'none');
   $('#hdcaptcha_cp_appbooking_post_1').change(function() {
      if ($('.required').val() != '' && $('#hdcaptcha_cp_appbooking_post_1').val() != '') {
         $('.pbSubmit').css('pointer-events', 'auto');
      } else {
         $('.pbSubmit').css('pointer-events', 'none');
      }
   });
});
 </script>
<!-- <script>

function checkSubmitStatus(){
	if(sessionStorage.getItem('usedTimeSlot')){
        alert('The form was submitted by '+ sessionStorage.getItem('usedTimeSlot'));
	}
}
jQuery(document).ready(checkSubmitStatus());
</script> -->


<!-- <script type="text/javascript">
var interval = setInterval(function(){
    var session_time = $('#used_timeDate').attr('attr_time');
    var session_date = $('#used_timeDate').attr('attr_date');
    console.log($('.availableslot'));
    $('.availableslot').each(function(){
    var sesion_web_date = $(this).attr('d-date');
    var sesion_web_time = $(this).attr('d-time');
        console.log("hi");
        console.log(sesion_web_time + sesion_web_date);
    if( session_date  == sesion_web_date && session_time == sesion_web_time){
		
        $(this).css({"border":"1px solid #ccc", "pointer-events" : "none"});
        $(this).find("a").css("color","#ccc");
    }
});
}, 8000);
</script> -->

</body>

</html>