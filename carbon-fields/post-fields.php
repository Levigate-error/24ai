<?php
if (!defined('ABSPATH')){
	exit();
}
use Carbon_Fields\Container;
use Carbon_Fields\Block;
use Carbon_Fields\Field;


Container::make( 'post_meta', 'ORM block' )
    ->where( 'post_id', '=', '1545' )

    ->add_tab( 'Setting', [
	        Field::make( 'text', 'orm_block_id', 'Section ID'),
	        Field::make( 'separator', 'orm_block_separator_1', 'Section background settings' ),
	        Field::make( 'radio', 'orm_block_bg_type', 'Background type')
		              ->set_options( array(
			              'color' => 'Color',
			              'gradient' => 'Gradient',
		              ) )
		              ->set_default_value('color'),
	        Field::make( 'color', 'orm_block_background_color', 'Background color' )
		              ->set_conditional_logic( array(
			              array(
				              'field' => 'orm_block_bg_type',
				              'value' => 'color',
				              'compare' => '=',
			              ))),
	        Field::make( 'text', 'orm_block_background_gradient', 'Gradient css rule' )
		              ->set_conditional_logic( array(
			              array(
				              'field' => 'orm_block_bg_type',
				              'value' => 'gradient',
				              'compare' => '=',
			              ))),
	        Field::make( 'separator', 'orm_block_separator_2', 'Section paddings settings' ),
	        Field::make( 'select', 'orm_block_padding', 'Padding mode' )
		              ->set_options( array(
			              'with-padding' => 'With padding',
			              'no-padding' => 'No padding',
			              'no-padding-top' => 'No padding top',
			              'no-padding-bottom' => 'No padding bottom',
			              'big-padding-top' => 'Big padding top',
			              'big-padding-bottom' => 'Big padding bottom',

		              ) ),
	        Field::make( 'separator', 'orm_block_separator_3', 'Section title settings' ),
	        Field::make( 'select', 'orm_block_show_title', 'Show title?' )
		              ->set_options( array(
			              'no' => 'No',
			              'yes' => 'Yes',
		              ) ),
	        Field::make( 'select', 'orm_block_title_type', 'Title type' )
		              ->set_options( array(
			              'numeric-with-left-icon' => 'Numeric, with left icon',
			              'with-icon-on-top' => 'With icon on top',
			              'without-icon' => 'without icon',
		              ) )
		              ->set_conditional_logic( array(
			              array(
				              'field' => 'orm_block_show_title',
				              'value' => 'yes',
				              'compare' => '=',
			              ))),
	        Field::make( 'select', 'orm_block_title_align', 'Title align' )
		              ->set_options( array(
			              'left' => 'left',
			              'centered' => 'center',
		              ) )
		              ->set_conditional_logic( array(
			              array(
				              'field' => 'orm_block_title_type',
				              'value' => 'without-icon',
				              'compare' => '=',
			              ))),
	        Field::make( 'text', 'orm_block_title_max_width', 'Max width (px)' )
		              ->set_conditional_logic( array(
			              array(
				              'field' => 'orm_block_title_type',
				              'value' => 'without-icon',
				              'compare' => '=',
			              ))),
	        Field::make( 'image', 'orm_block_pre_title_img', 'Pre title image' )
		              ->set_type( array( 'image' ) )
		              ->set_value_type( 'url' )
		              ->set_conditional_logic( array(
			              'relation' => 'AND',
			              array(
				              'field' => 'orm_block_title_type',
				              'value' => 'with-icon-on-top',
				              'compare' => '=',
			              ),
			              array(
				              'field' => 'orm_block_show_title',
				              'value' => 'yes',
				              'compare' => '=',
			              )
		              )),
	        Field::make( 'image', 'orm_block_left_title_img', 'Left pre title image' )
		              ->set_type( array( 'image' ) )
		              ->set_value_type( 'url' )
		              ->set_conditional_logic( array(
			              'relation' => 'AND',
			              array(
				              'field' => 'orm_block_title_type',
				              'value' => 'numeric-with-left-icon',
				              'compare' => '=',
			              ),
			              array(
				              'field' => 'orm_block_show_title',
				              'value' => 'yes',
				              'compare' => '=',
			              )
		              )),

	        Field::make( 'text', 'orm_block_title', 'Title' )
		              ->set_conditional_logic( array(
			              array(
				              'field' => 'orm_block_show_title',
				              'value' => 'yes',
				              'compare' => '=',
			              ))),
	        Field::make( 'color', 'orm_block_title_color', 'Title color' )
		              ->set_conditional_logic( array(
			              array(
				              'field' => 'orm_block_show_title',
				              'value' => 'yes',
				              'compare' => '=',
			              ))),
	        Field::make( 'separator', 'orm_block_separator_4', 'Section description settings' ),
	        Field::make( 'select', 'orm_block_show_desc', 'Show description?' )
		              ->set_options( array(
			              'no' => 'No',
			              'yes' => 'Yes',
		              ) ),
	        Field::make( 'textarea', 'orm_block_desc', 'Description' )
		              ->set_conditional_logic( array(
			              array(
				              'field' => 'orm_block_show_desc',
				              'value' => 'yes',
				              'compare' => '=',
			              ))),
	        Field::make( 'color', 'orm_block_desc_color', 'Description color' )
		              ->set_conditional_logic( array(
			              array(
				              'field' => 'orm_block_show_desc',
				              'value' => 'yes',
				              'compare' => '=',
			              ))),
	        Field::make( 'color', 'orm_block_desc_accent_color', 'Description accent color' )
		              ->set_conditional_logic( array(
			              array(
				              'field' => 'orm_block_show_desc',
				              'value' => 'yes',
				              'compare' => '=',
			              ))),
    ])
	->add_tab( 'Products slider', [
			 Field::make( 'text', 'orm_products_slider_id', 'Block ID' ),
			 Field::make( 'select', 'orm_products_slider_margin', 'Margin mode' )
			      ->set_options( array(
				      'no-margin' => 'no-margin',
				      'margin' => 'Margin',
				      'margin-top' => 'Margin top',
				      'margin-bottom' => 'Margin bottom',
			      ) ),
			 Field::make( 'color', 'orm_products_slider_background_color', 'Background color' ),
			 Field::make( 'text', 'orm_products_slider_background_gradient', 'Gradient css rule' ),
			 Field::make( 'image', 'orm_products_slider_logo', 'Logo' )
			      ->set_type( array( 'image' ) )
			      ->set_value_type( 'url' ),
			 Field::make( 'text', 'orm_products_slider_title', 'Title' ),
			 Field::make( 'text', 'orm_products_slider_title_max_width', 'Title max width' ),
			 Field::make( 'color', 'orm_products_slider_title_color', 'Title color' ),
			 Field::make( 'text', 'orm_products_slider_btn_text', 'Button text' ),
			 Field::make( 'text', 'orm_products_slider_btn_link', 'Button link' ),
			 Field::make( 'color', 'orm_products_slider_btn_text_color', 'Button text color' ),
			 Field::make( 'color', 'orm_products_slider_btn_hover_text_color', 'Button:hover text color' ),
			 Field::make( 'color', 'orm_products_slider_btn_background_color', 'Button background color' ),
			 Field::make( 'color', 'orm_products_slider_btn_hover_background_color', 'Button:hover background color' ),
			 Field::make( 'complex', 'orm_products_slider', 'Products slider' )
			      ->set_collapsed(true)
			      ->add_fields( array(
				      Field::make( 'text', 'orm_link', 'Link' ),
                      Field::make( 'color', 'orm_background_color', 'Background color' )->set_width(50),
                      Field::make( 'color', 'orm_text_color', 'Text color' )->set_width(50),
				      Field::make( 'text', 'orm_background_gradient', 'Gradient css rule' ),
				      Field::make( 'image', 'orm_logo', 'logo' )
				           ->set_type( array( 'image' ) )
				           ->set_value_type( 'url' ),
				      Field::make( 'text', 'orm_desc', 'Description' )
			      ) )
	]);

