<x-app-layout>
    <div class="p-6 md:p-8">
        <h1 class="text-2xl font-semibold">Dashboard</h1>

        <div class="py-6">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-4">
                    <h2 class="text-lg font-semibold mb-4">Reports</h2>

                    @if(isset($reports) && $reports->count())
                        <div class="overflow-x-auto">
                            <table class="w-full table-auto">
                                <thead>
                                <tr class="text-left">
                                    <th class="px-4 py-2">Title</th>
                                    <th class="px-4 py-2">Reporter</th>
                                    <th class="px-4 py-2">Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($reports as $report)
                                    <tr class="border-t">
                                        <td class="px-4 py-2">
                                            <a href="{{ route('reports.show', $report) }}" class="text-blue-600 hover:underline">
                                                {{ $report->title }}
                                            </a>
                                        </td>
                                        <td class="px-4 py-2">{{ $report->user?->name ?? 'Unknown' }}</td>
                                        <td class="px-4 py-2">
                                            <form action="{{ route('reports.destroy', $report) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this report?');" class="inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="px-3 py-1 bg-red-600 text-white rounded">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    @else
                        <p class="text-sm text-gray-600">No reports yet.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
