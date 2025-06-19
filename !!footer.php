<?php

$footer_rounded_borders = carbon_get_theme_option('footer_rounded_borders');

if(!empty($footer_rounded_borders)){
    $bordered_class = 'site-footer--bordered';
}
$footer_tags = carbon_get_post_meta(get_the_ID(), 'footer_settings');
/*if(empty($footer_products_menu)){
    $menuHeader = carbon_get_post_meta(get_the_ID(), 'header_menu');
}
if(empty($footer_products_menu)){
    $footer_items_no_products = 'footer_items--no-products';
}*/
$footer_social_menu = carbon_get_theme_option('footer_social_menu');
$footer_documents = carbon_get_theme_option('footer_documents');
$footer_contacts = carbon_get_theme_option('footer_contacts');
$cookies_text = carbon_get_theme_option('cookies_text');

$homePageId = 1545;
$background_type = carbon_get_post_meta($homePageId, 'orm_block_bg_type');
$id = carbon_get_post_meta($homePageId, 'orm_block_id');
$show_title = carbon_get_post_meta($homePageId, 'orm_block_show_title');
$show_desc = carbon_get_post_meta($homePageId, 'orm_block_show_desc');
$padding_mode = 'site-section--' . carbon_get_post_meta($homePageId, 'orm_block_padding');
if ($background_type == 'color') {
    $background = carbon_get_post_meta($homePageId, 'orm_block_background_color');
}
if ($background_type == 'gradient') {
    $background = carbon_get_post_meta($homePageId, 'orm_block_background_gradient');
}
if ($show_title === 'yes') {
    $title_type = carbon_get_post_meta($homePageId, 'orm_block_title_type');
}
if ($show_title === 'yes') {
    $title_type = carbon_get_post_meta($homePageId, 'orm_block_title_type');
}

$btn_bg = carbon_get_post_meta(get_the_ID(), 'post_bg_color_color');
$btn_bg_hover = carbon_get_post_meta(get_the_ID(), 'post_bg_color_color_hover');
$btn_text = carbon_get_post_meta(get_the_ID(), 'post_bg_color_text');
$btn_text_hover = carbon_get_post_meta(get_the_ID(), 'post_bg_color_text_hover');
$btn_border_color = carbon_get_post_meta(get_the_ID(), 'post_bg_border_color');
$btn_border_color_hover = carbon_get_post_meta(get_the_ID(), 'post_bg_border_color_hover');
$btn_border_width = carbon_get_post_meta(get_the_ID(), 'post_bg_border_width');



$panel_background=carbon_get_theme_option('panel_background');
$button_background=carbon_get_theme_option('button_background');
$color_link=carbon_get_theme_option('color_link');
for ($i = 1; $i <= 20; $i++) {
    $header_menu_button_texts[] = carbon_get_theme_option('header_menu_button_text' . $i);
    $header_menu_button_links[] = carbon_get_theme_option('header_menu_button_link' . $i);
}






?>

<div id="flex_menu" class="tools-wrapper" style="position:static;padding-top:20px;padding-bottom:20px;<?php echo ($panel_background ? "background:".$panel_background:''); ?>">

    <div class="tools-category">
        <div class="tools_category_class">
            <?php if ($header_menu_button_texts) :?>
                <?php foreach ( $header_menu_button_texts as $key=>$header_menu_button_text): ?>

            <?php if ($header_menu_button_text) :?>

            <a class=" tools_link button" style="color:<?php echo ($color_link ? $color_link:''); ?>" href="<?=$header_menu_button_links[$key]?>"><?=$header_menu_button_text?></a>

                    <?php
                    endif; ?>

                <?php endforeach; ?>
            <?php

            //var_dump($header_menu_button_texts);

            endif; ?>
        </div>

    </div>
</div>

