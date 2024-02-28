<?php

namespace App\Http\Controllers;

use App\Repositories\PostRepository;

class BlogpostController extends Controller
{
    public function __construct(
        protected PostRepository $postRepository
    ) {
    }

    public function index()
    {
        $featuredPosts = $this->postRepository->featuredPosts();

        return view('blogpost.index', compact('featuredPosts'));
    }

    public function all()
    {
        $allPosts = $this->postRepository->allPosts();

        return view('blogpost.all', compact('allPosts'));
    }
}
