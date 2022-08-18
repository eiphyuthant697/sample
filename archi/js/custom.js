jQuery(document).ready(function($){
    let textDiv   = $('#contact-form .sow-form-field label,#contact-form p em');
      $(textDiv).each(function(index,item){
          let $this       = $(this),
                textAry       = $(this).text().split("*");
          if( textAry.length >  1){
                $(this).text('').addClass(`split-menu item${index}`);
                $(textAry).each(function(i,c){
                  $this.append(`<span class="span-text text${i}">${c}</span>`)
                });
              console.log(textAry)
          }
      })
    
});