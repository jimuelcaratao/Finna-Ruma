<!-- This example requires Tailwind CSS v2.0+ -->

<nav x-data="{ open: false }" class="navbar-main bg-white sticky top-0 z-50 always-top">

    <div class="max-w-screen-2xl mx-auto px-2 sm:px-6 lg:px-24">
        <div class="relative flex items-center justify-between h-16">
            <div class="absolute inset-y-0 left-0 flex items-center sm:hidden">
                <!-- Mobile menu button-->
                <button @click="open = ! open" type="button"
                    class="inline-flex items-center justify-center p-2 rounded-md text-black hover:text-gray-700 hover:bg-gray-400 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-white"
                    aria-controls="mobile-menu" aria-expanded="false">
                    <span class="sr-only">Open main menu</span>
                    <!--
              Icon when menu is closed.


              Heroicon name: outline/menu


              Menu open: "hidden", Menu closed: "block"
            -->
                    <svg class="block h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                    <!--
              Icon when menu is open.

              Heroicon name: outline/x


              Menu open: "block", Menu closed: "hidden"
            -->
                    <svg class="hidden h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
            <div class="flex-1 flex items-center justify-center sm:items-stretch sm:justify-start">
                <div class="flex-shrink-0 flex items-center">

                    <img class="block lg:hidden h-10 w-auto" src={{ asset('img/logo/icon-logo.png') }}
                        alt="Main Logo">
                    <img class="hidden lg:block h-10 w-auto" src={{ asset('img/logo/main-logo.png') }}
                        alt="Main Logo">
                </div>

                <div class="hidden sm:block sm:ml-6">
                    <div class="flex space-x-4">
                        <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
                        <a href=""
                            class="text-black hover:bg-gray-300 px-3 py-2 rounded-md text-sm font-medium">Home</a>

                    </div>
                </div>
            </div>

            <div class="absolute inset-y-0 right-0 flex items-center pr-2 sm:static sm:inset-auto sm:ml-6 sm:pr-0">
                @auth

                    {{-- @auth
                        @php
                            $cart_count = App\Models\Cart::where('user_id', 'like', '%' . Auth::user()->id . '%')->get();
                        @endphp
                    @endauth

                    <a href="{{ route('cart') }}">
                        <button type="button"
                            class="mr-1 bg-yellow-900 p-1 rounded-full text-white hover:text-white focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-800 focus:ring-white">
                            <span class="sr-only">View notifications</span>
                            <!-- Heroicon name: outline/bell -->
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 -5 26 30"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                            </svg>

                            @if (count($cart_count) > 0)
                                <span class="flex absolute -mt-5 ml-4">
                                    <span
                                        class="animate-ping absolute inline-flex h-2 w-2 rounded-full bg-pink-400 opacity-75"></span>
                                    <span class="relative inline-flex rounded-full h-2 w-2 bg-pink-500">
                                    </span>
                                </span>
                            @endif

                        </button>
                    </a> --}}



                @endauth


                <!-- Profile dropdown -->
                <div class="md:ml-4 relative">
                    <!-- Settings Dropdown -->
                    <div class="">
                        @guest
                            @if (Route::has('login'))
                                <div class="md:px-2 py-4 sm:block">
                                    <a href="{{ route('login') }}" class="text-sm text-black">Log
                                        In</a>

                                    @if (Route::has('register'))
                                        <a href="{{ route('register') }}" class="ml-1 text-sm text-black">Register</a>
                                    @endif
                                </div>
                            @endif
                        @endguest

                        @auth
                            <x-jet-dropdown align="right" width="48">
                                <x-slot name="trigger">
                                    @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                                        <button
                                            class="flex text-sm border-2 border-transparent rounded-full focus:outline-none focus:border-gray-300 transition">
                                            <img class="h-8 w-8 rounded-full object-cover"
                                                src="{{ Auth::user()->profile_photo_url }}"
                                                alt="{{ Auth::user()->name }}" />
                                        </button>
                                    @else
                                        <span class="inline-flex rounded-md">
                                            <button type="button"
                                                class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition">
                                                {{ Auth::user()->name }}

                                                <svg class="ml-2 -mr-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                                    viewBox="0 0 20 20" fill="currentColor">
                                                    <path fill-rule="evenodd"
                                                        d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                                        clip-rule="evenodd" />
                                                </svg>
                                            </button>
                                        </span>
                                    @endif
                                </x-slot>

                                <x-slot name="content">
                                    <!-- Account Management -->
                                    <div class="block px-4 py-2 text-xs text-gray-400">
                                        {{ __('Manage Account') }}
                                    </div>

                                    <x-jet-dropdown-link href="{{ route('profile.show') }}">
                                        {{ __('Profile') }}
                                    </x-jet-dropdown-link>


                                    <div class="border-t border-gray-100"></div>

                                    <!-- Authentication -->
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf

                                        <x-jet-dropdown-link href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                                                                                                                                                                                                                                                                                                                                            this.closest('form').submit();">

                                            {{ __('Log Out') }}
                                        </x-jet-dropdown-link>
                                    </form>
                                </x-slot>
                            </x-jet-dropdown>
                        @endauth

                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Mobile menu, show/hide based on menu state. -->
    <div :class="{ 'block': open, 'hidden': !open }" class="hidden sm:hidden" id="mobile-menu">
        <div class="px-2 pt-2 pb-3 space-y-1">
            <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
            {{-- <a href="{{ route('home') }}"
                class="text-gray-300 hover:bg-[#E7CC9A] hover:text-yellow-900 block px-3 py-2 rounded-md text-base font-medium"
                aria-current="page">Home</a>

            <a href="{{ route('catalog') }}"
                class="text-gray-300 hover:bg-[#E7CC9A] hover:text-yellow-900 block px-3 py-2 rounded-md text-base font-medium">Products</a>

            <a href="{{ route('about') }}"
                class="text-gray-300 hover:bg-[#E7CC9A] hover:text-yellow-900 block px-3 py-2 rounded-md text-base font-medium">About</a>

            <a href="{{ route('contact') }}"
                class="text-gray-300 hover:bg-[#E7CC9A] hover:text-yellow-900 block px-3 py-2 rounded-md text-base font-medium">Contact</a> --}}

        </div>
    </div>
</nav>
