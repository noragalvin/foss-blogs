<?php

use Illuminate\Database\Seeder;

class CommentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();

        for($i = 0; $i < 200; $i++) {
            DB::table("comments")->insert([
                "comment_id" => 0,
                "post_id" => rand(1, 50),
                "user_id" => rand(1, 10),
                "content" => $faker->realText(50),
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
