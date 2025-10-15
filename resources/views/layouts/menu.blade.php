<nav>
    <x-navlink href="{{ route('home') }}" :active="request()->routeIs('home')">Home</x-navlink>
    <x-navlink href="{{ route('contact') }}" :active="request()->routeIs('contact')">Contact</x-navlink>
    <x-navlink href="{{ route('about-us') }}" :active="request()->routeIs('about-us')">About Us</x-navlink>
    <x-navlink href="{{ route('vtubers.index') }}" :active="request()->routeIs('vtubers.index')">Vtubers</x-navlink>
    <x-navlink href="{{ route('register') }}" :active="request()->routeIs('register')">Registreer</x-navlink>
    <x-navlink href="{{ route('login') }}" :active="request()->routeIs('login')">Login</x-navlink>
</nav>
