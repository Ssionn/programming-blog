<div class="h-24">
    @if (Auth::check())
    <div class="flex justify-end space-x-7 pr-16 mt-6 items-center">
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
    @if (! Auth::check())
    <div class="flex justify-end space-x-2 pr-16 mt-6 items-center">
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
        <div class="sm:ml-8 md:ml-16 ml-3 flex md:justify-start justify-center items-center">
            <span class="text-2xl font-semibold text-white">
                Programming Blog
            </span>
        </div>
        <div class="mt-10 md:mt-0 flex justify-center">
            <ul class="flex flex-row space-x-4 sm:space-x-8 lg:space-x-24 sm:mr-8 md:mr-16 mr-3 items-center">
                <li>
                    <x-active-link :active="request()->routeIs('blogpost.index')" href="{{ route('blogpost.index') }}" class="font-semibold text-white hover:text-gray-500">Home</x-active-link>
                </li>
                <li>
                    <x-active-link :active="request()->routeIs('blogpost.all')" href="{{ route('blogpost.all') }}" class="font-semibold text-white hover:text-gray-500">All Posts</x-active-link>
                </li>
                <!-- implement authentication for creating posts -->
            </ul>
        </div>
    </div>
</div>
