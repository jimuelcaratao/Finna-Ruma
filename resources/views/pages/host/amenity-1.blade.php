<div class="flex items-start">
    <div class="flex items-center h-5">
        <input id="wifi" name="wifi" type="checkbox"
            @if (!empty($listing)) @checked($listing->listing_amenity->wifi) @endif
            class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded">
    </div>
    <div class="ml-3 text-sm">
        <label for="wifi" class="font-medium text-gray-700">Wifi</label>
        {{-- <p class="text-gray-500">Get notified when someones posts a
            comment on a posting.</p> --}}
    </div>
</div>

<div class="flex items-start">
    <div class="flex items-center h-5">
        <input id="washer" name="washer" type="checkbox"
            @if (!empty($listing)) @checked($listing->listing_amenity->washer) @endif
            class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded">
    </div>
    <div class="ml-3 text-sm">
        <label for="washer" class="font-medium text-gray-700">Washer</label>
    </div>
</div>

<div class="flex items-start">
    <div class="flex items-center h-5">
        <input id="air_conditioning" name="air_conditioning" type="checkbox"
            @if (!empty($listing)) @checked($listing->listing_amenity->air_conditioning) @endif
            class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded">
    </div>
    <div class="ml-3 text-sm">
        <label for="air_conditioning" class="font-medium text-gray-700">Air
            Conditioning</label>
    </div>
</div>



{{-- dedicated_workspace --}}
<div class="flex items-start">
    <div class="flex items-center h-5">
        <input id="dedicated_workspace" name="dedicated_workspace" type="checkbox"
            @if (!empty($listing)) @checked($listing->listing_amenity->dedicated_workspace) @endif
            class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded">
    </div>
    <div class="ml-3 text-sm">
        <label for="dedicated_workspace" class="font-medium text-gray-700">Dedicated Workspace</label>
    </div>
</div>

{{-- hair_dryer --}}
<div class="flex items-start">
    <div class="flex items-center h-5">
        <input id="hair_dryer" name="hair_dryer" type="checkbox"
            @if (!empty($listing)) @checked($listing->listing_amenity->hair_dryer) @endif
            class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded">
    </div>
    <div class="ml-3 text-sm">
        <label for="hair_dryer" class="font-medium text-gray-700">Hair Dryer</label>
    </div>
</div>

{{-- pool --}}
<div class="flex items-start">
    <div class="flex items-center h-5">
        <input id="pool" name="pool" type="checkbox"
            @if (!empty($listing)) @checked($listing->listing_amenity->pool) @endif
            class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded">
    </div>
    <div class="ml-3 text-sm">
        <label for="pool" class="font-medium text-gray-700">Pool</label>
    </div>
</div>



{{-- crib --}}
<div class="flex items-start">
    <div class="flex items-center h-5">
        <input id="crib" name="crib" type="checkbox"
            @if (!empty($listing)) @checked($listing->listing_amenity->crib) @endif
            class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded">
    </div>
    <div class="ml-3 text-sm">
        <label for="crib" class="font-medium text-gray-700">Crib</label>
    </div>
</div>