Container::make( 'post_meta', 'Contact form' )
         ->where( 'post_id', '=', '1545' )

         ->add_tab( 'Setting', [
	         Field::make( 'text', 'orm_contact_block_id', 'Section ID'),
	         Field::make( 'separator', 'orm_contact_block_separator_1', 'Section background settings' ),
	         Field::make( 'radio', 'orm_contact_block_bg_type', 'Background type')
	              ->set_options( array(
		              'color' => 'Color',
		              'gradient' => 'Gradient',
	              ) )
	              ->set_default_value('color'),
	         Field::make( 'color', 'orm_contact_block_background_color', 'Background color' )
	              ->set_conditional_logic( array(
		              array(
			              'field' => 'orm_contact_block_bg_type',
			              'value' => 'color',
			              'compare' => '=',
		              ))),
	         Field::make( 'text', 'orm_contact_block_background_gradient', 'Gradient css rule' )
	              ->set_conditional_logic( array(
		              array(
			              'field' => 'orm_contact_block_bg_type',
			              'value' => 'gradient',
			              'compare' => '=',
		              ))),
	         Field::make( 'separator', 'orm_contact_block_separator_2', 'Section paddings settings' ),
	         Field::make( 'select', 'orm_contact_block_padding', 'Padding mode' )
	              ->set_options( array(
		              'with-padding' => 'With padding',
		              'no-padding' => 'No padding',
		              'no-padding-top' => 'No padding top',
		              'no-padding-bottom' => 'No padding bottom',
		              'big-padding-top' => 'Big padding top',
		              'big-padding-bottom' => 'Big padding bottom',

	              ) ),
	         Field::make( 'separator', 'orm_contact_block_separator_3', 'Section title settings' ),
	         Field::make( 'select', 'orm_contact_block_show_title', 'Show title?' )
	              ->set_options( array(
		              'no' => 'No',
		              'yes' => 'Yes',
	              ) ),
	         Field::make( 'select', 'orm_contact_block_title_type', 'Title type' )
	              ->set_options( array(
		              'numeric-with-left-icon' => 'Numeric, with left icon',
		              'with-icon-on-top' => 'With icon on top',
		              'without-icon' => 'without icon',
	              ) )
	              ->set_conditional_logic( array(
		              array(
			              'field' => 'orm_contact_block_show_title',
			              'value' => 'yes',
			              'compare' => '=',
		              ))),
	         Field::make( 'select', 'orm_contact_block_title_align', 'Title align' )
	              ->set_options( array(
		              'left' => 'left',
		              'centered' => 'center',
	              ) )
	              ->set_conditional_logic( array(
		              array(
			              'field' => 'orm_contact_block_title_type',
			              'value' => 'without-icon',
			              'compare' => '=',
		              ))),
	         Field::make( 'text', 'orm_contact_block_title_max_width', 'Max width (px)' )
	              ->set_conditional_logic( array(
		              array(
			              'field' => 'orm_contact_block_title_type',
			              'value' => 'without-icon',
			              'compare' => '=',
		              ))),
	         Field::make( 'image', 'orm_contact_block_pre_title_img', 'Pre title image' )
	              ->set_type( array( 'image' ) )
	              ->set_value_type( 'url' )
	              ->set_conditional_logic( array(
		              'relation' => 'AND',
		              array(
			              'field' => 'orm_contact_block_title_type',
			              'value' => 'with-icon-on-top',
			              'compare' => '=',
		              ),
		              array(
			              'field' => 'orm_contact_block_show_title',
			              'value' => 'yes',
			              'compare' => '=',
		              )
	              )),
	         Field::make( 'image', 'orm_contact_block_left_title_img', 'Left pre title image' )
	              ->set_type( array( 'image' ) )
	              ->set_value_type( 'url' )
	              ->set_conditional_logic( array(
		              'relation' => 'AND',
		              array(
			              'field' => 'orm_contact_block_title_type',
			              'value' => 'numeric-with-left-icon',
			              'compare' => '=',
		              ),
		              array(
			              'field' => 'orm_contact_block_show_title',
			              'value' => 'yes',
			              'compare' => '=',
		              )
	              )),

	         Field::make( 'text', 'orm_contact_block_title', 'Title' )
	              ->set_conditional_logic( array(
		              array(
			              'field' => 'orm_contact_block_show_title',
			              'value' => 'yes',
			              'compare' => '=',
		              ))),
	         Field::make( 'color', 'orm_contact_block_title_color', 'Title color' )
	              ->set_conditional_logic( array(
		              array(
			              'field' => 'orm_contact_block_show_title',
			              'value' => 'yes',
			              'compare' => '=',
		              ))),
	         Field::make( 'separator', 'orm_contact_block_separator_4', 'Section description settings' ),
	         Field::make( 'select', 'orm_contact_block_show_desc', 'Show description?' )
	              ->set_options( array(
		              'no' => 'No',
		              'yes' => 'Yes',
	              ) ),
	         Field::make( 'textarea', 'orm_contact_block_desc', 'Description' )
	              ->set_conditional_logic( array(
		              array(
			              'field' => 'orm_contact_block_show_desc',
			              'value' => 'yes',
			              'compare' => '=',
		              ))),
	         Field::make( 'color', 'orm_contact_block_desc_color', 'Description color' )
	              ->set_conditional_logic( array(
		              array(
			              'field' => 'orm_contact_block_show_desc',
			              'value' => 'yes',
			              'compare' => '=',
		              ))),
	         Field::make( 'color', 'orm_contact_block_desc_accent_color', 'Description accent color' )
	              ->set_conditional_logic( array(
		              array(
			              'field' => 'orm_contact_block_show_desc',
			              'value' => 'yes',
			              'compare' => '=',
		              ))),
         ])
         ->add_tab( 'Contact form', [
	         Field::make( 'text', 'orm_contact_form_id', 'Block ID' ),
	         Field::make( 'select', 'orm_contact_form_margin', 'Margin mode' )
	              ->set_options( array(
		              'no-margin' => 'no-margin',
		              'margin' => 'Margin',
		              'margin-top' => 'Margin top',
		              'margin-bottom' => 'Margin bottom',
	              ) ),
	         Field::make( 'text', 'orm_contact_form_button_text', 'Button text' ),
	         Field::make( 'text', 'orm_contact_form_success_msg', 'Form success submit message' ),
	         Field::make( 'text', 'orm_contact_form_error_msg', 'Form error submit message' ),
	         Field::make( 'image', 'orm_contact_form_info_img', 'Form info image' )
	              ->set_type( array( 'image' ) )
	              ->set_value_type( 'url' ),
	         Field::make( 'text', 'orm_contact_form_info_text', 'Form info text' )
         ]);

