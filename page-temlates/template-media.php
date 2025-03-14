<?php
/**
 * Template Name: Media
 */

get_header();
$hide_cat_nav = carbon_get_theme_option( 'hide_cat_nav' );
if($hide_cat_nav == 'yes'){
  $add_class = 'category_margin';  
}
else{
    $add_class = '';  
}
?>

<main class="mt70 <?= $add_class ?>">
    <?php get_template_part("block-templates/category_btns"); ?>
    <?php get_template_part("block-templates/news_slider"); ?>
    <?php get_template_part("block-templates/articles_cards"); ?>
    <?php //get_template_part("block-templates/all_media"); ?>
</main>
<?php
get_footer();