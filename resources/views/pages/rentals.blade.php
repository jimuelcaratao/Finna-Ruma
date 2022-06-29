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
                            <div
                                class=" flex w-96 flex-col justify-center bg-white rounded-2xl shadow-xl transition duration-500 ease-in-out transform hover:translate-y-5">
                                <!-- img -->
                                <img class="aspect-video w-96 rounded-t-2xl object-cover object-center"
                                    src="https://images.pexels.com/photos/3311574/pexels-photo-3311574.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1" />
                                <!-- text information -->
                                <div class="p-4">
                                    <small class="text-blue-400 text-xs">Automobile company</small>
                                    <h1 class="text-2xl font-medium text-slate-600 pb-2">Dodge Car</h1>



                                    <p class="text-sm tracking-tight font-light text-slate-400 leading-6">Dodge is an
                                        American brand
                                        of
                                        automobiles and a division of Stellantis, based in Auburn Hills, Michigan..</p>

                                    <div class="flex justify-between pt-4">
                                        <div class="flex items-center">
                                            <svg class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                                                </path>
                                            </svg>
                                            <p class="ml-2 text-sm font-bold text-gray-900 ">4.95</p>
                                            <span class="w-1 h-1 mx-1.5 bg-gray-500 rounded-full "></span>
                                            <a href="#"
                                                class="text-sm font-medium text-gray-900 underline hover:no-underline ">73
                                                reviews</a>
                                        </div>

                                        <h1 class="text-right text-2xl font-medium text-black pb-2 pt-4">10,312
                                            <span class="text-sm text-slate-500">night</span>
                                        </h1>

                                    </div>
                                </div>
                            </div>

                            <div
                                class=" flex w-96 flex-col justify-center bg-white rounded-2xl shadow-xl  transition duration-500 ease-in-out transform hover:translate-y-5">
                                <!-- img -->
                                <img class="aspect-video w-96 rounded-t-2xl object-cover object-center"
                                    src="https://images.pexels.com/photos/3311574/pexels-photo-3311574.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1" />
                                <!-- text information -->
                                <div class="p-4">
                                    <small class="text-blue-400 text-xs">Automobile company</small>
                                    <h1 class="text-2xl font-medium text-slate-600 pb-2">Dodge Car</h1>
                                    <p class="text-sm tracking-tight font-light text-slate-400 leading-6">Dodge is an
                                        American brand
                                        of
                                        automobiles and a division of Stellantis, based in Auburn Hills, Michigan..</p>
                                </div>
                            </div>

                            <div
                                class="flex w-96 flex-col justify-center bg-white rounded-2xl shadow-xl transition duration-500 ease-in-out transform hover:translate-y-5">
                                <!-- img -->
                                <img class="aspect-video w-96 rounded-t-2xl object-cover object-center"
                                    src="https://images.pexels.com/photos/3311574/pexels-photo-3311574.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1" />
                                <!-- text information -->
                                <div class="p-4">
                                    <small class="text-blue-400 text-xs">Automobile company</small>
                                    <h1 class="text-2xl font-medium text-slate-600 pb-2">Dodge Car</h1>
                                    <p class="text-sm tracking-tight font-light text-slate-400 leading-6">Dodge is an
                                        American brand
                                        of
                                        automobiles and a division of Stellantis, based in Auburn Hills, Michigan..</p>
                                </div>
                            </div>

                            <div
                                class="flex w-96 flex-col justify-center bg-white rounded-2xl shadow-xl transition duration-500 ease-in-out transform hover:translate-y-5">
                                <!-- img -->
                                <img class="aspect-video w-96 rounded-t-2xl object-cover object-center"
                                    src="https://images.pexels.com/photos/3311574/pexels-photo-3311574.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1" />
                                <!-- text information -->
                                <div class="p-4">
                                    <small class="text-blue-400 text-xs">Automobile company</small>
                                    <h1 class="text-2xl font-medium text-slate-600 pb-2">Dodge Car</h1>
                                    <p class="text-sm tracking-tight font-light text-slate-400 leading-6">Dodge is an
                                        American brand
                                        of
                                        automobiles and a division of Stellantis, based in Auburn Hills, Michigan..</p>
                                </div>
                            </div>


                            <div
                                class="flex w-96 flex-col justify-center bg-white rounded-2xl shadow-xl transition duration-500 ease-in-out transform hover:translate-y-5">
                                <!-- img -->
                                <img class="aspect-video w-96 rounded-t-2xl object-cover object-center"
                                    src="https://images.pexels.com/photos/3311574/pexels-photo-3311574.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1" />
                                <!-- text information -->
                                <div class="p-4">
                                    <small class="text-blue-400 text-xs">Automobile company</small>
                                    <h1 class="text-2xl font-medium text-slate-600 pb-2">Dodge Car</h1>
                                    <p class="text-sm tracking-tight font-light text-slate-400 leading-6">Dodge is an
                                        American brand
                                        of
                                        automobiles and a division of Stellantis, based in Auburn Hills, Michigan..</p>
                                </div>
                            </div>


                            <div
                                class="flex w-96 flex-col justify-center bg-white rounded-2xl shadow-xl transition duration-500 ease-in-out transform hover:translate-y-5">
                                <!-- img -->
                                <img class="aspect-video w-96 rounded-t-2xl object-cover object-center"
                                    src="https://images.pexels.com/photos/3311574/pexels-photo-3311574.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1" />
                                <!-- text information -->
                                <div class="p-4">
                                    <small class="text-blue-400 text-xs">Automobile company</small>
                                    <h1 class="text-2xl font-medium text-slate-600 pb-2">Dodge Car</h1>
                                    <p class="text-sm tracking-tight font-light text-slate-400 leading-6">Dodge is an
                                        American brand
                                        of
                                        automobiles and a division of Stellantis, based in Auburn Hills, Michigan..</p>
                                </div>
                            </div>



                        </div>
                        <!-- end row -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-global-layout>
