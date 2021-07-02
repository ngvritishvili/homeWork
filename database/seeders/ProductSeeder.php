<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
//        (Product::factory(10))->create()->each(function($c) {
//            $c->products()->save((Currency::factory())->make());
//        }); // each Category will have 1 product


       Product::create([
           'name'=> 'Book Jhon wwk',
           'description' => 'Very nice book for toilet',
           'price' => 23.5,
           'currency_id' => 2,

       ]);

        Product::create([
            'name'=> 'Airplane',
            'description' => 'Flying is cool',
            'price' => 224523.5,
            'currency_id' => 1,

        ]);

        Product::create([
            'name'=> 'ball',
            'description' => 'FIFA 2021 Ball',
            'price' => 33.5,
            'currency_id' => 3,

        ]);

    }
}
