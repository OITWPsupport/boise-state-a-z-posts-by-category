<?php

class AZPostsCategorySettingsPage
{
    private $pages;

    public function __construct($pages)
    {
        $this->pages = $pages;

        add_action('admin_menu', array($this, 'bsu_hours_menu'));
    }

    public function bsu_hours_menu()
    {
        add_options_page(
            "A-Z Posts",
            "A-Z Posts",
            'manage_options',
            "az-posts-category",
            array($this->pages, 'get_shortcode_page')
            );

    }
}