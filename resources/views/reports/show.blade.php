<x-app-layout>
    <div class="p-6 md:p-8">
        <h1 class="text-2xl font-semibold mb-4">Report Details</h1>

        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
            <h2 class="text-xl font-semibold mb-2">{{ $report->title }}</h2>
            <p class="text-sm text-gray-600 mb-2">Reported by: {{ $report->user?->name ?? 'Unknown' }}</p>
            <p class="text-sm text-gray-600 mb-4">Reported on: {{ $dayReported ?? ($report->created_at ? $report->created_at->format('F j, Y') : 'Unknown date') }}</p>

            <p class="mb-4"><strong>Type:</strong> {{ $report->type }}</p>
            <div class="whitespace-pre-wrap mb-4">
                {{ $report->content }}
            </div>
            <a href="{{ route('dashboard') }}" class="inline-flex items-center px-4 py-2 bg-blue-600 text-white rounded">
                Back to Dashboard
            </a>
        </div>
    </div>
</x-app-layout>
