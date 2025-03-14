<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package orm
 */

get_header();
?>

    <section class="site-hero" style="margin-top: 110px; border-radius: 0">
        <div class="container">
            <h1 class="site-hero__title" style="color: #fff">
                Oops! That page can’t be found.
            </h1> <br>
            <a href="<?=home_url()?>" class="site-hero__desc" style="text-decoration: underline">Home</a>

    </section>

<?php
get_footer();
