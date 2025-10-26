<x-app-layout>
    <div class="app-container">
        <div class="flex flex-col md:flex-row md:items-start md:gap-8">
            <main class="flex-1 min-w-0 p-6 md:p-8">
                <div class="flex items-start justify-between mb-4">
                    <h1 class="text-3xl font-semibold mr-4">{{ $vtuber->name }}</h1>

                    @if(auth()->check() && auth()->user()->is_admin)
                        <div class="flex items-center space-x-2">
                            <a href="{{ route('vtubers.edit', $vtuber->id) }}" class="text-sm bg-blue-600 text-white px-3 py-1 rounded hover:bg-blue-700 focus:outline-none">Edit</a>

                            <form action="{{ route('vtubers.destroy', $vtuber->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this VTuber?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-sm bg-red-600 text-white px-3 py-1 rounded hover:bg-red-700 focus:outline-none">Delete</button>
                            </form>
                        </div>
                    @endif
                </div>

                @if(!empty($vtuber->description))
                    <p class="text-gray-700 mb-4">{{ $vtuber->description }}</p>
                @endif

                @if($vtuber->youtube_channel_id || $vtuber->twitch_channel_id || $vtuber->twitter_handle)
                    <div class="mb-6">
                        <h2 class="text-sm font-medium text-gray-900 mb-2">Socials</h2>
                        <ul class="text-sm text-blue-600 space-y-1">
                            @if($vtuber->youtube_channel_id)
                                <li>
                                    <a href="{{ strpos($vtuber->youtube_channel_id, 'http') === 0 ? $vtuber->youtube_channel_id : 'https://www.youtube.com/channel/'.$vtuber->youtube_channel_id }}" target="_blank" rel="noopener">YouTube</a>
                                </li>
                            @endif

                            @if($vtuber->twitch_channel_id)
                                <li>
                                    <a href="{{ strpos($vtuber->twitch_channel_id, 'http') === 0 ? $vtuber->twitch_channel_id : 'https://www.twitch.tv/'.$vtuber->twitch_channel_id }}" target="_blank" rel="noopener">Twitch</a>
                                </li>
                            @endif

                            @if($vtuber->twitter_handle)
                                <li>
                                    <a href="{{ strpos($vtuber->twitter_handle, 'http') === 0 ? $vtuber->twitter_handle : 'https://twitter.com/'.$vtuber->twitter_handle }}" target="_blank" rel="noopener">Twitter</a>
                                </li>
                            @endif
                        </ul>
                    </div>
                @endif

                <a href="{{ route('vtubers.index') }}" class="text-sm text-blue-600 hover:underline inline-block mb-6">Back to VTubers List</a>
            </main>

            <aside class="w-full md:w-80 flex-shrink-0 md:self-start">
                <div class="bg-white rounded-lg shadow overflow-hidden">
                    <div class="w-full h-64 bg-gray-100">
                        <img src="{{ $vtuber->image ?? asset('images/placeholder.png') }}" alt="{{ $vtuber->name }}" class="w-full h-full object-cover" loading="lazy">
                    </div>

                    <div class="p-4 border-t">
                        <h3 class="text-sm font-medium text-gray-900 mb-3">Details</h3>
                        <dl class="text-sm text-gray-700 space-y-2">
                            @if($vtuber->agency)
                                <div>
                                    <dt class="font-semibold text-gray-600">Agency</dt>
                                    <dd>{{ $vtuber->agency }}</dd>
                                </div>
                            @endif

                            @if($vtuber->age)
                                <div>
                                    <dt class="font-semibold text-gray-600">Age</dt>
                                    <dd>{{ $vtuber->age }}</dd>
                                </div>
                            @endif

                            @if($vtuber->gender)
                                <div>
                                    <dt class="font-semibold text-gray-600">Gender</dt>
                                    <dd>{{ $vtuber->gender }}</dd>
                                </div>
                            @endif

                            @if($vtuber->height)
                                <div>
                                    <dt class="font-semibold text-gray-600">Height</dt>
                                    <dd>{{ $vtuber->height }}</dd>
                                </div>
                            @endif

                            @if($vtuber->weight)
                                <div>
                                    <dt class="font-semibold text-gray-600">Weight</dt>
                                    <dd>{{ $vtuber->weight }}</dd>
                                </div>
                            @endif

                            @if($vtuber->nationality)
                                <div>
                                    <dt class="font-semibold text-gray-600">Nationality</dt>
                                    <dd>{{ $vtuber->nationality }}</dd>
                                </div>
                            @endif

                            @if($vtuber->zodiac_sign)
                                <div>
                                    <dt class="font-semibold text-gray-600">Zodiac Sign</dt>
                                    <dd>{{ $vtuber->zodiac_sign }}</dd>
                                </div>
                            @endif

                            @if($vtuber->fandom_name)
                                <div>
                                    <dt class="font-semibold text-gray-600">Fandom</dt>
                                    <dd>{{ $vtuber->fandom_name }}</dd>
                                </div>
                            @endif

                            @if($vtuber->emoji)
                                <div>
                                    <dt class="font-semibold text-gray-600">Emoji</dt>
                                    <dd>{{ $vtuber->emoji }}</dd>
                                </div>
                            @endif

                                @if($birthdayFormatted)
                                    <div>
                                        <dt class="font-semibold text-gray-600">Birthday</dt>
                                        <dd>{{ $birthdayFormatted }}</dd>
                                    </div>
                                @endif

                                @if($debutFormatted)
                                    <div>
                                        <dt class="font-semibold text-gray-600">Debut</dt>
                                        <dd>{{ $debutFormatted }}</dd>
                                    </div>
                                @endif
                        </dl>
                    </div>
                </div>
            </aside>
        </div>
    </div>
</x-app-layout>
