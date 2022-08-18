jQuery(document).ready(function(e) {
    e.preventDefault();
    jQeury('#img-upload').click(function() {
        var upload = wp.media({
                title: 'Choose Image', //Title for Media Box
                multiple: false //For limiting multiple image
            })
            .on('select', function() {
                var select = upload.state().get('selection');
                var attach = select.first().toJSON();
                console.log(attach.id); //the attachment id of image
                console.log(attach.url); //url of image
                jQuery('img#img-upload').attr('src', attach.url);
            })
            .open();
    });

});