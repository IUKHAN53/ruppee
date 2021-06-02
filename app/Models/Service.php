<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;
    protected $guarded = [];


    public function user(){
        return $this->belongsTo(User::class);
    }

    public function scopeStars(){
        return Review::where('service_id',$this->id)->withAvg('stars')->get();
    }
}
