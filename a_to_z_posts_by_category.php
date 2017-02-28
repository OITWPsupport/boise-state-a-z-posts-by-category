<?php
/*
Plugin Name: A-Z Posts by Category
Author: Matt Berg
 */

require('classes/AZPostsCategoryDisplay.php');
require('classes/AZPostsCategorySettingsPage.php');

add_shortcode('a_z_posts_category', 'getAtoZView');

if(is_admin()) {

    $pages = new AZPostsCategoryDisplay();

    $AZPostsCategorySettingsPage = new AZPostsCategorySettingsPage($pages);
}

function getAtoZView($params)
{
    $displayHandler = new AZPostsCategoryDisplay();
    return $displayHandler->displayPosts($params['category']);
}