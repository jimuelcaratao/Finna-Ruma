<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ListingGallery extends Model
{
    use HasFactory;

    protected $table = 'listing_galleries';
    protected $primaryKey = 'listing_gallery_id';

    protected $fillable = [
        'listing_id',
        'photo',
    ];

    public function listing()
    {
        return $this->hasOne(Listing::class, 'listing_id', 'listing_id');
    }
}
