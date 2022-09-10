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

        'bedrooms',
        'beds',
        'bed_detials',
        'bathrooms',
        'property_type',
        'listing_status',

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
            !empty(request()->budget_4)
        ) {
            $q->whereBetween('price_per_night', [0, 0]);
        }

        if (!empty(request()->budget_1)) {
            $q->OrwhereBetween('price_per_night', [0, 2000]);
        }

        if (!empty(request()->budget_2)) {
            $q->OrwhereBetween('price_per_night', [2000, 4000]);
        }

        if (!empty(request()->budget_3)) {
            $q->OrwhereBetween('price_per_night', [4000, 6000]);
        }

        if (!empty(request()->budget_4)) {
            $q->Orwhere('price_per_night', '>', 6000);
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
            $q->OrwhereBetween('property_size', [0, 10]);
        }

        if (!empty(request()->size_2)) {
            $q->OrwhereBetween('property_size', [10, 20]);
        }
        if (!empty(request()->size_3)) {
            $q->OrwhereBetween('property_size', [20, 30]);
        }

        if (!empty(request()->size_4)) {
            $q->OrwhereBetween('property_size', [30, 40]);
        }

        if (!empty(request()->size_5)) {
            $q->Orwhere('property_size', '>', 50);
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
            $q->whereBetween('bedrooms', [0, 0]);
        }

        if (!empty(request()->bedroom_1)) {
            $q->OrwhereBetween('bedrooms', [0, 2]);
        }

        if (!empty(request()->bedroom_2)) {
            $q->OrwhereBetween('bedrooms', [2, 4]);
        }
        if (!empty(request()->bedroom_3)) {
            $q->OrwhereBetween('bedrooms', [4, 6]);
        }

        if (!empty(request()->bedroom_4)) {
            $q->Orwhere('bedrooms', '>', 7);
        }
        return $q;
    }
}
