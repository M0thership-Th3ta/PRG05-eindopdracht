<x-app-layout>
    <h1>VTubers</h1>
    @if($vtubers->count() > 0)
        <ul>
            @foreach($vtubers as $vtuber)
                <li>
                    <a href="{{ route('vtubers.show', $vtuber->id) }}">
                        {{ $vtuber->name }}
                    </a>
                    - {{ $vtuber->agency }}
                </li>
            @endforeach
        </ul>
    @else
        <p>No VTubers found.</p>
    @endif
</x-app-layout>
