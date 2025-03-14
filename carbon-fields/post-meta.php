<?php
if (!defined('ABSPATH')){
	exit();
}
use Carbon_Fields\Container;
use Carbon_Fields\Block;
use Carbon_Fields\Field;


Block::make( 'section-cards', 'Section cards' )
     ->add_tab( 'Setting', [
	     Field::make( 'select', 'margin', ( 'Margin' ) )
	          ->set_options( array(
		          'no' => 'No',
		          'small' => 'Small',
		          'middle' => 'Middle',
		          'big' => 'Big',
	          ) ),

     ])
     ->set_category( 'media-page', ( 'Media-page Category' ) )
     ->set_inner_blocks( true )
     ->set_inner_blocks_position( 'above' )
     ->set_render_callback( function ( $fields, $attributes, $inner_blocks ) {
	     $margin = $fields['margin'];
	     if( $margin == 'small' ){
		     $className = 'margin-small';
	     }
	     if( $margin == 'middle' ){
		     $className = 'margin-middle';
	     }
	     if( $margin == 'big' ){
		     $className = 'margin-big';
	     }
	     ?>

         <section class="page__blog <?= $className; ?>">
             <div class="container">
                 <div class="page__blog--inner">
	                 <?= $inner_blocks ?>
                 </div>
             </div>
         </section>

	     <?php
     } );

Block::make( 'news_card', 'Card news' )
     ->add_tab( 'News card', [
	     Field::make( 'image', 'news_card_img', ( 'Image' ) ),
	     Field::make( 'text', 'news_card_type_link', ( 'Category link' ) )->set_width(50),
	     Field::make( 'text', 'news_card_type', ( 'Category link (With a capital letter!)' ) )->set_attribute( 'placeholder', 'Blog/News/Press' )->set_width(50),
	     Field::make( 'text', 'news_card_date', ( 'Date' ) )->set_attribute( 'placeholder', 'July 27, 2022' ),
	     Field::make( 'text', 'news_card_title', ( 'Title' ) ),
	     Field::make( 'text', 'news_card_subtitle', ( 'Subtitle' ) ),
	     Field::make( 'text', 'news_card_link', ( 'Link' ) )

     ])
     ->set_category( 'media-page')
     ->set_render_callback( function ( $fields, $attributes, $inner_blocks ) {
	     ?>
         <div class="card <?=$fields['news_card_type']; ?> page__blog--item page__blog--item__content blog__block min-h700" style="background: url('<?= wp_get_attachment_image_url($fields['news_card_img'], 'full') ?>') center no-repeat; background-size: cover;">
             <div>
                 <div class="page__blog--news__date">
                     <a href="<?=$fields['news_card_type_link']; ?>" class="page__blog--new br tag"><?=$fields['news_card_type']; ?></a>
                     <p class="page__blog--new__date"><?=$fields['news_card_date']; ?></p>
                 </div>
                 <h2 class="page__blog--item__title"><?=$fields['news_card_title']; ?></h2>
             </div>
             <div>
                 <p class="page__blog--item__subtitle"><?=$fields['news_card_subtitle']; ?></p>
                 <a href="<?=$fields['news_card_link']; ?>" class="page__blog--news__btn"><span class="page__blog--news__btn-inf-url"><?=$fields['news_card_title']; ?></span>Read more</a>
             </div>
         </div>

	     <?php
     } );

