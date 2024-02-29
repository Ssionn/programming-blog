<?php

namespace App\Repositories;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

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
            ->select('posts.id', 'users.name', 'posts.title', 'posts.content', 'posts.user_id')
            ->get();

        return $users;
    }

    public function editPost($title, $content, $userId)
    {
        return DB::table('posts')
            ->update([
                'title' => $title,
                'content' => $content,
                'user_id' => $userId,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
    }

    public function findPostById($id)
    {
        return DB::table('posts')
            ->where('id', $id)
            ->first();
    }

    public function deletePost($id)
    {
        return DB::table('posts')
            ->where('id', $id)
            ->delete();
    }
}
