<x-global-layout>
    <div class="lg:pb-12 lg:pt-6">
        <div class="max-w-screen-2xl mx-auto sm:px-6 lg:px-24">

            {{-- Pick your choice section --}}
            <div class="pick-your">

                <div id="pick-your" class="section relative pb-8 pt-6 md:pt-10 md:pb-0 bg-white">


                    <div class="container xl:max-w-7xl mx-auto px-4">

                        <h3 class="font-bold text-4xl mb-6">Saved listing</h3>


                        <div class="mx-auto flex flex-wrap flex-row gap-7">

                            <!-- card -->
                            @forelse ($wishlists as $wishlist)
                                <a href="{{ route('single-list', [$wishlist->listing->slug]) }}">
                                    <div
                                        class=" flex w-96 flex-col justify-center bg-white rounded-2xl shadow-md transition duration-500 ease-in-out transform hover:translate-y-5">
                                        <!-- img -->
                                        <img class="aspect-video w-96 rounded-t-2xl object-cover object-center"
                                            src="{{ asset('storage/media/listing/cover_' . $wishlist->listing->listing_id . '_' . $wishlist->listing->default_photo) }}" />
                                        <!-- text information -->
                                        <div class="p-4">
                                            <small
                                                class="text-blue-400 text-xs">{{ $wishlist->listing->category->category_name }}</small>
                                            <h1 class="text-2xl font-medium text-slate-600 pb-2">
                                                {{ $wishlist->listing->listing_title }}</h1>



                                            <p class="text-sm tracking-tight font-light text-slate-400 leading-6">
                                                {{ $wishlist->listing->location }}
                                            </p>

                                            <div class="flex justify-between pt-4">
                                                <div class="text-right text-2xl font-medium text-black pb-2 pt-4">
                                                </div>

                                                <div class="text-right text-2xl font-medium text-black pb-2 pt-4">₱
                                                    @convert($wishlist->listing->price_per_night)
                                                    <span class="text-sm text-slate-500">night</span>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </a>
                            @empty
                                <div class="flex flex-col md:flex-row mx-auto">
                                    <div class="px-4 w-full flex flex-col justify-around ">
                                        <img src="{{ asset('img/wishlist.svg') }}" alt="No wish"
                                            class="block h-2/4 w-2/4  mx-auto">
                                        <p class="font-bold block mx-auto">No listing on saved. Explore more.</p>
                                    </div>
                                </div>
                            @endforelse








                        </div>
                        <!-- end row -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-global-layout>
