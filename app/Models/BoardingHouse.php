<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BoardingHouse extends Model
{
    use HasFactory;

    protected $table = 'boarding_houses';
    protected $primaryKey = 'boarding_house_id';

    protected $fillable = [
        'user_id',
        'title',
        'slug',
        'description',
        'cover',
        'status',
    ];

    public function listings()
    {
        return $this->hasMany(Listing::class, 'boarding_house_id', 'boarding_house_id')->latest();
    }

    public function scopeStatusFilter($q)
    {
        if (request()->search_status != null) {
            $q->Where('status', 'LIKE', '%' .  request()->search_status  .  '%');
        }
        return $q;
    }
}
