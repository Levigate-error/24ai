<?php
$logoHeader = carbon_get_theme_option('header_logo');
$posts_header_logo = carbon_get_theme_option('posts_header_logo');
$menuHeader = carbon_get_theme_option('header_menu');
// if (is_page() && !is_front_page()) {
//    $firstItem = array_shift($menuHeader);   // Get the first item
//    $lastTwoItems = array_splice($menuHeader, -2);   // Get the last two items

//    $menuHeader = array_merge([$firstItem], $lastTwoItems);   // Merge the first item with the last two items
// }
/*if(empty($menuHeader)){
    $menuHeader = carbon_get_post_meta(get_the_ID(), 'header_menu');
}*/
$header_button_text = carbon_get_theme_option('header_button_text');
$header_button_link = carbon_get_theme_option('header_button_link');
$headerContact = carbon_get_theme_option('footer_contacts');
$footer_social_menu = carbon_get_theme_option('footer_social_menu');
$headerBackground = carbon_get_theme_option('header_background');
$headerHover = carbon_get_theme_option('header_hover_background');
$headerPrimary = carbon_get_theme_option('header_primary_color');
$headerSecondary = carbon_get_theme_option('header_secondary_color');
$hideLanguage = carbon_get_post_meta(get_the_ID(), 'hide_lang_switcher');
$BtnUniqueText = carbon_get_theme_option('btn_unique_text');

$footerBackground = carbon_get_theme_option('footer_background');
$footerPrimary = carbon_get_theme_option('footer_primary_color');
$footerSecondary = carbon_get_theme_option('footer_secondary_color');
$logo = get_the_post_thumbnail_url();

$button_background = carbon_get_theme_option('button_background');
$button_background_hover = carbon_get_theme_option('button_background_hover');


$billingsModalTitle = carbon_get_theme_option('billings_modal_title');
$billingsModalDescription = carbon_get_theme_option('billings_modal_description');
$billingsModalDescriptionColor = carbon_get_theme_option('billings_modal_description_color');
$billingsModalList = carbon_get_theme_option('billings_modal_list');

// В футтере генерятся стили, чтобы неперебивались.
$GLOBALS['btn_post_class_random'] = 'post_' . get_the_ID() . '_btn_' . uniqid();

function callback($buffer)
{
    // заменить все яблоки апельсинами
    // $buffer = str_replace('<script', '<script defer="defer" ', $buffer);
    // $buffer = preg_replace('=<script .*?src\="/test2\.js\??.*?".*></script>=',"",$buffer);
    // $buffer = preg_replace('=<script.*>.*</script>=',"" , $buffer);
    return $buffer;
}

// ob_start("callback");

?>
    <!DOCTYPE html>
