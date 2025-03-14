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

$button_background=carbon_get_theme_option('button_background');
$button_background_hover=carbon_get_theme_option('button_background_hover');








// В футтере генерятся стили, чтобы неперебивались.
$GLOBALS['btn_post_class_random'] = 'post_'.get_the_ID().'_btn_'.uniqid();

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
        setTimeout(function (){
            (function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
                    new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
                j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
                'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
            })(window,document,'script','dataLayer','GTM-KWNTV9F');
        },2000)
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
        @media(max-width: 1200px) {
            .header_right {
                background-color: <?= $headerBackground; ?>
            }
            .header_nav {
                border-color: <?= $headerPrimary ?>;
                margin-top:24px;
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
        .footer_row+.footer_row {
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
        .tools_category_class :hover{
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
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-KWNTV9F"
                  height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->

    <header class="header">
        <div class="header_wrapper" style="background-color: <?= $headerBackground; ?>">
            <a href="<?=home_url()?>" class="header_logo" id="headerLogo">
                <? if(get_post_type() == 'post' and !empty($posts_header_logo)): ?>
                    <img alt="logo" data-src="<?= $posts_header_logo ?>" class=" lazyloaded" src="<?= $posts_header_logo ?>" width="264" height="51">
                <? else: ?>
                    <? if(!empty($logo)): ?>    
                        <img src="https://24ai.tech/ru/wp-content/uploads/sites/4/2024/10/24ai_logo_white0.svg<?//= get_the_post_thumbnail_url(); ?>" alt="logo" width="264" height="51">
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
                    <?php foreach ($menuHeader as $key => $item ) : ?>
                        <div class="header_nav__item

                        <?php if ($item['sub_menu'] || $key<3) {echo ' header_nav__item--has-sub-menu';} ?>">
                            <a href="<?=( !empty($item['item_link']) ) ? $item['item_link'] : '#' ?>" class="nav__link" <?php if ($item['sub_menu']) {echo 'onclick="return false"';} ?>>
        	                   <?php if($key==2): ?>
                                <svg width="20px" height="20px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">-->
                                                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M23.1117 4.49449C23.4296 2.94472 21.9074 1.65683 20.4317 2.227L2.3425 9.21601C0.694517 9.85273 0.621087 12.1572 2.22518 12.8975L6.1645 14.7157L8.03849 21.2746C8.13583 21.6153 8.40618 21.8791 8.74917 21.968C9.09216 22.0568 9.45658 21.9576 9.70712 21.707L12.5938 18.8203L16.6375 21.8531C17.8113 22.7334 19.5019 22.0922 19.7967 20.6549L23.1117 4.49449ZM3.0633 11.0816L21.1525 4.0926L17.8375 20.2531L13.1 16.6999C12.7019 16.4013 12.1448 16.4409 11.7929 16.7928L10.5565 18.0292L10.928 15.9861L18.2071 8.70703C18.5614 8.35278 18.5988 7.79106 18.2947 7.39293C17.9906 6.99479 17.4389 6.88312 17.0039 7.13168L6.95124 12.876L3.0633 11.0816ZM8.17695 14.4791L8.78333 16.6015L9.01614 15.321C9.05253 15.1209 9.14908 14.9366 9.29291 14.7928L11.5128 12.573L8.17695 14.4791Z" fill="#0F0F0F"/>-->
                                                                </svg>
        	                   <?php endif ?>
        	                    <?php if ($item['sub_menu']) : ?>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="25" viewBox="0 0 24 25" fill="none">
                                        <path d="M5.49756 11.5H18.5026" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="M5.49756 15.5017H18.5026" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="M5.49731 7.49832H18.5024" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                    </svg>
        	                    <?php endif; ?>
                                <?= $item['item_text']; ?>
                            </a>
        	                <?php if ($item['sub_menu']) : ?>
                                <div class="header_content header_content--item content--submenu"  style="background-color: <?= $headerBackground; ?>; border-color: <?= $headerHover?> !important" itemscope itemtype="https://schema.org/ItemList">
                                    <div class="header_content_items">
        				                <?php foreach ($item['sub_menu'] as $row) : ?>
                                            <link itemprop="url" href="<?= $row['item_link']; ?>"/>
                                            <meta itemprop="name" content="<?= $row['item_text']; ?>" />
                                            <a itemprop="url" href="<?= $row['item_link']; ?>" class="header_content_item">
									        <div>
									            <div itemprop="itemListElement" class="header_content-head" itemscope  itemtype="https://schema.org/ItemList">
									                <? if ( !empty($row['item_icon']) ) { ?>
									                <img itemprop="image" class="header_content-icon" alt="img"  src="<?= $row['item_icon']; ?>">
                                                    <? } ?>
                                                    <span itemprop="name" class="header_content-title"><?= $row['item_text']; ?></span>
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
                                            <?=$item['city']; ?>
                                        </div>
                                        <div class="header_content-text">
    	                                    <?=$item['address']; ?><br>
                                            <? if ( !empty($item['email']) ) { ?>
                                                <a href="mailto:<?=$item['email']; ?>" class="footer_item-mail"><?=$item['email']; ?></a><br/>
                                            <? } ?>
                                            <? if ( !empty($item['phone']) ) { ?>
                                                <a href="tel:<?=$item['phone']; ?>" class="footer_item-mail"><?=$item['phone']; ?></a><br/>
                                            <? } ?>
                                        </div>
                                    </div>
    	                        <?php endforeach; ?>
                            </div>
                        </div>
    	            <?php endif; ?>

                    <div class="header_socials">
                        <?php foreach($footer_social_menu as $menu_item): ?>
                            <a target="_blank" href="<?= $menu_item['item_link'] ?>">
                                <img src="<?= $menu_item['item_image'] ?>" alt="#">
                            </a>
                        <?php endforeach; ?>
                    </div>
                    <div class="header_schedule-xs"><a target="_blank" href="<?= $header_button_link  ?><?= get_params_string() ?>" class="site-btn header-btn <?=$GLOBALS['btn_post_class_random']?>"><?= $header_button_text;?></a><div></div></div>

<!--                    <div class="header_nav__item header_nav__item--has-sub-menu">-->
<!--                        <a href="https://t.me/help_24ai_tech" target="_blank" class="nav__link" >-->
<!--                            <svg width="20px" height="20px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">-->
<!--                                <path fill-rule="evenodd" clip-rule="evenodd" d="M23.1117 4.49449C23.4296 2.94472 21.9074 1.65683 20.4317 2.227L2.3425 9.21601C0.694517 9.85273 0.621087 12.1572 2.22518 12.8975L6.1645 14.7157L8.03849 21.2746C8.13583 21.6153 8.40618 21.8791 8.74917 21.968C9.09216 22.0568 9.45658 21.9576 9.70712 21.707L12.5938 18.8203L16.6375 21.8531C17.8113 22.7334 19.5019 22.0922 19.7967 20.6549L23.1117 4.49449ZM3.0633 11.0816L21.1525 4.0926L17.8375 20.2531L13.1 16.6999C12.7019 16.4013 12.1448 16.4409 11.7929 16.7928L10.5565 18.0292L10.928 15.9861L18.2071 8.70703C18.5614 8.35278 18.5988 7.79106 18.2947 7.39293C17.9906 6.99479 17.4389 6.88312 17.0039 7.13168L6.95124 12.876L3.0633 11.0816ZM8.17695 14.4791L8.78333 16.6015L9.01614 15.321C9.05253 15.1209 9.14908 14.9366 9.29291 14.7928L11.5128 12.573L8.17695 14.4791Z" fill="#0F0F0F"/>-->
<!--                            </svg>-->
<!--                            Поддержка                           </a>-->
<!--                    </div>-->



                </nav>
                <div class="header_inner">
           <!--         <div class="language-container" style='display:<?php if ($hideLanguage===true) {echo 'none;';} ?>'>
    <button class="language-btn"></button>
    <div class="language-dropdown" >
<?php //if ( function_exists( 'the_msls' ) ) the_msls(); ?>
    </div>
</div>-->

                    <? if(empty($BtnUniqueText)): ?>
                        <a target="_blank" href="<?= $header_button_link  ?><?= get_params_string() ?>" class="site-btn header-btn <?=$GLOBALS['btn_post_class_random']?>"><?= $header_button_text; ?></a>
                    <? else: ?>
                        <a target="_blank" href="<?= $header_button_link  ?><?= get_params_string() ?>" class="site-btn header-btn <?=$GLOBALS['btn_post_class_random']?>"><?= $BtnUniqueText; ?></a>
                    <? endif; ?>
                </div>
            </div>
        </div>
        <div class="menu__open"></div>
       





    </header>

<?php
// ob_end_flush();
?>