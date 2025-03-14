<?php
$post_id = get_the_ID();
$top__slider=carbon_get_post_meta($post_id, 'banner_slider');
$top__slider_ids=wp_list_pluck($top__slider, 'id');
$top__slider_args = [
    'post_type' => 'post',
    'post__in' => $top__slider_ids,
    'orderby' => 'post__in',
];
$top__slider_query = new WP_Query( $top__slider_args);
?>
<?
$read_more_label = carbon_get_theme_option( 'read_more_label');
?>
<?php if($top__slider) : ?>
    <section class="page__blog banner__hero news__banner">
        <div class="page__blog--news">
            <div class="page__blog--slider__content news__slider--content">
                <div class="page__blog--slider news__slider">
                    <div class="swiper-wrapper">
                        <?php if ($top__slider_query->have_posts()) : ?>
                            <?php while ($top__slider_query->have_posts()):$top__slider_query->the_post();
                                $cat = get_the_category(get_the_ID());
                                $preview_deks = carbon_get_post_meta(get_the_ID(), 'preview_slider_full');
                                $preview_mob = carbon_get_post_meta(get_the_ID(), 'preview_slider_mob');
		                        $type_card = carbon_get_post_meta(get_the_ID(), 'type_card');
		                        $preview_blog_card = carbon_get_post_meta(get_the_ID(), 'preview_blog_card');

		                        ?>
                                <div class="card <?=$cat[0]->name ?> swiper-slide news__banner--item" data-category="<?=$cat[0]->name ?>">
                                    <div class="page__blog--news__item banner__item">
                                        <?php
                                        if ($type_card == 'card_blog') : ?>
                                            <picture>
                                                <source srcset="<?= wp_get_attachment_image_url($preview_deks, 'full'); ?>" media="(min-width: 480px)">
                                                <source srcset="<?= wp_get_attachment_image_url($preview_blog_card, 'full'); ?>" media="(min-width: 200px)">
                                                <img src="<?= wp_get_attachment_image_url($preview_deks, 'full'); ?>" alt="<?=the_title(); ?> img" class="slider_banner_img">
                                            </picture>
                                        <?php else: ?>
                                            <picture>
                                                <source srcset="<?= wp_get_attachment_image_url($preview_deks, 'full'); ?>" media="(min-width: 480px)">
                                                <source srcset="<?= wp_get_attachment_image_url($preview_mob, 'full'); ?>" media="(min-width: 200px)">
                                                <img src="<?= wp_get_attachment_image_url($preview_deks, 'full'); ?>" alt="<?=the_title(); ?> img" class="slider_banner_img">
                                            </picture>
                                        <?php endif;?>
                                        <div class="page__blog--news__date">
                                            <div class="article__cat"><?=the_category(); ?></div>
                                            <p class="page__blog--new__date"><?=get_the_date('F j, Y'); ?></p>
                                        </div>
                                        <h1 class="page__blog--news__title"><?=the_title() ?></h1>
                                        <div class="page__blog--news__subtitle"><?=get_short_desk(80); ?></div>
                                        <a href="<?= get_permalink() ?>"  class="page__blog--news__btn"><span class="page__blog--news__btn-inf-url"><?=the_title(); ?></span><?= $read_more_label ?></a>
                                    </div>
                                </div>
                            <?php endwhile; ?>
                            <?php wp_reset_postdata(); ?>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="news-swiper-pagination media__blog--swiper-pagination"></div>
            </div>
        </div>
    </section>
<?php endif; ?>