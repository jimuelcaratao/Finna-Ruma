<div class="grid grid-cols-3 gap-4">

    @if ($listing->listing_rule->garbage_disposal == true)
        <div class="relative inline-flex items-center w-full  py-1  text-sm  ">
            <img src="{{ asset('img/global/icons/garbage.png') }}" class="h-6 w-6 mr-3">
            Garbage Disposal
        </div>
    @endif


    @if ($listing->listing_rule->curfew !== null)
        <div class="relative inline-flex items-center w-full  py-1  text-sm ">
            <img src="{{ asset('img/global/icons/clock.png') }}" class="h-6 w-6 mr-3">
            Curfew time: {{ $listing->listing_rule->curfew }}
        </div>
    @endif



    @if ($listing->listing_rule->claygo == true)
        <div class="relative inline-flex items-center w-full py-1  text-sm ">
            <img src="{{ asset('img/global/icons/broom.png') }}" class="h-6 w-6 mr-3">
            Clean as you go
        </div>
    @endif

    @if ($listing->listing_rule->no_smoking == true)
        <div class="relative inline-flex items-center w-full py-1  text-sm ">
            <img src="{{ asset('img/global/icons/no-smoking.png') }}" class="h-6 w-6 mr-3">
            No Smoking
        </div>
    @endif

    @if ($listing->listing_rule->no_drinking == true)
        <div class="relative inline-flex items-center w-full py-1  text-sm ">
            <img src="{{ asset('img/global/icons/no-alcohol.png') }}" class="h-6 w-6 mr-3">
            No Drinking
        </div>
    @endif

    @if ($listing->listing_rule->no_pets == true)
        <div class="relative inline-flex items-center w-full py-1  text-sm ">
            <img src="{{ asset('img/global/icons/no-animals.png') }}" class="h-6 w-6 mr-3">
            No Pets Allowed
        </div>
    @endif



    @if ($listing->listing_rule->no_events == true)
        <div class="relative inline-flex items-center w-full py-1  text-sm ">
            <img src="{{ asset('img/global/icons/celebrate.png') }}" class="h-6 w-6 mr-3">
            No Parties/Events
        </div>
    @endif


</div>
