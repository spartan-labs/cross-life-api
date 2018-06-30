<?php

namespace App;

class Plan extends Entity
{

    protected $fillable = [
        'name',
        'description',
        'price'
    ];

    public function students()
    {
        return $this->belongsToMany('App\Student');
    }
}
