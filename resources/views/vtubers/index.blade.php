<x-app-layout>
    <div class="p-6 md:p-8">
        <div class="flex items-center justify-between mb-4">
            <h1 class="text-2xl font-semibold">VTubers</h1>

            <div class="flex items-center space-x-4">
                <form method="GET" action="{{ route('vtubers.index') }}" class="flex items-center">
                    <select name="agency" class="border rounded-md px-3 py-1 mr-2 focus:outline-none focus:ring-2 focus:ring-blue-500 bg-white">
                        <option value="">{{ __('All agencies') }}</option>
                        @foreach($agencies as $agency)
                            <option value="{{ $agency }}" {{ (string)($selectedAgency ?? request('agency')) === (string)$agency ? 'selected' : '' }}>
                                {{ $agency }}
                            </option>
                        @endforeach
                    </select>

                    <input type="text" name="query" value="{{ $search ?? request('query') }}" placeholder="Search VTubers..." class="border rounded-md px-3 py-1 focus:outline-none focus:ring-2 focus:ring-blue-500"/>
                    <button type="submit" class="ml-2 px-3 py-1 bg-gray-200 rounded-md hover:bg-gray-300">Search</button>
                </form>

                @if(auth()->check() && auth()->user()->isAdmin())
                    <p><a href="{{ route('vtubers.create') }}" class="px-3 py-1 bg-blue-600 text-white rounded-md hover:bg-blue-700">Add New VTuber</a></p>
                @endif
            </div>
        </div>

        @if($vtubers->count() > 0)
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                @foreach($vtubers as $vtuber)
                    <div class="vtuber-card border rounded-lg bg-white shadow-sm overflow-hidden">
                        @if(!empty($vtuber->image))
                            <a href="{{ route('vtubers.show', $vtuber) }}" class="block">
                                <img src="{{ $vtuber->image }}" alt="{{ $vtuber->name }}" class="w-full h-40 object-cover">
                            </a>
                        @else
                            <a href="{{ route('vtubers.show', $vtuber) }}" class="block">
                                <div class="w-full h-40 bg-gray-100 flex items-center justify-center text-gray-400">No image</div>
                            </a>
                        @endif

                        <div class="p-4">
                            <a href="{{ route('vtubers.show', $vtuber) }}" class="block text-inherit">
                                <h3 class="text-lg font-medium">{{ $vtuber->name }}</h3>

                                @if(!empty($vtuber->agency))
                                    <p class="text-sm text-gray-600 mb-2">{{ $vtuber->agency }}</p>
                                @endif
                            </a>

                            @if(auth()->check() && auth()->user()->isAdmin())
                                <div class="flex items-center gap-2 mt-2">
                                    <form method="POST" action="{{ route('vtubers.toggle-active', $vtuber) }}">
                                        @csrf
                                        <button type="submit" class="btn px-3 py-1 bg-blue-600 text-white rounded">
                                            {{ $vtuber->is_active ? 'Deactivate' : 'Activate' }}
                                        </button>
                                    </form>
                                </div>
                            @endif
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <p>No VTubers found.</p>
        @endif
    </div>
</x-app-layout>

