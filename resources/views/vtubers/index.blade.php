<x-app-layout>
    <div class="p-6 md:p-8">
        <div class="flex items-center justify-between mb-4">
            <h1 class="text-2xl font-semibold">VTubers</h1>

            @if(auth()->check() && auth()->user()->is_admin)
                <p><a href="{{ route('vtubers.create') }}">Add New VTuber</a></p>
            @endif
        </div>
        @if($vtubers->count() > 0)
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                @foreach($vtubers as $vtuber)
                    <a href="{{ route('vtubers.show', $vtuber->id) }}" class="block bg-white shadow-sm rounded-lg overflow-hidden hover:shadow-md transition">
                        <div class="w-full h-48 bg-gray-100">
                            <img src="{{ $vtuber->image ?? asset('images/placeholder.png') }}" alt="{{ $vtuber->name }}" class="w-full h-full object-cover" loading="lazy">
                        </div>

                        <div class="p-4">
                            <h2 class="text-lg font-medium text-gray-800 truncate">{{ $vtuber->name }}</h2>
                            <p class="text-sm text-gray-500 mt-1 truncate">{{ $vtuber->agency ?? 'Independent' }}</p>
                        </div>
                    </a>
                @endforeach
            </div>
        @else
            <p>No VTubers found.</p>
        @endif
    </div>
</x-app-layout>
