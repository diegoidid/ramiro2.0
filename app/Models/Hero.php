<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Hero extends Model
{
    protected $fillable = ['name', 
    'age',
    ];

    public function images()
    {
        return $this->morphMany(Image::class, 'imageable');
    }
}
