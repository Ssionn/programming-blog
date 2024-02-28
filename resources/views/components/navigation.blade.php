<div class="h-24">
    <div class="pt-10 flex flex-col md:flex-row justify-between">
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
            <div class="flex space-x-2 pr-10">
                <button class="px-4 py-1 bg-indigo-500 rounded">
                    <span class="text-white">Login</span>
                </button>
                <button class="px-4 py-1 bg-indigo-500 rounded">
                    <span class="text-white">Register</span>
                </button>
            </div>
        </div>
    </div>
</div>