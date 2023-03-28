<?php

namespace Modules\User\seeders;
use Faker\Factory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Modules\User\src\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $user =new User();
        // $user->name="Hùng Mạnh";
        // $user->email="domanh462@gmail.com";
        // $user->password=Hash::make('123456');
        // $user->group_id=1;
        // $user->save();
        $faker = Factory::create();

        $limit = 30;

        for ($i = 0; $i < $limit; $i++) {
            DB::table('users')->insert([
                'name' => $faker->name,
                'email' => $faker->unique()->email,
                'password' => Hash::make('123456'),
                'group_id' => 2,
            ]);
        }


    }
}
