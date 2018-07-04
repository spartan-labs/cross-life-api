<?php

namespace App;

class Plan extends Entity
{

    protected $fillable = [
        'name',
        'description',
        'price',
        'seg',
        'ter',
        'qua ',
        'qui ',
        'sex',
        'sab ',
        'dom '
    ];

    public function students()
    {
        return $this->belongsToMany('App\Student');
    }
}
