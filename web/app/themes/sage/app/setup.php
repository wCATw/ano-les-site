<?php

/**
 * Theme setup.
 */

namespace App;

use function Roots\bundle;

/**
 * Register the theme assets.
 *
 * @return void
 */
add_action('wp_enqueue_scripts', function () {
    bundle('app')->enqueue();
}, 100);

/**
 * Register the theme assets with the block editor.
 *
 * @return void
 */
add_action('enqueue_block_editor_assets', function () {
    bundle('editor')->enqueue();
}, 100);

/**
 * Register the initial theme setup.
 *
 * @return void
 */
add_action('after_setup_theme', function () {
    /**
     * Disable full-site editing support.
     *
     * @link https://wptavern.com/gutenberg-10-5-embeds-pdfs-adds-verse-block-color-options-and-introduces-new-patterns
     */
    remove_theme_support('block-templates');

    /**
     * Disable the default block patterns.
     *
     * @link https://developer.wordpress.org/block-editor/developers/themes/theme-support/#disabling-the-default-block-patterns
     */
    remove_theme_support('core-block-patterns');

    /**
     * Enable plugins to manage the document title.
     *
     * @link https://developer.wordpress.org/reference/functions/add_theme_support/#title-tag
     */
    add_theme_support('title-tag');

    /**
     * Enable post thumbnail support.
     *
     * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
     */
    add_theme_support('post-thumbnails');

    /**
     * Enable responsive embed support.
     *
     * @link https://developer.wordpress.org/block-editor/how-to-guides/themes/theme-support/#responsive-embedded-content
     */
    add_theme_support('responsive-embeds');

    /**
     * Enable HTML5 markup support.
     *
     * @link https://developer.wordpress.org/reference/functions/add_theme_support/#html5
     */
    add_theme_support('html5', [
        'caption',
        'comment-form',
        'comment-list',
        'gallery',
        'search-form',
        'script',
        'style',
    ]);

    /**
     * Enable selective refresh for widgets in customizer.
     *
     * @link https://developer.wordpress.org/reference/functions/add_theme_support/#widgets
     */
    add_theme_support('widgets');

    /**
     * Enable selective refresh for widgets in customizer.
     *
     * @link https://developer.wordpress.org/reference/functions/add_theme_support/#customize-selective-refresh-widgets
     */
    add_theme_support('customize-selective-refresh-widgets');
}, 20);

// get images from production domain
if ($_SERVER['REMOTE_ADDR'] === '127.0.0.1') {
    // Replace src paths
    add_filter('wp_get_attachment_url', function ($url) {
        if (file_exists($url)) {
            return $url;
        }

        return str_replace($_ENV['WP_HOME'], $_ENV['PRODUCTION_URL'], $url);
    });

    // Replace srcset paths
    add_filter('wp_calculate_image_srcset', function ($sources) {
        foreach ($sources as &$source) {
            if (! file_exists($source['url'])) {
                $source['url'] = str_replace($_ENV['WP_HOME'], $_ENV['PRODUCTION_URL'], $source['url']);
            }
        }

        return $sources;
    });
}

/**
 * Add lightbox (Fancyapps).
 *
 * @see https://fancyapps.com source
 */
function lightbox_register(): void
{
    /**
     * Fancybox.
     *
     * @see https://fancyapps.com/fancybox source
     */
    wp_enqueue_style(
        'Fancybox',
        'https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.css',
        [],
        '5.0',
    );
    /**
     * Carousel.
     * PLEASE COMMENT ON IT IF YOU DON'T USE IT.
     *
     * @see https://fancyapps.com/carousel source
     */
    wp_enqueue_style(
        'Carousel',
        'https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/carousel/carousel.css',
        [],
        '5.0',
    );
    /**
     * Carousel plugin Thumbs.
     * PLEASE COMMENT ON IT IF YOU DON'T USE IT.
     *
     * @see https://fancyapps.com/carousel/plugins/thumbs source
     */
    wp_enqueue_style(
        'CarouselThumbs',
        'https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/carousel/carousel.thumbs.css',
        [],
        '5.0',
    );
    /**
     * Carousel plugin Autoplay.
     * PLEASE COMMENT ON IT IF YOU DON'T USE IT.
     *
     * @see https://fancyapps.com/carousel/plugins/autoplay source
     */
    wp_enqueue_style(
        'CarouselAutoplay',
        'https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/carousel/carousel.autoplay.css',
        [],
        '5.0',
    );
    /**
     * Panzoom.
     * PLEASE COMMENT ON IT IF YOU DON'T USE IT.
     *
     * @see https://fancyapps.com/panzoom source
     */
    wp_enqueue_style(
        'Panzoom',
        'https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/panzoom/panzoom.css',
        [],
        '5.0',
    );
    /**
     * Panzoom plugin Toolbar.
     * PLEASE COMMENT ON IT IF YOU DON'T USE IT.
     *
     * @see https://fancyapps.com/panzoom/plugins/toolbar source
     */
    wp_enqueue_style(
        'PanzoomToolbar',
        'https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/panzoom/panzoom.toolbar.css',
        [],
        '5.0',
    );
    /**
     * Panzoom plugin Pins.
     * PLEASE COMMENT ON IT IF YOU DON'T USE IT.
     *
     * @see https://fancyapps.com/panzoom/plugins/pins source
     */
    wp_enqueue_style(
        'PanzoomPins',
        'https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/panzoom/panzoom.pins.css',
        [],
        '5.0',
    );
}

add_action('wp_enqueue_scripts', __NAMESPACE__ . '\lightbox_register');

// Add svg support
function add_file_types_to_uploads($file_types): array
{
    $new_filetypes = [];
    $new_filetypes['svg'] = 'image/svg+xml';

    return array_merge($file_types, $new_filetypes);
}

add_action('upload_mimes', __NAMESPACE__ . '\add_file_types_to_uploads');
