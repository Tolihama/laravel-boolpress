<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Post;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = config('posts-test');

        foreach($data as $item) {
            $new_post = new Post();

            $new_post->title = $item['title'];
            $new_post->slug = Str::slug($new_post->title, '-');
            $new_post->content = $item['content'];

            $new_post->save();
        }
    }
}
