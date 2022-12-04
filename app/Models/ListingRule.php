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

        'garbage_disposal',
        'curfew',
        'claygo',
        'no_smoking',
        'no_drinking',
        'no_pets',
        'no_events',

        'additional_rules',

    ];

    public function listing()
    {
        return $this->hasOne(Listing::class, 'listing_id', 'listing_id');
    }
}
