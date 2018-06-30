<?php

namespace App;

class Product extends Entity
{
    protected $fillable = [
        'name',
        'description',
        'price',
        'amount',
        'category_id'
    ];

    public function productCombos()
    {
        return $this->belongsToMany(ProductCombo::class);
    }
}
