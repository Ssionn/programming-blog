@extends('layouts.app')

@section('title', 'Create Blog Post')

@section('content')
    <div class="flex flex-col sm:flex-row justify-center mt-10">
        <div class="w-1/12 md:w-1/3">
        </div>
        <div class="sm:w-full md:w-2/4 p-4 md:p-0">
            <form method="POST" action="{{ route('blogpost.store') }}">
                <input type="hidden" name="id" value="{{ $id }}">
                @csrf
                <div class="space-y-12">
                    <div class="border-b border-gray-900/10 pb-4 bg-white rounded-md px-4">
                        <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                            <div class="sm:col-span-4 mt-4">
                                <label for="title" class="block text-sm font-medium leading-6 text-gray-900">Title</label>
                                <div class="mt-2">
                                    <div
                                        class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 sm:max-w-md">

                                        <input type="text" name="title" id="title" autocomplete="title"
                                            class="block flex-1 border-0 bg-transparent py-1.5 pl-1 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6"
                                            placeholder="">
                                    </div>
                                </div>
                            </div>

                            <div class="col-span-full">
                                <h1 class="text-red-500 text-xl text-center mt-2">Work In Progress</h1>
                                <input type="file" disabled name="avatar" id="avatar" />
                            </div>

                            <div class="col-span-full">
                                <label for="content"
                                    class="block text-sm font-medium leading-6 text-gray-900">Content</label>
                                <div class="mt-2">
                                    <textarea id="content" name="content" rows="3"
                                        class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"></textarea>
                                </div>
                            </div>

                            <div class="col-span-full flex justify-end">
                                <button type="submit"
                                    class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Create</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <div class="w-1/12 md:w-1/3">
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        const inputElement = document.querySelector('input[id="avatar"]');
        const pond = FilePond.create(inputElement, {
            allowMultiple: false,
            maxFiles: 1,
            server: {
                process: {
                    url: '/upload/{{ $id }}',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    timeout: 2000
                }
            },
            instantUpload: true
        });
    </script>
@endsection
