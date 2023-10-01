$(document).ready(function () {
    $(window).on("load", function() {
        $("#preloader").fadeOut("slow");
    });
    AOS.init();
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
    $('#review_form textarea#comment').addClass('form-control');
    $('.woocommerce div.product .woocommerce-product-rating a.woocommerce-review-link').addClass('text-decoration-none ps-4 d-flex flex-row pt-1');
    $('div#tab-reviews div#review_form_wrapper div#review_form div#respond p.comment-form-comment textarea#comment').addClass('form-control p-3');
    $('div#tab-reviews div#review_form_wrapper div#review_form div#respond form#commentform p.comment-form-author input#author').addClass('form-control p-3');
    $('div#tab-reviews div#review_form_wrapper div#review_form div#respond form#commentform p.comment-form-email input#email').addClass('form-control p-3');
   
    $('div#tab-reviews div#review_form_wrapper div#review_form div#respond p.comment-form-comment').addClass('mb-4');
    $('div#tab-reviews div#review_form_wrapper div#review_form div#respond form#commentform p.comment-form-author').addClass('mb-4');
    $('div#tab-reviews div#review_form_wrapper div#review_form div#respond form#commentform p.comment-form-email').addClass('mb-4');

    $('div#tab-reviews div#review_form_wrapper div#review_form div#respond form#commentform .comment-form-rating').addClass('my-5');
    $('div#tab-reviews div#review_form_wrapper div#review_form div#respond form#commentform .comment-form-rating p.stars').addClass('fs-3');
    $('div#tab-reviews div#review_form_wrapper div#review_form div#respond form#commentform .comment-form-rating p.stars a').addClass('text-success');
    $('div#tab-reviews div#review_form_wrapper div#review_form div#respond form#commentform .comment-form-rating label').addClass('mb-3');
    $('div#tab-description p').addClass('text-secondary lh-lg');
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
            $('#scroll_btn').fadeIn('slow');
        } else {
            $navbar.removeClass('bg_nav_white');
            $('#scroll_btn').fadeOut('slow');
        }
    });
    $('#scroll_btn').click(function () {
        $("html, body").animate({
            scrollTop: 0
        },300);
        return false;
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
     // service carousel
     $('#services_carous.owl-carousel').owlCarousel({
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


    var qualContent = $('#qual_content');
    var tabContent  = $('div#tab-description');
    function handleResize() {
        $(window).width() < 768 ? qualContent.addClass('overflow-x-scroll') : qualContent.removeClass('overflow-x-scroll');
        $(window).width() < 768 ? tabContent.addClass('overflow-x-scroll') :  tabContent.removeClass('overflow-x-scroll');
    }

    handleResize();

    $(window).resize(function() {
        handleResize();
    });


});