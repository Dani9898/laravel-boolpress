<?php

use Illuminate\Database\Seeder;
use App\Post;
use App\Category;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Post::class, 10) -> make()->each(function($post){
            $category = Category::inRandomOrder() ->limit(1) ->first();
            $post -> category() ->associate($category);
            $post ->save();
        });                                                           
    
        for ($i = 1; $i < 10; $i++) {
            DB::table('post_tag')->insert([
                ['post_id' => rand(1, 10), 'tag_id' => rand(1, 20)]
            ]);
        }

    }
}
