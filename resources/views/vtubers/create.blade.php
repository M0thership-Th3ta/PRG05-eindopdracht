<x-app-layout>
    <h1>Create New VTuber</h1>

    <form action="{{ route('vtubers.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

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
            <input type="text" id="name" name="name" required>
        </div>
        <div>
            <label for="agency">Agency:</label>
            <input type="text" id="agency" name="agency">
        </div>
        <div>
            <label for="age">Age:</label>
            <input type="text" id="age" name="age">
        </div>
        <div>
            <label for="gender">Gender:</label>
            <input type="text" id="gender" name="gender" required>
        </div>
        <div>
            <label for="height">Height:</label>
            <input type="text" id="height" name="height">
        </div>
        <div>
            <label for="weight">Weight:</label>
            <input type="text" id="weight" name="weight">
        </div>
        <div>
            <label for="nationality">Nationality:</label>
            <input type="text" id="nationality" name="nationality">
        </div>
        <div>
            <label for="zodiac_sign">Zodiac Sign:</label>
            <input type="text" id="zodiac_sign" name="zodiac_sign">
        </div>
        <div>
            <label for="fandom_name">Fandom Name:</label>
            <input type="text" id="fandom_name" name="fandom_name">
        </div>
        <div>
            <label for="emoji">Emoji:</label>
            <input type="text" id="emoji" name="emoji">
        </div>
        <div>
            <label for="image">Image:</label>
            <input type="file" id="image" name="image" required accept="image/*">
        </div>
        <div>
            <label for="birthday">Birthday:</label>
            <input type="date" id="birthday" name="birthday">
        </div>
        <div>
            <label for="debut_date">Debut Date:</label>
            <input type="date" id="debut_date" name="debut_date">
        </div>
        <div>
            <label for="youtube_channel_id">Youtube Channel URL:</label>
            <input type="text" id="youtube_channel_id" name="youtube_channel_id">
        </div>
        <div>
            <label for="twitch_channel_id">Twitch Channel URL:</label>
            <input type="text" id="twitch_channel_id" name="twitch_channel_id">
        </div>
        <div>
            <label for="twitter_handle">Twitter Channel URL:</label>
            <input type="text" id="twitter_handle" name="twitter_handle">
        </div>
        <div>
            <label for="description">Description:</label>
            <input type="text" id="description" name="description" required>
        </div>
        <button type="submit">Create VTuber</button>
    </form>

    <a href="{{ route('vtubers.index') }}">Back to VTubers List</a>
</x-app-layout>
