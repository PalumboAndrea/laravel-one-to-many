<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use App\Models\Post;
use Illuminate\Support\Str;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker){
        for ($i=0; $i<50; $i++){
            $newPost = new Post();
            $newPost->title = $faker->unique()->realTextBetween(5, 20);
            $newPost->slug = Str::slug($newPost->title);
            $newPost->author = $faker->name();
            $newPost->content = $faker->realTextBetween(200, 400);
            $newPost->post_date = $faker->dateTimeThisYear();
            $newPost->image_path = $faker->imageUrl(640, 480, 'animals', true);
            $newPost->save();
        }
    }
}
