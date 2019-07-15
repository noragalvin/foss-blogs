<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(User::class, 10)->create();

        DB::table('users')->insert([
            'first_name' => 'Nora',
            'last_name' => 'Galvin',
            'email' => 'minhnora98@gmail.com',
            'password' => bcrypt("123456"), // 123456
            'type' => 0
        ]);

        DB::table('users')->insert([
            'first_name' => 'Ngoc',
            'last_name' => 'Tran',
            'email' => 'ngoc@gmail.com',
            'password' => bcrypt("123456"), // 123456
            'type' => 0
        ]);

        DB::table('users')->insert([
            'first_name' => 'Binh',
            'last_name' => 'Binh',
            'email' => 'binh@gmail.com',
            'password' => bcrypt("123456"), // 123456
            'type' => 1
        ]);
    }
}
