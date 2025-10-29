<x-app-layout>
    <div class="app-container p-6">
        <h1 class="text-2xl font-semibold mb-4">All Comments</h1>

        @if($comments->count())
            <ul class="space-y-4">
                @foreach($comments as $comment)
                    @include('comments.show', ['comment' => $comment, 'datePosted' => $comment->created_at->format('F j, Y')])
                @endforeach
            </ul>
        @else
            <p class="text-sm text-gray-600">No comments yet.</p>
        @endif
    </div>
</x-app-layout>
