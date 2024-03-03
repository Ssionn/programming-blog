<div class="z-10 bg-gray-200 rounded-lg shadow w-60">
    <ul class="h-48 py-2 overflow-y-auto text-gray-700"
    >
        @foreach($users as $user)
            <li wire:click="selectUser('{{ $user->name }}')" wire:key="{{ $user->id }}">
                <a class="flex items-center px-4 py-2 hover:bg-gray-100">
                    <img class="w-6 h-6 mr-2 rounded-full" src="{{$user->avatar()}}"
                         alt="{{ $user->name }}">
                    {{ $user->name }}
                </a>
            </li>
        @endforeach

    </ul>
</div>
