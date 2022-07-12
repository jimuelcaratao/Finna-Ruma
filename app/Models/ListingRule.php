<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ListingRule extends Model
{
    use HasFactory;

    protected $table = 'listing_rules';
    protected $primaryKey = 'listing_rule_id';

    protected $fillable = [
        'listing_id',
        'rule',
    ];

    public function listing()
    {
        return $this->hasOne(Listing::class, 'listing_id', 'listing_id');
    }
}
