//<!-- Script for marquee -->
$(window).load(function () {
    $('.str3-2').liMarquee({
        direction: 'left',
        loop: -1,
        scrolldelay: 0,
        scrollamount: 50,
        circular: true,
        drag: true
    });

    $('.str3-3').liMarquee({
        direction: 'left',
        drag: true,
        scrolldelay: 10000,
        scrollamount: 50,
        circular: true
    });

    $('.str4').liMarquee({
        hoverstop: false,
        direction: 'up',
        loop: -1,
        scrolldelay: 0,
        scrollamount: 30,
        circular: true,
        drag: true,
    });

});

//<!--  Script for slider -->
(function ($) {

    //Function to animate slider captions 
    function doAnimations(elems) {
        //Cache the animationend event in a variable
        var animEndEv = 'webkitAnimationEnd animationend';
        elems.each(function () {
            var $this = $(this),
                    $animationType = $this.data('animation');
            $this.addClass($animationType).one(animEndEv, function () {
                $this.removeClass($animationType);
            });
        });
    }

//Variables on page load 
    var $myCarousel = $('#carousel-example-generic'),
            $firstAnimatingElems = $myCarousel.find('.item:first').find("[data-animation ^= 'animated']");

//Initialize carousel 
    $myCarousel.carousel();

//Animate captions in first slide on page load 
    doAnimations($firstAnimatingElems);

//Pause carousel  
    $myCarousel.carousel('pause');


//Other slides to be animated on carousel slide event 
    $myCarousel.on('slide.bs.carousel', function (e) {
        var $animatingElems = $(e.relatedTarget).find("[data-animation ^= 'animated']");
        doAnimations($animatingElems);
    });
    $('#carousel-example-generic').carousel({
        interval: 3000,
        pause: "true"
    });

})(jQuery);

//<!-- Owl-Carousel-JavaScript -->
//<script src="js/owl.carousel.js"></script>
$(document).ready(function () {
    $("#owl-demo").owlCarousel({
        items: 4,
        lazyLoad: true,
        autoPlay: true,
        pagination: false,
    });
});

//<!-- //Owl-Carousel-JavaScript -->