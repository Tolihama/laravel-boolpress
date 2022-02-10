<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

// Faker import
use Faker\Generator as Faker;

// Model import
use App\Post;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for ($i = 0; $i < 100; $i++) {
            $new_post = new Post();

            $new_post->category_id = rand(1, 4);
            $new_post->title = $faker->text;
            $new_post->slug = Str::slug($new_post->title, '-');
            $new_post->content = $faker->text(500);

            $new_post->save();
        }
    }
}
