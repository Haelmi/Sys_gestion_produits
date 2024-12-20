<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    // Only these attributes can be mass-assigned
    protected $fillable = ['name'];

    public function products()
    {
        return $this->hasMany(Products::class);
    }
}
