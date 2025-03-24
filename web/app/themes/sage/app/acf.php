<?php

namespace App;

// register acf json folder path
function my_acf_json_save_point(): string
{
    return get_stylesheet_directory().'/app/acf-json';
}
add_filter('acf/settings/save_json', __NAMESPACE__.'\my_acf_json_save_point');
function my_acf_json_load_point($paths)
{
    // Remove the original path (optional).
    unset($paths[0]);

    // Append the new path and return it.
    $paths[] = get_stylesheet_directory().'/app/acf-json';

    return $paths;
}
add_filter('acf/settings/load_json', __NAMESPACE__.'\my_acf_json_load_point');

// register PageService Group and Settings option page (this group is not showed in admin panel)
function add_acf_groups(): void
{
    acf_add_local_field_group([
        'key' => 'group_64d10d01b2c343',
        'title' => 'PageService',
        'fields' => [
            [
                'key' => 'field_64d10d0194650',
                'label' => 'Соответствие id страниц',
                'name' => 'app_page_ids',
                'type' => 'repeater',
                'layout' => 'table',
                'rows_per_page' => 20,
                'sub_fields' => [
                    [
                        'key' => 'field_64d10d7f94651',
                        'label' => 'Константа',
                        'name' => 'const',
                        'type' => 'select',
                        // if you want to add option here you have to add property in /app/Services/PageService.php with the same name
                        'choices' => [
                            'front_page' => 'Главная страница',
                            'about' => 'О компании',
                            'services' => 'Услуги',
                            'contacts' => 'Контакты',
                            'how_we_work' => 'Как мы работаем',
                            'delivery' => 'Доставка',
                            'payment' => 'Оплата',
                            'history' => 'История',
                            'b2b' => 'Партнерам',
                            'factory' => 'Производство',
                            'gallery' => 'Галерея',
                            'faq' => 'Вопрос - ответ',
                        ],
                        'default_value' => false,
                        'return_format' => 'value',
                        'parent_repeater' => 'field_64d10d0194650',
                    ],
                    [
                        'key' => 'field_64d10d9a94652',
                        'label' => 'Страница',
                        'name' => 'page_id',
                        'type' => 'post_object',
                        'post_type' => [
                            0 => 'page',
                        ],
                        'post_status' => [
                            0 => 'publish',
                        ],
                        'return_format' => 'id',
                        'ui' => 1,
                        'parent_repeater' => 'field_64d10d0194650',
                        'bidirectional_target' => [],
                    ],
                ],
            ],
        ],
        'location' => [
            [
                [
                    'param' => 'options_page',
                    'operator' => '==',
                    'value' => 'settings',
                ],
            ],
        ],
        'position' => 'normal',
        'style' => 'default',
        'label_placement' => 'top',
        'instruction_placement' => 'label',
        'active' => true,
    ]);
    acf_add_options_page([
        'page_title' => 'Настройки сайта',
        'menu_slug' => 'settings',
    ]);
    acf_add_options_page([
        'page_title' => 'Контакты',
        'menu_slug' => 'contacts',
    ]);
}
add_action('acf/init', __NAMESPACE__.'\add_acf_groups');
