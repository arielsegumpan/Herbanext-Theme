$(document).ready(function () {

    $('div#respond small a#cancel-comment-reply-link').addClass('btn btn-outline-success ms-3');
    $('h3#reply-title a.comment-reply-link').addClass('text-decoration-none');
    $('h3#reply-title').addClass('museo');
    $('nav.woocommerce-pagination ul.page-numbers').addClass('fs-4');

    // Add Bootstrap classes to elements in WooCommerce comments
    $('.woocommerce-Reviews #comments .comment').addClass('media');
    $('.woocommerce-Reviews .comment .comment-body').addClass('media-body');
    $('.woocommerce-Reviews .comment img.avatar').addClass('media-left');
    $('.woocommerce-Reviews .comment .comment-author').addClass('media-heading');
    $('.woocommerce-Reviews .comment .comment-meta').addClass('small');

    // Add Bootstrap classes to the "Submit" button in the comment form
    $('.comment-form #submit').addClass('btn btn-primary');

    // Add Bootstrap classes to the comment pagination links (if present)
    $('.woocommerce-pagination .prev').addClass('page-item');
    $('.woocommerce-pagination .next').addClass('page-item');
    $('.woocommerce-pagination .prev a').addClass('page-link');
    $('.woocommerce-pagination .next a').addClass('page-link');
    //humberger
    const icons = document.querySelectorAll('.icon_ni');
    icons.forEach (icon => {  
    icon.addEventListener('click', (event) => {
        icon.classList.toggle("open");
    });
    });

    var $navbar = $('header.fixed-top');
    var stickyTop = $navbar.offset().top;
    var scrollTop = $(window).scrollTop();
    
    if (scrollTop >= 50) {
        $navbar.addClass('bg_nav_white');
    }

    $(window).scroll(function () {
        var scrollTop = $(window).scrollTop();

        if (scrollTop >= 50) {
            $navbar.addClass('bg_nav_white');
        } else {
            $navbar.removeClass('bg_nav_white');
        }
    });

    // Add hover event handlers
    $('.dropdown').hover(
        function () {
            // On hover in
            $(this).find('.dropdown-menu').stop(true, true).delay(200).fadeIn(300);
        },
        function () {
            // On hover out
            $(this).find('.dropdown-menu').stop(true, true).delay(200).fadeOut(300);
        }
    );

    // story carousel
    $('#story .owl-carousel').owlCarousel({
        loop:true,
        margin:10,
        nav:true,
        autoplay:true,
        smartSpeed: 3000,
        autoplaySpeed: 3000,
        responsive:{
            0:{
                items:1
            },
            600:{
                items:1
            },
            1000:{
                items:1
            }
        }
    })
});