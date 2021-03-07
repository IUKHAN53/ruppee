<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompletedWork extends Model
{
    protected $guarded = [];
    use HasFactory;

    public function buyer_proposal(){
        return $this->belongsTo(BuyerProposal::class);
    }
}
