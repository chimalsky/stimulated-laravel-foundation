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
}
