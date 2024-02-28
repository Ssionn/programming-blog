@extends('layouts.app')

@section('title', 'HomePage')

@section('content')
    <div class="flex justify-center flex-col mt-10">
        @if ($posts->count() > 0)
            <h1 class="text-xl font-semibold text-black text-center mt-10">Featured Blog Posts</h1>
            @if (Auth::check())
                <div class="flex justify-end pr-16 items-center">
                    <form action="{{ route('blogpost.create') }}" method="GET">
                        <button type="submit" class="px-4 py-1 bg-indigo-500 rounded">
                            <span class="text-white">Create Post</span>
                        </button>
                    </form>
                </div>
            @endif
        @else
        @endif

        <div class="flex flex-col sm:flex-row items-center mt-10 mb-20">
            <div class="w-1/3">
            </div>
            <div class="w-2/4 space-y-10">
                @if ($posts->count() > 0)
                    @foreach ($posts as $author)
                        <div class="flex flex-col justify-center bg-gray-100 rounded-md p-4">
                            <div class="">
                                <div class="p-4">
                                    <p class="text-xs font-semibold text-gray-500">Made By: {{ $author->name }}</p>
                                    {{-- {{ dd($posts) }} --}}
                                    <h1 class="text-2xl font-semibold text-center">{{ $author->title }}</h1>
                                    {{-- if the post belongs to the user, you're able to delete --}}
                                    @if (Auth::check() && Auth::user()->id === $author->user_id)
                                        <div class="flex justify-end">
                                            <form action="{{ route('blogpost.delete', $author->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit">
                                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16"
                                                        fill="currentColor" class="w-4 h-4">
                                                        <path fill-rule="evenodd"
                                                            d="M5 3.25V4H2.75a.75.75 0 0 0 0 1.5h.3l.815 8.15A1.5 1.5 0 0 0 5.357 15h5.285a1.5 1.5 0 0 0 1.493-1.35l.815-8.15h.3a.75.75 0 0 0 0-1.5H11v-.75A2.25 2.25 0 0 0 8.75 1h-1.5A2.25 2.25 0 0 0 5 3.25Zm2.25-.75a.75.75 0 0 0-.75.75V4h3v-.75a.75.75 0 0 0-.75-.75h-1.5ZM6.05 6a.75.75 0 0 1 .787.713l.275 5.5a.75.75 0 0 1-1.498.075l-.275-5.5A.75.75 0 0 1 6.05 6Zm3.9 0a.75.75 0 0 1 .712.787l-.275 5.5a.75.75 0 0 1-1.498-.075l.275-5.5a.75.75 0 0 1 .786-.711Z"
                                                            clip-rule="evenodd" />
                                                    </svg>
                                                </button>
                                            </form>
                                        </div>
                                    @endif
                                </div>
                                <div class="pt-2 pb-2 flex justify-center">
                                    <img src="{{ $author->image }}" alt="post image" class="w-64 h-64">
                                </div>
                                <div>
                                    <p class="mt-10 p-4 items-center text-wrap">{{ $author->content }}</p>
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
