@extends('layouts.app')

@section('title', 'HomePage')

@section('content')
    <div class="flex justify-center flex-col mt-10">
        @if ($posts->count() > 0)
            <h1 class="text-xl font-semibold text-white text-center mt-10">Featured Blog Posts</h1>
        @else
            <p class="text-center text-white text-2xl font-semibold">No featured posts available</p>
        @endif

        @if (Auth::check())
            <div class="flex justify-end pr-16 items-center">
                <form action="{{ route('blogpost.create') }}" method="GET">
                    <button type="submit" class="px-4 py-1 bg-indigo-500 rounded">
                        <span class="text-white">Create Post</span>
                    </button>
                </form>
            </div>
        @endif
        <div class="flex flex-col sm:flex-row items-center mt-10 mb-20">
            <div class="w-1/3">
            </div>
            <div class="w-2/4 space-y-10">
                @if ($posts->count() > 0)
                    @foreach ($posts as $author)
                        <div class="flex flex-col bg-white rounded-lg border border-gray-200">
                            <div class="flex justify-between items-center p-8">
                                <div class="flex items-center">
                                    <div class="ml-2">
                                        <p class="text-sm font-semibold">{{ $author->name }}</p>
                                    </div>
                                </div>
                                @if (Auth::check() && Auth::user()->id === $author->user_id)
                                    <form action="{{ route('blogpost.delete', $author->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-gray-500 hover:text-red-500">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                            </svg>
                                        </button>
                                    </form>
                                @endif
                            </div>
                            <div class="px-4 pb-2 pl-10 pr-10">
                                <h1 class="text-xl font-semibold">{{ $author->title }}</h1>
                                <p class="mt-2 text-gray-700">{{ $author->content }}</p>
                                @if ($author->image)
                                    <div class="mt-2">
                                        <img src="{{ $author->image }}" alt="Post Image" class="w-full rounded-lg">
                                    </div>
                                @endif
                            </div>
                            <div class="flex justify-between items-center px-4 py-2 border-t border-gray-200 mt-4">
                                {{-- Comment Section --}}
                                <div class="flex-grow mr-4">
                                    <input type="text" placeholder="Add a comment..."
                                        class="w-full border border-gray-300 px-3 py-2 rounded-lg">
                                </div>
                                <button
                                    class="bg-blue-500 hover:bg-blue-600 text-white font-semibold px-4 py-2 rounded-lg">Send</button>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
            <div class="w-1/3">
            </div>
        </div>
    </div>
@endsection
