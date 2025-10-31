@php
    $allPronouns = \App\Models\Pronoun::orderBy('id')->get();
    $saved = $user->profileDetail?->pronouns?->pluck('id')->toArray() ?? [];
    $selected = array_map('intval', (array) old('pronouns', $saved));
@endphp

<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Profile Information') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __("Update your account's profile information and email address.") }}
        </p>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('patch')

        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" :value="old('name', $user->name)" required autofocus autocomplete="name" />
            <x-input-error class="mt-2" :messages="$errors->get('name')" />
        </div>

        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" name="email" type="email" class="mt-1 block w-full" :value="old('email', $user->email)" required autocomplete="username" />
            <x-input-error class="mt-2" :messages="$errors->get('email')" />
        </div>

        <div class="space-y-2">
            <label class="block font-medium text-sm text-gray-700">Pronouns</label>
            <div class="grid grid-cols-2 gap-2">
                @foreach($allPronouns as $pronoun)
                    <label class="inline-flex items-center">
                        <input type="checkbox" name="pronouns[]" value="{{ $pronoun->id }}"
                               {{ in_array($pronoun->id, (array) $selected) ? 'checked' : '' }} class="form-checkbox">
                        <span class="ml-2">{{ $pronoun->name }}</span>
                    </label>
                @endforeach
            </div>
            <x-input-error class="mt-2" :messages="$errors->get('pronouns')" />
        </div>

        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Save') }}</x-primary-button>

            @if (session('status') === 'profile-updated')
                <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)" class="text-sm text-gray-600">{{ __('Saved.') }}</p>
            @endif
        </div>
    </form>
</section>
