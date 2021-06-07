// JavaScript Document


$(document).ready(function() {

    'use strict';

    /************************************************************************************ DROPDOWN MENU STARTS */

    $('.dropdown-toggle').dropdown();

    /************************************************************************************ DROPDOWN MENU ENDS */

    /************************************************************************************ MEAN MENU STARTS */

    jQuery('#menu').meanmenu();

    /************************************************************************************ MEAN MENU STARTS */

    /************************************************************************************ SEARCH TOGGLE STARTS */

    var $searchlink = $('#searchlink');

    // hover effect
    $searchlink.on('mouseover', function() {
        $(this).addClass('open');
    }).on('mouseout', function() {
        $(this).removeClass('open');
    });


    /************************************************************************************ SEARCH TOGGLE ENDS */

    /************************************************************************************ SLIDER CAROUSEL STARTS */

    $(".grid-slider").owlCarousel({

        slideSpeed: 300,
        paginationSpeed: 400,
        singleItem: true,
        items: 1,
        itemsDesktop: [1199, 1],
        itemsDesktopSmall: [979, 1],
        itemsTablet: [768, 1],
        itemsMobile: [479, 1],
        autoHeight: true,
        pagination: false,
        navigation: true,
        transitionStyle: "fade",
        navigationText: [
            "<i class='fa fa-angle-left'></i>",
            "<i class='fa fa-angle-right'></i>"
        ],
    });

    $(".grid-slider-2").owlCarousel({

        slideSpeed: 300,
        paginationSpeed: 400,
        singleItem: true,
        items: 1,
        itemsDesktop: [1199, 1],
        itemsDesktopSmall: [979, 1],
        itemsTablet: [768, 1],
        itemsMobile: [479, 1],
        autoHeight: true,
        pagination: false,
        navigation: true,
        transitionStyle: "fade",
        navigationText: [
            "<i class='fa fa-angle-left'></i>",
            "<i class='fa fa-angle-right'></i>"
        ],
    });

    /************************************************************************************ SLIDER CAROUSEL ENDS */

    /************************************************************************************ NEWSTICKER CAROUSEL STARTS */

    $(".newsticker").owlCarousel({

        autoPlay: 3000,
        slideSpeed: 300,
        paginationSpeed: 1000,
        singleItem: true,
        items: 1,
        itemsDesktop: [1199, 1],
        itemsDesktopSmall: [979, 1],
        itemsTablet: [768, 1],
        itemsMobile: [479, 1],
        autoHeight: true,
        pagination: false,
        navigation: true,
        transitionStyle: "fade",
        navigationText: [
            "<i class='fa fa-angle-left'></i>",
            "<i class='fa fa-angle-right'></i>"
        ],
    });

    /************************************************************************************ NEWSTICKER CAROUSEL ENDS */

    /************************************************************************************ FEATURED VIDEO CAROUSEL STARTS */

    $(".featured-video-carousel").owlCarousel({
        autoPlay: 3000,
        slideSpeed: 300,
        paginationSpeed: 400,
        singleItem: true,
        items: 1,
        itemsDesktop: [1199, 1],
        itemsDesktopSmall: [979, 1],
        itemsTablet: [768, 1],
        itemsMobile: [479, 1],
        autoHeight: true,
        pagination: false,
        navigation: true,
        transitionStyle: "fade",
        navigationText: [
            "<i class='fa fa-angle-left'></i>",
            "<i class='fa fa-angle-right'></i>"
        ],
    });

    /************************************************************************************ FEATURED VIDEO CAROUSEL ENDS */

    /************************************************************************************ GALLERY CAROUSEL STARTS */

    $(".gallery-carousel").owlCarousel({
        autoPlay: 3000,
        slideSpeed: 300,
        paginationSpeed: 400,
        singleItem: true,
        items: 1,
        itemsDesktop: [1199, 1],
        itemsDesktopSmall: [979, 1],
        itemsTablet: [768, 1],
        itemsMobile: [479, 1],
        autoHeight: true,
        pagination: false,
        navigation: true,
        transitionStyle: "fade",
        navigationText: [
            "<i class='fa fa-angle-left'></i>",
            "<i class='fa fa-angle-right'></i>"
        ],
    });

    /************************************************************************************ GALLERY CAROUSEL ENDS */

    /************************************************************************************ STICKY NAVIGATION STARTS */

    $("#navigation").sticky({
        topSpacing: 0
    });

    /************************************************************************************ STICKY NAVIGATION ENDS */

    /************************************************************************************ FITVID STARTS */

    $(".fitvid").fitVids();

    /************************************************************************************ FITVID ENDS */

    /************************************************************************************ TO TOP STARTS */

    $(window).scroll(function() {
        if ($(this).scrollTop() > 100) {
            $('.scrollup').fadeIn();
        } else {
            $('.scrollup').fadeOut();
        }
    });

    $('.scrollup').on("click", function() {
        $("html, body").animate({
            scrollTop: 0
        }, 600);
        return false;
    });

    /************************************************************************************ TO TOP ENDS */


    /************************************************************************************ SWITCHER CSS STARTS */

    $("#hide, #show").click(function() {
        if ($("#show").is(":visible")) {

            $("#show").animate({
                "margin-left": "-500px"
            }, 500, function() {
                $(this).hide();
            });

            $("#switch").animate({
                "margin-left": "0px"
            }, 500).show();
        } else {
            $("#switch").animate({
                "margin-left": "-500px"
            }, 500, function() {
                $(this).hide();
            });
            $("#show").show().animate({
                "margin-left": "0"
            }, 500);
        }
    });

    /************************************************************************************ SWITCHER CSS ENDS */


    /************************************************************************************ CURRENT DATE */

    var d = new Date();
    document.getElementById("date").innerHTML = d.toDateString();

    /************************************************************************************ CURRENT ENDS */


    /************************************************************************************ MAGNIFIC POPUP STARTS */

    $('.popup-with-form').magnificPopup({
        type: 'inline',
        preloader: false,
        focus: '#name',

        // When elemened is focused, some mobile browsers in some cases zoom in
        // It looks not nice, so we disable it:
        callbacks: {
            beforeOpen: function() {
                if ($(window).width() < 700) {
                    this.st.focus = false;
                } else {
                    this.st.focus = '#name';
                }
            }
        }
    });

    $('.popup-youtube, .popup-vimeo, .popup-gmaps').magnificPopup({
        disableOn: 700,
        type: 'iframe',
        mainClass: 'mfp-fade',
        removalDelay: 160,
        preloader: false,

        fixedContentPos: false
    });

    /************************************************************************************ MAGNIFIC POPUP ENDS */

	$('#preloader').fadeOut('slow');


}); //$(document).ready(function () {


