<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserPreference extends Model
{
    use HasFactory;

    protected $table = 'user_preferences';

    protected $fillable = [
        'user_id',
        'cost_score',
        'location_score',
        'facility_score',
        'room_size_score',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
