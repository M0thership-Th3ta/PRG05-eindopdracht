<form action="{{ route('comments.store', $vtuber) }}" method="POST" enctype="multipart/form-data" class="bg-white rounded-lg shadow p-4">
    @csrf

    @if(!isset($vtuber) || !$vtuber->id)
        <p class="text-sm text-red-600">VTuber context missing. Make sure to pass <code>$vtuber</code> when including this partial.</p>
    @endif

    @if(auth()->check())
        <input type="hidden" name="vtuber_id" value="{{ $vtuber->id ?? '' }}">

        <div class="mb-3">
            <label for="content" class="block text-sm font-medium text-gray-700 mb-1">Add a comment</label>
            <textarea id="content" name="content" rows="4" required
                      class="w-full border border-gray-300 rounded p-2 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500">{{ old('content') }}</textarea>
            @error('content')
            <p class="text-xs text-red-600 mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="flex items-center justify-between">
            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 text-sm">Post comment</button>
            <p class="text-xs text-gray-500">Be respectful.</p>
        </div>
    @else
        <p class="text-sm">
            <a href="{{ route('login') }}" class="text-blue-600 hover:underline">Log in</a> to post a comment.
        </p>
    @endif
</form>
