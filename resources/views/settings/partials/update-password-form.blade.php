<div class="bg-white rounded-md p-4">

    <h3 class="text-xl md:text-2xl text-black font-semibold">
        {{ __('Update Password') }}
    </h3>

    @if (session('status') === 'password-incorrect')
        <div class="w-full">
            <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 5000)"
                class="text-sm text-white bg-red-900 rounded-md p-2 mt-2">
                {{ __('Password was incorrect, try again.') }}
            </p>
        </div>
    @endif

    @if (session('status') === 'oauth-password-updated' || session('status') === 'password-updated')
        <div class="w-full">
            <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 5000)"
                class="text-sm text-white bg-green-900 rounded-md p-2 mt-2">
                {{ __('Password set!') }}
            </p>
        </div>
    @endif

    @auth
        @if (auth()->user()->password !== null)
            <form method="POST" action="{{ route('settings.password') }}" id="password-change">
                @csrf
                @method('PATCH')

                <div>
                    <p class="text-xs text-black mt-3">Enter your current password</p>
                    <x-text-input id="current_password" class="block mt-1 w-full" type="password" name="current_password"
                        required />
                </div>

                <div>
                    <p class="text-xs text-black mt-3">Enter your new password</p>
                    <x-text-input id="password" class="block mt-1 w-full" type="password" name="password"
                        required />
                </div>

                <div class="mt-5 w-1/2 flex flex-row space-x-2 items-center">
                    <x-primary-button>{{ __('Save') }}</x-primary-button>
                </div>
            </form>
        @else
            <form method="POST" action="{{ route('settings.oauth') }}">
                @csrf
                @method('PATCH')

                <div>
                    <p class="text-xs text-black">You are logged in using the {{ ucfirst(Auth::user()->provider) }}
                        provider. You do not have a password set. You can set a password by entering a new password below.
                    </p>
                    <p class="text-xs text-black mt-3">Enter your new password</p>
                    <x-text-input id="oauth_password" class="block mt-1 w-full" type="password" name="oauth_password"
                        required />
                </div>

                <div class="mt-5 w-1/2 flex flex-row space-x-2 items-center">
                    <x-primary-button>{{ __('Save') }}</x-primary-button>
                </div>
            </form>
        @endif
    @endauth
</div>
