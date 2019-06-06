<?php

namespace App;

use App\User;
use App\Fulfillment;
use Illuminate\Database\Eloquent\Model;

class Wish extends Model
{
    protected $guarded = [
        'id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function fulfillments()
    {
        return $this->hasMany(Fulfillment::class);
    }

    public function getFulfilledAttribute()
    {
        return $this->fulfillments()->where('status', 2)->count() > 0;
    }

    /**
     * Local scopes
     */

    public function scopeUnfulfilled($query)
    {
        return $query->whereDoesntHave('fulfillments', function($q) {
            $q->fulfilled();
        });
    }

    public function scopeFulfilled($query)
    {
        return $query->whereHas('fulfillments', function($q) {
            $q->fulfilled();
        });
    }
}
