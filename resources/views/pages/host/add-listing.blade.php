<x-host-layout>

    {{-- search bar --}}
    {{-- <x-slot name="searchbar">
        <div class="search-wrapper ml-4">
            <input class="search-input" type="text" placeholder="Search">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="none" stroke="currentColor"
                stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="feather feather-search"
                viewBox="0 0 24 24">
                <defs></defs>
                <circle cx="11" cy="11" r="8"></circle>
                <path d="M21 21l-4.35-4.35"></path>
            </svg>
        </div>
    </x-slot> --}}


    {{-- Contents --}}
    <div class="projects-section">
        <div class="projects-section-header">
            <p>Add Listing</p>
            <a href="{{ route('host.listing') }}" class="bg-gray-800 text-white p-1 rounded-full"
                title="Add New Project">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd"
                        d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z"
                        clip-rule="evenodd" />
                </svg>
            </a>
        </div>
        {{-- <div class="projects-section-line">
            <div class="projects-status">
                <div class="item-status">
                    <span class="status-number">45</span>
                    <span class="status-type">Host</span>
                </div>
                <div class="item-status">
                    <span class="status-number">24</span>
                    <span class="status-type">Pending Host</span>
                </div>
                <div class="item-status">
                    <span class="status-number">62</span>
                    <span class="status-type">User</span>
                </div>
            </div>
            <div class="view-actions">
                <div class="search-wrapper mr-4">
                    <input class="search-input" type="text" placeholder="Search">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="none"
                        stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        class="feather feather-search" viewBox="0 0 24 24">
                        <defs></defs>
                        <circle cx="11" cy="11" r="8"></circle>
                        <path d="M21 21l-4.35-4.35"></path>
                    </svg>
                </div>
            </div>
        </div> --}}

        <div class="overflow-y-auto">
            <div class="relative shadow-sm pr-0 md:pr-3">
                <form action="{{ route('host.store.listing') }}" method="POST" id="add-form"
                    enctype="multipart/form-data">
                    @csrf
                    <div>
                        <div class="md:grid md:grid-cols-3 md:gap-6">
                            <div class="md:col-span-1">
                                <div class="px-4 sm:px-0">
                                    <h3 class="text-lg font-medium leading-6 text-gray-900">Basic Information</h3>
                                    <p class="mt-1 text-sm text-gray-600">Use a permanent address where you can receive
                                        mail.</p>
                                </div>
                            </div>
                            <div class="mt-5 md:mt-0 md:col-span-2">
                                <div class="shadow-sm overflow-hidden sm:rounded-md">
                                    <div class="px-4 py-5 bg-white sm:p-6">
                                        <div class="grid grid-cols-6 gap-6">

                                            <div class="col-span-6">
                                                <label for="street-address"
                                                    class="block text-sm font-medium text-gray-700">Listing
                                                    Title</label>
                                                <input type="text" name="street-address" id="street-address"
                                                    autocomplete="street-address"
                                                    class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                            </div>

                                            <div class="col-span-6">
                                                <label for="about" class="block text-sm font-medium text-gray-700">
                                                    Brief description
                                                </label>
                                                <div class="mt-1">
                                                    <textarea id="about" name="about" rows="5"
                                                        class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 mt-1 block w-full sm:text-sm border border-gray-300 rounded-md"
                                                        placeholder="you@example.com"></textarea>
                                                </div>
                                                <p class="mt-2 text-sm text-gray-500">Brief description for your
                                                    profile.
                                                    URLs are hyperlinked.</p>
                                            </div>

                                            <div class="col-span-6 sm:col-span-3">
                                                <label for="country"
                                                    class="block text-sm font-medium text-gray-700">Category</label>
                                                <select id="country" name="country" autocomplete="country-name"
                                                    class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                                    <option>United States</option>
                                                    <option>Canada</option>
                                                    <option>Mexico</option>
                                                </select>
                                            </div>



                                            <div class="col-span-6 sm:col-span-3">
                                                <label for="last-name"
                                                    class="block text-sm font-medium text-gray-700">Contact <span
                                                        class="text-red-600">*</span></label>
                                                <input type="text" name="last-name" id="last-name"
                                                    autocomplete="family-name"
                                                    class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                            </div>

                                            <div class="col-span-6 sm:col-span-4">
                                                <label for="email-address"
                                                    class="block text-sm font-medium text-gray-700">Host Full
                                                    name</label>
                                                <input type="text" name="email-address" id="email-address"
                                                    autocomplete="email"
                                                    class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                            </div>

                                            <div class="col-span-6 sm:col-span-4">
                                                <label for="email-address"
                                                    class="block text-sm font-medium text-gray-700">Host Email
                                                    address</label>
                                                <input type="text" name="email-address" id="email-address"
                                                    autocomplete="email"
                                                    class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                            </div>


                                            <div class="col-span-6">
                                                <label for="street-address"
                                                    class="block text-sm font-medium text-gray-700">Location
                                                    address</label>
                                                <input type="text" name="street-address" id="street-address"
                                                    autocomplete="street-address"
                                                    class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                            </div>

                                            <div class="col-span-6 sm:col-span-4">
                                                <label for="email-address"
                                                    class="flex text-sm font-medium text-gray-700">Google Map
                                                    Pin <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-2"
                                                        viewBox="0 0 20 20" fill="currentColor">
                                                        <path fill-rule="evenodd"
                                                            d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"
                                                            clip-rule="evenodd" />
                                                    </svg></label>
                                                <input type="text" name="email-address" id="email-address"
                                                    autocomplete="email"
                                                    class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                            </div>

                                            <div class="col-span-6 sm:col-span-6 lg:col-span-2">
                                                <label for="city"
                                                    class="block text-sm font-medium text-gray-700">City</label>
                                                <input type="text" name="city" id="city"
                                                    autocomplete="address-level2"
                                                    class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                            </div>




                                            <div class=" col-span-6 sm:col-span-4">
                                                <div>
                                                    <label for="price"
                                                        class="block text-sm font-medium text-gray-700">Price Per Night
                                                        <span class="text-red-600">*</span></label>
                                                    <div class="mt-1 relative rounded-md shadow-sm">
                                                        <div
                                                            class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                                            <span class="text-gray-500 sm:text-sm">
                                                                ₱
                                                            </span>
                                                        </div>
                                                        <input type="number" min="0" step="0.01"
                                                            name="price" id="price" required
                                                            class="focus:ring-indigo-500 focus:border-indigo-500 block w-full pl-7 sm:text-sm border-gray-300 rounded-md"
                                                            placeholder="0.00">

                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="hidden sm:block" aria-hidden="true">
                        <div class="py-5">
                            <div class="border-t border-gray-200"></div>
                        </div>
                    </div>

                    <div class="mt-10 sm:mt-0">
                        <div class="md:grid md:grid-cols-3 md:gap-6">
                            <div class="md:col-span-1">
                                <div class="px-4 sm:px-0">
                                    <h3 class="text-lg font-medium leading-6 text-gray-900">Property & Bedrooms</h3>
                                    <p class="mt-1 text-sm text-gray-600">Let your renters know how many beds and
                                        bathrooms are there.</p>
                                </div>
                            </div>
                            <div class="mt-5 md:mt-0 md:col-span-2">
                                <div class="shadow-sm overflow-hidden sm:rounded-md">
                                    <div class="px-4 py-5 bg-white sm:p-6">
                                        <div class="grid grid-cols-6 gap-6">


                                            <div class="col-span-6 sm:col-span-3">
                                                <label for="country"
                                                    class="block text-sm font-medium text-gray-700">Property
                                                    Type</label>
                                                <select id="country" name="country" autocomplete="country-name"
                                                    class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                                    <option>House</option>
                                                    <option>Guest House</option>
                                                    <option>Apartment</option>
                                                    <option>Hotel</option>
                                                </select>
                                            </div>

                                            <div class="col-span-6 sm:col-span-3">
                                            </div>

                                            <div class="col-span-6 sm:col-span-6 lg:col-span-2">
                                                <label for="city"
                                                    class="block text-sm font-medium text-gray-700">No. of
                                                    Bedrooms</label>
                                                <input type="text" name="city" id="city"
                                                    autocomplete="address-level2"
                                                    class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                            </div>

                                            <div class="col-span-6 sm:col-span-6 lg:col-span-2">
                                                <label for="city"
                                                    class="block text-sm font-medium text-gray-700">No. of
                                                    Bed</label>
                                                <input type="text" name="city" id="city"
                                                    autocomplete="address-level2"
                                                    class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                            </div>

                                            <div class="col-span-6 sm:col-span-4">
                                                <label for="email-address"
                                                    class="flex text-sm font-medium text-gray-700">Bed type <svg
                                                        xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-2"
                                                        viewBox="0 0 20 20" fill="currentColor">
                                                        <path fill-rule="evenodd"
                                                            d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"
                                                            clip-rule="evenodd" />
                                                    </svg></label>
                                                <input type="text" name="email-address" id="email-address"
                                                    autocomplete="email"
                                                    class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                            </div>


                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="hidden sm:block" aria-hidden="true">
                        <div class="py-5">
                            <div class="border-t border-gray-200"></div>
                        </div>
                    </div>

                    <div class="mt-10 sm:mt-0">
                        <div class="md:grid md:grid-cols-3 md:gap-6">
                            <div class="md:col-span-1">
                                <div class="px-4 sm:px-0">
                                    <h3 class="text-lg font-medium leading-6 text-gray-900">Media Management</h3>
                                    <p class="mt-1 text-sm text-gray-600">This information will be displayed publicly
                                        so
                                        be
                                        careful what you share.</p>
                                </div>
                            </div>
                            <div class="mt-5 md:mt-0 md:col-span-2">
                                <div class="shadow-sm sm:rounded-md sm:overflow-hidden">
                                    <div class="px-4 py-5 bg-white space-y-6 sm:p-6">

                                        <div>
                                            <label class="block text-sm font-medium text-gray-700">
                                                Cover photo
                                            </label>
                                            <div
                                                class="mt-1 flex justify-center px-6 py-2 border-2 border-gray-300 border-dashed rounded-md">
                                                <div class="space-y-1 text-center">

                                                    <img id="output_default_photo" class="cursor-pointer mb-4"
                                                        src="{{ asset('img/global/cover-img.svg') }}"
                                                        style="width:300px;height:300px;">

                                                    <div class="flex text-sm text-gray-600 ">
                                                        <label for="default_photo"
                                                            class="relative cursor-pointer bg-white rounded-md font-medium text-indigo-600 hover:text-indigo-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-indigo-500">
                                                            <span class="">Upload a
                                                                file</span>
                                                            <input id="default_photo" name="default_photo"
                                                                type="file" required class="sr-only"
                                                                accept=".jpg,.gif,.png,.jpeg">
                                                        </label>
                                                        {{-- <p class="pl-1">or drag and drop</p> --}}
                                                    </div>
                                                    <p class="text-xs text-gray-500">
                                                        PNG, JPG, GIF up to 5MB
                                                    </p>
                                                </div>
                                            </div>
                                        </div>

                                        <div>
                                            <label class="block text-sm font-medium text-gray-700">
                                                Cover photo
                                            </label>
                                            <div
                                                class="mt-1 flex justify-center px-6 py-2 border-2 border-gray-300 border-dashed rounded-md">
                                                <div class="space-y-1 text-center">

                                                    <img id="output_default_photo" class="cursor-pointer mb-4"
                                                        src="{{ asset('img/global/cover-img.svg') }}"
                                                        style="width:300px;height:300px;">

                                                    <div class="flex text-sm text-gray-600 ">
                                                        <label for="default_photo"
                                                            class="relative cursor-pointer bg-white rounded-md font-medium text-indigo-600 hover:text-indigo-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-indigo-500">
                                                            <span class="">Upload a
                                                                file</span>
                                                            <input id="default_photo" name="default_photo"
                                                                type="file" required class="sr-only"
                                                                accept=".jpg,.gif,.png,.jpeg">
                                                        </label>
                                                        {{-- <p class="pl-1">or drag and drop</p> --}}
                                                    </div>
                                                    <p class="text-xs text-gray-500">
                                                        PNG, JPG, GIF up to 5MB
                                                    </p>
                                                </div>
                                            </div>
                                        </div>

                                        <div>
                                            <label class="block text-sm font-medium text-gray-700">
                                                Cover photo
                                            </label>
                                            <div
                                                class="mt-1 flex justify-center px-6 py-2 border-2 border-gray-300 border-dashed rounded-md">
                                                <div class="space-y-1 text-center">

                                                    <img id="output_default_photo" class="cursor-pointer mb-4"
                                                        src="{{ asset('img/global/cover-img.svg') }}"
                                                        style="width:300px;height:300px;">

                                                    <div class="flex text-sm text-gray-600 ">
                                                        <label for="default_photo"
                                                            class="relative cursor-pointer bg-white rounded-md font-medium text-indigo-600 hover:text-indigo-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-indigo-500">
                                                            <span class="">Upload a
                                                                file</span>
                                                            <input id="default_photo" name="default_photo"
                                                                type="file" required class="sr-only"
                                                                accept=".jpg,.gif,.png,.jpeg">
                                                        </label>
                                                        {{-- <p class="pl-1">or drag and drop</p> --}}
                                                    </div>
                                                    <p class="text-xs text-gray-500">
                                                        PNG, JPG, GIF up to 5MB
                                                    </p>
                                                </div>
                                            </div>
                                        </div>

                                        <div>
                                            <label class="block text-sm font-medium text-gray-700">
                                                Cover photo
                                            </label>
                                            <div
                                                class="mt-1 flex justify-center px-6 py-2 border-2 border-gray-300 border-dashed rounded-md">
                                                <div class="space-y-1 text-center">

                                                    <img id="output_default_photo" class="cursor-pointer mb-4"
                                                        src="{{ asset('img/global/cover-img.svg') }}"
                                                        style="width:300px;height:300px;">

                                                    <div class="flex text-sm text-gray-600 ">
                                                        <label for="default_photo"
                                                            class="relative cursor-pointer bg-white rounded-md font-medium text-indigo-600 hover:text-indigo-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-indigo-500">
                                                            <span class="">Upload a
                                                                file</span>
                                                            <input id="default_photo" name="default_photo"
                                                                type="file" required class="sr-only"
                                                                accept=".jpg,.gif,.png,.jpeg">
                                                        </label>
                                                        {{-- <p class="pl-1">or drag and drop</p> --}}
                                                    </div>
                                                    <p class="text-xs text-gray-500">
                                                        PNG, JPG, GIF up to 5MB
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="hidden sm:block" aria-hidden="true">
                        <div class="py-5">
                            <div class="border-t border-gray-200"></div>
                        </div>
                    </div>

                    <div class="mt-10 sm:mt-0">
                        <div class="md:grid md:grid-cols-3 md:gap-6">
                            <div class="md:col-span-1">
                                <div class="px-4 sm:px-0">
                                    <h3 class="text-lg font-medium leading-6 text-gray-900">Others</h3>
                                    <p class="mt-1 text-sm text-gray-600">Decide which communications you'd like to
                                        receive
                                        and how.</p>
                                </div>
                            </div>
                            <div class="mt-5 md:mt-0 md:col-span-2">
                                <div class="shadow-sm overflow-hidden sm:rounded-md">
                                    <div class="px-4 py-5 bg-white space-y-6 sm:p-6">
                                        <fieldset>
                                            <legend class="sr-only">Amenities</legend>
                                            <div class="text-base font-medium text-gray-900" aria-hidden="true">
                                                Amenities</div>
                                            <div class="mt-4 space-y-4">

                                                @include('pages.host.amenities')

                                            </div>
                                        </fieldset>

                                        {{-- <fieldset>
                                            <legend class="contents text-base font-medium text-gray-900">Push
                                                Notifications</legend>
                                            <p class="text-sm text-gray-500">These are delivered via SMS to your mobile
                                                phone.</p>
                                            <div class="mt-4 space-y-4">
                                                <div class="flex items-center">
                                                    <input id="push-everything" name="push-notifications"
                                                        type="radio"
                                                        class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300">
                                                    <label for="push-everything"
                                                        class="ml-3 block text-sm font-medium text-gray-700">
                                                        Everything </label>
                                                </div>
                                                <div class="flex items-center">
                                                    <input id="push-email" name="push-notifications" type="radio"
                                                        class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300">
                                                    <label for="push-email"
                                                        class="ml-3 block text-sm font-medium text-gray-700"> Same as
                                                        email </label>
                                                </div>
                                                <div class="flex items-center">
                                                    <input id="push-nothing" name="push-notifications" type="radio"
                                                        class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300">
                                                    <label for="push-nothing"
                                                        class="ml-3 block text-sm font-medium text-gray-700"> No push
                                                        notifications </label>
                                                </div>
                                            </div>
                                        </fieldset> --}}

                                        <div class="col-span-6">
                                            <label for="about" class="block text-sm font-medium text-gray-700">
                                                Additional Notes
                                            </label>
                                            <div class="mt-1">
                                                <textarea id="about" name="about" rows="6"
                                                    class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 mt-1 block w-full sm:text-sm border border-gray-300 rounded-md"
                                                    placeholder="you@example.com"></textarea>
                                            </div>
                                            <p class="mt-2 text-sm text-gray-500">Brief description for your
                                                profile.
                                                URLs are hyperlinked.</p>
                                        </div>
                                    </div>
                                    <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
                                        <button type="submit"
                                            class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Save</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>

            </div>

        </div>
    </div>

    @push('scripts')
        <script>
            // edit_is_customizable
            $(document).ready(function() {
                $('#is_drink').show();
                $('#is_not_drink').hide();

                // add/remove required
                $("#status").prop('required', true);
                $("#stock").prop('required', false);
                $("#stock_measurement").prop('required', false);


                $('input[name="is_customizable"]').click(function() {
                    if ($(this).is(":checked")) {
                        $('#is_drink').show();
                        $('#is_not_drink').hide();

                        // add/remove required
                        $("#status").prop('required', true);
                        $("#stock").prop('required', false);
                        $("#stock_measurement").prop('required', false);
                    } else if ($(this).is(":not(:checked)")) {
                        $('#is_drink').hide();
                        $('#is_not_drink').show();

                        // add/remove required
                        $("#status").prop('required', false);
                        $("#stock").prop('required', true);
                        $("#stock_measurement").prop('required', true);
                    }
                });
            });


            $('#output_default_photo').click(function() {
                $('#default_photo').trigger('click');
            });

            // display shop form
            $('#category_name').change(function() {
                var id = $(this).find(':selected')[0].value;
                // alert(id); 
                $('.form-basic').show();

                $('#submit_product').removeAttr('disabled');
            });

            $(document).on("change", "#default_photo", function() {
                document.getElementById('output_default_photo').src = window.URL.createObjectURL(this.files[
                    0])
            });

            $(document).ready(function() {
                $(".closeModalClick").click(function() {
                    swal({
                            title: "Are you sure?",
                            text: "Once you Discard, theres no turning back!",
                            icon: "warning",
                            buttons: true,
                            dangerMode: true,
                        })
                        .then((willDelete) => {
                            if (willDelete) {
                                // OnClose
                                $('#add-modal').modal('hide');
                                $("#add-form").trigger("reset");

                                // form category display 
                                $('.form-basic').hide();

                                $('#submit_product').attr('disabled', 'disabled');
                            } else {
                                return false;
                            }
                        });
                });


            });
        </script>
    @endpush

</x-host-layout>
