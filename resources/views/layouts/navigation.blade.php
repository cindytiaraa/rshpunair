<nav x-data="{ open: false }" class="bg-white border-b border-gray-100">

    @php
        $user = Auth::user();
        $role = $user->roleUser[0]->idrole ?? null;
        $displayName = $user->nama ?? $user->name ?? 'User';
    @endphp

    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">

            <!-- Left Side -->
            <div class="flex">

                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    @auth
                        @if ($role == 1)
                            <a href="{{ route('admin.dashboard_admin') }}">
                        @elseif ($role == 2)
                            <a href="{{ route('dokter.dashboard_dokter') }}">
                        @elseif ($role == 3)
                            <a href="{{ route('perawat.dashboard_perawat') }}">
                        @elseif ($role == 4)
                            <a href="{{ route('resepsionis.dashboard_resepsionis') }}">
                        @else
                            <a href="{{ route('pemilik.dashboard_pemilik') }}">
                        @endif
                            <x-application-logo class="block h-9 w-auto fill-current text-gray-800" />
                        </a>
                    @endauth

                    @guest
                        <a href="{{ route('dashboard') }}">
                            <x-application-logo class="block h-9 w-auto fill-current text-gray-800" />
                        </a>
                    @endguest
                </div>

                <!-- Navigation Links -->
                <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">

                    @guest
                        <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                            Dashboard Umum
                        </x-nav-link>
                    @endguest

                    @auth
                        @if ($role == 1)
                            <x-nav-link href="{{ route('admin.dashboard_admin') }}">Dashboard Admin</x-nav-link>
                        @elseif ($role == 2)
                            <x-nav-link href="{{ route('dokter.dashboard_dokter') }}">Dashboard Dokter</x-nav-link>
                        @elseif ($role == 3)
                            <x-nav-link href="{{ route('perawat.dashboard_perawat') }}">Dashboard Perawat</x-nav-link>
                        @elseif ($role == 4)
                            <x-nav-link href="{{ route('resepsionis.dashboard_resepsionis') }}">Dashboard Resepsionis</x-nav-link>
                        @else
                            <x-nav-link href="{{ route('pemilik.dashboard_pemilik') }}">Dashboard Pemilik</x-nav-link>
                        @endif
                    @endauth

                </div>
            </div>

            <!-- Right Side -->
            <div class="hidden sm:flex sm:items-center sm:ms-6">

                @auth
                    <span class="text-gray-700 mr-4">
                        {{ $displayName }}
                    </span>

                    <!-- Logout -->
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit"
                            class="text-gray-600 hover:text-gray-800 transition">
                            Logout
                        </button>
                    </form>
                @endauth

                @guest
                    <a href="{{ route('login') }}" class="text-gray-600 hover:text-gray-800">
                        Login
                    </a>
                @endguest

            </div>

            <!-- Hamburger -->
            <div class="-me-2 flex items-center sm:hidden">
                <button @click="open = ! open"
                    class="p-2 rounded-md text-gray-400 hover:text-gray-500">
                    ☰
                </button>
            </div>

        </div>
    </div>

</nav>