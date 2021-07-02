<?php

namespace Database\Seeders;

use App\Models\CurrencyList;
use Illuminate\Database\Seeder;

class CurrencyListSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $arr = ['gel', 'usd', 'eur' ];



        foreach ($arr as $one)
        {
            $curr = new CurrencyList();
            $curr->currency = $one;

            $curr->save();
        }



    }
}
