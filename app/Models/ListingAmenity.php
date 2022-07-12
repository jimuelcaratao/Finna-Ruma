<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ListingAmenity extends Model
{
    use HasFactory;

    protected $table = 'listing_amenities';
    protected $primaryKey = 'listing_amenity_id';

    protected $fillable = [
        'listing_id',

        'wifi',
        'washer',
        'air_conditioning',
        'heating',
        'tv',
        'iron',
        'kitchen',
        'dryer',
        'dedicated_workspace',
        'hair_dryer',

        'pool',
        'free_parking',
        'crib',
        'grill',
        'gym',
        'smoking_allowed',
        'breakfast',

        'smoke_alarm',
        'carbon_monoxide_alarm',

    ];

    public function listing()
    {
        return $this->hasOne(Listing::class, 'listing_id', 'listing_id');
    }
}