Container::make( 'post_meta', 'Card type' )
         ->where( 'post_type', '=', 'post' )

         ->add_tab( 'Type', [
	         Field::make( 'radio_image', 'type_card', ('Type card' ) )
	              ->set_options( array(
		              'card_news' => 'https://blog.24ttl.net/wp-content/themes/orm/img/card_news.jpg',
		              'card_blog' => 'https://blog.24ttl.net/wp-content/themes/orm/img/card_blog.jpg',
		              'card_press' => 'https://blog.24ttl.net/wp-content/themes/orm/img/card_press.jpg',
	              ) ),
         ]);

Container::make( 'post_meta', 'Blog options' )
         ->where( 'post_type', '=', 'post' )
            ->add_tab ('Header', [
            Field::make( 'image', 'header_logo', 'Logo' )
            	  ->set_type( array( 'image' ) )
	              ->set_value_type( 'url' ),
            Field::make( 'text', 'header_text', 'Text' ),
            Field::make( 'text', 'header_button', 'Button text' ),
            Field::make( 'text', 'header_url', 'Button link' ),
            Field::make( 'color', 'header_button_color', 'Button color' ),
                ])
            ->add_tab ('Footer', [
            Field::make( 'image', 'footer_logo', 'Logo' )
            	  ->set_type( array( 'image' ) )
	              ->set_value_type( 'url' ),
            Field::make( 'text', 'footer_text', 'Text' ),
            Field::make( 'text', 'footer_button', 'Button text' ),
            Field::make( 'text', 'footer_url', 'Button link' ),
            Field::make( 'color', 'footer_button_color', 'Button color' ),
                ]);


