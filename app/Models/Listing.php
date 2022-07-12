<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Listing extends Model
{
    use HasFactory, SoftDeletes;


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
        'location_details',

        'bedrooms',
        'beds',
        'bathrooms',
        'property_type',
        'listing_status',

        'messenger_url',

        'default_photo',
        'viewers',
        'additional_notes',
    ];

    public function listing_amenities()
    {
        return $this->hasMany(ListingAmenity::class, 'listing_amenity_id', 'listing_amenity_id')->latest();
    }

    public function listing_galleries()
    {
        return $this->hasMany(ListingGallery::class, 'listing_gallery_id', 'listing_gallery_id')->latest();
    }

    public function listing_reviews()
    {
        return $this->hasMany(ListingReview::class, 'listing_review_id', 'listing_review_id')->latest();
    }


    public function listing_rules()
    {
        return $this->hasMany(ListingRule::class, 'listing_rule_id', 'listing_rule_id')->latest();
    }

    public function category()
    {
        return $this->hasOne(Category::class, 'category_id', 'category_id');
    }


    public function user()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }
}
