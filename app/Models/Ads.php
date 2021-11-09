<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Ads extends Model
{
    use HasFactory , SoftDeletes;

    protected $fillable = [
        'duration',
        'type',
        'image',
    ];

    public function time()
    {
        return $this->hasMany(Time::class,'ad_id')->select(['time']);
    }
}
