<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    protected $table = 'bookings';
    protected $primaryKey = 'booking_id';

    protected $fillable = [
        'user_id',
        'host_id',

        'listing_id',

        'booking_status',
        'payment_method',
        'payment_status',

        'payment_proof',
        'payment_approved_at',

        'check_in',
        'checkout',
        'days',

        'adults',
        'children',
        'infants',
        'pets',

        'service_fee',
        'price_per_night',
        'pending_total',
        'total',

        'total_paid',

        'confirmed_at',
        'canceled_at',
        'completed_at',
        'reviewed_at',
        'paid_at',
        'viewed_by_host',
        'viewed_by_user',
    ];

    public function user()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }

    public function host()
    {
        return $this->hasOne(User::class, 'id', 'host_id');
    }

    public function listing()
    {
        return $this->hasOne(Listing::class, 'listing_id', 'listing_id');
    }


    public function scopeSearchFilter($q)
    {
        if (!empty(request()->search)) {
            $q->Where('booking_id', 'LIKE', '%' .  request()->search  .  '%');
            // ->OrWhere('product_name', 'LIKE', '%' .  request()->search  .  '%');
        }

        return $q;
    }


    public function scopeStatusFilter($q)
    {
        if (request()->search_status != null) {
            $q->Where('booking_status', 'LIKE', '%' .  request()->search_status  .  '%');
        }
        return $q;
    }
}
