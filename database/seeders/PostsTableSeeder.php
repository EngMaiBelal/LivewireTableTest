<?php

namespace Database\Seeders;

use Faker\Factory;
use App\Models\Post;
use App\Models\User;
use App\Models\Category;
use Illuminate\Database\Seeder;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();

        for($i=1; $i<=15; $i++){
            Post::create([
                'category_id'=>Category::inRandomOrder()->first()->id,
                'user_id'=>User::inRandomOrder()->first()->id,
                'title'=>$faker->sentence(4),
                'body'=>$faker->paragraph(),
                // 'image'=>sprintf("%02d",$i).'.jpg',
                'image'=>time().$i.'.jpg',
            ]);
        }
    }
}
