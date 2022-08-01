<div class="pt-4 mb-4 text-xl font-semibold inline-flex">Reviews
    <span>

        <span class="flex items-center ml-2 mt-1">
            @php
                $list_ave_reviews = App\Models\ListingReview::where('listing_id', $listing->listing_id)->avg('stars');
                $list_count_reviews = App\Models\ListingReview::where('listing_id', $listing->listing_id)->count();
            @endphp

            <svg class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                <path
                    d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                </path>
            </svg>
            <p class="ml-2 text-sm font-bold text-gray-900 ">
                {{ round($list_ave_reviews, 0) }}</p>
            <span class="w-1 h-1 mx-1.5 bg-gray-500 rounded-full "></span>
            <a href="#"
                class="text-sm font-medium text-gray-900 underline hover:no-underline ">{{ $list_count_reviews }}
                reviews</a>
        </span>
    </span>
</div>

<div class="flex justify-center lg:my-8">
    <!-- Row -->
    <div class="w-full flex-1 md:flex">
        <!-- Reviews -->
        <div class="flex-initial w-full lg:w-1/2 lg:block bg-white lg:mr-10 px-4 lg:px-0">
            <div class=" mb-4 ml-6">

                <article class=" md:grid md:grid-cols-3">
                    <div>
                        <div class="flex items-center mb-6 space-x-4">
                            <img class="w-10 h-10 rounded-full" src="/docs/images/people/profile-picture-5.jpg"
                                alt="">
                            <div class="space-y-1 font-medium ">
                                <p>Jese Leos</p>
                            </div>
                        </div>
                        <ul class="space-y-4 text-sm text-gray-500 ">
                            <li class="flex items-center"><svg class="w-4 h-4 mr-1.5" fill="currentColor"
                                    viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M4 4a2 2 0 012-2h8a2 2 0 012 2v12a1 1 0 110 2h-3a1 1 0 01-1-1v-2a1 1 0 00-1-1H9a1 1 0 00-1 1v2a1 1 0 01-1 1H4a1 1 0 110-2V4zm3 1h2v2H7V5zm2 4H7v2h2V9zm2-4h2v2h-2V5zm2 4h-2v2h2V9z"
                                        clip-rule="evenodd"></path>
                                </svg>Apartament with City View</li>
                            <li class="flex items-center"><svg class="w-4 h-4 mr-1.5" fill="currentColor"
                                    viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z"
                                        clip-rule="evenodd"></path>
                                </svg>3 nights December 2021</li>
                            <li class="flex items-center"><svg class="w-4 h-4 mr-1.5" fill="currentColor"
                                    viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
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
                                    Spotless, good appliances, excellent layout, host was
                                    genuinely
                                    nice and helpful.</h4>
                            </div>
                            <p
                                class="bg-blue-700 text-white text-sm font-semibold inline-flex items-center py-1.5 px-3 rounded">
                                4</p>
                        </div>
                        <p class="mb-2 font-light text-gray-500 ">The flat was
                            spotless, very comfortable, and the host was amazing. I highly
                            recommend
                            this accommodation for anyone visiting Brasov city centre.</p>

                        <aside class="flex align-center mt-3 space-x-5">
                            <a href="#"
                                class="inline-flex items-center text-sm font-medium text-blue-600 hover:underline ">
                                <svg class="w-4 h-4 mr-1.5" fill="currentColor" viewBox="0 0 20 20"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M2 10.5a1.5 1.5 0 113 0v6a1.5 1.5 0 01-3 0v-6zM6 10.333v5.43a2 2 0 001.106 1.79l.05.025A4 4 0 008.943 18h5.416a2 2 0 001.962-1.608l1.2-6A2 2 0 0015.56 8H12V4a2 2 0 00-2-2 1 1 0 00-1 1v.667a4 4 0 01-.8 2.4L6.8 7.933a4 4 0 00-.8 2.4z">
                                    </path>
                                </svg>
                                Helpful
                            </a>
                            <a href="#"
                                class="inline-flex items-center text-sm font-medium text-blue-600 hover:underline  group">
                                <svg class="w-4 h-4 mr-1.5" fill="currentColor" viewBox="0 0 20 20"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M18 9.5a1.5 1.5 0 11-3 0v-6a1.5 1.5 0 013 0v6zM14 9.667v-5.43a2 2 0 00-1.105-1.79l-.05-.025A4 4 0 0011.055 2H5.64a2 2 0 00-1.962 1.608l-1.2 6A2 2 0 004.44 12H8v4a2 2 0 002 2 1 1 0 001-1v-.667a4 4 0 01.8-2.4l1.4-1.866a4 4 0 00.8-2.4z">
                                    </path>
                                </svg>
                                Not helpful
                            </a>
                        </aside>
                    </div>
                </article>

            </div>
        </div>

        <!-- Reviews -->
        <div class="flex-initial w-full lg:w-1/2 lg:block bg-white lg:mr-10 px-4 lg:px-0">
            <div class=" mb-4 ml-6">

                <article class=" md:grid md:grid-cols-3">
                    <div>
                        <div class="flex items-center mb-6 space-x-4">
                            <img class="w-10 h-10 rounded-full" src="/docs/images/people/profile-picture-5.jpg"
                                alt="">
                            <div class="space-y-1 font-medium ">
                                <p>Jese Leos</p>
                            </div>
                        </div>
                        <ul class="space-y-4 text-sm text-gray-500 ">
                            <li class="flex items-center"><svg class="w-4 h-4 mr-1.5" fill="currentColor"
                                    viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M4 4a2 2 0 012-2h8a2 2 0 012 2v12a1 1 0 110 2h-3a1 1 0 01-1-1v-2a1 1 0 00-1-1H9a1 1 0 00-1 1v2a1 1 0 01-1 1H4a1 1 0 110-2V4zm3 1h2v2H7V5zm2 4H7v2h2V9zm2-4h2v2h-2V5zm2 4h-2v2h2V9z"
                                        clip-rule="evenodd"></path>
                                </svg>Apartament with City View</li>
                            <li class="flex items-center"><svg class="w-4 h-4 mr-1.5" fill="currentColor"
                                    viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z"
                                        clip-rule="evenodd"></path>
                                </svg>3 nights December 2021</li>
                            <li class="flex items-center"><svg class="w-4 h-4 mr-1.5" fill="currentColor"
                                    viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
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
                                    Spotless, good appliances, excellent layout, host was
                                    genuinely
                                    nice and helpful.</h4>
                            </div>
                            <p
                                class="bg-blue-700 text-white text-sm font-semibold inline-flex items-center py-1.5 px-3 rounded">
                                4</p>
                        </div>
                        <p class="mb-2 font-light text-gray-500 ">The flat was
                            spotless, very comfortable, and the host was amazing. I highly
                            recommend
                            this accommodation for anyone visiting Brasov city centre.</p>

                        <aside class="flex align-center mt-3 space-x-5">
                            <a href="#"
                                class="inline-flex items-center text-sm font-medium text-blue-600 hover:underline ">
                                <svg class="w-4 h-4 mr-1.5" fill="currentColor" viewBox="0 0 20 20"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M2 10.5a1.5 1.5 0 113 0v6a1.5 1.5 0 01-3 0v-6zM6 10.333v5.43a2 2 0 001.106 1.79l.05.025A4 4 0 008.943 18h5.416a2 2 0 001.962-1.608l1.2-6A2 2 0 0015.56 8H12V4a2 2 0 00-2-2 1 1 0 00-1 1v.667a4 4 0 01-.8 2.4L6.8 7.933a4 4 0 00-.8 2.4z">
                                    </path>
                                </svg>
                                Helpful
                            </a>
                            <a href="#"
                                class="inline-flex items-center text-sm font-medium text-blue-600 hover:underline  group">
                                <svg class="w-4 h-4 mr-1.5" fill="currentColor" viewBox="0 0 20 20"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M18 9.5a1.5 1.5 0 11-3 0v-6a1.5 1.5 0 013 0v6zM14 9.667v-5.43a2 2 0 00-1.105-1.79l-.05-.025A4 4 0 0011.055 2H5.64a2 2 0 00-1.962 1.608l-1.2 6A2 2 0 004.44 12H8v4a2 2 0 002 2 1 1 0 001-1v-.667a4 4 0 01.8-2.4l1.4-1.866a4 4 0 00.8-2.4z">
                                    </path>
                                </svg>
                                Not helpful
                            </a>
                        </aside>
                    </div>
                </article>

            </div>
        </div>



    </div>

</div>
<div class="mt-4 text-sm text-center underline">See all reviews</div>
