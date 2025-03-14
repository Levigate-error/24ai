document.addEventListener('DOMContentLoaded', () => {

    $('.header_nav__item--has-sub-menu').on('click', function() {
        $(".header_nav__item--has-sub-menu").not(this).removeClass("active_content");
        if (!$(this).hasClass('active_content')) { // если класса нет
            $(this).addClass('active_content');
            $('.menu__open').addClass('active');
        } else {
            $(this).removeClass('active_content');
            $('.menu__open').removeClass('active');
        }
    });
    $('.menu__open').click(function (e) {
        if ($(e.target).closest('.header_content').length == 0) {
            $('.header_nav__item--has-sub-menu').removeClass('active_content'); // убираем класс
            $(this).removeClass('active');
        }
    });

    let scrollval = 0;
    let header = document.querySelector('header'),
        bannerHeight = document.querySelector('.banner__hero').offsetHeight + header.offsetHeight;

    window.addEventListener('scroll', () => {
        if(scrollval > window.scrollY) {
            header.style.transform = 'translateY(0)';
            // console.log('Scroll up')
        } else if (window.scrollY  >= bannerHeight) {
            // console.log('Scroll down')
            header.style.transform = 'translateY(-100%)';
        }
        scrollval = window.scrollY;
    });
    document.getElementById("year").innerHTML = new Date().getFullYear();

});