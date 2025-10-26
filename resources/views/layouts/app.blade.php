<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="min-h-screen bg-gray-100 p-6">
<div class="app-container">
    @include('layouts.menu')

    <main class="bg-gray-300 rounded-md mt-4 min-h-[60vh] relative z-0">
        @isset($header)
            <header class="mb-4">
                {{ $header }}
            </header>
        @endisset

        {{ $slot }}
    </main>
</div>
</body>
</html>
