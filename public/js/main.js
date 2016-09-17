/* global src */

$(document).ready(function() {


    new WOW().init();


    $("#mobile").owlCarousel({
        autoplay: true,
        autoplayTimeout: 6000,
        margin: 20,
        autoplayHoverPause: true,
        nav: true,
        transitionStyle: true,
        dots: false,
        loop: true,
        rtl: true,
        smartSpeed: 1000,
        navText: [
            "<i class='fa fa-angle-right'></i>",
            "<i class='fa fa-angle-left'></i>"
        ],
        responsive: {
            0: {
                items: 1
            },
            600: {
                items: 2
            },
            1000: {
                items: 4
            }
        }
    });
    $("#now").owlCarousel({
        autoplay: true,
        autoplayTimeout: 6000,
        margin: 20,
        autoplayHoverPause: true,
        nav: true,
        transitionStyle: true,
        dots: false,
        loop: true,
        rtl: true,
        smartSpeed: 1000,
        navText: [
            "<i class='fa fa-angle-right'></i>",
            "<i class='fa fa-angle-left'></i>"
        ],
        responsive: {
            0: {
                items: 1
            },
            600: {
                items: 2
            },
            1000: {
                items: 3
            }
        }
    });

    $("#mobile-tap,#mobile-tap2,#mobile-tap3").owlCarousel({
        autoplay: true,
        autoplayTimeout: 5000,
        margin: 0,
        autoplayHoverPause: true,
        nav: true,
        transitionStyle: true,
        dots: false,
        loop: true,
        rtl: true,
        smartSpeed: 1000,
        navText: [
            "<i class='fa fa-angle-right'></i>",
            "<i class='fa fa-angle-left'></i>"
        ],
        responsive: {
            0: {
                items: 1
            },
            600: {
                items: 2
            },
            1000: {
                items: 3
            }
        }


    });
    $('[data-toggle="tooltip"]').tooltip();

    $(".menu_show").click(function() {
        $(".mobile_menu").toggleClass('can');
    });

    $(".scrol").click(function() {
        $("body").animate({scrollTop: 0}, 1000);
    });

    $(".show").click(function() {
        $(".mega-menu .box").toggleClass('show-menu');
    });

    $(".menu_title .fa").click(function() {
        $(".mega-menu .box").toggleClass('show-menu');
    });

    // fore tap and owl slider
    $('a[data-toggle="tab"]').on('shown.bs.tab', function(e) {
        $($(e.target).attr('href'))
                .find('.owl-carousel')
                .owlCarousel('invalidate', 'width')
                .owlCarousel('refresh');
    });




    // Instantiate MixItUp:




    $(".galary .list-inline  li").click(function() {
        $(this).addClass("select").siblings().removeClass("select");
    });

    /* $(".topic ul li").click(function() {
     $(this).addClass("topic-slect").siblings().removeClass("topic-slect");
     });*/
    $(".galary .fasle").click(function() {
        $(".none").slideToggle(100);
    });


    $(function() {

        function toggleChevron(e) {
            $(e.target)
                    .prev('.panel-heading')
                    .find("i")
                    .toggleClass('rotate-icon');
            $('.panel-body.animated').toggleClass('zoomIn zoomOut');
        }

        $('#accordion').on('hide.bs.collapse', toggleChevron);
        $('#accordion').on('show.bs.collapse', toggleChevron);
    });


       $(function() {
            $('.picZoomer').picZoomer();


            //切换图片
            $('.piclist li').on('click',function(event){
                var $pic = $(this).find('img');
                $('.picZoomer-pic').attr('src',$pic.attr('src'));
            });
        });
 

});
$('#Container').mixItUp();
