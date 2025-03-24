<?php

namespace App\DTO;

use WP_Post;

class PostDTO
{
    public int $id;
    public string $link;
    public string $name;
    public string|false $content;
    public string|false $excerpt;
    public string|false $image;
    public string $date;

    public function __construct(WP_Post|int $post)
    {
        $post = is_int($post) ? get_post($post) : $post;

        $this->id = $post->ID;
        $this->link = get_permalink($post);
        $this->name = $post->post_title;
        $this->content = $post->post_content;
        $this->excerpt = $post->post_excerpt;
        $this->image = get_the_post_thumbnail_url($post) ?: false;
        $this->date = get_the_date('Y.m.d', $post);
    }
}
