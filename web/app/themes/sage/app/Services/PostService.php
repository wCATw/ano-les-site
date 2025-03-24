<?php

namespace App\Services;

use JetBrains\PhpStorm\ExpectedValues;

class PostService
{
    /**
     * @param  string  $postType
     * @param  string  $orderBy
     * @param  string  $order
     * @return array
     */
    public static function getAllPosts(
        string $postType,
        #[ExpectedValues(['date', 'title', 'author', 'rand'])] string $orderBy = 'date',
        #[ExpectedValues(['ASC', 'DESC'])] string $order = 'DESC',
    ): array {
        $args = [
            'post_type' => $postType,
            'numberPosts' => -1,
            'posts_per_page' => -1,
            'orderby' => $orderBy,
            'order' => $order,
        ];

        return get_posts($args);
    }

    /**
     * @param  string  $postType
     * @param  int  $postNumber
     * @return array
     */
    public static function getLatestPosts(string $postType, int $postNumber): array
    {
        $args = [
            'post_type' => $postType,
            'numberPosts' => -1,
            'posts_per_page' => $postNumber,
            'orderby' => 'date',
        ];

        return get_posts($args);
    }

    /**
     * @param  string  $postType
     * @param  string  $taxonomy
     * @param  string  $termField
     * @param  array  $terms
     * @param  string  $orderBy
     * @param  string  $order
     * @param  int  $postNumber
     * @return array
     */
    public static function getPostsByTerms(
        string $postType,
        string $taxonomy,
        #[ExpectedValues(['term_id', 'slug'])] string $termField,
        array $terms,
        #[ExpectedValues(['date', 'title', 'author', 'rand'])] string $orderBy = 'date',
        #[ExpectedValues(['ASC', 'DESC'])] string $order = 'DESC',
        int $postNumber = -1
    ): array {
        $args = [
            'post_type' => $postType,
            'numberPosts' => $postNumber,
            'posts_per_page' => -1,
            'orderby' => $orderBy,
            'order' => $order,
            'tax_query' => [
                [
                    'taxonomy' => $taxonomy,
                    'field' => $termField,
                    'terms' => $terms,
                    'operator' => 'IN'
                ],
            ]
        ];

        return get_posts($args);
    }
}
