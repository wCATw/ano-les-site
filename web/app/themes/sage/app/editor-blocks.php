<?php
/**
 * Registering ACF custom blocks for gutenberg editor
 **/

namespace App;

use function Roots\view;

add_action('acf/init', __NAMESPACE__.'\acf_init_block_types');

function acf_init_block_types(): void
{
    if (function_exists('acf_register_block_type')) {
        // register a banner block
        acf_register_block_type(array(
            'name' => 'example',
            'title' => 'Пример блока',
            'description' => 'Пример блока',
            'render_callback' => __NAMESPACE__.'\my_acf_block_render_callback',
            'category' => 'formatting',
            'icon' => 'editor-table',
            'keywords' => array('example', 'пример'),
        ));
    }
}

function my_acf_block_render_callback($block): void
{
    // convert name ("acf/testimonial") into path friendly slug ("testimonial")
    $slug = str_replace('acf/', '', $block['name']);
    $directory = "blocks";

    echo view("${directory}/${slug}", ['block' => $block])->render();
}
