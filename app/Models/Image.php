<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $fillable = ['url', 'imageable_id', 'imageable_type'];


    public function imageable()
    {
        return $this->morphTo();
    }
}
//wey estabamosdixciendo qu eya nos reburujgamo sy dice ramiro yo tambien y eso qu e ke iba a meter mas cosas




