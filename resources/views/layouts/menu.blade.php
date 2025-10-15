<nav>
    <x-navlink href="{{ route('home') }}" :active="request()->routeIs('home')">Home</x-navlink>
    <x-navlink href="{{ route('contact') }}" :active="request()->routeIs('contact')">Contact</x-navlink>
    <x-navlink href="{{ route('about-us') }}" :active="request()->routeIs('about-us')">About Us</x-navlink>
</nav>
