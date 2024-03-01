<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Repositories\PostRepository;
use Illuminate\Support\Facades\Auth;
use App\Repositories\ImageRepository;

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

        $posts = $this->postRepository->posts();
        $images = $this->imageRepository->storeImagesInArray($postId);

        return view('blogpost.index', compact('posts', 'images'));
    }

    public function create()
    {
        if (! Auth::check()) {
            return redirect()->route('login');
        }

        // The id for the images to link to.
        // $post = new Post();
        // $post->user_id = auth()->id();
        // $post->save();

        // change this back to:
        // return view('blogpost.create', ['id' => $post->id]);
        // when implementing images.
        return view('blogpost.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required',
        ]);

        // change method to editPost when implementing images.
        $this->postRepository->storePost($request->title, $request->content, auth()->id());

        return redirect()->route('blogpost.index');
    }

    public function delete($id)
    {
        $this->postRepository->deletePost($id);

        return redirect()->route('blogpost.index');
    }
}
