<?php
$thisLastPost = get_the_ID();

$lastposts = get_posts( [
    'posts_per_page' => 1,
    'orderby'     => 'date',
    'post_type' => 'post',
] );
//echo '<pre>';
//print_r($lastposts->ID);
//echo '</pre>';
//    var_dump(get_the_ID());
foreach( $lastposts as $post ){
    setup_postdata( $post = $lastposts[0]);
    if ($thisLastPost !== get_the_ID()){
    ?>
        <?php get_template_part("template-parts/sidebar_cards"); ?>
    <?php
    }
    else{
        $prelastposts = get_posts( [
            'posts_per_page' => 2,
            'orderby'     => 'date',
            'post_type' => 'post',
        ] );
        setup_postdata($post = $prelastposts[1]);
        get_template_part("template-parts/sidebar_cards");
    }
}
wp_reset_postdata();
?>
<?php
$posts=carbon_get_post_meta(1700, 'posts_sidebar1');
$posts_ids=wp_list_pluck($posts, 'id');
$posts_args = [
    'post_type' => 'post',
    'posts_per_page' => 1,
    'post__in' => $posts_ids,
    'orderby' => 'post__in',
];
$posts_query = new WP_Query( $posts_args);
?>
<?php if ($posts_query->have_posts()) : ?>
    <?php while ($posts_query->have_posts()):$posts_query->the_post();?>
        <?php get_template_part("template-parts/sidebar_cards");?>
    <?php endwhile; ?>
    <?php wp_reset_postdata(); ?>
<?php endif; ?>
<?php
$posts2=carbon_get_post_meta(1700, 'posts_sidebar2');
$posts2_ids=wp_list_pluck($posts2, 'id');
$posts2_args = [
    'post_type' => 'post',
    'posts_per_page' => 1,
    'post__in' => $posts2_ids,
    'orderby' => 'post__in',
];
$posts2_query = new WP_Query( $posts2_args);
?>
<?php if ($posts2_query->have_posts()) : ?>
    <?php while ($posts2_query->have_posts()):$posts2_query->the_post();?>
        <?php get_template_part("template-parts/sidebar_cards");?>
    <?php endwhile; ?>
    <?php wp_reset_postdata(); ?>
<?php endif; ?>