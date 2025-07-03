<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;
use App\Models\Tag;
use App\Models\Post;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = Category::all();
        $tags = Tag::pluck('id')->toArray();

        Post::factory(10)->make()->each(function ($post) use ($categories, $tags) {
            $post->category()->associate($categories->random());
            $post->save();
            $tagsId=collect($tags)->random(rand(2,4))->toArray();
            $post->tags()->attach($tagsId);
        });
    }
}
