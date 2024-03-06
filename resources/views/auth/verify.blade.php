@extends('layouts.app')

@section('content')
    <div class="container mx-auto mt-10">
        <div class="bg-white p-4 rounded-md">
            <h2 class="text-2xl font-bold leading-9 tracking-tight text-gray-900">Verify Your Email Address</h2>
            <p class="mt-2 text-sm leading-5 text-gray-600">
                Before proceeding, please check your email for a verification link.
                If you did not receive the email,
            <form method="POST" action="{{ route('verification.resend') }}">
                @csrf
                <button type="submit"
                    class="mt-2 flex w-full justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                    Click here to request another
                </button>
            </form>
            </p>
        </div>
    </div>
@endsection