<footer class="<?= $bordered_class ?>" id="siteFooter">
    <div class="footer_desktop">
        <div class="footer_wrapper">

            <div class="footer_tags">
                <?php if ($footer_tags) : ?>
                    <?php foreach ($footer_tags as $tag): ?>
                        <div class="footer_tag">
                            <a href="<?= $tag['tag_link']; ?>" class="footer_tag-link">
                                <p class="footer_tag-title"><?= $tag['tag_title']; ?></p>
                            </a>
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>

        <!--    <div class="footer_row">
                <?php //if (!empty($footer_contacts)): ?>
                    <?php //foreach ($footer_contacts as $footer_contact): ?>
                        <div class="footer_items">
                            <div class="footer_item-title-city"><?//= $footer_contact['city']; ?></div>
                            <div class="footer_item-text">
                                <?//= $footer_contact['address']; ?><br>

                                <?// if ( !empty($footer_contact['email']) ) { ?>
                                    <a class="footer_item-mail" href="mailto:<?//= $footer_contact['email']; ?>"><?//= $footer_contact['email']; ?></a><br>
                                <? // } ?>
                                <? // if ( !empty($footer_contact['phone']) ) { ?>
                                    <a class="footer_item-mail" href="tel:<?//= $footer_contact['phone']; ?>"><?//= $footer_contact['phone']; ?></a>
                                <? //} ?>
                            </div>
                        </div>
                    <?php //endforeach; ?>
                <?php // endif; ?>
            </div>-->
        </div>
        <div class="footer_bottom">
            <span>© <span id="year"></span> <?= carbon_get_theme_option('footer_copyright') ?></span>

            <?php if (!empty($footer_documents)): ?>
                <div class="footer_documents">
                    <?php foreach ($footer_documents as $footer_document): ?>
                        <a target="_blank" rel="noopener noreferrer" href="<?= $footer_document['document_link'] ?>">
                            <p><?= $footer_document['document_title'] ?></p>
                        </a>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>

            <?php if (!empty($footer_social_menu)): ?>
                <div class="footer_socials">
                    <?php foreach ($footer_social_menu as $menu_item): ?>
                        <a target="_blank" rel="noopener noreferrer" href="<?= $menu_item['item_link'] ?>">
                            <img src="<?= $menu_item['item_image'] ?>" alt="#">
                        </a>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
        </div>
    </div>
    <div class="footer_mob">
        <div class="footer_wrapper">
            <div class="footer_inner">
          <!--      <div class="footer_column footer_columns_hide">
                    <div class="footer_items">
                        <?php //if ($footer_products_menu) : ?>
                            <?php //foreach ($footer_products_menu as $product_item): ?>
                                <a href="<?//= $product_item['item_link']; ?>" target="_blank" class="footer_item">
                                    <p class="footer_item-title"><?//= $product_item['item_text']; ?></p>
                                    <p class="footer_item-text"><?//= $product_item['item_desc']; ?></p>
                                </a>
                            <?php // endforeach; ?>
                        <?php //endif; ?>
                    </div>
                </div>-->
             <!--   <div class="footer_items footer_items-contact <?//= $footer_items_no_products ?>">
                    <?php // if (!empty($footer_contacts)): ?>
                        <?php // foreach ($footer_contacts as $footer_contact): ?>
                            <div class="footer_item">
                                <div class="footer_item-title-city"><?//= $footer_contact['city']; ?></div>
                                <div class="footer_item-text">
                                    <? //= $footer_contact['address']; ?><br>
                                    <? // if ( !empty($footer_contact['email']) ) { ?>
                                        <a class="footer_item-mail" href="mailto:<? //= $footer_contact['email']; ?>"><? //= $footer_contact['email']; ?></a><br>
                                    <? // } ?>
                                    <? // if ( !empty($footer_contact['phone']) ) { ?>
                                        <a class="footer_item-mail"
                                       href="tel:<?//= $footer_contact['phone']; ?>"><?//= $footer_contact['phone']; ?></a>
                                    <? //} ?>
                                </div>
                            </div>
                        <?php // endforeach; ?>
                    <?php //endif; ?>
                </div>-->
                <?php if (!empty($footer_social_menu)): ?>
                    <div class="footer_socials">
                        <?php foreach ($footer_social_menu as $menu_item): ?>
                            <a target="_blank" rel="noopener noreferrer" href="<?= $menu_item['item_link'] ?>">
                                <img src="<?= $menu_item['item_image'] ?>" alt="#">
                            </a>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>
                            <?php if (!empty($footer_documents)): ?>
                <div class="footer_documents">
                    <?php foreach ($footer_documents as $footer_document): ?>
                        <a target="_blank" rel="noopener noreferrer" href="<?= $footer_document['document_link'] ?>">
                            <p><?= $footer_document['document_title'] ?></p>
                        </a>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
        <div class="footer_bottom">
            <span><?= carbon_get_theme_option('footer_copyright') ?></span>

        </div>

    </div>
