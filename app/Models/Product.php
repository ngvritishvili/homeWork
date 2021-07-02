<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $table = 'products';


    public function currency()
    {
        return $this->belongsTo(CurrencyList::class);
    }


//    public function USD()
//    {
//        return $this->hasManyThrough(
//            Currency::class,
//            USD::class,
//        );
//    }
//
//    public function EURO()
//    {
//        return $this->hasManyThrough(
//            Currency::class,
//            EURO::class,
//        );
//    }
//
//    public function GEL()
//    {
//        return $this->hasManyThrough(
//            Currency::class,
//            GEL::class,
//        );
//    }


}
