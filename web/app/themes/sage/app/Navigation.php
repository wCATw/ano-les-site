<?php

namespace App;

use Walker_Nav_Menu;

register_nav_menus([
    'main_nav' => 'Главное меню', // тут мы регистрируем области меню для админки
]);

// Фильтрация ID элементов меню
add_filter('nav_menu_item_id', __NAMESPACE__.'\filter_nav_item_id', 10, 4);
function filter_nav_item_id($menu_id, $item, $args, $depth): string
{
    return '';
}

// Добавление класса для элементов меню с дочерними элементами
add_filter('wp_nav_menu_objects', __NAMESPACE__.'\add_has_children_class');
function add_has_children_class($items): mixed
{
    $parents = wp_list_pluck($items, 'menu_item_parent');

    foreach ($items as $item) {
        if (in_array($item->ID, $parents)) {
            $item->classes[] = 'has-children';
        }
    }

    return $items;
}

// Фильтрация классов элементов меню
add_filter('nav_menu_css_class', __NAMESPACE__.'\filter_nav_item_classes', 10, 4);
function filter_nav_item_classes($classes, $item, $args, $depth): array
{
    $base_class = $args->menu_class;

    $item_classes = [
        'base' => $base_class.'__item',
        'child' => $base_class.'__child-item',
        'active' => $base_class.'__item--active',
        'has-icon' => $base_class.'__item--has-icon',
        'has-child' => $base_class.'__item--has-child',
        'child-open' => $base_class.'__item--child-open'
    ];

    $depth_classes = ($depth == 0) ? [$item_classes['base']] : [$item_classes['child']];

    if ($item->current) {
        $depth_classes[] = $item_classes['active'];
    }

    if (in_array('has-children', $item->classes)) {
        $depth_classes[] = $item_classes['has-child'];
        if ($item->current) {
            $depth_classes[] = $item_classes['child-open'];
        }
    }

    if (in_array('has-icon', $item->classes)) {
        $depth_classes[] = $item_classes['has-icon'];
    }

    return $depth_classes;
}

// Фильтрация атрибутов ссылки меню
add_filter('nav_menu_link_attributes', __NAMESPACE__.'\filter_nav_link_attributes', 10, 4);
function filter_nav_link_attributes($attrs, $item, $args, $depth): array
{
    $base_class = $args->menu_class;
    $attrs['class'] = $base_class."__link";

    if ($item->current) {
        $attrs['class'] .= ' '.$base_class.'__link--active';
    }

    return $attrs;
}

// Фильтрация классов подменю
add_filter('nav_menu_submenu_css_class', __NAMESPACE__.'\filter_nav_submenu_classes', 10, 4);
function filter_nav_submenu_classes($classes, $args, $depth): array
{
    return [$args->menu_class.'__child-list'];
}

class Navigation extends Walker_Nav_Menu
{
    private $ID;
    private $depth;
    private array $classes = [];
    private $child_count = 0;
    private $have_current = false;

    // Не начинаем верхний уровень
    function start_lvl(&$output, $depth = 0, $args = []): void
    {
        if ($depth == 0 || $this->depth != $depth) {
            return;
        }

        parent::start_lvl($output, $depth, $args);
    }

    // Не заканчиваем верхний уровень
    function end_lvl(&$output, $depth = 0, $args = []): void
    {
        if ($depth == 0 || $this->depth != $depth) {
            return;
        }

        parent::end_lvl($output, $depth, $args);
    }

    // Не обрабатываем элементы верхнего уровня
    function end_el(&$output, $item, $depth = 0, $args = []): void
    {
        if ($depth == 0) {
            return;
        }

        parent::end_el($output, $item, $depth, $args);
    }

    // Отображаем только текущую ветвь
    function display_element($element, &$children_elements, $max_depth, $depth, $args, &$output): void
    {
        $current_element_markers = ['current-menu-item', 'current-menu-parent', 'current-menu-ancestor'];
        $this->classes = array_intersect($current_element_markers, $element->classes);

        $ancestor_of_current = !empty($this->classes);
        $is_current = in_array('current-menu-item', $this->classes);

        if ($is_current) {
            $this->child_count = isset($children_elements[$element->ID]) ? count($children_elements[$element->ID]) : 0;
            $this->ID = $element->ID;
            $this->depth = $depth;
            $this->have_current = true;

            if ($this->child_count > 0) {
                foreach ($children_elements[$element->ID] as $child) {
                    parent::display_element($child, $children_elements, $max_depth, $depth, $args, $output);
                }
            } else {
                foreach ($children_elements[$element->menu_item_parent] as $child) {
                    parent::display_element($child, $children_elements, $max_depth, $depth, $args, $output);
                }
            }
        }

        if ($depth == 0 && !$ancestor_of_current) {
            return;
        }

        if (!$this->have_current) {
            parent::display_element($element, $children_elements, $max_depth, $depth, $args, $output);
        }
    }
}
