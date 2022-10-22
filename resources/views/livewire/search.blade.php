<div>
    <form class="flex justify-center items-center w-screen px-8 md:px-12">
        <x-jet-input class="relative w-full" type="text" placeholder="Listing name or category" wire:model="search"
            wire:keydown.escape="resetSearch" />
    </form>
    {{-- Search content --}}
    <div class="px-8 md:px-12 absolute top-18 left-0 z-40 bg-gray-50 w-full rounded-b-md">
        <div class="max-h-72 overflow-auto divide-y divide-gray-200">
            @if (!empty($search))
                {{-- <div>
                    @foreach ($categories as $category)
                        <a href="" class="flex flex-row py-2 hover:bg-gray-100">
                            <p class="px-5 py-2 overscroll-none">{{ $category->category_name }}</p>
                        </a>
                    @endforeach
                </div> --}}

                <div>
                    @forelse ($listings as $listing)
                        <a href="{{ route('single-list', [$listing->slug]) }}"
                            class="flex flex-row py-2 hover:bg-gray-100">
                            <img src="{{ asset('storage/media/listing/cover_' . $listing->listing_id . '_' . $listing->default_photo) }}"
                                class="h-auto w-20 mr-3" alt="{{ $listing->listing_title }}'s image">
                            <div class="flex flex-col space-y-2">
                                <p class="text-gray-900">{{ $listing->listing_title }}</p>
                            </div>
                        </a>
                    @empty
                        <a class="px-5 py-2 overscroll-none">No Article found...</a>
                    @endforelse
                </div>

            @endif

        </div>
    </div>
</div>
