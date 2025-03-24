<?php

namespace App\View\Composers;

use App\DTO\PostDTO;
use Roots\Acorn\View\Composer;

class Post extends Composer
{
    /**
     * List of views served by this composer.
     *
     * @var array
     */
    protected static $views = [
        'singles.post',
    ];

    /**
     * Data to be passed to view before rendering, but after merging.
     *
     * @return array
     */
    public function with(): array
    {
        return [
            'model' => new PostDTO(get_post()),
        ];
    }
}
