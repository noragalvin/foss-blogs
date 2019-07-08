<?php

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table("categories")->insert([
            "name" => "Fashion",
            "description" => "Most fashion on the world"
        ]);

        DB::table("categories")->insert([
            "name" => "Sport",
            "description" => "Sport is my life"
        ]);

        DB::table("categories")->insert([
            "name" => "Technology",
            "description" => "Technology is the power"
        ]);
    }
}
