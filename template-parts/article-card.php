<?php
$cat = get_the_category(get_the_ID());
$type_card = carbon_get_post_meta(get_the_ID(), 'type_card');
$posts_source_link = carbon_get_post_meta(get_the_ID(), 'posts_source_link');
$brandImg = carbon_get_post_meta(get_the_ID(), 'posts_source');
$bgColor = carbon_get_post_meta(get_the_ID(), 'posts_bg_color');
$preview_blog_card = carbon_get_post_meta(get_the_ID(), 'preview_blog_card');
$borderTextColor = carbon_get_post_meta(get_the_ID(), 'posts_border_text_color');
$read_more_label = carbon_get_theme_option('read_more_label');
$author_id = get_post_field('post_author', get_the_ID());
$author_info = get_userdata($author_id);
// Get the full excerpt
$full_excerpt = get_the_excerpt();

// Strip HTML tags
$full_excerpt = strip_tags($full_excerpt);

// Trim the excerpt manually
$word_limit = 17;
$words = preg_split('/\s+/', $full_excerpt, -1, PREG_SPLIT_NO_EMPTY);

$trimmed_excerpt = count($words) > $word_limit
    ? implode(' ', array_slice($words, 0, $word_limit)) . '...'
    : $full_excerpt;

if ($type_card == 'card_blog') {
    $backgroundUrl = wp_get_attachment_image_url($preview_blog_card, 'full');;
} elseif ($type_card == 'card_news') {
    $backgroundUrl = get_the_post_thumbnail_url();
} elseif ($type_card == 'card_press' && $brandImg) {
    $backgroundUrl = wp_get_attachment_image_url($brandImg, 'full');
}
?>
<div itemscope itemprop="blogPost"
     itemtype="https://schema.org/BlogPosting"
     class="card <?= $cat[0]->name ?> page__blog--item page__blog--item__content blog__block min-h700"
    <?php if (!empty($backgroundUrl)) : ?>
        style="background: url('<?= $backgroundUrl ?>') center no-repeat; background-size: cover;"
    <?php endif; ?>
>
    <div class="page__blog--news__date card_blog--date">
        <div class="card__tag-while" rel="category tag"><?= the_category(); ?></div>
        <p class="32 page__blog--new__date" itemprop="datePublished"><?= get_the_date('F j, Y'); ?></p>
    </div>
    <a itemprop="url" href="<?= get_permalink() ?>" class="card_blog--link">
        <div><h2 itemprop="headline" class="page__blog--item__title"><?= the_title(); ?></h2></div>
        <div>
            <div class="page__blog--item__subtitle" itemprop="description"><?= $trimmed_excerpt; ?></div>
            <span itemprop="headline" class="page__blog--news__btn"><span
                        class="page__blog--news__btn-inf-url"><?= the_title(); ?></span><?= $read_more_label ?></span>
        </div>
    </a>
</div>