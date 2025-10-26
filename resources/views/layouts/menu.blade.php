<nav>
    <x-navlink href="{{ route('home') }}" :active="request()->routeIs('home')">Home</x-navlink>
    <x-navlink href="{{ route('contact') }}" :active="request()->routeIs('contact')">Contact</x-navlink>
    <x-navlink href="{{ route('about-us') }}" :active="request()->routeIs('about-us')">Over Ons</x-navlink>
    <x-navlink href="{{ route('vtubers.index') }}" :active="request()->routeIs('vtubers.index')">Vtubers</x-navlink>

    @guest
        <x-navlink href="{{ route('register') }}" :active="request()->routeIs('register')">Registreer</x-navlink>
        <x-navlink href="{{ route('login') }}" :active="request()->routeIs('login')">Login</x-navlink>
    @endguest

    @auth
        <x-navlink href="{{ route('profile.edit') }}" :active="request()->routeIs('profile.edit')">Profile</x-navlink>

        @if(auth()->user()->is_admin)
            <x-navlink href="{{ route('dashboard') }}" :active="request()->routeIs('dashboard')">Dashboard</x-navlink>
        @endif

        <form method="POST" action="{{ route('logout') }}" style="display:inline">
            @csrf
            <button type="submit" class="underline text-sm">Logout</button>
        </form>
    @endauth
</nav>
