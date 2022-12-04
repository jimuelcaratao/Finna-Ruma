<x-global-layout>

    <div class="lg:pb-12 lg:pt-6">
        <div class="max-w-screen-2xl mx-auto sm:px-6 lg:px-24">

            <div class="hero-section pt-6">
                <div class="bg-cover bg-no-repeat shadow-md sm:rounded-lg  bg-right "
                    style="background-image: url({{ asset('img/global/gg.jpg') }}); ">
                    <div class="sm:rounded-lg bg-gradient-to-r from-slate-300  to-transparent h-96 p-6 lg:p-12">

                        <div class="">
                            <p class="text-4xl lg:text-6xl font-semibold ">
                                Hello Tenants!
                                <br>
                                Welcome to Finna Ruma.
                            </p>
                            <div class="flex  lg:justify-between">
                                <p class=" mt-8">
                                    A place where you can find your desired room to stay
                                    <br>
                                    while studying.
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

                    <form action="{{ route('rentals') }}" method="GET" id="search-form">
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
                                        placeholder="Place/Property Name">
                                </div>
                            </div>

                            <div class=" items-center">

                                <div>
                                    <input type="text" id="budget_" class="hidden " value="1">
                                </div>
                                <div>
                                    <label for="budget"
                                        class="block  mb-2 text-xs font-semibold text-gray-900 ">PRICE</label>
                                    <select id="budget" name="budget"
                                        class=" border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 ">
                                        @if (!empty(request()->budget_))
                                            <option value="{{ request()->budget }}" selected>{{ request()->budget }}
                                                budget
                                            </option>
                                        @else
                                            <option value="" selected>Open</option>
                                        @endif
                                        <option value="1">₱ 0
                                            - ₱ 499</option>
                                        <option value="2">₱ 500
                                            - ₱ 999</option>
                                        <option value="3">₱ 1000
                                            - ₱ 1599</option>
                                        <option value="4">₱ 1600
                                            - ₱ 1999</option>
                                        <option value="5">₱ 2000+</option>
                                    </select>
                                </div>
                                <div class="mt-2">
                                    <label for="target_type"
                                        class="block  mb-2 text-xs font-semibold text-gray-900 ">TARGET LOCATION</label>
                                    <select id="target_type" name="target_type"
                                        class=" border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 ">
                                        @if (!empty(request()->target_type))
                                            <option value="{{ request()->target_type }}" selected>
                                                {{ request()->target_type }}
                                                Close to school
                                            </option>
                                        @else
                                            <option value="" selected>Open</option>
                                        @endif
                                        <option value="1">Close to school</option>
                                    </select>
                                </div>
                            </div>

                            <div>
                                <label for="guests"
                                    class="block  mb-2 text-xs font-semibold text-gray-900 ">OCCUPANTS</label>
                                <select id="guests" name="guests"
                                    class=" border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 ">
                                    @if (!empty(request()->guests))
                                        <option value="{{ request()->guests }}" selected>{{ request()->guests }} guests
                                        </option>
                                    @else
                                        <option value="" selected>Open</option>
                                    @endif
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>


                                </select>
                            </div>

                            <button type="button" id="submit-form"
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
                        </header>
                        <!-- End heading -->
                        <!-- row -->
                        <div class="mx-auto flex flex-wrap flex-row text-center gap-7">

                            <!-- card -->

                            <!-- card -->
                            @forelse ($listings as $listing)
                                <a href="{{ route('single-list', [$listing->slug]) }}">
                                    <div
                                        class="text-left flex w-96 flex-col justify-center bg-white rounded-2xl shadow-md transition duration-500 ease-in-out transform hover:translate-y-1">
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

        </div>

        @push('scripts')
            <script src="https://unpkg.com/flowbite@1.4.7/dist/flowbite.js"></script>
            <script src="https://unpkg.com/flowbite@1.4.7/dist/datepicker.js"></script>
            <script>
                $("#submit-form").click(function() {

                    var conceptName = $('#budget').find(":selected").val();


                    $('#budget_').attr('name', `budget_${conceptName}`);
                    $("#search-form").submit();
                });
            </script>
        @endpush

</x-global-layout>
