<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Businessbiz
 */

/**
 *
 * @hooked businessbiz_footer_start
 */
do_action( 'businessbiz_action_before_footer' );

/**
 * Hooked - businessbiz_footer_top_section -10
 * Hooked - businessbiz_footer_section -20
 */
do_action( 'businessbiz_action_footer' );

/**
 * Hooked - businessbiz_footer_end. 
 */
do_action( 'businessbiz_action_after_footer' );

wp_footer(); ?>
<!-- <script src="https://code.jquery.com/jquery-latest.min.js"></script> -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/milligram/1.3.0/milligram.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/14.0.7/js/intlTelInput.js"></script>
<script src="/uk-cargo/wp-content/themes/businessbiz/assets/js/intltel-custom.js"></script>
<!-- <script src="/uk-cargo/wp-content/themes/businessbiz/assets/js/auto-select.js"></script> -->
<script>
    jQuery(document).ready(function($){
        $('a, a img').attr('bis_size', '');
        $('a img').attr('style','');
    })
</script>
<script>

    jQuery(document).ready(function($){
// 		$('.featured-slider-wrapper').slick({
// 			autoplay: false,
// 		});
        $('a, a img').attr('bis_size', '');
        $('a img').attr('style','');

        $('#cp_appbooking_pform_1 input[name=fieldname8_1]').on('change', function() {

            $("input#fieldname8_1").val($('input[name=fieldname8_1]:checked', '#cp_appbooking_pform_1').val()).addClass("valid");
        
        });
        $('#cp_appbooking_pform_1 input[name=fieldname9_1]').on('change', function() {

            $("input#fieldname9_1").val($('input[name=fieldname9_1]:checked', '#cp_appbooking_pform_1').val()).addClass("valid");

        });
        // $('#cp_appbooking_pform_1 input[name=fieldname14_1]').on('change', function() {

        //     $("input#fieldname14_1").val($('input[name=fieldname14_1]:checked', '#cp_appbooking_pform_1').val()).addClass("valid");

        // });
		$('input#fieldname5_1').val('Myanmar').addClass('valid');  
        $('#checkFCountry').change(function() {
            var $option = $(this).find('option:selected');
            var value = $option.val();
            var text = $option.text();
            $('input#fieldname5_1').val(text).addClass('valid');
			if(text == 'Myanmar'){
				$("#fuk").html("UK");
				$("#checkCountry option[value='myanmar'],#checkCountry option:selected").css('display','none');
				$("#checkCountry option[value='uk'], #checkCountry option[value='usa'], #checkCountry option[value='australia'], #checkCountry option[value='egypt'], #checkCountry option[value='germany'], #checkCountry option[value='united arab emirates'], #checkCountry option[value='turkey'], #checkCountry option[value='thailand'], #checkCountry option[value='malaysia'], #checkCountry option[value='singapore'], #checkCountry option[value='japan'], #checkCountry option[value='canada'], #checkCountry option[value='spain'], #checkCountry option[value='oman'], #checkCountry option[value='nepal'], #checkCountry option[value='belgium'], #checkCountry option[value='saudi arabia'], #checkCountry option[value='new zealand'], #checkCountry option[value='italy'], #checkCountry option[value='netherlands']").css('display','block');
				$('input#fieldname6_1').val('UK').addClass('valid');
			}
			else if(text == 'UK'){
			$("#fuk").html("Myanmar");
				$("#checkCountry option[value='myanmar']").css('display','block');
				$("#checkCountry option[value='uk'], #checkCountry option[value='usa'], #checkCountry option[value='australia'], #checkCountry option[value='egypt'], #checkCountry option[value='germany'], #checkCountry option[value='united arab emirates'], #checkCountry option[value='turkey'], #checkCountry option[value='thailand'], #checkCountry option[value='malaysia'], #checkCountry option[value='singapore'], #checkCountry option[value='japan'], #checkCountry option[value='canada'], #checkCountry option[value='spain'], #checkCountry option[value='oman'], #checkCountry option[value='nepal'], #checkCountry option[value='belgium'], #checkCountry option[value='saudi arabia'], #checkCountry option[value='new zealand'], #checkCountry option[value='italy'], #checkCountry option:selected, #checkCountry option[value='netherlands']").css('display','none').attr('disable','disable');
				$('input#fieldname6_1').val('Myanmar').addClass('valid');
			}
        });
		//$('input#fieldname6_1').val('UK').addClass('valid'); 
 		//$("#checkCountry option[value='myanmar']").css('display','none');
        $('#checkCountry').change(function() {
            var $option = $(this).find('option:selected');
            var value = $option.val();
            var text = $option.text();
            $('input#fieldname6_1').val(text).addClass('valid');
        });

        $('.dfieldP .intl-tel-input input').on('change',function() { 
            var $phoneInput = $('.dfieldP .flag-container .country-list .active .dial-code').text() + $('.dfieldP .intl-tel-input input').val();
            $('#fieldname3_1').val($phoneInput).addClass('valid');
        }); 
		$('.dfieldRec .intl-tel-input input').on('change',function() { 
            var $phoneInput = $('.dfieldRec .flag-container .country-list .active .dial-code').text() + $('.dfieldRec .intl-tel-input input').val();
            $('#fieldname12_1').val($phoneInput).addClass('valid');
        });
		
		 $(".cpapp_no_wrap div").each(function(){
			$(this).html(function (i, html) {
				return html.replace(/&nbsp;/g, '');
			})
		})
        
        jQuery('#fieldname7_1').attr('readonly', true);

        //var pathname = window.location.pathname;

setTimeout(function() {
    const urlString =  window.location.pathname;
        const queryString = window.location.search;
        const urlParams = new URLSearchParams(queryString);
        const trackingCode = urlParams.get('tracking');
        const mail = urlParams.get('mail');
        var pathname = window.location.pathname;
        $.post(
            "../wp-content/themes/businessbiz/tracking-data.php", {trackingCode: trackingCode,mail:mail },
            function(data) {
                $('.tracking-data').html(data);
            }
        );
}, 750);



        const queryString = window.location.search;
        const urlParams = new URLSearchParams(queryString);
        const product = urlParams.get('url');
        if(product == 'UK_to_Myanmar'){
            document.getElementById("checkFCountry").options[1].selected = true;
            document.getElementById("checkCountry").options[1].selected = true;
            document.getElementById('fieldname5_1').value = 'UK';
            document.getElementById('fieldname5_1').classList.add("valid");
            document.getElementById('fieldname6_1').value = 'Myanmar';
            document.getElementById('fieldname6_1').classList.add("valid");
        }
        else if(product == 'Myanmar_to_UK'){
            document.getElementById("checkFCountry").options[0].selected = true;
            document.getElementById("checkCountry").options[0].selected = true;
            document.getElementById('fieldname5_1').value = 'Myanmar';
            document.getElementById('fieldname5_1').classList.add("valid");
            document.getElementById('fieldname6_1').value = 'UK';
            document.getElementById('fieldname6_1').classList.add("valid");
        }
        else {
            document.getElementById("checkFCountry").options[0].selected = true;
            document.getElementById('fieldname5_1').value = 'Myanmar';
            document.getElementById('fieldname5_1').classList.add("valid");
			document.getElementById('fieldname6_1').value = 'UK';
            document.getElementById('fieldname6_1').classList.add("valid");
        }
		document.getElementById("modal_btn").onclick = function(){
          document.getElementById("modal").style.display = 'block';
          //document.querySelector(".fields").style.display = 'none';

        }
		document.getElementById("close_btn").onclick = function(){
           document.getElementById("modal").style.display = 'none';
        }
    })

</script>
</body>  
</html>