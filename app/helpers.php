<?php

use App\Logo;

if(!function_exists('get_logo')){
    function get_logo()
    {
        $logo = Logo::where('logo_name', 'main_logo')->first();
        return $logo->image;
    }
}