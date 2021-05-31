<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dispute extends Model
{
    use HasFactory;

    protected $guarded = [];


    public function buyer_proposal()
    {
        return $this->belongsTo(BuyerProposal::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function decision_for()
    {
        return $this->belongsTo(User::class,'decision_for');
    }

    public function decision_against()
    {
        return $this->belongsTo(User::class,'decision_against');
    }
}
