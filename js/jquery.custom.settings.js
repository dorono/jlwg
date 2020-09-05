/*-----------------------------------------------------------------------------------*/
/* Isotope
/*-----------------------------------------------------------------------------------*/

jQuery.noConflict()(function($){
var $container = $('#portfolio-items');
        
        if($container.length) {
            $container.waitForImages(function() {
                
                $container.isotope({
                  itemSelector : '.block',
                  layoutMode : 'fitRows'
                });
                
                $('#filters li a').click(function(){
                  var selector = $(this).attr('data-filter');
                  $container.isotope({ filter: selector });
                  $(this).parent().addClass('current').siblings().removeClass('current');
                  return false;
                });
                
            },null,true);
        }});

/*-----------------------------------------------------------------------------------*/
/* Back to Top Button
/*-----------------------------------------------------------------------------------*/

jQuery(function ($) {

    $("#back-to-top").hide();
    
    $(function () {
        $(window).scroll(function () {
            if ($(this).scrollTop() > 100) {
                $('#back-to-top').fadeIn();
            } else {
                $('#back-to-top').fadeOut();
            }
        });

        $('#back-to-top a').click(function () {
            $('body,html').animate({
                scrollTop: 0
            }, 800);
            return false;
        });
    });

});

/*-----------------------------------------------------------------------------------*/
/* Superfish (Dropdowns)
/*-----------------------------------------------------------------------------------*/

jQuery(function ($) {

    $('.menu').superfish({
        delay: 200,
        animation: {
            opacity: 'show',
            height: 'show'
        },
        speed: 'fast',
        autoArrows: false,
        dropShadows: false
    });

});