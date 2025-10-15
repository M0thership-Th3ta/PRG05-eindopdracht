<x-app-layout>
    <h1>Contact Informatie</h1>
    <ul>
        @foreach($contacts as $key => $contact)
            <li>{{ $key }}: {{ $contact }}</li>
        @endforeach
    </ul>
</x-app-layout>
