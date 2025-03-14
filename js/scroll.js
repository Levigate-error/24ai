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
    let header = document.querySelector('header');

    window.addEventListener('scroll', () => {
        if(scrollval > window.scrollY) {
            header.style.transform = 'translateY(0)';
        } else if (scrollval < window.scrollY && scrollval > -1) {
            header.style.transform = 'translateY(-100%)';
            if($(".lang-switcher").hasClass("lang-switcher--active")){
                $(".lang-switcher").trigger('click');
                $(".lang-switcher").removeClass('lang-switcher--active');
            }
        }
        scrollval = window.scrollY;
    });
    document.getElementById("year").innerHTML = new Date().getFullYear();

});