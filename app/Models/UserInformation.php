<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserInformation extends Model
{
    use HasFactory;

    protected $table = 'user_informations';
    protected $primaryKey = 'user_information_id';

    protected $fillable = [
        'user_id',
        'mobile_no',
        'house',
        'city',
        'province',
        'barangay',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
