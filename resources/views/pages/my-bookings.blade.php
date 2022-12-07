<x-global-layout>

    @push('styles')
        <style>
            .mapouter {
                position: relative;
                text-align: right;
                height: 500px;
                width: 100%;
            }

            .gmap_canvas {
                overflow: hidden;
                background: none !important;
                height: 500px;
                width: 100%;

            }

            input:checked+label {
                border-color: #979797;
                box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
                transition: ease-out .2s;
            }


            input[type="number"] {
                -webkit-appearance: textfield;
                -moz-appearance: textfield;
                appearance: textfield;
            }

            input[type="number"]::-webkit-inner-spin-button,
            input[type="number"]::-webkit-outer-spin-button {
                -webkit-appearance: none;
            }

            .number-input {
                display: inline-flex;
            }

            .number-input,
            .number-input * {
                box-sizing: border-box;
            }

            .number-input button {
                outline: none;
                -webkit-appearance: none;
                background-color: #ffffff;
                border: none;
                align-items: center;
                justify-content: center;
                width: 40px;
                cursor: pointer;
                margin: 0;
                position: relative;
                padding: 0;
                border-radius: 40px;
                border: 2px solid #ddd;

            }

            .number-input button:hover {
                background-color: #f8f8f8;
            }

            .number-input button:before,
            .number-input button:after {
                display: inline-block;
                position: absolute;
                content: "";
                width: 0.5rem;
                height: 2px;
                background-color: #212121;
                transform: translate(-50%, -50%);
            }

            .number-input button.plus:after {
                transform: translate(-50%, -50%) rotate(90deg);
            }

            .number-input input[type="number"] {
                font-family: sans-serif;
                max-width: 4.5rem;
                padding: 0.5rem;
                border: 0;
                text-align: center;
                outline: none;
            }

            .number-input {}

            .text-star {
                background-color: gold;
            }
        </style>
    @endpush
    <div class="lg:pb-12 lg:pt-6">
        <div class="max-w-screen-2xl mx-auto sm:px-6 lg:px-24">

            {{-- content --}}
            <div>
                <div class="container mx-auto">


                    <h3 class="font-bold text-4xl mt-6">My bookings</h3>

                    <div class="flex justify-center lg:my-8">

                        <!-- Row -->
                        <div class="w-full flex-1 md:flex gap-10">

                            <div class="grid grid-cols-3 gap-10">
                                @forelse ($bookings as $booking)
                                    <!-- Cards -->
                                    <div class="flex-initial  w-full ">
                                        <div class=" mb-4 p-6 mt-4 shadow-md border-2 border-gray-300 lg:rounded-lg">



                                            <div class="inline-flex ">
                                                <a href="{{ route('single-list', [$booking->listing->slug]) }}"> <img
                                                        src="{{ asset('storage/media/listing/cover_' . $booking->listing->listing_id . '_' . $booking->listing->default_photo) }}"
                                                        class="w-58 h-36 rounded-md">
                                                </a>
                                                <div class="pl-4">
                                                    <span
                                                        class="mb-2 bg-blue-100 text-blue-800 text-xs font-medium inline-flex items-center px-2.5 py-0.5 rounded ">

                                                        {{ $booking->booking_status }}
                                                    </span>

                                                    <a href="{{ route('single-list', [$booking->listing->slug]) }}"
                                                        class="font-bold text-sm block">
                                                        {{ $booking->listing->listing_title }}

                                                    </a>
                                                    <a class="text-xs font-medium text-gray-700 underline">
                                                        {{ $booking->listing->location }}</a>
                                                    <p class="text-xs text-gray-700">{{ $booking->listing->max_guest }}
                                                        guests•{{ $booking->listing->beds }}
                                                        beds•{{ $booking->listing->bathrooms }}
                                                        baths</p>
                                                </div>

                                            </div>
                                            <div class="border-b-2 border-gray-30 my-5"></div>

                                            <div class="mt-8">
                                                <h5 class="text-lg font-bold mb-2">Your Stay</h5>

                                                <h3 class=" font-bold">Dates <span
                                                        class="text-sm text-gray-400 font-normal">({{ $booking->days }}
                                                        days)</span></h3>
                                                <span class="text-sm">{{ $booking->check_in }} -
                                                    {{ $booking->checkout }}</span>

                                                <h3 class=" font-bold mt-2">Occupants</h3>
                                                <span class="text-sm">{{ $booking->adults }} Occupant/s
                                                </span>

                                                <h3 class=" font-bold mt-2">Payment Status</h3>
                                                <span class="text-sm">{{ $booking->payment_status }}</span>
                                            </div>


                                            <div class="border-b-2 border-gray-30 my-5"></div>
                                            <div class="text-right">

                                                @if ($booking->booking_status == 'Waiting for payment approval')
                                                    <a href="{{ route('booking', [$booking->booking_id]) }}">
                                                        <button type="button"
                                                            class=" text-gray-900 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-200 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 ">
                                                            View
                                                        </button>
                                                    </a>
                                                @endif

                                                @if ($booking->booking_status == 'Waiting for payment proof')
                                                    <a
                                                        href="{{ route('submit_receipt', [$booking->booking_id, $booking->listing->listing_id]) }}">
                                                        <button type="button"
                                                            class=" text-gray-900 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-200 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 ">
                                                            Submit receipt
                                                        </button>
                                                    </a>

                                                    <a href="{{ route('booking', [$booking->booking_id]) }}">
                                                        <button type="button"
                                                            class=" text-gray-900 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-200 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 ">
                                                            View
                                                        </button>
                                                    </a>
                                                @endif


                                                @if ($booking->booking_status == 'Pending Confirmation')
                                                    <div class="inline-flex">
                                                        <a
                                                            href="{{ route('confirm-booking', [$booking->listing->slug, $booking->booking_id]) }}">
                                                            <button type="button"
                                                                class=" text-gray-900 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-200 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 ">
                                                                Confirm
                                                            </button>
                                                        </a>

                                                        <form class="delete-listing ml-2"
                                                            action="{{ route('cancel.booking', [$booking->booking_id]) }}"
                                                            method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                            <a type="submit">
                                                                <button type="button"
                                                                    class=" text-gray-900 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-200 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 ">
                                                                    Cancel
                                                                </button>
                                                            </a>
                                                        </form>
                                                    </div>
                                                @endif

                                                @if ($booking->booking_status == 'Confirmed Reservation')
                                                    <a href="{{ route('booking', [$booking->booking_id]) }}">
                                                        <button type="button"
                                                            class=" text-gray-900 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-200 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 ">
                                                            View
                                                        </button>
                                                    </a>
                                                @endif

                                                @if ($booking->booking_status == 'Complete')
                                                    @if ($booking->reviewed_at == null)
                                                        <a
                                                            href="{{ route('write_review', [$booking->booking_id, $booking->listing->listing_id]) }}">
                                                            <button type="button"
                                                                class=" text-gray-900 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-200 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 ">
                                                                Review
                                                            </button>
                                                        </a>
                                                    @else
                                                        <a
                                                            href="{{ route('single-list', [$booking->listing->slug]) }}">
                                                            <button type="button"
                                                                class=" text-gray-900 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-200 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 ">
                                                                Book Again
                                                            </button>
                                                        </a>

                                                        <a href="{{ route('booking', [$booking->booking_id]) }}">
                                                            <button type="button"
                                                                class=" text-gray-900 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-200 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 ">
                                                                View
                                                            </button>
                                                        </a>
                                                    @endif
                                                @endif



                                            </div>


                                        </div>
                                    </div>
                                @empty
                                    <div class="flex flex-col md:flex-row mx-auto">
                                        <div class="px-4 w-full flex flex-col justify-around ">
                                            <img src="{{ asset('img/wishlist.svg') }}" alt="No wish"
                                                class="block h-2/4 w-2/4  mx-auto">
                                            <p class="font-bold block mx-auto">No Bookings. Explore more.</p>
                                        </div>
                                    </div>
                                @endforelse
                            </div>




                        </div>
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
                        title: "Are you sure to cancel?",
                        text: "Once you cancelled, theres no turning back!",
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
</x-global-layout>
