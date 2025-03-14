document.addEventListener('DOMContentLoaded', () => {

    let newsSliderW = document.querySelector('.news__slider');
    if (newsSliderW){
        let newsSlider = new Swiper('.news__slider', {
            initialSlide: 0,
            slidesOffsetAfter: 0,
            loop: false,
            loopFillGroupWithBlank: false,
            loopFillGroupBlank: false,
            autoplay: {
                delay: 5000,
            },
            pagination: {
                el: '.news-swiper-pagination',
                clickable: true,
            },
            breakpoints: {
                320: {
                    slidesPerView: 1.05,
                    centeredSlides: true,
                    spaceBetween: 10,
                },
                580: {
                    slidesPerView: 'auto',
                    centeredSlides: true,
                    spaceBetween: 10,
                },
            }
        });
    }

    $('.news_cat-btn').click(function (){
        const newsBanner = document.querySelector('.news__banner');
        $('.news_cat-btn').removeClass('active');
        $(this).addClass('active'); // выделяем выбранную категорию

        var cat = $(this).attr('data-category'); // определяем категорию
        var catAll = $(this).attr('data-filter'); // определяем категорию

        if (cat == 'all' || catAll == 'all') { // если all
            $('.swiper-wrapper .news__banner--item').removeClass("disabled_slide hide").addClass("swiper-slide"); // отображаем все позиции
            newsBanner.classList.remove('margin');
        } else { // если не all
            $(".news__banner--item").not("[data-category='"+cat+"']").removeClass("swiper-slide").addClass("disabled_slide hide");
            // $('.portfolio_works_slider div[data-fiter]').css({display:'none'}); // скрываем все позиции
            $('.news__banner--item[data-category="' + cat + '"]').removeClass("disabled_slide hide").addClass("swiper-slide"); // и отображаем позиции из соответствующей категории
        }
        newsSlider.destroy();
        newsSlider = new Swiper('.news__slider', {
            initialSlide: 0,
            slidesOffsetAfter: 0,
            loop: false,
            loopFillGroupWithBlank: false,
            loopFillGroupBlank: false,
            autoplay: {
                delay: 5000,
            },
            pagination: {
                el: '.news-swiper-pagination',
                clickable: true,
            },
            breakpoints: {
                320: {
                    slidesPerView: 1.05,
                    centeredSlides: true,
                    spaceBetween: 10,
                },
                580: {
                    slidesPerView: 'auto',
                    centeredSlides: true,
                    spaceBetween: 10,
                },
            }
        });
        const countSlide = document.querySelectorAll('.news__banner--item.swiper-slide');
        if (countSlide.length == 1 ){
            newsBanner.classList.add('margin');
        } else {
            newsBanner.classList.remove('margin');
        }
    });

    let mediaSliderW = document.querySelector('.media__slider--wrap');
    if (mediaSliderW){
        document.querySelectorAll('.media__slider--wrap').forEach(n => {
            MediaSlider = new Swiper(n.querySelector('.media--news__slider'), {
                // slidesPerView: 'auto',
                spaceBetween: 40,

                loop: false,
                loopFillGroupWithBlank: false,
                autoplay: {
                    delay: 5000,
                    reverseDirection: true
                },
                pagination: {
                    el: n.querySelector('.media__blog--swiper-pagination'),
                    clickable: true,
                },
                breakpoints: {
                    320: {
                        slidesPerView: 1.1,
                        slidesPerGroup: 1
                    },
                    580: {
                        slidesPerView: 'auto',
                    },
                }
            });
        });
    }

    let swiperTabsNavW = document.querySelector('.filter--btns');
    if (swiperTabsNavW){
        const swiperTabsNav = new Swiper('.filter--btns', {
            loop: false,
            allowTouchMove: true,
            centeredSlides: false,
            autoHeight: false,
            resistanceRatio: 0,
            watchOverflow: true,
            watchSlidesVisibility: true,
            watchSlidesProgress: true,
            slideToClickedSlide: true,
            breakpoints: {
                320: {
                    slidesPerView: 3,
                    spaceBetween: 10,
                },
                390: {
                    slidesPerView: 4,
                    spaceBetween: 10,
                },
                580: {
                    slidesPerView: 'auto',
                    spaceBetween: 10,
                },
            }
        });
    }

    let copyLinkW = document.querySelector('.copy_link');
    if (copyLinkW){
        async function copyPageUrl() {
            try {
                await navigator.clipboard.writeText(location.href);
                // console.log('URL страницы скопирован в буфер обмена');
            } catch (err) {
                // console.error('Не удалось скопировать: ', err);
            }
        }
        const copyLink = document.querySelectorAll('.copy_link');
        copyLink.forEach((button) => {
            button.addEventListener("click", (e) => {
                // e.preventDefault();
                const copyLinkText = button.querySelector('.copy_link-text');
                copyPageUrl();
                copyLinkText.classList.add('active');
                setInterval(function (){
                    copyLinkText.classList.remove('active');
                },1000)
            });
        });
    }

    let tabSliderW = document.querySelector('.media--tabs__slider');
    if (tabSliderW){
        let tabSlider = new Swiper('.media--tabs__slider', {
            initialSlide: 0,
            loop: false,
            loopFillGroupWithBlank: false,
            loopFillGroupBlank: false,
            pagination: {
                el: '.media__tab--swiper-pagination',
                clickable: true,
            },
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },
            breakpoints: {
                320: {
                    slidesPerView: 1.08,
                    spaceBetween:10
                },
                580: {
                    slidesPerView: 'auto',
                    spaceBetween:40
                },
            }
        });
    }

    $('.media__tabs-btn').click(function (){
        const tabSlid = document.querySelector('.media--tabs__slider');
        $('.media__tabs--btns button').removeClass('active');
        $(this).addClass('active'); // выделяем выбранную категорию

        var cat = $(this).attr('data-filter'); // определяем категорию

        if (cat == 'all') { // если all
            $('.swiper-wrapper .tab').removeClass("disabled_slide hide").addClass("swiper-slide"); // отображаем все позиции
            tabSlid.classList.remove('padding');
        } else { // если не all
            $(".tab").not("[data-filter='"+cat+"']").removeClass("swiper-slide").addClass("disabled_slide hide");
            // $('.portfolio_works_slider div[data-fiter]').css({display:'none'}); // скрываем все позиции
            $('.tab[data-filter="' + cat + '"]').removeClass("disabled_slide hide").addClass("swiper-slide"); // и отображаем позиции из соответствующей категории
        }
        tabSlider.destroy();
        tabSlider = new Swiper('.media--tabs__slider', {
            initialSlide: 0,
            loop: false,
            loopFillGroupWithBlank: false,
            loopFillGroupBlank: false,
            pagination: {
                el: '.media__tab--swiper-pagination',
                clickable: true,
            },
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },
            breakpoints: {
                320: {
                    slidesPerView: 1.08,
                    spaceBetween:10
                },
                580: {
                    slidesPerView: 'auto',
                    spaceBetween:40
                },
            }
        });
        const countSlideTab = document.querySelectorAll('.tab.swiper-slide');
        const windowWidh = window.innerWidth;
        if (windowWidh > 580){
            if (countSlideTab.length < 4){
                tabSlid.classList.add('padding');
            } else {
                tabSlid.classList.remove('padding');
            }
        }
    });

    $('.page__blog--category__btn').click(function (){
        let cat =  $(this).data('category');
        $.post('/wp-admin/admin-ajax.php', {'action':'filter_posts', 'category':cat}, function(response){
            $('.posts__list').html(response);
        });
    });


});
