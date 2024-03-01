<div>

    <section class="bg-white rounded-md py-4 lg:py-8 border-t border-gray-300">
        <div class="max-w-2xl mx-auto px-4">
            <div class="flex justify-between items-center mb-6">
                <h2 class="text-lg lg:text-2xl font-bold text-gray-900">Discussion
                    ({{ $comments->count() }})</h2>
            </div>
            @if (Auth::check())
                @include('commentify::livewire.partials.comment-form', [
                    'method' => 'postComment',
                    'state' => 'newCommentState',
                    'inputId' => 'comment',
                    'inputLabel' => 'Your comment',
                    'button' => 'Post comment',
                ])
            @else
                <div class="mb-5">
                    <a class="mt-2 text-sm px-4 py-2 bg-gradient-to-r from-pink-500 to to-indigo-500 text-white rounded-md"
                        href="{{ route('login') }}">Log in to comment!</a>
                </div>
            @endif
            @if ($comments->count())
                @foreach ($comments as $comment)
                    <livewire:comment :$comment :key="$comment->id" />
                @endforeach
                {{ $comments->links() }}
            @else
                <p>No comments yet!</p>
            @endif
        </div>
    </section>
</div>
