@extends('layouts.app')

@section('title', 'Settings')

@section('content')
    <h2 class="text-2xl md:text-4xl mt-10 text-center text-white font-semibold">
        {{ __('Settings') }}
    </h2>

    <div class="flex flex-col justify-center items-center mt-10 space-y-10">
        <div class="sm:w-1/2">
            @include('settings.partials.update-username-form')
        </div>

        {{-- if the user has a provider don't show this --}}
        {{-- this Attempt to read property "provider" on null --}}
        @if (auth()->check() && auth()->user()->provider_id === null)
            <div class="sm:w-1/2">
                @include('settings.partials.delete-account-form')
            </div>
        @endif
    </div>
@endsection
