<x-global-layout>

    @push('styles')
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/fullcalendar@5.11.3/main.min.css"
            integrity="sha256-5veQuRbWaECuYxwap/IOE/DAwNxgm4ikX7nrgsqYp88=" crossorigin="anonymous">
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                var calendarEl = document.getElementById('calendar');
                var calendar = new FullCalendar.Calendar(calendarEl, {
                    initialView: 'dayGridMonth',
                    timeZone: 'Asia/Manila',
                    events: [

                        @foreach ($listing->Booking as $item)
                            @if ($item->host_status === 'Confirmed by Host')
                                {
                                    title: "Occupied",
                                    start: "{{ date('Y-m-d', strtotime($item->check_in)) }}",
                                    end: "{{ date('Y-m-d', strtotime($item->checkout)) }}T12:00:00"
                                },
                            @endif
                        @endforeach

                    ]
                });
                calendar.render();
            });
        </script>

        <!-- Styles -->
        <style>
            #calendar ::-webkit-scrollbar-track {
                -webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.3);
                background-color: #F5F5F5;
                border-radius: 40px;

            }

            #calendar ::-webkit-scrollbar {
                width: 6px;
                height: 6px;
                background-color: #F5F5F5;
            }

            #calendar ::-webkit-scrollbar-thumb {
                border-radius: 40px;
                background-color: rgb(179, 179, 179);


            }

            #calendar {
                max-width: 100%;
                height: 450px;
                margin: 40px 0px;
            }

            input:checked+label {
                border-color: #160e06;
                box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
            }
        </style>
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

                                    <div class="flex justify-between gap-10">
                                        <div>
                                            <span
                                                class="mb-2 bg-blue-100 text-blue-800 text-xs font-medium inline-flex items-center px-2.5 py-0.5 rounded ">
                                                {{ $listing->category->category_name }}
                                            </span>

                                            @if ($listing->location_score == 1)
                                                <span
                                                    class="mb-2 bg-green-100 text-green-800 text-xs font-medium inline-flex items-center px-2.5 py-0.5 rounded ">
                                                    Close to school
                                                </span>
                                            @endif


                                            <h3 class="pt-2 mb-2 text-4xl font-semibold">{{ $listing->listing_title }}
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

                                                    <li aria-current="page">
                                                        <div class="flex items-center">
                                                            <span class="mx-1">
                                                                •
                                                            </span>

                                                            <span
                                                                class="ml-1 text-sm font-medium text-gray-700 md:ml-2">{{ $listing->property_size }}
                                                                sq. m
                                                            </span>
                                                        </div>
                                                    </li>
                                                </ol>
                                            </nav>

                                        </div>

                                        <div class=" inline-flex gap-4 mt-4">
                                            {{-- <div>
                                                <p class="relative inline-flex items-center w-full  py-1  text-sm ">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="mr-1 h-5 w-5"
                                                        fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                                        stroke-width="2">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12" />
                                                    </svg>
                                                    Share
                                                </p>
                                            </div> --}}
                                            <div>
                                                @if ($wishlist == null)
                                                    <form action="{{ route('wishlist.add', [$listing->listing_id]) }}"
                                                        method="POST">
                                                        @csrf
                                                        <button type="submit"
                                                            class="float-right text-black  rounded-full p-2 cursor-pointer group mb-2  inline-flex">
                                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-2"
                                                                fill="none" viewBox="0 0 24 24"
                                                                stroke="currentColor">
                                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                                    stroke-width="2"
                                                                    d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                                                            </svg>
                                                            Save
                                                        </button>
                                                    </form>
                                                @else
                                                    <form
                                                        action="{{ route('wishlist.remove', [$listing->listing_id]) }}"
                                                        method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit"
                                                            class="float-right text-black  rounded-full p-2 cursor-pointer group mb-2 inline-flex ">
                                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                                class="h-5 w-5  mr-2" viewBox="0 0 20 20"
                                                                fill="currentColor">
                                                                <path fill-rule="evenodd"
                                                                    d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656L10 17.657l-6.828-6.829a4 4 0 010-5.656z"
                                                                    clip-rule="evenodd" />
                                                            </svg> Saved
                                                        </button>
                                                    </form>
                                                @endif
                                            </div>

                                        </div>
                                    </div>


                                    {{-- Calendar --}}
                                    <div id='calendar'></div>

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
                                <div class=" mb-4 p-6 mt-4 shadow-md border-2 border-gray-300 lg:rounded-lg">
                                    @if ($listing->availability == 'Unavailable')
                                        <span
                                            class=" bg-red-100 text-red-800 text-xs font-medium inline-flex items-center px-2.5 py-0.5 rounded mb-2">
                                            Unavailable
                                        </span>
                                    @endif
                                    <h3 class=" mb-4 text-3xl font-semibold">₱ @convert($listing->price_per_night) <span
                                            class="text-sm text-gray-400 font-normal">night</span></h3>

                                    <div class="border-b-2 border-gray-30 my-6"></div>

                                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-2 items-center justify-center mb-4"
                                        id="rd-btn">
                                        <div>
                                            <input class="hidden" type="radio" name="payment_method"
                                                id="radio_1" value="Cash on Delivery" checked>
                                            <label
                                                class="flex flex-col p-4 border shadow rounded-lg border-gray-200 cursor-pointer"
                                                for="radio_1">
                                                <span class="text-md font-bold text-center" for="radio_1">Per
                                                    night</span>
                                            </label>
                                        </div>
                                        <div>
                                            <input class="hidden" type="radio" name="payment_method"
                                                id="radio_2" value="Pick Up">
                                            <label
                                                class="flex flex-col p-4 border shadow rounded-lg border-gray-200 cursor-pointer"
                                                for="radio_2">
                                                <span class="text-md font-bold text-center"
                                                    for="radio_2">Monthly</span>
                                            </label>
                                        </div>

                                    </div>

                                    {{-- Datepicker --}}

                                    <form action="{{ route('global.booking', [$listing->listing_id]) }}"
                                        method="POST">
                                        @csrf

                                        <div id="monthly_date">
                                            <div class="relative mb-4">
                                                <div
                                                    class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none">
                                                    <svg aria-hidden="true"
                                                        class="w-5 h-5 mt-5 text-gray-500 dark:text-gray-400"
                                                        fill="currentColor" viewBox="0 0 20 20"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <path fill-rule="evenodd"
                                                            d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z"
                                                            clip-rule="evenodd"></path>
                                                    </svg>
                                                </div>
                                                <label for="check-in-monthly"
                                                    class="text-xs font-semibold">CHECK-IN</label>

                                                <input datepicker name="check-in-monthly" id="check-in-monthly"
                                                    type="text"
                                                    class="bg-white border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5  "
                                                    placeholder="Select date">
                                            </div>
                                        </div>

                                        <div id="per_night_date" date-rangepicker="" class="flex items-center">
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

                                                <input name="check-in" id="check-in" type="text" required
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

                                                <input name="checkout" id="checkout" type="text" required
                                                    class="w-full bg-white border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block pl-10 p-2.5  datepicker-input"
                                                    placeholder="Select date end">
                                            </div>
                                        </div>

                                        {{-- quantity inputs --}}
                                        <div class="mt-4">
                                            <div class="flex items-center justify-between w-full md:w-3/5">
                                                <div>
                                                    <h3 class="text-base text-gray-900 font-bold">Occupants</h3>
                                                    <h3 class="text-sm text-gray-900 font-medium">How many guests
                                                    </h3>
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
                                                                            max="{{ $listing->max_guest }}"
                                                                            name="adults" value="1"
                                                                            type="number">
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

                                        <div class="mt-4 hidden">
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
                                                                            max="{{ $listing->max_guest }}"
                                                                            name="children" value="0"
                                                                            type="number">
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

                                        <div class="mt-4 hidden">
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
                                                                            max="{{ $listing->max_guest }}"
                                                                            name="infants" value="0"
                                                                            type="number">
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

                                        <div class="mt-4 hidden">
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
                                                                            max="{{ $listing->max_guest }}"
                                                                            name="pets" value="0"
                                                                            type="number">
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
                                                    <input id="days" name="days" class="hidden">
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

                    <div id="map" style="width: 100%; height:400px;">
                    </div>
                    <input type="text" name="latitude" id="latitude" readonly value="{{ $listing->latitude }}"
                        class="hidden">

                    <input type="text" name="longitude" id="longitude" readonly
                        value="{{ $listing->longitude }}" class="hidden">
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
                                {{-- <a href="#"
                                    class="inline-flex items-center py-2 px-4 text-sm font-medium text-center text-gray-900 bg-white rounded-lg border border-gray-300 hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 ">Message</a> --}}
                            </div>
                        </div>
                    </div>


                </div>
            </div>

        </div>
    </div>


    @push('scripts')
        <script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.11.3/main.min.js"
            integrity="sha256-7PzqE1MyWa/IV5vZumk1CVO6OQbaJE4ns7vmxuUP/7g=" crossorigin="anonymous"></script>
        <script src="https://unpkg.com/flowbite@1.4.7/dist/flowbite.js"></script>
        <script src="https://unpkg.com/flowbite@1.4.7/dist/datepicker.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.js"></script>
        <script async defer
            src="https://maps.googleapis.com/maps/api/js?key={{ env('PLACE_KEY') }}&libraries=places&callback=initMap">
        </script>
        <script src="{{ asset('js/map.js') }}"></script>
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

                $('#monthly_date').hide();
                $('#per_night_date').show();

                $("#radio_1").on("click", function() {
                    $('#monthly_date').hide();
                    $('#per_night_date').show();
                })

                $("#radio_2").on("click", function() {
                    $('#monthly_date').show();
                    $('#per_night_date').hide();
                })

                function treatAsUTC(date) {
                    var result = new Date(date);
                    result.setMinutes(result.getMinutes() - result.getTimezoneOffset());
                    return result;
                }

                function daysBetween(startDate, endDate) {
                    var millisecondsPerDay = 24 * 60 * 60 * 1000;
                    return (treatAsUTC(endDate) - treatAsUTC(startDate)) / millisecondsPerDay;
                }


                // monthly
                $('#check-in-monthly').focusout(function() {
                    var monthly = $('#check-in-monthly').val();

                    // var today = new Date(monthly);
                    // var priorDate = new Date(new Date().setDate(today.getDate() + 30));

                    const priorDate = moment(monthly, "MM/DD/YYYY").add(30, 'days').format('L');
                    console.log(priorDate)

                    console.log(priorDate);


                    $('#check-in').val(monthly);
                    $('#checkout').val(priorDate);

                    var days = daysBetween(monthly, priorDate);

                    $('#total-days').text(days);

                    $('#days').val(days);
                    $('#pending-total').val((price_night * days).toLocaleString());

                    var service = parseInt(service_fee);
                    var get_total = (price_night * days) + service;
                    $('#total').val(get_total);
                    $('#total-fee').show();
                });




                $('#check-in').focusout(function() {
                    var first = $('#check-in').val();
                    var second = $('#checkout').val();
                    var days = daysBetween(first, second);

                    $('#total-days').text(days);

                    $('#days').val(days);
                    $('#pending-total').val((price_night * days).toLocaleString());

                    var service = parseInt(service_fee);
                    var get_total = (price_night * days) + service;
                    $('#total').val(get_total);
                    $('#total-fee').show();
                    // (get_total).toLocaleString()
                });

                $('#checkout').focusout(function() {
                    var first = $('#check-in').val();
                    var second = $('#checkout').val();
                    var days = daysBetween(first, second);

                    $('#total-days').text(days);
                    $('#pending-total').val(price_night * days);

                    var service = parseInt(service_fee);
                    var get_total = (price_night * days) + service;
                    $('#total').val(get_total);
                    $('#total-fee').show();

                });

            });
        </script>
    @endpush
</x-global-layout>
