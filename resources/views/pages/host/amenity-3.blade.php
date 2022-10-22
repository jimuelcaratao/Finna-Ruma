{{-- smoking_allowed --}}
<div class="flex items-start">
    <div class="flex items-center h-5">
        <input id="smoking_allowed" name="smoking_allowed" type="checkbox"
            @if (!empty($listing)) @checked($listing->listing_amenity->smoking_allowed) @endif
            class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded">
    </div>
    <div class="ml-3 text-sm">
        <label for="smoking_allowed" class="font-medium text-gray-700">Smoking Allowed</label>
    </div>
</div>

{{-- free_parking --}}
<div class="flex items-start">
    <div class="flex items-center h-5">
        <input id="free_parking" name="free_parking" type="checkbox"
            @if (!empty($listing)) @checked($listing->listing_amenity->free_parking) @endif
            class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded">
    </div>
    <div class="ml-3 text-sm">
        <label for="free_parking" class="font-medium text-gray-700">Free Parking</label>
    </div>
</div>


{{-- breakfast --}}
<div class="flex items-start">
    <div class="flex items-center h-5">
        <input id="breakfast" name="breakfast" type="checkbox"
            @if (!empty($listing)) @checked($listing->listing_amenity->breakfast) @endif
            class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded">
    </div>
    <div class="ml-3 text-sm">
        <label for="breakfast" class="font-medium text-gray-700">Breakfast</label>

    </div>
</div>

{{-- smoke_alarm --}}
<div class="flex items-start">
    <div class="flex items-center h-5">
        <input id="smoke_alarm" name="smoke_alarm" type="checkbox"
            @if (!empty($listing)) @checked($listing->listing_amenity->smoke_alarm) @endif
            class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded">
    </div>
    <div class="ml-3 text-sm">
        <label for="smoke_alarm" class="font-medium text-gray-700">Smoke Alarm</label>
    </div>
</div>

{{-- carbon_monoxide_alarm --}}
<div class="flex items-start">
    <div class="flex items-center h-5">
        <input id="carbon_monoxide_alarm" name="carbon_monoxide_alarm" type="checkbox"
            @if (!empty($listing)) @checked($listing->listing_amenity->carbon_monoxide_alarm) @endif
            class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded">
    </div>
    <div class="ml-3 text-sm">
        <label for="carbon_monoxide_alarm" class="font-medium text-gray-700">Carbon Monoxide Alarm</label>
    </div>
</div>
