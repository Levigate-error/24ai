<?php
if (!defined('ABSPATH')) {
    exit();
}

use Carbon_Fields\Container;
use Carbon_Fields\Field;
use Carbon_Fields\Block;

include_once $_SERVER['DOCUMENT_ROOT'] . '/wp-content/themes/orm/php-plugins/php-image-resize/ImageResizeWordPress.php';

add_action('carbon_fields_register_fields', 'fields_and_options');
function fields_and_options()
{

    $sites = get_sites(array(
        'fields' => 'all',
        'site__not_in' => array(get_main_site_id()),
    ));


    Container::make('network', 'crb_network_container', 'Network Settings')
        ->add_fields(array(
                Field::make('checkbox', 'redirect_primary_site_to_other', 'Redirect primary site to other'),
            )
        );
    Container::make('theme_options', 'Language swither settings')
        ->set_page_parent('themes.php')
        ->add_fields(array(
            Field::make('text', 'lang_text', 'Language'),
            Field::make('image', 'lang_icon', 'Flag svg icon')->set_value_type('url'),
        ));
    Container::make('theme_options', 'Cookies message')
        ->set_page_parent('themes.php')
        ->add_fields(array(
            Field::make('textarea', 'cookies_text', 'Cookies message text'),
        ));
    Container::make('theme_options', 'Blog settings')
        ->set_page_parent('edit.php')
        ->add_fields(array(
            Field::make('text', 'blog_block_title', 'Blog block title'),
            Field::make('text', 'blog_block_all_posts_label', 'Blog block "All posts" text'),
            Field::make('text', 'read_more_label', '"Read more" link text'),
            Field::make('text', 'more_posts_label', '"More posts" text'),
            Field::make('text', 'sidebar_all_posts_label', 'Sidebar "All post" text'),
            Field::make('checkbox', 'hide_cat_nav', 'Hide categories nav buttons'),
        ));
    Container::make('theme_options', 'Header settings')
        ->set_page_parent('themes.php')
        ->add_fields(array(
            Field::make('image', 'header_logo', 'Logo')
                ->set_type(array('image'))
                ->set_value_type('url'),
            Field::make('image', 'posts_header_logo', 'Blog posts logo')
                ->set_type(array('image'))
                ->set_value_type('url'),
            Field::make('color', 'header_background', 'Header background'),
            Field::make('color', 'header_hover_background', 'Header hover background'),
            Field::make('color', 'header_primary_color', 'Header primary color'),
            Field::make('color', 'header_secondary_color', 'Header secondary color'),
            Field::make('complex', 'header_menu', 'Header menu')
                ->add_fields(array(
                    Field::make('text', 'item_text', 'Menu item text')->set_width(50),
                    Field::make('text', 'item_link', 'Menu item link')->set_width(50),
                    Field::make('complex', 'sub_menu', 'Sub menu')
                        ->add_fields(array(
                            Field::make('text', 'item_text', 'Menu item text'),
                            Field::make('text', 'item_desc', 'Menu item description'),
                            Field::make('text', 'item_link', 'Menu item link'),
                            Field::make('image', 'item_icon', 'Menu item icon')
                                ->set_type(array('image'))
                                ->set_value_type('url'),
                        )),
                )),
            Field::make('text', 'header_button_text', 'Header button text'),
            Field::make('text', 'header_button_link', 'Header button link'),

            Field::make('text', 'header_menu_button_text1', 'Header button text2'),
            Field::make('text', 'header_button_link2', 'Header button link2'),


        ));
    Container::make('theme_options', 'Billings modal options')
        ->set_page_parent('themes.php')
        ->add_fields(array(
            Field::make('text', 'billings_modal_title', 'Billings modal title'),
            Field::make('text', 'billings_modal_description', 'Billings modal description'),
            Field::make('color', 'billings_modal_description_color', 'Billings modal description color'),

            Field::make('complex', 'billings_modal_list', 'Billings modal list')
                ->add_fields(array(
                    Field::make('text', 'billing_modal_list_item_title', 'Billing title'),
                    Field::make('color', 'billing_modal_list_item_background_color', 'Billing back ground color'),
                    Field::make('checkbox', 'billing_modal_list_item_is_individual', 'Is billing individual')->set_default_value(false),

                    Field::make('text', 'billing_modal_list_item_bonus', 'Billing benefit'),

                    Field::make('text', 'billing_modal_list_item_btn', 'Billing button text'),
                    Field::make('text', 'billing_modal_list_item_btn_link', 'Billing button link'),

                    Field::make('text', 'billing_modal_list_item_price', 'Billing price'),
                    Field::make('color', 'billing_modal_list_item_price_color', 'Billing price color'),
                    Field::make('text', 'billing_modal_list_item_price_post', 'Billing price post text'),
                    Field::make('color', 'billing_modal_list_item_price_post_color', 'Billing price post text color'),
                    Field::make('text', 'billing_modal_list_item_sub_price', 'Billing price subtext text'),
                    Field::make('color', 'billing_modal_list_item_sub_price_color', 'Billing price subtext color'),
                    Field::make('text', 'billing_modal_list_item_sub_post_price', 'Billing price subtext post text'),
                    Field::make('color', 'billing_modal_list_item_sub_post_price_color', 'Billing price subtext post text color'),

                    Field::make('text', 'billing_modal_list_item_count', 'Billing item count'),
                    Field::make('color', 'billing_modal_list_item_count_color', 'Billing item count color'),
                    Field::make('text', 'billing_modal_list_item_count_subs', 'Billing item subtext'),
                    Field::make('color', 'billing_modal_list_item_count_subs_color', 'Billing item subtext color'),

                    Field::make('text', 'billing_modal_list_item_dropdown_title', 'Billing dropdown title'),

                    Field::make('complex', 'billing_modal_list_item_dropdown_items', 'Billing dropdown items')
                        ->add_fields(array(
                            Field::make('text', 'billing_modal_list_item_dropdown_item_text', 'Dropdown item text'),
                            Field::make('color', 'billing_modal_list_item_dropdown_item_text_color', 'Dropdown item text color'),
                            Field::make('checkbox', 'billing_modal_list_item_dropdown_item_is_plus', 'Dropdown item list bullet point is plus'),
                        )),
                )),
        ));
    Container::make('theme_options', 'Header menu2 settings')
        ->set_page_parent('themes.php')
        ->add_fields(array(
            Field::make('text', 'og_image_url', 'og image url'),
            Field::make('text', 'panel_background', 'Panel css tag background'),
            Field::make('text', 'button_background', 'Button css tag background'),
            Field::make('text', 'button_background_hover', 'Button hover css tag background'),
            Field::make('text', 'color_link', 'Button color link'),
            Field::make('text', 'header_menu_button_text1', 'Header button text 1'),
            Field::make('text', 'header_menu_button_link1', 'Header button link 1'),

            Field::make('text', 'header_menu_button_text2', 'Header button text 2'),
            Field::make('text', 'header_menu_button_link2', 'Header button link 2'),

            Field::make('text', 'header_menu_button_text3', 'Header button text 3'),
            Field::make('text', 'header_menu_button_link3', 'Header button link 3'),

            Field::make('text', 'header_menu_button_text4', 'Header button text 4'),
            Field::make('text', 'header_menu_button_link4', 'Header button link 4'),

            Field::make('text', 'header_menu_button_text5', 'Header button text 5'),
            Field::make('text', 'header_menu_button_link5', 'Header button link 5'),

            Field::make('text', 'header_menu_button_text6', 'Header button text 6'),
            Field::make('text', 'header_menu_button_link6', 'Header button link 6'),

            Field::make('text', 'header_menu_button_text7', 'Header button text 7'),
            Field::make('text', 'header_menu_button_link7', 'Header button link 7'),

            Field::make('text', 'header_menu_button_text8', 'Header button text 8'),
            Field::make('text', 'header_menu_button_link8', 'Header button link 8'),

            Field::make('text', 'header_menu_button_text9', 'Header button text 9'),
            Field::make('text', 'header_menu_button_link9', 'Header button link 9'),

            Field::make('text', 'header_menu_button_text10', 'Header button text 10'),
            Field::make('text', 'header_menu_button_link10', 'Header button link 10'),


            Field::make('text', 'header_menu_button_text11', 'Header button text 11'),
            Field::make('text', 'header_menu_button_link11', 'Header button link 11'),

            Field::make('text', 'header_menu_button_text12', 'Header button text 12'),
            Field::make('text', 'header_menu_button_link12', 'Header button link 12'),

            Field::make('text', 'header_menu_button_text13', 'Header button text 13'),
            Field::make('text', 'header_menu_button_link13', 'Header button link 13'),

            Field::make('text', 'header_menu_button_text14', 'Header button text 14'),
            Field::make('text', 'header_menu_button_link14', 'Header button link 14'),

            Field::make('text', 'header_menu_button_text15', 'Header button text 15'),
            Field::make('text', 'header_menu_button_link15', 'Header button link 15'),

            Field::make('text', 'header_menu_button_text16', 'Header button text 16'),
            Field::make('text', 'header_menu_button_link16', 'Header button link 16'),

            Field::make('text', 'header_menu_button_text17', 'Header button text 17'),
            Field::make('text', 'header_menu_button_link17', 'Header button link 17'),

            Field::make('text', 'header_menu_button_text18', 'Header button text 18'),
            Field::make('text', 'header_menu_button_link18', 'Header button link 18'),

            Field::make('text', 'header_menu_button_text19', 'Header button text 19'),
            Field::make('text', 'header_menu_button_link19', 'Header button link 19'),

            Field::make('text', 'header_menu_button_text20', 'Header button text 20'),
            Field::make('text', 'header_menu_button_link20', 'Header button link 20'),

        ));

    Container::make('theme_options', 'Footer settings')->set_page_parent('themes.php')
        ->add_fields(
            array(
                Field::make('checkbox', 'footer_rounded_borders', 'Rounded borders'),
                Field::make('text', 'footer_products_menu_mobile_title', 'Products menu mobile title'),
                Field::make('text', 'footer_copyright', 'Copyright text'),
                Field::make('complex', 'footer_documents', 'Documents tab (Privacy, Terms and Conditions)')
                    ->add_fields(array(
                            Field::make('text', 'document_title', 'Document Title'),
                            Field::make('text', 'document_link', 'Document Link')
                        )
                    ),
                Field::make('color', 'footer_background', 'Footer background'),
                Field::make('color', 'footer_primary_color', 'Footer primary color'),
                Field::make('color', 'footer_secondary_color', 'Footer secondary color')
            )
        )
        ->add_tab('Products menu', [
            Field::make('complex', 'footer_products_menu', 'Products menu')
                ->add_fields(array(
                        Field::make('text', 'item_text', 'Menu item text'),
                        Field::make('text', 'item_desc', 'Menu item description'),
                        Field::make('text', 'item_link', 'Menu item link'),
                    )
                ),
        ])
        ->add_tab('Social menu', [
            Field::make('complex', 'footer_social_menu', 'Social menu')
                ->add_fields(array(
                    Field::make('image', 'item_image', 'Menu item icon(svg)')
                        ->set_type(array('image'))
                        ->set_value_type('url'),
                    Field::make('text', 'item_link', 'Menu item link'),
                )),
        ])
        ->add_tab('Contacts', [
                Field::make('text', 'footer_contacts_menu_mobile_title', 'Contacts menu mobile title'),
                Field::make('complex', 'footer_contacts', 'Contacts')
                    ->add_fields(array(
                            Field::make('image', 'icon', 'Icon')->set_value_type('url'),
                            Field::make('text', 'city', 'City'),
                            Field::make('text', 'address', 'Address'),
                            Field::make('text', 'phone', 'Phone'),
                            Field::make('text', 'email', 'Email'),
                        )
                    ),
            ]
        );


    Container::make('post_meta', 'post_bg_color', 'Цвет кнопки и hover')
        ->where('post_type', '=', 'page')
        ->set_context('side')
        ->add_fields(array(
                Field::make('text', 'btn_unique_text', 'Button text'),
                Field::make('text', 'post_bg_color_color', 'Button color'),
                Field::make('text', 'post_bg_color_color_hover', 'Button:hover color'),
                Field::make('color', 'post_bg_color_text', 'Button text color'),
                Field::make('color', 'post_bg_color_text_hover', 'Button:hover text color'),
                Field::make('color', 'post_bg_border_color', 'Button border color'),
                Field::make('color', 'post_bg_border_color_hover', 'Button:hover border color'),
                Field::make('text', 'post_bg_border_width', 'Button border width (0px or 1px)'),
            )
        );

    Block::make('Hero section')
        ->set_category('layout')
        ->add_fields(array(
            Field::make('checkbox', 'hero_rounded_top_borders', 'Rounded top borders'),
            Field::make('radio', 'hero_type', 'Hero type')
                ->set_options(array(
                    'default' => 'Default',
                    'big-hero' => 'Big hero',
                    'with-form' => 'With form',
                    'bg-slider-gallery' => 'Background gallery',
                    'slider' => 'Slider',
                ))->set_default_value('default'),
            Field::make('radio', 'hero_background_color', 'Background type')
                ->set_options(array(
                    'color' => 'Color',
                    'gradient' => 'Gradient',
                    'image' => 'Image',
                ))->set_default_value('color'),
            Field::make('color', 'hero_background_background_color', 'Background color'),
            Field::make('text', 'hero_background_background_gradient', 'Gradient css rule'),
            Field::make('image', 'hero_background_background_image', 'Background image')->set_value_type('url'),
            Field::make('image', 'hero_background_background_image_mobile', 'Background image mobile')->set_value_type('url'),
            Field::make('image', 'hero_pre_title_icon', 'Hero pre title icon')->set_value_type('url'),
            Field::make('image', 'hero_pre_title_dop1_icon', 'Pre title dop 1 icon')->set_value_type('url'),
            Field::make('text', 'hero_pre_title_dop1', 'Pre title dop 1'),
            Field::make('color', 'hero_pre_title_dop1_color', 'Pre title dop 1 color'),
            Field::make('text', 'hero_pre_title', 'Pre title'),
            Field::make('color', 'hero_pre_title_color', 'Pre title color'),
            Field::make('text', 'hero_title', 'title'),
            Field::make('color', 'hero_title_color', 'Title color'),
            Field::make('text', 'hero_desc', 'Description'),
            Field::make('color', 'hero_desc_color', 'Description color'),
            Field::make('text', 'hero_btn_text', 'Hero button text')
                ->set_conditional_logic(array(
                    'relation' => 'AND',
                    array(
                        'field' => 'hero_type',
                        'value' => 'with-form',
                        'compare' => '!=',
                    )
                )),
            Field::make('text', 'hero_btn_link', 'Hero button link')
                ->set_conditional_logic(array(
                    'relation' => 'AND',
                    array(
                        'field' => 'hero_type',
                        'value' => 'with-form',
                        'compare' => '!=',
                    )
                )),
            Field::make('color', 'hero_btn_text_color', 'Hero button text color')
                ->set_conditional_logic(array(
                    'relation' => 'AND',
                    array(
                        'field' => 'hero_type',
                        'value' => 'with-form',
                        'compare' => '!=',
                    )
                )),
            Field::make('color', 'hero_btn_border_color', 'Hero button border color')
                ->set_conditional_logic(array(
                    'relation' => 'AND',
                    array(
                        'field' => 'hero_type',
                        'value' => 'with-form',
                        'compare' => '!=',
                    )
                )),
            Field::make('color', 'hero_btn_background_color', 'Hero button background color')
                ->set_conditional_logic(array(
                    'relation' => 'AND',
                    array(
                        'field' => 'hero_type',
                        'value' => 'with-form',
                        'compare' => '!=',
                    )
                )),
            Field::make('select', 'invert_btn', 'Button style')
                ->set_options(array(
                    'normal' => 'Normal (white to black)',
                    'invert' => 'Invert (black to white)'
                ))
                ->set_conditional_logic(array(
                    'relation' => 'AND',
                    array(
                        'field' => 'hero_type',
                        'value' => 'with-form',
                        'compare' => '!=',
                    )
                )),
            Field::make('text', 'hero_btn_2_text', 'Hero button 2 text')
                ->set_conditional_logic(array(
                    'relation' => 'AND',
                    array(
                        'field' => 'hero_type',
                        'value' => 'with-form',
                        'compare' => '!=',
                    )
                )),
            Field::make('text', 'hero_btn_2_link', 'Hero button 2 link')
                ->set_conditional_logic(array(
                    'relation' => 'AND',
                    array(
                        'field' => 'hero_type',
                        'value' => 'with-form',
                        'compare' => '!=',
                    )
                )),
            Field::make('color', 'hero_btn_2_text_color', 'Hero button 2 text color')
                ->set_conditional_logic(array(
                    'relation' => 'AND',
                    array(
                        'field' => 'hero_type',
                        'value' => 'with-form',
                        'compare' => '!=',
                    )
                )),
            Field::make('color', 'hero_btn_2_border_color', 'Hero button 2 border color')
                ->set_conditional_logic(array(
                    'relation' => 'AND',
                    array(
                        'field' => 'hero_type',
                        'value' => 'with-form',
                        'compare' => '!=',
                    )
                )),
            Field::make('color', 'hero_btn_2_background_color', 'Hero button 2 background color')
                ->set_conditional_logic(array(
                    'relation' => 'AND',
                    array(
                        'field' => 'hero_type',
                        'value' => 'with-form',
                        'compare' => '!=',
                    )
                )),
            Field::make('select', 'invert_btn_2', 'Button style')
                ->set_conditional_logic(array(
                    'relation' => 'AND',
                    array(
                        'field' => 'hero_type',
                        'value' => 'with-form',
                        'compare' => '!=',
                    )
                ))
                ->set_options(array(
                    'normal' => 'Normal (white to black)',
                    'invert' => 'Invert (black to white)'
                )),

            Field::make('text', 'hero_contact_form_first_name', 'First name placeholder')
                ->set_conditional_logic(array(
                    'relation' => 'AND',
                    array(
                        'field' => 'hero_type',
                        'value' => 'with-form',
                        'compare' => '=',
                    )
                )),
            Field::make('text', 'hero_contact_form_email', 'Email placeholder')
                ->set_conditional_logic(array(
                    'relation' => 'AND',
                    array(
                        'field' => 'hero_type',
                        'value' => 'with-form',
                        'compare' => '=',
                    )
                )),
            Field::make('text', 'hero_contact_form_company_name', 'Company name placeholder')
                ->set_conditional_logic(array(
                    'relation' => 'AND',
                    array(
                        'field' => 'hero_type',
                        'value' => 'with-form',
                        'compare' => '=',
                    )
                )),
            Field::make('text', 'hero_contact_form_select', 'Select placeholder')
                ->set_conditional_logic(array(
                    'relation' => 'AND',
                    array(
                        'field' => 'hero_type',
                        'value' => 'with-form',
                        'compare' => '=',
                    )
                )),
            Field::make('complex', 'hero_contact_form_select_options', 'Select options')
                ->set_conditional_logic(array(
                    'relation' => 'AND',
                    array(
                        'field' => 'hero_type',
                        'value' => 'with-form',
                        'compare' => '=',
                    )
                ))
                ->add_fields(array(
                    Field::make('text', 'id', 'ID'),
                    Field::make('text', 'title', 'Title'),
                )),
            Field::make('text', 'hero_contact_form_privacy_policy', 'Privacy Policy text')
                ->set_conditional_logic(array(
                    'relation' => 'AND',
                    array(
                        'field' => 'hero_type',
                        'value' => 'with-form',
                        'compare' => '=',
                    )
                )),
            Field::make('text', 'hero_contact_form_button_text', 'Button text')
                ->set_conditional_logic(array(
                    'relation' => 'AND',
                    array(
                        'field' => 'hero_type',
                        'value' => 'with-form',
                        'compare' => '=',
                    )
                )),
            Field::make('text', 'hero_contact_form_wait_msg', 'Wait message')
                ->set_conditional_logic(array(
                    'relation' => 'AND',
                    array(
                        'field' => 'hero_type',
                        'value' => 'with-form',
                        'compare' => '=',
                    )
                )),
            Field::make('text', 'hero_contact_form_success_msg', 'Form success submit message')
                ->set_conditional_logic(array(
                    'relation' => 'AND',
                    array(
                        'field' => 'hero_type',
                        'value' => 'with-form',
                        'compare' => '=',
                    )
                )),
            Field::make('text', 'hero_contact_form_error_msg', 'Form error submit message')
                ->set_conditional_logic(array(
                    'relation' => 'AND',
                    array(
                        'field' => 'hero_type',
                        'value' => 'with-form',
                        'compare' => '=',
                    )
                )),
            Field::make('checkbox', 'hero_slider_after_title', 'Slider after title'),
            Field::make('complex', 'hero_slider', 'Slider')
                ->set_conditional_logic(array(
                    'relation' => 'AND',
                    array(
                        'field' => 'hero_type',
                        'value' => 'with-form',
                        'compare' => '!=',
                    )
                ))
                ->add_fields(array(
                    field::make('select', 'hero_slide_type', 'Slide type')->set_options(array('image' => 'image', 'video' => 'video',)),
                    Field::make('image', 'image', 'Image')
                        ->set_type(array('image', 'video'))
                        ->set_value_type('url')
                )),
            Field::make('complex', 'hero_count', 'Count')
                ->add_fields(array(
                        Field::make('text', 'count_title', 'Title'),
                        Field::make('text', 'count_description', 'Description')
                    )
                )
        ))
        ->set_render_callback(function ($fields, $attributes, $inner_blocks) {

            if (!empty($fields['hero_rounded_top_borders'])) {
                $bodered_class = 'site-hero--bordered site-hero--normal-padding';
            }

            $background_type_hero = $fields['hero_background_color'];
            if ($background_type_hero == 'color') {
                $background_hero = $fields['hero_background_background_color'];
            }
            if ($background_type_hero == 'gradient') {
                $background_hero = $fields['hero_background_background_gradient'];
            }
            if ($background_type_hero == 'image') {
                $background_hero = '#FFF';
                $background_hero_image = $fields['hero_background_background_image'];
                $background_hero_image_mobile = $fields['hero_background_background_image_mobile'];
            }
            if (!empty($fields['hero_btn_link'])) {
                $hero_link = $fields['hero_btn_link'];
                $hero_link_popup = '';
                if (parse_url($fields['hero_btn_link'])['scheme'] == 'https') {
                    $hero_link_target = '_blank';
                } else {
                    $hero_link_target = '_self';
                }
            } else {
                $hero_link = '#';
                $hero_link_target = '_self';
                $hero_link_popup = 'data-fancybox data-src="#request-modal"';
            }
            $btn_2_bg = $fields['hero_btn_2_background_color'];
            if (empty($btn_2_bg)) {
                $btn_2_bg = 'transparent';
            }
            $hero_id = 'hero-' . wp_unique_id();
            ?>
            <? if ($background_type_hero == 'image'): ?>
                <style>
                    .contact-form-block_policy {
                        color: <?= esc_html( $fields['hero_desc_color'])  ?>;
                    }

                    .contact-form-block_policy a {
                        color: <?= esc_html( $fields['hero_desc_color'])  ?>;
                        text-decoration: underline;
                    }

                    #<?= $hero_id ?>{
                    background-image: linear-gradient(rgba(0, 0, 0, 0.3), rgba(0, 0, 0, 0.3)), url('<?= $background_hero_image ?>');
                    background-position: center center;
                    background-size: cover;
                    background-repeat: no-repeat;
                }

                    @media screen and (max-width: 720px) {
                        # <?= $hero_id ?> {
                        background-image: linear-gradient(rgba(0, 0, 0, 0.3), rgba(0, 0, 0, 0.3)), url(' <?= $background_hero_image_mobile ?> ');
                        background-position: center center;
                        background-size: cover;
                        background-repeat: no-repeat;
                    }
                    }
                </style>
            <? endif; ?>
            <? if ($fields['hero_type'] == 'with-form'): ?>
                <style>
                    .contact-form-block_policy {
                        color: <?= esc_html( $fields['hero_desc_color'])  ?>;
                    }

                    .contact-form-block_policy a {
                        color: <?= esc_html( $fields['hero_desc_color'])  ?>;
                        text-decoration: underline;
                    }
                </style>
            <? endif; ?>
            <? if ($background_type_hero == 'color'): ?>
                <style>
                    #<?= $hero_id ?>{background:<?= $background_hero ?> !important}
                </style>
            <? endif; ?>
            <? if ($background_type_hero == 'gradient'): ?>
                <style>
                    #<?= $hero_id ?>{background:<?= $background_hero ?> !important}
                </style>
            <? endif; ?>
            <section id="<?= $hero_id ?>" class="site-hero <?= $bodered_class ?> banner__hero">
                <? if ($fields['hero_type'] != 'with-form'): ?>
                    <div class="container">

                        <? if (empty($fields['hero_slider_after_title'])): ?>
                            <? if (!empty($fields['hero_pre_title_icon'])): ?>
                                <img class="site-section__pre-title-img" src="<?= $fields['hero_pre_title_icon'] ?>">
                            <? endif; ?>
                            <? if (!empty($fields['hero_pre_title_dop1'])): ?>
                                <div style="color:<?= esc_html($fields['hero_pre_title_dop1_color']) ?>"
                                     class="site-hero__title_dop1"><img style="margin-right: 15px"
                                                                        src="<?= $fields['hero_pre_title_dop1_icon'] ?>"
                                                                        alt=""><?= esc_html($fields['hero_pre_title_dop1']) ?>
                                </div>
                            <? endif; ?>
                            <h1 class="site-hero__title" style="color:<?= esc_html($fields['hero_title_color']) ?>">
                                <span style="color:<?= esc_html($fields['hero_pre_title_color']) ?>"
                                      class="site-hero__pre-title"><?= $fields['hero_pre_title'] ?></span><br><?= $fields['hero_title'] ?>
                            </h1>
                            <div style="color:<?= esc_html($fields['hero_desc_color']) ?>"
                                 class="site-hero__desc"><?= esc_html($fields['hero_desc']) ?></div>
                            <div class="site-hero__btns">
                                <? if (!empty($fields['hero_btn_text'])): ?>
                                    <a
                                        <?= $hero_link_popup ?>
                                            target="<?= $hero_link_target ?>"
                                            href="<?= $hero_link . get_params_string() ?>"
                                            class="site-btn site-hero__btn btn-<?= $fields['invert_btn']; ?>"
                                            style="color: <?= $fields['hero_btn_text_color'] ?>; border: 1px solid <?= $fields['hero_btn_border_color'] ?>; background: <?= $fields['hero_btn_background_color'] ?>;"
                                    ><?= esc_html($fields['hero_btn_text']) ?></a>
                                <? endif; ?>
                                <? if (!empty($fields['hero_btn_2_link']) and !empty($fields['hero_btn_2_text'])): ?>
                                    <a target="_blank"
                                       href="<?= $fields['hero_btn_2_link'] . get_params_string() ?>"
                                       class="site-btn site-hero__btn btn-<?= $fields['invert_btn_2']; ?>"
                                       style="color: <?= $fields['hero_btn_2_text_color'] ?>; border: 1px solid <?= $fields['hero_btn_2_border_color'] ?>; background: <?= $btn_2_bg ?>;"
                                    ><?= esc_html($fields['hero_btn_2_text']) ?></a>
                                <? endif; ?>
                            </div>

                            <? if (!empty($fields['hero_slider'])): ?>
                                <div class="swiper-container site-hero__slider">
                                    <div class="swiper-wrapper">
                                        <? foreach ($fields['hero_slider'] as $slide): ?>
                                            <?
                                            $hero_slide_type = $slide['hero_slide_type'];
                                            $hero_slide_img = $slide['image'];
                                            ?>
                                            <div class="swiper-slide site-hero__slide">
                                                <?
                                                if ($hero_slide_type == 'image' and !empty($hero_slide_img)) {
                                                    $slide_image = ImageResizeWordPress::resizeWidthWebp($hero_slide_img, 1450)
                                                    ?>
                                                    <img width="1050" height="700" alt="img" class="h__img"
                                                         src="<?= $slide_image ?>">
                                                    <?
                                                    $image_resize_url = ImageResizeWordPress::resizeWidthWebp($hero_slide_img, 768);
                                                    ?>
                                                    <img width="768" height="400" alt="img" class="h__img h__img_mobile"
                                                         src="<?= $image_resize_url ?>">
                                                    <?
                                                }
                                                if ($hero_slide_type == 'video' and !empty($hero_slide_img)) {
                                                    ?>
                                                    <video autoplay loop muted playsinline class="hero-video">
                                                        <source src="<?= $hero_slide_img ?>" type="video/mp4">
                                                    </video>
                                                    <?
                                                }
                                                ?>
                                            </div>
                                        <? endforeach; ?>
                                    </div>
                                    <div class="swiper-pagination site-hero__slider-pagination"></div>
                                </div>
                            <? endif; ?>
                        <? else: ?>
                            <? if (!empty($fields['hero_pre_title_icon'])): ?>
                                <img class="site-section__pre-title-img" src="<?= $fields['hero_pre_title_icon'] ?>">
                            <? endif; ?>
                            <? if (!empty($fields['hero_pre_title_dop1'])): ?>
                                <div style="color:<?= esc_html($fields['hero_pre_title_dop1_color']) ?>"
                                     class="site-hero__title_dop1"><img style="margin-right: 15px"
                                                                        src="<?= $fields['hero_pre_title_dop1_icon'] ?>"
                                                                        alt=""><?= esc_html($fields['hero_pre_title_dop1']) ?>
                                </div>
                            <? endif; ?>
                            <h1 class="site-hero__title" style="color:<?= esc_html($fields['hero_title_color']) ?>">
                                <span style="color:<?= esc_html($fields['hero_pre_title_color']) ?>"
                                      class="site-hero__pre-title"><?= $fields['hero_pre_title'] ?></span><br><?= $fields['hero_title'] ?>
                            </h1>
                            <? if (!empty($fields['hero_slider'])): ?>
                                <div class="swiper-container site-hero__slider">
                                    <div class="swiper-wrapper">
                                        <? foreach ($fields['hero_slider'] as $slide): ?>
                                            <?
                                            $hero_slide_type = $slide['hero_slide_type'];
                                            $hero_slide_img = $slide['image'];
                                            ?>
                                            <div class="swiper-slide site-hero__slide">
                                                <?
                                                if ($hero_slide_type == 'image' and !empty($hero_slide_img)) {
                                                    $slide_image = ImageResizeWordPress::resizeWidthWebp($hero_slide_img, 1450)
                                                    ?>
                                                    <img width="1050" height="700" alt="img" class="h__img"
                                                         src="<?= $slide_image ?>">
                                                    <?
                                                    $image_resize_url = ImageResizeWordPress::resizeWidthWebp($hero_slide_img, 768);
                                                    ?>
                                                    <img width="768" height="400" alt="img" class="h__img h__img_mobile"
                                                         src="<?= $image_resize_url ?>">
                                                    <?
                                                }
                                                if ($hero_slide_type == 'video' and !empty($hero_slide_img)) {
                                                    ?>
                                                    <video autoplay loop muted playsinline class="hero-video">
                                                        <source src="<?= $hero_slide_img ?>" type="video/mp4">
                                                    </video>
                                                    <?
                                                }
                                                ?>
                                            </div>
                                        <? endforeach; ?>
                                    </div>
                                    <div class="swiper-pagination site-hero__slider-pagination"></div>
                                </div>
                            <? endif; ?>
                            <div style="color:<?= esc_html($fields['hero_desc_color']) ?>"
                                 class="site-hero__desc"><?= esc_html($fields['hero_desc']) ?></div>
                            <div class="site-hero__btns">
                                <? if (!empty($fields['hero_btn_text'])): ?>
                                    <a
                                        <?= $hero_link_popup ?>
                                            target="<?= $hero_link_target ?>"
                                            href="<?= $hero_link . get_params_string() ?>"
                                            class="site-btn site-hero__btn btn-<?= $fields['invert_btn']; ?>"
                                            style="color: <?= $fields['hero_btn_text_color'] ?>; border: 1px solid <?= $fields['hero_btn_border_color'] ?>; background: <?= $fields['hero_btn_background_color'] ?>;"
                                    ><?= esc_html($fields['hero_btn_text']) ?></a>
                                <? endif; ?>
                                <? if (!empty($fields['hero_btn_2_link']) and !empty($fields['hero_btn_2_text'])): ?>
                                    <a target="_blank"
                                       href="<?= $fields['hero_btn_2_link'] . get_params_string() ?>"
                                       class="site-btn site-hero__btn btn-<?= $fields['invert_btn_2']; ?>"
                                       style="color: <?= $fields['hero_btn_2_text_color'] ?>; border: 1px solid <?= $fields['hero_btn_2_border_color'] ?>; background: <?= $btn_2_bg ?>;"
                                    ><?= esc_html($fields['hero_btn_2_text']) ?></a>
                                <? endif; ?>
                            </div>

                        <? endif; ?>
                    </div>
                    <div class="container no--padding">
                        <? if (!empty($fields['hero_count'])): ?>
                            <div class="swiper-container site-count__slider">
                                <div class="swiper-wrapper">
                                    <? foreach ($fields['hero_count'] as $slide): ?>
                                        <div class="swiper-slide site-count__slide">
                                            <strong><?= $slide['count_title'] ?></strong>
                                            <p><?= $slide['count_description'] ?></p>
                                        </div>
                                    <? endforeach; ?>
                                </div>
                                <div class="swiper-pagination site-count__slider-pagination"></div>
                            </div>
                        <? endif; ?>
                    </div>
                <? endif; ?>
                <? if ($fields['hero_type'] == 'with-form'): ?>
                    <div class="container">
                        <div class="hero__sides-wrapper">
                            <div class="hero__left-side">
                                <? if (empty($fields['hero_slider_after_title'])): ?>
                                    <? if (!empty($fields['hero_pre_title_dop1'])): ?>
                                        <div style="color:<?= esc_html($fields['hero_pre_title_dop1_color']) ?>"
                                             class="site-hero__title_dop1"><img style="margin-right: 15px"
                                                                                src="<?= $fields['hero_pre_title_dop1_icon'] ?>"
                                                                                alt=""><?= esc_html($fields['hero_pre_title_dop1']) ?>
                                        </div>
                                    <? endif; ?>
                                <? endif; ?>
                                <h1 class="site-hero__title" style="color:<?= esc_html($fields['hero_title_color']) ?>">
                                    <span style="color:<?= esc_html($fields['hero_pre_title_color']) ?>"
                                          class="site-hero__pre-title"><?= $fields['hero_pre_title'] ?></span><br><?= $fields['hero_title'] ?>
                                </h1>
                                <div class="speakers-info">
                                    <img width="70" height="70" class="speakers-info__img"
                                         src="http://korove3w.beget.tech/wp-content/uploads/2023/06/speaker-photo.png"
                                         alt="">
                                    <img width="70" height="70" class="speakers-info__img"
                                         src="http://korove3w.beget.tech/wp-content/uploads/2023/06/speaker-photo.png"
                                         alt="">
                                    <img width="70" height="70" class="speakers-info__img"
                                         src="http://korove3w.beget.tech/wp-content/uploads/2023/06/speaker-photo.png"
                                         alt="">
                                    <div class="speakers-info__blank-card">
                                        <svg width="20" height="20" viewBox="0 0 50 50" fill="none"
                                             xmlns="http://www.w3.org/2000/svg">
                                            <rect x="23.2227" y="49.8889" width="49.7778" height="3.55556" rx="1.77778"
                                                  transform="rotate(-90 23.2227 49.8889)" fill="#151516"></rect>
                                            <rect x="0.111328" y="23.2222" width="49.7778" height="3.55556" rx="1.77778"
                                                  fill="#151516"></rect>
                                        </svg>
                                    </div>
                                </div>
                                <div style="color:<?= esc_html($fields['hero_desc_color']) ?>"
                                     class="site-hero__desc"><?= esc_html($fields['hero_desc']) ?></div>
                            </div>
                            <div class="hero__right-side">
                                <form data-succsess-text="<?= $contact_form_success_msg3 ?>"
                                      data-error-text="<?= $contact_form_error_msg3 ?>"
                                      class="contact-form-block__form gform">
                                    <div class="contact-form-block__full-width">
                                        <input type="text" name="first-name"
                                               placeholder="<?= $fields['hero_contact_form_first_name'] ?>"
                                               pattern="[^0-9]+" required autocomplete="off">
                                        <input type="email" name="email"
                                               placeholder="<?= $fields['hero_contact_form_email'] ?>" required
                                               autocomplete="off">
                                        <input type="tel" class="phone" name="phone" required autocomplete="off">
                                        <input type="text" name="company-name"
                                               placeholder="<?= $fields['hero_contact_form_company_name'] ?>" required
                                               autocomplete="off">
                                        <? if (!empty($fields['hero_contact_form_select_options'])): ?>
                                            <select name="type" required>
                                                <option disabled
                                                        selected><?= $fields['hero_contact_form_select'] ?></option>
                                                <? foreach ($fields['hero_contact_form_select_options'] as $option): ?>
                                                    <option value="<?= $option['id'] ?>"><?= $option['title'] ?></option>
                                                <? endforeach ?>
                                            </select>
                                        <? endif; ?>
                                        <input type="hidden" name="section" value="contact-form">
                                        <input type="hidden" name="site" value="24orm">
                                        <input type="hidden" name="lead-name" value="24orm | 24ttl">
                                        <input type="hidden" name="utm_capmaign" value="<?= $_GET['utm_capmaign'] ?>">
                                        <input type="hidden" name="utm_medium" value="<?= $_GET['utm_medium'] ?>">
                                        <input type="hidden" name="utm_source" value="<?= $_GET['utm_source'] ?>">
                                        <input type="hidden" name="utm_content" value="<?= $_GET['utm_content'] ?>">


                                        <input type="hidden" name="utm_term" value="<?= $_GET['utm_term'] ?>">
                                        <input type="hidden" name="type-request" value="Заявка">
                                        <input type="hidden" name="action" value="contact_form">
                                    </div>
                                    <div class="contact-form-block_policy" id="form1_checkbox"><input
                                                class="contact-form-block_policy_checkbox" type="checkbox"
                                                checked="checked" name="form_checkbox"
                                                aria-labelledby="form1_checkbox"><?= $fields['hero_contact_form_privacy_policy'] ?>
                                    </div>
                                    <button class="site-btn contact-form-block__form-btn <?= $GLOBALS['btn_post_class_random'] ?>"
                                            type="submit"><?= $fields['hero_contact_form_button_text'] ?></button>
                                    <div class="contact-form-block__form-status"></div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="container no--padding">
                        <? if (!empty($fields['hero_count'])): ?>
                            <div class="swiper-container site-count__slider">
                                <div class="swiper-wrapper">
                                    <? foreach ($fields['hero_count'] as $slide): ?>
                                        <div class="swiper-slide site-count__slide">
                                            <strong><?= $slide['count_title'] ?></strong>
                                            <p><?= $slide['count_description'] ?></p>
                                        </div>
                                    <? endforeach; ?>
                                </div>
                                <div class="swiper-pagination site-count__slider-pagination"></div>
                            </div>
                        <? endif; ?>
                    </div>
                <? endif; ?>
            </section>
            <?php
        });
    // 24 upload section
    Block::make('ai upload section')
        ->set_category('layout')
        ->add_fields(array(
            Field::make('checkbox', 'upload_hero_rounded_top_borders', 'Rounded top borders'),
            Field::make('radio', 'upload_hero_background_color', 'Background type')
                ->set_options(array(
                    'color' => 'Color',
                    'gradient' => 'Gradient',
                    'image' => 'Image',
                ))->set_default_value('color'),
            Field::make('color', 'upload_hero_background_background_color', 'Background color'),
            Field::make('text', 'upload_hero_background_background_gradient', 'Gradient css rule'),
            Field::make('image', 'upload_hero_background_background_image', 'Background image')->set_value_type('url'),
            Field::make('image', 'upload_hero_background_background_image_mobile', 'Background image mobile')->set_value_type('url'),
            Field::make('text', 'upload_hero_title', 'title'),
            Field::make('color', 'upload_hero_title_color', 'Title color'),
            Field::make('image', 'upload_hero_image', 'Image'),
            Field::make('text', 'upload_hero_desc', 'Description'),
            Field::make('color', 'upload_hero_desc_color', 'Description color'),
            /*		    Field::make( 'text', 'upload_hero_btn_text', 'Button text' ),
		    Field::make( 'text', 'upload_hero_btn_link', 'Button link' ),
		    Field::make( 'color', 'upload_hero_btn_text_color', 'Button text color' ),
		    Field::make( 'color', 'upload_hero_btn_bg_color', 'Button background color' ),
		    Field::make( 'color', 'upload_hero_btn_border_color', 'Button border color' ),
		    Field::make( 'color', 'upload_hero_btn_hover_text_color', 'Hover button text color' ),
		    Field::make( 'color', 'upload_hero_btn_hover_bg_color', 'Hover button background color' ),
		    Field::make( 'color', 'upload_hero_btn_hover_border_color', 'Hover button border color' ),
		    Field::make( 'color', 'upload_hero_upload_block_text_color', 'Upload block text color' ),
		    Field::make( 'text', 'upload_hero_upload_block_text', 'Upload block text' ),
            Field::make( 'complex', 'upload_hero_formats', 'Supported formats' )
                ->add_fields( array(
                    Field::make( 'text', 'title', 'Title' ),
                ) ), */
            Field::make('text', 'upload_hero_examples_text', 'Description of examples images'),
            Field::make('color', 'upload_hero_examples_text_color', 'Description of examples images color'),
            Field::make('complex', 'upload_hero_examples', 'Examples')
                ->add_fields(array(
                    Field::make('image', 'image', 'Image'),
                )),
            Field::make('text', 'upload_hero_privacy_text', 'Privacy text'),
            Field::make('color', 'upload_hero_privacy_text_color', 'Privacy text color'),
            Field::make('select', 'current_service', 'Current Service')
                ->add_options(array(
                    'create_background' => 'create background',
                    'upscale' => 'upscale',
                    'remove_background' => 'remove background',
                    'inpaint' => 'inpaint',
                    'outpaint' => 'outpaint',
                    'watermarks' => 'watermarks',
                    'shadow' => 'shadow',
                    'infographics' => 'infographics',
                )),
            Field::make('select', 'lang', 'Language')
                ->add_options(array(
                    'ru' => 'Russian',
                    'en' => 'English',
                    'es' => 'Espanol',
                    'ar' => 'Arabic',
                    'kr' => 'Korean',
                )),
        ))
        ->set_render_callback(function ($fields, $attributes, $inner_blocks) {

            if (!empty($fields['upload_hero_rounded_top_borders'])) {
                $bodered_class = 'site-hero--bordered site-hero--normal-padding';
            }

            $background_type_hero = $fields['upload_hero_background_color'];
            if ($background_type_hero == 'color') {
                $background_hero = $fields['upload_hero_background_background_color'];
            }
            if ($background_type_hero == 'gradient') {
                $background_hero = $fields['upload_hero_background_background_gradient'];
            }
            if ($background_type_hero == 'image') {
                $background_hero = '#FFF';
                $background_hero_image = $fields['upload_hero_background_background_image'];
                $background_hero_image_mobile = $fields['upload_hero_background_background_image_mobile'];
            }
            $hero_id = 'hero-' . wp_unique_id();
            $upload_hero_image = $fields['upload_hero_image'];
            $upload_hero_desc = $fields['upload_hero_desc'];
            $upload_hero_btn_text = $fields['upload_hero_btn_text'];
            $upload_hero_btn_link = $fields['upload_hero_btn_link'];
            $upload_hero_upload_block_text = $fields['upload_hero_upload_block_text'];
            $upload_hero_upload_block_formats_text = $fields['upload_hero_upload_block_formats_text'];
            $upload_hero_formats = $fields['upload_hero_formats'];
            $upload_hero_examples_text = $fields['upload_hero_examples_text'];
            $upload_hero_examples = $fields['upload_hero_examples'];
            $upload_hero_privacy_text = $fields['upload_hero_privacy_text'];
            ?>
            <? if ($background_type_hero == 'image'): ?>
                <style>
                    #<?= $hero_id ?>{
                background-image: linear-gradient(rgba(0, 0, 0, 0.3), rgba(0, 0, 0, 0.3)), url('<?= $background_hero_image ?>');
                background-position: center center;
                background-size: cover;
                background-repeat: no-repeat;
            }

                    @media screen and (max-width: 720px) {
                        # <?= $hero_id ?> {
                    background-image: linear-gradient(rgba(0, 0, 0, 0.3), rgba(0, 0, 0, 0.3)), url(' <?= $background_hero_image_mobile ?> ');
                    background-position: center center;
                    background-size: cover;
                    background-repeat: no-repeat;
                }
                    }
                </style>
            <? endif; ?>
            <? if ($background_type_hero == 'color'): ?>
                <style>
                    #<?= $hero_id ?>{background:<?= $background_hero ?> !important}
                </style>
            <? endif; ?>
            <? if ($background_type_hero == 'gradient'): ?>
                <style>
                    #<?= $hero_id ?>{background:<?= $background_hero ?> !important}
                </style>
            <? endif; ?>

            <section id="<?= $hero_id ?>" class="site-hero <?= $bodered_class ?> banner__hero site-hero--upload">
                <div class="container">
                    <div class="tools-breadcrumb"><?php if (function_exists('the_breadcrumb')) the_breadcrumb(); ?></div>
                    <script>

                      // Select all <span> elements that are children of an element with the ID 'crumbs'
                      var spanElements = document.querySelectorAll('#crumbs > span');

                      // Loop through each <span> element and remove the first 5 characters from its class attribute
                      spanElements.forEach(function (span) {
                        var currentClass = span.className;
                        if (currentClass.length > 5) {
                          span.className = currentClass.substring(5);
                        } else {
                          span.className = '';
                        }
                      });


                    </script>
                    <h1 class="site-hero__title"
                        style="color:<?= esc_html($fields['upload_hero_title_color']) ?>"><?= $fields['upload_hero_title'] ?></h1>
                    <div class="hero__sides-wrapper hero__sides-wrapper--upload-hero">
                        <div class="hero__left-side">
                            <? if (!empty($upload_hero_desc)): ?>
                                <div class="upload-hero-desc upload-hero-desc--mobile"><?= $upload_hero_desc ?></div>
                            <? endif; ?>
                            <? if (!empty($upload_hero_image)): ?>
                                <a href="<?= $upload_hero_btn_link ?>"><img
                                            src="<?= wp_get_attachment_image_url($upload_hero_image, 'full') ?>"
                                            alt="<?php echo $imgAlt ?>"></a>
                            <? endif; ?>

                        </div>
                        <div class="hero__right-side">
                            <div
                                <? if (!empty($id)): ?>
                                    id="<?= $id ?>"
                                <? endif; ?>
                                    class="block <?= $margin_mode ?> widget-block">

                                <div class="widget" style="height: 500px; display: flex;"></div>
                                <script>
                                  window.AI_WIDGET_SETTINGS = {
                                    currentService: '<?php echo $fields['current_service']?>',
                                    lang: '<?php echo $fields['lang']?>',
                                    el: '.widget'
                                  };

                                  document.addEventListener('DOMContentLoaded', function () {
                                    // Delay execution for 2 seconds
                                    setTimeout(function () {
                                      let loaded = false;

                                      function loadScript() {
                                        if (!loaded) {
                                          loaded = true;
                                          var script = document.createElement('script');
                                          script.src = "https://internal.24ai.tech/js/app.js";
                                          document.body.appendChild(script);
                                        }
                                      }

                                      // Add event listeners after 2-second delay
                                      document.addEventListener('mousemove', function onMouseMove() {
                                        loadScript();
                                        document.removeEventListener('mousemove', onMouseMove);
                                      });

                                      document.addEventListener('scroll', function onScroll() {
                                        loadScript();
                                        document.removeEventListener('scroll', onScroll);
                                      });

                                    }, 2000); // 2 seconds delay
                                  });
                                </script>
                            </div>


                        </div>
                    </div>
                    <div class="hero__sides-wrapper hero__sides-wrapper--upload-hero hero__sides-wrapper--no-margin">
                        <div class="hero__left-side-desc">
                            <? if (!empty($upload_hero_desc)): ?>
                                <div class="upload-hero-desc"><?= $upload_hero_desc ?></div>
                            <? endif; ?>
                        </div>
                        <div class="hero__right-side-desc">
                            <div class="hero-upload-examples">
                                <? if (!empty($upload_hero_examples_text)): ?>
                                    <div class="hero-upload-examples__text"><?= $upload_hero_examples_text ?></div>
                                <? endif; ?>
                                <? if (!empty($upload_hero_examples)): ?>
                                    <div class="hero-upload-examples__images">
                                        <? foreach ($upload_hero_examples as $example): ?>
                                            <a href="<?= $upload_hero_btn_link ?>"><img
                                                        src="<?= wp_get_attachment_image_url($example['image']) ?>"
                                                        alt=""></a>
                                        <? endforeach ?>
                                    </div>
                                <? endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <?php
        });
    //
    Block::make('Partners section')
        ->set_category('layout')
        ->add_fields(array(
            Field::make('complex', 'partners', 'Partners')
                ->set_collapsed(true)
                ->add_fields(array(
                    Field::make('image', 'logo', 'Partner logo')
                        ->set_type(array('image'))
                        ->set_value_type('url')
                ))
        ))
        ->set_render_callback(function ($fields, $attributes, $inner_blocks) {
            ?>
            <section class="site-section">
                <div class="block partners-logos-block">
                    <div class="partners-group">
                        <div class="item-wrap">
                            <? foreach ($fields['partners'] as $item): ?>
                                <div class="slide"><img alt="img" width="100" height="100" src="<?= $item['logo'] ?>">
                                </div>
                            <? endforeach; ?>
                        </div>
                    </div>
                </div>
            </section>
            <?php
        });
    Block::make('Site section')
        ->set_inner_blocks(true)
        ->set_inner_blocks_position('below')
        ->add_fields(array(
            Field::make('text', 'site_section_id', 'Section ID'),
            Field::make('checkbox', 'site_section_rounded_borders', 'Rounded borders'),
            Field::make('separator', 'site_section_separator_1', 'Section background settings'),
            Field::make('radio', 'site_section_bg_type', 'Background type')
                ->set_options(array(
                    'color' => 'Color',
                    'gradient' => 'Gradient',
                ))
                ->set_default_value('color'),
            Field::make('color', 'site_section_background_color', 'Background color')
                ->set_conditional_logic(array(
                    array(
                        'field' => 'site_section_bg_type',
                        'value' => 'color',
                        'compare' => '=',
                    ))),
            Field::make('text', 'site_section_background_gradient', 'Gradient css rule')
                ->set_conditional_logic(array(
                    array(
                        'field' => 'site_section_bg_type',
                        'value' => 'gradient',
                        'compare' => '=',
                    ))),
            Field::make('separator', 'site_section_separator_2', 'Section paddings settings'),
            Field::make('checkbox', 'site_section_no_side_padding', 'No side padding'),
            Field::make('select', 'site_section_padding', 'Padding mode')
                ->set_options(array(
                    'with-padding' => 'With padding',
                    'with-big-padding' => 'With big padding',
                    'no-padding' => 'No padding',
                    'no-padding-top' => 'No padding top',
                    'no-padding-bottom' => 'No padding bottom',
                    'big-padding-top' => 'Big padding top',
                    'big-padding-bottom' => 'Big padding bottom',

                )),
            Field::make('separator', 'site_section_separator_3', 'Section title settings'),
            Field::make('select', 'site_section_show_title', 'Show title?')
                ->set_options(array(
                    'no' => 'No',
                    'yes' => 'Yes',
                )),
            Field::make('select', 'site_section_title_type', 'Title type')
                ->set_options(array(
                    'numeric-with-left-icon' => 'Numeric, with left icon',
                    'with-icon-on-top' => 'With icon on top',
                    'without-icon' => 'without icon',
                ))
                ->set_conditional_logic(array(
                    array(
                        'field' => 'site_section_show_title',
                        'value' => 'yes',
                        'compare' => '=',
                    ))),
            Field::make('select', 'site_section_title_align', 'Title align')
                ->set_options(array(
                    'left' => 'left',
                    'centered' => 'center',
                ))
                ->set_conditional_logic(array(
                    array(
                        'field' => 'site_section_title_type',
                        'value' => 'without-icon',
                        'compare' => '=',
                    ))),
            Field::make('text', 'site_section_title_max_width', 'Max width (px)')
                ->set_conditional_logic(array(
                    array(
                        'field' => 'site_section_title_type',
                        'value' => 'without-icon',
                        'compare' => '=',
                    ))),
            Field::make('image', 'site_section_pre_title_img', 'Pre title image')
                ->set_type(array('image'))
                ->set_value_type('url')
                ->set_conditional_logic(array(
                    'relation' => 'AND',
                    array(
                        'field' => 'site_section_title_type',
                        'value' => 'with-icon-on-top',
                        'compare' => '=',
                    ),
                    array(
                        'field' => 'site_section_show_title',
                        'value' => 'yes',
                        'compare' => '=',
                    )
                )),
            Field::make('image', 'site_section_left_title_img', 'Left pre title image')
                ->set_type(array('image'))
                ->set_value_type('url')
                ->set_conditional_logic(array(
                    'relation' => 'AND',
                    array(
                        'field' => 'site_section_title_type',
                        'value' => 'numeric-with-left-icon',
                        'compare' => '=',
                    ),
                    array(
                        'field' => 'site_section_show_title',
                        'value' => 'yes',
                        'compare' => '=',
                    )
                )),

            Field::make('text', 'site_section_title', 'Title')
                ->set_conditional_logic(array(
                    array(
                        'field' => 'site_section_show_title',
                        'value' => 'yes',
                        'compare' => '=',
                    ))),
            Field::make('color', 'site_section_title_color', 'Title color')
                ->set_conditional_logic(array(
                    array(
                        'field' => 'site_section_show_title',
                        'value' => 'yes',
                        'compare' => '=',
                    ))),
            Field::make('separator', 'site_section_separator_4', 'Section description settings'),
            Field::make('select', 'site_section_show_desc', 'Show description?')
                ->set_options(array(
                    'no' => 'No',
                    'yes' => 'Yes',
                )),
            Field::make('textarea', 'site_section_desc', 'Description')
                ->set_conditional_logic(array(
                    array(
                        'field' => 'site_section_show_desc',
                        'value' => 'yes',
                        'compare' => '=',
                    ))),
            Field::make('color', 'site_section_desc_color', 'Description color')
                ->set_conditional_logic(array(
                    array(
                        'field' => 'site_section_show_desc',
                        'value' => 'yes',
                        'compare' => '=',
                    ))),
            Field::make('color', 'site_section_desc_accent_color', 'Description accent color')
                ->set_conditional_logic(array(
                    array(
                        'field' => 'site_section_show_desc',
                        'value' => 'yes',
                        'compare' => '=',
                    ))),
        ))
        ->set_render_callback(function ($fields, $attributes, $inner_blocks) {
            $id = $fields['site_section_id'];
            if (!empty($fields['site_section_rounded_borders'])) {
                $rounded_class = 'site-section--rounded';
            }
            $show_title = $fields['site_section_show_title'];
            $show_desc = $fields['site_section_show_desc'];
            $padding_mode = 'site-section--' . $fields['site_section_padding'];
            if ($fields['site_section_padding'] == 'with-big-padding') {
                $padding_mode = 'site-section--big-padding-top site-section--big-padding-bottom';
            }
            $no_side_padding = $fields['site_section_no_side_padding'];
            $background_type = $fields['site_section_bg_type'];
            if ($background_type == 'color') {
                $background = $fields['site_section_background_color'];
            }
            if ($background_type == 'gradient') {
                $background = $fields['site_section_background_gradient'];
            }
            if ($show_title === 'yes') {
                $title_type = $fields['site_section_title_type'];
            }
            if ($show_title === 'yes') {
                $title_type = $fields['site_section_title_type'];
            }
            if ($no_side_padding) {
                $no_side_padding = 'site-section--no-side-padding';
            }
            ?>
            <section
                <? if (!empty($background)): ?>
                    style="background:<?= $background ?>"
                <? endif; ?>
                <? if (!empty($id)): ?>
                    id="<?= $id ?>"
                <? endif; ?>
                    class="site-section <?= $rounded_class ?> <?= $padding_mode ?> <?= $no_side_padding ?>"
            >
                <div class="container">
                    <? if ($title_type === 'numeric-with-left-icon'): ?>
                        <?
                        $image = $fields['site_section_left_title_img'];
                        $title = $fields['site_section_title'];
                        $title_color = $fields['site_section_title_color'];
                        ?>
                        <? if (!empty($image) and !empty($title)) ?>
                            <div class="site-section__title-wrapper">
                            <img alt="img"  class="site-section__left-pre-title-img" src="<?= $image ?>" />
                        <h2 class="site-section__title" style="color:<?= $title_color ?>"><?= $title ?></h2>
                        </div>
                    <? endif; ?>
                    <? if ($title_type === 'with-icon-on-top'): ?>
                        <?
                        $image = $fields['site_section_pre_title_img'];
                        $title = $fields['site_section_title'];
                        $title_color = $fields['site_section_title_color'];
                        ?>
                        <? if (!empty($image) and !empty($title)) ?>
                            <img alt="img"  class="site-section__pre-title-img" src="<?= $image ?>" />
                        <h2 class="site-section__title site-section__title--centered"
                            style="color:<?= $title_color ?>"><?= $title ?></h2>
                    <? endif; ?>
                    <? if ($title_type === 'without-icon'): ?>
                        <?
                        $title = $fields['site_section_title'];
                        $title_max_width = $fields['site_section_title_max_width'];
                        $title_color = $fields['site_section_title_color'];
                        $title_align = $fields['site_section_title_align'];
                        ?>
                        <? if (!empty($title)) ?>
                            <h2 style="color:<?= $title_color ?>; max-width: <?= $title_max_width ?>;"
                        class="site-section__title site-section__title--<?= $title_align ?>"><?= $title ?></h2>
                    <? endif; ?>
                    <? if ($show_desc === 'yes'): ?>
                        <?
                        $desc = $fields['site_section_desc']
                        ?>
                        <? if (!empty($desc)): ?>
                            <?
                            $desc_accent_color = $fields['site_section_desc_accent_color'];
                            if (!empty($desc_accent_color)) {
                                $colored_span = '<span style="color:">' . $desc_accent_color;
                                $data = str_replace(array('<span>', '</span>'), array($colored_span, '</span>'), $data);
                            }
                            ?>
                            <div class="site-section__desc site-section__desc--centered"
                                 style="color:<?= $fields['site_section_desc_color'] ?>;"><?= $desc ?></div>
                        <? endif; ?>
                    <? endif; ?>
                </div>
                <?= $inner_blocks ?>
            </section>
            <?
        });
    Block::make('Banners')
        ->add_fields(array(
            Field::make('text', 'banners_id', 'Block ID'),
            Field::make('select', 'banners_margin', 'Margin mode')
                ->set_options(array(
                    'no-margin' => 'no-margin',
                    'margin' => 'Margin',
                    'margin-top' => 'Margin top',
                    'margin-bottom' => 'Margin bottom',
                )),
            Field::make('complex', 'banners', 'Banners')
                ->set_collapsed(true)
                ->add_fields('type-1', array(
                    Field::make('checkbox', 'with_shadow', 'With shadow'),
                    Field::make('color', 'background_color', 'Background color'),
                    Field::make('text', 'pre_title', 'Banner label'),
                    Field::make('color', 'pre_title_color', 'Banner label color'),
                    Field::make('text', 'title', 'title'),
                    Field::make('color', 'title_color', 'Title color'),
                    Field::make('text', 'desc', 'Description'),
                    Field::make('color', 'desc_color', 'Description color'),
                    Field::make('text', 'btn_text', 'Button text'),
                    Field::make('text', 'btn_link', 'Button link'),
                    Field::make('color', 'btn_text_color', 'Button text color'),
                    Field::make('color', 'btn_hover_text_color', 'Button:hover text color'),
                    Field::make('color', 'btn_background_color', 'Button background color'),
                    Field::make('color', 'btn_hover_background_color', 'Button:hover background color'),
                    Field::make('color', 'btn_border_color', 'Button border color'),
                    Field::make('color', 'btn_hover_border_color', 'Button:hover border color'),
                    Field::make('image', 'image', 'Image')
                        ->set_type(array('image'))
                        ->set_value_type('url'),
                ))
                ->add_fields('type-1-1', array(
                    Field::make('checkbox', 'with_shadow', 'With shadow'),
                    Field::make('color', 'background_color', 'Background color'),
                    Field::make('text', 'pre_title', 'Banner label'),
                    Field::make('color', 'pre_title_color', 'Banner label color'),
                    Field::make('text', 'title', 'title'),
                    Field::make('color', 'title_color', 'Title color'),
                    Field::make('text', 'desc', 'Description'),
                    Field::make('color', 'desc_color', 'Description color'),
                    Field::make('text', 'desc2', 'Description 2'),
                    Field::make('color', 'desc2_color', 'Description 2 color'),
                    Field::make('text', 'btn_text', 'Button text'),
                    Field::make('text', 'btn_link', 'Button link'),
                    Field::make('color', 'btn_text_color', 'Button text color'),
                    Field::make('color', 'btn_hover_text_color', 'Button:hover text color'),
                    Field::make('color', 'btn_background_color', 'Button background color'),
                    Field::make('color', 'btn_hover_background_color', 'Button:hover background color'),
                    Field::make('color', 'btn_border_color', 'Button border color'),
                    Field::make('color', 'btn_hover_border_color', 'Button:hover border color'),
                    Field::make('image', 'image', 'Image')
                        ->set_type(array('image'))
                        ->set_value_type('url'),
                    Field::make('text', 'image_link', 'Image link'),
                ))
                ->add_fields('type-1-2', array(
                    Field::make('checkbox', 'with_shadow', 'With shadow'),
                    Field::make('color', 'background_color', 'Background color'),
                    Field::make('text', 'pre_title', 'Banner label'),
                    Field::make('color', 'pre_title_color', 'Banner label color'),
                    Field::make('text', 'title', 'title'),
                    Field::make('color', 'title_color', 'Title color'),
                    Field::make('text', 'desc', 'Description'),
                    Field::make('color', 'desc_color', 'Description color'),
                    Field::make('text', 'desc2', 'Description 2'),
                    Field::make('color', 'desc2_color', 'Description 2 color'),
                    Field::make('text', 'btn_text', 'Button text'),
                    Field::make('text', 'btn_link', 'Button link'),
                    Field::make('color', 'btn_text_color', 'Button text color'),
                    Field::make('color', 'btn_hover_text_color', 'Button:hover text color'),
                    Field::make('color', 'btn_background_color', 'Button background color'),
                    Field::make('color', 'btn_hover_background_color', 'Button:hover background color'),
                    Field::make('image', 'image', 'Image')
                        ->set_type(array('image'))
                        ->set_value_type('url'),
                ))
                ->add_fields('type-1-3', array(
                    Field::make('checkbox', 'with_shadow', 'With shadow'),
                    Field::make('color', 'background_color', 'Background color'),
                    Field::make('text', 'pre_title', 'Banner label'),
                    Field::make('color', 'pre_title_color', 'Banner label color'),
                    Field::make('text', 'title', 'title'),
                    Field::make('color', 'title_color', 'Title color'),
                    Field::make('text', 'desc', 'Description'),
                    Field::make('color', 'desc_color', 'Description color'),
                    Field::make('text', 'desc2', 'Description 2'),
                    Field::make('color', 'desc2_color', 'Description 2 color'),
                    Field::make('text', 'btn_text', 'Button text'),
                    Field::make('text', 'btn_link', 'Button link'),
                    Field::make('color', 'btn_text_color', 'Button text color'),
                    Field::make('color', 'btn_hover_text_color', 'Button:hover text color'),
                    Field::make('color', 'btn_background_color', 'Button background color'),
                    Field::make('color', 'btn_hover_background_color', 'Button:hover background color'),
                    Field::make('color', 'btn_border_color', 'Button border color'),
                    Field::make('color', 'btn_hover_border_color', 'Button:hover border color'),
                    Field::make('text', 'text_margin_bottom', 'Text margin bottom (px)'),
                    Field::make('image', 'image', 'Image')
                        ->set_type(array('image'))
                        ->set_value_type('url'),
                ))
                ->add_fields('type-2', array(
                    Field::make('checkbox', 'with_shadow', 'With shadow'),
                    Field::make('color', 'background_color', 'Background color'),
                    Field::make('image', 'image', 'Image')
                        ->set_type(array('image'))
                        ->set_value_type('url'),
                    Field::make('text', 'pre_title', 'Pre title'),
                    Field::make('color', 'pre_title_color', 'Pre title color'),
                    Field::make('text', 'title', 'title'),
                    Field::make('color', 'title_color', 'Title color'),
                    Field::make('text', 'btn_text', 'Button text'),
                    Field::make('text', 'btn_link', 'Button link'),
                    Field::make('color', 'btn_text_color', 'Button text color'),
                    Field::make('color', 'btn_hover_text_color', 'Button:hover text color'),
                    Field::make('color', 'btn_background_color', 'Button background color'),
                    Field::make('color', 'btn_hover_background_color', 'Button:hover background color'),
                    Field::make('color', 'btn_border_color', 'Button border color'),
                    Field::make('color', 'btn_hover_border_color', 'Button:hover border color'),
                ))
                ->add_fields('type-2-1', array(
                    Field::make('checkbox', 'with_shadow', 'With shadow'),
                    Field::make('color', 'background_color', 'Background color'),
                    Field::make('color', 'border_color', 'Border color'),
                    Field::make('image', 'image', 'Image')
                        ->set_type(array('image'))
                        ->set_value_type('url'),
                    Field::make('text', 'pre_title', 'Pre title'),
                    Field::make('color', 'pre_title_color', 'Pre title color'),
                    Field::make('text', 'title', 'title'),
                    Field::make('color', 'title_color', 'Title color'),
                    Field::make('text', 'title_desc', 'title description'),
                    Field::make('color', 'title_desc_color', 'Title description color'),
                    Field::make('text', 'btn_text', 'Button text'),
                    Field::make('text', 'btn_link', 'Button link'),
                    Field::make('color', 'btn_text_color', 'Button text color'),
                    Field::make('color', 'btn_hover_text_color', 'Button:hover text color'),
                    Field::make('color', 'btn_background_color', 'Button background color'),
                    Field::make('color', 'btn_hover_background_color', 'Button:hover background color'),
                    Field::make('color', 'btn_border_color', 'Button border color'),
                    Field::make('color', 'btn_hover_border_color', 'Button:hover border color'),
                ))
                ->add_fields('type-3', array(
                    Field::make('checkbox', 'with_shadow', 'With shadow'),
                    Field::make('image', 'background_image', 'Background image')
                        ->set_type(array('image'))
                        ->set_value_type('url'),
                    Field::make('text', 'title', 'title'),
                    Field::make('color', 'title_color', 'Title color'),
                    Field::make('text', 'desc', 'Description'),
                    Field::make('color', 'desc_color', 'Description color'),
                    Field::make('text', 'btn_text', 'Button text'),
                    Field::make('text', 'btn_link', 'Button link'),
                    Field::make('color', 'btn_text_color', 'Button text color'),
                    Field::make('color', 'btn_hover_text_color', 'Button:hover text color'),
                    Field::make('color', 'btn_background_color', 'Button background color'),
                    Field::make('color', 'btn_hover_background_color', 'Button:hover background color'),
                ))
                ->add_fields('type-4', array(
                    Field::make('checkbox', 'with_shadow', 'With shadow'),
                    Field::make('color', 'background_color', 'Background color'),
                    Field::make('text', 'label', 'Label'),
                    Field::make('color', 'label_color', 'Label color'),
                    Field::make('text', 'pre_title', 'Pre title'),
                    Field::make('color', 'pre_title_color', 'Pre title color'),
                    Field::make('text', 'title', 'title'),
                    Field::make('color', 'title_color', 'Title color'),
                    Field::make('image', 'image', 'Image')
                        ->set_type(array('image'))
                        ->set_value_type('url'),
                ))
                ->add_fields('type-5', array(
                    Field::make('checkbox', 'with_shadow', 'With shadow'),
                    Field::make('color', 'background_color', 'Background color'),
                    Field::make('text', 'label', 'Label'),
                    Field::make('color', 'label_color', 'Label color'),
                    Field::make('text', 'pre_title', 'Pre title'),
                    Field::make('color', 'pre_title_color', 'Pre title color'),
                    Field::make('text', 'title', 'title'),
                    Field::make('color', 'title_color', 'Title color'),
                    Field::make('image', 'image', 'Image')
                        ->set_type(array('image'))
                        ->set_value_type('url'),
                ))
                ->add_fields('type-6', array(
                    Field::make('checkbox', 'with_shadow', 'With shadow'),
                    Field::make('color', 'background_color', 'Background color'),
                    Field::make('text', 'label', 'Label'),
                    Field::make('color', 'label_color', 'Label color'),
                    Field::make('text', 'pre_title', 'Pre title'),
                    Field::make('color', 'pre_title_color', 'Pre title color'),
                    Field::make('text', 'title', 'title'),
                    Field::make('color', 'title_color', 'Title color'),
                    Field::make('image', 'image', 'Image')
                        ->set_type(array('image'))
                        ->set_value_type('url'),
                ))
                ->add_fields('type-7', array(
                    Field::make('checkbox', 'with_shadow', 'With shadow'),
                    Field::make('color', 'background_color', 'Background color'),
                    Field::make('text', 'label', 'Label'),
                    Field::make('color', 'label_color', 'Label color'),
                    Field::make('text', 'title', 'title'),
                    Field::make('color', 'title_color', 'Title color'),
                    Field::make('image', 'image', 'Image')
                        ->set_type(array('image'))
                        ->set_value_type('url'),
                    Field::make('text', 'desc', 'Description'),
                    Field::make('color', 'desc_color', 'Description color'),
                    Field::make('text', 'btn_text', 'Button text'),
                    Field::make('text', 'btn_link', 'Button link'),
                    Field::make('color', 'btn_text_color', 'Button text color'),
                    Field::make('color', 'btn_hover_text_color', 'Button:hover text color'),
                    Field::make('color', 'btn_background_color', 'Button background color'),
                    Field::make('color', 'btn_hover_background_color', 'Button:hover background color'),
                    Field::make('color', 'btn_border_color', 'Button border color'),
                    Field::make('color', 'btn_hover_border_color', 'Button:hover border color'),
                ))
                ->add_fields('type-8', array(
                    Field::make('checkbox', 'with_shadow', 'With shadow'),
                    Field::make('color', 'background_color', 'Background color'),
                    Field::make('text', 'label', 'Label'),
                    Field::make('color', 'label_color', 'Label color'),
                    Field::make('text', 'title', 'title'),
                    Field::make('color', 'title_color', 'Title color'),
                    Field::make('image', 'image', 'Image')
                        ->set_type(array('image'))
                        ->set_value_type('url'),
                    Field::make('text', 'desc', 'Description'),
                    Field::make('color', 'desc_color', 'Description color'),
                    Field::make('text', 'btn_text', 'Button text'),
                    Field::make('text', 'btn_link', 'Button link'),
                    Field::make('color', 'btn_text_color', 'Button text color'),
                    Field::make('color', 'btn_hover_text_color', 'Button:hover text color'),
                ))
                ->add_fields('type-with-logo', array(
                    Field::make('text', 'background_color', 'Background color'),
                    Field::make('text', 'title', 'title'),
                    Field::make('color', 'title_color', 'Title color'),
                    Field::make('image', 'logo', 'Logo')
                        ->set_type(array('image'))
                        ->set_value_type('url'),
                    Field::make('image', 'image', 'Image')
                        ->set_type(array('image'))
                        ->set_value_type('url'),
                    Field::make('text', 'desc', 'Description'),
                    Field::make('color', 'desc_color', 'Description color'),
                    Field::make('text', 'link', 'Url link'),
                ))
        ))
        ->set_parent('carbon-fields/site-section')
        ->set_render_callback(function ($fields, $attributes, $inner_blocks) {
            $id = $fields['banners_id'];
            $margin_mode = 'block--' . $fields['banners_margin'];
            $banners = $fields['banners'];
            ?>
            <? if (!empty($banners)): ?>
                <div class="container">
                    <div
                        <? if (!empty($id)): ?>
                            id="<?= $id ?>"
                        <? endif; ?>
                            class="block <?= $margin_mode ?>  swiper-container banners-container">
                        <div itemscope itemtype="https://schema.org/HowTo" class="swiper-wrapper banners-block">
                            <? $i = 0;
                            foreach ($banners as $banner): ?>
                                <? $i++; #print_r($banner) ?>
                                <? if ($banner['_type'] === 'type-1'):
                                    $btn_class_random = $banner['_type'] . '_btn_' . uniqid();
                                    ?>
                                    <div style="background: <?= $banner['background_color'] ?>"
                                         class="banner banner-type-1 swiper-slide">
                                        <style>
                                            .<?=$btn_class_random?> {
                                            <?=($banner['btn_text_color']) ? 'color:'.$banner['btn_text_color'].' !important;' : '' ?><?=($banner['btn_background_color']) ? 'background:'.$banner['btn_background_color'].' !important;' : '' ?><?=($banner['btn_border_color']) ? 'border-color: '.$banner['btn_border_color'].' !important;' : '' ?>
                                            }

                                            .<?=$btn_class_random?>:hover {
                                            <?=($banner['btn_hover_text_color']) ? 'color:'.$banner['btn_hover_text_color'].' !important;' : '' ?><?=($banner['btn_hover_background_color']) ? 'background:'.$banner['btn_hover_background_color'].' !important;' : '' ?><?=($banner['btn_hover_border_color']) ? 'border-color: '.$banner['btn_hover_border_color'].' !important;' : '' ?>
                                            }
                                        </style>
                                        <div class="banner-type-1__content-wrapper">
                                            <div style="color: <?= $banner['pre_title_color'] ?>"
                                                 class="banner-type-1__label banner__label"><?= $banner['pre_title'] ?></div>
                                            <div style="color: <?= $banner['title_color'] ?>"
                                                 class="banner-type-1__title"><?= $banner['title'] ?></div>
                                            <div style="color: <?= $banner['desc_color'] ?>"
                                                 class="banner-type-1__desc"><?= $banner['desc'] ?></div>
                                            <? if ($banner['btn_text']) { ?>
                                                <a target="_blank"
                                                   class="site-btn banner-type-1__btn <?= $btn_class_random ?>"
                                                   href="<?= $banner['btn_link'] . get_params_string() ?>"><?= $banner['btn_text'] ?></a>
                                            <? } ?>
                                        </div>
                                        <img alt="img" class="banner-type-1__img" src="<?= $banner['image'] ?>">
                                    </div>
                                <? endif; ?>
                                <? if ($banner['_type'] === 'type-1-1'):
                                    $btn_class_random = $banner['_type'] . '_btn_' . uniqid();
                                    ?>
                                    <div style="background: <?= $banner['background_color'] ?>"
                                         class="banner banner-type-1 banner-type-1-1 swiper-slide" itemprop="step"
                                         itemscope itemtype="https://schema.org/HowToSection">
                                        <meta itemprop="position" content="<?= $i; ?>"/>
                                        <style>
                                            .<?=$btn_class_random?> {
                                            <?=($banner['btn_text_color']) ? 'color:'.$banner['btn_text_color'].' !important;' : '' ?><?=($banner['btn_background_color']) ? 'background:'.$banner['btn_background_color'].' !important;' : '' ?><?=($banner['btn_border_color']) ? 'border-color: '.$banner['btn_border_color'].' !important;' : '' ?>
                                            }

                                            .<?=$btn_class_random?>:hover {
                                            <?=($banner['btn_hover_text_color']) ? 'color:'.$banner['btn_hover_text_color'].' !important;' : '' ?><?=($banner['btn_hover_background_color']) ? 'background:'.$banner['btn_hover_background_color'].' !important;' : '' ?><?=($banner['btn_hover_border_color']) ? 'border-color: '.$banner['btn_hover_border_color'].' !important;' : '' ?>
                                            }
                                        </style>
                                        <div class="banner-type-1__content-wrapper">
                                            <div style="color: <?= $banner['pre_title_color'] ?>"
                                                 class="banner-type-1__label banner__label"><?= $banner['pre_title'] ?></div>
                                            <div style="color: <?= $banner['title_color'] ?>"
                                                 class="banner-type-1__title"
                                                 itemprop="name"><?= $banner['title'] ?></div>
                                            <div style="color: <?= $banner['desc_color'] ?>" class="banner-type-1__desc"
                                                 itemprop="text"><?= $banner['desc'] ?></div>
                                            <div style="color: <?= $banner['desc2_color'] ?>"
                                                 class="banner-type-1__desc2"
                                                 itemprop="text"><?= $banner['desc2'] ?></div>
                                            <? if ($banner['btn_text']) { ?>
                                                <a itemprop="url" target="_blank"
                                                   class="site-btn banner-type-1__btn <?= $btn_class_random ?>"
                                                   href="<?= $banner['btn_link'] . get_params_string() ?>"><?= $banner['btn_text'] ?></a>
                                            <? } ?>
                                        </div>
                                        <? if (!empty($banner['image_link'])) { ?>
                                            <a class="banner-type-1__img_link"
                                               href="<?= $banner['image_link'] . get_params_string() ?>">
                                                <img alt="img" itemprop="image" class="banner-type-1__img"
                                                     src="<?= $banner['image'] ?>">
                                            </a>
                                        <? } else { ?>
                                            <img alt="img" itemprop="image" class="banner-type-1__img"
                                                 src="<?= $banner['image'] ?>">
                                        <? } ?>
                                    </div>
                                <? endif; ?>
                                <? if ($banner['_type'] === 'type-1-2'): ?>
                                    <div style="background: <?= $banner['background_color'] ?>"
                                         class="banner banner-type-1 banner-type-1-2 swiper-slide" itemprop="step"
                                         itemscope itemtype="https://schema.org/HowToSection">
                                        <meta itemprop="position" content="<?= $i; ?>"/>
                                        <div class="banner-type-1__content-wrapper">
                                            <div style="color: <?= $banner['pre_title_color'] ?>"
                                                 class="banner-type-1__label banner__label"><?= $banner['pre_title'] ?></div>
                                            <div style="color: <?= $banner['title_color'] ?>"
                                                 class="banner-type-1__title"
                                                 itemprop="name"><?= $banner['title'] ?></div>
                                            <div style="color: <?= $banner['desc_color'] ?>" class="banner-type-1__desc"
                                                 itemprop="text"><?= $banner['desc'] ?></div>
                                            <div style="color: <?= $banner['desc2_color'] ?>"
                                                 class="banner-type-1__desc2"
                                                 itemprop="text"><?= $banner['desc2'] ?></div>
                                            <? if ($banner['btn_text']) { ?>
                                                <a target="_blank" itemprop="url"
                                                   style="background: <?= $banner['btn_background_color'] ?>; color: <?= $banner['btn_text_color'] ?>; border-color: <?= $banner['btn_text_color'] ?>"
                                                   class="site-btn banner-type-1__btn"
                                                   href="<?= $banner['btn_link'] . get_params_string() ?>"><?= $banner['btn_text'] ?></a>
                                            <? } ?>
                                        </div>
                                        <img alt="img" itemprop="image" class="banner-type-1__img"
                                             src="<?= $banner['image'] ?>">
                                    </div>
                                <? endif; ?>
                                <? if ($banner['_type'] === 'type-1-3'):
                                    $btn_class_random = $banner['_type'] . '_btn_' . uniqid();
                                    ?>
                                    <div style="background: <?= $banner['background_color'] ?>"
                                         class="banner banner-type-1 banner-type-1-3 swiper-slide">
                                        <style>
                                            .<?=$btn_class_random?> {
                                            <?=($banner['btn_text_color']) ? 'color:'.$banner['btn_text_color'].' !important;' : '' ?><?=($banner['btn_background_color']) ? 'background:'.$banner['btn_background_color'].' !important;' : '' ?><?=($banner['btn_border_color']) ? 'border-color: '.$banner['btn_border_color'].' !important;' : '' ?>
                                            }

                                            .<?=$btn_class_random?>:hover {
                                            <?=($banner['btn_hover_text_color']) ? 'color:'.$banner['btn_hover_text_color'].' !important;' : '' ?><?=($banner['btn_hover_background_color']) ? 'background:'.$banner['btn_hover_background_color'].' !important;' : '' ?><?=($banner['btn_hover_border_color']) ? 'border-color: '.$banner['btn_hover_border_color'].' !important;' : '' ?>
                                            }
                                        </style>
                                        <div class="banner-type-1__content-wrapper"
                                             style="<?= (!empty($banner['text_margin_bottom'])) ? '    margin-bottom: ' . $banner['text_margin_bottom'] . 'px;' : '' ?>">
                                            <div style="color: <?= $banner['pre_title_color'] ?>"
                                                 class="banner-type-1__label banner__label"><?= $banner['pre_title'] ?></div>
                                            <div style="color: <?= $banner['title_color'] ?>"
                                                 class="banner-type-1__title"><?= $banner['title'] ?></div>
                                            <div style="color: <?= $banner['desc_color'] ?>"
                                                 class="banner-type-1__desc"><?= $banner['desc'] ?></div>
                                            <div style="color: <?= $banner['desc2_color'] ?>"
                                                 class="banner-type-1__desc2"><?= $banner['desc2'] ?></div>
                                            <? if ($banner['btn_text']) { ?>
                                                <a target="_blank"
                                                   class="site-btn banner-type-1__btn <?= $btn_class_random ?>"
                                                   href="<?= $banner['btn_link'] . get_params_string() ?>"><?= $banner['btn_text'] ?></a>
                                            <? } ?>
                                        </div>
                                        <img alt="img" class="banner-type-1__img" src="<?= $banner['image'] ?>">
                                    </div>
                                <? endif; ?>
                                <? if ($banner['_type'] === 'type-2'):
                                    $btn_class_random = $banner['_type'] . '_btn_' . uniqid();
                                    ?>
                                    <div style="background: <?= $banner['background_color'] ?>"
                                         class="banner banner-type-2 swiper-slide">
                                        <style>
                                            .<?=$btn_class_random?> {
                                            <?=($banner['btn_text_color']) ? 'color:'.$banner['btn_text_color'].' !important;' : '' ?><?=($banner['btn_background_color']) ? 'background:'.$banner['btn_background_color'].' !important;' : '' ?><?=($banner['btn_border_color']) ? 'border-color: '.$banner['btn_border_color'].' !important;' : '' ?>
                                            }

                                            .<?=$btn_class_random?>:hover {
                                            <?=($banner['btn_hover_text_color']) ? 'color:'.$banner['btn_hover_text_color'].' !important;' : '' ?><?=($banner['btn_hover_background_color']) ? 'background:'.$banner['btn_hover_background_color'].' !important;' : '' ?><?=($banner['btn_hover_border_color']) ? 'border-color: '.$banner['btn_hover_border_color'].' !important;' : '' ?>
                                            }
                                        </style>
                                        <div class="banner-type-2__content-wrapper">
                                            <img alt="img" class="banner-type-2__img" src="<?= $banner['image'] ?>">
                                            <div style="color: <?= $banner['title_color'] ?>"
                                                 class="banner-type-2__title"><span
                                                        style="color:<?= $banner['pre_title_color'] ?>"
                                                        class="banner-type-2__pre-title"><?= $banner['pre_title'] ?></span><?= $banner['title'] ?>
                                            </div>
                                        </div>
                                        <? if ($banner['btn_text']) { ?>
                                            <a target="_blank"
                                               class="site-btn banner-type-2__btn <?= $btn_class_random ?>"
                                               href="<?= $banner['btn_link'] . get_params_string() ?>"><?= $banner['btn_text'] ?></a>
                                        <? } ?>
                                    </div>
                                <? endif; ?>
                                <? if ($banner['_type'] === 'type-2-1'):
                                    $btn_class_random = $banner['_type'] . '_btn_' . uniqid();
                                    ?>
                                    <div style="background: <?= $banner['background_color'] ?>; <? if (!empty($banner['border_color'])): ?>border: 1px solid <?= $banner['border_color']; ?><? endif; ?>"
                                         class="banner banner-type-2 banner-type-2-1 swiper-slide">
                                        <style>
                                            .<?=$btn_class_random?> {
                                            <?=($banner['btn_text_color']) ? 'color:'.$banner['btn_text_color'].' !important;' : '' ?><?=($banner['btn_background_color']) ? 'background:'.$banner['btn_background_color'].' !important;' : '' ?><?=($banner['btn_border_color']) ? 'border-color: '.$banner['btn_border_color'].' !important;' : '' ?>
                                            }

                                            .<?=$btn_class_random?>:hover {
                                            <?=($banner['btn_hover_text_color']) ? 'color:'.$banner['btn_hover_text_color'].' !important;' : '' ?><?=($banner['btn_hover_background_color']) ? 'background:'.$banner['btn_hover_background_color'].' !important;' : '' ?><?=($banner['btn_hover_border_color']) ? 'border-color: '.$banner['btn_hover_border_color'].' !important;' : '' ?>
                                            }
                                        </style>
                                        <div class="banner-type-2__content-wrapper">
                                            <img alt="img" class="banner-type-2__img" src="<?= $banner['image'] ?>">
                                            <div style="color: <?= $banner['title_color'] ?>"
                                                 class="banner-type-2__title"><span
                                                        style="color:<?= $banner['pre_title_color'] ?>"
                                                        class="banner-type-2__pre-title"><?= $banner['pre_title'] ?></span><?= $banner['title'] ?>
                                            </div>
                                            <div style="color: <?= $banner['title_desc_color'] ?>"
                                                 class="banner-type-2__title_desc"><?= $banner['title_desc'] ?></div>

                                        </div>
                                        <? if ($banner['btn_text']) { ?>
                                            <a target="_blank"
                                               class="site-btn banner-type-2__btn <?= $btn_class_random ?>"
                                               href="<?= $banner['btn_link'] . get_params_string() ?>"><?= $banner['btn_text'] ?></a>
                                        <? } ?>
                                    </div>
                                <? endif; ?>
                                <? if ($banner['_type'] === 'type-3'): ?>
                                    <div style="background-image: url('<?= $banner['background_image'] ?>')"
                                         class="banner banner-type-3 swiper-slide">
                                        <div style="color: <?= $banner['title_color'] ?>"
                                             class="banner-type-3__title"><?= $banner['title'] ?></div>
                                        <div class="banner-type-3__content-wrapper">
                                            <div style="color: <?= $banner['desc_color'] ?>"
                                                 class="banner-type-3__desc"><?= $banner['desc'] ?></div>
                                            <? if (!empty($banner['btn_text'])): ?>
                                                <a target="_blank"
                                                   style="background: <?= $banner['btn_background_color'] ?>; color: <?= $banner['btn_text_color'] ?>; border-color: <?= $banner['btn_text_color'] ?>"
                                                   class="site-btn banner-type-3__btn"
                                                   href="<?= $banner['btn_link'] . get_params_string() ?>"><?= $banner['btn_text'] ?></a>
                                            <? endif; ?>
                                        </div>
                                    </div>
                                <? endif; ?>
                                <? if ($banner['_type'] === 'type-4'): ?>
                                    <div style="background: <?= $banner['background_color'] ?>"
                                         class="banner banner-type-4 swiper-slide">
                                        <div style="color:<?= $banner['label_color'] ?> "
                                             class="banner-type-4__label banner__label"><?= $banner['label'] ?></div>
                                        <div style="color: <?= $banner['title_color'] ?>" class="banner-type-4__title">
                                            <span style="color:<?= $banner['pre_title_color'] ?>"
                                                  class="banner-type-4__pre-title"><?= $banner['pre_title'] ?></span><?= $banner['title'] ?>
                                        </div>
                                        <img alt="img" class="banner-type-4__img" src="<?= $banner['image'] ?>">
                                    </div>
                                <? endif; ?>
                                <? if ($banner['_type'] === 'type-5'): ?>
                                    <div style="background: <?= $banner['background_color'] ?>"
                                         class="banner banner-type-5 banner-type-5--with-shadow  swiper-slide">
                                        <div style="color:<?= $banner['label_color'] ?> "
                                             class="banner-type-5__label banner__label"><?= $banner['label'] ?></div>
                                        <div style="color: <?= $banner['title_color'] ?>" class="banner-type-5__title">
                                            <span style="color:<?= $banner['pre_title_color'] ?>"
                                                  class="banner-type-5__pre-title"><?= $banner['pre_title'] ?></span><?= $banner['title'] ?>
                                        </div>
                                        <img alt="img" class="banner-type-5__img" src="<?= $banner['image'] ?>">
                                    </div>
                                <? endif; ?>
                                <? if ($banner['_type'] === 'type-6'): ?>
                                    <div style="background: <?= $banner['background_color'] ?>"
                                         class="banner banner-type-5 swiper-slide">
                                        <div style="color:<?= $banner['label_color'] ?> "
                                             class="banner-type-5__label banner__label"><?= $banner['label'] ?></div>
                                        <div style="color: <?= $banner['title_color'] ?>"
                                             class="banner-type-5__title banner-type-5__title--big"><span
                                                    style="color:<?= $banner['pre_title_color'] ?>"
                                                    class="banner-type-5__pre-title"><?= $banner['pre_title'] ?></span><?= $banner['title'] ?>
                                        </div>
                                        <img alt="img" class="banner-type-5__img" src="<?= $banner['image'] ?>">
                                    </div>
                                <? endif; ?>
                                <? if ($banner['_type'] === 'type-7'):
                                    $btn_class_random = $banner['_type'] . '_btn_' . uniqid();
                                    ?>
                                    <div style="background: <?= $banner['background_color'] ?>"
                                         class="banner banner-type-6 swiper-slide">
                                        <style>
                                            .<?=$btn_class_random?> {
                                            <?=($banner['btn_text_color']) ? 'color:'.$banner['btn_text_color'].' !important;' : '' ?><?=($banner['btn_background_color']) ? 'background:'.$banner['btn_background_color'].' !important;' : '' ?><?=($banner['btn_border_color']) ? 'border-color: '.$banner['btn_border_color'].' !important;' : '' ?>
                                            }

                                            .<?=$btn_class_random?>:hover {
                                            <?=($banner['btn_hover_text_color']) ? 'color:'.$banner['btn_hover_text_color'].' !important;' : '' ?><?=($banner['btn_hover_background_color']) ? 'background:'.$banner['btn_hover_background_color'].' !important;' : '' ?><?=($banner['btn_hover_border_color']) ? 'border-color: '.$banner['btn_hover_border_color'].' !important;' : '' ?>
                                            }
                                        </style>
                                        <div style="color:<?= $banner['label_color'] ?> "
                                             class="banner-type-6__label banner__label"><?= $banner['label'] ?></div>
                                        <div style="color: <?= $banner['title_color'] ?>"
                                             class="banner-type-6__title"><?= $banner['title'] ?></div>
                                        <img alt="img" class="banner-type-6__img" src="<?= $banner['image'] ?>">
                                        <div style="color: <?= $banner['desc_color'] ?>"
                                             class="banner-type-6__desc"><?= $banner['desc'] ?></div>
                                        <a target="_blank" class="site-btn banner-type-6__btn <?= $btn_class_random ?>"
                                           href="<?= $banner['btn_link'] . get_params_string() ?>"><?= $banner['btn_text'] ?></a>
                                    </div>
                                <? endif; ?>
                                <? if ($banner['_type'] === 'type-8'): ?>
                                    <div style="background: <?= $banner['background_color'] ?>"
                                         class="banner banner-type-7 swiper-slide">
                                        <div style="color:<?= $banner['label_color'] ?> "
                                             class="banner-type-7__label banner__label"><?= $banner['label'] ?></div>
                                        <div style="color: <?= $banner['title_color'] ?>"
                                             class="banner-type-7__title"><?= $banner['title'] ?></div>
                                        <div style="color: <?= $banner['desc_color'] ?>"
                                             class="banner-type-7__desc"><?= $banner['desc'] ?></div>
                                        <? if (!empty($banner['btn_text'])): ?>
                                            <a target="_blank" style="color: <?= $banner['btn_text_color'] ?>;"
                                               class="banner-type-7__link"
                                               href="<?= $banner['btn_link'] . get_params_string() ?>"><?= $banner['btn_text'] ?></a>
                                        <? endif; ?>
                                        <img alt="img" class="banner-type-7__img" src="<?= $banner['image'] ?>">
                                    </div>
                                <? endif; ?>
                                <? if ($banner['_type'] === 'type-with-logo'): ?>
                                    <a href="<?= $banner['link'] . get_params_string() ?>"
                                       style="background: <?= $banner['background_color'] ?>"
                                       class="banner banner-type-8 swiper-slide">
                                        <img alt="img" class="banner-type-8__logo" src="<?= $banner['logo'] ?>">
                                        <div style="color: <?= $banner['title_color'] ?>"
                                             class="banner-type-8__title"><?= $banner['title'] ?></div>
                                        <div style="color: <?= $banner['desc_color'] ?>"
                                             class="banner-type-8__desc"><?= $banner['desc'] ?></div>
                                        <img alt="img" class="banner-type-8__img" src="<?= $banner['image'] ?>">
                                    </a>
                                <? endif; ?>
                            <? endforeach; ?>
                        </div>
                        <div class="swiper-pagination banners-container__slider-pagination"></div>
                    </div>
                </div>
            <? endif; ?>
            <?
        });
    Block::make('Slider')
        ->add_fields(array(
            Field::make('text', 'slider_id', 'Block ID'),
            Field::make('select', 'slider_margin', 'Margin mode')
                ->set_options(array(
                    'no-margin' => 'no-margin',
                    'margin' => 'Margin',
                    'margin-top' => 'Margin top',
                    'margin-bottom' => 'Margin bottom',
                )),
            Field::make('color', 'title_color', 'Title color'),
            Field::make('color', 'btn_text_color', 'Button text color'),
            Field::make('color', 'btn_hover_text_color', 'Button:hover text color'),
            Field::make('color', 'btn_background_color', 'Button background color'),
            Field::make('color', 'btn_hover_background_color', 'Button:hover background color'),
            Field::make('color', 'desc_color', 'Description color'),
            Field::make('complex', 'slider', 'Slider')
                ->set_collapsed(true)
                ->add_fields(array(
                    // Field::make( 'color', 'background_color', 'Background color' ),

                    Field::make('radio', 'sl_background_color', 'Background type')
                        ->set_options(array(
                            'color' => 'Color',
                            'gradient' => 'Gradient',
                        ))
                        ->set_default_value('color'),
                    Field::make('color', 'slider_background_color', 'Background color')
                        ->set_conditional_logic(array(
                            array(
                                'field' => 'sl_background_color',
                                'value' => 'color',
                                'compare' => '=',
                            ))),
                    Field::make('text', 'slider_background_gradient', 'Gradient css rule')
                        ->set_conditional_logic(array(
                            array(
                                'field' => 'sl_background_color',
                                'value' => 'gradient',
                                'compare' => '=',
                            ))),

                    Field::make('text', 'title', 'title'),
                    Field::make('textarea', 'desc', 'Description'),
                    Field::make('text', 'btn_text', 'Button text'),
                    Field::make('text', 'btn_link', 'Button link'),
                    Field::make('image', 'image', 'Image')
                        ->set_type(array('image'))
                        ->set_value_type('url'),
                    Field::make('text', 'custom_text1', 'Button text')->set_width(30),
                    Field::make('text', 'custom_text2', 'Button text')->set_width(30),
                    Field::make('text', 'custom_text3', 'Button text')->set_width(30),
                    Field::make('text', 'custom_text4', 'Button text')->set_width(30),
                    Field::make('text', 'custom_text5', 'Button text')->set_width(30),
                    Field::make('text', 'custom_text6', 'Button text')->set_width(30),
                ))
        ))
        ->set_parent('carbon-fields/site-section')
        ->set_render_callback(function ($fields, $attributes, $inner_blocks) {
            ?>
            <?
            $id = $fields['slider_id'];
            $margin_mode = 'block--' . $fields['slider_margin'];
            $slides = $fields['slider'];
            ?>
            <div class="container">
                <div
                    <? if (!empty($id)): ?>
                        id="<?= $id ?>"
                    <? endif; ?>
                        class="block <?= $margin_mode ?>  slider-block swiper-container">
                    <div class="swiper-wrapper slider-block__wrapper custom__ai--block">
                        <? foreach ($slides as $slide): ?>

                            <?
                            $btype = $slide['sl_background_color'];
                            if ($btype == 'color') {
                                $bgd = $slide['slider_background_color'];
                            }
                            if ($btype == 'gradient') {
                                $bgd = $slide['slider_background_gradient'];
                            }
                            ?>

                            <div class="swiper-slide" style="border-radius: 30px; background: <?= $bgd ?>">
                                <div class="slider-block__slide" style="background: transparent !important;">
                                    <div class="slider-block__left-side">
                                        <div class="slider-block__title"><?= $slide['title'] ?></div>
                                        <div class="slider-block__desc"><?= $slide['desc'] ?> </div>
                                        <a target="_blank" href="<?= $slide['btn_link'] . get_params_string() ?>"
                                           class="site-btn slider-block__btn"><?= $slide['btn_text'] ?></a>
                                    </div>
                                    <div class="slider-block__right-side">
                                        <img alt="img" class="slider-block__img" src="<?= $slide['image'] ?>">
                                    </div>
                                </div>
                                <ul class="block__text__list">
                                    <? if ($slide['custom_text1']): ?>
                                        <li class="block__text__list--item"><?= $slide['custom_text1']; ?></li>
                                    <? endif; ?>
                                    <? if ($slide['custom_text2']): ?>
                                        <li class="block__text__list--item"><?= $slide['custom_text2']; ?></li>
                                    <? endif; ?>
                                    <? if ($slide['custom_text3']): ?>
                                        <li class="block__text__list--item"><?= $slide['custom_text3']; ?></li>
                                    <? endif; ?>
                                    <? if ($slide['custom_text4']): ?>
                                        <li class="block__text__list--item"><?= $slide['custom_text4']; ?></li>
                                    <? endif; ?>
                                    <? if ($slide['custom_text5']): ?>
                                        <li class="block__text__list--item"><?= $slide['custom_text5']; ?></li>
                                    <? endif; ?>
                                    <? if ($slide['custom_text6']): ?>
                                        <li class="block__text__list--item"><?= $slide['custom_text6']; ?></li>
                                    <? endif; ?>
                                </ul>
                            </div>
                        <? endforeach; ?>
                    </div>
                    <div class="swiper-pagination slider-block__slider-pagination"></div>
                </div>
            </div>
            <?
        });
    Block::make('Tabs')
        ->add_fields(array(
            Field::make('text', 'tabs_id', 'Block ID'),
            Field::make('select', 'tabs_margin', 'Margin mode')
                ->set_options(array(
                    'no-margin' => 'no-margin',
                    'margin' => 'Margin',
                    'margin-top' => 'Margin top',
                    'margin-bottom' => 'Margin bottom',
                )),
            Field::make('color', 'btn_text_color', 'Button text color in tabs'),
            Field::make('color', 'btn_hover_text_color', 'Button:hover text color in tabs'),
            Field::make('color', 'btn_background_color', 'Button background color in tabs'),
            Field::make('color', 'btn_hover_background_color', 'Button:hover background color in tabs'),
            Field::make('color', 'btn_border_color', 'Button border color in tabs'),
            Field::make('color', 'btn_hover_border_color', 'Button:hover border color in tabs'),
            Field::make('complex', 'tabs', 'Tabs')
                ->set_collapsed(true)
                ->add_fields(array(
                    Field::make('text', 'title', 'Tab title'),
                    Field::make('textarea', 'desc', 'Description'),
                    Field::make('text', 'btn_text', 'Button text'),
                    Field::make('text', 'btn_link', 'Button link'),
                    Field::make('image', 'image', 'Image')
                        ->set_type(array('image'))
                        ->set_value_type('url'),
                ))
        ))
        ->set_parent('carbon-fields/site-section')
        ->set_render_callback(function ($fields, $attributes, $inner_blocks) {
            $id = $fields['tabs_id'];
            $margin_mode = 'block--' . $fields['tabs_margin'];
            $tabs = $fields['tabs'];
            $btn_class_in_tabs_random = 'tabs_' . $id . '_btn_' . uniqid();
            ?>
            <div class="container">
                <style>
                    .<?=$btn_class_in_tabs_random?> {
                    <?=($fields['btn_text_color']) ? 'color:'.$fields['btn_text_color'].' !important;' : '' ?><?=($fields['btn_background_color']) ? 'background:'.$fields['btn_background_color'].' !important;' : '' ?><?=($fields['btn_border_color']) ? 'border-color: '.$fields['btn_border_color'].' !important;' : '' ?>
                    }

                    .<?=$btn_class_in_tabs_random?>:hover {
                    <?=($fields['btn_hover_text_color']) ? 'color:'.$fields['btn_hover_text_color'].' !important;' : '' ?><?=($fields['btn_hover_background_color']) ? 'background:'.$fields['btn_hover_background_color'].' !important;' : '' ?><?=($fields['btn_hover_border_color']) ? 'border-color: '.$fields['btn_hover_border_color'].' !important;' : '' ?>
                    }
                </style>
                <div
                    <? if (!empty($id)): ?>
                        id="<?= $id ?>"
                    <? endif; ?>
                        class="block <?= $margin_mode ?> tabs-1-block">
                    <div class="swiper-container tabs-nav tabs-nav--slider">
                        <div class="swiper-wrapper">
                            <? foreach ($tabs as $tab): ?>
                                <div class="swiper-slide"
                                     <? if (sizeof($tabs) < 3): ?>style="min-width: 49%;"<? endif; ?>>
                                    <div class="tabs-nav__text"><?= $tab['title'] ?></div>
                                </div>
                            <? endforeach; ?>
                        </div>
                    </div>
                    <div class="swiper-container tabs-content tabs-content--slider">
                        <div class="swiper-wrapper">
                            <? foreach ($tabs as $tab): ?>
                                <div class="swiper-slide">
                                    <div class="tabs-content__item">
                                        <div class="tabs-content__left-side">
                                            <div class="tabs-content__desc"><?= $tab['desc'] ?></div>
                                            <? if (!empty($tab['btn_text'])) { ?>
                                                <a target="_blank" href="<?= $tab['btn_link'] ?>"
                                                   class="site-btn tabs-content__btn <?= $btn_class_in_tabs_random ?>"><?= $tab['btn_text'] ?></a>
                                            <? } ?>
                                        </div>
                                        <div class="tabs-content__right-side">
                                            <img alt="img" src="<?= $tab['image'] ?>">
                                        </div>
                                    </div>
                                </div>
                            <? endforeach; ?>
                        </div>
                        <div class="swiper-pagination tabs-content__pagination"></div>
                    </div>
                </div>
            </div>
            <?
        });
    //Chess block
    Block::make('Chess')
        ->add_fields(array(
            Field::make('text', 'tabs_id', 'Block ID'),
            Field::make('select', 'tabs_margin', 'Margin mode')
                ->set_options(array(
                    'no-margin' => 'no-margin',
                    'margin' => 'Margin',
                    'margin-top' => 'Margin top',
                    'margin-bottom' => 'Margin bottom',
                )),
            Field::make('color', 'btn_text_color', 'Button text color in chess'),
            Field::make('color', 'btn_hover_text_color', 'Button:hover text color in chess'),
            Field::make('color', 'btn_background_color', 'Button background color in chess'),
            Field::make('color', 'btn_hover_background_color', 'Button:hover background color in chess'),
            Field::make('color', 'btn_border_color', 'Button border color in chess'),
            Field::make('color', 'btn_hover_border_color', 'Button:hover border color in chess'),
            Field::make('complex', 'items', 'Chess items')
                ->set_collapsed(true)
                ->add_fields(array(
                    Field::make('complex', 'tabs', 'Slides')
                        ->set_collapsed(true)
                        ->add_fields(array(
                            Field::make('text', 'title', 'Title'),
                            Field::make('color', 'title_text_color', 'Title color'),
                            Field::make('textarea', 'desc', 'Description'),
                            Field::make('text', 'btn_text', 'Button text'),
                            Field::make('text', 'btn_link', 'Button link'),
                            Field::make('image', 'image', 'Image')->set_type(array('image'))->set_value_type('url'),
                            Field::make('image', 'image_after', 'Image after')->set_type(array('image'))->set_value_type('url'),
                        ))
                ))
        ))
        ->set_parent('carbon-fields/site-section')
        ->set_render_callback(function ($fields, $attributes, $inner_blocks) {
            $id = $fields['tabs_id'];
            $margin_mode = 'block--' . $fields['tabs_margin'];
            $tabs = $fields['tabs'];
            $btn_class_in_tabs_random = 'tabs_' . $id . '_btn_' . uniqid();

            ?>
            <div class="container">
                <style>
                    .<?=$btn_class_in_tabs_random?> {
                    <?=($fields['btn_text_color']) ? 'color:'.$fields['btn_text_color'].' !important;' : '' ?><?=($fields['btn_background_color']) ? 'background:'.$fields['btn_background_color'].' !important;' : '' ?><?=($fields['btn_border_color']) ? 'border-color: '.$fields['btn_border_color'].' !important;' : '' ?>
                    }

                    .<?=$btn_class_in_tabs_random?>:hover {
                    <?=($fields['btn_hover_text_color']) ? 'color:'.$fields['btn_hover_text_color'].' !important;' : '' ?><?=($fields['btn_hover_background_color']) ? 'background:'.$fields['btn_hover_background_color'].' !important;' : '' ?><?=($fields['btn_hover_border_color']) ? 'border-color: '.$fields['btn_hover_border_color'].' !important;' : '' ?>
                    }
                </style>
                <div
                    <? if (!empty($id)): ?>
                        id="<?= $id ?>"
                    <? endif; ?>
                        class="block <?= $margin_mode ?> tabs-1-block">
                    <?
                    $items = $fields['items'];
                    ?>
                    <? foreach ($items as $item): ?>
                        <div class="chess-items-container">
                            <div style="display:none" class="swiper-container tabs-nav">
                                <div class="swiper-wrapper">
                                    <? foreach ($item['tabs'] as $tab): ?>
                                        <div class="swiper-slide"
                                             <? if (sizeof($item['tabs']) < 3): ?>style="min-width: 49%;"<? endif; ?>>
                                            <div class="tabs-nav__text"><?= $tab['title'] ?></div>
                                        </div>
                                    <? endforeach; ?>
                                </div>
                            </div>
                            <div class="swiper-container tabs-content">
                                <div class="swiper-wrapper">
                                    <? foreach ($item['tabs'] as $tab): ?>
                                        <div class="swiper-slide">
                                            <div class="tabs-content__item">
                                                <div class="tabs-content__left-side">
                                                    <div style="color: <?= $tab['title_text_color'] ?>"
                                                         class="tabs-content__title"><?= $tab['title'] ?></div>
                                                    <div class="tabs-content__desc"><?= $tab['desc'] ?></div>
                                                    <? if (!empty($tab['btn_text'])) { ?>
                                                        <a itemscope itemtype="https://schema.org/Action"
                                                           itemprop="potentialAction"
                                                           itemref="target" target="_blank"
                                                           href="<?= $tab['btn_link'] . get_params_string() ?>"
                                                           class="site-btn tabs-content__btn <?= $btn_class_in_tabs_random ?>"><?= $tab['btn_text'] ?></a>
                                                        <meta itemprop="target"
                                                              content="<?= $tab['btn_link'] . get_params_string() ?>">
                                                    <? } ?>
                                                </div>
                                                <div class="tabs-content__right-side">
                                                    <? if (!empty($tab['image'] and empty($tab['image_after']))): ?>
                                                        <img alt="" src="<?= $tab['image'] ?>">
                                                    <? endif; ?>
                                                    <? if (!empty($tab['image'] and !empty($tab['image_after']))): ?>

                                                        <style>
                                                            .comparison-container {
                                                                position: relative;
                                                                overflow: hidden;
                                                                border-radius: 15px;
                                                                box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
                                                                cursor: grab;
                                                                user-select: none;

                                                                display: flex;
                                                                width: fit-content;
                                                                flex-direction: row-reverse;
                                                            }

                                                            .comparison-container img {
                                                                height: auto;
                                                                object-fit: contain;
                                                                pointer-events: none; /* Prevent image selection */
                                                                width: auto;
                                                            }

                                                            /* Overlay Image */
                                                            .comparison-top {
                                                                clip-path: inset(0 50% 0 0);
                                                                margin-left: -100%;
                                                            }

                                                            /* Draggable Handle */
                                                            .slider-handle {
                                                                position: absolute;
                                                                display: flex;
                                                                flex-direction: column;
                                                                justify-content: center;
                                                                align-items: center;
                                                                box-sizing: border-box;
                                                                height: 100%;
                                                                top: 0;
                                                                z-index: 5;

                                                                transform: translateX(-50%);
                                                            }
                                                            .slider-handle__control-line {
                                                                height: 50%;
                                                                width: 2px;
                                                                z-index: 6;
                                                            }
                                                            .slider-handle__control__circle {
                                                                width: 50px;
                                                                height: 50px;
                                                                box-sizing: border-box;
                                                                flex-shrink: 0;
                                                                border-radius: 50%;
                                                            }
                                                            .slider-handle__theme-wrapper {
                                                                width: 100%;
                                                                height: 100%;
                                                                display: flex;
                                                                justify-content: space-between;
                                                                align-items: center;
                                                                position: absolute;
                                                                z-index: 5;
                                                            }
                                                            .slider-handle__arrow-wrapper {
                                                                display: flex;
                                                                justify-content: center;
                                                                align-items: center;
                                                                transition: all 0.1s ease-out 0s;
                                                            }
                                                        </style>

                                                        <div class="image-compare comparison-container">
                                                            <img class="not-lazy comparison-top" loading="lazy" alt=""
                                                                 src="<?= $tab['image'] ?> itemscope itemtype=" https://schema.org/ImageObject"">
                                                            <img style="width:auto;" class="not-lazy" loading="lazy"
                                                                 alt=""
                                                                 src="<?= $tab['image_after'] ?> itemscope itemtype="
                                                                 https://schema.org/ImageObject"">
                                                            <div class="slider-handle" style="left: 50%">
                                                                <div class="slider-handle__control-line" style="width: 2px; background: rgb(255, 255, 255);"></div>
                                                                <div class="slider-handle__control__circle" style="backdrop-filter: blur(5px); border: 2px solid rgb(255, 255, 255);"></div>
                                                                <div class="slider-handle__theme-wrapper">
                                                                    <div class="slider-handle__arrow-wrapper" style="transform: translateX(5px);">
                                                                        <svg height="15" width="15" style="transform: scale(0.7) rotateZ(180deg); height: 20px; width: 20px;" xmlns="http://www.w3.org/2000/svg" data-name="Layer 1" viewBox="0 0 15 15">
                                                                            <path fill="transparent" stroke="#FFFFFF" stroke-linecap="round" stroke-width="3" d="M4.5 1.9L10 7.65l-5.5 5.4"></path>
                                                                        </svg>
                                                                    </div>
                                                                    <div class="slider-handle__arrow-wrapper" style="transform: translateX(-5px);">
                                                                        <svg height="15" width="15" style="transform: scale(0.7); rotateZ(0deg); height: 20px; width: 20px;" xmlns="http://www.w3.org/2000/svg" data-name="Layer 1" viewBox="0 0 15 15">
                                                                            <path fill="transparent" stroke="#FFFFFF" stroke-linecap="round" stroke-width="3" d="M4.5 1.9L10 7.65l-5.5 5.4"></path>
                                                                        </svg>
                                                                    </div>
                                                                </div>
                                                                <div class="slider-handle__control-line" style="width: 2px; background: rgb(255, 255, 255);"></div>
                                                            </div>
                                                        </div>

                                                        <script>
                                                          function updateParentWidth() {
                                                            const parents = document.querySelectorAll(".comparison-container");


                                                            parents.forEach((parent) => {
                                                              const child = parent.querySelector("img");

                                                              if (child && parent) {
                                                                parent.style.width = `${child.offsetWidth}px`;
                                                              }
                                                            });
                                                          }

                                                          // Run on load & on window resize
                                                          window.addEventListener("load", updateParentWidth);
                                                          window.addEventListener("resize", updateParentWidth);
                                                          document.querySelectorAll(".comparison-container").forEach((container) => {
                                                            const sliderHandle = container.querySelector(".slider-handle");
                                                            const topImage = container.querySelector(".comparison-top");

                                                            let isDragging = false;

                                                            function updateSliderPosition(x) {
                                                              let rect = container.getBoundingClientRect();
                                                              let offsetX = x - rect.left;
                                                              let percent = (offsetX / rect.width) * 100;
                                                              percent = Math.max(0, Math.min(100, percent));

                                                              topImage.style.clipPath = `inset(0 ${100 - percent}% 0 0)`;
                                                              sliderHandle.style.left = `${percent}%`;
                                                            }

                                                            function onMouseMove(e) {
                                                              if (isDragging) {
                                                                updateSliderPosition(e.clientX);
                                                              }
                                                            }

                                                            function onTouchMove(e) {
                                                              if (isDragging) {
                                                                updateSliderPosition(e.touches.item(0).clientX);
                                                              }
                                                            }

                                                            function onMouseUp() {
                                                              isDragging = false;
                                                              document.body.style.cursor = "default";

                                                              document.removeEventListener("mousemove", onMouseMove);
                                                              document.removeEventListener("mouseup", onMouseUp);

                                                              document.removeEventListener("touchmove", onTouchMove);
                                                              document.removeEventListener("touchend", onMouseUp);
                                                            }

                                                            sliderHandle.addEventListener("mousedown", (e) => {
                                                              e.preventDefault();
                                                              isDragging = true;
                                                              document.body.style.cursor = "grabbing";

                                                              document.addEventListener("mousemove", onMouseMove);
                                                              document.addEventListener("mouseup", onMouseUp);
                                                            });

                                                            sliderHandle.addEventListener("touchstart", (e) => {
                                                              e.preventDefault();

                                                              isDragging = true;
                                                              document.body.style.cursor = "grabbing";

                                                              document.addEventListener("touchmove", onTouchMove);
                                                              document.addEventListener("touchend", onMouseUp);
                                                            })

                                                            // Click anywhere on the container to instantly move slider
                                                            container.addEventListener("click", (e) => {
                                                              if (e.target !== sliderHandle) {
                                                                updateSliderPosition(e.clientX);
                                                              }
                                                            });
                                                          });
                                                        </script>
                                                    <? endif; ?>
                                                </div>
                                            </div>
                                        </div>
                                    <? endforeach; ?>
                                </div>
                                <div class="swiper-pagination tabs-content__pagination"></div>
                            </div>
                        </div>
                    <? endforeach; ?>
                </div>
            </div>
            <?
        });
    //
    Block::make('testimonials')
        ->add_fields(array(
            Field::make('text', 'testimonials_id', 'Block ID'),
            Field::make('select', 'testimonials_margin', 'Margin mode')
                ->set_options(array(
                    'no-margin' => 'no-margin',
                    'margin' => 'Margin',
                    'margin-top' => 'Margin top',
                    'margin-bottom' => 'Margin bottom',
                )),
            Field::make('complex', 'testimonials', 'Testimotionals')
                ->set_collapsed(true)
                ->add_fields(array(
                    Field::make('image', 'brand_logo', 'Brand logo')
                        ->set_type(array('image'))
                        ->set_value_type('url'),
                    Field::make('textarea', 'desc', 'Text'),
                    Field::make('image', 'client_avatar', 'Image')
                        ->set_type(array('image'))
                        ->set_value_type('url'),
                    Field::make('text', 'client_position', 'Client position'),
                    Field::make('text', 'client_name', 'Client Name')
                ))
        ))
        ->set_parent('carbon-fields/site-section')
        ->set_render_callback(function ($fields, $attributes, $inner_blocks) {
            $id = $fields['tabs_id'];
            $margin_mode = 'block--' . $fields['tabs_margin'];
            $testimonials = $fields['testimonials'];
            ?>
            <? if (!empty($testimonials)): ?>
                <div class="container">
                    <div
                        <? if (!empty($id)): ?>
                            id="<?= $id ?>"
                        <? endif; ?>
                            class="block <?= $margin_mode ?> testimonials-block">
                        <div class="swiper-container  testimonials-block__slider">
                            <div class="swiper-wrapper">
                                <? foreach ($testimonials as $testimonial): ?>
                                    <div class="swiper-slide testimonials-block__slide">
                                        <? if (!empty($testimonial['brand_logo'])): ?>
                                            <img alt="img" src="<?= $testimonial['brand_logo'] ?>"
                                                 class="testimonials-block__slide-logo">
                                        <? endif; ?>
                                        <div class="testimonials-block__slide-desc">«<?= $testimonial['desc'] ?>».</div>
                                        <div class="testimonials-block__slide-client-info">
                                            <? if (!empty($testimonial['client_avatar'])): ?>
                                                <img alt="img" class="testimonials-block__slide-client-avatar"
                                                     src="<?= $testimonial['client_avatar'] ?>">
                                            <? endif; ?>
                                            <div class="testimonials-block__slide-client-position"><?= $testimonial['client_position'] ?></div>
                                            <div class="testimonials-block__slide-client-name"><?= $testimonial['client_name'] ?></div>
                                        </div>
                                    </div>
                                <? endforeach; ?>
                            </div>
                            <div class="swiper-pagination testimonials-block__slider-pagination"></div>
                        </div>
                    </div>
                </div>
            <? endif; ?>
            <?
        });
    Block::make('New testimonials')
        ->add_fields(array(
            Field::make('text', 'new_testimonials_id', 'Block ID'),
            Field::make('select', 'new_testimonials_margin', 'Margin mode')
                ->set_options(array(
                    'no-margin' => 'no-margin',
                    'margin' => 'Margin',
                    'margin-top' => 'Margin top',
                    'margin-bottom' => 'Margin bottom',
                )),

            Field::make('complex', 'new_testimonials', 'Testimotionals')
                ->set_collapsed(true)
                ->add_fields(array(
                    Field::make('select', 'new_testimonials_rating', 'Rating')
                        ->set_options(array(
                            '4' => '4',
                            '4.5' => '4.5',
                            '5' => '5',
                        )),
                    Field::make('text', 'new_testimonials_rating_text', 'Rating text'),
                    Field::make('textarea', 'desc', 'Text'),
                    Field::make('image', 'brand_logo', 'Brand logo')->set_type(array('image'))->set_value_type('url'),
                    Field::make('image', 'client_avatar', 'Image')->set_type(array('image'))->set_value_type('url'),
                    Field::make('color', 'background_color', 'Background color'),
                    Field::make('text', 'client_position', 'Client position'),
                    Field::make('text', 'client_name', 'Client Name')
                ))
        ))
        ->set_parent('carbon-fields/site-section')
        ->set_render_callback(function ($fields, $attributes, $inner_blocks) {
            $id = $fields['new_testimonials_id'];
            $margin_mode = 'block--' . $fields['new_testimonials_margin'];
            $testimonials = $fields['new_testimonials'];

            ?>
            <? if (!empty($testimonials)):
                ?>
                <div class="container">
                    <div
                        <? if (!empty($id)): ?>
                            id="<?= $id ?>"
                        <? endif; ?>
                            class="block <?= $margin_mode ?> new-testimonials-block">

                        <div class="swiper-container  new-testimonials-block__slider">
                            <div class="swiper-wrapper">
                                <? foreach ($testimonials as $index => $testimonial): ?>
                                    <? $testimonialId = 'dialog-content-' . $index; ?>
                                    <? $background = $testimonial['background_color']; ?>

                                    <div itemprop="review" itemscope
                                         itemtype="https://schema.org/Review" <? if (!empty($background)): ?>
                                        style="background:<?= $background ?>"
                                    <? endif; ?> class="swiper-slide new-testimonials-block__slide">


                                        <div class="inline-rating">
                                            <? $rating = !empty($testimonial['new_testimonials_rating']) ? $testimonial['new_testimonials_rating'] : 0;
                                            $rating_text = !empty($testimonial['new_testimonials_rating_text']) ? $testimonial['new_testimonials_rating_text'] : 'not rated';
                                            $star_image = '';

                                            switch ($rating) {
                                                case 4:
                                                case 4.5:
                                                case 5:
                                                    $star_image = ($rating == 4) ? '4' : (($rating == 4.5) ? '4.5' : '5');
                                                    echo "<div itemprop=\"reviewRating\" itemscope itemtype=\"https://schema.org/Rating\"><img src=\"/public_html/wp-content/themes/orm/img/{$star_image} star.svg\" alt=\"{$rating} stars\"/></div>",
                                                        "<meta itemprop=\"worstRating\" content = \"1\">  <span itemprop=\"ratingValue\">" . $rating . "</span>   <span itemprop=\"bestRating\">5</span><div class=\"new-testimonials-block__slide-rating-text\">{$rating_text}</div>";
                                                    break;

                                                default:
                                                    echo "<img src='gray_stars.png' alt='not rated'/>";
                                                    break;
                                            } ?></div>


                                        <? $readmore = '<div>
                                        <div class="fancybox-readmore" id="' . $testimonialId . '">
                                        <div class="inline-rating">
                                            <div><img src="/public_html/wp-content/themes/orm/img/' . $star_image . ' star.svg" alt=\"{' . $rating . '} stars\"/></div>
                                            <div class="new-testimonials-block__slide-rating-text">' . $rating_text . '</div>
                                        </div>
                                        <div class="new-testimonials-block__slide-desc"  itemprop="reviewBody">'
                                            . $testimonial['desc'] .
                                            '</div>
                                        <div class="new-testimonials-block__slide-client-info">
										 <div class="new-testimonials-block__slide-client-name" itemprop="author">' . $testimonial['client_name'] . '</div>
										 <div class="new-testimonials-block__slide-client-position">' . $testimonial['client_position'] . '</div>
										 <div class="new-testimonials-block__slide-client-images">
										     <img class="new-testimonials-block__slide-client-avatar" src="' . $testimonial['client_avatar'] . '">
										 <a href=""></a>
										     <img  src="' . $testimonial['brand_logo'] . '" class="new-testimonials-block__slide-logo">
									     </div>
									     </div>
                                        </div>

                                            <p>
                                                <button class="read-more-button" data-fancybox data-src="#' . $testimonialId . '">Read more <svg xmlns="http://www.w3.org/2000/svg" width="24" height="30" viewBox="0 0 24 30" fill="none">
                                                    <path d="M7.5 13L11.5 17L15.5 13" stroke="#666666" stroke-width="1.5" stroke-linecap="square"/>
                                                </svg>
                                                </button>
                                            </p>
                                        </div>'; ?>

                                        <div class="new-testimonials-block__slide-desc">
                                            <?php
                                            $testimonial_desc = wp_strip_all_tags($testimonial['desc']); // Remove HTML tags
                                            $word_limit = 60; // Set the desired word limit
                                            $words = preg_split('/\s+/', $testimonial_desc); // Split text into words
                                            $excerpt_words = array_slice($words, 0, $word_limit); // Extract desired words
                                            $excerpt = implode(' ', $excerpt_words); // Join words back together

                                            echo $excerpt;

                                            if (count($words) > $word_limit) {
                                                echo '... ';
                                                echo $readmore; // Output the read more link/button
                                            }
                                            ?>
                                        </div>
                                        <div class="new-testimonials-block__slide-client-info">
                                            <div class="new-testimonials-block__slide-client-name"><?= $testimonial['client_name'] ?></div>
                                            <div class="new-testimonials-block__slide-client-position"><?= $testimonial['client_position'] ?></div>
                                            <div class="new-testimonials-block__slide-client-images"><? if (!empty($testimonial['client_avatar'])): ?>
                                                    <img class="new-testimonials-block__slide-client-avatar"
                                                         src="<?= $testimonial['client_avatar'] ?>">
                                                <? endif; ?>
                                                <a href=""></a>
                                                <? if (!empty($testimonial['brand_logo'])): ?>
                                                    <img src="<?= $testimonial['brand_logo'] ?>"
                                                         class="new-testimonials-block__slide-logo">
                                                <? endif; ?>
                                            </div>
                                        </div>
                                    </div>
                                <? endforeach; ?>
                            </div>
                            <div class="swiper-pagination new-testimonials-block__slider-pagination"></div>
                        </div>
                    </div>
                </div>
            <? endif; ?>
            <?
        });
    Block::make('Products slider')
        ->add_fields(array(
            Field::make('text', 'products_slider_id', 'Block ID'),
            Field::make('select', 'products_slider_margin', 'Margin mode')
                ->set_options(array(
                    'no-margin' => 'no-margin',
                    'margin' => 'Margin',
                    'margin-top' => 'Margin top',
                    'margin-bottom' => 'Margin bottom',
                )),
            Field::make('color', 'products_slider_background_color', 'Background color'),
            Field::make('text', 'products_slider_background_gradient', 'Gradient css rule'),
            Field::make('image', 'products_slider_logo', 'Logo')
                ->set_type(array('image'))
                ->set_value_type('url'),
            Field::make('text', 'products_slider_title', 'Title'),
            Field::make('text', 'products_slider_title_max_width', 'Title max width'),
            Field::make('color', 'products_slider_title_color', 'Title color'),
            Field::make('text', 'products_slider_btn_text', 'Button text'),
            Field::make('text', 'products_slider_btn_link', 'Button link'),
            Field::make('color', 'products_slider_btn_text_color', 'Button text color'),
            Field::make('color', 'products_slider_btn_hover_text_color', 'Button:hover text color'),
            Field::make('color', 'products_slider_btn_background_color', 'Button background color'),
            Field::make('color', 'products_slider_btn_hover_background_color', 'Button:hover background color'),
            Field::make('complex', 'products_slider', 'Products slider')
                ->set_collapsed(true)
                ->add_fields(array(
                    Field::make('text', 'link', 'Link'),
                    Field::make('color', 'background_color', 'Background color'),
                    Field::make('text', 'background_gradient', 'Gradient css rule'),
                    Field::make('image', 'logo', 'logo')
                        ->set_type(array('image'))
                        ->set_value_type('url'),
                    Field::make('text', 'desc', 'Description')
                ))
        ))
        ->set_parent('carbon-fields/site-section')
        ->set_render_callback(function ($fields, $attributes, $inner_blocks) {
            $id = $fields['products_slider_id'];
            $margin_mode = 'block--' . $fields['products_slider_margin'];
            $products_slider_logo = $fields['products_slider_logo'];
            $products_slider_title = $fields['products_slider_title'];
            $products_slider_title_max_width = $fields['products_slider_title_max_width'];
            $products_slider_btn_text = $fields['products_slider_btn_text'];
            $products_slider_btn_link = $fields['products_slider_btn_link'];
            $products = $fields['products_slider'];

            ?>
            <? if (!empty($products)): ?>
                <div class="container-big">
                    <div
                        <? if (!empty($id)): ?>
                            id="<?= $id ?>"
                        <? endif; ?>
                            class="block <?= $margin_mode ?> products-slider-block">
                        <div class="products-slider-block__content-wrapper">
                            <? if (!empty($products_slider_logo)): ?>
                                <img alt="img" class="products-slider-block__logo" src="<?= $products_slider_logo ?>"/>
                            <? endif; ?>
                            <? if ($products_slider_title): ?>
                                <div style="max-width: <?= $products_slider_title_max_width ?>"
                                     class="products-slider-block__title"><?= $products_slider_title ?></div>
                            <? endif; ?>
                            <? if (!empty($products_slider_btn_text) and !empty($products_slider_btn_link)): ?>
                                <a href="<?= $products_slider_btn_link . get_params_string() ?>"
                                   class="site-btn products-slider-block__btn"><?= $products_slider_btn_text ?></a>
                            <? endif; ?>
                        </div>
                        <div class="swiper-container  products-slider-block__slider" id="products-slider">
                            <div class="swiper-wrapper">
                                <? foreach ($products as $product): ?>
                                    <?
                                    $background = $product['background_gradient'];
                                    if (empty($background)) {
                                        $background = $product['background_color'];
                                    }
                                    ?>
                                    <a
                                        <? if (!empty($background)): ?>
                                            style="background:<?= $background ?>"
                                        <? endif; ?>
                                            target="_blank"
                                            href="<?= $product['link'] . get_params_string() ?>"
                                            class="swiper-slide products-slider-block__slide">
                                        <img alt="img" class="products-slider-block__slide-logo"
                                             src="<?= $product['logo'] ?>">
                                        <div class="products-slider-block__slide-desc"><?= $product['desc'] ?></div>
                                    </a>
                                <? endforeach; ?>
                            </div>
                            <div class="swiper-pagination products-slider-block__slider-pagination"></div>
                        </div>
                    </div>
                </div>
            <? endif; ?>
            <?
        });
    Block::make('contact__form', 'Contact form')
        ->add_fields(array(
            Field::make('text', 'contact_form_id', 'Block ID'),
            Field::make('select', 'contact_form_margin', 'Margin mode')
                ->set_options(array(
                    'no-margin' => 'no-margin',
                    'margin' => 'Margin',
                    'margin-top' => 'Margin top',
                    'margin-bottom' => 'Margin bottom',
                )),
            Field::make('text', 'contact_form_button_text', 'Button text'),
            Field::make('text', 'contact_form_success_msg', 'Form success submit message'),
            Field::make('text', 'contact_form_error_msg', 'Form error submit message'),
            Field::make('image', 'contact_form_info_img', 'Form info image')
                ->set_type(array('image'))
                ->set_value_type('url'),
            Field::make('text', 'contact_form_info_text', 'Form info text')
        ))
        ->set_parent('carbon-fields/site-section')
        ->set_render_callback(function ($fields, $attributes, $inner_blocks) {
            $id = $fields['contact_form_id'];
            $margin_mode = 'block--' . $fields['contact_form_margin'];
            $btn_text = $fields['contact_form_button_text'];
            if (empty($btn_text)) {
                $btn_text = 'Request Demo';
            }
            $info_text = $fields['contact_form_info_text'];
            $info_img = $fields['contact_form_info_img'];
            $contact_form_success_msg = $fields['contact_form_success_msg'];
            $contact_form_error_msg = $fields['contact_form_error_msg'];
            ?>
            <div class="container">
                <div
                    <? if (!empty($id)): ?>
                        id="<?= $id ?>"
                    <? endif; ?>
                        class="block <?= $margin_mode ?> contact-form-block">
                    <form data-succsess-text="<?= $contact_form_success_msg ?>"
                          data-error-text="<?= $contact_form_error_msg ?>" class="contact-form-block__form gform">
                        <div class="contact-form-block__left-side">
                            <input type="text" name="first-name" placeholder="First Name" pattern="[^0-9]+" required
                                   autocomplete="off">
                            <input type="text" name="last-name" placeholder="Last Name" pattern="[^0-9]+" required
                                   autocomplete="off">
                            <input type="email" name="email" placeholder="Email Address" required autocomplete="off">
                            <input type="tel" name="phone" placeholder="Phone Number" pattern="(\+?\d[- .]*){7,13}"
                                   required autocomplete="off">
                        </div>
                        <div class="contact-form-block__right-side">
                            <select name="type" required>
                                <option disabled selected>Are you brand or retailer?</option>
                                <option value="brand">Brand</option>
                                <option value="retailer">Retailer</option>
                            </select>
                            <input type="text" name="company-name" placeholder="Company Name" required
                                   autocomplete="off">
                            <input type="text" name="job-title" placeholder="Job Title" required autocomplete="off">
                            <input type="hidden" name="section" value="contact-form">
                            <input type="hidden" name="site" value="24orm">
                            <input type="hidden" name="lead-name" value="24orm | 24ttl">
                            <input type="hidden" name="utm_capmaign" value="<?= $_GET['utm_capmaign'] ?>">
                            <input type="hidden" name="utm_medium" value="<?= $_GET['utm_medium'] ?>">
                            <input type="hidden" name="utm_source" value="<?= $_GET['utm_source'] ?>">
                            <input type="hidden" name="utm_content" value="<?= $_GET['utm_content'] ?>">
                            <input type="hidden" name="utm_term" value="<?= $_GET['utm_term'] ?>">
                            <input type="hidden" name="type-request" value="Заявка">
                            <input type="hidden" name="action" value="contact_form">
                            <button class="site-btn contact-form-block__form-btn"
                                    type="submit"><?= $btn_text ?></button>
                        </div>
                        <div class="contact-form-block__form-status"></div>
                    </form>
                    <? if (!empty($info_img or $info_text)): ?>
                        <div class="contact-form-block__form-info">
                            <? if (!empty($info_img)): ?>
                                <img alt="img" class="contact-form-block__form-info-img" src="<?= $info_img ?>">
                            <? endif; ?>
                            <? if (!empty($info_text)): ?>
                                <div class="contact-form-block__form-info-content"><?= $info_text ?></div>
                            <? endif; ?>
                        </div>
                    <? endif; ?>
                </div>
            </div>
            <?
        });
    Block::make('Tabs with images')
        ->add_fields(array(
            Field::make('text', 'tabs_2_id', 'Block ID'),
            Field::make('select', 'tabs_2_margin', 'Margin mode')
                ->set_options(array(
                    'no-margin' => 'no-margin',
                    'margin' => 'Margin',
                    'margin-top' => 'Margin top',
                    'margin-bottom' => 'Margin bottom',
                )),
            Field::make('complex', 'tabs_2', 'Tabs')
                ->set_collapsed(true)
                ->add_fields(array(
                    Field::make('text', 'title', 'Tab title'),
                    Field::make('complex', 'images', 'Images')
                        ->set_collapsed(true)
                        ->add_fields(array(
                            Field::make('image', 'image', 'Image')
                                ->set_type(array('image'))
                                ->set_value_type('url'),
                        ))
                ))
        ))
        ->set_parent('carbon-fields/site-section')
        ->set_render_callback(function ($fields, $attributes, $inner_blocks) {
            $id = $fields['tabs_2_id'];
            $margin_mode = 'block--' . $fields['tabs_2_margin'];
            $tabs = $fields['tabs_2'];
            ?>
            <? if (!empty($tabs)): ?>
                <div class="container">
                    <div
                        <? if (!empty($id)): ?>
                            id="<?= $id ?>"
                        <? endif; ?>
                            class="block <?= $margin_mode ?> tabs-2-block">
                        <div class="swiper-container tabs-2-nav">
                            <div class="swiper-wrapper">
                                <? foreach ($tabs as $tab): ?>
                                    <div class="swiper-slide">
                                        <div class="tabs-nav__text"><?= $tab['title'] ?></div>
                                    </div>
                                <? endforeach; ?>
                            </div>
                        </div>
                        <div class="swiper-container tabs-2-content">
                            <div class="swiper-wrapper">
                                <? foreach ($tabs as $tab): ?>
                                    <div class="swiper-slide">
                                        <div class="swiper-container tabs-2-content__slider">
                                            <div class="swiper-wrapper">
                                                <? foreach ($tab['images'] as $item): ?>
                                                    <div class="swiper-slide swiper-slide--rounded">
                                                        <img alt="img" src="<?= $item['image'] ?>">
                                                    </div>
                                                <? endforeach; ?>
                                            </div>
                                            <div class="swiper-pagination tabs-2-content__slider-pagination"></div>
                                        </div>
                                    </div>
                                <? endforeach; ?>
                            </div>
                        </div>
                    </div>
                </div>
            <? endif; ?>
            <?
        });

    Block::make('Before After')
        ->add_fields(array(
            Field::make('text', 'content_tabs_id', 'Block ID'),
            Field::make('select', 'content_tabs_margin', 'Margin mode')
                ->set_options(array(
                    'no-margin' => 'no-margin',
                    'margin' => 'Margin',
                    'margin-top' => 'Margin top',
                    'margin-bottom' => 'Margin bottom',
                )),
            Field::make('text', 'title', 'Tab title'),
            Field::make('image', 'image_before', 'Image before')->set_type(array('image'))->set_value_type('url'),
            Field::make('image', 'image_after', 'Image after')->set_type(array('image'))->set_value_type('url'),
            Field::make('textarea', 'description', 'Description'),
            Field::make('text', 'btn_text', 'Button text'),
            Field::make('text', 'btn_link', 'Button link'),
            Field::make('text', 'before_text', 'Before text'),
            Field::make('text', 'after_text', 'After text')

        ))
        ->set_parent('carbon-fields/site-section')
        ->set_render_callback(function ($fields, $attributes, $inner_blocks) {
            $id = $fields['content_tabs_id'];
            $margin_mode = 'block--' . $fields['content_tabs_margin'];
            $tabs = $fields['image_compare_content_tabs'];

            ?>
            <div class="container">
                <div
                    <? if (!empty($id)): ?>
                        id="<?= $id ?>"
                    <? endif; ?>
                        class="block <?= $margin_mode ?> content-tabs-block">
                    <?
                    $image_after = $fields['image_before'];
                    $image_before = $fields['image_after'];
                    $description = $fields['description'];
                    $btn_text = $fields['btn_text'];
                    $btn_link = $fields['btn_link'];
                    $before_text = $fields['before_text'];
                    $after_text = $fields['after_text'];
                    ?>
                    <div class="swiper-slide before-after-block">
                        <div class="before-after__columns">
                            <div class="before-after__column-desc"><?= $description ?></div>
                            <? if (!empty($btn_text) and !empty($btn_link)): ?>
                                <a href="<?= $btn_link ?>" target="_blank"
                                   class="site-btn before-after-content__btn"><?= $btn_text ?></a>
                            <? endif; ?>
                        </div>
                        <div class="before-after__content-wrapper">
                            <div class="image_compare-block"><? if (!empty($image_after) and !empty($image_before)): ?>

                                    <style>
                                        .comparison-container {
                                            position: relative;
                                            overflow: hidden;
                                            border-radius: 15px;
                                            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
                                            cursor: grab;
                                            user-select: none;

                                            display: flex;
                                            width: fit-content;
                                            flex-direction: row-reverse;
                                        }

                                        .comparison-container img {
                                            height: auto;
                                            object-fit: contain;
                                            pointer-events: none; /* Prevent image selection */
                                            width: auto;
                                        }

                                        /* Overlay Image */
                                        .comparison-top {
                                            clip-path: inset(0 50% 0 0);
                                            margin-left: -100%;
                                        }

                                        /* Draggable Handle */
                                        .slider-handle {
                                            position: absolute;
                                            display: flex;
                                            flex-direction: column;
                                            justify-content: center;
                                            align-items: center;
                                            box-sizing: border-box;
                                            height: 100%;
                                            top: 0;
                                            z-index: 5;

                                            transform: translateX(-50%);
                                        }
                                        .slider-handle__control-line {
                                            height: 50%;
                                            width: 2px;
                                            z-index: 6;
                                        }
                                        .slider-handle__control__circle {
                                            width: 50px;
                                            height: 50px;
                                            box-sizing: border-box;
                                            flex-shrink: 0;
                                            border-radius: 50%;
                                        }
                                        .slider-handle__theme-wrapper {
                                            width: 100%;
                                            height: 100%;
                                            display: flex;
                                            justify-content: space-between;
                                            align-items: center;
                                            position: absolute;
                                            z-index: 5;
                                        }
                                        .slider-handle__arrow-wrapper {
                                            display: flex;
                                            justify-content: center;
                                            align-items: center;
                                            transition: all 0.1s ease-out 0s;
                                        }
                                    </style>

                                    <div class="image-compare comparison-container">
                                        <? if (!empty($image_after)): ?>
                                            <? $image_after = ImageResizeWordPress::resizeWidthWebp($image_after, 1450) ?>
                                            <img loading="lazy" width="1050" height="700" alt="img"
                                                 class="before-after__img comparison-top not-lazy" src="<?= $image_after ?>">
                                        <? endif; ?>
                                        <? if (!empty($image_before)): ?>
                                            <? $image_before = ImageResizeWordPress::resizeWidthWebp($image_before, 1450) ?>
                                            <img loading="lazy" width="1050" height="700" alt="img"
                                                 class="before-after__img not-lazy" src="<?= $image_before ?>">
                                        <? endif; ?>
                                        <div class="slider-handle" style="left: 50%">
                                            <div class="slider-handle__control-line" style="width: 2px; background: rgb(255, 255, 255);"></div>
                                            <div class="slider-handle__control__circle" style="backdrop-filter: blur(5px); border: 2px solid rgb(255, 255, 255);"></div>
                                            <div class="slider-handle__theme-wrapper">
                                                <div class="slider-handle__arrow-wrapper" style="transform: translateX(5px);">
                                                    <svg height="15" width="15" style="transform: scale(0.7) rotateZ(180deg); height: 20px; width: 20px;" xmlns="http://www.w3.org/2000/svg" data-name="Layer 1" viewBox="0 0 15 15">
                                                        <path fill="transparent" stroke="#FFFFFF" stroke-linecap="round" stroke-width="3" d="M4.5 1.9L10 7.65l-5.5 5.4"></path>
                                                    </svg>
                                                </div>
                                                <div class="slider-handle__arrow-wrapper" style="transform: translateX(-5px);">
                                                    <svg height="15" width="15" style="transform: scale(0.7); rotateZ(0deg); height: 20px; width: 20px;" xmlns="http://www.w3.org/2000/svg" data-name="Layer 1" viewBox="0 0 15 15">
                                                        <path fill="transparent" stroke="#FFFFFF" stroke-linecap="round" stroke-width="3" d="M4.5 1.9L10 7.65l-5.5 5.4"></path>
                                                    </svg>
                                                </div>
                                            </div>
                                            <div class="slider-handle__control-line" style="width: 2px; background: rgb(255, 255, 255);"></div>
                                        </div>
                                    </div>

                                    <script>
                                      function updateParentWidth() {
                                        const parents = document.querySelectorAll(".comparison-container");


                                        parents.forEach((parent) => {
                                          const child = parent.querySelector("img");

                                          if (child && parent) {
                                            parent.style.width = `${child.offsetWidth}px`;
                                          }
                                        });
                                      }

                                      // Run on load & on window resize
                                      window.addEventListener("load", updateParentWidth);
                                      window.addEventListener("resize", updateParentWidth);
                                      document.querySelectorAll(".comparison-container").forEach((container) => {
                                        const sliderHandle = container.querySelector(".slider-handle");
                                        const topImage = container.querySelector(".comparison-top");

                                        let isDragging = false;

                                        function updateSliderPosition(x) {
                                          let rect = container.getBoundingClientRect();
                                          let offsetX = x - rect.left;
                                          let percent = (offsetX / rect.width) * 100;
                                          percent = Math.max(0, Math.min(100, percent));

                                          topImage.style.clipPath = `inset(0 ${100 - percent}% 0 0)`;
                                          sliderHandle.style.left = `${percent}%`;
                                        }

                                        function onMouseMove(e) {
                                          if (isDragging) {
                                            updateSliderPosition(e.clientX);
                                          }
                                        }

                                        function onTouchMove(e) {
                                          if (isDragging) {
                                            updateSliderPosition(e.touches.item(0).clientX);
                                          }
                                        }

                                        function onMouseUp() {
                                          isDragging = false;
                                          document.body.style.cursor = "default";

                                          document.removeEventListener("mousemove", onMouseMove);
                                          document.removeEventListener("mouseup", onMouseUp);

                                          document.removeEventListener("touchmove", onTouchMove);
                                          document.removeEventListener("touchend", onMouseUp);
                                        }

                                        sliderHandle.addEventListener("mousedown", (e) => {
                                          e.preventDefault();
                                          isDragging = true;
                                          document.body.style.cursor = "grabbing";

                                          document.addEventListener("mousemove", onMouseMove);
                                          document.addEventListener("mouseup", onMouseUp);
                                        });

                                        sliderHandle.addEventListener("touchstart", (e) => {
                                          e.preventDefault();

                                          isDragging = true;
                                          document.body.style.cursor = "grabbing";

                                          document.addEventListener("touchmove", onTouchMove);
                                          document.addEventListener("touchend", onMouseUp);
                                        })

                                        // Click anywhere on the container to instantly move slider
                                        container.addEventListener("click", (e) => {
                                          if (e.target !== sliderHandle) {
                                            updateSliderPosition(e.clientX);
                                          }
                                        });
                                      });
                                    </script>
                                <? endif; ?>
                                <div class="bottom-left"><?= $before_text ?></div>
                                <div class="bottom-right"><?= $after_text ?></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?
        });


    Block::make('Tabbed Chess')
        ->add_fields(array(
            Field::make('text', 'chess_tabs_id', 'Block ID'),
            Field::make('select', 'chess_tabs_margin', 'Margin mode')
                ->set_options(array(
                    'no-margin' => 'no-margin',
                    'margin' => 'Margin',
                    'margin-top' => 'Margin top',
                    'margin-bottom' => 'Margin bottom',
                )),
            Field::make('text', 'left-chess-title1', 'Left Chess title 1'),
            Field::make('text', 'left-desc1', 'Left Description 1'),
            Field::make('text', 'right-chess-title1', 'Right Chess title 1'),
            Field::make('text', 'right-desc1', 'Right Description 1'),
            Field::make('text', 'left-chess-title2', 'Left Chess title 2'),
            Field::make('text', 'left-desc2', 'Left Description 2'),
            Field::make('text', 'right-chess-title2', 'Right Chess title 2'),
            Field::make('text', 'right-desc2', 'Right Description 2'),
            Field::make('text', 'chess-btn_text', 'Button text'),
            Field::make('text', 'chess-btn_link', 'Button link'),
            Field::make('complex', 'contents', 'Contents')
                ->set_collapsed(true)
                ->add_fields(array(
                    Field::make('text', 'title', 'Tab title'),
                    Field::make('image', 'chess-image1', 'Image 1')->set_type(array('image'))->set_value_type('url'),
                    Field::make('image', 'chess-image2', 'Image 2')->set_type(array('image'))->set_value_type('url'),
                    Field::make('image', 'chess-image3', 'Image 3')->set_type(array('image'))->set_value_type('url'),
                    Field::make('image', 'chess-image4', 'Image 4')->set_type(array('image'))->set_value_type('url'),

                )),
        ))
        ->set_parent('carbon-fields/site-section')
        ->set_render_callback(function ($fields, $attributes, $inner_blocks) {
            $id = $fields['chess_tabs_id'];
            $margin_mode = 'block--' . $fields['chess_tabs_margin'];
            $tabs = $fields['contents']; ?>

            <div class="container">
                <div
                    <? if (!empty($id)): ?>
                        id="<?= $id ?>"
                    <? endif; ?>
                        class="block <?= $margin_mode ?> content-tabs-block">
                    <div class="swiper-container content-tabs-nav">
                        <div class="swiper-wrapper">
                            <? foreach ($tabs as $tab): ?>
                                <div class="swiper-slide">
                                    <div class="tabs-nav__text">
                                        <?= $tab['title'] ?>
                                    </div>
                                </div>
                            <? endforeach; ?>
                        </div>
                    </div>
                    <div class="swiper-container content-tabs-content">
                        <div class="swiper-wrapper">
                            <? foreach ($tabs as $tab): ?>
                                <div class="swiper-slide tabs-1-block">
                                    <div class="tabs-content__items-block chess-content__items-block">
                                        <div class="tabs-content__item chess-content__item">
                                            <div class=" chess-content-left-size">
                                                <div class="chess-content__title"
                                                     itemprop="name"><?= $fields['left-chess-title1'] ?></div>
                                                <div class="chess-content__desc"
                                                     itemprop="description"><?= $fields['left-desc1'] ?></div>
                                                <aitemscope
                                                ="" itemtype="https://schema.org/Action" itemprop="potentialAction"
                                                itemref="target" target="_blank" href="<?= $fields['chess-btn_link'] ?>"
                                                class="site-btn chess-content__btn"><?= $fields['chess-btn_text'] ?></a>
                                            </div>
                                            <div class="chess-content-right-size" itemscope
                                                 itemtype="https://schema.org/ImageObject">
                                                <img class="chess-block__img" src="<?= $tab['chess-image1'] ?>">
                                            </div>
                                        </div>
                                        <div class="tabs-content__item chess-content__item">
                                            <div class="chess-content-right-size" itemscope
                                                 itemtype="https://schema.org/ImageObject">
                                                <img class="chess-block__img" src="<?= $tab['chess-image2'] ?>">
                                            </div>
                                            <div class=" chess-content-left-size">
                                                <div class="chess-content__title"
                                                     itemprop="name"><?= $fields['right-chess-title1'] ?></div>
                                                <div class="chess-content__desc"
                                                     itemprop="description"><?= $fields['right-desc1'] ?></div>
                                                <a itemscope="" itemtype="https://schema.org/Action"
                                                   itemprop="potentialAction" itemref="target" target="_blank"
                                                   href="<?= $fields['chess-btn_link'] ?>"
                                                   class="site-btn chess-content__btn"><?= $fields['chess-btn_text'] ?></a>
                                            </div>
                                        </div>
                                        <div class="tabs-content__item chess-content__item">
                                            <div class=" chess-content-left-size">
                                                <div class="chess-content__title"
                                                     itemprop="name"><?= $fields['left-chess-title2'] ?></div>
                                                <div class="chess-content__desc"
                                                     itemprop="description"><?= $fields['left-desc2'] ?></div>
                                                <a itemscope="" itemtype="https://schema.org/Action"
                                                   itemprop="potentialAction" itemref="target" target="_blank"
                                                   href="<?= $fields['chess-btn_link'] ?>"
                                                   class="site-btn chess-content__btn"><?= $fields['chess-btn_text'] ?></a>
                                            </div>
                                            <div class="chess-content-right-size" itemscope
                                                 itemtype="https://schema.org/ImageObject">
                                                <img class="chess-block__img" src="<?= $tab['chess-image3'] ?>">
                                            </div>
                                        </div>
                                        <div class="tabs-content__item chess-content__item">
                                            <div class="chess-content-right-size " itemscope
                                                 itemtype="https://schema.org/ImageObject">
                                                <img class="chess-block__img" src="<?= $tab['chess-image4'] ?>">
                                            </div>
                                            <div class=" chess-content-left-size">
                                                <div class="chess-content__title"
                                                     itemprop="name"><?= $fields['right-chess-title2'] ?></div>
                                                <div class="chess-content__desc"
                                                     itemprop="description"><?= $fields['right-desc2'] ?></div>
                                                <a itemscope="" itemtype="https://schema.org/Action"
                                                   itemprop="potentialAction" itemref="target" target="_blank"
                                                   href="<?= $fields['chess-btn_link'] ?>"
                                                   class="site-btn chess-content__btn"><?= $fields['chess-btn_text'] ?></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <? endforeach; ?>
                        </div>
                    </div>
                </div>
            </div>
            <?
        });

    Block::make('Tabbed slider')
        ->add_fields(array(
            Field::make('text', 'slider_tabs_id', 'Block ID'),
            Field::make('select', 'slider_tabs_margin', 'Margin mode')
                ->set_options(array(
                    'no-margin' => 'no-margin',
                    'margin' => 'Margin',
                    'margin-top' => 'Margin top',
                    'margin-bottom' => 'Margin bottom',
                )),
            Field::make('complex', 'slider_tabs', 'Tabs')
                ->set_collapsed(true)
                ->add_fields(array(
                    Field::make('text', 'title', 'Tab title'),
                    Field::make('text', 'desc', 'Description'),
                    Field::make('complex', 'contents', 'Contents')
                        ->set_collapsed(true)
                        ->add_fields(array(
                            Field::make('image', 'slider-image', 'Image')->set_type(array('image'))->set_value_type('url'),

                        )),
                ))
        ))
        ->set_parent('carbon-fields/site-section')
        ->set_render_callback(function ($fields, $attributes, $inner_blocks) {
            $id = $fields['content_tabs_id'];
            $margin_mode = 'block--' . $fields['content_tabs_margin'];
            $tabs = $fields['slider_tabs'] ?>

            <div class="container">
                <div
                    <? if (!empty($id)): ?>
                        id="<?= $id ?>"
                    <? endif; ?>
                        class="block <?= $margin_mode ?> content-tabs-block">
                    <div class="swiper-container content-tabs-nav">
                        <div class="swiper-wrapper">
                            <? foreach ($tabs as $tab): ?>
                                <div class="swiper-slide">
                                    <div class="tabs-nav__text">
                                        <?= $tab['title'] ?>
                                    </div>
                                </div>
                            <? endforeach; ?>
                        </div>
                    </div>
                    <div class="swiper-container content-tabs-content">
                        <div class="swiper-wrapper ">
                            <? foreach ($tabs as $tab): ?>
                                <div class="swiper-slide">
                                    <div class="swiper-container tabbed-thumbs-gallery">
                                        <div class="swiper-wrapper">
                                            <? foreach ($tab['contents'] as $content): ?>
                                                <div class="swiper-slide">
                                                    <img src="<?= $content['slider-image'] ?>"/>
                                                </div>
                                            <? endforeach; ?>
                                        </div>
                                        <div class="swiper-pagination tabbed-thumbs-gallery-pagination"></div>
                                    </div>
                                </div>
                            <? endforeach; ?>
                        </div>
                    </div>
                </div>
            </div>


            <?

        });


    //agregator
    Block::make('Anchor tabs')
        ->add_fields(array(
            Field::make('text', 'content_tabs_id', 'Block ID'),
            Field::make('select', 'content_tabs_margin', 'Margin mode')
                ->set_options(array(
                    'no-margin' => 'no-margin',
                    'margin' => 'Margin',
                    'margin-top' => 'Margin top',
                    'margin-bottom' => 'Margin bottom',
                )),
            Field::make('complex', 'tools_category', 'Tools Category')
                ->add_fields(array(
                    Field::make('text', 'anchor_id', 'Anchor ID')->set_help_text('This ID will be used for anchor navigation.'),
                    Field::make('text', 'title', 'Title'),
                    Field::make('complex', 'tools_list', 'Tools List')
                        ->add_fields(array(
                            Field::make('text', 'title', 'Title'),
                            Field::make('text', 'link', 'Link'),
                            Field::make('textarea', 'description', 'Description'),
                            Field::make('image', 'image', 'Image')->set_value_type('url'),
                            Field::make('text', 'is_free', 'Label Text'),
                            Field::make('color', 'background_color', 'Background Color'),
                            Field::make('color', 'text_color', 'Text Color'),
                        )),
                )),
        ))
        ->set_parent('carbon-fields/site-section')
        ->set_render_callback(function ($fields, $attributes, $inner_blocks) {
            $id = $fields['content_tabs_id'];
            $margin_mode = 'block--' . $fields['content_tabs_margin'];
            $categories = $fields['tools_category'];
            ?>
            <div class="container">
                <div <? if (!empty($id)): ?>
                    id="<?= $id ?>"
                <? endif; ?>
                        class="block <?= $margin_mode ?>">
                    <div class="tools-wrapper">
                        <div class="tools-category">
                            <? foreach ($categories as $category): ?>
                                <div class="tools_category_class">
                                    <a class="tools_link"
                                       href="#<?= $category['anchor_id'] ?>"><?= $category['title'] ?></a>
                                </div>
                            <? endforeach; ?>
                        </div>
                    </div>
                    <div class="anchor-section">
                        <? foreach ($categories as $category): ?>
                            <div id="<?= $category['anchor_id'] ?>">
                                <h3 class="text_sections"><?= $category['title'] ?></h3>
                                <? $tools = $category['tools_list']; ?>
                                <div class="resources-grid-wrapper">
                                    <? foreach ($tools as $tool): ?>
                                        <div class="tools_list_item">
                                            <a href="<?= $tool['link'] ?>" target="_blank"
                                               class="resource-tile-container">
                                                <img class="resource-image" src="<?= $tool['image'] ?>"/>
                                                <div class="resource-tile-bottom">
                                                    <div class="resource-tile-content">
                                                        <h3 class="text__tool-tile-heading"><?= $tool['title'] ?></h3>
                                                        <p class="resource-description"><?= $tool['description'] ?></p>
                                                    </div>
                                                    <span class="resource-tag"
                                                          style="color:<?= $tool['text_color'] ?>; background-color:<?= $tool['background_color'] ?>">
                                                <?= $tool['is_free'] ?>
                                            </span>
                                                </div>
                                            </a>
                                        </div>
                                    <? endforeach; ?>
                                </div>

                            </div>
                        <? endforeach; ?>
                    </div>
                </div>
            </div>


            <?

        });


    //Content tabs
    Block::make('Content tabs')
        ->add_fields(array(
            Field::make('text', 'content_tabs_id', 'Block ID'),
            Field::make('select', 'content_tabs_margin', 'Margin mode')
                ->set_options(array(
                    'no-margin' => 'no-margin',
                    'margin' => 'Margin',
                    'margin-top' => 'Margin top',
                    'margin-bottom' => 'Margin bottom',
                )),
            Field::make('select', 'content_tabs_type', 'Content type')
                ->set_options(array(
                    'video' => 'YouTube Video',
                    'image-compare' => 'Image compare',
                    'slider' => 'Slider',
                )),
            Field::make('complex', 'video_content_tabs', 'Tabs')
                ->set_conditional_logic(array(
                    array(
                        'field' => 'content_tabs_type',
                        'value' => 'video',
                        'compare' => '=',
                    )
                ))
                ->set_collapsed(true)
                ->add_fields(array(
                    Field::make('text', 'title', 'Tab title'),
                    Field::make('image', 'icon', 'Tab icon')->set_value_type('url'),
                    Field::make('oembed', 'yt_oembed', 'Youtube URL'),
                )),
            Field::make('complex', 'image_compare_content_tabs', 'Tabs')
                ->set_conditional_logic(array(
                    array(
                        'field' => 'content_tabs_type',
                        'value' => 'image-compare',
                        'compare' => '=',
                    )
                ))
                ->set_collapsed(true)
                ->add_fields(array(
                    Field::make('text', 'title', 'Tab title'),
                    Field::make('image', 'icon', 'Tab icon')->set_value_type('url'),
                    Field::make('image', 'image_before', 'Image before')->set_type(array('image'))->set_value_type('url'),
                    Field::make('image', 'image_after', 'Image after')->set_type(array('image'))->set_value_type('url'),
                    Field::make('textarea', 'left-content', 'Column 1 text'),
                    Field::make('textarea', 'right-content', 'Column 2 text'),
                    Field::make('text', 'btn_text', 'Button text'),
                    Field::make('text', 'btn_link', 'Button link'),
                    Field::make('checkbox', 'btn_full_width', 'Full width button'),
                )),
            Field::make('complex', 'slider_tabs', 'Tabs')
                ->set_conditional_logic(array(
                    array(
                        'field' => 'content_tabs_type',
                        'value' => 'slider',
                        'compare' => '=',
                    )
                ))
                ->set_collapsed(true)
                ->add_fields(array(
                    Field::make('text', 'title', 'Tab title'),
                    Field::make('text', 'desc', 'Description'),
                    Field::make('complex', 'contents', 'Contents')
                        ->set_collapsed(true)
                        ->add_fields(array(
                            Field::make('image', 'slider-image', 'Image')->set_type(array('image'))->set_value_type('url'),

                        )),
                ))
        ))
        ->set_parent('carbon-fields/site-section')
        ->set_render_callback(function ($fields, $attributes, $inner_blocks) {
            $id = $fields['content_tabs_id'];
            $margin_mode = 'block--' . $fields['content_tabs_margin'];
            if ($fields['content_tabs_type'] == 'video') {
                $tabs = $fields['video_content_tabs'];
            }
            if ($fields['content_tabs_type'] == 'image-compare') {
                $tabs = $fields['image_compare_content_tabs'];
            }
            if ($fields['content_tabs_type'] == 'slider') {
                $tabs = $fields['slider_tabs'];
            }
            ?>
            <? if (!empty($tabs)): ?>
                <div class="container">
                    <div
                        <? if (!empty($id)): ?>
                            id="<?= $id ?>"
                        <? endif; ?>
                            class="block <?= $margin_mode ?> content-tabs-block">
                        <div class="swiper-container content-tabs-nav">
                            <div class="swiper-wrapper">
                                <? foreach ($tabs as $tab): ?>
                                    <div class="swiper-slide">
                                        <div class="tabs-nav__text">
                                            <? if (!empty($tab['icon'])): ?>
                                                <img style="margin-right: 15px;" src="<?= $tab['icon'] ?>"
                                                     alt="<?= $tab['title'] ?>">
                                            <? endif; ?>
                                            <?= $tab['title'] ?>
                                        </div>
                                    </div>
                                <? endforeach; ?>
                            </div>
                        </div>
                        <div class="swiper-container content-tabs-content">
                            <div class="swiper-wrapper">
                                <? if ($fields['content_tabs_type'] == 'video'): ?>
                                    <? foreach ($tabs as $tab): ?>
                                        <?
                                        $parts = parse_url($tab['yt_oembed']);
                                        parse_str($parts['query'], $query);
                                        ?>
                                        <div class="swiper-slide">
                                            <iframe style="aspect-ratio: 16 / 9;width: 100%;z-index:999;"
                                                    class="youtube-video"
                                                    src="//www.youtube.com/embed/<?= $query['v'] ?>??html5=1&enablejsapi=1&rel=0"
                                                    title="YouTube video player" frameborder="0"
                                                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                                    allowfullscreen></iframe>
                                        </div>
                                    <? endforeach; ?>
                                <? endif; ?>
                                <? if ($fields['content_tabs_type'] == 'image-compare'): ?>
                                    <? foreach ($tabs as $tab): ?>
                                        <?
                                        $image_after = $tab['image_before'];
                                        $image_before = $tab['image_after'];
                                        $left_content = $tab['left-content'];
                                        $right_content = $tab['right-content'];
                                        $btn_text = $tab['btn_text'];
                                        $btn_link = $tab['btn_link'];
                                        $full_width_btn = $tab['btn_full_width'];
                                        if (!empty($full_width_btn)) {
                                            $tab_btn_add_class = 'content-tabs-content__btn--full-width';
                                        }
                                        ?>
                                        <div class="swiper-slide" itemtype="https://schema.org/Product">
                                            <div class="gallery-block__content-wrapper">
                                                <? if (!empty($image_after) and !empty($image_before)): ?>

                                                    <style>
                                                        .comparison-container {
                                                            position: relative;
                                                            overflow: hidden;
                                                            border-radius: 15px;
                                                            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
                                                            cursor: grab;
                                                            user-select: none;

                                                            display: flex;
                                                            width: fit-content;
                                                            flex-direction: row-reverse;
                                                        }

                                                        .comparison-container img {
                                                            height: auto;
                                                            object-fit: contain;
                                                            pointer-events: none; /* Prevent image selection */
                                                            width: auto;
                                                        }

                                                        /* Overlay Image */
                                                        .comparison-top {
                                                            clip-path: inset(0 50% 0 0);
                                                            margin-left: -100%;
                                                        }

                                                        /* Draggable Handle */
                                                        .slider-handle {
                                                            position: absolute;
                                                            display: flex;
                                                            flex-direction: column;
                                                            justify-content: center;
                                                            align-items: center;
                                                            box-sizing: border-box;
                                                            height: 100%;
                                                            top: 0;
                                                            z-index: 5;

                                                            transform: translateX(-50%);
                                                        }
                                                        .slider-handle__control-line {
                                                            height: 50%;
                                                            width: 2px;
                                                            z-index: 6;
                                                        }
                                                        .slider-handle__control__circle {
                                                            width: 50px;
                                                            height: 50px;
                                                            box-sizing: border-box;
                                                            flex-shrink: 0;
                                                            border-radius: 50%;
                                                        }
                                                        .slider-handle__theme-wrapper {
                                                            width: 100%;
                                                            height: 100%;
                                                            display: flex;
                                                            justify-content: space-between;
                                                            align-items: center;
                                                            position: absolute;
                                                            z-index: 5;
                                                        }
                                                        .slider-handle__arrow-wrapper {
                                                            display: flex;
                                                            justify-content: center;
                                                            align-items: center;
                                                            transition: all 0.1s ease-out 0s;
                                                        }
                                                    </style>

                                                    <div class="image-compare comparison-container">
                                                        <? if (!empty($image_after)): ?>
                                                            <? $image_after = ImageResizeWordPress::resizeWidthWebp($image_after, 1450) ?>
                                                            <img loading="lazy" width="1050" height="700" alt="img"
                                                                 class="gallery-block__img comparison-top not-lazy"
                                                                 src="<?= $image_after ?>">
                                                        <? endif; ?>
                                                        <? if (!empty($image_before)): ?>
                                                            <? $image_before = ImageResizeWordPress::resizeWidthWebp($image_before, 1450) ?>
                                                            <img loading="lazy" width="1050" height="700" alt="img"
                                                                 class="gallery-block__img not-lazy"
                                                                 src="<?= $image_before ?>">
                                                        <? endif; ?>
                                                        <div class="slider-handle" style="left: 50%">
                                                            <div class="slider-handle__control-line" style="width: 2px; background: rgb(255, 255, 255);"></div>
                                                            <div class="slider-handle__control__circle" style="backdrop-filter: blur(5px); border: 2px solid rgb(255, 255, 255);"></div>
                                                            <div class="slider-handle__theme-wrapper">
                                                                <div class="slider-handle__arrow-wrapper" style="transform: translateX(5px);">
                                                                    <svg height="15" width="15" style="transform: scale(0.7) rotateZ(180deg); height: 20px; width: 20px;" xmlns="http://www.w3.org/2000/svg" data-name="Layer 1" viewBox="0 0 15 15">
                                                                        <path fill="transparent" stroke="#FFFFFF" stroke-linecap="round" stroke-width="3" d="M4.5 1.9L10 7.65l-5.5 5.4"></path>
                                                                    </svg>
                                                                </div>
                                                                <div class="slider-handle__arrow-wrapper" style="transform: translateX(-5px);">
                                                                    <svg height="15" width="15" style="transform: scale(0.7); rotateZ(0deg); height: 20px; width: 20px;" xmlns="http://www.w3.org/2000/svg" data-name="Layer 1" viewBox="0 0 15 15">
                                                                        <path fill="transparent" stroke="#FFFFFF" stroke-linecap="round" stroke-width="3" d="M4.5 1.9L10 7.65l-5.5 5.4"></path>
                                                                    </svg>
                                                                </div>
                                                            </div>
                                                            <div class="slider-handle__control-line" style="width: 2px; background: rgb(255, 255, 255);"></div>
                                                        </div>
                                                    </div>

                                                    <script>
                                                      function updateParentWidth() {
                                                        const parents = document.querySelectorAll(".comparison-container");


                                                        parents.forEach((parent) => {
                                                          const child = parent.querySelector("img");

                                                          if (child && parent) {
                                                            parent.style.width = `${child.offsetWidth}px`;
                                                          }
                                                        });
                                                      }

                                                      // Run on load & on window resize
                                                      window.addEventListener("load", updateParentWidth);
                                                      window.addEventListener("resize", updateParentWidth);
                                                      document.querySelectorAll(".comparison-container").forEach((container) => {
                                                        const sliderHandle = container.querySelector(".slider-handle");
                                                        const topImage = container.querySelector(".comparison-top");

                                                        let isDragging = false;

                                                        function updateSliderPosition(x) {
                                                          let rect = container.getBoundingClientRect();
                                                          let offsetX = x - rect.left;
                                                          let percent = (offsetX / rect.width) * 100;
                                                          percent = Math.max(0, Math.min(100, percent));

                                                          topImage.style.clipPath = `inset(0 ${100 - percent}% 0 0)`;
                                                          sliderHandle.style.left = `${percent}%`;
                                                        }

                                                        function onMouseMove(e) {
                                                          if (isDragging) {
                                                            updateSliderPosition(e.clientX);
                                                          }
                                                        }

                                                        function onTouchMove(e) {
                                                          if (isDragging) {
                                                            updateSliderPosition(e.touches.item(0).clientX);
                                                          }
                                                        }

                                                        function onMouseUp() {
                                                          isDragging = false;
                                                          document.body.style.cursor = "default";

                                                          document.removeEventListener("mousemove", onMouseMove);
                                                          document.removeEventListener("mouseup", onMouseUp);

                                                          document.removeEventListener("touchmove", onTouchMove);
                                                          document.removeEventListener("touchend", onMouseUp);
                                                        }

                                                        sliderHandle.addEventListener("mousedown", (e) => {
                                                          e.preventDefault();
                                                          isDragging = true;
                                                          document.body.style.cursor = "grabbing";

                                                          document.addEventListener("mousemove", onMouseMove);
                                                          document.addEventListener("mouseup", onMouseUp);
                                                        });

                                                        sliderHandle.addEventListener("touchstart", (e) => {
                                                          e.preventDefault();

                                                          isDragging = true;
                                                          document.body.style.cursor = "grabbing";

                                                          document.addEventListener("touchmove", onTouchMove);
                                                          document.addEventListener("touchend", onMouseUp);
                                                        })

                                                        // Click anywhere on the container to instantly move slider
                                                        container.addEventListener("click", (e) => {
                                                          if (e.target !== sliderHandle) {
                                                            updateSliderPosition(e.clientX);
                                                          }
                                                        });
                                                      });
                                                    </script>
                                                <? endif; ?>
                                            </div>

                                            <div class="gallery-block__columns " itemprop="description">
                                                <div class="gallery-block__column-left gallery-block__column-desc"><?= $left_content ?></div>
                                                <div class="gallery-block__column-right gallery-block__column-desc"><?= $right_content ?></div>
                                            </div>
                                            <? if (!empty($btn_text) and !empty($btn_link)): ?>
                                                <a itemscope="" itemtype="https://schema.org/Action"
                                                   itemprop="potentialAction" itemref="target" href="<?= $btn_link ?>"
                                                   target="_blank"
                                                   class="site-btn content-tabs-content__btn <?= $tab_btn_add_class ?>"><?= $btn_text ?></a>
                                            <? endif; ?>
                                        </div>
                                    <? endforeach; ?>
                                <? endif; ?>

                                <? if ($fields['content_tabs_type'] == 'slider'): ?>
                                    <?php foreach ($tabs as $tab) : ?>
                                        <div class="swiper-slide tabbed-slider-container">
                                            <div class="swiper-container tabbed-thumbs-gallery">
                                                <div class="swiper-wrapper">
                                                    <?php foreach ($tab['contents'] as $image) : ?>
                                                        <div class="swiper-slide tabbed-inner-slider">
                                                            <img alt="img" src="<?= $image['slider-image'] ?>">
                                                        </div>
                                                    <?php endforeach ?>
                                                </div>
                                                <div class="swiper-button-next thumbs-next-button"></div>
                                                <div class="swiper-button-prev thumbs-prev-button"></div>
                                                <div class="swiper-pagination tabbed-thumbs-gallery-pagination"></div>

                                            </div>
                                            <div class="thumbs-description">
                                                <?= $tab['desc'] ?>
                                            </div>
                                        </div>
                                    <?php endforeach; ?>


                                <? endif; ?>

                            </div>
                        </div>
                    </div>
                </div>
            <? endif; ?>
            <?
        });
    //


    Block::make('Blog media')
        ->add_fields(array(
            Field::make('text', 'blog_block_id', 'Block ID'),
            Field::make('select', 'blog_block_block_margin', 'Margin mode')->set_options(
                array(
                    'no-margin' => 'no-margin',
                    'margin' => 'Margin',
                    'margin-top' => 'Margin top',
                    'margin-bottom' => 'Margin bottom',
                )
            ),
        ))
        ->set_parent('carbon-fields/site-section')
        ->set_render_callback(function ($fields, $attributes, $inner_blocks) {
            $id = $fields['blog_block_id'];
            $margin_mode = 'block--' . $fields['blog_block_block_margin'];
            ?><?php
            $terms = get_terms(array(
                'taxonomy' => 'category',
                'orderby' => 'name',
                'order' => 'ASC',
                'hide_empty' => 1,
            ));
            $postsTab = new WP_Query([
                'nopaging'       => true,
                'post_type' => 'post',
            ]);
            ?>
            <?
            $title = carbon_get_theme_option('blog_block_title');
            $all_posts_label = carbon_get_theme_option('blog_block_all_posts_label');
            $read_more_label = carbon_get_theme_option('read_more_label');

            $hide_cat_nav = carbon_get_theme_option('hide_cat_nav');
            if ($hide_cat_nav == 'yes') {
                $css = 'padding-top: 0px';
            } else {
                $css = '';
            }

            ?>

            <div class="media__blog">
                <? if (!empty($title)): ?>
                    <h1 class="media__blog--title text-center"><?= $title ?></h1>
                <? endif; ?>
                <? if ($hide_cat_nav != 'yes'): ?>
                    <div class="media__tabs">
                        <div class="media__tabs--btns filter__btns">
                            <div class="filter--btns">
                                <div class="swiper-wrapper media__tabs--btns">
                                    <div class="swiper-slide fit-content">
                                        <? if (!empty($all_posts_label)): ?>
                                            <button type="button" class="media__tabs-btn active"
                                                    data-filter="all"><?= $all_posts_label ?></button>
                                        <? endif; ?>
                                    </div>
                                    <?php foreach ($terms as $category) : ?>
                                        <div class="swiper-slide fit-content">
                                            <button type="button" class="media__tabs-btn"
                                                    data-filter="<?= $category->slug; ?>">
                                                <?= $category->name; ?>
                                            </button>
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                <? endif; ?>
                <div style="<?= $css ?>" class="media__slider--tab">
                    <div class="container-big">
                        <div class="media__blog--inner mw100">
                            <div class="media__blog--slider__content">
                                <div class="media__blog--slider media--tabs__slider">
                                    <div class="swiper-wrapper">
                                        <?php if ($postsTab->have_posts()) : ?>
                                            <?php while ($postsTab->have_posts()):
                                                $postsTab->the_post();
                                                $type_card = carbon_get_post_meta(get_the_ID(), 'type_card');
                                                $tools_blog_img_id = carbon_get_post_meta(get_the_ID(), 'preview_tools_card');
                                                $blog_img_id = carbon_get_post_meta(get_the_ID(), 'preview_slider_full');

                                                if (!empty($tools_blog_img_id)) {
                                                    $blog_image = wp_get_attachment_image_url($tools_blog_img_id, 'full');
                                                } else {
                                                    $blog_image = wp_get_attachment_image_url($blog_img_id, 'full');
                                                }
                                                if ($type_card == 'card_news') {
                                                    $dataNews = "news";
                                                } elseif ($type_card == 'card_blog') {
                                                    $dataNews = "blog";
                                                } elseif ($type_card == 'card_press') {
                                                    $dataNews = "press";
                                                }
                                                ?>


                                                <?php if (!empty($dataNews)): ?>
                                                    <div class="tab  swiper-slide mw360" data-filter="<?= $dataNews ?>">
                                                        <div class="page__blog--item__content media__blog--item blog__block p32"
                                                             style="background: url('<?= $blog_image ?>') center no-repeat; background-size: cover;">
                                                            <div>
                                                                <div class="page__blog--news__date">
                                                                    <div class="card__tag-while"><?= the_category(); ?></div>
                                                                    <p class="page__blog--new__date"><?= get_the_date('F j, Y'); ?></p>
                                                                </div>
                                                                <h2 class="page__blog--item__title"><?= the_title(); ?></h2>
                                                            </div>
                                                            <div>
                                                                <div class="page__blog--item__subtitle"><?= get_short_desk(80); ?></div>
                                                                <a href="<?= get_permalink() ?>"
                                                                   class="page__blog--news__btn"><span
                                                                            class="page__blog--news__btn-inf-url"><?= the_title(); ?></span><?= $read_more_label ?>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                <? endif; ?>
                                            <?php endwhile; ?>
                                            <?php wp_reset_postdata(); ?>
                                        <?php endif; ?>
                                    </div>
                                    <div class="swiper-button-next media__blog--swiper__right">&rarr;</div>
                                    <div class="swiper-button-prev media__blog--swiper__left">&larr;</div>
                                </div>
                                <div class="media__tab--swiper-pagination media__blog--swiper-pagination"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?
        }
        );


    Block::make('Tabs with images (double)')
        ->add_fields(array(
            Field::make('text', 'tabs_3_id', 'Block ID'),
            Field::make('select', 'tabs_3_margin', 'Margin mode')
                ->set_options(array(
                    'no-margin' => 'no-margin',
                    'margin' => 'Margin',
                    'margin-top' => 'Margin top',
                    'margin-bottom' => 'Margin bottom',
                )),
            Field::make('complex', 'tabs_3', 'Tabs')
                ->set_collapsed(true)
                ->add_fields(array(
                    Field::make('text', 'title', 'Tab title'),
                    Field::make('complex', 'images', 'Images')
                        ->set_collapsed(true)
                        ->add_fields(array(
                            Field::make('image', 'image', 'Image')
                                ->set_type(array('image'))
                                ->set_value_type('url'),
                        ))
                ))
        ))
        ->set_parent('carbon-fields/site-section')
        ->set_render_callback(function ($fields, $attributes, $inner_blocks) {
            $id = $fields['tabs_3_id'];
            $margin_mode = 'block--' . $fields['tabs_3_margin'];
            $tabs = $fields['tabs_3'];
            ?>
            <? if (!empty($tabs)): ?>
                <div class="container" style="margin-top: 60px;">
                    <div
                        <? if (!empty($id)): ?>
                            id="<?= $id ?>"
                        <? endif; ?>
                            class="block <?= $margin_mode ?> tabs-3-block">
                        <div class="swiper-container tabs-3-nav">
                            <div class="swiper-wrapper">
                                <? foreach ($tabs as $tab): ?>
                                    <div class="swiper-slide">
                                        <div class="tabs-nav__text"><?= $tab['title'] ?></div>
                                    </div>
                                <? endforeach; ?>
                            </div>
                        </div>
                        <div class="swiper-container tabs-3-content">
                            <div class="swiper-wrapper">
                                <? foreach ($tabs as $tab): ?>
                                    <div class="swiper-slide">
                                        <div class="swiper-container tabs-3-content__slider">
                                            <div class="swiper-wrapper">
                                                <? foreach ($tab['images'] as $item): ?>
                                                    <div class="swiper-slide">
                                                        <img alt="img" src="<?= $item['image'] ?>">
                                                    </div>
                                                <? endforeach; ?>
                                            </div>
                                            <div class="swiper-pagination tabs-3-content__slider-pagination"></div>
                                        </div>
                                    </div>
                                <? endforeach; ?>
                            </div>
                        </div>
                    </div>
                </div>
            <? endif; ?>
            <?
        });
    Block::make('Team section')
        ->add_fields(array(
            Field::make('text', 'team_section_id', 'Section ID'),
            Field::make('image', 'team_section_bubble_image_1', 'Image')->set_width(20)
                ->set_type(array('image'))
                ->set_value_type('url'),
            Field::make('image', 'team_section_bubble_image_2', 'Image')->set_width(20)
                ->set_type(array('image'))
                ->set_value_type('url'),
            Field::make('image', 'team_section_bubble_image_3', 'Image')->set_width(20)
                ->set_type(array('image'))
                ->set_value_type('url'),
            Field::make('image', 'team_section_bubble_image_4', 'Image')->set_width(20)
                ->set_type(array('image'))
                ->set_value_type('url'),
            Field::make('image', 'team_section_bubble_image_5', 'Image')->set_width(20)
                ->set_type(array('image'))
                ->set_value_type('url'),
            Field::make('image', 'team_section_bubble_image_6', 'Image')->set_width(20)
                ->set_type(array('image'))
                ->set_value_type('url'),
            Field::make('image', 'team_section_bubble_image_7', 'Image')->set_width(20)
                ->set_type(array('image'))
                ->set_value_type('url'),
            Field::make('text', 'team_section_title', 'Section title'),
            Field::make('text', 'team_section_title_max_width', 'Max width (px)'),
            Field::make('text', 'team_section_desc', 'Section description'),
            Field::make('text', 'team_section_btn_text', 'Button text'),
            Field::make('text', 'team_section_btn_link', 'Button link'),
            Field::make('complex', 'team', 'Team')
                ->set_collapsed(true)
                ->add_fields(array(
                    Field::make('text', 'label', 'Team card label'),
                    Field::make('text', 'name', 'Name'),
                    Field::make('text', 'position', 'Position'),
                    Field::make('image', 'image', 'Image')
                        ->set_type(array('image'))
                        ->set_value_type('url'),
                ))

        ))
        ->set_render_callback(function ($fields, $attributes, $inner_blocks) {
            $id = $fields['team_section_id'];
            $team = $fields['team'];
            ?>
            <section
                    id="<?= $id ?>"
                    class="site-section team-section site-section--big-padding-top pt365">
                <div class="container">
                    <div class="team-section__content-wrapper relative">
                        <img alt="img" src="<?= $fields['team_section_bubble_image_1']; ?>" class="team__img--abs">
                        <img alt="img" src="<?= $fields['team_section_bubble_image_2']; ?>" class="team__img--abs">
                        <img alt="img" src="<?= $fields['team_section_bubble_image_3']; ?>" class="team__img--abs">
                        <img alt="img" src="<?= $fields['team_section_bubble_image_4']; ?>" class="team__img--abs">
                        <img alt="img" src="<?= $fields['team_section_bubble_image_5']; ?>" class="team__img--abs">
                        <img alt="img" src="<?= $fields['team_section_bubble_image_6']; ?>" class="team__img--abs">
                        <img alt="img" src="<?= $fields['team_section_bubble_image_7']; ?>" class="team__img--abs">
                        <div class="site-section__title team-section__title site-section__title--centered"><?= $fields['team_section_title'] ?></div>
                        <div class="site-section__desc team-section__desc site-section__desc--centered"><?= $fields['team_section_desc'] ?></div>
                        <a target="_blank" href="<?= $fields['team_section_btn_link'] . get_params_string() ?>"
                           class="site-btn team-section__btn mb160"><?= $fields['team_section_btn_text'] ?></a>
                    </div>
                    <div class="block team-section__slider swiper-container">
                        <div class="swiper-wrapper team-section__slider-wrapper">
                            <? foreach ($team as $member): ?>
                                <div class="swiper-slide team-section__slide">
                                    <img alt="img" class="team-section__slide-img" src="<?= $member['image'] ?>">
                                    <div class="team-section__slide-label"><?= $member['label'] ?></div>
                                    <div class="team-section__slide-member-name"><?= $member['name'] ?></div>
                                    <div class="team-section__slide-member-position"><?= $member['position'] ?></div>
                                </div>
                            <? endforeach; ?>
                        </div>
                        <div class="swiper-pagination team-section__slider-pagination"></div>
                    </div>
                </div>
            </section>
            <?
        });


    Block::make('Popup Bunner')
        ->add_fields(array(

            Field::make('text', 'popup_bunner_id', 'Section ID'),

            Field::make('text', 'popup_bunner_css_background', 'Css Background Tag'),

            Field::make('image', 'popup_bunner_logo', 'Logo Image')->set_width(20)
                ->set_type(array('image'))
                ->set_value_type('url'),
            Field::make('image', 'popup_banner_img', 'Banner Image')->set_width(20)
                ->set_type(array('image'))
                ->set_value_type('url'),
            Field::make('image', 'popup_banner_img--mobile', 'Banner Image Mobile')->set_width(20)
                ->set_type(array('image'))
                ->set_value_type('url'),

            Field::make('color', 'popup_banner_color1', 'Text First Line Color'),
            Field::make('text', 'popup_banner_text1', 'Banner Text First Line'),
            Field::make('color', 'popup_banner_color2', 'Text Second Line Color'),
            Field::make('text', 'popup_banner_text2', 'Banner Text Second Line'),
            Field::make('image', 'popup_modal_img', 'Banner Modal Image')->set_width(20)
                ->set_type(array('image'))
                ->set_value_type('url'),
            Field::make('image', 'modal_img--mobile', 'Banner Modal Image Mobile')->set_width(20)
                ->set_type(array('image'))
                ->set_value_type('url'),

            Field::make('color', 'popup_banner_modal_color1', 'Modal Title First Line Color'),
            Field::make('text', 'popup_banner_modal_text1', 'Modal Title First Line'),
            Field::make('color', 'popup_banner_modal_color2', 'Modal Title Second Line Color'),
            Field::make('text', 'popup_banner_modal_text2', 'Modal Title Second Line'),
            Field::make('color', 'popup_banner_modal_color3', 'Modal Text Line Color'),
            Field::make('text', 'popup_banner_modal_text3', 'Modal Banner Text Second Line'),
            Field::make('text', 'popup_banner_button_text', 'Button text'),
            Field::make('text', 'popup_banner_btn_link', 'Button link'),

        ))
        ->set_render_callback(function ($fields, $attributes, $inner_blocks) {
            $id = $fields['popup_bunner_id'];

            ?>

            <a href="<?= $fields['popup_banner_btn_link']; ?>" class="popup_banner_wrapper"
               style="background:<?= $fields['popup_bunner_css_background']; ?>">
                <button class="popup_banner_close">
                    <img src="https://24ai.tech/en/wp-content/uploads/sites/3/2024/08/close_icon.svg" alt="#">
                </button>
                <span class="popup_banner">
        <img class="popup_banner_logo" src="<?= $fields['popup_bunner_logo']; ?>" alt="#">
        <img class="popup_banner_img" src="<?= $fields['popup_banner_img']; ?>" alt="#">
        <img class="popup_banner_img--mobile" src="<?= $fields['popup_banner_img--mobile']; ?>" alt="#">
        <span class="popup_banner_inner">
            <p class="popup_banner_text" style="color:<?= $fields['popup_banner_color1']; ?>">
            <?= $fields['popup_banner_modal_text1']; ?>
            <span style="color: <?= $fields['popup_banner_color2']; ?>"><?= $fields['popup_banner_modal_text2']; ?></span></p>
            <span class="popup_banner_button"><?= $fields['popup_banner_button_text']; ?></span>
        </span>
    </span>
            </a>

            <div class="popup_modal">
                <div class="popup_modal_background"></div>
                <div class="popup_modal_content" style="background:<?= $fields['popup_bunner_css_background']; ?>">
                    <button class="popup_modal_close">
                        <img src="https://24ai.tech/en/wp-content/uploads/sites/3/2024/08/close_icon.svg" alt="#">
                    </button>
                    <img class="popup_modal_img" src="<?= $fields['popup_modal_img']; ?>" alt="#">
                    <img class="popup_modal_img--mobile" src="<?= $fields['modal_img--mobile']; ?>" alt="#">
                    <div class="popup_modal_inner">
                        <img class="popup_modal_logo" src="<?= $fields['popup_bunner_logo']; ?>" alt="#"/>
                        <div class="popup_modal_bottom">
                            <div class="popup_modal_title" style="color:<?= $fields['popup_banner_modal_color1']; ?>">
                                <span style="color:<?= $fields['popup_banner_modal_color2']; ?>"><?= $fields['popup_banner_modal_text1']; ?></span>
                                <?= $fields['popup_banner_modal_text2']; ?>
                            </div>
                            <div class="popup_modal_text"
                                 style="color:<?= $fields['popup_banner_modal_color3']; ?>"><?= $fields['popup_banner_modal_text3']; ?>

                            </div>
                            <div class="popup_modal_button"><?= $fields['popup_banner_button_text']; ?></div>
                        </div>
                    </div>
                </div>
            </div>
            </body>
            <script>
              document.addEventListener('DOMContentLoaded', function () {
                const bannerWrapper = document.querySelector('.popup_banner_wrapper');
                const bannerCloseButton = document.querySelector('.popup_banner_close');
                const modalCloseButton = document.querySelector('.popup_modal_close');
                const modal = document.querySelector('.popup_modal');

                bannerCloseButton.addEventListener('click', () => {
                  bannerWrapper.style.display = 'none';

                  setTimeout(() => {
                    modal.classList.add('popup_show');
                  }, 15000);
                });

                modalCloseButton.addEventListener('click', () => {
                  modal.style.display = 'none';
                })

                window.addEventListener('scroll', () => {
                  console.log('scroll');

                  const scrollPosition = window.scrollY + window.innerHeight;
                  const halfwayPoint = document.body.scrollHeight / 2;

                  if (scrollPosition >= halfwayPoint) {
                    console.log('must show');
                    modal.classList.add('popup_show');
                  }
                });
              });
            </script>


            <?
        });


    Block::make('all-one-tab', 'All one tab')
        ->add_fields(array(
            Field::make('text', 'al_one_tab-title', 'Title'),
            Field::make('textarea', 'al_one_tab-left_text', 'Left text')->set_width(50),
            Field::make('textarea', 'al_one_tab-right_text', 'Right text')->set_width(50),
            Field::make('text', 'al_one_tab-link', 'Link')->set_width(50),
            Field::make('text', 'al_one_tab-link_text', 'Link text')->set_width(50),

        ))
        ->set_category('media-page')
        ->set_render_callback(function ($fields, $attributes, $inner_blocks) {
            ?>
            <section class="tabs">
                <div class="container">
                    <div class="tabs--caption">
                        <h1 class="tabs__title"><?= $fields['al_one_tab-title']; ?></h1>
                    </div>
                </div>
                <div class="tabs__wrap">
                    <div class="container">
                        <div class="tabs__inner">
                            <div class="tabs__item">
                                <p class="tabs__text"><?= $fields['al_one_tab-left_text']; ?></p>
                            </div>
                            <div class="tabs__item sm">
                                <p class="tabs__text--sm"><?= $fields['al_one_tab-right_text']; ?>
                                </p>
                                <a href="<?= $fields['al_one_tab-link'] . get_params_string() ?>"
                                   class="tabs__btn"><?= $fields['al_one_tab-link_text']; ?>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="19" height="12" viewBox="0 0 19 12"
                                         fill="none">
                                        <path d="M18.5303 6.53033C18.8232 6.23744 18.8232 5.76256 18.5303 5.46967L13.7574 0.696699C13.4645 0.403806 12.9896 0.403806 12.6967 0.696699C12.4038 0.989593 12.4038 1.46447 12.6967 1.75736L16.9393 6L12.6967 10.2426C12.4038 10.5355 12.4038 11.0104 12.6967 11.3033C12.9896 11.5962 13.4645 11.5962 13.7574 11.3033L18.5303 6.53033ZM0 6.75H18V5.25H0V6.75Z"
                                              fill="white"/>
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <?
        });

    Block::make('Grid slider')
        ->add_fields(array(
            Field::make('text', 'grid_id', 'Block ID'),
            Field::make('select', 'grid_margin', 'Margin mode')
                ->set_options(array(
                    'no-margin' => 'no-margin',
                    'margin' => 'Margin',
                    'margin-top' => 'Margin top',
                    'margin-bottom' => 'Margin bottom',
                )),
            Field::make('complex', 'images', 'Images')
                ->set_collapsed(true)
                ->add_fields(array(
                    Field::make('radio', 'border', 'With border')
                        ->set_options(array(
                            'yes' => 'Yes',
                            'no' => 'No',
                        )),
                    Field::make('image', 'image', 'Image')
                        ->set_type(array('image'))
                        ->set_value_type('url'),
                ))
        ))
        ->set_parent('carbon-fields/site-section')
        ->set_render_callback(function ($fields, $attributes, $inner_blocks) {
            $id = $fields['grid_id'];
            $margin_mode = 'block--' . $fields['grid_margin'];
            $images = $fields['images'];
            $border = $fields['border'];
            ?>
            <? if (!empty($images)): ?>
                <div class="container">
                    <div
                        <? if (!empty($id)): ?>
                            id="<?= $id ?>"
                        <? endif; ?>
                            class="block <?= $margin_mode ?> grid-block"
                    >
                        <div class="swiper-container grid-content__slider">
                            <div class="swiper-wrapper">
                                <? foreach ($images as $image): ?>
                                    <div class="swiper-slide">
                                        <img alt="img"
                                             src="<?= $image['image'] ?>" <? if ($image['border'] == 'yes'): ?> style="border: 1px solid #acacac" <? endif; ?>>
                                    </div>
                                <? endforeach; ?>
                            </div>
                            <div class="swiper-pagination grid-content__slider-pagination"></div>
                        </div>
                    </div>
                </div>
            <? endif; ?>
            <?
        });

    Block::make('Grid slider with video')
        ->add_fields(array(
            Field::make('text', 'grid_video_id', 'Block ID'),
            Field::make('select', 'grid_video_margin', 'Margin mode')
                ->set_options(array(
                    'no-margin' => 'no-margin',
                    'margin' => 'Margin',
                    'margin-top' => 'Margin top',
                    'margin-bottom' => 'Margin bottom',
                )),
            Field::make('complex', 'images_video', 'Slides')
                ->set_collapsed(true)
                ->add_fields(array(
                    Field::make('image', 'image', 'Image')
                        ->set_type(array('image'))
                        ->set_value_type('url'),
                    Field::make('text', 'text', 'Text')
                ))
        ))
        ->set_parent('carbon-fields/site-section')
        ->set_render_callback(function ($fields, $attributes, $inner_blocks) {
            $id = $fields['grid_video_id'];
            $margin_mode = 'block--' . $fields['grid_video_margin'];
            $images = $fields['images_video'];
            $border = $fields['border'];
            ?>
            <? if (!empty($images)): ?>
                <div class="container">
                    <div
                        <? if (!empty($id)): ?>
                            id="<?= $id ?>"
                        <? endif; ?>
                            class="block <?= $margin_mode ?> grid_video-block"
                    >
                        <div class="swiper-container grid_video-content__slider">
                            <div class="swiper-wrapper">
                                <? foreach ($images as $image): ?>
                                    <div class="swiper-slide video_slide">
                                        <img alt="img"
                                             src="<?= $image['image'] ?>" <? if ($image['border'] == 'yes'): ?> style="border: 1px solid #acacac" <? endif; ?>>
                                        <p><?= $image['text'] ?></p>
                                    </div>
                                <? endforeach; ?>
                            </div>
                            <div class="swiper-pagination grid_video-content__slider-pagination"></div>
                        </div>
                    </div>
                </div>
            <? endif; ?>
            <?
        });

    Block::make('Question and answer')
        ->add_fields(array(
            Field::make('text', 'questions_id', 'Block ID'),
            Field::make('select', 'questions_margin', 'Margin mode')->set_options(
                array(
                    'no-margin' => 'no-margin',
                    'margin' => 'Margin',
                    'margin-top' => 'Margin top',
                    'margin-bottom' => 'Margin bottom',
                )
            ),

            Field::make('color', 'questions_background_color', 'Background color'),


            Field::make('complex', 'questions_list', 'Questions')->set_collapsed(true)->add_fields(
                array(
                    Field::make('color', 'background_color', 'Background color'),
                    Field::make('color', 'active_background_color', 'Active background color'),
                    Field::make('color', 'text_color', 'Text banner color'),
                    Field::make('text', 'question', 'Question'),
                    Field::make('text', 'answer', 'Answer'),
                )
            )
        ))
        ->set_parent('carbon-fields/site-section')
        ->set_render_callback(function ($fields, $attributes, $inner_blocks) {

            $id = $fields['questions_id'];
            $margin_mode = 'block--' . $fields['questions_margin'];

            $questions_background_color = $fields['questions_background_color'];

            $questions_list = $fields['questions_list'];
            ?>

            <? if (!empty($questions_list)):
                ?>

                <div class="container-big">
                    <div itemscope itemtype="https://schema.org/FAQPage"
                         <? if (!empty($id)): ?>id="<?= $id ?>"<? endif; ?>
                         class="block <?= $margin_mode ?> products-slider-block row-slider-block question-block"
                         style="<? if (!empty($questions_background_color)):?> background: <?= $questions_background_color ?>; <? endif; ?>"
                    >

                        <? foreach ($questions_list as $question): ?>
                            <?
                            $background = $question['background_color'];
                            ?>
                            <div class="question-card"
                                 style="<? if (!empty($background)): ?>background:<?= $background ?>;<? endif; ?>">

                                <button class="questions_question" style="color: <?= $question['text_color']; ?>"
                                        itemscope itemprop="mainEntity" itemtype="https://schema.org/Question"><p
                                            itemprop="name"><?= $question['question'] ?></p><span
                                            class="questions_arrow"><i class="fa-solid fa-chevron-up"></i></span>
                                </button>
                                <div class="questions_answer" temscope itemprop="acceptedAnswer"
                                     itemtype="https://schema.org/Answer"
                                     style="display: none ;color: <?= $question['text_color']; ?>">
                                    <meta itemprop="text"><?= $question['answer'] ?>     </div>

                            </div>
                        <? endforeach; ?>
                        <script>
                          var acc = document.getElementsByClassName("question-card");
                          var i;

                          for (i = 0; i < acc.length; i++) {
                            acc[i].addEventListener("click", function () {
                              this.classList.toggle("active");
                              this.firstElementChild.classList.toggle("active");

                              var panel = this.lastElementChild;
                              var icon = this.querySelector('.questions_arrow i');

                              if (panel.style.display === "flex") {
                                panel.style.display = "none";
                                icon.className = 'fa-solid fa-chevron-up';
                              } else {
                                panel.style.display = "flex";
                                icon.className = 'fa-solid fa-chevron-down';
                              }
                            });
                          }
                        </script>
                    </div>
                </div>
            <? endif; ?>
            <?
        }
        );

    Block::make('Row 3 blocks')
        ->add_fields(array(
            Field::make('text', 'row3_slider_id', 'Block ID'),
            Field::make('select', 'row3_slider_margin', 'Margin mode')->set_options(
                array(
                    'no-margin' => 'no-margin',
                    'margin' => 'Margin',
                    'margin-top' => 'Margin top',
                    'margin-bottom' => 'Margin bottom',
                )
            ),
            Field::make('color', 'row3_slider_background_color', 'Background color'),
            Field::make('color', 'row3_slider_border_color', 'Border color'),

            Field::make('text', 'row3_slider_title', 'Title'),
            Field::make('color', 'row3_slider_title_color', 'Title color'),

            Field::make('text', 'row3_slider_description', 'Description'),
            Field::make('color', 'row3_slider_description_color', 'Description color'),

            Field::make('text', 'row3_slider_btn_text', 'Button text'),
            Field::make('text', 'row3_slider_btn_link', 'Button link'),
            Field::make('color', 'row3_slider_btn_text_color', 'Button text color'),
            Field::make('color', 'row3_slider_btn_background_color', 'Button background color'),
            Field::make('color', 'row3_slider_btn_border_color', 'Button border color'),

            Field::make('color', 'row3_slider_btn_text_color_hover', 'Button:hover text color'),
            Field::make('color', 'row3_slider_btn_background_color_hover', 'Button:hover background color'),
            Field::make('color', 'row3_slider_btn_border_color_hover', 'Button:hover border color'),


            Field::make('complex', 'row3_slider', 'Products slider')->set_collapsed(true)->add_fields(
                array(
                    Field::make('color', 'background_color', 'Background color'),
                    Field::make('color', 'border_color', 'Border color'),
                    Field::make('color', 'text_color', 'Text banner color'),
                    Field::make('text', 'title', 'Title'),
                    Field::make('text', 'desc', 'Description'),
                    Field::make('image', 'logo', 'logo')->set_type(array('image'))->set_value_type('url')
                )
            )
        ))
        ->set_parent('carbon-fields/site-section')
        ->set_render_callback(function ($fields, $attributes, $inner_blocks) {

            $id = $fields['row3_slider_id'];
            $margin_mode = 'block--' . $fields['row3_slider_margin'];

            $row3_slider_background_color = $fields['row3_slider_background_color'];
            $row3_slider_border_color = $fields['row3_slider_border_color'];

            $row3_slider_title = $fields['row3_slider_title'];
            $row3_slider_title_color = $fields['row3_slider_title_color'];

            $row3_slider_description = $fields['row3_slider_description'];
            $row3_slider_description_color = $fields['row3_slider_description_color'];

            $row3_slider_btn_text = $fields['row3_slider_btn_text'];
            $row3_slider_btn_link = $fields['row3_slider_btn_link'];

            $products = $fields['row3_slider'];
            ?>

            <? if (!empty($products)):
                $btn_class_random = 'row3_slider_btn_' . uniqid();
                ?>
                <div class="container-big">
                    <style>
                        .<?=$btn_class_random?> {
                        <?=($fields['row3_slider_btn_text_color']) ? 'color:'.$fields['row3_slider_btn_text_color'].' !important;' : '' ?><?=($fields['row3_slider_btn_background_color']) ? 'background:'.$fields['row3_slider_btn_background_color'].' !important;' : '' ?><?=($fields['row3_slider_btn_border_color']) ? 'border-color: '.$fields['row3_slider_btn_border_color'].' !important;' : '' ?>
                        }

                        .<?=$btn_class_random?>:hover {
                        <?=($fields['row3_slider_btn_text_color_hover']) ? 'color:'.$fields['row3_slider_btn_text_color_hover'].' !important;' : '' ?><?=($fields['row3_slider_btn_background_color_hover']) ? 'background:'.$fields['row3_slider_btn_background_color_hover'].' !important;' : '' ?><?=($fields['row3_slider_btn_border_color_hover']) ? 'border-color: '.$fields['row3_slider_btn_border_color_hover'].' !important;' : '' ?>
                        }
                    </style>
                    <div
                        <? if (!empty($id)): ?>id="<?= $id ?>"<? endif; ?>
                        class="block <?= $margin_mode ?> products-slider-block row-slider-block"
                        style="<? if (!empty($row3_slider_background_color)):?> background: <?= $row3_slider_background_color ?>; <? endif; ?>
                        <? if (!empty($row3_slider_border_color)):?> border: 1px solid <?= $row3_slider_border_color ?>; <? endif; ?>"
                    >

                        <div class="products-slider-block__content-wrapper">
                            <? if ($row3_slider_title): ?>
                                <div style="color: <?= $row3_slider_title_color ?>; padding-bottom: 0;"
                                     class="products-slider-block__title"><?= $row3_slider_title ?></div>
                            <? endif; ?>
                            <? if ($row3_slider_description): ?>
                                <div style="color: <?= $row3_slider_description_color ?>; padding-bottom: 0;"
                                     class="products-slider-block__description"><?= $row3_slider_description ?></div>
                            <? endif; ?>
                        </div>

                        <div class="swiper-container products-slider-block__slider" id="row3-slider">
                            <div class="swiper-wrapper">
                                <? foreach ($products as $product): ?>
                                    <?
                                    $background = $product['background_color'];
                                    $border = $product['border_color'];
                                    ?>
                                    <div style="background:<?= $background ?>; <? if (!empty($border)): ?> border: 1px solid <?= $border; ?>; <? endif; ?>"
                                         class="swiper-slide products-slider-block__slide">
                                        <div class="block_title">
                                            <img alt="img" class="products-slider-block__slide-logo"
                                                 src="<?= $product['logo'] ?>">
                                            <div class="products-slider-block__slide-title"
                                                 style="color: <?= $product['text_color']; ?>"><?= $product['title'] ?></div>
                                        </div>
                                        <div class="products-slider-block__slide-desc"
                                             style="color: <?= $product['text_color']; ?>"><?= $product['desc'] ?></div>
                                    </div>
                                <? endforeach; ?>
                            </div>
                            <div class="swiper-pagination products-slider-block__slider-pagination"></div>
                        </div>

                        <? if (!empty($row3_slider_btn_text) and !empty($row3_slider_btn_link)): ?>
                            <div class="products-slider-block__content-wrapper" style="padding-top: 60px;">
                                <a
                                        data-fancybox
                                        data-src="#request-modal"
                                        href
                                        class="site-btn products-slider-block__btn <?= $btn_class_random ?>"
                                ><?= $row3_slider_btn_text ?></a>
                            </div>
                        <? endif; ?>
                    </div>
                </div>
            <? endif; ?>
            <?
        }
        );
    // Speakers Block
    Block::make('Speakers block')
        ->add_fields(array(
            Field::make('text', 'speakers_block_id', 'Block ID'),
            Field::make('select', 'speakers_block_margin', 'Margin mode')->set_options(
                array(
                    'no-margin' => 'no-margin',
                    'margin' => 'Margin',
                    'margin-top' => 'Margin top',
                    'margin-bottom' => 'Margin bottom',
                )
            ),
            Field::make('color', 'speakers_block_background_color', 'Background color'),
            Field::make('color', 'speakers_block_border_color', 'Border color'),

            Field::make('text', 'speakers_block_title', 'Title'),
            Field::make('color', 'speakers_block_title_color', 'Title color'),

            Field::make('text', 'speakers_block_description', 'Description'),
            Field::make('color', 'speakers_block_description_color', 'Description color'),

            Field::make('select', 'speakers_block_layout', 'Grid Layout')
                ->add_options(array(
                    '3_per_row' => '3 cards per row',
                    '2_per_row' => '2 cards per row',
                )),

            Field::make('checkbox', 'speakers_block_with_blank_card', 'Show blank card')->set_option_value('yes'),

            Field::make('color', 'speakers_blank_card_border_color', 'Blank card border color'),
            Field::make('color', 'speakers_blank_card_text_color', 'Blank card text color'),
            Field::make('text', 'speakers_blank_card_text', 'Blank card text'),


            Field::make('complex', 'speakers_block', 'Speakers')->set_collapsed(true)->add_fields(
                array(
                    Field::make('color', 'background_color', 'Background color'),
                    Field::make('color', 'border_color', 'Border color'),
                    Field::make('color', 'text_color', 'Text color'),
                    Field::make('image', 'image', 'Speaker photo')->set_type(array('image'))->set_value_type('url'),
                    Field::make('text', 'title', 'Speaker name'),
                    Field::make('text', 'position', 'Speaker position'),
                    Field::make('text', 'desc', 'Description'),
                    Field::make('image', 'logo', 'Company logo')->set_type(array('image'))->set_value_type('url')
                )
            ),
        ))
        ->set_parent('carbon-fields/site-section')
        ->set_render_callback(function ($fields, $attributes, $inner_blocks) {

            $id = $fields['speakers_block_id'];
            $margin_mode = 'block--' . $fields['speakers_block_margin'];

            $speakers_block_background_color = $fields['speakers_block_background_color'];
            $speakers_block_border_color = $fields['speakers_block_border_color'];

            $speakers_block_title = $fields['speakers_block_title'];
            $speakers_block_title_color = $fields['speakers_block_title_color'];

            $speakers_block_description = $fields['speakers_block_description'];
            $speakers_block_description_color = $fields['speakers_block_description_color'];

            $speakers_block_with_blank_card = $fields['speakers_block_with_blank_card'];

            $speakers_block_layout = $fields['speakers_block_layout'];

            if ($speakers_block_layout == '3_per_row') {
                $speakers_slider_add_class = 'speakers-slider-block__slider--3-per-row';
            }

            $speakers = $fields['speakers_block'];

            ?>
            <? if (!empty($speakers)): ?>

                <div class="container-big">
                    <div
                        <? if (!empty($id)): ?>id="<?= $id ?>"<? endif; ?>
                        class="block <?= $margin_mode ?> speakers-slider-block"
                        style="<? if (!empty($speakers_block_background_color)): ?> background: <?= $speakers_block_background_color ?>; <? endif; ?>
                        <? if (!empty($speakers_block_border_color)): ?> border: 1px solid <?= $speakers_block_border_color ?>; <? endif; ?>"
                    >

                        <div class="speakers-slider-block__content-wrapper">
                            <? if ($speakers_block_title): ?>
                                <div style="color: <?= $speakers_block_title_color ?>;"
                                     class="speakers-slider-block__title"><?= $speakers_block_title ?></div>
                            <? endif; ?>
                            <? if ($speakers_block_description): ?>
                                <div style="color: <?= $speakers_block_description_color ?>;"
                                     class="speakers-slider-block__description"><?= $speakers_block_description ?></div>
                            <? endif; ?>
                        </div>

                        <div class="swiper-container speakers-slider-block__slider <?= $speakers_slider_add_class ?>">
                            <div class="swiper-wrapper">
                                <? foreach ($speakers as $speaker): ?>
                                    <?
                                    $background = $speaker['background_color'];
                                    $border = $speaker['border_color'];
                                    ?>
                                    <div style="background:<?= $background ?>; <? if (!empty($border)): ?> border: 2px solid <?= $border; ?>; <? endif; ?>"
                                         class="swiper-slide speakers-slider-block__slide">
                                        <img alt="<?= $speaker['title'] ?>" class="speakers-slider-block__speaker-img"
                                             src="<?= $speaker['image'] ?>">
                                        <div class="speakers-slider-block__speaker-title"
                                             style="color: <?= $speaker['text_color']; ?>"><?= $speaker['title'] ?></div>
                                        <div class="speakers-slider-block__speaker-position"
                                             style="color: <?= $speaker['text_color']; ?>"><?= $speaker['position'] ?></div>
                                        <div class="speakers-slider-block__speaker-desc"
                                             style="color: <?= $speaker['text_color']; ?>"><?= $speaker['desc'] ?></div>
                                        <img class="speakers-slider-block__speaker-company-logo"
                                             src="<?= $speaker['logo'] ?>">
                                    </div>
                                <? endforeach; ?>
                                <? if ($speakers_block_with_blank_card == 'yes'): ?>
                                    <div class="swiper-slide speakers-slider-block__slide speakers-slider-block__slide--blank">
                                        <div class="speakers-slider-block__blank-photo">
                                            <svg width="50" height="50" viewBox="0 0 50 50" fill="none"
                                                 xmlns="http://www.w3.org/2000/svg">
                                                <rect x="23.2227" y="49.8889" width="49.7778" height="3.55556"
                                                      rx="1.77778" transform="rotate(-90 23.2227 49.8889)"
                                                      fill="#151516"/>
                                                <rect x="0.111328" y="23.2222" width="49.7778" height="3.55556"
                                                      rx="1.77778" fill="#151516"/>
                                            </svg>
                                        </div>
                                        <div class="speakers-slider-block__blank-title">New Speaker Soon</div>
                                    </div>
                                <? endif; ?>
                            </div>
                            <div class="swiper-pagination speakers-slider-block__slider-pagination"></div>
                        </div>
                    </div>
                </div>

            <? endif; ?>
            <?
        }
        );
    //Meetup Block
    Block::make('Meetup')
        ->add_fields(array(
            Field::make('text', 'meetup_block_id', 'Block ID'),
            Field::make('select', 'meetup_block_block_margin', 'Margin mode')->set_options(
                array(
                    'no-margin' => 'no-margin',
                    'margin' => 'Margin',
                    'margin-top' => 'Margin top',
                    'margin-bottom' => 'Margin bottom',
                )
            ),
            Field::make('checkbox', 'meetup_reverse_layout', 'Reverse layout'),
            Field::make('association', 'meetup', 'Select meetup page')
                ->set_types(array(
                    array(
                        'type' => 'post',
                        'post_type' => 'page',
                    )
                ))
        ))
        ->set_parent('carbon-fields/site-section')
        ->set_render_callback(function ($fields, $attributes, $inner_blocks) {
            $id = $fields['meetup_block_id'];
            $margin_mode = 'block--' . $fields['meetup_block_margin'];
            $meetup_page_id = $fields['meetup']['0']['id'];
            $meetup_poster = carbon_get_post_meta($meetup_page_id, 'meetup_poster');
            $meetup_calendar_img = carbon_get_post_meta($meetup_page_id, 'meetup_calendar_img');
            $meetup_speakers = carbon_get_post_meta($meetup_page_id, 'speakers');;
            $meetup_title = carbon_get_post_meta($meetup_page_id, 'meetup_title');
            $meetup_desc = carbon_get_post_meta($meetup_page_id, 'meetup_desc');;
            $meetup_button_text = carbon_get_post_meta($meetup_page_id, 'meetup_button_text');;
            $meetup_page_link = get_permalink($meetup_page_id);
            ?>
            <div class="container-big tabs-1-block">
                <div class="tabs-content__item">
                    <div class="tabs-content__left-side" style="color: #000; order: 2;">
                        <div class="tabs-content__title"><?= $meetup_title ?></div>
                        <div class="speakers-info">
                            <img style="border-radius: 0px" width="70" height="70" class="speakers-info__img"
                                 src="<?= $meetup_calendar_img ?>" alt="">
                            <? foreach ($meetup_speakers as $speaker): ?>
                                <img width="70" height="70" class="speakers-info__img" src="<?= $speaker['image'] ?>"
                                     alt="">
                            <? endforeach; ?>
                            <!--                         <div class="speakers-info__blank-card">
    <svg width="20" height="20" viewBox="0 0 50 50" fill="none" xmlns="http://www.w3.org/2000/svg">
        <rect x="23.2227" y="49.8889" width="49.7778" height="3.55556" rx="1.77778" transform="rotate(-90 23.2227 49.8889)" fill="#151516"></rect>
        <rect x="0.111328" y="23.2222" width="49.7778" height="3.55556" rx="1.77778" fill="#151516"></rect>
    </svg>
</div> -->
                        </div>
                        <div class="tabs-content__desc" style="color: #000"><?= $meetup_desc ?></div>
                        <a style="background-color:#FECE33; border-color:#FECE33;" href="<?= $meetup_page_link ?>"
                           class="site-btn tabs-content__btn"><?= $meetup_button_text ?></a>
                    </div>
                    <div class="tabs-content__right-side" style="order: 1;">
                        <img decoding="async" alt="img" src="<?= $meetup_poster ?>">
                    </div>
                </div>
            </div>
            <?
        }
        );
    //Gallery Block
    Block::make('Gallery')
        ->add_fields(array(
            Field::make('text', 'gallery_block_id', 'Block ID'),
            Field::make('select', 'gallery_block_margin', 'Margin mode')->set_options(
                array(
                    'no-margin' => 'no-margin',
                    'margin' => 'Margin',
                    'margin-top' => 'Margin top',
                    'margin-bottom' => 'Margin bottom',
                )
            ),

            Field::make('text', 'gallery_block_all_title', 'Title'),
            Field::make('text', 'gallery_block_all_description', 'Description'),
            Field::make('text', 'gallery_block_all_btn_text', 'Button text'),
            Field::make('text', 'gallery_block_all_btn_link', 'Button link'),

            Field::make('color', 'gallery_block_background_color', 'Background color'),
            Field::make('color', 'gallery_block_border_color', 'Border color'),


            Field::make('color', 'gallery_block_title_color', 'Title color'),
            Field::make('color', 'gallery_block_description_color', 'Description color'),
            Field::make('color', 'gallery_block_btn_text_color', 'Button text color'),
            Field::make('color', 'gallery_block_btn_background_color', 'Button background color'),
            Field::make('color', 'gallery_block_btn_border_color', 'Button border color'),
            Field::make('color', 'gallery_block_btn_text_color_hover', 'Button:hover text color'),
            Field::make('color', 'gallery_block_btn_background_color_hover', 'Button:hover background color'),
            Field::make('color', 'gallery_block_btn_border_color_hover', 'Button:hover border color'),
            Field::make('color', 'gallery_block_left_column_text_color', 'Gallery block left column text color'),
            Field::make('color', 'gallery_block_right_column_text_color', 'Gallery block right column text color'),

            Field::make('complex', 'gallery_slider', 'Slider')
                ->add_fields(array(
                    Field::make('text', 'gallery_block_title', 'Title'),
                    Field::make('text', 'gallery_block_description', 'Description'),
                    Field::make('text', 'gallery_block_btn_text', 'Button text'),
                    Field::make('text', 'gallery_block_btn_link', 'Button link'),
                    Field::make('select', 'gallery_slide_type', 'Slide type')->set_options(
                        array(
                            'image' => 'image',
                            'video' => 'video',
                            'ytvideo' => 'youtube video',
                        )),
                    Field::make('oembed', 'yt_oembed', 'Youtube URL'),
                    Field::make('image', 'image', 'Image or Video')
                        ->set_type(array('image', 'video'))
                        ->set_value_type('url'),
                    Field::make('textarea', 'gallery_block_left-content', 'Column 1 text'),
                    Field::make('textarea', 'gallery_block_right-content', 'Column 2 text'),
                )),

        ))
        ->set_parent('carbon-fields/site-section')
        ->set_render_callback(function ($fields, $attributes, $inner_blocks) {

            $id = $fields['gallery_block_id'];
            $margin_mode = 'block--' . $fields['gallery_block_margin'];

            $gallery_block_background_color = $fields['gallery_block_background_color'];

            $gallery_block_border_color = $fields['gallery_block_border_color'];

            $gallery_block_title_color = $fields['gallery_block_title_color'];

            $gallery_block_description_color = $fields['gallery_block_description_color'];

            $gallery_block_left_column_text_color = $fields['gallery_block_left_column_text_color'];

            $gallery_block_right_column_text_color = $fields['gallery_block_right_column_text_color'];


            ?>

            <? $btn_class_random = 'gallery_block_btn_' . uniqid(); ?>
            <div class="container-big">
                <style>
                    .<?=$btn_class_random?> {
                    <?=($fields['gallery_block_btn_text_color']) ? 'color:'.$fields['gallery_block_btn_text_color'].' !important;' : '' ?><?=($fields['gallery_block_btn_background_color']) ? 'background:'.$fields['gallery_block_btn_background_color'].' !important;' : '' ?><?=($fields['gallery_block_btn_border_color']) ? 'border-color: '.$fields['gallery_block_btn_border_color'].' !important;' : '' ?>
                    }

                    .<?=$btn_class_random?>:hover {
                    <?=($fields['gallery_block_btn_text_color_hover']) ? 'color:'.$fields['gallery_block_btn_text_color_hover'].' !important;' : '' ?><?=($fields['gallery_block_btn_background_color_hover']) ? 'background:'.$fields['gallery_block_btn_background_color_hover'].' !important;' : '' ?><?=($fields['gallery_block_btn_border_color_hover']) ? 'border-color: '.$fields['gallery_block_btn_border_color_hover'].' !important;' : '' ?>
                    }
                </style>
                <div
                    <? if (!empty($id)): ?>id="<?= $id ?>"<? endif; ?>
                    class="block <?= $margin_mode ?> gallery-block"
                    style="<? if (!empty($gallery_block_background_color)): ?> background: <?= $gallery_block_background_color ?>; <? endif; ?>
                    <? if (!empty($gallery_block_border_color)): ?> border: 1px solid <?= $gallery_block_border_color ?>; <? endif; ?>"
                >
                    <? if (!empty($fields['gallery_slider'])): ?>
                        <div class="swiper-container gallery-block__slider">
                            <div class="swiper-wrapper">
                                <? foreach ($fields['gallery_slider'] as $slide): ?>
                                    <?
                                    $gallery_block_title = $slide['gallery_block_title'];
                                    if (empty($gallery_block_title)) {
                                        $gallery_block_title = $fields['gallery_block_all_title'];
                                    }
                                    $gallery_block_description = $slide['gallery_block_description'];
                                    if (empty($gallery_block_description)) {
                                        $gallery_block_description = $fields['gallery_block_all_description'];
                                    }
                                    $gallery_block_btn_text = $slide['gallery_block_btn_text'];
                                    if (empty($gallery_block_btn_text)) {
                                        $gallery_block_btn_text = $fields['gallery_block_all_btn_text'];
                                    }
                                    $gallery_block_btn_link = $slide['gallery_block_btn_link'];
                                    if (empty($gallery_block_btn_link)) {
                                        $gallery_block_btn_link = $fields['gallery_block_all_btn_link'];
                                    }
                                    $gallery_slide_type = $slide['gallery_slide_type'];
                                    $gallery_slide_img = $slide['image'];
                                    $gallery_slide_left_content = $slide['gallery_block_left-content'];
                                    $gallery_slide_right_content = $slide['gallery_block_right-content'];
                                    ?>
                                    <div class="swiper-slide gallery-block_slide">
                                        <div class="gallery-block__content-wrapper">
                                            <? if ($gallery_block_title): ?>
                                                <div style="color: <?= $gallery_block_title_color ?>;"
                                                     class="gallery-block__title"><?= $gallery_block_title ?></div>
                                            <? endif; ?>
                                            <? if ($gallery_block_description): ?>
                                                <div style="color: <?= $gallery_block_description_color ?>;"
                                                     class="gallery-block__description"><?= $gallery_block_description ?></div>
                                            <? endif; ?>
                                            <? if (!empty($gallery_block_btn_text) and !empty($gallery_block_btn_link)): ?>
                                                <a target="_blank"
                                                   href="<?= $gallery_block_btn_link . get_params_string() ?>"
                                                   class="site-btn gallery-block__btn <?= $btn_class_random ?>"><?= $gallery_block_btn_text ?></a>
                                            <? endif; ?>
                                            <?
                                            if ($gallery_slide_type == 'image' and !empty($gallery_slide_img)) {
                                                $slide_image = ImageResizeWordPress::resizeWidthWebp($gallery_slide_img, 1450)
                                                ?>
                                                <img class="not-lazy" width="1050" height="700" alt="img"
                                                     class="h__img gallery-block__img" src="<?= $slide_image ?>">
                                                <?
                                                $image_resize_url = ImageResizeWordPress::resizeWidthWebp($gallery_slide_img, 768);
                                                ?>
                                                <img class="not-lazy" width="768" height="400" alt="img"
                                                     class="h__img h__img_mobile gallery-block__img"
                                                     src="<?= $image_resize_url ?>">
                                                <?
                                            }
                                            if ($gallery_slide_type == 'video' and !empty($gallery_slide_img)) {
                                                ?>
                                                <video autoplay loop muted playsinline
                                                       class="gallery-block__img gallery-block__video">
                                                    <source src="<?= $gallery_slide_img ?>" type="video/mp4">
                                                </video>
                                                <?
                                            }
                                            if ($gallery_slide_type == 'ytvideo') {
                                                ?>
                                                <?
                                                $parts = parse_url($slide['yt_oembed']);
                                                parse_str($parts['query'], $query);
                                                ?>
                                                <iframe style="aspect-ratio: 16 / 9;width: 95%;z-index:999;"
                                                        class="youtube-video"
                                                        src="//www.youtube.com/embed/<?= $query['v'] ?>?rel=0"
                                                        title="YouTube video player" frameborder="0"
                                                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                                        allowfullscreen></iframe>
                                                <?
                                            }
                                            ?>
                                        </div>
                                        <div class="gallery-block__columns">
                                            <div style="color: <?= $gallery_block_left_column_text_color ?>;"
                                                 class="gallery-block__column-left gallery-block__column-desc"><?= $gallery_slide_left_content ?></div>
                                            <div style="color: <?= $gallery_block_right_column_text_color ?>;"
                                                 class="gallery-block__column-right gallery-block__column-desc"><?= $gallery_slide_right_content ?></div>
                                        </div>
                                    </div>
                                <? endforeach; ?>
                            </div>
                            <div class="swiper-pagination gallery-block__slider-pagination"></div>
                        </div>
                    <? endif; ?>
                </div>
            </div>
            <?
        }
        );
    //
    //Google map iframe Block
    Block::make('Ai widget block')
        ->add_fields(array(
            Field::make('text', 'gmap_iframe_block_id', 'Block ID'),
            Field::make('select', 'gmap_iframe_block_margin', 'Margin mode')->set_options(
                array(
                    'no-margin' => 'no-margin',
                    'margin' => 'Margin',
                    'margin-top' => 'Margin top',
                    'margin-bottom' => 'Margin bottom',
                )
            ),
            Field::make('select', 'current_service', 'Current Service')
                ->add_options(array(
                    'create_background' => 'create background',
                    'upscale' => 'upscale',
                    'remove_background' => 'remove background',
                    'inpaint' => 'inpaint',
                    'outpaint' => 'outpaint',
                    'watermarks' => 'watermarks',
                    'shadow' => 'shadow',
                    'infographics' => 'infographics',
                )),
            Field::make('select', 'lang', 'Language')
                ->add_options(array(
                    'ru' => 'Russian',
                    'en' => 'English',
                    'es' => 'Espanol',
                    'ar' => 'Arabi',
                )),

        ))
        ->set_parent('carbon-fields/site-section')
        ->set_render_callback(function ($fields, $attributes, $inner_blocks) {
            $id = $fields['gmap_iframe_block_id'];
            $margin_mode = 'block--' . $fields['gmap_iframe_block_margin'];
            $iframe = $fields['gmap_iframe'];
            ?>
            <div class="container">
                <div
                    <? if (!empty($id)): ?>
                        id="<?= $id ?>"
                    <? endif; ?>
                        class="block <?= $margin_mode ?> widget-block"
                >
                    <script defer="defer" src="https://internal.24ai.tech/js/app.js"></script>
                    <div class="widget" style="height: 500px; display: flex;"></div>
                    <script>
                      window.AI_WIDGET_SETTINGS = {
                        currentService: '<?php echo $fields['current_service']?>',
                        lang: '<?php echo $fields['lang']?>',
                        el: '.widget'
                      }
                    </script>
                </div>
            </div>
            <?
        }
        );
    Block::make('Google-map-iframe')
        ->add_fields(array(
            Field::make('text', 'gmap_iframe_block_id', 'Block ID'),
            Field::make('select', 'gmap_iframe_block_margin', 'Margin mode')->set_options(
                array(
                    'no-margin' => 'no-margin',
                    'margin' => 'Margin',
                    'margin-top' => 'Margin top',
                    'margin-bottom' => 'Margin bottom',
                )
            ),
            Field::make('checkbox', 'gmap_iframe_in_container', 'In container'),
            Field::make('textarea', 'gmap_iframe', 'Google Maps iframe code'),
        ))
        ->set_parent('carbon-fields/site-section')
        ->set_render_callback(function ($fields, $attributes, $inner_blocks) {
            $id = $fields['gmap_iframe_block_id'];
            $margin_mode = 'block--' . $fields['gmap_iframe_block_margin'];
            $iframe = $fields['gmap_iframe'];
            ?>
            <? if (!empty($fields['gmap_iframe_in_container'])): ?>
                <div class="container-big">
            <? endif ?>
            <div
                <? if (!empty($id)): ?>id="<?= $id ?>"<? endif; ?>
                class="block <?= $margin_mode ?> gmap_iframe-block"
            >
                <?= $iframe ?>
            </div>
            <? if (!empty($fields['gmap_iframe_in_container'])): ?>
                </div>
            <? endif ?>
            <?
        }
        );
    // Image with right text columns
    Block::make('Image with right text columns')
        ->add_fields(array(
            Field::make('text', 'irtc_block_id', 'Block ID'),
            Field::make('select', 'irtc_block_margin', 'Margin mode')->set_options(
                array(
                    'no-margin' => 'no-margin',
                    'margin' => 'Margin',
                    'margin-top' => 'Margin top',
                    'margin-bottom' => 'Margin bottom',
                )
            ),
            Field::make('image', 'irtc_image', 'Image'),
            Field::make('textarea', 'irtc_column_1_text', 'Column 1 text'),
            Field::make('textarea', 'irtc_column_2_text', 'Column 2 text'),
            Field::make('textarea', 'irtc_column_3_text', 'Column 3 text'),
            Field::make('textarea', 'irtc_column_4_text', 'Column 4 text'),
            Field::make('color', 'irtc_text_color', 'Text color'),
            Field::make('text', 'irtc_btn_text', 'Button text'),
            Field::make('text', 'irtc_btn_link', 'Button link'),
            Field::make('color', 'irtc_btn_text_color', 'Button text color'),
            Field::make('color', 'irtc_btn_bg_color', 'Button background color'),
            Field::make('color', 'irtc_btn_border_color', 'Button border color'),
            Field::make('color', 'irtc_btn_hover_text_color', 'Hover button text color'),
            Field::make('color', 'irtc_btn_hover_bg_color', 'Hover button background color'),
            Field::make('color', 'irtc_btn_hover_border_color', 'Hover button border color'),
        ))
        ->set_parent('carbon-fields/site-section')
        ->set_render_callback(function ($fields, $attributes, $inner_blocks) {
            $id = $fields['irtc_block_id'];
            $margin_mode = 'block--' . $fields['irtc_block_margin'];
            $image = $fields['irtc_image'];
            $column_1_text = $fields['irtc_column_1_text'];
            $column_2_text = $fields['irtc_column_2_text'];
            $column_3_text = $fields['irtc_column_3_text'];
            $column_4_text = $fields['irtc_column_4_text'];
            $irtc_btn_text = $fields['irtc_btn_text'];
            $irtc_btn_link = $fields['irtc_btn_link'];

            ?>
            <div class="container" itemprop="orderedItem" itemscope itemtype="https://schema.org/Service">
                <div <? if (!empty($id)): ?>id="<?= $id ?>"<? endif; ?> class="block <?= $margin_mode ?> irtc-block">
                    <div class="irtc-block__wrapper" itemprop="description">
                        <div class="irtc-block__left-side">
                            <img class="irtc-block__img" src="<?= wp_get_attachment_image_url($image, 'full') ?>"
                                 alt="">
                        </div>
                        <div class="irtc-block__right-side">
                            <div class="irtc-block__columns">
                                <div class="irtc-block__column"><?= $column_1_text ?></div>
                                <div class="irtc-block__column"><?= $column_2_text ?></div>
                                <div class="irtc-block__column"><?= $column_3_text ?></div>
                                <div class="irtc-block__column"><?= $column_4_text ?></div>
                            </div>
                        </div>
                    </div>
                    <a target="_blank" class="site-btn irtc-block__btn"
                       href="<?= $irtc_btn_link ?>"><?= $irtc_btn_text ?></a>
                </div>
            </div>
            <?
        }
        );
    //
    Block::make('Card 1 row 5 column')
        ->add_fields(array(

            Field::make('text', 'grid_id', 'Block ID'),
            Field::make('select', 'grid_margin', 'Margin mode')
                ->set_options(array(
                    'no-margin' => 'no-margin',
                    'margin' => 'Margin',
                    'margin-top' => 'Margin top',
                    'margin-bottom' => 'Margin bottom',
                )),
            Field::make('radio', 'border', 'With border')
                ->set_options(array(
                    'yes' => 'Yes',
                    'no' => 'No',
                )),
            Field::make('color', 'cta_bg_color', 'Background color'),
            Field::make('image', 'card_avatar', 'Avatar')->set_value_type('url'),
            Field::make('text', 'card_name', 'Name'),
            Field::make('text', 'card_job', 'Occupation'),
            Field::make('color', 'card_text_color', 'Text color'),
            Field::make('text', 'card_btn_text', 'Button text'),
            Field::make('text', 'card_btn_link', 'Button link'),
            Field::make('color', 'card_btn_text_color', 'Button text color'),
            Field::make('color', 'card_btn_bg_color', 'Button background color'),
            Field::make('complex', 'cards', 'Cards')
                ->set_collapsed(true)
                ->add_fields(array(
                    Field::make('text', 'card_text', 'Card Text'),
                    Field::make('color', 'text_color', 'Text Color'),
                ))

        ))
        ->set_parent('carbon-fields/site-section')
        ->set_render_callback(function ($fields, $attributes, $inner_blocks) {
            $id = $fields['grid_id'];
            $margin_mode = 'block--' . $fields['grid_margin'];
            $cards = $fields['cards'];
            $border = $fields['border'];
            ?>
            <? if (!empty($cards)): ?>
                <div class="container">
                    <div
                        <? if (!empty($id)): ?>
                            id="<?= $id ?>"
                        <? endif; ?>
                            class="block <?= $margin_mode ?> grid-block"
                    >
                        <div class="swiper-container card-1-row-5-column_slider">
                            <div class="swiper-wrapper">
                                <? foreach ($cards as $card): ?>
                                    <div class="swiper-slide card-1-row-5-column_slide" <? if ($fields['border'] == 'yes'): ?> style="border: 1px solid #666;border-radius: 15px;" <? endif; ?>>
                                        <div class="card-1-row-5-column_slide-text"
                                             style="color: <?= $card['text_color']; ?>"><?= $card['card_text'] ?></div>
                                    </div>
                                <? endforeach; ?>
                            </div>
                            <div class="swiper-pagination card-1-row-5-column_slider-pagination"></div>
                        </div>
                        <div class="card-1-row-5-column_cta" style="background:<?= $fields['cta_bg_color'] ?>">
                            <div class="card-1-row-5-column_cta-profile">
                                <? if (!empty($fields['card_avatar'])): ?>
                                    <img class="card-1-row-5-column_avatar" src="<?= $fields['card_avatar'] ?>">
                                <? endif; ?>
                                <div>
                                    <div class="card-1-row-5-column_card-name"
                                         style="color: <?= $fields['card_text_color']; ?>"><?= $fields['card_name'] ?></div>
                                    <div class="card-1-row-5-column_card-job"
                                         style="color: <?= $fields['card_text_color']; ?>"><?= $fields['card_job'] ?></div>
                                </div>
                            </div>
                            <a href="<?= $fields['card_btn_link'] ?>"
                               style="color:<?= $fields['card_btn_text_color'] ?>">
                                <div class="card-1-row-5-column_cta-button"
                                     style="background:<?= $fields['card_btn_bg_color'] ?>">
                                    <?= $fields['card_btn_text'] ?><img src="/wp-content/themes/orm/img/Arrow 1.svg"
                                                                        alt="Arrow"/>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            <? endif; ?>
            <?
        });
    //
    Block::make('Row 3 block with steps')
        ->add_fields(array(
            Field::make('text', 'row3_slider_step_id', 'Block ID'),
            Field::make('select', 'row3_slider_step_margin', 'Margin mode')->set_options(
                array(
                    'no-margin' => 'no-margin',
                    'margin' => 'Margin',
                    'margin-top' => 'Margin top',
                    'margin-bottom' => 'Margin bottom',
                )
            ),
            Field::make('color', 'row3_slider_step_background_color', 'Background color'),
            Field::make('color', 'row3_slider_step_border_color', 'Border color'),

            Field::make('text', 'row3_slider_step_title', 'Title'),
            Field::make('color', 'row3_slider_step_title_color', 'Title color'),

            Field::make('text', 'row3_slider_step_description', 'Description'),
            Field::make('color', 'row3_slider_step_description_color', 'Description color'),

            Field::make('text', 'row3_slider_step_btn_text', 'Button text'),
            Field::make('text', 'row3_slider_step_btn_link', 'Button link'),
            Field::make('color', 'row3_slider_step_btn_text_color', 'Button text color'),
            Field::make('color', 'row3_slider_step_btn_background_color', 'Button background color'),
            Field::make('color', 'row3_slider_step_btn_border_color', 'Button border color'),

            Field::make('color', 'row3_slider_step_btn_text_color_hover', 'Button:hover text color'),
            Field::make('color', 'row3_slider_step_btn_background_color_hover', 'Button:hover background color'),
            Field::make('color', 'row3_slider_step_btn_border_color_hover', 'Button:hover border color'),


            Field::make('complex', 'row3_slider_step', 'Products slider')->set_collapsed(true)->add_fields(
                array(
                    Field::make('color', 'background_color', 'Background color'),
                    Field::make('color', 'border_color', 'Border color'),
                    Field::make('color', 'text_color', 'Text banner color'),
                    Field::make('text', 'title', 'Title'),
                    Field::make('text', 'step_text', 'Step text'),
                    Field::make('color', 'step-text_color', 'Step text color'),
                    Field::make('color', 'step_bg_color', 'Step background color'),
                    Field::make('text', 'desc', 'Description'),
                    Field::make('image', 'logo', 'logo')->set_type(array('image'))->set_value_type('url')
                )
            )
        ))
        ->set_parent('carbon-fields/site-section')
        ->set_render_callback(function ($fields, $attributes, $inner_blocks) {

            $id = $fields['row3_slider_step_id'];
            $margin_mode = 'block--' . $fields['row3_slider_step_margin'];

            $row3_slider_step_background_color = $fields['row3_slider_step_background_color'];
            $row3_slider_step_border_color = $fields['row3_slider_step_border_color'];

            $row3_slider_step_title = $fields['row3_slider_step_title'];
            $row3_slider_step_title_color = $fields['row3_slider_step_title_color'];

            $row3_slider_step_description = $fields['row3_slider_step_description'];
            $row3_slider_step_description_color = $fields['row3_slider_step_description_color'];

            $row3_slider_step_btn_text = $fields['row3_slider_step_btn_text'];
            $row3_slider_step_btn_link = $fields['row3_slider_step_btn_link'];

            $products = $fields['row3_slider_step'];
            ?>

            <? if (!empty($products)):
                $btn_class_random = 'row3_slider_step_btn_' . uniqid();
                ?>
                <div class="container-big" itemscope itemtype="https://schema.org/HowTo">
                    <style>
                        .<?=$btn_class_random?> {
                        <?=($fields['row3_slider_step_btn_text_color']) ? 'color:'.$fields['row3_slider_step_btn_text_color'].' !important;' : '' ?><?=($fields['row3_slider_step_btn_background_color']) ? 'background:'.$fields['row3_slider_step_btn_background_color'].' !important;' : '' ?><?=($fields['row3_slider_step_btn_border_color']) ? 'border-color: '.$fields['row3_slider_step_btn_border_color'].' !important;' : '' ?>
                        }

                        .<?=$btn_class_random?>:hover {
                        <?=($fields['row3_slider_step_btn_text_color_hover']) ? 'color:'.$fields['row3_slider_step_btn_text_color_hover'].' !important;' : '' ?><?=($fields['row3_slider_step_btn_background_color_hover']) ? 'background:'.$fields['row3_slider_step_btn_background_color_hover'].' !important;' : '' ?><?=($fields['row3_slider_step_btn_border_color_hover']) ? 'border-color: '.$fields['row3_slider_step_btn_border_color_hover'].' !important;' : '' ?>
                        }
                    </style>
                    <div
                        <? if (!empty($id)): ?>id="<?= $id ?>"<? endif; ?>
                        class="block <?= $margin_mode ?> row3-step-slider-block"
                        style="<? if (!empty($row3_slider_step_background_color)):?> background: <?= $row3_slider_step_background_color ?>; <? endif; ?>
                        <? if (!empty($row3_slider_step_border_color)):?> border: 1px solid <?= $row3_slider_step_border_color ?>; <? endif; ?>"
                    >

                        <div class="products-slider-block__content-wrapper row3-step-slider-block__content-wrapper">
                            <? if ($row3_slider_step_title): ?>
                                <div style="color: <?= $row3_slider_step_title_color ?>; padding-bottom: 0;"
                                     class="products-slider-block__title"><?= $row3_slider_step_title ?></div>
                            <? endif; ?>
                            <? if ($row3_slider_step_description): ?>
                                <div style="color: <?= $row3_slider_step_description_color ?>; padding-bottom: 0;"
                                     class="products-slider-block__description"><?= $row3_slider_step_description ?></div>
                            <? endif; ?>
                        </div>

                        <div class="swiper-container row3-step-slider-block__slider" id="row3-step-slider">
                            <div class="swiper-wrapper">
                                <? $i = 0;
                                foreach ($products as $product): ?>
                                    <?
                                    $background = $product['background_color'];
                                    $border = $product['border_color'];
                                    ?>
                                    <meta itemprop="position" content="<? $i++;
                                    echo $i ?>"/>
                                    <div style="background:<?= $background ?>; <? if (!empty($border)): ?> border: 1px solid <?= $border; ?>; <? endif; ?>"
                                         class="swiper-slide products-slider-block__slide row3-step-slider-block__slide"
                                         itemprop="step" itemscope itemtype="https://schema.org/HowToSection">
                                        <div class="block_title">
                                            <div class="row3-step-slider-block__step-text"
                                                 style="background: <?= $product['step_bg_color'] ?>; color: <?= $product['step-text_color'] ?>"><?= $product['step_text'] ?></div>
                                            <img alt="img" class="products-slider-block__slide-logo"
                                                 src="<?= $product['logo'] ?>">
                                            <div itemprop="name"
                                                 class="products-slider-block__slide-title row3-step-slider-block__slide-title"
                                                 style="color: <?= $product['text_color']; ?>"><?= $product['title'] ?></div>
                                        </div>
                                        <div itemprop="text"
                                             class="products-slider-block__slide-desc row3-step-slider-block__slide-desc"
                                             style="color: <?= $product['text_color']; ?>"><?= $product['desc'] ?></div>
                                    </div>
                                <? endforeach; ?>
                            </div>
                            <div class="swiper-pagination row3-step-slider-block__slider-pagination"></div>
                        </div>

                        <? if (!empty($row3_slider_step_btn_text) and !empty($row3_slider_step_btn_link)): ?>
                            <div class="products-slider-block__content-wrapper" style="padding-top: 60px;">
                                <a class="site-btn products-slider-block__btn <?= $btn_class_random ?>"
                                   href="<?= $row3_slider_step_btn_link ?>">
                                    <?= $row3_slider_step_btn_text ?>
                                </a>
                            </div>
                        <? endif; ?>
                    </div>
                </div>
            <? endif; ?>
            <?
        }
        );
    Block::make('Grid slider mobile 1 row')
        ->add_fields(array(

            Field::make('text', 'grid_id', 'Block ID'),
            Field::make('select', 'grid_margin', 'Margin mode')
                ->set_options(array(
                    'no-margin' => 'no-margin',
                    'margin' => 'Margin',
                    'margin-top' => 'Margin top',
                    'margin-bottom' => 'Margin bottom',
                )),
            Field::make('radio', 'border', 'With border')
                ->set_options(array(
                    'yes' => 'Yes',
                    'no' => 'No',
                )),
            Field::make('complex', 'images', 'Images')
                ->set_collapsed(true)
                ->add_fields(array(
                    Field::make('color', 'background_color', 'Background color'),
                    Field::make('text', 'title', 'Title'),
                    Field::make('color', 'title_color', 'Title color'),
                    Field::make('text', 'desc', 'Description'),
                    Field::make('color', 'desc_color', 'Description color'),
                    Field::make('image', 'image', 'Image')
                        ->set_type(array('image'))
                        ->set_value_type('url'),
                ))

        ))
        ->set_parent('carbon-fields/site-section')
        ->set_render_callback(function ($fields, $attributes, $inner_blocks) {
            $id = $fields['grid_id'];
            $margin_mode = 'block--' . $fields['grid_margin'];
            $images = $fields['images'];
            $border = $fields['border'];
            ?>
            <? if (!empty($images)): ?>
                <div class="container">
                    <div
                        <? if (!empty($id)): ?>
                            id="<?= $id ?>"
                        <? endif; ?>
                            class="block <?= $margin_mode ?> grid-block"
                    >
                        <div class="swiper-container grid-mobile1-content__slider">
                            <div class="swiper-wrapper">
                                <? foreach ($images as $image): ?>
                                    <div class="swiper-slide grid-mobile1-content__slide"
                                         style="<? if ($fields['border'] == 'yes'): ?>border: 1px solid #666;border-radius: 15px<? else : ?>border-radius: 6px<? endif ?>; background: <?= $image['background_color']; ?>;">
                                        <div class="block_title grid-mobile1-content__slide-header-block">
                                            <img class="products-slider-block__slide-logo" alt="img"
                                                 src="<?= $image['image'] ?>">
                                            <div class="grid-mobile1-content__slide-title"
                                                 style="color: <?= $image['title_color']; ?>"><?= $image['title'] ?></div>
                                        </div>
                                        <div class="grid-mobile1-content__slide-desc"
                                             style="color: <?= $image['desc_color']; ?>"><?= $image['desc'] ?></div>
                                    </div>
                                <? endforeach; ?>
                            </div>
                            <div class="swiper-pagination grid-mobile1-content__slider-pagination"></div>
                        </div>
                    </div>
                </div>
            <? endif; ?>
            <?
        });

    Block::make('Tools grid')
        ->add_fields(array(

            Field::make('text', 'grid_id', 'Block ID'),
            Field::make('select', 'grid_margin', 'Margin mode')
                ->set_options(array(
                    'no-margin' => 'no-margin',
                    'margin' => 'Margin',
                    'margin-top' => 'Margin top',
                    'margin-bottom' => 'Margin bottom',
                )),
            Field::make('radio', 'border', 'With border')
                ->set_options(array(
                    'yes' => 'Yes',
                    'no' => 'No',
                )),


            Field::make('text', 'tooltopictitle', 'Topic Title'),
            Field::make('complex', 'tools', 'Tools')
                ->set_collapsed(true)
                ->add_fields(array(
                    Field::make('color', 'background_color', 'Background color'),
                    Field::make('text', 'title', 'Title'),
                    Field::make('color', 'title_color', 'Title color'),
                    Field::make('text', 'tool-link', 'Tool link'),
                    Field::make('text', 'desc', 'Description'),
                    Field::make('color', 'desc_color', 'Description color'),
                    Field::make('image', 'image', 'Icon')
                        ->set_type(array('image'))
                        ->set_value_type('url'),
                    Field::make('image', 'main_image', 'Main image')
                        ->set_type(array('image'))
                        ->set_value_type('url'),
                ))

        ))
        ->set_parent('carbon-fields/site-section')
        ->set_render_callback(function ($fields, $attributes, $inner_blocks) {
            $id = $fields['grid_id'];
            $tools = $fields['tools'];
            $margin_mode = 'block--' . $fields['grid_margin'];
            $border = $fields['border'];
            ?>
            <div class="container">
                <div
                    <? if (!empty($id)): ?>
                        id="<?= $id ?>"
                    <? endif; ?>
                        class="block <?= $margin_mode ?>"
                >
                    <div>
                        <div class="tools-grid_topic-title site-section__desc"><?= $fields['tooltopictitle'] ?></div>
                        <div class="tools-page">
                            <? foreach ($tools as $tool): ?>
                                <div style="<? if ($fields['border'] == 'yes'): ?>border: 1px solid #666;border-radius: 15px<? else : ?>border-radius: 6px<? endif ?>; background: <?= $tool['background_color']; ?>;">
                                    <a class="tools-grid-content__slide" href="<?= $tool['tool-link']; ?>">
                                        <img class="tools-grid-content__slide-image" alt="main-image"
                                             src="<?= $tool['main_image'] ?>"/>
                                        <div class="tools-grid-content__slide-content">
                                            <div class="tools-grid-content__slide-content-body">
                                                <div class="tools-grid-content__slide-title"
                                                     style="color: <?= $tool['title_color']; ?>"><?= $tool['title'] ?></div>
                                                <div class="tools-grid-content__slide-desc"
                                                     style="color: <?= $tool['desc_color']; ?>"><?= $tool['desc'] ?></div>
                                            </div>
                                            <div class="tools-grid__slide-icon-wrapper">
                                                <img class="tools-grid__slide-icon" alt="img" src="<?= $tool['image'] ?>">
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            <? endforeach; ?>
                        </div>
                    </div>
                </div>
            </div>
            <?
        });
    Block::make('Tools with images grid')
        ->add_fields(array(

            Field::make('text', 'grid_id', 'Block ID'),
            Field::make('select', 'grid_margin', 'Margin mode')
                ->set_options(array(
                    'no-margin' => 'no-margin',
                    'margin' => 'Margin',
                    'margin-top' => 'Margin top',
                    'margin-bottom' => 'Margin bottom',
                )),
            Field::make('radio', 'border', 'With border')
                ->set_options(array(
                    'yes' => 'Yes',
                    'no' => 'No',
                )),
            Field::make('text', 'tooltopictitle', 'Topic Title'),
            Field::make('complex', 'toolslower', 'Lower Tools')
                ->set_collapsed(true)
                ->add_fields(array(
                    Field::make('color', 'background_color', 'Background color'),
                    Field::make('text', 'title', 'Title'),
                    Field::make('color', 'title_color', 'Title color'),
                    Field::make('text', 'tool-link', 'Tool link'),
                    Field::make('image', 'image', 'Image')
                        ->set_type(array('image'))
                        ->set_value_type('url'),
                ))

        ))
        ->set_parent('carbon-fields/site-section')
        ->set_render_callback(function ($fields, $attributes, $inner_blocks) {
            $id = $fields['grid_id'];
            $margin_mode = 'block--' . $fields['grid_margin'];
            $toolslower = $fields['toolslower'];
            $border = $fields['border'];
            ?>
            <div class="container">
                <div
                    <? if (!empty($id)): ?>
                        id="<?= $id ?>"
                    <? endif; ?>
                        class="block <?= $margin_mode ?>"
                >
                    <div>

                        <div class="tools-grid_topic-title site-section__desc"><?= $fields['tooltopictitle'] ?></div>
                        <div class="swiper-container tools-grid2-content__slider">
                            <div class="swiper-wrapper">
                                <? foreach ($toolslower as $toollower): ?>
                                    <div class="swiper-slide"
                                         style="<? if ($fields['border'] == 'yes'): ?>border: 1px solid #666;border-radius: 15px<? else : ?>border-radius: 6px<? endif ?>; background: <?= $toollower['background_color']; ?>;">
                                        <a class="tools-grid2-content__slide" href="<?= $toollower['tool-link']; ?>">

                                            <div class="block_title tools-grid2-content__slide-header-block">
                                                <img class="tools-grid2__slide-icon" alt="img"
                                                     src="<?= $toollower['image'] ?>">
                                                <div class="tools-grid2-content__slide-title"
                                                     style="color: <?= $toollower['title_color']; ?>"><?= $toollower['title'] ?></div>
                                            </div>
                                        </a>

                                    </div>
                                <? endforeach; ?>
                            </div>
                            <div class="swiper-pagination tools-grid2-content__slider-pagination"></div>
                        </div>
                    </div>
                </div>
            </div>
            <?
        });

    Block::make('ttl_block', 'TTL block ')
        ->add_fields(
            array(
                Field::make('text', 'ttl_block_id', 'Section ID'),
                Field::make('separator', 'ttl_block_separator_1', 'Section background settings'),
                Field::make('radio', 'ttl_block_bg_type', 'Background type')
                    ->set_options(array(
                            'color' => 'Color',
                            'gradient' => 'Gradient',
                        )
                    )->set_default_value('color'),
                Field::make('color', 'ttl_block_background_color', 'Background color')
                    ->set_conditional_logic(array(
                            array(
                                'field' => 'ttl_block_bg_type',
                                'value' => 'color',
                                'compare' => '=',
                            )
                        )
                    ),
                Field::make('text', 'ttl_block_background_gradient', 'Gradient css rule')
                    ->set_conditional_logic(array(
                            array(
                                'field' => 'ttl_block_bg_type',
                                'value' => 'gradient',
                                'compare' => '=',
                            )
                        )
                    ),
                Field::make('separator', 'ttl_block_separator_2', 'Section paddings settings'),
                Field::make('select', 'ttl_block_padding', 'Padding mode')
                    ->set_options(array(
                            'with-padding' => 'With padding',
                            'no-padding' => 'No padding',
                            'no-padding-top' => 'No padding top',
                            'no-padding-bottom' => 'No padding bottom',
                            'big-padding-top' => 'Big padding top',
                            'big-padding-bottom' => 'Big padding bottom',
                        )
                    ),
                Field::make('separator', 'ttl_block_separator_3', 'Section title settings'),
                Field::make('select', 'ttl_block_show_title', 'Show title?')
                    ->set_options(array(
                            'no' => 'No',
                            'yes' => 'Yes',
                        )
                    ),
                Field::make('select', 'ttl_block_title_type', 'Title type')
                    ->set_options(array(
                            'numeric-with-left-icon' => 'Numeric, with left icon',
                            'with-icon-on-top' => 'With icon on top',
                            'without-icon' => 'without icon',
                        )
                    )->set_conditional_logic(array(
                        array(
                            'field' => 'ttl_block_show_title',
                            'value' => 'yes',
                            'compare' => '=',
                        )
                    )),
                Field::make('select', 'ttl_block_title_align', 'Title align')
                    ->set_options(array(
                            'left' => 'left',
                            'centered' => 'center',
                        )
                    )->set_conditional_logic(array(
                        array(
                            'field' => 'ttl_block_title_type',
                            'value' => 'without-icon',
                            'compare' => '=',
                        )
                    )),
                Field::make('text', 'ttl_block_title_max_width', 'Max width (px)')
                    ->set_conditional_logic(array(
                            array(
                                'field' => 'ttl_block_title_type',
                                'value' => 'without-icon',
                                'compare' => '=',
                            )
                        )
                    ),
                Field::make('image', 'ttl_block_pre_title_img', 'Pre title image')
                    ->set_type(array('image'))
                    ->set_value_type('url')
                    ->set_conditional_logic(array(
                            'relation' => 'AND',
                            array(
                                'field' => 'ttl_block_title_type',
                                'value' => 'with-icon-on-top',
                                'compare' => '=',
                            ),
                            array(
                                'field' => 'ttl_block_show_title',
                                'value' => 'yes',
                                'compare' => '=',
                            )
                        )
                    ),
                Field::make('image', 'ttl_block_left_title_img', 'Left pre title image')
                    ->set_type(array('image'))
                    ->set_value_type('url')
                    ->set_conditional_logic(array(
                            'relation' => 'AND',
                            array(
                                'field' => 'ttl_block_title_type',
                                'value' => 'numeric-with-left-icon',
                                'compare' => '=',
                            ),
                            array(
                                'field' => 'ttl_block_show_title',
                                'value' => 'yes',
                                'compare' => '=',
                            )
                        )
                    ),
                Field::make('text', 'ttl_block_title', 'Title')
                    ->set_conditional_logic(array(
                            array(
                                'field' => 'ttl_block_show_title',
                                'value' => 'yes',
                                'compare' => '=',
                            )
                        )
                    ),
                Field::make('color', 'ttl_block_title_color', 'Title color')
                    ->set_conditional_logic(array(
                            array(
                                'field' => 'ttl_block_show_title',
                                'value' => 'yes',
                                'compare' => '=',
                            )
                        )
                    ),
                Field::make('separator', 'ttl_block_separator_4', 'Section description settings'),
                Field::make('select', 'ttl_block_show_desc', 'Show description?')
                    ->set_options(array(
                            'no' => 'No',
                            'yes' => 'Yes',
                        )
                    ),
                Field::make('textarea', 'ttl_block_desc', 'Description')
                    ->set_conditional_logic(array(
                            array(
                                'field' => 'ttl_block_show_desc',
                                'value' => 'yes',
                                'compare' => '=',
                            )
                        )
                    ),
                Field::make('color', 'ttl_block_desc_color', 'Description color')
                    ->set_conditional_logic(array(
                            array(
                                'field' => 'ttl_block_show_desc',
                                'value' => 'yes',
                                'compare' => '=',
                            )
                        )
                    ),
                Field::make('color', 'ttl_block_desc_accent_color', 'Description accent color')
                    ->set_conditional_logic(array(
                            array(
                                'field' => 'ttl_block_show_desc',
                                'value' => 'yes',
                                'compare' => '=',
                            )
                        )
                    ),
            )
        )
        ->set_category('layout')
        ->set_render_callback(
            function ($fields, $attributes, $inner_blocks) {
                ?>
                <!-- <section id="<?= $fields['ttl_block_id'] ?>" style="background: #f9f9f9; padding: 75px 60px;"> -->
                <!-- <div class="container-big"> -->
                <!-- <pre style="margin: 0;"><? print_r($fields); ?></pre> -->
                <!-- <div id="products-slider" class="block block--no-margin products-slider-block"> -->
                <!-- <div class="products-slider-block__content-wrapper"> -->
                <!-- <img alt="img"  data-src="" src="" class="products-slider-block__logo"> -->
                <!-- <div class="products-slider-block__title">Shopping experience solutions for enterprise brands</div> -->
                <!-- <a href="#" class="site-btn products-slider-block__btn">Learn more</a> -->
                <!-- </div> -->
                <!-- </div> -->
                <!-- </div> -->
                <!-- </section> -->
                <?
            }
        );
}

add_filter('crb_media_buttons_html', function ($html, $field_name) {
    if ($field_name != '_') {
        return;
    } else {
        return $html;
    }
}, 10, 2);