<div class="bg-white rounded-md p-4">
    <h3 class="text-xl md:text-2xl text-black font-semibold">
        {{ __('Delete Account') }}
    </h3>

    <div>
        <p class="text-xs text-black">Are you sure you want to delete your account? This action cannot be undone.</p>
    </div>

    @if (auth()->user()->password === null)
        <div>
            <p class="text-red-500 text-xs">To be able to delete your account you have to set a password up first</p>
        </div>
    @endif

    @if (session('status') === 'account-deleted-error')
        <div class="w-full">
            <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 5000)"
                class="text-sm text-white bg-red-900 rounded-md p-2 mt-2">
                {{ __('Password was incorrect, failed to delete. Try again.') }}
            </p>
        </div>
    @endif

    <div class="mt-5 w-1/2 flex flex-row space-x-2 items-center">
        @if (auth()->user()->password === null)
            <x-danger-button data-modal-target="popup-modal" data-modal-toggle="popup-modal" disabled>
                {{ __('Delete') }}
            </x-danger-button>
        @else
            <x-danger-button data-modal-target="popup-modal" data-modal-toggle="popup-modal">
                {{ __('Delete') }}
            </x-danger-button>
        @endif
    </div>

    <div id="popup-modal" tabindex="-1"
        class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative p-4 w-full max-w-md max-h-full">
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                <button type="button"
                    class="absolute top-3 end-2.5 text-black bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                    data-modal-hide="popup-modal">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
                <div class="p-4 md:p-5 text-center">
                    <svg class="mx-auto mb-4 text-black w-12 h-12 dark:text-gray-200" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                    </svg>
                    <h3 class="mb-5 text-lg font-normal text-black">Are you sure you want to delete your account?</h3>
                    <p class="text-xs text-black">This action cannot be undone. Fill in your password.</p>
                    <form action="{{ route('settings.delete') }}" method="POST" class="flex flex-col">
                        @csrf
                        @method('DELETE')

                        <x-text-input id="delete_account" type="password" class="mt-3 mb-3" name="delete_account"
                            required placeholder="Password" />

                        <x-danger-button>
                            {{ __('Yes, I\'m Sure') }}
                        </x-danger-button>
                    </form>
                </div>
            </div>
        </div>
    </div>
