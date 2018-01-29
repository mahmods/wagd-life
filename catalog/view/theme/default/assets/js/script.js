jQuery(document).ready(function ($) {
    "use strict";

    // Dropdown Btns
    $(".dropdown-menu .dropdown-btn").on("click", function (e) {
        e.preventDefault();
        $(this).siblings("ul").slideToggle(500);
    });

    // Cart
    $(".cart-area .cart-btn").on("click", function (e) {
        e.preventDefault();
        $(this).siblings(".cart-dropdown").slideToggle(500);
    });

    $(".cart-area .cart-dropdown ul li .info .remove-item").on("click", function (e) {
        e.preventDefault();
        $(this).parent(".info").parent("li").remove();
    });

    $(".cart-table table tbody td .remove-item").on("click", function (e) {
        e.preventDefault();
        $(this).parent("td").parent("tr").remove();
    });

    $(".navigation-menu > ul:not(.mobile-menu) > li > .megamenu").each(function () {
        var containerWid = $(this).parent("li").parent("ul").parent(".navigation-menu").parent(".container").width();
        $(this).width(containerWid);
    });

    $(".home-slider").slick({
        autoplay: true,
        autoplaySpeed: 5000,
        speed: 500
    });

    $(".testimonials-slider").slick({
        autoplay:true,
        autoplaySpeed: 5000,
        speed: 500,
        slidesToShow: 3,
        slidesToScroll: 1,
        dots:true,
        responsive: [ 
            {
                breakpoint: 981,
                settings: {
                    slidesToShow: 2,
                }
            },
            {
                breakpoint: 641,
                settings: {
                    slidesToShow: 1,
                    centerMode: true,
                    
                }
            },
        ],
    });
    
    $(".sponsers-slider").slick({
        autoplay:true,
        autoplaySpeed: 5000,
        speed: 500,
        slidesToShow: 4,
        slidesToScroll: 1,
        dots:true,
        responsive: [ 
            {
                breakpoint: 981,
                settings: {
                    slidesToShow: 3,
                }
            },
            {
                breakpoint: 641,
                settings: {
                    slidesToShow: 2,                    
                }
            },
            {
                breakpoint: 485,
                settings: {
                    slidesToShow: 1,
                    centerMode: true,
                    
                }
            },
        ],
    });
    
    $(".product-slider").slick({
        autoplay:true,
        autoplaySpeed:5000, 
        speed:500, 
        asNavFor:".product-thumbs",
    });

    $(".product-thumbs").slick({
        asNavFor:".product-slider",
        focusOnSelect:true,
        slidesToShow:3,
        slidesToScroll:1,
        vertical:true,
        arrows:true,
        responsive: [
            {
                breakpoint: 645,
                settings: {
                    slidesToShow: 3,
                    slidesToScroll:1,
                }
            },
            {
                breakpoint: 485,
                settings: {
                    slidesToShow: 3,
                    slidesToScroll:1,
                    vertical:false,
                    arrows:false,
                }
            },
        ]
    });
    
    $(".description-table table").each(function(){
    	$(this).addClass("table-responsive");
    });

$(".wideget,.accordion-item").addClass("form-ui");



});
