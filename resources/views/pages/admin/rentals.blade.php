<x-app-layout>

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

    <!-- Modal -->
    <div class="modal fade" id="searchFilter" tabindex="-1" aria-labelledby="searchFilterLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="searchFilterLabel">Modal title</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    ...
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>

    {{-- Contents --}}
    <div class="projects-section">
        <div class="projects-section-header">
            <p>My Listing</p>
            {{-- <p class="time">December, 12</p> --}}
        </div>

        <div class="projects-section-line">
            <div class="projects-status">
                <div class="item-status">
                    <span class="status-number">{{ $listing_pending }}</span>
                    <span class="status-type">Pending Approval</span>
                </div>
                <div class="item-status">
                    <span class="status-number">{{ $listing_approved }}</span>
                    <span class="status-type">Approved</span>
                </div>
                <div class="item-status">
                    <span class="status-number">{{ $listing_denied }}</span>
                    <span class="status-type">Denied</span>
                </div>
                <div class="item-status">
                    <span class="status-number">{{ count($listings) }}</span>
                    <span class="status-type">Total</span>
                </div>
            </div>
            <div class="view-actions">
                <div class="search-wrapper-v2 mr-4">

                    <form id="search_tbl" style="outline: none;">
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 flex items-center">
                                <label for="search_status" class="sr-only">Users role</label>
                                <select id="search_status" name="search_status"
                                    class="focus:ring-indigo-500 focus:border-indigo-500 h-full py-0 pl-2 pr-12 border-transparent bg-transparent text-gray-500 sm:text-sm rounded-md">
                                    @if (!empty(request()->search_status))
                                        <option class="bg-gray-200" disabled selected="{{ request()->search_status }}">
                                            {{ request()->search_status }}
                                        </option>
                                    @endif
                                    <option class="text-xs py-2 font-bold uppercase" disabled>
                                        Status</option>
                                    <option value="">
                                        All</option>
                                    <option value="Pending Approval">
                                        Pending Approval</option>
                                    <option value="Approved">
                                        Approved</option>
                                    <option value="Denied">
                                        Denied</option>
                                </select>
                                {{-- <select id="search_cat" name="search_cat"
                                    class="focus:ring-indigo-500 focus:border-indigo-500 h-full py-0 pl-2 pr-12 border-transparent bg-transparent text-gray-500 sm:text-sm rounded-md">
                                    @if (!empty(request()->search_cat))
                                        <option class="bg-gray-200" disabled selected="{{ request()->search_cat }}">
                                            {{ request()->search_cat }}
                                        </option>
                                    @endif
                                    <option class="text-xs py-2 font-bold uppercase" disabled>
                                        Category</option>
                                    <option value="">
                                        All</option>
                                    @forelse ($categories as $category)
                                        <option value="{{ $category->category_id }}">
                                            {{ $category->category_name }}</option>
                                    @empty
                                    @endforelse

                                </select> --}}
                            </div>

                            <input id="search_inp" class="ml-40 search-input outline-offset-4" type="search"
                                name="search" placeholder="Search" value="{{ request()->search }}"
                                style="outline: none;">
                        </div>
                    </form>
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="none"
                        stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        class="search_btn feather feather-search" viewBox="0 0 24 24">
                        <defs></defs>
                        <circle cx="11" cy="11" r="8"></circle>
                        <path d="M21 21l-4.35-4.35"></path>
                    </svg>
                </div>

                <button data-bs-toggle="modal" data-bs-target="#searchFilter">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-4" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.293A1 1 0 013 6.586V4z" />
                    </svg>
                </button>



            </div>
        </div>

        <div class="overflow-y-auto">
            <div class="relative  shadow-sm">
                <table class="w-full text-sm text-left text-gray-500 ">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 ">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                Listing name
                            </th>

                            <th scope="col" class="px-6 py-3">
                                Host name
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Status
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Category
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Location
                            </th>

                            <th scope="col" class="px-6 py-3">
                                Price Per Night
                            </th>

                            <th scope="col" class="px-6 py-3">
                                Property Size
                            </th>

                            <th scope="col" class="px-6 py-3">
                                Guest
                            </th>

                            <th scope="col" class="px-6 py-3">
                                <span class="sr-only no-underline">Edit</span>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($listings as $listing)
                            <tr class="bg-white border-b  ">
                                <th scope="row" class="px-6 py-3 font-medium text-gray-900  whitespace-nowrap">
                                    {{ \Illuminate\Support\Str::limit($listing->listing_title, 50) }}

                                </th>

                                <td class="px-6 py-3">
                                    {{ $listing->user->name }}

                                </td>
                                <td class="px-6 py-3">
                                    @if ($listing->listing_status == 'Denied')
                                        <span
                                            class="text-white px-2.5 py-0.5 rounded bg-gradient-to-r from-red-500  to-red-600">
                                            {{ $listing->listing_status }}
                                        </span>
                                    @elseif($listing->listing_status == 'Approved')
                                        <span
                                            class="text-white px-2.5 py-0.5 rounded bg-gradient-to-r from-green-500  to-green-600">
                                            {{ $listing->listing_status }}
                                        </span>
                                    @else
                                        <span
                                            class="text-white px-2.5 py-0.5 rounded bg-gradient-to-r from-gray-500  to-gray-600">
                                            {{ $listing->listing_status }}
                                        </span>
                                    @endif
                                </td>
                                <td class="px-6 py-3">
                                    {{ $listing->category->category_name }}

                                </td>
                                <td class="px-6 py-3">
                                    {{ \Illuminate\Support\Str::limit($listing->location, 50) }}

                                </td>
                                <td class="px-6 py-3 ">
                                    ₱ @convert($listing->price_per_night)
                                </td>

                                <td class="px-6 py-3 ">
                                    {{ $listing->property_size }} sq. m
                                </td>

                                <td class="px-6 py-3 text-center">
                                    {{ $listing->max_guest }}
                                </td>

                                <td class="px-6 py-3 text-right flex justify-end mt-2">

                                    {{-- Tooltip --}}
                                    <div id="tooltip-edit" role="tooltip"
                                        class="inline-block absolute invisible z-10 py-2 px-3 text-sm font-medium text-white bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
                                        Edit Listing
                                        <div class="tooltip-arrow" data-popper-arrow></div>
                                    </div>


                                    {{-- Tooltip --}}
                                    <div id="tooltip-delete" role="tooltip"
                                        class="inline-block absolute invisible z-10 py-2 px-3 text-sm font-medium text-white bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
                                        Delete
                                        <div class="tooltip-arrow" data-popper-arrow></div>
                                    </div>

                                    <a href="" data-tooltip-target="tooltip-edit" data-tooltip-placement="top"
                                        id="edit-item-status" data-bs-toggle="modal"
                                        data-bs-target="#edit-modal-status"
                                        data-item-listing_id="{{ $listing->listing_id }}"
                                        data-item-listing_status="{{ $listing->listing_status }}"
                                        class="font-medium text-purple-600  hover:text-purple-900  hover:underline no-underline"><svg
                                            xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20"
                                            fill="currentColor">
                                            <path
                                                d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z" />
                                            <path fill-rule="evenodd"
                                                d="M2 6a2 2 0 012-2h4a1 1 0 010 2H4v10h10v-4a1 1 0 112 0v4a2 2 0 01-2 2H4a2 2 0 01-2-2V6z"
                                                clip-rule="evenodd" />
                                        </svg></a>


                                    {{-- <form class="delete-listing ml-2"
                                        action="{{ route('host.listing.destroy', [$listing->listing_id]) }}"
                                        method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <a type="submit" data-tooltip-target="tooltip-delete"
                                            data-tooltip-placement="top"
                                            class="font-medium text-red-600 no-underline hover:text-red-900"><svg
                                                xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                                                viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                            </svg></a>
                                    </form> --}}

                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="8"
                                    class="pr-4 py-8 whitespace-nowrap text-sm font-medium text-center">
                                    <img class="mx-auto d-block text-center py-4" style="width: 275px"
                                        src="{{ asset('img/global/empty.svg') }}" alt="no categories">
                                    Hmmm.. There is no listing in here.
                                </td>
                            </tr>
                        @endforelse


                    </tbody>
                </table>
            </div>

            <div class="row justify-content-center">
                <div class="mt-4 d-flex justify-content-center">
                    {{-- pagination --}}
                    <div class="pagination">
                        {{-- {{ $users->render('pagination::bootstrap-4') }} --}}
                        {{ $listings->appends(Request::except('page'))->render('pagination::bootstrap-4') }}
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="edit-modal-status" data-bs-backdrop="static" data-bs-keyboard="false"
        tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Update </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('admin.rentals.status') }}" method="POST" id="edit-status">
                    @csrf
                    <div class="modal-body">

                        <div class=" col-span-6 sm:col-span-4 mb-4">
                            <label for="listing_id" class="block text-sm font-medium text-gray-700">Listing ID
                                <span class="text-red-600">*</span></label>
                            <input type="text" name="listing_id" id="listing_id" readonly required
                                class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full  sm:text-sm border-gray-300 rounded-md">
                        </div>

                        <div class="mb-3">
                            <label for="listing_status" class="block text-sm font-medium text-gray-700">Status</label>
                            <select id="listing_status" name="listing_status" class="form-select"
                                aria-label="Default select example">
                                <option disabled selected></option>
                                <option value="Approved">Approved</option>
                                <option value="Denied">Denied</option>
                            </select>
                            <div id="emailHelp" class="form-text">Confirm this action.</div>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>



    @push('scripts')
        <script>
            $('.brand-radio').click(function() {
                brand = $('input[name="brand_type"]:checked').val();

                $('#brand-form').submit();
            });

            $('.stock-radio').click(function() {
                brand = $('input[name="stock_type"]:checked').val();

                $('#stock-form').submit();
            });

            $('#brand_type_clear').click(function() {

                $('input[name="brand_type"][value={{ request()->brand_type }}]').prop("checked", false);
                $('#brand-form').submit();
            });

            $('#stock_type_clear').click(function() {

                $('input[name="stock_type"][value={{ request()->stock_type }}]').prop("checked", false);
                $('#brand-form').submit();
            });

            window.document.onload = $(document).ready(function() {
                if ('{{ request()->brand_type }}' != '') {
                    $('input[name="brand_type"][value={{ request()->brand_type }}]').prop("checked", true);
                }

                if ('{{ request()->stock_type }}' != '') {
                    $('input[name="stock_type"][value={{ request()->stock_type }}]').prop("checked", true);
                }
            });


            $(document).ready(function() {
                $(document).on("click", "#edit-item-status", function() {
                    $(this).addClass(
                        "edit-item-trigger-clicked"
                    ); //useful for identifying which trigger was clicked and consequently grab data from the correct row and not the wrong one.
                    var options = {
                        backdrop: "static"
                    };
                    $("#edit-modal-status").modal(options);
                    var el = $(".edit-item-trigger-clicked"); // See how its usefull right here?
                    var row = el.closest(".data-row");

                    // get the data
                    var listing_id = el.data("item-listing_id");
                    var listing_status = el.data("item-listing_status");


                    $("#listing_id").val(listing_id);
                    $("#listing_status").val(listing_status);

                    // alert(category_name);

                });
                // on modal hide
                $("#edit-modal-status").on("hide.bs.modal", function() {
                    $(".edit-item-trigger-clicked").removeClass(
                        "edit-item-trigger-clicked"
                    );
                    $("#edit-status").trigger("reset");

                    // disabled attr
                    $("button#edit_submit_category").attr("disabled", true);
                });
            });


            $(document).ready(function() {

                $(".search_btn").click(function() {
                    $("#search_tbl").submit();
                });
            });
            //delete
            $(".delete-listing").click(function(e) {
                e.preventDefault();
                swal({
                        title: "Are you sure to Delete?",
                        text: "Once you Deleted, theres no turning back!",
                        icon: "warning",
                        buttons: true,
                        dangerMode: true,
                    })
                    .then((willDelete) => {
                        if (willDelete) {
                            $(e.target)
                                .closest("form")
                                .submit(); // Post the surrounding form
                        } else {
                            return false;
                        }
                    });
            });
        </script>
    @endpush
</x-app-layout>