Block::make( 'blog_card', 'Card Blog' )
     ->add_tab( 'Blog card', [
	     Field::make( 'image', 'blog_card_img', ( 'Image' ) ),
	     Field::make( 'text', 'blog_card_type_link', ( 'Category link' ) )->set_width(50),
	     Field::make( 'text', 'blog_card_type', ( 'Category link (With a capital letter!)' ) )->set_attribute( 'placeholder', 'Blog/News/Press' )->set_width(50),
	     Field::make( 'text', 'blog_card_date', ( 'Date' ) )->set_attribute( 'placeholder', 'July 27, 2022' ),
	     Field::make( 'text', 'blog_card_title', ( 'Title' ) ),
	     Field::make( 'text', 'blog_card_subtitle', ( 'Subtitle' ) ),
	     Field::make( 'text', 'blog_card_link', ( 'Link' ) )

     ])
     ->set_render_callback( function ( $fields, $attributes, $inner_blocks ) {
	     ?>

         <div class="card <?=$fields['blog_card_type']; ?> page__blog--item page__blog--item__content blog__block min-h700" style="background: url('<?= wp_get_attachment_image_url($fields['blog_card_img'], 'full') ?>') center no-repeat; background-size: cover;">
             <div>
                 <div class="page__blog--news__date">
                     <a href="<?=$fields['blog_card_type_link']; ?>" class="page__blog--new br tag"><?=$fields['blog_card_type']; ?></a>
                     <p class="page__blog--new__date"><?=$fields['blog_card_date']; ?></p>
                 </div>
                 <h2 class="page__blog--item__title"><?=$fields['blog_card_title']; ?></h2>
             </div>
             <div>
                 <p class="page__blog--item__subtitle"><?=$fields['blog_card_subtitle']; ?></p>
                 <a href="<?=$fields['blog_card_link']; ?>" class="page__blog--news__btn"><span class="page__blog--news__btn-inf-url"><?=$fields['blog_card_title']; ?></span>Read more</a>
             </div>
         </div>

	     <?php
     } );

Block::make( 'press_card', 'Card Press' )
     ->add_tab( 'Press card', [
	     Field::make( 'color', 'press_card_bg', ( 'Background' ) )->set_width(30),
	     Field::make( 'select', 'press_card_border_text', ( 'Border and text color' ) )
		     ->set_options( array(
			     'card_black' => 'black',
			     'card_white' => 'white',
		     ) )->set_width(30),
	     Field::make( 'image', 'press_card_img', ( 'Image' ) )->set_width(30),
	     Field::make( 'text', 'press_card_type_link', ( 'Category link' ) )->set_width(50),
	     Field::make( 'text', 'press_card_type', ( 'Category link (With a capital letter!)' ) )->set_attribute( 'placeholder', 'Blog/News/Press' )->set_width(50),
	     Field::make( 'text', 'press_card_date', ( 'Date' ) )->set_attribute( 'placeholder', 'July 27, 2022' ),
	     Field::make( 'text', 'press_card_title', ( 'Title' ) ),
	     Field::make( 'text', 'press_card_subtitle', ( 'Subtitle' ) ),
	     Field::make( 'text', 'press_card_link', ( 'Link' ) )

     ])
     ->set_category( 'media-page')
     ->set_render_callback( function ( $fields, $attributes, $inner_blocks ) {
         $bgColor = $fields['press_card_bg'];
         $borderTextColor = $fields['press_card_border_text'];
	     if ($borderTextColor == 'card_white'){
		     $colorT = 'card__text-white';
		     $borderC = 'br card__text-white';
	     }
	     if ($borderTextColor == 'card_black'){
		     $colorT = 'card__text-black';
		     $borderC = 'card__tag-black';
	     }
//	     var_dump($colorT);
	     ?>
         <div class="card <?=$fields['press_card_type']; ?> page__blog--item page__blog--item__content blog__block min-h700" style="background: url('<?= wp_get_attachment_image_url($fields['press_card_img'], 'full') ?>') center no-repeat; background-size: cover;">
             <div>
                 <div class="page__blog--news__date">
                     <a href="<?=$fields['press_card_type_link']; ?>" class="page__blog--new br tag"><?=$fields['press_card_type']; ?></a>
                     <p class="page__blog--new__date"><?=$fields['press_card_date']; ?></p>
                 </div>
                 <h2 class="page__blog--item__title"><?=$fields['press_card_title']; ?></h2>
             </div>
             <div>
                 <p class="page__blog--item__subtitle"><?=$fields['press_card_subtitle']; ?></p>
                 <a href="<?=$fields['press_card_link']; ?>" class="page__blog--news__btn"><span class="page__blog--news__btn-inf-url"><?=$fields['press_card_title']; ?></span>Read more</a>
             </div>
         </div>

	     <?php
     } );