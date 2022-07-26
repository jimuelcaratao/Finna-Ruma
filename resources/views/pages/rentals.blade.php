<x-global-layout>


    <div class="lg:pb-12 lg:pt-6">
        <div class="max-w-screen-2xl mx-auto sm:px-6 lg:px-24">

            {{-- Pick your choice section --}}
            <div class="pick-your">
                <div id="pick-your" class="section relative pt-10 pb-8 md:pt-16 md:pb-0 bg-white">
                    <div class="container xl:max-w-7xl mx-auto px-4">

                        <!-- Heading start -->
                        <nav class="flex pb-10" aria-label="Breadcrumb">
                            <ol class="inline-flex items-center space-x-1 md:space-x-7">
                                <li class="inline-flex items-center">
                                    <a href="#"
                                        class="inline-flex items-center text-2xl font-medium text-gray-700 hover:text-gray-900">
                                        <svg class="mr-2 w-4 h-4" fill="currentColor" viewBox="0 0 20 20"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z">
                                            </path>
                                        </svg>
                                        Home
                                    </a>
                                </li>
                                <li>
                                    <div class="flex items-center">
                                        {{-- <svg class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd"
                                                d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                                clip-rule="evenodd"></path>
                                        </svg> --}}
                                        <a href="#"
                                            class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-gray-900">
                                            <svg class="mr-2 w-4 h-4" fill="currentColor" viewBox="0 0 20 20"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z">
                                                </path>
                                            </svg>
                                            Home
                                        </a>
                                    </div>
                                </li>
                                <li aria-current="page">
                                    <div class="flex items-center">
                                        {{-- <svg class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd"
                                                d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                                clip-rule="evenodd"></path>
                                        </svg> --}}
                                        <a href="#"
                                            class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-gray-900">
                                            <svg class="mr-2 w-4 h-4" fill="currentColor" viewBox="0 0 20 20"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z">
                                                </path>
                                            </svg>
                                            Home
                                        </a>
                                    </div>
                                </li>
                            </ol>
                        </nav>
                        <!-- End heading -->
                        <!-- row -->
                        <div class="mx-auto flex flex-wrap flex-row gap-7">


                            <!-- card -->

                            @forelse ($listings as $listing)
                                <a href="{{ route('single-list', [$listing->slug]) }}">
                                    <div
                                        class=" flex w-96 flex-col justify-center bg-white rounded-2xl shadow-md transition duration-500 ease-in-out transform hover:translate-y-5">
                                        <!-- img -->
                                        <img class="aspect-video w-96 rounded-t-2xl object-cover object-center"
                                            src="{{ asset('storage/media/listing/cover_' . $listing->listing_id . '_' . $listing->default_photo) }}" />
                                        <!-- text information -->
                                        <div class="p-4">
                                            <small
                                                class="text-blue-400 text-xs">{{ $listing->category->category_name }}</small>
                                            <h1 class="text-2xl font-medium text-slate-600 pb-2">
                                                {{ $listing->listing_title }}</h1>



                                            <p class="text-sm tracking-tight font-light text-slate-400 leading-6">
                                                {{ $listing->location }}
                                            </p>

                                            <div class="flex justify-between pt-4">
                                                <div class="text-right text-2xl font-medium text-black pb-2 pt-4">
                                                </div>

                                                <div class="text-right text-2xl font-medium text-black pb-2 pt-4">₱
                                                    @convert($listing->price_per_night)
                                                    <span class="text-sm text-slate-500">night</span>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </a>
                            @empty
                            @endforelse








                        </div>
                        <!-- end row -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-global-layout>
