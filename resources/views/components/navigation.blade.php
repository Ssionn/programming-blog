<div>
    @if (Auth::check())
        <div class="flex md:flex-row flex-col justify-center md:justify-end md:space-x-7 md:pr-16 mt-6 items-center">
            <x-active-link :active="request()->routeIs('settings.edit')" href="{{ route('settings.edit') }}" class="">
                <span class="text-lg font-semibold">
                    @if (! empty(Auth::user()->username))
                        {{ Auth::user()->username }}
                    @else
                        {{ Auth::user()->name }}
                    @endif
                </span>
            </x-active-link>
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="px-4 py-1 transition ease-in-out delay-150 bg-orange-500 hover:bg-orange-300 rounded">
                    <span class="text-white">Logout</span>
                </button>
            </form>
        </div>
    @endif
    @if (!Auth::check())
        <div class="flex justify-center md:justify-end space-x-2 md:pr-16 mt-6 items-center">
            <a href="{{ route('login') }}">
                <button class="px-4 py-1 hover:scale-105 transition ease-in-out delay-150 hover:bg-orange-300 bg-orange-500 rounded-md">
                    <span class="text-white">Login</span>
                </button>
            </a>
            <a href="{{ route('register') }}">
                <button class="px-4 py-1 hover:scale-105 transition ease-in-out delay-150 hover:bg-orange-300 bg-orange-500 rounded-md">
                    <span class="text-white">Register</span>
                </button>
            </a>
        </div>
    @endif
    <div class="pt-5 flex flex-col md:flex-row justify-between">
        <div class="sm:ml-8 md:ml-16 flex md:justify-start justify-center items-center">
            <a href="{{ route('blogpost.index') }}">
                <span class="text-2xl font-semibold text-white">
                    Programming Blog
                </span>
            </a>
        </div>
        <div class="flex justify-center">
            <ul class="flex flex-row justify-center space-x-6 md:space-x-12 sm:mr-8 md:mr-16 items-center">
                <li>
                    <x-active-link :active="request()->routeIs('blogpost.index')" href="{{ route('blogpost.index') }}"
                        class="font-semibold">Home</x-active-link>
                </li>
                @if (Auth::check())
                    <li>
                        <x-active-link :active="request()->routeIs('blogpost.create')" href="{{ route('blogpost.create') }}"
                            class="font-semibold">Create Post</x-active-link>
                    </li>
                @endif
            </ul>
        </div>
    </div>
</div>
