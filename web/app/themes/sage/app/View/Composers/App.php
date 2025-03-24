<?php

namespace App\View\Composers;

use App\DTO\ContactsDataDTO;
use Roots\Acorn\View\Composer;

class App extends Composer
{
    /**
     * List of views served by this composer.
     *
     * @var array
     */
    protected static $views = [
        '404',
        'archive',
        'front-page',
        'index',
        'page',
        'search',
        'single',
        'taxonomy'
    ];

    /**
     * Data to be passed to view before rendering.
     *
     * @return array
     */
    public function with(): array
    {
        return [
            'siteName' => get_bloginfo('name', 'display'),
            'contacts' => new ContactsDataDTO(),
        ];
    }
}
