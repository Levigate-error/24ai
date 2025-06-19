<?php
/**
 * Template Name: Media
 */

get_header();
$hide_cat_nav = carbon_get_theme_option( 'hide_cat_nav' );
$postsResolution = carbon_get_post_meta(get_the_ID(), 'posts_resolution');
if($hide_cat_nav == 'yes'){
  $add_class = 'category_margin';  
}
else{
    $add_class = '';  
}

switch ($postsResolution) {
    case "700px":
        $mainClassResolution = "height-700";
        break;
    case "1000px":
        $mainClassResolution = "height-1000";
        break;
    case "1200px":
        $mainClassResolution = "height-1200";
        break;
    default:
        $mainClassResolution = "";
}
?>

<main class="mt70 <?= $add_class ?> <?= $mainClassResolution ?>">
    <?php get_template_part("block-templates/category_btns"); ?>
    <?php get_template_part("block-templates/news_slider"); ?>
    <?php get_template_part("block-templates/articles_cards"); ?>
    <?php //get_template_part("block-templates/all_media"); ?>
</main>
<?php
get_footer();