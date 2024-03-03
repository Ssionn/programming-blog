<?php

namespace App\Repositories;

use App\Models\Post;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class PostRepository
{
    public function posts()
    {
        return Post::all();
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

    public function storePost($title, $content, $userId)
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
