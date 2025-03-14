<?php
$terms = get_terms( array(
    'taxonomy' => 'category',
    'orderby' => 'name',
    'order' => 'ASC',
    'hide_empty' => 1,
) );
$postsTab = new WP_Query([
    'posts_per_page' => 12,
    'post_type' => 'post',
]);
?>
<?
$title = carbon_get_theme_option( 'blog_block_title' );
$all_posts_label = carbon_get_theme_option( 'blog_block_all_posts_label');
$read_more_label = carbon_get_theme_option( 'read_more_label');

$hide_cat_nav = carbon_get_theme_option( 'hide_cat_nav' );
if($hide_cat_nav == 'yes'){
  $css = 'padding-top: 0px';  
}
else{
    $css = '';  
}

?>
