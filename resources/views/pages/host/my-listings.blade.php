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
            <p>My Listing</p>
            {{-- <p class="time">December, 12</p> --}}
        </div>

        <div class="projects-section-line">
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

                <a href="{{ route('host.add.listing') }}" class="bg-gray-800 text-white p-2 rounded-full"
                    title="Add New Project">
                    <svg class="btn-icon" xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round"
                        stroke-linejoin="round" class="feather feather-plus">
                        <line x1="12" y1="5" x2="12" y2="19" />
                        <line x1="5" y1="12" x2="19" y2="12" />
                    </svg>
                </a>
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
                                Status
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Category
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Description
                            </th>

                            <th scope="col" class="px-6 py-3">
                                Price Per Night
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
                                    {{ $listing->listing_status }}

                                </td>
                                <td class="px-6 py-3">
                                    {{ $listing->category->category_name }}

                                </td>
                                <td class="px-6 py-3">
                                    {{ \Illuminate\Support\Str::limit($listing->description, 50) }}

                                </td>
                                <td class="px-6 py-3 ">
                                    ₱ @convert($listing->price_per_night)
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

                                    <a href="{{ route('host.edit.listing', [$listing->slug]) }}"
                                        data-tooltip-target="tooltip-edit" data-tooltip-placement="top"
                                        class="font-medium text-purple-600  hover:text-purple-900  hover:underline no-underline"><svg
                                            xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20"
                                            fill="currentColor">
                                            <path
                                                d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z" />
                                            <path fill-rule="evenodd"
                                                d="M2 6a2 2 0 012-2h4a1 1 0 010 2H4v10h10v-4a1 1 0 112 0v4a2 2 0 01-2 2H4a2 2 0 01-2-2V6z"
                                                clip-rule="evenodd" />
                                        </svg></a>


                                    <form class="delete-listing ml-2"
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
                                    </form>

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


    @push('scripts')
        <script>
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
</x-host-layout>
