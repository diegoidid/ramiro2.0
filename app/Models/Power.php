<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Power extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'power',
        'power_level',
        'hero_id'
    ];

    public function images()
    {
        return $this->morphOne(Image::class, 'imageable');
    }
}

