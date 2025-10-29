<li class="bg-white p-4 rounded shadow">
    <div class="flex items-start gap-3">
        <div class="flex-1">
            <div class="text-sm font-semibold">
                {{ $comment->user->name ?? 'Unknown' }}
                <span class="text-xs text-gray-500"> · {{ $datePosted ?? $comment->created_at->diffForHumans() }}</span>
                @if($comment->vtuber)
                    <span class="text-xs text-gray-500"> · <a href="{{ route('vtubers.show', $comment->vtuber->id) }}" class="text-blue-600 hover:underline">{{ $comment->vtuber->name }}</a></span>
                @endif
            </div>

            <p class="mt-1 text-sm">{{ $comment->content }}</p>

            @if(!empty($comment->image))
                <img src="{{ asset('storage/'.$comment->image) }}" alt="comment image" class="mt-2 w-48 h-auto object-cover rounded">
            @endif
        </div>
    </div>
</li>
