<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\PostRepository;
use Illuminate\Support\Facades\Auth;

class BlogpostController extends Controller
{
    public function __construct(
        protected PostRepository $postRepository
    ) {
    }

    public function index()
    {
        $posts = $this->postRepository->getPostsByUser();

        return view('blogpost.index', compact('posts'));
    }

    public function all()
    {
        $allPosts = $this->postRepository->allPosts();

        return view('blogpost.all', compact('allPosts'));
    }

    public function create()
    {
        return view('blogpost.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required',
        ]);

        $this->postRepository->createPost($request->title, $request->content, auth()->id());

        return redirect()->route('blogpost.index');
    }

    public function delete($id)
    {
        $this->postRepository->deletePost($id);

        return redirect()->route('blogpost.index');
    }
}
