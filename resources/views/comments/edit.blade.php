<x-app-layout>
    <div class="app-container p-6">
        <h1 class="text-2xl font-semibold mb-4">Edit Comment</h1>

        <div class="max-w-2xl">
            <div class="bg-white rounded-lg shadow p-4">
                <div class="md:flex md:items-start md:justify-between">
                    <form action="{{ route('comments.update', $comment) }}" method="POST" enctype="multipart/form-data" class="flex-1 md:mr-4">
                        @csrf
                        @method('PUT')

                        <input type="hidden" name="vtuber_id" value="{{ $comment->vtuber_id ?? '' }}">

                        <div class="mb-3">
                            <label for="content" class="block text-sm font-medium text-gray-700 mb-1">Edit your comment</label>
                            <textarea id="content" name="content" rows="4" required
                                      class="w-full border border-gray-300 rounded p-2 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500">{{ old('content', $comment->content) }}</textarea>
                            @error('content')
                            <p class="text-xs text-red-600 mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="flex gap-2">
                            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 text-sm">Save changes</button>
                            <a href="{{ route('vtubers.show', $comment->vtuber) }}" class="text-sm text-gray-600 hover:underline px-4 py-2">Cancel</a>
                        </div>
                    </form>

                    <div class="mt-4 md:mt-0 md:flex-shrink-0">
                        <form action="{{ route('comments.destroy', $comment) }}" method="POST" onsubmit="return confirm('Delete this comment?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-sm bg-red-600 text-white px-3 py-1 rounded hover:bg-red-700 focus:outline-none">Delete comment</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
