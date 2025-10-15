<x-app-layout>
    <h1>Create New VTuber</h1>

    <form action="{{ route('vtubers.store') }}" method="POST">
        @csrf
        <div>
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" required>
        </div>
        <div>
            <label for="agency">Agency:</label>
            <input type="text" id="agency" name="agency">
        </div>
        <button type="submit">Create VTuber</button>
    </form>

    <a href="{{ route('vtubers.index') }}">Back to VTubers List</a>
</x-app-layout>
