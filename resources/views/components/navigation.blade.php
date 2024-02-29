<div>
    @if (Auth::check())
        <div class="flex md:flex-row flex-col justify-center md:justify-end md:space-x-7 md:pr-16 mt-6 items-center">
            <span class="text-lg font-semibold text-white">
                {{ Auth::user()->name }}
            </span>
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="px-4 py-1 bg-indigo-500 rounded">
                    <span class="text-white">Logout</span>
                </button>
            </form>
        </div>
    @endif
    @if (!Auth::check())
        <div class="flex justify-center md:justify-end space-x-2 md:pr-16 mt-6 items-center">
            <a href="{{ route('login') }}">
                <button class="px-4 py-1 bg-indigo-500 rounded">
                    <span class="text-white">Login</span>
                </button>
            </a>
            <a href="{{ route('register') }}">
                <button class="px-4 py-1 bg-indigo-500 rounded">
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
        <div class="flex justify-center mt-5">
            <ul class="flex flex-row justify-center space-x-6 md:space-x-24 sm:mr-8 md:mr-16 items-center">
                <li>
                    <x-active-link :active="request()->routeIs('blogpost.index')" href="{{ route('blogpost.index') }}"
                        class="font-semibold text-white hover:text-gray-500">Home</x-active-link>
                </li>
                <li>
                    <x-active-link :active="request()->routeIs('blogpost.all')" href="{{ route('blogpost.all') }}"
                        class="font-semibold text-white hover:text-gray-500">All Posts</x-active-link>
                </li>
                @if (Auth::check())
                    <li>
                        <x-active-link :active="request()->routeIs('blogpost.create')" href="{{ route('blogpost.create') }}"
                            class="font-semibold text-white hover:text-gray-500">Create Post</x-active-link>
                    </li>
                @endif
                <!-- implement authentication for creating posts -->
            </ul>
        </div>
    </div>
</div>
