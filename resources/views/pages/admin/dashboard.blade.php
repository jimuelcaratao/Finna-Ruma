<x-app-layout>


    <div class="projects-section">
        <div class="projects-section-header">
            <p>{{ $dayTerm }}, {{ Auth::user()->name }}!</p>
            <p class="time">{{ Carbon\Carbon::now()->format('M d Y') }}</p>
        </div>
        <div class="projects-section-line">
            <div class="projects-status">
                <div class="item-status">
                    <span class="status-number">{{ $listing_pending }}</span>
                    <span class="status-type">Pending Lists</span>
                </div>
                <div class="item-status">
                    <span class="status-number">{{ $listing_approved }}</span>
                    <span class="status-type">Approved</span>
                </div>
                <div class="item-status">
                    <span class="status-number">{{ $listing_total }}</span>
                    <span class="status-type">Total Listings</span>
                </div>
            </div>

        </div>

        <div class="project-boxes jsGridView overflow-hidden h-80">

            <div class="project-box-wrapper">
                <div class="project-box" style="background-color: #fee4cb;">
                    <div class="project-box-header">
                        <span></span>
                        <div class="more-wrapper">
                            <a href="http://localhost:8000/admin/rentals?search_status=Pending+Approval&search=">
                                <button class="project-btn-more">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-700"
                                        viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd"
                                            d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                            clip-rule="evenodd" />
                                    </svg>
                                </button>
                            </a>
                        </div>
                    </div>

                    <div class="project-box-content-header">
                        <p class="box-content-header">{{ $listing_pending }}</p>
                        <p class="box-content-subheader">Pending Bookings</p>
                    </div>

                </div>
            </div>

            <div class="project-box-wrapper">
                <div class="project-box" style="background-color: #ffd3e2;">
                    <div class="project-box-header">
                        <span></span>
                        <div class="more-wrapper">
                            <a href="{{ route('admin.categories') }}">

                                <button class="project-btn-more">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-700"
                                        viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd"
                                            d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                            clip-rule="evenodd" />
                                    </svg>
                                </button>
                            </a>
                        </div>
                    </div>
                    <div class="project-box-content-header">
                        <p class="box-content-header">{{ $categories }}</p>
                        <p class="box-content-subheader">Total Categories</p>
                    </div>

                </div>
            </div>

            <div class="project-box-wrapper">
                <div class="project-box" style="background-color: #ffd3e2;">
                    <div class="project-box-header">
                        <span></span>
                        <div class="more-wrapper">
                            <a href="http://localhost:8000/host/bookings?search_status=Confirmed+Reservation&search=">

                                <button class="project-btn-more">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-700"
                                        viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd"
                                            d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                            clip-rule="evenodd" />
                                    </svg>
                                </button>
                            </a>
                        </div>
                    </div>
                    <div class="project-box-content-header">
                        <p class="box-content-header">{{ $confirmed }}</p>
                        <p class="box-content-subheader">Confirmed Bookings</p>
                    </div>

                </div>
            </div>


            <div class="project-box-wrapper">
                <div class="project-box" style="background-color: #e9e7fd;">
                    <div class="project-box-header">
                        <span></span>
                        <div class="more-wrapper">

                            <a href="{{ route('host.bookings') }}">
                                <button class="project-btn-more">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-700"
                                        viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd"
                                            d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                            clip-rule="evenodd" />
                                    </svg>
                                </button>
                            </a>
                        </div>
                    </div>
                    <div class="project-box-content-header">
                        <p class="box-content-header">{{ $total }}</p>
                        <p class="box-content-subheader">Total Bookings</p>
                    </div>

                </div>
            </div>



        </div>


        {{-- latest rentals --}}
        <div class="text-xl font-bold mt-4">
            <p>Latest rentals</p>
        </div>

        <div class="project-boxes jsGridView">

            @forelse ($listings as $listing)
                <div class="project-box-wrapper">
                    <div class="project-box">

                        <div class="project-box-content-header py-3">
                            <p class="box-content-header">{{ $listing->listing_title }}</p>
                            <p class="box-content-subheader">{{ $listing->category->category_name }}</p>
                        </div>

                        <div class="project-box-footer">
                            <div class="participants">
                                {{-- <img src="https://images.unsplash.com/photo-1587628604439-3b9a0aa7a163?ixid=MXwxMjA3fDB8MHxzZWFyY2h8MjR8fHdvbWFufGVufDB8fDB8&ixlib=rb-1.2.1&auto=format&fit=crop&w=900&q=60"
                                alt="participant">
                            <img src="https://images.unsplash.com/photo-1596815064285-45ed8a9c0463?ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=1215&q=80"
                                alt="participant"> --}}
                                <a href="{{ route('single-list', [$listing->slug]) }}" target="_blank">
                                    <button class="add-participant" style="color: #096c86;">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                        </svg>
                                    </button>
                                </a>
                            </div>
                            <div class="days-left" style="color: #096c86;">
                                ₱ @convert($listing->price_per_night) Per night
                            </div>
                        </div>
                    </div>
                </div>

            @empty

                <div class="text-center pt-10 px-2 mx-auto">
                    No data available...
                </div>
            @endforelse
        </div>
    </div>

</x-app-layout>
