<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Time extends Model
{
    use HasFactory;


    public function ad()
    {
        return $this->belongsTo(Ads::class,'ad_id');
    }
}