Container::make( 'post_meta', 'Previews cards' )
        ->where( 'post_type', '=', 'post' )

        ->add_tab( 'Обложка в самой статье', [
	        Field::make( 'image', 'preview_slider_full', '(1165x624)' )->set_width(50),
        ])
        ->add_tab( 'Обложка статьи на странице Блога', [
            Field::make( 'image', 'preview_blog_card', '(570x700)' ),
        ])
        ->add_tab( 'Обложка статьи на страницах инструментов', [
            Field::make( 'image', 'preview_tools_card', '(360x520)' ),
        ])
        ->add_tab( 'Preview press card', [
            Field::make( 'text', 'posts_source_link', 'Source link' )->set_visible_in_rest_api( $visible = true ),
            Field::make( 'image', 'posts_source', 'Source new' )->set_visible_in_rest_api( $visible = true ),
            Field::make( 'color', 'posts_bg_color', 'Background' ),
            Field::make( 'select', 'posts_border_text_color', 'Border and text color' )
                ->set_options( array(
                    'black' => 'black',
                    'white' => 'white',
                ) ),
        ]);

//sidebar
Container::make( 'post_meta', 'Articles' )
         ->where( 'post_id', '=', '1700' )
         ->add_tab( '2 article', [
	         Field::make( 'association', 'posts_sidebar1', '2 article' )
	              ->set_types( [
		              [
			              'type'      => 'post',
                          'orderby'     => 'date',
			              'post_type' => 'post',
		              ]
	              ] )->set_max(1),
             Field::make('select', 'posts_resolution', 'Post size')
                 ->set_options( array(
                   '700px' => 'Height 700',
                   '1000px' => 'Height 1000',
                   '1200px' => 'Height 1200',
                 ))
         ])
         ->add_tab( '3 article', [
	         Field::make( 'association', 'posts_sidebar2', '3 article' )
	              ->set_types( [
		              [
			              'type'      => 'post',
                          'orderby'     => 'date',
			              'post_type' => 'post',
		              ]
	              ] )->set_max(1),
         ]);
