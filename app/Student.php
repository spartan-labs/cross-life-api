<?php

namespace App;

class Student extends Entity
{
    protected $fillable = [
        'person_id',
        'plan_id',
    ];

    public function plans()
    {
        return $this->hasMany(Plan::class);
    }
}