</footer>

<div style="display:none;" id="request-modal" class="modal">
    <div class="block modal-form-block">
        <form data-succsess-text="" data-error-text="" data-wait-text="" class="modal-form-block__form">
            <div class="modal-form-block__title">Leave your contact details and we will get in touch with you shortly
            </div>
            <input type="text" name="first-name" placeholder="First Name" pattern="[^0-9]+" required autocomplete="off">
            <input type="text" name="last-name" placeholder="Last Name" pattern="[^0-9]+" required autocomplete="off">
            <input type="email" name="email" placeholder="Email Address" required autocomplete="off">
            <input type="tel" name="phone" class="phone" required autocomplete="off">
            <select name="type" required>
                <option disabled selected>Are you brand or retailer?</option>
                <option value="brand">Brand</option>
                <option value="retailer">Retailer</option>
            </select>
            <input type="text" name="company-domain-name" placeholder="Company Domain Name" required autocomplete="off">
            <input type="text" name="company-name" placeholder="Company Name" required autocomplete="off">
            <input type="text" name="job-title" placeholder="Job Title" required autocomplete="off">
            <input type="hidden" name="section" value="contact-form">
            <input type="hidden" name="site" value="24orm">
            <input type="hidden" name="lead-name" value="24orm | 24ttl">
            <input type="hidden" name="utm_capmaign" value="<?= $_GET['utm_capmaign'] ?>">
            <input type="hidden" name="utm_medium" value="<?= $_GET['utm_medium'] ?>">
            <input type="hidden" name="utm_source" value="<?= $_GET['utm_source'] ?>">
            <input type="hidden" name="utm_content" value="<?= $_GET['utm_content'] ?>">
            <input type="hidden" name="utm_term" value="<?= $_GET['utm_term'] ?>">
            <input type="hidden" name="type-request" value="Заявка">
            <input type="hidden" name="action" value="contact_form">

            <div class="contact-form-block_policy contact-form-block_policy_modal" id="form2_checkbox"><input class="contact-form-block_policy_checkbox contact-form-block_policy_checkbox_modal" type="checkbox" checked="checked" name="form_checkbox" aria-labelledby="form2_checkbox"> By clicking button, you agree to our Terms. Learn how we collect, use and share your data in our <a href="/ru/Privacy Policy for 24TTL.pdf" target="_blank" rel="noopener noreferrer">Privacy Policy</a></div>
            <button class="site-btn modal-form-block__form-btn" type="submit">Request Demo</button>
            <div class="modal-form-block__form-status"></div>
        </form>
        <?php if (!empty($info_img3 or $info_text3)): ?>
            <div class="modal-form-block__form-info">
                <?php if (!empty($info_img3)): ?>
                    <img alt="img" class="modal-form-block__form-info-img" src="<?= $info_img3 ?>" >
                <?php endif; ?>
                <?php if (!empty($info_text3)): ?>
                    <div class="modal-form-block__form-info-content"><?= $info_text3 ?></div>
                <?php endif; ?>
            </div>
        <?php endif; ?>
    </div>
</div>



<?php if (!isset($_SERVER['HTTP_USER_AGENT']) || stripos($_SERVER['HTTP_USER_AGENT'], 'Lighthouse') === false): ?>

<?php endif; ?>
<?php if (empty($_COOKIE['messages_cookies']) and !empty($cookies_text)): ?>
    <div class="messages_cookies">
        <div class="messages_cookies-wrp">
            <p><?= $cookies_text ?></p>
            <button type="button" class="cookie__btn tabs__btn">OK</button>
        </div>
    </div>
<?php endif; ?>

<?php

//global $wp_filter;


//print '<pre>';
//print_r( $wp_filter['wp_footer'] );
//print '</pre>';
?>



