<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BuyerProposal extends Model
{
    protected $guarded = [];
    use HasFactory;

    public function user(){
        return $this->belongsTo(User::class);
    }
    public function service(){
        return $this->belongsTo(Service::class);
    }
    public function scopeDisputed(){
        $disputes = Dispute::where('buyer_proposal_id',$this->id)->get();
        if($disputes->isNotEmpty()){
            return $disputes;
        }else{
            return false;
        }
    }
}
