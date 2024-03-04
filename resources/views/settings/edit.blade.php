@extends('layouts.app')

@section('title', 'Settings')

@section('content')
    <h2 class="text-2xl md:text-4xl mt-10 text-center text-white font-semibold">
        {{ __('Settings') }}
    </h2>

    <div class="flex flex-col justify-center items-center mt-10 space-y-10">
        <div class="lg:w-1/2 w-full p-4">
            @include('settings.partials.update-username-form')
        </div>

        <div class="lg:w-1/2 w-full p-4">
            @include('settings.partials.update-password-form')
        </div>

        <div class="lg:w-1/2 w-full p-4">
            @include('settings.partials.delete-account-form')
        </div>
    </div>
@endsection
