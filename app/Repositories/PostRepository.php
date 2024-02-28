<?php

namespace App\Repositories;

use Illuminate\Support\Facades\DB;

class PostRepository
{
    public function featuredPosts()
    {
        return DB::table('posts')
            ->limit(5)
            ->get();
    }

    public function allPosts()
    {
        return DB::table('posts')
            ->inRandomOrder()
            ->latest()
            ->get();
    }

    public function getPostsByUser()
    {
        $users = DB::table('users')
            ->join('posts', 'users.id', '=', 'posts.user_id')
            ->select('posts.id', 'users.name', 'posts.title', 'posts.content', 'posts.user_id', 'posts.image')
            ->get();

        return $users;
    }

    public function createPost($title, $content, $userId)
    {
        return DB::table('posts')
            ->insert([
                'title' => $title,
                'content' => $content,
                'user_id' => $userId,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
    }

    public function deletePost($id)
    {
        return DB::table('posts')
            ->where('id', $id)
            ->delete();
    }
}
