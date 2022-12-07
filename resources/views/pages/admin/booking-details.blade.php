<x-app-layout>

    {{-- Contents --}}
    <div class="projects-section">

        <div class="overflow-y-auto">
            <div>
                <div class="container mx-auto">

                    <div class="flex justify-center lg:my-8">
                        <!-- Row -->
                        <div class="w-full flex-1 md:flex">

                            <!-- Col -->
                            <div class="flex-initial w-full lg:w-3/5 lg:block bg-white lg:mr-10 px-4 lg:px-0">
                                <div class=" mb-4">

                                    <div class="flex justify-between gap-10">
                                        <div>
                                            <h3 class="pt-4 mb-2 text-3xl font-semibold">
                                                Booking ID: {{ $booking->booking_id }}
                                            </h3>
                                            <span
                                                class="mt-4 mb-2 bg-blue-100 text-blue-800 text-sm font-medium inline-flex items-center px-2.5 py-0.5 rounded ">

                                                {{ $booking->booking_status }}
                                            </span>

                                            <span
                                                class="mt-4 mb-2 bg-blue-100 text-blue-800 text-sm font-medium inline-flex items-center px-2.5 py-0.5 rounded ">

                                                {{ $booking->host_status }}
                                            </span>
                                            <h3 class=" mb-2 text-xl ">{{ $booking->listing->listing_title }}
                                            </h3>
                                            <a class="text-sm font-medium text-gray-700 underline">
                                                {{ $booking->listing->location }}</a>

                                            <!-- Breadcrumb -->
                                            <nav class="flex" aria-label="Breadcrumb">
                                                <ol class="inline-flex items-center space-x-1 md:space-x-3">
                                                    <li class="inline-flex items-center">
                                                        <span
                                                            class="inline-flex items-center text-sm font-medium text-gray-700">
                                                            {{ $booking->listing->max_guest }} guests
                                                        </span>
                                                    </li>
                                                    <li aria-current="page">
                                                        <div class="flex items-center">
                                                            <span class="mx-1">
                                                                •
                                                            </span>

                                                            <span
                                                                class="ml-1 text-sm font-medium text-gray-700 md:ml-2">{{ $booking->listing->beds }}
                                                                beds</span>
                                                        </div>
                                                    </li>

                                                    <li aria-current="page">
                                                        <div class="flex items-center">
                                                            <span class="mx-1">
                                                                •
                                                            </span>

                                                            <span
                                                                class="ml-1 text-sm font-medium text-gray-700 md:ml-2">{{ $booking->listing->bathrooms }}
                                                                baths
                                                            </span>
                                                        </div>
                                                    </li>
                                                </ol>
                                            </nav>


                                            {{-- Your Trip --}}
                                            <div class="mt-8">
                                                <h5 class="text-lg font-bold mb-2">Booking Details</h5>

                                                <h3 class="text-base font-bold mt-4">Person who books</h3>
                                                <div class="text-sm mb-2">
                                                    Full name:
                                                    {{ $booking->user->name }}
                                                    {{ $booking->user->lastname }}</div>

                                                @if ($booking->user->contact != null)
                                                    <div class="text-sm mb-2"> Contact:
                                                        +63{{ $booking->user->contact }}
                                                    </div>
                                                @endif

                                                <div class="text-sm mb-2">Address: {{ $booking->user->address }}
                                                </div>

                                                <div class="text-sm mb-2">Student ID: {{ $booking->user->student_id }}
                                                </div>


                                                <h3 class="text-base font-bold mt-2">Dates</h3>
                                                <span class="text-sm">{{ $booking->check_in }} -
                                                    {{ $booking->checkout }} </span>

                                                <h3 class="text-base font-bold mt-2">Guests</h3>
                                                <span class="text-sm">{{ $booking->adults }} Occupant/s</span>


                                            </div>

                                        </div>
                                    </div>


                                </div>

                            </div>




                            <!-- Payment Section -->
                            <div class="flex-initial  w-full lg:w-2/5 ">
                                <div class=" mb-4 p-6 mt-4 shadow-md border-2 border-gray-300 lg:rounded-lg">



                                    <div class=" mb-6 text-2xl font-semibold">
                                        Price details <span
                                            class="text-sm text-gray-600">{{ $booking->payment_status }}</span>
                                    </div>

                                    <div class="">
                                        <div class="flex items-center justify-between w-full md:w-2/4">
                                            <div>
                                                <h3 class="text-base text-gray-900 underline">₱ @convert($booking->price_per_night) ×
                                                    {{ $booking->days }}</h3>
                                            </div>
                                            <div class="mt-2">
                                                ₱ {{ $booking->pending_total }}
                                            </div>
                                        </div>
                                    </div>


                                    <div class="mt-4">
                                        <div class="flex items-center justify-between w-full md:w-2/4">
                                            <div>
                                                <h3 class="text-base text-gray-900 underline">Service Fee</h3>
                                            </div>
                                            <div class="mt-2">
                                                ₱ @convert($booking->service_fee)
                                            </div>
                                        </div>
                                    </div>

                                    @if ($booking->payment_status == 'Half Paid')
                                        <div class="mt-6">
                                            <div class="flex items-center justify-between w-full md:w-2/4">
                                                <div>
                                                    <h3 class="text-base text-gray-900 font-bold">Paid</h3>
                                                </div>
                                                <div class="mt-2">
                                                    <h3 class=" text-lg font-semibold">₱
                                                        @convert($booking->total_paid)</h3>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="">
                                            <div class="flex items-center justify-between w-full md:w-2/4">
                                                <div>
                                                    <h3 class="text-base text-gray-900 font-bold">Balance</h3>
                                                </div>
                                                <div class="mt-2">
                                                    <h3 class=" text-lg font-semibold">₱
                                                        @convert($booking->total - $booking->total_paid)</h3>
                                                </div>
                                            </div>
                                        </div>
                                    @endif

                                    <div class="mt-2">
                                        <div class="flex items-center justify-between w-full md:w-2/4">
                                            <div>
                                                <h3 class="text-base text-gray-900 font-bold">Total</h3>
                                            </div>
                                            <div class="mt-2">
                                                <h3 class=" mb-4 text-xl font-semibold">₱
                                                    @convert($booking->total)</h3>
                                            </div>
                                        </div>
                                    </div>

                                    @if ($booking->payment_method == 'Gcash Payment')
                                        <div class="col-span-6 sm:col-span-6 lg:col-span-3">
                                            <div>
                                                <label class="block text-sm font-medium text-gray-700">
                                                    Receipt
                                                    <span class="text-xs font-bold "> (
                                                        @if ($booking->payment_approved_at == null)
                                                            Waiting for your approval
                                                        @else
                                                            Approved
                                                        @endif
                                                        )
                                                    </span>
                                                </label>
                                                <div
                                                    class="mt-1 flex justify-center items-center border-2 border-gray-300 border-dashed rounded-md">
                                                    <div class="flex flex-col place-items-center space-y-1 text-center">
                                                        <img id="output"
                                                            src="{{ asset('storage/media/booking/receipt_' . $booking->booking_id . '_' . $booking->payment_proof) }}"
                                                            style="width:400px;height:300px;">
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    @endif




                                    <div class="border-b-2 border-gray-30 my-6"></div>

                                    @if ($booking->payment_status == 'Half Paid')
                                        {{-- form --}}
                                        <form action="{{ route('complete_payment.booking', [$booking->booking_id]) }}"
                                            method="POST" id="payment">
                                            @csrf

                                        </form>

                                        <div id="paypal-button-container"></div>
                                    @endif


                                    <div class="flex justify-between">

                                        <a href="{{ route('admin.bookings') }}">
                                            <button type="button"
                                                class=" text-gray-900 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-200 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 ">
                                                Go to bookings
                                            </button>
                                        </a>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>



                </div>
            </div>


        </div>
    </div>


    @push('scripts')
        <script>
            $(document).ready(function() {

                $(".search_btn").click(function() {
                    $("#search_tbl").submit();
                });
            });

            $(".archive-booking").click(function(e) {
                e.preventDefault();
                swal({
                        title: "Are you sure to Complete this booking?",
                        text: "Once you complete it, you can't change it's status.",
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
