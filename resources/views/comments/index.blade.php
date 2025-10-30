@isset($vtuber)
    <div class="mt-6">
        @include('comments.create', ['vtuber' => $vtuber])

        <div class="mt-6">
            <h2 class="text-lg font-medium mb-3">Comments</h2>

            @php
                $comments = $vtuber->comments()->with(['user'])->latest()->get();
            @endphp

            @if($comments->count())
                <ul class="space-y-4">
                    @foreach($comments as $comment)
                        @include('comments.show', ['comment' => $comment, 'datePosted' => $comment->created_at->diffForHumans()])
                    @endforeach
                </ul>
            @else
                <p class="text-sm text-gray-600">No comments yet.</p>
            @endif
        </div>
    </div>
@endisset
