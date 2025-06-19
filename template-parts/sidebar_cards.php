<?php
$cat = get_the_category(get_the_ID());
$type_card = carbon_get_post_meta(get_the_ID(), 'type_card');
$posts_source_link = carbon_get_post_meta(get_the_ID(), 'posts_source_link');
$preview_blog_card = carbon_get_post_meta(get_the_ID(), 'preview_blog_card');
$brandImg = carbon_get_post_meta(get_the_ID(), 'posts_source');
$bgColor = carbon_get_post_meta(get_the_ID(), 'posts_bg_color');
$borderTextColor = carbon_get_post_meta(get_the_ID(), 'posts_border_text_color');
$read_more_label = carbon_get_theme_option('read_more_label');
$sidebar_all_posts_label = carbon_get_theme_option('sidebar_all_posts_label');
?>

<?php
if ($type_card == 'card_blog') {
    $backgroundUrl = wp_get_attachment_image_url($preview_blog_card, 'full');
} elseif ($type_card == 'card_news') {
    $backgroundUrl = get_the_post_thumbnail_url();
} elseif ($type_card == 'card_press' && $brandImg) {
    $backgroundUrl = wp_get_attachment_image_url($brandImg, 'full');
}
?>
<div class="sid__block sidebar__item">
    <div class="sticky__block">
        <div class="page__blog--item blog__block ">
            <div
                    class="page__blog--item__content post__block"
                <?php if (!empty($backgroundUrl)) : ?>
                    style="background: url('<?= $backgroundUrl; ?>') center no-repeat; background-size: cover;min-height: 520px"
                <?php endif; ?>
            >
                <div>
                    <div class="page__blog--news__date mb18">
                        <div class="post__cat"><?= the_category(); ?></div>
                        <p class="page__blog--new__date"><?= get_the_date('F j, Y'); ?></p>
                    </div>
                    <h2 class="page__blog--item__title"><?= the_title(); ?></h2>
                </div>
                <div>
                    <div class="page__blog--item__subtitle"><?= get_short_desk(60); ?></div>
                    <a href="<?= get_permalink(); ?>" class="page__blog--news__btn"><span
                                class="page__blog--news__btn-inf-url"><?= the_title(); ?></span><?= $read_more_label ?>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>