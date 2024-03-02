<div class="bg-white rounded-md p-4">
    <form method="POST" action="{{ route('settings.update') }}">
        @csrf
        @method('patch')

        {{-- Title Update Username --}}
        <h3 class="text-xl md:text-2xl text-black font-semibold">
            {{ __('Update Username') }}
        </h3>

        @if (session('status') === 'email-not-updated')
            <div class="flex justify-center items-center">
                <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 5000)"
                    class="text-sm text-white bg-red-900 rounded-md p-2 mt-2">
                    {{ __('Sorry, your email change has failed due to you being logged in using the ' . ucfirst(Auth::user()->provider) . ' provider.') }}
                </p>
            </div>
        @endif

        <div>
            <x-input-label for="username" :value="__('Username')" />
            <p class="text-xs text-black">Change your username</p>
            <x-text-input id="username" class="block mt-1 w-full" type="text" name="username" :value="old('username', Auth::user()->username)"
                required />
        </div>

        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <p class="text-xs text-black">Change your email</p>
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email', Auth::user()->email)"
                required />
        </div>

        <div class="mt-5 w-1/2 flex flex-row space-x-2 items-center">
            <x-primary-button>{{ __('Save') }}</x-primary-button>
            @if (session('status') === 'username-updated')
                <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-black">
                    {{ __('Saved.') }}</p>
            @endif
        </div>
    </form>
</div>
