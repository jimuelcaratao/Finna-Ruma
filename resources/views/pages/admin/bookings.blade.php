<x-app-layout>

    {{-- Contents --}}
    <div class="projects-section">
        <div class="projects-section-header">
            <p>Bookings</p>
            {{-- <p class="time">December, 12</p> --}}
        </div>

        <div class="projects-section-line">
            <div class="projects-status">
                <div class="item-status">
                    <span class="status-number">{{ $pending }}</span>
                    <span class="status-type">Pending Confirmation</span>
                </div>
                <div class="item-status">
                    <span class="status-number">{{ $confirmed }}</span>
                    <span class="status-type">Confirmed Reservation</span>
                </div>
                <div class="item-status">
                    <span class="status-number">{{ $canceled }}</span>
                    <span class="status-type">Canceled</span>
                </div>
                <div class="item-status">
                    <span class="status-number">{{ $complete }}</span>
                    <span class="status-type">Complete</span>
                </div>
            </div>
            <div class="view-actions">
                <div class="search-wrapper-v2 mr-4">

                    <form id="search_tbl" style="outline: none;">
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 flex items-center">
                                <label for="search_status" class="sr-only">Users role</label>
                                <select id="search_status" name="search_status"
                                    class="focus:ring-indigo-500 focus:border-indigo-500 h-full py-0 pl-2 pr-8 border-transparent bg-transparent text-gray-500 sm:text-sm rounded-md">
                                    @if (!empty(request()->search_status))
                                        <option class="bg-gray-200" disabled selected="{{ request()->search_status }}">
                                            {{ request()->search_status }}
                                        </option>
                                    @endif
                                    <option class="text-xs py-2 font-bold uppercase" disabled>
                                        Status</option>
                                    <option value="">
                                        All</option>
                                    <option value="Pending Confirmation">
                                        Pending Confirmation</option>
                                    <option value="Confirmed Reservation">
                                        Confirmed Reservation</option>
                                    <option value="Waiting for payment proof">
                                        Waiting for payment proof</option>
                                    <option value="Waiting for payment approval">
                                        Waiting for payment approval</option>
                                    <option value="Complete">
                                        Complete</option>
                                    <option value="Canceled">
                                        Canceled</option>
                                </select>
                            </div>

                            <input id="search_inp" class="ml-60 search-input outline-offset-4" type="search"
                                name="search" placeholder="Search" value="{{ request()->search }}"
                                style="outline: none;">
                        </div>
                    </form>
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="none"
                        stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        class="search_btn feather feather-search cursor-pointer" viewBox="0 0 24 24">
                        <defs></defs>
                        <circle cx="11" cy="11" r="8"></circle>
                        <path d="M21 21l-4.35-4.35"></path>
                    </svg>
                </div>

            </div>
        </div>

        <div class="overflow-y-auto">
            <div class="relative  shadow-sm">
                <table class="w-full text-sm text-left text-gray-500 ">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 ">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                Booking ID
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Listing name
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Status
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Host Status
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Tenant
                            </th>

                            <th scope="col" class="px-6 py-3">
                                Check In
                            </th>

                            <th scope="col" class="px-6 py-3">
                                Check Out
                            </th>

                            <th scope="col" class="px-6 py-3">
                                Guests
                            </th>

                            <th scope="col" class="px-6 py-3">
                                Payment Status
                            </th>

                            <th scope="col" class="px-6 py-3">
                                <span class="sr-only no-underline">Edit</span>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($bookings as $booking)
                            <tr class="bg-white border-b  ">
                                <th scope="row" class="px-6 py-3 font-medium text-gray-900  whitespace-nowrap">
                                    {{ $booking->booking_id }}

                                </th>
                                <th scope="row" class="px-6 py-3 font-medium text-gray-900  whitespace-nowrap">
                                    {{ \Illuminate\Support\Str::limit($booking->listing->listing_title, 50) }}

                                </th>
                                <td class="px-6 py-3">


                                    @if ($booking->booking_status == 'Canceled')
                                        <span
                                            class="text-white px-2.5 py-0.5 rounded bg-gradient-to-r from-red-500  to-red-600">
                                            {{ $booking->booking_status }}
                                        </span>
                                    @elseif($booking->booking_status == 'Confirmed Reservation')
                                        <span
                                            class="text-white px-2.5 py-0.5 rounded bg-gradient-to-r from-blue-500  to-blue-600">
                                            {{ $booking->booking_status }}
                                        </span>
                                    @elseif($booking->booking_status == 'Waiting for payment approval')
                                        <span
                                            class="text-white px-2.5 py-0.5 rounded bg-gradient-to-r from-purple-500  to-purple-600">
                                            {{ $booking->booking_status }}
                                        </span>
                                    @elseif($booking->booking_status == 'Waiting for payment proof')
                                        <span
                                            class="text-white px-2.5 py-0.5 rounded bg-gradient-to-r from-yellow-500  to-yellow-600">
                                            {{ $booking->booking_status }}
                                        </span>
                                    @elseif($booking->booking_status == 'Complete')
                                        <span
                                            class="text-white px-2.5 py-0.5 rounded bg-gradient-to-r from-green-500  to-green-600">
                                            {{ $booking->booking_status }}
                                        </span>
                                    @else
                                        <span
                                            class="text-white px-2.5 py-0.5 rounded bg-gradient-to-r from-gray-500  to-gray-600">
                                            {{ $booking->booking_status }}
                                        </span>
                                    @endif
                                </td>

                                <td class="px-6 py-3">
                                    @if ($booking->host_status == 'Denied by Host')
                                        <span
                                            class="text-white px-2.5 py-0.5 rounded bg-gradient-to-r from-red-500  to-red-600">
                                            {{ $booking->host_status }}
                                        </span>
                                    @elseif($booking->host_status == 'Confirmed by Host')
                                        <span
                                            class="text-white px-2.5 py-0.5 rounded bg-gradient-to-r from-blue-500  to-blue-600">
                                            {{ $booking->host_status }}
                                        </span>
                                    @else
                                        <span
                                            class="text-white px-2.5 py-0.5 rounded bg-gradient-to-r from-gray-500  to-gray-600">
                                            {{ $booking->host_status }}
                                        </span>
                                    @endif
                                </td>

                                <td class="px-6 py-3">
                                    {{ $booking->user->name }}
                                </td>

                                <td class="px-6 py-3">
                                    {{ $booking->check_in }}
                                </td>

                                <td class="px-6 py-3 ">
                                    {{ $booking->checkout }}
                                </td>
                                <td class="px-6 py-3 ">
                                    {{ $booking->adults + $booking->children + $booking->infants + $booking->pets }}
                                    guests
                                </td>

                                <td class="px-6 py-3 text-center font-bold">
                                    {{ $booking->payment_status }}

                                </td>

                                <td class="px-6 py-3 text-right flex justify-end mt-2">

                                    {{-- Tooltip --}}
                                    <div id="tooltip-payment" role="tooltip"
                                        class="inline-block absolute invisible z-10 py-2 px-3 text-sm font-medium text-white bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
                                        Approve Payment
                                        <div class="tooltip-arrow" data-popper-arrow></div>
                                    </div>


                                    {{-- Tooltip --}}
                                    <div id="tooltip-delete" role="tooltip"
                                        class="inline-block absolute invisible z-10 py-2 px-3 text-sm font-medium text-white bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
                                        Archive
                                        <div class="tooltip-arrow" data-popper-arrow></div>
                                    </div>

                                    {{-- Tooltip --}}
                                    <div id="tooltip-view" role="tooltip"
                                        class="inline-block absolute invisible z-10 py-2 px-3 text-sm font-medium text-white bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
                                        View Details
                                        <div class="tooltip-arrow" data-popper-arrow></div>
                                    </div>


                                    <a href="{{ route('admin.bookings.view_details', [$booking->booking_id]) }}"
                                        data-tooltip-target="tooltip-view" data-tooltip-placement="top"
                                        class="font-medium text-purple-600  hover:text-purple-900  hover:underline no-underline">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                        </svg>
                                    </a>

                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="8"
                                    class="pr-4 py-8 whitespace-nowrap text-sm font-medium text-center">
                                    <img class="mx-auto d-block text-center py-4" style="width: 275px"
                                        src="{{ asset('img/global/empty.svg') }}" alt="no categories">
                                    There is no bookings yet.
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
                        {{ $bookings->appends(Request::except('page'))->render('pagination::bootstrap-4') }}
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="confirm-modal" data-bs-backdrop="static" data-bs-keyboard="false"
        aria-labelledby="confirm-modalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable modal-lg ">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="confirm-modalLabel">Update Payment</h5>
                    <button type="button" class="btn-close close-modal-confirm" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div>
                        <form action="{{ route('host.bookings.approve_receipt') }}" method="POST"
                            id="confirm-form">
                            @csrf
                            @method('PUT')
                            <div class=" sm:mt-0">
                                <div class=" md:mt-0 md:col-span-2">
                                    <div class="overflow-hidden ">
                                        <div class="px-4 py-3 bg-white sm:p-6">

                                            <div class="grid grid-cols-6 gap-3">


                                                <div class=" col-span-6 sm:col-span-4">
                                                    <label for="booking_id"
                                                        class="block text-sm font-medium text-gray-700">Booking ID
                                                        <span class="text-red-600">*</span></label>
                                                    <input type="text" name="booking_id" id="booking_id" readonly
                                                        class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full  sm:text-sm border-gray-300 rounded-md">
                                                </div>

                                                <div class="col-span-6 sm:col-span-6 lg:col-span-3">
                                                    <div>
                                                        <label class="block text-sm font-medium text-gray-700">
                                                            Receipt <span class="text-red-600">*</span>
                                                        </label>
                                                        <div
                                                            class="mt-1 flex justify-center items-center border-2 border-gray-300 border-dashed rounded-md">
                                                            <div
                                                                class="flex flex-col place-items-center space-y-1 text-center">
                                                                <img id="output" src=""
                                                                    style="width:400px;height:300px;">
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-span-6 sm:col-span-4">
                                                    <label for="payment_status"
                                                        class="block text-sm font-medium text-gray-700">Payment
                                                        <span class="text-red-600">*</span></label>
                                                    <select id="payment_status" name="payment_status" required
                                                        class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md  focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                                        <option selected disabled value="">Choose...</option>
                                                        <option value="Approve">Approve</option>

                                                    </select>
                                                </div>

                                                <div class=" col-span-6 sm:col-span-4">
                                                    <label for="password"
                                                        class="block text-sm font-medium text-gray-700">Confirm
                                                        Password
                                                        <span class="text-red-600">*</span></label>
                                                    <input type="password" name="password" id="password" required
                                                        class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full  sm:text-sm border-gray-300 rounded-md">
                                                </div>
                                            </div>

                                        </div>

                                    </div>
                                </div>
                            </div>

                            <div div class="modal-footer">
                                <button type="button" class="btn btn-secondary close-modal-confirm">Cancel</button>
                                <button id="submit_confirm" type="submit" class="btn btn-primary">Save
                                    Changes</button>
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
                $(document).on("click", "#approve-item", function() {
                    $(this).addClass(
                        "edit-item-trigger-clicked"
                    ); //useful for identifying which trigger was clicked and consequently grab data from the correct row and not the wrong one.
                    var options = {
                        backdrop: "static"
                    };
                    $("#confirm-modal").modal(options);
                    var el = $(".edit-item-trigger-clicked"); // See how its usefull right here?
                    var row = el.closest(".data-row");

                    // get the data
                    var booking_id = el.data("item-booking_id");
                    var payment_proof = el.data("item-payment_proof");


                    $("#booking_id").val(booking_id);
                    // image preview
                    $("img#output").attr('src', $("img#output").attr('src') +
                        `{{ asset('storage/media/booking/receipt_${booking_id}_${payment_proof}') }}`);

                    // alert(category_name);

                });
                // on modal hide
                $("#confirm-modal").on("hide.bs.modal", function() {
                    $(".edit-item-trigger-clicked").removeClass(
                        "edit-item-trigger-clicked"
                    );
                    $("#confirm-form").trigger("reset");

                    $('#output').attr('src', '');
                });
            });


            $(document).ready(function() {
                $(".close-modal-confirm").click(function() {
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
                                $('#confirm-modal').modal('hide');
                            } else {
                                return false;
                            }
                        });
                });
            });

            $(document).ready(function() {
                $(document).on("click", ".confirm-password", function() {
                    $(this).addClass(
                        "edit-item-trigger-clicked"
                    ); //useful for identifying which trigger was clicked and consequently grab data from the correct row and not the wrong one.
                    var options = {
                        backdrop: "static"
                    };
                    $("#confirm-modal").modal(options);
                    var el = $(".edit-item-trigger-clicked"); // See how its usefull right here?
                    var row = el.closest(".data-row");

                    // get the data
                    var id = el.data("item-id");

                    $("#id").val(id);

                });
                // on modal hide
                $("#confirm-modal").on("hide.bs.modal", function() {
                    $(".edit-item-trigger-clicked").removeClass(
                        "edit-item-trigger-clicked"
                    );
                    $("#confirm-form").trigger("reset");


                });
            });
        </script>
        <script>
            $(document).ready(function() {

                $(".search_btn").click(function() {
                    $("#search_tbl").submit();
                });

                $('#search_status').on('change', function() {
                    $("#search_tbl").submit();
                });
            });

            //delete
            $(".archive-booking").click(function(e) {
                e.preventDefault();
                swal({
                        title: "Are you sure to Archive?",
                        text: "Once you put in archive, you can restore it.",
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
