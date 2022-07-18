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

        'default_photo',
        'viewers',
        'additional_notes',
    ];

    public function listing_amenity()
    {
        return $this->hasOne(ListingAmenity::class, 'listing_id', 'listing_id');
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
        if (request()->search_col != null) {
            $q->Where('category_id', 'LIKE', '%' .  request()->search_col  .  '%');
        }
        return $q;
    }
}
