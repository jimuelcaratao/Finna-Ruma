<div x-data="{ open: false }" class="bg-white">
    <div>

        <div :class="{ 'block': open, 'hidden': !open }" class="fixed inset-0 flex z-40 lg:hidden" role="dialog"
            aria-modal="true">

            <div @click="open = ! open" class="fixed inset-0 bg-black bg-opacity-25" aria-hidden="true"></div>

            <div
                class="ml-auto relative max-w-xs w-full h-full bg-white shadow-xl py-4 pb-12 flex flex-col overflow-y-auto">
                <div class="px-4 flex items-center justify-between">
                    <h2 class="text-lg font-medium text-gray-900">Filters</h2>
                    <button @click="open = ! open" type="button"
                        class="-mr-2 w-10 h-10 bg-white p-2 rounded-md flex items-center justify-center text-gray-400 ">
                        <span class="sr-only">Close menu</span>
                        <!-- Heroicon name: outline/x -->
                        <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>

                <!-- Filters -->
                <div class="mt-4 border-t border-gray-200">
                    <ul role="list" class="text-sm space-y-3 text-gray-900 px-2 py-3 ml-5">
                        {{ $categoryList }}
                    </ul>
                </div>
            </div>
        </div>



        {{-- MAINS --}}

        <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="relative z-10 flex items-baseline justify-between pt-24 pb-6 border-b border-gray-200">

                {{ $head }}

                <div class="flex items-center">
                    <div class="relative inline-block text-left">


                    </div>

                    <button @click="open = ! open" type="button"
                        class="p-2 -m-2 ml-4 sm:ml-6 text-gray-400 hover:text-gray-500 lg:hidden">
                        <span class="sr-only">Filters</span>
                        <!-- Heroicon name: solid/filter -->
                        <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                            fill="currentColor">
                            <path fill-rule="evenodd"
                                d="M3 3a1 1 0 011-1h12a1 1 0 011 1v3a1 1 0 01-.293.707L12 11.414V15a1 1 0 01-.293.707l-2 2A1 1 0 018 17v-5.586L3.293 6.707A1 1 0 013 6V3z"
                                clip-rule="evenodd" />
                        </svg>
                    </button>
                </div>
            </div>

            <section aria-labelledby="products-heading" class="pt-6 pb-24">
                <h2 id="products-heading" class="sr-only">Products</h2>

                <div class="grid grid-cols-1 lg:grid-cols-4 gap-x-8 gap-y-10">
                    <!-- Filters -->
                    <div class="hidden lg:block">

                        <ul role="list" class="text-sm  text-gray-900 space-y-4 pb-6 ">
                            {{ $categoryList }}
                        </ul>



                    </div>

                    <!-- Listing grid -->
                    <div class="lg:col-span-3 ">
                        <div class=" border-gray-200 rounded-lg h-auto lg:h-full">
                            {{ $productGrid }}
                        </div>
                    </div>
                </div>
            </section>
        </main>
    </div>
</div>
