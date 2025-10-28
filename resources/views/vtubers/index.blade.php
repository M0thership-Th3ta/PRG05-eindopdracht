<x-app-layout>
    <div class="p-6 md:p-8">
        <div class="flex items-center justify-between mb-4">
            <h1 class="text-2xl font-semibold">VTubers</h1>

            @if(auth()->check() && auth()->user()->isAdmin())
                <p><a href="{{ route('vtubers.create') }}">Add New VTuber</a></p>
            @endif
        </div>
        @if($vtubers->count() > 0)
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                @foreach($vtubers as $vtuber)
                    <div class="vtuber-card">
                        <h3>{{ $vtuber->name }}</h3>
                        @if(auth()->check() && auth()->user()->isAdmin())
                            <form method="POST" action="{{ route('vtubers.toggle-active', $vtuber) }}">
                                @csrf
                                <button type="submit" class="btn">
                                    {{ $vtuber->is_active ? 'Deactivate' : 'Activate' }}
                                </button>
                            </form>
                        @endif
                    </div>
                @endforeach
            </div>
        @else
            <p>No VTubers found.</p>
        @endif
    </div>
</x-app-layout>
