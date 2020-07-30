<?php

use Illuminate\Database\Seeder;

class TableRestaurantsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('restaurants')->insert([
            "name" => "Banke Resort",
            "email" => "resortbanke@gmail.com",
            "address" => "banke,kathmandu"
        ]);
    }
}