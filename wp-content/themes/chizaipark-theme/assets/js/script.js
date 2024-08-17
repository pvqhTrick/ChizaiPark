/***************************************************************************
 *
 * SCRIPT JS
 *
 ***************************************************************************/
$(document).ready(function() {

    if ($(window).width() <= 768) {
        $('body').addClass(getMobileOperatingSystem());
    }
    //Click event to scroll to top
    $('.scrollToTop').on('click', function() {
        $('html, body').animate({
            scrollTop: 0
        }, 800);
        return false;
    });

    $(window).scroll(function() {
        if ($(this).scrollTop()) {
            $('#header').addClass('showHd');
        } else {
            $('#header').removeClass('showHd');
        }
    });

    // HAMBEGER BUTTON MENU SP CLICK
    $('.hamburger').click(function() {
        if ($(this).hasClass("open")) {
            $(this).removeClass('open');
            $(this).addClass('close');
        } else {
            $(this).removeClass('close');
            $(this).addClass('open');
        }

        if ($(window).width() <= 768) {
            $('#header .mainMenu').stop().slideToggle();
            $('body').toggleClass('fixed');
        } else {

        }
    });

    // FIX HEIGHT HEADER SP
    function fixedHeader() {
        var hHead = $('#header').outerHeight();
        $('#fixH').css('height', hHead);
    }

    $(window).resize(function(event) {
        fixedHeader();
    });

    $(window).on('load', function(event) {
        fixedHeader();
    });

    //SCROLL TO TOP 
    $(window).scroll(function() {
        if ($(this).scrollTop() > 80) {
            $('.scrollToTop').fadeIn(400);
        } else {
            $('.scrollToTop').fadeOut(400);
        }
    });

    // SCROLL ANCHOR
    $('.anchor a[href*="#"]:not([href="#"])').on('click', function() {
        if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') && location.hostname == this.hostname) {
            var target = $(this.hash);
            target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
            if (target.length) {
                var target_offset = 0;
                if (target.attr('data-offset')) {
                    target_offset = target.attr('data-offset');
                    target_offset = parseInt(target_offset);
                }
                $('html,body').animate({
                    scrollTop: target.offset().top - 90 + target_offset
                }, 1000);
                return false;
            }
        }
    });

});

// DETECH ANDROID OR IOS
getMobileOperatingSystem();

function getMobileOperatingSystem() {
    var userAgent = navigator.userAgent || navigator.vendor || window.opera;
    if (/android/i.test(userAgent)) {
        return "Android";
    }
    // iOS detection from: http://stackoverflow.com/a/9039885/177710
    if (/iPad|iPhone|iPod/.test(userAgent) && !window.MSStream) {
        return "iOS";
    }
    return "unknown";
}