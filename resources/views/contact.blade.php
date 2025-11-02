<x-app-layout>
    <div class="p-6 md:p-8">
        <h1 class="text-2xl font-semibold">Contact Information</h1>
        <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
            <div class="max-w-xl">
                @include('reports.create')
            </div>
        </div>
        <p>If you want to reach out to us for other means. You can reach out to us here as well!</p>
        <ul>
            @foreach($contacts as $key => $contact)
                <li>{{ $key }}: {{ $contact }}</li>
            @endforeach
        </ul>
    </div>
</x-app-layout>
