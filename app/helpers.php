<?php

use App\Logo;
use App\Page;

if (!function_exists('get_logo')) {
    function get_logo()
    {
        $logo = Logo::where('logo_name', 'main_logo')->first();
        return $logo->image;
    }

    function get_favicon()
    {
        $logo = Logo::where('logo_name', 'icon')->first();
        return $logo->image;
    }

    function getPages()
    {
        $pages = Page::all();
        return $pages;
    }
}
