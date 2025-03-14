
<div class="page__blog--item blog__block" style="background: url('<?= $posts_args['post__in'][0][get_the_post_thumbnail_url()]; ?>') center no-repeat; background-size: cover;">
	<div class="page__blog--item__content">
		<div class="page__blog--news__date">
			<div class="post__cat"><?=  $posts_args['post__in'][0][the_category()];?></div>
			<p class="page__blog--new__date black"><?= get_the_date('F j, Y');?></p>
		</div>
		<h2 class="page__blog--item__title"><?= $posts_args['post__in'][0][the_title()]; ?></h2>
		<p class="page__blog--item__subtitle"><?= $posts_args['post__in'][0][the_excerpt()]; ?></p>
        <a href="<?= $posts_args['post__in'][0][get_permalink()];?>" class="page__blog--news__btn"><span class="page__blog--news__btn-inf-url"><?= $posts_args['post__in'][0][the_title()]; ?></span>Read more</a>
	</div>
</div>
<a href="<?= $posts_args['post__in'][1][get_permalink()];?>" class="page__blog--item">
	<img alt="img" class="page__blog--item__img" src=<?= $posts_args['post__in'][1][get_the_post_thumbnail_url()]; ?>"">
	<div class="page__blog--item__content">
		<div class="page__blog--news__date">
			<div class="post__cat"><?=  $posts_args['post__in'][1][the_category()];?></div>
			<p class="page__blog--new__date black"><?= get_the_date('F j, Y');?></p>
		</div>
		<h2 class="page__blog--item__title"><?= $posts_args['post__in'][1][the_title()]; ?></h2>
		<p class="page__blog--item__subtitle"><?= $posts_args['post__in'][1][the_excerpt()]; ?></p>
	</div>
</a>