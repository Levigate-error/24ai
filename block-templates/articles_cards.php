<?php
$posts = new WP_Query([
    'posts_per_page' => 15,
    'post_type' => 'post',
    'category__not_in' => [21],
]);
?>
<section class="page__blog" itemscope itemtype="https://schema.org/Blog">
    <div class="container" >
        <div class="page__blog--inner posts__list">
            <?php if ($posts->have_posts()) : ?>
                <?php while ($posts->have_posts()):$posts->the_post(); ?>
                    <?php get_template_part("template-parts/article-card"); ?>
                <?php endwhile; ?>
                <?php wp_reset_postdata(); ?>
            <?php endif; ?>
        </div>
        <?php
        if ($posts->max_num_pages > 1 ) { ?>
            <script>
              let current_page = 1;
            </script>
            <button
                    type="button"
                    class="btn--load" id="filter__more--btn"
                    data-param-posts='<?= json_encode($posts->query_vars); ?>'
                    data-max-pages="<?= $posts->max_num_pages; ?>"
                    data-current-page="<?= $posts->query_vars["p"] + 1; ?>"
                    data-category=""
            >
                Загрузить ещё
            </button>
        <?php } ?>
        <script>
          let filterBtn = document.querySelectorAll('.filter_btn');
          let moreBtn = document.querySelector('#filter__more--btn');
          filterBtn.forEach((button) => {
            button.addEventListener("click", () => {
              moreBtn.setAttribute('data-category', button.dataset.category);
            });
          });
        </script>
    </div>
</section>