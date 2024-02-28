<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Comment;
use App\Models\User;
use App\Models\Post;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory(10)->create();

        User::all()->each(function (User $user) {
            $user->posts()->saveMany(Post::factory(5)->make());

            $user->posts->each(function (Post $post) use ($user) {
                $post->comments()->saveMany(Comment::factory(5)->make([
                    'post_id' => $post->id,
                    'user_id' => $user->id,
                ]));
            });
        });
    }
}
