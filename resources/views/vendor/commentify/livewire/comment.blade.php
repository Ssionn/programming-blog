<div>
    @if ($isEditing)
        @include('commentify::livewire.partials.comment-form', [
            'method' => 'editComment',
            'state' => 'editState',
            'inputId' => 'reply-comment',
            'inputLabel' => 'Your Reply',
            'button' => 'Edit Comment',
        ])
    @else
        <article class="p-6 mb-1 text-baseshadow-xl border border-gray-300 rounded-lg">
            <footer class="flex justify-between items-center mb-1">


                <div class="flex items-center">
                    <p class="inline-flex items-center mr-3 text-sm text-gray-900"><img class="mr-2 w-6 h-6 rounded-full"
                            src="{{ $comment->user->avatar() }}"
                            alt="{{ $comment->user->name }}">{{ Str::ucfirst($comment->user->name) }}</p>
                    <p class="text-sm text-gray-600">
                        <time pubdate datetime="{{ $comment->presenter()->relativeCreatedAt() }}"
                            title="{{ $comment->presenter()->relativeCreatedAt() }}">
                            {{ $comment->presenter()->relativeCreatedAt() }}
                        </time>
                    </p>
                </div>
                <div class="relative">
                    <button wire:click="$toggle('showOptions')"
                        class="inline-flex items-center p-2 text-sm font-medium text-center text-gray-400 bg-white rounded-lg hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-50"
                        type="button">
                        <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M6 10a2 2 0 11-4 0 2 2 0 014 0zM12 10a2 2 0 11-4 0 2 2 0 014 0zM16 12a2 2 0 100-4 2 2 0 000 4z">
                            </path>
                        </svg>
                    </button>
                    <!-- Dropdown menu -->
                    @if ($showOptions)
                        <div
                            class="absolute z-10 top-full right-0 mt-1 w-36 bg-white rounded divide-y divide-gray-100 shadow">
                            <ul class="py-1 text-sm text-gray-700">
                                @can('update', $comment)
                                    <li>
                                        <button wire:click="$toggle('isEditing')" type="button"
                                            class="block w-full text-left py-2 px-4 hover:bg-gray-100">Edit
                                        </button>
                                    </li>
                                @endcan
                                @can('destroy', $comment)
                                    <li>

                                        <button x-on:click="confirmCommentDeletion" x-data="{
                                            confirmCommentDeletion() {
                                                if (window.confirm('You sure to delete this comment?')) {
                                                    @this.call('deleteComment')
                                                }
                                            }
                                        }"
                                            class="block w-full text-left py-2 px-4 hover:bg-gray-100">
                                            Delete
                                        </button>
                                    </li>
                                @endcan
                            </ul>
                        </div>
                    @endif
                </div>
            </footer>
            <p class="text-gray-500">
                {!! $comment->presenter()->replaceUserMentions($comment->presenter()->markdownBody()) !!}
            </p>

            <div class="flex items-center mt-4 space-x-4">
                <livewire:like :$comment :key="$comment->id" />

                @include('commentify::livewire.partials.comment-reply')

            </div>

        </article>
    @endif
    @if ($isReplying)
        @include('commentify::livewire.partials.comment-form', [
            'method' => 'postReply',
            'state' => 'replyState',
            'inputId' => 'reply-comment',
            'inputLabel' => 'Your Reply',
            'button' => 'Post Reply',
        ])
    @endif
    @if ($hasReplies)

        <article class="p-1 mb-1 ml-1 lg:ml-12 border-t border-gray-200">
            @foreach ($comment->children as $child)
                <livewire:comment :comment="$child" :key="$child->id" />
            @endforeach
        </article>
    @endif
    <script>
        function detectAtSymbol() {
            const inputComment = document.getElementById('reply-comment');
            if (!inputComment) {
                return;
            }

            const cursorPosition = inputComment.selectionStart;
            const textBeforeCursor = inputComment.value.substring(0, cursorPosition);
            const atSymbolPosition = textBeforeCursor.lastIndexOf('@');

            if (atSymbolPosition !== -1) {
                const searchTerm = textBeforeCursor.substring(atSymbolPosition + 1);
                if (searchTerm.trim().length > 0) {
                    @this.dispatch('getUsers', {
                        searchTerm: searchTerm
                    });
                }
            }
        }
    </script>

</div>