//end sidebar

Container::make( 'post_meta', 'Top slider, articles' )
         ->where( 'post_id', '=', '1700' )
         ->add_tab( 'Top slider, articles', [
	         Field::make( 'association', 'banner_slider', 'Recent articles' )
	              ->set_types( [
		              [
			              'type'      => 'post',
			              'post_type' => 'post',
		              ]
	              ] )->set_max(6),
         ]);
Container::make( 'post_meta', 'Language settings' )
	->where( 'post_type', '=', 'page' )
	->add_fields( array(
	    Field::make( 'checkbox', 'hide_lang_switcher', 'Hide language switcher' ),
	 ) );
	 
	 Container::make('post_meta', 'Footer')
    	->where('post_type', '=', 'page')
	->add_fields( array(
	    Field::make( 'complex', 'footer_settings', 'Footer menu' )
	         ->add_fields( array(
                    Field::make( 'text', 'tag_title', 'Tag Title'),
                    Field::make( 'text', 'tag_link', 'Tag Link'),
	           ) ),
	 ) );

Container::make( 'post_meta', 'Header menu settings' )
	->where( 'post_type', '=', 'page' )
	->add_fields( array(
	    Field::make( 'complex', 'header_menu', 'Header menu' )
	         ->add_fields( array(
	             Field::make( 'text', 'item_text', 'Menu item text')->set_width(50),
	             Field::make( 'text', 'item_link', 'Menu item link')->set_width(50),
	             Field::make( 'complex', 'sub_menu', 'Sub menu' )
	                  ->add_fields( array(
		                   Field::make( 'text', 'item_text', 'Menu item text'),
		                   Field::make( 'text', 'item_desc', 'Menu item description'),
		                   Field::make( 'text', 'item_link', 'Menu item link'),
	                  ) ),
	           ) ),
	 ) );