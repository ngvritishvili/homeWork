<?php


namespace App\MyClasses;


use App\Models\CurrencyList;

class CheckCurrency
{
    public static function isTrue($var)
    {
        $curr = CurrencyList::where('currency', $var)->first();

        return ($curr) ? true : false;
    }

}
