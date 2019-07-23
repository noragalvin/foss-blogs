<?php

use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();

        for($i = 0; $i < 50; $i++) {
            DB::table("posts")->insert([
                "category_id" => rand(1,3),
                "user_id" => rand(1,10),
                "title" => $faker->realText(10),
                "content" => $faker->randomHtml(2,3),
                'short_description' => $faker->realText(20),
                "image_url" => $faker->imageUrl
            ]);
        }
    }
}
