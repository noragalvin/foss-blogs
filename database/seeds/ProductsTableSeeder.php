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
                "user_id" => rand(1,12),
                "title" => $faker->realText(10),
                "content" => $faker->randomHtml(2,3),
                'short_description' => $faker->realText(20),
                "image_url" => $faker->imageUrl,
                "created_at" => $this->getRandomTimestamps()
            ]);
        }
    }

    function getRandomTimestamps($backwardDays = -800)
	{
		$backwardCreatedDays = rand($backwardDays, 0);

		return \Carbon\Carbon::now()->addDays($backwardCreatedDays)->addMinutes(rand(0, 60 * 23))->addSeconds(rand(0, 60));
	}
}
