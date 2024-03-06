@extends('layouts.app')

@section('title', $post->title)

@section('content')
<div class="container mx-auto">
    <div class="mt-10">
        <a href="{{ route('blogpost.index') }}" class="text-white text-lg font-bold inline-flex items-center transition ease-in-out delay-150 hover:bg-orange-200 hover:text-black px-2 py-2 rounded hover:scale-105">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 15.75 3 12m0 0 3.75-3.75M3 12h18" />
            </svg>
            Back to blog
        </a>
    </div>
    <div class="flex flex-col justify-center items-center space-y-10 mt-20">
        <h1 class="text-white text-4xl">
            {{ $post->title }}
        </h1>

        <p class="text-2xl text-white">
            {{ $post->content }}
        </p>
    </div>
    <div class="mt-20 mb-20">
        <livewire:comments :model="$post" />
    </div>
</div>
@endsection