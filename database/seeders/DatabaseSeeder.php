<?php

namespace Database\Seeders;

use App\Models\User;
use Faker\Factory as Faker;
use Modules\Post\src\Models\Post;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */


    public function run(): void
    {

        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        // khởi tạo đối tượng faker
    //     $faker= Faker::create();
    //     $randomImages =[
    //         '/storage/photos/1/999-Anh-Gai-Xinh-Viet-Nam-Hot-Girl-Cute-De.jpg',
    //         '/storage/photos/1/202106080209252204-6ec88eae-5394-45e6-85e0-640b4c8de751.jpeg',
    //         '/storage/photos/1/Anh-gai-xinh-de-thuong.jpg',
    //         '/storage/photos/1/chup-anh-dep-07-1637.jpg',
    //         '/storage/photos/1/download.png',
    //         '/storage/photos/1/hinh-nen-gai-xinh.jpg'
    //    ];
    //     // // chạy vòng lập xác định số bản ghi
    //     for($i=0;$i<5000;$i++){
    //         Post::create([
    //             'title' => $faker->sentence(6,true),
    //             'slug'=>$faker->sentence(6,true),
    //             'content' =>$faker->paragraphs(3,true),
    //             'exceprt' =>$faker->paragraphs(1,true),
    //             'thumbnail' => $randomImages[rand(0, 5)] ,
    //             'post_id'=>1
    //         ]);
    //     }
    //     // User::created([])

    }
}
