<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;

    protected $guarded = [];


    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function buyer_proposal()
    {
        return $this->belongsTo(BuyerProposal::class);
    }

    public function service()
    {
        return $this->belongsTo(Service::class);
    }

}
