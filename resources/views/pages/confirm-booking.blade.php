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

                    <div class="flex justify-center lg:my-8">
                        <!-- Row -->
                        <div class="w-full flex-1 md:flex">

                            <!-- Col -->
                            <div class="flex-initial w-full lg:w-3/5 lg:block bg-white lg:mr-10 px-4 lg:px-0">
                                <div class=" mb-4">

                                    <div class="flex justify-between gap-10">
                                        <div>
                                            <h3 class="pt-4 mb-2 text-3xl font-semibold">
                                                Confirm and Pay
                                            </h3>
                                            <h3 class="pt-4 mb-2 text-xl ">{{ $listing->listing_title }}
                                            </h3>
                                            <a class="text-sm font-medium text-gray-700 underline">
                                                {{ $listing->location }}</a>

                                            <!-- Breadcrumb -->
                                            <nav class="flex" aria-label="Breadcrumb">
                                                <ol class="inline-flex items-center space-x-1 md:space-x-3">
                                                    <li class="inline-flex items-center">
                                                        <span
                                                            class="inline-flex items-center text-sm font-medium text-gray-700">
                                                            {{ $listing->max_guest }} guests
                                                        </span>
                                                    </li>
                                                    <li>
                                                        <div class="flex items-center">
                                                            <span class="mx-1">
                                                                •
                                                            </span>
                                                            <span
                                                                class="ml-1 text-sm font-medium text-gray-700 md:ml-2 ">{{ $listing->bedrooms }}
                                                                bedrooms</span>
                                                        </div>
                                                    </li>
                                                    <li aria-current="page">
                                                        <div class="flex items-center">
                                                            <span class="mx-1">
                                                                •
                                                            </span>

                                                            <span
                                                                class="ml-1 text-sm font-medium text-gray-700 md:ml-2">{{ $listing->beds }}
                                                                beds</span>
                                                        </div>
                                                    </li>

                                                    <li aria-current="page">
                                                        <div class="flex items-center">
                                                            <span class="mx-1">
                                                                •
                                                            </span>

                                                            <span
                                                                class="ml-1 text-sm font-medium text-gray-700 md:ml-2">{{ $listing->bathrooms }}
                                                                baths
                                                            </span>
                                                        </div>
                                                    </li>
                                                </ol>
                                            </nav>

                                            <div class=" inline-flex mt-4 ">
                                                @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                                                    <span
                                                        class="flex text-sm border-2 border-transparent rounded-full focus:outline-none focus:border-gray-300 transition">
                                                        <img class="h-12 w-12 rounded-full object-cover"
                                                            src="{{ $listing->user->profile_photo_url }}"
                                                            alt="{{ $listing->user->name }}" />
                                                    </span>
                                                @else
                                                    <span class="inline-flex rounded-md">
                                                        <span
                                                            class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition">
                                                            {{ $listing->user->name }}

                                                            <svg class="ml-2 -mr-0.5 h-5 w-5"
                                                                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                                                fill="currentColor">
                                                                <path fill-rule="evenodd"
                                                                    d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                                                    clip-rule="evenodd" />
                                                            </svg>
                                                        </span>
                                                    </span>
                                                @endif
                                                <span class="align-middle mt-4 ml-2 font-bold text-sm">
                                                    Hosted by: {{ $listing->user->name }}</span>
                                            </div>

                                            {{-- Your Trip --}}
                                            <div class="mt-8">
                                                <h5 class="text-lg font-bold mb-2">Your Trip</h5>

                                                <h3 class=" font-bold">Dates</h3>
                                                <span class="text-sm">{{ $booking->check_in }} -
                                                    {{ $booking->checkout }} </span>

                                                <h3 class=" font-bold mt-2">Guests</h3>
                                                <span class="text-sm">{{ $booking->adults }} Adults,
                                                    {{ $booking->children }} Children</span>
                                            </div>

                                        </div>
                                    </div>

                                    {{-- borderb --}}
                                    <div class="border-b-2 border-gray-30 my-6"></div>




                                </div>

                            </div>




                            <!-- Payment Section -->
                            <div class="flex-initial  w-full lg:w-2/5 ">
                                <div class=" mb-4 p-6 mt-4 shadow-md border-2 border-gray-300 lg:rounded-lg">



                                    <div class=" mb-6 text-2xl font-semibold">
                                        Price details
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

                                    <div class="mt-4">
                                        <div class="flex items-center justify-between w-full md:w-2/4">
                                            <div>
                                                <h3 class="text-base text-gray-900 font-bold">Total</h3>
                                            </div>
                                            <div class="mt-2">
                                                <h3 class=" mb-2 text-xl font-semibold ">₱
                                                    @convert($booking->total)</h3>

                                            </div>
                                        </div>
                                    </div>

                                    <div class="">
                                        <div class="flex items-center justify-between w-full md:w-2/4">
                                            <div>
                                                <h3 class="text-base text-gray-900 font-bold">To pay:</h3>
                                            </div>
                                            <div class="mt-2">
                                                <h3 class=" mb-4 text-lg font-semibold to-pay">₱
                                                    @convert($booking->total)</h3>

                                            </div>
                                        </div>
                                    </div>

                                    <div class="border-b-2 border-gray-30 my-6"></div>
                                    {{-- form --}}
                                    <form action="{{ route('payment.booking', [$booking->booking_id]) }}"
                                        method="POST" id="payment">
                                        @csrf

                                        <input type="text" class="hidden" name="payment_method" id="payment_method">

                                        <input type="text" class="hidden" name="booking_status" id="booking_status"
                                            value="Confirmed Reservation">

                                        <input type="text" class="hidden" name="total_paid" id="total_paid"
                                            value="{{ $booking->total }}">

                                        <div class="grid grid-cols-1   gap-2 items-center justify-center mb-4"
                                            id="rd-btn">
                                            <div class="rd-btns">
                                                <input class="hidden" type="radio" name="payment_status"
                                                    id="radio_1" value="Fully Paid" checked>
                                                <label
                                                    class="flex flex-col p-4 border  rounded-lg border-gray-200 cursor-pointer"
                                                    for="radio_1">
                                                    <span class="text-md font-bold text-center" for="radio_1">Full
                                                        payment</span>
                                                </label>
                                            </div>
                                            {{-- <div class="rd-btns">
                                                <input class="hidden" type="radio" name="payment_status"
                                                    id="radio_2" value="Half Paid">
                                                <label
                                                    class="flex flex-col p-4 border shadow rounded-lg border-gray-200  transition-shadow cursor-pointer"
                                                    for="radio_2">
                                                    <span class="text-md font-bold text-center " for="radio_2">Half
                                                        Payment</span>
                                                </label>
                                            </div> --}}
                                        </div>


                                        {{-- gcash --}}

                                        @if ($listing->gcash_qr != null)
                                            <button type="button" data-modal-toggle="popup-modal"
                                                class="w-full  text-gray-900 bg-white hover:bg-gray-100 border border-gray-200 focus:ring-4 focus:outline-none focus:ring-gray-100 font-medium rounded-lg text-sm px-5 py-3 text-center inline-flex items-center  mr-2 mb-3">

                                                <span class="mx-auto inline-flex">
                                                    <img width="80px" height="70px"
                                                        src="{{ asset('img/global/gcash.png') }}" alt="Gcash">
                                                    <span class="ml-4"> Pay with Gcash</span>
                                                </span>
                                            </button>
                                        @endif


                                    </form>

                                    <div style="z-index: 500;" id="paypal-button-container"></div>
                                </div>
                            </div>
                        </div>
                    </div>



                </div>
            </div>

        </div>
    </div>


    <div id="popup-modal" tabindex="-1" style="z-index: 1000;"
        class="hidden overflow-y-auto overflow-x-hidden bg-gray-100 fixed top-0 right-0 left-0 md:inset-0 h-modal md:h-full">
        <div class="relative p-4 w-full max-w-md h-full md:h-auto " style="">
            <div class="relative bg-white rounded-lg shadow">
                <button type="button"
                    class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center "
                    data-modal-toggle="popup-modal">
                    <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                            clip-rule="evenodd"></path>
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
                <div class="p-6 text-center">

                    <img class="my-6"
                        src="{{ asset('storage/media/listing/gcash_' . $listing->listing_id . '_' . $listing->gcash_qr) }}"
                        alt="gcash" style="width:600px;height:350px;">

                    <div class="mt-4">
                        <div class="flex items-center justify-between w-full md:w-2/4">
                            <div>
                                <h3 class="text-base text-gray-900 font-bold">Total</h3>
                            </div>
                            <div class="mt-2">
                                <h3 class=" mb-4 text-xl font-semibold to-pay">₱
                                    @convert($booking->total)</h3>
                            </div>
                        </div>
                    </div>


                    <h3 class="mb-5 text-lg font-normal text-gray-500 ">Important note: Press proceed if you paid your
                        payment, and
                        keep the receipt for payment proof.</h3>

                    <button data-modal-toggle="popup-modal" type="button" id="proceed"
                        class="text-white bg-blue-600 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-red-300  font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center mr-2">
                        Proceed
                    </button>
                    <button data-modal-toggle="popup-modal" type="button"
                        class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 ">No,
                        cancel</button>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
        <script src="https://unpkg.com/flowbite@1.4.7/dist/flowbite.js"></script>
        <script src="https://unpkg.com/flowbite@1.4.7/dist/datepicker.js"></script>
        <script
            src="https://www.paypal.com/sdk/js?client-id=AX0Ff2y0zUSeiMumlF0aYvHyeQ5FFkK7VwGY6QCR5iRUybBGzPOPtavGFpjER-kWUTDLf48YAOBh_jap&currency=PHP">
        </script>

        <script>
            function textAreaAdjust(element) {
                element.style.height = "1px";
                element.style.height = (25 + element.scrollHeight) + "px";
            }

            $(document).ready(function() {
                total = '{{ $booking->total }}';
                total_half = total / 2;

                $("#proceed").click(function() {

                    $("#payment_method").val('Gcash Payment');

                    $("#booking_status").val('Waiting for payment proof');

                    $('form#payment').submit();

                });

                $(".rd-btns").click(function() {
                    if ($('#radio_1').is(':checked')) {
                        final_payment = total;

                        // $(".to-pay").text('₱ ' + final_payment);
                        $("#total_paid").val(total);
                    }

                    if ($('#radio_2').is(':checked')) {
                        final_payment = total_half;
                        // $(".to-pay").text('₱ ' + final_payment);
                        $("#total_paid").val(total_half);

                    }
                });


                paypal.Buttons({
                    // Sets up the transaction when a payment button is clicked
                    createOrder: function(data, actions) {

                        if ($('#radio_1').is(':checked')) {
                            final_payment = total;
                        }

                        if ($('#radio_2').is(':checked')) {
                            final_payment = total_half;
                        }

                        return actions.order.create({
                            purchase_units: [{
                                amount: {
                                    value: final_payment // Can reference variables or functions. Example: `value: document.getElementById('...').value`
                                }
                            }]
                        });
                    },

                    // Finalize the transaction after payer approval
                    onApprove: function(data, actions) {
                        return actions.order.capture().then(function(orderData) {
                            // Successful capture! For dev/demo purposes:
                            console.log('Capture result', orderData, JSON.stringify(orderData, null,
                                2));
                            var transaction = orderData.purchase_units[0].payments.captures[0];
                            alert('Transaction ' + transaction.status + ': ' + transaction.id +
                                '\n\nSee console for all available details');

                            $("#payment_method").val('Paypal Payment');
                            $('form#payment').submit();
                        });
                    }
                }).render('#paypal-button-container');

                var pending = $('#pending-total');
                var total_days = $('#total-days');
                var price_night = $('#price_night').val();
                var service_fee = $('#service_fee').val();


                function treatAsUTC(date) {
                    var result = new Date(date);
                    result.setMinutes(result.getMinutes() - result.getTimezoneOffset());
                    return result;
                }

                function daysBetween(startDate, endDate) {
                    var millisecondsPerDay = 24 * 60 * 60 * 1000;
                    return (treatAsUTC(endDate) - treatAsUTC(startDate)) / millisecondsPerDay;
                }


                $('#check-in').focusout(function() {
                    var first = $('#check-in').val();
                    var second = $('#checkout').val();
                    var days = daysBetween(first, second);

                    $('#total-days').text(days);

                    $('#days').val(days);
                    $('#pending-total').val((price_night * days).toLocaleString());

                    var service = parseInt(service_fee);
                    var get_total = (price_night * days) + service;
                    $('#total').val((get_total).toLocaleString());
                    $('#total-fee').show();

                });

                $('#checkout').focusout(function() {
                    var first = $('#check-in').val();
                    var second = $('#checkout').val();
                    var days = daysBetween(first, second);

                    $('#total-days').text(days);
                    $('#pending-total').val((price_night * days).toLocaleString());

                    var service = parseInt(service_fee);
                    var get_total = (price_night * days) + service;
                    $('#total').val((get_total).toLocaleString());
                    $('#total-fee').show();

                });

            });
        </script>
    @endpush
</x-global-layout>
