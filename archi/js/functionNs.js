var vgp = 2; // Post per page
var vgPageNumber = 1;


function loadN_posts(){
    vgPageNumber++;
    var str = '&vgPageNumber=' + vgPageNumber + '&vgp=' + vgp + '&action=more_post_vg_ajax';
    $.ajax({
        type: "POST",
        dataType: "html",
        url: ajaxN_posts.ajaxurl,
        data: str,
        success: function(data){
            var $data = $(data);
            if($data.length){
                $("#ajaxN-posts").append($data);
                $("#more_posts").attr("disabled",false);
            } else{
                $("#more_posts").attr("disabled",true);
            }
        },
        error : function(jqXHR, textStatus, errorThrown) {
            $loader.html(jqXHR + " :: " + textStatus + " :: " + errorThrown);
        }

    });
    return false;
  }
