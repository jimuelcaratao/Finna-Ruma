<x-host-layout>

    @push('styles')
        <style>
            #map {
                height: 400px;
                width: 100%;
            }
        </style>
    @endpush


    {{-- Contents --}}
    <div class="projects-section">
        <div class="projects-section-header">
            <p>Edit Boarding House</p>
            <a href="{{ route('host.boarding-house') }}" class="bg-gray-800 text-white p-1 rounded-full"
                title="Add New Project">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd"
                        d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z"
                        clip-rule="evenodd" />
                </svg>
            </a>
        </div>

        <div class="overflow-y-auto">
            <div class="relative shadow-sm pr-0 md:pr-3">
                <form action="{{ route('host.boarding-house.update', [$house->boarding_house_id]) }}" method="POST"
                    id="add-form" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="mt-10 sm:mt-0">
                        <div class="md:grid md:grid-cols-3 md:gap-6">
                            <div class="md:col-span-1">
                                <div class="px-4 sm:px-0">
                                    <h3 class="text-lg font-medium leading-6 text-gray-900">Basic Information</h3>
                                    <p class="mt-1 text-sm text-gray-600">Basic information of your boarding house.</p>
                                </div>
                            </div>
                            <div class="mt-5 md:mt-0 md:col-span-2">
                                <div class="shadow-sm overflow-hidden sm:rounded-md">
                                    <div class="px-4 py-5 bg-white sm:p-6">
                                        <div class="grid grid-cols-6 gap-6">

                                            <div class="col-span-6">
                                                <label for="title"
                                                    class="block text-sm font-medium text-gray-700">Boarding house
                                                    Title <span class="text-red-600">*</span></label>
                                                <input type="text" name="title" id="title" required
                                                    value="{{ $house->title }}"
                                                    class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                            </div>

                                            <div class="col-span-6">
                                                <label for="description"
                                                    class="block text-sm font-medium text-gray-700">
                                                    Brief description
                                                </label>
                                                <div class="mt-1">
                                                    <textarea id="description" name="description" rows="5"
                                                        class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 mt-1 block w-full sm:text-sm border border-gray-300 rounded-md">
                                                        {{ $house->description }}
                                                    </textarea>
                                                </div>
                                                <p class="mt-2 text-sm text-gray-500">Brief description for your
                                                    place.</p>
                                            </div>

                                            <div class="col-span-6 sm:col-span-4 ">
                                                <label for="status"
                                                    class="block text-sm font-medium text-gray-700">Status</label>
                                                <select id="status" name="status" required
                                                    class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                                    <option class="bg-gray-50" selected value=" {{ $house->status }}">
                                                        @if ($house->status == 'Available')
                                                            Available
                                                        @elseif($house->status == 'Unavailable')
                                                            Unavailable
                                                        @endif
                                                    </option>
                                                    <option value="Available">Available</option>
                                                    <option value="Unavailable">Unavailable</option>
                                                </select>
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

                                                    @if ($house->cover == null)
                                                        <img id="output_cover" class="cursor-pointer mb-4"
                                                            src="{{ asset('img/global/cover-img.svg') }}"
                                                            style="width:600px;height:300px;">
                                                    @else
                                                        <img id="output_cover" class="cursor-pointer mb-4"
                                                            src="{{ asset('storage/media/boarding_house/cover_' . $house->boarding_house_id . '_' . $house->cover) }}"
                                                            style="width:600px;height:300px;">
                                                    @endif

                                                    <div class="flex text-sm text-gray-600 ">
                                                        <label for="cover"
                                                            class="relative cursor-pointer bg-white rounded-md font-medium text-indigo-600 hover:text-indigo-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-indigo-500">
                                                            <span class="">Upload a
                                                                file</span>
                                                            <input id="cover" name="cover" type="file"
                                                                class="sr-only" accept=".jpg,.gif,.png,.jpeg">
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

                                <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
                                    <button type="submit"
                                        class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Save</button>
                                </div>
                            </div>
                        </div>
                    </div>

                </form>

            </div>

        </div>
    </div>

    @push('scripts')
        <script async defer
            src="https://maps.googleapis.com/maps/api/js?key={{ env('PLACE_KEY') }}&libraries=places&callback=initMap"></script>
        <script src="{{ asset('js/map.js') }}"></script>
        <script src="{{ asset('js/ckeditor.js') }}"></script>

        <script>
            ClassicEditor.create(document.getElementById('description'))
                .then(editor => {
                    thisEditor = editor
                });

            // edit_is_customizable
            $('#output_cover').click(function() {
                $('#cover').trigger('click');
            });

            $(document).on("change", "#cover", function() {
                document.getElementById('output_cover').src = window.URL.createObjectURL(this.files[
                    0])
            });
        </script>
    @endpush

</x-host-layout>
