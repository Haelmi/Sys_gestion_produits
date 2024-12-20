<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    //  Only these attributes can be mass-assigned
    protected $fillable = ['name', 'description', 'price', 'category_id', 'image'];

    public function category()
    {
        return $this->belongsTo(Categories::class);
    }
}
