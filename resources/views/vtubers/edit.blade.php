<x-app-layout>
    <h1>Edit {{ $vtuber->name }}</h1>

    <form action="{{ route('vtubers.update', $vtuber->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        @if($errors->any())
            <div class="text-red-600">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div>
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" required value="{{ old('name', $vtuber->name) }}">
        </div>
        <div>
            <label for="agency">Agency:</label>
            <input type="text" id="agency" name="agency" value="{{ old('agency', $vtuber->agency) }}">
        </div>
        <div>
            <label for="age">Age:</label>
            <input type="text" id="age" name="age" value="{{ old('age', $vtuber->age) }}">
        </div>
        <div>
            <label for="gender">Gender:</label>
            <input type="text" id="gender" name="gender" required value="{{ old('gender', $vtuber->gender) }}">
        </div>
        <div>
            <label for="height">Height:</label>
            <input type="text" id="height" name="height" value="{{ old('height', $vtuber->height) }}">
        </div>
        <div>
            <label for="weight">Weight:</label>
            <input type="text" id="weight" name="weight" value="{{ old('weight', $vtuber->weight) }}">
        </div>
        <div>
            <label for="nationality">Nationality:</label>
            <input type="text" id="nationality" name="nationality" value="{{ old('nationality', $vtuber->nationality) }}">
        </div>
        <div>
            <label for="zodiac_sign">Zodiac Sign:</label>
            <input type="text" id="zodiac_sign" name="zodiac_sign" value="{{ old('zodiac_sign', $vtuber->zodiac_sign) }}">
        </div>
        <div>
            <label for="fandom_name">Fandom Name:</label>
            <input type="text" id="fandom_name" name="fandom_name" value="{{ old('fandom_name', $vtuber->fandom_name) }}">
        </div>
        <div>
            <label for="emoji">Emoji:</label>
            <input type="text" id="emoji" name="emoji" value="{{ old('emoji', $vtuber->emoji) }}">
        </div>

        <div>
            <label>Current image:</label>
            <div>
                <img src="{{ $vtuber->image ?? asset('images/placeholder.png') }}" alt="{{ $vtuber->name }}" style="max-width:150px; display:block; margin-bottom:8px;">
            </div>
            <label for="image">Replace Image (optional):</label>
            <input type="file" id="image" name="image" accept="image/*">
        </div>

        <div>
            <label for="birthday">Birthday:</label>
            <input type="date" id="birthday" name="birthday" value="{{ old('birthday', $vtuber->birthday) }}">
        </div>
        <div>
            <label for="debut_date">Debut Date:</label>
            <input type="date" id="debut_date" name="debut_date" value="{{ old('debut_date', $vtuber->debut_date) }}">
        </div>
        <div>
            <label for="youtube_channel_id">Youtube Channel URL:</label>
            <input type="text" id="youtube_channel_id" name="youtube_channel_id" value="{{ old('youtube_channel_id', $vtuber->youtube_channel_id) }}">
        </div>
        <div>
            <label for="twitch_channel_id">Twitch Channel URL:</label>
            <input type="text" id="twitch_channel_id" name="twitch_channel_id" value="{{ old('twitch_channel_id', $vtuber->twitch_channel_id) }}">
        </div>
        <div>
            <label for="twitter_handle">Twitter Channel URL:</label>
            <input type="text" id="twitter_handle" name="twitter_handle" value="{{ old('twitter_handle', $vtuber->twitter_handle) }}">
        </div>
        <div>
            <label for="description">Description:</label>
            <textarea id="description" name="description" required>{{ old('description', $vtuber->description) }}</textarea>
        </div>
        <button type="submit">Update VTuber</button>
    </form>

    <a href="{{ route('vtubers.index') }}">Back to VTubers List</a>
</x-app-layout>
