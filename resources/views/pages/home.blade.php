<x-global-layout>

    <div class="lg:pb-12 lg:pt-6">
        <div class="max-w-screen-2xl mx-auto sm:px-6 lg:px-24">

            <div class="hero-section pt-6">
                <div class="bg-cover bg-no-repeat shadow-md sm:rounded-lg  bg-right "
                    style="background-image: url({{ asset('img/hotel-img.jpg') }}); ">
                    <div class="sm:rounded-lg bg-gradient-to-r from-slate-300  to-transparent h-96 p-6 lg:p-12">

                        <div class="">
                            <p class="text-4xl lg:text-6xl font-semibold ">
                                Enjoy Your
                                <br>
                                Dream Vacation
                            </p>
                            <div class="flex  lg:justify-between">
                                <p class=" mt-8">
                                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Facere,
                                    <br>
                                    architecto quod placeat totam magni qui eius necessitatibus at?
                                </p>

                                <div class=" hidden text-white text-lg  mt-16">
                                    Explore more
                                </div>
                            </div>

                            <div class="lg:hidden text-white text-lg ">
                                Explore mores
                            </div>
                        </div>

                    </div>

                </div>

                <div class="max-w-7xl mx-auto  lg:mx-12 border-2 border-gray-300  bg-white search-section center overflow-hidden shadow-md sm:rounded-lg z-20"
                    style="margin-top: -40px;">

                    <form action="{{ route('rentals') }}" method="GET">
                        <div class="h-48 py-6 px-12 grid grid-cols-5 gap-4">


                            {{-- Search --}}
                            <div class=" col-span-2">
                                <label for="destination" class="block mb-2 text-xs font-semibold text-gray-900">WHERE
                                    TO</label>
                                <div class="relative mb-2">
                                    <div class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                        </svg>
                                    </div>
                                    <input type="text" id="destination" name="destination"
                                        value="{{ request()->destination }}"
                                        class="w-full border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block  pl-10 p-2.5  "
                                        placeholder="Destination/Property Name">
                                </div>
                            </div>

                            <div>
                                <div date-rangepicker="" class=" items-center">
                                    <div class="relative mb-2">
                                        <div
                                            class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none ">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mt-5" fill="none"
                                                viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                            </svg>
                                        </div>
                                        <label for="check_in" class="text-xs font-semibold  ">CHECK-IN</label>

                                        <input name="check_in" id="check_in" type="text"
                                            value="{{ request()->check_in }}"
                                            class="w-full bg-white border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block pl-10 p-2.5  datepicker-input"
                                            placeholder="Select date start">
                                    </div>
                                    <div class="relative ">
                                        <div
                                            class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mt-5" fill="none"
                                                viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                            </svg>
                                        </div>
                                        <label for="checkout" class="text-xs font-semibold mb-2">CHECKOUT</label>

                                        <input name="checkout" id="checkout" type="text"
                                            value="{{ request()->checkout }}"
                                            class="w-full bg-white border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block pl-10 p-2.5  datepicker-input"
                                            placeholder="Select date end">
                                    </div>
                                </div>
                            </div>

                            <div>
                                <label for="guests"
                                    class="block  mb-2 text-xs font-semibold text-gray-900 ">GUESTS</label>
                                <select id="guests" name="guests"
                                    class=" border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 ">
                                    @if (!empty(request()->guests))
                                        <option value="{{ request()->guests }}" selected>{{ request()->guests }} guests
                                        </option>
                                    @else
                                        <option value="" selected>Open</option>
                                    @endif
                                    <option value="1">1 guest</option>
                                    <option value="2">2 guests</option>
                                    <option value="3">3 guests</option>
                                    <option value="4">4 guests</option>
                                    <option value="5">5 guests</option>
                                    <option value="6">6 guests</option>
                                    <option value="7">7 guests</option>
                                    <option value="8">8 guests</option>
                                    <option value="9">9 guests</option>

                                </select>
                            </div>

                            <button type="submit"
                                class="h-11 mt-6  text-gray-900 bg-white hover:bg-gray-100 border border-gray-200 focus:ring-4 focus:outline-none focus:ring-gray-100 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center  mr-2 mb-2">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-4" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                                </svg>
                                Search
                            </button>


                        </div>
                    </form>
                </div>
            </div>

            {{-- Pick your choice section --}}
            <div class="pick-your">
                <div id="pick-your" class="section relative pt-10 pb-8 md:pt-16 md:pb-0 bg-white">
                    <div class="container xl:max-w-7xl mx-auto px-4">
                        <!-- Heading start -->
                        <header class="text-center mx-auto mb-12 lg:px-20">
                            <h2 class="text-5xl leading-normal mb-2 font-bold text-black">Pick Your Choice</h2>

                            <p class="text-gray-500 leading-relaxed font-light text-xl mx-auto pb-2">Save time managing
                                advertising
                                &amp; Content for your business.</p>
                        </header>
                        <!-- End heading -->
                        <!-- row -->
                        <div class="mx-auto flex flex-wrap flex-row text-center gap-7">

                            <!-- card -->

                            <!-- card -->
                            @forelse ($listings as $listing)
                                <a href="{{ route('single-list', [$listing->slug]) }}">
                                    <div
                                        class=" flex w-96 flex-col justify-center bg-white rounded-2xl shadow-md transition duration-500 ease-in-out transform hover:translate-y-1">
                                        <!-- img -->
                                        <img class="aspect-video w-full rounded-t-2xl object-cover object-center"
                                            src="{{ asset('storage/media/listing/cover_' . $listing->listing_id . '_' . $listing->default_photo) }}" />
                                        <!-- text information -->
                                        <div class="p-4">
                                            <small
                                                class="text-blue-400 text-xs">{{ $listing->category->category_name }}</small>
                                            <h1 class="text-xl font-medium text-slate-600 pb-2">
                                                {{ $listing->listing_title }}</h1>



                                            <p class="text-sm tracking-tight font-light text-slate-400 leading-6">
                                                {{ $listing->location }}
                                            </p>

                                            <div class="flex justify-between pt-4">
                                                <div class="text-right text-2xl font-medium text-black pb-2 pt-4">
                                                </div>

                                                <div class="text-right text-2xl font-medium text-black pb-2 pt-4">₱
                                                    @convert($listing->price_per_night)
                                                    <span class="text-sm text-slate-500">night</span>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </a>


                            @empty
                            @endforelse


                        </div>
                        <!-- end row -->
                    </div>
                </div>
            </div>


            {{-- Explore Exciting --}}
            <div>
                <div class="container mx-auto lg:pt-24">

                    <div class="flex justify-center px-6 lg:my-12">
                        <!-- Row -->
                        <div class="w-full flex-1 md:flex">

                            <!-- Col -->
                            <div class="flex  w-full lg:block bg-white p-5 rounded-lg lg:rounded-l-none z-20">
                                <div class="lg:px-8 mb-4">
                                    <h3 class="pt-4 mb-2 text-3xl font-semibold">Explore exciting surprises</h3>
                                    <p class="mb-4 text-sm text-gray-700">
                                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Animi accusamus a
                                        iusto, numquam quisquam tempore!
                                    </p>

                                    <div class="w-full text-gray-900 bg-white  rounded-lg ">
                                        <p
                                            class="relative inline-flex items-center w-full px-4 py-2 text-sm font-medium rounded-t-lg ">
                                            <svg class="w-4 h-4 mr-2 fill-current" fill="currentColor"
                                                viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd"
                                                    d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-6-3a2 2 0 11-4 0 2 2 0 014 0zm-2 4a5 5 0 00-4.546 2.916A5.986 5.986 0 0010 16a5.986 5.986 0 004.546-2.084A5 5 0 0010 11z"
                                                    clip-rule="evenodd"></path>
                                            </svg>
                                            Profile
                                        </p>
                                        <p
                                            class="relative inline-flex items-center w-full px-4 py-2 text-sm font-medium ">
                                            <svg class="w-4 h-4 mr-2 fill-current" fill="currentColor"
                                                viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M5 4a1 1 0 00-2 0v7.268a2 2 0 000 3.464V16a1 1 0 102 0v-1.268a2 2 0 000-3.464V4zM11 4a1 1 0 10-2 0v1.268a2 2 0 000 3.464V16a1 1 0 102 0V8.732a2 2 0 000-3.464V4zM16 3a1 1 0 011 1v7.268a2 2 0 010 3.464V16a1 1 0 11-2 0v-1.268a2 2 0 010-3.464V4a1 1 0 011-1z">
                                                </path>
                                            </svg>
                                            Settings
                                        </p>
                                        <p
                                            class="relative inline-flex items-center w-full px-4 py-2 text-sm font-medium ">
                                            <svg class="w-4 h-4 mr-2 fill-current" fill="currentColor"
                                                viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd"
                                                    d="M5 3a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2V5a2 2 0 00-2-2H5zm0 2h10v7h-2l-1 2H8l-1-2H5V5z"
                                                    clip-rule="evenodd"></path>
                                            </svg>
                                            Messages
                                        </p>
                                        <p
                                            class="relative inline-flex items-center w-full px-4 py-2 text-sm font-medium rounded-b-lg ">
                                            <svg class="w-4 h-4 mr-2 fill-current" fill="currentColor"
                                                viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd"
                                                    d="M2 9.5A3.5 3.5 0 005.5 13H9v2.586l-1.293-1.293a1 1 0 00-1.414 1.414l3 3a1 1 0 001.414 0l3-3a1 1 0 00-1.414-1.414L11 15.586V13h2.5a4.5 4.5 0 10-.616-8.958 4.002 4.002 0 10-7.753 1.977A3.5 3.5 0 002 9.5zm9 3.5H9V8a1 1 0 012 0v5z"
                                                    clip-rule="evenodd"></path>
                                            </svg>
                                            Download
                                        </p>
                                    </div>
                                </div>

                            </div>
                            <!-- Col -->
                            <div class="flex w-full bg-white p-5 rounded-lg lg:rounded-l-none z-10">
                                <div class="lg:px-8 mb-4 text-right">

                                    <div class="h-48 w-full shadow-md border-2 border-gray-300  lg:rounded-lg">
                                        <video width="600" controls class="lg:rounded-lg">
                                            <source src="mov_bbb.mp4" type="video/mp4">
                                            <source src="mov_bbb.ogg" type="video/ogg">
                                            Your browser does not support HTML video.
                                        </video>
                                    </div>

                                    <div class="h-20 md:h-48 w-full bg-gray-200 shadow-md border-2 border-gray-300  lg:rounded-lg"
                                        style="margin-left:-20px; margin-top:-40px;">
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>

        @push('scripts')
            <script src="https://unpkg.com/flowbite@1.4.7/dist/flowbite.js"></script>
            <script src="https://unpkg.com/flowbite@1.4.7/dist/datepicker.js"></script>
        @endpush

</x-global-layout>
