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

    public function review()
    {
        return $this->hasMany(Review::class);
    }

    public function scopeStars(){
        $stars = Review::where('service_id',$this->id)->get()->pluck('stars')->avg();
        return (is_numeric($stars))?$stars:0;
    }
}
