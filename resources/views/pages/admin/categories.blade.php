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


    {{-- Contents --}}
    <div class="projects-section">
        <div class="projects-section-header">
            <p>Categories</p>
            {{-- <p class="time">December, 12</p> --}}
        </div>

        <div class="projects-section-line">
            <div class="projects-status">
                <div class="item-status">
                    <span class="status-number">{{ count($categories) }}</span>
                    <span class="status-type">Total</span>
                </div>
            </div>
            <div class="view-actions">
                <div class="search-wrapper mr-4">

                    <form id="search_tbl" style="outline: none;">
                        <div class="relative">
                            <input id="search_inp" class=" search-input outline-offset-4" type="search" name="search"
                                placeholder="Search" value="{{ request()->search }}" style="outline: none;">
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

                <button class="bg-gray-800 text-white p-2 rounded-full" data-bs-toggle="modal"
                    data-bs-target="#add-modal" title="Add New Category">
                    <svg class="btn-icon" xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round"
                        stroke-linejoin="round" class="feather feather-plus">
                        <line x1="12" y1="5" x2="12" y2="19" />
                        <line x1="5" y1="12" x2="19" y2="12" />
                    </svg>
                </button>
            </div>
        </div>

        <div class="overflow-y-auto overflow-x-hidden">
            <div class="relative  shadow-sm">
                <table class="w-full text-sm text-left text-gray-500 ">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 ">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                Category ID
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Category Name
                            </th>

                            <th scope="col" class="px-6 py-3">
                                Status
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Date Created
                            </th>
                            <th scope="col" class="px-6 py-3">
                                <span class="sr-only no-underline">Edit</span>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($categories as $category)
                            <tr class="bg-white border-b  ">
                                <th scope="row" class="px-6 py-3 font-medium text-gray-900  whitespace-nowrap">
                                    {{ $category->category_id }}
                                </th>
                                <td class="px-6 py-3">
                                    {{ $category->category_name }}
                                </td>
                                <td class="px-6 py-3">
                                    {{ $category->status }}
                                </td>
                                <td class="px-6 py-3">
                                    {{ $category->created_at }}
                                </td>
                                <td class="px-6 py-3 text-right flex justify-end">
                                    <a href="#" data-bs-toggle="modal" data-bs-target="#edit-modal-category"
                                        data-tooltip="tooltip" data-placement="top" title="Edit"
                                        data-community="{{ json_encode($category) }}"
                                        data-item-category_name="{{ $category->category_name }}"
                                        data-item-category_id="{{ $category->category_id }}" id="edit-item-category"
                                        class="font-medium text-purple-600  hover:text-purple-900  hover:underline no-underline mt-2"><svg
                                            xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                        </svg></a>


                                    @if ($category->deleted_at !== null)
                                        <form class="restore-category mt-2 ml-2"
                                            action="{{ route('categories.restore', [$category->category_id]) }}"
                                            method="POST">
                                            @method('PUT')
                                            @csrf
                                            <a type="submit"
                                                class="font-medium text-green-600 no-underline hover:text-green-900"><svg
                                                    xmlns="http://www.w3.org/2000/svg" class="h-5 w-5"
                                                    viewBox="0 0 20 20" fill="currentColor">
                                                    <path fill-rule="evenodd"
                                                        d="M6 2a2 2 0 00-2 2v12a2 2 0 002 2h8a2 2 0 002-2V7.414A2 2 0 0015.414 6L12 2.586A2 2 0 0010.586 2H6zm5 6a1 1 0 10-2 0v2H7a1 1 0 100 2h2v2a1 1 0 102 0v-2h2a1 1 0 100-2h-2V8z"
                                                        clip-rule="evenodd" />
                                                </svg></a>
                                        </form>
                                    @else
                                        <form class="delete-category mt-2 ml-2"
                                            action="{{ route('categories.destroy', [$category->category_id]) }}"
                                            method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <a type="submit"
                                                class="font-medium text-red-600 no-underline hover:text-red-900"><svg
                                                    xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                                                    viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                </svg></a>
                                        </form>
                                    @endif




                                </td>

                            </tr>

                        @empty
                            <tr>
                                <td colspan="8"
                                    class="pr-4 py-8 whitespace-nowrap text-sm font-medium text-center">
                                    <img class="mx-auto d-block text-center py-4" style="width: 275px"
                                        src="{{ asset('img/global/empty.svg') }}" alt="no categories">
                                    Hmmm.. There is no Categories in here.
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
                        {{ $categories->appends(Request::except('page'))->render('pagination::bootstrap-4') }}
                    </div>
                </div>
            </div>

        </div>
    </div>

    <x-category.add-modal>
    </x-category.add-modal>
    <x-category.edit-modal>
    </x-category.edit-modal>


    @push('scripts')
        <script>
            //delete
            $(".restore-category").click(function(e) {
                e.preventDefault();
                swal({
                        title: "Are you sure to restore?",
                        text: "Once you restore, nice then!",
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

            //delete
            $(".delete-category").click(function(e) {
                e.preventDefault();
                swal({
                        title: "Are you sure to Delete?",
                        text: "Once you Deleted, you can always bring it back!",
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


            // if category not null
            $('#category_name').on('input', function(e) {
                $('#submit_category').removeAttr('disabled');
            });

            $(document).ready(function() {
                $(".search_btn").click(function() {
                    $("#search_tbl").submit();
                });
            });
        </script>
    @endpush

</x-app-layout>
