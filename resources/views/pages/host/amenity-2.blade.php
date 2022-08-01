{{-- grill --}}
<div class="flex items-start">
    <div class="flex items-center h-5">
        <input id="grill" name="grill" type="checkbox"
            @if (!empty($listing)) @checked($listing->listing_amenity->grill) @endif
            class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded">
    </div>
    <div class="ml-3 text-sm">
        <label for="grill" class="font-medium text-gray-700">Grill</label>
    </div>
</div>

{{-- gym --}}
<div class="flex items-start">
    <div class="flex items-center h-5">
        <input id="gym" name="gym" type="checkbox"
            @if (!empty($listing)) @checked($listing->listing_amenity->gym) @endif
            class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded">
    </div>
    <div class="ml-3 text-sm">
        <label for="gym" class="font-medium text-gray-700">Gym</label>
    </div>
</div>


{{-- heating --}}
<div class="flex items-start">
    <div class="flex items-center h-5">
        <input id="heating" name="heating" type="checkbox"
            @if (!empty($listing)) @checked($listing->listing_amenity->heating) @endif
            class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded">
    </div>
    <div class="ml-3 text-sm">
        <label for="heating" class="font-medium text-gray-700">Heating</label>
    </div>
</div>

{{-- tv --}}
<div class="flex items-start">
    <div class="flex items-center h-5">
        <input id="tv" name="tv" type="checkbox"
            @if (!empty($listing)) @checked($listing->listing_amenity->tv) @endif
            class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded">
    </div>
    <div class="ml-3 text-sm">
        <label for="tv" class="font-medium text-gray-700">TV</label>
    </div>
</div>

{{-- iron --}}
<div class="flex items-start">
    <div class="flex items-center h-5">
        <input id="iron" name="iron" type="checkbox"
            @if (!empty($listing)) @checked($listing->listing_amenity->iron) @endif
            class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded">
    </div>
    <div class="ml-3 text-sm">
        <label for="iron" class="font-medium text-gray-700">Iron</label>
    </div>
</div>

{{-- Kitchen --}}
<div class="flex items-start">
    <div class="flex items-center h-5">
        <input id="kitchen" name="kitchen" type="checkbox"
            @if (!empty($listing)) @checked($listing->listing_amenity->kitchen) @endif
            class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded">
    </div>
    <div class="ml-3 text-sm">
        <label for="kitchen" class="font-medium text-gray-700">Kitchen</label>
    </div>
</div>

{{-- Dryer --}}
<div class="flex items-start">
    <div class="flex items-center h-5">
        <input id="dryer" name="dryer" type="checkbox"
            @if (!empty($listing)) @checked($listing->listing_amenity->dryer) @endif
            class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded">
    </div>
    <div class="ml-3 text-sm">
        <label for="dryer" class="font-medium text-gray-700">Dryer</label>
    </div>
</div>
