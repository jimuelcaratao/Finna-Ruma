<x-global-layout>
    @push('styles')
    @endpush

    <div class="w-11/12 my-12 mx-auto">
        {{-- <h1 class="text-center text-3xl sm:text-4xl font-bold">My Wish list</h1> --}}

        <div class="mt-12 flex flex-col justify-center items-center space-y-5 md:space-x-3">
            <div class="p-4 bg-white shadow-md w-11/12 md:w-4/5">
                <h1 class="text-left text-xl font-bold">
                    Order No. : {{ $booking->booking_id }}
                </h1>
                <hr class="my-2 border-b border-gray-500">
                <div class="container my-12 mx-auto px-4 md:px-12">
                    <div class="flex flex-wrap -mx-1 lg:-mx-4">

                        <div class="mt-10 sm:mt-0">
                            <div class="md:grid md:grid-cols-3 md:gap-6">
                                <div class="md:col-span-1">
                                    <div class="px-4 sm:px-0">
                                        <h3 class="text-lg font-medium leading-6 text-gray-900">Submit payment proof on
                                            <span class="font-bold">{{ $booking->listing->listing_title }}</span>
                                        </h3>
                                    </div>

                                    <div class="mt-8">
                                        <h5 class="text-lg font-bold mb-2">Your Trip</h5>

                                        <h3 class=" font-bold">Dates <span
                                                class="text-sm text-gray-400 font-normal">({{ $booking->days }}
                                                days)</span></h3>
                                        <span class="text-sm">{{ $booking->check_in }} -
                                            {{ $booking->checkout }}</span>

                                        <h3 class=" font-bold mt-2">Guests</h3>
                                        <span class="text-sm">{{ $booking->adults }} Adults,
                                            {{ $booking->children }} Children, {{ $booking->infants }}
                                            Infants, {{ $booking->pets }} Pets </span>

                                    </div>
                                </div>
                                <div class="mt-5 md:mt-0 md:col-span-2">

                                    <form action="{{ route('submit_receipt.store', [$booking->booking_id]) }}"
                                        method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <div class="overflow-hidden sm:rounded-md">
                                            <div class="px-4 py-5 bg-white sm:p-6">
                                                <div class="grid grid-cols-6 gap-6">


                                                    <div class="col-span-6 ">
                                                        <div>
                                                            <label class="block text-sm font-medium text-gray-700">
                                                                Receipt
                                                            </label>
                                                            <div
                                                                class="mt-1 flex justify-center px-6 py-2 border-2 border-gray-300 border-dashed rounded-md">
                                                                <div class="space-y-1 text-center">

                                                                    <img id="output_default_photo"
                                                                        class="cursor-pointer mb-4"
                                                                        src="{{ asset('img/global/cover-img.svg') }}"
                                                                        style="width:600px;height:500px;">

                                                                    <div class="flex text-sm text-gray-600 ">
                                                                        <label for="payment_proof"
                                                                            class="relative cursor-pointer bg-white rounded-md font-medium text-indigo-600 hover:text-indigo-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-indigo-500">
                                                                            <span class="">Upload a
                                                                                file</span>
                                                                            <input id="payment_proof"
                                                                                name="payment_proof" type="file"
                                                                                required class="sr-only"
                                                                                accept=".jpg,.gif,.png,.jpeg">
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
                                            </div>
                                            <div class="px-4 py-3  text-right sm:px-6">
                                                <button type="submit"
                                                    class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-gray-800 hover:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                                    Submit
                                                </button>
                                            </div>
                                        </div>
                                    </form>
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
            // edit_is_customizable
            $('#output_default_photo').click(function() {
                $('#payment_proof').trigger('click');
            });

            $(document).on("change", "#payment_proof", function() {
                document.getElementById('output_default_photo').src = window.URL.createObjectURL(this.files[
                    0])
            });
        </script>
    @endpush

</x-global-layout>
