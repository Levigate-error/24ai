<?php
$terms = get_terms( array(
	'taxonomy' => 'category',
	'orderby' => 'name',
	'order' => 'ASC',
	'hide_empty' => 1,
) )
?>
<?
$all_posts_label = carbon_get_theme_option( 'blog_block_all_posts_label');
$hide_cat_nav = carbon_get_theme_option( 'hide_cat_nav' );
?>
<? if($hide_cat_nav != 'yes'): ?>
<section class="page__blog ov-auto">
    <div class="container">
        <div class="page__blog--category news_category">
                <button type="button" class="page__blog--category__btn news_cat-btn filter_btn active" data-filter="all" data-category=""><?= $all_posts_label ?></button>
                <?php foreach ($terms as $term) :?>
                    <button type="button" class="page__blog--category__btn news_cat-btn filter_btn" data-category="<?= $term->slug; ?>">
                        <?= $term->name; ?>
                    </button>
                <?php endforeach; ?>
        </div>
    </div>
</section>
<? endif; ?>
