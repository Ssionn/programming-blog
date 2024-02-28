@extends('layouts.app')

@section('title', 'HomePage')

@section('content')
<div class="flex justify-center flex-col mt-10">
    @if($featuredPosts->count() > 0)
    <h1 class="text-xl font-semibold text-black text-center mt-10">Featured Blog Posts</h1>
    @else
    @endif

    <div class="flex flex-col sm:flex-row justify-center mt-10">
        <div class="w-1/3">
        </div>
        <div class="w-2/4 space-y-10">
            @if($featuredPosts->count() > 0)
            @foreach($featuredPosts as $post)
            <div class="flex flex-col justify-center bg-gray-100 rounded-md p-4">
                <div class="">
                    <div class="p-4">
                        <h1 class="text-2xl font-semibold text-center">{{ $post->title }}</h1>
                    </div>
                    <div class="pt-2 pb-2 flex justify-center">
                        <img src="{{ $post->image }}" alt="post image" class="w-64 h-64">
                    </div>
                    <div>
                        <p class="mt-10 p-4 items-center text-wrap">{{ $post->content }}</p>
                    </div>
                </div>
            </div>
            @endforeach
            @else
            <p class="text-center text-white text-2xl font-semibold">No featured posts available</p>
            @endif
        </div>
        <div class="w-1/3">
        </div>
    </div>
</div>
@endsection