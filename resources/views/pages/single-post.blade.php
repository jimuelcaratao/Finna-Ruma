<x-global-layout>

    @push('styles')
        <style>
            .mapouter {
                position: relative;
                text-align: right;
                height: 500px;
                width: 100%;
            }
        </style>
        <style>
            .gmap_canvas {
                overflow: hidden;
                background: none !important;
                height: 500px;
                width: 100%;

            }
        </style>
        <style>
            input[type="number"] {
                -webkit-appearance: textfield;
                -moz-appearance: textfield;
                appearance: textfield;
            }

            input[type="number"]::-webkit-inner-spin-button,
            input[type="number"]::-webkit-outer-spin-button {
                -webkit-appearance: none;
            }

            .number-input {
                display: inline-flex;
            }

            .number-input,
            .number-input * {
                box-sizing: border-box;
            }

            .number-input button {
                outline: none;
                -webkit-appearance: none;
                background-color: #ffffff;
                border: none;
                align-items: center;
                justify-content: center;
                width: 40px;
                cursor: pointer;
                margin: 0;
                position: relative;
                padding: 0;
                border-radius: 40px;
                border: 2px solid #ddd;

            }

            .number-input button:hover {
                background-color: #f8f8f8;
            }

            .number-input button:before,
            .number-input button:after {
                display: inline-block;
                position: absolute;
                content: "";
                width: 0.5rem;
                height: 2px;
                background-color: #212121;
                transform: translate(-50%, -50%);
            }

            .number-input button.plus:after {
                transform: translate(-50%, -50%) rotate(90deg);
            }

            .number-input input[type="number"] {
                font-family: sans-serif;
                max-width: 4.5rem;
                padding: 0.5rem;
                border: 0;
                text-align: center;
                outline: none;
            }

            .number-input {}

            .text-star {
                background-color: gold;
            }
        </style>
    @endpush
    <div class="lg:pb-12 lg:pt-6">
        <div class="max-w-screen-2xl mx-auto sm:px-6 lg:px-24">


            <div id="indicators-carousel" class="relative" data-carousel="slide">

                <div class="overflow-hidden relative h-48 rounded-lg sm:h-64 xl:h-80 2xl:h-96">

                    <div class="duration-700 ease-in-out absolute inset-0 transition-all transform translate-x-0 z-20"
                        data-carousel-item="active">
                        <img src="{{ asset('storage/media/listing/cover_' . $listing->listing_id . '_' . $listing->default_photo) }}"
                            class="block absolute top-1/2 left-1/2 w-full -translate-x-1/2 -translate-y-1/2"
                            alt="{{ $listing->listing_title }}
                            's photo">
                    </div>

                    @if ($listing->listing_gallery->photo_1 != null)
                        <div class="duration-700 ease-in-out absolute inset-0 transition-all transform translate-x-full z-10"
                            data-carousel-item="">
                            <img src="{{ asset('storage/media/listing/photo_1_' . $listing->listing_id . '_' . $listing->listing_gallery->photo_1) }}"
                                class="block absolute top-1/2 left-1/2 w-full -translate-x-1/2 -translate-y-1/2"
                                alt="{{ $listing->listing_title }}
                                's photo">
                        </div>
                    @endif

                    @if ($listing->listing_gallery->photo_2 != null)
                        <div class="hidden duration-700 ease-in-out absolute inset-0 transition-all transform"
                            data-carousel-item="">
                            <img src="{{ asset('storage/media/listing/photo_2_' . $listing->listing_id . '_' . $listing->listing_gallery->photo_2) }}"
                                class="block absolute top-1/2 left-1/2 w-full -translate-x-1/2 -translate-y-1/2"
                                alt="{{ $listing->listing_title }}
                                's photo">
                        </div>
                    @endif

                    @if ($listing->listing_gallery->photo_3 != null)
                        <div class="hidden duration-700 ease-in-out absolute inset-0 transition-all transform"
                            data-carousel-item="">
                            <img src="{{ asset('storage/media/listing/photo_3_' . $listing->listing_id . '_' . $listing->listing_gallery->photo_3) }}"
                                class="block absolute top-1/2 left-1/2 w-full -translate-x-1/2 -translate-y-1/2"
                                alt="{{ $listing->listing_title }}
                            's photo">
                        </div>
                    @endif


                </div>


                <button type="button"
                    class="flex absolute top-0 left-0 z-30 justify-center items-center px-4 h-full cursor-pointer group focus:outline-none"
                    data-carousel-prev="">
                    <span
                        class="inline-flex justify-center items-center w-8 h-8 rounded-full sm:w-10 sm:h-10 bg-white/30  group-hover:bg-white/50  group-focus:ring-4 group-focus:ring-white  group-focus:outline-none">
                        <svg class="w-5 h-5 text-white sm:w-6 sm:h-6 " fill="none" stroke="currentColor"
                            viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7">
                            </path>
                        </svg>
                        <span class="hidden">Previous</span>
                    </span>
                </button>
                <button type="button"
                    class="flex absolute top-0 right-0 z-30 justify-center items-center px-4 h-full cursor-pointer group focus:outline-none"
                    data-carousel-next="">
                    <span
                        class="inline-flex justify-center items-center w-8 h-8 rounded-full sm:w-10 sm:h-10 bg-white/30  group-hover:bg-white/50  group-focus:ring-4 group-focus:ring-white  group-focus:outline-none">
                        <svg class="w-5 h-5 text-white sm:w-6 sm:h-6 " fill="none" stroke="currentColor"
                            viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7">
                            </path>
                        </svg>
                        <span class="hidden">Next</span>
                    </span>
                </button>
            </div>


            {{-- content --}}
            <div>
                <div class="container mx-auto">

                    <div class="flex justify-center lg:my-8">
                        <!-- Row -->
                        <div class="w-full flex-1 md:flex">

                            <!-- Col -->
                            <div class="flex-initial w-full lg:w-3/5 lg:block bg-white lg:mr-10 px-4 lg:px-0">
                                <div class=" mb-4">

                                    <div class="flex justify-between">
                                        <div>
                                            <h3 class="pt-4 mb-2 text-4xl font-semibold">{{ $listing->listing_title }}
                                            </h3>
                                            <a class="text-sm font-medium text-gray-700 underline">
                                                {{ $listing->location }}</a>

                                            <!-- Breadcrumb -->
                                            <nav class="flex" aria-label="Breadcrumb">
                                                <ol class="inline-flex items-center space-x-1 md:space-x-3">
                                                    <li class="inline-flex items-center">
                                                        <span
                                                            class="inline-flex items-center text-sm font-medium text-gray-700">
                                                            {{ $listing->max_guest }} guests
                                                        </span>
                                                    </li>
                                                    <li>
                                                        <div class="flex items-center">
                                                            <span class="mx-1">
                                                                •
                                                            </span>
                                                            <span
                                                                class="ml-1 text-sm font-medium text-gray-700 md:ml-2 ">{{ $listing->bedrooms }}
                                                                bedrooms</span>
                                                        </div>
                                                    </li>
                                                    <li aria-current="page">
                                                        <div class="flex items-center">
                                                            <span class="mx-1">
                                                                •
                                                            </span>

                                                            <span
                                                                class="ml-1 text-sm font-medium text-gray-700 md:ml-2">{{ $listing->beds }}
                                                                beds</span>
                                                        </div>
                                                    </li>

                                                    <li aria-current="page">
                                                        <div class="flex items-center">
                                                            <span class="mx-1">
                                                                •
                                                            </span>

                                                            <span
                                                                class="ml-1 text-sm font-medium text-gray-700 md:ml-2">{{ $listing->bathrooms }}
                                                                baths
                                                            </span>
                                                        </div>
                                                    </li>
                                                </ol>
                                            </nav>

                                        </div>

                                        <div class=" inline-flex gap-4 mt-4">
                                            <div>
                                                <p class="relative inline-flex items-center w-full  py-1  text-sm ">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="mr-1 h-5 w-5"
                                                        fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                                        stroke-width="2">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12" />
                                                    </svg>
                                                    Share
                                                </p>
                                            </div>
                                            <div>
                                                <p class="relative inline-flex items-center w-full  py-1  text-sm ">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="mr-1 h-5 w-5"
                                                        fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                                        stroke-width="2">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                                                    </svg>
                                                    Save
                                                </p>
                                            </div>

                                        </div>
                                    </div>


                                    {{-- borderb --}}
                                    <div class="border-b-2 border-gray-30 my-6"></div>

                                    <div class="w-full text-gray-900 bg-white ">
                                        <h3 class="pt-4 mb-4 text-xl font-semibold">What this place offers</h3>
                                        {{-- Amenities --}}
                                        @include('pages.single-post-components.amenities')

                                        {{-- House rules --}}
                                        <h3 class="pt-4 mb-4 text-xl font-semibold mt-4">House Rules</h3>
                                        @include('pages.single-post-components.house-rules')


                                    </div>

                                    {{-- borderb --}}
                                    <div class="border-b-2 border-gray-30 my-6"></div>


                                    {{-- Descriptions --}}
                                    <div class="mb-4">
                                        <span class="text-sm text-gray-700"> {!! $listing->description !!}</span>
                                    </div>


                                </div>

                            </div>




                            <!-- Payment Section -->
                            <div class="flex-initial  w-full lg:w-2/5 ">
                                <div class=" mb-4 py-5 px-8 mt-4 shadow-md border-2 border-gray-300 lg:rounded-lg">
                                    <h3 class=" mb-4 text-3xl font-semibold">₱ @convert($listing->price_per_night) <span
                                            class="text-sm text-gray-400 font-normal">night</span></h3>

                                    <div class="border-b-2 border-gray-30 my-6"></div>

                                    {{-- Datepicker --}}

                                    <form action="{{ route('global.booking') }}" method="POST">
                                        @csrf
                                        <div date-rangepicker="" class="flex items-center">
                                            <div class="relative">
                                                <div
                                                    class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none">
                                                    <svg aria-hidden="true" class="w-5 h-5 mt-5 text-gray-500 "
                                                        fill="currentColor" viewBox="0 0 20 20"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <path fill-rule="evenodd"
                                                            d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z"
                                                            clip-rule="evenodd"></path>
                                                    </svg>
                                                </div>
                                                <label for="check-in" class="text-xs font-semibold">CHECK-IN</label>

                                                <input name="check-in" id="check-in" type="text"
                                                    class="w-full bg-white border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block pl-10 p-2.5  datepicker-input"
                                                    placeholder="Select date start">
                                            </div>
                                            <span class="mx-4 text-gray-500 mt-6">to</span>
                                            <div class="relative">
                                                <div
                                                    class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none">
                                                    <svg aria-hidden="true" class="w-5 h-5 mt-5 text-gray-500 "
                                                        fill="currentColor" viewBox="0 0 20 20"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <path fill-rule="evenodd"
                                                            d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z"
                                                            clip-rule="evenodd"></path>
                                                    </svg>
                                                </div>
                                                <label for="checkout" class="text-xs font-semibold">CHECKOUT</label>

                                                <input name="checkout" id="checkout" type="text"
                                                    class="w-full bg-white border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block pl-10 p-2.5  datepicker-input"
                                                    placeholder="Select date end">
                                            </div>
                                        </div>

                                        {{-- quantity inputs --}}
                                        <div class="mt-4">
                                            <div class="flex items-center justify-between w-full md:w-3/5">
                                                <div>
                                                    <h3 class="text-base text-gray-900 font-bold">Adults</h3>
                                                    <h3 class="text-sm text-gray-900 font-medium">Age 13+</h3>
                                                </div>
                                                <fieldset class="mt-2">
                                                    <td>
                                                        <div class="justify-content-center">
                                                            <div class=" mb-0">
                                                                <div class=" mx-auto mb-0">
                                                                    <div class="number-input">

                                                                        <button type="button"
                                                                            onclick="this.parentNode.querySelector('input[type=number]').stepDown()"></button>
                                                                        <input class="adults " min="1"
                                                                            max="5" name="adults"
                                                                            value="1" type="number">
                                                                        <button type="button"
                                                                            onclick="this.parentNode.querySelector('input[type=number]').stepUp()"
                                                                            class="plus"></button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </fieldset>
                                            </div>
                                        </div>

                                        <div class="mt-4">
                                            <div class="flex items-center justify-between w-full md:w-3/5">
                                                <div>
                                                    <h3 class="text-base text-gray-900 font-bold">Children</h3>
                                                    <h3 class="text-sm text-gray-900 font-medium">Ages 2-12</h3>
                                                </div>
                                                <fieldset class="mt-2">
                                                    <td>
                                                        <div class="justify-content-center">
                                                            <div class=" mb-0">
                                                                <div class=" mx-auto mb-0">
                                                                    <div class="number-input">

                                                                        <button type="button"
                                                                            onclick="this.parentNode.querySelector('input[type=number]').stepDown()"></button>
                                                                        <input class="children " min="0"
                                                                            max="5" name="children"
                                                                            value="0" type="number">
                                                                        <button type="button"
                                                                            onclick="this.parentNode.querySelector('input[type=number]').stepUp()"
                                                                            class="plus"></button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </fieldset>
                                            </div>
                                        </div>

                                        <div class="mt-4">
                                            <div class="flex items-center justify-between w-full md:w-3/5">
                                                <div>
                                                    <h3 class="text-base text-gray-900 font-bold">Infants</h3>
                                                    <h3 class="text-sm text-gray-900 font-medium">Under 2</h3>
                                                </div>
                                                <fieldset class="mt-2">
                                                    <td>
                                                        <div class="justify-content-center">
                                                            <div class=" mb-0">
                                                                <div class=" mx-auto mb-0">
                                                                    <div class="number-input">

                                                                        <button type="button"
                                                                            onclick="this.parentNode.querySelector('input[type=number]').stepDown()"></button>
                                                                        <input class="infants " min="0"
                                                                            max="5" name="infants"
                                                                            value="0" type="number">
                                                                        <button type="button"
                                                                            onclick="this.parentNode.querySelector('input[type=number]').stepUp()"
                                                                            class="plus"></button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </fieldset>
                                            </div>
                                        </div>

                                        <div class="mt-4">
                                            <div class="flex items-center justify-between w-full md:w-3/5">
                                                <div class="mr-2">
                                                    <h3 class="text-base text-gray-900 font-bold">Pets</h3>
                                                    <h3 class="text-sm text-gray-900 font-medium ">Inform your host
                                                        first
                                                    </h3>
                                                </div>
                                                <fieldset class="mt-2 ">
                                                    <td>
                                                        <div class="justify-content-center">
                                                            <div class=" mb-0">
                                                                <div class=" mx-auto mb-0">
                                                                    <div class="number-input">

                                                                        <button type="button"
                                                                            onclick="this.parentNode.querySelector('input[type=number]').stepDown()"></button>
                                                                        <input class="pets " min="0"
                                                                            max="5" name="pets"
                                                                            value="0" type="number">
                                                                        <button type="button"
                                                                            onclick="this.parentNode.querySelector('input[type=number]').stepUp()"
                                                                            class="plus"></button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </fieldset>
                                            </div>
                                        </div>

                                        <button type="submit"
                                            class="w-full py-2.5 px-5 mr-2 mb-2 mt-10 text-sm font-medium text-white bg-gray-700 focus:outline-none  rounded-lg ">Reserve</button>

                                        <div class="mt-4 hidden" id="total-fee">
                                            <div class="flex items-center justify-between w-full">
                                                <div class="mr-2 underline">
                                                    <input id="price_night" name="price_night"
                                                        value="{{ $listing->price_per_night }}" readonly
                                                        class="w-16 text-base text-gray-900 font-thin  underline inline-flex outline-none">
                                                    × <span id="total-days"></span>

                                                </div>
                                                <div>
                                                    ₱ <input readonly id="pending-total"
                                                        name="pending-total"class="outline-none">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="mt-4">
                                            <div class="flex items-center justify-between w-full">
                                                <div class="mr-2">
                                                    <p class="text-base text-gray-900 font-thin  underline">Service
                                                        Fee
                                                    </p>
                                                </div>
                                                <div>
                                                    ₱
                                                    <input readonly id="service_fee" name="service_fee"
                                                        value="{{ $listing->service_fee }}"
                                                        class="text-base text-gray-900 font-medium outline-none">


                                                </div>
                                            </div>
                                        </div>

                                        <div class="border-b-2 border-gray-30 my-6"></div>

                                        <div class="text-right">
                                            ₱
                                            <input id="total" name="total" value="@convert($listing->price_per_night)" readonly
                                                class="outline-none w-24 mb-4  text-xl font-semibold">
                                            <span class="text-sm text-gray-400 font-normal">total</span>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- Reviews --}}
                    @include('pages.single-post-components.reviews')


                </div>
            </div>

            {{-- Maps --}}
            <div>
                <div class="mapouter">
                    <div class="gmap_canvas  lg:rounded-lg py-8"><iframe width="100%" height="400"
                            id="gmap_canvas"
                            src="https://maps.google.com/maps?q={{ $listing->map_pin }}&t=&z=13&ie=UTF8&iwloc=&output=embed"
                            frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe>

                    </div>
                </div>
            </div>

            {{-- additional notes --}}

            <div class="flex justify-center ">
                <div class="w-full flex-1 md:flex   gap-20">

                    @if ($listing->additional_notes !== null)
                        <!-- notes -->
                        <div class="flex-initial w-full lg:w-1/2 lg:block bg-white">
                            <div class=" mb-4 ">

                                <h2 class="font-semibold mb-2">Additional Notes</h2>
                                <span class="text-sm text-gray-700">{!! $listing->additional_notes !!}</span>
                            </div>
                        </div>
                    @endif
                    @if ($listing->listing_rule->additional_rules !== null)
                        <!-- additional rules -->
                        <div class="flex-initial w-full lg:w-1/2 lg:block bg-white ">
                            <div class=" mb-4">
                                <p class="font-semibold mb-2">Additional Rules</p>
                                <span class="text-sm text-gray-700">{!! $listing->listing_rule->additional_rules !!}</span>
                            </div>
                        </div>
                    @endif





                </div>

            </div>

            <!-- Host -->
            <div class="mx-auto mt-10 ">
                <div class=" mb-4 ml-6 text-center justify-center">

                    <div class="max-w-sm bg-white rounded-lg border border-gray-200 shadow-md mx-auto">

                        <div class="flex flex-col items-center py-10">
                            @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                                <span
                                    class="flex text-sm border-2 border-transparent rounded-full focus:outline-none focus:border-gray-300 transition">
                                    <img class="h-24 w-24 rounded-full object-cover"
                                        src="{{ $listing->user->profile_photo_url }}"
                                        alt="{{ $listing->user->name }}" />
                                </span>
                            @else
                                <span class="inline-flex rounded-md">
                                    <span
                                        class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition">
                                        {{ $listing->user->name }}

                                        <svg class="ml-2 -mr-0.5 h-5 w-5" xmlns="http://www.w3.org/2000/svg"
                                            viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd"
                                                d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                                clip-rule="evenodd" />
                                        </svg>
                                    </span>
                                </span>
                            @endif
                            <h5 class="mb-1 text-xl font-medium text-gray-900 mt-4">Hosted by:
                                {{ $listing->user->name }}</h5>
                            <span class="text-sm text-gray-500 ">Joined in
                                {{ $listing->user->created_at->format('m/Y') }}</span>
                            <div class="flex mt-4 space-x-3 lg:mt-6">
                                {{-- <a href="#"
                                    class="inline-flex items-center py-2 px-4 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 ">Add
                                    friend</a> --}}
                                <a href="#"
                                    class="inline-flex items-center py-2 px-4 text-sm font-medium text-center text-gray-900 bg-white rounded-lg border border-gray-300 hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 ">Message</a>
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

        <script>
            function textAreaAdjust(element) {
                element.style.height = "1px";
                element.style.height = (25 + element.scrollHeight) + "px";
            }

            $(document).ready(function() {


                var pending = $('#pending-total');
                var total_days = $('#total-days');
                var price_night = $('#price_night').val();
                var service_fee = $('#service_fee').val();


                function treatAsUTC(date) {
                    var result = new Date(date);
                    result.setMinutes(result.getMinutes() - result.getTimezoneOffset());
                    return result;
                }

                function daysBetween(startDate, endDate) {
                    var millisecondsPerDay = 24 * 60 * 60 * 1000;
                    return (treatAsUTC(endDate) - treatAsUTC(startDate)) / millisecondsPerDay;
                }


                $('#check-in').focusout(function() {
                    var first = $('#check-in').val();
                    var second = $('#checkout').val();
                    var days = daysBetween(first, second);

                    $('#total-days').text(days);


                    $('#pending-total').val((price_night * days).toLocaleString());

                    var service = parseInt(service_fee);
                    var get_total = (price_night * days) + service;
                    $('#total').val((get_total).toLocaleString());
                    $('#total-fee').show();

                });

                $('#checkout').focusout(function() {
                    var first = $('#check-in').val();
                    var second = $('#checkout').val();
                    var days = daysBetween(first, second);

                    $('#total-days').text(days);
                    $('#pending-total').val((price_night * days).toLocaleString());

                    var service = parseInt(service_fee);
                    var get_total = (price_night * days) + service;
                    $('#total').val((get_total).toLocaleString());
                    $('#total-fee').show();

                });

            });
        </script>
    @endpush
</x-global-layout>
