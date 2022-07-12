<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    protected $table = 'listing_galleries';
    protected $primaryKey = 'listing_gallery_id';

    protected $fillable = [
        'user_id',
        'listing_id',

        'booking_status',
        'payment_method',
        'payment_status',
        'confirmed_at',
        'canceled_at',
        'paid_at',
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
}