<?php //wp_footer(); ?>
<style>
    .<?=$GLOBALS['btn_post_class_random']?>{
        <?=($btn_text) ? 'color:'.$btn_text.' !important;' : '' ?>
        <?=($btn_bg) ? 'background:'.$btn_bg.' !important;' : '' ?>
        <?=($btn_border_color) ? 'border-color: '.$btn_border_color.' !important;' : '' ?>
        <?=($btn_border_width) ? 'border-width: '.$btn_border_width.' !important;' : '' ?>
    }
    .<?=$GLOBALS['btn_post_class_random']?>:hover{
        <?=($btn_text_hover) ? 'color:'.$btn_text_hover.' !important;' : '' ?>
        <?=($btn_bg_hover) ? 'background:'.$btn_bg_hover.' !important;' : '' ?>
        <?=($btn_border_color_hover) ? 'border-color: '.$btn_border_color_hover.' !important;' : '' ?>
        <?=($btn_border_width) ? 'border-width: '.$btn_border_width.' !important;' : '' ?>
    }
</style>
    <!-- Leadinfo tracking code
    <script>
        setTimeout(function (){
            (function(l,e,a,d,i,n,f,o){if(!l[i]){l.GlobalLeadinfoNamespace=l.GlobalLeadinfoNamespace||[]; l.GlobalLeadinfoNamespace.push(i);l[i]=function(){(l[i].q=l[i].q||[]).push(arguments)};l[i].t=l[i].t||n; l[i].q=l[i].q||[];o=e.createElement(a);f=e.getElementsByTagName(a)[0];o.async=1;o.src=d;f.parentNode.insertBefore(o,f);} }(window,document,"script","https://cdn.leadinfo.net/ping.js","leadinfo","LI-624D6C80E137C"));
        },2000)
    </script>
-->
<script>
    function moveDivAfter(divToMoveId, referenceDivId) {
        var divToMove = document.getElementById(divToMoveId);
        var referenceDiv = document.getElementById(referenceDivId);
        referenceDiv.parentNode.insertBefore(divToMove, referenceDiv.nextSibling);
    }
   // https://24ai.tech/en/tools/cut-object/
 //   moveDivAfter( 'flex_menu','hero-1');
    /*
   if (window.location.href=='https://24ai.tech/en/tools/cut-object/') {moveDivAfter( 'flex_menu','hero-1');}
   else
   {
       element = document.getElementById('flex_menu');element.style.display = 'none';
   }
*/
   /*
   * https://24ai.tech/en/ai-tools-for-designers-marketers/
https://24ai.tech/tr/ai-tools-for-designers-marketers/
https://24ai.tech/in/ai-tools-for-designers-marketers/

https://24ai.tech/ru/megamarket/

https://24ai.tech/en/tools/
https://24ai.tech/es/tools/
https://24ai.tech/ar/tools/
https://24ai.tech/de/tools/
https://24ai.tech/fr/tools/
https://24ai.tech/it/utensili/
https://24ai.tech/jp/tools/
https://24ai.tech/kr/tools/
https://24ai.tech/pl/narzedzia/
https://24ai.tech/pt/ferramentas/
https://24ai.tech/cn/tools/
https://24ai.tech/tr/aletler/
   *
   *
   * */



    const array = [
        'https://24ai.tech/en/ai-tools-for-designers-marketers/',
        'https://24ai.tech/tr/ai-tools-for-designers-marketers/',
        'https://24ai.tech/in/ai-tools-for-designers-marketers/',
        'https://24ai.tech/ru/megamarket/',
        'https://24ai.tech/en/tools/',
        'https://24ai.tech/es/tools/',
        'https://24ai.tech/ar/tools/',
        'https://24ai.tech/de/tools/',
        'https://24ai.tech/fr/tools/',
        'https://24ai.tech/it/utensili/',
        'https://24ai.tech/jp/tools/',
        'https://24ai.tech/kr/tools/',
        'https://24ai.tech/pl/narzedzia/',
        'https://24ai.tech/cn/tools/',
        'https://24ai.tech/tr/aletler/'
    ];


console.log(window.location.href);
    if (document.body.classList.contains('home')
    || array.includes(window.location.href)) {

        element = document.getElementById('flex_menu');
        element.style.display = 'none';
    } else {
        moveDivAfter( 'flex_menu','hero-1');
    }






</script>
</body>
</html>