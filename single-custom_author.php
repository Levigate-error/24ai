<?php get_header(); ?>

<main class="author-page">
    <?php
    $author_id = get_the_ID();
    $author_name = get_the_title();
    $author_image = get_field('author_photo');
    $author_awards = get_field('author_awards');
    $author_socials = get_field('author_socials');
    $author_description = get_field('author_description');
    $author_choice = get_field('author_choice');
    $author_subtitle = get_field('author_subtitle');

    $args = [
        'post_type' => 'post',
        'meta_query' => [
            [
                'key' => 'custom_author',
                'value' => $author_id,
                'compare' => '='
            ]
        ],
        'posts_per_page' => -1
    ];
    $query = new WP_Query($args);
    wp_reset_postdata();

    $total_views = 0;
    $posts_count = 0;
    $comments_count = 0;

    if ($query->have_posts()) :
        while ($query->have_posts()) :
            $query->the_post();
            $views = (int)get_post_meta(get_the_ID(), 'views', true);
            $comments = get_comments([
                'post_id' => get_the_ID(),
            ]);
            $total_views += $views;
            $posts_count += 1;
            $comments_count += count($comments);
            ?>

        <?php
        endwhile;
        wp_reset_postdata();
    endif;

    ?>
    <section class="author-page_about">
        <div class="author-page_about-main">
            <div class="author-page_about-main-content">
                <h1>
                    <?= $author_name ?> – наш эксперт и ваш помощник в мире AI
                </h1>
                <div class="author-page_about-main-content-avatar" itemscope itemtype="https://schema.org/Person">
                    <img src="<?= $author_image ?>" alt="<?= $author_name ?>" itemprop="image"/>
                    <div class="author-page_about-main-content-avatar__title">
                        <h3 itemprop="name"><?= $author_name ?></h3>
                        <p itemprop="jobTitle"><?= $author_subtitle ?></p>
                        <meta itemprop="description" content="<?= strip_tags($author_description) ?>">
                        <meta itemprop="url" content="<?= get_permalink($author_id) ?>">
                    </div>
                </div>
            </div>
            <div class="author-page_about-main-socials">
                <div class="post__social">
                    <button
                            type="button" class="post__social--item"
                            onClick='window.open("https://www.facebook.com/sharer.php?u=<?= get_permalink();?>","sharer","status=0,toolbar=0,width=650,height=500");'
                            title="Shape in Facebook">
                        <svg width="17" height="17" viewBox="0 0 17 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M3.1041 0C1.38456 0 0 1.38456 0 3.10409V13.8959C0 15.6154 1.38456 17 3.1041 17H8.95317V10.354H7.19579V7.9613H8.95317V5.91706C8.95317 4.31099 9.99151 2.83634 12.3834 2.83634C13.3519 2.83634 14.068 2.92932 14.068 2.92932L14.0117 5.16376C14.0117 5.16376 13.2814 5.15685 12.4844 5.15685C11.6218 5.15685 11.4835 5.55428 11.4835 6.21405V7.96132H14.0803L13.9671 10.3541H11.4835V17H13.8959C15.6154 17 17 15.6154 17 13.8959V3.10411C17 1.38458 15.6154 1.7e-05 13.8959 1.7e-05H3.10408L3.1041 0Z" fill="white"/>
                        </svg>
                    </button>
                    <button
                            type="button" class="post__social--item"
                            onClick='window.open("https://twitter.com/intent/tweet?text=<?=the_title();?>. <?=bloginfo('description');?>.<?= get_permalink();?>","sharer","status=0,toolbar=0,width=650,height=500");'
                            title="Shape in Twitter">
                        <svg width="15" height="13" viewBox="0 0 15 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M15 1.53879C14.4479 1.80027 13.8549 1.97624 13.2324 2.05561C13.8681 1.64953 14.3556 1.00658 14.5852 0.239955C13.991 0.615884 13.3322 0.889062 12.6307 1.03673C12.0693 0.398694 11.2698 0 10.3848 0C8.68524 0 7.3076 1.46988 7.3076 3.28184C7.3076 3.53902 7.3353 3.79005 7.38722 4.02939C4.82981 3.8928 2.56259 2.58597 1.04419 0.599886C0.77997 1.08472 0.628245 1.6483 0.628245 2.25065C0.628245 3.3889 1.17111 4.39363 1.99665 4.98183C1.49244 4.9646 1.01765 4.81693 0.602861 4.57144C0.602861 4.58559 0.602861 4.59851 0.602861 4.61266C0.602861 6.20313 1.66321 7.52965 3.07142 7.83052C2.81355 7.90558 2.54125 7.94557 2.2603 7.94557C2.06242 7.94557 1.86916 7.92465 1.68167 7.88712C2.07338 9.19087 3.20988 10.1402 4.55636 10.1667C3.50352 11.0471 2.17665 11.572 0.734395 11.572C0.486328 11.572 0.241145 11.5566 0 11.5258C1.36206 12.4567 2.97912 13 4.71732 13C10.3779 13 13.4724 7.9991 13.4724 3.66208C13.4724 3.51995 13.4695 3.37844 13.4637 3.23754C14.0654 2.77424 14.5875 2.19651 15 1.53879Z" fill="white"/>
                        </svg>
                    </button>
                    <button type="button" class="post__social--item"
                            onClick='window.open("https://www.linkedin.com/sharing/share-offsite/?url=<?= get_permalink();?>","sharer","toolbar=0,status=0,width=620,height=390");'
                            title="Shape in Linkedin"
                    >
                        <svg width="17" height="17" viewBox="0 0 17 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M2.10228e-07 1.42027C2.10228e-07 1.04359 0.149636 0.682343 0.415988 0.41599C0.682341 0.149637 1.04359 1.89342e-06 1.42027 1.89342e-06H15.5782C15.7649 -0.000302987 15.9497 0.0362141 16.1223 0.107463C16.2948 0.178711 16.4516 0.283291 16.5837 0.415216C16.7158 0.547141 16.8205 0.70382 16.8919 0.876282C16.9634 1.04874 17.0001 1.2336 17 1.42027V15.5782C17.0002 15.7649 16.9636 15.9498 16.8923 16.1224C16.8209 16.2949 16.7163 16.4517 16.5843 16.5837C16.4523 16.7158 16.2956 16.8205 16.1231 16.892C15.9506 16.9634 15.7657 17.0001 15.579 17H1.42027C1.23369 17 1.04895 16.9632 0.876579 16.8918C0.704214 16.8204 0.54761 16.7157 0.415715 16.5837C0.283821 16.4518 0.17922 16.2951 0.10789 16.1227C0.0365602 15.9503 -0.000101301 15.7655 2.10228e-07 15.579V1.42027ZM6.72891 6.48164H9.03086V7.63764C9.36314 6.97309 10.2131 6.375 11.4905 6.375C13.9392 6.375 14.5195 7.69868 14.5195 10.1274V14.6262H12.0414V10.6806C12.0414 9.29746 11.7091 8.517 10.8653 8.517C9.69464 8.517 9.20782 9.3585 9.20782 10.6806V14.6262H6.72891V6.48164ZM2.47891 14.5203H4.95782V6.375H2.47891V14.5195V14.5203ZM5.3125 3.71836C5.31717 3.93061 5.27941 4.14165 5.20141 4.33911C5.12342 4.53656 5.00677 4.71645 4.85831 4.86821C4.70986 5.01997 4.53259 5.14055 4.3369 5.22287C4.14121 5.30519 3.93105 5.3476 3.71875 5.3476C3.50645 5.3476 3.29629 5.30519 3.1006 5.22287C2.90491 5.14055 2.72764 5.01997 2.57918 4.86821C2.43073 4.71645 2.31408 4.53656 2.23609 4.33911C2.15809 4.14165 2.12033 3.93061 2.125 3.71836C2.13417 3.30175 2.30612 2.90529 2.604 2.6139C2.90189 2.3225 3.30204 2.15932 3.71875 2.15932C4.13546 2.15932 4.53561 2.3225 4.8335 2.6139C5.13138 2.90529 5.30333 3.30175 5.3125 3.71836Z" fill="white"/>
                        </svg>
                    </button>
                    <button type="button" onClick='window.open("mailto:?subject=Article: <?= the_title();?>&amp;body=Read more: <?= get_permalink();?>","sharer","toolbar=0,status=0,width=620,height=390");' class="post__social--item"  title="Shape in Email">
                        <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M8.43008 8.58641C8.30204 8.68028 8.15101 8.72716 8.00002 8.72716C7.84895 8.72716 7.69796 8.68028 7.56992 8.58641L1.45454 4.10182L4.84847e-05 3.0352L0 13.3333C4.84847e-05 13.7349 0.325623 14.0605 0.727271 14.0605L15.2727 14.0605C15.6744 14.0605 16 13.7349 16 13.3333V3.03516L14.5454 4.10182L8.43008 8.58641Z" fill="white"/>
                            <path d="M8.00047 7.09822L15.0349 1.9395L0.96582 1.93945L8.00047 7.09822Z" fill="white"/>
                        </svg>
                    </button>
                    <button type="button" class="post__social--item copy_link">
                        <span class="page__blog--item__subtitle copy_link-text">Link copied!</span>
                        <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <circle cx="9" cy="9" r="9" fill="white"/>
                            <path d="M3.3276 4.95099L4.94908 3.33018C5.17687 3.0731 5.90677 2.73768 6.53136 3.33018L9.35057 6.15068C9.78655 6.58649 9.78655 7.29651 9.35057 7.73231L8.88029 8.2024L9.7988 9.12298L10.2691 8.65289C10.4797 8.44234 11.1435 8.03836 11.8514 8.65289L14.673 11.4709C15.109 11.9068 15.109 12.6168 14.673 13.0526L13.0515 14.6734C12.4955 15.2292 11.7681 14.9696 11.4693 14.6734L8.6476 11.8529C8.21162 11.4171 8.21162 10.7071 8.6476 10.2713L9.11788 9.80117L8.19692 8.88059L7.72664 9.35067C7.04817 9.93338 6.41624 9.61999 6.14436 9.35067L3.32271 6.53017C2.89162 6.09682 2.89162 5.38679 3.3276 4.95099ZM9.32852 10.9494C9.26729 11.0107 9.26729 11.111 9.32852 11.1722L12.1502 13.9927C12.2114 14.054 12.3045 14.0638 12.3731 13.9927L13.9945 12.3719C14.0558 12.3107 14.0558 12.2104 13.9945 12.1491L11.1729 9.32864C11.097 9.25274 10.999 9.27967 10.95 9.32864L10.4797 9.79872L11.2758 10.5944C11.4644 10.783 11.4644 11.0866 11.2758 11.2726C11.1827 11.3657 10.852 11.5273 10.5973 11.2726L9.80125 10.4769L9.32852 10.9494ZM4.00607 5.85443L6.82773 8.67248C6.88896 8.73369 6.98204 8.74348 7.05062 8.67248L7.5209 8.2024L6.72486 7.40668C6.53626 7.21816 6.53626 6.91456 6.72486 6.72849C6.91346 6.53997 7.21718 6.53997 7.40333 6.72849L8.19937 7.5242L8.66964 7.05412C8.73088 6.99291 8.73088 6.89253 8.66964 6.83132L5.85044 4.01082C5.77451 3.93492 5.67653 3.9594 5.62755 4.01082L4.00607 5.63163C3.94484 5.69284 3.94484 5.79322 4.00607 5.85443Z" fill="black"/>
                        </svg>
                    </button>
                </div>
            </div>
        </div>
        <div class="author-page_about-stats">
            <div class="author-page_about-stats__item">
                <h1><?= $posts_count ?></h1>
                <p>статей</p>
            </div>
            <div class="author-page_about-stats__item">
                <h1><?= $comments_count ?></h1>
                <p>комментариев</p>
            </div>
            <div class="author-page_about-stats__item">
                <h1><?= $total_views ?></h1>
                <p>просмотров</p>
            </div>
        </div>
        <div class="author-page_about-content">
            <h4>Об авторе:</h4>
            <p><?= $author_description ?></p>
        </div>
    </section>
    <section class="author-page_awards">
        <h4>Награды автора</h4>
        <div class="author-page_awards-items">
            <?php foreach ($author_awards as $award): ?>
                <img src="<?= $award ?>" alt="award"/>
            <?php endforeach; ?>
        </div>
    </section>
    <?php
    $author_posts_query = new WP_Query([
        'post_type' => 'post',
        'posts_per_page' => 6,
        'meta_query' => [
            [
                'key' => 'custom_author', // замени на ключ ACF поля
                'value' => $author_id,
                'compare' => '=',
            ]
        ]
    ]);

    if ($author_posts_query->have_posts()) : ?>
        <section class="author-page_posts">
            <h4>Публикации автора</h4>
            <div class="author-page_posts-content">
                <?php while ($author_posts_query->have_posts()) : $author_posts_query->the_post(); ?>
                    <?php
                    $cat = get_the_category(get_the_ID());
                    $type_card = carbon_get_post_meta(get_the_ID(), 'type_card');
                    $blog_img_id = carbon_get_post_meta(get_the_ID(), 'preview_blog_card');
                    $posts_source_link = carbon_get_post_meta(get_the_ID(), 'posts_source_link');
                    $brandImg = carbon_get_post_meta(get_the_ID(), 'posts_source');
                    $bgColor = carbon_get_post_meta(get_the_ID(), 'posts_bg_color');
                    $preview_blog_card = carbon_get_post_meta(get_the_ID(), 'preview_blog_card');
                    $borderTextColor = carbon_get_post_meta(get_the_ID(), 'posts_border_text_color');
                    $borderTextColor = carbon_get_post_meta(get_the_ID(), 'posts_border_text_color');
                    $postViews = get_post_meta(get_the_ID(), 'views', true);


                    if (!empty($blog_img_id)) {
                        $backgroundUrl = wp_get_attachment_image_url($blog_img_id, 'full');;
                    } else {
                        $backgroundUrl = get_the_post_thumbnail_url();
                    }
                    ?>
                    <div itemscope itemprop="blogPost"
                         itemtype="https://schema.org/BlogPosting"
                         class="author-page_posts-content-card <?= $cat[0]->name ?>"
                    >
                        <?php if (!empty($backgroundUrl)) : ?>
                            <img src="<?= $backgroundUrl ?>" alt="img">
                        <?php endif; ?>
                        <div class="author-page_posts-content-card-content">
                            <h2 itemprop="headline"
                                class="author-page_posts-content-card-content__title"><?= the_title(); ?></h2>
                            <p class="32 page__blog--new__date"
                               itemprop="datePublished"><?= get_the_date('F j, Y'); ?></p>
                            <a itemprop="url" href="<?= get_permalink() ?>"
                               class="author-page_posts-content-card-content--link">
                                Читать статью
                            </a>
                            <div class="author-page_posts-content-card-content__bottom">
                                <div class="card__tag-black" rel="category tag"><?= the_category(); ?></div>
                                <div class="post-views">
                                    <svg width="16" height="17" viewBox="0 0 16 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M7.99992 3.1665C10.3918 3.1665 12.5035 4.78811 14.3408 7.92885L14.478 8.16725L14.6666 8.49984L14.3408 9.07083C12.5035 12.2116 10.3918 13.8332 7.99992 13.8332C5.60802 13.8332 3.49634 12.2116 1.65908 9.07083L1.5218 8.83243L1.33325 8.49984L1.5218 8.16725C3.39093 4.87021 5.54822 3.1665 7.99992 3.1665ZM8.00015 4.5C6.19809 4.5 4.48567 5.77702 2.87036 8.5C4.48567 11.223 6.19809 12.5 8.00015 12.5C9.75327 12.5 11.4194 11.2934 12.9915 8.72981L13.13 8.50009L12.9913 8.27022C11.4167 5.70512 9.75073 4.5 8.00015 4.5ZM8 6.5C9.10457 6.5 10 7.39543 10 8.5C10 9.60457 9.10457 10.5 8 10.5C6.89543 10.5 6 9.60457 6 8.5C6 7.39543 6.89543 6.5 8 6.5Z" fill="black"/>
                                    </svg>
                                    <?= !empty($postViews) ? $postViews : 0 ?>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endwhile; ?>
            </div>
        </section>
    <?php endif;
    wp_reset_postdata(); ?>
    <?php
    $other_authors_query = new WP_Query([
        'post_type' => 'custom_author',
        'posts_per_page' => 6,
        'post__not_in' => [intval($author_id)],
        'orderby' => 'rand'
    ]);

    if ($other_authors_query->have_posts()) : ?>
        <section class="author-page_other-authors">
            <h4>Другие авторы</h4>
            <div class="author-page_other-authors__content">
                <?php while ($other_authors_query->have_posts()) : $other_authors_query->the_post(); ?>
                    <div class="author-page_other-authors__items-item">
                        <img src="<?= get_field('author_photo') ?>" alt="<?= the_title() ?>">
                        <div class="author-page_other-authors__items-item__content">
                            <h4><?= the_title(); ?></h4>
                            <p><?= get_field('author_subtitle') ?></p>

                            <a href="<?= the_permalink(); ?>">перейти на страницу автора</a>
                        </div>
                    </div>
                <?php endwhile; ?>
            </div>
        </section>
    <?php endif;
    wp_reset_postdata(); ?>
    <section class="author-page_choice">
        <h4>Выбор автора</h4>
        <p><?= $author_choice['author_choice_description'] ?></p>
        <div class="author-page_choice-tools">
            <?php foreach ($author_choice['author_choice_tools'] as $tool): ?>
                <a class="author-page_choice-tools__item" href="<?= $tool['author_choice_tools_link'] ?>">
                    <img src="<?= is_array($tool['author_choice_tools_image'])
                        ? $tool['author_choice_tools_image']['url']
                        : $tool['author_choice_tools_image'] ?>" alt="tool"/>
                    <p><?= $tool['author_choice_tools_name'] ?></p>
                </a>
            <?php endforeach; ?>
        </div>
    </section>
</main>

<?php get_footer(); ?>
