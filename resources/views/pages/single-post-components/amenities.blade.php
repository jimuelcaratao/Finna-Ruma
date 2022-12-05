<div class="grid grid-cols-4 gap-4">

    @if ($listing->listing_amenity->wifi == true)
        <div class="relative inline-flex items-center w-full  py-1  text-sm  ">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-3" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd"
                    d="M17.778 8.222c-4.296-4.296-11.26-4.296-15.556 0A1 1 0 01.808 6.808c5.076-5.077 13.308-5.077 18.384 0a1 1 0 01-1.414 1.414zM14.95 11.05a7 7 0 00-9.9 0 1 1 0 01-1.414-1.414 9 9 0 0112.728 0 1 1 0 01-1.414 1.414zM12.12 13.88a3 3 0 00-4.242 0 1 1 0 01-1.415-1.415 5 5 0 017.072 0 1 1 0 01-1.415 1.415zM9 16a1 1 0 011-1h.01a1 1 0 110 2H10a1 1 0 01-1-1z"
                    clip-rule="evenodd" />
            </svg>
            Wifi
        </div>
    @endif

    @if ($listing->listing_amenity->washer == true)
        <div class="relative inline-flex items-center w-full  py-1  text-sm ">
            <img src="{{ asset('img/global/icons/washer.png') }}" class="h-6 w-6 mr-3">
            Washer
        </div>
    @endif

    @if ($listing->listing_amenity->air_conditioning == true)
        <div class="relative inline-flex items-center w-full py-1  text-sm ">
            <img src="{{ asset('img/global/icons/ac.png') }}" class="h-6 w-6 mr-3">
            Air condition
        </div>
    @endif

    @if ($listing->listing_amenity->heating == true)
        <div class="relative inline-flex items-center w-full py-1  text-sm ">
            <img src="{{ asset('img/global/icons/heater.png') }}" class="h-6 w-6 mr-3">
            Heating
        </div>
    @endif

    @if ($listing->listing_amenity->tv == true)
        <div class="relative inline-flex items-center w-full py-1  text-sm ">
            <img src="{{ asset('img/global/icons/television.png') }}" class="h-6 w-6 mr-3">
            TV
        </div>
    @endif

    @if ($listing->listing_amenity->iron == true)
        <div class="relative inline-flex items-center w-full py-1  text-sm ">
            <img src="{{ asset('img/global/icons/iron.png') }}" class="h-6 w-6 mr-3">
            Iron
        </div>
    @endif

    @if ($listing->listing_amenity->kitchen == true)
        <div class="relative inline-flex items-center w-full py-1  text-sm ">
            <img src="{{ asset('img/global/icons/kitchen.png') }}" class="h-6 w-6 mr-3">
            Kitchen
        </div>
    @endif

    @if ($listing->listing_amenity->dryer == true)
        <div class="relative inline-flex items-center w-full py-1  text-sm ">
            <img src="{{ asset('img/global/icons/tumble-dryer.png') }}" class="h-6 w-6 mr-3">
            Dryer
        </div>
    @endif

    @if ($listing->listing_amenity->dedicated_workspace == true)
        <div class="relative inline-flex items-center w-full py-1  text-sm ">
            <img src="{{ asset('img/global/icons/table.png') }}" class="h-6 w-6 mr-3">
            Dedicated Workspace
        </div>
    @endif

    @if ($listing->listing_amenity->hair_dryer == true)
        <div class="relative inline-flex items-center w-full py-1  text-sm ">
            <img src="{{ asset('img/global/icons/hair-dryer.png') }}" class="h-6 w-6 mr-3">
            Hair Dryer
        </div>
    @endif

    @if ($listing->listing_amenity->pool == true)
        <div class="relative inline-flex items-center w-full py-1  text-sm ">
            <img src="{{ asset('img/global/icons/swimming-pool.png') }}" class="h-6 w-6 mr-3">
            Pool
        </div>
    @endif

    @if ($listing->listing_amenity->free_parking == true)
        <div class="relative inline-flex items-center w-full py-1  text-sm ">
            <img src="{{ asset('img/global/icons/parking.png') }}" class="h-6 w-6 mr-3">
            Free Parking
        </div>
    @endif

    @if ($listing->listing_amenity->crib == true)
        <div class="relative inline-flex items-center w-full py-1  text-sm ">
            <img src="{{ asset('img/global/icons/crib.png') }}" class="h-6 w-6 mr-3">
            Crib
        </div>
    @endif

    @if ($listing->listing_amenity->grill == true)
        <div class="relative inline-flex items-center w-full py-1  text-sm ">
            <img src="{{ asset('img/global/icons/grill.png') }}" class="h-6 w-6 mr-3">
            Grill
        </div>
    @endif

    @if ($listing->listing_amenity->gym == true)
        <div class="relative inline-flex items-center w-full py-1  text-sm ">
            <img src="{{ asset('img/global/icons/dumbbell.png') }}" class="h-6 w-6 mr-3">
            Gym
        </div>
    @endif


    @if ($listing->listing_amenity->smoking_allowed == true)
        <div class="relative inline-flex items-center w-full py-1  text-sm ">
            <img src="{{ asset('img/global/icons/smoking.png') }}" class="h-6 w-6 mr-3">
            Smoking Allowed
        </div>
    @endif

    @if ($listing->listing_amenity->breakfast == true)
        <div class="relative inline-flex items-center w-full py-1  text-sm ">
            <img src="{{ asset('img/global/icons/breakfast.png') }}" class="h-6 w-6 mr-3">
            Breakfast
        </div>
    @endif

    @if ($listing->listing_amenity->smoke_alarm == true)
        <div class="relative inline-flex items-center w-full py-1  text-sm ">
            <img src="{{ asset('img/global/icons/bell.png') }}" class="h-6 w-6 mr-3">
            Smoke Alarm
        </div>
    @endif

    @if ($listing->listing_amenity->carbon_monoxide_alarm == true)
        <div class="relative inline-flex items-center w-full py-1  text-sm ">
            <img src="{{ asset('img/global/icons/bell.png') }}" class="h-6 w-6 mr-3">
            Carbon Monoxide Alarm
        </div>
    @endif

</div>
