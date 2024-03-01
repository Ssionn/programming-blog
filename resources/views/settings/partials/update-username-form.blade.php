<form method="POST" action="{{ route('settings.update') }}">
    @csrf
    @method('patch')

    @if (session('status') === 'email-not-updated')
        <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)" class="text-sm text-white bg-red-900">
            {{ __("Sorry, your email change has failed due to you being logged in using the " . Auth::user()->provider .  " provider.") }}</p>
    @endif

    <div>
        <x-input-label for="username" :value="__('Username')" />
        <p class="text-xs text-gray-300">Change your username</p>
        <x-text-input id="username" class="block mt-1 w-full" type="text" name="username" :value="old('username', Auth::user()->username)"
            required />
    </div>

    <div class="mt-4">
        <x-input-label for="email" :value="__('Email')" />
        <p class="text-xs text-gray-300">Change your email</p>
        <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email', Auth::user()->email)"
            required />
    </div>

    <div class="mt-10 w-1/2 flex flex-row space-x-2 items-center">
        <x-primary-button>{{ __('Save') }}</x-primary-button>
        @if (session('status') === 'username-updated')
            <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)" class="text-sm text-white">
                {{ __('Saved.') }}</p>
        @endif
    </div>
</form>
