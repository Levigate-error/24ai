<?php
$page_id=get_the_ID();

get_header();

?>
	<main class="mt70">
		<div class="container">
			<div class="page__blog--inner wrap">
				<?php
				global $posts;
				$args = array( 'numberposts' => -1, 'tag'=> basename($_SERVER['REQUEST_URI']), 'order' => 'ASC');
				$myposts = get_posts( $args );
				if ($myposts){
					foreach( $myposts as $post ) : setup_postdata($posts); ?>
						<?php get_template_part("template-parts/article-card"); ?>
					<?php endforeach;
				}?>
				<?php wp_reset_postdata(); ?>
			</div>
		</div>
	</main>
<?php
get_footer();