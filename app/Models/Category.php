<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'categories';
    protected $primaryKey = 'category_id';

    protected $fillable = [
        // 'sku',
        'category_id',
        'category_name',
    ];

    public function listings()
    {
        return $this->hasMany(Listing::class, 'listing_id', 'listing_id')->latest();
    }
}
