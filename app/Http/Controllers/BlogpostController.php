<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Repositories\ImageRepository;
use Illuminate\Http\Request;
use App\Repositories\PostRepository;
use Illuminate\Support\Facades\Auth;

class BlogpostController extends Controller
{
    public function __construct(
        protected PostRepository $postRepository,
        protected ImageRepository $imageRepository,
    ) {
    }

    public function index(Request $request)
    {
        $postId = $request->postId;

        $posts = $this->postRepository->getPostsByUser();
        $images = $this->imageRepository->storeImagesInArray($postId);

        return view('blogpost.index', compact('posts', 'images'));
    }

    public function all()
    {
        $allPosts = $this->postRepository->allPosts();

        return view('blogpost.all', compact('allPosts'));
    }

    public function create()
    {
        if (! Auth::check()) {
            return redirect()->route('login');
        }

        $post = new Post();
        $post->user_id = auth()->id();
        $post->save();

        return view('blogpost.create', ['id' => $post->id]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required',
        ]);

        $this->postRepository->editPost($request->title, $request->content, auth()->id());

        return redirect()->route('blogpost.index');
    }

    public function delete($id)
    {
        $this->postRepository->deletePost($id);

        return redirect()->route('blogpost.index');
    }
}
