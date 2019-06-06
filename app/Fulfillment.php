<?php

namespace App;

use App\User;
use App\Wish;
use Illuminate\Database\Eloquent\Model;
use BrianFaust\Commentable\Traits\HasComments;

class Fulfillment extends Model
{
    use HasComments;

    protected $guarded = ['id'];

    public function giver()
    {
        return $this->belongsTo(User::class, 'giver_id');
    }

    public function recipient()
    {
        return $this->wish->user();   
    }

    public function wish()
    {
        return $this->belongsTo(Wish::class);
    }

    public function getIntroductionAttribute()
    {
        return $this->comments->first();
    }

    public function getFulfilledAttribute()
    {
        return $this->status == 2;
    }

    /**
     * Attribute mutations
     */
    public function setWishAttribute(Wish $wish) 
    {
        $this->wish_id = $wish->id;
        $this->setRelation('wish', $wish);
    }
    
    public function setGiverAttribute(User $giver)
    {
        $this->giver_id = $giver->id;
        $this->setRelation('giver', $giver);
    }

    public function setRecipientAttribute(User $recipient)
    {
        $this->recipient_id = $recipient->id;
        $this->setRelation('giver', $recipient);
    }

    /**
     * Local Scopes
     */

     public function scopeUnfulfilled($query)
     {
         return $query->where('status', 1);
     }

     public function scopeFulfilled($query)
     {
         return $query->where('status', 2);
     }
}
