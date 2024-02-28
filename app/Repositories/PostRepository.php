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

    public function getPostById($id)
    {
        return DB::table('posts')
            ->where('id', $id)
            ->first();
    }
}
