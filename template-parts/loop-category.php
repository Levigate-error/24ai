<?php
$cat = get_the_category(get_the_ID());
$type_card = carbon_get_post_meta(get_the_ID(), 'type_card');
$posts_source_link = carbon_get_post_meta(get_the_ID(), 'posts_source_link');
$brandImg = carbon_get_post_meta(get_the_ID(), 'posts_source');
?>
<?php
if ($type_card == 'card_blog') {
    $backgroundUrl = get_the_post_thumbnail_url();
} elseif ($type_card == 'card_news') {
    $backgroundUrl = get_the_post_thumbnail_url();
} elseif ($type_card == 'card_press' && $brandImg) {
    $backgroundUrl = wp_get_attachment_image_url($brandImg, 'full');
}
?>
<div
        class="card <?= $cat[0]->name ?> page__blog--item page__blog--item__content blog__block min-h700"
    <?php if (!empty($backgroundUrl)) : ?>
        style="background: url('<?= $backgroundUrl; ?>') center no-repeat; background-size: cover;"
    <?php endif; ?>
>
    <div>
        <div class="page__blog--news__date">
            <div class="card__tag-while"><?= the_category(); ?></div>
            <p class="page__blog--new__date"><?= get_the_date('F j, Y'); ?></p>
        </div>
        <h2 class="page__blog--item__title"><?= the_title(); ?></h2>
    </div>
    <div>
        <div class="page__blog--item__subtitle"><?= the_excerpt(); ?></div>
        <a href="<?= get_permalink() ?>" class="page__blog--news__btn"><span
                    class="page__blog--news__btn-inf-url"><?= the_title(); ?></span>Read more</a>
    </div>
</div>