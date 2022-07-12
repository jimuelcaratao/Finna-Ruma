<x-host-layout>

    {{-- search bar --}}
    {{-- <x-slot name="searchbar">
        <div class="search-wrapper ml-4">
            <input class="search-input" type="text" placeholder="Search">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="none" stroke="currentColor"
                stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="feather feather-search"
                viewBox="0 0 24 24">
                <defs></defs>
                <circle cx="11" cy="11" r="8"></circle>
                <path d="M21 21l-4.35-4.35"></path>
            </svg>
        </div>
    </x-slot> --}}


    {{-- Contents --}}
    <div class="projects-section">
        <div class="projects-section-header">
            <p>My Listing</p>
            {{-- <p class="time">December, 12</p> --}}
        </div>

        <div class="projects-section-line">
            <div class="projects-status">
                <div class="item-status">
                    <span class="status-number">45</span>
                    <span class="status-type">Host</span>
                </div>
                <div class="item-status">
                    <span class="status-number">24</span>
                    <span class="status-type">Pending Host</span>
                </div>
                <div class="item-status">
                    <span class="status-number">62</span>
                    <span class="status-type">User</span>
                </div>
            </div>
            <div class="view-actions">
                <div class="search-wrapper mr-4">
                    <input class="search-input" type="text" placeholder="Search">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="none"
                        stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        class="feather feather-search" viewBox="0 0 24 24">
                        <defs></defs>
                        <circle cx="11" cy="11" r="8"></circle>
                        <path d="M21 21l-4.35-4.35"></path>
                    </svg>
                </div>

                <a href="{{ route('host.add.listing') }}" class="bg-gray-800 text-white p-2 rounded-full"
                    title="Add New Project">
                    <svg class="btn-icon" xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round"
                        stroke-linejoin="round" class="feather feather-plus">
                        <line x1="12" y1="5" x2="12" y2="19" />
                        <line x1="5" y1="12" x2="19" y2="12" />
                    </svg>
                </a>
            </div>
        </div>

        <div class="overflow-y-auto">
            <div class="relative  shadow-sm">
                <table class="w-full text-sm text-left text-gray-500 ">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 ">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                Product name
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Color
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Category
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Price
                            </th>
                            <th scope="col" class="px-6 py-3">
                                <span class="sr-only no-underline">Edit</span>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="bg-white border-b  ">
                            <th scope="row" class="px-6 py-3 font-medium text-gray-900  whitespace-nowrap">
                                Apple MacBook Pro 17"
                            </th>
                            <td class="px-6 py-3">
                                Sliver
                            </td>
                            <td class="px-6 py-3">
                                Laptop
                            </td>
                            <td class="px-6 py-3">
                                $2999
                            </td>
                            <td class="px-6 py-3 text-right">
                                <a href="#"
                                    class="font-medium text-blue-600  hover:underline no-underline">Edit</a>
                            </td>
                        </tr>

                    </tbody>
                </table>
            </div>

        </div>
    </div>


</x-host-layout>
