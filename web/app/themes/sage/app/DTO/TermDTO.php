<?php

namespace App\DTO;

use WP_Term;

class TermDTO
{
    public string|int $id;
    public string $name;
    public string $slug;
    public string $taxonomy;
    public string $description;
    public string $link;
    public function __construct(WP_Term|int $term)
    {
        $term = is_int($term) ? get_term_by('term_id', $term) : $term;

        $this->id = $term->term_id;
        $this->name = $term->name;
        $this->slug = $term->slug;
        $this->taxonomy = $term->taxonomy;
        $this->description = $term->description;
        $this->link = get_term_link($term);
    }
}
