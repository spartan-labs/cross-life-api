<?php

namespace App;

class Student extends Entity
{
    protected $fillable = [
        'id',
        'person_id',
        'plan_id',
    ];

    public function plans()
    {
        return $this->belongsToMany('App\Plan', 'plan_id', 'id');
    }
}
