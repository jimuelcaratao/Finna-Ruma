<x-app-layout>

    {{-- search bar --}}
    <x-slot name="searchbar">
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
    </x-slot>


    {{-- Contents --}}
    <div class="projects-section">
        <div class="projects-section-header">
            <p>Users</p>
            {{-- <p class="time">December, 12</p> --}}
        </div>

        <div class="projects-section-line">
            <div class="projects-status">
                <div class="item-status">
                    <span class="status-number">{{ $hosts }}</span>
                    <span class="status-type">Host</span>
                </div>
                <div class="item-status">
                    <span class="status-number">{{ $host_pending }}</span>
                    <span class="status-type">Pending Host</span>
                </div>
                <div class="item-status">
                    <span class="status-number">{{ $users_count }}</span>
                    <span class="status-type">User</span>
                </div>
            </div>
            <div class="view-actions">
                <div class="search-wrapper mr-4">

                    <form id="search_tbl" style="outline: none;">
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 flex items-center">
                                <label for="search_col" class="sr-only">Users role</label>
                                <select id="search_col" name="search_col"
                                    class="focus:ring-indigo-500 focus:border-indigo-500 h-full py-0 pl-2 pr-12 border-transparent bg-transparent text-gray-500 sm:text-sm rounded-md">
                                    @if (!empty(request()->search_col))
                                        <option class="bg-gray-200" disabled selected="{{ request()->search_col }}">
                                            {{ request()->search_col }}
                                        </option>
                                    @endif
                                    <option value="">
                                        All</option>
                                    <option class="text-xs py-2 font-bold uppercase" disabled>
                                        User Role</option>
                                    <option value="1">
                                        Admin</option>
                                    <option value="2">
                                        Host</option>
                                    <option value="0">
                                        User</option>
                                </select>
                            </div>

                            <input id="search_inp" class="ml-28 search-input outline-offset-4" type="search"
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

                <button data-bs-toggle="modal" data-bs-target="#add-modal"
                    class="bg-gray-800 text-white p-2 rounded-full" title="Add New Project">
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
                                ACCOUNT TYPE
                            </th>

                            <th scope="col" class="px-6 py-3">
                                Status
                            </th>

                            <th scope="col" class="px-6 py-3">
                                Full name
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Email
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Social Media
                            </th>

                            <th scope="col" class="px-6 py-3">
                                Approved Date
                            </th>

                            <th scope="col" class="px-6 py-3">
                                Banned Date
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

                        @forelse ($users as $user)
                            <tr class="bg-white border-b  ">
                                <th scope="row" class="px-6 py-3 font-medium text-gray-900  whitespace-nowrap">
                                    @if ($user->is_admin == 1)
                                        <span
                                            class="text-white px-2.5 py-0.5 rounded bg-gradient-to-r from-sky-500  to-sky-600">
                                            Admin
                                        </span>
                                    @elseif($user->is_admin == 2)
                                        <span
                                            class="text-white px-2.5 py-0.5 rounded bg-gradient-to-r from-green-500  to-green-600">
                                            Host
                                        </span>
                                    @else
                                        <span
                                            class="text-white px-2.5 py-0.5 rounded bg-gradient-to-r from-gray-500  to-gray-600">
                                            User
                                        </span>
                                    @endif
                                </th>

                                <td class="px-6 py-3">
                                    {{ $user->status }}
                                </td>
                                <td class="px-6 py-3">
                                    {{ $user->name }}
                                </td>
                                <td class="px-6 py-3">
                                    {{ $user->email }}
                                </td>
                                <td class="px-6 py-3">
                                    @if ($user->external_provider == 'Facebook')
                                        <span class="badge badge-sm bg-gradient-info">
                                            {{ $user->external_provider }}
                                        </span>
                                    @elseif ($user->external_provider == 'Google')
                                        <span class="badge badge-sm bg-gradient-danger">
                                            {{ $user->external_provider }}
                                        </span>
                                    @else
                                        <span class="badge badge-sm bg-gradient-secondary">
                                            None
                                        </span>
                                    @endif
                                </td>

                                <td class="px-6 py-3">
                                    {{ $user->approved_at }}
                                </td>

                                <td class="px-6 py-3">
                                    {{ $user->is_banned }}
                                </td>

                                <td class="px-6 py-3">
                                    {{ \Carbon\Carbon::parse($user->created_at)->format('d / F / Y') }}
                                </td>
                                <td class="px-6 py-3 text-right flex mt-2">

                                    <a href="#" data-bs-toggle="modal" data-bs-target="#edit-modal"
                                        data-item-id="{{ $user->id }}" id=""
                                        class="font-medium confirm-password text-purple-600 no-underline hover:text-purple-900 mr-5">Edit</a>
                                    @if ($user->is_admin !== 1)
                                        @if ($user->is_banned != null)
                                            <a href="#" data-bs-toggle="modal" data-bs-target="#confirm-modal"
                                                data-item-id="{{ $user->id }}" id=""
                                                class="font-medium confirm-password text-red-600 no-underline hover:text-red-900 mr-5">Unbanned</a>
                                        @endif
                                    @empty($user->is_banned)
                                        <a href="#" data-bs-toggle="modal" data-bs-target="#confirm-modal"
                                            data-item-id="{{ $user->id }}" id=""
                                            class="font-medium confirm-password text-red-600 no-underline hover:text-red-900 mr-5">Ban</a>
                                    @endempty
                                @endif
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="8"
                                class="pr-4 py-2 whitespace-nowrap text-sm font-medium text-center">
                                <img class="mx-auto d-block text-center py-4" style="width: 225px"
                                    src="{{ asset('img/global/empty.svg') }}" alt="no products">
                                Hmmm.. There is no users in here yet.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <div class="row justify-content-center">
        <div class="mt-4 d-flex justify-content-center">
            {{-- pagination --}}
            <div class="pagination">
                {{-- {{ $users->render('pagination::bootstrap-4') }} --}}
                {{ $users->appends(Request::except('page'))->render('pagination::bootstrap-4') }}
            </div>
        </div>
    </div>
