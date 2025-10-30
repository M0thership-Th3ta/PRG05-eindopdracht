<nav class="flex items-center justify-between">
    <div class="flex items-center space-x-3">
        <x-navlink href="{{ route('home') }}" :active="request()->routeIs('home')">Home</x-navlink>
        <x-navlink href="{{ route('contact') }}" :active="request()->routeIs('contact')">Contact</x-navlink>
        <x-navlink href="{{ route('about-us') }}" :active="request()->routeIs('about-us')">Over Ons</x-navlink>
        <x-navlink href="{{ route('vtubers.index') }}" :active="request()->routeIs('vtubers.index')">Vtubers</x-navlink>
    </div>

    <div class="flex items-center space-x-3">
        @guest
            <x-navlink href="{{ route('register') }}" :active="request()->routeIs('register')">Registreer</x-navlink>
            <x-navlink href="{{ route('login') }}" :active="request()->routeIs('login')">Login</x-navlink>
        @endguest

        @auth
            <x-navlink href="{{ route('profile.index') }}" :active="request()->routeIs('profile.index')">Profile</x-navlink>

            @if(auth()->user()->is_admin)
                <x-navlink href="{{ route('dashboard') }}" :active="request()->routeIs('dashboard')">Dashboard</x-navlink>
            @endif

            <form method="POST" action="{{ route('logout') }}" class="inline-flex items-center">
                @csrf
                <button type="submit" class="text-sm bg-red-600 text-white px-3 py-1 rounded hover:bg-red-700 focus:outline-none">Logout</button>
            </form>
        @endauth
    </div>
</nav>

