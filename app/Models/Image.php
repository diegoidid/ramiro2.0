<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $fillable = ['planet_url'];

    public function imageable() {
        return $this->morphTo();
    }
}
