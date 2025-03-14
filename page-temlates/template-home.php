<?php
/**
 * Template Name: Home
 */

get_header();
?>
<main class="main">
	<?= the_content();?>
	<div style="padding: 40px 0;"></div>
    <?php get_template_part("block-templates/all_media"); ?>
</main>
<?php
get_footer();