<html <?php language_attributes(); ?>>
    <head>
        <meta charset="<?php bloginfo('charset'); ?>">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width">
        <?php wp_head(); ?>

        <?
        $my_field = get_field('title2');


        ?>
        <?php if ($my_field): ?>
            <meta name="title2" content="<?php echo esc_attr($my_field); ?>">
        <?php endif; ?>


        <!-- Google Tag Manager -->
        <script>
          setTimeout(function () {
            (function (w, d, s, l, i) {
              w[l] = w[l] || [];
              w[l].push({
                'gtm.start':
                  new Date().getTime(), event: 'gtm.js'
              });
              var f = d.getElementsByTagName(s)[0],
                j = d.createElement(s), dl = l != 'dataLayer' ? '&l=' + l : '';
              j.async = true;
              j.src =
                'https://www.googletagmanager.com/gtm.js?id=' + i + dl;
              f.parentNode.insertBefore(j, f);
            })(window, document, 'script', 'dataLayer', 'GTM-KWNTV9F');
          }, 2000)
        </script>
        <!-- End Google Tag Manager -->

        <style>
            .header_content_item:hover {
                background-color: <?= $headerHover ?> !important;
            }

            .header_nav__item a, .header_content-title {
                color: <?= $headerPrimary ?>;
            }

            .header_content-text {
                color: <?= $headerSecondary ?>;
            }

            .header_nav__item--has-sub-menu .nav__link {
                border-color: <?= $headerPrimary ?>;
            }

            .header_nav__item--has-sub-menu .nav__link path {
                stroke: <?= $headerPrimary ?>;
            }

            #billings-modal {
                display: none;
                position: fixed;

                width: 100vw;
                height: 100vh;

                top: 0;
                left: 0;
                z-index: 99999999;
            }

            #billings-modal .billings-modal__bg {
                position: absolute;
                top: 0;
                left: 0;
                width: 100vw;
                height: 100vh;

                background: #000000;
                opacity: 0.7;
            }

            #billings-modal .billings-modal--close {
                position: absolute;
                top: 28px;
                right: 28px;

                cursor: pointer;
            }

            #billings-modal .billings-modal__content {
                position: relative;

                width: fit-content;
                height: fit-content;

                z-index: 2;

                display: flex;
                flex-direction: column;
                margin: auto;

                padding: 60px;
                border-radius: 32px;

                background: #000000;
            }

            #billings-modal .billings-modal__content .billings-modal__title {
                background: linear-gradient(62.12deg, #3ece31 5.42%, #32e4e4 91.44%);
                -webkit-background-clip: text;
                -webkit-text-fill-color: transparent;
                background-clip: text;

                font-weight: 600;
                font-size: 48px;
                line-height: 57px;
                letter-spacing: 0;
                text-align: center;
                margin-bottom: 24px;
            }
            #billings-modal .billings-modal__content .billings-modal__description {
                font-weight: 400;
                font-size: 16px;
                line-height: 18px;
                letter-spacing: 0;
                text-align: center;
                margin-bottom: 48px;
            }

            .billings-modal__content-items {
                display: flex;
                gap: 18px;
                flex-wrap: wrap;
                justify-content: center;
            }

            .billings-modal__content-items__item {
                padding: 32px;

                border-bottom-left-radius: 16px;
                border-bottom-right-radius: 16px;
                transition: height 0.5s ease;

                position: relative;

                min-width: 290px;
            }

            .billings-modal__content-items__item--bordered {
                border-top-left-radius: 16px;
                border-top-right-radius: 16px;
            }

            .billings-modal__content-items__item.billings-modal__content-items__item--individual .billings-modal__content-items__item-divider {
                margin-top: 90px;
            }

            .billings-modal__content-items__item-title {
                font-weight: 600;
                font-size: 20px;
                line-height: 26px;
                letter-spacing: 0px;

                background: linear-gradient(62.12deg, #3ece31 5.42%, #32e4e4 91.44%);
                -webkit-background-clip: text;
                -webkit-text-fill-color: transparent;
                background-clip: text;

                margin-bottom: 14px;
            }

            .billings-modal__content-items__item-price {
                margin-top: 14px;

                display: flex;
                gap: 4px;

                margin-bottom: 10px;

                align-items: flex-end;
            }

            .billings-modal__content-items__item-price-prefix {
                font-weight: 400;
                font-size: 12px;
                line-height: 100%;
                letter-spacing: 0px;

                margin-right: 1px;
                margin-bottom: 2px;
                color: #FFFFFF;
            }

            .billings-modal__content-items__item-price-value {
                font-weight: 600;
                font-size: 32px;
                line-height: 32px;
                letter-spacing: 0;
            }

            .billings-modal__content-items__item-price-value_post {
                font-weight: 400;
                font-size: 12px;
                line-height: 100%;
                margin-bottom: 2px;
                letter-spacing: 0;
            }

            .billings-modal__content-items__item-price_sub {
                font-weight: 400;
                font-size: 12px;
                line-height: 16px;
                letter-spacing: 0;

                margin-bottom: 24px;
            }

            .billings-modal__content-items__item-price_sub span {
                font-weight: 400;
                font-size: 12px;
                line-height: 16px;
                letter-spacing: 0;
            }

            .billings-modal__content-items__item-count {
                display: flex;
                flex-direction: column;

                align-items: center;

                margin-bottom: 24px;
            }

            .billings-modal__content-items__item-count-value {
                font-weight: 600;
                font-size: 20px;
                line-height: 26px;
                letter-spacing: 0;
            }
            .billings-modal__content-items__item-count-sub {
                font-weight: 600;
                font-size: 12px;
                line-height: 16px;
                letter-spacing: 0;
            }

            .billings-modal__content-items__item-divider {
                width: calc(100% + 26px);
                height: 1px;
                background-color: #ffffff;
                opacity: 0.1;
                margin: 0 -13px;
            }

            .billings-modal__content-items__item-dropdown {
                margin-top: 24px;

                display: flex;

                flex-direction: column;
                margin-bottom: 16px;
            }

            .billings-modal__content-items__item-dropdown-head {
                display: flex;
                align-items: center;
                justify-content: center;
                gap: 4px;

                cursor: pointer;
            }

            .billings-modal__content-items__item-dropdown-head-title {
                background: linear-gradient(62.12deg, #3ece31 5.42%, #32e4e4 91.44%);
                -webkit-background-clip: text;
                -webkit-text-fill-color: transparent;
                background-clip: text;
            }

            .billings-modal__content-items__item-dropdown-head svg {
                transform: rotate(180deg);
                transition: transform 0.5s ease;
            }

            .billings-modal__content-items__item-dropdown-content {
                display: none;
                flex-direction: column;
                gap: 4px;
                overflow: hidden;

                transition: height 0.5s ease;

                margin-top: 16px;
            }

            .billings-modal__content-items__item-dropdown--active .billings-modal__content-items__item-dropdown-content {
                display: flex;
            }

            .billings-modal__content-items__item-dropdown--active .billings-modal__content-items__item-dropdown-head svg {
                transform: rotate(0);
            }

            .billings-modal__content-items__item-dropdown-content__item {
                display: flex;
                gap: 8px;

                align-items: center;
            }

            .billings-modal__content-items__item-dropdown-content__item-text {
                font-weight: 400;
                font-size: 14px;
                line-height: 16px;
                letter-spacing: 0;
            }

            .billings-modal__content-items__item-bonus {
                display: flex;

                padding: 6px 0;
                justify-content: center;
                align-items: center;
                gap: 4px;

                background-color: #FFFFFF;

                position: absolute;

                top: 0;
                left: 0;
                transform: translateY(-100%);

                border-top-left-radius: 16px;
                border-top-right-radius: 16px;
                width: 100%;
                border-bottom: 1px solid #1F2535;
            }

            .billings-modal__content-items__item-bonus span {
                font-weight: 600;
                font-size: 11px;
                line-height: 16px;
                letter-spacing: 0;
                text-align: right;

                color: #FFFFFF;
            }

            .billings-modal__content-items__item-bonus img {
                height: 16px;
                width: auto;
                margin: unset;
            }

            .billings-modal__content-items__item-btn {
                color: #0F0F0F;

                width: 100%;
                padding-top: 14px;
                padding-bottom: 14px;

                background: linear-gradient(62.12deg, #3ece31 5.42%, #32e4e4 91.44%);

                font-weight: 600;
                font-size: 16px;
                line-height: 18px;
                letter-spacing: 0;
                text-align: center;

                display: flex;
                justify-content: center;
                margin-bottom: 24px;
                border-radius: 6px;
            }

            @media (max-width: 1200px) {
                .header_right {
                    background-color: <?= $headerBackground; ?>
                }

                .header_nav {
                    border-color: <?= $headerPrimary ?>;
                    margin-top: 24px;
                }

                .header_content .header_content_item .header_content-title {
                    color: <?= $headerPrimary ?> !important;
                }

                .header_content-text {
                    color: <?= $headerSecondary ?>;
                }

                .header_content .header_content_items a {
                    margin: 10px 0;
                    display: inline-block;
                    color: <?= $headerPrimary ?>;
                }

                .header_socials {
                    display: flex;
                    justify-content: center;
                }

                .header_schedule-xs {
                    width: 100%;
                }

                .header_schedule-xs a {
                    width: 100%;
                }

                .header_content .header_content_items {
                    display: flex !important;
                }
            }

            @media (max-width: 600px) {
                .footer_documents {
                    flex-direction: column;
                }
            }

            footer {
                background-color: <?= $footerBackground ?>;
            }

            .footer_item-title, .footer_item-mail, .footer_bottom {
                color: <?= $footerPrimary; ?>;
            }

            .footer_item-text, .footer_item-title-city, .footer_title {
                color: <?= $footerSecondary; ?>;
            }

            .footer_row + .footer_row {
                border-color: rgba(0, 0, 0, 0.15);
            }

            .lang-selector {
                background: none;
                border: none;
                color: #fff;
                font-weight: 500;
                font-size: 18px;
                line-height: 24px;
            }

            .lang-selector option {
                font-size: 16px;
                color: #000;
            }

            .tools_category_class :hover {
                background-color: <?=$button_hover_color?>;
            }

            .tools_category_class {
                background-color: <?=$button_color?>;
            }


            .button {
            <?php echo ($button_background ? "background:".$button_background:''); ?>
            }


            .button:hover {
            <?php echo ($button_background_hover ? "background:".$button_background_hover:''); ?>
            }
        </style>
    </head>
<body <?php body_class() ?>>
<!-- Google Tag Manager (noscript) -->
<noscript>
    <iframe src="https://www.googletagmanager.com/ns.html?id=GTM-KWNTV9F"
            height="0" width="0" style="display:none;visibility:hidden"></iframe>
</noscript>
<!-- End Google Tag Manager (noscript) -->

<header class="header">
    <div class="header_wrapper" style="background-color: <?= $headerBackground; ?>">
        <a href="<?= home_url() ?>" class="header_logo" id="headerLogo">
            <? if (get_post_type() == 'post' and !empty($posts_header_logo)): ?>
                <img alt="logo" data-src="<?= $posts_header_logo ?>" class=" lazyloaded" src="<?= $posts_header_logo ?>"
                     width="264" height="51">
            <? else: ?>
                <? if (!empty($logo)): ?>
                    <img src="https://24ai.tech/ru/wp-content/uploads/sites/4/2024/10/24ai_logo_white0.svg<? //= get_the_post_thumbnail_url(); ?>"
                         alt="logo" width="264" height="51">
                <? else: ?>
                    <img src="<?= $logoHeader; ?>" alt="logo">
                <? endif; ?>
            <? endif; ?>
        </a>
        <div class="lang-switcher-mobile-wrapper">
            <!--       <div class="language-container">
    <button class="language-btn"></button>
    <div class="language-dropdown">
<?php //if ( function_exists( 'the_msls' ) ) the_msls(); ?>
    </div>
</div>-->

        </div>
        <div class="header-menu-button">
            <img class="header-menu-active" src="<?= get_template_directory_uri() ?>/img/menu.svg" alt="#">
            <img class="header-menu-close" src="<?= get_template_directory_uri() ?>/img/close.svg" alt="#">
        </div>
        <div class="header_right">
            <nav class="header_nav">
                <?php foreach ($menuHeader as $key => $item) : ?>
                    <div class="header_nav__item

                        <?php if ($item['sub_menu'] || $key < 3) {
                        echo ' header_nav__item--has-sub-menu';
                    } ?>">
                        <a href="<?= (!empty($item['item_link'])) ? $item['item_link'] : '#' ?>"
                           class="nav__link" <?php if ($item['sub_menu']) {
                            echo 'onclick="return false"';
                        } ?>>
                            <?php if ($key == 2): ?>
                                <svg width="20px" height="20px" viewBox="0 0 24 24" fill="none"
                                     xmlns="http://www.w3.org/2000/svg">-->
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                          d="M23.1117 4.49449C23.4296 2.94472 21.9074 1.65683 20.4317 2.227L2.3425 9.21601C0.694517 9.85273 0.621087 12.1572 2.22518 12.8975L6.1645 14.7157L8.03849 21.2746C8.13583 21.6153 8.40618 21.8791 8.74917 21.968C9.09216 22.0568 9.45658 21.9576 9.70712 21.707L12.5938 18.8203L16.6375 21.8531C17.8113 22.7334 19.5019 22.0922 19.7967 20.6549L23.1117 4.49449ZM3.0633 11.0816L21.1525 4.0926L17.8375 20.2531L13.1 16.6999C12.7019 16.4013 12.1448 16.4409 11.7929 16.7928L10.5565 18.0292L10.928 15.9861L18.2071 8.70703C18.5614 8.35278 18.5988 7.79106 18.2947 7.39293C17.9906 6.99479 17.4389 6.88312 17.0039 7.13168L6.95124 12.876L3.0633 11.0816ZM8.17695 14.4791L8.78333 16.6015L9.01614 15.321C9.05253 15.1209 9.14908 14.9366 9.29291 14.7928L11.5128 12.573L8.17695 14.4791Z"
                                          fill="#0F0F0F"/>
                                    -->
                                </svg>
                            <?php endif ?>
                            <?php if ($item['sub_menu']) : ?>
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="25" viewBox="0 0 24 25"
                                     fill="none">
                                    <path d="M5.49756 11.5H18.5026" stroke="white" stroke-width="1.5"
                                          stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M5.49756 15.5017H18.5026" stroke="white" stroke-width="1.5"
                                          stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M5.49731 7.49832H18.5024" stroke="white" stroke-width="1.5"
                                          stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>
                            <?php endif; ?>
                            <?= $item['item_text']; ?>
                        </a>
                        <?php if ($item['sub_menu']) : ?>
                            <div class="header_content header_content--item content--submenu"
                                 style="background-color: <?= $headerBackground; ?>; border-color: <?= $headerHover ?> !important"
                                 itemscope itemtype="https://schema.org/ItemList">
                                <div class="header_content_items">
                                    <?php foreach ($item['sub_menu'] as $row) : ?>
                                        <link itemprop="url" href="<?= $row['item_link']; ?>"/>
                                        <meta itemprop="name" content="<?= $row['item_text']; ?>"/>
                                        <a itemprop="url" href="<?= $row['item_link']; ?>" class="header_content_item">
                                            <div>
                                                <div itemprop="itemListElement" class="header_content-head" itemscope
                                                     itemtype="https://schema.org/ItemList">
                                                    <? if (!empty($row['item_icon'])) { ?>
                                                        <img itemprop="image" class="header_content-icon" alt="img"
                                                             src="<?= $row['item_icon']; ?>">
                                                    <? } ?>
                                                    <span itemprop="name"
                                                          class="header_content-title"><?= $row['item_text']; ?></span>
                                                </div>
                                                <div class="header_content-text"><?= $row['item_desc']; ?></div>
                                            </div>
                                        </a>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                        <?php endif; ?>
                    </div>
                <?php endforeach; ?>


                <?php if ($headerContact) : ?>
                    <div class="header_content header_content-mob header_content-mob--contact">
                        <div class="header_content_items">
                            <?php foreach ($headerContact as $item) : ?>
                                <div class="header_content_item">
                                    <div class="header_content-title">
                                        <?= $item['city']; ?>
                                    </div>
                                    <div class="header_content-text">
                                        <?= $item['address']; ?><br>
                                        <? if (!empty($item['email'])) { ?>
                                            <a href="mailto:<?= $item['email']; ?>"
                                               class="footer_item-mail"><?= $item['email']; ?></a><br/>
                                        <? } ?>
                                        <? if (!empty($item['phone'])) { ?>
                                            <a href="tel:<?= $item['phone']; ?>"
                                               class="footer_item-mail"><?= $item['phone']; ?></a><br/>
                                        <? } ?>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                <?php endif; ?>

                <div class="header_socials">
                    <?php foreach ($footer_social_menu as $menu_item): ?>
                        <a target="_blank" rel="noopener noreferrer" href="<?= $menu_item['item_link'] ?>">
                            <img src="<?= $menu_item['item_image'] ?>" alt="#">
                        </a>
                    <?php endforeach; ?>
                </div>
                <div class="header_schedule-xs"><a target="_blank" rel="noopener noreferrer"
                                                   href="<?= $header_button_link ?><?= get_params_string() ?>"
                                                   class="site-btn header-btn <?= $GLOBALS['btn_post_class_random'] ?>"><?= $header_button_text; ?></a>
                    <div></div>
                </div>

                <!--                    <div class="header_nav__item header_nav__item--has-sub-menu">-->
                <!--                        <a href="https://t.me/help_24ai_tech" target="_blank" class="nav__link" >-->
                <!--                            <svg width="20px" height="20px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">-->
                <!--                                <path fill-rule="evenodd" clip-rule="evenodd" d="M23.1117 4.49449C23.4296 2.94472 21.9074 1.65683 20.4317 2.227L2.3425 9.21601C0.694517 9.85273 0.621087 12.1572 2.22518 12.8975L6.1645 14.7157L8.03849 21.2746C8.13583 21.6153 8.40618 21.8791 8.74917 21.968C9.09216 22.0568 9.45658 21.9576 9.70712 21.707L12.5938 18.8203L16.6375 21.8531C17.8113 22.7334 19.5019 22.0922 19.7967 20.6549L23.1117 4.49449ZM3.0633 11.0816L21.1525 4.0926L17.8375 20.2531L13.1 16.6999C12.7019 16.4013 12.1448 16.4409 11.7929 16.7928L10.5565 18.0292L10.928 15.9861L18.2071 8.70703C18.5614 8.35278 18.5988 7.79106 18.2947 7.39293C17.9906 6.99479 17.4389 6.88312 17.0039 7.13168L6.95124 12.876L3.0633 11.0816ZM8.17695 14.4791L8.78333 16.6015L9.01614 15.321C9.05253 15.1209 9.14908 14.9366 9.29291 14.7928L11.5128 12.573L8.17695 14.4791Z" fill="#0F0F0F"/>-->
                <!--                            </svg>-->
                <!--                            Поддержка                           </a>-->
                <!--                    </div>-->


            </nav>
            <div class="header_inner">
                <!--         <div class="language-container" style='display:<?php if ($hideLanguage === true) {
                    echo 'none;';
                } ?>'>
    <button class="language-btn"></button>
    <div class="language-dropdown" >
<?php //if ( function_exists( 'the_msls' ) ) the_msls(); ?>
    </div>
</div>-->
                <div id="billings-modal-btn" class="site-btn header-btn <?= $GLOBALS['btn_post_class_random'] ?>"
                     style="margin-right: 12px">
                    Тарифы

                    <div id="billings-modal">
                        <div class="billings-modal__bg" ></div>
                        <div class="billings-modal__content">
                            <div class="billings-modal--close">
                                <svg width="25" height="25" viewBox="0 0 25 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M23.7422 1.43811L0.886215 24.2941" stroke="white" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M23.7422 24.2939L0.886217 1.43797" stroke="white" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>
                            </div>
                            <div class="billings-modal__title"><?= $billingsModalTitle ?></div>
                            <div class="billings-modal__description" style="color: <?= $billingsModalDescriptionColor ?>"><?= $billingsModalDescription ?></div>

                            <div class="billings-modal__content-items">
                                <?php foreach ($billingsModalList as $billingsModalListItem): ?>
                                    <div class="billings-modal__content-items__item <?= $billingsModalListItem['billing_modal_list_item_is_individual'] ? " billings-modal__content-items__item--individual" : ""?> <?= empty($billingsModalListItem['billing_modal_list_item_bonus']) ? " billings-modal__content-items__item--bordered" : ""?>" style="background-color: <?= $billingsModalListItem['billing_modal_list_item_background_color'] ?>">
                                        <div class="billings-modal__content-items__item-title">
                                            <?= $billingsModalListItem['billing_modal_list_item_title'] ?>
                                        </div>
                                        <div class="billings-modal__content-items__item-price">
                                            <?php if ($billingsModalListItem['billing_modal_list_item_is_individual']): ?>
                                                <div class="billings-modal__content-items__item-price-prefix">
                                                    от
                                                </div>
                                            <?php endif; ?>
                                            <div class="billings-modal__content-items__item-price-value" style="color: <?= $billingsModalListItem['billing_modal_list_item_price_color'] ?>">
                                                <?= $billingsModalListItem['billing_modal_list_item_price'] ?>
                                            </div>
                                            <div class="billings-modal__content-items__item-price-value_post" style="color: <?= $billingsModalListItem['billing_modal_list_item_price_post_color'] ?>">
                                                <?= $billingsModalListItem['billing_modal_list_item_price_post'] ?>
                                            </div>
                                        </div>
                                        <div class="billings-modal__content-items__item-price_sub" style="color: <?= $billingsModalListItem['billing_modal_list_item_sub_price_color'] ?>">
                                            <?= $billingsModalListItem['billing_modal_list_item_sub_price'] ?>
                                            <span style="color: <?= $billingsModalListItem['billing_modal_list_item_sub_post_price_color'] ?>">
                                                <?= $billingsModalListItem['billing_modal_list_item_sub_post_price'] ?>
                                            </span>
                                        </div>
                                        <a class="billings-modal__content-items__item-btn" href="<?= $billingsModalListItem['billing_modal_list_item_btn_link'] ?>">
                                            <?= $billingsModalListItem['billing_modal_list_item_btn'] ?>
                                        </a>
                                        <?php if (!empty($billingsModalListItem['billing_modal_list_item_count'])): ?>
                                            <div class="billings-modal__content-items__item-count">
                                                <div class="billings-modal__content-items__item-count-value" style="color: <?= $billingsModalListItem['billing_modal_list_item_count_color'] ?>">
                                                    <?php if ($billingsModalListItem['billing_modal_list_item_count_infinite']): ?>
                                                        <svg width="34" height="17" viewBox="0 0 34 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path d="M25.3867 16.4648C23.8503 16.4648 22.431 16.0742 21.1289 15.293C19.8268 14.4987 18.4271 13.1836 16.9297 11.3477C15.5104 13.1576 14.1432 14.4596 12.8281 15.2539C11.513 16.0352 10.0742 16.4258 8.51172 16.4258C6.10286 16.4258 4.11068 15.6576 2.53516 14.1211C0.959635 12.5846 0.171875 10.638 0.171875 8.28125C0.171875 5.92448 0.966146 3.96484 2.55469 2.40234C4.14323 0.839844 6.14193 0.0585938 8.55078 0.0585938C10.1133 0.0585938 11.5521 0.455729 12.8672 1.25C14.1823 2.04427 15.5625 3.35286 17.0078 5.17578C18.388 3.39193 19.7422 2.10286 21.0703 1.30859C22.3984 0.501302 23.8503 0.0976562 25.4258 0.0976562C27.8346 0.0976562 29.8268 0.872396 31.4023 2.42188C32.9779 3.95833 33.7656 5.89844 33.7656 8.24219C33.7656 10.599 32.9648 12.5586 31.3633 14.1211C29.7747 15.6836 27.7826 16.4648 25.3867 16.4648ZM8.76562 4.14062C7.56771 4.14062 6.5651 4.53776 5.75781 5.33203C4.95052 6.11328 4.54688 7.08984 4.54688 8.26172C4.54688 9.43359 4.95052 10.4102 5.75781 11.1914C6.5651 11.9727 7.56771 12.3633 8.76562 12.3633C9.74219 12.3633 10.6667 12.0508 11.5391 11.4258C12.4245 10.7878 13.4271 9.72656 14.5469 8.24219C13.3229 6.71875 12.2878 5.65755 11.4414 5.05859C10.5951 4.44661 9.70312 4.14062 8.76562 4.14062ZM28.1797 11.1914C28.987 10.3971 29.3906 9.41406 29.3906 8.24219C29.3906 7.07031 28.987 6.09375 28.1797 5.3125C27.3854 4.53125 26.3893 4.14062 25.1914 4.14062C24.2018 4.14062 23.2578 4.45964 22.3594 5.09766C21.474 5.73568 20.4844 6.79688 19.3906 8.28125C20.6276 9.81771 21.6693 10.8854 22.5156 11.4844C23.362 12.0703 24.2474 12.3633 25.1719 12.3633C26.3698 12.3633 27.3724 11.9727 28.1797 11.1914Z" fill="white"/>
                                                        </svg>
                                                    <?php else: ?>
                                                        <?= $billingsModalListItem['billing_modal_list_item_count'] ?>
                                                    <?php endif; ?>
                                                </div>
                                                <div class="billings-modal__content-items__item-count-sub" style="color: <?= $billingsModalListItem['billing_modal_list_item_count_subs_color'] ?>">
                                                    <?= $billingsModalListItem['billing_modal_list_item_count_subs'] ?>
                                                </div>
                                            </div>
                                        <?php endif; ?>
                                        <div class="billings-modal__content-items__item-divider"></div>
                                        <div class="billings-modal__content-items__item-dropdown billings-modal__content-items__item-dropdown--active">
                                            <div class="billings-modal__content-items__item-dropdown-head">
                                                <div class="billings-modal__content-items__item-dropdown-head-title">
                                                    <?= $billingsModalListItem['billing_modal_list_item_dropdown_title'] ?>
                                                </div>
                                                <svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M1.46967 3.31965C1.76256 3.02675 2.23744 3.02675 2.53033 3.31965L6 6.78932L9.46967 3.31965C9.76256 3.02675 10.2374 3.02675 10.5303 3.31965C10.8232 3.61254 10.8232 4.08741 10.5303 4.38031L6 8.91064L1.46967 4.38031C1.17678 4.08741 1.17678 3.61254 1.46967 3.31965Z" fill="#BDBDBD"/>
                                                </svg>
                                            </div>
                                            <div class="billings-modal__content-items__item-dropdown-content">
                                                <?php foreach ($billingsModalListItem['billing_modal_list_item_dropdown_items'] as $dropdownItem): ?>
                                                    <div class="billings-modal__content-items__item-dropdown-content__item">
                                                        <div class="billings-modal__content-items__item-dropdown-content__item-icon">
                                                            <?php if ($dropdownItem['billing_modal_list_item_dropdown_item_is_plus']): ?>
                                                                <svg width="8" height="8" viewBox="0 0 8 8" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M4 0.5C3.72386 0.5 3.5 0.723858 3.5 1V3.5H1C0.723858 3.5 0.5 3.72386 0.5 4C0.5 4.27614 0.723858 4.5 1 4.5H3.5V7C3.5 7.27614 3.72386 7.5 4 7.5C4.27614 7.5 4.5 7.27614 4.5 7V4.5H7C7.27614 4.5 7.5 4.27614 7.5 4C7.5 3.72386 7.27614 3.5 7 3.5H4.5V1C4.5 0.723858 4.27614 0.5 4 0.5Z" fill="#45C9DB"/>
                                                                </svg>
                                                            <?php else: ?>
                                                                <svg width="8" height="8" viewBox="0 0 8 8" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                    <path d="M5.25586 5.26099C4.9082 5.60864 4.49023 5.78247 4.00195 5.78247C3.51367 5.78247 3.09375 5.60864 2.74219 5.26099C2.39453 4.90942 2.2207 4.4895 2.2207 4.00122C2.2207 3.51294 2.39453 3.09497 2.74219 2.74731C3.09375 2.39575 3.51367 2.21997 4.00195 2.21997C4.49023 2.21997 4.9082 2.39575 5.25586 2.74731C5.60742 3.09497 5.7832 3.51294 5.7832 4.00122C5.7832 4.4895 5.60742 4.90942 5.25586 5.26099Z" fill="#45C9DB"/>
                                                                </svg>
                                                            <?php endif; ?>
                                                        </div>
                                                        <div class="billings-modal__content-items__item-dropdown-content__item-text" style="color: <?= $dropdownItem['billing_modal_list_item_dropdown_item_text_color'] ?>">
                                                            <?= $dropdownItem['billing_modal_list_item_dropdown_item_text'] ?>
                                                        </div>
                                                    </div>
                                                <?php endforeach; ?>
                                            </div>
                                        </div>
                                        <?php if (!empty($billingsModalListItem['billing_modal_list_item_bonus'])): ?>
                                            <div class="billings-modal__content-items__item-bonus" style="background-color: <?= $billingsModalListItem['billing_modal_list_item_background_color'] ?>; padding: <?= !empty($billingsModalListItem['billing_modal_suffix_svg_icon']) ? '12px 0' : '6px 0' ?>;">
                                                <!--                                                <svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">-->
                                                <!--                                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M8.4208 0.076195C8.63766 0.214264 8.78223 0.507028 8.70995 0.777382L7.48106 4.39825L10.0834 4.1185C10.3726 4.08959 10.5894 4.22115 10.734 4.44741C10.8786 4.67439 10.8063 4.94692 10.5894 5.1298L3.79441 11.8149C3.57755 12.021 3.21611 12.0593 2.99925 11.9082C2.7101 11.7571 2.63781 11.4578 2.7101 11.1911L4.15585 7.61866L1.91494 7.88106C1.62579 7.91214 1.40893 7.78708 1.26435 7.56733C1.11978 7.34758 1.19207 7.07795 1.33664 6.89072L7.62564 0.204866C7.77021 -0.00838113 8.13165 -0.0618738 8.4208 0.076195Z" fill="#0F0F0F"/>-->
                                                <!--                                                </svg>-->

                                                <?php
                                                if (!empty($billingsModalListItem['billing_modal_prefix_svg_icon'])) {
                                                    echo '<img src="' . esc_url($billingsModalListItem['billing_modal_prefix_svg_icon']) . '" alt="Billing Icon" style="height: ' . $billingsModalListItem['billing_modal_prefix_svg_icon_height'] . '" />';
                                                }
                                                ?>
                                                <span>
                                                    <?= $billingsModalListItem['billing_modal_list_item_bonus'] ?>
                                                </span>
                                                <?php
                                                if (!empty($billingsModalListItem['billing_modal_suffix_svg_icon'])) {
                                                    echo '<img src="' . esc_url($billingsModalListItem['billing_modal_suffix_svg_icon']) . '" alt="Billing Icon" style="height: ' . $billingsModalListItem['billing_modal_suffix_svg_icon_height'] . '" />';
                                                }
                                                ?>
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>
                </div>

                <? if (empty($BtnUniqueText)): ?>
                    <a target="_blank" rel="noopener noreferrer" href="<?= $header_button_link ?><?= get_params_string() ?>"
                       class="site-btn header-btn <?= $GLOBALS['btn_post_class_random'] ?>"><?= $header_button_text; ?></a>
                <? else: ?>
                    <a target="_blank" rel="noopener noreferrer" href="<?= $header_button_link ?><?= get_params_string() ?>"
                       class="site-btn header-btn <?= $GLOBALS['btn_post_class_random'] ?>"><?= $BtnUniqueText; ?></a>
                <? endif; ?>
            </div>
        </div>
    </div>
    <div class="menu__open"></div>
</header>

<?php
// ob_end_flush();
?>