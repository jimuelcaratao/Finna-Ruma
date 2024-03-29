<x-app-layout>



    {{-- Contents --}}
    <div class="projects-section">
        <div class="projects-section-header">
            <p>View: {{ $listing->listing_title }}</p>
            <a href="{{ route('admin.rentals') }}" class="bg-gray-800 text-white p-1 rounded-full" title="Add New Project">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd"
                        d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z"
                        clip-rule="evenodd" />
                </svg>
            </a>

        </div>

        <div class="overflow-y-auto">
            <div class="relative shadow-sm pr-0 md:pr-3">
                <form action="#" method="POST" id="add-form" enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                    <div>
                        <div class="md:grid md:grid-cols-3 md:gap-6">
                            <div class="md:col-span-1">
                                <div class="px-4 sm:px-0">
                                    <h3 class="text-lg font-medium leading-6 text-gray-900">Host Details</h3>
                                    <p class="mt-1 text-sm text-gray-600">You can change your details in settings.</p>
                                </div>
                            </div>
                            <div class="mt-5 md:mt-0 md:col-span-2">
                                <div class="shadow-sm overflow-hidden sm:rounded-md">
                                    <div class="px-4 py-5 bg-white sm:p-6">
                                        <div class="grid grid-cols-6 gap-6">

                                            <div class="col-span-6 sm:col-span-4">
                                                <label for="name"
                                                    class="block text-sm font-medium text-gray-700">Host Full
                                                    name <span class="text-red-600">*</span></label>
                                                <input type="text" name="name" id="name"
                                                    value="{{ $listing->user->name }}" readonly
                                                    class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                            </div>

                                            <div class="col-span-6 sm:col-span-4">
                                                <label for="email"
                                                    class="block text-sm font-medium text-gray-700">Host Email
                                                    address <span class="text-red-600">*</span></label>
                                                <input type="text" name="email" id="email" autocomplete="email"
                                                    value="{{ $listing->user->email }}" readonly
                                                    class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                            </div>

                                            <div class="col-span-6 sm:col-span-4">
                                                <label for="contact"
                                                    class="flex text-sm font-medium text-gray-700">Contact
                                                    <span class="text-red-600">*</span>
                                                    {{-- Tooltip --}}
                                                    <div id="tooltip-contact" role="tooltip"
                                                        class="inline-block absolute invisible z-10 py-2 px-3 text-sm font-medium text-white bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
                                                        Fill this first in your profile.
                                                        <div class="tooltip-arrow" data-popper-arrow></div>
                                                    </div>

                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-2"
                                                        data-tooltip-target="tooltip-contact"
                                                        data-tooltip-placement="right" viewBox="0 0 20 20"
                                                        fill="currentColor">
                                                        <path fill-rule="evenodd"
                                                            d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"
                                                            clip-rule="evenodd" />
                                                    </svg>
                                                </label>
                                                <input type="text" name="contact" id="contact"
                                                    value="{{ $listing->user->contact }}" readonly
                                                    class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                            </div>

                                            <div class="col-span-6 sm:col-span-4">
                                                <label for="messenger_url"
                                                    class="flex text-sm font-medium text-gray-700">Social media message
                                                    link

                                                    {{-- Tooltip --}}
                                                    <div id="tooltip-link" role="tooltip"
                                                        class="inline-block absolute invisible z-10 py-2 px-3 text-sm font-medium text-white bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
                                                        Social media link for messages ex.
                                                        (https://www.messenger.com/t/100002390070945)
                                                        <div class="tooltip-arrow" data-popper-arrow></div>
                                                    </div>

                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-2"
                                                        data-tooltip-target="tooltip-link"
                                                        data-tooltip-placement="right" viewBox="0 0 20 20"
                                                        fill="currentColor">
                                                        <path fill-rule="evenodd"
                                                            d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"
                                                            clip-rule="evenodd" />
                                                    </svg>
                                                </label>
                                                <input type="text" name="messenger_url" id="messenger_url"
                                                    value="{{ $listing->messenger_url }}" readonly
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
                                    <h3 class="text-lg font-medium leading-6 text-gray-900">Basic Information</h3>
                                    <p class="mt-1 text-sm text-gray-600">Use a permanent address where you can receive
                                        mail.</p>
                                </div>
                            </div>
                            <div class="mt-5 md:mt-0 md:col-span-2">
                                <div class="shadow-sm overflow-hidden sm:rounded-md">
                                    <div class="px-4 py-5 bg-white sm:p-6">
                                        <div class="grid grid-cols-6 gap-6">

                                            <div class="col-span-6 sm:col-span-4">
                                                <label for="availability"
                                                    class="block text-sm font-medium text-gray-700">Listing Status
                                                    <span class="text-red-600">*</span></label>
                                                <select id="availability" name="availability" required
                                                    class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                                    <option class="bg-gray-50" selected
                                                        value=" {{ $listing->availability }}">
                                                        {{ $listing->availability }}
                                                    </option>
                                                </select>
                                            </div>

                                            <div class="col-span-6">
                                                <label for="listing_title"
                                                    class="block text-sm font-medium text-gray-700">Listing
                                                    Title <span class="text-red-600">*</span></label>
                                                <input type="text" name="listing_title" id="listing_title"
                                                    required value="{{ $listing->listing_title }}" readonly
                                                    class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                            </div>

                                            <div class="col-span-6">
                                                <label for="description"
                                                    class="block text-sm font-medium text-gray-700">
                                                    Brief description
                                                </label>
                                                <div class="mt-1">
                                                    <textarea id="description" name="description" rows="5" readonly
                                                        class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 mt-1 block w-full sm:text-sm border border-gray-300 rounded-md">{{ $listing->description }}</textarea>
                                                </div>
                                                <p class="mt-2 text-sm text-gray-500">Brief description for your
                                                    place.</p>
                                            </div>

                                            <div class="col-span-6 sm:col-span-4">
                                                <label for="category_id"
                                                    class="block text-sm font-medium text-gray-700">Category <span
                                                        class="text-red-600">*</span></label>
                                                <select id="category_id" name="category_id" required
                                                    value="{{ $listing->category_id }}"
                                                    class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                                    <option class="bg-gray-50" selected
                                                        value=" {{ $listing->category->category_id }}">
                                                        {{ $listing->category->category_name }}
                                                    </option>


                                                </select>
                                            </div>

                                            <div class="col-span-6">
                                                <label for="location"
                                                    class="block text-sm font-medium text-gray-700">Location
                                                    address</label>
                                                <input type="text" name="location" id="location" required
                                                    value="{{ $listing->location }}" readonly
                                                    class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                            </div>

                                            <div class=" col-span-6 sm:col-span-4">
                                                <div>
                                                    <label for="price_per_night"
                                                        class="block text-sm font-medium text-gray-700">Price per
                                                        night/1500 per month
                                                        <span class="text-red-600">*</span></label>
                                                    <div class="mt-1 relative rounded-md shadow-sm">
                                                        <div
                                                            class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                                            <span class="text-gray-500 sm:text-sm">
                                                                ₱
                                                            </span>
                                                        </div>
                                                        <input type="number" min="0" step="0.01"
                                                            name="price_per_night" id="price_per_night" required
                                                            value="{{ $listing->price_per_night }}" readonly
                                                            oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');"
                                                            class="focus:ring-indigo-500 focus:border-indigo-500 block w-full pl-7 sm:text-sm border-gray-300 rounded-md"
                                                            placeholder="0.00">

                                                    </div>
                                                </div>
                                            </div>

                                            <div class=" col-span-6 sm:col-span-2">
                                                <div>
                                                    <label for="service_fee"
                                                        class="block text-sm font-medium text-gray-700">Service fee
                                                        <span class="text-red-600">*</span></label>
                                                    <div class="mt-1 relative rounded-md shadow-sm">
                                                        <div
                                                            class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                                            <span class="text-gray-500 sm:text-sm">
                                                                ₱
                                                            </span>
                                                        </div>
                                                        <input type="number" min="0" step="0.01"
                                                            name="service_fee" id="service_fee" required
                                                            value="{{ $listing->service_fee }}" readonly
                                                            oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');"
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

                                            <div class="col-span-6 sm:col-span-2">
                                                <label for="max_guest"
                                                    class="block text-sm font-medium text-gray-700">Max Guest <span
                                                        class="text-red-600">*</span></label>
                                                <select id="max_guest" name="max_guest"
                                                    class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                                    <option class="bg-gray-50" selected
                                                        value=" {{ $listing->max_guest }}">
                                                        {{ $listing->max_guest }}</option>

                                                </select>
                                            </div>

                                            <div class="col-span-6 sm:col-span-2">
                                                <label for="max_pet"
                                                    class="block text-sm font-medium text-gray-700">Max Pet
                                                    Allowed <span class="text-red-600">*</span></label>
                                                <select id="max_pet" name="max_pet" required
                                                    class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                                    <option class="bg-gray-50" selected
                                                        value="{{ $listing->max_pet }}">
                                                        {{ $listing->max_pet }}</option>

                                                </select>
                                            </div>

                                            <div class="col-span-6 sm:col-span-4">
                                                <label for="property_type"
                                                    class="block text-sm font-medium text-gray-700">Property
                                                    Type <span class="text-red-600">*</span></label>
                                                <select id="property_type" name="property_type" required
                                                    class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                                    <option class="bg-gray-50" selected
                                                        value="{{ $listing->property_type }}">
                                                        {{ $listing->property_type }}</option>

                                                </select>
                                            </div>

                                            <div class="col-span-6 sm:col-span-6 lg:col-span-2">
                                                <label for="property_size"
                                                    class="flex text-sm font-medium text-gray-700">Property Size
                                                    <span class="text-red-600">*</span>
                                                    {{-- Tooltip --}}
                                                    <div id="tooltip-size" role="tooltip"
                                                        class="inline-block absolute invisible z-10 py-2 px-3 text-sm font-medium text-white bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
                                                        Square Meters
                                                        <div class="tooltip-arrow" data-popper-arrow></div>
                                                    </div>

                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-2"
                                                        data-tooltip-target="tooltip-size"
                                                        data-tooltip-placement="right" viewBox="0 0 20 20"
                                                        fill="currentColor">
                                                        <path fill-rule="evenodd"
                                                            d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"
                                                            clip-rule="evenodd" />
                                                    </svg>
                                                </label>
                                                <input type="text" name="property_size" id="property_size"
                                                    oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');"
                                                    required value="{{ $listing->property_size }}" readonly
                                                    class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                            </div>

                                            <div class="col-span-6 sm:col-span-6 lg:col-span-2">
                                                <label for="bedrooms"
                                                    class="block text-sm font-medium text-gray-700">No. of
                                                    Bedrooms <span class="text-red-600">*</span></label>
                                                <input type="text" name="bedrooms" id="bedrooms" required
                                                    value="{{ $listing->bedrooms }}" readonly
                                                    class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                            </div>

                                            <div class="col-span-6 sm:col-span-6 lg:col-span-2">
                                                <label for="beds"
                                                    class="block text-sm font-medium text-gray-700">No. of
                                                    Bed <span class="text-red-600">*</span></label>
                                                <input type="text" name="beds" id="beds" required
                                                    value="{{ $listing->beds }}" readonly
                                                    class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                            </div>


                                            <div class="col-span-6 sm:col-span-6 lg:col-span-2">
                                                <label for="bathrooms"
                                                    class="block text-sm font-medium text-gray-700">No. of
                                                    Bathrooms <span class="text-red-600">*</span></label>
                                                <input type="text" name="bathrooms" id="bathrooms" required
                                                    value="{{ $listing->bathrooms }}" readonly
                                                    class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                            </div>

                                            <div class="col-span-6 sm:col-span-4">
                                                <label for="bed_detials"
                                                    class="flex text-sm font-medium text-gray-700">Bed type

                                                    {{-- Tooltip --}}
                                                    <div id="tooltip-bedtype" role="tooltip"
                                                        class="inline-block absolute invisible z-10 py-2 px-3 text-sm font-medium text-white bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
                                                        King Bed, Queen Bed, Full etc.
                                                        <div class="tooltip-arrow" data-popper-arrow></div>
                                                    </div>

                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-2"
                                                        data-tooltip-target="tooltip-bedtype"
                                                        data-tooltip-placement="right" viewBox="0 0 20 20"
                                                        fill="currentColor">
                                                        <path fill-rule="evenodd"
                                                            d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"
                                                            clip-rule="evenodd" />
                                                    </svg>
                                                </label>
                                                <input type="text" name="bed_detials" id="bed_detials"
                                                    value="{{ $listing->bed_detials }}" readonly
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

                                                    @if ($listing->default_photo == null)
                                                        <img id="output_default_photo" class="cursor-pointer mb-4"
                                                            src="{{ asset('img/global/cover-img.svg') }}"
                                                            style="width:600px;height:300px;">
                                                    @else
                                                        <img id="output_default_photo" class="cursor-pointer mb-4"
                                                            src="{{ asset('storage/media/listing/cover_' . $listing->listing_id . '_' . $listing->default_photo) }}"
                                                            style="width:600px;height:300px;">
                                                    @endif


                                                </div>
                                            </div>
                                        </div>

                                        <div>
                                            <label class="block text-sm font-medium text-gray-700">
                                                Photo 1
                                            </label>
                                            <div
                                                class="mt-1 flex justify-center px-6 py-2 border-2 border-gray-300 border-dashed rounded-md">
                                                <div class="space-y-1 text-center">

                                                    @if ($listing->listing_gallery->photo_1 == null)
                                                        <img id="output_photo_1" class="cursor-pointer mb-4"
                                                            src="{{ asset('img/global/cover-img.svg') }}"
                                                            style="width:600px;height:300px;">
                                                    @else
                                                        <img id="output_photo_1" class="cursor-pointer mb-4"
                                                            src="{{ asset('storage/media/listing/photo_1_' . $listing->listing_id . '_' . $listing->listing_gallery->photo_1) }}"
                                                            style="width:600px;height:300px;">
                                                    @endif



                                                </div>
                                            </div>
                                        </div>

                                        <div>
                                            <label class="block text-sm font-medium text-gray-700">
                                                Photo 2
                                            </label>
                                            <div
                                                class="mt-1 flex justify-center px-6 py-2 border-2 border-gray-300 border-dashed rounded-md">
                                                <div class="space-y-1 text-center">

                                                    @if ($listing->listing_gallery->photo_2 == null)
                                                        <img id="output_photo_2" class="cursor-pointer mb-4"
                                                            src="{{ asset('img/global/cover-img.svg') }}"
                                                            style="width:600px;height:300px;">
                                                    @else
                                                        <img id="output_photo_2" class="cursor-pointer mb-4"
                                                            src="{{ asset('storage/media/listing/photo_2_' . $listing->listing_id . '_' . $listing->listing_gallery->photo_2) }}"
                                                            style="width:600px;height:300px;">
                                                    @endif


                                                </div>
                                            </div>
                                        </div>

                                        <div>
                                            <label class="block text-sm font-medium text-gray-700">
                                                Photo 3
                                            </label>
                                            <div
                                                class="mt-1 flex justify-center px-6 py-2 border-2 border-gray-300 border-dashed rounded-md">
                                                <div class="space-y-1 text-center">

                                                    @if ($listing->listing_gallery->photo_3 == null)
                                                        <img id="output_photo_3" class="cursor-pointer mb-4"
                                                            src="{{ asset('img/global/cover-img.svg') }}"
                                                            style="width:600px;height:300px;">
                                                    @else
                                                        <img id="output_photo_3" class="cursor-pointer mb-4"
                                                            src="{{ asset('storage/media/listing/photo_3_' . $listing->listing_id . '_' . $listing->listing_gallery->photo_3) }}"
                                                            style="width:600px;height:300px;">
                                                    @endif


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
                                    <h3 class="text-lg font-medium leading-6 text-gray-900">Payment Methods</h3>
                                    <p class="mt-1 text-sm text-gray-600">Payment gateway for renters.</p>
                                </div>
                            </div>
                            <div class="mt-5 md:mt-0 md:col-span-2">
                                <div class="shadow-sm sm:rounded-md sm:overflow-hidden">
                                    <div class="px-4 py-5 bg-white space-y-6 sm:p-6">

                                        <div>
                                            <label class="block text-sm font-medium text-gray-700">
                                                Gcash QR code (Optional)
                                            </label>
                                            <div
                                                class="mt-1 flex justify-center px-6 py-2 border-2 border-gray-300 border-dashed rounded-md">
                                                <div class="space-y-1 text-center">

                                                    <img id="output_gcash_qr" class="cursor-pointer mb-4"
                                                        src="{{ asset('storage/media/listing/gcash_' . $listing->listing_id . '_' . $listing->gcash_qr) }}"
                                                        style="width:600px;height:600px;">


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
                                    <div class="px-4 py-5 bg-white sm:p-6">
                                        <div class="grid grid-cols-6 gap-6">

                                            {{-- Amenities --}}
                                            <h4 class="col-span-6 text-lg font-medium leading-6 text-gray-900 mb-1">
                                                Amenities</h4>

                                            <div class="col-span-6 sm:col-span-2 space-y-3">
                                                @include('pages.host.amenity-1')
                                            </div>

                                            <div class="col-span-6 sm:col-span-2 space-y-3">
                                                @include('pages.host.amenity-2')
                                            </div>

                                            <div class="col-span-6 sm:col-span-2 space-y-3">
                                                @include('pages.host.amenity-3')
                                            </div>

                                            {{-- Additional Notes --}}
                                            <div class="col-span-6 mt-0 md:mt-6">
                                                <label for="additional_notes"
                                                    class="block text-sm font-medium text-gray-700">
                                                    Additional Notes
                                                </label>
                                                <div class="mt-1">
                                                    <textarea id="additional_notes" name="additional_notes" rows="6"
                                                        class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 mt-1 block w-full sm:text-sm border border-gray-300 rounded-md">
                                                         {{ $listing->additional_notes }}
                                                    </textarea>
                                                </div>
                                                <p class="mt-2 text-sm text-gray-500">Brief description for your
                                                    listing.</p>
                                            </div>

                                            {{-- Rules --}}
                                            <h4 class="col-span-6 text-lg font-medium leading-6 text-gray-900 mb-1">
                                                Rules</h4>

                                            <div class="col-span-6 sm:col-span-2 space-y-3">
                                                {{-- refund --}}
                                                <div class="flex items-start">
                                                    <div class="flex items-center h-5">
                                                        <input id="refundable" name="refundable" type="checkbox"
                                                            @checked($listing->listing_rule->refundable)
                                                            class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded">
                                                    </div>
                                                    <div class="ml-3 text-sm">
                                                        <label for="refundable"
                                                            class="font-medium text-gray-700">Refundable
                                                        </label>
                                                    </div>
                                                </div>

                                                {{-- claygo --}}
                                                <div class="flex items-start">
                                                    <div class="flex items-center h-5">
                                                        <input id="claygo" name="claygo" type="checkbox"
                                                            @checked($listing->listing_rule->claygo)
                                                            class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded">
                                                    </div>
                                                    <div class="ml-3 text-sm">
                                                        <label for="claygo" class="font-medium text-gray-700">Clean
                                                            as you go</label>
                                                    </div>
                                                </div>

                                                {{-- no_smoking --}}
                                                <div class="flex items-start">
                                                    <div class="flex items-center h-5">
                                                        <input id="no_smoking" name="no_smoking" type="checkbox"
                                                            @checked($listing->listing_rule->no_smoking)
                                                            class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded">
                                                    </div>
                                                    <div class="ml-3 text-sm">
                                                        <label for="no_smoking" class="font-medium text-gray-700">No
                                                            Smoking</label>
                                                    </div>
                                                </div>

                                                {{-- no_drinking --}}
                                                <div class="flex items-start">
                                                    <div class="flex items-center h-5">
                                                        <input id="no_drinking" name="no_drinking" type="checkbox"
                                                            @checked($listing->listing_rule->no_drinking)
                                                            class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded">
                                                    </div>
                                                    <div class="ml-3 text-sm">
                                                        <label for="no_drinking" class="font-medium text-gray-700">No
                                                            Drinking</label>
                                                    </div>
                                                </div>

                                                {{-- no_events --}}
                                                <div class="flex items-start">
                                                    <div class="flex items-center h-5">
                                                        <input id="no_events" name="no_events" type="checkbox"
                                                            @checked($listing->listing_rule->no_events)
                                                            class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded">
                                                    </div>
                                                    <div class="ml-3 text-sm">
                                                        <label for="no_events" class="font-medium text-gray-700">No
                                                            Event or Parties</label>
                                                    </div>
                                                </div>

                                                {{-- no_pets --}}
                                                <div class="flex items-start">
                                                    <div class="flex items-center h-5">
                                                        <input id="no_pets" name="no_pets" type="checkbox"
                                                            @checked($listing->listing_rule->no_pets)
                                                            class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded">
                                                    </div>
                                                    <div class="ml-3 text-sm">
                                                        <label for="no_pets" class="font-medium text-gray-700">No
                                                            Pets</label>
                                                    </div>
                                                </div>
                                            </div>


                                            <div class="col-span-6 sm:col-span-2 space-y-3">
                                                <label for="check_in"
                                                    class="block text-sm font-medium text-gray-700">Check In Time
                                                </label>
                                                <input type="text" name="check_in" id="check_in"
                                                    value="{{ $listing->listing_rule->check_in }}"
                                                    class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">

                                                <label for="check_out"
                                                    class="block text-sm font-medium text-gray-700 mt-4">Check Out Time
                                                </label>
                                                <input type="text" name="check_out" id="check_out"
                                                    value="{{ $listing->listing_rule->check_out }}"
                                                    class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                            </div>

                                            {{-- Additional Notes --}}
                                            <div class="col-span-6 mt-0 md:mt-6">
                                                <label for="additional_rules"
                                                    class="block text-sm font-medium text-gray-700">
                                                    Additional Rules
                                                </label>
                                                <div class="mt-1">
                                                    <textarea id="additional_rules" name="additional_rules" rows="6"
                                                        class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 mt-1 block w-full sm:text-sm border border-gray-300 rounded-md">
                                                        {{ $listing->listing_rule->additional_rules }}</textarea>
                                                </div>
                                                <p class="mt-2 text-sm text-gray-500">Brief description for your
                                                    Rule.</p>
                                            </div>


                                            <div class="col-span-6 sm:col-span-4 mt-2">
                                                <label for="location_score"
                                                    class="block text-sm font-medium text-gray-700">Target
                                                    Location</label>
                                                <select id="location_score" name="location_score" required
                                                    class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md  focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                                    <option class="bg-gray-50" selected
                                                        value=" {{ $listing->location_score }}">
                                                        @if ($listing->location_score == 0)
                                                            None
                                                        @elseif($listing->location_score == 1)
                                                            Close to school
                                                        @endif
                                                    </option>
                                                    <option value="0">None</option>
                                                    <option value="1">Close to school</option>
                                                </select>
                                            </div>



                                        </div>

                                    </div>
                                    <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
                                        <a href="{{ route('admin.rentals') }}">
                                            <button type="button"
                                                class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Go
                                                back
                                            </button>
                                        </a>
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
        <script src="{{ asset('js/ckeditor.js') }}"></script>

        <script>
            ClassicEditor.create(document.getElementById('description'))
                .then(editor => {
                    thisEditor = editor
                });

            ClassicEditor.create(document.getElementById('additional_rules'))
                .then(editor => {
                    thisEditor = editor
                });

            ClassicEditor.create(document.getElementById('additional_notes'))
                .then(editor => {
                    thisEditor = editor
                });
        </script>
    @endpush

</x-app-layout>
