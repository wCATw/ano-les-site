<?php

namespace App\DTO;

class ContactsDataDTO
{
    public string $address;
    public string $email;
    public string $phone;
    public string $mobile_phone;
    public string $working_hours;
    public string $scheme;
    public array $social_links;
    public array $routes = [];

    public function __construct()
    {
        $id = 'options';
        $this->address = get_field('contacts_address', $id);
        $this->email = get_field('contacts_email', $id);
        $this->phone = get_field('contacts_phone', $id);
        $this->mobile_phone = get_field('contacts_mobile_phone', $id);
        $this->working_hours = get_field('contacts_working_hours', $id);
        $this->social_links = get_field('contacts_social', $id) ?: [];

        $scheme_field = get_field('contacts_scheme', $id);
        $this->scheme = $scheme_field['contacts_map_code'];
        if ($scheme_field['contacts_routes']) {
            foreach ($scheme_field['contacts_routes'] as $route) {
                $this->routes[] = $route['route'];
            }
        }
    }
}
