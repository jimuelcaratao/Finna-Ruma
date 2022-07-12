<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ListingReview extends Model
{
    use HasFactory;

    protected $table = 'listing_reviews';
    protected $primaryKey = 'listing_review_id';

    protected $fillable = [
        'user_id',
        'booking_id',
        'listing_id',
        'stars',
        'body',
        'viewed_by_host',
        'viewed_by_user',
    ];

    public function user()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }

    public function listing()
    {
        return $this->hasOne(Listing::class, 'listing_id', 'listing_id');
    }

    public function booking()
    {
        return $this->hasOne(Booking::class, 'booking_id', 'booking_id');
    }
}
