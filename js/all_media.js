document.addEventListener('DOMContentLoaded', () => {
    let categoryContainer = document.querySelector(".category__btns");
    let mainContainer = document.querySelector(".blog__content");


    const postsCat = 'https://blog.24ttl.net/wp-json/wp/v2/categories?hide_empty=1';
    const postsUrl = 'https://blog.24ttl.net/wp-json/wp/v2/posts/?per_page=12';
    // const postsTag = 'https://blog.24ttl.net/wp-json/wp/v2/tags';

    async function load() {
        let obj = await (await fetch(postsUrl)).json()
            .then(function (data) {
                appendContent(data);
            })
            .catch(function (err) {
                console.log('error: ' + err);
            });
        let postCategory = await (await fetch(postsCat)).json()
            .then(function (data) {
                appendCategoryBtn(data);
                appendContent(data);
            })
            .catch(function (err) {
                console.log('error: ' + err);
            });
    }

    function appendCategoryBtn(data) {
        for (let i = 0; i < data.length; i++) {
            let div = document.createElement("div");
            div.className = 'swiper-slide fit-content';
            div.innerHTML = '<button type="button" class="media__tabs-btn" data-filter="'+data[i].slug +'">'+ data[i].name +'</button>';
            categoryContainer.appendChild(div);
        }
    }
    async function appendContent(data) {
        for (let i = 0; i < data.length; i++) {
            let newsCard = document.createElement("div");
            let blogCard = document.createElement("div");
            let pressCard = document.createElement("div");

            newsCard.className = 'tab__card news tab swiper-slide media__blog--item p0 mw360';
            blogCard.className = 'tab__card tab blog swiper-slide mw360';
            pressCard.className = 'tab__card tab press swiper-slide mw360';
            newsCard.setAttribute('data-filter', 'news');
            blogCard.setAttribute('data-filter', 'blog');
            pressCard.setAttribute('data-filter', 'press');

            //получаем категории
            const blogCategory = data[i].categories[0] === 8;
            const newsCategory = data[i].categories[0] === 9;
            const pressCategory = data[i].categories[0] === 10;

            if (newsCategory){
                //получаем json img
                const newsImg = 'https://blog.24ttl.net/wp-json/wp/v2/media/' + data[i].featured_media;
                let newsFullImg;
                const newsImgUrl = await (await fetch(newsImg)).json()
                    .then(function (img) {
                        //получаем ссылку на изображение
                        newsFullImg = img.source_url;
                    })
                    .catch(function (err) {
                        console.log('error: ' + err);
                    });

                const newsTitleFull = data[i].title.rendered;
                const newsTitleSmall = newsTitleFull.substr(0, 60) + '...';
                const newsSubtitleFull = data[i].excerpt.rendered;
                const newsSubtitleSmall = newsSubtitleFull.substr(0, 70) + '...';

                const newsDate = new Date(data[i].date);
                let newsMonth = newsDate.getMonth();
                if (newsMonth===0) newsMonth=" January";
                if (newsMonth===1) newsMonth=" February";
                if (newsMonth===2) newsMonth=" March";
                if (newsMonth===3) newsMonth=" April";
                if (newsMonth===4) newsMonth=" May";
                if (newsMonth===5) newsMonth=" June";
                if (newsMonth===6) newsMonth=" July";
                if (newsMonth===7) newsMonth=" August";
                if (newsMonth===8) newsMonth=" September";
                if (newsMonth===9) newsMonth=" October";
                if (newsMonth===10) newsMonth=" November";
                if (newsMonth===11) newsMonth=" December";
                const newsFullDate = newsDate.getDate() + ' ' + newsMonth + ', ' + newsDate.getFullYear();

                newsCard.innerHTML = '<a href="'+ data[i].link +'">' +
                    '                                    <img alt="" class="page__blog--item__img sm" src="'+ newsFullImg +'">' +
                    '                                </a>' +
                    '                                <div class="page__blog--item__content news__cards bgw">' +
                    '                                    <div>' +
                    '                                        <div class="page__blog--news__date">' +
                    '                                            <div class="card__tag-black"><ul class="post-categories"> <li><a href="https://blog.24ttl.net/category/news/" rel="category tag">News</a></li></ul></div>' +
                    '                                            <p class="page__blog--new__date card__text-black">'+ newsFullDate +'</p>' +
                    '                                        </div>' +
                    '                                        <a href="'+ data[i].link +'" class="page__blog--item__title">'+ newsTitleSmall +'</a>' +
                    '                                    </div>' +
                    '                                    <div class="page__blog--item__subtitle card__text-black mb0 text__hidden">'+ newsSubtitleSmall +'</div>' +
                    '                                </div>';
                mainContainer.appendChild(newsCard);
            }
            if (blogCategory){
                //получаем json img
                const blogImg = 'https://blog.24ttl.net/wp-json/wp/v2/media/' + data[i].featured_media;
                let blogFullImg;
                const blogImgUrl = await (await fetch(blogImg)).json()
                    .then(function (img) {
                        //получаем ссылку на изображение
                        blogFullImg = img.source_url;
                    })
                    .catch(function (err) {
                        console.log('error: ' + err);
                    });

                const blogTitleFull = data[i].title.rendered;
                const blogTitleSmall = blogTitleFull.substr(0, 60) + '...';
                const blogSubtitleFull = data[i].excerpt.rendered;
                const blogSubtitleSmall = blogSubtitleFull.substr(0, 70) + '...';

                const blogDate = new Date(data[i].date);
                let blogMonth = blogDate.getMonth();
                if (blogMonth===0) blogMonth=" January";
                if (blogMonth===1) blogMonth=" February";
                if (blogMonth===2) blogMonth=" March";
                if (blogMonth===3) blogMonth=" April";
                if (blogMonth===4) blogMonth=" May";
                if (blogMonth===5) blogMonth=" June";
                if (blogMonth===6) blogMonth=" July";
                if (blogMonth===7) blogMonth=" August";
                if (blogMonth===8) blogMonth=" September";
                if (blogMonth===9) blogMonth=" October";
                if (blogMonth===10) blogMonth=" November";
                if (blogMonth===11) blogMonth=" December";
                const blogFullDate = blogDate.getDate() + ' ' + blogMonth + ', ' + blogDate.getFullYear();

                blogCard.innerHTML = '<div class="page__blog--item__content media__blog--item blog__block p32" style="background: url('+blogFullImg+') center no-repeat; background-size: cover;">' +
                    '                                    <div>' +
                    '                                        <div class="page__blog--news__date">' +
                    '                                            <div class="card__tag-while"><ul class="post-categories"> <li><a href="https://blog.24ttl.net/category/blog/" rel="category tag">Blog</a></li></ul></div>' +
                    '                                            <p class="page__blog--new__date">'+blogFullDate+'</p>' +
                    '                                        </div>' +
                    '                                        <h2 class="page__blog--item__title">'+blogTitleSmall+'</h2>' +
                    '                                    </div>' +
                    '                                    <div>' +
                    '                                        <div class="page__blog--item__subtitle">'+blogSubtitleSmall+'</div>' +
                    '                                        <a href="'+data[i].link+'" class="page__blog--news__btn">Read more</a>' +
                    '                                    </div>' +
                    '                                </div>';
                mainContainer.appendChild(blogCard);
            }
            if (pressCategory){
                //получаем json img
                const pressImg = 'https://blog.24ttl.net/wp-json/wp/v2/media/' + data[i].posts_source;
                let pressFullImg;
                const pressImgUrl = await (await fetch(pressImg)).json()
                    .then(function (img) {
                        //получаем ссылку на изображение
                        pressFullImg = img.source_url;
                    })
                    .catch(function (err) {
                        console.log('error: ' + err);
                    });

                const pressTitleFull = data[i].title.rendered;
                const pressTitleSmall = pressTitleFull.substr(0, 60) + '...';
                const pressSubtitleFull = data[i].excerpt.rendered;
                const pressSubtitleSmall = pressSubtitleFull.substr(0, 50) + '...';

                const pressDate = new Date(data[i].date);
                let pressMonth = pressDate.getMonth();
                if (pressMonth===0) pressMonth=" January";
                if (pressMonth===1) pressMonth=" February";
                if (pressMonth===2) pressMonth=" March";
                if (pressMonth===3) pressMonth=" April";
                if (pressMonth===4) pressMonth=" May";
                if (pressMonth===5) pressMonth=" June";
                if (pressMonth===6) pressMonth=" July";
                if (pressMonth===7) pressMonth=" August";
                if (pressMonth===8) pressMonth=" September";
                if (pressMonth===9) pressMonth=" October";
                if (pressMonth===10) pressMonth=" November";
                if (pressMonth===11) pressMonth=" December";
                const pressFullDate = pressDate.getDate() + ' ' + pressMonth + ', ' + pressDate.getFullYear();

                pressCard.innerHTML = '<div class="media__blog--item page__blog--item__content bg__gray b20">' +
                    '                                    <div>' +
                    '                                        <div class="page__blog--news__date">' +
                    '                                            <div class="card__tag-black"><ul class="post-categories"> <li><a href="https://blog.24ttl.net/category/press/" rel="category tag">Press</a></li></ul></div>' +
                    '                                            <p class="page__blog--new__date card__text-black">'+ pressFullDate +'</p>' +
                    '                                        </div>' +
                    '                                        <a href="" class="page__blog--item__title">'+ pressTitleSmall +'</a>' +
                    '                                    </div>' +
                    '                                    <div>' +
                    '                                        <div class="page__blog--item__subtitle card__text-black">'+ pressSubtitleSmall +'</div>' +
                    '                                        <img src="'+ pressFullImg +'" alt="" class="news__brand--img">' +
                    '                                    </div>' +
                    '                                </div>';
                mainContainer.appendChild(pressCard);
            }

        }
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
        
        // let tabSlider = new Swiper('.media--tabs__slider', {
        //     initialSlide: 0,
        //     loop: false,
        //     loopFillGroupWithBlank: false,
        //     loopFillGroupBlank: false,
        //     pagination: {
        //         el: '.media__tab--swiper-pagination',
        //         clickable: true,
        //     },
        //     navigation: {
        //         nextEl: ".swiper-button-next",
        //         prevEl: ".swiper-button-prev",
        //     },
        //     breakpoints: {
        //         320: {
        //             slidesPerView: 1.08,
        //             spaceBetween: 10
        //         },
        //         580: {
        //             slidesPerView: 'auto',
        //             spaceBetween: 40
        //         },
        //     }
        // });
        // $('.media__tabs-btn').click(function () {
        //     const tabSlid = document.querySelector('.media--tabs__slider');
        //     $('.media__tabs--btns button').removeClass('active');
        //     $(this).addClass('active'); // выделяем выбранную категорию

        //     var cat = $(this).attr('data-filter'); // определяем категорию

        //     if (cat == 'all') { // если all
        //         $('.swiper-wrapper .tab').removeClass("disabled_slide hide").addClass("swiper-slide"); // отображаем все позиции
        //         tabSlid.classList.remove('padding');
        //         tabSlider.destroy();
        //         tabSlider = new Swiper('.media--tabs__slider', {
        //             initialSlide: 0,
        //             loop: false,
        //             loopFillGroupWithBlank: false,
        //             loopFillGroupBlank: false,
        //             pagination: {
        //                 el: '.media__tab--swiper-pagination',
        //                 clickable: true,
        //             },
        //             navigation: {
        //                 nextEl: ".swiper-button-next",
        //                 prevEl: ".swiper-button-prev",
        //             },
        //             breakpoints: {
        //                 320: {
        //                     slidesPerView: 1.08,
        //                     spaceBetween: 10
        //                 },
        //                 580: {
        //                     slidesPerView: 'auto',
        //                     spaceBetween: 40
        //                 },
        //             }
        //         });
        //     } else { // если не all
        //         $(".tab").not("[data-filter='" + cat + "']").removeClass("swiper-slide").addClass("disabled_slide hide");
        //         // $('.portfolio_works_slider div[data-fiter]').css({display:'none'}); // скрываем все позиции
        //         $('.tab[data-filter="' + cat + '"]').removeClass("disabled_slide hide").addClass("swiper-slide"); // и отображаем позиции из соответствующей категории
        //         tabSlider.destroy();
        //         tabSlider = new Swiper('.media--tabs__slider', {
        //             initialSlide: 0,
        //             loop: false,
        //             loopFillGroupWithBlank: false,
        //             loopFillGroupBlank: false,
        //             pagination: {
        //                 el: '.media__tab--swiper-pagination',
        //                 clickable: true,
        //             },
        //             navigation: {
        //                 nextEl: ".swiper-button-next",
        //                 prevEl: ".swiper-button-prev",
        //             },
        //             breakpoints: {
        //                 320: {
        //                     slidesPerView: 1.08,
        //                     spaceBetween: 10
        //                 },
        //                 580: {
        //                     slidesPerView: 'auto',
        //                     spaceBetween: 40
        //                 },
        //             }
        //         });
        //         const tabSlid = document.querySelector('.media--tabs__slider');
        //         const countSlideTab = document.querySelectorAll('.tab.swiper-slide');
        //         const windowWidh = window.innerWidth;
        //         if (windowWidh > 580) {
        //             if (countSlideTab.length < 4) {
        //                 tabSlid.classList.add('padding');
        //             } else {
        //                 tabSlid.classList.remove('padding');
        //             }
        //         }
        //     }
        // });


        // const buttons = document.querySelectorAll(".media__tabs-btn");
        // const cards = document.querySelectorAll(".tab__card");
        //
        // function filter(category, items) {
        //     items.forEach((item) => {
        //         const isItemFiltered = !item.classList.contains(category);
        //         const isShowAll = category.toLowerCase() ==="all";
        //         if (isItemFiltered && !isShowAll) {
        //             item.classList.remove('swiper-slide');
        //             item.classList.add('disabled_slide');
        //
        //             tabSlider.destroy();
        //
        //             item.classList.add("hide");
        //         } else {
        //             item.classList.remove("hide");
        //             item.classList.remove('disabled_slide');
        //             item.classList.add('swiper-slide');
        //
        //             tabSlider = new Swiper('.media--tabs__slider', {
        //                 initialSlide: 0,
        //                 loop: false,
        //                 loopFillGroupWithBlank: false,
        //                 loopFillGroupBlank: false,
        //                 pagination: {
        //                     el: '.media__tab--swiper-pagination',
        //                     clickable: true,
        //                 },
        //                 breakpoints: {
        //                     320: {
        //                         slidesPerView: 1.08,
        //                         spaceBetween: 10
        //                     },
        //                     580: {
        //                         slidesPerView: 'auto',
        //                         spaceBetween: 40
        //                     },
        //                 }
        //             });
        //             const tabSlid = document.querySelector('.media--tabs__slider');
        //             const countSlideTab = document.querySelectorAll('.tab.swiper-slide');
        //             const windowWidh = window.innerWidth;
        //             if (windowWidh > 580) {
        //                 if (countSlideTab.length < 4) {
        //                     tabSlid.classList.add('padding');
        //                 } else {
        //                     tabSlid.classList.remove('padding');
        //                 }
        //             }
        //
        //         }
        //     });
        // }
        //
        // buttons.forEach((button) => {
        //     button.addEventListener("click", () => {
        //         const currentCategory = button.dataset.filter;
        //         console.log(currentCategory);
        //         filter(currentCategory, cards);
        //
        //         buttons.forEach(function (el){
        //             if (el.dataset.filter == currentCategory){
        //                 el.classList.add('active');
        //             } else {
        //                 el.classList.remove('active');
        //             }
        //         })
        //     });
        // });


    }


    load();
})