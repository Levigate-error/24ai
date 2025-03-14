<?php
$thisCat = get_the_category(get_the_ID());
$thisCatName = $thisCat[0]->name;
$posts4 = new WP_Query([
    'posts_per_page' => 4,
    'category_name' => $thisCatName,
    'post_type' => 'post'
]);
?>
<?
$more_posts_label = carbon_get_theme_option( 'more_posts_label');
?>
<div class="page__blog posts__more">
    <div class="container">
        <h1 class="page__blog--news__title"><?= $more_posts_label ?> <?php if ($thisCatName){echo $thisCatName;} else{echo 'Articles';} ?></h1>
        <div class="page__blog--inner posts__list">
            <?php if ($posts4->have_posts()) : ?>
                <?php while ($posts4->have_posts()):$posts4->the_post(); ?>
                    <?php get_template_part("template-parts/article-card"); ?>
                <?php endwhile; ?>
                <?php wp_reset_postdata(); ?>
            <?php endif; ?>
        </div>
    </div>
</div>