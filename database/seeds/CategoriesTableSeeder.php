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
            "name" => "Fashion"
        ]);

        DB::table("categories")->insert([
            "name" => "Sport"
        ]);

        DB::table("categories")->insert([
            "name" => "Technology"
        ]);
    }
}
