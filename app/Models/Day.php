<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Day extends Model
{
    use HasFactory;

    protected $fillable = [
        'name'
    ];

    public function ads()
    {
        return $this->belongsToMany(Ads::class);
    }
}
