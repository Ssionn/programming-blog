<form class="mb-6" wire:submit="{{$method}}">
    @if (session()->has('message'))
    <div x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 3000)">
        <div class="p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50" role="alert">
            <span class="font-medium">Success!</span> {{session('message')}}
        </div>
    </div>
    @endif
    @csrf
    <div class="py-2 px-4 mb-4 rounded-lg rounded-t-lg shadow-xl border
             ">
        <label for="{{$inputId}}" class="sr-only">{{$inputLabel}}</label>
        <input id="{{$inputId}}" rows="6" class="px-0 w-full text-sm text-gray-900 border-0 focus:ring-0 focus:outline-none @error($state.'.body')
                        border-red-300 @enderror" placeholder="Write a comment..." wire:model.lazy="{{$state}}.body" oninput="detectAtSymbol()"></input>
        @if(!empty($users) && $users->count() > 0)
        @include('commentify::livewire.partials.dropdowns.users')
        @endif
        @error($state.'.body')
        <p class="mt-2 text-sm text-red-600">
            {{$message}}
        </p>
        @enderror
    </div>

    <button wire:loading.attr="disabled" type="submit" class="inline-flex items-center py-2.5 px-4 text-xs font-medium text-center text-white bg-primary-700 rounded-lg focus:ring-4 focus:ring-primary-200 hover:bg-primary-800">
        <div wire:loading wire:target="{{$method}}">
            @include('commentify::livewire.partials.loader')
        </div>
        <span class="px-4 py-2 bg-gray-300 shadow-xl text-black rounded-md">
            {{$button}}
        </span>
    </button>

</form>