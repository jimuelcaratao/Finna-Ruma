<x-global-layout>

    @push('styles')
        <!-- Bootstrap CSS -->
        {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"> --}}
    @endpush


    <x-catalog.catalog-layout>
        <x-slot name="head">
            <div class="inline-flex">
                <h1 class="text-3xl font-extrabold tracking-tight text-gray-900">
                    Properties
                </h1>

                {{-- @if (Auth::check() == true)
                    <button type="button" data-bs-toggle="modal" data-bs-target="#user-prefer-modal"
                        style="margin-top:-7px;">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-6 h-6 ml-4">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M12 3c2.755 0 5.455.232 8.083.678.533.09.917.556.917 1.096v1.044a2.25 2.25 0 01-.659 1.591l-5.432 5.432a2.25 2.25 0 00-.659 1.591v2.927a2.25 2.25 0 01-1.244 2.013L9.75 21v-6.568a2.25 2.25 0 00-.659-1.591L3.659 7.409A2.25 2.25 0 013 5.818V4.774c0-.54.384-1.006.917-1.096A48.32 48.32 0 0112 3z" />
                        </svg>
                    </button>
                @endif --}}


            </div>
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
                            placeholder="Place/Property Name">
                    </div>
                </li>

                <li>
                    <div date-rangepicker="" class=" items-center">
                        <div class="relative mb-2">
                            <div class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none ">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mt-4" fill="none"
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
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mt-4" fill="none"
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
                    <label for="guests" class="block mt-2 mb-2 text-xs font-semibold text-gray-900 ">OCCUPANTS</label>
                    <select id="guests" name="guests"
                        class=" border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 ">
                        @if (!empty(request()->guests))
                            <option value="{{ request()->guests }}" selected>{{ request()->guests }} guests</option>
                        @else
                            <option value="" selected>Open</option>
                        @endif
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>

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
                    !empty(request()->search_house) ||
                    !empty(request()->target_type) ||
                    !empty(request()->property_type))
                    <a href="{{ route('rentals') }}"><button type="button"
                            class="text-gray-900 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-200 font-medium rounded-lg text-sm w-full py-2.5 mr-2 mt-4 ">
                            Clear
                        </button>
                    </a>
                @endif


                <div class="border-b border-gray-200 py-4"></div>

                {{-- Budget Filter --}}
                <h3 class="pt-4 pb-4">Price</h3>
                <li>
                    <div class="flex items-center mb-2">
                        <input id="budget_1" name="budget_1" type="checkbox" value="1"
                            class="form_inp w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 "
                            onChange="this.form.submit()">
                        <label for="budget_1" class="ml-2 text-sm font-medium text-gray-900 ">₱ 0
                            - ₱ 35</label>
                    </div>
                </li>

                <li>
                    <div class="flex items-center mb-2">
                        <input id="budget_2" name="budget_2" type="checkbox" value="1"
                            class="form_inp w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 "
                            onChange="this.form.submit()">
                        <label for="budget_2" class="ml-2 text-sm font-medium text-gray-900 ">₱ 36
                            - ₱ 70</label>
                    </div>
                </li>

                <li>
                    <div class="flex items-center mb-2">
                        <input id="budget_3" name="budget_3" type="checkbox" value="1"
                            class="form_inp w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 "
                            onChange="this.form.submit()">
                        <label for="budget_3" class="ml-2 text-sm font-medium text-gray-900 ">₱ 71
                            - ₱ 105</label>
                    </div>
                </li>

                <li>
                    <div class="flex items-center mb-2">
                        <input id="budget_4" name="budget_4" type="checkbox" value="1"
                            class="form_inp w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 "
                            onChange="this.form.submit()">
                        <label for="budget_4" class="ml-2 text-sm font-medium text-gray-900 ">₱ 106
                            - ₱ 140</label>
                    </div>
                </li>

                <li>
                    <div class="flex items-center mb-2">
                        <input id="budget_5" name="budget_5" type="checkbox" value="1"
                            class="form_inp w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 "
                            onChange="this.form.submit()">
                        <label for="budget_5" class="ml-2 text-sm font-medium text-gray-900 ">₱ 141+</label>
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
                            - 19 sq. m</label>
                    </div>
                </li>

                <li>
                    <div class="flex items-center mb-2">
                        <input id="size_2" name="size_2" type="checkbox" value="1"
                            class="form_inp w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 "
                            onChange="this.form.submit()">
                        <label for="size_2" class="ml-2 text-sm font-medium text-gray-900 "> 20 sq. m
                            - 29 sq. m</label>
                    </div>
                </li>

                <li>
                    <div class="flex items-center mb-2">
                        <input id="size_3" name="size_3" type="checkbox" value="1"
                            class="form_inp w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 "
                            onChange="this.form.submit()">
                        <label for="size_3" class="ml-2 text-sm font-medium text-gray-900 "> 30 sq. m
                            - 39 sq. m</label>
                    </div>
                </li>


                <li>
                    <div class="flex items-center mb-2">
                        <input id="size_4" name="size_4" type="checkbox" value="1"
                            class="form_inp w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 "
                            onChange="this.form.submit()">
                        <label for="size_4" class="ml-2 text-sm font-medium text-gray-900 "> 40 sq. m
                            - 49 sq. m</label>
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


                {{-- Facility score --}}
                <h3 class="pt-4 pb-4">Facility score</h3>
                <li>
                    <div class="flex items-center mb-2">
                        <input id="facility_1" name="facility_1" type="checkbox" value="1"
                            class="form_inp w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 "
                            onChange="this.form.submit()">
                        <label for="facility_1" class="ml-2 text-sm font-medium text-gray-900 ">
                            <div class="flex items-center ">
                                <svg aria-hidden="true" class="w-5 h-5 text-yellow-400" fill="currentColor"
                                    viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <title>First star</title>
                                    <path
                                        d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                                    </path>
                                </svg>
                                <svg aria-hidden="true" class="w-5 h-5 text-gray-300 dark:text-gray-500"
                                    fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <title>Fifth star</title>
                                    <path
                                        d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                                    </path>
                                </svg>
                                <svg aria-hidden="true" class="w-5 h-5 text-gray-300 dark:text-gray-500"
                                    fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <title>Fifth star</title>
                                    <path
                                        d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                                    </path>
                                </svg>
                                <svg aria-hidden="true" class="w-5 h-5 text-gray-300 dark:text-gray-500"
                                    fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <title>Fifth star</title>
                                    <path
                                        d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                                    </path>
                                </svg>
                                <svg aria-hidden="true" class="w-5 h-5 text-gray-300 dark:text-gray-500"
                                    fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <title>Fifth star</title>
                                    <path
                                        d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                                    </path>
                                </svg>
                                <p class="ml-2 text-sm font-medium text-gray-500 dark:text-gray-400">1 out of 5</p>
                            </div>
                        </label>
                    </div>
                </li>

                <li>
                    <div class="flex items-center mb-2">
                        <input id="facility_2" name="facility_2" type="checkbox" value="1"
                            class="form_inp w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 "
                            onChange="this.form.submit()">
                        <label for="facility_2" class="ml-2 text-sm font-medium text-gray-900 ">
                            <div class="flex items-center ">
                                <svg aria-hidden="true" class="w-5 h-5 text-yellow-400" fill="currentColor"
                                    viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <title>First star</title>
                                    <path
                                        d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                                    </path>
                                </svg>
                                <svg aria-hidden="true" class="w-5 h-5 text-yellow-400" fill="currentColor"
                                    viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <title>Second star</title>
                                    <path
                                        d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                                    </path>
                                </svg>
                                <svg aria-hidden="true" class="w-5 h-5 text-gray-300 dark:text-gray-500"
                                    fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <title>Fifth star</title>
                                    <path
                                        d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                                    </path>
                                </svg> <svg aria-hidden="true" class="w-5 h-5 text-gray-300 dark:text-gray-500"
                                    fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <title>Fifth star</title>
                                    <path
                                        d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                                    </path>
                                </svg> <svg aria-hidden="true" class="w-5 h-5 text-gray-300 dark:text-gray-500"
                                    fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <title>Fifth star</title>
                                    <path
                                        d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                                    </path>
                                </svg>
                                <p class="ml-2 text-sm font-medium text-gray-500 dark:text-gray-400">2 out of 5</p>
                            </div>
                        </label>
                    </div>
                </li>

                <li>
                    <div class="flex items-center mb-2">
                        <input id="facility_3" name="facility_3" type="checkbox" value="1"
                            class="form_inp w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 "
                            onChange="this.form.submit()">
                        <label for="facility_3" class="ml-2 text-sm font-medium text-gray-900 ">
                            <div class="flex items-center ">
                                <svg aria-hidden="true" class="w-5 h-5 text-yellow-400" fill="currentColor"
                                    viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <title>First star</title>
                                    <path
                                        d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                                    </path>
                                </svg>
                                <svg aria-hidden="true" class="w-5 h-5 text-yellow-400" fill="currentColor"
                                    viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <title>Second star</title>
                                    <path
                                        d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                                    </path>
                                </svg>
                                <svg aria-hidden="true" class="w-5 h-5 text-yellow-400" fill="currentColor"
                                    viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <title>Third star</title>
                                    <path
                                        d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                                    </path>
                                </svg>
                                <svg aria-hidden="true" class="w-5 h-5 text-gray-300 dark:text-gray-500"
                                    fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <title>Fifth star</title>
                                    <path
                                        d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                                    </path>
                                </svg> <svg aria-hidden="true" class="w-5 h-5 text-gray-300 dark:text-gray-500"
                                    fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <title>Fifth star</title>
                                    <path
                                        d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                                    </path>
                                </svg>
                                <p class="ml-2 text-sm font-medium text-gray-500 dark:text-gray-400">3 out of 5</p>
                            </div>
                        </label>
                    </div>
                </li>


                <li>
                    <div class="flex items-center mb-2">
                        <input id="facility_4" name="facility_4" type="checkbox" value="1"
                            class="form_inp w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 "
                            onChange="this.form.submit()">
                        <label for="facility_4" class="ml-2 text-sm font-medium text-gray-900 ">
                            <div class="flex items-center ">
                                <svg aria-hidden="true" class="w-5 h-5 text-yellow-400" fill="currentColor"
                                    viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <title>First star</title>
                                    <path
                                        d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                                    </path>
                                </svg>
                                <svg aria-hidden="true" class="w-5 h-5 text-yellow-400" fill="currentColor"
                                    viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <title>Second star</title>
                                    <path
                                        d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                                    </path>
                                </svg>
                                <svg aria-hidden="true" class="w-5 h-5 text-yellow-400" fill="currentColor"
                                    viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <title>Third star</title>
                                    <path
                                        d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                                    </path>
                                </svg>
                                <svg aria-hidden="true" class="w-5 h-5 text-yellow-400" fill="currentColor"
                                    viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <title>Fourth star</title>
                                    <path
                                        d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                                    </path>
                                </svg>
                                <svg aria-hidden="true" class="w-5 h-5 text-gray-300 dark:text-gray-500"
                                    fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <title>Fifth star</title>
                                    <path
                                        d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                                    </path>
                                </svg>
                                <p class="ml-2 text-sm font-medium text-gray-500 dark:text-gray-400">4 out of 5</p>
                            </div>
                        </label>
                    </div>
                </li>

                <li>
                    <div class="flex items-center ">
                        <input id="facility_5" name="facility_5" type="checkbox" value="1"
                            class="form_inp w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 "
                            onChange="this.form.submit()">
                        <label for="facility_5" class="ml-2 text-sm font-medium text-gray-900 ">
                            <div class="flex items-center ">
                                <svg aria-hidden="true" class="w-5 h-5 text-yellow-400" fill="currentColor"
                                    viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <title>First star</title>
                                    <path
                                        d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                                    </path>
                                </svg>
                                <svg aria-hidden="true" class="w-5 h-5 text-yellow-400" fill="currentColor"
                                    viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <title>Second star</title>
                                    <path
                                        d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                                    </path>
                                </svg>
                                <svg aria-hidden="true" class="w-5 h-5 text-yellow-400" fill="currentColor"
                                    viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <title>Third star</title>
                                    <path
                                        d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                                    </path>
                                </svg>
                                <svg aria-hidden="true" class="w-5 h-5 text-yellow-400" fill="currentColor"
                                    viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <title>Fourth star</title>
                                    <path
                                        d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                                    </path>
                                </svg>
                                <svg aria-hidden="true" class="w-5 h-5 text-yellow-400" fill="currentColor"
                                    viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <title>Fourth star</title>
                                    <path
                                        d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                                    </path>
                                </svg>
                                <p class="ml-2 text-sm font-medium text-gray-500 dark:text-gray-400">5 out of 5</p>
                            </div>
                        </label>
                    </div>
                </li>

                <div class="border-b border-gray-200 py-2"></div>

                {{-- Location target --}}
                <h3 class="pt-4 pb-4">Location Target</h3>

                <li>
                    <div class="flex items-center mb-2">
                        <input id="target_type_1" type="radio" value="" name="target_type"
                            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 "
                            onChange="this.form.submit()">
                        <label for="target_type_1" class="ml-2 text-sm font-medium text-gray-900 ">All
                        </label>
                    </div>
                </li>

                <li>
                    <div class="flex items-center mb-2">
                        <input id="target_type_2" type="radio" value="1" name="target_type"
                            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 "
                            onChange="this.form.submit()">
                        <label for="target_type_2" class="ml-2 text-sm font-medium text-gray-900 ">Close to school
                        </label>
                    </div>
                </li>


                <div class="border-b border-gray-200 py-2"></div>

                {{-- Property Filter --}}
                {{-- <h3 class="pt-4 pb-4">Property Type</h3>

                <li>
                    <div class="flex items-center mb-2">
                        <input id="property_type_1" type="radio" value="Boarding House" name="property_type"
                            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 "
                            onChange="this.form.submit()">
                        <label for="property_type_1" class="ml-2 text-sm font-medium text-gray-900 ">Boarding House
                        </label>
                    </div>
                </li>

                <li>
                    <div class="flex items-center mb-2">
                        <input id="property_type_2" type="radio" value="Dormitory" name="property_type"
                            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 "
                            onChange="this.form.submit()">
                        <label for="property_type_2" class="ml-2 text-sm font-medium text-gray-900 ">Dormitory
                        </label>
                    </div>
                </li> --}}

                {{-- Category Filter --}}
                <h3 class="pt-4 pb-4">Category</h3>
                @forelse ($categories as $category)
                    <li>
                        <label class="inline-flex items-center">
                            <input type="radio"
                                class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500  brand-radio"
                                name="search_cat" value="{{ $category->category_name }}"
                                onChange="this.form.submit()">
                            <span class="ml-2">{{ $category->category_name }}</span>
                        </label>
                    </li>
                @empty
                    <li>
                        No category available.
                    </li>
                @endforelse

                <div class="border-b border-gray-200 py-2"></div>

                {{-- Category Filter --}}
                <h3 class="pt-4 pb-4">Boarding House</h3>
                @forelse ($houses as $house)
                    <li>
                        <label class="inline-flex items-center">
                            <input type="radio"
                                class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500  brand-radio"
                                name="search_house" value="{{ $house->title }}" onChange="this.form.submit()">
                            <span class="ml-2">{{ $house->title }}</span>
                        </label>
                    </li>
                @empty
                    <li>
                        No Boarding House available.
                    </li>
                @endforelse

                <div class="border-b border-gray-200 py-2"></div>

                {{-- Property Size --}}
                <h3 class="pt-4 pb-4">No. of Beds</h3>
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
                        <label for="bedroom_2" class="ml-2 text-sm font-medium text-gray-900 "> 3
                            - 4</label>
                    </div>
                </li>

                <li>
                    <div class="flex items-center mb-2">
                        <input id="bedroom_3" name="bedroom_3" type="checkbox" value="1"
                            class="form_inp w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 "
                            onChange="this.form.submit()">
                        <label for="bedroom_3" class="ml-2 text-sm font-medium text-gray-900 "> 5
                            - 6</label>
                    </div>
                </li>

            </form>
        </x-slot>

        <x-slot name="productGrid">
            <div class="mx-auto flex flex-wrap flex-row gap-7">

                <!-- card -->
                @forelse ($listings as $listing)
                    @php
                        $list_ave_reviews = App\Models\ListingReview::where('listing_id', $listing->listing_id)->avg('stars');
                        $list_count_reviews = App\Models\ListingReview::where('listing_id', $listing->listing_id)->count();
                    @endphp

                    <a href="{{ route('single-list', [$listing->slug]) }}" class="no-underline text-decoration-none">
                        <div
                            class=" flex w-96 flex-col justify-center bg-white rounded-2xl shadow-md transition duration-500 ease-in-out transform hover:translate-y-1">
                            <!-- img -->
                            <img class="aspect-video w-full rounded-t-2xl object-cover object-center"
                                src="{{ asset('storage/media/listing/cover_' . $listing->listing_id . '_' . $listing->default_photo) }}" />
                            <!-- text information -->
                            <div class="p-4">

                                <small class="text-blue-400 text-xs">{{ $listing->house->title }} /</small>

                                <small class="text-blue-400 text-xs">{{ $listing->category->category_name }}</small>

                                <h1 class="text-xl font-medium text-slate-600 pb-2">
                                    {{ $listing->listing_title }}</h1>

                                <p class="text-sm tracking-tight font-light text-slate-400 leading-6">
                                    {{ $listing->location }}
                                </p>

                                {{-- <span
                                    class="mb-2 bg-purple-100 text-purple-800 text-xs font-medium inline-flex items-center px-2.5 py-0.5 rounded ">
                                    {{ $listing->facility_score }} facility score
                                </span> --}}
                                @if (round($list_ave_reviews, 0) != 0)
                                    <span
                                        class="mb-2 bg-purple-100 text-purple-800 text-xs font-medium inline-flex items-center px-2.5 py-0.5 rounded ">
                                        {{ round($list_ave_reviews, 0) }} Star
                                    </span>
                                @endif

                                <span
                                    class="mb-2 bg-blue-100 text-blue-800 text-xs font-medium inline-flex items-center px-2.5 py-0.5 rounded ">
                                    {{ $listing->property_size }} sq m
                                </span>

                                @if ($listing->location_score == 1)
                                    <span
                                        class="mb-2 bg-green-100 text-green-800 text-xs font-medium inline-flex items-center px-2.5 py-0.5 rounded ">
                                        Close to school
                                    </span>
                                @endif

                                @if ($listing->availability == 'Unavailable')
                                    <span
                                        class="mb-2 bg-red-100 text-red-800 text-xs font-medium inline-flex items-center px-2.5 py-0.5 rounded ">
                                        Unavailable
                                    </span>
                                @endif

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


    <!-- Modal -->
    {{-- <div class="modal fade" id="user-prefer-modal" data-bs-backdrop="static" data-bs-keyboard="false"
        tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('user_pref.store') }}" method="POST">
                        @csrf

                        <fieldset class="form__options hide-print">
                            <h2 class="text-3xl font-bold  text-gray-600 mb-4">RECOMMENDATIONS</h2>
                        
                            <div class="col-span-6 sm:col-span-4 mt-2">
                                <label for="cost_score" class="block text-sm font-medium text-gray-700">Property price
                                    Type (per night)</label>
                                <select id="cost_score" name="cost_score" required
                                    class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md  focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">

                                    @if ($user_pref != null)
                                        <option class="bg-gray-50" selected value=" {{ $user_pref->cost_score }}">
                                            @if ($user_pref->cost_score == 0)
                                                None
                                            @elseif($user_pref->cost_score == 1)
                                                ₱15,000+
                                            @elseif($user_pref->cost_score == 2)
                                                ₱13,000 to ₱14,999
                                            @elseif($user_pref->cost_score == 3)
                                                ₱10,000 to ₱12,999
                                            @elseif($user_pref->cost_score == 4)
                                                ₱7,000 to ₱9,999
                                            @elseif($user_pref->cost_score == 5)
                                                ₱4,999 to ₱6,999
                                            @elseif($user_pref->cost_score == 6)
                                                less than ₱3,999
                                            @else
                                                All
                                            @endif
                                        </option>
                                    @endif
                                    <option>All</option>
                                    <option value="1">₱15,000+</option>
                                    <option value="2">₱13,000 - ₱14,999</option>
                                    <option value="3">₱10,000 - ₱12,999</option>
                                    <option value="4">₱7,000 - ₱9,999</option>
                                    <option value="5">₱4,999 - ₱6,999</option>
                                    <option value="6">less than ₱3,999</option>

                                </select>
                            </div>

                            <div class="col-span-6 sm:col-span-4 mt-2">
                                <label for="room_size_score" class="block text-sm font-medium text-gray-700">Room size
                                    Type </label>
                                <select id="room_size_score" name="room_size_score" required
                                    class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md  focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                    @if ($user_pref != null)
                                        <option class="bg-gray-50" selected
                                            value=" {{ $user_pref->room_size_score }}">
                                            @if ($user_pref->room_size_score == 0)
                                                None
                                            @elseif($user_pref->room_size_score == 1)
                                                50+ sq. m
                                            @elseif($user_pref->room_size_score == 2)
                                                30 sq m to 49 sq m
                                            @elseif($user_pref->room_size_score == 3)
                                                20 sq m to 29
                                                sq m
                                            @elseif($user_pref->room_size_score == 4)
                                                10 sq m to 19 sq m
                                            @elseif($user_pref->room_size_score == 5)
                                                less than 9 sq m
                                            @else
                                                All
                                            @endif
                                        </option>
                                    @endif

                                    <option>All</option>
                                    <option value="1">50+ sq. m</option>
                                    <option value="2">30 sq. m - 49 sq m</option>
                                    <option value="3">20 sq m - 29 sq m</option>
                                    <option value="4">10 sq m - 19 sq m</option>
                                    <option value="5">less than 9 sq m</option>

                                </select>
                            </div>

                            <div class="col-span-6 sm:col-span-4 mt-2">
                                <label for="location_score" class="block text-sm font-medium text-gray-700">Target
                                    Location</label>
                                <select id="location_score" name="location_score" required
                                    class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md  focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                    @if ($user_pref != null)
                                        <option class="bg-gray-50" selected
                                            value=" {{ $user_pref->location_score }}">
                                            @if ($user_pref->location_score == 0)
                                                None
                                            @elseif($user_pref->location_score == 1)
                                                Close to school
                                            @else
                                                All
                                            @endif
                                        </option>
                                    @endif
                                    <option>All</option>
                                    <option value="1">Close to school</option>
                                </select>
                            </div>

                            <div class="col-span-6 sm:col-span-4 mt-2">
                                <label for="facility_score" class="block text-sm font-medium text-gray-700">Facility
                                    score</label>
                                <select id="facility_score" name="facility_score" required
                                    class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md  focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">

                                    @if ($user_pref != null)
                                        <option class="bg-gray-50" selected
                                            value=" {{ $user_pref->facility_score }}">
                                            @if ($user_pref->facility_score == 0)
                                                None
                                            @elseif($user_pref->facility_score == 1)
                                                1 facilty score (highest)
                                            @elseif($user_pref->facility_score == 2)
                                                2 facilty score
                                            @elseif($user_pref->facility_score == 3)
                                                3 facilty score
                                            @elseif($user_pref->facility_score == 4)
                                                4 facilty score
                                            @elseif($user_pref->facility_score == 5)
                                                5 facilty score
                                            @else
                                                All
                                            @endif
                                        </option>
                                    @endif
                                    <option>All</option>
                                    <option value="1">1 facilty score (highest)</option>
                                    <option value="2">2 facilty score</option>
                                    <option value="3">3 facilty score</option>
                                    <option value="4">4 facilty score</option>
                                    <option value="5">5 facilty score</option>
                                </select>
                            </div>


                        </fieldset>

                        <button class="form__button float-right btn btn-primary mt-5" type="submit">Submit your
                            info</button>
                    </form>
                </div>

            </div>
        </div>
    </div> --}}


    @push('scripts')
        <script src="https://unpkg.com/flowbite@1.4.7/dist/flowbite.js"></script>
        <script src="https://unpkg.com/flowbite@1.4.7/dist/datepicker.js"></script>
        <!-- Option 1: Bootstrap Bundle with Popper -->
        {{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
        </script> --}}

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

                if ('{{ request()->budget_5 }}' != '') {
                    $('input[name="budget_5"]').prop("checked", true);
                }

                // facility score
                if ('{{ request()->facility_1 }}' != '') {
                    $('input[name="facility_1"]').prop("checked", true);
                }

                if ('{{ request()->facility_2 }}' != '') {
                    $('input[name="facility_2"]').prop("checked", true);
                }

                if ('{{ request()->facility_3 }}' != '') {
                    $('input[name="facility_3"]').prop("checked", true);
                }

                if ('{{ request()->facility_4 }}' != '') {
                    $('input[name="facility_4"]').prop("checked", true);
                }

                if ('{{ request()->facility_5 }}' != '') {
                    $('input[name="facility_5"]').prop("checked", true);
                }

                // property type

                if ('{{ request()->property_type }}' != '') {
                    $('input[name="property_type"][value="{{ request()->property_type }}"]')
                        .prop("checked", true);
                }

                // target location

                if ('{{ request()->target_type }}' != '') {
                    $('input[name="target_type"][value="{{ request()->target_type }}"]')
                        .prop("checked", true);
                }

                // category type

                if ('{{ request()->search_cat }}' != '') {
                    $('input[name="search_cat"][value="{{ request()->search_cat }}"]')
                        .prop("checked", true);
                }


                // house type

                if ('{{ request()->search_house }}' != '') {
                    $('input[name="search_house"][value="{{ request()->search_house }}"]')
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


        <script>
            window.onload = function() {
                // console.log('qweqweqw');
                $.ajax({
                    type: "GET",
                    url: `/fetch_user`,
                    success: function(response) {

                        console.log(response.user_prefs);
                        var user_pref = response.user_prefs;

                        if (!user_pref) {
                            $('#user-prefer-modal').modal('show');

                            let htmls = "";
                            x = null;
                            num = 0;
                            $("#check_box_form").html(null);

                            response.categories.map(x => {
                                num += 1;

                                var category_name = x.category_name;
                                // console.log(photo_id);
                                $("#check_box_form").append(
                                    `<p class="form__answer">` +
                                    `<input class="form_input" type="radio" name="category_name" id="mood_${num}"` +
                                    `value="${category_name}">` +
                                    `<label class="form_recom" for="mood_${num}">` +
                                    `${category_name}` +
                                    `</label>` +
                                    `</p>`
                                );
                            });
                        }

                    },
                    error: function() {
                        // console.log(textStatus, errorThrown);
                        console.log('salad');
                    }
                });
            }
        </script>
    @endpush
</x-global-layout>
