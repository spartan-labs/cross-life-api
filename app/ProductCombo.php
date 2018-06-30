<?php

namespace App;

class ProductCombo extends Entity
{
    protected $fillable = [
        'name',
        'description',
        'price'
    ];

    public function products()
    {
        return $this->belongsToMany(Product::class);
    }
}
