@php
    $reportTypes = $reportTypes ?? ['Add VTuber', 'Spam', 'Harassment', 'Inappropriate'];
@endphp

<form action="{{ route('reports.store') }}" method="POST" class="space-y-4">
    @csrf

    <div>
        <label for="title" class="block text-sm font-medium">Title</label>
        <input id="title" name="title" type="text" value="{{ old('title') }}"
               class="mt-1 block w-full border rounded px-3 py-2" required maxlength="256">
        @error('title') <p class="text-sm text-red-600 mt-1">{{ $message }}</p> @enderror
    </div>

    <div>
        <label for="type" class="block text-sm font-medium">Type</label>
        <select id="type" name="type" class="mt-1 block w-full border rounded px-3 py-2" required>
            @foreach($reportTypes as $type)
                <option value="{{ $type }}" @if(old('type') === $type) selected @endif>{{ $type }}</option>
            @endforeach
        </select>
        @error('type') <p class="text-sm text-red-600 mt-1">{{ $message }}</p> @enderror
    </div>

    <div>
        <label for="content" class="block text-sm font-medium">Details</label>
        <textarea id="content" name="content" rows="5"
                  class="mt-1 block w-full border rounded px-3 py-2" required>{{ old('content') }}</textarea>
        @error('content') <p class="text-sm text-red-600 mt-1">{{ $message }}</p> @enderror
    </div>

    <input type="hidden" name="user_id" value="{{ auth()->id() }}">

    <div>
        <button type="submit" class="inline-flex items-center px-4 py-2 bg-blue-600 text-white rounded">
            Submit Report
        </button>
    </div>
</form>
