@php $user = auth()->user(); @endphp

<x-app-layout>
    <x-slot name="header">
        <div class="bg-white shadow-sm">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="relative flex items-center py-6">
                    <div class="flex items-center space-x-4">
                        <div class="w-20 h-20 rounded-full bg-gray-100 overflow-hidden flex-shrink-0">
                            <img
                                src="{{ $user ? 'https://ui-avatars.com/api/?name=' . urlencode($user->name) . '&size=256&background=efefef&color=333' : asset('images/default-avatar.png') }}"
                                alt="Profile picture"
                                class="w-full h-full object-cover"
                            />
                        </div>

                        <div>
                            <h1 class="text-2xl font-semibold text-gray-900">
                                {{ $user->name ?? 'Guest' }}
                            </h1>

                            @php
                                $pronounNames = [];
                                if ($user && $user->profileDetail && $user->profileDetail->pronouns) {
                                    $pronounNames = $user->profileDetail->pronouns->pluck('name')->filter()->all();
                                }
                                $pronounString = count($pronounNames) ? implode(' - ', $pronounNames) : null;
                            @endphp

                            @if($pronounString)
                                <p class="text-sm text-gray-500">{{ $pronounString }}</p>
                            @endif
                        </div>
                    </div>

                    <div class="absolute right-0">
                        <a href="{{ route('profile.edit') }}"
                           class="inline-flex items-center px-4 py-2 bg-blue-600 text-white text-sm font-medium rounded-md hover:bg-blue-700 focus:outline-none">
                            Edit Profile
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </x-slot>

    <div class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">
        <div class="bg-white shadow sm:rounded-lg p-6">
            <h2 class="text-lg font-medium text-gray-900 mb-4">Profile overview</h2>
            <p class="text-sm text-gray-600">Place profile details or components here.</p>
        </div>
    </div>
</x-app-layout>
