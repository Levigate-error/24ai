<?php
$page_id=get_the_ID();

get_header();

?>
    <main class="mt70 category_margin">
        <div class="container">
            <div class="page__blog--inner wrap">
	            <?php $posts = new WP_Query([
		            'posts_per_page' => 4,
		            'category_name' => 'blog',
		            'post_type' => 'post',

                ]);
	            $cat = get_the_category(get_the_ID());
	            ?>

	            <?php if ($posts->have_posts()) : ?>
		            <?php while ($posts->have_posts()) : $posts->the_post(); ?>
			            <?php get_template_part("template-parts/article-card"); ?>

		            <?php endwhile; ?>
	            <?php endif; ?>
	            <?php wp_reset_postdata(); ?>
            </div>
	        <?php // AJAX загрузка постов
	        if ($posts->max_num_pages > 1) { ?>
                <script>
                    let current_page = 1;
                </script>

                <button
                        type="button"
                        class="btn--load"
                        data-param-posts='<?= json_encode($posts->query_vars); ?>'
                        data-max-pages="<?= $posts->max_num_pages; ?>"
                        data-category="Blog"
                >
                    Read more
                </button>
	        <?php } ?>
        </div>
    </main>
<?php
get_footer();