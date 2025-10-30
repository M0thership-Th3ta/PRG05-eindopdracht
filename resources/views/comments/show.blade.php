<li id="comment-{{ $comment->id }}" class="bg-white p-4 rounded shadow">
    <div class="flex items-center gap-3">
        <div class="flex-1">
            <div class="flex items-center justify-between">
                <div class="flex-1 min-w-0">
                    <div class="text-sm font-semibold truncate">
                        {{ $comment->user->name ?? 'Unknown' }}
                        <span class="text-xs text-gray-500"> · {{ $datePosted ?? $comment->created_at->diffForHumans() }}</span>
                    </div>
                </div>

                <div class="flex items-center space-x-2 flex-shrink-0">
                    @if(auth()->check() && auth()->id() === $comment->user_id)
                        <a href="{{ route('comments.edit', $comment) }}" class="text-sm bg-blue-600 text-white px-3 py-1 rounded hover:bg-blue-700 focus:outline-none">Edit</a>
                    @endif

                    @if(auth()->check() && (auth()->id() === $comment->user_id || auth()->user()->is_admin))
                        <form action="{{ route('comments.destroy', $comment) }}" method="POST" onsubmit="return confirm('Delete this comment?');" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-sm bg-red-600 text-white px-3 py-1 rounded hover:bg-red-700 focus:outline-none">Delete</button>
                        </form>
                    @endif
                </div>
            </div>

            <p class="mt-1 text-sm">{{ $comment->content }}</p>
        </div>
    </div>
</li>