</div>

<x-user.confirm-password-modal>
</x-user.confirm-password-modal>

<!-- Modal -->
<div class="modal fade" id="add-modal" data-bs-backdrop="static" data-bs-keyboard="false"
    aria-labelledby="add-modalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-lg ">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="add-modalLabel">Add User</h5>
                <button type="button" class="btn-close closeModalClick" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div>
                    <form action="{{ route('users.store') }}" method="POST" id="add-form">
                        @csrf
                        <h4> User information </h4>
                        <div class="">
                            <div class="mt-3 md:mt-0 md:col-span-2">
                                <div class="overflow-hidden ">
                                    <div class="px-4 py-5 bg-white sm:p-6">
                                        <div class="grid grid-cols-6 gap-2">

                                            <div class="col-span-6 sm:col-span-4">
                                                <label for="is_admin"
                                                    class="block text-sm font-medium text-gray-700">Role <span
                                                        class="text-red-600">*</span></label>
                                                <select id="is_admin" name="is_admin" required
                                                    class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                                    <option selected disabled value="">Choose...</option>
                                                    <option value="0">User</option>
                                                    <option value="2">Host</option>
                                                    <option value="1">Admin</option>

                                                </select>
                                            </div>

                                            <div class=" col-span-6 sm:col-span-4">
                                                <label for="name"
                                                    class="block text-sm font-medium text-gray-700">Full name
                                                    <span class="text-red-600">*</span></label>
                                                <input type="text" name="name" id="name" required
                                                    class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow sm:text-sm border-gray-300 rounded-md">
                                            </div>

                                            <div class=" col-span-6 sm:col-span-4">
                                                <label for="email"
                                                    class="block text-sm font-medium text-gray-700">Email
                                                    <span class="text-red-600">*</span></label>
                                                <input type="text" name="email" id="email" required
                                                    class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow sm:text-sm border-gray-300 rounded-md">
                                            </div>


                                            <div class=" col-span-6 sm:col-span-4">
                                                <label for="password"
                                                    class="block text-sm font-medium text-gray-700">Password
                                                    <span class="text-red-600">*</span></label>
                                                <input type="text" name="password" id="password" required
                                                    class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow sm:text-sm border-gray-300 rounded-md">
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>

                        <div div class="modal-footer">
                            <button type="button" class="btn btn-secondary closeModalClick">Cancel</button>
                            <button id="submit_category" type="submit" class="btn btn-primary">Create</button>
                        </div>
                    </form>

                </div>


            </div>

        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="edit-modal" data-bs-backdrop="static" data-bs-keyboard="false"
    aria-labelledby="edit-modalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-lg ">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="edit-modalLabel">Edit User</h5>
                <button type="button" class="btn-close close-modal-edit" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div>
                    <form action="{{ route('users.update') }}" method="POST" id="edit-form">
                        @csrf
                        @method('PUT')
                        <div class=" sm:mt-0">
                            <div class=" md:mt-0 md:col-span-2">
                                <div class="overflow-hidden ">
                                    <div class="px-4 py-3 bg-white sm:p-6">

                                        <div class="grid grid-cols-6 gap-6">



                                            <div class="col-span-6 sm:col-span-4">
                                                <label for="status"
                                                    class="block text-sm font-medium text-gray-700">Status
                                                </label>
                                                <select id="status" name="status"
                                                    class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                                    <option selected disabled value="">Choose...</option>
                                                    <option value="Approved">Approved</option>
                                                    <option value="Denied">Denied</option>
                                                    <option value="Pending Approval">Pending Approval</option>
                                                </select>
                                            </div>

                                            <div class="col-span-6 sm:col-span-4">
                                                <label for="is_admin"
                                                    class="block text-sm font-medium text-gray-700">Role <span
                                                        class="text-red-600">*</span></label>
                                                <select id="is_admin" name="is_admin" required
                                                    class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                                    <option selected disabled value="">Choose...</option>
                                                    <option value="0">User</option>
                                                    <option value="2">Host</option>
                                                    <option value="1">Admin</option>
                                                </select>
                                            </div>

                                            <div class=" col-span-6 sm:col-span-4">
                                                <label for="password"
                                                    class="block text-sm font-medium text-gray-700">Confirm your
                                                    Password <span class="text-red-600">*</span></label>
                                                <input type="password" name="password" id="password" required
                                                    class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                            </div>

                                            <div class=" col-span-6 sm:col-span-4">
                                                <input type="text" name="id" id="id" required
                                                    class="hidden mt-1 focus:ring-indigo-500 focus:border-indigo-500  w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                            </div>
                                        </div>

                                    </div>

                                </div>
                            </div>
                        </div>

                        <div div class="modal-footer">
                            <button type="button" class="btn btn-secondary close-modal-edit">Cancel</button>
                            <button id="submit_edit" type="submit" class="btn btn-primary">Save Changes</button>
                        </div>
                    </form>

                </div>


            </div>

        </div>
    </div>
</div>


@push('scripts')
    <script>
        $(document).ready(function() {
            $(".close-modal-edit").click(function() {
                swal({
                        title: "Are you sure to close?",
                        text: "Have a nice day.",
                        icon: "warning",
                        buttons: true,
                        dangerMode: true,
                    })
                    .then((willDelete) => {
                        if (willDelete) {
                            // OnClose
                            $('#edit-modal').modal('hide');
                        } else {
                            return false;
                        }
                    });
            });
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

                        } else {
                            return false;
                        }
                    });
            });


            // focus on if empty
            // $(".search_btn").click(function() {
            //     if ($("#search_inp").val().length === 0) {
            //         $("#search_inp").focus();
            //     } else {
            //         $("#search_tbl").submit();
            //     }
            // });

            $(".search_btn").click(function() {
                $("#search_tbl").submit();
            });
        });
    </script>
@endpush

</x-app-layout>
