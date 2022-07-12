<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Host | Finna Ruma</title>


    {{-- icon --}}
    <link rel="icon" href="{{ asset('img/logo/icon-logo.png') }}">

    <link rel="stylesheet" href="{{ mix('css/app.css') }}">

    {{-- poppins --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">

    @livewireStyles
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            /* font-family: 'Inter', sans-serif; */
        }
    </style>

    <script src="{{ mix('js/app.js') }}" defer></script>
</head>

<body>


    <header class="bg-white 00">
        <nav>
            <div class="container px-6 py-3 mx-auto lg:flex lg:justify-between lg:items-center">
                <div class="flex items-center justify-between">
                    <div>
                        <a href="{{ route('home') }}">
                            <img class="hidden lg:block h-10 w-auto" src={{ asset('img/logo/main-logo.png') }}
                                alt="Main Logo">
                        </a>
                    </div>


                </div>
                <!-- Mobile Menu open: "block", Menu closed: "hidden" -->
                <div class="items-center lg:flex">
                    <a class="block px-5 py-2 mt-4 font-medium leading-5 text-center text-white capitalize bg-gray-600 rounded-lg lg:mt-0 hover:bg-gray-500 lg:w-auto"
                        href="{{ route('host.register') }}">
                        Get started
                    </a>
                </div>

        </nav>

        <div class="container px-6 py-16 mx-auto">
            <div class="items-center lg:flex">
                <div class="w-full lg:w-1/2">
                    <div class="lg:max-w-lg">
                        <h1 class="text-2xl font-semibold text-gray-800 uppercase e lg:text-3xl">Best
                            Place To Choose Your Stay</h1>
                        <p class="mt-2 text-gray-600 -400">Lorem ipsum dolor sit amet, consectetur
                            adipisicing elit. Porro beatae error laborum ab amet sunt recusandae? Reiciendis natus
                            perspiciatis optio.</p>
                        <a href="{{ route('host.register') }}">
                            <button
                                class="w-full px-3 py-2 mt-6 text-xs font-medium text-white uppercase transition-colors duration transform bg-gray-600 rounded-md lg:w-auto hover:bg-gray-500 focus:outline-none focus:bg-gray-500">Try
                                Hosting</button>
                        </a>
                    </div>
                </div>

                <div class="flex items-center justify-center w-full mt-6 lg:mt-0 lg:w-1/2">
                    <img class="w-3/4 h-3/4 lg:max-w-2xl" src="{{ asset('img/global/hotels.svg') }}"
                        alt="Catalogue-pana.svg">
                </div>
            </div>
        </div>
    </header>



    <section class=" bg-gray-900">
        <div class="container px-6 py-10 mx-auto">
            <h1 class="text-3xl font-semibold  capitalize lg:text-4xl text-white">explore our <br>
                awesome <span class="underline decoration-blue-500">Components</span></h1>

            <p class="mt-4  xl:mt-6 text-gray-300">
                Lorem ipsum dolor sit amet consectetur, adipisicing elit. Nostrum quam voluptatibus
            </p>

            <div class="grid grid-cols-1 gap-8 mt-8 xl:mt-12 xl:gap-12 md:grid-cols-2 xl:grid-cols-3">
                <div class="p-8 space-y-3 border-2  border-blue-300 rounded-xl">
                    <span class="inline-block  text-blue-400">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M17.657 18.657A8 8 0 016.343 7.343S7 9 9 10c0-2 .5-5 2.986-7C14 5 16.09 5.777 17.656 7.343A7.975 7.975 0 0120 13a7.975 7.975 0 01-2.343 5.657z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9.879 16.121A3 3 0 1012.015 11L11 14H9c0 .768.293 1.536.879 2.121z" />
                        </svg>
                    </span>

                    <h1 class="text-2xl font-semibold  capitalize text-white">elegant Mode</h1>

                    <p class=" text-gray-300">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Provident ab nulla quod dignissimos vel
                        non corrupti doloribus voluptatum eveniet
                    </p>

                    <a href="#"
                        class="inline-flex p-2  capitalize transition-colors duration-200 transform  rounded-full bg-blue-500 text-white hover:underline  hover:text-blue-500">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M13 9l3 3m0 0l-3 3m3-3H8m13 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </a>
                </div>

                <div class="p-8 space-y-3 border-2  border-blue-300 rounded-xl">
                    <span class="inline-block  text-blue-400">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M11 4a2 2 0 114 0v1a1 1 0 001 1h3a1 1 0 011 1v3a1 1 0 01-1 1h-1a2 2 0 100 4h1a1 1 0 011 1v3a1 1 0 01-1 1h-3a1 1 0 01-1-1v-1a2 2 0 10-4 0v1a1 1 0 01-1 1H7a1 1 0 01-1-1v-3a1 1 0 00-1-1H4a2 2 0 110-4h1a1 1 0 001-1V7a1 1 0 011-1h3a1 1 0 001-1V4z" />
                        </svg>
                    </span>

                    <h1 class="text-2xl font-semibold  capitalize text-white">Easy to customiztions
                    </h1>

                    <p class=" text-gray-300">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Provident ab nulla quod dignissimos vel
                        non corrupti doloribus voluptatum eveniet
                    </p>

                    <a href="#"
                        class="inline-flex p-2  capitalize transition-colors duration-200 transform  rounded-full bg-blue-500 text-white hover:underline  hover:text-blue-500">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M13 9l3 3m0 0l-3 3m3-3H8m13 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </a>
                </div>

                <div class="p-8 space-y-3 border-2  border-blue-300 rounded-xl">
                    <span class="inline-block  text-blue-400">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z" />
                        </svg>
                    </span>

                    <h1 class="text-2xl font-semibold  capitalize text-white">Simple & clean designs
                    </h1>

                    <p class=" text-gray-300">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Provident ab nulla quod dignissimos vel
                        non corrupti doloribus voluptatum eveniet
                    </p>

                    <a href="#"
                        class="inline-flex p-2  capitalize transition-colors duration-200 transform rounded-full bg-blue-500 text-white hover:underline  hover:text-blue-500">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M13 9l3 3m0 0l-3 3m3-3H8m13 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </a>
                </div>
            </div>
        </div>
    </section>

    @include('global-footer')


    @livewireScripts
</body>

</html>
