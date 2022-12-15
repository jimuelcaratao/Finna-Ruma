<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Listing extends Model
{
    use HasFactory;


    protected $table = 'listings';
    protected $primaryKey = 'listing_id';

    protected $fillable = [
        'user_id',
        'category_id',
        'boarding_house_id',

        'slug',

        'max_guest',
        'max_pet',

        'price_per_night',
        'service_fee',

        'approved_by',
        'approved_at',

        'listing_title',
        'description',

        'property_size',

        'location',
        'map_pin',
        'city',
        'country',
        'latitude',
        'longitude',

        'bedrooms',
        'beds',
        'bed_detials',
        'bathrooms',
        'property_type',
        'listing_status',
        'availability',

        'cost_score',
        'location_score',
        'facility_score',
        'room_size_score',

        'messenger_url',

        'gcash_qr',
        'default_photo',
        'viewers',
        'additional_notes',
    ];

    public function listing_amenity()
    {
        return $this->hasOne(ListingAmenity::class, 'listing_id', 'listing_id');
    }

    public function Booking()
    {
        return $this->hasMany(Booking::class, 'listing_id', 'listing_id');
    }

    public function listing_gallery()
    {
        return $this->hasOne(ListingGallery::class, 'listing_id', 'listing_id');
    }

    public function listing_reviews()
    {
        return $this->hasMany(ListingReview::class, 'listing_id', 'listing_id')->latest();
    }


    public function listing_rule()
    {
        return $this->hasOne(ListingRule::class, 'listing_id', 'listing_id');
    }

    public function category()
    {
        return $this->hasOne(Category::class, 'category_id', 'category_id');
    }

    public function house()
    {
        return $this->hasOne(BoardingHouse::class, 'boarding_house_id', 'boarding_house_id');
    }

    public function user()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }

    public function scopeSearchFilter($q)
    {
        if (!empty(request()->search)) {
            $q->Where('listing_title', 'LIKE', '%' .  request()->search  .  '%');
            // ->OrWhere('product_name', 'LIKE', '%' .  request()->search  .  '%');
        }

        return $q;
    }

    public function scopeCategoryFilter($q)
    {
        if (request()->search_cat != null) {
            $q->whereHas('category', function ($s) {
                $s->Where('category_name', 'LIKE', '%' .  request()->search_cat  .  '%');
            });
        }
        return $q;
    }

    public function scopeHouseFilter($q)
    {
        if (request()->search_house != null) {
            $q->whereHas('house', function ($s) {
                $s->Where('title', 'LIKE', '%' .  request()->search_house  .  '%');
            });
        }
        return $q;
    }

    public function scopeStatusFilter($q)
    {
        if (request()->search_status != null) {
            $q->Where('listing_status', 'LIKE', '%' .  request()->search_status  .  '%');
        }
        return $q;
    }

    public function scopeDestinationFilter($q)
    {
        if (!empty(request()->destination)) {
            $q->Where('listing_title', 'LIKE', '%' .  request()->destination  .  '%')
                ->OrWhere('location', 'LIKE', '%' .  request()->destination  .  '%');
        }
        return $q;
    }

    public function scopeDateFilter($q)
    {
        if (!empty(request()->check_in)) {
            $q->whereDoesntHave('Booking', function ($s) {
                $s->WhereBetween('check_in', [request()->check_in, request()->checkout])
                    ->OrWhereBetween('checkout', [request()->check_in, request()->checkout]);
            });
        }
        return $q;
    }

    public function scopeGuestFilter($q)
    {
        if (!empty(request()->guests)) {
            $q->whereBetween('max_guest', [0, request()->guests]);
        }
        return $q;
    }

    public function scopeBudgetFilter($q)
    {

        if (
            !empty(request()->budget_1) ||
            !empty(request()->budget_2) ||
            !empty(request()->budget_3) ||
            !empty(request()->budget_4) ||
            !empty(request()->budget_5)
        ) {
            $q->whereBetween('price_per_night', [0, 0]);
        }

        if (!empty(request()->budget_1)) {
            $q->OrwhereBetween('price_per_night', [0, 35]);
        }

        if (!empty(request()->budget_2)) {
            $q->OrwhereBetween('price_per_night', [36, 70]);
        }

        if (!empty(request()->budget_3)) {
            $q->OrwhereBetween('price_per_night', [71, 105]);
        }

        if (!empty(request()->budget_4)) {
            $q->OrwhereBetween('price_per_night', [106, 140]);
        }

        if (!empty(request()->budget_5)) {
            $q->Orwhere('price_per_night', '>', 141);
        }
        return $q;
    }

    public function scopePropertyFilter($q)
    {
        if (!empty(request()->property_type)) {
            $q->Where('property_type', request()->property_type);
        }

        return $q;
    }

    public function scopeTargetLocationFilter($q)
    {
        if (!empty(request()->target_type)) {
            $q->Where('location_score', request()->target_type);
        }
        return $q;
    }


    public function scopeSizeFilter($q)
    {
        if (
            !empty(request()->size_1) ||
            !empty(request()->size_2) ||
            !empty(request()->size_3) ||
            !empty(request()->size_4) ||
            !empty(request()->size_5)
        ) {
            $q->whereBetween('property_size', [0, 0]);
        }

        if (!empty(request()->size_1)) {
            $q->OrwhereBetween('property_size', [0, 19]);
        }

        if (!empty(request()->size_2)) {
            $q->OrwhereBetween('property_size', [20, 29]);
        }
        if (!empty(request()->size_3)) {
            $q->OrwhereBetween('property_size', [30, 39]);
        }

        if (!empty(request()->size_4)) {
            $q->OrwhereBetween('property_size', [40, 49]);
        }

        if (!empty(request()->size_5)) {
            $q->Orwhere('property_size', '>', 50);
        }
        return $q;
    }

    public function scopeFacilityScoreFilter($q)
    {
        if (
            !empty(request()->facility_1) ||
            !empty(request()->facility_2) ||
            !empty(request()->facility_3) ||
            !empty(request()->facility_4) ||
            !empty(request()->facility_5)
        ) {
            $q->where('facility_score', 0);
        }

        if (!empty(request()->facility_1)) {
            $q->Orwhere('facility_score', 1);
        }

        if (!empty(request()->facility_2)) {
            $q->Orwhere('facility_score', 2);
        }
        if (!empty(request()->facility_3)) {
            $q->Orwhere('facility_score', 3);
        }

        if (!empty(request()->facility_4)) {
            $q->Orwhere('facility_score', 4);
        }

        if (!empty(request()->facility_5)) {
            $q->Orwhere('facility_score', 5);
        }
        return $q;
    }

    public function scopeBedroomFilter($q)
    {
        if (
            !empty(request()->bedroom_1) ||
            !empty(request()->bedroom_2) ||
            !empty(request()->bedroom_3) ||
            !empty(request()->bedroom_4)
        ) {
            $q->whereBetween('beds', [0, 0]);
        }

        if (!empty(request()->bedroom_1)) {
            $q->OrwhereBetween('beds', [0, 2]);
        }

        if (!empty(request()->bedroom_2)) {
            $q->OrwhereBetween('beds', [3, 4]);
        }
        if (!empty(request()->bedroom_3)) {
            $q->OrwhereBetween('beds', [5, 6]);
        }

        if (!empty(request()->bedroom_4)) {
            $q->Orwhere('beds', '>', 7);
        }
        return $q;
    }
}
