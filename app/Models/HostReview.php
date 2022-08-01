<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HostReview extends Model
{
    use HasFactory;

    protected $table = 'host_reviews';
    protected $primaryKey = 'host_review_id';

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
