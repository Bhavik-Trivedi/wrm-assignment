$(document).ready(function(){
    $(window).scroll(function(){
        var main_header = $('header.myheader'),
        scroll = $(window).scrollTop();
        if (scroll >= 105) main_header.addClass('fixedheader');
        else main_header.removeClass('fixedheader');
    });

});

$(document).on('click','header .menubtn', function(e){
    $('body').toggleClass('bodyoverflow')
});

$(document).on('click','.nav-item .nav-link', function(e){
    $('header .nav-link').removeClass('active');
    $(this).addClass('active');
    $('header .menubtn').removeClass('opened');
    $('header .navbar-collapse').removeClass('show');
    $('body').removeClass('bodyoverflow');
});


var swiper = new Swiper('.section1_slider .swiper-container', {
    slidesPerView: 1,
    spaceBetween: 0,
    slideToClickedSlide: 0,
    loop: true,
    loopedSlides: 3,
    pagination: {
      el: ".section1_slider .swiper-pagination",
    },
});

var swiper = new Swiper('.section2_slider .swiper-container', {
    slidesPerView: 3,
    spaceBetween: 0,
    slideToClickedSlide: true,
    loop: true,
    loopedSlides: 3,
    navigation: {
        nextEl: ".section2_slider .swiper-button-next",
        prevEl: ".section2_slider .swiper-button-prev",
    },
    
    breakpoints: {
        834: {
            slidesPerView: 1,
        }
    }
});