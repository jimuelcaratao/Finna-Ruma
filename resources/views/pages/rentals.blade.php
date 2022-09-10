<x-global-layout>



    <x-catalog.catalog-layout>
        <x-slot name="head">
            <h1 class="text-3xl font-extrabold tracking-tight text-gray-900">
                Properties
            </h1>
        </x-slot>
        <x-slot name="categoryList">
            <form action="" id="filter-form">


                {{-- Search --}}

                <li>
                    <label for="destination" class="block mb-2 text-xs font-semibold text-gray-900">WHERE
                        TO</label>
                    <div class="relative mb-2">
                        <div class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                            </svg>
                        </div>
                        <input type="text" id="destination" name="destination" value="{{ request()->destination }}"
                            class=" border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5  "
                            placeholder="Destination/Property Name">
                    </div>
                </li>

                <li>
                    <div date-rangepicker="" class=" items-center">
                        <div class="relative mb-2">
                            <div class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none ">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mt-5" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                </svg>
                            </div>
                            <label for="check_in" class="text-xs font-semibold  ">CHECK-IN</label>

                            <input name="check_in" id="check_in" type="text" value="{{ request()->check_in }}"
                                class="w-full bg-white border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block pl-10 p-2.5  datepicker-input"
                                placeholder="Select date start">
                        </div>
                        <div class="relative ">
                            <div class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mt-5" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                </svg>
                            </div>
                            <label for="checkout" class="text-xs font-semibold mb-2">CHECKOUT</label>

                            <input name="checkout" id="checkout" type="text" value="{{ request()->checkout }}"
                                class="w-full bg-white border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block pl-10 p-2.5  datepicker-input"
                                placeholder="Select date end">
                        </div>
                    </div>
                </li>

                <li>
                    <label for="guests" class="block mt-2 mb-2 text-xs font-semibold text-gray-900 ">GUESTS</label>
                    <select id="guests" name="guests"
                        class=" border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 ">
                        @if (!empty(request()->guests))
                            <option value="{{ request()->guests }}" selected>{{ request()->guests }} guests</option>
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
                </li>

                <button type="submit" id="go"
                    class="text-gray-900 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-200 font-medium rounded-lg text-sm w-full py-2.5 mr-2 mt-4 ">
                    Search
                </button>

                @if (!empty(request()->destination) ||
                    !empty(request()->check_in) ||
                    !empty(request()->checkout) ||
                    !empty(request()->guests) ||
                    !empty(request()->search_cat) ||
                    !empty(request()->property_type))
                    <a href="{{ route('rentals') }}"><button type="button"
                            class="text-gray-900 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-200 font-medium rounded-lg text-sm w-full py-2.5 mr-2 mt-4 ">
                            Clear
                        </button>
                    </a>
                @endif


                <div class="border-b border-gray-200 py-4"></div>

                {{-- Budget Filter --}}
                <h3 class="pt-4 pb-4">Your budget</h3>
                <li>
                    <div class="flex items-center mb-2">
                        <input id="budget_1" name="budget_1" type="checkbox" value="1"
                            class="form_inp w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 "
                            onChange="this.form.submit()">
                        <label for="budget_1" class="ml-2 text-sm font-medium text-gray-900 ">₱ 0
                            - ₱ 2000</label>
                    </div>
                </li>

                <li>
                    <div class="flex items-center mb-2">
                        <input id="budget_2" name="budget_2" type="checkbox" value="1"
                            class="form_inp w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 "
                            onChange="this.form.submit()">
                        <label for="budget_2" class="ml-2 text-sm font-medium text-gray-900 ">₱ 2000
                            - ₱ 4000</label>
                    </div>
                </li>

                <li>
                    <div class="flex items-center mb-2">
                        <input id="budget_3" name="budget_3" type="checkbox" value="1"
                            class="form_inp w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 "
                            onChange="this.form.submit()">
                        <label for="budget_3" class="ml-2 text-sm font-medium text-gray-900 ">₱ 4000
                            - ₱ 6000</label>
                    </div>
                </li>

                <li>
                    <div class="flex items-center mb-2">
                        <input id="budget_4" name="budget_4" type="checkbox" value="1"
                            class="form_inp w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 "
                            onChange="this.form.submit()">
                        <label for="budget_4" class="ml-2 text-sm font-medium text-gray-900 ">₱ 6000+</label>
                    </div>
                </li>

                <div class="border-b border-gray-200 py-2"></div>

                {{-- Property Size --}}
                <h3 class="pt-4 pb-4">Property Size</h3>
                <li>
                    <div class="flex items-center mb-2">
                        <input id="size_1" name="size_1" type="checkbox" value="1"
                            class="form_inp w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 "
                            onChange="this.form.submit()">
                        <label for="size_1" class="ml-2 text-sm font-medium text-gray-900 ">0
                            - 10 sq. m</label>
                    </div>
                </li>

                <li>
                    <div class="flex items-center mb-2">
                        <input id="size_2" name="size_2" type="checkbox" value="1"
                            class="form_inp w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 ">
                        <label for="size_2" class="ml-2 text-sm font-medium text-gray-900 "> 10 sq. m
                            - 20 sq. m</label>
                    </div>
                </li>

                <li>
                    <div class="flex items-center mb-2">
                        <input id="size_3" name="size_3" type="checkbox" value="1"
                            class="form_inp w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 "
                            onChange="this.form.submit()">
                        <label for="size_3" class="ml-2 text-sm font-medium text-gray-900 "> 20 sq. m
                            - 30 sq. m</label>
                    </div>
                </li>


                <li>
                    <div class="flex items-center mb-2">
                        <input id="size_4" name="size_4" type="checkbox" value="1"
                            class="form_inp w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 "
                            onChange="this.form.submit()">
                        <label for="size_4" class="ml-2 text-sm font-medium text-gray-900 "> 30 sq. m
                            - 40 sq. m</label>
                    </div>
                </li>

                <li>
                    <div class="flex items-center mb-2">
                        <input id="size_5" name="size_5" type="checkbox" value="1"
                            class="form_inp w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 "
                            onChange="this.form.submit()">
                        <label for="size_5" class="ml-2 text-sm font-medium text-gray-900 "> 50+ sq. m</label>
                    </div>
                </li>

                <div class="border-b border-gray-200 py-2"></div>

                {{-- Category Filter --}}
                <div class="justify-between flex">
                    <h3 class="pt-4 pb-4">Category</h3>

                    {{-- <div class="mt-3 text-gray-500 hover:text-gray-900">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            stroke-width="1.5" stroke="currentColor" class="w-6 h-6 x_cat">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M9.75 9.75l4.5 4.5m0-4.5l-4.5 4.5M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div> --}}
                </div>

                @forelse ($categories as $category)
                    <li>
                        <div class="flex items-center mb-2">
                            <input name="search_cat" type="radio" value="{{ $category->category_name }}"
                                class="search_cat_class w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 "
                                onChange="this.form.submit()">
                            <label
                                class="ml-2 text-sm font-medium text-gray-900 ">{{ $category->category_name }}</label>
                        </div>
                    </li>
                @empty
                    <li>
                        No category available.
                    </li>
                @endforelse


                <div class="border-b border-gray-200 py-2"></div>


                {{-- Property Filter --}}
                <h3 class="pt-4 pb-4">Property Type</h3>

                <li>
                    <div class="flex items-center mb-2">
                        <input id="property_type_1" type="radio" value="House" name="property_type"
                            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 "
                            onChange="this.form.submit()">
                        <label for="property_type_1" class="ml-2 text-sm font-medium text-gray-900 ">House
                        </label>
                    </div>

                </li>
                <li>
                    <div class="flex items-center mb-2">
                        <input id="property_type_2" type="radio" value="Guest House" name="property_type"
                            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 "
                            onChange="this.form.submit()">
                        <label for="property_type_2" class="ml-2 text-sm font-medium text-gray-900 ">Guest House
                        </label>
                    </div>
                </li>

                <li>
                    <div class="flex items-center mb-2">
                        <input id="property_type_2" type="radio" value="Apartment" name="property_type"
                            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 "
                            onChange="this.form.submit()">
                        <label for="property_type_2" class="ml-2 text-sm font-medium text-gray-900 ">Apartment
                        </label>
                    </div>
                </li>

                <li>
                    <div class="flex items-center mb-2">
                        <input id="property_type_2" type="radio" value="Hotel" name="property_type"
                            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 "
                            onChange="this.form.submit()">
                        <label for="property_type_2" class="ml-2 text-sm font-medium text-gray-900 ">Hotel
                        </label>
                    </div>
                </li>

                <div class="border-b border-gray-200 py-2"></div>

                {{-- Property Size --}}
                <h3 class="pt-4 pb-4">No. of Bedrooms</h3>
                <li>
                    <div class="flex items-center mb-2">
                        <input id="bedroom_1" name="bedroom_1" type="checkbox" value="1"
                            class="form_inp w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 "
                            onChange="this.form.submit()">
                        <label for="bedroom_1" class="ml-2 text-sm font-medium text-gray-900 ">0
                            - 2</label>
                    </div>
                </li>

                <li>
                    <div class="flex items-center mb-2">
                        <input id="bedroom_2" name="bedroom_2" type="checkbox" value="1"
                            class="form_inp w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 "
                            onChange="this.form.submit()">
                        <label for="bedroom_2" class="ml-2 text-sm font-medium text-gray-900 "> 2
                            - 4</label>
                    </div>
                </li>


                <li>
                    <div class="flex items-center mb-2">
                        <input id="bedroom_3" name="bedroom_3" type="checkbox" value="1"
                            class="form_inp w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 "
                            onChange="this.form.submit()">
                        <label for="bedroom_3" class="ml-2 text-sm font-medium text-gray-900 "> 4
                            - 6</label>
                    </div>
                </li>

                <li>
                    <div class="flex items-center mb-2">
                        <input id="bedroom_4" name="bedroom_4" type="checkbox" value="1"
                            class="form_inp w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 "
                            onChange="this.form.submit()">
                        <label for="bedroom_4" class="ml-2 text-sm font-medium text-gray-900 "> 7+</label>
                    </div>
                </li>

            </form>
        </x-slot>

        <x-slot name="productGrid">
            <div class="mx-auto flex flex-wrap flex-row gap-7">

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
                                <small class="text-blue-400 text-xs">{{ $listing->category->category_name }}</small>
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
        </x-slot>
    </x-catalog.catalog-layout>


    @push('scripts')
        <script src="https://unpkg.com/flowbite@1.4.7/dist/flowbite.js"></script>
        <script src="https://unpkg.com/flowbite@1.4.7/dist/datepicker.js"></script>

        <script>
            // $(document).ready(function() {
            //     $(".x_cat").click(function() {
            //         // alert('sad');
            //         "{{ request()->property_type }} ="
            //         $("#filter-form").submit();

            //     });
            // });


            window.document.onload = $(document).ready(function() {

                // budget
                if ('{{ request()->budget_1 }}' != '') {
                    $('input[name="budget_1"]').prop("checked", true);
                }

                if ('{{ request()->budget_2 }}' != '') {
                    $('input[name="budget_2"]').prop("checked", true);
                }

                if ('{{ request()->budget_3 }}' != '') {
                    $('input[name="budget_3"]').prop("checked", true);
                }

                if ('{{ request()->budget_4 }}' != '') {
                    $('input[name="budget_4"]').prop("checked", true);
                }

                // property type

                if ('{{ request()->property_type }}' != '') {
                    $('input[name="property_type"][value="{{ request()->property_type }}"]')
                        .prop("checked", true);
                }

                // category type

                if ('{{ request()->search_cat }}' != '') {
                    $('input[name="search_cat"][value="{{ request()->search_cat }}"]')
                        .prop("checked", true);
                }


                // property_size
                if ('{{ request()->size_1 }}' != '') {
                    $('input[name="size_1"]').prop("checked", true);
                }

                if ('{{ request()->size_2 }}' != '') {
                    $('input[name="size_2"]').prop("checked", true);
                }

                if ('{{ request()->size_3 }}' != '') {
                    $('input[name="size_3"]').prop("checked", true);
                }

                if ('{{ request()->size_4 }}' != '') {
                    $('input[name="size_4"]').prop("checked", true);
                }

                if ('{{ request()->size_5 }}' != '') {
                    $('input[name="size_5"]').prop("checked", true);
                }

                // bedroom
                if ('{{ request()->bedroom_1 }}' != '') {
                    $('input[name="bedroom_1"]').prop("checked", true);
                }

                if ('{{ request()->bedroom_2 }}' != '') {
                    $('input[name="bedroom_2"]').prop("checked", true);
                }

                if ('{{ request()->bedroom_3 }}' != '') {
                    $('input[name="bedroom_3"]').prop("checked", true);
                }

                if ('{{ request()->bedroom_4 }}' != '') {
                    $('input[name="bedroom_4"]').prop("checked", true);
                }


            });


            // $("input.form_inp").click(function() {

            //     if ($('input.form_inp').prop('checked')) {}

            //     $("#filter-form").submit();

            // });
        </script>
    @endpush
</x-global-layout>
