<?php

namespace App\Services;

use WpOrg\Requests\Exception;

/**
 * This service match pages in db with their constants which set in settings page
 * if you want to add new page:
 *   - add public property in this class with the name of constant
 *   - add key => value in /app/acf.php group in field keys setting (see the comment in acf.php)
 *   - match the page to constant on site settings option page
 */
class PageService
{
    private static ?PageService $instance = null;

    public ?string $front_page = null;

    public ?string $about = null;

    public ?string $services = null;

    public ?string $contacts = null;

    public ?string $how_we_work = null;

    public ?string $delivery = null;

    public ?string $payment = null;

    public ?string $history = null;

    public ?string $b2b = null;

    public ?string $factory = null;

    public ?string $gallery = null;

    public ?string $faq = null;

    public function __construct()
    {
        $data = get_field('app_page_ids', 'option');
        foreach ($data as $page) {
            $this->{$page['const']} = $page['page_id'];
        }
    }

    // Get the single instance of the class
    public static function getInstance(): PageService
    {
        if (!self::$instance) {
            self::$instance = new self();
        }

        return self::$instance;
    }

    // Prevent cloning of the instance
    public function __clone()
    {
    }

    // Prevent unserialization of the instance
    public function __wakeup()
    {
    }

    /**
     * @return void
     * @throws Exception
     */
    public function validatePage(string $propName): void
    {
        if (!$this->$propName) {
            throw new Exception('Set '.$propName.' page in site settings', 500);
        }
    }
}
