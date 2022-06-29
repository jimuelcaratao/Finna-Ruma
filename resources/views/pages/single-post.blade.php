<x-global-layout>

    @push('styles')
        <style>
            .mapouter {
                position: relative;
                text-align: right;
                height: 500px;
                width: 100%;
            }
        </style>
        <style>
            .gmap_canvas {
                overflow: hidden;
                background: none !important;
                height: 500px;
                width: 100%;

            }
        </style>
    @endpush
    <div class="lg:pb-12 lg:pt-6">
        <div class="max-w-screen-2xl mx-auto sm:px-6 lg:px-24">


            <div id="indicators-carousel" class="relative" data-carousel="slide">

                <div class="overflow-hidden relative h-48 rounded-lg sm:h-64 xl:h-80 2xl:h-96">

                    <div class="duration-700 ease-in-out absolute inset-0 transition-all transform translate-x-0 z-20"
                        data-carousel-item="active" id="sad0">
                        <img src="{{ asset('img/hotel-img.jpg') }}"
                            class="block absolute top-1/2 left-1/2 w-full -translate-x-1/2 -translate-y-1/2"
                            alt="...">
                    </div>

                    <div class="duration-700 ease-in-out absolute inset-0 transition-all transform translate-x-full z-10"
                        data-carousel-item="" id="sad1">
                        <img src="{{ asset('img/bg-1.jpg') }}"
                            class="block absolute top-1/2 left-1/2 w-full -translate-x-1/2 -translate-y-1/2"
                            alt="...">
                    </div>

                    <div class="hidden duration-700 ease-in-out absolute inset-0 transition-all transform"
                        data-carousel-item="" id="sad2">
                        <img src="{{ asset('img/bg-2.jpg') }}"
                            class="block absolute top-1/2 left-1/2 w-full -translate-x-1/2 -translate-y-1/2"
                            alt="...">
                    </div>

                    <div class="hidden duration-700 ease-in-out absolute inset-0 transition-all transform"
                        data-carousel-item="" id="sad3">
                        <img src="{{ asset('img/bg-3.jpg') }}"
                            class="block absolute top-1/2 left-1/2 w-full -translate-x-1/2 -translate-y-1/2"
                            alt="...">
                    </div>

                    <div class="duration-700 ease-in-out absolute inset-0 transition-all transform -translate-x-full z-10"
                        data-carousel-item="" id="sad4">
                        <img src="{{ asset('img/bg-4.jpg') }}"
                            class="block absolute top-1/2 left-1/2 w-full -translate-x-1/2 -translate-y-1/2"
                            alt="...">
                    </div>
                </div>

                <div class="flex absolute bottom-5 left-1/2 z-30 space-x-3 -translate-x-1/2">
                    <button type="button" class="w-3 h-3 rounded-full bg-white " aria-current="true"
                        aria-label="Slide 1" data-carousel-slide-to="0"></button>
                    <button type="button" class="w-3 h-3 rounded-full bg-white/50  hover:bg-white "
                        aria-current="false" aria-label="Slide 2" data-carousel-slide-to="1"></button>
                    <button type="button" class="w-3 h-3 rounded-full bg-white/50  hover:bg-white "
                        aria-current="false" aria-label="Slide 3" data-carousel-slide-to="2"></button>
                    <button type="button" class="w-3 h-3 rounded-full bg-white/50  hover:bg-white "
                        aria-current="false" aria-label="Slide 4" data-carousel-slide-to="3"></button>
                    <button type="button" class="w-3 h-3 rounded-full bg-white/50  hover:bg-white "
                        aria-current="false" aria-label="Slide 5" data-carousel-slide-to="4"></button>
                </div>

                <button type="button"
                    class="flex absolute top-0 left-0 z-30 justify-center items-center px-4 h-full cursor-pointer group focus:outline-none"
                    data-carousel-prev="4">
                    <span
                        class="inline-flex justify-center items-center w-8 h-8 rounded-full sm:w-10 sm:h-10 bg-white/30  group-hover:bg-white/50  group-focus:ring-4 group-focus:ring-white  group-focus:outline-none">
                        <svg class="w-5 h-5 text-white sm:w-6 sm:h-6 " fill="none" stroke="currentColor"
                            viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7">
                            </path>
                        </svg>
                        <span class="hidden">Previous</span>
                    </span>
                </button>
                <button type="button"
                    class="flex absolute top-0 right-0 z-30 justify-center items-center px-4 h-full cursor-pointer group focus:outline-none"
                    data-carousel-next="1">
                    <span
                        class="inline-flex justify-center items-center w-8 h-8 rounded-full sm:w-10 sm:h-10 bg-white/30  group-hover:bg-white/50  group-focus:ring-4 group-focus:ring-white  group-focus:outline-none">
                        <svg class="w-5 h-5 text-white sm:w-6 sm:h-6 " fill="none" stroke="currentColor"
                            viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7">
                            </path>
                        </svg>
                        <span class="hidden">Next</span>
                    </span>
                </button>
            </div>


            {{-- content --}}
            <div>
                <div class="container mx-auto">

                    <div class="flex justify-center lg:my-8">
                        <!-- Row -->
                        <div class="w-full flex-1 md:flex">

                            <!-- Col -->
                            <div class="flex-initial w-full lg:w-3/5 lg:block bg-white lg:mr-10 px-4 lg:px-0">
                                <div class=" mb-4">
                                    <h3 class="pt-4 mb-4 text-4xl font-semibold">Explore exciting surprises</h3>
                                    <p class="mb-4 text-sm text-gray-700">
                                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Animi accusamus a
                                        iusto, numquam quisquam tempore!
                                    </p>

                                    {{-- borderb --}}
                                    <div class="border-b-2 border-gray-30 my-6"></div>

                                    <div class="w-full text-gray-900 bg-white  rounded-lg ">
                                        <p
                                            class="relative inline-flex items-center w-full  py-2  font-medium rounded-t-lg ">
                                            <svg class="w-6 h-6 mr-2 fill-current" fill="currentColor"
                                                viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd"
                                                    d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-6-3a2 2 0 11-4 0 2 2 0 014 0zm-2 4a5 5 0 00-4.546 2.916A5.986 5.986 0 0010 16a5.986 5.986 0 004.546-2.084A5 5 0 0010 11z"
                                                    clip-rule="evenodd"></path>
                                            </svg>
                                            Profile
                                        </p>
                                        <p class="relative inline-flex items-center w-full  py-2  font-medium ">
                                            <svg class="w-6 h-6 mr-2 fill-current" fill="currentColor"
                                                viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M5 4a1 1 0 00-2 0v7.268a2 2 0 000 3.464V16a1 1 0 102 0v-1.268a2 2 0 000-3.464V4zM11 4a1 1 0 10-2 0v1.268a2 2 0 000 3.464V16a1 1 0 102 0V8.732a2 2 0 000-3.464V4zM16 3a1 1 0 011 1v7.268a2 2 0 010 3.464V16a1 1 0 11-2 0v-1.268a2 2 0 010-3.464V4a1 1 0 011-1z">
                                                </path>
                                            </svg>
                                            Settings
                                        </p>
                                        <p class="relative inline-flex items-center w-full py-2  font-medium ">
                                            <svg class="w-6 h-6 mr-2 fill-current" fill="currentColor"
                                                viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd"
                                                    d="M5 3a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2V5a2 2 0 00-2-2H5zm0 2h10v7h-2l-1 2H8l-1-2H5V5z"
                                                    clip-rule="evenodd"></path>
                                            </svg>
                                            Messages
                                        </p>
                                    </div>

                                    {{-- borderb --}}
                                    <div class="border-b-2 border-gray-30 my-6"></div>


                                </div>

                            </div>



                            <!-- Payment Section -->
                            <div class="flex-initial  w-full lg:w-2/5 ">
                                <div class=" mb-4 p-5 mt-4 shadow-md border-2 border-gray-300 lg:rounded-lg">
                                    <h3 class=" mb-4 text-3xl font-semibold">10,402 <span
                                            class="text-sm text-gray-400 font-normal">night</span></h3>

                                    <div class="border-b-2 border-gray-30 my-6"></div>

                                    <button type="button"
                                        class="w-full py-2.5 px-5 mr-2 mb-2 text-sm font-medium text-gray-900 focus:outline-none  rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-200 ">Reserve</button>

                                    <div class="border-b-2 border-gray-30 my-6"></div>

                                    <h3 class=" mb-4 text-right text-xl font-semibold">10,402 <span
                                            class="text-sm text-gray-400 font-normal">total</span></h3>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="flex justify-center lg:my-8">
                        <!-- Row -->
                        <div class="w-full flex-1 md:flex">

                            <!-- Calendar -->
                            <div
                                class="flex-initial  w-full lg:w-1/2 bg-white p-5 mt-4 shadow-md border-2 border-gray-300 lg:rounded-lg">
                                <div class=" mb-4 ">



                                </div>
                            </div>

                            <!-- Reviews -->
                            <div class="flex-initial w-full lg:w-1/2 lg:block bg-white lg:mr-10 px-4 lg:px-0">
                                <div class=" mb-4 ml-6">
                                    <h3 class="pt-4 mb-4 text-2xl font-semibold">Reviews</h3>

                                    <article class=" md:grid md:grid-cols-3">
                                        <div>
                                            <div class="flex items-center mb-6 space-x-4">
                                                <img class="w-10 h-10 rounded-full"
                                                    src="/docs/images/people/profile-picture-5.jpg" alt="">
                                                <div class="space-y-1 font-medium ">
                                                    <p>Jese Leos</p>
                                                </div>
                                            </div>
                                            <ul class="space-y-4 text-sm text-gray-500 ">
                                                <li class="flex items-center"><svg class="w-4 h-4 mr-1.5"
                                                        fill="currentColor" viewBox="0 0 20 20"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <path fill-rule="evenodd"
                                                            d="M4 4a2 2 0 012-2h8a2 2 0 012 2v12a1 1 0 110 2h-3a1 1 0 01-1-1v-2a1 1 0 00-1-1H9a1 1 0 00-1 1v2a1 1 0 01-1 1H4a1 1 0 110-2V4zm3 1h2v2H7V5zm2 4H7v2h2V9zm2-4h2v2h-2V5zm2 4h-2v2h2V9z"
                                                            clip-rule="evenodd"></path>
                                                    </svg>Apartament with City View</li>
                                                <li class="flex items-center"><svg class="w-4 h-4 mr-1.5"
                                                        fill="currentColor" viewBox="0 0 20 20"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <path fill-rule="evenodd"
                                                            d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z"
                                                            clip-rule="evenodd"></path>
                                                    </svg>3 nights December 2021</li>
                                                <li class="flex items-center"><svg class="w-4 h-4 mr-1.5"
                                                        fill="currentColor" viewBox="0 0 20 20"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <path
                                                            d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v3h8v-3zM6 8a2 2 0 11-4 0 2 2 0 014 0zM16 18v-3a5.972 5.972 0 00-.75-2.906A3.005 3.005 0 0119 15v3h-3zM4.75 12.094A5.973 5.973 0 004 15v3H1v-3a3 3 0 013.75-2.906z">
                                                        </path>
                                                    </svg>Family</li>
                                            </ul>
                                        </div>
                                        <div class="col-span-2 mt-6 md:mt-0">
                                            <div class="flex items-start mb-5">
                                                <div class="pr-2">
                                                    <footer>
                                                        <p class="mb-2 text-sm text-gray-500 ">
                                                            Reviewed: <time datetime="2022-01-20 19:00">January 20,
                                                                2022</time></p>
                                                    </footer>
                                                    <h4 class="text-xl font-bold text-gray-900 ">
                                                        Spotless, good appliances, excellent layout, host was genuinely
                                                        nice and helpful.</h4>
                                                </div>
                                                <p
                                                    class="bg-blue-700 text-white text-sm font-semibold inline-flex items-center py-1.5 px-3 rounded">
                                                    4</p>
                                            </div>
                                            <p class="mb-2 font-light text-gray-500 ">The flat was
                                                spotless, very comfortable, and the host was amazing. I highly recommend
                                                this accommodation for anyone visiting Brasov city centre.</p>

                                            <aside class="flex align-center mt-3 space-x-5">
                                                <a href="#"
                                                    class="inline-flex items-center text-sm font-medium text-blue-600 hover:underline ">
                                                    <svg class="w-4 h-4 mr-1.5" fill="currentColor"
                                                        viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                        <path
                                                            d="M2 10.5a1.5 1.5 0 113 0v6a1.5 1.5 0 01-3 0v-6zM6 10.333v5.43a2 2 0 001.106 1.79l.05.025A4 4 0 008.943 18h5.416a2 2 0 001.962-1.608l1.2-6A2 2 0 0015.56 8H12V4a2 2 0 00-2-2 1 1 0 00-1 1v.667a4 4 0 01-.8 2.4L6.8 7.933a4 4 0 00-.8 2.4z">
                                                        </path>
                                                    </svg>
                                                    Helpful
                                                </a>
                                                <a href="#"
                                                    class="inline-flex items-center text-sm font-medium text-blue-600 hover:underline  group">
                                                    <svg class="w-4 h-4 mr-1.5" fill="currentColor"
                                                        viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                        <path
                                                            d="M18 9.5a1.5 1.5 0 11-3 0v-6a1.5 1.5 0 013 0v6zM14 9.667v-5.43a2 2 0 00-1.105-1.79l-.05-.025A4 4 0 0011.055 2H5.64a2 2 0 00-1.962 1.608l-1.2 6A2 2 0 004.44 12H8v4a2 2 0 002 2 1 1 0 001-1v-.667a4 4 0 01.8-2.4l1.4-1.866a4 4 0 00.8-2.4z">
                                                        </path>
                                                    </svg>
                                                    Not helpful
                                                </a>
                                            </aside>
                                        </div>
                                    </article>

                                    <div class="mt-4 text-sm text-center underline">See all reviews</div>
                                    {{-- borderb --}}
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

            {{-- Maps --}}
            <div>
                <div class="mapouter">
                    <div class="gmap_canvas  lg:rounded-lg py-8"><iframe width="100%" height="400"
                            id="gmap_canvas"
                            src="https://maps.google.com/maps?q=2880%20Broadway,%20New%20York&t=&z=13&ie=UTF8&iwloc=&output=embed"
                            frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe>

                    </div>
                </div>
            </div>

        </div>
    </div>

    @push('scripts')
        <script src="https://unpkg.com/flowbite@1.4.7/dist/flowbite.js"></script>
        <script src="https://unpkg.com/flowbite@1.4.7/dist/datepicker.js"></script>
    @endpush
</x-global-layout>
