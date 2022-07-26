<?php

use App\Logo;
use App\Currency;
use Illuminate\Support\Facades\Session;

if(!function_exists('get_logo')){
    function get_logo()
    {
        $logo = Logo::where('logo_name', 'main_logo')->first();
        return $logo->image;
    }
}

function currency_symbol(){
    if (Session::has('currency_symbol')) {
        return Session::get('currency_symbol');
    }
    return "৳";
}

function get_system_default_currency()
{
    return Currency::find(27);
}

function covertPrice($price)
{
    if(Session::has('currency_code') && Session::get('currency_code')){
        $price = floatval($price) / floatval(get_system_default_currency()->exchange_rate);
        $price = floatval($price) * floatval(Session::get('currency_exchange_rate'));
    }
    return formatCurrency($price);
}

function formatCurrency($price)
{
    return floatval(number_format($price, 2));
}