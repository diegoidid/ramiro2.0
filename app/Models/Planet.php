<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Planet extends Model
{
    protected $fillable = ['planet', 'color', 'hero_id'];

    public function images() {
        return $this->morphMany(Image::class, 'imageable');
    }
}
