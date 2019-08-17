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

        DB::table("categories")->insert([
            "name" => "Startups",
            "description" => "Startups is the power"
        ]);

        DB::table("categories")->insert([
            "name" => "Elementals",
            "description" => "Elementals is the power"
        ]);

        DB::table("categories")->insert([
            "name" => "Art",
            "description" => "Art is the power"
        ]);

        DB::table("categories")->insert([
            "name" => "Gaming",
            "description" => "Gaming is the power"
        ]);
    }
}
