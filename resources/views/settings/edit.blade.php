@extends('layouts.app')

@section('title', 'Settings')

@section('content')
    <h2 class="text-2xl md:text-4xl mt-10 text-center text-gray-900 dark:text-gray-100 font-semibold">
        {{ __('User Information') }}
    </h2>

    <div class="flex justify-center items-center mt-10">
        <div class="w-1/2">
            @include('settings.partials.update-username-form')
        </div>
    </div>
@endsection
